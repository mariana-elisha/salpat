@extends('layouts.panel')

@section('title', 'Book a Service')

@section('breadcrumbs', 'Guest / Book Service')

@section('content')
    <div class="max-w-4xl mx-auto space-y-8">
        <div class="text-center py-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-50 text-primary-600 text-[10px] font-black uppercase tracking-widest mb-4">
                <span class="w-1.5 h-1.5 rounded-full bg-primary-500 animate-pulse"></span>
                Concierge Services
            </div>
            <h1 class="text-4xl font-serif font-bold text-slate-900 tracking-tight">Request a Service</h1>
            <p class="text-slate-500 mt-3 font-light">Food, spirits, or housekeeping. Our team is at your command.</p>
        </div>

        <form action="{{ route('user.services.store') }}" method="POST" class="space-y-8"
            x-data="{ selectedService: null, quantity: 1, price: 0, conversionRate: {{ \App\Models\Service::USD_TO_TZS }} }">
            @csrf

            <!-- Room Selection (if confirmed bookings exist) -->
            @if($rooms->isNotEmpty())
                <div class="card p-6 bg-white shadow-md">
                    <h2 class="text-lg font-bold text-slate-900 mb-4 border-b border-slate-50 pb-2">1. Delivery Location</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($rooms as $room)
                            <label
                                class="relative flex p-4 cursor-pointer focus:outline-none rounded-xl border-2 transition-all duration-300"
                                :class="room_id == {{ $room->id }} ? 'border-primary-500 bg-primary-50 ring-2 ring-primary-500' : 'border-slate-100 hover:border-slate-200'">
                                <input type="radio" name="room_id" value="{{ $room->id }}" class="sr-only" x-model="room_id">
                                <div class="flex flex-col">
                                    <span class="text-slate-900 font-bold">{{ $room->name }}</span>
                                    <span class="text-slate-500 text-xs">{{ $room->type }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Service Tabs -->
            <div x-data="{ activeTab: 'food' }" class="space-y-6">
                <div class="flex gap-2 p-1 bg-slate-100 rounded-xl max-w-md mx-auto">
                    @foreach($services as $type => $group)
                        <button type="button" @click="activeTab = '{{ $type }}'"
                            class="flex-1 py-2 px-4 rounded-lg text-sm font-bold transition-all"
                            :class="activeTab == '{{ $type }}' ? 'bg-white text-primary-600 shadow-sm' : 'text-slate-500 hover:text-slate-700'">
                            {{ ucfirst($type) }}
                        </button>
                    @endforeach
                </div>

                @foreach($services as $type => $group)
                    <div x-show="activeTab == '{{ $type }}'" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($group as $service)
                            <label class="card p-4 bg-white cursor-pointer transition-all border-2"
                                :class="selectedService == {{ $service->id }} ? 'border-accent-500 bg-accent-50' : 'border-slate-100 hover:border-slate-200'">
                                <input type="radio" name="service_id" value="{{ $service->id }}" class="sr-only"
                                    @click="selectedService = {{ $service->id }}; price = {{ $service->price }}">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-slate-900">{{ $service->name }}</h3>
                                        <p class="text-xs text-slate-500 mt-1">{{ $service->description }}</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-accent-600 font-bold">${{ number_format($service->price, 2) }}</div>
                                        <div class="text-[10px] text-slate-500 font-bold uppercase">{{ number_format($service->tzs_price, 0) }} TZS</div>
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <!-- Quantity and Finalize -->
            <div x-show="selectedService" class="bg-slate-950 rounded-[32px] p-8 sm:p-10 text-white shadow-2xl relative overflow-hidden fade-in border border-white/5">
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary-500/10 rounded-full blur-[80px] -mr-32 -mt-32"></div>
                
                <div class="relative z-10 flex flex-col gap-10">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] block">Select Quantity</label>
                            <div class="flex items-center bg-white/5 border border-white/10 rounded-2xl p-2 gap-4">
                                <button type="button" @click="if(quantity > 1) quantity--"
                                    class="w-12 h-12 rounded-xl bg-white/5 hover:bg-white/10 flex items-center justify-center text-xl font-bold transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                </button>
                                <input type="number" name="quantity" x-model="quantity"
                                    class="w-16 bg-transparent border-0 text-center font-black text-2xl focus:ring-0" readonly>
                                <button type="button" @click="quantity++"
                                    class="w-12 h-12 rounded-xl bg-primary-600 hover:bg-primary-500 flex items-center justify-center text-xl font-bold transition-colors shadow-lg shadow-primary-600/20">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                </button>
                            </div>
                        </div>

                        <div class="text-center md:text-right">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mb-2">Estimated Investment</p>
                            <div class="flex items-baseline justify-center md:justify-end gap-3">
                                <span class="text-5xl font-black text-white" x-text="'$' + (price * quantity).toFixed(2)"></span>
                                <span class="text-primary-400 font-serif italic text-lg opacity-80">USD</span>
                            </div>
                            <p class="text-sm font-bold text-slate-500 mt-2 uppercase tracking-tighter" x-text="'~' + ((price * quantity) * conversionRate).toLocaleString() + ' TZS'"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-8 border-t border-white/10">
                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] block">Payment Gateway</label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="relative group cursor-pointer">
                                    <input type="radio" name="payment_type" value="individual" class="sr-only peer" x-model="payment_type" required>
                                    <div class="p-4 rounded-2xl border border-white/10 bg-white/5 transition-all peer-checked:bg-primary-600 peer-checked:border-primary-600 text-center">
                                        <span class="block text-xs font-black uppercase tracking-widest text-slate-300 peer-checked:text-white">Personal</span>
                                    </div>
                                </label>
                                <label class="relative group cursor-pointer">
                                    <input type="radio" name="payment_type" value="company" class="sr-only peer" x-model="payment_type">
                                    <div class="p-4 rounded-2xl border border-white/10 bg-white/5 transition-all peer-checked:bg-primary-600 peer-checked:border-primary-600 text-center">
                                        <span class="block text-xs font-black uppercase tracking-widest text-slate-300 peer-checked:text-white">Corporate</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label for="comment" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] block">Special Directives</label>
                            <textarea name="comment" id="comment" rows="2" 
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-sm focus:ring-primary-500 focus:border-primary-500 placeholder-slate-600 transition-all font-medium resize-none"
                                placeholder="Preferred time or preparation details..."></textarea>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-500 hover:to-primary-600 text-white font-black py-6 rounded-[24px] shadow-2xl shadow-primary-500/30 transform active:scale-[0.98] transition-all uppercase tracking-[0.3em] text-sm flex items-center justify-center gap-3">
                            <span>Finalize Service Order</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </button>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection