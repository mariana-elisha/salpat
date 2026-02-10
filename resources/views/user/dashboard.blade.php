@extends('layouts.panel')

@section('title', 'My Bookings')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-serif font-bold text-slate-800">My Bookings</h1>
            <a href="{{ route('rooms.index') }}"
                class="bg-primary-600 text-white px-6 py-2.5 rounded-lg hover:bg-primary-700 font-semibold shadow-md transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Book a Room
            </a>
        </div>

        <!-- My Bookings -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-12">
            <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                <h2 class="text-lg font-semibold text-slate-800">Your Reservations</h2>
            </div>
            @if($myBookings->count() > 0)
                <div class="divide-y divide-slate-100">
                    @foreach($myBookings as $booking)
                        <div
                            class="px-6 py-5 hover:bg-slate-50 transition-colors flex flex-wrap items-center justify-between gap-4 group">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-3 mb-1">
                                    <span
                                        class="font-mono text-sm font-bold text-primary-600 bg-primary-50 px-2 py-1 rounded">{{ $booking->booking_reference }}</span>
                                    <span class="px-2.5 py-0.5 text-xs font-bold rounded-full uppercase tracking-wide
                                                @if($booking->status == 'confirmed') bg-green-100 text-green-700
                                                @elseif($booking->status == 'pending') bg-amber-100 text-amber-700
                                                @elseif($booking->status == 'cancelled') bg-red-100 text-red-700
                                                @else bg-slate-100 text-slate-700
                                                @endif">{{ ucfirst($booking->status) }}</span>
                                </div>
                                <div class="flex items-center gap-4 text-sm text-slate-600 mt-2">
                                    <span class="font-medium text-slate-900">{{ $booking->room->name }}</span>
                                    <span class="text-slate-300">|</span>
                                    <span>{{ $booking->check_in->format('M d, Y') }} –
                                        {{ $booking->check_out->format('M d, Y') }}</span>
                                    <span class="text-slate-300">|</span>
                                    <span class="font-semibold text-slate-900">${{ number_format($booking->total_price, 2) }}</span>
                                </div>
                            </div>
                            <a href="{{ route('bookings.show', $booking) }}"
                                class="text-slate-400 hover:text-primary-600 font-medium text-sm flex items-center gap-1 transition-colors group-hover:translate-x-1">
                                View Details
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
                @if($myBookings->hasPages())
                    <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50">{{ $myBookings->links() }}</div>
                @endif
            @else
                <div class="px-6 py-16 text-center text-slate-500 bg-slate-50/50">
                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="mb-4 text-lg">You haven't made any bookings yet.</p>
                    <a href="{{ route('rooms.index') }}"
                        class="text-primary-600 hover:text-primary-700 font-semibold hover:underline">Browse rooms and book your
                        stay</a>
                </div>
            @endif
        </div>

        <!-- Featured Rooms -->
        @if($featuredRooms->count() > 0)
            <div class="flex items-center gap-3 mb-6">
                <h2 class="text-xl font-serif font-bold text-slate-800">Suggested for You</h2>
                <div class="h-px bg-slate-200 flex-grow"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($featuredRooms as $room)
                    <div
                        class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-lg transition-all group">
                        <div class="relative h-48 overflow-hidden">
                            @if($room->image)
                                <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
                                <span class="text-white font-bold text-lg">${{ number_format($room->price_per_night, 0) }}<span
                                        class="text-sm font-normal opacity-80">/night</span></span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-serif font-bold text-slate-800 mb-2 truncate">{{ $room->name }}</h3>
                            <a href="{{ route('rooms.show', $room) }}"
                                class="inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold text-sm group-hover:underline">
                                View & Book
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection