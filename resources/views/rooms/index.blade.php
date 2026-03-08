@extends('layouts.app')

@section('title', 'Available Rooms')

@section('content')
    <div class="bg-slate-50 min-h-screen">
        <!-- Hero Section -->
        <div class="relative bg-slate-900 py-24 sm:py-32 overflow-hidden border-b-4 border-accent-500">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1571896349842-6e53ce41e8f2?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80')] bg-cover bg-center opacity-20 filter grayscale mix-blend-overlay">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent"></div>
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-accent-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>

            <div class="relative mx-auto max-w-7xl px-6 lg:px-8 text-center z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-widest mb-6">
                    Our Collection
                </div>
                <h1 class="text-4xl font-serif font-bold tracking-tight text-white sm:text-6xl mb-6 drop-shadow-lg">Find Your Perfect
                    Sanctuary</h1>
                <p class="mt-6 text-lg leading-8 text-slate-300 max-w-2xl mx-auto font-light">
                    Immerse yourself in serenity without compromising on luxury. Browse our diverse selection of
                    accommodations tailored for your comfort.
                </p>
            </div>
        </div>

        <!-- Filter/Search Section -->
        <div class="mx-auto max-w-5xl px-6 lg:px-8 -mt-10 relative z-20 mb-16">
            <form action="{{ route('rooms.index') }}" method="GET" class="bg-white rounded-2xl shadow-xl p-6 md:p-8 flex flex-col md:flex-row gap-6 items-end border border-slate-100">
                <div class="w-full md:w-1/3">
                    <label for="check_in" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Check-in</label>
                    <input type="date" name="check_in"
                        class="w-full border-slate-200 text-slate-700 bg-slate-50 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500 py-3"
                        min="{{ date('Y-m-d') }}"
                        value="{{ request('check_in') }}">
                </div>
                <div class="w-full md:w-1/3">
                    <label for="check_out" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Check-out</label>
                    <input type="date" name="check_out"
                        class="w-full border-slate-200 text-slate-700 bg-slate-50 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500 py-3"
                        min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                        value="{{ request('check_out') }}">
                </div>
                <div class="w-full md:w-1/3">
                    <button type="submit" class="w-full bg-accent-500 hover:bg-accent-600 text-white font-bold py-3 px-6 rounded-xl transition-all shadow-lg hover:shadow-accent-500/30">
                        Update Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Rooms Grid -->
        <div class="mx-auto max-w-7xl px-6 lg:px-8 pb-32" id="browse-rooms">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($rooms as $room)
                    <div class="group bg-white rounded-2xl flex flex-col hover:shadow-2xl transition-all duration-500 border border-slate-100 overflow-hidden transform hover:-translate-y-2">
                        <div class="relative overflow-hidden h-72">
                            @if($room->image)
                                <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-bold text-slate-900 uppercase tracking-widest shadow-lg">
                                {{ $room->type }}
                            </div>
                        </div>

                        <div class="p-8 flex flex-col flex-grow relative bg-white">
                            <div class="absolute -top-6 right-8 bg-accent-500 text-white shadow-lg shadow-accent-500/30 px-4 py-2 rounded-xl flex flex-col items-center">
                                <span class="text-xs font-medium uppercase tracking-widest opacity-80 mb-0.5">Per Night</span>
                                <span class="text-2xl font-bold leading-none">${{ number_format($room->price_per_night, 0) }}</span>
                                <span class="text-[10px] font-bold mt-1 opacity-90">{{ number_format($room->tzs_price, 0) }} TZS</span>
                            </div>

                            <h3 class="text-2xl font-serif font-bold text-slate-900 mb-3 group-hover:text-accent-600 transition-colors pr-16">
                                {{ $room->name }}
                            </h3>
                            
                            <!-- Capacity & Features Summary Mini-icons -->
                            <div class="flex items-center gap-4 mb-4 text-sm text-slate-500 font-medium pb-4 border-b border-slate-100">
                                <span class="flex items-center gap-1.5" title="Capacity">
                                    <svg class="w-4 h-4 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    {{ $room->capacity }} Guests
                                </span>
                                <span class="flex items-center gap-1.5" title="Size">
                                    <svg class="w-4 h-4 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                                    Spacious
                                </span>
                            </div>

                            <p class="text-slate-600 mb-8 flex-grow line-clamp-3 text-sm leading-relaxed">{{ $room->description }}</p>

                            <a href="{{ route('bookings.create', $room) }}"
                                class="inline-flex items-center justify-between w-full px-6 py-4 rounded-xl border border-slate-200 text-slate-700 bg-slate-50 group-hover:bg-accent-500 group-hover:border-accent-500 group-hover:text-white font-bold transition-all duration-300">
                                <span>Reserve Room</span>
                                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-24 bg-white rounded-3xl border border-slate-100 shadow-sm">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-10 w-10 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-serif font-bold text-slate-900">No rooms available</h3>
                        <p class="mt-2 text-slate-500 mb-6 max-w-md mx-auto">We couldn't find any rooms matching your criteria. Please try adjusting your search dates.</p>
                        <a href="{{ route('rooms.index') }}" class="text-accent-600 font-bold hover:text-accent-700">Clear Search Filters &rarr;</a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                {{ $rooms->links() }}
            </div>
        </div>
    </div>
@endsection