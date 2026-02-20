@extends('layouts.panel')

@section('title', 'Guest Bill & Checkout')

@section('breadcrumbs', 'Receptionist / Billing / #' . $booking->id)

@section('content')
    <div class="max-w-4xl mx-auto space-y-8 print:p-0">
        <!-- Header/Branding for Print -->
        <div class="flex justify-between items-start pb-8 border-b border-slate-200">
            <div>
                <h1 class="text-3xl font-serif font-bold text-slate-900 uppercase">INVOICE</h1>
                <p class="text-slate-500 mt-1">Ref: #SAL-{{ date('Y') }}-{{ $booking->id }}</p>
            </div>
            <div class="text-right">
                <h2 class="text-xl font-bold text-primary-600">Salpat Camp Hotel</h2>
                <p class="text-sm text-slate-500">Falcon Street 1, Soweto Moshi, Kilimanjaro, Tanzania</p>
                <p class="text-sm text-slate-500">+255 0770 307 759</p>
                <p class="text-sm text-slate-500">salpatcamp@yahoo.com</p>
            </div>
        </div>

        <!-- Bill Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 py-6">
            <div>
                <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-2">Guest Details</h3>
                <p class="text-lg font-bold text-slate-900">{{ $booking->user?->name ?? $booking->guest_name ?? 'Guest' }}
                </p>
                <p class="text-sm text-slate-500">{{ $booking->user?->email ?? $booking->guest_email ?? 'N/A' }}</p>
            </div>
            <div class="text-left md:text-right">
                <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-2">Stay Duration</h3>
                <p class="text-slate-900 font-medium">{{ $booking->check_in->format('M d, Y') }} —
                    {{ $booking->check_out->format('M d, Y') }}
                </p>
                <p class="text-sm text-slate-500">{{ $booking->check_in->diffInDays($booking->check_out) }} Nights, Room:
                    {{ $booking->room->name }}
                </p>
            </div>
        </div>

        <!-- Charges Table -->
        <div class="card overflow-hidden bg-white">
            <table class="min-w-full divide-y divide-slate-100">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-500 uppercase">description</th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-slate-500 uppercase">Qty</th>
                        <th class="px-6 py-3 text-right text-xs font-bold text-slate-500 uppercase">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <!-- Room Charge -->
                    <tr>
                        <td class="px-6 py-4">
                            <span class="font-bold text-slate-900">Room Accommodation</span>
                            <span class="block text-xs text-slate-400 italic">Stay Charge: {{ $booking->room->name }}
                                ({{ $booking->room->type }})</span>
                        </td>
                        <td class="px-6 py-4 text-center text-sm text-slate-600">1</td>
                        <td class="px-6 py-4 text-right font-medium text-slate-900">
                            ${{ number_format($booking->total_price, 2) }}</td>
                    </tr>

                    <!-- Service Orders -->
                    @foreach($serviceOrders as $order)
                        <tr>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-900">{{ $order->service->name }}</span>
                                <span class="block text-xs text-slate-400 italic">{{ ucfirst($order->service->type) }} service
                                    requested on {{ $order->requested_at->format('M d, H:i') }}</span>
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-slate-600">{{ $order->quantity }}</td>
                            <td class="px-6 py-4 text-right font-medium text-slate-900">
                                ${{ number_format($order->total_price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-slate-900 text-white">
                    <tr>
                        <td colspan="2"
                            class="px-6 py-4 text-right text-sm font-medium uppercase tracking-widest opacity-70">Subtotal
                            (Services)</td>
                        <td class="px-6 py-4 text-right text-lg font-bold text-accent-400 font-mono">
                            ${{ number_format($servicesTotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"
                            class="px-6 py-6 text-right text-xl font-bold uppercase tracking-widest border-t border-white/10">
                            Grand Total</td>
                        <td
                            class="px-6 py-6 text-right text-4xl font-black text-accent-400 font-mono border-t border-white/10 decoration-accent-400">
                            ${{ number_format($grandTotal, 2) }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 justify-end items-center print:hidden">
            <button onclick="window.print()"
                class="flex items-center gap-2 text-slate-500 hover:text-slate-900 font-bold transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h6z" />
                </svg>
                Print Bill
            </button>
            <form action="{{ route('bookings.update-status', $booking) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="completed">
                <button type="submit"
                    class="btn-primary px-8 py-3 rounded-xl shadow-lg hover:shadow-primary-500/30 transition-all font-bold">
                    Confirm Payment & Checkout
                </button>
            </form>
        </div>

        <!-- Disclaimer -->
        <div class="text-center pt-12 text-slate-400 text-xs italic border-t border-slate-100 uppercase tracking-widest">
            Thank you for choosing Salpat Camp. Have a safe journey home!
        </div>
    </div>
@endsection