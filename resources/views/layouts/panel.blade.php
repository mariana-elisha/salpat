<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Salpat Camp') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

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
    <style>
        [x-cloak] {
            display: none !important;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }
    </style>
</head>

<body class="h-full font-sans antialiased text-slate-800 bg-slate-50/50" x-data="{ sidebarOpen: false }">

    <!-- Mobile sidebar backdrop -->
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-900/80 z-40 lg:hidden" aria-hidden="true"
        @click="sidebarOpen = false"></div>

    <!-- Mobile sidebar -->
    <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 z-50 w-72 bg-primary-900 px-6 pb-4 overflow-y-auto lg:hidden">
        <div class="flex h-16 shrink-0 items-center gap-4">
            <img src="{{ asset('images/logo.png') }}" alt="Salpat Camp Logo"
                class="h-14 w-14 rounded-full object-cover border-2 border-primary-700 shadow-lg">
            <span class="text-xl font-serif font-bold text-white">Salpat Camp</span>
        </div>
        <nav class="flex flex-1 flex-col mt-4">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        @include('layouts.partials.sidebar-nav')
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Desktop sidebar -->
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
        <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-primary-800 bg-primary-900 px-6 pb-4">
            <div class="flex h-16 shrink-0 items-center mt-4">
                <a href="{{ route('home') }}" class="flex items-center gap-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Salpat Camp Logo"
                        class="h-14 w-14 rounded-full object-cover border-2 border-primary-700 shadow-lg">
                    <span class="text-xl font-serif font-bold text-white">Salpat Camp</span>
                </a>
            </div>
            <nav class="flex flex-1 flex-col">
                <ul role="list" class="flex flex-1 flex-col gap-y-7">
                    <li>
                        <ul role="list" class="-mx-2 space-y-2">
                            @include('layouts.partials.sidebar-nav')
                        </ul>
                    </li>
                    <li class="mt-auto">
                        <a href="{{ route('home') }}"
                            class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-primary-200 hover:bg-primary-800 hover:text-white transition-colors">
                            <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            Back to Home
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="lg:pl-72">
        <div
            class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-primary-500 bg-primary-600 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
            <button type="button" class="-m-2.5 p-2.5 text-white lg:hidden" @click="sidebarOpen = true">
                <span class="sr-only">Open sidebar</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <div class="h-6 w-px bg-primary-400 lg:hidden" aria-hidden="true"></div>

            <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                <div class="flex flex-1 items-center">
                    <h2 class="text-sm font-medium text-primary-100">
                        @yield('breadcrumbs')
                    </h2>
                </div>

                <div class="flex items-center gap-x-4 lg:gap-x-6">
                    <!-- Notifications Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button type="button" @click="open = !open" @click.away="open = false"
                            class="-m-2.5 p-2.5 text-primary-200 hover:text-white relative transition-colors">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7c0-2.015-1.121-3.791-2.784-4.608L15 4.141c-.244-.127-.514-.232-.8-.313m0 0A5.985 5.985 0 0115 9.75v.7c0 1.258.42 2.418 1.121 3.418m-1.121-3.418c0-1.258-.42-2.418-1.121-3.418m1.121 3.418H10.5m0 0A5.985 5.985 0 009 9.75v.7c0 1.258-.42 2.418-1.121 3.418m1.121-3.418c0-1.258.42-2.418-1.121-3.418m1.121 3.418H10.5M8.25 19.75a2.25 2.25 0 004.5 0" />
                            </svg>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="absolute top-2 right-2 flex h-4 w-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-accent-400 opacity-75"></span>
                                    <span
                                        class="relative inline-flex rounded-full h-4 w-4 bg-accent-500 text-[10px] items-center justify-center text-white font-bold">{{ auth()->user()->unreadNotifications->count() }}</span>
                                </span>
                            @endif
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2.5 w-80 origin-top-right rounded-xl bg-white py-2 shadow-2xl ring-1 ring-slate-900/5 focus:outline-none"
                            style="display: none;">
                            <div class="px-4 py-3 border-b border-slate-100 flex justify-between items-center">
                                <h3 class="text-sm font-bold text-slate-900">Notifications</h3>
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <form action="{{ route('notifications.mark-all-read') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="text-[10px] font-bold text-primary-600 hover:text-primary-700 uppercase tracking-wider">Mark
                                            all read</button>
                                    </form>
                                @endif
                            </div>
                            <div class="max-h-96 overflow-y-auto">
                                @forelse(auth()->user()->notifications->take(10) as $notification)
                                    <div
                                        class="px-4 py-3 hover:bg-slate-50 transition-colors {{ $notification->unread() ? 'bg-primary-50/30' : '' }}">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-1 min-w-0">
                                                <p
                                                    class="text-sm text-slate-900 {{ $notification->unread() ? 'font-bold' : '' }}">
                                                    {{ $notification->data['message'] ?? 'New notification' }}
                                                </p>
                                                <p class="text-xs text-slate-500 mt-1">
                                                    {{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                            @if($notification->unread())
                                                <form action="{{ route('notifications.read', $notification->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="w-2 h-2 rounded-full bg-primary-500 mt-1.5"
                                                        title="Mark as read"></button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div class="px-4 py-8 text-center">
                                        <p class="text-sm text-slate-400 italic">No notifications yet.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="relative" x-data="{ open: false }">
                        <button type="button" class="-m-1.5 flex items-center p-1.5" id="user-menu-button"
                            @click="open = !open" @click.away="open = false">
                            <span class="sr-only">Open user menu</span>
                            <div
                                class="h-8 w-8 rounded-full bg-white flex items-center justify-center text-primary-600 font-semibold border border-primary-200 shadow-sm">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <span class="hidden lg:flex lg:items-center">
                                <span class="ml-4 text-sm font-bold leading-6 text-white"
                                    aria-hidden="true">{{ auth()->user()->name }}</span>
                                <svg class="ml-2 h-5 w-5 text-primary-200" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2.5 w-48 origin-top-right rounded-lg bg-white py-2 shadow-xl ring-1 ring-slate-900/5 focus:outline-none"
                            role="menu" tabindex="-1">
                            <div class="px-3 py-2 border-b border-slate-100 mb-1">
                                <p class="text-xs text-slate-500 font-medium uppercase tracking-wider">Signed in as</p>
                                <p class="text-sm font-semibold truncate text-slate-900">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.show') }}"
                                class="block px-3 py-1.5 text-sm leading-6 text-slate-700 hover:bg-slate-50 hover:text-primary-700 text-left transition-colors"
                                role="menuitem" tabindex="-1">My Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-3 py-1.5 text-sm leading-6 text-slate-700 hover:bg-slate-50 hover:text-primary-700 text-left transition-colors"
                                    role="menuitem" tabindex="-1">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                @if(session('success'))
                    <div class="mb-6 rounded-lg bg-emerald-50 p-4 border border-emerald-100 shadow-sm">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 rounded-lg bg-red-50 p-4 border border-red-100 shadow-sm">
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
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>