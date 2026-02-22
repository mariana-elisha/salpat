@extends('layouts.app')

@section('title', 'Reports | Salpat Camp')

@section('content')
    <div class="space-y-6 px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Booking Reports</h1>
                <p class="mt-1 text-sm text-slate-500">View performance metrics and booking data across time periods.</p>
            </div>

            <form method="GET" action="{{ route(auth()->user()->role . '.reports.index') }}"
                class="flex items-center gap-3">
                <select name="type" onchange="this.form.submit()" class="rounded-md border-slate-300 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    <option value="daily" {{ $type === 'daily' ? 'selected' : '' }}>Daily</option>
                    <option value="weekly" {{ $type === 'weekly' ? 'selected' : '' }}>Weekly</option>
                    <option value="monthly" {{ $type === 'monthly' ? 'selected' : '' }}>Monthly</option>
                    <option value="yearly" {{ $type === 'yearly' ? 'selected' : '' }}>Yearly</option>
                </select>

                <input type="date" name="date" value="{{ $date }}" onchange="this.form.submit()" class="rounded-md border-slate-300 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">

                <button type="button" onclick="window.print()" class="rounded-md bg-white border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 flex items-center gap-2">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                        </path>
                    </svg>
                    Print
                </button>

                <a href="{{ request()->fullUrlWithQuery(['export' => 1]) }}" class="rounded-md bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Export CSV
                </a>
            </form>
        </div>

        <h2 class="text-xl font-bold text-slate-800">{{ $title }}</h2>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="card p-6 border border-slate-200 bg-white shadow-sm overflow-hidden relative">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-primary-50 text-primary-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Bookings</p>
                        <p class="text-2xl font-bold text-slate-900">{{ $summary['total_bookings'] }}</p>
                    </div>
                </div>
            </div>

            <div class="card p-6 border border-slate-200 bg-white shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-accent-50 text-accent-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Revenue (Confirmed)</p>
                        <p class="text-2xl font-bold text-slate-900">${{ number_format($summary['total_revenue'], 2) }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="card p-6 border border-slate-200 bg-white shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-amber-50 text-amber-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Pending</p>
                        <p class="text-2xl font-bold text-slate-900">{{ $summary['pending_bookings'] }}</p>
                    </div>
                </div>
            </div>

            <div class="card p-6 border border-slate-200 bg-white shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-red-50 text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Cancelled</p>
                        <p class="text-2xl font-bold text-slate-900">{{ $summary['cancelled_bookings'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bookings Table -->
        <div class="card bg-white border border-slate-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/30">
                <h2 class="text-lg font-bold text-slate-800">Booking Details</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 text-[11px] font-bold uppercase tracking-widest border-b border-slate-100">
                            <th class="p-4">Reference</th>
                            <th class="p-4">Guest</th>
                            <th class="p-4">Room</th>
                            <th class="p-4">Dates</th>
                            <th class="p-4">Total Price</th>
                            <th class="p-4 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="p-4">
                                    <span class="font-bold text-slate-900">#{{ $booking->booking_reference }}</span>
                                </td>
                                <td class="p-4">
                                    <div class="text-sm">
                                        <div class="font-bold text-slate-800 text-sm">{{ $booking->guest_name }}</div>
                                        <div class="text-slate-500 text-xs">{{ $booking->guest_email }}</div>
                                    </div>
                                </td>
                                <td class="p-4 text-sm text-slate-600 font-medium">
                                    {{ $booking->room?->name ?? 'N/A' }}
                                </td>
                                <td class="p-4">
                                    <div class="text-xs text-slate-600 space-y-0.5">
                                        <div class="flex items-center gap-1.5 font-medium">
                                            <span class="text-slate-400">IN:</span> {{ \Carbon\Carbon::parse($booking->check_in)->format('M d, Y') }}
                                        </div>
                                        <div class="flex items-center gap-1.5 font-medium">
                                            <span class="text-slate-400">OUT:</span> {{ \Carbon\Carbon::parse($booking->check_out)->format('M d, Y') }}
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 text-sm font-bold text-primary-600">
                                    ${{ number_format($booking->total_price, 2) }}
                                </td>
                                <td class="p-4 text-right">
                                    @if($booking->status === 'pending')
                                        <span class="inline-flex rounded-full bg-amber-50 px-2.5 py-0.5 text-xs font-bold text-amber-700 uppercase">Pending</span>
                                    @elseif($booking->status === 'confirmed')
                                        <span class="inline-flex rounded-full bg-primary-50 px-2.5 py-0.5 text-xs font-bold text-primary-700 uppercase">Confirmed</span>
                                    @elseif($booking->status === 'cancelled')
                                        <span class="inline-flex rounded-full bg-red-50 px-2.5 py-0.5 text-xs font-bold text-red-700 uppercase">Cancelled</span>
                                    @else
                                        <span class="inline-flex rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-bold text-emerald-700 uppercase">Completed</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-12 text-center text-slate-400">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 mb-4 text-slate-200" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
                                        </svg>
                                        <p class="text-lg font-bold text-slate-300">No bookings found for this period.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($bookings->hasPages())
                <div class="p-4 border-t border-slate-100 bg-slate-50/20">
                    {{ $bookings->links() }}
                </div>
            @endif
        </div>
    </div>

    <style>
        @media print {
            body {
                background: white;
            }

            .btn,
            nav,
            aside,
            form>select,
            form>input[type="date"],
            form>button {
                display: none !important;
            }

            .card {
                box-shadow: none !important;
                border: 1px solid #e5e7eb;
            }

            main {
                margin-left: 0 !important;
                padding: 0 !important;
            }
        }
    </style>
@endsection