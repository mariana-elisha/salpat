@extends('layouts.app')

@section('title', 'Available Rooms')

@section('content')
    <div class="bg-slate-50 min-h-screen">
        <!-- Hero Section -->
        <div class="relative bg-primary-900 py-24 sm:py-32 overflow-hidden">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1571896349842-6e53ce41e8f2?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80')] bg-cover bg-center opacity-20">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-primary-900 via-primary-900/80 to-transparent"></div>

            <div class="relative mx-auto max-w-7xl px-6 lg:px-8 text-center">
                <h1 class="text-4xl font-serif font-bold tracking-tight text-white sm:text-6xl mb-6">Find Your Perfect
                    Sanctuary</h1>
                <p class="mt-6 text-lg leading-8 text-slate-300 max-w-2xl mx-auto">
                    Immerse yourself in serenity without compromising on luxury. Browse our diverse selection of
                    accommodations tailored for your comfort.
                </p>
            </div>
        </div>

        <!-- Filter/Search Section (Optional Placeholder) -->
        <div class="mx-auto max-w-7xl px-6 lg:px-8 -mt-10 relative z-10 mb-16">
            <div
                class="bg-white rounded-xl shadow-xl p-6 md:p-8 flex flex-col md:flex-row gap-4 items-end border border-slate-100">
                <div class="w-full md:w-1/3">
                    <label for="check_in" class="block text-sm font-semibold text-slate-700 mb-2">Check-in</label>
                    <input type="date"
                        class="w-full border-slate-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500"
                        value="{{ request('check_in') }}">
                </div>
                <div class="w-full md:w-1/3">
                    <label for="check_out" class="block text-sm font-semibold text-slate-700 mb-2">Check-out</label>
                    <input type="date"
                        class="w-full border-slate-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500"
                        value="{{ request('check_out') }}">
                </div>
                <div class="w-full md:w-1/3">
                    <button class="btn btn-primary w-full shadow-md">
                        Update Search
                    </button>
                </div>
            </div>
        </div>

        <!-- Rooms Grid -->
        <div class="mx-auto max-w-7xl px-6 lg:px-8 pb-24" id="browse-rooms">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($rooms as $room)
                    <div class="group card h-full flex flex-col hover:shadow-xl transition-all duration-300">
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
                                class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-[var(--color-primary)] uppercase tracking-widest shadow-sm">
                                {{ $room->type }}
                            </div>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3
                                class="text-2xl font-serif font-bold text-slate-900 mb-2 group-hover:text-[var(--color-primary)] transition-colors">
                                {{ $room->name }}
                            </h3>
                            <p class="text-slate-600 mb-6 flex-grow line-clamp-3">{{ $room->description }}</p>

                            <div class="flex items-end justify-between mt-auto pt-6 border-t border-slate-100">
                                <div>
                                    <span class="text-sm text-slate-500 block mb-1">Starting from</span>
                                    <div class="flex items-baseline gap-1">
                                        <span
                                            class="text-2xl font-bold text-[var(--color-primary)]">${{ number_format($room->price_per_night, 0) }}</span>
                                        <span class="text-slate-500">/night</span>
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
                    <div class="col-span-full text-center py-16 bg-white rounded-2xl border-2 border-dashed border-slate-200">
                        <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <h3 class="mt-2 text-sm font-semibold text-slate-900">No rooms available</h3>
                        <p class="mt-1 text-sm text-slate-500">Try adjusting your search criteria or check back later.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $rooms->links() }}
            </div>
        </div>
    </div>
@endsection