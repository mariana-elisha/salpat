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

        return view('chef.dashboard', compact('orders', 'recentReports'));
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
}