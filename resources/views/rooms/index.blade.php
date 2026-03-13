@extends('layouts.app')

@section('title', 'Available Rooms')

@section('content')
    <div class="bg-slate-50 min-h-screen">
        <!-- Hero Section -->
        <div class="relative bg-slate-900 py-28 sm:py-36 overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1571896349842-6e53ce41e8f2?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80')] bg-cover bg-center opacity-25 filter grayscale mix-blend-overlay"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/40 to-slate-900/90 mix-blend-multiply"></div>
            <!-- Decorative blobs -->
            <div class="absolute -top-32 -right-32 w-96 h-96 bg-accent-500 rounded-full blur-[100px] opacity-20 pointer-events-none"></div>
            <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-primary-500 rounded-full blur-[100px] opacity-10 pointer-events-none"></div>
            <!-- Bottom fade -->
            <div class="absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-slate-50 to-transparent z-10 pointer-events-none"></div>

            <div class="relative mx-auto max-w-7xl px-6 lg:px-8 text-center z-10">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-widest mb-8 animate-fade-in">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-500 animate-pulse"></span>
                    Our Collection
                </div>
                <h1 class="text-5xl md:text-7xl font-serif font-bold tracking-tight text-white mb-6 drop-shadow-xl animate-slide-up">
                    Find Your <span class="text-accent-400 italic">Perfect</span> Sanctuary
                </h1>
                <p class="mt-6 text-lg md:text-xl leading-8 text-slate-300 max-w-2xl mx-auto font-light animate-slide-up animation-delay-200">
                    Immerse yourself in serenity without compromising on luxury. Browse our diverse selection of accommodations tailored for your comfort.
                </p>
            </div>
        </div>

        <!-- Filter/Search Section -->
        <div class="mx-auto max-w-5xl px-6 lg:px-8 -mt-6 relative z-20 mb-16">
            <form action="{{ route('rooms.index') }}" method="GET" class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-2xl p-6 md:p-8 flex flex-col md:flex-row gap-6 items-end border border-white/40">
                <div class="w-full md:w-1/3">
                    <label for="check_in" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Check-in</label>
                    <input type="date" name="check_in"
                        class="w-full border-slate-200 text-slate-700 bg-slate-50 rounded-xl focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 py-3 px-4 transition-all"
                        min="{{ date('Y-m-d') }}"
                        value="{{ request('check_in') }}">
                </div>
                <div class="w-full md:w-1/3">
                    <label for="check_out" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Check-out</label>
                    <input type="date" name="check_out"
                        class="w-full border-slate-200 text-slate-700 bg-slate-50 rounded-xl focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 py-3 px-4 transition-all"
                        min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                        value="{{ request('check_out') }}">
                </div>
                <div class="w-full md:w-1/3">
                    <button type="submit" class="w-full bg-accent-500 hover:bg-accent-600 text-white font-bold py-3.5 px-6 rounded-xl transition-all shadow-lg shadow-accent-500/30 hover:-translate-y-0.5">
                        Update Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Rooms Grid -->
        <div class="mx-auto max-w-7xl px-6 lg:px-8 pb-32" id="browse-rooms">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($rooms as $room)
                    <div class="room-card group bg-white rounded-3xl flex flex-col hover:shadow-2xl transition-all duration-500 border border-slate-100 overflow-hidden transform hover:-translate-y-2 relative">
                        <!-- Image -->
                        <div class="relative overflow-hidden h-72">
                            @if($room->image)
                                <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                                    <svg class="w-14 h-14 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-bold text-slate-900 uppercase tracking-widest shadow-lg">
                                {{ $room->type }}
                            </div>
                            <!-- Hover CTA revealed -->
                            <div class="absolute bottom-4 left-0 right-0 flex justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                                <span class="bg-accent-500 text-white text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full shadow-lg">View & Reserve</span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-8 flex flex-col flex-grow bg-white">
                            <div class="flex flex-col mb-4">
                                <div class="flex justify-between items-start gap-4 mb-2">
                                    <h3 class="text-2xl font-serif font-bold text-slate-900 group-hover:text-accent-600 transition-colors">
                                        {{ $room->name }}
                                    </h3>
                                    <div class="bg-accent-50 text-accent-600 px-4 py-2 rounded-xl flex flex-col items-center shrink-0 border border-accent-100">
                                        <span class="text-2xl font-bold leading-none">${{ number_format($room->price_per_night, 0) }}</span>
                                        <span class="text-[9px] font-black uppercase tracking-widest mt-1 opacity-70">Per Night</span>
                                    </div>
                                </div>
                                
                                <div class="text-accent-600 font-bold text-xs bg-accent-50/50 px-2 py-1 rounded w-fit">
                                    ~ {{ number_format($room->tzs_price, 0) }} TZS
                                </div>
                            </div>

                            <!-- Quick info -->
                            <div class="grid grid-cols-2 gap-4 mb-6 pt-4 border-t border-slate-50">
                                <div class="flex items-center gap-2 text-sm text-slate-500">
                                    <svg class="w-4 h-4 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    <span>{{ $room->capacity }} Guests</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-slate-500">
                                    <svg class="w-4 h-4 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                                    <span>Spacious</span>
                                </div>
                            </div>

                            <p class="text-slate-600 mb-8 flex-grow line-clamp-3 text-sm leading-relaxed font-light italic">{{ $room->description }}</p>

                            <a href="{{ route('bookings.create', $room) }}"
                                class="inline-flex items-center justify-between w-full px-6 py-4 rounded-2xl border border-slate-200 text-slate-700 bg-slate-50 group-hover:bg-accent-500 group-hover:border-accent-500 group-hover:text-white font-bold transition-all duration-300 shadow-sm group-hover:shadow-accent-500/30">
                                <span>Reserve Room</span>
                                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-28 bg-white rounded-3xl border border-slate-100 shadow-sm">
                        <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-serif font-bold text-slate-900 mb-3">No rooms available</h3>
                        <p class="mt-2 text-slate-500 mb-8 max-w-md mx-auto text-lg font-light">We couldn't find any rooms matching your criteria. Please try adjusting your search dates.</p>
                        <a href="{{ route('rooms.index') }}" class="inline-flex items-center gap-2 text-accent-600 font-bold hover:text-accent-700 text-lg">
                            Clear Search Filters
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                {{ $rooms->links() }}
            </div>
        </div>
    </div>

    {{-- WhatsApp Floating Button --}}
    <a href="https://wa.me/255770307759" target="_blank"
        class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-green-500/40">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
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
    .animate-slide-up   { animation: slide-up 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
    .animate-fade-in    { animation: fade-in 1.2s ease-out forwards; opacity: 0; }
    .animation-delay-200{ animation-delay: 200ms; }

    .room-card { animation: slide-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) both; opacity: 0; }
</style>
@endpush