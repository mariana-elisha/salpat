<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Notifications\SystemNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Show the booking form for a specific room.
     */
    public function create(Request $request, Room $room)
    {
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');
        $guests = $request->input('guests', 1);

        return view('bookings.create', compact('room', 'checkIn', 'checkOut', 'guests'));
    }

    /**
     * Store a new booking.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_id' => 'required|exists:rooms,id',
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'guest_phone' => 'nullable|string|max:20',
            'guest_address' => 'required|string|max:500',
            'guest_passport_id' => 'required|string|max:100',
            'contact_preference' => 'nullable|in:email,phone,whatsapp',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'number_of_guests' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:1000',
            'password' => 'nullable|string|min:8|confirmed',
            'payment_method' => 'nullable|string', // Removed strict restriction
            'booking_type' => 'required|in:individual,company',
            'company_name' => 'required_if:booking_type,company|nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $room = Room::findOrFail($request->room_id);

        // Check if room is available for the requested dates
        if (!$room->isAvailableForDates($request->check_in, $request->check_out)) {
            return redirect()->back()
                ->with('error', 'Sorry, this room is not available for the selected dates.')
                ->withInput();
        }

        // Check capacity
        if ($request->number_of_guests > $room->capacity) {
            return redirect()->back()
                ->with('error', "This room can only accommodate {$room->capacity} guests.")
                ->withInput();
        }

        // Calculate total price
        $checkIn = \Carbon\Carbon::parse($request->check_in);
        $checkOut = \Carbon\Carbon::parse($request->check_out);
        $nights = $checkIn->diffInDays($checkOut);
        
        $pricePerNight = $room->price_per_night;
        if ($request->resident_status === 'resident' && $room->resident_price_per_night) {
            // Convert TSH resident price to USD for storage consistency
            $pricePerNight = $room->resident_price_per_night / Room::USD_TO_TZS;
        }
        
        $totalPrice = $pricePerNight * $nights;

        // Handle optional user creation
        $userId = auth()->id();
        if (!$userId && $request->filled('password')) {
            // Only create if email doesn't exist already
            $existingUser = User::where('email', $request->guest_email)->first();
            if (!$existingUser) {
                $newUser = User::create([
                    'name' => $request->guest_name,
                    'email' => $request->guest_email,
                    'phone' => $request->guest_phone,
                    'password' => \Illuminate\Support\Facades\Hash::make($request->password),
                    'role' => 'user',
                ]);
                auth()->login($newUser);
                $userId = $newUser->id;
            } else {
                return redirect()->back()
                    ->with('error', 'An account with this email already exists. Please log in first.')
                    ->withInput();
            }
        }

        // Create booking
        $booking = Booking::create([
            'room_id' => $room->id,
            'user_id' => $userId,
            'contact_preference' => $request->contact_preference ?? 'email',
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'guest_phone' => $request->guest_phone,
            'guest_address' => $request->guest_address,
            'guest_passport_id' => $request->guest_passport_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'number_of_guests' => $request->number_of_guests,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'payment_method' => $request->payment_method ?? 'manual',
            'payment_status' => 'pending',
            'special_requests' => $request->special_requests,
            'booking_reference' => Booking::generateBookingReference(),
            'booking_type' => $request->booking_type,
            'company_name' => $request->company_name,
        ]);

        // Send confirmation email
        try {
            \Illuminate\Support\Facades\Mail::to($booking->guest_email)->send(new \App\Mail\BookingConfirmation($booking));
        } catch (\Exception $e) {
            // Log error or handle gracefully (don't fail booking if email fails)
            \Illuminate\Support\Facades\Log::error('Failed to send booking confirmation email: ' . $e->getMessage());
        }

        // Log Activity
        \App\Models\ActivityLog::create([
            'user_id' => $userId,
            'action' => 'Booking Created',
            'description' => "Booking reference {$booking->booking_reference} created for room {$room->name}.",
        ]);

        // All successful bookings redirect to WhatsApp for payment coordination
        $message = "Hello Salpat Camp! I have just made a reservation.\n\n" .
                  "*Reference:* {$booking->booking_reference}\n" .
                  "*Guest:* {$booking->guest_name}\n" .
                  "*Room:* {$room->name}\n" .
                  "*Dates:* " . $checkIn->format('d M') . " to " . $checkOut->format('d M') . "\n" .
                  "*Total:* $" . number_format($booking->total_price, 2) . " / " . number_format($booking->total_price * Room::USD_TO_TZS, 0) . " TZS\n\n" .
                  "Please provide payment guidance for my stay.";
        
        $whatsappUrl = "https://wa.me/255770307759?text=" . urlencode($message);
        
        return redirect()->away($whatsappUrl);

    }

    /**
     * Show Payment Page
     */
    public function payment(Booking $booking)
    {
        // Only allow if pending
        if ($booking->payment_status === 'paid') {
            return redirect()->route('bookings.show', $booking)->with('info', 'This booking is already paid.');
        }
        return view('bookings.payment', compact('booking'));
    }

    /**
     * Show Payment Processing Page
     */
    public function paymentProcessing(Booking $booking)
    {
        return view('bookings.processing', compact('booking'));
    }

    /**
     * Process Simulated Payment
     */
    public function processPayment(Request $request, Booking $booking)
    {
        if ($booking->payment_method === 'mpesa') {
            $request->validate([
                'phone' => ['required', 'string', 'regex:/^[67][0-9]{8}$/'],
            ], [
                'phone.regex' => 'The phone number must be exactly 9 digits and start with 6 or 7 (e.g., 770307759).',
            ]);
        } else {
            $request->validate([
                'card_name' => 'required|string|max:255',
                'card_number' => ['required', 'string', 'regex:/^[0-9]{16}$/'],
                'expiry' => ['required', 'string', 'regex:/^(0[1-9]|1[0-2])\/[0-9]{2}$/'],
                'cvv' => ['required', 'string', 'regex:/^[0-9]{3}$/'],
            ], [
                'card_number.regex' => 'Card number must be 16 digits.',
                'expiry.regex' => 'Expiry must be in MM/YY format.',
                'cvv.regex' => 'CVV must be 3 digits.',
            ]);
        }

        // In a real app, you'd trigger the API here. 
        // For this demo, we'll mark as paid and show the processing animation.
        $booking->update([
            'payment_status' => 'paid',
            // 'status' => 'confirmed', // Removed auto-confirmation to allow staff review
        ]);

        \App\Models\ActivityLog::create([
            'user_id' => auth()->id() ?? User::where('email', $booking->guest_email)->first()?->id ?? 1, // Fallback if guest payment
            'action' => 'Payment Initiated',
            'description' => "Payment of {$booking->total_price} initiated via {$booking->payment_method} for {$booking->booking_reference}.",
        ]);

        return redirect()->route('bookings.payment.processing', [
            'booking' => $booking,
            'phone' => $request->phone, // Pass phone to processing page for display
        ]);
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        $user = auth()->user();

        // If user is admin, manager, or receptionist, allow access
        if ($user && ($user->isAdmin() || $user->isManager() || $user->isReceptionist())) {
            return view('bookings.show', compact('booking'));
        }

        // If booking belongs to authenticated user
        if ($user && $booking->user_id === $user->id) {
            return view('bookings.show', compact('booking'));
        }

        // If guest (no user_id) accessing via reference link (implicit binding handles ID/Reference check)
        // Ideally we should have some additional check like session matching for security, 
        // but the long random reference acts as a secret key.
        // We will strictly check that if the booking HAS a user_id, a guest cannot view it even with the link.
        if ($booking->user_id && !$user) {
            abort(403, 'Unauthorized.');
        }

        // If creating user is viewing, handled above.
        // If another user is viewing, handled above (mismatch IDs).

        return view('bookings.show', compact('booking'));
    }

    /**
     * Display all bookings (admin/receptionist) or user's own bookings.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        if ($user && ($user->isAdmin() || $user->isReceptionist() || $user->isManager())) {
            $bookings = Booking::with('room')->latest()->paginate(15);
        } elseif ($user) {
            $bookings = $user->bookings()->with('room')->latest()->paginate(15);
        } else {
            $bookings = collect(); // Guests should not see the full list of bookings
        }
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Update booking status (admin/receptionist only).
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $user = auth()->user();
        if (!$user || (!$user->isAdmin() && !$user->isReceptionist() && !$user->isManager())) {
            abort(403, 'Unauthorized.');
        }

        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);

        $oldStatus = $booking->status;
        $booking->update(['status' => $request->status]);

        // Notify Admin, Manager, and Receptionist about status change
        if ($oldStatus !== $request->status) {
            $staffToNotify = User::whereIn('role', ['admin', 'manager', 'receptionist'])->get();
            Notification::send($staffToNotify, new SystemNotification(
                "Booking #{$booking->booking_reference} status changed from '{$oldStatus}' to '{$request->status}'",
                route('bookings.show', $booking),
                'booking_status'
            ));
        }

        // Send confirmation email if status changed to confirmed
        if ($oldStatus !== 'confirmed' && $request->status === 'confirmed') {
            try {
                \Illuminate\Support\Facades\Mail::to($booking->guest_email)->send(new \App\Mail\BookingConfirmation($booking));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Failed to send booking confirmation email on status update: ' . $e->getMessage());
                return redirect()->back()->with('success', 'Booking status updated successfully, but email failed to send.');
            }
        }

        // Log Activity
        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Booking Status Updated',
            'description' => "Booking reference {$booking->booking_reference} status updated from {$oldStatus} to {$request->status}.",
        ]);

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }

    /**
     * Update payment status (admin/receptionist only).
     */
    public function updatePaymentStatus(Request $request, Booking $booking)
    {
        $user = auth()->user();
        if (!$user || (!$user->isAdmin() && !$user->isReceptionist() && !$user->isManager())) {
            abort(403, 'Unauthorized.');
        }

        $request->validate([
            'payment_status' => 'required|in:pending,paid,refunded',
        ]);

        $oldStatus = $booking->payment_status;
        $booking->update(['payment_status' => $request->payment_status]);

        // Log Activity
        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Payment Status Updated',
            'description' => "Booking reference {$booking->booking_reference} payment status updated from {$oldStatus} to {$request->payment_status}.",
        ]);

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }

    /**
     * Check-in a guest. (Admin, Manager, Receptionist)
     */
    public function checkIn(Request $request, Booking $booking)
    {
        $user = auth()->user();
        if (!$user || (!$user->isAdmin() && !$user->isManager() && !$user->isReceptionist())) {
            abort(403, 'Unauthorized.');
        }

        if ($booking->status !== 'confirmed') {
            return redirect()->back()->with('error', 'Only confirmed bookings can be checked in.');
        }

        $booking->update([
            'status' => 'checked_in'
        ]);

        \App\Models\ActivityLog::create([
            'user_id' => $user->id,
            'action' => 'Guest Checked In',
            'description' => "Guest checked into room {$booking->room->name} for booking {$booking->booking_reference}.",
        ]);

        return redirect()->back()->with('success', 'Guest successfully checked in.');
    }

    /**
     * Check-out a guest. (Admin, Manager, Receptionist)
     */
    public function checkOut(Request $request, Booking $booking)
    {
        $user = auth()->user();
        if (!$user || (!$user->isAdmin() && !$user->isManager() && !$user->isReceptionist())) {
            abort(403, 'Unauthorized.');
        }

        if ($booking->status !== 'checked_in') {
            return redirect()->back()->with('error', 'Guest is not currently checked in.');
        }

        $booking->update([
            'status' => 'completed'
        ]);

        \App\Models\ActivityLog::create([
            'user_id' => $user->id,
            'action' => 'Guest Checked Out',
            'description' => "Guest checked out of room {$booking->room->name} for booking {$booking->booking_reference}.",
        ]);

        return redirect()->back()->with('success', 'Guest successfully checked out.');
    }

    /**
     * Show stay extension form.
     */
    public function extendShow(Booking $booking)
    {
        // Only confirmed or checked_in bookings can be extended
        if (!in_array($booking->status, ['confirmed', 'checked_in'])) {
            return redirect()->back()->with('error', 'Only active or confirmed bookings can be extended.');
        }

        return view('bookings.extend', compact('booking'));
    }

    /**
     * Update booking with modified stay (extension or reduction).
     */
    public function extendUpdate(Request $request, Booking $booking)
    {
        $user = auth()->user();
        if (!$user || (!$user->isAdmin() && !$user->isManager() && !$user->isReceptionist())) {
            abort(403, 'Unauthorized.');
        }

        $request->validate([
            'new_check_out' => 'required|date',
        ]);

        $newCheckOut = \Carbon\Carbon::parse($request->new_check_out);
        $oldCheckOut = $booking->check_out;
        $checkIn = $booking->check_in;

        // Validation: New checkout must be after check-in
        if ($newCheckOut->lessThanOrEqualTo($checkIn)) {
            return redirect()->back()->with('error', 'New check-out date must be after the check-in date.');
        }

        // Validation: If already checked in, cannot reduce stay before today
        if ($booking->status === 'checked_in' && $newCheckOut->lessThan(today())) {
            return redirect()->back()->with('error', 'Cannot set check-out date to the past for an active stay.');
        }

        $room = $booking->room;
        
        // Check availability ONLY if extending
        if ($newCheckOut->greaterThan($oldCheckOut)) {
            if (!$room->isAvailableForDates($oldCheckOut->format('Y-m-d'), $newCheckOut->format('Y-m-d'), $booking->id)) {
                return redirect()->back()->with('error', 'Sorry, the room is not available for the extended period.');
            }
        }

        $totalNights = $checkIn->diffInDays($newCheckOut);
        if ($totalNights <= 0) $totalNights = 1; // Minimum 1 night
        
        // Calculate new total price
        // We use the original price per night to maintain consistency
        $pricePerNight = $booking->total_price / ($booking->number_of_nights ?: 1);
        $newTotalPrice = $pricePerNight * $totalNights;

        $booking->update([
            'check_out' => $request->new_check_out,
            'total_price' => $newTotalPrice,
        ]);

        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Booking Modified',
            'description' => "Booking {$booking->booking_reference} stay modified to {$request->new_check_out}. New total: ${$newTotalPrice}.",
        ]);

        return redirect()->route('bookings.show', $booking)->with('success', 'Stay modified successfully.');
    }
}
