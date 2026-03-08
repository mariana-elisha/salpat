<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Salpat Camp') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/theme.css') }}?v={{ time() }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="flex flex-col min-h-full font-sans text-slate-900 antialiased bg-slate-50">

    <!-- Navigation -->
    <nav class="bg-primary-600 sticky top-0 z-50 shadow-lg" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center gap-4">
                            <img src="{{ asset('images/logo.png') }}?v={{ time() }}" alt="Salpat Camp Logo"
                                class="h-20 w-20 bg-white rounded-full p-1 object-contain shadow-lg border-2 border-primary-500">
                            <span class="text-2xl font-serif font-bold text-white tracking-tight">Salpat Camp</span>
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-8 sm:flex sm:items-center sm:space-x-4">
                    <a href="{{ route('home') }}"
                        class="text-sm font-medium text-primary-100 hover:text-white hover:bg-primary-500 rounded-lg px-3 py-2 transition">Home</a>
                    <a href="{{ route('rooms.index') }}"
                        class="text-sm font-medium text-primary-100 hover:text-white hover:bg-primary-500 rounded-lg px-3 py-2 transition">Rooms</a>
                    <a href="{{ route('gallery') }}"
                        class="text-sm font-medium text-primary-100 hover:text-white hover:bg-primary-500 rounded-lg px-3 py-2 transition">Gallery</a>
                    <a href="{{ route('about') }}"
                        class="text-sm font-medium text-primary-100 hover:text-white hover:bg-primary-500 rounded-lg px-3 py-2 transition">About</a>
                    <a href="{{ route('services') }}"
                        class="text-sm font-medium text-primary-100 hover:text-white hover:bg-primary-500 rounded-lg px-3 py-2 transition">Services</a>
                    <a href="{{ route('contact') }}"
                        class="text-sm font-medium text-primary-100 hover:text-white hover:bg-primary-500 rounded-lg px-3 py-2 transition">Contact</a>

                    @auth
                        <!-- Notifications Indicator -->
                        <div class="relative mr-4" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false"
                                class="text-primary-100 hover:text-white transition relative">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7c0-2.015-1.121-3.791-2.784-4.608L15 4.141c-.244-.127-.514-.232-.8-.313m0 0A5.985 5.985 0 0115 9.75v.7c0 1.258.42 2.418 1.121 3.418m-1.121-3.418c0-1.258-.42-2.418-1.121-3.418m1.121 3.418H10.5m0 0A5.985 5.985 0 009 9.75v.7c0 1.258-.42 2.418-1.121 3.418m1.121-3.418c0-1.258.42-2.418-1.121-3.418m1.121 3.418H10.5M8.25 19.75a2.25 2.25 0 004.5 0" />
                                </svg>
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <span class="absolute -top-1 -right-1 flex h-3 w-3">
                                        <span class="relative inline-flex rounded-full h-3 w-3 bg-accent-500"></span>
                                    </span>
                                @endif
                            </button>
                            <!-- Minimalist dropdown for public view -->
                            <div x-show="open" x-cloak
                                class="absolute right-0 z-10 mt-2 w-64 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <div
                                    class="px-4 py-2 border-b border-slate-100 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                    Recent Activity</div>
                                <div class="max-h-60 overflow-y-auto">
                                    @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                                        <div
                                            class="px-4 py-3 text-sm hover:bg-slate-50 {{ $loop->last ? '' : 'border-b border-slate-50' }}">
                                            <p class="text-slate-900 font-medium">
                                                {{ $notification->data['message'] ?? 'New notification' }}
                                            </p>
                                            <p class="text-[10px] text-slate-400 mt-1">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    @empty
                                        <div class="px-4 py-6 text-center text-xs text-slate-400 italic">All caught up!</div>
                                    @endforelse
                                </div>
                                <a href="{{ route('profile.show') }}"
                                    class="block px-4 py-2 text-center text-xs font-bold text-primary-600 hover:bg-slate-50 border-t border-slate-100">View
                                    All Notifications</a>
                            </div>
                        </div>

                        <div class="relative ml-4" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false"
                                class="flex items-center gap-2 text-sm font-bold text-white hover:text-accent-200 transition focus:outline-none">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4 text-primary-200" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                style="display: none;">
                                @if(Auth::user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Admin Dashboard</a>
                                    <a href="{{ route('admin.reports.index') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Reports</a>
                                    <a href="{{ route('admin.contact_messages.index') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Contact Messages</a>
                                    <a href="{{ route('staff_reports.index') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Section Reports</a>
                                @elseif(Auth::user()->isReceptionist())
                                    <a href="{{ route('receptionist.dashboard') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Reception Dashboard</a>
                                    <a href="{{ route('receptionist.reports.index') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Reports</a>
                                    <a href="{{ route('receptionist.contact_messages.index') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Contact Messages</a>
                                    <a href="{{ route('staff_reports.index') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Section Reports</a>
                                @elseif(Auth::user()->isManager())
                                    <a href="{{ route('manager.dashboard') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Manager Dashboard</a>
                                    <a href="{{ route('manager.reports.index') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Reports</a>
                                    <a href="{{ route('manager.contact_messages.index') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Contact Messages</a>
                                    <a href="{{ route('manager.activity_log.index') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">System Activity</a>
                                    <a href="{{ route('staff_reports.index') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Section Reports</a>
                                @else
                                    <a href="{{ route('user.dashboard') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">My Dashboard</a>
                                @endif
                                <a href="{{ route('bookings.index') }}"
                                    class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">My Bookings</a>
                                <a href="{{ route('profile.show') }}"
                                    class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">My Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">Sign
                                        out</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center gap-4 ml-4">
                            <a href="{{ route('login') }}"
                                class="rounded-full bg-accent-500 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-accent-600 transition">Log
                                in</a>
                        </div>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center sm:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                        class="inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen" class="sm:hidden bg-primary-700 border-b border-primary-600">
            <div class="space-y-1 pb-3 pt-2">
                <a href="{{ route('home') }}"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-primary-100 hover:border-accent-400 hover:bg-primary-800 hover:text-white">Home</a>
                <a href="{{ route('rooms.index') }}"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-primary-100 hover:border-accent-400 hover:bg-primary-800 hover:text-white">Rooms</a>
                <a href="{{ route('gallery') }}"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-primary-100 hover:border-accent-400 hover:bg-primary-800 hover:text-white">Gallery</a>
                <a href="{{ route('about') }}"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-primary-100 hover:border-accent-400 hover:bg-primary-800 hover:text-white">About</a>
                <a href="{{ route('services') }}"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-primary-100 hover:border-accent-400 hover:bg-primary-800 hover:text-white">Services</a>
                <a href="{{ route('contact') }}"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-primary-100 hover:border-accent-400 hover:bg-primary-800 hover:text-white">Contact
                    Us</a>
            </div>
            <div class="border-t border-primary-600 pb-3 pt-4">
                @auth
                    <div class="flex items-center px-4">
                        <div class="ml-3">
                            <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                            <div class="text-sm font-medium text-primary-200">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}"
                                class="block px-4 py-2 text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">Admin
                                Dashboard</a>
                            <a href="{{ route('admin.reports.index') }}"
                                class="block px-4 py-2 text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">Reports</a>
                            <a href="{{ route('admin.contact_messages.index') }}"
                                class="block px-4 py-2 text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">Contact
                                Messages</a>
                        @elseif(Auth::user()->isReceptionist())
                            <a href="{{ route('receptionist.dashboard') }}"
                                class="block px-4 py-2 text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">Reception
                                Dashboard</a>
                            <a href="{{ route('receptionist.reports.index') }}"
                                class="block px-4 py-2 text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">Reports</a>
                            <a href="{{ route('receptionist.contact_messages.index') }}"
                                class="block px-4 py-2 text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">Contact
                                Messages</a>
                        @elseif(Auth::user()->isManager())
                            <a href="{{ route('manager.dashboard') }}"
                                class="block px-4 py-2 text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">Manager
                                Dashboard</a>
                            <a href="{{ route('manager.reports.index') }}"
                                class="block px-4 py-2 text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">Reports</a>
                            <a href="{{ route('manager.contact_messages.index') }}"
                                class="block px-4 py-2 text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">Contact
                                Messages</a>
                        @else
                            <a href="{{ route('user.dashboard') }}"
                                class="block px-4 py-2 text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">My
                                Dashboard</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full px-4 py-2 text-left text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">Sign
                                out</button>
                        </form>
                    </div>
                @else
                    <div class="mt-3 space-y-1 px-4">
                        <a href="{{ route('login') }}"
                            class="block w-full text-center rounded-md bg-accent-500 px-3 py-2 text-base font-medium text-white hover:bg-accent-600">Log
                            in</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="rounded-lg bg-green-50 p-4 border border-green-200 shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="rounded-lg bg-red-50 p-4 border border-red-200 shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <!-- Footer Start -->
    <footer
        class="bg-slate-900 border-t-4 border-accent-500 text-slate-300 mt-auto pt-20 pb-12 relative overflow-hidden">
        <!-- Background Accent -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-900/20 rounded-full blur-[100px] pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 mb-16">
                <!-- Column 1: Brand & Socials -->
                <div class="space-y-6 flex flex-col items-center md:items-start text-center md:text-left">
                    <a href="{{ route('home') }}" class="inline-block group">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('images/logo.png') }}?v={{ time() }}" alt="Salpat Camp Logo"
                                class="h-16 w-16 bg-white rounded-full p-1.5 object-contain shadow-md group-hover:shadow-accent-500/20 transition-all duration-300">
                            <h1
                                class="text-2xl font-serif font-bold text-white tracking-widest uppercase m-0 drop-shadow-sm group-hover:text-accent-400 transition-colors">
                                Salpat Camp</h1>
                        </div>
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                        Experience the spirit of adventure and the authentic comfort of premium hospitality in the heart
                        of Moshi, near the majestic Kilimanjaro.
                    </p>
                    <div class="flex gap-4 pt-2">
                        <a href="#" aria-label="Facebook"
                            class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 text-slate-400 flex items-center justify-center hover:bg-accent-500 hover:text-white hover:border-accent-500 hover:-translate-y-1 transition-all duration-300 shadow-sm"><svg
                                class="w-4 h-4" transform="scale(1.1)" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg></a>
                        <a href="#" aria-label="Instagram"
                            class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 text-slate-400 flex items-center justify-center hover:bg-accent-500 hover:text-white hover:border-accent-500 hover:-translate-y-1 transition-all duration-300 shadow-sm"><svg
                                class="w-4 h-4" transform="scale(1.2)" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />

                            </svg></a>
<a href="#" aria-label="LinkedIn" 35:
                            class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 text-slate-400 flex items-center justify-center hover:bg-accent-500 hover:text-white hover:border-accent-500 hover:-translate-y-1 transition-all duration-300 shadow-sm"><svg
class="w-4 h-4" transform="scale(1.1)" fill="currentColor" viewBox="0 0 24 24">

                                <path
                                    d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />

                            </svg></a>

                    </div>

                </div>

<!-- Column 2: Quick Links -->
<div class="flex flex-col items-center md:items-start text-center md:text-left">
<h6 class="text-white font-serif font-bold tracking-wide mb-6 text-lg relative inline-block">
Quick Links
<span
                            class="absolute -bottom-2 left-1/2 md:left-0 -translate-x-1/2 md:translate-x-0 w-8 h-1 bg-accent-500 rounded-full"></span>
</h6>
<ul class="space-y-3 w-full max-w-[200px]">
<li><a href="{{ route('home') }}" 50:
                                class="text-sm font-medium text-slate-400 hover:text-accent-400 transition-colors inline-block w-full">Home</a>
</li>
<li><a href="{{ route('about') }}" 53:
                                class="text-sm font-medium text-slate-400 hover:text-accent-400 transition-colors inline-block w-full">About
Us</a></li>
<li><a href="{{ route('rooms.index') }}" 56:
                                class="text-sm font-medium text-slate-400 hover:text-accent-400 transition-colors inline-block w-full">Our
Rooms</a></li>
<li><a href="{{ route('gallery') }}" 59:
                                class="text-sm font-medium text-slate-400 hover:text-accent-400 transition-colors inline-block w-full">Gallery</a>
</li>
</ul>
</div>

<!-- Column 3: Contact Info -->
                <div class="flex flex-col items-center md:items-start text-center md:text-left">
                    <h6 class="text-white font-serif font-bold tracking-wide mb-6 text-lg relative inline-block">
                        Contact Us
                        <span
                            class="absolute -bottom-2 left-1/2 md:left-0 -translate-x-1/2 md:translate-x-0 w-8 h-1 bg-accent-500 rounded-full"></span>
                    </h6>
                    <ul class="space-y-4 max-w-xs">
                        <li class="flex flex-col md:flex-row items-center md:items-start gap-3">
                            <svg class="w-5 h-5 text-accent-500 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-sm text-slate-400 leading-relaxed">Falcon Street 1,
                                Soweto<br>Moshi-Kilimanjaro, TZ</span>
                        </li>
                        <li class="flex flex-col md:flex-row items-center md:items-start gap-3">
                            <svg class="w-5 h-5 text-accent-500 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <a href="tel:+2550770307759"
                                class="text-sm text-slate-400 hover:text-accent-400 transition-colors font-medium tracking-wide">+255
                                0770307759</a>
                        </li>
                        <li class="flex flex-col md:flex-row items-center md:items-start gap-3">
                            <svg class="w-5 h-5 text-accent-500 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <a href="mailto:salpatcamp@yahoo.com"
                                class="text-sm text-slate-400 hover:text-accent-400 transition-colors">salpatcamp@yahoo.com</a>
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Newsletter -->
                <div
                    class="flex flex-col items-center md:items-start text-center md:text-left bg-slate-800/50 p-6 rounded-2xl border border-slate-800 w-full">
                    <h6 class="text-white font-serif font-bold tracking-wide mb-4 text-lg">
                        Newsletter
                    </h6>
                    <p class="text-sm text-slate-400 mb-6 leading-relaxed">
                        Subscribe to receive our latest updates, special offers, and news perfectly tailored to
                        you.
                    </p>
                    <form class="w-full flex-col sm:flex-row md:flex-col lg:flex-row flex gap-2"
                        onsubmit="event.preventDefault(); alert('Subscribed successfully!');">
                        <input type="email" placeholder="Your email address" required
                            class="w-full bg-slate-900 border-slate-700 text-white placeholder-slate-500 text-sm rounded-xl focus:ring-accent-500 focus:border-accent-500 px-4 py-3">
                        <button type="submit"
                            class="shrink-0 bg-accent-500 hover:bg-accent-600 text-white font-bold px-4 py-3 rounded-xl transition-colors whitespace-nowrap shadow-md">
                            Subscribe
                        </button>
                    </form>
                </div>

            </div>

            <div
                class="border-t border-slate-800 pt-8 mt-12 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="text-sm text-slate-500 text-center md:text-left font-medium">
                    &copy; {{ date('Y') }} <span class="text-white">Salpat Camp</span>. All Rights Reserved.
                </div>
                <div class="flex flex-wrap justify-center gap-6 text-sm">
                    <a href="#" class="text-slate-500 font-medium hover:text-white transition-colors">Terms of
                        Service</a>
                    <a href="#" class="text-slate-500 font-medium hover:text-white transition-colors">Privacy
                        Policy</a>
                </div>
            </div>
        </div>

    </footer>
</body>

</html>
