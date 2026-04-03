<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="h-full bg-slate-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Salpat Camp Lodge-Moshi'); ?> - <?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Vite Styles & Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <!-- Custom Theme Variables -->
    <style>
        :root {
            --primary-navy: #0b1021;
            --primary-navy-dark: #070a16;
            --accent-gold: #f08a4b;
            --accent-gold-hover: #d9783d;
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
            height: 90px !important;
        }
        .nav-scrolled .nav-link { color: var(--primary-navy) !important; }
        .nav-scrolled .logo-text { color: var(--primary-navy) !important; }
        .nav-scrolled .logo-img { border-color: #f1f5f9; }
        
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
    </style>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
</head>

<body class="flex flex-col min-h-full font-sans text-slate-900 antialiased bg-white" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 50)">

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 transition-all duration-700" 
         :class="scrolled ? 'nav-scrolled' : 'bg-transparent py-6'"
         x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between items-center h-full min-h-[90px]">
                <div class="flex items-center">
                    <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-16 group">
                        <img src="<?php echo e(asset('images/logo.png')); ?>?v=<?php echo e(time()); ?>" alt="Salpat Luxury Logo"
                             class="h-28 w-28 bg-white rounded-full object-contain shadow-2xl transition-all duration-700 transform group-hover:rotate-[360deg] group-hover:scale-110 logo-img border border-transparent">
                        <div class="flex flex-col">
                            <span class="text-xl md:text-3xl font-serif font-bold tracking-tight logo-text transition-colors leading-none"
                                  :class="scrolled ? 'text-navy' : 'text-white'">Salpat Camp</span>
                            <span class="text-[9px] font-bold uppercase tracking-[0.4em] transition-colors mt-1"
                                  :class="scrolled ? 'text-gold' : 'text-gold/90'">Comfort & Hospitality</span>
                        </div>
                    </a>
                </div>
                <!-- Unified Nav & Actions Right Section -->
                <div class="hidden md:flex items-center gap-10">
                    <!-- Nav Links -->
                    <div class="flex items-center gap-8 mr-8 border-r border-white/10 pr-8">
                        <?php
                            $navLinks = [
                                ['route' => 'home', 'label' => 'Home'],
                                ['route' => 'rooms.index', 'label' => 'Our Rooms'],
                                ['route' => 'gallery', 'label' => 'Experiences'],
                                ['route' => 'about', 'label' => 'Our Story'],
                                ['route' => 'services', 'label' => 'Services'],
                                ['route' => 'contact', 'label' => 'Contact']
                            ];
                        ?>
                        
                        <?php $__currentLoopData = $navLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route($link['route'])); ?>"
                               class="nav-link px-3 py-2 text-[10px] font-bold tracking-[0.2em] uppercase transition-all hover:text-gold relative group"
                               :class="scrolled ? 'text-navy' : 'text-white'">
                               <?php echo e($link['label']); ?>

                               <span class="absolute bottom-0 left-3 right-3 h-px bg-gold transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-center"></span>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Action Elements -->
                    <div class="flex items-center gap-6">
                        <!-- Search Bar -->
                        <div x-data="{ open: false }" class="relative flex items-center">
                            <form action="<?php echo e(route('rooms.index')); ?>" method="GET" x-show="open" x-cloak
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
                        <a href="<?php echo e(route('rooms.index')); ?>" 
                           class="hidden lg:inline-block bg-white hover:bg-slate-50 text-navy px-10 py-4 rounded-xl text-[10px] font-bold uppercase tracking-[0.2em] shadow-2xl transition-all hover:-translate-y-1 active:scale-95 border-2 border-transparent">
                            BOOK NOW
                        </a>

                        <?php if(auth()->guard()->check()): ?>
                            <!-- Auth Dropdown -->
                            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                                <button @click="open = !open" class="flex items-center gap-4 group">
                                    <div class="flex flex-col text-right">
                                        <span class="text-[10px] font-black uppercase tracking-widest leading-none mb-1 transition-colors"
                                              :class="scrolled ? 'text-navy' : 'text-white'"><?php echo e(auth()->user()->name); ?></span>
                                        <span class="text-[8px] font-bold text-gold uppercase tracking-widest leading-none"><?php echo e(auth()->user()->role); ?></span>
                                    </div>
                                    <div class="w-12 h-12 rounded-xl overflow-hidden shadow-2xl transition-all duration-500 group-hover:scale-105 border-2 border-gold/40">
                                        <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(auth()->user()->name)); ?>&background=0b1021&color=f08a4b" 
                                             class="w-full h-full object-cover" alt="User Avatar">
                                    </div>
                                </button>
                                <div x-show="open" x-cloak 
                                     class="absolute right-0 z-10 mt-4 w-64 origin-top-right rounded-2xl bg-white p-3 shadow-3xl ring-1 ring-black/5 focus:outline-none">
                                    <div class="px-5 py-4 border-b border-slate-100 mb-2">
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mb-1">Signed in as</p>
                                        <p class="text-sm font-bold text-navy truncate"><?php echo e(Auth::user()->email); ?></p>
                                    </div>
                                    <?php if(Auth::user()->isAdmin()): ?>
                                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                                            <i class="fas fa-chart-line mr-3 text-gold"></i> Admin Dashboard
                                        </a>
                                    <?php elseif(Auth::user()->isReceptionist()): ?>
                                        <a href="<?php echo e(route('receptionist.dashboard')); ?>" class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                                            <i class="fas fa-concierge-bell mr-3 text-gold"></i> Reception Dashboard
                                        </a>
                                    <?php elseif(Auth::user()->isManager()): ?>
                                        <a href="<?php echo e(route('manager.dashboard')); ?>" class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                                            <i class="fas fa-user-shield mr-3 text-gold"></i> Manager Dashboard
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('user.dashboard')); ?>" class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                                            <i class="fas fa-th-large mr-3 text-gold"></i> My Dashboard
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('profile.show')); ?>" class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                                        <i class="fas fa-user-circle mr-3 text-gold"></i> Profile Settings
                                    </a>
                                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-2 pt-2 border-t border-slate-50">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="w-full text-left px-4 py-3 text-sm text-rose-600 font-bold hover:bg-rose-50 rounded-xl flex items-center transition-colors">
                                            <i class="fas fa-sign-out-alt mr-3"></i> Sign Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>"
                               class="bg-gold hover:bg-gold-dark text-white px-10 py-4 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-[0_15px_40px_rgba(240,138,75,0.3)] transition-all hover:-translate-y-1 active:scale-95">
                                LOGIN
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Mobile Action & menu button -->
                <div class="flex items-center gap-4 md:hidden">
                    <!-- Mobile Search -->
                    <div x-data="{ open: false }" class="relative flex items-center">
                        <form action="<?php echo e(route('rooms.index')); ?>" method="GET" x-show="open" x-cloak
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
                    <a href="<?php echo e(route('rooms.index')); ?>" 
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
                <?php $__currentLoopData = $navLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route($link['route'])); ?>"
                       class="block px-4 py-6 text-sm font-bold text-navy border-b border-slate-50 last:border-0 uppercase tracking-widest"><?php echo e($link['label']); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(auth()->guard()->guest()): ?>
                    <div class="pt-8 text-center px-4">
                        <a href="<?php echo e(route('login')); ?>" class="inline-block w-full bg-gold text-white py-6 rounded-2xl font-bold uppercase tracking-[0.3em] text-[10px] shadow-[0_15px_40px_rgba(240,138,75,0.3)] hover:-translate-y-1 transition-all active:scale-95">LOGIN</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    <div class="fixed top-24 right-6 z-[60] w-full max-w-md space-y-4">
        <?php if(session('success')): ?>
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                 class="bg-white rounded-2xl shadow-3xl border-l-[6px] border-green-500 p-6 animate-slide-up cursor-pointer" @click="show = false">
                <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10 bg-green-50 rounded-full flex items-center justify-center text-green-500 mr-4">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Success</p>
                        <p class="text-sm font-bold text-navy"><?php echo e(session('success')); ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                 class="bg-white rounded-2xl shadow-3xl border-l-[6px] border-rose-500 p-6 animate-slide-up cursor-pointer" @click="show = false">
                <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10 bg-rose-50 rounded-full flex items-center justify-center text-rose-500 mr-4">
                        <i class="fas fa-exclamation-circle text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Error</p>
                        <p class="text-sm font-bold text-navy"><?php echo e(session('error')); ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Main Content -->
    <main class="flex-grow animate-reveal overflow-x-hidden">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer Section -->
    <footer class="bg-navy text-white pt-48 pb-16 relative overflow-hidden border-t-8 border-gold/10 mt-20">
        <!-- Decorative Background Element -->
        <div class="absolute top-0 right-0 w-1/3 h-full bg-gold/5 -skew-x-12 transform translate-x-32"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-gold/5 skew-x-12 transform -translate-x-16"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-20 mb-32">
                <!-- Brand Info -->
                <div class="space-y-10 lg:col-span-1">
                    <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-5 group">
                        <img src="<?php echo e(asset('images/logo.png')); ?>?v=<?php echo e(time()); ?>" alt="Salpat Luxury Logo"
                             class="h-20 w-20 bg-white rounded-full p-2 shadow-3xl transition-all duration-700 group-rotate-[360deg] group-hover:scale-110">
                        <div class="flex flex-col">
                            <span class="text-2xl font-serif font-bold tracking-widest uppercase">Salpat Camp</span>
                            <span class="text-[9px] font-bold text-gold uppercase tracking-[0.5em] mt-1">Comfort & Hospitality</span>
                        </div>
                    </a>
                    <p class="text-slate-400 font-light leading-relaxed text-lg italic">
                        "Salpat Camp provides comfortable rooms near Mount Kilimanjaro, specializing in dedicated accommodations primarily for those embarking on mountain climbing expeditions."
                    </p>
                    <div class="flex gap-6">
                        <?php $__currentLoopData = ['facebook', 'instagram', 'twitter']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#" class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-400 hover:bg-gold hover:text-white transition-all transform hover:-translate-y-2 shadow-xl border border-white/5">
                                <span class="sr-only"><?php echo e(ucfirst($social)); ?></span>
                                <i class="fab fa-<?php echo e($social); ?> text-xl"></i>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- Navigation -->
                <div>
                    <h4 class="text-white font-serif font-bold text-xl mb-10 relative inline-block">
                        Quick Links
                        <span class="absolute -bottom-3 left-0 w-10 h-1 bg-gold rounded-full"></span>
                    </h4>
                    <ul class="space-y-5 pt-4">
                        <?php $__currentLoopData = ['Home' => 'home', 'Our Rooms' => 'rooms.index', 'Experiences' => 'gallery', 'Our Story' => 'about', 'Services' => 'services', 'Contact' => 'contact']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route($route)); ?>" class="text-slate-400 hover:text-gold transition-colors font-medium tracking-wide flex items-center group">
                                    <span class="w-0 group-hover:w-4 h-px bg-gold mr-0 group-hover:mr-3 transition-all"></span>
                                    <?php echo e($label); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-white font-serif font-bold text-xl mb-10 relative inline-block">
                        Contact Concierge
                        <span class="absolute -bottom-3 left-0 w-10 h-1 bg-gold rounded-full"></span>
                    </h4>
                    <ul class="space-y-8 pt-4">
                        <li class="flex items-start gap-5 group">
                            <div class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center text-gold border border-white/5 group-hover:bg-gold group-hover:text-white transition-all">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span class="text-slate-400 font-light leading-relaxed">Falcon Street 1, Soweto<br>Near Mount Kilimanjaro (Specialized climbing accommodation)</span>
                        </li>
                        <li class="flex items-center gap-5 group">
                            <div class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center text-gold border border-white/5 group-hover:bg-gold group-hover:text-white transition-all">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <a href="tel:+255770307759" class="text-slate-400 hover:text-gold transition-colors font-bold">+255 770 307 759</a>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h4 class="text-white font-serif font-bold text-xl mb-10 relative inline-block">
                        The Legacy Newsletter
                        <span class="absolute -bottom-3 left-0 w-10 h-1 bg-gold rounded-full"></span>
                    </h4>
                    <div class="pt-4 space-y-8">
                        <p class="text-slate-400 font-light leading-relaxed text-sm italic">Join our distinguished circle for curated experiences and exclusive news.</p>
                        <form class="relative group" onsubmit="event.preventDefault(); alert('Thank you for subscribing to Salpat Luxury!');">
                            <input type="email" placeholder="Email coordinates..." required
                                   class="w-full bg-white/5 border-white/10 text-white placeholder-slate-500 rounded-2xl px-6 py-5 focus:ring-2 focus:ring-gold focus:border-gold transition-all backdrop-blur-sm">
                            <button type="submit" class="absolute right-2 top-2 bottom-2 bg-gold hover:bg-gold-dark text-white px-6 rounded-xl font-bold transition-all shadow-lg active:scale-95">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Payment Methods Bar -->
            <div class="border-t border-white/5 py-12 flex flex-col items-center">
                <h4 class="text-gold font-bold uppercase tracking-[0.4em] text-[10px] mb-8">Accepted Payment Methods</h4>
                <div class="flex flex-wrap justify-center gap-12 sm:gap-16">
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-400 group-hover:bg-gold group-hover:text-white transition-all">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 group-hover:text-white transition-colors uppercase tracking-widest">Cash</span>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-400 group-hover:bg-gold group-hover:text-white transition-all">
                            <i class="fas fa-university"></i>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 group-hover:text-white transition-colors uppercase tracking-widest">Bank Transfer</span>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-400 group-hover:bg-gold group-hover:text-white transition-all">
                            <i class="fab fa-cc-visa text-xl"></i>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 group-hover:text-white transition-colors uppercase tracking-widest">Visa Card</span>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-400 group-hover:bg-gold group-hover:text-white transition-all">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 group-hover:text-white transition-colors uppercase tracking-widest">Mobile Money</span>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/5 pt-16 flex flex-col md:flex-row justify-between items-center gap-10">
                <div class="flex flex-col items-center md:items-start">
                    <p class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.4em] mb-2">Developed with Excellence</p>
                    <p class="text-slate-400 text-sm">
                        &copy; <?php echo e(date('Y')); ?> <span class="text-white font-bold">Salpat Camp</span>. All rights reserved.
                    </p>
                </div>
                <div class="flex gap-10 text-[10px] font-bold text-slate-500 tracking-[0.3em] uppercase">
                    <a href="<?php echo e(route('privacy')); ?>" class="hover:text-gold transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-gold transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</div>
    <!-- Global WhatsApp Concierge -->
    <a href="https://wa.me/255770307759" target="_blank"
        class="fixed bottom-4 right-4 z-50 w-24 h-24 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-[0_25px_60px_rgba(34,197,94,0.4)] flex items-center justify-center transition-all duration-700 hover:scale-110 group border-4 border-white">
        <div class="absolute inset-0 rounded-full animate-ping bg-green-500 opacity-20"></div>
        <i class="fab fa-whatsapp text-5xl group-hover:rotate-12 transition-transform"></i>
    </a>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\sallpat\resources\views/layouts/app.blade.php ENDPATH**/ ?>