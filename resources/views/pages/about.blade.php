@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-12">
        <h1 class="text-4xl font-bold text-slate-800 mb-4 flex items-center gap-3">
            <span class="w-2 h-12 bg-orange-500 rounded"></span>
            About Salpat Camp
        </h1>
        <p class="text-xl text-slate-600">Your home away from home in the heart of nature</p>
    </div>

    <div class="space-y-12">
        <section class="bg-white rounded-2xl shadow-lg p-8 border border-orange-50">
            <h2 class="text-2xl font-bold text-slate-800 mb-4">Our Story</h2>
            <p class="text-slate-600 leading-relaxed mb-4">
                Welcome to Salpat Camp, where comfort meets nature. We've been welcoming guests for years, offering a peaceful retreat 
                surrounded by stunning landscapes. Our mission is to provide exceptional hospitality and create memorable experiences 
                for every visitor.
            </p>
            <p class="text-slate-600 leading-relaxed">
                Whether you're traveling for business, a family getaway, or a romantic escape, Salpat Camp offers the perfect blend 
                of modern amenities and natural beauty.
            </p>
        </section>

        <section class="bg-white rounded-2xl shadow-lg p-8 border border-orange-50">
            <h2 class="text-2xl font-bold text-slate-800 mb-6">What We Offer</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-4">
                    <div class="w-16 h-16 mx-auto mb-3 bg-orange-100 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800 mb-1">Comfortable Rooms</h3>
                    <p class="text-sm text-slate-600">Spacious accommodations with modern amenities</p>
                </div>
                <div class="text-center p-4">
                    <div class="w-16 h-16 mx-auto mb-3 bg-sky-100 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800 mb-1">24/7 Service</h3>
                    <p class="text-sm text-slate-600">Our staff is always here to assist you</p>
                </div>
                <div class="text-center p-4">
                    <div class="w-16 h-16 mx-auto mb-3 bg-orange-100 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-800 mb-1">Warm Hospitality</h3>
                    <p class="text-sm text-slate-600">We treat every guest like family</p>
                </div>
            </div>
        </section>

        <section class="bg-gradient-to-r from-orange-50 to-sky-50 rounded-2xl p-8 border border-orange-100">
            <h2 class="text-2xl font-bold text-slate-800 mb-4">Ready to Book?</h2>
            <p class="text-slate-600 mb-6">Experience our lodge for yourself. Browse our rooms and reserve your stay today.</p>
            <a href="{{ route('rooms.index') }}" class="inline-block bg-orange-500 text-white px-8 py-3 rounded-xl font-semibold hover:bg-orange-600 transition">
                View Our Rooms
            </a>
        </section>
    </div>
</div>
@endsection
