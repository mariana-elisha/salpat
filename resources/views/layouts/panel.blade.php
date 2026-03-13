<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-950">

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
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(51, 65, 85, 0.5);
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(15, 23, 42, 0.1);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(51, 65, 85, 0.5);
            border-radius: 10px;
        }
    </style>
</head>

<body class="h-full font-sans antialiased text-slate-300 bg-slate-950 selection:bg-primary-500/30 selection:text-white" x-data="{ sidebarOpen: false }">

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
        class="fixed inset-y-0 left-0 z-50 w-72 bg-slate-900 border-r border-slate-800 px-6 pb-4 overflow-y-auto lg:hidden">
        <div class="flex h-16 shrink-0 items-center gap-4">
            <img src="{{ asset('images/logo.png') }}?v={{ time() }}" alt="Salpat Camp Logo"
                class="h-12 w-12 bg-white rounded-full p-1 object-contain border-2 border-primary-500/50 shadow-2xl">
            <span class="text-xl font-serif font-black text-white">Salpat Camp</span>
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
        <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-slate-800 bg-slate-900/50 backdrop-blur-2xl px-6 pb-4 custom-scrollbar">
            <div class="flex h-24 shrink-0 items-center px-4 border-b border-white/5 mb-4">
                <a href="{{ route('home') }}" class="flex items-center gap-4 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-primary-500 rounded-full blur-xl opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <img src="{{ asset('images/logo.png') }}?v={{ time() }}" alt="Salpat Camp Logo"
                            class="relative h-14 w-14 bg-white rounded-full p-1 border border-primary-400/30 shadow-2xl transition-transform duration-500 group-hover:rotate-6 group-hover:scale-110">
                    </div>
                    <div>
                        <span class="block text-xl font-serif font-black text-white tracking-tight">Salpat Camp</span>
                        <span class="block text-[9px] font-black text-primary-400 uppercase tracking-[0.4em] leading-none mt-1.5">Elite Haven</span>
                    </div>
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
                            class="group -mx-2 flex gap-x-3 rounded-xl p-3 text-sm font-bold leading-6 text-slate-400 hover:bg-white/5 hover:text-white transition-all ring-1 ring-transparent hover:ring-slate-700">
                            <svg class="h-6 w-6 shrink-0 text-slate-500 group-hover:text-primary-400 transition-colors" fill="none"
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
            class="sticky top-0 z-40 flex h-20 shrink-0 items-center gap-x-4 border-b border-slate-800 bg-slate-950/80 backdrop-blur-md px-4 shadow-2xl sm:gap-x-6 sm:px-6 lg:px-8">
            <button type="button" class="-m-2.5 p-2.5 text-slate-400 hover:text-white transition-colors lg:hidden" @click="sidebarOpen = true">
                <span class="sr-only">Open sidebar</span>
                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <div class="h-6 w-px bg-slate-800 lg:hidden" aria-hidden="true"></div>

            <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                <div class="flex flex-1 items-center">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol role="list" class="flex items-center space-x-2">
                            <li>
                                <div class="flex items-center">
                                    <span class="text-[9px] font-black uppercase tracking-[0.3em] text-primary-500/80">Command Center</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="h-4 w-4 flex-shrink-0 text-slate-700" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.06-1.04l4.25 4.5a.75.75 0 010 1.08l-4.25 4.5a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 text-xs font-black text-white uppercase tracking-widest bg-white/5 px-3 py-1 rounded-lg border border-white/10 shadow-inner">@yield('breadcrumbs')</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="flex items-center gap-x-4 lg:gap-x-6">
                    <!-- Notifications Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button type="button" @click="open = !open" @click.away="open = false"
                            class="relative p-2.5 text-slate-400 hover:text-white hover:bg-white/5 rounded-xl transition-all">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7c0-2.015-1.121-3.791-2.784-4.608L15 4.141c-.244-.127-.514-.232-.8-.313m0 0A5.985 5.985 0 0115 9.75v.7c0 1.258.42 2.418 1.121 3.418m-1.121-3.418c0-1.258-.42-2.418-1.121-3.418m1.121 3.418H10.5m0 0A5.985 5.985 0 009 9.75v.7c0 1.258-.42 2.418-1.121 3.418m1.121-3.418c0-1.258.42-2.418-1.121-3.418m1.121 3.418H10.5M8.25 19.75a2.25 2.25 0 004.5 0" />
                            </svg>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="absolute top-2 right-2 flex h-4 w-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                                    <span
                                        class="relative inline-flex rounded-full h-4 w-4 bg-primary-500 text-[10px] items-center justify-center text-white font-black">{{ auth()->user()->unreadNotifications->count() }}</span>
                                </span>
                            @endif
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-4 w-80 origin-top-right rounded-2xl bg-slate-900 shadow-2xl ring-1 ring-slate-800 border border-slate-800 focus:outline-none overflow-hidden"
                            style="display: none;">
                            <div class="px-5 py-4 border-b border-slate-800 flex justify-between items-center bg-slate-800/50">
                                <h3 class="text-xs font-black text-white uppercase tracking-widest">Alerts</h3>
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
                                        class="px-5 py-4 hover:bg-white/5 transition-all {{ $notification->unread() ? 'bg-primary-500/5 border-l-2 border-primary-500' : '' }}">
                                        <div class="flex items-start gap-4">
                                            <div class="flex-1 min-w-0">
                                                <p
                                                    class="text-[13px] leading-relaxed text-slate-200 {{ $notification->unread() ? 'font-bold' : '' }}">
                                                    {{ $notification->data['message'] ?? 'New notification' }}
                                                </p>
                                                <p class="text-[10px] font-bold text-slate-500 mt-1.5 uppercase tracking-tighter">
                                                    {{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                            @if($notification->unread())
                                                <form action="{{ route('notifications.read', $notification->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="w-2.5 h-2.5 rounded-full bg-primary-500 shadow-[0_0_8px_rgba(59,130,246,0.6)] mt-1.5"
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
                        <button type="button" class="group -m-1.5 flex items-center p-2 rounded-xl hover:bg-white/5 transition-all" id="user-menu-button"
                            @click="open = !open" @click.away="open = false">
                            <span class="sr-only">Open user menu</span>
                            <div
                                class="h-9 w-9 rounded-xl bg-slate-800 flex items-center justify-center text-primary-400 font-black border border-slate-700 shadow-xl group-hover:bg-primary-500 group-hover:text-white transition-all">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <span class="hidden lg:flex lg:items-center">
                                <span class="ml-3 text-sm font-bold leading-6 text-white group-hover:text-primary-400 transition-colors"
                                    aria-hidden="true">{{ auth()->user()->name }}</span>
                                <svg class="ml-1.5 h-5 w-5 text-slate-500 group-hover:text-primary-400 transition-colors" viewBox="0 0 20 20" fill="currentColor"
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
                            class="absolute right-0 z-10 mt-4 w-56 origin-top-right rounded-2xl bg-slate-900 py-2 shadow-2xl ring-1 ring-slate-800 border border-slate-800 focus:outline-none overflow-hidden"
                            role="menu" tabindex="-1">
                            <div class="px-4 py-3 border-b border-slate-800 mb-1 bg-slate-800/30">
                                <p class="text-[9px] text-slate-500 font-bold uppercase tracking-[0.2em]">Authority Level</p>
                                <p class="text-xs font-bold truncate text-white mt-0.5 tracking-tight">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.show') }}"
                                class="flex items-center gap-3 px-4 py-2.5 text-sm leading-6 text-slate-400 hover:bg-white/5 hover:text-primary-400 transition-all font-medium"
                                role="menuitem" tabindex="-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                My Profile
                            </a>
                            <div class="h-px bg-slate-800 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex w-full items-center gap-3 px-4 py-2.5 text-sm leading-6 text-red-400 hover:bg-red-500/10 transition-all font-medium text-left"
                                    role="menuitem" tabindex="-1">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                    Sign Termination
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                @if(session('success'))
                    <div class="mb-8 rounded-2xl bg-emerald-500/10 p-5 border border-emerald-500/20 shadow-[0_0_20px_rgba(16,185,129,0.15)] animate-fade-in">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                                    <svg class="h-6 w-6 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-bold text-emerald-100">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-8 rounded-2xl bg-red-500/10 p-5 border border-red-500/20 shadow-[0_0_20px_rgba(239,68,68,0.15)] animate-fade-in">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-red-500/20 rounded-xl flex items-center justify-center">
                                    <svg class="h-6 w-6 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-bold text-red-100">{{ session('error') }}</p>
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