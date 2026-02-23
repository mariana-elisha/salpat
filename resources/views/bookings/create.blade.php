@extends('layouts.app')

@section('title', 'Book Room')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-slate-800 mb-6">Book {{ $room->name }}</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Booking Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-semibold mb-6">Booking Information</h2>
                
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="check_in" class="block text-sm font-medium text-slate-700 mb-2">Check-in Date</label>
                            <input type="date" name="check_in" id="check_in" 
                                   value="{{ old('check_in', $checkIn) }}" 
                                   min="{{ date('Y-m-d') }}"
                                   class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                        </div>
                        <div>
                            <label for="check_out" class="block text-sm font-medium text-slate-700 mb-2">Check-out Date</label>
                            <input type="date" name="check_out" id="check_out" 
                                   value="{{ old('check_out', $checkOut) }}"
                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                   class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="number_of_guests" class="block text-sm font-medium text-slate-700 mb-2">Number of Guests</label>
                        <input type="number" name="number_of_guests" id="number_of_guests" 
                               value="{{ old('number_of_guests', $guests ?? 1) }}" 
                               min="1" max="{{ $room->capacity }}"
                               class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                        <p class="mt-1 text-sm text-slate-500">Maximum capacity: {{ $room->capacity }} guests</p>
                    </div>

                    <div class="mb-4">
                        <label for="guest_name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                        <input type="text" name="guest_name" id="guest_name" 
                               value="{{ old('guest_name', auth()->user()?->name ?? '') }}"
                               class="w-full border-slate-300 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="guest_email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                        <input type="email" name="guest_email" id="guest_email" 
                               value="{{ old('guest_email', auth()->user()?->email ?? '') }}"
                               class="w-full border-slate-300 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500" required>
                    </div>

                    @guest
                    <div class="mb-4">
                        <label for="guest_address" class="block text-sm font-medium text-slate-700 mb-2">Full Address</label>
                        <textarea name="guest_address" id="guest_address" rows="2"
                               class="w-full border-slate-300 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500" required>{{ old('guest_address') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="guest_passport_id" class="block text-sm font-medium text-slate-700 mb-2">Passport ID / National ID Number</label>
                        <input type="text" name="guest_passport_id" id="guest_passport_id" 
                               value="{{ old('guest_passport_id') }}"
                               class="w-full border-slate-300 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500" required>
                    </div>
                    
                    <div class="bg-primary-50 rounded-xl p-4 mb-4 border border-primary-200">
                        <h3 class="text-sm font-semibold text-primary-900 mb-3">Create an Account (Optional)</h3>
                        <p class="text-xs text-primary-700 mb-3">Set a password to manage this booking later and make future bookings easier.</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="password" class="block text-xs font-medium text-slate-700 mb-1">Password</label>
                                <input type="password" name="password" id="password" 
                                       class="w-full border-slate-300 rounded-lg shadow-sm focus:border-accent-500 focus:ring-accent-500 py-2">
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-xs font-medium text-slate-700 mb-1">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" 
                                       class="w-full border-slate-300 rounded-lg shadow-sm focus:border-accent-500 focus:ring-accent-500 py-2">
                            </div>
                        </div>
                    </div>
                    @endguest



                    <div class="mb-4">
                        <label for="guest_phone" class="block text-sm font-medium text-slate-700 mb-2">Phone Number (Optional)</label>
                        <input type="tel" name="guest_phone" id="guest_phone" 
                               value="{{ old('guest_phone', auth()->user()?->phone ?? '') }}"
                               class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-3">Preferred Contact Method</label>
                        <div class="grid grid-cols-3 gap-3">
                            @foreach(['email' => ['label' => 'Email', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'], 'phone' => ['label' => 'Phone Call', 'icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z'], 'whatsapp' => ['label' => 'WhatsApp', 'icon' => 'M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.832-1.438A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2z']] as $value => $option)
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="contact_preference" value="{{ $value }}"
                                        {{ old('contact_preference', 'email') === $value ? 'checked' : '' }}
                                        class="peer sr-only">
                                    <div class="flex flex-col items-center gap-2 p-3 border-2 border-slate-200 rounded-xl text-center transition-all peer-checked:border-orange-500 peer-checked:bg-orange-50 hover:border-orange-300">
                                        <svg class="w-6 h-6 text-slate-400 peer-checked:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $option['icon'] }}"/>
                                        </svg>
                                        <span class="text-xs font-medium text-slate-600">{{ $option['label'] }}</span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="special_requests" class="block text-sm font-medium text-slate-700 mb-2">Special Requests (Optional)</label>
                        <textarea name="special_requests" id="special_requests" rows="4"
                                  class="w-full border-slate-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-orange-500"
                                  placeholder="Any special requests or notes...">{{ old('special_requests') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-700 mb-3">Payment Method</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- M-Pesa Option -->
                            <label for="payment_mpesa" class="relative flex items-center gap-3 p-4 border-2 border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 hover:border-accent-300 transition-all has-[:checked]:border-accent-500 has-[:checked]:bg-accent-50">
                                <input type="radio" name="payment_method" id="payment_mpesa" value="mpesa"
                                    {{ old('payment_method', 'mpesa') === 'mpesa' ? 'checked' : '' }}
                                    class="w-5 h-5 text-accent-500 border-slate-300 focus:ring-accent-500 shrink-0">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800">M-Pesa</span>
                                    <span class="text-xs text-slate-500">Pay securely via Mobile</span>
                                </div>
                            </label>

                            <!-- Card Option -->
                            <label for="payment_card" class="relative flex items-center gap-3 p-4 border-2 border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 hover:border-accent-300 transition-all has-[:checked]:border-accent-500 has-[:checked]:bg-accent-50">
                                <input type="radio" name="payment_method" id="payment_card" value="card"
                                    {{ old('payment_method', 'mpesa') === 'card' ? 'checked' : '' }}
                                    class="w-5 h-5 text-accent-500 border-slate-300 focus:ring-accent-500 shrink-0">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800">Card</span>
                                    <span class="text-xs text-slate-500">Credit / Debit Card</span>
                                </div>
                            </label>

                            <!-- Arrival Option -->
                            <label for="payment_arrival" class="relative flex items-center gap-3 p-4 border-2 border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 hover:border-accent-300 transition-all has-[:checked]:border-accent-500 has-[:checked]:bg-accent-50">
                                <input type="radio" name="payment_method" id="payment_arrival" value="arrival"
                                    {{ old('payment_method', 'mpesa') === 'arrival' ? 'checked' : '' }}
                                    class="w-5 h-5 text-accent-500 border-slate-300 focus:ring-accent-500 shrink-0">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800">Arrival</span>
                                    <span class="text-xs text-slate-500">Pay at the desk</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-accent-500 text-white px-6 py-3 rounded-xl hover:bg-accent-600 transition font-semibold shadow-lg">
                        Proceed to Booking
                    </button>
                </form>
            </div>
        </div>

        <!-- Room Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg p-6 sticky top-4">
                <h3 class="text-xl font-semibold mb-4">Room Summary</h3>
                
                @if($room->image)
                    <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="w-full h-48 object-cover rounded-xl mb-4">
                @else
                    <div class="w-full h-48 bg-gray-200 rounded-xl mb-4 flex items-center justify-center">
                        <span class="text-slate-400">No Image</span>
                    </div>
                @endif

                <h4 class="font-semibold text-lg mb-2">{{ $room->name }}</h4>
                <p class="text-sm text-slate-600 mb-4">{{ \Illuminate\Support\Str::limit($room->description, 100) }}</p>

                <div class="border-t border-slate-200 pt-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-slate-600">Price per night:</span>
                        <span class="font-semibold">${{ number_format($room->price_per_night, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-slate-600">Capacity:</span>
                        <span class="font-semibold">{{ $room->capacity }} guests</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Type:</span>
                        <span class="font-semibold">{{ $room->type }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
