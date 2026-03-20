<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use App\Notifications\SystemNotification;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index()
    {
        $orders = ServiceOrder::with(['service', 'user', 'room'])
            ->whereHas('service', function ($query) {
                $query->where('type', 'food');
            })
            ->where('status', '!=', 'completed')
            ->orderBy('requested_at', 'asc')
            ->get();

        $recentReports = \App\Models\StaffReport::where('user_id', auth()->id())->latest()->take(5)->get();

        $inventoryItems = \App\Models\InventoryItem::where('department_id', auth()->id())
            ->orWhere('department', 'kitchen')
            ->get();

        return view('chef.dashboard', compact('orders', 'recentReports', 'inventoryItems'));
    }

    public function updateStatus(ServiceOrder $order, Request $request)
    {
        $request->validate([
            'status' => 'required|in:confirmed,cancelled,completed'
        ]);

        $order->update(['status' => $request->status]);

        // Notify the Guest
        if ($order->user) {
            $order->user->notify(new SystemNotification(
                "Your food order (#{$order->id}) status has been updated to " . ucfirst($request->status),
                route('user.dashboard'),
                'order'
            ));
        }

        return back()->with('success', 'Order status updated successfully.');
    }

    public function inventory()
    {
        $items = \App\Models\InventoryItem::where('department_id', auth()->id())
            ->orWhere('department', 'kitchen')
            ->get();
        return view('chef.inventory', compact('items'));
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
            'department' => 'kitchen',
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