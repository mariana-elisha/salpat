@extends('layouts.app')

@section('title', $room->name)

@section('content')
    <!-- Image Gallery Section -->
    <div class="relative h-[85vh] min-h-[700px] w-full overflow-hidden bg-navy group" 
         x-data="{ activeImage: 0, images: {{ json_encode($room->images ? array_merge([$room->image], $room->images) : [$room->image]) }} }">
        
        <template x-for="(img, index) in images" :key="index">
            <div class="absolute inset-0 w-full h-full" x-show="activeImage === index" 
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 scale-110"
                 x-transition:enter-end="opacity-40 scale-100">
                <img :src="'{{ asset('images') }}/' + img" :alt="'{{ $room->name }} image ' + (index + 1)"
                    class="h-full w-full object-cover object-center opacity-40">
            </div>
        </template>
        
        @if(!$room->image && (!$room->images || count($room->images) == 0))
            <div class="h-full w-full bg-navy flex items-center justify-center p-20">
                <span class="text-white/10 font-serif italic text-4xl tracking-[0.5em] text-center uppercase">Salpat Camp Lodge-Moshi</span>
            </div>
        @endif

        <!-- Decorative overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-navy/40 via-transparent to-navy z-10"></div>

        <!-- Gallery Controls -->
        <div class="absolute inset-0 flex items-center justify-between p-8 opacity-0 group-hover:opacity-100 transition-all duration-500 pointer-events-none z-30">
            <button @click="activeImage = activeImage === 0 ? images.length - 1 : activeImage - 1" 
                    class="p-5 rounded-full bg-white/5 backdrop-blur-xl text-white hover:bg-gold hover:text-white transition-all pointer-events-auto border border-white/10 shadow-2xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button @click="activeImage = activeImage === images.length - 1 ? 0 : activeImage + 1" 
                    class="p-5 rounded-full bg-white/5 backdrop-blur-xl text-white hover:bg-gold hover:text-white transition-all pointer-events-auto border border-white/10 shadow-2xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>

        <!-- Hero Content -->
        <div class="absolute inset-0 flex flex-col justify-end z-20 pb-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="space-y-6 max-w-4xl">
                    <div class="flex items-center gap-4 animate-fade-in">
                        <span class="h-px w-12 bg-gold"></span>
                        <span class="text-gold font-bold uppercase tracking-[0.4em] text-[10px]">{{ $room->type }} Collection</span>
                    </div>
                    <h1 class="text-6xl md:text-9xl font-serif font-bold text-white tracking-tight leading-tight animate-slide-up drop-shadow-2xl text-left">
                        {{ $room->name }}
                    </h1>
                    <div class="flex flex-wrap items-center gap-8 text-white/80 font-bold uppercase tracking-[0.2em] text-[10px] animate-fade-in animation-delay-300">
                        <span class="flex items-center gap-2">
                           <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                           Up to {{ $room->capacity }} Guests
                        </span>
                        <span class="flex items-center gap-2">
                           <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                           Scenic Surroundings
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-creme max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 relative z-40 pb-32">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
            <!-- Room Details -->
            <div class="lg:col-span-2 space-y-16">
                <!-- Navigation & Price -->
                <!-- Navigation & Price -->
                <div class="bg-white rounded-[3rem] p-10 md:p-12 shadow-2xl border border-gold/10 flex flex-col md:flex-row justify-between items-start md:items-center gap-10">
                    <div class="text-left">
                        <nav class="flex mb-6 text-[10px] font-bold uppercase tracking-[0.3em] text-slate-400 gap-3">
                            <a href="{{ route('home') }}" class="hover:text-gold transition-colors">The Camp</a>
                            <span class="text-gold/30">/</span>
                            <a href="{{ route('rooms.index') }}" class="hover:text-gold transition-colors">Sanctuaries</a>
                        </nav>
                        <h2 class="text-4xl md:text-5xl font-serif font-bold text-navy leading-tight">The Sanctuary <span class="text-gold italic font-normal">Experience</span></h2>
                    </div>
                    <div class="text-left md:text-right bg-navy p-8 rounded-[2rem] text-white min-w-[240px] shadow-xl shadow-navy/20 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-20 h-20 bg-gold/10 rounded-full -mt-10 -mr-10"></div>
                        <p class="text-[10px] font-bold text-gold uppercase tracking-[0.2em] mb-4 text-left md:text-right">Investment Per Night</p>
                        <div class="flex items-baseline justify-start md:justify-end gap-2">
                            <span class="text-5xl font-serif font-bold text-white">${{ number_format($room->price_per_night, 0) }}</span>
                            <span class="text-white/40 text-[10px] font-bold uppercase tracking-widest">USD</span>
                        </div>
                        @if($room->resident_price_per_night)
                        <div class="mt-4 pt-4 border-t border-white/10 text-[10px] font-bold text-gold/80 uppercase tracking-widest text-left md:text-right">
                            Resident: TZS {{ number_format($room->resident_price_per_night, 0) }}
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-[3rem] p-10 md:p-20 shadow-2xl border border-gold/10 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-12 opacity-[0.03]">
                        <svg class="w-64 h-64 text-navy" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L4.5 20.29l.71.71L12 18l6.79 3 .71-.71z"/></svg>
                    </div>
                    
                    <div class="relative z-10 space-y-16">
                        <section>
                            <h3 class="text-[10px] font-bold text-gold uppercase tracking-[0.4em] mb-10 flex items-center gap-4 text-left">
                                <span class="w-10 h-px bg-gold"></span>
                                Narrative
                            </h3>
                            <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed text-xl font-light italic text-left">
                                {{ $room->description ?? 'Experience the perfect blend of comfort and serenity. This room is designed to provide a peaceful retreat, featuring premium amenities and stunning views.' }}
                            </div>
                        </section>

                        <section>
                            <h3 class="text-[10px] font-bold text-gold uppercase tracking-[0.4em] mb-12 flex items-center gap-4 text-left">
                                <span class="w-10 h-px bg-gold"></span>
                                Distinctive Features
                            </h3>
                            @if($room->amenities)
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                                @foreach($room->amenities as $amenity)
                                <div class="flex items-center gap-6 group">
                                    <div class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center text-gold group-hover:bg-gold group-hover:text-white transition-all duration-500 shadow-sm">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-600 group-hover:text-navy transition-colors text-left">{{ $amenity }}</span>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </section>
                    </div>
                </div>

                <!-- Policies -->
                <div class="bg-navy rounded-[4rem] p-12 md:p-20 text-white relative overflow-hidden shadow-2xl shadow-navy/40">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10"></div>
                    <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-20">
                        <div class="space-y-10">
                            <h4 class="text-gold font-bold uppercase tracking-[0.3em] text-[10px] border-b border-white/10 pb-6 text-left">Stay Protocol</h4>
                            <div class="space-y-10">
                                <div class="flex items-start gap-6 group">
                                    <div class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-gold group-hover:bg-gold group-hover:text-navy transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-[10px] font-bold text-white uppercase tracking-widest mb-1">Check-In</p>
                                        <p class="text-xs text-white/50 font-light">From 12:00 PM onwards</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-6 group">
                                    <div class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-gold group-hover:bg-gold group-hover:text-navy transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-[10px] font-bold text-white uppercase tracking-widest mb-1">Check-Out</p>
                                        <p class="text-xs text-white/50 font-light">Before 10:00 AM departure</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-10">
                            <h4 class="text-gold font-bold uppercase tracking-[0.3em] text-[10px] border-b border-white/10 pb-6 text-left">Guest Assurance</h4>
                            <div class="space-y-10">
                                <div class="flex items-start gap-6 group">
                                    <div class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-gold group-hover:bg-gold group-hover:text-navy transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-[10px] font-bold text-white uppercase tracking-widest mb-1">Flexible Cancellation</p>
                                        <p class="text-xs text-white/50 font-light">Full refund up to 72 hours prior</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-6 group">
                                    <div class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-gold group-hover:bg-gold group-hover:text-navy transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-[10px] font-bold text-white uppercase tracking-widest mb-1">Instant Support</p>
                                        <p class="text-xs text-white/50 font-light">24/7 dedicated guest concierge</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-10"
                     x-data="{
                        checkIn: '{{ date('Y-m-d') }}',
                        checkOut: '{{ date('Y-m-d', strtotime('+1 day')) }}',
                        guests: 1,
                         roomName: '{{ addslashes($room->name) }}',
                         roomType: '{{ ucfirst($room->type) }}',
                         priceUsd: '{{ number_format($room->price_per_night, 0) }}',
                         priceTzs: '{{ number_format($room->tzs_price, 0) }}',
                         residentPrice: '{{ $room->resident_price_per_night ? number_format($room->resident_price_per_night, 0) : '' }}',
                         amenities: {{ json_encode($room->amenities ?? []) }},
                         get totalUSD() {
                            const start = new Date(this.checkIn);
                            const end = new Date(this.checkOut);
                            const nights = Math.max(1, Math.ceil((end - start) / (1000 * 60 * 60 * 24)));
                            return nights * {{ $room->price_per_night }};
                         },
                         get whatsappUrl() {
                             let amenityList = this.amenities.length > 0 ? this.amenities.join(', ') : 'Standard amenities';
                             let msg = 
                                 '🏛️ *SALPAT CAMP LODGE-MOSHI RESERVATION*\n' +
                                 '━━━━━━━━━━━━━━━━━━━━\n\n' +
                                 '📋 *Sanctuary Details*\n' +
                                 '🛏️ Name: *' + this.roomName + '*\n' +
                                 '🏷️ Type: ' + this.roomType + '\n' +
                                 '💵 Base Rate: $' + this.priceUsd + ' USD / night\n' +
                                 '✨ Features: ' + amenityList + '\n\n' +
                                 '📅 *Scheduled Stay*\n' +
                                 '📥 Check-in: ' + this.checkIn + '\n' +
                                 '📤 Check-out: ' + this.checkOut + '\n' +
                                 '👥 Residents: ' + this.guests + '\n\n' +
                                 '💸 *Total Investment Estimate*\n' +
                                 '💰 USD $' + this.totalUSD.toLocaleString() + '\n\n' +
                                 'Please confirm availability for these dates. 🙏';
                             return 'https://wa.me/255770307759?text=' + encodeURIComponent(msg);
                         }
                      }">
                    
                    <!-- Main Reservation Card -->
                    <div class="bg-white rounded-[3rem] shadow-2xl border border-gold/10 overflow-hidden transform hover:scale-[1.02] transition-transform duration-500">
                        <div class="bg-navy p-10 text-white text-center relative">
                            <div class="absolute inset-0 bg-gold/5 opacity-50"></div>
                            <h4 class="text-[10px] font-bold text-gold uppercase tracking-[0.4em] mb-4">Reservation Portal</h4>
                            <p class="text-3xl font-serif font-bold italic">Private Request</p>
                        </div>

                        <div class="p-10 space-y-10">
                            <!-- Date Selection -->
                            <div class="grid grid-cols-1 gap-6">
                                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 transition-all hover:border-gold/30 text-left">
                                    <label class="block text-[8px] font-bold text-slate-400 uppercase tracking-widest mb-3">Entrance</label>
                                    <input type="date" x-model="checkIn" min="{{ date('Y-m-d') }}"
                                           class="w-full bg-transparent border-0 p-0 text-navy focus:ring-0 text-base font-bold selection:bg-gold">
                                </div>
                                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 transition-all hover:border-gold/30 text-left">
                                    <label class="block text-[8px] font-bold text-slate-400 uppercase tracking-widest mb-3">Departure</label>
                                    <input type="date" x-model="checkOut" min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                           class="w-full bg-transparent border-0 p-0 text-navy focus:ring-0 text-base font-bold selection:bg-gold">
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-4 pt-4">
                                <a :href="whatsappUrl" target="_blank"
                                   class="w-full bg-navy text-white py-6 rounded-2xl font-bold uppercase tracking-[0.3em] text-[10px] shadow-2xl shadow-navy/20 hover:bg-gold transition-all block text-center">
                                    Secure via WhatsApp
                                </a>
                                <a href="{{ route('bookings.create', $room) }}"
                                   class="w-full bg-gold/10 text-gold py-6 rounded-2xl font-bold uppercase tracking-[0.3em] text-[10px] hover:bg-gold hover:text-white transition-all block text-center">
                                    System Reservation
                                </a>
                            </div>

                            <p class="text-[8px] text-slate-400 text-center uppercase tracking-widest font-medium">Standard terms & conditions apply for all stays</p>
                        </div>
                    </div>

                    <!-- Payment Credentials -->
                    <div class="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-xl relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-navy/[0.02] rounded-bl-[10rem] group-hover:bg-gold/5 transition-colors"></div>
                        <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.3em] mb-8 border-l-2 border-gold pl-4 text-left">Financial Credentials</h4>
                        <div class="space-y-6">
                            <div class="flex justify-between items-center py-2 border-b border-slate-100 uppercase">
                                <span class="text-[8px] font-bold text-slate-400 uppercase">Institution</span>
                                <span class="text-[10px] font-bold text-navy">CRDB BANK</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-slate-100 uppercase">
                                <span class="text-[8px] font-bold text-slate-400 uppercase">A/C Holder</span>
                                 <span class="text-[10px] font-bold text-navy uppercase">SALPAT CAMP</span>
                            </div>
                            <div class="space-y-4 pt-2 text-left">
                                <div>
                                    <p class="text-[8px] font-bold text-gold uppercase mb-1">Domestic (TZS)</p>
                                    <p class="text-sm font-mono font-bold text-navy tracking-widest">10284710563</p>
                                </div>
                                <div>
                                    <p class="text-[8px] font-bold text-gold uppercase mb-1">Global (USD)</p>
                                    <p class="text-sm font-mono font-bold text-navy tracking-widest">10285045563</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    @keyframes slide-up {
        0%   { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes fade-in {
        0%   { opacity: 0; }
        100% { opacity: 1; }
    }
    .animate-slide-up   { animation: slide-up 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
    .animate-fade-in    { animation: fade-in 1.5s ease-out forwards; opacity: 0; }
    .animation-delay-300{ animation-delay: 300ms; }
</style>
@endpush