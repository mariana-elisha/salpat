@extends('layouts.panel')

@section('title', 'Manager Dashboard')

@section('breadcrumbs', 'Manager / Dashboard')

@section('content')
    <div class="space-y-8">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="card p-6 flex items-center gap-4 bg-white">
                <div class="p-3 bg-primary-100 rounded-xl text-primary-600">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500">Total Bookings</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $stats['total_bookings'] }}</p>
                </div>
            </div>
            <div class="card p-6 flex items-center gap-4 bg-white">
                <div class="p-3 bg-emerald-100 rounded-xl text-emerald-600">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500">Checked-In Guests</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $stats['active_guests'] }}</p>
                </div>
            </div>
            <div class="card p-6 flex items-center gap-4 bg-white">
                <div class="p-3 bg-yellow-100 rounded-xl text-yellow-600">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500">Pending Orders</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $stats['pending_orders'] }}</p>
                </div>
            </div>
            <div class="card p-6 flex items-center gap-4 bg-white">
                <div class="p-3 bg-red-100 rounded-xl text-red-600">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500">Dirty Rooms</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $stats['dirty_rooms'] }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Bookings -->
            <div class="card bg-white overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-slate-900 font-serif">Recent Bookings</h3>
                    <span class="text-xs font-semibold text-primary-600 uppercase tracking-wider">Receptionist
                        Activity</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <tbody class="divide-y divide-slate-100">
                            @foreach($recentBookings as $booking)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                        {{ $booking->user?->name ?? $booking->guest_name ?? 'Guest' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $booking->room->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-600">{{ ucfirst($booking->status) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Service Orders -->
            <div class="card bg-white overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-slate-900 font-serif">Service Activity</h3>
                    <span class="text-xs font-semibold text-accent-600 uppercase tracking-wider">Bar / Chef /
                        Housekeeping</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <tbody class="divide-y divide-slate-100">
                            @foreach($recentOrders as $order)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="font-medium text-slate-900">{{ $order->service->name }}</span>
                                        <span class="text-xs text-slate-400 block">{{ ucfirst($order->service->type) }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $order->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <span
                                            class="text-xs font-medium text-slate-400">{{ $order->requested_at->diffForHumans() }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection