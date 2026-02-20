@extends('layouts.panel')

@section('title', 'My Dashboard')

@section('breadcrumbs', 'Guest / Dashboard')

@section('content')
    <div class="space-y-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl font-serif font-bold text-slate-900">Welcome, {{ auth()->user()->name }}</h1>
                <p class="text-slate-500">Manage your stay and services here.</p>
            </div>
            <div class="card p-4 bg-primary-600 text-white flex flex-col items-center justify-center min-w-[200px]">
                <span class="text-xs uppercase tracking-widest opacity-80">Total Owed</span>
                <span class="text-2xl font-bold">${{ number_format($totalOwed, 2) }}</span>
            </div>
        </div>

        <!-- Active Bookings -->
        <div class="space-y-4">
            <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                My Room Bookings
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($bookings as $booking)
                    <div class="card p-6 bg-white relative overflow-hidden group">
                        <div class="absolute top-0 right-0 p-4">
                            <span
                                class="px-2 py-1 text-xs font-bold rounded-full @if($booking->status == 'confirmed') bg-emerald-100 text-emerald-800 @else bg-yellow-100 text-yellow-800 @endif uppercase">
                                {{ $booking->status }}
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-1">{{ $booking->room->name }}</h3>
                        <p class="text-sm text-slate-500 mb-4">{{ $booking->check_in->format('M d') }} -
                            {{ $booking->check_out->format('M d, Y') }}</p>
                        <div class="flex justify-between items-center pt-4 border-t border-slate-50">
                            <span class="text-primary-600 font-bold">${{ number_format($booking->total_price, 2) }}</span>
                            <span class="text-xs text-slate-400">Ref: {{ $booking->booking_reference }}</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full card p-12 text-center text-slate-400 bg-white italic border-dashed">
                        You have no active bookings. <a href="{{ route('rooms.index') }}"
                            class="text-primary-600 hover:underline non-italic">Browse rooms now</a>.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Service Orders -->
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-accent-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Ordered Services
                </h2>
                <a href="{{ route('user.services.book') }}" class="btn-accent px-4 py-2 text-sm rounded-lg">Order
                    Service</a>
            </div>
            <div class="card bg-white overflow-hidden">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Service</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Qty</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase">Ordered</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($orders as $order)
                            <tr>
                                <td class="px-6 py-4">
                                    <span class="font-medium text-slate-900">{{ $order->service->name }}</span>
                                    <span class="text-xs text-slate-400 block lowercase">{{ $order->service->type }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">{{ $order->quantity }}</td>
                                <td class="px-6 py-4 text-sm font-bold text-slate-900">
                                    ${{ number_format($order->total_price, 2) }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-xs font-semibold px-2 py-1 rounded-full 
                                            @if($order->status == 'pending') bg-yellow-50 text-yellow-700 
                                            @elseif($order->status == 'completed') bg-emerald-50 text-emerald-700 
                                            @else bg-slate-100 text-slate-600 @endif uppercase">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right text-xs text-slate-400">
                                    {{ $order->requested_at->format('M d, H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-slate-400 italic">You haven't ordered any
                                    services yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection