<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                                50: '#f0f9ff',
                                100: '#e0f2fe',
                                200: '#bae6fd',
                                300: '#7dd3fc',
                                400: '#38bdf8',
                                500: '#0ea5e9',
                                600: '#0284c7',
                                700: '#0369a1',
                                800: '#075985',
                                900: '#0c4a6e',
                                950: '#082f49',
                            },
                            accent: {
                                50: '#fefce8',
                                100: '#fef9c3',
                                200: '#fef08a',
                                300: '#fde047',
                                400: '#facc15',
                                500: '#eab308',
                                600: '#ca8a04',
                                700: '#a16207',
                                800: '#854d0e',
                                900: '#713f12',
                                950: '#422006',
                            }
                        }
                    }
                }
            }
        </script>
        <style type="text/tailwindcss">
            :root {
                    --color-primary: #3b82f6;
                    --color-primary-hover: #2563eb;
                    --color-accent: #f97316;
                    --color-accent-hover: #ea580c;
                    --color-surface: #ffffff;
                    --color-surface-hover: #eff6ff;
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
        <div class="flex h-16 shrink-0 items-center">
            <span class="text-2xl font-serif font-bold text-white">Salpat Camp</span>
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
                <a href="{{ route('home') }}" class="text-2xl font-serif font-bold text-white flex items-center gap-2">
                    <div class="h-8 w-8 rounded bg-white flex items-center justify-center text-primary-900">
                        <span class="text-lg font-serif">S</span>
                    </div>
                    Salpat Camp
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