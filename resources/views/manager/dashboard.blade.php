@extends('layouts.panel')

@section('title', 'Manager Dashboard')
@section('breadcrumbs', 'Manager / Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Welcome Banner --}}
    {{-- Premium Dark Welcome Banner --}}
    <div class="relative bg-slate-900 rounded-3xl p-8 overflow-hidden shadow-2xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary-600/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-accent-600/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-primary-500/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8V4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-primary-400 text-xs font-bold uppercase tracking-widest mb-1">Central Intelligence</p>
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-white">Manager Overview</h1>
                    <p class="text-slate-400 mt-1 font-light">Complete oversight. Strategic control. Excellence achieved.</p>
                </div>
            </div>
            <div class="flex flex-col md:items-end gap-2 text-right">
                <p class="text-slate-500 text-[10px] uppercase tracking-[0.2em] font-bold">Real-time Pulse</p>
                <p class="text-white font-medium text-sm">{{ now()->format('l, F jS, Y') }}</p>
            </div>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-primary-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-primary-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-primary-500/20 border border-primary-500/30 rounded-2xl flex items-center justify-center text-primary-400 group-hover:bg-primary-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Total Impact</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['total_bookings'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Bookings</span></p>
                </div>
            </div>
        </div>

        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-emerald-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-emerald-500/20 border border-emerald-500/30 rounded-2xl flex items-center justify-center text-emerald-400 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Guest Traffic</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['active_guests'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">In-House</span></p>
                </div>
            </div>
        </div>

        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-amber-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-amber-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-amber-500/20 border border-amber-500/30 rounded-2xl flex items-center justify-center text-amber-400 group-hover:bg-amber-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Service Queue</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['pending_orders'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Waitflow</span></p>
                </div>
            </div>
        </div>

        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-red-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-red-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-red-500/20 border border-red-500/30 rounded-2xl flex items-center justify-center text-red-400 group-hover:bg-red-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Maintenance</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['dirty_rooms'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Dirty</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{-- Recent Bookings --}}
        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
                <h3 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-primary-500 rounded-full shadow-[0_0_15px_rgba(59,130,246,0.5)]"></span>
                    Recent Bookings
                </h3>
                <span class="text-[10px] font-bold text-primary-400 border border-primary-500/30 bg-primary-500/10 px-2 py-0.5 rounded-full uppercase tracking-widest">Front Desk Pulse</span>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-800">
                    <thead class="bg-slate-800/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Guest</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Room</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Payment</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-slate-400 uppercase tracking-widest">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-bold text-slate-400 uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        @foreach($recentBookings as $booking)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0 shadow-lg">
                                        {{ strtoupper(substr($booking->user?->name ?? $booking->guest_name ?? 'G', 0, 1)) }}
                                    </div>
                                    <span class="text-sm font-semibold text-white">{{ $booking->user?->name ?? $booking->guest_name ?? 'Guest' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="text-white font-bold">{{ $booking->room?->name ?? '—' }}</span>
                                @if($booking->room?->room_number)
                                    <span class="block text-[10px] text-primary-400 font-black uppercase tracking-widest mt-0.5">Room #{{ $booking->room->room_number }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-xs font-bold px-2.5 py-1 rounded-lg border {{ $booking->payment_status === 'paid' ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-rose-500/10 text-rose-400 border-rose-500/20' }}">
                                    {{ $booking->payment_status === 'paid' ? 'Paid' : 'Pending' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="px-2.5 py-1 text-xs font-bold rounded-lg bg-slate-800 text-slate-400 border border-slate-700">{{ ucfirst($booking->status) }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('bookings.show', $booking) }}" class="w-8 h-8 flex items-center justify-center rounded-lg bg-slate-800 hover:bg-primary-500 text-slate-400 hover:text-white transition-all shadow-lg" title="View Details">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    @if($booking->status === 'confirmed')
                                        <form action="{{ route('bookings.checkin', $booking) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-emerald-500/10 hover:bg-emerald-500 text-emerald-500 hover:text-white transition-all shadow-lg" title="Quick Check In">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 113-3h7a3 3 0 113 3v1"></path></svg>
                                            </button>
                                        </form>
                                    @endif
                                    @if($booking->status === 'checked_in')
                                        <form action="{{ route('bookings.checkout', $booking) }}" method="POST" onsubmit="return confirm('Confirm check out?');" class="inline-block">
                                            @csrf
                                            <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary-500/10 hover:bg-primary-500 text-primary-500 hover:text-white transition-all shadow-lg" title="Quick Check Out">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 113-3h4a3 3 0 113 3v1"></path></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Service Activity --}}
        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
                <h3 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-accent-500 rounded-full shadow-[0_0_15px_rgba(236,72,153,0.5)]"></span>
                    Service Activity
                </h3>
                <span class="text-[10px] font-bold text-accent-400 border border-accent-500/30 bg-accent-500/10 px-2 py-0.5 rounded-full uppercase tracking-widest">Venue Ops</span>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-800">
                    <thead class="bg-slate-800/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Service</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Guest</th>
                            <th class="px-6 py-3 text-right text-xs font-bold text-slate-400 uppercase tracking-widest">Time</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        @foreach($recentOrders as $order)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-bold text-white text-sm">{{ $order->service?->name ?? 'Order' }}</span>
                                <span class="text-[10px] text-slate-500 block uppercase tracking-tighter">{{ ucfirst($order->service?->type ?? 'Other') }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400 font-medium">{{ $order->user?->name ?? '—' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-[10px] font-bold text-slate-500 uppercase tracking-widest">{{ $order->requested_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- System Activity Log --}}
        <div class="lg:col-span-2 bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
                <h3 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-primary-500 rounded-full shadow-[0_0_15px_rgba(59,130,246,0.3)]"></span>
                    System Evolution
                </h3>
                <a href="{{ route('manager.activity_log.index') }}" class="text-[10px] font-bold text-slate-500 hover:text-white uppercase tracking-[0.2em] transition-colors">Explore All →</a>
            </div>
            <div class="divide-y divide-slate-800 overflow-y-auto max-h-[420px] custom-scrollbar">
                @forelse($recentActivity as $log)
                    <div class="p-5 hover:bg-white/5 transition-all flex items-start gap-4 border-l-2 border-transparent hover:border-primary-500">
                        <div class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-primary-400 shrink-0 text-sm font-black shadow-lg">
                            {{ strtoupper(substr($log->user?->name ?? '?', 0, 1)) }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-slate-200"><span class="font-bold text-white tracking-tight">{{ $log->user?->name ?? 'System' }}</span> <span class="text-slate-400 lowercase">{{ $log->action }}</span></p>
                            <p class="text-[11px] text-slate-500 leading-relaxed font-medium mt-1">{{ $log->description }}</p>
                        </div>
                        <p class="text-[9px] font-bold text-slate-600 uppercase tracking-tighter shrink-0 pt-1">{{ $log->created_at->diffForHumans() }}</p>
                    </div>
                @empty
                    <div class="py-20 text-center">
                         <div class="w-12 h-12 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-4 border border-slate-700">
                             <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                         </div>
                         <p class="text-slate-500 text-sm font-medium italic">No recent activity recorded.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="flex flex-col gap-8">
            {{-- Room Issues --}}
            <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden flex-1">
                <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
                    <h3 class="text-lg font-bold text-red-500 font-serif flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-red-600 rounded-full shadow-[0_0_15px_rgba(220,38,38,0.5)]"></span>
                        Strategic Alerts
                    </h3>
                </div>
                <div class="divide-y divide-slate-800">
                    @forelse($roomIssues ?? [] as $issue)
                        <div class="p-5 hover:bg-white/5 transition-all group border-l-4 border-red-600/50 hover:border-red-600">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[10px] font-black px-2 py-0.5 rounded bg-red-500/10 text-red-500 border border-red-500/20 uppercase tracking-widest">RM {{ $issue->room->name ?? '—' }}</span>
                                <span class="text-[9px] font-bold text-slate-500 uppercase">{{ \Carbon\Carbon::parse($issue->created_at)->diffForHumans() }}</span>
                            </div>
                            <p class="text-sm font-bold text-white group-hover:text-red-400 transition-colors leading-tight mb-2">{{ $issue->description }}</p>
                            <div class="flex justify-between items-center mt-3">
                                <span class="text-[10px] text-slate-500 font-medium">By {{ $issue->reporter->name ?? 'Staff' }}</span>
                                <form action="{{ route('manager.issues.resolve', $issue) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="text-[10px] text-white font-black hover:bg-emerald-600 bg-slate-800 px-3 py-1.5 rounded-lg border border-slate-700 transition-all uppercase tracking-tighter shadow-sm">Resolve</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="py-12 text-center text-slate-600 text-sm font-medium italic">No strategic alerts pending.</div>
                    @endforelse
                </div>
            </div>

            {{-- Staff Reports --}}
            <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden flex-1">
                <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
                    <h3 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-indigo-500 rounded-full shadow-[0_0_15px_rgba(79,70,229,0.5)]"></span>
                        Staff Reports
                    </h3>
                    <a href="{{ route('staff_reports.index') }}" class="text-[10px] font-bold text-slate-400 hover:text-white uppercase tracking-widest transition-colors">Review →</a>
                </div>
                <div class="divide-y divide-slate-800">
                    @forelse($recentReports as $report)
                        <a href="{{ route('staff_reports.show', $report) }}" class="block p-5 hover:bg-white/5 transition-all group">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[10px] font-black px-2 py-0.5 rounded bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 uppercase tracking-widest">{{ $report->section }}</span>
                                <span class="text-[9px] font-bold text-slate-500 uppercase">{{ \Carbon\Carbon::parse($report->report_date)->format('M d') }}</span>
                            </div>
                            <p class="text-sm font-bold text-white group-hover:text-indigo-400 transition-colors truncate">{{ $report->title }}</p>
                            <p class="text-[11px] text-slate-500 mt-2 flex justify-between items-center italic">
                                <span>Reported by {{ $report->user->name }}</span>
                                <span class="bg-slate-800 px-2 py-0.5 rounded border border-slate-700 not-italic text-[9px] font-bold uppercase">{{ $report->report_type }}</span>
                            </p>
                        </a>
                    @empty
                        <div class="py-12 text-center text-slate-600 text-sm font-medium italic">All reports reviewed.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection