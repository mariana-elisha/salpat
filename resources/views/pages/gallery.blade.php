@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
    <div class="bg-slate-50 min-h-screen pb-24">
        <!-- Hero Section -->
        <div class="relative isolate overflow-hidden bg-slate-900 py-24 sm:py-32 border-b-4 border-accent-500">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1496545672447-f699b503d270?ixlib=rb-4.0.3')] bg-cover bg-center opacity-30 filter grayscale mix-blend-overlay">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent"></div>
            <div
                class="absolute -top-24 -left-24 w-64 h-64 bg-accent-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 text-center">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-widest mb-6">
                    Visual Journey</div>
                <h1 class="text-4xl md:text-6xl font-serif font-bold tracking-tight text-white mb-6 drop-shadow-lg">Our
                    Gallery</h1>
                <p class="text-lg leading-8 text-slate-300 max-w-2xl mx-auto font-light">
                    Explore our accommodations, scenic views, and the vibrant life within our sanctuary.
                </p>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-[300px]">
                <!-- Item 1 (Large) -->
                <div
                    class="group relative overflow-hidden rounded-3xl md:col-span-2 row-span-2 bg-slate-900 shadow-xl border border-slate-100">
                    <img src="https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                        alt="Luxury Rooms"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                    <div
                        class="absolute inset-0 p-8 flex flex-col justify-end transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span
                            class="text-accent-400 text-sm font-bold tracking-widest uppercase mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Interior</span>
                        <h3 class="text-white text-3xl font-bold font-serif">Luxury Suites</h3>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="group relative overflow-hidden rounded-3xl bg-slate-900 shadow-xl border border-slate-100">
                    <img src="https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                        alt="Night Sky"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                    <div
                        class="absolute inset-0 p-6 flex flex-col justify-end transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span
                            class="text-accent-400 text-xs font-bold tracking-widest uppercase mb-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Views</span>
                        <h3 class="text-white text-xl font-bold font-serif">Starry Nights</h3>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="group relative overflow-hidden rounded-3xl bg-slate-900 shadow-xl border border-slate-100">
                    <img src="https://images.unsplash.com/photo-1532339142463-fd0a8979791a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                        alt="Campfire"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                    <div
                        class="absolute inset-0 p-6 flex flex-col justify-end transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span
                            class="text-accent-400 text-xs font-bold tracking-widest uppercase mb-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Experience</span>
                        <h3 class="text-white text-xl font-bold font-serif">Bonfire Gatherings</h3>
                    </div>
                </div>

                <!-- Item 4 (Tall) -->
                <div
                    class="group relative overflow-hidden rounded-3xl row-span-2 bg-slate-900 shadow-xl border border-slate-100">
                    <img src="https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                        alt="Forest Trail"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                    <div
                        class="absolute inset-0 p-8 flex flex-col justify-end transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span
                            class="text-accent-400 text-sm font-bold tracking-widest uppercase mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Nature</span>
                        <h3 class="text-white text-2xl font-bold font-serif">Scenic Surroundings</h3>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="group relative overflow-hidden rounded-3xl bg-slate-900 shadow-xl border border-slate-100">
                    <img src="https://images.unsplash.com/photo-1510312305653-8ed496efae75?ixlib=rb-4.0.3&auto=format&fit=crop&w=1548&q=80"
                        alt="Morning Coffee"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                    <div
                        class="absolute inset-0 p-6 flex flex-col justify-end transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span
                            class="text-accent-400 text-xs font-bold tracking-widest uppercase mb-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Dining</span>
                        <h3 class="text-white text-xl font-bold font-serif">Morning Bliss</h3>
                    </div>
                </div>

                <!-- Item 6 -->
                <div class="group relative overflow-hidden rounded-3xl bg-slate-900 shadow-xl border border-slate-100">
                    <img src="https://images.unsplash.com/photo-1492648272180-61e45a8d98a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                        alt="Cabin Interior"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                    <div
                        class="absolute inset-0 p-6 flex flex-col justify-end transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span
                            class="text-accent-400 text-xs font-bold tracking-widest uppercase mb-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Accommodations</span>
                        <h3 class="text-white text-xl font-bold font-serif">Cozy Interiors</h3>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="mt-24 text-center pb-8 border-b border-slate-200">
                <h3 class="text-3xl font-serif font-bold text-slate-900 mb-6">Experience it for yourself</h3>
                <a href="{{ route('rooms.index') }}"
                    class="inline-flex items-center justify-center bg-accent-500 text-white hover:bg-accent-600 shadow-xl shadow-accent-500/20 px-10 py-4 rounded-xl font-bold text-lg transition-transform transform hover:-translate-y-1">
                    Book Your Stay
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection