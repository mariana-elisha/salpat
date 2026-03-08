@extends('layouts.app')

@section('title', 'Book Room')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
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
                    
                    <!-- Dates -->
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
                    </div>

                    <!-- Personal Info -->
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="md:col-span-1">
                                <label for="guest_name" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Full Name</label>
                                <input type="text" name="guest_name" id="guest_name" 
                                       value="{{ old('guest_name', auth()->user()?->name ?? '') }}"
                                       class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900" placeholder="e.g. John Doe" required>
                            </div>
                            <div class="md:col-span-1">
                                <label for="number_of_guests" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Number of Guests</label>
                                <div class="relative">
                                    <select name="number_of_guests" id="number_of_guests" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900 appearance-none" required>
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

                        <div>
                            <label for="guest_email" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Email Address</label>
                            <input type="email" name="guest_email" id="guest_email" 
                                   value="{{ old('guest_email', auth()->user()?->email ?? '') }}"
                                   class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900" placeholder="john@example.com" required>
                        </div>

                        @guest
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label for="guest_passport_id" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Passport / National ID</label>
                                <input type="text" name="guest_passport_id" id="guest_passport_id" 
                                       value="{{ old('guest_passport_id') }}"
                                       class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900" placeholder="ID Number" required>
                            </div>
                            <div>
                                <label for="guest_phone" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Phone Number</label>
                                <input type="tel" name="guest_phone" id="guest_phone" 
                                       value="{{ old('guest_phone') }}"
                                       class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900" placeholder="+255 7xx xxx xxx">
                            </div>
                        </div>

                        <div>
                            <label for="guest_address" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Full Address</label>
                            <textarea name="guest_address" id="guest_address" rows="2"
                                   class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900 resize-none" placeholder="Residential Address" required>{{ old('guest_address') }}</textarea>
                        </div>
                        
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
                        @else
                        <div>
                            <label for="guest_phone" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Phone Number (Optional)</label>
                            <input type="tel" name="guest_phone" id="guest_phone" 
                                   value="{{ old('guest_phone', auth()->user()?->phone ?? '') }}"
                                   class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-accent-500 focus:border-accent-500 transition-all text-slate-900" placeholder="+255 7xx xxx xxx">
                        </div>
                        @endguest
                    </div>

                    <!-- Preferences -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Preferred Contact Method</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @foreach(['email' => ['label' => 'Email', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'], 'phone' => ['label' => 'Phone', 'icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z'], 'whatsapp' => ['label' => 'WhatsApp', 'icon' => 'M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.832-1.438A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2z']] as $value => $option)
                                    <label class="block cursor-pointer group">
                                        <input type="radio" name="contact_preference" value="{{ $value }}" id="contact_{{ $value }}"
                                            {{ old('contact_preference', 'email') === $value ? 'checked' : '' }}
                                            class="peer absolute opacity-0 w-px h-px">
                                        <div class="flex flex-col items-center gap-3 p-5 border-2 border-slate-100 rounded-2xl text-center transition-all peer-checked:border-accent-500 peer-checked:bg-accent-50 group-hover:bg-slate-50 shadow-sm">
                                            <div class="w-6 h-6 border-2 border-slate-300 rounded-full flex items-center justify-center peer-checked:border-accent-500 transition-colors">
                                                <div class="w-3 h-3 bg-accent-500 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                                            </div>
                                            <div class="flex flex-col items-center gap-1">
                                                <svg class="w-8 h-8 text-slate-400 peer-checked:text-accent-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="pointer-events: none;">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $option['icon'] }}"/>
                                                </svg>
                                                <span class="text-xs font-bold text-slate-500 peer-checked:text-accent-700 uppercase tracking-widest">{{ $option['label'] }}</span>
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

                    <!-- Payment -->
                    <div class="space-y-4">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Select Payment Method</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach([
                                'mpesa' => ['label' => 'M-Pesa', 'desc' => 'Instant Mobile Payment'],
                                'card' => ['label' => 'Credit Card', 'desc' => 'Visa or Mastercard'],
                                'arrival' => ['label' => 'On Arrival', 'desc' => 'Pay at the reception']
                            ] as $pm => $dat)
                                <label class="block cursor-pointer group">
                                    <input type="radio" name="payment_method" value="{{ $pm }}" id="pay_{{ $pm }}"
                                        {{ old('payment_method', 'mpesa') === $pm ? 'checked' : '' }}
                                        class="peer absolute opacity-0 w-px h-px">
                                    <div class="flex items-center gap-4 p-5 border-2 border-slate-100 rounded-2xl transition-all peer-checked:border-accent-500 peer-checked:bg-accent-50 group-hover:bg-slate-50 shadow-sm">
                                        <div class="w-6 h-6 border-2 border-slate-300 rounded-full flex items-center justify-center peer-checked:border-accent-500 group-hover:border-slate-400 transition-colors">
                                            <div class="w-3 h-3 bg-accent-500 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-bold text-slate-800 peer-checked:text-accent-700">{{ $dat['label'] }}</span>
                                            <span class="text-[10px] text-slate-500 uppercase tracking-widest font-medium group-hover:text-slate-600">{{ $dat['desc'] }}</span>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
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
                <div class="h-48 relative overflow-hidden">
                    @if($room->image)
                        <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="w-full h-full object-cover opacity-80 group-hover:scale-110 transition-transform duration-700">
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
</div>
@endsection
