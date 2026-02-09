@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-orange-500 via-orange-600 to-sky-600 rounded-2xl shadow-2xl p-12 text-white mb-12 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to Salpat Camp</h1>
            <p class="text-xl mb-8 text-white/95">Experience comfort and luxury in the heart of nature</p>
            <a href="{{ route('rooms.index') }}" class="inline-block bg-white text-orange-600 px-8 py-3 rounded-xl font-bold hover:bg-orange-50 shadow-lg transition transform hover:scale-105">
                Book Your Stay
            </a>
        </div>
    </div>

    <!-- Booking Search Form -->
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-12 border border-orange-50">
        <h2 class="text-2xl font-bold mb-6 text-slate-800 flex items-center gap-2">
            <span class="w-1 h-8 bg-orange-500 rounded"></span>
            Search for Available Rooms
        </h2>
        <form action="{{ route('rooms.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="check_in" class="block text-sm font-medium text-slate-700 mb-2">Check-in Date</label>
                <input type="date" name="check_in" id="check_in" 
                       value="{{ request('check_in') }}" 
                       min="{{ date('Y-m-d') }}"
                       class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
            </div>
            <div>
                <label for="check_out" class="block text-sm font-medium text-slate-700 mb-2">Check-out Date</label>
                <input type="date" name="check_out" id="check_out" 
                       value="{{ request('check_out') }}"
                       min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                       class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
            </div>
            <div>
                <label for="guests" class="block text-sm font-medium text-slate-700 mb-2">Number of Guests</label>
                <input type="number" name="guests" id="guests" 
                       value="{{ request('guests', 1) }}" 
                       min="1" max="10"
                       class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 font-semibold transition shadow-md">
                    Search Rooms
                </button>
            </div>
        </form>
    </div>

    <!-- Featured Rooms -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-slate-800 mb-6 flex items-center gap-2">
            <span class="w-1 h-10 bg-sky-500 rounded"></span>
            Featured Rooms
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($featuredRooms ?? [] as $room)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition border border-slate-100 group">
                    @if($room->image)
                        <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-orange-100 to-sky-100 flex items-center justify-center">
                            <span class="text-slate-400">No Image</span>
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-slate-800">{{ $room->name }}</h3>
                        <p class="text-slate-600 mb-4">{{ \Illuminate\Support\Str::limit($room->description, 100) }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-orange-600">${{ number_format($room->price_per_night, 2) }}</span>
                            <span class="text-sm text-slate-500">per night</span>
                        </div>
                        <a href="{{ route('rooms.show', $room) }}" class="block w-full text-center bg-orange-500 text-white px-4 py-3 rounded-xl hover:bg-orange-600 font-semibold transition">
                            View Details
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 bg-white rounded-2xl">
                    <p class="text-slate-500">No rooms available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
