@extends('layouts.app')

@section('title', 'Book Room')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-slate-800 mb-6">Book {{ $room->name }}</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Booking Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-semibold mb-6">Booking Information</h2>
                
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="check_in" class="block text-sm font-medium text-slate-700 mb-2">Check-in Date</label>
                            <input type="date" name="check_in" id="check_in" 
                                   value="{{ old('check_in', $checkIn) }}" 
                                   min="{{ date('Y-m-d') }}"
                                   class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                        </div>
                        <div>
                            <label for="check_out" class="block text-sm font-medium text-slate-700 mb-2">Check-out Date</label>
                            <input type="date" name="check_out" id="check_out" 
                                   value="{{ old('check_out', $checkOut) }}"
                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                   class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="number_of_guests" class="block text-sm font-medium text-slate-700 mb-2">Number of Guests</label>
                        <input type="number" name="number_of_guests" id="number_of_guests" 
                               value="{{ old('number_of_guests', $guests ?? 1) }}" 
                               min="1" max="{{ $room->capacity }}"
                               class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                        <p class="mt-1 text-sm text-slate-500">Maximum capacity: {{ $room->capacity }} guests</p>
                    </div>

                    <div class="mb-4">
                        <label for="guest_name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                        <input type="text" name="guest_name" id="guest_name" 
                               value="{{ old('guest_name', auth()->user()->name ?? '') }}"
                               class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="guest_email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                        <input type="email" name="guest_email" id="guest_email" 
                               value="{{ old('guest_email', auth()->user()->email ?? '') }}"
                               class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="guest_phone" class="block text-sm font-medium text-slate-700 mb-2">Phone Number (Optional)</label>
                        <input type="tel" name="guest_phone" id="guest_phone" 
                               value="{{ old('guest_phone') }}"
                               class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    </div>

                    <div class="mb-6">
                        <label for="special_requests" class="block text-sm font-medium text-slate-700 mb-2">Special Requests (Optional)</label>
                        <textarea name="special_requests" id="special_requests" rows="4"
                                  class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500"
                                  placeholder="Any special requests or notes...">{{ old('special_requests') }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-orange-600 text-white px-6 py-3 rounded-xl hover:bg-orange-700 transition font-semibold">
                        Confirm Booking
                    </button>
                </form>
            </div>
        </div>

        <!-- Room Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg p-6 sticky top-4">
                <h3 class="text-xl font-semibold mb-4">Room Summary</h3>
                
                @if($room->image)
                    <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="w-full h-48 object-cover rounded-xl mb-4">
                @else
                    <div class="w-full h-48 bg-gray-200 rounded-xl mb-4 flex items-center justify-center">
                        <span class="text-slate-400">No Image</span>
                    </div>
                @endif

                <h4 class="font-semibold text-lg mb-2">{{ $room->name }}</h4>
                <p class="text-sm text-slate-600 mb-4">{{ \Illuminate\Support\Str::limit($room->description, 100) }}</p>

                <div class="border-t border-slate-200 pt-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-slate-600">Price per night:</span>
                        <span class="font-semibold">${{ number_format($room->price_per_night, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-slate-600">Capacity:</span>
                        <span class="font-semibold">{{ $room->capacity }} guests</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Type:</span>
                        <span class="font-semibold">{{ $room->type }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
