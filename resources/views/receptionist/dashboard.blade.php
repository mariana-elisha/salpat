@extends('layouts.panel')

@section('title', 'Receptionist Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-serif font-bold text-slate-800">Reception Dashboard</h1>
                <p class="text-slate-500 mt-1">Overview of today's activities and bookings</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('receptionist.rooms.index') }}"
                    class="bg-white text-slate-700 border border-slate-300 px-4 py-2 rounded-lg hover:bg-slate-50 font-medium transition shadow-sm">
                    Manage Rooms
                </a>
                <a href="{{ route('receptionist.bookings') }}"
                    class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 font-bold transition shadow-md flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    New Booking
                </a>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex flex-col justify-between">
                <div class="flex justify-between items-start">
                    <div class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Total Rooms</div>
                    <div class="p-2 bg-slate-100 rounded-lg text-slate-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-slate-800 mt-4">{{ $stats['rooms'] }}</div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex flex-col justify-between">
                <div class="flex justify-between items-start">
                    <div class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Check-ins</div>
                    <div class="p-2 bg-green-50 rounded-lg text-green-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-green-600 mt-4">{{ $stats['today_checkins'] }}</div>
                <div class="text-xs text-green-600 font-medium mt-1">Today</div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex flex-col justify-between">
                <div class="flex justify-between items-start">
                    <div class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Check-outs</div>
                    <div class="p-2 bg-red-50 rounded-lg text-red-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-slate-800 mt-4">{{ $stats['today_checkouts'] }}</div>
                <div class="text-xs text-slate-500 font-medium mt-1">Today</div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex flex-col justify-between">
                <div class="flex justify-between items-start">
                    <div class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Pending</div>
                    <div class="p-2 bg-amber-50 rounded-lg text-amber-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-amber-600 mt-4">{{ $stats['pending_bookings'] }}</div>
                <div class="text-xs text-amber-600 font-medium mt-1">Require Action</div>
            </div>
        </div>

        <!-- Upcoming Bookings -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <h2 class="text-lg font-bold text-slate-800">Upcoming Bookings</h2>
                <a href="{{ route('receptionist.bookings') }}"
                    class="text-sm font-semibold text-primary-600 hover:text-primary-700 hover:underline">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Reference</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Guest
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Room
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Check-in</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Status
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($upcomingBookings as $booking)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="font-mono text-sm font-semibold text-primary-600 bg-primary-50 px-2 py-1 rounded">{{ $booking->booking_reference }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-slate-900">{{ $booking->guest_name }}</div>
                                    <div class="text-xs text-slate-500">{{ $booking->email ?? 'No email' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                                    {{ $booking->room->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                                    <span class="font-medium">{{ $booking->check_in->format('M d') }}</span>,
                                    {{ $booking->check_in->format('Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-0.5 text-xs font-bold rounded-full uppercase tracking-wide
                                                            @if($booking->status == 'confirmed') bg-green-100 text-green-700
                                                            @elseif($booking->status == 'pending') bg-amber-100 text-amber-700
                                                            @elseif($booking->status == 'cancelled') bg-red-100 text-red-700
                                                            @else bg-slate-100 text-slate-700
                                                            @endif">{{ ucfirst($booking->status) }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('bookings.show', $booking) }}"
                                            class="text-slate-400 hover:text-primary-600 transition-colors"
                                            title="View Details">
                                            <span class="sr-only">View</span>
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        @if($booking->status === 'pending')
                                            <form action="{{ route('bookings.update-status', $booking) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="confirmed">
                                                <button type="submit"
                                                    class="text-emerald-500 hover:text-emerald-700 transition-colors"
                                                    title="Confirm Booking">
                                                    <span class="sr-only">Confirm</span>
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif

                                        @if($booking->status !== 'cancelled')
                                            <form action="{{ route('bookings.update-status', $booking) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to cancel this booking?');"
                                                class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="cancelled">
                                                <button type="submit" class="text-red-400 hover:text-red-600 transition-colors"
                                                    title="Cancel Booking">
                                                    <span class="sr-only">Cancel</span>
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                    No upcoming bookings found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection