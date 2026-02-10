@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-primary-900 rounded-2xl shadow-2xl p-12 text-white mb-12 relative overflow-hidden">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center opacity-20">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-primary-900/90 to-primary-800/80"></div>

            <div class="relative z-10 max-w-2xl">
                <h1 class="text-4xl md:text-6xl font-serif font-bold mb-6 leading-tight">
                    Welcome to <br>
                    <span class="text-accent-400">Salpat Camp</span>
                </h1>
                <p class="text-xl mb-10 text-slate-200 font-light leading-relaxed">Experience comfort and luxury in the
                    heart of nature. Your perfect getaway awaits.</p>
                <a href="{{ route('rooms.index') }}"
                    class="inline-block bg-white text-primary-900 px-8 py-4 rounded-lg font-bold hover:bg-accent-50 hover:text-primary-800 shadow-lg transition-all transform hover:-translate-y-1">
                    Book Your Stay
                </a>
            </div>
        </div>

        <!-- Booking Search Form -->
        <div
            class="glass-panel rounded-2xl shadow-lg p-8 mb-16 -mt-24 relative z-20 mx-4 border border-white/20 backdrop-blur-md bg-white/95">
            <h2 class="text-2xl font-serif font-bold mb-6 text-primary-900 flex items-center gap-3">
                <span class="w-1.5 h-8 bg-accent-500 rounded-full"></span>
                Check Availability
            </h2>
            <form action="{{ route('rooms.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <label for="check_in"
                        class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wider">Check-in</label>
                    <input type="date" name="check_in" id="check_in" value="{{ request('check_in') }}"
                        min="{{ date('Y-m-d') }}"
                        class="w-full border-slate-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500 py-3"
                        required>
                </div>
                <div>
                    <label for="check_out"
                        class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wider">Check-out</label>
                    <input type="date" name="check_out" id="check_out" value="{{ request('check_out') }}"
                        min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                        class="w-full border-slate-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500 py-3"
                        required>
                </div>
                <div>
                    <label for="guests"
                        class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wider">Guests</label>
                    <select name="guests" id="guests"
                        class="w-full border-slate-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500 py-3"
                        required>
                        @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" {{ request('guests', 1) == $i ? 'selected' : '' }}>{{ $i }}
                                {{ Str::plural('Guest', $i) }}</option>
                        @endfor
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit"
                        class="w-full bg-primary-600 text-white px-6 py-3 rounded-lg hover:bg-primary-700 font-bold transition-all shadow-md active:transform active:scale-95">
                        Search Rooms
                    </button>
                </div>
            </form>
        </div>

        <!-- Featured Rooms -->
        <div class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-primary-900 mb-4">Featured Accommodations</h2>
                <div class="w-24 h-1 bg-accent-500 mx-auto rounded-full"></div>
                <p class="mt-4 text-slate-600 max-w-2xl mx-auto">Discover our handpicked selection of premium rooms and
                    tents designed for your ultimate comfort.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($featuredRooms ?? [] as $room)
                    <div
                        class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 overflow-hidden flex flex-col h-full">
                        <div class="relative overflow-hidden h-64">
                            @if($room->image)
                                <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <div
                                class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-primary-700 uppercase tracking-widest shadow-sm">
                                {{ $room->type }}
                            </div>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3
                                class="text-2xl font-serif font-bold text-slate-900 mb-2 group-hover:text-primary-700 transition-colors">
                                {{ $room->name }}</h3>
                            <p class="text-slate-600 mb-6 flex-grow line-clamp-3">{{ $room->description }}</p>

                            <div class="flex items-end justify-between mt-auto pt-6 border-t border-slate-100">
                                <div>
                                    <span class="text-sm text-slate-500 block mb-1">Starting from</span>
                                    <div class="flex items-baseline gap-1">
                                        <span
                                            class="text-2xl font-bold text-primary-700">${{ number_format($room->price_per_night, 0) }}</span>
                                        <span class="text-slate-500">/night</span>
                                    </div>
                                </div>
                                <a href="{{ route('rooms.show', $room) }}"
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary-50 text-primary-600 group-hover:bg-primary-600 group-hover:text-white transition-all">
                                    <svg class="w-5 h-5 transform group-hover:translate-x-0.5 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-16 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                        <p class="text-slate-500 text-lg">No featured rooms available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection