<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <title>@yield('title', 'Salpat Camp') - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    <!-- Styles -->
    <link href="{{ asset('css/theme.css') }}?v=2" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: { primary: '#ea580c', primaryHover: '#c2410c', bahar: '#0ea5e9', baharDark: '#0284c7' }
                    }
                }
            }
        </script>
    @endif
</head>
<body class="bg-slate-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md border-b-2 border-orange-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-2xl font-bold bg-gradient-to-r from-orange-600 to-sky-600 bg-clip-text text-transparent">Salpat Camp</a>
                    </div>
                    <div class="hidden sm:ml-8 sm:flex sm:space-x-6">
                        <a href="{{ route('rooms.index') }}" class="text-gray-600 hover:text-orange-600 font-medium transition py-2 border-b-2 border-transparent hover:border-orange-500">Rooms</a>
                        <a href="{{ route('bookings.index') }}" class="text-gray-600 hover:text-sky-600 font-medium transition py-2 border-b-2 border-transparent hover:border-sky-500">Reservations</a>
                        <a href="{{ route('about') }}" class="text-gray-600 hover:text-orange-600 font-medium transition py-2 border-b-2 border-transparent hover:border-orange-500">About</a>
                        <a href="{{ route('contact') }}" class="text-gray-600 hover:text-sky-600 font-medium transition py-2 border-b-2 border-transparent hover:border-sky-500">Contact</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    @auth
                        @php $user = Auth::user(); @endphp
                        <span class="text-gray-700">{{ $user->name }}</span>
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold
                            @if($user->isAdmin()) bg-orange-100 text-orange-800
                            @elseif($user->isReceptionist()) bg-sky-100 text-sky-800
                            @else bg-slate-100 text-slate-700
                            @endif">{{ ucfirst($user->role) }}</span>
                        @if($user->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-orange-600 font-medium">Admin</a>
                        @elseif($user->isReceptionist())
                            <a href="{{ route('receptionist.dashboard') }}" class="text-gray-600 hover:text-sky-600 font-medium">Reception</a>
                        @else
                            <a href="{{ route('user.dashboard') }}" class="text-gray-600 hover:text-orange-600 font-medium">My Bookings</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-red-600 font-medium">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-orange-600 font-medium">Login</a>
                        <a href="{{ route('register') }}" class="bg-orange-500 text-white px-5 py-2 rounded-lg hover:bg-orange-600 font-semibold shadow-sm transition">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-7xl mx-auto mt-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative max-w-7xl mx-auto mt-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Main Content -->
    <main class="py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t-2 border-orange-100 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <a href="{{ route('home') }}" class="text-2xl font-bold bg-gradient-to-r from-orange-600 to-sky-600 bg-clip-text text-transparent">Salpat Camp</a>
                    <p class="mt-3 text-slate-600 text-sm">Salpat Camp — experience comfort and luxury in the heart of nature. Your perfect getaway awaits.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-slate-800 mb-3">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('rooms.index') }}" class="text-slate-600 hover:text-orange-600 transition">Rooms</a></li>
                        <li><a href="{{ route('bookings.index') }}" class="text-slate-600 hover:text-orange-600 transition">Reservations</a></li>
                        <li><a href="{{ route('about') }}" class="text-slate-600 hover:text-orange-600 transition">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-slate-600 hover:text-orange-600 transition">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-slate-800 mb-3">Contact</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li>info@salpatcamp.com</li>
                        <li>+1 (234) 567-890</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-200 mt-8 pt-8 text-center">
                <p class="text-slate-500 text-sm">&copy; {{ date('Y') }} Salpat Camp. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
