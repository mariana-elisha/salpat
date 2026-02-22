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
        <li>
            <a href="{{ route('admin.users.index') }}"
                class="{{ request()->routeIs('admin.users.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="{{ request()->routeIs('admin.users.*') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-3.833-6.248 3.007 3.007 0 01-5.659 0 4.125 4.125 0 00-3.833 6.248 9.337 9.337 0 004.121.952 9.38 9.38 0 002.625-.372" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12a3 3 0 100-6 3 3 0 000 6z" />
                </svg>
                Manage Staff
            </a>
        </li>
        <li>
            <a href="{{ route('admin.galleries.index') }}"
                class="{{ request()->routeIs('admin.galleries.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="{{ request()->routeIs('admin.galleries.*') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                Gallery
            </a>
        </li>
        <li>
            <a href="{{ route('admin.reports.index') }}"
                class="{{ request()->routeIs('admin.reports.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                Booking Reports
            </a>
        </li>
        <li>
            <a href="{{ route('staff_reports.index') }}"
                class="{{ request()->routeIs('staff_reports.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                </svg>
                Section Reports
            </a>
        </li>
        <li>
            <a href="{{ route('manager.activity_log.index') }}"
                class="{{ request()->routeIs('manager.activity_log.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                System Activity
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
        <li>
            <a href="{{ route('receptionist.reports.index') }}"
                class="{{ request()->routeIs('receptionist.reports.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                Booking Reports
            </a>
        </li>
        <li>
            <a href="{{ route('staff_reports.index') }}"
                class="{{ request()->routeIs('staff_reports.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                </svg>
                Section Reports
            </a>
        </li>
    @elseif(auth()->user()->isChef())
        <li>
            <a href="{{ route('chef.dashboard') }}"
                class="{{ request()->routeIs('chef.dashboard') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="w-6 h-6 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                Food Orders
            </a>
        </li>
        <li>
            <a href="{{ route('staff_reports.index') }}"
                class="{{ request()->routeIs('staff_reports.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                </svg>
                My Reports
            </a>
        </li>
    @elseif(auth()->user()->isBarKeeper())
        <li>
            <a href="{{ route('barkeeper.dashboard') }}"
                class="{{ request()->routeIs('barkeeper.dashboard') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="w-6 h-6 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.75 3.104v1.244c0 .462.223.9.605 1.17l.367.264a4.25 4.25 0 004.56 0l.366-.264a1.946 1.946 0 01.605-1.17V3.104m-6.505 0c0-.509.432-.934.95-.894 1.79.138 3.513.138 5.302 0 .518-.04.95.385.95.894M9.75 3.104a0.75 0.75 0 01.75-.75h4.5a.75.75 0 01.75.75m-6.75 0c0-.509.432-.934.95-.894 1.79.138 3.513.138 5.302 0 .518-.04.95.385.95.894M15 21a3 3 0 11-6 0m6 0a3 3 0 10-6 0m6 0h-6" />
                </svg>
                Drink Orders
            </a>
        </li>
        <li>
            <a href="{{ route('staff_reports.index') }}"
                class="{{ request()->routeIs('staff_reports.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                </svg>
                My Reports
            </a>
        </li>
    @elseif(auth()->user()->isHousekeeping())
        <li>
            <a href="{{ route('housekeeping.dashboard') }}"
                class="{{ request()->routeIs('housekeeping.dashboard') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="w-6 h-6 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.42 15.17L17.25 21A2.673 2.673 0 0113.917 21a2.673 2.673 0 01-3.333 0c-1.111 0-2 0-2 0a2.673 2.673 0 01-3.333 0 2.673 2.673 0 013.333 0h.667M12 21V12m0 0a3 3 0 100-6 3 3 0 000 6z" />
                </svg>
                Housekeeping
            </a>
        </li>
        <li>
            <a href="{{ route('staff_reports.index') }}"
                class="{{ request()->routeIs('staff_reports.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                </svg>
                My Reports
            </a>
        </li>
    @elseif(auth()->user()->isManager())
        <li>
            <a href="{{ route('manager.dashboard') }}"
                class="{{ request()->routeIs('manager.dashboard') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="w-6 h-6 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('manager.reports.index') }}"
                class="{{ request()->routeIs('manager.reports.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                Booking Reports
            </a>
        </li>
        <li>
            <a href="{{ route('staff_reports.index') }}"
                class="{{ request()->routeIs('staff_reports.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                </svg>
                Section Reports
            </a>
        </li>
        <li>
            <a href="{{ route('manager.activity_log.index') }}"
                class="{{ request()->routeIs('manager.activity_log.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                System Activity
            </a>
        </li>
        <li>
            <a href="{{ route('manager.galleries.index') }}"
                class="{{ request()->routeIs('manager.galleries.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="{{ request()->routeIs('manager.galleries.*') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                Gallery
            </a>
        </li>
        <li>
            <a href="{{ route('manager.contact_messages.index') }}"
                class="{{ request()->routeIs('*.contact_messages.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L4.32 8.909A2.25 2.25 0 013.25 6.993V6.75" />
                </svg>
                Contact Messages
            </a>
        </li>
        <li>
            <a href="{{ route('notifications.index') }}"
                class="{{ request()->routeIs('notifications.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 shrink-0 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7c0-2.015-1.121-3.791-2.784-4.608L15 4.141c-.244-.127-.514-.232-.8-.313m0 0A5.985 5.985 0 0115 9.75v.7c0 1.258.42 2.418 1.121 3.418m-1.121-3.418c0-1.258-.42-2.418-1.121-3.418m1.121 3.418H10.5m0 0A5.985 5.985 0 009 9.75v.7c0 1.258-.42 2.418-1.121 3.418m1.121-3.418c0-1.258.42-2.418-1.121-3.418m1.121 3.418H10.5M8.25 19.75a2.25 2.25 0 004.5 0" />
                </svg>
                All Notifications
            </a>
        </li>
    @elseif(auth()->user()->role === 'user')
        <li>
            <a href="{{ route('user.dashboard') }}"
                class="{{ request()->routeIs('user.dashboard') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                My Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('user.services.book') }}"
                class="{{ request()->routeIs('user.services.*') ? 'bg-primary-800 text-white' : 'text-primary-100 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
                <svg class="h-6 w-6 text-primary-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Book Services
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

    <li class="mt-4 border-t border-primary-800 pt-4">
        <a href="{{ route('profile.show') }}"
            class="{{ request()->routeIs('profile.show') ? 'bg-primary-800 text-white' : 'text-primary-200 hover:text-white hover:bg-primary-800' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors">
            <svg class="{{ request()->routeIs('profile.show') ? 'text-white' : 'text-primary-400 group-hover:text-white' }} h-6 w-6 shrink-0 transition-colors"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.963-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            My Profile
        </a>
    </li>
@endauth