@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-900 relative overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1496545672479-7f9462694d54?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                alt="Background" class="h-full w-full object-cover opacity-20 blur-[2px]">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-900/80 to-slate-900/40"></div>
        </div>

        <div class="max-w-md w-full space-y-8 relative z-10">
            <div class="text-center">
                <a href="/" class="inline-flex flex-col items-center group">
                    <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center text-white shadow-2xl shadow-primary-500/20 group-hover:scale-110 transition-transform duration-500">
                        <span class="text-3xl font-serif font-bold italic">S</span>
                    </div>
                </a>
                <h2 class="mt-8 text-3xl font-serif font-bold text-white tracking-tight">Recovery Protocol</h2>
                <p class="mt-3 text-slate-400 font-light px-4">Enter your email and we'll send a secure link to restore your sanctuary access.</p>
            </div>

            <div class="bg-white/10 backdrop-blur-xl border border-white/10 p-8 sm:p-10 rounded-[32px] shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary-500 to-transparent opacity-50"></div>
                
                @if (session('status'))
                    <div class="bg-emerald-500/10 border border-emerald-500/20 rounded-2xl p-4 mb-8 flex items-center gap-3">
                        <svg class="h-5 w-5 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-xs font-bold text-emerald-200">{{ session('status') }}</p>
                    </div>
                @endif

                <form action="{{ route('password.email') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="space-y-1.5">
                        <label for="email" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Digital Address</label>
                        <div class="relative">
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-primary-500/50 transition-all font-medium @error('email') border-rose-500/50 @enderror"
                                value="{{ old('email') }}" placeholder="explorer@salpat.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-[10px] font-bold text-rose-400 uppercase tracking-tight ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-500 hover:to-primary-600 text-white font-black py-5 rounded-[20px] shadow-2xl shadow-primary-500/20 transform active:scale-[0.98] transition-all uppercase tracking-[0.2em] text-xs">
                        Dispatch Recovery Link
                    </button>
                </form>

                <div class="mt-10 pt-8 border-t border-white/5 text-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-[10px] font-black text-slate-400 hover:text-white uppercase tracking-[0.2em] transition-colors group">
                        <svg class="h-4 w-4 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Back to Base
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection