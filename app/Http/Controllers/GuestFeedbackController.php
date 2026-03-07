<?php

namespace App\Http\Controllers;

use App\Models\GuestFeedback;
use App\Models\Booking;
use Illuminate\Http\Request;

class GuestFeedbackController extends Controller
{
    /**
     * Display a listing of feedback (for Receptionist).
     */
    public function index()
    {
        $feedbacks = GuestFeedback::with('booking')->latest()->paginate(15);
        $totalFeedback = GuestFeedback::count();
        $averageRating = GuestFeedback::avg('rating') ?? 0;

        return view('receptionist.feedback.index', compact('feedbacks', 'totalFeedback', 'averageRating'));
    }

    /**
     * Show the form for creating a new feedback.
     */
    public function create(Request $request)
    {
        $bookingRef = $request->query('ref');
        return view('feedback.create', compact('bookingRef'));
    }

    /**
     * Store a newly created feedback in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'guest_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'required|string',
            'booking_reference' => 'nullable|string'
        ]);

        $bookingId = null;
        if ($request->booking_reference) {
            $booking = Booking::where('booking_reference', '=', $request->booking_reference)->first();
            if ($booking) {
                // If the booking exists, link it
                $bookingId = $booking->id;
            } else {
                return back()->withInput()->withErrors(['booking_reference' => 'The provided booking reference was not found. Leave blank if unsure.']);
            }
        }

        GuestFeedback::create([
            'booking_id' => $bookingId,
            'guest_name' => $request->guest_name,
            'rating' => $request->rating,
            'comments' => $request->comments,
        ]);

        return redirect()->route('home')->with('success', 'Thank you for your valuable feedback!');
    }
}
