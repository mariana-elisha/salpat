@extends('layouts.panel')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-slate-800 mb-8">Admin Dashboard</h1>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-sm font-medium text-slate-500">Total Rooms</div>
            <div class="text-3xl font-bold text-orange-600 mt-1">{{ $stats['rooms'] }}</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-sm font-medium text-slate-500">Total Bookings</div>
            <div class="text-3xl font-bold text-orange-600 mt-1">{{ $stats['bookings'] }}</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-sm font-medium text-slate-500">Pending Bookings</div>
            <div class="text-3xl font-bold text-amber-600 mt-1">{{ $stats['pending_bookings'] }}</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-sm font-medium text-slate-500">Total Users</div>
            <div class="text-3xl font-bold text-orange-600 mt-1">{{ $stats['users'] }}</div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mb-8 flex gap-4">
        <a href="{{ route('admin.bookings') }}" class="bg-orange-600 text-white px-6 py-2 rounded-md hover:bg-orange-700 font-medium">
            Manage Bookings
        </a>
        <a href="{{ route('rooms.index') }}" class="bg-slate-600 text-white px-6 py-2 rounded-md hover:bg-slate-700 font-medium">
            View Rooms
        </a>
    </div>

    <!-- Recent Bookings -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-slate-800">Recent Bookings</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Reference</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Room</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Guest</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Check-in</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($recentBookings as $booking)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4 text-sm font-medium text-orange-600">{{ $booking->booking_reference }}</td>
                            <td class="px-6 py-4 text-sm text-slate-900">{{ $booking->room->name }}</td>
                            <td class="px-6 py-4 text-sm text-slate-900">{{ $booking->guest_name }}</td>
                            <td class="px-6 py-4 text-sm text-slate-900">{{ $booking->check_in->format('M d, Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                    @if($booking->status == 'confirmed') bg-green-100 text-green-800
                                    @elseif($booking->status == 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                                    @else bg-slate-100 text-slate-800
                                    @endif">{{ ucfirst($booking->status) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('bookings.show', $booking) }}" class="text-orange-600 hover:text-orange-900 text-sm font-medium">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-500">No bookings yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-3 bg-slate-50 border-t">
            <a href="{{ route('admin.bookings') }}" class="text-orange-600 hover:text-orange-800 text-sm font-medium">View all bookings →</a>
        </div>
    </div>
</div>
@endsection
