@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="bg-slate-50 min-h-screen pb-24">
        <!-- Hero Section -->
        <div class="relative bg-slate-900 py-24 sm:py-32 overflow-hidden border-b-4 border-accent-500">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1499750310159-5b5f38e31639?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80')] bg-cover bg-center opacity-20 filter grayscale mix-blend-overlay">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent"></div>
            <div
                class="absolute -top-24 -left-24 w-64 h-64 bg-accent-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
            </div>

            <div class="relative mx-auto max-w-7xl px-6 lg:px-8 text-center z-10">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-widest mb-6">
                    Our Heritage
                </div>
                <h1 class="text-4xl sm:text-6xl font-serif font-bold tracking-tight text-white mb-6 drop-shadow-lg">About
                    Salpat Camp</h1>
                <p class="mt-6 text-lg leading-8 text-slate-300 max-w-2xl mx-auto font-light">
                    Your luxury sanctuary in Moshi, where the spirit of adventure meets unparalleled comfort.
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20 space-y-24">

            <!-- Our Story Section -->
            <section class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8 md:p-16">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-accent-500 rounded-2xl transform rotate-3 transition-transform duration-500 group-hover:rotate-6 opacity-20">
                        </div>
                        <img src="https://images.unsplash.com/photo-1542314831-c6a4d14cd44b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                            alt="Salpat Camp Exterior"
                            class="relative rounded-2xl shadow-2xl w-full object-cover h-96 transform transition-transform duration-500 group-hover:-translate-y-2">
                    </div>

                    <div class="space-y-6">
                        <h2 class="text-3xl sm:text-4xl font-serif font-bold text-slate-900 mb-2">Our Story</h2>
                        <div class="w-16 h-1 bg-accent-500 rounded-full mb-6 relative"></div>

                        <div class="space-y-5 text-slate-600 font-light leading-relaxed text-lg text-justify">
                            <p>
                                Salpat Camp is a comfortable mid-range lodge in Moshi, located in the serene Soweto Town
                                Center near the majestic <strong class="text-slate-900 font-semibold">Mount
                                    Kilimanjaro</strong>. We provide quality accommodation for tourists, business travelers,
                                and families seeking a peaceful retreat.
                            </p>
                            <p>
                                Whether you're visiting for a Kilimanjaro climbing expedition, embarking on thrilling
                                African safari tours, or attending business meetings in town, our well-maintained Standard
                                Rooms, Deluxe Rooms, and Family Apartments offer the perfect basecamp.
                            </p>
                            <p>
                                We pride ourselves on offering warm Tanzanian hospitality, ensuring that guests enjoy
                                complimentary secure Wi-Fi, daily gourmet breakfasts, and seamless airport pickup services.
                            </p>
                            <div
                                class="bg-slate-50 border-l-4 border-accent-500 p-6 rounded-r-2xl italic text-slate-700 font-serif shadow-sm">
                                "If you're seeking comfort, convenience, and affordability close to Mount Kilimanjaro,
                                Salpat Camp is your absolute finest choice."
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Values Section -->
            <section>
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-serif font-bold text-slate-900 mb-4">What Sets Us Apart</h2>
                    <p class="text-slate-500 max-w-xl mx-auto">Discover the foundational pillars that elevate the Salpat
                        Camp experience above the rest.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div
                        class="bg-white p-10 rounded-3xl shadow-lg shadow-slate-200/50 border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center group relative overflow-hidden">
                        <div
                            class="absolute top-0 left-0 w-full h-1 bg-accent-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                        </div>
                        <div
                            class="w-20 h-20 mx-auto mb-8 bg-slate-50 rounded-2xl flex items-center justify-center group-hover:bg-accent-500 transition-colors duration-500 shadow-sm">
                            <svg class="w-10 h-10 text-accent-500 group-hover:text-white transition-colors duration-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold font-serif text-slate-900 mb-4 group-hover:text-accent-600 transition-colors">
                            Premium Comfort</h3>
                        <p class="text-slate-600 font-light leading-relaxed">Spacious accommodations with modern amenities
                            thoughtfully curated for your ultimate relaxation.</p>
                    </div>

                    <div
                        class="bg-white p-10 rounded-3xl shadow-lg shadow-slate-200/50 border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center group relative overflow-hidden">
                        <div
                            class="absolute top-0 left-0 w-full h-1 bg-accent-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left delay-75">
                        </div>
                        <div
                            class="w-20 h-20 mx-auto mb-8 bg-slate-50 rounded-2xl flex items-center justify-center group-hover:bg-accent-500 transition-colors duration-500 shadow-sm">
                            <svg class="w-10 h-10 text-accent-500 group-hover:text-white transition-colors duration-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold font-serif text-slate-900 mb-4 group-hover:text-accent-600 transition-colors">
                            24/7 Concierge</h3>
                        <p class="text-slate-600 font-light leading-relaxed">Our dedicated professional staff is always
                            available around the clock to cater to your needs.</p>
                    </div>

                    <div
                        class="bg-white p-10 rounded-3xl shadow-lg shadow-slate-200/50 border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center group relative overflow-hidden">
                        <div
                            class="absolute top-0 left-0 w-full h-1 bg-accent-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left delay-150">
                        </div>
                        <div
                            class="w-20 h-20 mx-auto mb-8 bg-slate-50 rounded-2xl flex items-center justify-center group-hover:bg-accent-500 transition-colors duration-500 shadow-sm">
                            <svg class="w-10 h-10 text-accent-500 group-hover:text-white transition-colors duration-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold font-serif text-slate-900 mb-4 group-hover:text-accent-600 transition-colors">
                            Authentic Hospitality</h3>
                        <p class="text-slate-600 font-light leading-relaxed">Experience genuine warmth that makes every
                            guest feel like part of our extended family.</p>
                    </div>
                </div>
            </section>

            <!-- CTA -->
            <section
                class="bg-slate-900 rounded-3xl p-12 md:p-16 text-center relative overflow-hidden shadow-2xl border border-slate-800">
                <div
                    class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-30">
                </div>
                <div class="absolute -bottom-24 gap-4 flex justify-center w-full opacity-20 filter blur-2xl">
                    <div class="w-64 h-64 bg-accent-500 rounded-full mix-blend-multiply"></div>
                </div>

                <div class="relative z-10 max-w-3xl mx-auto">
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-white mb-6">Ready to Experience Salpat Camp?
                    </h2>
                    <p class="text-slate-300 font-light mb-10 text-lg md:text-xl">
                        Browse our rooms and book your escape today. An unforgettable Kilimanjaro adventure awaits.
                    </p>
                    <a href="{{ route('rooms.index') }}"
                        class="inline-flex items-center justify-center bg-accent-500 text-white hover:bg-accent-600 shadow-xl shadow-accent-500/20 hover:shadow-accent-500/40 px-10 py-4 rounded-xl font-bold text-lg transition-all transform hover:-translate-y-1">
                        Reserve Your Stay
                        <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </section>
        </div>
    </div>
@endsection