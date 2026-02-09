<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;

class ReceptionistDashboardController extends Controller
{
    /**
     * Display the receptionist dashboard.
     */
    public function index()
    {
        $stats = [
            'rooms' => Room::count(),
            'today_checkins' => Booking::whereDate('check_in', today())->whereIn('status', ['pending', 'confirmed'])->count(),
            'today_checkouts' => Booking::whereDate('check_out', today())->where('status', 'confirmed')->count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
        ];

        $upcomingBookings = Booking::with('room')
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('check_in', '>=', today())
            ->orderBy('check_in')
            ->take(10)
            ->get();

        return view('receptionist.dashboard', compact('stats', 'upcomingBookings'));
    }
}
