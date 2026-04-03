@extends('layouts.panel')

@section('title', 'Guest Communications')
@section('breadcrumbs', 'Messages')

@section('content')
<div class="space-y-8">
    {{-- Header Banner --}}
    <div class="relative bg-slate-900 rounded-3xl p-8 overflow-hidden shadow-xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -bottom-16 -right-16 w-64 h-64 bg-accent-500 rounded-full blur-3xl opacity-10"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <p class="text-primary-400 text-[10px] font-bold uppercase tracking-[0.4em] mb-2 text-center md:text-left">Inquiry Hub</p>
                <h1 class="text-3xl font-serif font-bold text-white text-center md:text-left">Guest Communications</h1>
                <p class="text-slate-400 mt-2 font-light text-sm text-center md:text-left italic">Your connection to the world of Salpat seekers.</p>
            </div>
            <div class="bg-white/5 border border-white/10 px-8 py-4 rounded-2xl backdrop-blur-md flex items-center gap-6">
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest text-center">Received</p>
                    <p class="text-2xl font-black text-white text-center">{{ $messages->total() }}</p>
                </div>
                <div class="w-px h-10 bg-white/10"></div>
                <div class="text-emerald-400">
                    <i class="fas fa-envelope-open-text text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Message Grid --}}
    <div class="grid grid-cols-1 gap-6">
        @forelse($messages as $message)
            <div class="group bg-slate-900/40 backdrop-blur-xl border border-slate-800 hover:border-accent-500/50 rounded-3xl overflow-hidden transition-all duration-500 shadow-lg">
                <div class="p-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 bg-gradient-to-br from-accent-400 to-accent-600 rounded-2xl flex items-center justify-center text-white text-xl font-serif font-black shadow-xl shadow-accent-950/20 group-hover:scale-110 transition-transform">
                                {{ strtoupper(substr($message->name, 0, 1)) }}
                            </div>
                            <div class="text-left">
                                <h4 class="text-lg font-bold text-white tracking-tight">{{ $message->name }}</h4>
                                <a href="mailto:{{ $message->email }}" class="text-xs text-primary-400 font-bold hover:text-primary-300 transition-colors">{{ $message->email }}</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">{{ $message->created_at->format('M d, Y') }}</span>
                            <div class="h-1 w-1 rounded-full bg-slate-700"></div>
                            <span class="text-[10px] font-bold text-slate-600 uppercase tracking-widest font-mono">{{ $message->created_at->format('H:i') }}</span>
                        </div>
                    </div>

                    <div class="bg-slate-800/30 rounded-2xl p-6 border border-slate-800/50 mb-6 text-left relative group/content">
                        <div class="absolute -top-3 left-6 px-3 bg-slate-900 text-accent-400 text-[9px] font-bold uppercase tracking-[0.3em] border border-slate-800 rounded">Subject Head</div>
                        <h5 class="text-white font-bold text-base mb-4 tracking-tight">{{ $message->subject }}</h5>
                        <p class="text-slate-400 text-sm leading-relaxed font-light italic">
                            "{{ $message->message }}"
                        </p>
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="mailto:{{ $message->email }}?subject=RE: {{ rawurlencode($message->subject) }}" 
                           class="flex items-center gap-2 px-6 py-2.5 rounded-xl bg-accent-500 hover:bg-accent-600 text-white text-[10px] font-bold uppercase tracking-widest transition-all shadow-lg shadow-accent-950/20 active:scale-95">
                            <i class="fas fa-reply text-xs"></i>
                            Direct Reply
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-slate-900/30 rounded-[4rem] p-32 text-center border-2 border-dashed border-slate-800">
                <div class="w-24 h-24 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-8 text-slate-700 border border-slate-700 shadow-inner">
                    <i class="fas fa-comment-slash text-4xl"></i>
                </div>
                <h3 class="text-3xl font-serif text-slate-500 italic">Ethereal Silence</h3>
                <p class="text-[10px] text-slate-600 mt-4 font-bold tracking-[0.4em] uppercase">No incoming communications waiting in the queue.</p>
            </div>
        @endforelse
    </div>

    {{-- Luxury Pagination --}}
    <div class="mt-12">
        {{ $messages->links() }}
    </div>
</div>
@endsection