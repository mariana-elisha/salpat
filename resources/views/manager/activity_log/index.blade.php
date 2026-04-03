@extends('layouts.panel')

@section('title', 'Operational Intelligence')
@section('breadcrumbs', 'Audit Rail')

@section('content')
<div class="space-y-8">
    {{-- Header Banner --}}
    <div class="relative bg-slate-900 rounded-3xl p-8 overflow-hidden shadow-xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -top-16 -right-16 w-48 h-48 bg-primary-500 rounded-full blur-3xl opacity-10"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <p class="text-accent-400 text-[10px] font-bold uppercase tracking-[0.4em] mb-2 text-center md:text-left">Audit System</p>
                <h1 class="text-3xl font-serif font-bold text-white text-center md:text-left">Operational Intelligence</h1>
                <p class="text-slate-400 mt-2 font-light text-sm text-center md:text-left italic">Tracing the legacy of every administrative action.</p>
            </div>
            <div class="bg-white/5 border border-white/10 px-6 py-3 rounded-2xl backdrop-blur-md">
                <p class="text-[10px] font-bold text-primary-400 uppercase tracking-widest text-center">Total Entries</p>
                <p class="text-2xl font-black text-white text-center">{{ $logs->total() }}</p>
            </div>
        </div>
    </div>

    {{-- Activity Feed --}}
    <div class="space-y-4">
        @forelse($logs as $log)
            <div class="group bg-slate-900/40 backdrop-blur-xl border border-slate-800 hover:border-primary-500/50 rounded-2xl p-6 transition-all duration-500 shadow-lg flex flex-col md:flex-row gap-6 items-start md:items-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary-600/5 rounded-full -mr-16 -mt-16 blur-2xl group-hover:bg-primary-600/10 transition-all"></div>
                
                {{-- User Badge & Identity --}}
                <div class="flex items-center gap-4 min-w-[200px] shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-br from-slate-700 to-slate-900 border border-slate-700 rounded-xl flex items-center justify-center text-primary-400 font-black shadow-inner group-hover:from-primary-600 group-hover:to-primary-800 group-hover:text-white transition-all transform group-hover:scale-110">
                        {{ strtoupper(substr($log->user?->name ?? '?', 0, 1)) }}
                    </div>
                    <div class="text-left">
                        <p class="text-sm font-bold text-white tracking-tight">{{ $log->user?->name ?? 'System' }}</p>
                        @if($log->user)
                            <p class="text-[9px] font-bold text-slate-500 uppercase tracking-widest mt-0.5">{{ $log->user->role }}</p>
                        @endif
                    </div>
                </div>

                {{-- Action Indicator --}}
                <div class="shrink-0">
                    @php
                        $isDestructive = str_contains(strtolower($log->action), 'delete') || str_contains(strtolower($log->action), 'remov');
                        $isCreative = str_contains(strtolower($log->action), 'create') || str_contains(strtolower($log->action), 'add');
                        $isBlue = str_contains(strtolower($log->action), 'login') || str_contains(strtolower($log->action), 'update');
                        
                        $bgColor = $isDestructive ? 'bg-red-500/10' : ($isCreative ? 'bg-emerald-500/10' : ($isBlue ? 'bg-primary-500/10' : 'bg-slate-500/10'));
                        $textColor = $isDestructive ? 'text-red-400' : ($isCreative ? 'text-emerald-400' : ($isBlue ? 'text-primary-400' : 'text-slate-400'));
                        $borderColor = $isDestructive ? 'border-red-500/20' : ($isCreative ? 'border-emerald-500/20' : ($isBlue ? 'border-primary-500/20' : 'border-slate-500/20'));
                    @endphp
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full {{ $bgColor }} {{ $textColor }} border {{ $borderColor }} text-[10px] font-bold tracking-widest uppercase">
                        <span class="w-1.5 h-1.5 rounded-full {{ $isDestructive ? 'bg-red-500' : ($isCreative ? 'bg-emerald-500' : ($isBlue ? 'bg-primary-500' : 'bg-slate-500')) }}"></span>
                        {{ $log->action }}
                    </span>
                </div>

                {{-- Description --}}
                <div class="flex-grow min-w-0 text-left">
                    <p class="text-sm text-slate-400 font-light leading-relaxed group-hover:text-slate-200 transition-colors">
                        {{ $log->description }}
                    </p>
                </div>

                {{-- Timestamp --}}
                <div class="shrink-0 text-right md:min-w-[140px]">
                    <p class="text-[10px] font-black text-white tracking-widest uppercase opacity-80">{{ $log->created_at->format('H:i:s') }}</p>
                    <p class="text-[9px] font-bold text-slate-600 uppercase tracking-tighter mt-1">{{ $log->created_at->diffForHumans() }}</p>
                    <p class="text-[8px] text-slate-700 font-bold mt-0.5">{{ $log->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        @empty
            <div class="bg-slate-900/30 rounded-[3rem] p-24 text-center border-2 border-dashed border-slate-800">
                <div class="w-20 h-20 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-600 border border-slate-700">
                    <i class="fas fa-database text-3xl"></i>
                </div>
                <h3 class="text-2xl font-serif text-slate-400 italic">Static Chronicle</h3>
                <p class="text-sm text-slate-600 mt-2 font-light tracking-widest uppercase">No activities have been recorded in the current epoch.</p>
            </div>
        @endforelse
    </div>

    {{-- Luxury Pagination --}}
    <div class="mt-12">
        {{ $logs->links() }}
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(59, 130, 246, 0.2); border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(59, 130, 246, 0.4); }
</style>
@endsection