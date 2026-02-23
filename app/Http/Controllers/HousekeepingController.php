<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\ServiceOrder;
use App\Notifications\SystemNotification;
use Illuminate\Http\Request;

class HousekeepingController extends Controller
{
    public function index()
    {
        $allRooms = Room::all();

        $orders = ServiceOrder::with(['service', 'user', 'room'])
            ->whereHas('service', function ($query) {
                $query->where('type', 'housekeeping');
            })
            ->where('status', '!=', 'completed')
            ->orderBy('requested_at', 'asc')
            ->get();

        $recentReports = \App\Models\StaffReport::where('user_id', auth()->id())->latest()->take(5)->get();

        return view('housekeeping.dashboard', compact('orders', 'allRooms', 'recentReports'));
    }

    public function updateRoomStatus(Room $room, Request $request)
    {
        $request->validate([
            'status' => 'required|in:clean,dirty,cleaning_in_progress'
        ]);

        $isAvailable = $request->status === 'clean';
        $room->update([
            'housekeeping_status' => $request->status,
            'is_available' => $isAvailable
        ]);

        return back()->with('success', 'Room status updated successfully.');
    }

    public function updateOrderStatus(ServiceOrder $order, Request $request)
    {
        $request->validate([
            'status' => 'required|in:confirmed,cancelled,completed'
        ]);

        $order->update(['status' => $request->status]);

        // Notify the Guest
        if ($order->user) {
            $order->user->notify(new SystemNotification(
                "Your housekeeping request status has been updated to " . ucfirst($request->status),
                route('user.dashboard'),
                'order'
            ));
        }

        return back()->with('success', 'Order status updated successfully.');
    }
}
