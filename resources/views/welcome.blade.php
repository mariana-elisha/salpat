@extends('layouts.app')

@section('title', 'Salpat Luxury Camp - Gateway to Kilimanjaro')

@section('content')
    <!-- Luxury Hero Section -->
    <div class="relative bg-navy overflow-hidden flex items-center justify-center min-h-screen">
        <div class="absolute inset-0 z-0 bg-navy">
            <!-- Background Video -->
            <video id="hero-video" class="absolute inset-0 w-full h-full object-cover z-0 transition-opacity duration-1000 opacity-100" muted playsinline autoplay>
                <source src="{{ asset('images/salpatcamp env.mp4') }}" type="video/mp4">
            </video>
            
            <!-- Slideshow Container -->
            <div id="hero-slideshow" class="absolute inset-0 w-full h-full z-0 opacity-0 transition-opacity duration-1000"></div>

            <!-- Enhanced Dark Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-navy/60 via-navy/40 to-navy mix-blend-multiply z-10"></div>
            
            <!-- Shimmering Particles Effect (Overlay) -->
            <div class="absolute inset-0 z-15 pointer-events-none opacity-30 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]"></div>
        </div>

        <div class="relative z-20 w-full max-w-7xl mx-auto px-6 lg:px-8 text-center pt-24 pb-32">
            <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-gold/30 bg-gold/10 backdrop-blur-md mb-10 animate-fade-in mx-auto">
                <span class="w-1.5 h-1.5 rounded-full bg-gold animate-pulse"></span>
                <span class="text-[10px] font-bold uppercase tracking-[0.4em] text-gold">Elite Wilderness Sanctuary</span>
            </div>

            <h1 class="text-6xl md:text-8xl lg:text-9xl font-serif font-bold text-white mb-8 leading-[1.1] drop-shadow-2xl animate-slide-up">
                STAY WITH US <br> <span class="italic font-normal text-gold text-center">Relax & Unwind</span>
            </h1>

            <p class="mt-8 text-lg md:text-2xl text-white/80 max-w-3xl mx-auto font-light leading-relaxed mb-16 animate-slide-up animation-delay-200">
                Salpat Camp is a premium lodge located in the peaceful Soweto district of Moshi. While located near the mountain, we specialize in providing dedicated accommodations primarily for those embarking on mountain climbing expeditions. We provide a superior experience for tourists, families, and business travelers, ensuring a comfortable and memorable stay.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-6 animate-slide-up animation-delay-400">
                <a href="{{ route('rooms.index') }}"
                    class="w-full sm:w-auto px-12 py-5 bg-gold hover:bg-gold-dark text-white font-bold rounded-2xl transition-all shadow-2xl shadow-gold/20 hover:-translate-y-1 uppercase tracking-widest text-xs">
                    Explore Rooms
                </a>
                <a href="{{ route('about') }}"
                    class="w-full sm:w-auto px-12 py-5 bg-white/5 hover:bg-white/10 text-white font-bold rounded-2xl transition-all border border-white/20 hover:border-white/40 hover:-translate-y-1 backdrop-blur-xl uppercase tracking-widest text-xs">
                    Our Story
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-12 left-1/2 -translate-x-1/2 z-20 animate-bounce cursor-pointer opacity-50 hover:opacity-100 transition-opacity">
            <div class="w-px h-12 bg-gradient-to-b from-transparent via-gold to-transparent"></div>
        </div>

        <!-- Bottom separator -->
        <div class="absolute bottom-0 inset-x-0 h-48 bg-gradient-to-t from-creme to-transparent z-10"></div>
    </div>

    <!-- About Us Section (Aquila style - Side by side) -->
    <section class="py-32 bg-creme relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-20">
                <!-- Image Side -->
                <div class="w-full lg:w-1/2 relative">
                    <div class="relative z-10 rounded-[3rem] overflow-hidden shadow-4xl transform -rotate-2 hover:rotate-0 transition-transform duration-1000">
                        <img src="{{ asset('images/pcs1.jpeg') }}" alt="Salpat Camp View" class="w-full h-[600px] object-cover">
                    </div>
                    <!-- Decorative element -->
                    <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-gold/10 rounded-full blur-3xl z-0"></div>
                    <div class="absolute -top-10 -left-10 w-48 h-48 border-2 border-gold/20 rounded-[3rem] z-0"></div>
                </div>

                <!-- Text Side -->
                <div class="w-full lg:w-1/2 space-y-10">
                    <div>
                        <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6">About Us</h2>
                        <h3 class="text-5xl md:text-6xl font-serif font-bold text-navy mb-8 leading-tight">Welcome to <br> Salpat Camp</h3>
                        <div class="w-16 h-1 bg-gold/40"></div>
                    </div>
                    
                    <div class="space-y-6 text-slate-600 font-light leading-relaxed text-lg">
                        <p>
                            Salpat Camp is a premium lodge located in the peaceful Soweto district of Moshi. While located near the mountain, we specialize in providing dedicated accommodations primarily for those embarking on mountain climbing expeditions.
                        </p>
                        <p>
                            We provide a superior experience for tourists, families, and business travelers, ensuring a comfortable and memorable stay. Relax and unwind your day on a visit to Moshi, whether on your business trip, family visit or Kilimanjaro trek and safaris.
                        </p>
                    </div>

                    <a href="{{ route('about') }}" class="group inline-flex items-center gap-6 text-navy font-bold uppercase tracking-widest text-xs hover:text-gold transition-colors">
                        Read Our Full Story
                        <span class="w-12 h-px bg-navy group-hover:bg-gold group-hover:w-16 transition-all"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section - The "Shining" Experience -->
    <div class="bg-white py-32 sm:py-48 relative overflow-hidden">
        <!-- Luxury Texture Background -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03] pointer-events-none"></div>
        
        <!-- Decorative Glows -->
        <div class="absolute -top-24 left-1/4 w-96 h-96 bg-gold/5 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute -bottom-24 right-1/4 w-80 h-80 bg-navy/5 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-24">
                <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6">Unrivaled Excellence</h2>
                <h3 class="text-5xl md:text-6xl font-serif font-bold text-navy mb-8">Elevating Your Journey</h3>
                <div class="w-16 h-px bg-gold/40 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 lg:gap-24">
                <!-- Feature 1 -->
                <div class="group relative pt-12 text-left">
                    <div class="w-20 h-20 rounded-[2.5rem] bg-navy text-gold flex items-center justify-center mb-10 shadow-2xl transition-all duration-700 group-hover:-translate-y-4 group-hover:rotate-[360deg] group-hover:bg-gold group-hover:text-white">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-navy mb-6 font-serif">Premium Sanctuaries</h4>
                    <p class="text-slate-500 font-light leading-relaxed">Retreat to architectural masterpieces designed since tupo karibu na mlima ila kwa watu wanao takakwenda kupanda mlima huo ndy tuna wapa accommodations.</p>
                </div>

                <!-- Feature 2 -->
                <div class="group relative pt-12 text-left">
                    <div class="w-20 h-20 rounded-[2.5rem] bg-navy text-gold flex items-center justify-center mb-10 shadow-2xl transition-all duration-700 group-hover:-translate-y-4 group-hover:rotate-[360deg] group-hover:bg-gold group-hover:text-white">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-navy mb-6 font-serif">Culinary Artistry</h4>
                    <p class="text-slate-500 font-light leading-relaxed">A symphony of locally sourced flavors crafted by world-class resident chefs.</p>
                </div>

                <!-- Feature 3 -->
                <div class="group relative pt-12 text-left">
                    <div class="w-20 h-20 rounded-[2.5rem] bg-navy text-gold flex items-center justify-center mb-10 shadow-2xl transition-all duration-700 group-hover:-translate-y-4 group-hover:rotate-[360deg] group-hover:bg-gold group-hover:text-white">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-navy mb-6 font-serif">Noble Position</h4>
                    <p class="text-slate-500 font-light leading-relaxed">We have well-built rooms designed for your comfort; tupo karibu na mlima ila kwa watu wanao takakwenda kupanda mlima huo ndy tuna wapa accommodations.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Immersive CTA Section -->
    <div class="bg-navy py-40 relative overflow-hidden">
        <!-- Abstract Shapes -->
        <div class="absolute inset-0 z-0 opacity-20 text-center">
            <div class="absolute w-[800px] h-[800px] rounded-full bg-gold/10 blur-[150px] -top-96 -left-96"></div>
            <div class="absolute w-[600px] h-[600px] rounded-full bg-white/5 blur-[120px] bottom-0 right-0"></div>
        </div>

        <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
            <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-8">Limited Availability</h2>
            <h2 class="text-5xl md:text-7xl font-serif font-bold text-white mb-10">Secure Your Legacy</h2>
            <p class="text-xl text-white/60 mb-16 font-light leading-relaxed max-w-2xl mx-auto">
                Discover the perfect equilibrium between adventure and tranquility. Our exclusive collection awaits your arrival.
            </p>

            <a href="{{ route('rooms.index') }}"
                class="inline-flex items-center gap-4 px-12 py-6 bg-gold text-white font-bold rounded-2xl transition-all shadow-2xl shadow-gold/20 hover:bg-white hover:text-navy group">
                <span class="uppercase tracking-widest text-xs">Begin Your Voyage</span>
                <svg class="w-5 h-5 transition-transform group-hover:translate-x-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Slideshow Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('hero-video');
            const slideshowContainer = document.getElementById('hero-slideshow');
            
            const images = [
                "{{ asset('images/pcs1.jpeg') }}",
                "{{ asset('images/pcs15.jpeg') }}",
                "{{ asset('images/pcs10.png') }}",
                "{{ asset('images/pcs2.jpeg') }}",
                "{{ asset('images/pcs3.jpeg') }}"
            ];
            
            let currentImageIndex = 0;
            let slideInterval;

            function updateSlide() {
                const nextSlide = document.createElement('div');
                nextSlide.className = 'absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-2000 opacity-0';
                nextSlide.style.backgroundImage = `url('${images[currentImageIndex]}')`;
                slideshowContainer.appendChild(nextSlide);
                
                void nextSlide.offsetWidth; // Trigger reflow
                nextSlide.classList.replace('opacity-0', 'opacity-100');
                
                setTimeout(() => {
                    const slides = slideshowContainer.querySelectorAll('div');
                    if (slides.length > 2) slides[0].remove();
                }, 2000);
                
                currentImageIndex = (currentImageIndex + 1) % images.length;
            }

            if (video) {
                video.addEventListener('ended', function() {
                    video.classList.replace('opacity-100', 'opacity-0');
                    slideshowContainer.classList.replace('opacity-0', 'opacity-100');
                    updateSlide();
                    slideInterval = setInterval(updateSlide, 6000);
                });
                
                let playPromise = video.play();
                if (playPromise !== undefined) {
                    playPromise.catch(() => {
                        video.classList.replace('opacity-100', 'opacity-0');
                        slideshowContainer.classList.replace('opacity-0', 'opacity-100');
                        updateSlide();
                        slideInterval = setInterval(updateSlide, 6000);
                    });
                }
            }
        });
    </script>
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
        .animate-slide-up { animation: slide-up 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
        .animate-fade-in  { animation: fade-in 1.5s ease-out forwards; opacity: 0; }
        .animation-delay-200 { animation-delay: 200ms; }
        .animation-delay-400 { animation-delay: 400ms; }
    </style>
@endpush