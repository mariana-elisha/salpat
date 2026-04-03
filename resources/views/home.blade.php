@extends('layouts.app')

@section('title', 'Salpat Camp Lodge-Moshi - Luxury Sanctuary in Kilimanjaro')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-screen min-h-[700px] flex items-center justify-center bg-navy overflow-hidden">
        <!-- Background Slideshow Container -->
        <div id="hero-slideshow" class="absolute inset-0 z-0">
            <div class="absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-1000" style="background-image: url('{{ asset('images/pcs1.jpeg') }}'); opacity: 0.5;"></div>
        </div>
        
        <!-- Luxury Gradient Overlay -->
        <div class="absolute inset-0 z-10 bg-gradient-to-b from-navy/60 via-transparent to-navy/80 pointer-events-none"></div>

        <div class="relative z-20 text-center px-4 max-w-5xl mx-auto mt-20">
            <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] md:text-xs mb-8 animate-reveal">Welcome to Salpat Camp</h2>
            <h1 class="text-5xl md:text-[8rem] font-serif font-bold text-white mb-10 leading-[0.85] drop-shadow-3xl animate-reveal animation-delay-300">
                Comfortable Rooms <span class="italic font-normal text-gold block mt-6">& Best Service in Moshi</span>
            </h1>
            <div class="w-16 h-px bg-gold/40 mx-auto mb-12 animate-slide-up-fade animation-delay-600"></div>
            <p class="text-lg md:text-xl text-slate-100 mb-20 font-light max-w-4xl mx-auto leading-relaxed animate-slide-up-fade animation-delay-900 balance overflow-hidden">
                Salpat Camp is a premium lodge located in the peaceful Soweto district of Moshi. While located near the mountain, we specialize in providing dedicated accommodations primarily for those embarking on mountain climbing expeditions. We are dedicated to providing a superior experience for tourists, families, and business travelers, offering high-quality accommodation and genuine Tanzanian hospitality for a perfect stay.
            </p>
            <div class="animate-slide-up-fade animation-delay-1200 mt-12">
                <a href="{{ route('rooms.index') }}" class="bg-gold hover:bg-gold-dark text-white px-12 py-5 rounded-2xl font-bold uppercase tracking-[0.3em] text-[10px] transition-all shadow-2xl shadow-gold/30 hover:-translate-y-1 active:scale-95 inline-block">
                    Discover Our Rooms
                </a>
            </div>
        </div>

        <!-- Luxury Wave Divider -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-20">
            <svg class="relative block w-[calc(100%+1.3px)] h-[120px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5,73.84-4.36,147.54,16.88,218.2,35.26,69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="fill-white"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="fill-white"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="fill-white"></path>
            </svg>
        </div>
    </section>

    <!-- Integrated Luxury Booking Bar -->
    <section id="booking-anchor" class="relative z-30 -mt-20 max-w-7xl mx-auto px-4 lg:px-8">
        <div class="bg-white rounded-[3rem] shadow-[0_40px_100px_rgba(11,16,33,0.15)] p-4 md:p-6 border border-slate-100 backdrop-blur-3xl">
            <form action="{{ route('rooms.index') }}" method="GET" class="flex flex-col lg:flex-row items-stretch gap-4">
                <div class="flex-grow grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-slate-50 group hover:bg-gold/5 transition-colors p-6 rounded-2xl border border-transparent hover:border-gold/20">
                        <label class="block text-[8px] font-bold text-gold uppercase tracking-[0.4em] mb-4">Check-In</label>
                        <input type="date" name="check_in" value="{{ request('check_in') }}" min="{{ date('Y-m-d') }}" required
                               class="w-full bg-transparent border-0 p-0 text-navy focus:ring-0 text-xl font-serif font-bold cursor-pointer">
                    </div>
                    <div class="bg-slate-50 group hover:bg-gold/5 transition-colors p-6 rounded-2xl border border-transparent hover:border-gold/20">
                        <label class="block text-[8px] font-bold text-gold uppercase tracking-[0.4em] mb-4">Check-Out</label>
                        <input type="date" name="check_out" value="{{ request('check_out') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required
                               class="w-full bg-transparent border-0 p-0 text-navy focus:ring-0 text-xl font-serif font-bold cursor-pointer">
                    </div>
                    <div class="bg-slate-50 group hover:bg-gold/5 transition-colors p-6 rounded-2xl border border-transparent hover:border-gold/20">
                        <label class="block text-[8px] font-bold text-gold uppercase tracking-[0.4em] mb-4">Guests</label>
                        <select name="guests" class="w-full bg-transparent border-0 p-0 text-navy focus:ring-0 text-xl font-serif font-bold appearance-none cursor-pointer">
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ request('guests', 1) == $i ? 'selected' : '' }}>{{ $i }} {{ Str::plural('Guest', $i) }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <!-- Room Category Select -->
                <div class="lg:w-64 bg-slate-50 group hover:bg-gold/5 transition-colors p-6 rounded-2xl border border-transparent hover:border-gold/20">
                    <label class="block text-[8px] font-bold text-gold uppercase tracking-[0.4em] mb-4">Room Category</label>
                    <select name="room_type" class="w-full bg-transparent border-0 p-0 text-navy focus:ring-0 text-sm font-serif font-bold appearance-none cursor-pointer">
                        <option value="">All Categories</option>
                        @foreach($roomTypes as $type)
                            <option value="{{ $type }}" {{ request('room_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="lg:w-72 bg-navy hover:bg-navy-dark text-gold py-8 lg:py-0 rounded-[2rem] font-bold uppercase tracking-[0.4em] text-[10px] transition-all shadow-2xl shadow-navy/20 active:scale-95 flex items-center justify-center gap-4">
                    Check Availability
                    <i class="fas fa-search text-xs"></i>
                </button>
            </form>
        </div>
    </section>

    <!-- Features Section (Aquila/Prime Land Style) -->
    <section class="relative z-10 py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-24 gap-12">
                <div class="max-w-2xl">
                    <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6">Elevating Your Journey</h2>
                    <h3 class="text-5xl md:text-6xl font-serif font-bold text-navy leading-none">Premier <span class="italic font-normal text-gold block mt-2">Services</span></h3>
                </div>
                <div class="w-16 h-px bg-gold/40 hidden md:block mb-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-16">
                @php
                    $homeServices = [
                        ['icon' => 'bed', 'title' => 'Luxe Accommodation', 'desc' => 'Meticulously designed rooms providing a sanctuary of calm and luxury after your Kilimanjaro treks.'],
                        ['icon' => 'concierge-bell', 'title' => '24/7 Concierge', 'desc' => 'Our dedicated team is available around the clock to assist with your every need and local arrangements.'],
                        ['icon' => 'utensils', 'title' => 'Dining & Bar', 'desc' => 'Free breakfast included. Savor delicious Tanzanian and international meals custom-made by our expert chefs.'],
                        ['icon' => 'wifi', 'title' => 'High-Speed Wi-Fi', 'desc' => 'Reliable, high-speed fiber internet throughout the entire sanctuary for all your digital needs.'],
                        ['icon' => 'user-shield', 'title' => '24/7 Security', 'desc' => 'A fully secured sanctuary with professional guards and surveillance for your absolute peace of mind.'],
                        ['icon' => 'hiking', 'title' => 'Adventure Support', 'desc' => 'Specialized support and dedicated accommodations for guests embarking on mountain climbing expeditions.'],
                    ];
                @endphp

                @foreach($homeServices as $service)
                    <div class="group p-10 rounded-[2.5rem] bg-creme-dark/30 hover:bg-white hover:shadow-4xl transition-all duration-700 border border-transparent hover:border-gold/10">
                        <div class="w-16 h-16 bg-navy text-gold rounded-2xl flex items-center justify-center mb-8 transition-all duration-700 group-hover:bg-gold group-hover:text-white shadow-lg">
                            <i class="fas fa-{{ $service['icon'] }} text-xl"></i>
                        </div>
                        <h5 class="text-2xl font-bold text-navy mb-6 font-serif">{{ $service['title'] }}</h5>
                        <p class="text-slate-500 font-light leading-relaxed text-sm">{{ $service['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Home Page About Section -->
    <section class="py-40 bg-slate-50 relative overflow-hidden bg-[url('https://www.transparenttextures.com/patterns/gplay.png')]">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-gold/5 rounded-full blur-3xl animate-pulse"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                <div class="relative group">
                    <div class="relative rounded-[3.5rem] overflow-hidden shadow-4xl border-8 border-white group-hover:-translate-y-4 transition-all duration-1000">
                        <img src="{{ asset('images/pcs17.png') }}" alt="Salpat Lodge Story" class="w-full h-[600px] object-cover scale-105 group-hover:scale-100 transition-transform duration-[3s]">
                        <div class="absolute inset-0 bg-navy/10 group-hover:bg-transparent transition-colors duration-1000"></div>
                    </div>
                </div>
                <div class="space-y-12">
                    <div class="inline-flex items-center gap-6">
                        <div class="w-16 h-px bg-gold"></div>
                        <h2 class="text-gold font-bold uppercase tracking-[0.6em] text-[10px]">A Great Story in Moshi</h2>
                    </div>
                    <h3 class="text-5xl md:text-7xl font-serif font-bold text-navy leading-tight">
                        Our <span class="text-gold italic font-normal">History</span>
                    </h3>
                    <p class="text-slate-500 font-light leading-relaxed text-xl first-letter:text-6xl first-letter:font-serif first-letter:text-gold first-letter:mr-4 first-letter:float-left first-letter:leading-[0.8]">
                        Salpat Camp is a premium lodge located in the peaceful Soweto district of Moshi. While located near the mountain, we specialize in providing dedicated accommodations primarily for those embarking on mountain climbing expeditions. We are dedicated to providing a superior experience for tourists, families, and business travelers, offering high-quality accommodation and genuine Tanzanian hospitality for a perfect stay.
                    </p>
                    <div class="pt-8">
                        <a href="{{ route('about') }}" class="inline-flex items-center gap-6 text-gold font-bold uppercase tracking-[0.5em] text-[10px] hover:text-navy transition-colors group">
                            <span>Read Entire Story</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-4 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Culinary Excellence Section (Refined Lifestyle style) -->
    <section class="py-40 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-24">
                <div class="w-full lg:w-1/2 space-y-12">
                    <div>
                        <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6">Dine & Unwind</h2>
                        <h3 class="text-5xl md:text-7xl font-serif font-bold text-navy leading-tight">
                            Exquisite <br><span class="text-gold italic font-normal">Dining Art</span>
                        </h3>
                        <div class="w-16 h-px bg-gold/40 mt-8"></div>
                    </div>
                    
                    <p class="text-slate-600 font-light leading-relaxed text-lg italic">
                        "Savor the finest Tanzanian flavors and international delicacies, meticulously prepared by our world-class chefs. From sunrise breakfast to moonlit cocktails by the pool bar."
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 border-t border-slate-100 pt-12">
                        <div class="space-y-4">
                            <h4 class="text-navy font-bold uppercase tracking-widest text-xs flex items-center gap-3">
                                <span class="w-2 h-2 rounded-full bg-gold"></span>
                                Restaurant
                            </h4>
                            <p class="text-[11px] text-slate-500 leading-relaxed uppercase tracking-widest">Open Daily: 7am - 10pm</p>
                        </div>
                        <div class="space-y-4">
                            <h4 class="text-navy font-bold uppercase tracking-widest text-xs flex items-center gap-3">
                                <span class="w-2 h-2 rounded-full bg-gold"></span>
                                Pool Bar
                            </h4>
                            <p class="text-[11px] text-slate-500 leading-relaxed uppercase tracking-widest">Drinks: 10am - 11pm</p>
                        </div>
                    </div>

                    <div class="pt-8 flex flex-wrap gap-6">
                        <a href="{{ route('services') }}" class="px-10 py-5 bg-navy text-white rounded-2xl font-bold uppercase tracking-widest text-[10px] hover:bg-gold transition-colors">View Full Menu</a>
                        <a href="{{ route('contact') }}" class="px-10 py-5 border border-navy/10 text-navy rounded-2xl font-bold uppercase tracking-widest text-[10px] hover:border-gold hover:text-gold transition-colors">Book a Table</a>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 relative">
                    <div id="dining-slider" class="splide rounded-[3rem] overflow-hidden shadow-4xl group">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide h-[600px] relative">
                                    <img src="{{ asset('images/pcs3.jpeg') }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-navy/10"></div>
                                </li>
                                <li class="splide__slide h-[600px] relative">
                                    <img src="{{ asset('images/pcs15.jpeg') }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-navy/10"></div>
                                </li>
                                <li class="splide__slide h-[600px] relative">
                                    <img src="{{ asset('images/pcs1.jpeg') }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-navy/10"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Decorative floating element -->
                    <div class="absolute -bottom-10 -left-10 bg-white p-8 rounded-3xl shadow-4xl z-20 hidden sm:block border border-slate-50">
                        <p class="text-gold font-bold uppercase tracking-widest text-[8px] mb-2">Chef's Special</p>
                        <p class="text-navy font-serif font-bold text-xl">Local Flavors,<br>Global Standards.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section (Aquila/Prime Land Style) -->
    <section class="py-40 bg-creme relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="text-center mb-24">
                <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6">Guest Testimonials</h2>
                <h3 class="text-5xl md:text-6xl font-serif font-bold text-navy">What Our <br><span class="italic font-normal text-gold">Visitors Say</span></h3>
                <div class="w-16 h-px bg-gold/40 mx-auto mt-8"></div>
            </div>

            <div id="testimonial-slider" class="splide" aria-label="Guest Testimonials">
                <div class="splide__track">
                    <ul class="splide__list">
                        @forelse($testimonials ?? [] as $testimonial)
                            <li class="splide__slide px-4">
                                <div class="bg-white p-12 md:p-16 rounded-[3rem] shadow-2xl shadow-navy/5 border border-slate-50 flex flex-col h-full relative">
                                    <div class="flex gap-1 mb-8 text-gold">
                                        @for($i = 0; $i < ($testimonial->rating ?? 5); $i++)
                                            <i class="fas fa-star text-[10px]"></i>
                                        @endfor
                                    </div>
                                    <p class="text-slate-600 font-light leading-relaxed text-lg italic mb-12 flex-grow overflow-hidden">
                                        "{{ $testimonial->comments }}"
                                    </p>
                                    <div class="flex items-center gap-6 mt-auto pt-8 border-t border-slate-50">
                                        <div class="w-12 h-12 bg-creme-dark rounded-full flex items-center justify-center text-navy font-bold text-lg font-serif">
                                            {{ substr($testimonial->guest_name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="text-navy font-bold text-sm tracking-widest uppercase">{{ $testimonial->guest_name }}</p>
                                            <p class="text-gold font-bold text-[9px] uppercase tracking-widest mt-1">Verified Guest</p>
                                        </div>
                                    </div>
                                    <!-- Quote icon -->
                                    <i class="fas fa-quote-right absolute top-12 right-12 text-5xl text-gold/5"></i>
                                </div>
                            </li>
                        @empty
                            <!-- Static Testimonials if none in DB -->
                            @php
                                $staticTestimonials = [
                                    ['name' => 'Serah', 'comment' => 'The staff are helpful and understanding. The hotel is very clean. The space is beautiful, and it offers calmness and is very quiet.', 'loc' => 'Kenya'],
                                    ['name' => 'Sharon Jeruto', 'comment' => 'The staff from the gate, to the reception to the kitchen and the servers are just but amaazzzing. Special mention to the entire team.', 'loc' => 'Kenya'],
                                    ['name' => 'Arina', 'comment' => 'The best food in Moshi. We liked it here. Very friendly staff, clean rooms, low prices for food and more than that, the food was delicious.', 'loc' => 'Moldova'],
                                ];
                            @endphp
                            @foreach($staticTestimonials as $st)
                                <li class="splide__slide px-4">
                                    <div class="bg-white p-12 md:p-16 rounded-[3rem] shadow-2xl shadow-navy/5 border border-slate-50 flex flex-col h-full relative">
                                        <div class="flex gap-1 mb-8 text-gold">
                                            <i class="fas fa-star text-[10px]"></i>
                                            <i class="fas fa-star text-[10px]"></i>
                                            <i class="fas fa-star text-[10px]"></i>
                                            <i class="fas fa-star text-[10px]"></i>
                                            <i class="fas fa-star text-[10px]"></i>
                                        </div>
                                        <p class="text-slate-600 font-light leading-relaxed text-lg italic mb-12 flex-grow">
                                            "{{ $st['comment'] }}"
                                        </p>
                                        <div class="flex items-center gap-6 mt-auto pt-8 border-t border-slate-50">
                                            <div class="w-12 h-12 bg-creme-dark rounded-full flex items-center justify-center text-navy font-bold text-lg font-serif">
                                                {{ substr($st['name'], 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="text-navy font-bold text-sm tracking-widest uppercase">{{ $st['name'] }}</p>
                                                <p class="text-gold font-bold text-[9px] uppercase tracking-widest mt-1">{{ $st['loc'] }}</p>
                                            </div>
                                        </div>
                                        <i class="fas fa-quote-right absolute top-12 right-12 text-5xl text-gold/5"></i>
                                    </div>
                                </li>
                            @endforeach
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Removed redundant services section as it is merged above -->

    <!-- Experience Our Collection (Featured Rooms) -->
    <section class="py-40 bg-slate-50 relative overflow-hidden bg-[url('https://www.transparenttextures.com/patterns/graphy-very-light.png')]">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-navy/[0.02] -skew-x-12 translate-x-32 pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-32 gap-12">
                <div class="max-w-2xl">
                    <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6">Selected Experiences</h2>
                    <h3 class="text-5xl md:text-7xl font-serif font-bold text-navy leading-none">The <span class="italic font-normal text-gold block mt-2">Residential Suite</span></h3>
                </div>
                <a href="{{ route('rooms.index') }}" class="group flex items-center gap-8 bg-white px-12 py-6 rounded-2xl shadow-xl hover:bg-navy hover:text-white transition-all duration-700">
                    <span class="text-[10px] font-bold uppercase tracking-[0.4em]">View Grand Collection</span>
                    <div class="w-10 h-10 rounded-full border border-gold/20 flex items-center justify-center group-hover:bg-gold group-hover:text-white transition-all">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>

            <div id="experience-slider" class="splide" aria-label="Selected Experiences Collection">
                <div class="splide__track">
                    <ul class="splide__list">
                        @forelse($featuredRooms ?? [] as $room)
                            <li class="splide__slide px-4">
                                <div class="group bg-white rounded-[3.5rem] overflow-hidden shadow-2xl shadow-navy/5 hover:shadow-navy/20 transition-all duration-1000 flex flex-col h-full hover:-translate-y-4 border border-slate-50">
                                    <div class="relative h-[450px] overflow-hidden">
                                        @if($room->image)
                                            <img src="{{ asset('images/' . $room->image) }}" alt="{{ $room->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-2000">
                                        @else
                                            <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                                <span class="text-slate-300 font-serif italic text-2xl tracking-widest uppercase opacity-40">Salpat Lodge</span>
                                            </div>
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-navy/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-1000"></div>
                                        
                                        <div class="absolute top-8 left-8 bg-white/95 backdrop-blur-md text-navy px-6 py-2 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] shadow-2xl">
                                            {{ $room->type }}
                                        </div>
                                    </div>
                                    <div class="p-8 md:p-12 flex flex-col flex-grow relative">
                                        <div class="flex items-center justify-between mb-8 border-l-4 border-gold pl-6">
                                            <h4 class="text-3xl md:text-4xl font-serif font-bold text-navy group-hover:text-gold transition-colors">{{ $room->name }}</h4>
                                            <div class="w-12 h-px bg-gold/10"></div>
                                        </div>
                                        
                                        <div class="flex items-baseline gap-3 mb-10">
                                            <span class="text-4xl font-serif font-bold text-navy">${{ number_format($room->price_per_night, 0) }}</span>
                                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.4em]">per night</span>
                                        </div>
                                        
                                        <p class="text-slate-500 font-light line-clamp-2 mb-12 flex-grow leading-relaxed italic text-lg">{{ $room->description }}</p>
                                        
                                        <a href="{{ route('rooms.show', $room) }}" class="block w-full text-center bg-slate-50 group-hover:bg-navy text-navy group-hover:text-gold py-6 rounded-2xl font-bold uppercase tracking-[0.4em] transition-all duration-700 text-[10px] border border-slate-100">
                                            Discover Suite
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <div class="w-full text-center py-40 border-2 border-dashed border-slate-200 rounded-[4rem]">
                                <p class="text-slate-400 font-serif italic text-2xl tracking-widest">Our suites are currently private.</p>
                            </div>
                        @endforelse
                    </ul>
                </div>

                <!-- Custom Slider Controls -->
                <div class="splide__arrows flex justify-center gap-6 mt-20">
                    <button class="splide__arrow splide__arrow--prev !static !w-20 !h-20 !bg-white !rounded-full !shadow-xl !opacity-100 hover:!bg-navy hover:!text-white transition-all">
                        <i class="fas fa-chevron-left text-xs"></i>
                    </button>
                    <button class="splide__arrow splide__arrow--next !static !w-20 !h-20 !bg-white !rounded-full !shadow-xl !opacity-100 hover:!bg-navy hover:!text-white transition-all">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Luxury Gallery Experience (Infinite Scroll) -->
    @if($galleries->count() > 0)
    <section class="py-40 bg-white overflow-hidden bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 text-center">
            <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6">Gallery Experiences</h2>
            <h3 class="text-5xl md:text-7xl font-serif font-bold text-navy">Reflections of <span class="italic font-normal text-gold">The Sanctuary</span></h3>
        </div>

        <div id="gallery-scroller" class="splide" aria-label="Sanctuary Moments Portfolio">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($galleries as $image)
                        <li class="splide__slide">
                            <div class="relative h-[500px] w-full group overflow-hidden">
                                <img src="{{ asset('images/' . $image->image_path) }}" 
                                     alt="{{ $image->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-[3s] group-hover:scale-125">
                                <div class="absolute inset-0 bg-navy/20 group-hover:bg-transparent transition-colors duration-1000"></div>
                                <div class="absolute bottom-10 left-10 opacity-0 group-hover:opacity-100 transition-all duration-700 transform translate-y-4 group-hover:translate-y-0">
                                    <h4 class="text-white font-serif font-bold text-2xl italic tracking-wider">{{ $image->title }}</h4>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @endif
    
    <!-- Frequently Asked Questions -->
    <section class="py-40 bg-slate-50 bg-[url('https://www.transparenttextures.com/patterns/gplay.png')]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-32">
                <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6">Refining Your Stay</h2>
                <h3 class="text-5xl md:text-6xl font-serif font-bold text-navy">Distinguished <span class="italic font-normal">Questions</span></h3>
            </div>

            <div class="space-y-6" x-data="{ active: null }">
                @php
                    $faqs = [
                        [
                            'q' => 'Where is Salpat Lodge-Moshi located?',
                            'a' => 'We are located at Falcon Street 1, Soweto, in the quiet and safe district of Moshi; while located near the mountain, we specialize in providing dedicated accommodations primarily for those embarking on mountain climbing expeditions.'
                        ],
                        [
                            'q' => 'What time can I check-in and check-out?',
                            'a' => 'Check-in is from 8:00 AM and check-out is by 11:00 AM. Please contact us if you need early check-in or late check-out.'
                        ],
                        [
                            'q' => 'Is breakfast included in the room price?',
                            'a' => 'Yes, a free delicious breakfast is included in your room fee for all guests staying with us.'
                        ],
                        [
                            'q' => 'Can you help me arrange Kilimanjaro climbing or safaris?',
                            'a' => 'Absolutely. Our concierge can help you plan and connect with trusted local guides for climbing or safari tours.'
                        ],
                        [
                            'q' => 'Is there free parking and Wi-Fi?',
                            'a' => 'Yes, all guests have access to free, secure parking and high-speed Wi-Fi throughout the entire property.'
                        ]
                    ];
                @endphp

                @foreach($faqs as $i => $faq)
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden transition-all duration-300">
                        <button 
                            @click="active !== {{ $i }} ? active = {{ $i }} : active = null"
                            class="w-full px-10 py-10 flex items-center justify-between text-left group">
                            <span class="text-xl font-serif font-bold text-navy group-hover:text-gold transition-colors">{{ $faq['q'] }}</span>
                            <div class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-gold group-hover:text-white transition-all transform"
                                 :class="active === {{ $i }} ? 'rotate-180 bg-gold text-white border-gold' : ''">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </button>
                        <div 
                            x-show="active === {{ $i }}"
                            x-collapse
                            class="px-10 pb-10">
                            <p class="text-slate-500 font-light leading-relaxed text-lg italic border-t border-slate-50 pt-8">
                                "{{ $faq['a'] }}"
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Sanctuary Map Section -->
    <section class="py-40 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-navy rounded-[4rem] overflow-hidden shadow-4xl group border border-white/5 relative">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="p-16 md:p-32 flex flex-col justify-center text-white relative z-10">
                        <div class="mb-16">
                            <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-8">The Gateway</h2>
                            <h3 class="text-5xl md:text-7xl font-serif font-bold mb-10 leading-none">Gateway to <span class="italic font-normal text-gold block mt-2">Kilimanjaro</span></h3>
                            <div class="w-20 h-px bg-gold/40"></div>
                        </div>
                        
                        <div class="space-y-12 mb-20">
                            <div class="flex items-start gap-8 group/item">
                                <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center text-gold border border-white/10 group-hover/item:bg-gold group-hover/item:text-white transition-all">
                                    <i class="fas fa-map-marker-alt text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-[8px] font-bold text-white/40 uppercase tracking-[0.3em] mb-2">Location Identity</p>
                                    <p class="text-2xl font-serif font-bold">Falcon Street 1, Soweto<br>Moshi, Tanzania</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-8 group/item">
                                <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center text-gold border border-white/10 group-hover/item:bg-gold group-hover/item:text-white transition-all">
                                    <i class="fas fa-phone-alt text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-[8px] font-bold text-white/40 uppercase tracking-[0.3em] mb-2">Concierge Line</p>
                                    <p class="text-2xl font-serif font-bold">+255 770 307 759</p>
                                </div>
                            </div>
                        </div>
                        
                        <a href="https://maps.google.com/?q=Salpat+Camp+Moshi" target="_blank" 
                           class="inline-flex items-center gap-6 text-gold font-bold uppercase tracking-[0.5em] text-[10px] hover:text-white transition-colors group/link">
                            <span>Open Navigation Maps</span>
                            <i class="fas fa-location-arrow group-hover/link:translate-x-4 group-hover/link:-translate-y-4 transition-transform duration-700"></i>
                        </a>
                    </div>
                    
                    <div class="h-[600px] lg:h-auto relative">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.3644149864223!2d37.32356527584145!3d-3.354093635766205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1837119ff336b907%3A0xe53fa28983808b8b!2sSalpat%20Camp!5e0!3m2!1sen!2stz!4v1710264000000!5m2!1sen!2stz" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" 
                            class="grayscale contrast-[1.2] invert brightness-[0.7] group-hover:grayscale-0 group-hover:invert-0 group-hover:brightness-100 transition-all duration-[2s]">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Scripts for Luxury Experience -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slideshowContainer = document.getElementById('hero-slideshow');
            if (!slideshowContainer) return;

            let images = [
                "{{ asset('images/pcs1.jpeg') }}",
                "{{ asset('images/pcs2.jpeg') }}",
                "{{ asset('images/pcs3.jpeg') }}",
                "{{ asset('images/pcs4.png') }}",
                "{{ asset('images/pcs5.png') }}",
                "{{ asset('images/pcs15.jpeg') }}",
                "{{ asset('images/pcs16.png') }}"
            ];
            
            let currentImageIndex = 0;

            function updateSlide() {
                const nextSlide = document.createElement('div');
                nextSlide.className = 'absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-2000 scale-110';
                nextSlide.style.backgroundImage = `url('${images[currentImageIndex]}')`;
                nextSlide.style.opacity = "0";
                
                slideshowContainer.appendChild(nextSlide);
                void nextSlide.offsetWidth;
                
                nextSlide.style.opacity = "0.7";
                
                setTimeout(() => {
                    const slides = slideshowContainer.querySelectorAll('div');
                    if (slides.length > 2) slides[0].remove();
                }, 2000);
                
                currentImageIndex = (currentImageIndex + 1) % images.length;
            }

            setInterval(updateSlide, 8000);

            // Initialize Experience Slider
            if (document.querySelector('#experience-slider')) {
                new Splide('#experience-slider', {
                    type   : 'loop',
                    focus  : 'center',
                    padding: '10%',
                    perPage: 2,
                    gap: '2rem',
                    autoplay: true,
                    interval: 7000,
                    pauseOnHover: true,
                    arrows: true,
                    pagination: false,
                    breakpoints: {
                        1024: {
                            perPage: 2,
                            padding: '5%',
                        },
                        768: {
                            perPage: 1,
                            padding: '0',
                        }
                    }
                }).mount();
            }

            // Initialize Gallery Scroller
            if (document.querySelector('#gallery-scroller')) {
                new Splide('#gallery-scroller', {
                    type   : 'loop',
                    drag   : true,
                    autoWidth: true,
                    gap: '2rem',
                    arrows: false,
                    pagination: false,
                    autoScroll: {
                        speed: 1.5,
                        pauseOnHover: false,
                        pauseOnFocus: false,
                    },
                }).mount( window.splide.Extensions );
            }

            // Initialize Dining Slider
            if (document.querySelector('#dining-slider')) {
                new Splide('#dining-slider', {
                    type   : 'fade',
                    rewind: true,
                    autoplay: true,
                    interval: 4000,
                    arrows: false,
                    pagination: false,
                    speed: 2000,
                }).mount();
            }

            // Initialize Testimonial Slider
            if (document.querySelector('#testimonial-slider')) {
                new Splide('#testimonial-slider', {
                    type   : 'loop',
                    perPage: 3,
                    gap: '2rem',
                    autoplay: true,
                    interval: 10000,
                    arrows: false,
                    pagination: true,
                    breakpoints: {
                        1024: { perPage: 2 },
                        768: { perPage: 1 }
                    }
                }).mount();
            }
        });
    </script>
    <!-- Scroll Reveal Implementation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal-active');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('section').forEach(section => {
                section.classList.add('reveal-on-scroll');
                observer.observe(section);
            });
        });
    </script>

    <style>
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1.2s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
@endsection

@push('styles')
    <style>
        @keyframes slide-up {
            0%   { opacity: 0; transform: translateY(60px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in {
            0%   { opacity: 0; }
            100% { opacity: 1; }
        }
        .animate-slide-up { animation: slide-up 1.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
        .animate-fade-in  { animation: fade-in 2.5s ease-out forwards; opacity: 0; }
        .animation-delay-200 { animation-delay: 200ms; }
        .animation-delay-400 { animation-delay: 400ms; }
        
        .shadow-4xl { box-shadow: 0 50px 100px -20px rgba(11, 16, 33, 0.25); }
    </style>
@endpush