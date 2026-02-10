<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <title>@yield('title', 'Salpat Camp') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/theme.css') }}?v=4" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                            serif: ['"Playfair Display"', 'serif'],
                        },
                        colors: {
                            primary: {
                                50: '#ecfdf5',
                                100: '#d1fae5',
                                200: '#a7f3d0',
                                300: '#6ee7b7',
                                400: '#34d399',
                                500: '#10b981',
                                600: '#059669',
                                700: '#047857',
                                800: '#065f46',
                                900: '#064e3b',
                                950: '#022c22',
                            },
                        }
                    }
                }
            }
        </script>
    @endif
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="flex flex-col min-h-full font-sans text-slate-900 antialiased bg-slate-50">
    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200/60"
        x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}"
                            class="text-2xl font-serif font-bold text-primary-800 tracking-tight flex items-center gap-2">
                            <div class="h-8 w-8 rounded bg-primary-700 flex items-center justify-center text-white">
                                <span class="text-lg font-serif">S</span>
                            </div>
                            Salpat Camp
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-8 sm:flex sm:items-center sm:space-x-8">
                    <a href="{{ route('home') }}"
                        class="text-sm font-medium text-slate-700 hover:text-primary-700 transition">Home</a>
                    <a href="{{ route('rooms.index') }}"
                        class="text-sm font-medium text-slate-700 hover:text-primary-700 transition">Rooms</a>
                    <a href="{{ route('gallery') }}"
                        class="text-sm font-medium text-slate-700 hover:text-primary-700 transition">Gallery</a>
                    <a href="{{ route('about') }}"
                        class="text-sm font-medium text-slate-700 hover:text-primary-700 transition">About</a>
                    <a href="{{ route('contact') }}"
                        class="text-sm font-medium text-slate-700 hover:text-primary-700 transition">Contact</a>

                    @auth
                        <div class="relative ml-4" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false"
                                class="flex items-center gap-2 text-sm font-bold text-slate-700 hover:text-primary-700 transition focus:outline-none">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="2"
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
                                @elseif(Auth::user()->isReceptionist())
                                    <a href="{{ route('receptionist.dashboard') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Reception Dashboard</a>
                                @else
                                    <a href="{{ route('user.dashboard') }}"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">My Dashboard</a>
                                @endif
                                <a href="{{ route('bookings.index') }}"
                                    class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">My Bookings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-50">Sign
                                        out</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center gap-4">
                            <a href="{{ route('login') }}"
                                class="text-sm font-medium text-slate-700 hover:text-primary-700 transition">Log in</a>
                            <a href="{{ route('register') }}"
                                class="rounded-full bg-primary-700 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-800 transition">Sign
                                up</a>
                        </div>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center sm:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                        class="inline-flex items-center justify-center rounded-md p-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500">
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
        <div x-show="mobileMenuOpen" class="sm:hidden bg-white border-b border-slate-200">
            <div class="space-y-1 pb-3 pt-2">
                <a href="{{ route('home') }}"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-slate-600 hover:border-primary-500 hover:bg-slate-50 hover:text-primary-700">Home</a>
                <a href="{{ route('rooms.index') }}"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-slate-600 hover:border-primary-500 hover:bg-slate-50 hover:text-primary-700">Rooms</a>
                <a href="{{ route('gallery') }}"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-slate-600 hover:border-primary-500 hover:bg-slate-50 hover:text-primary-700">Gallery</a>
                <a href="{{ route('about') }}"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-slate-600 hover:border-primary-500 hover:bg-slate-50 hover:text-primary-700">About</a>
                <a href="{{ route('contact') }}"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-slate-600 hover:border-primary-500 hover:bg-slate-50 hover:text-primary-700">Contact
                    Us</a>
            </div>
            <div class="border-t border-slate-200 pb-3 pt-4">
                @auth
                    <div class="flex items-center px-4">
                        <div class="ml-3">
                            <div class="text-base font-medium text-slate-800">{{ Auth::user()->name }}</div>
                            <div class="text-sm font-medium text-slate-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}"
                                class="block px-4 py-2 text-base font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-800">Admin
                                Dashboard</a>
                        @elseif(Auth::user()->isReceptionist())
                            <a href="{{ route('receptionist.dashboard') }}"
                                class="block px-4 py-2 text-base font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-800">Reception
                                Dashboard</a>
                        @else
                            <a href="{{ route('user.dashboard') }}"
                                class="block px-4 py-2 text-base font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-800">My
                                Dashboard</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full px-4 py-2 text-left text-base font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-800">Sign
                                out</button>
                        </form>
                    </div>
                @else
                    <div class="mt-3 space-y-1 px-4">
                        <a href="{{ route('login') }}"
                            class="block w-full text-center rounded-md bg-white px-3 py-2 text-base font-medium text-slate-700 border border-slate-300 hover:bg-slate-50">Log
                            in</a>
                        <a href="{{ route('register') }}"
                            class="block w-full text-center rounded-md bg-primary-600 px-3 py-2 text-base font-medium text-white hover:bg-primary-500">Sign
                            up</a>
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
    <footer class="bg-white border-t border-slate-200 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-1">
                    <span class="text-xl font-serif font-bold text-primary-800">Salpat Camp</span>
                    <p class="mt-4 text-sm text-slate-500 leading-relaxed">Experience nature with comfort. Your perfect
                        getaway destination awaits.</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-slate-900 tracking-wider uppercase">Navigation</h3>
                    <ul role="list" class="mt-4 space-y-3">
                        <li><a href="{{ route('home') }}"
                                class="text-base text-slate-500 hover:text-primary-600 transition">Home</a></li>
                        <li><a href="{{ route('rooms.index') }}"
                                class="text-base text-slate-500 hover:text-primary-600 transition">Rooms</a></li>
                        <li><a href="{{ route('about') }}"
                                class="text-base text-slate-500 hover:text-primary-600 transition">About</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-slate-900 tracking-wider uppercase">Legal</h3>
                    <ul role="list" class="mt-4 space-y-3">
                        <li><a href="#" class="text-base text-slate-500 hover:text-primary-600 transition">Privacy
                                Policy</a></li>
                        <li><a href="#" class="text-base text-slate-500 hover:text-primary-600 transition">Terms of
                                Service</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-slate-900 tracking-wider uppercase">Contact</h3>
                    <ul role="list" class="mt-4 space-y-3">
                        <li><a href="#"
                                class="text-base text-slate-500 hover:text-primary-600 transition">info@salpatcamp.com</a>
                        </li>
                        <li><span class="text-base text-slate-500">+1 (555) 123-4567</span></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-slate-200 pt-8">
                <p class="text-base text-slate-400 text-center">&copy; {{ date('Y') }} Salpat Camp. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>