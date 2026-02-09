@extends('layouts.app')

@section('title', 'Booking Confirmation')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Booking Confirmed!</h1>
            <p class="text-slate-600">Your reservation has been successfully created.</p>
        </div>

        <div class="border-t border-b border-slate-200 py-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-lg font-semibold text-slate-800 mb-4">Booking Details</h2>
                    <div class="space-y-3">
                        <div>
                            <span class="text-sm text-slate-500">Booking Reference:</span>
                            <p class="text-lg font-bold text-orange-600">{{ $booking->booking_reference }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-slate-500">Room:</span>
                            <p class="font-medium">{{ $booking->room->name }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-slate-500">Status:</span>
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                                @if($booking->status == 'confirmed') bg-green-100 text-green-800
                                @elseif($booking->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                                @else bg-slate-100 text-slate-800
                                @endif">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-slate-800 mb-4">Guest Information</h2>
                    <div class="space-y-3">
                        <div>
                            <span class="text-sm text-slate-500">Name:</span>
                            <p class="font-medium">{{ $booking->guest_name }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-slate-500">Email:</span>
                            <p class="font-medium">{{ $booking->guest_email }}</p>
                        </div>
                        @if($booking->guest_phone)
                            <div>
                                <span class="text-sm text-slate-500">Phone:</span>
                                <p class="font-medium">{{ $booking->guest_phone }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-slate-50 rounded-lg p-4">
                <p class="text-sm text-slate-500 mb-1">Check-in</p>
                <p class="text-xl font-bold">{{ $booking->check_in->format('M d, Y') }}</p>
            </div>
            <div class="bg-slate-50 rounded-lg p-4">
                <p class="text-sm text-slate-500 mb-1">Check-out</p>
                <p class="text-xl font-bold">{{ $booking->check_out->format('M d, Y') }}</p>
            </div>
            <div class="bg-slate-50 rounded-lg p-4">
                <p class="text-sm text-slate-500 mb-1">Total Price</p>
                <p class="text-xl font-bold text-orange-600">${{ number_format($booking->total_price, 2) }}</p>
                <p class="text-xs text-slate-500 mt-1">{{ $booking->number_of_nights }} night(s)</p>
            </div>
        </div>

        @if($booking->special_requests)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-slate-800 mb-2">Special Requests</h3>
                <p class="text-slate-700 bg-slate-50 p-4 rounded-lg">{{ $booking->special_requests }}</p>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('rooms.index') }}" class="flex-1 text-center bg-slate-200 text-slate-800 px-6 py-3 rounded-xl hover:bg-slate-300 transition font-semibold">
                Book Another Room
            </a>
            <a href="{{ route('bookings.index') }}" class="flex-1 text-center bg-orange-500 text-white px-6 py-3 rounded-xl hover:bg-orange-600 transition font-semibold">
                View All Bookings
            </a>
        </div>
    </div>
</div>
@endsection
