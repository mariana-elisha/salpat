@extends('layouts.panel')

@section('title', 'Book a Service')

@section('breadcrumbs', 'Guest / Book Service')

@section('content')
    <div class="max-w-4xl mx-auto space-y-8">
        <div class="text-center">
            <h1 class="text-3xl font-serif font-bold text-slate-900">Request a Service</h1>
            <p class="text-slate-500 mt-2">Food, drinks, or housekeeping. We're at your service.</p>
        </div>

        <form action="{{ route('user.services.store') }}" method="POST" class="space-y-8"
            x-data="{ selectedService: null, quantity: 1 }">
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
                                    <span class="text-accent-600 font-bold">${{ number_format($service->price, 2) }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <!-- Quantity and Finalize -->
            <div x-show="selectedService" class="card p-6 bg-slate-900 text-white shadow-xl fade-in">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex items-center gap-4">
                        <label class="text-sm font-medium opacity-80 uppercase tracking-widest">Quantity</label>
                        <div class="flex items-center gap-2">
                            <button type="button" @click="if(quantity > 1) quantity--"
                                class="w-10 h-10 rounded-full border border-white/20 hover:bg-white/10 flex items-center justify-center font-bold">-</button>
                            <input type="number" name="quantity" x-model="quantity"
                                class="w-16 bg-transparent border-0 text-center font-bold text-xl focus:ring-0" readonly>
                            <button type="button" @click="quantity++"
                                class="w-10 h-10 rounded-full border border-white/20 hover:bg-white/10 flex items-center justify-center font-bold">+</button>
                        </div>
                    </div>

                    <div class="text-center md:text-right">
                        <p class="text-xs opacity-60 uppercase tracking-widest">Total Price</p>
                        <p class="text-3xl font-bold text-accent-400" x-text="'$' + (price * quantity).toFixed(2)"></p>
                    </div>

                    <button type="submit" class="btn-accent px-8 py-4 rounded-xl text-lg font-bold w-full md:w-auto">
                        Confirm Order
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection