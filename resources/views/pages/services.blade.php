@extends('layouts.app')

@section('title', 'Amenities & Services - Salpat Luxury')

@section('content')
    <div class="bg-creme min-h-screen">
        <!-- Luxury Page Header -->
        <section class="relative h-[65vh] min-h-[500px] flex items-center justify-center bg-navy overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-1000" style="background-image: url('{{ asset('images/pcs16.png') }}'); opacity: 0.3;"></div>
            </div>
            
            <!-- Luxury Gradient Overlay -->
            <div class="absolute inset-0 z-10 bg-gradient-to-b from-navy/60 via-transparent to-navy pointer-events-none"></div>

            <div class="relative z-20 text-center px-4 max-w-5xl mx-auto mt-20">
                <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] md:text-xs mb-8 animate-fade-in text-center mx-auto">Exceptional Comfort</h2>
                <h1 class="text-6xl md:text-9xl font-serif font-bold text-white mb-10 leading-tight drop-shadow-2xl animate-slide-up text-center">
                    The <span class="italic font-normal text-gold">Sanctuary</span> Services
                </h1>
                <div class="w-16 h-px bg-gold/40 mx-auto animate-scale-x"></div>
            </div>
        </section>

        <!-- Luxury Booking Strip -->
        <div class="max-w-6xl mx-auto px-4 -mt-20 relative z-30 mb-40">
            <div class="bg-navy rounded-[3rem] shadow-2xl border border-white/5 p-4 backdrop-blur-md">
                <form action="{{ route('rooms.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4 p-4">
                    <div class="bg-white/5 p-6 rounded-2xl border border-white/5 group hover:bg-white/10 transition-all text-left">
                        <label class="block text-[8px] font-bold text-gold uppercase tracking-[0.3em] mb-4">Check-In</label>
                        <input type="date" name="check_in" min="{{ date('Y-m-d') }}"
                            class="w-full bg-transparent border-0 p-0 text-white focus:ring-0 text-sm font-bold selection:bg-gold cursor-pointer">
                    </div>
                    <div class="bg-white/5 p-6 rounded-2xl border border-white/5 group hover:bg-white/10 transition-all text-left">
                        <label class="block text-[8px] font-bold text-gold uppercase tracking-[0.3em] mb-4">Check-Out</label>
                        <input type="date" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                            class="w-full bg-transparent border-0 p-0 text-white focus:ring-0 text-sm font-bold selection:bg-gold cursor-pointer">
                    </div>
                    <div class="bg-white/5 p-6 rounded-2xl border border-white/5 group hover:bg-white/10 transition-all text-left">
                        <label class="block text-[8px] font-bold text-gold uppercase tracking-[0.3em] mb-4">Guests</label>
                        <select name="guests" class="w-full bg-transparent border-0 p-0 text-white focus:ring-0 text-sm font-bold cursor-pointer appearance-none">
                            <option value="1" class="bg-navy">01 Guest</option>
                            <option value="2" class="bg-navy">02 Guests</option>
                            <option value="3" class="bg-navy">03 Guests</option>
                            <option value="4" class="bg-navy">04+ Guests</option>
                        </select>
                    </div>
                    <!-- Room Category Select -->
                    <div class="bg-white/5 p-6 rounded-2xl border border-white/5 group hover:bg-white/10 transition-all text-left">
                        <label class="block text-[8px] font-bold text-gold uppercase tracking-[0.3em] mb-4">Room Category</label>
                        <select name="room_type" class="w-full bg-transparent border-0 p-0 text-white focus:ring-0 text-sm font-bold appearance-none cursor-pointer">
                            <option value="" class="bg-navy">All</option>
                            @foreach($roomTypes as $type)
                                <option value="{{ $type }}" class="bg-navy">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-2">
                        <button type="submit" class="w-full h-full bg-gold hover:bg-gold-dark text-white py-5 rounded-2xl font-bold uppercase tracking-widest transition-all shadow-xl active:scale-95 text-[10px]">
                            Check Availability
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Services Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-40">
            <div class="text-center mb-32">
                <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6">Curated Offerings</h2>
                <h3 class="text-5xl md:text-6xl font-serif font-bold text-navy">Refined <span class="italic font-normal">Hospitality</span></h3>
                <div class="w-12 h-px bg-gold/40 mx-auto mt-10"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-16">
                @php
                    $services = [
                        ['icon' => 'bed', 'title' => 'Accommodation', 'desc' => 'Meticulously designed rooms providing a sanctuary of calm and luxury.'],
                        ['icon' => 'concierge-bell', 'title' => '24/7 Concierge', 'desc' => 'Our dedicated team is available around the clock to assist with your every need.'],
                        ['icon' => 'user-shield', 'title' => 'Safe & Secure', 'desc' => 'A fully secured sanctuary with professional guards for your absolute peace of mind.'],
                        ['icon' => 'coffee', 'title' => 'Luxe Breakfast', 'desc' => 'Free delicious breakfast is included in your room fee to start your day right.'],
                        ['icon' => 'utensils', 'title' => 'Dining Art', 'desc' => 'Lunch and dinner meals are freshly prepared on order by our resident chefs.'],
                        ['icon' => 'glass-cheers', 'title' => 'Bar & Lounge', 'desc' => 'A curated selection of soft drinks and spirits for our residents.'],
                        ['icon' => 'wifi', 'title' => 'High-Speed Wi-Fi', 'desc' => 'Free and reliable high-speed fiber internet throughout the entire sanctuary.'],
                        ['icon' => 'car', 'title' => 'Secure Parking', 'desc' => 'Private, secure, and free parking for all our traveling residents.'],
                        ['icon' => 'hiking', 'title' => 'Climbing Support', 'desc' => 'Specialized assistance and dedicated accommodations for mountain climbing expeditions.'],
                    ];
                @endphp

                @foreach($services as $service)
                    <div class="group p-10 rounded-[2.5rem] bg-creme-dark/30 hover:bg-white hover:shadow-4xl transition-all duration-700 border border-transparent hover:border-gold/10 animate-slide-up"
                        style="animation-delay: {{ $loop->index * 100 }}ms">
                        <div class="w-16 h-16 bg-navy text-gold rounded-2xl flex items-center justify-center mb-8 transition-all duration-700 group-hover:bg-gold group-hover:text-white group-hover:rotate-[360deg] shadow-lg">
                            <i class="fas fa-{{ $service['icon'] }} text-xl"></i>
                        </div>
                        <h5 class="text-2xl font-bold text-navy mb-6 font-serif group-hover:text-gold transition-colors">{{ $service['title'] }}</h5>
                        <p class="text-slate-500 font-light leading-relaxed mb-6 flex-grow text-sm">{{ $service['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Luxury Testimonials -->
        <div class="bg-navy py-40 relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <div class="mb-24">
                    <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6 underline decoration-gold/20 underline-offset-8">Resident Experiences</h2>
                    <h3 class="text-5xl md:text-7xl font-serif font-bold text-white mb-6 text-center">Guest <span class="italic font-normal text-gold">Reflections</span></h3>
                    <div class="w-16 h-px bg-gold/40 mx-auto mt-12"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                    @foreach([
                        ['name' => 'Sarah Johnson', 'role' => 'Global Traveler', 'quote' => 'An absolute sanctuary of calm and luxury in Moshi. The attention to detail and personalized service is unmatched.'],
                        ['name' => 'Michael Smith', 'role' => 'Corporate Guest', 'quote' => 'Superb hospitality. The environment was incredibly peaceful, and the dining experience exceeded all expectations.'],
                        ['name' => 'Emily Davis', 'role' => 'Luxury Vacationer', 'quote' => 'From the moment I arrived, I felt like royalty. The rooms are pristine and the overall ambiance is pure luxury.'],
                    ] as $review)
                    <div class="bg-white/5 backdrop-blur-2xl rounded-[3rem] p-12 border border-white/5 relative hover:-translate-y-4 transition-all duration-700 group text-left">
                        <div class="flex gap-2 mb-10">
                            @for($s = 0; $s < 5; $s++)
                                <i class="fas fa-star text-gold text-xs"></i>
                            @endfor
                        </div>
                        
                        <p class="text-white/70 text-lg leading-relaxed mb-12 italic font-serif group-hover:text-white transition-colors">"{{ $review['quote'] }}"</p>
                        
                        <div class="flex items-center gap-6 pt-10 border-t border-white/5">
                            <div class="w-16 h-16 bg-gold text-white rounded-full flex items-center justify-center font-bold text-xl shadow-2xl">
                                {{ strtoupper(substr($review['name'], 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-bold text-white tracking-[0.2em] text-[10px] uppercase">{{ $review['name'] }}</p>
                                <p class="text-gold text-[9px] font-bold uppercase tracking-[0.2em] mt-2">{{ $review['role'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
    @keyframes scale-x {
        0%   { transform: scaleX(0); }
        100% { transform: scaleX(1); }
    }
    .animate-slide-up   { animation: slide-up 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
    .animate-fade-in    { animation: fade-in 1.5s ease-out forwards; opacity: 0; }
    .animate-scale-x    { animation: scale-x 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards; transform-origin: center; }

    .service-card { animation: slide-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) both; opacity: 0; }
    .service-delay-1 { animation-delay: 100ms; }
    .service-delay-2 { animation-delay: 200ms; }
    .service-delay-3 { animation-delay: 300ms; }
    .service-delay-4 { animation-delay: 400ms; }
    .service-delay-5 { animation-delay: 500ms; }
</style>
@endpush
