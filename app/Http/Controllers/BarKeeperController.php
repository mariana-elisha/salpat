<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class BarKeeperController extends Controller
{
    public function index()
    {
        $orders = ServiceOrder::with(['service', 'user', 'room'])
            ->whereHas('service', function ($query) {
                $query->where('type', 'drink');
            })
            ->where('status', '!=', 'completed')
            ->orderBy('requested_at', 'asc')
            ->get();

        return view('barkeeper.dashboard', compact('orders'));
    }

    public function updateStatus(ServiceOrder $order, Request $request)
    {
        $request->validate([
            'status' => 'required|in:confirmed,cancelled,completed'
        ]);

        $order->update(['status' => $request->status]);

        return back()->with('success', 'Order status updated successfully.');
    }
}