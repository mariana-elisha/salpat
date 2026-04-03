@extends('layouts.app')

@section('title', 'Our Sanctuaries - Salpat Camp Lodge-Moshi')

@section('content')
    <div class="bg-creme min-h-screen">
        <!-- Luxury Page Header -->
        <section class="relative h-[65vh] min-h-[500px] flex items-center justify-center bg-navy overflow-hidden text-center">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-1000" 
                     style="background-image: url('{{ asset('images/pcs15.jpeg') }}'); opacity: 0.3;"></div>
            </div>
            
            <!-- Luxury Gradient Overlay -->
            <div class="absolute inset-0 z-10 bg-gradient-to-b from-navy/60 via-transparent to-navy pointer-events-none"></div>

            <div class="relative z-20 text-center px-4 max-w-5xl mx-auto mt-20">
                <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] md:text-xs mb-8 animate-fade-in text-center mx-auto">Private Retreats</h2>
                <h1 class="text-6xl md:text-9xl font-serif font-bold text-white mb-10 leading-tight drop-shadow-2xl animate-slide-up text-center">
                    The <span class="italic font-normal text-gold">Collection</span>
                </h1>
                <div class="w-16 h-px bg-gold/50 mx-auto animate-scale-x"></div>
            </div>
        </section>

        <!-- Refined Booking Filter Bar -->
        <div class="mx-auto max-w-6xl px-4 lg:px-8 -mt-24 relative z-40 mb-32">
            <div class="bg-navy p-3 rounded-[2.5rem] shadow-2xl border border-white/5 backdrop-blur-md">
                <form action="{{ route('rooms.index') }}" method="GET" class="flex flex-col lg:flex-row items-stretch lg:items-center">
                    <div class="flex-grow grid grid-cols-1 md:grid-cols-2 gap-2 p-3">
                        <div class="bg-white/5 group hover:bg-white/10 transition-all p-5 rounded-2xl border border-white/5 text-left">
                            <label class="block text-[8px] font-bold text-gold uppercase tracking-[0.3em] mb-3">Entrance Date</label>
                            <input type="date" name="check_in" value="{{ request('check_in') }}" min="{{ date('Y-m-d') }}"
                                   class="w-full bg-transparent border-0 p-0 text-white focus:ring-0 text-sm font-bold selection:bg-gold cursor-pointer">
                        </div>
                        <div class="bg-white/5 group hover:bg-white/10 transition-all p-5 rounded-2xl border border-white/5 text-left">
                            <label class="block text-[8px] font-bold text-gold uppercase tracking-[0.3em] mb-3">Departure Date</label>
                            <input type="date" name="check_out" value="{{ request('check_out') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                   class="w-full bg-transparent border-0 p-0 text-white focus:ring-0 text-sm font-bold cursor-pointer">
                        </div>
                    </div>
                    <div class="p-3 lg:w-56">
                        <button type="submit" class="w-full h-full bg-gold hover:bg-gold-dark text-white py-5 lg:py-0 rounded-2xl font-bold uppercase tracking-[0.2em] transition-all shadow-xl active:scale-95 text-[10px]">
                            Check Availability
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Premium Rooms Grid -->
        <div class="mx-auto max-w-7xl px-4 lg:px-8 pb-40" id="browse-rooms">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16 lg:gap-20">
                @forelse($rooms as $room)
                    <div class="group bg-white rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(11,16,33,0.05)] hover:shadow-[0_40px_80px_rgba(11,16,33,0.12)] transition-all duration-700 flex flex-col border border-slate-50 hover:-translate-y-4">
                        <!-- Image Container -->
                        <div class="relative h-[480px] overflow-hidden">
                            @if($room->image)
                                <img src="{{ asset('images/' . $room->image) }}" alt="{{ $room->name }}"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000">
                            @else
                                <div class="w-full h-full bg-slate-50 flex items-center justify-center p-20">
                                    <span class="text-slate-200 font-serif italic text-2xl tracking-[0.3em] text-center uppercase">Salpat Lodge</span>
                                </div>
                            @endif
                            
                            <!-- Premium Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-navy/80 via-transparent to-transparent opacity-60"></div>

                            <!-- Price Floating Tag -->
                            <div class="absolute bottom-10 right-10 bg-white/95 backdrop-blur-md text-navy px-8 py-3 rounded-2xl shadow-2xl z-20 flex flex-col items-end">
                                <span class="text-2xl font-serif font-bold">${{ number_format($room->price_per_night, 0) }}</span>
                                <span class="text-[8px] font-bold uppercase tracking-widest opacity-40">Per Night</span>
                            </div>

                            <!-- Room Type Status -->
                            <div class="absolute top-10 left-10 bg-gold/90 backdrop-blur-md text-white px-5 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-[0.2em] z-20 shadow-lg">
                                {{ $room->type }}
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-8 md:p-10 flex flex-col flex-grow text-left">
                            <h3 class="text-3xl font-serif font-bold text-navy mb-6 group-hover:text-gold transition-colors duration-500 border-l-4 border-gold pl-6">
                                {{ $room->name }}
                            </h3>
                            
                            <!-- Features Row -->
                            <div class="flex items-center gap-8 mb-8 text-slate-400">
                                <div class="flex items-center gap-3">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gold/40"></span>
                                    <span class="text-[10px] font-bold uppercase tracking-[0.2em]">{{ $room->capacity }} Guests</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gold/40"></span>
                                    <span class="text-[10px] font-bold uppercase tracking-[0.2em]">Sanctuary View</span>
                                </div>
                            </div>

                            <p class="text-slate-500 font-light leading-relaxed mb-12 flex-grow line-clamp-2 italic text-sm">
                                {{ $room->description }}
                            </p>

                            <div class="flex flex-col gap-6">
                                <a href="{{ route('rooms.show', $room) }}" 
                                   class="text-center bg-navy text-white px-8 py-5 rounded-2xl font-bold uppercase tracking-[0.3em] transition-all text-[10px] hover:bg-gold-dark hover:scale-[1.02]">
                                    Discover Experience
                                </a>
                                <a href="{{ route('bookings.create', $room) }}" 
                                   class="text-center border-2 border-gold/20 text-navy px-8 py-5 rounded-2xl font-bold uppercase tracking-[0.3em] transition-all text-[10px] hover:border-gold hover:text-gold">
                                    Reserve Sanctuary
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-40">
                        <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-10 shadow-inner">
                            <svg class="h-10 w-10 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="text-4xl font-serif font-bold text-navy mb-6">No Sanctuaries Found</h3>
                        <p class="text-slate-400 mb-12 max-w-md mx-auto font-light leading-relaxed">Our calendars are currently reserved for the selected period. Please consider alternative dates for your stay.</p>
                        <a href="{{ route('rooms.index') }}" class="text-gold font-bold uppercase tracking-[0.3em] text-[10px] hover:underline decoration-2 underline-offset-8">
                            View All Sanctuaries
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($rooms->hasPages())
                <div class="mt-24 flex justify-center">
                    {{ $rooms->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
<style>
    @keyframes slide-up {
        0%   { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes fade-in {
        0%   { opacity: 0; }
        100% { opacity: 1; }
    }
    @keyframes scale-x {
        0%   { transform: scaleX(0); }
        100% { transform: scaleX(1); }
    }
    .animate-slide-up   { animation: slide-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
    .animate-fade-in    { animation: fade-in 1.2s ease-out forwards; opacity: 0; }
    .animate-scale-x    { animation: scale-x 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards; transform-origin: center; }
</style>
@endpush