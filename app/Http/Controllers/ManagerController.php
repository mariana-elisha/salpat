<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $stats = [
            'total_bookings' => Booking::count(),
            'active_guests' => User::where('role', 'user')->count(),
            'pending_orders' => ServiceOrder::where('status', 'pending')->count(),
            'dirty_rooms' => Room::where('housekeeping_status', '!=', 'clean')->count(),
        ];

        $recentBookings = Booking::with('room', 'user')->latest()->take(5)->get();
        $recentOrders = ServiceOrder::with('service', 'user', 'room')->latest()->take(5)->get();
        $roomStatuses = Room::select('name', 'housekeeping_status', 'is_available')->get();

        return view('manager.dashboard', compact('stats', 'recentBookings', 'recentOrders', 'roomStatuses'));
    }
}
