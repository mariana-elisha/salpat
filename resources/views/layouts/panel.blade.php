<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Panel') - {{ config('app.name', 'Salpat Camp') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="{{ asset('css/theme.css') }}?v=2" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = { theme: { extend: { colors: { primary: '#ea580c', bahar: '#0ea5e9' } } } }
        </script>
    @endif
</head>
<body class="bg-slate-100">
    <nav class="bg-white shadow-sm border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-orange-600">Salpat Camp</a>
                    <div class="hidden md:flex space-x-4">
                        @auth
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="text-slate-600 hover:text-orange-600 font-medium">Admin</a>
                                <a href="{{ route('admin.bookings') }}" class="text-slate-600 hover:text-orange-600 font-medium">All Bookings</a>
                                <a href="{{ route('rooms.index') }}" class="text-slate-600 hover:text-orange-600 font-medium">Rooms</a>
                            @elseif(auth()->user()->isReceptionist())
                                <a href="{{ route('receptionist.dashboard') }}" class="text-slate-600 hover:text-orange-600 font-medium">Reception</a>
                                <a href="{{ route('receptionist.bookings') }}" class="text-slate-600 hover:text-orange-600 font-medium">Bookings</a>
                                <a href="{{ route('rooms.index') }}" class="text-slate-600 hover:text-orange-600 font-medium">Rooms</a>
                            @else
                                <a href="{{ route('user.dashboard') }}" class="text-slate-600 hover:text-orange-600 font-medium">My Bookings</a>
                                <a href="{{ route('rooms.index') }}" class="text-slate-600 hover:text-orange-600 font-medium">Book a Room</a>
                            @endif
                            <a href="{{ route('about') }}" class="text-slate-600 hover:text-orange-600 font-medium">About</a>
                            <a href="{{ route('contact') }}" class="text-slate-600 hover:text-orange-600 font-medium">Contact</a>
                        @endauth
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-sm text-slate-600">
                            {{ auth()->user()->name }}
                            <span class="ml-1 px-2 py-0.5 rounded text-xs font-medium
                                @if(auth()->user()->isAdmin()) bg-orange-100 text-orange-800
                                @elseif(auth()->user()->isReceptionist()) bg-sky-100 text-sky-800
                                @else bg-gray-100 text-slate-800
                                @endif">
                                {{ ucfirst(auth()->user()->role) }}
                            </span>
                        </span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-slate-500 hover:text-red-600 text-sm font-medium">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <main class="py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t-2 border-slate-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex gap-6 text-sm">
                    <a href="{{ route('about') }}" class="text-slate-600 hover:text-orange-600 transition">About Us</a>
                    <a href="{{ route('contact') }}" class="text-slate-600 hover:text-orange-600 transition">Contact Us</a>
                    <a href="{{ route('rooms.index') }}" class="text-slate-600 hover:text-orange-600 transition">Rooms</a>
                </div>
                <p class="text-slate-500 text-sm">&copy; {{ date('Y') }} Salpat Camp. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
