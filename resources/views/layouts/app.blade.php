<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Salpat Camp Lodge-Moshi') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom Theme Variables -->
    <style>
        :root {
            --primary-navy: #0b1021;
            --primary-navy-dark: #070a16;
            --accent-gold: #f08a4b; /* Original Carrot Color */
            --accent-gold-hover: #d9783d;
            --bg-creme: #fdfbf7; /* Aquila background */
            --bg-creme-dark: #f5f1e8;
            --text-main: #1a1a1a;
            --text-muted: #64748b;
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-navy { background-color: var(--primary-navy); }
        .bg-navy-dark { background-color: var(--primary-navy-dark); }
        .text-gold { color: var(--accent-gold); }
        .bg-gold { background-color: var(--accent-gold); }
        .bg-gold-dark { background-color: var(--accent-gold-hover); }
        .border-gold { border-color: var(--accent-gold); }
        
        /* Safety Fix: Prevent SVGs from expanding to huge sizes if Tailwind fails */
        svg {
            max-width: 100%;
            height: auto;
            display: inline-block;
        }
        
        /* Premium Scrolled Nav Effect */
        .nav-scrolled {
            background-color: white !important;
            box-shadow: 0 10px 40px rgba(11,16,33,0.12);
        }
        .nav-scrolled .nav-link { color: var(--primary-navy) !important; }
        .nav-scrolled .logo-text { color: var(--primary-navy) !important; }
        .nav-scrolled .logo-img { border-color: #f1f5f9; transform: scale(0.85); }
        
        [x-cloak] { display: none !important; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: var(--primary-navy); }
        ::-webkit-scrollbar-thumb { background: var(--accent-gold); border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--accent-gold-hover); }
        /* Premium Hero Animations */
        @keyframes revealText {
            0% { opacity: 0; transform: translateY(40px) skewY(5deg); clip-path: inset(0 0 100% 0); }
            100% { opacity: 1; transform: translateY(0) skewY(0deg); clip-path: inset(0 0 0 0); }
        }
        @keyframes fadeInOut {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 1; }
        }
        @keyframes slideUpFade {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-reveal { animation: revealText 1.8s cubic-bezier(0.19, 1, 0.22, 1) forwards; opacity: 0; }
        .animate-slide-up-fade { animation: slideUpFade 1.2s ease-out forwards; opacity: 0; }
        .animation-delay-300 { animation-delay: 300ms; }
        .animation-delay-600 { animation-delay: 600ms; }
        .animation-delay-900 { animation-delay: 900ms; }
        .animation-delay-1200 { animation-delay: 1200ms; }

        /* Floating Booking Bar */
        .booking-bar-float {
            position: fixed;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 100;
            width: calc(100% - 2rem);
            max-width: 1000px;
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid var(--bg-creme-dark);
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .booking-bar-float:hover { transform: translateX(-50%) translateY(-5px); }
        
        @media (max-width: 768px) {
            .booking-bar-float {
                bottom: 1rem;
                padding: 0.75rem 1.25rem;
                flex-direction: column;
                gap: 0.75rem;
            }
        }
    </style>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
</head>

<body class="flex flex-col min-h-full font-sans text-slate-900 antialiased bg-creme" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 50)">

    <!-- Top Contact Bar (Prime Land Style) -->
    <div class="hidden lg:block bg-navy py-3 border-b border-white/5 relative z-[60]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center text-[10px] font-bold uppercase tracking-[0.2em] text-white/70">
            <div class="flex items-center gap-8">
                <span class="flex items-center gap-2"><i class="fas fa-map-marker-alt text-gold"></i> Falcon Street 1, Soweto, Moshi</span>
                <span class="flex items-center gap-2"><i class="fas fa-envelope text-gold"></i> info@salpatcamp.com</span>
            </div>
            <div class="flex items-center gap-8">
                <span class="flex items-center gap-2"><i class="fas fa-clock text-gold"></i> Check-in: 2:00pm | Check-out: 11:00am</span>
                <a href="tel:+255770307759" class="flex items-center gap-2 text-white hover:text-gold transition-colors"><i class="fas fa-phone-alt text-gold"></i> +255 770 307 759</a>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="fixed lg:relative top-0 lg:top-auto w-full z-50 transition-all duration-700" 
         :class="scrolled ? 'fixed top-0 nav-scrolled shadow-xl' : 'bg-transparent py-4'"
         x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between items-center h-full min-h-[80px]">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-8 group">
                        <img src="{{ asset('images/logo.png') }}?v={{ time() }}" alt="Salpat Luxury Logo"
                             class="h-20 w-20 bg-white rounded-full object-contain shadow-xl transition-all duration-700 transform group-hover:rotate-[360deg] logo-img">
                        <div class="flex flex-col">
                            <span class="text-xl md:text-2xl font-serif font-bold tracking-tight logo-text transition-colors leading-none"
                                  :class="scrolled || !window.location.pathname.endsWith('/') ? 'text-navy' : 'text-white'">Salpat Camp</span>
                            <span class="text-[8px] font-bold uppercase tracking-[0.4em] transition-colors mt-1 text-gold">Comfort & Hospitality</span>
                        </div>
                    </a>
                </div>
                <!-- Unified Nav & Actions Right Section -->
                <div class="hidden md:flex items-center gap-10">
                    <!-- Nav Links -->
                    <div class="flex items-center gap-8 mr-8 border-r border-white/10 pr-8">
                        @php
                            $navLinks = [
                                ['route' => 'home', 'label' => 'Home'],
                                ['route' => 'rooms.index', 'label' => 'Our Rooms'],
                                ['route' => 'gallery', 'label' => 'Experiences'],
                                ['route' => 'about', 'label' => 'Our Story'],
                                ['route' => 'services', 'label' => 'Services'],
                                ['route' => 'contact', 'label' => 'Contact']
                            ];
                        @endphp
                        
                        @foreach($navLinks as $link)
                            <a href="{{ route($link['route']) }}"
                               class="nav-link px-3 py-2 text-[9px] font-bold tracking-[0.2em] uppercase transition-all hover:text-gold relative group"
                               :class="scrolled || !window.location.pathname.endsWith('/') ? 'text-navy' : 'text-white'">
                               {{ $link['label'] }}
                               <span class="absolute bottom-0 left-3 right-3 h-px bg-gold transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-center"></span>
                            </a>
                        @endforeach
                    </div>

                    <!-- Action Elements -->
                    <div class="flex items-center gap-6">
                        <!-- Search Bar -->
                        <div x-data="{ open: false }" class="relative flex items-center">
                            <form action="{{ route('rooms.index') }}" method="GET" x-show="open" x-cloak
                                  x-transition:enter="transition ease-out duration-300 transform origin-right"
                                  x-transition:enter-start="opacity-0 scale-90"
                                  x-transition:enter-end="opacity-100 scale-100"
                                  class="absolute right-12 w-80 transform translate-x-2">
                                <input type="text" name="keyword" placeholder="What are you looking for?" required
                                       class="w-full rounded-2xl px-8 py-4 text-xs font-bold uppercase tracking-widest shadow-4xl focus:outline-none focus:ring-4 focus:ring-gold/30"
                                       :class="scrolled ? 'bg-navy text-white placeholder-white/40' : 'bg-white text-navy placeholder-navy/30'">
                            </form>
                            <button @click="open = !open" 
                                    class="w-12 h-12 flex items-center justify-center transition-all duration-300 rounded-2xl shadow-sm border border-transparent"
                                    :class="scrolled ? 'text-navy hover:bg-navy/5' : 'text-white hover:bg-white/20'">
                                <i class="fas" :class="open ? 'fa-times' : 'fa-search'" class="text-xl"></i>
                            </button>
                        </div>

                        <!-- Book Now Button -->
                        <a href="{{ route('rooms.index') }}" 
                           class="hidden lg:inline-block bg-white hover:bg-slate-50 text-navy px-10 py-4 rounded-xl text-[10px] font-bold uppercase tracking-[0.2em] shadow-2xl transition-all hover:-translate-y-1 active:scale-95 border-2 border-transparent">
                            BOOK NOW
                        </a>

                        @auth
                            <!-- Auth Dropdown -->
                            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                                <button @click="open = !open" class="flex items-center gap-4 group">
                                    <div class="flex flex-col text-right">
                                        <span class="text-[10px] font-black uppercase tracking-widest leading-none mb-1 transition-colors"
                                              :class="scrolled ? 'text-navy' : 'text-white'">{{ auth()->user()->name }}</span>
                                        <span class="text-[8px] font-bold text-gold uppercase tracking-widest leading-none">{{ auth()->user()->role }}</span>
                                    </div>
                                    <div class="w-12 h-12 rounded-xl overflow-hidden shadow-2xl transition-all duration-500 group-hover:scale-105 border-2 border-gold/40">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0b1021&color=f08a4b" 
                                             class="w-full h-full object-cover" alt="User Avatar">
                                    </div>
                                </button>
                                <div x-show="open" x-cloak 
                                     class="absolute right-0 z-10 mt-4 w-64 origin-top-right rounded-2xl bg-white p-3 shadow-3xl ring-1 ring-black/5 focus:outline-none">
                                    <div class="px-5 py-4 border-b border-slate-100 mb-2">
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mb-1">Signed in as</p>
                                        <p class="text-sm font-bold text-navy truncate">{{ Auth::user()->email }}</p>
                                    </div>
                                    @if(Auth::user()->isAdmin())
                                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                                            <i class="fas fa-chart-line mr-3 text-gold"></i> Admin Dashboard
                                        </a>
                                    @elseif(Auth::user()->isReceptionist())
                                        <a href="{{ route('receptionist.dashboard') }}" class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                                            <i class="fas fa-concierge-bell mr-3 text-gold"></i> Reception Dashboard
                                        </a>
                                    @elseif(Auth::user()->isManager())
                                        <a href="{{ route('manager.dashboard') }}" class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                                            <i class="fas fa-user-shield mr-3 text-gold"></i> Manager Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                                            <i class="fas fa-th-large mr-3 text-gold"></i> My Dashboard
                                        </a>
                                    @endif
                                    <a href="{{ route('profile.show') }}" class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                                        <i class="fas fa-user-circle mr-3 text-gold"></i> Profile Settings
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}" class="mt-2 pt-2 border-t border-slate-50">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-3 text-sm text-rose-600 font-bold hover:bg-rose-50 rounded-xl flex items-center transition-colors">
                                            <i class="fas fa-sign-out-alt mr-3"></i> Sign Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                               class="bg-gold hover:bg-gold-dark text-white px-10 py-4 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-[0_15px_40px_rgba(240,138,75,0.3)] transition-all hover:-translate-y-1 active:scale-95">
                                LOGIN
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Mobile Action & menu button -->
                <div class="flex items-center gap-4 md:hidden">
                    <!-- Mobile Search -->
                    <div x-data="{ open: false }" class="relative flex items-center">
                        <form action="{{ route('rooms.index') }}" method="GET" x-show="open" x-cloak
                              class="absolute right-0 top-12 w-72 z-[60]">
                            <input type="text" name="keyword" placeholder="Search..." required
                                   class="w-full rounded-xl px-4 py-3 text-xs font-bold uppercase tracking-widest bg-white text-navy shadow-4xl border-2 border-gold/20">
                        </form>
                        <button @click="open = !open" 
                                class="w-10 h-10 flex items-center justify-center transition-all duration-300 rounded-xl"
                                :class="scrolled ? 'text-navy bg-navy/5' : 'text-white bg-white/10'">
                            <i class="fas" :class="open ? 'fa-times' : 'fa-search'"></i>
                        </button>
                    </div>

                    <!-- Mobile Book Link -->
                    <a href="{{ route('rooms.index') }}" 
                       class="w-10 h-10 flex items-center justify-center rounded-xl bg-gold text-white shadow-lg">
                        <i class="fas fa-calendar-check"></i>
                    </a>

                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                            class="p-2 transition-colors rounded-xl"
                            :class="scrolled ? 'text-navy bg-navy/5' : 'text-white bg-white/10'">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen" x-cloak 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-10"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden bg-white/95 backdrop-blur-xl border-b border-slate-100 shadow-3xl absolute w-full top-full left-0 overflow-hidden rounded-b-[3rem]">
            <div class="space-y-1 px-8 pb-12 pt-8">
                @foreach($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                       class="block px-4 py-6 text-sm font-bold text-navy border-b border-slate-50 last:border-0 uppercase tracking-widest">{{ $link['label'] }}</a>
                @endforeach
                @guest
                    <div class="pt-8 text-center px-4">
                        <a href="{{ route('login') }}" class="inline-block w-full bg-gold text-white py-6 rounded-2xl font-bold uppercase tracking-[0.3em] text-[10px] shadow-[0_15px_40px_rgba(240,138,75,0.3)] hover:-translate-y-1 transition-all active:scale-95">LOGIN</a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    <div class="fixed top-24 right-6 z-[60] w-full max-w-md space-y-4">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                 class="bg-white rounded-2xl shadow-3xl border-l-[6px] border-green-500 p-6 animate-slide-up cursor-pointer" @click="show = false">
                <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10 bg-green-50 rounded-full flex items-center justify-center text-green-500 mr-4">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Success</p>
                        <p class="text-sm font-bold text-navy">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                 class="bg-white rounded-2xl shadow-3xl border-l-[6px] border-rose-500 p-6 animate-slide-up cursor-pointer" @click="show = false">
                <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10 bg-rose-50 rounded-full flex items-center justify-center text-rose-500 mr-4">
                        <i class="fas fa-exclamation-circle text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Error</p>
                        <p class="text-sm font-bold text-navy">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main class="flex-grow animate-reveal overflow-x-hidden">
        @yield('content')
    </main>

    <!-- Footer Section (Simplified Premium Style) -->
    <footer class="bg-navy text-white pt-40 pb-20 mt-20 border-t border-white/5 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-gold/5 rounded-full blur-[100px] -mr-32 -mt-32"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-20 lg:gap-12 mb-32">
                <!-- Column 1: Brand & Identity -->
                <div class="space-y-10 group">
                    <a href="{{ route('home') }}" class="block">
                        <img src="{{ asset('images/logo.png') }}?v={{ time() }}" alt="Salpat Luxury Logo"
                             class="h-20 w-20 bg-white rounded-2xl p-2 shadow-2xl mb-8 group-hover:scale-105 transition-transform">
                        <div class="space-y-2">
                            <span class="block text-2xl font-serif font-bold tracking-widest uppercase">Salpat Camp</span>
                            <span class="block text-[8px] font-bold text-gold uppercase tracking-[0.5em]">Comfort & Hospitality</span>
                        </div>
                    </a>
                    <p class="text-slate-400 text-xs font-light leading-relaxed italic max-w-xs">
                        A sanctuary nestled in the heart of Soweto, Moshi, providing world-class hospitality and specialized support for Kilimanjaro expeditions.
                    </p>
                </div>

                <!-- Column 2: Guest Journey (Quick Links) -->
                <div>
                    <h4 class="text-gold font-bold uppercase tracking-[0.4em] text-[10px] mb-12 border-b border-white/10 pb-4 inline-block">Explore</h4>
                    <nav class="flex flex-col gap-6">
                        @foreach(['Home' => 'home', 'Rooms' => 'rooms.index', 'Experiences' => 'gallery', 'About' => 'about', 'Services' => 'services', 'Contact' => 'contact'] as $label => $route)
                            <a href="{{ route($route) }}" class="text-slate-400 hover:text-white transition-all font-bold uppercase tracking-[0.3em] text-[9px] flex items-center gap-3 group">
                                <span class="w-1 h-1 rounded-full bg-gold opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                {{ $label }}
                            </a>
                        @endforeach
                    </nav>
                </div>

                <!-- Column 3: Concierge Support (Contact) -->
                <div>
                    <h4 class="text-gold font-bold uppercase tracking-[0.4em] text-[10px] mb-12 border-b border-white/10 pb-4 inline-block">Contact</h4>
                    <div class="space-y-10">
                        <div class="group">
                            <p class="text-[8px] font-bold text-slate-500 uppercase tracking-widest mb-3">The Sanctuary</p>
                            <address class="text-xs text-slate-300 not-italic font-light leading-loose italic">
                                Falcon Street 1, Soweto<br>
                                near Mount Kilimanjaro<br>
                                Moshi, Tanzania
                            </address>
                        </div>
                        <div class="group">
                            <p class="text-[8px] font-bold text-slate-500 uppercase tracking-widest mb-3">Direct Line</p>
                            <a href="tel:+255770307759" class="text-sm font-serif font-bold text-white hover:text-gold transition-colors tracking-widest">
                                +255 770 307 759
                            </a>
                        </div>
                        <div class="group">
                            <p class="text-[8px] font-bold text-slate-500 uppercase tracking-widest mb-3">Digital Mail</p>
                            <a href="mailto:salpatcamp@gmail.com" class="text-sm font-serif font-bold text-white hover:text-gold transition-colors tracking-widest">
                                salpatcamp@gmail.com
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Column 4: Social Sanctuary (Icons) -->
                <div>
                    <h4 class="text-gold font-bold uppercase tracking-[0.4em] text-[10px] mb-12 border-b border-white/10 pb-4 inline-block">Social</h4>
                    <p class="text-slate-400 text-[10px] uppercase font-bold tracking-widest mb-10">Follow the Journey</p>
                    <div class="flex flex-wrap gap-4">
                        @foreach(['facebook-f', 'instagram', 'twitter', 'linkedin-in'] as $social)
                            <a href="#" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:bg-gold hover:text-white hover:border-gold transition-all duration-500">
                                <i class="fab fa-{{ $social }} text-xs"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="flex flex-col md:flex-row justify-between items-center pt-16 border-t border-white/5 gap-8">
                <p class="text-slate-500 text-[9px] font-bold uppercase tracking-[0.2em]">&copy; {{ date('Y') }} Salpat Camp Lodge. A Boutique Experience.</p>
                <div class="flex gap-10 text-[9px] font-bold text-slate-500 tracking-[0.3em] uppercase">
                    <a href="{{ route('privacy') }}" class="hover:text-gold transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-gold transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</div>
    <!-- Global WhatsApp Concierge -->
    <a href="https://wa.me/255770307759" target="_blank"
        class="fixed bottom-6 left-6 z-50 w-16 h-16 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-2xl flex items-center justify-center transition-all duration-700 hover:scale-110 group border-4 border-white">
        <div class="absolute inset-0 rounded-full animate-ping bg-green-500 opacity-20"></div>
        <i class="fab fa-whatsapp text-3xl group-hover:rotate-12 transition-transform"></i>
    </a>

    <!-- Floating Booking Bar (Aquila Style) -->
    <div class="booking-bar-float group" x-data="{ show: false }" x-init="window.addEventListener('scroll', () => { show = window.pageYOffset > 400 })" x-show="show" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-20" x-transition:enter-end="opacity-100 translate-y-0">
        <div class="flex items-center gap-6">
            <div class="hidden sm:block">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Experience Luxury</p>
                <p class="text-sm font-serif font-bold text-navy">Salpat Camp Lodge Moshi</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="hidden lg:flex items-center gap-8 mr-8 border-r border-slate-100 pr-8">
                <div class="text-right">
                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Rate Guarantee</p>
                    <p class="text-[10px] font-bold text-gold uppercase tracking-widest">Best Price Direct</p>
                </div>
            </div>
            <a href="{{ route('rooms.index') }}" class="bg-gold hover:bg-gold-dark text-white px-10 py-4 rounded-xl text-[10px] font-bold uppercase tracking-[0.2em] shadow-xl transition-all hover:-translate-y-1">
                CHECK AVAILABILITY
            </a>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
