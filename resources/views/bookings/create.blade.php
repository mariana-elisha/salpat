@extends('layouts.app')

@section('title', 'Book Room')

@section('content')
<div class="bg-creme min-h-screen pt-10 pb-20"
     x-data="{ 
          bookingType: '{{ old('booking_type', 'individual') }}', 
          residentStatus: '{{ old('resident_status', 'non-resident') }}',
          contactPreference: '{{ old('contact_preference', 'email') }}',
          activeImage: 0,
          showLightbox: false,
          lightboxImage: 0,
          images: {{ json_encode($room->images ?? [$room->image]) }}
      }">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-12 p-8 md:p-12 bg-navy rounded-[2.5rem] text-white relative overflow-hidden shadow-2xl border border-white/5">
        <div class="absolute inset-0 bg-gradient-to-r from-gold/5 via-transparent to-gold/5 opacity-40"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:justify-between md:items-center gap-8">
            <div>
                <h2 class="text-gold font-bold uppercase tracking-[0.4em] text-[10px] mb-4 animate-fade-in text-center md:text-left">Secure Reservation</h2>
                <h1 class="text-4xl md:text-6xl font-serif font-bold text-white mb-2 tracking-tight text-center md:text-left">Reserve Your <span class="italic font-normal">Sanctuary</span></h1>
                <p class="text-slate-400 text-lg md:text-xl font-light italic text-center md:text-left">Booking the exquisite <span class="text-gold font-bold">{{ $room->name }}</span></p>
            </div>
            <div class="bg-white/5 backdrop-blur-3xl border border-white/10 p-8 rounded-[1.5rem] flex flex-col items-center justify-center shrink-0 shadow-2xl">
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.3em] mb-3">Starting From</span>
                <div class="flex flex-col items-center">
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl md:text-5xl font-serif font-bold text-white">${{ number_format($room->price_per_night, 2) }}</span>
                        <span class="text-slate-500 font-medium text-xs">/ NIGHT</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-gold/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-white/5 rounded-full blur-[100px] pointer-events-none"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Booking Form -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-[2.5rem] shadow-xl p-10 md:p-14 border border-gold/10 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-48 h-48 bg-navy/[0.02] rounded-bl-[10rem] pointer-events-none"></div>
                
                <h2 class="text-3xl font-serif font-bold text-navy mb-12 relative z-10 border-l-4 border-gold pl-6 text-left">Guest Details</h2>
                
                @if($errors->any())
                    <div class="bg-rose-50 border border-rose-100 text-rose-800 px-6 py-4 rounded-2xl mb-12 flex items-center gap-4">
                        <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        <ul class="list-disc list-inside text-xs font-bold uppercase tracking-tight">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bookings.store') }}" method="POST" class="space-y-10 relative z-10" id="bookingForm">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    
                    <div class="space-y-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <label for="guest_name" class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3 ml-1 text-left">Full Name</label>
                                <input type="text" name="guest_name" id="guest_name" 
                                       value="{{ old('guest_name', auth()->user()?->name ?? '') }}"
                                       class="w-full px-6 py-4 bg-creme-dark/30 border border-transparent rounded-xl focus:border-gold focus:bg-white focus:outline-none transition-all text-navy text-sm placeholder-slate-400" placeholder="e.g. Alexander Hamilton" required>
                            </div>
                            <div>
                                <label for="guest_email" class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3 ml-1 text-left">Email Address</label>
                                <input type="email" name="guest_email" id="guest_email" 
                                       value="{{ old('guest_email', auth()->user()?->email ?? '') }}"
                                       class="w-full px-6 py-4 bg-creme-dark/30 border border-transparent rounded-xl focus:border-gold focus:bg-white focus:outline-none transition-all text-navy text-sm placeholder-slate-400" placeholder="alex@salpat.com" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <label for="guest_passport_id" class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3 ml-1 text-left">Passport / ID Number</label>
                                <input type="text" name="guest_passport_id" id="guest_passport_id" 
                                       value="{{ old('guest_passport_id') }}"
                                       class="w-full px-6 py-4 bg-creme-dark/30 border border-transparent rounded-xl focus:border-gold focus:bg-white focus:outline-none transition-all text-navy text-sm placeholder-slate-400" placeholder="Identification Number" required>
                            </div>
                            <div>
                                <label for="guest_phone" class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3 ml-1 text-left">Phone Number</label>
                                <input type="tel" name="guest_phone" id="guest_phone" 
                                       value="{{ old('guest_phone', auth()->user()?->phone ?? '') }}"
                                       class="w-full px-6 py-4 bg-creme-dark/30 border border-transparent rounded-xl focus:border-gold focus:bg-white focus:outline-none transition-all text-navy text-sm placeholder-slate-400" placeholder="+255 --- --- ---">
                            </div>
                        </div>

                        <div>
                            <label for="guest_address" class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3 ml-1 text-left">Sanctuary Delivery Address</label>
                            <textarea name="guest_address" id="guest_address" rows="3"
                                   class="w-full px-6 py-4 bg-creme-dark/30 border border-transparent rounded-xl focus:border-gold focus:bg-white focus:outline-none transition-all text-navy text-sm placeholder-slate-400 resize-none" placeholder="Your residential or billing address" required>{{ old('guest_address', auth()->user()?->profile?->address ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="my-10 border-t-2 border-dashed border-slate-100"></div>
                    
                    <!-- Occupation Span -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-navy/5 p-10 rounded-[2rem] border border-navy/5">
                        <div>
                            <label for="check_in" class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3 ml-1">Arrival Date</label>
                            <input type="date" name="check_in" id="check_in" 
                                   value="{{ old('check_in', $checkIn) }}" 
                                   min="{{ date('Y-m-d') }}"
                                   class="w-full px-6 py-4 bg-white border border-slate-200 rounded-xl focus:border-gold focus:outline-none transition-all font-bold text-navy text-sm">
                        </div>
                        <div>
                            <label for="check_out" class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3 ml-1">Departure Date</label>
                            <input type="date" name="check_out" id="check_out" 
                                   value="{{ old('check_out', $checkOut) }}"
                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                   class="w-full px-6 py-4 bg-white border border-slate-200 rounded-xl focus:border-gold focus:outline-none transition-all font-bold text-navy text-sm">
                        </div>
                        <div class="md:col-span-2">
                            <label for="number_of_guests" class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3 ml-1">Resident Count</label>
                            <select name="number_of_guests" id="number_of_guests" class="w-full px-6 py-4 bg-white border border-slate-200 rounded-xl focus:border-gold focus:outline-none transition-all text-navy text-sm font-bold appearance-none" required>
                                @for($i = 1; $i <= $room->capacity; $i++)
                                    <option value="{{ $i }}" {{ old('number_of_guests', $guests ?? 1) == $i ? 'selected' : '' }}>{{ $i }} {{ $i > 1 ? 'Residents' : 'Resident' }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <!-- Booking Logic & Preferences -->
                    <div class="space-y-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4 ml-1">Reservation Category</label>
                                <div class="flex gap-4">
                                    <label class="relative flex-1 cursor-pointer">
                                        <input type="radio" name="booking_type" value="individual" x-model="bookingType" class="absolute inset-0 opacity-0 z-20">
                                        <div class="px-3 py-4 border rounded-xl text-center font-bold text-[10px] uppercase tracking-widest transition-all"
                                             :class="bookingType === 'individual' ? 'border-gold bg-gold text-white shadow-lg' : 'border-slate-100 bg-slate-50 text-slate-400'">
                                            Individual
                                        </div>
                                    </label>
                                    <label class="relative flex-1 cursor-pointer">
                                        <input type="radio" name="booking_type" value="company" x-model="bookingType" class="absolute inset-0 opacity-0 z-20">
                                        <div class="px-3 py-4 border rounded-xl text-center font-bold text-[10px] uppercase tracking-widest transition-all"
                                             :class="bookingType === 'company' ? 'border-gold bg-gold text-white shadow-lg' : 'border-slate-100 bg-slate-50 text-slate-400'">
                                            Company
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            @if($room->resident_price_per_night)
                            <div>
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4 ml-1">Resident Status</label>
                                <div class="flex gap-4">
                                    <label class="relative flex-1 cursor-pointer">
                                        <input type="radio" name="resident_status" value="non-resident" x-model="residentStatus" class="absolute inset-0 opacity-0 z-20">
                                        <div class="px-3 py-4 border rounded-xl text-center font-bold text-[10px] uppercase tracking-widest transition-all"
                                             :class="residentStatus === 'non-resident' ? 'border-gold bg-gold text-white shadow-lg' : 'border-slate-100 bg-slate-50 text-slate-400'">
                                            International
                                        </div>
                                    </label>
                                    <label class="relative flex-1 cursor-pointer">
                                        <input type="radio" name="resident_status" value="resident" x-model="residentStatus" class="absolute inset-0 opacity-0 z-20">
                                        <div class="px-3 py-4 border rounded-xl text-center font-bold text-[10px] uppercase tracking-widest transition-all"
                                             :class="residentStatus === 'resident' ? 'border-gold bg-gold text-white shadow-lg' : 'border-slate-100 bg-slate-50 text-slate-400'">
                                            Local
                                        </div>
                                    </label>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-6 ml-1 text-center md:text-left">Communication Preference</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                @foreach(['email' => 'Digital Mail', 'phone' => 'Direct Call', 'whatsapp' => 'WhatsApp'] as $value => $label)
                                    <label class="relative flex flex-col items-center gap-4 cursor-pointer group">
                                        <input type="radio" name="contact_preference" value="{{ $value }}" x-model="contactPreference" class="absolute inset-0 opacity-0 z-20">
                                        <div class="w-full p-8 border rounded-2xl text-center transition-all duration-500"
                                             :class="contactPreference === '{{ $value }}' ? 'border-gold bg-gold/5 ring-1 ring-gold shadow-2xl' : 'border-slate-100 bg-white group-hover:bg-slate-50'">
                                            <span class="text-[10px] font-bold uppercase tracking-[0.2em]"
                                                  :class="contactPreference === '{{ $value }}' ? 'text-gold' : 'text-slate-400'">{{ $label }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-navy rounded-[2rem] p-10 text-white relative overflow-hidden shadow-2xl">
                            <div class="absolute inset-0 bg-gradient-to-r from-gold/10 via-transparent to-gold/10 opacity-30"></div>
                            <div class="relative z-10 space-y-8">
                                <div class="flex items-center gap-4 border-b border-white/10 pb-6">
                                    <div class="w-12 h-12 bg-gold text-white rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold uppercase tracking-widest text-gold text-center">Settlement Details</h4>
                                        <p class="text-[10px] text-slate-400 uppercase tracking-tighter">Manual wire transfer credentials</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="p-6 bg-white/5 border border-white/10 rounded-2xl">
                                        <p class="text-[8px] font-bold text-slate-500 uppercase tracking-widest mb-2">Account Holder</p>
                                        <p class="text-xs font-bold text-white uppercase tracking-widest">Salpat Camp</p>
                                    </div>
                                    <div class="p-6 bg-white/5 border border-white/10 rounded-2xl">
                                        <p class="text-[8px] font-bold text-slate-500 uppercase tracking-widest mb-2">Bank Institution</p>
                                        <p class="text-xs font-bold text-white uppercase tracking-widest">CRDB Bank Moshi</p>
                                    </div>
                                    <div class="p-6 bg-gold/10 border border-gold/20 rounded-2xl">
                                        <p class="text-[8px] font-bold text-gold/60 uppercase tracking-widest mb-2">Tanzanian Shillings</p>
                                        <p class="text-sm font-serif font-bold text-gold tracking-widest">10284710563</p>
                                    </div>
                                    <div class="p-6 bg-gold/10 border border-gold/20 rounded-2xl">
                                        <p class="text-[8px] font-bold text-gold/60 uppercase tracking-widest mb-2">United States Dollars</p>
                                        <p class="text-sm font-serif font-bold text-gold tracking-widest">10285045563</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gold hover:bg-gold/90 text-white py-6 rounded-2xl font-bold uppercase tracking-[0.4em] text-[10px] transition-all shadow-2xl shadow-gold/20 flex items-center justify-center gap-4">
                            Finalize Reservation
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </button>
                    </div>

        <!-- Room Summary Side -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-[2.5rem] shadow-xl overflow-hidden border border-gold/10 sticky top-24">
                <div class="h-64 relative group overflow-hidden">
                    <img src="{{ asset('images/' . $room->image) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-navy/20"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-left">
                        <h4 class="text-2xl font-serif font-bold text-white mb-1 leading-tight">{{ $room->name }}</h4>
                        <span class="text-gold text-[10px] font-bold uppercase tracking-[0.3em]">{{ $room->type }}</span>
                    </div>
                </div>
                
                <div class="p-10 space-y-8">
                    <div class="space-y-6">
                        <div class="flex justify-between items-center group">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Base Rate</span>
                            <span class="text-lg font-serif font-bold text-navy group-hover:text-gold transition-colors">${{ number_format($room->price_per_night, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center group">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Max Guests</span>
                            <span class="text-sm font-bold text-navy uppercase">{{ $room->capacity }} Residents</span>
                        </div>
                        <div class="flex justify-between items-center group">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Amenities</span>
                            <span class="text-[10px] font-bold text-gold uppercase tracking-widest">Inclusive</span>
                        </div>
                    </div>

                    <div class="bg-navy rounded-2xl p-6 text-white relative overflow-hidden">
                        <div class="absolute inset-0 bg-gold/5 animate-pulse"></div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gold/80 mb-2">Notice</p>
                        <p class="text-xs font-light italic text-slate-300">Total settlement calculated at checkout. WhatsApp confirmation required.</p>
                    </div>
                </div>
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
                    <img :src="'{{ asset('images') }}/' + img" 
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
