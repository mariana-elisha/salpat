@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
    <div class="bg-slate-50 min-h-screen pb-24">
        {{-- Hero Section --}}
        <div class="relative bg-slate-900 py-28 sm:py-36 overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1541971875076-8f970d573be6?ixlib=rb-4.0.3')] bg-cover bg-center opacity-25 filter grayscale mix-blend-overlay"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/40 to-slate-900/90"></div>
            <!-- Decorative blobs -->
            <div class="absolute -top-32 -right-32 w-96 h-96 bg-accent-500 rounded-full blur-[100px] opacity-20 pointer-events-none"></div>
            <div class="absolute -bottom-48 left-1/2 w-[600px] h-[300px] -translate-x-1/2 bg-accent-400 rounded-full blur-[80px] opacity-5 pointer-events-none"></div>
            <!-- Bottom fade -->
            <div class="absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-slate-50 to-transparent z-10 pointer-events-none"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-widest mb-8 animate-fade-in">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-500 animate-pulse"></span>
                    What We Offer
                </div>
                <h1 class="text-5xl md:text-7xl font-serif font-bold text-white mb-6 drop-shadow-xl animate-slide-up">
                    Experiential <span class="text-accent-400 italic">Luxury</span>
                </h1>
                <p class="mt-4 text-lg md:text-xl text-slate-300 max-w-2xl mx-auto font-light animate-slide-up animation-delay-200">
                    Elevating your stay with exceptional amenities and personalized hospitality.
                </p>
            </div>
        </div>

        {{-- Quick Booking Bar --}}
        <div class="max-w-5xl mx-auto px-4 -mt-6 relative z-20 mb-20">
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/40 px-6 py-6">
                <form action="{{ route('rooms.index') }}" method="GET">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Check In</label>
                            <input type="date" name="check_in" min="{{ date('Y-m-d') }}"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition-all text-slate-700 font-medium"
                                value="{{ old('check_in') }}">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Check Out</label>
                            <input type="date" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition-all text-slate-700 font-medium"
                                value="{{ old('check_out') }}">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Guests</label>
                            <select name="guests" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition-all text-slate-700 font-medium">
                                <option value="1">1 Guest</option>
                                <option value="2">2 Guests</option>
                                <option value="3">3 Guests</option>
                                <option value="4">4+ Guests</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-accent-500 hover:bg-accent-600 text-white font-bold py-3.5 px-6 rounded-xl transition-all shadow-lg shadow-accent-500/30 hover:-translate-y-0.5">
                                Find Rooms
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Services Heading --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
            <div class="text-center mb-16 animate-slide-up animation-delay-400">
                <p class="text-xs font-bold text-accent-500 uppercase tracking-widest mb-3">What We Offer</p>
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-slate-900">Explore Our <span class="text-accent-500 italic">Services</span></h2>
                <div class="w-24 h-1 bg-accent-500 mx-auto rounded-full mt-6 opacity-40"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Accommodation --}}
                <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20I%20would%20like%20to%20know%20more%20about%20your%20accommodation"
                    target="_blank"
                    class="service-card group bg-white rounded-3xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-accent-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-3xl"></div>
                    <div class="w-20 h-20 bg-slate-50 border-2 border-slate-100 group-hover:bg-accent-500 group-hover:border-accent-500 rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm group-hover:shadow-accent-500/30 group-hover:scale-110">
                        <svg class="w-9 h-9 text-accent-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <h5 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-accent-600 transition-colors font-serif">Accommodation</h5>
                    <p class="text-slate-500 text-sm leading-relaxed mb-5 flex-grow">Comfortable and affordable rooms suitable for individuals, couples, and families.</p>
                    <span class="inline-flex items-center gap-2 text-xs font-bold text-green-600 bg-green-50 px-3 py-1.5 rounded-full">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Enquire on WhatsApp
                    </span>
                </a>

                {{-- Breakfast --}}
                <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20do%20you%20offer%20breakfast" target="_blank"
                    class="service-card service-delay-1 group bg-white rounded-3xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-primary-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-3xl"></div>
                    <div class="w-20 h-20 bg-slate-50 border-2 border-slate-100 group-hover:bg-primary-500 group-hover:border-primary-500 rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm group-hover:scale-110">
                        <svg class="w-9 h-9 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h5 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-primary-600 transition-colors font-serif">Breakfast</h5>
                    <p class="text-slate-500 text-sm leading-relaxed mb-5 flex-grow">Fresh and delicious breakfast served daily to start your day right.</p>
                    <span class="inline-flex items-center gap-2 text-xs font-bold text-green-600 bg-green-50 px-3 py-1.5 rounded-full">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Enquire on WhatsApp
                    </span>
                </a>

                {{-- Lunch & Dinner --}}
                <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20I%20would%20like%20to%20order%20lunch%20or%20dinner" target="_blank"
                    class="service-card service-delay-2 group bg-white rounded-3xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-accent-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-3xl"></div>
                    <div class="w-20 h-20 bg-slate-50 border-2 border-slate-100 group-hover:bg-accent-500 group-hover:border-accent-500 rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm group-hover:scale-110">
                        <svg class="w-9 h-9 text-accent-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h5 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-accent-600 transition-colors font-serif">Lunch & Dinner <span class="text-sm font-normal text-slate-400">(On Order)</span></h5>
                    <p class="text-slate-500 text-sm leading-relaxed mb-5 flex-grow">Enjoy tasty lunch and dinner meals prepared on request for you and your group.</p>
                    <span class="inline-flex items-center gap-2 text-xs font-bold text-green-600 bg-green-50 px-3 py-1.5 rounded-full">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Enquire on WhatsApp
                    </span>
                </a>

                {{-- Soft & Hard Drinks --}}
                <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20do%20you%20offer%20soft%20and%20hard%20drinks" target="_blank"
                    class="service-card service-delay-3 group bg-white rounded-3xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-primary-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-3xl"></div>
                    <div class="w-20 h-20 bg-slate-50 border-2 border-slate-100 group-hover:bg-primary-500 group-hover:border-primary-500 rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm group-hover:scale-110">
                        <svg class="w-9 h-9 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h5 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-primary-600 transition-colors font-serif">Soft & Hard Drinks</h5>
                    <p class="text-slate-500 text-sm leading-relaxed mb-5 flex-grow">A variety of soft drinks and alcoholic beverages available for our guests on request.</p>
                    <span class="inline-flex items-center gap-2 text-xs font-bold text-green-600 bg-green-50 px-3 py-1.5 rounded-full">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Enquire on WhatsApp
                    </span>
                </a>

                {{-- Free Wi-Fi --}}
                <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20is%20WiFi%20available" target="_blank"
                    class="service-card service-delay-4 group bg-white rounded-3xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-accent-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-3xl"></div>
                    <div class="w-20 h-20 bg-slate-50 border-2 border-slate-100 group-hover:bg-accent-500 group-hover:border-accent-500 rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm group-hover:scale-110">
                        <svg class="w-9 h-9 text-accent-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.143 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/>
                        </svg>
                    </div>
                    <h5 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-accent-600 transition-colors font-serif">Free Wi-Fi</h5>
                    <p class="text-slate-500 text-sm leading-relaxed mb-5 flex-grow">Free and reliable Wi-Fi access available throughout the camp for all guests.</p>
                    <span class="inline-flex items-center gap-2 text-xs font-bold text-green-600 bg-green-50 px-3 py-1.5 rounded-full">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Enquire on WhatsApp
                    </span>
                </a>

                {{-- Free Car Parking --}}
                <a href="https://wa.me/255770307759?text=Hello%20Salpat%20Camp,%20do%20you%20have%20free%20parking" target="_blank"
                    class="service-card service-delay-5 group bg-white rounded-3xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-primary-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-3xl"></div>
                    <div class="w-20 h-20 bg-slate-50 border-2 border-slate-100 group-hover:bg-primary-500 group-hover:border-primary-500 rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm group-hover:scale-110">
                        <svg class="w-9 h-9 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h-1a2 2 0 00-2 2v9m3-11h5.5a2.5 2.5 0 010 5H8m0-5v5m0 0v4m6 0h2m-8 0h2M5 20h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v9a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h5 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-primary-600 transition-colors font-serif">Free Car Parking</h5>
                    <p class="text-slate-500 text-sm leading-relaxed mb-5 flex-grow">Secure and free parking space available for all our valued guests.</p>
                    <span class="inline-flex items-center gap-2 text-xs font-bold text-green-600 bg-green-50 px-3 py-1.5 rounded-full">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Enquire on WhatsApp
                    </span>
                </a>
            </div>
        </div>

        {{-- Testimonials --}}
        <div class="bg-slate-900 py-28 relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20 mix-blend-overlay"></div>
            <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-accent-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-primary-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 translate-x-1/2 translate-y-1/4"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-widest mb-6">Guest Reviews</div>
                    <h2 class="text-4xl md:text-5xl font-serif font-bold text-white mb-4">What Our Guests <span class="text-accent-400 italic">Say</span></h2>
                    <div class="w-24 h-1 bg-accent-500/40 mx-auto rounded-full mt-4"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach([
                        ['name' => 'Sarah Johnson', 'role' => 'Tourist', 'quote' => 'I had an amazing stay! The rooms were pristine and comfortable, and the staff was exceptionally friendly. I will definitely return.'],
                        ['name' => 'Michael Smith', 'role' => 'Business Traveller', 'quote' => 'Superb hospitality and excellent service. The dinner was exquisite and the environment was incredibly peaceful for working.'],
                        ['name' => 'Emily Davis', 'role' => 'Vacationer', 'quote' => 'We adored the place! It is absolutely perfect for a relaxing holiday getaway. The team made sure every detail was perfect.'],
                    ] as $review)
                    <div class="bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-white/10 relative hover:-translate-y-2 transition-transform duration-300">
                        <!-- Stars -->
                        <div class="flex gap-1 mb-6">
                            @for($s = 0; $s < 5; $s++)
                                <svg class="w-5 h-5 text-accent-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @endfor
                        </div>
                        <svg class="absolute top-6 right-6 w-10 h-10 text-accent-500/20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                        <p class="text-slate-300 text-lg leading-relaxed mb-8 italic font-serif">"{{ $review['quote'] }}"</p>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent-400 to-accent-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-inner">
                                {{ strtoupper(substr($review['name'], 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-bold text-white">{{ $review['name'] }}</p>
                                <p class="text-accent-400 text-sm font-medium">{{ $review['role'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
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
    .animate-slide-up   { animation: slide-up 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
    .animate-fade-in    { animation: fade-in 1.2s ease-out forwards; opacity: 0; }
    .animation-delay-200{ animation-delay: 200ms; }
    .animation-delay-400{ animation-delay: 400ms; }

    .service-card { animation: slide-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) both; opacity: 0; }
    .service-delay-1 { animation-delay: 100ms; }
    .service-delay-2 { animation-delay: 200ms; }
    .service-delay-3 { animation-delay: 300ms; }
    .service-delay-4 { animation-delay: 400ms; }
    .service-delay-5 { animation-delay: 500ms; }
</style>
@endpush
