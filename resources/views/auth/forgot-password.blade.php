@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-navy relative overflow-hidden">
        {{-- Luxury Shining Background Elements --}}
        <div class="absolute inset-0 z-0 bg-navy overflow-hidden">
            <div class="absolute -top-[20%] -left-[10%] w-[700px] h-[700px] rounded-full bg-gold/10 blur-[120px] mix-blend-screen animate-pulse pointer-events-none"></div>
            <div class="absolute top-[20%] -right-[10%] w-[600px] h-[600px] rounded-full bg-white/5 blur-[120px] mix-blend-screen animate-pulse pointer-events-none" style="animation-delay: 1.5s;"></div>
            <div class="absolute -bottom-[20%] left-[20%] w-[800px] h-[800px] rounded-full bg-gold/5 blur-[150px] mix-blend-screen animate-pulse pointer-events-none" style="animation-delay: 3s;"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-navy/40 via-navy/90 to-navy"></div>
        </div>

        <div class="max-w-md w-full space-y-8 relative z-10">
            <div class="text-center">
                <a href="/" class="inline-flex flex-col items-center group">
                    <div class="h-16 w-16 rounded-2xl bg-gold flex items-center justify-center text-white shadow-2xl shadow-gold/20 group-hover:scale-110 transition-transform duration-500">
                        <span class="text-3xl font-serif font-bold italic">S</span>
                    </div>
                    <span class="mt-4 text-[10px] font-black text-gold uppercase tracking-[0.4em] group-hover:text-white transition-colors">Salpat Luxury</span>
                </a>
                <h2 class="mt-8 text-4xl font-serif font-bold text-white tracking-tight">Recovery Protocol</h2>
                <p class="mt-3 text-slate-400 font-light italic px-4">Enter your digital address to restore sanctuary access.</p>
            </div>

            <div class="bg-white/5 backdrop-blur-3xl border border-white/10 p-8 sm:p-12 rounded-[2rem] shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-gold/50 to-transparent"></div>
                
                @if (session('status'))
                    <div class="bg-emerald-500/10 border border-emerald-500/20 rounded-2xl p-4 mb-8 flex items-center gap-3">
                        <svg class="h-5 w-5 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-[10px] font-bold text-emerald-200 uppercase tracking-widest">{{ session('status') }}</p>
                    </div>
                @endif

                <form action="{{ route('password.email') }}" method="POST" class="space-y-10">
                    @csrf
                    <div class="space-y-3">
                        <label for="email" class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] ml-1">Digital Address</label>
                        <div class="relative">
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                class="w-full bg-navy/50 border border-white/10 rounded-xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:border-gold transition-all font-medium @error('email') border-rose-500/50 @enderror"
                                value="{{ old('email') }}" placeholder="Email Address">
                        </div>
                        @error('email')
                            <p class="mt-2 text-[10px] font-bold text-rose-400 uppercase tracking-tight ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-gold hover:bg-gold/90 text-white font-bold py-6 rounded-xl shadow-2xl shadow-gold/10 transform active:scale-[0.98] transition-all uppercase tracking-[0.2em] text-[10px]">
                        Dispatch Recovery Link
                    </button>
                </form>

                <div class="mt-12 pt-10 border-t border-white/5 text-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-3 text-[10px] font-bold text-slate-500 hover:text-gold uppercase tracking-[0.3em] transition-colors group">
                        <svg class="h-4 w-4 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Back to Workspace
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection