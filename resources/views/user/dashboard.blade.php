@extends('layouts.panel')

@section('title', 'My Bookings')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-slate-800 mb-8">My Bookings</h1>

    <div class="mb-6">
        <a href="{{ route('rooms.index') }}" class="bg-orange-600 text-white px-6 py-2 rounded-md hover:bg-orange-700 font-medium inline-block">
            Book a Room
        </a>
    </div>

    <!-- My Bookings -->
    <div class="bg-white rounded-lg shadow overflow-hidden mb-12">
        <div class="px-6 py-4 border-b border-slate-200">
            <h2 class="text-xl font-semibold text-slate-800">Your Reservations</h2>
        </div>
        @if($myBookings->count() > 0)
            <div class="divide-y divide-slate-200">
                @foreach($myBookings as $booking)
                    <div class="px-6 py-4 hover:bg-slate-50 flex flex-wrap items-center justify-between gap-4">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3 mb-1">
                                <span class="font-semibold text-orange-600">{{ $booking->booking_reference }}</span>
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-full
                                    @if($booking->status == 'confirmed') bg-green-100 text-green-800
                                    @elseif($booking->status == 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                                    @else bg-slate-100 text-slate-800
                                    @endif">{{ ucfirst($booking->status) }}</span>
                            </div>
                            <div class="text-sm text-slate-600">
                                {{ $booking->room->name }} · {{ $booking->check_in->format('M d, Y') }} – {{ $booking->check_out->format('M d, Y') }} · ${{ number_format($booking->total_price, 2) }}
                            </div>
                        </div>
                        <a href="{{ route('bookings.show', $booking) }}" class="text-orange-600 hover:text-orange-900 font-medium text-sm">View Details</a>
                    </div>
                @endforeach
            </div>
            @if($myBookings->hasPages())
                <div class="px-6 py-4 border-t">{{ $myBookings->links() }}</div>
            @endif
        @else
            <div class="px-6 py-12 text-center text-slate-500">
                <p class="mb-4">You haven't made any bookings yet.</p>
                <a href="{{ route('rooms.index') }}" class="text-orange-600 hover:text-orange-800 font-medium">Browse rooms and book your stay</a>
            </div>
        @endif
    </div>

    <!-- Featured Rooms -->
    @if($featuredRooms->count() > 0)
        <h2 class="text-xl font-semibold text-slate-800 mb-4">Suggested for You</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($featuredRooms as $room)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    @if($room->image)
                        <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="w-full h-40 object-cover">
                    @else
                        <div class="w-full h-40 bg-slate-200 flex items-center justify-center">
                            <span class="text-slate-400">No Image</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <h3 class="font-semibold text-slate-800 mb-1">{{ $room->name }}</h3>
                        <p class="text-orange-600 font-bold mb-2">${{ number_format($room->price_per_night, 2) }}/night</p>
                        <a href="{{ route('rooms.show', $room) }}" class="text-orange-600 hover:text-orange-800 text-sm font-medium">View & Book →</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
