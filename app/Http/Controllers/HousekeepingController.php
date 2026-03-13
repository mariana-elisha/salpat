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
        $dirtyRoomsCount = \App\Models\Room::where('housekeeping_status', 'dirty')->count();
        $allRooms = \App\Models\Room::orderBy('room_number')->get();

        $orders = \App\Models\ServiceOrder::with(['service', 'user', 'room'])
            ->whereHas('service', function ($query) {
                $query->where('type', 'cleaning')
                      ->orWhere('type', 'maintenance');
            })
            ->where('status', '!=', 'completed')
            ->orderBy('requested_at', 'asc')
            ->get();

        $recentReports = \App\Models\StaffReport::where('user_id', auth()->id())->latest()->take(5)->get();

        $inventoryItems = \App\Models\InventoryItem::where('department_id', auth()->id())
            ->orWhere('department', 'housekeeping')
            ->get();

        return view('housekeeping.dashboard', compact('dirtyRoomsCount', 'allRooms', 'orders', 'recentReports', 'inventoryItems'));
    }

    public function consultReceptionist(Request $request, Room $room)
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        $receptionists = \App\Models\User::where('role', 'receptionist')->get();
        $sender = auth()->user();

        foreach ($receptionists as $receptionist) {
            $receptionist->notify(new \App\Notifications\SystemNotification(
                "Housekeeping Consultation regarding Room " . ($room->room_number ?? $room->name) . ": " . $request->message,
                route('receptionist.dashboard'),
                'consultation'
            ));
        }

        return back()->with('success', 'Consultation message sent to Receptionist.');
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

    public function reportIssue(Room $room, Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
        ]);

        $issue = \App\Models\RoomIssue::create([
            'room_id' => $room->id,
            'reporter_id' => auth()->id(),
            'description' => $request->description,
            'status' => 'pending',
        ]);

        // Notify Managers
        $managers = \App\Models\User::where('role', 'manager')->get();
        foreach ($managers as $manager) {
            $manager->notify(new \App\Notifications\SystemNotification(
                "New issue reported in Room {$room->name} by " . auth()->user()->name,
                route('manager.dashboard'), // Managers will see this on dashboard
                'warning'
            ));
        }

        return back()->with('success', 'Room issue reported successfully to management.');
    }

    public function inventory()
    {
        $items = \App\Models\InventoryItem::where('department_id', auth()->id())
            ->orWhere('department', 'housekeeping')
            ->get();
        return view('housekeeping.inventory', compact('items'));
    }

    public function storeInventory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'unit' => 'nullable|string|max:50',
            'unit_price' => 'nullable|numeric|min:0',
        ]);

        \App\Models\InventoryItem::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'unit_price' => $request->unit_price,
            'department_id' => auth()->id(),
            'department' => 'housekeeping',
        ]);

        return back()->with('success', 'Item added to inventory.');
    }

    public function useInventory(Request $request, \App\Models\InventoryItem $item)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:0.01|max:' . $item->quantity,
            'description' => 'required|string|max:500',
        ]);

        $item->decrement('quantity', $request->quantity);

        \App\Models\InventoryTransaction::create([
            'inventory_item_id' => $item->id,
            'user_id' => auth()->id(),
            'type' => 'out',
            'quantity' => $request->quantity,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Inventory usage recorded successfully.');
    }
}
