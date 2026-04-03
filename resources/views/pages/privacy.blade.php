@extends('layouts.app')

@section('title', 'Privacy Policy - Salpat Luxury Sanctuary')

@section('content')
    <div class="bg-creme min-h-screen">
        <!-- Luxury Page Header -->
        <section class="relative h-[45vh] min-h-[400px] flex items-center justify-center bg-navy overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 w-full h-full bg-cover bg-center opacity-30" style="background-image: url('{{ asset('images/pcs16.png') }}');"></div>
            </div>
            <div class="absolute inset-0 z-10 bg-gradient-to-b from-navy/60 via-transparent to-navy pointer-events-none"></div>

            <div class="relative z-20 text-center px-4 max-w-5xl mx-auto mt-20">
                <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] md:text-xs mb-8 animate-fade-in text-center mx-auto">Security & Trust</h2>
                <h1 class="text-6xl md:text-8xl font-serif font-bold text-white mb-10 leading-tight drop-shadow-2xl animate-slide-up text-center">
                    Privacy <span class="italic font-normal text-gold">Policy</span>
                </h1>
                <div class="w-16 h-px bg-gold/40 mx-auto animate-scale-x"></div>
            </div>
        </section>

        <!-- Privacy Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-32 space-y-24">
            <section class="prose prose-slate prose-lg max-w-none">
                <div class="space-y-12">
                    <div class="space-y-6 border-l-4 border-gold pl-10 py-6 bg-creme-dark/50 rounded-r-3xl shadow-sm">
                        <h3 class="text-3xl font-serif font-bold text-navy">Personal Information We Collect</h3>
                        <p class="text-slate-500 font-light leading-relaxed">
                            When you book a stay at Salpat Camp Lodge or use our boutique services, we collect necessary information such as your name, email address, phone number, and identification documents to provide you with a safe and personalized experience.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <h3 class="text-3xl font-serif font-bold text-navy">How We Use Your Data</h3>
                        <p class="text-slate-500 font-light leading-relaxed">
                            Your data allows us to manage your bookings, communicate important updates regarding your stay, and improve our hospitality services. We do not sell or share your personal information with third parties for marketing purposes.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <h3 class="text-3xl font-serif font-bold text-navy">Security of Information</h3>
                        <p class="text-slate-500 font-light leading-relaxed">
                            We implement industry-standard security measures to protect your digital and physical data. Your privacy and security are our highest priorities while you are staying at our Sanctuary.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <h3 class="text-3xl font-serif font-bold text-navy">Cookies & Analytics</h3>
                        <p class="text-slate-500 font-light leading-relaxed">
                            Our website use cookies to enhance your browsing experience and analyze traffic. This helps us refine our digital presence to better serve travelers and business guests.
                        </p>
                    </div>

                    <div class="pt-16 border-t border-slate-100 italic text-slate-400 font-light">
                        "Your trust is the foundation of our hospitality. We are committed to protecting your privacy with the same passion we use to provide your luxury comfort."
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
