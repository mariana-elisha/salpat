<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\User;
use App\Notifications\SystemNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class GuestController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $bookings = $user->bookings()->with('room')->latest()->get();
        $orders = $user->serviceOrders()->with('service')->latest()->get();

        $totalOwed = $orders->where('status', '!=', 'cancelled')->sum('total_price');

        return view('user.dashboard', compact('bookings', 'orders', 'totalOwed'));
    }

    public function showBookingForm()
    {
        $services = Service::where('is_available', true)->get()->groupBy('type');
        $rooms = auth()->user()->bookings()->where('status', 'confirmed')->with('room')->get()->pluck('room');

        return view('user.book-service', compact('services', 'rooms'));
    }

    public function bookService(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'room_id' => 'nullable|exists:rooms,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $service = Service::find($request->service_id);

        $order = ServiceOrder::create([
            'user_id' => auth()->id(),
            'service_id' => $request->service_id,
            'room_id' => $request->room_id,
            'quantity' => $request->quantity,
            'total_price' => $service->price * $request->quantity,
            'status' => 'pending',
            'requested_at' => now(),
        ]);

        // Notify relevant staff
        $staffRoles = match ($service->type) {
            'food' => ['chef'],
            'drink' => ['barkeeper'],
            'cleaning' => ['housekeeping'],
            default => ['admin', 'manager']
        };

        $staffToNotify = User::whereIn('role', $staffRoles)->get();
        Notification::send($staffToNotify, new SystemNotification(
            "New {$service->type} order from " . auth()->user()->name . " (Room: " . ($order->room?->room_number ?? 'N/A') . ")",
            route(match ($service->type) {
                'food' => 'chef.dashboard',
                'drink' => 'barkeeper.dashboard',
                'cleaning' => 'housekeeping.dashboard',
                default => 'admin.dashboard'
            }),
            'order'
        ));

        return redirect()->route('user.dashboard')->with('success', 'Service booked successfully!');
    }
}
