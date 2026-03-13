@extends('layouts.app')

@section('title', $room->name)

@section('content')
    <!-- Image Gallery Section -->
    <div class="relative h-[65vh] min-h-[500px] w-full overflow-hidden bg-slate-900 group" 
         x-data="{ activeImage: 0, images: {{ json_encode($room->images ? array_merge([$room->image], $room->images) : [$room->image]) }} }">
        
        <template x-for="(img, index) in images" :key="index">
            <div class="absolute inset-0 w-full h-full" x-show="activeImage === index" 
                 x-transition:enter="transition ease-out duration-700"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-70 scale-100">
                <img :src="'{{ asset('storage') }}/' + img" :alt="'{{ $room->name }} image ' + (index + 1)"
                    class="h-full w-full object-cover object-center opacity-70">
            </div>
        </template>
        
        @if(!$room->image && (!$room->images || count($room->images) == 0))
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                alt="{{ $room->name }}" class="h-full w-full object-cover object-center opacity-70">
        @endif

        <!-- Gallery Controls -->
        <div class="absolute inset-0 flex items-center justify-between p-6 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none z-20">
            <button @click="activeImage = activeImage === 0 ? images.length - 1 : activeImage - 1" 
                    class="p-4 rounded-full bg-white/10 backdrop-blur-md text-white hover:bg-white/30 transition-all pointer-events-auto border border-white/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button @click="activeImage = activeImage === images.length - 1 ? 0 : activeImage + 1" 
                    class="p-4 rounded-full bg-white/10 backdrop-blur-md text-white hover:bg-white/30 transition-all pointer-events-auto border border-white/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>

        <!-- Gallery Indicators -->
        <div class="absolute bottom-32 left-1/2 -translate-x-1/2 flex gap-3 z-20">
            <template x-for="(img, index) in images" :key="index">
                <button @click="activeImage = index" 
                        :class="activeImage === index ? 'w-10 bg-accent-500' : 'w-2 bg-white/50'"
                        class="h-2 rounded-full transition-all duration-300"></button>
            </template>
        </div>

        <!-- Decorative elements -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent z-10"></div>
        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950 to-transparent h-48 z-10"></div>

        <div class="absolute inset-0 flex flex-col justify-end z-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-24 w-full">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-widest mb-4">
                    Exclusive Selection
                </div>
                <h1 class="text-4xl font-serif font-bold text-white sm:text-5xl lg:text-7xl tracking-tighter mb-4">
                    {{ $room->name }}
                </h1>
                <div class="flex flex-wrap items-center gap-6 text-slate-200 font-light text-lg">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        {{ ucfirst($room->type) }}
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Up to {{ $room->capacity }} Guests
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-30 pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Room Details -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Header with Pricing -->
                <div class="bg-white rounded-[2rem] p-8 md:p-10 shadow-xl border border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div>
                        <nav class="flex mb-2 text-[10px] font-bold uppercase tracking-widest text-slate-400 gap-2">
                            <a href="{{ route('home') }}" class="hover:text-accent-500 transition-colors">Home</a>
                            <span>/</span>
                            <a href="{{ route('rooms.index') }}" class="hover:text-accent-500 transition-colors">Rooms</a>
                        </nav>
                        <h2 class="text-3xl font-serif font-bold text-slate-900">{{ $room->name }}</h2>
                    </div>
                    <div class="text-right">
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-bold text-accent-500">${{ number_format($room->price_per_night, 0) }}</span>
                            <span class="text-slate-400 text-sm font-medium">/ night</span>
                        </div>
                        @if($room->resident_price_per_night)
                        <div class="mt-1 flex items-center justify-end gap-2 text-xs font-bold text-emerald-600">
                            TZS {{ number_format($room->resident_price_per_night, 0) }} (Resident)
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Desciption & Amenities -->
                <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-xl border border-slate-100">
                    <h3 class="text-2xl font-serif font-bold text-slate-900 flex items-center gap-3 mb-6">
                        <span class="w-8 h-px bg-accent-500"></span>
                        Overview
                    </h3>
                    <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed text-lg font-light mb-12">
                        {{ $room->description ?? 'Experience the perfect blend of comfort and serenity. This room is designed to provide a peaceful retreat, featuring premium amenities and stunning views.' }}
                    </div>

                    <h3 class="text-2xl font-serif font-bold text-slate-900 flex items-center gap-3 mb-8">
                        <span class="w-8 h-px bg-accent-500"></span>
                        Room Amenities
                    </h3>
                    @if($room->amenities)
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($room->amenities as $amenity)
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-accent-200 transition-colors group">
                            <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-accent-500 group-hover:bg-accent-500 group-hover:text-white transition-all">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-slate-700">{{ $amenity }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Essential Info -->
                <div class="bg-slate-900 rounded-[2.5rem] p-8 md:p-12 text-white relative overflow-hidden shadow-2xl">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10"></div>
                    <div class="relative z-10">
                        <h2 class="text-3xl font-serif font-bold mb-10">Essential Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div class="space-y-6">
                                <h4 class="text-accent-400 font-bold uppercase tracking-widest text-xs border-b border-slate-800 pb-2">Stay Policies</h4>
                                <ul class="space-y-4">
                                    <li class="flex items-center gap-4 text-slate-300">
                                        <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-accent-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <span class="text-sm">Check-in: Starts at 3:00 PM</span>
                                    </li>
                                    <li class="flex items-center gap-4 text-slate-300">
                                        <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-accent-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <span class="text-sm">Check-out: Clean by 11:00 AM</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="space-y-6">
                                <h4 class="text-accent-400 font-bold uppercase tracking-widest text-xs border-b border-slate-800 pb-2">Guest Care</h4>
                                <ul class="space-y-4">
                                    <li class="flex items-center gap-4 text-slate-300">
                                        <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-accent-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                        </div>
                                        <span class="text-sm">Free cancellation up to 48 hours</span>
                                    </li>
                                    <li class="flex items-center gap-4 text-slate-300">
                                        <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-accent-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <span class="text-sm">Concierge available 24/7</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Sidebar - WhatsApp Reservation -->
            <div class="lg:col-span-1" id="whatsapp-sidebar"
                 x-data="{
                    checkIn: '{{ date('Y-m-d') }}',
                    checkOut: '{{ date('Y-m-d', strtotime('+1 day')) }}',
                    guests: 1,
                     roomName: '{{ addslashes($room->name) }}',
                     roomNumber: '{{ $room->room_number ?? '' }}',
                     roomType: '{{ ucfirst($room->type) }}',
                     priceUsd: '{{ number_format($room->price_per_night, 0) }}',
                     priceTzs: '{{ number_format($room->tzs_price, 0) }}',
                     residentPrice: '{{ $room->resident_price_per_night ? number_format($room->resident_price_per_night, 0) : '' }}',
                     amenities: {{ json_encode($room->amenities ?? []) }},
                     get whatsappUrl() {
                         let amenityList = this.amenities.length > 0 ? this.amenities.join(', ') : 'Standard amenities';
                         let resLine = this.residentPrice ? '\n💰 Resident Rate: TZS ' + this.residentPrice + ' / night' : '';
                         let roomLabel = this.roomName + (this.roomNumber ? ' (Room #' + this.roomNumber + ')' : '');
                         let msg = 
                             '🏕️ *SALPAT CAMP — ROOM RESERVATION REQUEST*\n' +
                             '━━━━━━━━━━━━━━━━━━━━\n\n' +
                             '📋 *Room Details*\n' +
                             '🛏️ Room: *' + roomLabel + '*\n' +
                             '🏷️ Type: ' + this.roomType + '\n' +
                             '💵 Rate: $' + this.priceUsd + ' USD / night\n' +
                             '💴 Rate: TZS ' + this.priceTzs + ' / night' + resLine + '\n' +
                             '✨ Amenities: ' + amenityList + '\n\n' +
                             '📅 *Stay Dates*\n' +
                             '📥 Check-in: ' + this.checkIn + '\n' +
                             '📤 Check-out: ' + this.checkOut + '\n' +
                             '👥 Guests: ' + this.guests + '\n\n' +
                             '💳 *Payment Details*\n' +
                             '🏦 Bank: CRDB BANK\n' +
                             '👤 Account Holder: SALPAT CAMP\n' +
                             '🔢 Account No (TZS): 0152269300100\n' +
                             '🔢 Account No (USD): 0252269300100\n\n' +
                             'Please confirm the availability of this room. Thank you! 🙏';
                         return 'https://wa.me/255770307759?text=' + encodeURIComponent(msg);
                     }
                  }">
                <div class="sticky top-24 space-y-6">
                    <!-- Price Card -->
                    <div class="bg-slate-900 rounded-[2rem] shadow-2xl border border-slate-800 overflow-hidden">
                        <div class="p-8 text-white relative">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-accent-500 opacity-10 rounded-full -mt-16 -mr-16"></div>
                            <p class="text-[10px] text-accent-400 uppercase tracking-[0.2em] font-bold mb-4">Reservation Details</p>
                            <div class="space-y-4">
                                <div class="flex items-baseline justify-between border-b border-slate-800 pb-3">
                                    <span class="text-slate-400 text-xs uppercase tracking-wider font-bold">Standard</span>
                                    <div class="text-right">
                                        <span class="text-2xl font-serif font-bold text-white">${{ number_format($room->price_per_night, 0) }}</span>
                                        <span class="text-slate-400 text-[10px]">/ night</span>
                                    </div>
                                </div>
                                @if($room->resident_price_per_night)
                                <div class="flex items-baseline justify-between">
                                    <span class="text-accent-400 text-xs uppercase tracking-wider font-bold">Resident (TZS)</span>
                                    <div class="text-right">
                                        <span class="text-xl font-serif font-bold text-accent-400">{{ number_format($room->resident_price_per_night, 0) }}</span>
                                        <span class="text-slate-400 text-[10px]"> TZS / night</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Date & Guest selectors -->
                        <div class="p-8 bg-white space-y-5">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Check-in</label>
                                    <input type="date" x-model="checkIn" min="{{ date('Y-m-d') }}"
                                        class="w-full px-3 py-3 border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 text-sm font-medium bg-slate-50/50">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Check-out</label>
                                    <input type="date" x-model="checkOut" min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                        class="w-full px-3 py-3 border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 text-sm font-medium bg-slate-50/50">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Guests</label>
                                <div class="relative">
                                    <select x-model="guests" class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 bg-slate-50/50 appearance-none font-medium pr-10">
                                        @for($i = 1; $i <= $room->capacity; $i++)
                                            <option value="{{ $i }}">{{ $i }} {{ $i > 1 ? 'Guests' : 'Guest' }}</option>
                                        @endfor
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>

                            <!-- WhatsApp Reserve Button -->
                            <a :href="whatsappUrl" target="_blank" rel="noopener noreferrer"
                               class="w-full bg-green-500 hover:bg-green-600 text-white py-5 rounded-2xl font-bold text-lg shadow-xl shadow-green-500/25 hover:-translate-y-1 transition-all flex items-center justify-center gap-3 cursor-pointer">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                Reserve via WhatsApp
                            </a>

                            <div class="flex items-center justify-center gap-2 text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                                <svg class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                </svg>
                                Fast & Direct Confirmation
                            </div>
                        </div>
                    </div>

                    <!-- Payment Info Card -->
                    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-xl overflow-hidden">
                        <div class="bg-primary-600 px-8 py-5 flex items-center gap-3">
                            <div class="w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                            </div>
                            <div>
                                <p class="text-white font-bold text-sm uppercase tracking-wider">Payment Details</p>
                                <p class="text-primary-100 text-[10px]">Bank Transfer / Direct Pay</p>
                            </div>
                        </div>
                        <div class="p-6 space-y-3">
                            <div class="flex items-center justify-between py-2 border-b border-slate-100">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Bank</span>
                                <span class="text-sm font-bold text-slate-800">CRDB BANK</span>
                            </div>
                            <div class="flex items-center justify-between py-2 border-b border-slate-100">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Holder</span>
                                <span class="text-xs font-bold text-slate-800">SALPAT CAMP</span>
                            </div>
                            <div class="flex items-center justify-between py-2 border-b border-slate-100">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">A/C (TZS)</span>
                                <span class="text-sm font-bold text-primary-600 tracking-wider font-mono">0152269300100</span>
                            </div>
                            <div class="flex items-center justify-between py-2">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">A/C (USD)</span>
                                <span class="text-sm font-bold text-primary-600 tracking-wider font-mono">0252269300100</span>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial/Badge -->
                    <div class="p-8 bg-slate-50 rounded-[2rem] border border-slate-100">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-white rounded-full shadow-sm flex items-center justify-center text-accent-500 font-serif font-bold text-xl border border-slate-100">S</div>
                            <div>
                                <p class="text-sm font-bold text-slate-900">Salpat Concierge</p>
                                <div class="flex gap-1">
                                    @for($i = 0; $i < 5; $i++)
                                    <svg class="w-3 h-3 text-accent-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="text-slate-500 text-sm font-light italic leading-relaxed">
                            "Tuma ujumbe wako kupitia WhatsApp na tutakujibu haraka iwezekanavyo. Karibu Salpat Camp!"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection