@extends('layouts.app')

@section('title', 'Processing Payment')

@section('content')
    <div class="min-h-[60vh] flex items-center justify-center px-4" x-data="{ 
            progress: 0,
            message: '{{ $booking->payment_method === 'mpesa' ? 'Sending prompt to your phone...' : 'Connecting to secure bank gateway...' }}',
            steps: [
                { p: 15, m: '{{ $booking->payment_method === 'mpesa' ? 'Prompt sent! Please check your phone.' : 'Verifying card details...' }}' },
                { p: 40, m: '{{ $booking->payment_method === 'mpesa' ? 'Waiting for PIN entry...' : 'Authorizing transaction...' }}' },
                { p: 70, m: '{{ $booking->payment_method === 'mpesa' ? 'PIN verified. Finalizing...' : 'Transaction approved. Syncing...' }}' },
                { p: 100, m: 'Completed!' }
            ],
            init() {
                let interval = setInterval(() => {
                    if (this.progress < 100) {
                        this.progress += 1;
                        let currentStep = this.steps.find(s => this.progress >= s.p && this.progress < s.p + 5);
                        if (currentStep) this.message = currentStep.m;
                    } else {
                        clearInterval(interval);
                        window.location.href = '{{ route('bookings.show', $booking) }}?payment_success=1';
                    }
                }, 80);
            }
        }">
        <div class="max-w-md w-full text-center">
            <!-- Animated Icon -->
            <div class="relative mb-12">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="h-32 w-32 rounded-full border-4 border-slate-100 border-t-accent-500 animate-spin"></div>
                </div>
                <div class="relative flex items-center justify-center h-32">
                    @if($booking->payment_method === 'mpesa')
                        <svg class="h-16 w-16 text-accent-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                    @else
                        <svg class="h-16 w-16 text-accent-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75-3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75" />
                        </svg>
                    @endif
                </div>
            </div>

            <h2 class="text-3xl font-serif font-bold text-black mb-4" x-text="message"></h2>

            @if($booking->payment_method === 'mpesa')
                <p class="text-slate-600 mb-8">
                    We've sent a payment request to <span class="font-bold text-black">+255 {{ request('phone') }}</span>.
                    Please enter your PIN on your phone to complete the payment for <span
                        class="text-accent-600 font-bold">${{ number_format($booking->total_price, 2) }}</span>.
                </p>
            @else
                <p class="text-slate-600 mb-8">
                    Please do not close this window or refresh the page. We are securely processing your payment for <span
                        class="text-accent-600 font-bold">${{ number_format($booking->total_price, 2) }}</span>.
                </p>
            @endif

            <!-- Progress Bar -->
            <div class="w-full bg-slate-100 rounded-full h-2.5 mb-12">
                <div class="bg-accent-500 h-2.5 rounded-full transition-all duration-300 ease-out"
                    :style="`width: ${progress}%`"></div>
            </div>

            <div class="flex items-center justify-center gap-2 text-slate-400 text-sm">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
                Secure Encrypted Transaction
            </div>
        </div>
    </div>
@endsection