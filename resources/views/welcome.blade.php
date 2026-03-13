@extends('layouts.app')

@section('title', 'Welcome to Salpat Camp')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-slate-900 overflow-hidden flex items-center justify-center min-h-[90vh]">
        <div class="absolute inset-0 z-0 bg-black">
            <!-- Background Video -->
            <video id="hero-video" class="absolute inset-0 w-full h-full object-cover z-0 transition-opacity duration-1000 opacity-100" muted playsinline autoplay>
                <source src="{{ asset('images/salpatcamp env.mp4') }}" type="video/mp4">
            </video>
            
            <!-- Slideshow Container -->
            <div id="hero-slideshow" class="absolute inset-0 w-full h-full z-0 opacity-0 transition-opacity duration-1000"></div>

            <div
                class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/40 to-slate-900/90 mix-blend-multiply z-10">
            </div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8 text-center pt-24 pb-32">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-accent-500/30 bg-accent-500/10 backdrop-blur-sm mb-8 animate-fade-in">
                <span class="w-2 h-2 rounded-full bg-accent-500 animate-pulse"></span>
                <span class="text-xs font-bold uppercase tracking-widest text-accent-100">Experience Luxury Nature</span>
            </div>

            <h1
                class="text-5xl md:text-7xl lg:text-8xl font-serif font-bold text-white mb-6 drop-shadow-xl animate-slide-up">
                A Haven <span class="text-accent-400 italic font-medium">Near</span> <br> Kilimanjaro
            </h1>

            <p
                class="mt-6 text-lg md:text-xl text-slate-200 max-w-2xl mx-auto font-light leading-relaxed mb-12 animate-slide-up animation-delay-200">
                Immerse yourself in authentic comfort. Salpat Camp blends the spirit of adventure with premium hospitality.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-slide-up animation-delay-400">
                <a href="{{ route('rooms.index') }}"
                    class="w-full sm:w-auto px-8 py-4 bg-accent-500 hover:bg-accent-600 text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-accent-500/30 hover:-translate-y-1">
                    Book Your Stay Now
                </a>
                <a href="{{ route('gallery') }}"
                    class="w-full sm:w-auto px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-bold rounded-xl transition-all border border-white/20 hover:border-white/40 hover:-translate-y-1 backdrop-blur-sm">
                    Explore Gallery
                </a>
            </div>
        </div>

        <!-- Decorative bottom separator -->
        <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-slate-50 to-transparent z-10"></div>
    </div>

    <!-- Features Section -->
    <div class="bg-slate-50 py-24 sm:py-32 relative">
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-20 pointer-events-none">
        </div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20">
                <h2 class="text-primary-600 font-bold uppercase tracking-widest text-sm mb-3">Our Distinction</h2>
                <h3 class="text-4xl font-serif font-bold text-slate-900">Elevating Your Journey</h3>
                <div class="w-24 h-1 bg-accent-500 mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 lg:gap-16">
                <!-- Feature 1 -->
                <div
                    class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                    <div
                        class="w-16 h-16 rounded-2xl bg-primary-50 text-primary-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-primary-600 group-hover:text-white transition-all">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3 font-serif">Premium Accommodation</h4>
                    <p class="text-slate-600 leading-relaxed">Relax in meticulously designed rooms that prioritize your
                        comfort after a long day of adventuring.</p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                    <div
                        class="w-16 h-16 rounded-2xl bg-accent-50 text-accent-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-accent-500 group-hover:text-white transition-all">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3 font-serif">Exquisite Dining</h4>
                    <p class="text-slate-600 leading-relaxed">Savor locally inspired dishes and international cuisine
                        crafted by our expert resident chefs.</p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                    <div
                        class="w-16 h-16 rounded-2xl bg-primary-50 text-primary-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-primary-600 group-hover:text-white transition-all">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3 font-serif">Strategic Location</h4>
                    <p class="text-slate-600 leading-relaxed">Perfectly situated in Moshi, offering easy access to
                        Kilimanjaro and beautiful city environments.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-primary-900 py-24 relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute w-[500px] h-[500px] rounded-full bg-accent-500 blur-3xl -top-48 -left-48"></div>
            <div class="absolute w-[400px] h-[400px] rounded-full bg-primary-400 blur-3xl bottom-0 right-0"></div>
        </div>

        <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-white mb-6">Discover Your Perfect Stay</h2>
            <p class="text-xl text-primary-100 mb-10 font-light">Join the countless guests who have made Salpat Camp their
                home away from home. Availability is limited during peak seasons.</p>

            <a href="{{ route('rooms.index') }}"
                class="inline-flex items-center gap-3 px-8 py-4 bg-white text-primary-700 font-bold rounded-xl transition-all shadow-xl hover:shadow-2xl hover:-translate-y-1 hover:bg-primary-50">
                <span>View Availability</span>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Scripts for Hero Slideshow -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('hero-video');
            const slideshowContainer = document.getElementById('hero-slideshow');
            
            let images = [
                "{{ asset('images/pcs1.jpeg') }}",
                "{{ asset('images/pcs2.jpeg') }}",
                "{{ asset('images/pcs3.jpeg') }}",
                "{{ asset('images/pcs4.png') }}",
                "{{ asset('images/pcs5.png') }}",
                "{{ asset('images/pcs6.png') }}",
                "{{ asset('images/pcs7.png') }}",
                "{{ asset('images/pcs8.png') }}",
                "{{ asset('images/pcs9.png') }}",
                "{{ asset('images/pcs10.png') }}",
                "{{ asset('images/pcs11.png') }}",
                "{{ asset('images/pcs12.png') }}",
                "{{ asset('images/pcs13.png') }}",
                "{{ asset('images/pcs14.png') }}",
                "{{ asset('images/pcs15.jpeg') }}",
                "{{ asset('images/pcs16.png') }}",
                "{{ asset('images/pcs17.png') }}",
                "{{ asset('images/pcs18.png') }}"
            ];
            
            let currentImageIndex = 0;
            let slideInterval;

            function updateSlide() {
                const nextSlide = document.createElement('div');
                nextSlide.className = 'absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-1000 opacity-0';
                nextSlide.style.backgroundImage = `url('${images[currentImageIndex]}')`;
                slideshowContainer.appendChild(nextSlide);
                
                // Trigger reflow
                void nextSlide.offsetWidth;
                
                nextSlide.classList.replace('opacity-0', 'opacity-100');
                
                setTimeout(() => {
                    const slides = slideshowContainer.querySelectorAll('div');
                    if (slides.length > 2) {
                        slides[0].remove();
                    }
                }, 1000);
                
                currentImageIndex = (currentImageIndex + 1) % images.length;
            }

            if (video) {
                video.addEventListener('ended', function() {
                    video.classList.replace('opacity-100', 'opacity-0');
                    slideshowContainer.classList.replace('opacity-0', 'opacity-100');
                    updateSlide();
                    slideInterval = setInterval(updateSlide, 4000);
                });
                
                let playPromise = video.play();
                if (playPromise !== undefined) {
                    playPromise.catch(e => {
                        // Autoplay blocked, just show slideshow immediately
                        video.classList.replace('opacity-100', 'opacity-0');
                        slideshowContainer.classList.replace('opacity-0', 'opacity-100');
                        updateSlide();
                        slideInterval = setInterval(updateSlide, 4000);
                    });
                }
            }
        });
    </script>
@endsection

@push('styles')
    <style>
        @keyframes slide-up {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .animate-slide-up {
            animation: slide-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .animate-fade-in {
            animation: fade-in 1s ease-out forwards;
            opacity: 0;
        }

        .animation-delay-200 {
            animation-delay: 200ms;
        }

        .animation-delay-400 {
            animation-delay: 400ms;
        }
    </style>
@endpush