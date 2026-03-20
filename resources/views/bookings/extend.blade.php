@extends('layouts.panel')

@section('title', 'Modify Stay - ' . $booking->booking_reference)

@section('content')
<div class="max-w-3xl mx-auto py-12">
    <div class="bg-slate-900 rounded-3xl shadow-2xl overflow-hidden border border-slate-800">
        <div class="p-8 text-white relative">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10"></div>
            <div class="relative z-10">
                <h1 class="text-3xl font-serif font-bold mb-2">Modify Guest Stay</h1>
                <p class="text-primary-400 font-bold uppercase tracking-widest text-xs">Booking #{{ $booking->booking_reference }} — {{ $booking->room->name }}</p>
            </div>
        </div>

        <div class="p-8 md:p-12 bg-white rounded-t-[3rem]">
            <div class="mb-10 grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Current Check-out</p>
                    <p class="text-xl font-bold text-slate-900">{{ $booking->check_out->format('D, M j, Y') }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Status</p>
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-primary-100 text-primary-700 capitalize">{{ str_replace('_', ' ', $booking->status) }}</span>
                </div>
            </div>

            <form action="{{ route('bookings.extend.update', $booking) }}" method="POST" class="space-y-8">
                @csrf
                <div>
                    <label for="new_check_out" class="block text-sm font-bold text-slate-700 mb-2">New Departure Date</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-primary-500">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </span>
                        <input type="date" name="new_check_out" id="new_check_out" 
                               min="{{ $booking->check_in->addDay()->format('Y-m-d') }}"
                               value="{{ old('new_check_out', $booking->check_out->format('Y-m-d')) }}"
                               class="w-full pl-14 pr-4 py-5 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:border-primary-500 focus:bg-white focus:ring-4 focus:ring-primary-500/10 transition-all font-bold text-xl text-slate-900" required>
                    </div>
                    <div class="mt-4 p-4 bg-primary-50 rounded-xl border border-primary-100 flex gap-3">
                        <svg class="w-5 h-5 text-primary-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-xs text-primary-800 leading-relaxed font-medium">
                            Staff Note: Changing the checkout date will automatically recalculate the total price based on the daily rate. Availability will be checked for any stay extensions.
                        </p>
                    </div>
                </div>

                <div class="pt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('bookings.show', $booking) }}" class="flex-1 px-8 py-4 border-2 border-slate-200 rounded-2xl text-center font-bold text-slate-600 hover:bg-slate-50 transition-all">
                        Discard Changes
                    </a>
                    <button type="submit" class="flex-[2] bg-primary-600 text-white px-8 py-4 rounded-2xl font-bold text-xl shadow-xl shadow-primary-500/30 hover:bg-primary-700 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                        Save Modification
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
