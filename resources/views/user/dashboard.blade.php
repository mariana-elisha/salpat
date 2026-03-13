@extends('layouts.panel')

@section('title', 'My Dashboard')
@section('breadcrumbs', 'Guest / Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Premium Dark Welcome Banner --}}
    <div class="relative bg-slate-900 rounded-3xl p-8 overflow-hidden shadow-2xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -top-16 -right-16 w-48 h-48 bg-primary-500 rounded-full blur-3xl opacity-10"></div>
        <div class="absolute -bottom-16 -left-16 w-48 h-48 bg-accent-500 rounded-full blur-3xl opacity-10"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-primary-500/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <p class="text-accent-400 text-xs font-black uppercase tracking-[0.3em] mb-1">Guest Portal</p>
                    <h1 class="text-3xl font-serif font-bold text-white">Welcome back, {{ explode(' ', auth()->user()->name)[0] }}</h1>
                    <p class="text-slate-400 mt-1 font-light italic">Manage your stay and adventure at Salpat Camp.</p>
                </div>
            </div>
            
            <div class="bg-slate-800/50 backdrop-blur-xl border border-white/10 rounded-2xl p-6 text-center min-w-[200px] shadow-inner">
                <span class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] block mb-2">Current Balance</span>
                <div class="flex flex-col">
                    <span class="text-3xl font-black text-white">${{ number_format($totalOwed, 2) }}</span>
                    <span class="text-accent-400 text-xs font-bold mt-1">{{ number_format($totalOwed * \App\Models\Room::USD_TO_TZS, 0) }} TZS</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Active Bookings --}}
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold text-slate-900 font-serif flex items-center gap-2">
                <span class="w-1.5 h-6 bg-primary-500 rounded-full"></span>
                My Room Bookings
            </h2>
            <a href="{{ route('rooms.index') }}" class="text-xs font-bold text-primary-600 bg-primary-50 hover:bg-primary-100 px-3 py-1.5 rounded-lg transition-colors">Browse Rooms →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($bookings as $booking)
                <div class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl transition-all duration-300 relative">
                    <div class="absolute top-0 left-0 w-1.5 h-full {{ $booking->status == 'confirmed' ? 'bg-emerald-500' : 'bg-amber-400' }}"></div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-primary-600 transition-colors">
                                    {{ $booking->room->name }}
                                    @if($booking->room->room_number)
                                        <span class="text-accent-500 text-xs ml-2 font-black">#{{ $booking->room->room_number }}</span>
                                    @endif
                                </h3>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs text-slate-400 capitalize">{{ $booking->room->type }}</span>
                                    <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                    <span class="text-xs text-slate-500 font-medium">{{ $booking->check_in->format('M d') }} — {{ $booking->check_out->format('M d, Y') }}</span>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 text-[10px] font-black rounded-full uppercase tracking-wider
                                {{ $booking->status == 'confirmed' ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : 'bg-amber-100 text-amber-800 border border-amber-200' }}">
                                {{ $booking->status }}
                            </span>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 mb-5 flex items-center justify-between">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Booking Amount</p>
                                <div class="flex items-baseline gap-2">
                                    <p class="text-2xl font-black text-slate-900">${{ number_format($booking->total_price, 2) }}</p>
                                    <p class="text-xs text-slate-400 font-medium italic">~{{ number_format($booking->total_price * \App\Models\Room::USD_TO_TZS, 0) }} TZS</p>
                                </div>
                            </div>
                            <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-primary-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-2">
                            <span class="font-mono text-[10px] font-bold text-slate-400 bg-slate-100 px-2 py-0.5 rounded uppercase leading-none tracking-tighter">REF: {{ $booking->booking_reference }}</span>
                            <a href="{{ route('bookings.show', $booking) }}" class="text-xs font-bold text-primary-600 hover:text-primary-700 transition-colors flex items-center gap-1 group/btn">
                                Details
                                <svg class="w-3.5 h-3.5 transform group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-2xl border-2 border-dashed border-slate-200 p-16 text-center">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <p class="font-semibold text-slate-700 mb-2">No active bookings</p>
                    <a href="{{ route('rooms.index') }}" class="text-primary-600 font-bold hover:underline text-sm">Browse available rooms →</a>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Service Orders --}}
    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-slate-900 font-serif flex items-center gap-2">
                <span class="w-1.5 h-6 bg-accent-500 rounded-full"></span>
                Ordered Services
            </h2>
            <a href="{{ route('user.services.book') }}" class="inline-flex items-center gap-2 bg-accent-500 hover:bg-accent-600 text-white px-4 py-2 rounded-xl text-sm font-bold transition-all shadow-lg shadow-accent-500/30 hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                Order Service
            </a>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <table class="min-w-full divide-y divide-slate-100">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Service</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Qty</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-bold text-slate-400 uppercase tracking-widest">Ordered</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($orders as $order)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4">
                                <span class="font-semibold text-slate-900">{{ $order->service->name }}</span>
                                <span class="text-xs text-slate-400 block lowercase">{{ $order->service->type }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $order->quantity }}</td>
                            <td class="px-6 py-4 text-sm font-black text-slate-900">
                                <div>${{ number_format($order->total_price, 2) }}</div>
                                <div class="text-[10px] text-slate-400 font-bold uppercase">{{ number_format($order->total_price * \App\Models\Service::USD_TO_TZS, 0) }} TZS</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-bold px-3 py-1 rounded-full
                                    @if($order->status == 'pending') bg-amber-100 text-amber-700
                                    @elseif($order->status == 'completed') bg-emerald-100 text-emerald-700
                                    @else bg-slate-100 text-slate-600 @endif uppercase">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right text-xs text-slate-400">{{ $order->requested_at->format('M d, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-slate-400 text-sm italic">You haven't ordered any services yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Feedback Section --}}
    <div class="relative bg-slate-900 rounded-2xl p-8 text-white overflow-hidden shadow-xl">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -top-12 -right-12 w-40 h-40 bg-accent-500 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute top-0 right-0 p-8 opacity-10">
            <svg class="w-28 h-28" fill="currentColor" viewBox="0 0 24 24"><path d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg>
        </div>
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <h3 class="text-2xl font-serif font-bold mb-2">How's your stay?</h3>
                <p class="text-slate-400 max-w-md font-light">We value your feedback. Let us know how we can make your experience even better.</p>
            </div>
            <a href="{{ route('feedback.create') }}" class="inline-flex items-center gap-2 bg-accent-500 hover:bg-accent-600 text-white px-8 py-4 rounded-2xl font-bold shadow-xl shadow-accent-500/30 transition-all hover:-translate-y-0.5 shrink-0">
                Write a Comment
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
            </a>
        </div>
    </div>
</div>
@endsection