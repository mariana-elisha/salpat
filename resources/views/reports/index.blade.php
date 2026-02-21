@extends('layouts.app')

@section('title', 'Reports | Salpat Camp')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Reports</h1>
                <p class="mt-1 text-sm text-gray-500">View your booking reports across different time periods.</p>
            </div>

            <form method="GET" action="{{ route(auth()->user()->role . '.reports.index') }}"
                class="flex items-center gap-3">
                <select name="type" onchange="this.form.submit()" class="form-input py-2">
                    <option value="daily" {{ $type === 'daily' ? 'selected' : '' }}>Daily</option>
                    <option value="weekly" {{ $type === 'weekly' ? 'selected' : '' }}>Weekly</option>
                    <option value="monthly" {{ $type === 'monthly' ? 'selected' : '' }}>Monthly</option>
                    <option value="yearly" {{ $type === 'yearly' ? 'selected' : '' }}>Yearly</option>
                </select>

                <input type="date" name="date" value="{{ $date }}" onchange="this.form.submit()" class="form-input py-2">

                <button type="button" onclick="window.print()" class="btn btn-secondary py-2 px-4 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                        </path>
                    </svg>
                    Print
                </button>
            </form>
        </div>

        <!-- Summary Cards -->
        <h2 class="text-xl font-semibold text-gray-800">{{ $title }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="card p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total Bookings</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $summary['total_bookings'] }}</p>
                    </div>
                </div>
            </div>

            <div class="card p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Revenue (Confirmed)</p>
                        <p class="text-2xl font-semibold text-gray-900">${{ number_format($summary['total_revenue'], 2) }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="card p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Pending</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $summary['pending_bookings'] }}</p>
                    </div>
                </div>
            </div>

            <div class="card p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Cancelled</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $summary['cancelled_bookings'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bookings Table -->
        <div class="card overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Booking Details</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wider">
                            <th class="p-4 font-medium">Reference</th>
                            <th class="p-4 font-medium">Guest</th>
                            <th class="p-4 font-medium">Room</th>
                            <th class="p-4 font-medium">Dates</th>
                            <th class="p-4 font-medium">Total Price</th>
                            <th class="p-4 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4">
                                    <span class="font-medium text-gray-900">{{ $booking->booking_reference }}</span>
                                </td>
                                <td class="p-4">
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-900">{{ $booking->guest_name }}</div>
                                        <div class="text-gray-500">{{ $booking->guest_email }}</div>
                                    </div>
                                </td>
                                <td class="p-4 text-sm text-gray-600">
                                    {{ $booking->room->name }}
                                </td>
                                <td class="p-4">
                                    <div class="text-sm text-gray-600">
                                        <div>In: {{ \Carbon\Carbon::parse($booking->check_in)->format('M d, Y') }}</div>
                                        <div>Out: {{ \Carbon\Carbon::parse($booking->check_out)->format('M d, Y') }}</div>
                                    </div>
                                </td>
                                <td class="p-4 text-sm font-medium text-gray-900">
                                    ${;{ number_format($booking->total_price, 2) }}
                                </td>
                                <td class="p-4">
                                    @if($booking->status === 'pending')
                                        <span class="badge bg-yellow-100 text-yellow-800">Pending</span>
                                    @elseif($booking->status === 'confirmed')
                                        <span class="badge bg-blue-100 text-blue-800">Confirmed</span>
                                    @elseif($booking->status === 'cancelled')
                                        <span class="badge bg-red-100 text-red-800">Cancelled</span>
                                    @else
                                        <span class="badge bg-green-100 text-green-800">Completed</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 mb-4 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
                                        </svg>
                                        <p class="text-lg font-medium">No bookings found for this period.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($bookings->hasPages())
                <div class="p-4 border-t border-gray-200">
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