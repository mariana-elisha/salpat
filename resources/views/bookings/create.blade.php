@extends('layouts.app')

@section('title', 'Book Room')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10"
     x-data="{ 
          bookingType: '{{ old('booking_type', 'individual') }}', 
          residentStatus: '{{ old('resident_status', 'non-resident') }}',
          contactPreference: '{{ old('contact_preference', 'email') }}',
          activeImage: 0,
          showLightbox: false,
          lightboxImage: 0,
          images: {{ json_encode($room->images ?? [$room->image]) }}
      }">
    <div class="mb-8 p-8 md:p-10 bg-slate-900 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] rounded-3xl text-white relative overflow-hidden shadow-2xl border border-slate-800">
        <div class="relative z-10 flex flex-col md:flex-row md:justify-between md:items-end gap-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-wider mb-4 block w-max">
                    Secure Booking
                </div>
                <h1 class="text-4xl md:text-5xl font-serif font-bold text-white mb-2 tracking-tight">Reserve Your Stay</h1>
                <p class="text-slate-300 text-lg md:text-xl font-light">Booking the elegant <span class="text-accent-400 font-medium italic">{{ $room->name }}</span></p>
            </div>
            <div class="bg-slate-800/80 backdrop-blur-md border border-slate-700 p-4 rounded-2xl flex flex-col items-center justify-center shrink-0">
                <span class="text-sm text-slate-400 font-medium uppercase tracking-wider mb-1">Rate</span>
                <div class="flex flex-col items-center">
                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl md:text-4xl font-bold text-white">${{ number_format($room->price_per_night, 2) }}</span>
                        <span class="text-slate-400 font-medium">/night</span>
                    </div>
                    <div class="text-accent-400 font-bold text-sm">
                        {{ number_format($room->tzs_price, 0) }} TZS / night
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-accent-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 pointer-events-none"></div>
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-primary-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 pointer-events-none"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Booking Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-slate-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-slate-50 rounded-bl-full opacity-50 pointer-events-none"></div>
                
                <h2 class="text-3xl font-serif font-bold text-slate-900 mb-8 relative z-10">Guest Details</h2>
                
                @if($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-6 py-4 rounded-r-xl mb-8 shadow-sm">
                        <ul class="list-disc list-inside text-sm font-medium">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bookings.store') }}" method="POST" class="space-y-8 relative z-10" id="bookingForm">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    
                    <!-- Guest Personal details (MOVED TO TOP) -->
                    <div class="space-y-6">
                        <div class="border-b border-slate-100 pb-4 mb-4">
                            <h3 class="text-xl font-serif font-bold text-slate-800">Guest Information</h3>
                            <p class="text-xs text-slate-500">Please provide your personal details first.</p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="md:col-span-1">
                                <label for="guest_name" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" name="guest_name" id="guest_name" 
                                       value="{{ old('guest_name', auth()->user()?->name ?? '') }}"
                                       class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900" placeholder="e.g. John Doe" required>
                            </div>
                            <div class="md:col-span-1">
                                <label for="guest_email" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" name="guest_email" id="guest_email" 
                                       value="{{ old('guest_email', auth()->user()?->email ?? '') }}"
                                       class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900" placeholder="john@example.com" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label for="guest_passport_id" class="block text-xs font-bold text-slate-800 uppercase tracking-widest mb-2">Passport No / National ID <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </span>
                                    <input type="text" name="guest_passport_id" id="guest_passport_id" 
                                           value="{{ old('guest_passport_id') }}"
                                           class="w-full pl-11 pr-4 py-3 bg-white border-2 border-accent-100 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900 font-bold placeholder:font-normal" placeholder="Enter ID or Passport Number" required>
                                </div>
                            </div>
                            <div>
                                <label for="guest_phone" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Phone Number</label>
                                <input type="tel" name="guest_phone" id="guest_phone" 
                                       value="{{ old('guest_phone', auth()->user()?->phone ?? '') }}"
                                       class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900" placeholder="+255 7xx xxx xxx">
                            </div>
                        </div>

                        <div>
                            <label for="guest_address" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Full Address</label>
                            <textarea name="guest_address" id="guest_address" rows="2"
                                   class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900 resize-none" placeholder="Residential Address" required>{{ old('guest_address', auth()->user()?->profile?->address ?? '') }}</textarea>
                        </div>

                        @guest
                        <div class="bg-accent-50 rounded-2xl p-6 border border-accent-100 flex flex-col md:flex-row md:items-center gap-6 shadow-sm">
                            <div class="flex-shrink-0 w-12 h-12 bg-white rounded-full flex items-center justify-center text-accent-500 shadow-sm border border-accent-100" style="pointer-events: none;">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-sm font-bold text-slate-900 mb-1">Secure Account Creation (Optional)</h3>
                                <p class="text-xs text-slate-500 mb-3">Save your details for a faster checkout next time.</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <input type="password" name="password" id="password" placeholder="Password"
                                           class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:border-accent-500 focus:ring-accent-500">
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                                           class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:border-accent-500 focus:ring-accent-500">
                                </div>
                            </div>
                        </div>
                        @endguest
                    </div>

                    <div class="my-10 border-t-2 border-dashed border-slate-100"></div>
                    
                    <!-- Dates & Capacity -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        <div>
                            <label for="check_in" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Check-in Date</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </span>
                                <input type="date" name="check_in" id="check_in" 
                                       value="{{ old('check_in', $checkIn) }}" 
                                       min="{{ date('Y-m-d') }}"
                                       class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all font-medium text-slate-900" required>
                            </div>
                        </div>
                        <div>
                            <label for="check_out" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Check-out Date</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </span>
                                <input type="date" name="check_out" id="check_out" 
                                       value="{{ old('check_out', $checkOut) }}"
                                       min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                       class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all font-medium text-slate-900" required>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label for="number_of_guests" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Guest Occupancy</label>
                            <div class="relative">
                                <select name="number_of_guests" id="number_of_guests" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900 appearance-none font-bold" required>
                                    @for($i = 1; $i <= $room->capacity; $i++)
                                        <option value="{{ $i }}" {{ old('number_of_guests', $guests ?? 1) == $i ? 'selected' : '' }}>{{ $i }} {{ $i > 1 ? 'Guests' : 'Guest' }}</option>
                                    @endfor
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                    <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Type & Resident Status -->
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Booking Type</label>
                                <div class="flex gap-2">
                                    <label class="relative flex-1 group cursor-pointer">
                                        <input type="radio" name="booking_type" value="individual" x-model="bookingType" 
                                               class="absolute inset-0 w-full h-full opacity-0 z-20 cursor-pointer">
                                        <div class="px-3 py-3 border border-slate-200 rounded-xl transition-all font-bold text-xs text-slate-700 text-center hover:bg-slate-50"
                                             :class="bookingType === 'individual' ? 'border-accent-500 bg-accent-50 text-accent-700' : ''">
                                            Individual
                                        </div>
                                    </label>
                                    <label class="relative flex-1 group cursor-pointer">
                                        <input type="radio" name="booking_type" value="company" x-model="bookingType" 
                                               class="absolute inset-0 w-full h-full opacity-0 z-20 cursor-pointer">
                                        <div class="px-3 py-3 border border-slate-200 rounded-xl transition-all font-bold text-xs text-slate-700 text-center hover:bg-slate-50"
                                             :class="bookingType === 'company' ? 'border-accent-500 bg-accent-50 text-accent-700' : ''">
                                            Company
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            @if($room->resident_price_per_night)
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Residency Status</label>
                                <div class="flex gap-2">
                                    <label class="relative flex-1 group cursor-pointer">
                                        <input type="radio" name="resident_status" value="non-resident" x-model="residentStatus" 
                                               class="absolute inset-0 w-full h-full opacity-0 z-20 cursor-pointer">
                                        <div class="px-3 py-3 border border-slate-200 rounded-xl transition-all font-bold text-xs text-slate-700 text-center hover:bg-slate-50"
                                             :class="residentStatus === 'non-resident' ? 'border-accent-500 bg-accent-50 text-accent-700' : ''">
                                            Non-Resident
                                        </div>
                                    </label>
                                    <label class="relative flex-1 group cursor-pointer">
                                        <input type="radio" name="resident_status" value="resident" x-model="residentStatus" 
                                               class="absolute inset-0 w-full h-full opacity-0 z-20 cursor-pointer">
                                        <div class="px-3 py-3 border border-slate-200 rounded-xl transition-all font-bold text-xs text-slate-700 text-center hover:bg-slate-50"
                                             :class="residentStatus === 'resident' ? 'border-accent-500 bg-accent-50 text-accent-700' : ''">
                                            Tz Resident
                                        </div>
                                    </label>
                                </div>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Company Details Block -->
                        <div x-show="bookingType === 'company'" x-transition class="mt-4 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                            <label for="company_name" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Company Name <span class="text-red-500">*</span></label>
                            <input type="text" name="company_name" id="company_name" 
                                   value="{{ old('company_name') }}"
                                   :required="bookingType === 'company'"
                                   class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900 font-bold" placeholder="e.g. Acme Corp">
                        </div>
                    </div>

                    <!-- Preferences -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Preferred Contact Method</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @foreach(['email' => ['label' => 'Email', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'], 'phone' => ['label' => 'Phone', 'icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z'], 'whatsapp' => ['label' => 'WhatsApp', 'icon' => 'M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.832-1.438A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2z']] as $value => $option)
                                    <label class="relative block cursor-pointer group">
                                        <input type="radio" name="contact_preference" value="{{ $value }}" 
                                            x-model="contactPreference"
                                            class="absolute inset-0 w-full h-full opacity-0 z-20 cursor-pointer">
                                        <div class="flex flex-col items-center gap-3 p-5 border-2 border-slate-100 rounded-2xl text-center transition-all shadow-sm"
                                             :class="contactPreference === '{{ $value }}' ? 'border-accent-500 bg-accent-50' : 'group-hover:bg-slate-50'">
                                            <div class="w-6 h-6 border-2 border-slate-300 rounded-full flex items-center justify-center transition-colors"
                                                 :class="contactPreference === '{{ $value }}' ? 'border-accent-500' : ''">
                                                <div class="w-3 h-3 bg-accent-500 rounded-full transition-opacity"
                                                     :class="contactPreference === '{{ $value }}' ? 'opacity-100' : 'opacity-0'"></div>
                                            </div>
                                            <div class="flex flex-col items-center gap-1">
                                                <svg class="w-8 h-8 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                     :class="contactPreference === '{{ $value }}' ? 'text-accent-500' : 'text-slate-400'">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $option['icon'] }}"/>
                                                </svg>
                                                <span class="text-xs font-bold uppercase tracking-widest transition-colors"
                                                      :class="contactPreference === '{{ $value }}' ? 'text-accent-700' : 'text-slate-500'">{{ $option['label'] }}</span>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <label for="special_requests" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Special Requests</label>
                            <textarea name="special_requests" id="special_requests" rows="3"
                                      class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900 resize-none"
                                      placeholder="Any specific requirements for your stay?">{{ old('special_requests') }}</textarea>
                        </div>
                    </div>

                    <!-- Room Gallery -->
                    <div class="space-y-4">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest">Experience Your Sanctuary</label>
                        <div class="relative rounded-2xl overflow-hidden aspect-[16/9] shadow-inner bg-slate-100 group">
                            <!-- Main Images -->
                            <template x-for="(img, index) in images" :key="index">
                                <img :src="'{{ asset('storage') }}/' + img" x-show="activeImage === index" 
                                     class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700"
                                     x-transition:enter="transition ease-out duration-700"
                                     x-transition:enter-start="opacity-0 scale-105"
                                     x-transition:enter-end="opacity-100 scale-100">
                            </template>
                            
                            <!-- Main Zoom Click Overlay (Highest Priority) -->
                            <div @click.prevent="lightboxImage = activeImage; showLightbox = true" 
                                 class="absolute inset-0 z-10 cursor-zoom-in group-hover:bg-black/10 transition-colors flex items-center justify-center">
                                <div class="w-14 h-14 rounded-full bg-slate-900/40 backdrop-blur-md flex items-center justify-center text-white border border-white/30 opacity-0 group-hover:opacity-100 transition-all scale-90 group-hover:scale-100">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                </div>
                            </div>

                            <!-- Internal Controls (Z-Index 20) -->
                            <div class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/60 to-transparent flex justify-between items-center opacity-0 group-hover:opacity-100 transition-opacity z-20">
                                <div class="flex gap-1">
                                    <template x-for="(img, index) in images" :key="index">
                                        <button @click.prevent.stop="activeImage = index" 
                                                class="w-8 h-1 rounded-full transition-all"
                                                :class="activeImage === index ? 'bg-accent-500 w-12' : 'bg-white/40'"></button>
                                    </template>
                                </div>
                                <span class="text-[10px] font-black text-white uppercase tracking-tighter" x-text="(activeImage + 1) + ' / ' + images.length"></span>
                            </div>

                            <!-- Navigation Arrows (Z-Index 20) -->
                            <button @click.prevent.stop="activeImage = activeImage === 0 ? images.length - 1 : activeImage - 1" 
                                    class="absolute left-2 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white hover:bg-accent-500 transition-all opacity-0 group-hover:opacity-100 z-20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <button @click.prevent.stop="activeImage = activeImage === images.length - 1 ? 0 : activeImage + 1" 
                                    class="absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white hover:bg-accent-500 transition-all opacity-0 group-hover:opacity-100 z-20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </div>
                        
                        <!-- Mini Thumbnails -->
                        <div class="flex gap-2 overflow-x-auto pb-2 scrollbar-none">
                            <template x-for="(img, index) in images" :key="index">
                                <button @click.prevent="activeImage = index" 
                                        class="shrink-0 w-24 aspect-video rounded-xl overflow-hidden border-2 transition-all"
                                        :class="activeImage === index ? 'border-accent-500 ring-2 ring-accent-500/20' : 'border-slate-100 opacity-60 hover:opacity-100'">
                                    <img :src="'{{ asset('storage') }}/' + img" class="w-full h-full object-cover">
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Payment Information & WhatsApp Notice -->
                    <div class="bg-primary-50 rounded-2xl p-6 border border-primary-100 shadow-sm space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center text-white shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-primary-900 uppercase tracking-wider">Direct Payment Details</h4>
                                <p class="text-xs text-primary-700">Please use the details below for manual payment</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-3 bg-white rounded-xl border border-primary-200">
                                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Bank Name</span>
                                <span class="text-sm font-bold text-slate-900">CRDB BANK</span>
                            </div>
                            <div class="p-3 bg-white rounded-xl border border-primary-200">
                                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Account Holder</span>
                                <span class="text-sm font-bold text-slate-900 uppercase">SALPAT CAMP</span>
                            </div>
                            <div class="p-3 bg-white rounded-xl border border-primary-200">
                                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Account No (TSH)</span>
                                <span class="text-sm font-bold text-primary-600 tracking-wider">0152269300100</span>
                            </div>
                            <div class="p-3 bg-white rounded-xl border border-primary-200">
                                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-1">Account No (USD)</span>
                                <span class="text-sm font-bold text-primary-600 tracking-wider">0252269300100</span>
                            </div>
                        </div>

                        <div class="pt-2 flex items-start gap-2">
                             <svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" /></svg>
                             <p class="text-xs text-slate-500 italic">Click confirm to be redirected to WhatsApp for final payment confirmation and support.</p>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100">
                        <button type="submit" class="w-full bg-accent-500 text-white px-8 py-5 rounded-2xl hover:bg-accent-600 transition-all font-bold text-xl shadow-xl shadow-accent-500/20 transform hover:-translate-y-1 flex items-center justify-center gap-3">
                            Confirm Your Reservation
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Room Summary Side -->
        <div class="lg:col-span-1">
            <div class="bg-slate-900 rounded-3xl shadow-2xl p-0 sticky top-10 overflow-hidden border border-slate-800">
                <div class="h-48 relative overflow-hidden group cursor-zoom-in" @click="lightboxImage = 0; showLightbox = true">
                    @if($room->image)
                        <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="w-full h-full object-cover opacity-80 group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                             <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm shadow flex items-center justify-center text-white border border-white/30">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                             </div>
                        </div>
                    @else
                        <div class="w-full h-full bg-slate-800 flex items-center justify-center">
                            <svg class="w-12 h-12 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                    @endif
                    <div class="absolute inset-x-0 bottom-0 p-6 bg-gradient-to-t from-slate-900 to-transparent">
                        <h4 class="text-2xl font-serif font-bold text-white">{{ $room->name }}</h4>
                        <span class="text-accent-400 text-xs font-bold uppercase tracking-widest">{{ $room->type }}</span>
                    </div>
                </div>
                
                <div class="p-8 space-y-6">
                    <p class="text-slate-400 text-sm font-light leading-relaxed italic line-clamp-2">"{{ $room->description }}"</p>

                    <div class="space-y-4 border-t border-slate-800 pt-6">
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Base Rate</span>
                            <div class="flex flex-col items-end">
                                <span class="text-xl font-bold text-white">${{ number_format($room->price_per_night, 2) }}</span>
                                <span class="text-[10px] font-bold text-accent-400">{{ number_format($room->tzs_price, 0) }} TZS</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Capacity</span>
                            <span class="text-white font-medium">{{ $room->capacity }} Guests</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Amenities</span>
                            <span class="text-accent-400 font-medium">Included</span>
                        </div>
                    </div>

                    <div class="bg-slate-800/50 rounded-2xl p-5 border border-slate-800">
                        <div class="flex items-center gap-3 text-slate-300 text-xs mb-3">
                            <svg class="w-4 h-4 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="font-medium">Total will be calculated at checkout</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 p-6 bg-white rounded-2xl border border-slate-100 shadow-sm">
                <h5 class="text-sm font-bold text-slate-900 mb-2 uppercase tracking-tight">Booking Policy</h5>
                <p class="text-xs text-slate-500 leading-relaxed italic">By proceeding, you agree to our terms of service and cancellation policies. We look forward to hosting you at Salpat Camp.</p>
            </div>
        </div>
    </div>

    <!-- Top-level Lightbox Modal (Inside main container for x-data scope) -->
    <div x-show="showLightbox" x-cloak
         class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-900/98 backdrop-blur-3xl p-4 sm:p-10"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="showLightbox = false"
         @click.self="showLightbox = false">
        
        <button @click="showLightbox = false" class="absolute top-6 right-6 text-white hover:text-accent-400 transition-colors z-[1000] p-2 bg-white/10 rounded-full backdrop-blur-md">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <div class="relative w-full max-w-6xl h-full flex flex-col items-center justify-center">
            <div class="relative flex items-center justify-center w-full h-[70vh]">
                <template x-for="(img, index) in images" :key="index">
                    <img :src="'{{ asset('storage') }}/' + img" 
                         x-show="lightboxImage === index"
                         class="max-w-full max-h-full object-contain rounded-xl shadow-2xl border border-white/10 absolute"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="scale-95 opacity-0"
                         x-transition:enter-end="scale-100 opacity-100">
                </template>
            </div>

            <div class="mt-12 flex gap-8 items-center bg-white/10 backdrop-blur-xl px-8 py-4 rounded-full border border-white/20">
                <button @click="lightboxImage = lightboxImage === 0 ? images.length - 1 : lightboxImage - 1" 
                        class="w-14 h-14 rounded-full bg-white/10 hover:bg-accent-500 text-white flex items-center justify-center transition-all shadow-lg hover:scale-110">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <div class="flex flex-col items-center">
                    <span class="text-white font-black tracking-widest uppercase text-lg" x-text="(lightboxImage + 1) + ' / ' + images.length"></span>
                    <span class="text-white/40 text-[10px] font-bold uppercase tracking-tighter mt-1">Room Sanctuary View</span>
                </div>
                <button @click="lightboxImage = lightboxImage === images.length - 1 ? 0 : lightboxImage + 1" 
                        class="w-14 h-14 rounded-full bg-white/10 hover:bg-accent-500 text-white flex items-center justify-center transition-all shadow-lg hover:scale-110">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
