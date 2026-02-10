@auth
    @if(auth()->user()->isAdmin())
        <li>
            class="{{ request()->routeIs('rooms.*') ? 'bg-slate-50 text-primary-600' : 'text-slate-700 hover:text-primary-600 hover:bg-slate-50' }}
            group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
            <svg class="{{ request()->routeIs('rooms.*') ? 'text-primary-600' : 'text-slate-400 group-hover:text-primary-600' }} h-6 w-6 shrink-0"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Book a Room
            </a>
        </li>
    @endif
@endauth