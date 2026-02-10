@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-serif font-bold text-primary-900 mb-6">About Salpat Camp</h1>
            <div class="w-24 h-1.5 bg-accent-500 mx-auto rounded-full mb-6"></div>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto leading-relaxed">Your sanctuary in the wild, where luxury
                meets nature.</p>
        </div>

        <!-- Main Content -->
        <div class="space-y-20">
            <!-- Our Story -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-primary-100 rounded-2xl transform rotate-3"></div>
                    <img src="https://images.unsplash.com/photo-1499750310159-5b5f38e31639?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                        alt="Campfire" class="relative rounded-2xl shadow-xl w-full object-cover h-96">
                </div>
                <div class="space-y-6">
                    <h2 class="text-3xl font-serif font-bold text-primary-800">Our Story</h2>
                    <div class="space-y-4 text-slate-600 leading-relaxed text-lg">
                        <p>
                            Welcome to Salpat Camp, where comfort meets nature. We've been welcoming guests for years,
                            offering a peaceful retreat
                            surrounded by stunning landscapes. Our mission is to provide exceptional hospitality and create
                            memorable experiences
                            for every visitor.
                        </p>
                        <p>
                            Whether you're traveling for business, a family getaway, or a romantic escape, Salpat Camp
                            offers the perfect blend
                            of modern amenities and natural beauty.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Values Grid -->
            <section>
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-serif font-bold text-primary-800">What Sets Us Apart</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-all text-center group">
                        <div
                            class="w-16 h-16 mx-auto mb-6 bg-primary-50 rounded-2xl flex items-center justify-center group-hover:bg-primary-600 transition-colors">
                            <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Premium Comfort</h3>
                        <p class="text-slate-600">Spacious accommodations with modern amenities designed for your
                            relaxation.</p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-all text-center group">
                        <div
                            class="w-16 h-16 mx-auto mb-6 bg-secondary-50 rounded-2xl flex items-center justify-center group-hover:bg-secondary-600 transition-colors">
                            <svg class="w-8 h-8 text-secondary-600 group-hover:text-white transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">24/7 Service</h3>
                        <p class="text-slate-600">Our dedicated staff is always available to ensure your stay is perfect.
                        </p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-lg transition-all text-center group">
                        <div
                            class="w-16 h-16 mx-auto mb-6 bg-accent-50 rounded-2xl flex items-center justify-center group-hover:bg-accent-500 transition-colors">
                            <svg class="w-8 h-8 text-accent-600 group-hover:text-white transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Warm Hospitality</h3>
                        <p class="text-slate-600">We treat every guest like family, creating a welcoming atmosphere.</p>
                    </div>
                </div>
            </section>

            <!-- CTA -->
            <section class="bg-primary-900 rounded-3xl p-12 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
                </div>
                <div class="relative z-10">
                    <h2 class="text-3xl font-serif font-bold text-white mb-6">Ready to Experience Salpat Camp?</h2>
                    <p class="text-primary-100 mb-8 max-w-2xl mx-auto text-lg">Browse our rooms and book your escape today.
                        Nature is waiting for you.</p>
                    <a href="{{ route('rooms.index') }}"
                        class="inline-flex items-center justify-center bg-white text-primary-900 px-8 py-4 rounded-xl font-bold hover:bg-accent-50 transition-all transform hover:-translate-y-1 shadow-lg">
                        View Our Rooms
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </section>
        </div>
    </div>
@endsection