@extends('layouts.app')

@section('title', $room->name)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Room Image -->
        <div>
            @if($room->image)
                <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="w-full rounded-2xl shadow-xl">
            @else
                <div class="w-full h-96 bg-gradient-to-br from-orange-100 to-sky-100 rounded-2xl flex items-center justify-center">
                    <span class="text-slate-400 text-xl">No Image Available</span>
                </div>
            @endif
        </div>

        <!-- Room Details -->
        <div>
            <h1 class="text-4xl font-bold text-slate-800 mb-4">{{ $room->name }}</h1>
            <div class="mb-4">
                <span class="bg-sky-100 text-sky-800 text-sm font-semibold px-3 py-1 rounded-lg">{{ $room->type }}</span>
                <span class="ml-2 text-slate-600">Capacity: {{ $room->capacity }} guests</span>
            </div>

            <div class="mb-6">
                <h2 class="text-2xl font-semibold mb-2 text-slate-800">Description</h2>
                <p class="text-slate-700">{{ $room->description ?? 'No description available.' }}</p>
            </div>

            @if($room->amenities)
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold mb-2 text-slate-800">Amenities</h2>
                    <ul class="grid grid-cols-2 gap-2">
                        @foreach($room->amenities as $amenity)
                            <li class="flex items-center text-slate-700">
                                <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                {{ $amenity }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-gradient-to-r from-orange-50 to-sky-50 rounded-2xl p-6 mb-6 border border-orange-100">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-3xl font-bold text-orange-600">${{ number_format($room->price_per_night, 2) }}</span>
                    <span class="text-slate-600">per night</span>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="bg-white border-2 border-orange-100 rounded-2xl p-6 shadow-lg">
                <h2 class="text-2xl font-semibold mb-4 text-slate-800">Book This Room</h2>
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="check_in" class="block text-sm font-medium text-slate-700 mb-2">Check-in</label>
                            <input type="date" name="check_in" id="check_in" 
                                   value="{{ $checkIn ?? '' }}" 
                                   min="{{ date('Y-m-d') }}"
                                   class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                            @error('check_in')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="check_out" class="block text-sm font-medium text-slate-700 mb-2">Check-out</label>
                            <input type="date" name="check_out" id="check_out" 
                                   value="{{ $checkOut ?? '' }}"
                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                   class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                            @error('check_out')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="number_of_guests" class="block text-sm font-medium text-slate-700 mb-2">Number of Guests</label>
                        <input type="number" name="number_of_guests" id="number_of_guests" 
                               value="{{ $guests ?? 1 }}" 
                               min="1" max="{{ $room->capacity }}"
                               class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                        @error('number_of_guests')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="guest_name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                        <input type="text" name="guest_name" id="guest_name" 
                               value="{{ old('guest_name', auth()->user()->name ?? '') }}"
                               class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                        @error('guest_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="guest_email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                        <input type="email" name="guest_email" id="guest_email" 
                               value="{{ old('guest_email', auth()->user()->email ?? '') }}"
                               class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                        @error('guest_email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="guest_phone" class="block text-sm font-medium text-slate-700 mb-2">Phone (Optional)</label>
                        <input type="tel" name="guest_phone" id="guest_phone" 
                               value="{{ old('guest_phone') }}"
                               class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        @error('guest_phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="special_requests" class="block text-sm font-medium text-slate-700 mb-2">Special Requests (Optional)</label>
                        <textarea name="special_requests" id="special_requests" rows="3"
                                  class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500">{{ old('special_requests') }}</textarea>
                        @error('special_requests')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-orange-500 text-white px-6 py-3 rounded-xl hover:bg-orange-600 transition font-semibold shadow-md">
                        Confirm Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
