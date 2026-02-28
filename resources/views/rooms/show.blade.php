@extends('layouts.app')

@section('title', $room->name)

@section('content')
    <!-- Hero Section with Image -->
    <div class="relative h-[60vh] min-h-[500px] w-full overflow-hidden">
        @if($room->image)
            <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}"
                class="h-full w-full object-cover object-center">
        @else
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                alt="{{ $room->name }}" class="h-full w-full object-cover object-center">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/40 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-24">
                <h1 class="text-4xl font-serif font-bold text-white sm:text-5xl lg:text-6xl tracking-tight shadow-sm">
                    {{ $room->name }}
                </h1>
                <p class="mt-4 text-xl text-slate-200 max-w-2xl font-light">{{ ucfirst($room->type) }} •
                    {{ $room->capacity }} Guests • {{ $room->size ?? '35' }}m²
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10 pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            <!-- Room Details (Left Column) -->
            <div class="lg:col-span-2 space-y-12 bg-white rounded-3xl p-8 shadow-sm ring-1 ring-slate-100">
                <!-- Description -->
                <div>
                    <h2 class="text-2xl font-serif font-bold text-slate-900 mb-6 flex items-center gap-3">
                        Description
                    </h2>
                    <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed text-lg">
                        {{ $room->description ?? 'Experience the perfect blend of comfort and serenity. This room is designed to provide a peaceful retreat, featuring premium amenities and stunning views.' }}
                    </div>
                </div>

                <div class="border-t border-slate-100"></div>

                <!-- Amenities -->
                @if($room->amenities)
                    <div>
                        <h2 class="text-2xl font-serif font-bold text-slate-900 mb-6">Amenity Highlights</h2>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8">
                            @foreach($room->amenities as $amenity)
                                <li class="flex items-center gap-3 text-slate-700">
                                    <span
                                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary-50 text-primary-700 ring-1 ring-inset ring-primary-700/10">
                                        <!-- Dynamic icons based on amenity name could go here, using a generic check for now -->
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span class="font-medium">{{ $amenity }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="border-t border-slate-100"></div>

                <!-- Enhanced Features / Policies (Static for now to add depth) -->
                <div>
                    <h2 class="text-2xl font-serif font-bold text-slate-900 mb-6">House Rules & Info</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="bg-slate-50 rounded-xl p-5">
                            <h4 class="font-semibold text-slate-900 mb-2">Check-in / Check-out</h4>
                            <p class="text-sm text-slate-600">Check-in from 3:00 PM, check-out by 11:00 AM. Early check-in
                                subject to availability.</p>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-5">
                            <h4 class="font-semibold text-slate-900 mb-2">Cancellation Policy</h4>
                            <p class="text-sm text-slate-600">Free cancellation up to 48 hours before your stay. Late
                                cancellations charged 50%.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Form (Right Column - Sticky) -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 bg-white rounded-2xl shadow-xl ring-1 ring-slate-200 overflow-hidden">
                    <div class="bg-slate-900 p-6 text-white">
                        <p class="text-sm text-slate-300 uppercase tracking-wider font-semibold">Price per night</p>
                        <div class="mt-1 flex items-baseline gap-2">
                            <span
                                class="text-4xl font-serif font-bold">${{ number_format($room->price_per_night, 0) }}</span>
                        </div>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="check_in"
                                        class="form-label text-xs uppercase tracking-wider mb-1">Check-in</label>
                                    <input type="date" name="check_in" id="check_in" value="{{ $checkIn ?? '' }}"
                                        min="{{ date('Y-m-d') }}" class="form-input transition-all" required>
                                    @error('check_in')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="check_out"
                                        class="form-label text-xs uppercase tracking-wider mb-1">Check-out</label>
                                    <input type="date" name="check_out" id="check_out" value="{{ $checkOut ?? '' }}"
                                        min="{{ date('Y-m-d', strtotime('+1 day')) }}" class="form-input transition-all"
                                        required>
                                    @error('check_out')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="number_of_guests"
                                    class="form-label text-xs uppercase tracking-wider mb-1">Guests</label>
                                <select name="number_of_guests" id="number_of_guests" class="form-input transition-all"
                                    required>
                                    @for($i = 1; $i <= $room->capacity; $i++)
                                        <option value="{{ $i }}" {{ ($guests ?? 1) == $i ? 'selected' : '' }}>{{ $i }}
                                            Guest{{ $i > 1 ? 's' : '' }}</option>
                                    @endfor
                                </select>
                                @error('number_of_guests')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="border-t border-slate-100 pt-6"></div>

                            <div>
                                <label for="guest_name" class="form-label text-xs uppercase tracking-wider mb-1">Full
                                    Name</label>
                                <input type="text" name="guest_name" id="guest_name"
                                    value="{{ old('guest_name', auth()->user()->name ?? '') }}" placeholder="John Doe"
                                    class="form-input transition-all" required>
                                @error('guest_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="guest_email"
                                    class="form-label text-xs uppercase tracking-wider mb-1">Email</label>
                                <input type="email" name="guest_email" id="guest_email"
                                    value="{{ old('guest_email', auth()->user()->email ?? '') }}"
                                    placeholder="john@example.com" class="form-input transition-all" required>
                                @error('guest_email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Accordion for Optional Fields -->
                            <div x-data="{ open: false }">
                                <button type="button" @click="open = !open"
                                    class="flex items-center justify-between w-full text-sm font-medium text-slate-600 hover:text-[var(--color-primary)] transition-colors">
                                    <span>Add Special Requests?</span>
                                    <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="mt-4 space-y-4">
                                    <div>
                                        <label for="guest_phone"
                                            class="form-label text-xs uppercase tracking-wider mb-1">Phone</label>
                                        <input type="tel" name="guest_phone" id="guest_phone"
                                            value="{{ old('guest_phone') }}" class="form-input transition-all">
                                    </div>
                                    <div>
                                        <label for="special_requests"
                                            class="form-label text-xs uppercase tracking-wider mb-1">Requests</label>
                                        <textarea name="special_requests" id="special_requests" rows="3"
                                            class="form-input transition-all">{{ old('special_requests') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="btn btn-primary w-full py-4 text-lg shadow-xl hover:shadow-2xl hover:-translate-y-1">
                                Confirm Reservation
                            </button>
                            <p class="text-center text-xs text-slate-400 mt-4">No payment required today. Pay upon arrival.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection