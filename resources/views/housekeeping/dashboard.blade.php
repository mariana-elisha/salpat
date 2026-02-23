@extends('layouts.panel')

@section('title', 'Housekeeping Dashboard')

@section('breadcrumbs', 'Housekeeping / Dashboard')

@section('content')
    <div class="space-y-8">
        <!-- Room Status Section -->
        <!-- Room Status Section -->
        <div class="space-y-4">
            <h2 class="text-2xl font-serif font-bold text-slate-900">Room Availability Status</h2>
            <p class="text-sm text-slate-600 mb-4">Mark rooms as ready for guests or report them as occupied/needing attention.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($allRooms as $room)
                    <div
                        class="card p-6 bg-white border-l-4 @if($room->housekeeping_status == 'clean' && $room->is_available) border-emerald-500 @elseif($room->housekeeping_status == 'dirty') border-red-500 @else border-yellow-500 @endif">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900">{{ $room->name }}</h3>
                                <p class="text-sm text-slate-500 lowercase">{{ $room->type }}</p>
                            </div>
                            <span
                                class="px-2 py-1 text-xs font-semibold rounded-full @if($room->housekeeping_status == 'clean' && $room->is_available) bg-emerald-100 text-emerald-800 @elseif($room->housekeeping_status == 'dirty') bg-red-100 text-red-800 @else bg-yellow-100 text-yellow-800 @endif">
                                @if($room->housekeeping_status == 'clean' && $room->is_available)
                                    Available
                                @elseif($room->housekeeping_status == 'clean' && !$room->is_available)
                                    Booked (Clean)
                                @else
                                    {{ str_replace('_', ' ', $room->housekeeping_status) }}
                                @endif
                            </span>
                        </div>

                        <form action="{{ route('housekeeping.rooms.update', $room) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="flex gap-2">
                                <select name="status"
                                    class="flex-1 rounded-lg border-slate-300 text-sm focus:border-primary-500 focus:ring-primary-500 py-1.5">
                                    <option value="clean" {{ $room->housekeeping_status == 'clean' ? 'selected' : '' }}>Available for booking</option>
                                    <option value="dirty" {{ $room->housekeeping_status == 'dirty' ? 'selected' : '' }}>Occupied / Dirty (Unavailable)</option>
                                    <option value="cleaning_in_progress" {{ $room->housekeeping_status == 'cleaning_in_progress' ? 'selected' : '' }}>Cleaning in Progress</option>
                                </select>
                                <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg text-xs px-4 py-1.5 transition-colors">Apply</button>
                            </div>
                        </form>
                    </div>
                @empty
                    <div class="col-span-full p-12 card text-center text-slate-500 bg-slate-50 italic border border-dashed border-slate-200">
                        No rooms found in the system.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Housekeeping Orders Section -->
        <div class="space-y-4">
            <h2 class="text-2xl font-serif font-bold text-slate-900">Service Requests</h2>
            <div class="card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                    Request ID</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                    Guest & Room</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                    Service</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                    Time</th>
                                <th
                                    class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            @forelse($orders as $order)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">#{{ $order->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                                        <div>{{ $order->user->name }}</div>
                                        <div class="text-xs text-slate-400">Room:
                                            {{ $order->room ? $order->room->name : 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 font-semibold">
                                        {{ $order->service->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($order->status == 'pending') bg-yellow-100 text-yellow-800 
                                                @elseif($order->status == 'confirmed') bg-primary-100 text-primary-800 
                                                @elseif($order->status == 'completed') bg-emerald-100 text-emerald-800 
                                                @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                        {{ $order->requested_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('housekeeping.orders.update', $order) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()"
                                                class="rounded-lg border-slate-300 text-sm focus:border-primary-500 focus:ring-primary-500 py-1">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>
                                                    Confirm</option>
                                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                                    Done</option>
                                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                                    Cancel</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-slate-400 italic">No service requests
                                        found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

        <!-- Recent Reports -->
        <div class="mt-10 bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-accent-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    My Recent Reports
                </h2>
                <a href="{{ route('staff_reports.index') }}" class="text-xs font-bold text-accent-600 hover:text-accent-700 uppercase underline">View All</a>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse($recentReports ?? [] as $report)
                    <div class="px-6 py-4 flex justify-between items-center hover:bg-slate-50 transition-colors">
                        <div>
                            <p class="text-sm font-bold text-slate-900">{{ $report->title }}</p>
                            <p class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($report->report_date)->format('M d, Y') }} • <span class="capitalize">{{ $report->report_type }}</span></p>
                        </div>
                        <a href="{{ route('staff_reports.show', $report) }}" class="text-primary-600 hover:text-primary-700 font-semibold text-sm">View Details</a>
                    </div>
@empty
                    <div class="px-6 py-10 text-center text-slate-400 text-sm italic">You haven't submitted any reports yet.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection