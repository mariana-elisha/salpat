@extends('layouts.panel')

@section('title', 'Receptionist Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Welcome Banner + Actions --}}
    {{-- Premium Dark Welcome Banner --}}
    <div class="relative bg-slate-900 rounded-3xl p-8 overflow-hidden shadow-2xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary-600/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-accent-600/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-primary-500/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <p class="text-primary-400 text-xs font-bold uppercase tracking-widest mb-1">Front Desk Excellence</p>
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-white">Reception Operations</h1>
                    <p class="text-slate-400 mt-1 font-light">Warm welcomes. Efficient check-ins. Premium hospitality.</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-3">
                <form action="{{ route('receptionist.daily-transaction') }}" method="POST"
                    onsubmit="return confirm('Close the daily transaction and submit to manager?');">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg transition-all hover:-translate-y-0.5 text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Close Daily
                    </button>
                </form>
                <a href="{{ route('receptionist.rooms.index') }}"
                    class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 backdrop-blur border border-white/20 text-white px-5 py-2.5 rounded-xl font-bold transition-all hover:-translate-y-0.5 text-sm">
                    Manage Rooms
                </a>
                <a href="{{ route('receptionist.bookings') }}"
                    class="inline-flex items-center gap-2 bg-white text-primary-700 hover:bg-primary-50 px-5 py-2.5 rounded-xl font-bold shadow-lg transition-all hover:-translate-y-0.5 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    New Booking
                </a>
            </div>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-amber-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-amber-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-amber-500/20 border border-amber-500/30 rounded-2xl flex items-center justify-center text-amber-400 group-hover:bg-amber-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Today's Intake</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['today_bookings'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Bookings</span></p>
                </div>
            </div>
        </div>
        
        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-orange-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-orange-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-orange-500/20 border border-orange-500/30 rounded-2xl flex items-center justify-center text-orange-400 group-hover:bg-orange-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Arrivals</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['pending_checkins'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Expect</span></p>
                </div>
            </div>
        </div>

        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-blue-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-blue-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-blue-500/20 border border-blue-500/30 rounded-2xl flex items-center justify-center text-blue-400 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Departures</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['pending_checkouts'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Expect</span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- Bookings Table --}}
    <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
            <h2 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                <span class="w-1.5 h-6 bg-amber-500 rounded-full shadow-[0_0_15px_rgba(245,158,11,0.5)]"></span>
                Recent Bookings
            </h2>
            <a href="{{ route('receptionist.bookings') }}" class="text-xs font-bold text-primary-600 hover:text-primary-700 uppercase tracking-widest">View All →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-800">
                <thead class="bg-slate-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Guest</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Room</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Dates</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-bold text-slate-400 uppercase tracking-widest">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse($recentBookings as $booking)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-300">#{{ $booking->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-9 w-9 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center text-white text-xs font-bold uppercase shadow-lg">
                                        {{ strtoupper(substr($booking->user?->name ?? $booking->guest_name ?? 'G', 0, 1)) }}
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-semibold text-white">{{ $booking->user?->name ?? $booking->guest_name ?? 'Guest' }}</div>
                                        <div class="text-xs text-slate-400">{{ $booking->user?->email ?? $booking->guest_email ?? '—' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="text-white font-bold">{{ $booking->room?->name ?? '—' }}</span>
                                @if($booking->room?->room_number)
                                    <span class="block text-[10px] text-primary-400 font-black uppercase tracking-widest mt-0.5">Room #{{ $booking->room->room_number }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">
                                {{ $booking->check_in ? \Carbon\Carbon::parse($booking->check_in)->format('M d') : '—' }} - {{ $booking->check_out ? \Carbon\Carbon::parse($booking->check_out)->format('M d, Y') : '—' }}
                                @if($booking->check_in && $booking->check_out)
                                    <span class="block text-xs text-slate-500">{{ \Carbon\Carbon::parse($booking->check_in)->diffInDays($booking->check_out) }} nights</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                    @if($booking->status == 'confirmed') bg-emerald-500/10 text-emerald-400 border border-emerald-500/20
                                    @elseif($booking->status == 'pending') bg-amber-500/10 text-amber-500 border border-amber-500/20
                                    @elseif($booking->status == 'cancelled') bg-red-500/10 text-red-400 border border-red-500/20
                                    @else bg-slate-800 text-slate-400 border border-slate-700 @endif">{{ ucfirst($booking->status) }}</span>
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full mt-1
                                    @if($booking->payment_status == 'paid') bg-emerald-500/10 text-emerald-400 border border-emerald-500/20
                                    @else bg-rose-500/10 text-rose-400 border border-rose-500/20 @endif">{{ ucfirst($booking->payment_status ?? 'Pending') }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('bookings.show', $booking) }}" class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-100 hover:bg-primary-100 text-slate-500 hover:text-primary-600 transition-colors" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    {{-- Quick Check In --}}
                                    @if($booking->status === 'confirmed')
                                        <form action="{{ route('bookings.checkin', $booking) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-emerald-500/10 hover:bg-emerald-500 text-emerald-500 hover:text-white transition-all" title="Check In">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                                            </button>
                                        </form>
                                    @endif

                                    {{-- Quick Check Out --}}
                                    @if($booking->status === 'checked_in')
                                        <form action="{{ route('bookings.checkout', $booking) }}" method="POST" onsubmit="return confirm('Confirm check out?');" class="inline-block">
                                            @csrf
                                            <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary-500/10 hover:bg-primary-500 text-primary-500 hover:text-white transition-all" title="Check Out">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                            </button>
                                        </form>
                                    @endif

                                    @if($booking->status === 'pending')
                                        <form action="{{ route('bookings.update-status', $booking) }}" method="POST" class="inline-block">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="status" value="confirmed">
                                            <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-emerald-50 hover:bg-emerald-500 text-emerald-500 hover:text-white transition-colors" title="Confirm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            </button>
                                        </form>
                                    @endif
                                    @if($booking->status !== 'cancelled' && $booking->status !== 'completed' && $booking->status !== 'checked_in')
                                        <form action="{{ route('bookings.update-status', $booking) }}" method="POST" onsubmit="return confirm('Cancel this booking?');" class="inline-block">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="status" value="cancelled">
                                            <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 hover:bg-red-500 text-red-400 hover:text-white transition-colors" title="Cancel">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="w-14 h-14 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-7 h-7 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                </div>
                                <p class="text-sm font-semibold text-slate-700 mb-1">No upcoming bookings</p>
                                <p class="text-xs text-slate-400">Bookings will appear here when created.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection