@extends('layouts.app')

@section('title', 'Available Rooms')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-slate-800 mb-6 flex items-center gap-2">
        <span class="w-1 h-10 bg-orange-500 rounded"></span>
        Available Rooms
    </h1>

    <!-- Search Form -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 border border-orange-50">
        <form action="{{ route('rooms.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="check_in" class="block text-sm font-medium text-slate-700 mb-2">Check-in Date</label>
                <input type="date" name="check_in" id="check_in" 
                       value="{{ request('check_in') }}" 
                       min="{{ date('Y-m-d') }}"
                       class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500">
            </div>
            <div>
                <label for="check_out" class="block text-sm font-medium text-slate-700 mb-2">Check-out Date</label>
                <input type="date" name="check_out" id="check_out" 
                       value="{{ request('check_out') }}"
                       min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                       class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500">
            </div>
            <div>
                <label for="guests" class="block text-sm font-medium text-slate-700 mb-2">Guests</label>
                <input type="number" name="guests" id="guests" 
                       value="{{ request('guests', 1) }}" 
                       min="1" max="10"
                       class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500">
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 font-semibold transition shadow-md">
                    Search
                </button>
            </div>
        </form>
    </div>

    <!-- Rooms Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($rooms as $room)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition border border-slate-100 group">
                @if($room->image)
                    <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                @else
                    <div class="w-full h-48 bg-gradient-to-br from-orange-100 to-sky-100 flex items-center justify-center">
                        <span class="text-slate-400">No Image</span>
                    </div>
                @endif
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-semibold text-slate-800">{{ $room->name }}</h3>
                        <span class="bg-sky-100 text-sky-800 text-xs font-semibold px-2 py-1 rounded-lg">{{ $room->type }}</span>
                    </div>
                    <p class="text-slate-600 mb-4">{{ \Illuminate\Support\Str::limit($room->description, 100) }}</p>
                    
                    <div class="mb-4">
                        <p class="text-sm text-slate-500 mb-1">
                            <span class="font-medium">Capacity:</span> {{ $room->capacity }} guests
                        </p>
                        @if($room->amenities)
                            <p class="text-sm text-slate-500">
                                <span class="font-medium">Amenities:</span> {{ implode(', ', array_slice($room->amenities, 0, 3)) }}
                            </p>
                        @endif
                    </div>

                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <span class="text-2xl font-bold text-orange-600">${{ number_format($room->price_per_night, 2) }}</span>
                            <span class="text-sm text-slate-500">/night</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('bookings.create', ['room' => $room, 'check_in' => request('check_in'), 'check_out' => request('check_out'), 'guests' => request('guests', 1)]) }}" 
                       class="block w-full text-center bg-orange-500 text-white px-4 py-3 rounded-xl hover:bg-orange-600 font-semibold transition">
                        Book Now
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 bg-white rounded-2xl shadow-lg">
                <p class="text-slate-500 text-lg">No rooms available for the selected dates.</p>
                <a href="{{ route('rooms.index') }}" class="mt-4 inline-block text-orange-600 hover:text-orange-700 font-medium">View All Rooms</a>
            </div>
        @endforelse
    </div>
</div>
@endsection
