@extends('layouts.app')

@section('title', 'Login - Salpat Camp Lodge-Moshi')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-20 px-4 sm:px-6 lg:px-8 bg-black relative overflow-hidden">
        {{-- Luxury Cinematic Background --}}
        <div class="absolute inset-0 z-0 overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-[3s] scale-105 animate-slow-zoom" 
                style="background-image: url('{{ asset('images/pcs16.png') }}'); opacity: 0.4;"></div>
            
            <!-- Dark Luxury Gradient -->
            <div class="absolute inset-0 bg-gradient-to-tr from-navy via-navy/90 to-navy/40 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-navy/60 via-transparent to-navy/80"></div>

            <!-- Glowing Accents -->
            <div class="absolute -top-[20%] -left-[10%] w-[800px] h-[800px] rounded-full bg-gold/15 blur-[150px] mix-blend-screen animate-pulse pointer-events-none"></div>
            <div class="absolute top-[30%] -right-[15%] w-[700px] h-[700px] rounded-full bg-white/5 blur-[150px] mix-blend-screen animate-pulse pointer-events-none" style="animation-delay: 2s;"></div>
            <div class="absolute -bottom-[20%] left-[15%] w-[900px] h-[900px] rounded-full bg-gold/10 blur-[200px] mix-blend-screen animate-pulse pointer-events-none" style="animation-delay: 4s;"></div>
            
            <!-- Architectural Lines -->
            <div class="absolute inset-0 opacity-[0.05] pointer-events-none">
                <div class="absolute top-0 left-1/4 w-px h-full bg-white"></div>
                <div class="absolute top-0 left-2/4 w-px h-full bg-white"></div>
                <div class="absolute top-0 left-3/4 w-px h-full bg-white"></div>
                <div class="absolute top-1/2 left-0 w-full h-px bg-white"></div>
            </div>
        </div>

        <div class="max-w-xl w-full space-y-12 relative z-10 animate-slide-up">
            <!-- Luxury Branding Header -->
            <div class="text-center">
                <a href="/" class="inline-flex flex-col items-center group">
                    <div class="h-24 w-24 rounded-3xl bg-white p-1.5 shadow-[0_30px_90px_rgba(240,138,75,0.25)] transition-all duration-1000 transform group-hover:rotate-[360deg] group-hover:scale-110">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div class="mt-8 space-y-2">
                        <span class="text-3xl md:text-4xl font-serif font-bold text-white tracking-widest uppercase block">Salpat <span class="text-gold italic font-normal">Lodge</span></span>
                        <span class="text-[10px] font-black text-gold/60 uppercase tracking-[0.5em] block">Camp Lodge-Moshi</span>
                    </div>
                </a>
            </div>

            <!-- Login Card -->
            <div class="bg-white/[0.03] backdrop-blur-3xl border border-white/10 p-12 md:p-20 rounded-[4rem] shadow-4xl relative overflow-hidden group">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-48 h-1 bg-gradient-to-r from-transparent via-gold to-transparent opacity-60"></div>
                
                <div class="mb-14 text-center">
                    <h2 class="text-4xl font-serif font-bold text-white mb-4 tracking-tight">Welcome Back</h2>
                    <p class="text-slate-400 font-light italic tracking-widest text-sm">Please authenticate to continue your journey.</p>
                </div>

                @if($errors->any())
                    <div class="bg-rose-500/10 border-l-4 border-rose-500 rounded-r-2xl p-6 mb-12 flex items-center gap-4 animate-shake">
                        <div class="w-10 h-10 bg-rose-500/20 rounded-xl flex items-center justify-center text-rose-500">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <p class="text-[10px] font-bold text-rose-200 uppercase tracking-widest">{{ $errors->first() }}</p>
                    </div>
                @endif

                <form class="space-y-12" action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Identity -->
                    <div class="space-y-4">
                        <label for="email" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em] ml-2">Email Address</label>
                        <div class="relative group">
                            <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-gold transition-colors">
                                <i class="fas fa-envelope text-lg"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}" 
                                class="w-full bg-navy/40 border-2 border-white/5 rounded-2xl pl-16 pr-8 py-6 text-xl font-serif text-white placeholder-slate-600 focus:outline-none focus:border-gold/30 focus:bg-navy/60 transition-all shadow-inner"
                                placeholder="name@salpat.com">
                        </div>
                    </div>

                    <!-- Credential -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center px-2">
                            <label for="password" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em]">Password</label>
                            <a href="{{ route('password.request') }}" class="text-[9px] font-bold text-slate-500 hover:text-gold uppercase tracking-widest transition-colors">Forgot Password?</a>
                        </div>
                        <div class="relative group">
                            <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-gold transition-colors">
                                <i class="fas fa-key text-lg"></i>
                            </div>
                            <input id="password" name="password" type="password" required autocomplete="current-password"
                                class="w-full bg-navy/40 border-2 border-white/5 rounded-2xl pl-16 pr-8 py-6 text-xl font-serif text-white placeholder-slate-600 focus:outline-none focus:border-gold/30 focus:bg-navy/60 transition-all shadow-inner"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Options -->
                    <div class="flex items-center justify-between px-2">
                        <label class="relative flex items-center cursor-pointer group/check">
                            <input type="checkbox" name="remember" class="peer sr-only">
                            <div class="w-6 h-6 border-2 border-white/10 rounded-lg transition-all peer-checked:bg-gold peer-checked:border-gold flex items-center justify-center shadow-lg">
                                <svg class="w-4 h-4 text-white scale-0 peer-checked:scale-100 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="ml-4 text-[10px] uppercase font-bold text-slate-400 group-hover/check:text-slate-200 transition-colors tracking-widest">Remember Me</span>
                        </label>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="group relative w-full flex justify-center py-7 px-4 border border-transparent rounded-[2rem] text-sm font-bold text-white bg-gold hover:bg-gold/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold transition-all shadow-[0_25px_60px_rgba(240,138,75,0.4)] hover:-translate-y-1 active:scale-[0.98] uppercase tracking-[0.4em]">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-8">
                            <i class="fas fa-lock text-white/50 group-hover:text-white transition-colors"></i>
                        </span>
                        Login Now
                    </button>
                </form>


            </div>

            <div class="text-center pt-8">
                <a href="{{ route('home') }}" class="text-slate-500 hover:text-gold text-[10px] font-bold uppercase tracking-[0.4em] transition-all flex items-center justify-center gap-3 italic">
                    <i class="fas fa-arrow-left text-[8px]"></i>
                    Return to Grand Lobby
                </a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    @keyframes slide-up {
        0%   { opacity: 0; transform: translateY(60px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
    @keyframes slow-zoom {
        0%   { transform: scale(1); }
        100% { transform: scale(1.1); }
    }
    .animate-slide-up { animation: slide-up 1.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .animate-shake { animation: shake 0.4s ease-in-out; }
    .animate-slow-zoom { animation: slow-zoom 20s linear infinite alternate; }
</style>
@endpush