<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StaffReport;
use App\Models\User;
use App\Notifications\SystemNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

class StaffReportController extends Controller
{
    /**
     * Display a listing of personal/sectional reports.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = StaffReport::with('user');

        // Managers and Admins can see all. Others see their own.
        if (!$user->isAdmin() && !$user->isManager()) {
            $query->where('user_id', $user->id);
        }

        // Filters
        if ($request->filled('type')) {
            $query->where('report_type', $request->type);
        }
        if ($request->filled('section')) {
            $query->where('section', $request->section);
        }

        if ($request->has('export')) {
            return $this->exportCsv($query->get(), 'Staff_Sectional_Reports');
        }

        $reports = $query->latest('report_date')->paginate(15);
        return view('staff_reports.index', compact('reports'));
    }

    /**
     * Export sectional reports to CSV.
     */
    protected function exportCsv($data, $filename)
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=" . $filename . "_" . date('Y-m-d') . ".csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Date', 'Title', 'Section', 'Author', 'Type', 'Content'];

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $report) {
                fputcsv($file, [
                    $report->report_date,
                    $report->title,
                    $report->section,
                    $report->user->name,
                    $report->report_type,
                    $report->content,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Show the form for creating a new report.
     */
    public function create()
    {
        $section = $this->getSectionFromRole(auth()->user()->role);
        return view('staff_reports.create', compact('section'));
    }

    /**
     * Store a newly created report.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'report_type' => 'required|in:daily,weekly,monthly,yearly',
            'report_date' => 'required|date|before_or_equal:today',
        ]);

        $section = $this->getSectionFromRole(auth()->user()->role);

        $report = StaffReport::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'content' => $validated['content'],
            'section' => $section,
            'report_type' => $validated['report_type'],
            'report_date' => $validated['report_date'],
        ]);

        // Notify Admin and Manager
        $staffToNotify = \App\Models\User::whereIn('role', ['admin', 'manager'])->get();
        \Illuminate\Support\Facades\Notification::send($staffToNotify, new \App\Notifications\SystemNotification(
            "New sectional report submitted for {$report->section} by " . auth()->user()->name,
            route('staff_reports.show', $report),
            'report'
        ));

        // Log the activity
        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Report Created',
            'description' => "{$section} staff created a {$validated['report_type']} report.",
        ]);

        return redirect()->route('staff_reports.index')->with('success', 'Report submitted successfully.');
    }

    /**
     * Display the specified report.
     */
    public function show(StaffReport $staffReport)
    {
        $user = auth()->user();

        // Authorization check
        if (!$user->isAdmin() && !$user->isManager() && $staffReport->user_id !== $user->id) {
            abort(403, 'Unauthorized.');
        }

        return view('staff_reports.show', compact('staffReport'));
    }

    /**
     * Map user roles to sections.
     */
    protected function getSectionFromRole($role)
    {
        return match ($role) {
            'admin' => 'Administrative',
            'manager' => 'Management',
            'receptionist' => 'Reception',
            'chef' => 'Kitchen',
            'barkeeper' => 'Bar',
            'housekeeping' => 'Housekeeping',
            default => 'General',
        };
    }
}
