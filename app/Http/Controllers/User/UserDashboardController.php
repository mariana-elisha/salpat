<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * Display the user dashboard (my bookings).
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $myBookings = $user->bookings()->with('room')->latest()->paginate(10);
        $featuredRooms = Room::where('is_available', true)->latest()->take(3)->get();

        return view('user.dashboard', compact('myBookings', 'featuredRooms'));
    }
}
