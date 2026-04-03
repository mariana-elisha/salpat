<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display the reports dashboard.
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        // Ensure user has permission
        if (!$user || (!$user->isAdmin() && !$user->isReceptionist() && !$user->isManager())) {
            abort(403, 'Unauthorized.');
        }

        $type = $request->query('type', 'daily'); // Default to daily
        $date = $request->query('date', Carbon::today()->toDateString());
        $dateObj = Carbon::parse($date);

        $query = Booking::with(['room', 'user'])->latest();

        $title = '';
        switch ($type) {
            case 'daily':
                $query->whereDate('created_at', $dateObj);
                $title = 'Daily Report - ' . $dateObj->format('M d, Y');
                break;
            case 'weekly':
                $query->whereBetween('created_at', [
                    $dateObj->copy()->startOfWeek(),
                    $dateObj->copy()->endOfWeek()
                ]);
                $title = 'Weekly Report - ' . $dateObj->copy()->startOfWeek()->format('M d, Y') . ' to ' . $dateObj->copy()->endOfWeek()->format('M d, Y');
                break;
            case 'monthly':
                $query->whereMonth('created_at', $dateObj->month)
                    ->whereYear('created_at', $dateObj->year);
                $title = 'Monthly Report - ' . $dateObj->format('F Y');
                break;
            case 'yearly':
                $query->whereYear('created_at', $dateObj->year);
                $title = 'Yearly Report - ' . $dateObj->format('Y');
                break;
            default:
                $query->whereDate('created_at', Carbon::today());
                $title = 'Daily Report - ' . Carbon::today()->format('M d, Y');
        }

        if ($request->has('export')) {
            return $this->exportCsv($query->get(), $title);
        }

        $bookings = $query->paginate(20)->appends(['type' => $type, 'date' => $date]);

        // Calculate summaries
        $summary = [
            'total_bookings' => $bookings->total(),
            'total_revenue' => $query->whereIn('status', ['confirmed', 'completed'])->sum('total_price'),
            'pending_bookings' => (clone $query)->where('status', 'pending')->count(),
            'confirmed_bookings' => (clone $query)->where('status', 'confirmed')->count(),
            'completed_bookings' => (clone $query)->where('status', 'completed')->count(),
            'cancelled_bookings' => (clone $query)->where('status', 'cancelled')->count(),
        ];

        return view('reports.index', compact('bookings', 'type', 'date', 'title', 'summary'));
    }

    /**
     * Export reports to CSV.
     */
    protected function exportCsv($data, $filename)
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=" . str_replace(' ', '_', $filename) . ".csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Reference', 'Guest Name', 'Guest Email', 'Room', 'Check In', 'Check Out', 'Total Price', 'Status', 'Created At'];

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $booking) {
                fputcsv($file, [
                    $booking->booking_reference,
                    $booking->guest_name,
                    $booking->guest_email,
                    $booking->room->name,
                    $booking->check_in,
                    $booking->check_out,
                    $booking->total_price,
                    $booking->status,
                    $booking->created_at,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
