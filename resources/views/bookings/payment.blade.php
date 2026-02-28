@extends('layouts.app')

@section('title', 'Complete Payment')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-serif font-bold text-black mb-4">Complete Your Payment</h1>
            <p class="text-slate-600">Booking Reference: <span
                    class="font-bold text-accent-500">{{ $booking->booking_reference }}</span></p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100 mb-8">
            <div class="flex justify-between items-center mb-6 border-b border-slate-100 pb-6">
                <div>
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Total Amount</p>
                    <p class="text-3xl font-bold text-black">${{ number_format($booking->total_price, 2) }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Payment Method</p>
                    <p class="text-lg font-bold text-accent-500 flex items-center gap-2 justify-end">
                        @if($booking->payment_method === 'mpesa')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            M-Pesa
                        @else
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Credit/Debit Card
                        @endif
                    </p>
                </div>
            </div>

            <form action="{{ route('bookings.payment.process', $booking) }}" method="POST">
                @csrf

                @if($booking->payment_method === 'mpesa')
                    <div class="mb-6">
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">M-Pesa Phone Number</label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-500 font-medium">+255</span>
                            <input type="text" id="phone" name="phone" placeholder="7XXXXXXXX" required
                                value="{{ old('phone') }}"
                                class="w-full pl-16 border-slate-300 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500 py-3 @error('phone') border-red-500 @enderror">
                        </div>
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-sm text-slate-500 mt-2">Enter your M-Pesa number to receive a payment prompt on your
                            phone.</p>
                    </div>
                @else
                    <div class="space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Cardholder Name</label>
                            <input type="text" name="card_name" required value="{{ old('card_name') }}"
                                class="w-full border-slate-300 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500 py-3 @error('card_name') border-red-500 @enderror">
                            @error('card_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Card Number</label>
                            <input type="text" name="card_number" placeholder="XXXX XXXX XXXX XXXX" required
                                value="{{ old('card_number') }}"
                                class="w-full border-slate-300 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500 py-3 @error('card_number') border-red-500 @enderror">
                            @error('card_number')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Expiry Date</label>
                                <input type="text" name="expiry" placeholder="MM/YY" required value="{{ old('expiry') }}"
                                    class="w-full border-slate-300 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500 py-3 @error('expiry') border-red-500 @enderror">
                                @error('expiry')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">CVV</label>
                                <input type="text" name="cvv" placeholder="XXX" required value="{{ old('cvv') }}"
                                    class="w-full border-slate-300 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500 py-3 @error('cvv') border-red-500 @enderror">
                                @error('cvv')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif

                <button type="submit"
                    class="w-full bg-accent-500 text-white px-6 py-4 rounded-xl hover:bg-accent-600 transition font-bold shadow-lg text-lg flex justify-center items-center gap-2">
                    Pay ${{ number_format($booking->total_price, 2) }} Now
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
@endsection