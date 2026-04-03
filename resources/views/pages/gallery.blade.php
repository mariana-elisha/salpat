@extends('layouts.app')

@section('title', 'Gallery - Salpat Luxury Experiences')

@section('content')
    <div class="bg-creme min-h-screen">
        <!-- Luxury Page Header -->
        <section class="relative h-[65vh] min-h-[500px] flex items-center justify-center bg-navy overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0 text-center">
                <div class="absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-1000" style="background-image: url('{{ asset('images/pcs1.jpeg') }}'); opacity: 0.3;"></div>
            </div>
            
            <!-- Luxury Gradient Overlay -->
            <div class="absolute inset-0 z-10 bg-gradient-to-b from-navy/60 via-transparent to-navy pointer-events-none"></div>

            <div class="relative z-20 text-center px-4 max-w-5xl mx-auto mt-20">
                <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] md:text-xs mb-8 animate-fade-in text-center mx-auto">A Visual Journey</h2>
                <h1 class="text-6xl md:text-9xl font-serif font-bold text-white mb-10 leading-tight drop-shadow-2xl animate-slide-up text-center">
                    The <span class="italic font-normal text-gold">Collection</span>
                </h1>
                <div class="w-16 h-px bg-gold/40 mx-auto animate-scale-x"></div>
            </div>
        </section>

        <!-- Restore Original Premium Gallery Slider -->
        <div class="mx-auto max-w-[1800px] px-4 sm:px-6 lg:px-8 py-32 relative z-20">
            <div id="main-gallery-slider" class="splide" aria-label="Sanctuary Experience Collection">
                <div class="splide__track">
                    <ul class="splide__list">
                        @forelse($galleries as $gallery)
                            <li class="splide__slide px-4">
                                <div class="group relative overflow-hidden rounded-[4rem] shadow-4xl bg-navy h-[700px] border border-white/5">
                                    <img src="{{ asset('images/' . $gallery->image_path) }}" 
                                        onerror="this.src='{{ asset('images/pcs1.jpeg') }}'"
                                        alt="{{ $gallery->title }}"
                                        class="h-full w-full object-cover transition-transform duration-[3s] group-hover:scale-110 opacity-60 group-hover:opacity-100">
                                    <div class="absolute inset-0 bg-gradient-to-t from-navy/90 via-navy/20 to-transparent"></div>
                                    <div class="absolute inset-0 p-16 md:p-24 flex flex-col justify-end transform translate-y-8 group-hover:translate-y-0 transition-all duration-1000">
                                        <div class="flex items-center gap-6 mb-8 translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-700 delay-100">
                                            <div class="w-12 h-px bg-gold"></div>
                                            <h3 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px]">Lifestyle Experience</h3>
                                        </div>
                                        <h3 class="text-white text-5xl md:text-7xl font-serif font-bold transition-colors delay-200 group-hover:text-gold leading-none">{{ $gallery->title }}</h3>
                                    </div>
                                </div>
                            </li>
                        @empty
                            @foreach([1, 2, 3] as $i)
                                <li class="splide__slide px-4">
                                    <div class="relative overflow-hidden rounded-[4rem] bg-slate-50 border border-slate-100 h-[700px] flex items-center justify-center p-20 shadow-inner">
                                        <span class="text-slate-200 font-serif italic text-3xl tracking-[0.4em] uppercase opacity-50">Moment Pending</span>
                                    </div>
                                </li>
                            @endforeach
                        @endforelse
                    </ul>
                </div>

                <!-- Custom Luxury Controls -->
                <div class="splide__arrows flex justify-center gap-8 mt-20">
                    <button class="splide__arrow splide__arrow--prev !static !w-24 !h-24 !bg-navy !border !border-white/10 !rounded-full !shadow-2xl !opacity-100 hover:!bg-gold hover:!scale-110 !text-white transition-all">
                        <i class="fas fa-chevron-left text-xs"></i>
                    </button>
                    <button class="splide__arrow splide__arrow--next !static !w-24 !h-24 !bg-navy !border !border-white/10 !rounded-full !shadow-2xl !opacity-100 hover:!bg-gold hover:!scale-110 !text-white transition-all">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (document.querySelector('#main-gallery-slider')) {
                    new Splide('#main-gallery-slider', {
                        type   : 'loop',
                        padding: '15%',
                        focus  : 'center',
                        gap    : '2rem',
                        autoplay: true,
                        interval: 9000,
                        arrows  : true,
                        pagination: false,
                        breakpoints: {
                            1200: { padding: '10%' },
                            768: { padding: '5%', gap: '1rem' }
                        }
                    }).mount();
                }
            });
        </script>
        @endpush

        <!-- Call to Action -->
        <section class="max-w-7xl mx-auto px-4 lg:px-8 pb-40">
            <div class="bg-navy rounded-[4rem] p-20 md:p-32 text-center relative overflow-hidden shadow-2xl">
                <!-- Decorative Gold Accent -->
                <div class="absolute top-0 right-0 w-1/2 h-full bg-gold/5 -skew-x-12 translate-x-20"></div>
                
                <div class="relative z-10 max-w-4xl mx-auto">
                    <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-10 underline decoration-gold/20 underline-offset-8">Reserved for the Elite</h2>
                    <h3 class="text-5xl md:text-8xl font-serif font-bold text-white mb-12 leading-tight">Live the <span class="italic font-normal text-gold">Adventure</span></h3>
                    <p class="text-slate-400 font-light mb-16 text-xl md:text-2xl leading-relaxed max-w-2xl mx-auto italic">
                        Every frame captures a moment of peace, every corner tells a story of prestige. Your next legacy begins here.
                    </p>
                    <a href="{{ route('rooms.index') }}"
                        class="inline-block bg-gold hover:bg-gold-dark text-white px-16 py-6 rounded-2xl font-bold uppercase tracking-widest text-xs transition-all transform hover:-translate-y-2 shadow-2xl shadow-gold/20">
                        Begin Your Reservation
                    </a>
                </div>
            </div>
        </section>
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
</style>
@endpush