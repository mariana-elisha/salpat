@extends('layouts.panel')

@section('title', 'Bar Keeper Dashboard')
@section('breadcrumbs', 'Bar Keeper / Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Welcome Banner --}}
    {{-- Premium Dark Welcome Banner --}}
    <div class="relative bg-slate-900 rounded-3xl p-8 overflow-hidden shadow-2xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-violet-600/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-indigo-600/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-gradient-to-br from-violet-500 to-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-violet-500/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
                <div>
                    <p class="text-violet-400 text-xs font-bold uppercase tracking-widest mb-1">Cellar & Spirit</p>
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-white">Bar Management</h1>
                    <p class="text-slate-400 mt-1 font-light">Exquisite drinks. Premium atmosphere. Masterful service.</p>
                </div>
            </div>
            <div class="flex flex-col md:items-end gap-2">
                <div class="text-right mt-2">
                    <p class="text-slate-500 text-[10px] uppercase tracking-[0.2em] font-bold">Today's Ledger</p>
                    <p class="text-white font-medium text-sm">{{ now()->format('l, F jS, Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-violet-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-violet-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-violet-500/20 border border-violet-500/30 rounded-2xl flex items-center justify-center text-violet-400 group-hover:bg-violet-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Drink Queue</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['pending_orders'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Pending</span></p>
                </div>
            </div>
        </div>
        
        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-indigo-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-indigo-500/20 border border-indigo-500/30 rounded-2xl flex items-center justify-center text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Volume Output</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['today_orders'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Total</span></p>
                </div>
            </div>
        </div>

        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-emerald-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-emerald-500/20 border border-emerald-500/30 rounded-2xl flex items-center justify-center text-emerald-400 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Service Index</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['completed_orders'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Done</span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- Orders Table --}}
    <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
            <h2 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                <span class="w-1.5 h-6 bg-violet-500 rounded-full shadow-[0_0_15px_rgba(139,92,246,0.5)]"></span>
                Active Drink Orders
            </h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-800">
                <thead class="bg-slate-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Guest & Room</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Drink</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Qty</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Time</th>
                        <th class="px-6 py-3 text-right text-xs font-bold text-slate-400 uppercase tracking-widest">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse($orders as $order)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-mono text-sm font-bold text-violet-400 bg-violet-500/10 border border-violet-500/20 px-2.5 py-1 rounded-lg">#{{ $order->id }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-violet-400 to-violet-700 rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0 shadow-lg">
                                        {{ strtoupper(substr($order->user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-white">{{ $order->user->name }}</div>
                                        <div class="text-xs text-slate-400">{{ $order->room ? $order->room->name : 'N/A' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-slate-200">{{ $order->service->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">
                                <span class="bg-slate-800 text-slate-200 font-bold px-2.5 py-1 rounded-lg border border-slate-700">× {{ $order->quantity }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 text-xs font-bold rounded-full
                                    @if($order->status == 'pending') bg-amber-500/10 text-amber-500 border border-amber-500/20
                                    @elseif($order->status == 'confirmed') bg-blue-500/10 text-blue-400 border border-blue-500/20
                                    @elseif($order->status == 'completed') bg-emerald-500/10 text-emerald-400 border border-emerald-500/20
                                    @else bg-red-500/10 text-red-400 border border-red-500/20 @endif">{{ ucfirst($order->status) }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $order->requested_at->diffForHumans() }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <form action="{{ route('barkeeper.orders.update', $order) }}" method="POST" class="inline-block">
                                    @csrf @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="rounded-xl border-slate-700 bg-slate-800 text-white text-sm focus:border-violet-500 focus:ring-violet-500 py-1.5 px-2 transition-all">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Done</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancel</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @if($order->comment)
                            <tr class="bg-amber-500/5">
                                <td colspan="7" class="px-6 py-2">
                                    <div class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-amber-500/70 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                                        <span class="text-xs font-medium text-slate-400 italic">"{{ $order->comment }}"</span>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="w-14 h-14 bg-slate-800/50 rounded-full flex items-center justify-center mx-auto mb-3 border border-slate-700">
                                    <svg class="w-7 h-7 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <p class="text-sm font-semibold text-slate-300 mb-1">No drink orders</p>
                                <p class="text-xs text-slate-500">Orders will appear here when guests request drinks.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Recent Reports --}}
    <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
            <h2 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                <span class="w-1.5 h-6 bg-red-500 rounded-full shadow-[0_0_15px_rgba(239,68,68,0.5)]"></span>
                My Recent Reports
            </h2>
            <a href="{{ route('staff_reports.index') }}" class="text-xs font-bold text-slate-400 hover:text-white uppercase tracking-widest transition-colors">View All →</a>
        </div>
        <div class="divide-y divide-slate-800">
            @forelse($recentReports ?? [] as $report)
                <div class="px-6 py-4 flex justify-between items-center hover:bg-white/5 transition-colors group">
                    <div>
                        <p class="text-sm font-bold text-slate-200 group-hover:text-violet-400 transition-colors">{{ $report->title }}</p>
                        <p class="text-xs text-slate-500 mt-0.5">{{ \Carbon\Carbon::parse($report->report_date)->format('M d, Y') }} • <span class="capitalize">{{ $report->report_type }}</span></p>
                    </div>
                    <a href="{{ route('staff_reports.show', $report) }}" class="text-xs font-bold text-white bg-slate-800 hover:bg-slate-700 border border-slate-700 px-4 py-2 rounded-xl transition-all">View</a>
                </div>
            @empty
                <div class="px-6 py-10 text-center text-slate-500 text-sm italic">No reports submitted yet.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection