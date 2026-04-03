@extends('layouts.panel')

@section('title', 'Housekeeping Inventory')
@section('breadcrumbs', 'Housekeeping / Inventory')

@section('content')
<div class="space-y-8" x-data="{ showAddModal: false, showUseModal: false, selectedItem: null, selectedItemName: '', selectedItemMax: 1 }">

    {{-- Header --}}
    <div class="flex justify-between items-center bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <div>
            <h1 class="text-2xl font-serif font-bold text-slate-900">Inventory Management</h1>
            <p class="text-slate-500 text-sm mt-1">Track cleaning supplies, amenities, and linens.</p>
        </div>
        <button @click="showAddModal = true" class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-sm transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New Item
        </button>
    </div>

    {{-- Inventory Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($items as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="absolute top-0 left-0 w-1 h-full {{ $item->quantity <= 5 ? 'bg-red-500' : 'bg-emerald-500' }}"></div>
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-bold text-lg text-slate-900 group-hover:text-primary-700 transition-colors line-clamp-1" title="{{ $item->name }}">{{ $item->name }}</h3>
                        <p class="text-xs text-slate-400 capitalize">{{ $item->department }}</p>
                    </div>
                </div>
                <div class="flex items-end gap-2 mb-4">
                    <span class="text-3xl font-black {{ $item->quantity <= 5 ? 'text-red-600' : 'text-slate-700' }}">{{ $item->quantity }}</span>
                    <span class="text-sm font-bold text-slate-500 mb-1 pb-0.5">{{ $item->unit ?? 'units' }}</span>
                </div>
                <button @click="selectedItem = '{{ $item->id }}'; selectedItemName = '{{ str_replace("'", "\'", $item->name) }}'; selectedItemMax = {{ $item->quantity }}; showUseModal = true"
                    class="w-full bg-slate-50 hover:bg-primary-50 text-primary-700 font-bold py-2 rounded-xl text-sm border border-slate-200 hover:border-primary-200 transition-colors flex items-center justify-center gap-2"
                    {{ $item->quantity <= 0 ? 'disabled' : '' }}>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                    Record Usage
                </button>
            </div>
        @empty
            <div class="col-span-full bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 p-12 text-center">
                <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                <p class="text-slate-500 font-medium">No inventory items found.</p>
                <button @click="showAddModal = true" class="text-primary-600 font-bold hover:underline mt-2">Add the first item</button>
            </div>
        @endforelse
    </div>

    {{-- Add Item Modal --}}
    <template x-if="showAddModal">
        <div class="fixed inset-0 z-[100] flex items-center justify-center px-4">
            <div class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm" @click="showAddModal = false"></div>
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md relative z-10 overflow-hidden">
                <div class="bg-primary-600 p-6 text-white flex justify-between items-center">
                    <h3 class="text-xl font-bold font-serif">Add Inventory Item</h3>
                    <button @click="showAddModal = false" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form action="{{ route('housekeeping.inventory.store') }}" method="POST" class="p-6">
                    @csrf
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Item Name</label>
                            <input type="text" name="name" required class="w-full rounded-xl border-slate-200 bg-slate-50 focus:ring-primary-500 focus:border-primary-500">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Initial Qty</label>
                                <input type="number" name="quantity" min="0" required class="w-full rounded-xl border-slate-200 bg-slate-50 focus:ring-primary-500 focus:border-primary-500">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">Unit (eg. bottles, pcs)</label>
                                <input type="text" name="unit" class="w-full rounded-xl border-slate-200 bg-slate-50 focus:ring-primary-500 focus:border-primary-500">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showAddModal = false" class="px-5 py-2.5 text-sm font-bold text-slate-500 hover:text-slate-700">Cancel</button>
                        <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg transition-colors">Save Item</button>
                    </div>
                </form>
            </div>
        </div>
    </template>

    {{-- Record Usage Modal --}}
    <template x-if="showUseModal">
        <div class="fixed inset-0 z-[100] flex items-center justify-center px-4">
            <div class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm" @click="showUseModal = false"></div>
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md relative z-10 overflow-hidden">
                <div class="bg-slate-900 p-6 text-white flex justify-between items-center">
                    <h3 class="text-xl font-bold font-serif">Record Usage</h3>
                    <button @click="showUseModal = false" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <form :action="'{{ url('housekeeping/inventory') }}/' + selectedItem + '/use'" method="POST" class="p-6">
                    @csrf
                    <div class="mb-5 bg-primary-50 text-primary-800 p-3 rounded-xl border border-primary-100 flex items-center gap-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-sm font-medium">Using <span class="font-black" x-text="selectedItemName"></span>. Current stock: <span x-text="selectedItemMax"></span></p>
                    </div>
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Quantity Used</label>
                            <input type="number" name="quantity" step="0.01" min="0.01" :max="selectedItemMax" required class="w-full text-lg font-bold py-3 text-center rounded-xl border-slate-200 bg-slate-50 focus:ring-primary-500 focus:border-primary-500">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Reason / Description</label>
                            <textarea name="description" rows="2" required class="w-full rounded-xl border-slate-200 bg-slate-50 focus:ring-primary-500 focus:border-primary-500" placeholder="e.g., Replaced towels in Room 101."></textarea>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showUseModal = false" class="px-5 py-2.5 text-sm font-bold text-slate-500 hover:text-slate-700">Cancel</button>
                        <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg transition-colors">Log Usage</button>
                    </div>
                </form>
            </div>
        </div>
    </template>

</div>
@endsection
