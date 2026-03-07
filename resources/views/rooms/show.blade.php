@extends('layouts.app')

@section('title', $room->name)

    @section('content')
        <!-- Hero Section with Image -->
        <div class="relative h-[65vh] min-h-[500px] w-full overflow-hidden bg-slate-900">
            @if($room->image)
                <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}"
                    class="h-full w-full object-cover object-center opacity-70 group-hover:scale-110 transition-transform duration-1000">
            @else
                <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                    alt="{{ $room->name }}" class="h-full w-full object-cover object-center opacity-70">
            @endif

            <!-- Decorative elements -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950 to-transparent h-48"></div>

            <div class="absolute inset-0 flex flex-col justify-end">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-24 w-full">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-widest mb-4">
                        Exclusive Selection
                    </div>
                    <h1 class="text-4xl font-serif font-bold text-white sm:text-5xl lg:text-7xl tracking-tighter mb-4">
                        {{ $room->name }}
                    </h1>
                    <div class="flex flex-wrap items-center gap-6 text-slate-200 font-light text-lg">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            {{ ucfirst($room->type) }}
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Up to {{ $room->capacity }} Guests
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-10 pb-24">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Room Details -->
                <div class="lg:col-span-2 space-y-16">
                    <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-2xl border border-slate-100">
                        <div>
                            <h2 class="text-3xl font-serif font-bold text-slate-900 mb-8 flex items-center gap-4">
                                <span class="w-12 h-0.5 bg-accent-500"></span>
                                Refined Comfort
                            </h2>
                            <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed text-lg font-light">
                                {{ $room->description ?? 'Experience the perfect blend of comfort and serenity. This room is designed to provide a peaceful retreat, featuring premium amenities and stunning views.' }}
                            </div>
                        </div>

                        <div class="my-12 border-t border-slate-100"></div>

                        @if($room->amenities)
                            <div>
                                <h3 class="text-xl font-serif font-bold text-slate-900 mb-8">Curated Amenities</h3>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    @foreach($room->amenities as $amenity)
                                        <li class="flex items-center gap-4 group">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-accent-500 group-hover:bg-accent-500 group-hover:text-white transition-all duration-300">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                                </svg>
                                            </div>
                                            <span class="font-medium text-slate-700">{{ $amenity }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <!-- Policies -->
                    <div class="bg-slate-900 rounded-[2.5rem] p-8 md:p-12 text-white relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10">
                        </div>
                        <div class="relative z-10">
                            <h2 class="text-3xl font-serif font-bold mb-10">Essential Information</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                                <div class="space-y-4">
                                    <h4 class="text-accent-400 font-bold uppercase tracking-widest text-xs">Stay Policies</h4>
                                    <ul class="space-y-4 text-slate-300 font-light">
                                        <li class="flex items-start gap-4">
                                            <svg class="w-5 h-5 text-accent-500 mt-0.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Check-in: Starts at 3:00 PM</span>
                                        </li>
                                        <li class="flex items-start gap-4">
                                            <svg class="w-5 h-5 text-accent-500 mt-0.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Check-out: Clean by 11:00 AM</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="space-y-4">
                                    <h4 class="text-accent-400 font-bold uppercase tracking-widest text-xs">Peace of Mind</h4>
                                    <ul class="space-y-4 text-slate-300 font-light">
                                        <li class="flex items-start gap-4">
                                            <svg class="w-5 h-5 text-accent-500 mt-0.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                                </path>
                                            </svg>
                                            <span>Free cancellation up to 48 hours</span>
                                        </li>
                                        <li class="flex items-start gap-4">
                                            <svg class="w-5 h-5 text-accent-500 mt-0.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Concierge available 24/7</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Sidebar -->
                <div class="lg:col-span-1">
                    <div
                        class="sticky top-24 bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden transform group-hover:-translate-y-1 transition-all duration-300">
                        <div class="bg-slate-900 p-8 text-white relative">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-accent-500 opacity-10 rounded-full -mt-16 -mr-16">
                            </div>
                            <p class="text-[10px] text-accent-400 uppercase tracking-[0.2em] font-bold mb-2">Luxury Experience
                            </p>
                            <div class="flex items-baseline gap-2">
                                <span
                                    class="text-5xl font-serif font-bold">${{ number_format($room->price_per_night, 0) }}</span>
                                <span class="text-slate-400 font-light tracking-wide text-sm">/ night</span>
                            </div>
                        </div>

                        <div class="p-8">
                            <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="check_in"
                                            class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Check-in</label>
                                        <input type="date" name="check_in" id="check_in" value="{{ $checkIn ?? '' }}"
                                            min="{{ date('Y-m-d') }}"
                                            class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 text-sm font-medium"
                                            required>
                                    </div>
                                    <div>
                                        <label for="check_out"
                                            class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Check-out</label>
                                        <input type="date" name="check_out" id="check_out" value="{{ $checkOut ?? '' }}"
                                            min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                            class="w-full px-3 py-2 border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 text-sm font-medium"
                                            required>
                                    </div>
                                </div>

                                <div>
                                    <label for="number_of_guests"
                                        class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Guests</label>
                                    <select name="number_of_guests" id="number_of_guests"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 bg-slate-50/50 appearance-none font-medium"
                                        required>
                                        @for($i = 1; $i <= $room->capacity; $i++)
                                            <option value="{{ $i }}" {{ ($guests ?? 1) == $i ? 'selected' : '' }}>{{ $i }}
                                                {{ $i > 1 ? 'Guests' : 'Guest' }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <button type="submit"
                                    class="w-full bg-accent-500 text-white py-5 rounded-2xl font-bold text-lg shadow-xl shadow-accent-500/20 hover:bg-accent-600 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3">
                                    Start Reservation
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>

                                <div
                                    class="flex items-center justify-center gap-2 text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-4">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Secure Transaction
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-12 p-8 bg-slate-50 rounded-3xl border border-slate-100 italic">
                        <p class="text-slate-500 text-sm font-light leading-relaxed">
                            "Luxury is in each detail. We are dedicated to providing an unparalleled experience from the moment
                            you book."
                        </p>
                        <div class="mt-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-slate-200"></div>
                            <div>
                                <p class="text-xs font-bold text-slate-900">Salpat Management</p>
                                <p class="text-[10px] text-slate-400 uppercase tracking-widest font-bold">Concierge Team</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@endsection