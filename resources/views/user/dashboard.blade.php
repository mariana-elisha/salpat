@extends('layouts.panel')

@section('title', 'My Dashboard')
@section('breadcrumbs', 'Guest / Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Luxury Welcome Banner --}}
    <div class="relative bg-navy rounded-[2rem] p-10 overflow-hidden shadow-2xl border border-white/5">
        <div class="absolute inset-0 bg-gradient-to-r from-gold/5 via-transparent to-gold/5 opacity-40"></div>
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-gold/10 rounded-full blur-[80px]"></div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-white/5 rounded-full blur-[80px]"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
            <div class="flex items-center gap-8">
                <div class="w-20 h-20 bg-gold rounded-[1.5rem] flex items-center justify-center text-white shadow-2xl shadow-gold/20 transform hover:scale-105 transition-transform duration-500">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-gold font-bold uppercase tracking-[0.4em] text-[10px] mb-2">Guest Sanctuary</h2>
                    <h1 class="text-4xl font-serif font-bold text-white">Welcome, {{ explode(' ', auth()->user()->name)[0] }}</h1>
                    <p class="text-slate-400 mt-2 font-light italic flex items-center gap-3">
                        <span class="w-8 h-px bg-gold/30"></span>
                        Managing your luxury stay at Salpat
                    </p>
                </div>
            </div>
            
            <div class="bg-white/5 backdrop-blur-3xl border border-white/10 rounded-[1.5rem] p-8 text-center min-w-[220px] shadow-2xl">
                <span class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.3em] block mb-3">Estate Balance</span>
                <div class="flex flex-col">
                    <span class="text-4xl font-serif font-bold text-white tracking-tight">${{ number_format($totalOwed, 2) }}</span>
                    <span class="text-gold text-[10px] font-bold mt-2 uppercase tracking-widest">{{ number_format($totalOwed * \App\Models\Room::USD_TO_TZS, 0) }} TZS</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Bookings -->
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-serif font-bold text-navy flex items-center gap-4">
                <span class="w-1 h-8 bg-gold rounded-full"></span>
                Room Reservations
            </h2>
            <a href="{{ route('rooms.index') }}" class="text-[10px] font-bold text-gold uppercase tracking-[0.2em] hover:text-navy transition-colors">Book Another Room →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($bookings as $booking)
                <div class="group bg-white rounded-[2rem] shadow-xl border border-slate-100 overflow-hidden hover:shadow-2xl transition-all duration-500 relative">
                    <div class="absolute top-0 left-0 w-2 h-full {{ $booking->status == 'confirmed' ? 'bg-gold' : 'bg-slate-200' }}"></div>
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h3 class="text-xl font-bold text-navy group-hover:text-gold transition-colors font-serif">
                                    {{ $booking->room->name }}
                                </h3>
                                <div class="flex items-center gap-3 mt-2">
                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest capitalize">{{ $booking->room->type }}</span>
                                    <span class="w-1 h-1 rounded-full bg-slate-200"></span>
                                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">{{ $booking->check_in->format('M d') }} — {{ $booking->check_out->format('M d, Y') }}</span>
                                </div>
                            </div>
                            <span class="px-3 py-1 text-[8px] font-bold rounded-full uppercase tracking-widest border
                                {{ $booking->status == 'confirmed' ? 'bg-gold/5 text-gold border-gold/20' : 'bg-slate-50 text-slate-500 border-slate-200' }}">
                                {{ $booking->status }}
                            </span>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 mb-6 flex items-center justify-between">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Booking Total</p>
                                <div class="flex items-baseline gap-2">
                                    <p class="text-3xl font-serif font-bold text-navy">${{ number_format($booking->total_price, 2) }}</p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase">{{ number_format($booking->total_price * \App\Models\Room::USD_TO_TZS, 0) }} TZS</p>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-gold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-2">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">ID: {{ $booking->booking_reference }}</span>
                            <a href="{{ route('bookings.show', $booking) }}" class="text-[10px] font-bold text-navy hover:text-gold transition-colors flex items-center gap-2 group/btn uppercase tracking-widest">
                                Manage Stay
                                <svg class="w-4 h-4 transform group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
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

    <!-- Feedback Section -->
    <div class="relative bg-navy rounded-[2rem] p-10 text-white overflow-hidden shadow-2xl border border-white/5">
        <div class="absolute inset-0 bg-gradient-to-r from-gold/5 via-transparent to-gold/5 opacity-30"></div>
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-10">
            <div>
                <h3 class="text-3xl font-serif font-bold mb-3">Impeccable Service?</h3>
                <p class="text-slate-400 max-w-md font-light italic">Your reflections help us refine the sanctuary experience.</p>
            </div>
            <a href="{{ route('feedback.create') }}" class="bg-gold hover:bg-gold/90 text-white px-10 py-5 rounded-xl font-bold uppercase tracking-[0.2em] transition-all shadow-2xl shadow-gold/10 text-[10px]">
                Share Your Experience
            </a>
        </div>
    </div>
</div>
@endsection