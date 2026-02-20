<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class HousekeepingController extends Controller
{
    public function index()
    {
        $dirtyRooms = Room::where('housekeeping_status', '!=', 'clean')->get();

        $orders = ServiceOrder::with(['service', 'user', 'room'])
            ->whereHas('service', function ($query) {
                $query->where('type', 'housekeeping');
            })
            ->where('status', '!=', 'completed')
            ->orderBy('requested_at', 'desc')
            ->get();

        return view('housekeeping.dashboard', compact('dirtyRooms', 'orders'));
    }

    public function updateRoomStatus(Room $room, Request $request)
    {
        $request->validate([
            'status' => 'required|in:clean,dirty,cleaning_in_progress'
        ]);

        $room->update(['housekeeping_status' => $request->status]);

        return back()->with('success', 'Room status updated successfully.');
    }

    public function updateOrderStatus(ServiceOrder $order, Request $request)
    {
        $request->validate([
            'status' => 'required|in:confirmed,cancelled,completed'
        ]);

        $order->update(['status' => $request->status]);

        return back()->with('success', 'Order status updated successfully.');
    }
}
