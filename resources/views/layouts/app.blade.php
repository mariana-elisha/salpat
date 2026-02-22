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
                                                {{ $notification->data['message'] ?? 'New notification' }}</p>
                                            <p class="text-[10px] text-slate-400 mt-1">
                                                {{ $notification->created_at->diffForHumans() }}</p>
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