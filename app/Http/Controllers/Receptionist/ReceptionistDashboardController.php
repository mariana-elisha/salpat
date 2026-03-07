<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\ServiceOrder;

class ReceptionistDashboardController extends Controller
{
    /**
     * Display the receptionist dashboard.
     */
    public function index()
    {
        $stats = [
            'rooms' => Room::count('*'),
            'today_checkins' => Booking::whereDate('check_in', '=', today())->whereIn('status', ['pending', 'confirmed'])->count('*'),
            'today_checkouts' => Booking::whereDate('check_out', '=', today())->where('status', '=', 'confirmed')->count('*'),
            'pending_bookings' => Booking::where('status', '=', 'pending')->count('*'),
        ];

        $upcomingBookings = Booking::with('room')
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('check_in', '>=', today())
            ->orderBy('check_in')
            ->take(10)
            ->get();

        $recentActivity = \App\Models\ActivityLog::with('user')->whereIn('action', ['Booking Created', 'Booking Updated', 'Login'])->latest()->take(5)->get();
        $recentReports = \App\Models\StaffReport::with('user')->where('section', 'Reception')->latest()->take(5)->get();

        $staffActivity = \App\Models\ActivityLog::with('user')
            ->whereHas('user', function ($q) {
                $q->whereIn('role', ['housekeeping', 'barkeeper']);
            })
            ->latest()
            ->take(10)
            ->get();

        return view('receptionist.dashboard', compact('stats', 'upcomingBookings', 'recentActivity', 'recentReports', 'staffActivity'));
    }

    /**
     * Close Daily Transaction and generate report.
     */
    public function closeDailyTransaction()
    {
        $today = today();

        $todaysBookings = Booking::whereDate('created_at', '=', $today)
            ->sum('total_price');

        $todaysServices = ServiceOrder::whereDate('created_at', '=', $today)
            ->whereIn('status', ['confirmed', 'completed'])
            ->sum('total_price');

        $totalRevenue = $todaysBookings + $todaysServices;

        $content = "Daily Transaction Closed for " . $today->format('Y-m-d') . ".\n";
        $content .= "Total Booking Value (created today): $" . number_format($todaysBookings, 2) . "\n";
        $content .= "Total Service Orders (created today): $" . number_format($todaysServices, 2) . "\n";
        $content .= "Grand Total: $" . number_format($totalRevenue, 2) . "\n";

        \App\Models\StaffReport::create([
            'user_id' => auth()->id(),
            'title' => 'Daily Transaction Report - ' . $today->format('M d, Y'),
            'content' => $content,
            'section' => 'Reception',
            'report_type' => 'daily',
            'report_date' => $today,
        ]);

        return back()->with('success', 'Daily transaction closed and report submitted successfully.');
    }

    /**
     * Show the bill for a specific booking.
     */
    public function checkoutBill(Booking $booking)
    {
        $booking->load(['room', 'user']);

        // Use user_id and approximate date range for service orders if not strictly linked to a booking_id
        // In our current schema, service_orders has room_id and user_id. 
        // We'll filter by user and optionally room during the stay.
        $serviceOrders = ServiceOrder::with('service')
            ->where('user_id', $booking->user_id)
            ->where('status', '!=', 'cancelled')
            ->whereBetween('requested_at', [$booking->check_in, $booking->check_out->endOfDay()])
            ->get();

        $servicesTotal = $serviceOrders->sum('total_price');
        $grandTotal = $booking->total_price + $servicesTotal;

        return view('receptionist.billing.show', compact('booking', 'serviceOrders', 'servicesTotal', 'grandTotal'));
    }
}
