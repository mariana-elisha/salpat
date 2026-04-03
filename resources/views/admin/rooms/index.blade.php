@extends('layouts.panel')

@section('title', 'Chamber Inventory')
@section('breadcrumbs', 'Rooms / Registry')

@section('content')
<div class="space-y-8">
    {{-- Header Banner --}}
    <div class="relative bg-slate-900 rounded-3xl p-8 overflow-hidden shadow-xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -bottom-16 -right-16 w-64 h-64 bg-primary-500 rounded-full blur-3xl opacity-10"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <p class="text-primary-400 text-[10px] font-bold uppercase tracking-[0.4em] mb-2 text-center md:text-left">Asset Management</p>
                <h1 class="text-3xl font-serif font-bold text-white text-center md:text-left">Chamber Inventory</h1>
                <p class="text-slate-400 mt-2 font-light text-sm text-center md:text-left italic">Precision oversight of Salpat's luxury living spaces.</p>
            </div>
            
            @if(auth()->user()->isAdmin() || auth()->user()->isReceptionist() || auth()->user()->isManager())
                @php
                    $createRoute = auth()->user()->isAdmin() ? route('admin.rooms.create') : 
                                 (auth()->user()->isManager() ? route('manager.rooms.create') : route('receptionist.rooms.create'));
                @endphp
                <a href="{{ $createRoute }}"
                   class="bg-primary-600 hover:bg-primary-500 text-white px-8 py-4 rounded-2xl font-bold uppercase tracking-widest text-xs transition-all shadow-xl shadow-primary-950/20 active:scale-95 flex items-center gap-3">
                    <i class="fas fa-plus-circle text-lg"></i>
                    Initialize New Chamber
                </a>
            @endif
        </div>
    </div>

    {{-- Luxury Table Container --}}
    <div class="bg-slate-900/40 backdrop-blur-xl rounded-[2.5rem] border border-slate-800 shadow-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-800">
                <thead class="bg-slate-900/50">
                    <tr>
                        <th scope="col" class="px-8 py-6 text-left text-[10px] font-black text-slate-500 uppercase tracking-[0.3em]">Visual</th>
                        <th scope="col" class="px-8 py-6 text-left text-[10px] font-black text-slate-500 uppercase tracking-[0.3em]">Chamber Identity</th>
                        <th scope="col" class="px-8 py-6 text-left text-[10px] font-black text-slate-500 uppercase tracking-[0.3em]">Volume</th>
                        <th scope="col" class="px-8 py-6 text-left text-[10px] font-black text-slate-500 uppercase tracking-[0.3em]">Valuation</th>
                        <th scope="col" class="px-8 py-6 text-left text-[10px] font-black text-slate-500 uppercase tracking-[0.3em]">Operational Status</th>
                        <th scope="col" class="px-8 py-6 text-right text-[10px] font-black text-slate-500 uppercase tracking-[0.3em]">Operations</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/50">
                    @forelse($rooms as $room)
                        <tr class="group hover:bg-white/[0.02] transition-colors">
                            <td class="px-8 py-7 whitespace-nowrap">
                                <div class="relative w-16 h-16 rounded-2xl overflow-hidden border-2 border-slate-800 group-hover:border-primary-500/50 transition-colors shadow-lg">
                                    @if($room->image)
                                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                            src="{{ asset('images/' . $room->image) }}" alt="{{ $room->name }}">
                                    @else
                                        <div class="w-full h-full bg-slate-800 flex items-center justify-center text-slate-600">
                                            <i class="fas fa-camera text-xl"></i>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>
                            </td>
                            <td class="px-8 py-7 whitespace-nowrap">
                                <div class="text-base font-bold text-white tracking-tight">{{ $room->name }}</div>
                                <div class="text-[10px] text-primary-400 font-bold uppercase tracking-widest mt-1">{{ $room->type }}</div>
                            </td>
                            <td class="px-8 py-7 whitespace-nowrap">
                                <div class="flex items-center gap-2 text-slate-400">
                                    <i class="fas fa-users text-xs text-slate-600"></i>
                                    <span class="text-sm font-medium">{{ $room->capacity }} Guests</span>
                                </div>
                            </td>
                            <td class="px-8 py-7 whitespace-nowrap">
                                <div class="text-base font-black text-white">${{ number_format($room->price_per_night, 0) }}</div>
                                <div class="text-[9px] text-slate-500 font-bold uppercase tracking-tighter mt-0.5">{{ number_format($room->tzs_price, 0) }} TZS / Night</div>
                            </td>
                            <td class="px-8 py-7 whitespace-nowrap">
                                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-[0.2em] border {{ $room->is_available ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20 shadow-[0_0_15px_rgba(16,185,129,0.1)]' : 'bg-red-500/10 text-red-400 border-red-500/20' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $room->is_available ? 'bg-emerald-400 animate-pulse' : 'bg-red-400' }}"></span>
                                    {{ $room->is_available ? 'In Service' : 'Out of Service' }}
                                </span>
                            </td>
                            <td class="px-8 py-7 whitespace-nowrap text-right">
                                @php
                                    $editRoute = auth()->user()->isAdmin() ? route('admin.rooms.edit', $room) : 
                                               (auth()->user()->isManager() ? route('manager.rooms.edit', $room) : route('receptionist.rooms.edit', $room));
                                    $deleteRoute = auth()->user()->isAdmin() ? route('admin.rooms.destroy', $room) : 
                                                 (auth()->user()->isManager() ? route('manager.rooms.destroy', $room) : route('receptionist.rooms.destroy', $room));
                                @endphp
                                <div class="flex justify-end gap-3 text-sm">
                                    <a href="{{ $editRoute }}" class="p-2.5 rounded-xl bg-primary-500/10 text-primary-400 border border-primary-500/20 hover:bg-primary-500 hover:text-white transition-all transform hover:-translate-y-1" title="Configure Chamber">
                                        <i class="fas fa-cog"></i>
                                    </a>

                                    @if(auth()->user()->isAdmin())
                                        <form action="{{ $deleteRoute }}" method="POST" class="inline-block"
                                            onsubmit="return confirm('Are you sure you want to decommission this chamber?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2.5 rounded-xl bg-red-500/10 text-red-400 border border-red-500/20 hover:bg-red-500 hover:text-white transition-all transform hover:-translate-y-1" title="Decommission">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-8 py-32 text-center">
                                <div class="w-20 h-20 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-700 border border-slate-700">
                                    <i class="fas fa-hotel text-3xl"></i>
                                </div>
                                <h3 class="text-2xl font-serif text-slate-500 italic">Inventory Depleted</h3>
                                <p class="text-[10px] text-slate-600 font-bold uppercase tracking-[0.4em] mt-4">No chambers have been initialized in the registry.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($rooms->hasPages())
            <div class="px-8 py-6 bg-slate-900/60 border-t border-slate-800">
                {{ $rooms->links() }}
            </div>
        @endif
    </div>
</div>
@endsection