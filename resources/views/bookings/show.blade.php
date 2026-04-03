@extends('layouts.app')

@section('title', 'Reservation Voucher')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if(request('payment_success'))
            <div class="mb-10 bg-emerald-50 border border-emerald-100 p-6 rounded-2xl shadow-xl flex items-center gap-6 animate-fade-in">
                <div class="flex-shrink-0 w-12 h-12 bg-emerald-600 rounded-full flex items-center justify-center text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-emerald-900 uppercase tracking-widest">Payment Secured</h3>
                    <p class="text-xs text-emerald-700 font-medium">Your sanctuary at Salpat Camp is now fully reserved.</p>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100 relative mb-12">
            <!-- Header Status -->
            <div class="bg-navy p-12 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gold/5 opacity-50"></div>
                <div class="relative z-10">
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full mb-8 bg-white/5 backdrop-blur-3xl border border-white/10">
                        @if($booking->status == 'confirmed')
                            <svg class="w-12 h-12 text-gold animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        @elseif($booking->status == 'cancelled')
                            <svg class="w-12 h-12 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        @else
                            <svg class="w-12 h-12 text-gold/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        @endif
                    </div>
                    <h1 class="text-4xl md:text-5xl font-serif font-bold text-white mb-4 tracking-tight text-center">
                        @if($booking->status == 'confirmed') Reservation <span class="text-gold italic">Secured</span>
                        @elseif($booking->status == 'cancelled') Reservation <span class="text-rose-500 italic">Revoked</span>
                        @else Reservation <span class="text-gold/60 italic">Processing</span>
                        @endif
                    </h1>
                    <p class="text-[10px] font-bold text-gold uppercase tracking-[0.4em] text-center">{{ $booking->booking_reference }}</p>
                </div>
            </div>

            <!-- Staff Control (if applicable) -->
            @auth
                @php $user = auth()->user(); @endphp
                @if($user->isAdmin() || $user->isReceptionist() || $user->isManager())
                    <div class="p-12 bg-slate-50 border-b border-slate-100">
                        <div class="flex items-center gap-4 mb-8">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest bg-white px-4 py-2 rounded-full border border-slate-200">Staff Console</span>
                            <div class="h-px bg-slate-200 flex-grow"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            @if($booking->status === 'confirmed')
                                <form action="{{ route('bookings.checkin', $booking) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full bg-navy text-white py-4 rounded-xl font-bold uppercase tracking-widest text-[10px] hover:bg-gold transition-all shadow-xl shadow-navy/10">Guest Arrival</button>
                                </form>
                            @endif
                            @if($booking->status === 'checked_in')
                                <form action="{{ route('bookings.checkout', $booking) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full bg-navy text-white py-4 rounded-xl font-bold uppercase tracking-widest text-[10px] hover:bg-gold transition-all shadow-xl shadow-navy/10">Final Departure</button>
                                </form>
                            @endif
                            @if($booking->status === 'pending')
                                <form action="{{ route('bookings.update-status', $booking) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit" class="w-full bg-gold text-white py-4 rounded-xl font-bold uppercase tracking-widest text-[10px] hover:bg-navy transition-all shadow-xl shadow-gold/20">Authorize Stay</button>
                                </form>
                            @endif
                            @if($booking->status !== 'cancelled' && $booking->status !== 'completed')
                                <form action="{{ route('bookings.update-status', $booking) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" class="w-full bg-rose-50 border border-rose-100 text-rose-600 py-4 rounded-xl font-bold uppercase tracking-widest text-[10px] hover:bg-rose-100 transition-all">Revoke Booking</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endif
            @endauth

            <div class="p-12 lg:p-16">
                <!-- Voucher Design -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
                    <div class="lg:col-span-2 space-y-12">
                        <div>
                            <h2 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-8 border-l-2 border-gold pl-4 text-left">Resident Information</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                                <div>
                                    <p class="text-[8px] font-bold text-slate-500 uppercase tracking-tighter mb-1 text-left">Primary Guest</p>
                                    <p class="text-xl font-serif font-bold text-navy text-left">{{ $booking->guest_name }}</p>
                                </div>
                                <div>
                                    <p class="text-[8px] font-bold text-slate-500 uppercase tracking-tighter mb-1 text-left">Contact Channel</p>
                                    <p class="text-sm font-bold text-navy uppercase tracking-widest text-left">{{ $booking->guest_email }}</p>
                                </div>
                                <div>
                                    <p class="text-[8px] font-bold text-slate-500 uppercase tracking-tighter mb-1 text-left">Sanctuary Details</p>
                                    <p class="text-sm font-medium text-slate-600 text-left">{{ $booking->room->name }} ({{ $booking->room->type }})</p>
                                </div>
                                <div>
                                    <p class="text-[8px] font-bold text-slate-500 uppercase tracking-tighter mb-1 text-left">Stay Duration</p>
                                    <p class="text-sm font-medium text-slate-600 text-left">{{ $booking->number_of_nights }} Nights of Tranquility</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h2 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-8 border-l-2 border-gold pl-4 text-left">Stay Itinerary</h2>
                            <div class="flex flex-col md:flex-row gap-8 bg-slate-50 p-10 rounded-3xl border border-slate-100 relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-navy/[0.02] rounded-bl-[5rem]"></div>
                                <div class="flex-1 text-left">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase mb-2">Check-In Arrival</p>
                                    <p class="text-2xl font-serif font-bold text-navy">{{ $booking->check_in->format('M d, Y') }}</p>
                                    <p class="text-[10px] text-slate-500 mt-2 font-medium">After 12:00 PM</p>
                                </div>
                                <div class="hidden md:flex items-center justify-center">
                                    <div class="w-12 h-px bg-slate-200"></div>
                                    <div class="w-3 h-3 bg-gold rounded-full ring-4 ring-gold/10 mx-4"></div>
                                    <div class="w-12 h-px bg-slate-200"></div>
                                </div>
                                <div class="flex-1 text-left">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase mb-2">Check-Out Departure</p>
                                    <p class="text-2xl font-serif font-bold text-navy">{{ $booking->check_out->format('M d, Y') }}</p>
                                    <p class="text-[10px] text-slate-500 mt-2 font-medium">Before 10:00 AM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-navy rounded-[2rem] p-10 text-white relative overflow-hidden shadow-2xl">
                            <div class="absolute inset-0 bg-gold/5 opacity-50"></div>
                            <div class="relative z-10 space-y-10 text-center">
                                <h3 class="text-[10px] font-bold text-gold uppercase tracking-[0.3em]">Financial Summary</h3>
                                
                                <div class="space-y-6">
                                    <div class="flex justify-between items-center text-xs font-light">
                                        <span class="text-slate-400">Base Investment</span>
                                        <span class="font-serif">${{ number_format($booking->total_price, 2) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center text-xs font-light">
                                        <span class="text-slate-400">Amenities</span>
                                        <span class="text-gold uppercase font-bold tracking-widest text-[8px]">Inclusive</span>
                                    </div>
                                    <div class="h-px bg-white/10 w-full"></div>
                                    <div class="text-center py-4">
                                        <p class="text-[10px] font-bold text-gold uppercase tracking-widest mb-2">Total Exposure</p>
                                        <p class="text-5xl font-serif font-bold text-white mb-2 text-center items-center justify-center flex">${{ number_format($booking->total_price, 2) }}</p>
                                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest italic text-center">{{ number_format($booking->total_price * \App\Models\Room::USD_TO_TZS, 0) }} TZS</p>
                                    </div>
                                </div>

                                <div class="bg-white/5 border border-white/10 p-6 rounded-2xl">
                                    <p class="text-[8px] font-bold text-gold uppercase tracking-widest mb-2 text-center text-center">Status</p>
                                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-center {{ $booking->payment_status == 'paid' ? 'text-emerald-400' : 'text-rose-400' }}">
                                        {{ $booking->payment_status == 'paid' ? 'Settled' : 'Unpaid' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($booking->special_requests)
                    <div class="mt-16 bg-slate-50 p-10 rounded-[2rem] border border-slate-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-navy/5 rounded-bl-[10rem]"></div>
                        <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-6 text-left">Bespoke Requirements</h3>
                        <p class="text-sm font-light text-slate-600 leading-relaxed italic border-l-2 border-gold pl-6 whitespace-pre-wrap text-left">{{ $booking->special_requests }}</p>
                    </div>
                @endif

                <!-- Navigation -->
                <div class="mt-16 flex flex-col md:flex-row gap-6">
                    <a href="{{ route('rooms.index') }}" class="flex-1 bg-slate-50 border border-slate-100 text-navy font-bold text-[10px] uppercase tracking-[0.3em] py-5 rounded-2xl text-center hover:bg-slate-100 transition-all">Discover Other Sanctuaries</a>
                    <a href="{{ route('bookings.index') }}" class="flex-1 bg-navy text-white font-bold text-[10px] uppercase tracking-[0.3em] py-5 rounded-2xl text-center shadow-xl shadow-navy/20 hover:bg-gold transition-all">My Reservations Portfolio</a>
                </div>
            </div>
        </div>
        
        <p class="text-center text-[10px] font-bold text-slate-400 uppercase tracking-widest">Digital Hospitality by Salpat Luxury Camp &copy; {{ date('Y') }}</p>
    </div>
@endsection