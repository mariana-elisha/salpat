@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-primary-600 rounded-2xl shadow-2xl p-12 text-white mb-12 relative overflow-hidden">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center opacity-20">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-primary-600/90 to-primary-700/80"></div>

            <div class="relative z-10 max-w-2xl">
                <h1 class="text-4xl md:text-6xl font-serif font-bold mb-6 leading-tight">
                    Welcome to <br>
                    <span class="text-accent-500">Salpat Camp</span>
                </h1>
                <p class="text-xl mb-10 text-white font-light leading-relaxed">Experience comfort and luxury in the
                    heart of the surroundings. Your perfect getaway awaits.</p>
                <a href="{{ route('rooms.index') }}"
                    class="inline-block bg-accent-500 text-white px-8 py-4 rounded-lg font-bold hover:bg-accent-600 shadow-lg transition-all transform hover:-translate-y-1">
                    Book Your Stay
                </a>
            </div>
        </div>

        <!-- Booking Search Form -->
        <div
            class="glass-panel rounded-2xl shadow-lg p-8 mb-16 -mt-24 relative z-20 mx-4 border border-white/20 backdrop-blur-md bg-white/95">
            <h2 class="text-2xl font-serif font-bold mb-6 text-black flex items-center gap-3">
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
                                {{ Str::plural('Guest', $i) }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit"
                        class="w-full bg-accent-500 text-white px-6 py-3 rounded-lg hover:bg-accent-600 font-bold transition-all shadow-md active:transform active:scale-95">
                        Search Rooms
                    </button>
                </div>
            </form>
        </div>

        <!-- Featured Rooms -->
        <div class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-black mb-4">Featured Accommodations</h2>
                <div class="w-24 h-1 bg-accent-500 mx-auto rounded-full"></div>
                <p class="mt-4 text-black max-w-2xl mx-auto font-medium">Discover our handpicked selection of premium rooms
                    designed for your ultimate comfort.</p>
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
                                class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-accent-600 uppercase tracking-widest shadow-sm">
                                {{ $room->type }}
                            </div>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3
                                class="text-2xl font-serif font-bold text-black mb-2 group-hover:text-accent-600 transition-colors">
                                {{ $room->name }}
                            </h3>
                            <p class="text-black mb-6 flex-grow line-clamp-3">{{ $room->description }}</p>

                            <div class="flex items-end justify-between mt-auto pt-6 border-t border-slate-100">
                                <div>
                                    <span class="text-sm text-black font-semibold block mb-1">Starting from</span>
                                    <div class="flex items-baseline gap-1">
                                        <span
                                            class="text-2xl font-bold text-accent-600">${{ number_format($room->price_per_night, 0) }}</span>
                                        <span class="text-black font-medium">/night</span>
                                    </div>
                                </div>
                                <a href="{{ route('bookings.create', $room) }}"
                                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-accent-50 text-accent-600 group-hover:bg-accent-500 group-hover:text-white font-bold transition-all shadow-sm">
                                    Book Now
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

    {{-- WhatsApp Floating Button --}}
    <a href="https://wa.me/255770307759" target="_blank"
        class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-green-500/40">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
        </svg>
    </a>
@endsection