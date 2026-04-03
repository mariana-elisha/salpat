@extends('layouts.panel')

@section('title', 'Reservation Registry')
@section('breadcrumbs', 'Bookings / Global Index')

@section('content')
<div class="space-y-8">
    {{-- Header Banner --}}
    <div class="relative bg-slate-900 rounded-3xl p-8 overflow-hidden shadow-xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -top-16 -right-16 w-48 h-48 bg-emerald-500 rounded-full blur-3xl opacity-10"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <p class="text-emerald-400 text-[10px] font-bold uppercase tracking-[0.4em] mb-2 text-center md:text-left">Reservation System</p>
                <h1 class="text-3xl font-serif font-bold text-white text-center md:text-left">Reservation Registry</h1>
                <p class="text-slate-400 mt-2 font-light text-sm text-center md:text-left italic">The heartbeat of Salpat's daily hospitality flow.</p>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('bookings.create', 1) }}"
                   class="bg-emerald-600 hover:bg-emerald-500 text-white px-6 py-3 rounded-xl font-bold uppercase tracking-widest text-[10px] transition-all shadow-lg active:scale-95 flex items-center gap-2">
                    <i class="fas fa-plus"></i>
                    New Reservation
                </a>
            </div>
        </div>
    </div>

    {{-- Premium Table --}}
    <div class="bg-slate-900/40 backdrop-blur-xl rounded-[2rem] border border-slate-800 shadow-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-800">
                <thead class="bg-slate-900/50">
                    <tr>
                        <th scope="col" class="px-6 py-5 text-left text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Ref ID</th>
                        <th scope="col" class="px-6 py-5 text-left text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Guest Resident</th>
                        <th scope="col" class="px-6 py-5 text-left text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Chamber</th>
                        <th scope="col" class="px-6 py-5 text-left text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Duration</th>
                        <th scope="col" class="px-6 py-5 text-left text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Registry Status</th>
                        <th scope="col" class="px-6 py-5 text-left text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Valuation</th>
                        <th scope="col" class="px-6 py-5 text-right text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Operations</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/50">
                    @forelse($bookings as $booking)
                        <tr class="group hover:bg-white/[0.02] transition-colors">
                            <td class="px-6 py-6 whitespace-nowrap">
                                <span class="text-xs font-black text-primary-400 font-mono">#{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td class="px-6 py-6 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-[10px] font-bold text-slate-400">
                                        {{ strtoupper(substr($booking->user->name ?? '?', 0, 1)) }}
                                    </div>
                                    <div class="text-sm font-bold text-white tracking-tight">{{ $booking->user->name ?? 'N/A' }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-6 whitespace-nowrap">
                                <span class="text-xs text-slate-400 font-medium">{{ $booking->room->name ?? 'N/A' }}</span>
                            </td>
                            <td class="px-6 py-6 whitespace-nowrap">
                                <div class="text-[10px] font-bold text-white uppercase tracking-tighter">
                                    {{ $booking->check_in ? \Carbon\Carbon::parse($booking->check_in)->format('d M') : '?' }} 
                                    <i class="fas fa-arrow-right mx-1 text-slate-700"></i> 
                                    {{ $booking->check_out ? \Carbon\Carbon::parse($booking->check_out)->format('d M, Y') : '?' }}
                                </div>
                            </td>
                            <td class="px-6 py-6 whitespace-nowrap">
                                @php
                                    $statusClasses = [
                                        'confirmed' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                                        'pending' => 'bg-amber-500/10 text-amber-400 border-amber-500/20',
                                        'cancelled' => 'bg-red-500/10 text-red-400 border-red-500/20',
                                        'completed' => 'bg-primary-500/10 text-primary-400 border-primary-500/20',
                                    ];
                                    $currentClass = $statusClasses[$booking->status] ?? 'bg-slate-500/10 text-slate-400 border-slate-500/20';
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border {{ $currentClass }}">
                                    {{ $booking->status }}
                                </span>
                            </td>
                            <td class="px-6 py-6 whitespace-nowrap">
                                <div class="text-sm font-black text-white">${{ number_format($booking->total_price ?? 0, 0) }}</div>
                                <div class="text-[9px] text-slate-500 font-bold uppercase">{{ number_format(($booking->total_price ?? 0) * \App\Models\Room::USD_TO_TZS, 0) }} TZS</div>
                            </td>
                            <td class="px-6 py-6 whitespace-nowrap text-right text-xs font-medium">
                                <div class="flex flex-col items-end gap-2">
                                    <a href="{{ route('bookings.show', $booking) }}"
                                       class="text-primary-400 hover:text-primary-300 font-bold tracking-widest uppercase text-[9px]">Details <i class="fas fa-chevron-right ml-1"></i></a>
                                    
                                    @auth
                                        @if(auth()->user()->isReceptionist())
                                            <a href="{{ route('receptionist.bookings.bill', $booking) }}"
                                               class="bg-accent-500/10 hover:bg-accent-500 text-accent-400 hover:text-white px-3 py-1 rounded border border-accent-500/20 text-[8px] font-black uppercase tracking-widest transition-all">Checkout</a>
                                        @endif

                                        @if(auth()->user()->isAdmin() || auth()->user()->isReceptionist())
                                            <div class="flex gap-1">
                                                @if($booking->status === 'pending')
                                                    <form action="{{ route('bookings.update-status', $booking) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="confirmed">
                                                        <button type="submit" class="p-1.5 rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 hover:bg-emerald-500 hover:text-white transition-all">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                                @if($booking->status !== 'cancelled' && $booking->status !== 'completed')
                                                    <form action="{{ route('bookings.update-status', $booking) }}" method="POST"
                                                          onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="cancelled">
                                                        <button type="submit" class="p-1.5 rounded bg-red-500/10 text-red-400 border border-red-500/20 hover:bg-red-500 hover:text-white transition-all">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-20 text-center">
                                <div class="w-16 h-16 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-700 border border-slate-700">
                                    <i class="fas fa-calendar-times text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-serif text-slate-500 italic">Registry Empty</h3>
                                <p class="text-[9px] text-slate-600 font-bold uppercase tracking-widest mt-2">No reservations found in the current period.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($bookings->hasPages())
            <div class="px-6 py-4 bg-slate-900/60 border-t border-slate-800">
                {{ $bookings->links() }}
            </div>
        @endif
    </div>
</div>
@endsection