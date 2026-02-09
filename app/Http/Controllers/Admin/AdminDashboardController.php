<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'rooms' => Room::count(),
            'bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'users' => User::count(),
        ];

        $recentBookings = Booking::with('room')->latest()->take(10)->get();

        return view('admin.dashboard', compact('stats', 'recentBookings'));
    }
}
