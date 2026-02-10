@extends('layouts.panel')

@section('title', 'Dashboard')

@section('breadcrumbs', 'Overview')

@section('content')
    <div class="space-y-6">
        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            {{-- Total Rooms --}}
            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium text-slate-500">Total Rooms</dt>
                                <dd class="text-3xl font-bold text-slate-900">{{ $totalRooms ?? 0 }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Bookings --}}
            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium text-slate-500">Total Bookings</dt>
                                <dd class="text-3xl font-bold text-slate-900">{{ $totalBookings ?? 0 }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pending Bookings --}}
            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium text-slate-500">Pending</dt>
                                <dd class="text-3xl font-bold text-slate-900">{{ $pendingBookings ?? 0 }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Users --}}
            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium text-slate-500">Total Users</dt>
                                <dd class="text-3xl font-bold text-slate-900">{{ $totalUsers ?? 0 }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Bookings --}}
        <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="border-b border-slate-200 bg-white px-6 py-4">
                <h3 class="text-lg font-semibold leading-6 text-slate-900">Recent Bookings</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Booking ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Guest</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Room</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Check-in</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Total</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-slate-500">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse($recentBookings ?? [] as $booking)
                            <tr class="hover:bg-slate-50">
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-900">
                                    #{{ $booking->id }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    {{ $booking->user->name ?? 'N/A' }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    {{ $booking->room->name ?? 'N/A' }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    {{ $booking->check_in ? \Carbon\Carbon::parse($booking->check_in)->format('M d, Y') : 'N/A' }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm">
                                    @if ($booking->status === 'confirmed')
                                        <span
                                            class="inline-flex rounded-full bg-emerald-100 px-2 text-xs font-semibold leading-5 text-emerald-800">Confirmed</span>
                                    @elseif($booking->status === 'pending')
                                        <span
                                            class="inline-flex rounded-full bg-amber-100 px-2 text-xs font-semibold leading-5 text-amber-800">Pending</span>
                                    @elseif($booking->status === 'cancelled')
                                        <span
                                            class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">Cancelled</span>
                                    @else
                                        <span
                                            class="inline-flex rounded-full bg-slate-100 px-2 text-xs font-semibold leading-5 text-slate-800">{{ ucfirst($booking->status) }}</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-semibold text-slate-900">
                                    ${{ number_format($booking->total_price ?? 0, 2) }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                    <a href="{{ route('bookings.show', $booking) }}"
                                        class="text-primary-600 hover:text-primary-900">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-slate-500">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-semibold text-slate-900">No bookings found</h3>
                                    <p class="mt-1 text-sm text-slate-500">Get started by creating a new booking.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="border-t border-slate-200 px-6 py-4 bg-slate-50">
                <a href="{{ route('admin.bookings') }}"
                    class="text-sm font-semibold leading-6 text-primary-600 hover:text-primary-500">View all bookings <span
                        aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </div>

    {{-- Quick Links --}}
    <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <a href="{{ route('admin.rooms.index') }}"
            class="relative block rounded-lg border border-slate-300 bg-white px-6 py-5 shadow-sm hover:border-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-primary-50">
                        <svg class="h-6 w-6 text-primary-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg>
                    </span>
                </div>
                <div class="min-w-0 flex-1">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    <p class="text-sm font-medium text-slate-900">Manage Rooms</p>
                    <p class="truncate text-sm text-slate-500">Add, edit, or remove rooms</p>
                </div>
            </div>
        </a>
    </div>
@endsection