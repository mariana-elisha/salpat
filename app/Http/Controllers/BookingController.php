<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
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
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'number_of_guests' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:1000',
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
        $totalPrice = $room->price_per_night * $nights;

        // Create booking
        $booking = Booking::create([
            'room_id' => $room->id,
            'user_id' => auth()->id(),
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'guest_phone' => $request->guest_phone,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'number_of_guests' => $request->number_of_guests,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'special_requests' => $request->special_requests,
            'booking_reference' => Booking::generateBookingReference(),
        ]);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Booking created successfully!');
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        $user = auth()->user();
        if ($user && ! $user->isAdmin() && ! $user->isReceptionist()) {
            if ($booking->user_id !== $user->id) {
                abort(403, 'Unauthorized.');
            }
        }
        return view('bookings.show', compact('booking'));
    }

    /**
     * Display all bookings (admin/receptionist) or user's own bookings.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        if ($user && ($user->isAdmin() || $user->isReceptionist())) {
            $bookings = Booking::with('room')->latest()->paginate(15);
        } elseif ($user) {
            $bookings = $user->bookings()->with('room')->latest()->paginate(15);
        } else {
            $bookings = Booking::with('room')->latest()->paginate(15);
        }
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Update booking status (admin/receptionist only).
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $user = auth()->user();
        if (! $user || (!$user->isAdmin() && !$user->isReceptionist())) {
            abort(403, 'Unauthorized.');
        }

        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);

        $booking->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }
}
