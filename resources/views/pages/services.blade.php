@extends('layouts.app')

@section('title', 'Our Services')

@section('content')

    {{-- Page Header --}}
    <div class="relative bg-primary-600 py-24 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/carousel-1.jpg') }}" alt="Services"
                class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-t from-primary-600 via-primary-700/70 to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-serif font-bold text-white mb-4 animate-[slideInDown_0.6s_ease-out]">Our Services</h1>
            <nav class="flex justify-center gap-2 text-sm text-primary-200 uppercase tracking-wider">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <span class="text-primary-400">/</span>
                <span class="text-white">Services</span>
            </nav>
        </div>
    </div>

    {{-- Quick Booking Bar --}}
    <div class="bg-white shadow-xl -mt-6 relative z-10 max-w-5xl mx-auto rounded-2xl px-6 py-5 mb-16 border border-slate-100">
        <form action="{{ route('rooms.index') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div>
                    <label class="form-label text-xs uppercase tracking-wider">Check In</label>
                    <input type="date" name="check_in" min="{{ date('Y-m-d') }}"
                        class="form-input" value="{{ old('check_in') }}">
                </div>
                <div>
                    <label class="form-label text-xs uppercase tracking-wider">Check Out</label>
                    <input type="date" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                        class="form-input" value="{{ old('check_out') }}">
                </div>
                <div>
                    <label class="form-label text-xs uppercase tracking-wider">Guests</label>
                    <select name="guests" class="form-input">
                        <option value="1">1 Guest</option>
                        <option value="2">2 Guests</option>
                        <option value="3">3 Guests</option>
                        <option value="4">4+ Guests</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-full">Find Rooms</button>
                </div>
            </div>
        </form>
    </div>

    {{-- Services Section --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="text-center mb-14">
            <p class="text-sm font-semibold text-accent-500 uppercase tracking-widest mb-2">What We Offer</p>
            <h2 class="text-4xl font-serif font-bold text-black">Explore Our <span class="text-accent-500">Services</span></h2>
            <div class="w-20 h-1.5 bg-accent-500 mx-auto rounded-full mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Accommodation --}}
            <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20I%20would%20like%20to%20know%20more%20about%20your%20accommodation"
                target="_blank"
                class="group bg-white rounded-2xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 bg-primary-50 border-2 border-primary-200 group-hover:bg-primary-600 group-hover:border-primary-600 rounded-2xl flex items-center justify-center mb-5 transition-all duration-300">
                    <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <h5 class="text-lg font-bold text-slate-800 mb-3 group-hover:text-primary-600 transition-colors">Accommodation</h5>
                <p class="text-slate-500 text-sm leading-relaxed">Comfortable and affordable rooms suitable for individuals, couples, and families.</p>
                <span class="mt-4 text-xs font-semibold text-green-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    Enquire on WhatsApp
                </span>
            </a>

            {{-- Breakfast --}}
            <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20do%20you%20offer%20breakfast"
                target="_blank"
                class="group bg-white rounded-2xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 bg-primary-50 border-2 border-primary-200 group-hover:bg-primary-600 group-hover:border-primary-600 rounded-2xl flex items-center justify-center mb-5 transition-all duration-300">
                    <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h5 class="text-lg font-bold text-slate-800 mb-3 group-hover:text-primary-600 transition-colors">Breakfast</h5>
                <p class="text-slate-500 text-sm leading-relaxed">Fresh and delicious breakfast served daily to start your day right.</p>
                <span class="mt-4 text-xs font-semibold text-green-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    Enquire on WhatsApp
                </span>
            </a>

            {{-- Lunch & Dinner --}}
            <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20I%20would%20like%20to%20order%20lunch%20or%20dinner"
                target="_blank"
                class="group bg-white rounded-2xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 bg-primary-50 border-2 border-primary-200 group-hover:bg-primary-600 group-hover:border-primary-600 rounded-2xl flex items-center justify-center mb-5 transition-all duration-300">
                    <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h5 class="text-lg font-bold text-slate-800 mb-3 group-hover:text-primary-600 transition-colors">Lunch & Dinner <span class="text-sm font-normal text-slate-400">(On Order)</span></h5>
                <p class="text-slate-500 text-sm leading-relaxed">Enjoy tasty lunch and dinner meals prepared on request for you and your group.</p>
                <span class="mt-4 text-xs font-semibold text-green-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    Enquire on WhatsApp
                </span>
            </a>

            {{-- Soft & Hard Drinks --}}
            <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20do%20you%20offer%20soft%20and%20hard%20drinks"
                target="_blank"
                class="group bg-white rounded-2xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 bg-primary-50 border-2 border-primary-200 group-hover:bg-primary-600 group-hover:border-primary-600 rounded-2xl flex items-center justify-center mb-5 transition-all duration-300">
                    <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h5 class="text-lg font-bold text-slate-800 mb-3 group-hover:text-primary-600 transition-colors">Soft & Hard Drinks</h5>
                <p class="text-slate-500 text-sm leading-relaxed">A variety of soft drinks and alcoholic beverages available for our guests on request.</p>
                <span class="mt-4 text-xs font-semibold text-green-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    Enquire on WhatsApp
                </span>
            </a>

            {{-- Free Wi-Fi --}}
            <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20is%20WiFi%20available"
                target="_blank"
                class="group bg-white rounded-2xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 bg-primary-50 border-2 border-primary-200 group-hover:bg-primary-600 group-hover:border-primary-600 rounded-2xl flex items-center justify-center mb-5 transition-all duration-300">
                    <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.143 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/>
                    </svg>
                </div>
                <h5 class="text-lg font-bold text-slate-800 mb-3 group-hover:text-primary-600 transition-colors">Free Wi-Fi</h5>
                <p class="text-slate-500 text-sm leading-relaxed">Free and reliable Wi-Fi access available throughout the camp for all guests.</p>
                <span class="mt-4 text-xs font-semibold text-green-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    Enquire on WhatsApp
                </span>
            </a>

            {{-- Free Car Parking --}}
            <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20do%20you%20have%20free%20parking"
                target="_blank"
                class="group bg-white rounded-2xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 bg-primary-50 border-2 border-primary-200 group-hover:bg-primary-600 group-hover:border-primary-600 rounded-2xl flex items-center justify-center mb-5 transition-all duration-300">
                    <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h-1a2 2 0 00-2 2v9m3-11h5.5a2.5 2.5 0 010 5H8m0-5v5m0 0v4m6 0h2m-8 0h2M5 20h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v9a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h5 class="text-lg font-bold text-slate-800 mb-3 group-hover:text-primary-600 transition-colors">Free Car Parking</h5>
                <p class="text-slate-500 text-sm leading-relaxed">Secure and free parking space available for all our valued guests.</p>
                <span class="mt-4 text-xs font-semibold text-green-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    Enquire on WhatsApp
                </span>
            </a>

        </div>
    </div>

    {{-- Testimonials --}}
    <div class="bg-primary-600 py-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <p class="text-sm font-semibold text-accent-500 uppercase tracking-widest mb-2">Guest Reviews</p>
                <h2 class="text-3xl font-serif font-bold text-white">What Our Guests Say</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach([
                    ['name' => 'Sarah Johnson', 'role' => 'Tourist', 'quote' => 'I had an amazing stay! The rooms were clean, comfortable, and the staff was very friendly. I will definitely come back again.'],
                    ['name' => 'Michael Smith', 'role' => 'Business Traveller', 'quote' => 'Great hospitality and excellent service. The food was delicious and the environment was very peaceful.'],
                    ['name' => 'Emily Davis', 'role' => 'Vacationer', 'quote' => 'I loved the place! It is perfect for a relaxing holiday. The staff made sure everything was perfect for us.'],
                ] as $review)
                <div class="bg-white/10 backdrop-blur rounded-2xl p-6 relative">
                    <svg class="absolute top-4 right-4 w-8 h-8 text-accent-400 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                    <p class="text-primary-100 text-sm leading-relaxed mb-5">{{ $review['quote'] }}</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-accent-500 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                            {{ strtoupper(substr($review['name'], 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-white text-sm">{{ $review['name'] }}</p>
                            <p class="text-primary-300 text-xs">{{ $review['role'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- WhatsApp Floating Button --}}
    <a href="https://wa.me/255770307759" target="_blank"
        class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-green-500/40">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

@endsection
