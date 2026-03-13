@extends('layouts.app')

@section('title', 'Booking Confirmation')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(request('payment_success'))
            <div class="mb-8 bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg shadow-sm animate-bounce-short">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700 font-bold">
                            Payment Confirmed! Your booking is now fully secured.
                        </p>
                    </div>
                </div>
            </div>
        @endif

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

            @auth
                @php $user = auth()->user(); @endphp
                @if(($user->isAdmin() || $user->isReceptionist() || $user->isManager()) && $booking->status !== 'completed')
                    <div class="bg-slate-50 border border-slate-200 rounded-3xl p-8 mb-10 shadow-sm border-dashed">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center text-primary-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-slate-900">Staff Management Console</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            {{-- Check In --}}
                            @if($booking->status === 'confirmed')
                                <form action="{{ route('bookings.checkin', $booking) }}" method="POST" class="h-full">
                                    @csrf
                                    <button type="submit" class="w-full h-full bg-emerald-600 hover:bg-emerald-700 text-white p-4 rounded-2xl font-bold shadow-lg shadow-emerald-500/20 transition-all hover:-translate-y-1 flex items-center justify-center gap-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                                        Check In
                                    </button>
                                </form>
                            @endif

                            {{-- Check Out --}}
                            @if($booking->status === 'checked_in')
                                <form action="{{ route('bookings.checkout', $booking) }}" method="POST" onsubmit="return confirm('Confirm check out? Ensure all bills are paid.');" class="h-full">
                                    @csrf
                                    <button type="submit" class="w-full h-full bg-primary-600 hover:bg-primary-700 text-white p-4 rounded-2xl font-bold shadow-lg shadow-primary-500/20 transition-all hover:-translate-y-1 flex items-center justify-center gap-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                        Check Out
                                    </button>
                                </form>
                            @endif

                            {{-- Modify Stay --}}
                            @if(in_array($booking->status, ['confirmed', 'checked_in']))
                                <a href="{{ route('bookings.extend', $booking) }}" class="bg-white border-2 border-slate-200 text-slate-700 p-4 rounded-2xl font-bold shadow-sm hover:bg-slate-50 transition-all hover:border-primary-300 flex items-center justify-center gap-3">
                                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    Modify Stay
                                </a>
                            @endif

                            {{-- Mark as Paid --}}
                            @if($booking->payment_status !== 'paid')
                                <form action="{{ route('bookings.update-payment-status', $booking) }}" method="POST" class="h-full">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="payment_status" value="paid">
                                    <button type="submit" class="w-full h-full bg-slate-800 hover:bg-slate-900 text-white p-4 rounded-2xl font-bold shadow-lg transition-all hover:-translate-y-1 flex items-center justify-center gap-3">
                                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Mark as Paid
                                    </button>
                                </form>
                            @endif

                            {{-- Confirm (if pending) --}}
                            @if($booking->status === 'pending')
                                <form action="{{ route('bookings.update-status', $booking) }}" method="POST" class="h-full">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit" class="w-full h-full bg-amber-500 hover:bg-amber-600 text-white p-4 rounded-2xl font-bold shadow-lg shadow-amber-500/20 transition-all hover:-translate-y-1 flex items-center justify-center gap-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Confirm Reservation
                                    </button>
                                </form>
                            @endif

                            {{-- Cancel --}}
                            @if($booking->status !== 'cancelled' && $booking->status !== 'completed')
                                <form action="{{ route('bookings.update-status', $booking) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this booking?');" class="h-full">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" class="w-full h-full bg-red-50 hover:bg-red-100 text-red-600 p-4 rounded-2xl font-bold border-2 border-red-200 transition-all flex items-center justify-center gap-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        Cancel Booking
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endif
            @endauth

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
                            <div>
                                <span class="text-sm text-slate-500">Payment:</span>
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                                        @if($booking->payment_status == 'paid') bg-emerald-100 text-emerald-800
                                        @elseif($booking->payment_status == 'pending') bg-rose-100 text-rose-800
                                        @else bg-slate-100 text-slate-800
                                        @endif">
                                    {{ ucfirst($booking->payment_status) }} ({{ ucfirst($booking->payment_method) }})
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
                            @if($booking->guest_address)
                                <div>
                                    <span class="text-sm text-slate-500">Address:</span>
                                    <p class="font-medium">{{ $booking->guest_address }}</p>
                                </div>
                            @endif
                            @if($booking->guest_passport_id)
                                <div>
                                    <span class="text-sm text-slate-500">Passport / ID Number:</span>
                                    <p class="font-medium">{{ $booking->guest_passport_id }}</p>
                                </div>
                            @endif
                            @if($booking->contact_preference)
                                <div>
                                    <span class="text-sm text-slate-500">Preferred Contact:</span>
                                    <p class="font-medium capitalize flex items-center gap-1">
                                        @if($booking->contact_preference === 'whatsapp')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800">WhatsApp</span>
                                        @elseif($booking->contact_preference === 'phone')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-primary-100 text-primary-800">Phone Call</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-orange-100 text-orange-800">Email</span>
                                        @endif
                                    </p>
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
                    <p class="text-xs text-orange-400 font-bold uppercase">{{ number_format($booking->total_price * \App\Models\Room::USD_TO_TZS, 0) }} TZS</p>
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