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
            'rooms' => Room::count('*'),
            'total_bookings' => Booking::where('status', '=', 'confirmed')->count('*'),
            'pending_orders' => ServiceOrder::where('status', '=', 'pending')->count('*'),
            'dirty_rooms' => Room::where('housekeeping_status', '=', 'dirty')->count('*'),
            'pending_bookings' => Booking::where('status', '=', 'pending')->count('*'),
            'active_guests' => Booking::where('status', '=', 'confirmed')
                ->where('check_in', '<=', today())
                ->where('check_out', '>=', today())
                ->count('*'),
        ];

        $recentBookings = Booking::with('room', 'user')->latest()->take(5)->get();
        $recentOrders = ServiceOrder::with('service', 'user', 'room')->latest()->take(5)->get();
        $recentActivity = \App\Models\ActivityLog::with('user')->latest()->take(10)->get();
        $recentReports = \App\Models\StaffReport::with('user')->latest()->take(5)->get();
        $roomStatuses = Room::select('name', 'housekeeping_status', 'is_available')->get();

        return view('manager.dashboard', compact('stats', 'recentBookings', 'recentOrders', 'roomStatuses', 'recentActivity', 'recentReports'));
    }
}
