@extends('layouts.panel')

@section('title', 'Chef Dashboard')
@section('breadcrumbs', 'Chef / Dashboard')

@section('content')
<div class="space-y-8" x-data="{ showAddModal: false, showUseModal: false, selectedItem: null, selectedItemName: '', selectedItemMax: 1 }">

    {{-- Premium Dark Welcome Banner --}}
    <div class="relative bg-slate-900 rounded-3xl p-8 overflow-hidden shadow-2xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-orange-600/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-red-600/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-orange-500/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
                <div>
                    <p class="text-orange-400 text-xs font-bold uppercase tracking-widest mb-1">Culinary Mastery</p>
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-white">Kitchen Operations</h1>
                    <p class="text-slate-400 mt-1 font-light">Precision cooking. Fresh ingredients. Exceptional flavors.</p>
                </div>
            </div>
            <div class="flex flex-col md:items-end gap-2 text-right">
                <p class="text-slate-500 text-[10px] uppercase tracking-[0.2em] font-bold italic">Station Status</p>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-white font-medium text-sm">Active & ready</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-orange-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-orange-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-orange-500/20 border border-orange-500/30 rounded-2xl flex items-center justify-center text-orange-400 group-hover:bg-orange-500 group-hover:text-white transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Queue Delay</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['pending_orders'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Pending</span></p>
                </div>
            </div>
        </div>
        
        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-red-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-red-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-red-500/20 border border-red-500/30 rounded-2xl flex items-center justify-center text-red-400 group-hover:bg-red-500 group-hover:text-white transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Kitchen Load</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['today_orders'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Total</span></p>
                </div>
            </div>
        </div>

        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-emerald-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-emerald-500/20 border border-emerald-500/30 rounded-2xl flex items-center justify-center text-emerald-400 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Efficiency Ratio</p>
                    <p class="text-3xl font-black text-white leading-none">{{ $stats['completed_orders'] }} <span class="text-sm font-medium text-slate-400 ml-1 italic">Done</span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- Orders Table --}}
    <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
            <h2 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                <span class="w-1.5 h-6 bg-orange-500 rounded-full shadow-[0_0_15px_rgba(249,115,22,0.5)]"></span>
                Active Food Orders
            </h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-800">
                <thead class="bg-slate-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Guest & Room</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Meal</th>
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
                                <span class="font-mono text-sm font-bold text-orange-400 bg-orange-500/10 border border-orange-500/20 px-2.5 py-1 rounded-lg">#{{ $order->id }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-600 rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0 shadow-lg">
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
                                <form action="{{ route('chef.orders.update', $order) }}" method="POST" class="inline-block">
                                    @csrf @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="rounded-xl border-slate-700 bg-slate-800 text-white text-sm focus:border-orange-500 focus:ring-orange-500 py-1.5 px-2 transition-all">
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
                                    <svg class="w-7 h-7 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                </div>
                                <p class="text-sm font-semibold text-slate-300 mb-1">No food orders</p>
                                <p class="text-xs text-slate-500">Orders will appear here when guests order meals.</p>
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
                        <p class="text-sm font-bold text-slate-200 group-hover:text-orange-400 transition-colors">{{ $report->title }}</p>
                        <p class="text-xs text-slate-500 mt-0.5">{{ \Carbon\Carbon::parse($report->report_date)->format('M d, Y') }} • <span class="capitalize">{{ $report->report_type }}</span></p>
                    </div>
                    <a href="{{ route('staff_reports.show', $report) }}" class="text-xs font-bold text-white bg-slate-800 hover:bg-slate-700 border border-slate-700 px-4 py-2 rounded-xl transition-all">View</a>
                </div>
            @empty
                <div class="px-6 py-10 text-center text-slate-500 text-sm italic">No reports submitted yet.</div>
            @endforelse
        </div>
    </div>

    {{-- Inventory Grid --}}
    <div id="inventory" class="scroll-mt-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white font-serif flex items-center gap-2">
                <span class="w-1.5 h-6 bg-orange-500 rounded-full shadow-[0_0_15px_rgba(249,115,22,0.5)]"></span>
                Kitchen Inventory
            </h2>
            <button @click="showAddModal = true" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2.5 px-6 rounded-xl shadow-lg shadow-orange-600/20 transition-all hover:-translate-y-0.5 flex items-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Item
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($inventoryItems ?? [] as $item)
                <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-orange-500/30 transition-all duration-300 relative overflow-hidden group">
                    <div class="absolute top-0 left-0 w-1 h-full {{ $item->quantity <= 5 ? 'bg-red-500 shadow-[0_0_10px_rgba(239,68,68,0.5)]' : 'bg-emerald-500 shadow-[0_0_10px_rgba(16,185,129,0.5)]' }}"></div>
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="font-bold text-lg text-white group-hover:text-orange-400 transition-colors line-clamp-1" title="{{ $item->name }}">{{ $item->name }}</h3>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">{{ $item->department }}</p>
                        </div>
                    </div>
                    <div class="flex items-end gap-2 mb-4">
                        <span class="text-3xl font-black {{ $item->quantity <= 5 ? 'text-red-400' : 'text-slate-200' }}">{{ $item->quantity }}</span>
                        <span class="text-sm font-bold text-slate-500 mb-1 pb-0.5">{{ $item->unit ?? 'units' }}</span>
                    </div>
                    <button @click="selectedItem = '{{ $item->id }}'; selectedItemName = '{{ str_replace('\'', '\\\'', $item->name) }}'; selectedItemMax = {{ $item->quantity }}; showUseModal = true"
                        class="w-full bg-slate-800 hover:bg-orange-500 text-white font-bold py-2.5 rounded-xl text-xs uppercase tracking-widest border border-slate-700 hover:border-orange-400 transition-all flex items-center justify-center gap-2"
                        {{ $item->quantity <= 0 ? 'disabled' : '' }}>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                        Record Usage
                    </button>
                </div>
            @empty
                <div class="col-span-full bg-slate-900/30 rounded-2xl border-2 border-dashed border-slate-800 p-12 text-center">
                    <svg class="w-10 h-10 text-slate-700 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <p class="text-slate-500 text-sm font-medium">No inventory items found.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Add Item Modal --}}
    <template x-if="showAddModal">
        <div class="fixed inset-0 z-[100] flex items-center justify-center px-4">
            <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm" @click="showAddModal = false"></div>
            <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-2xl w-full max-w-md relative z-10 overflow-hidden">
                <div class="bg-slate-800 p-6 text-white flex justify-between items-center border-b border-slate-700">
                    <h3 class="text-xl font-bold font-serif">Add Inventory Item</h3>
                    <button @click="showAddModal = false" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/5 hover:bg-white/10 text-slate-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form action="{{ route('chef.inventory.store') }}" method="POST" class="p-6">
                    @csrf
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Item Name</label>
                            <input type="text" name="name" required class="w-full rounded-xl border-slate-700 bg-slate-800 text-white placeholder-slate-500 focus:ring-orange-500 focus:border-orange-500 transition-all">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Initial Qty</label>
                                <input type="number" name="quantity" min="0" required class="w-full rounded-xl border-slate-700 bg-slate-800 text-white focus:ring-orange-500 focus:border-orange-500 transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Unit (eg. kg, pcs)</label>
                                <input type="text" name="unit" class="w-full rounded-xl border-slate-700 bg-slate-800 text-white placeholder-slate-600 focus:ring-orange-500 focus:border-orange-500 transition-all">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showAddModal = false" class="px-5 py-2.5 text-sm font-bold text-slate-400 hover:text-white transition-colors">Cancel</button>
                        <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg shadow-orange-600/20 transition-all">Save Item</button>
                    </div>
                </form>
            </div>
        </div>
    </template>

    {{-- Record Usage Modal --}}
    <template x-if="showUseModal">
        <div class="fixed inset-0 z-[100] flex items-center justify-center px-4">
            <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm" @click="showUseModal = false"></div>
            <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-2xl w-full max-w-md relative z-10 overflow-hidden">
                <div class="bg-slate-800 p-6 text-white flex justify-between items-center border-b border-slate-700">
                    <h3 class="text-xl font-bold font-serif">Record Usage</h3>
                    <button @click="showUseModal = false" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/5 hover:bg-white/10 text-slate-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form :action="'{{ url('chef/inventory') }}/' + selectedItem + '/use'" method="POST" class="p-6">
                    @csrf
                    <div class="mb-5 bg-orange-500/10 text-orange-400 p-4 rounded-2xl border border-orange-500/20 flex items-center gap-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-sm font-medium">Using <span class="font-black text-white" x-text="selectedItemName"></span>. Stock: <span class="text-white" x-text="selectedItemMax"></span></p>
                    </div>
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Quantity Used</label>
                            <input type="number" name="quantity" step="0.01" min="0.01" :max="selectedItemMax" required class="w-full text-2xl font-black py-4 text-center rounded-xl border-slate-700 bg-slate-800 text-white focus:ring-orange-500 focus:border-orange-500 transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Reason / Description</label>
                            <textarea name="description" rows="2" required class="w-full rounded-xl border-slate-700 bg-slate-800 text-white placeholder-slate-600 focus:ring-orange-500 focus:border-orange-500 transition-all" placeholder="e.g., Used for dinner service."></textarea>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showUseModal = false" class="px-5 py-2.5 text-sm font-bold text-slate-400 hover:text-white transition-colors">Cancel</button>
                        <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg shadow-orange-600/20 transition-all">Log Usage</button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>
@endsection