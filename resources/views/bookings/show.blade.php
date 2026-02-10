@extends('layouts.app')

@section('title', 'Booking Confirmation')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 {{ $booking->status == 'confirmed' ? 'bg-green-100 text-green-600' : ($booking->status == 'cancelled' ? 'bg-red-100 text-red-600' : 'bg-yellow-100 text-yellow-600') }} rounded-full mb-4">
                    @if($booking->status == 'confirmed')
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    @elseif($booking->status == 'cancelled')
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    @else
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    @endif
                </div>
                <h1 class="text-3xl font-bold text-slate-800 mb-2">
                    @if($booking->status == 'confirmed')
                        Booking Confirmed!
                    @elseif($booking->status == 'cancelled')
                        Booking Cancelled
                    @else
                        Booking Pending
                    @endif
                </h1>
                <p class="text-slate-600">
                    @if($booking->status == 'confirmed')
                        Your reservation has been successfully confirmed.
                    @elseif($booking->status == 'cancelled')
                        This reservation has been cancelled.
                    @else
                        Your reservation is awaiting confirmation.
                    @endif
                </p>
            </div>

            @if((auth()->user()->isAdmin() || auth()->user()->isReceptionist()) && $booking->status !== 'completed')
                <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 mb-8">
                    <h3 class="text-lg font-semibold text-slate-800 mb-4">Manage Booking</h3>
                    <div class="flex flex-wrap gap-4">
                        @if($booking->status === 'pending')
                            <form action="{{ route('bookings.update-status', $booking) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="confirmed">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                    Confirm Booking
                                </button>
                            </form>
                        @endif

                        @if($booking->status !== 'cancelled')
                            <form action="{{ route('bookings.update-status', $booking) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="cancelled">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Cancel Booking
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endif

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
                <a href="{{ route('rooms.index') }}"
                    class="flex-1 text-center bg-slate-200 text-slate-800 px-6 py-3 rounded-xl hover:bg-slate-300 transition font-semibold">
                    Book Another Room
                </a>
                <a href="{{ route('bookings.index') }}"
                    class="flex-1 text-center bg-orange-500 text-white px-6 py-3 rounded-xl hover:bg-orange-600 transition font-semibold">
                    View All Bookings
                </a>
            </div>
        </div>
    </div>
@endsection