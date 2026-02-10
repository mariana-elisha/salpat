@auth
    @if(auth()->user()->isAdmin())
        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="{{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.rooms.index') }}"
                class="{{ request()->routeIs('*.rooms.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="{{ request()->routeIs('*.rooms.*') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                </svg>
                Rooms
            </a>
        </li>
        <li>
            <a href="{{ route('bookings.index') }}"
                class="{{ request()->routeIs('bookings.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="{{ request()->routeIs('bookings.*') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                Bookings
            </a>
        </li>
    @elseif(auth()->user()->isReceptionist())
        <li>
            <a href="{{ route('receptionist.dashboard') }}"
                class="{{ request()->routeIs('receptionist.dashboard') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="{{ request()->routeIs('receptionist.dashboard') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('bookings.index') }}"
                class="{{ request()->routeIs('bookings.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="{{ request()->routeIs('bookings.*') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                Bookings
            </a>
        </li>
        <li>
            <a href="{{ route('receptionist.rooms.index') }}"
                class="{{ request()->routeIs('*.rooms.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="{{ request()->routeIs('*.rooms.*') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                </svg>
                Manage Rooms
            </a>
        </li>
    @elseif(auth()->user()->role === 'user')
        <li>
            <a href="{{ route('user.dashboard') }}"
                class="{{ request()->routeIs('user.dashboard') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="{{ request()->routeIs('user.dashboard') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                My Bookings
            </a>
        </li>
        <li>
            <a href="{{ route('rooms.index') }}"
                class="{{ request()->routeIs('rooms.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="{{ request()->routeIs('rooms.*') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                Browse Rooms
            </a>
        </li>
    @endif
@endauth