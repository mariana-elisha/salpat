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
                                50: '#e8f4fb',
                                100: '#d1e9f7',
                                200: '#a3d3ef',
                                300: '#75bde7',
                                400: '#47a7df',
                                500: '#0B7BBF',
                                600: '#0a6ca9',
                                700: '#095f99',
                                800: '#075280',
                                900: '#064566',
                                950: '#04384d',
                            },
                            accent: {
                                50: '#fdf5ee',
                                100: '#fbebd8',
                                200: '#f7d7b1',
                                300: '#f3c38a',
                                400: '#efaf63',
                                500: '#E89968',
                                600: '#d67f4f',
                                700: '#c46536',
                                800: '#a35329',
                                900: '#82421c',
                                950: '#61310f',
                            }
                        }
                    }
                }
            }
        </script>
        <style type="text/tailwindcss">
            :root {
                                                    --color-primary: #0B7BBF;
                                                    --color-primary-hover: #095f99;
                                                    --color-accent: #E89968;
                                                    --color-accent-hover: #d67f4f;
                                                    --color-surface: #ffffff;
                                                    --color-surface-hover: #e8f4fb;
                                                }
                                                        @layer components {
                                                            .btn {
                                                                @apply inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl transition-all duration-300 transform active:scale-95 focus:outline-none focus:ring-2 focus:ring-offset-2;
                                                            }
                                                            .btn-primary {
                                                                @apply bg-[var(--color-primary)] text-white hover:bg-[var(--color-primary-hover)] shadow-lg hover:shadow-xl hover:-translate-y-0.5 focus:ring-sky-500;
                                                            }
                                                            .btn-secondary {
                                                                @apply bg-white text-[var(--color-primary)] border-gray-200 hover:bg-sky-50 shadow-sm hover:shadow-md focus:ring-sky-500;
                                                            }
                                                            .btn-accent {
                                                                @apply bg-[var(--color-accent)] text-white hover:bg-[var(--color-accent-hover)] shadow-lg hover:shadow-xl hover:-translate-y-0.5 focus:ring-yellow-500;
                                                            }
                                                            .card {
                                                                @apply bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden transition-all duration-300 hover:shadow-xl;
                                                            }
                                                            .card-hover {
                                                                @apply hover:-translate-y-1;
                                                            }
                                                            .form-input {
                                                                @apply block w-full rounded-lg border-slate-300 shadow-sm focus:border-[var(--color-primary)] focus:ring-[var(--color-primary)] sm:text-sm py-3 px-4;
                                                            }
                                                            .form-label {
                                                                @apply block text-sm font-semibold text-slate-700 mb-2;
                                                            }
                                                            /* Animation Utilities */
                                                            .fade-in {
                                                                animation: fadeIn 0.5s ease-out forwards;
                                                            }
                                                            .slide-up {
                                                                animation: slideUp 0.6s ease-out forwards;
                                                            }
                                                        }
                                                        @keyframes fadeIn {
                                                            from { opacity: 0; }
                                                            to { opacity: 1; }
                                                        }
                                                        @keyframes slideUp {
                                                            from { opacity: 0; transform: translateY(20px); }
                                                            to { opacity: 1; transform: translateY(0); }
                                                        }
                                                    </style>
    @endif
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
                            <img src="{{ asset('images/logo.png') }}" alt="Salpat Camp Logo"
                                class="h-16 w-16 rounded-full object-cover border-2 border-white shadow-lg">
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
                    <a href="{{ route('contact') }}"
                        class="text-sm font-medium text-primary-100 hover:text-white hover:bg-primary-500 rounded-lg px-3 py-2 transition">Contact</a>

                    @auth
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
                        @elseif(Auth::user()->isReceptionist())
                            <a href="{{ route('receptionist.dashboard') }}"
                                class="block px-4 py-2 text-base font-medium text-primary-100 hover:bg-primary-800 hover:text-white">Reception
                                Dashboard</a>
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
    <footer class="bg-primary-900 border-t border-primary-800 mt-auto text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-1">
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="Salpat Camp Logo"
                            class="h-16 w-16 rounded-full object-cover border-2 border-primary-700 shadow-lg">
                        <span class="text-lg font-serif font-bold text-white">Salpat Camp</span>
                    </div>
                    <p class="text-sm text-primary-200 leading-relaxed">Experience nature with comfort. Your
                        perfect
                        getaway destination awaits.</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-accent-400 tracking-wider uppercase">Navigation</h3>
                    <ul role="list" class="mt-4 space-y-3">
                        <li><a href="{{ route('home') }}"
                                class="text-base text-primary-100 hover:text-white transition">Home</a></li>
                        <li><a href="{{ route('rooms.index') }}"
                                class="text-base text-primary-100 hover:text-white transition">Rooms</a></li>
                        <li><a href="{{ route('about') }}"
                                class="text-base text-primary-100 hover:text-white transition">About</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-accent-400 tracking-wider uppercase">Legal</h3>
                    <ul role="list" class="mt-4 space-y-3">
                        <li><a href="#" class="text-base text-primary-100 hover:text-white transition">Privacy
                                Policy</a></li>
                        <li><a href="#" class="text-base text-primary-100 hover:text-white transition">Terms of
                                Service</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-accent-400 tracking-wider uppercase">Contact</h3>
                    <ul role="list" class="mt-4 space-y-3">
                        <li><a href="mailto:salpatcamp@yahoo.com"
                                class="text-base text-primary-100 hover:text-white transition">salpatcamp@yahoo.com</a>
                        </li>
                        <li><a href="tel:+255770307759"
                                class="text-base text-primary-100 hover:text-white transition">+255 0770 307 759</a>
                        </li>
                        <li><span class="text-base text-primary-100">Falcon Street 1, Soweto Moshi,<br>Kilimanjaro,
                                Tanzania</span></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-primary-800 pt-8">
                <p class="text-base text-primary-400 text-center">&copy; {{ date('Y') }} Salpat Camp. All rights
                    reserved.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>