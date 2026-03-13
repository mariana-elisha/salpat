@extends('layouts.app')

@section('title', 'Login')

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
                    <span class="mt-4 text-xs font-black text-primary-400 uppercase tracking-[0.4em] group-hover:text-primary-300 transition-colors">Salpat Camp</span>
                </a>
                <h2 class="mt-8 text-4xl font-serif font-bold text-white tracking-tight">Welcome Back</h2>
                <p class="mt-3 text-slate-400 font-light">Enter your credentials to access your portal</p>
            </div>

            <div class="bg-white/10 backdrop-blur-xl border border-white/10 p-8 sm:p-10 rounded-3xl shadow-2xl relative overflow-hidden group">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary-500 to-transparent opacity-50"></div>
                
                @if($errors->any())
                    <div class="bg-rose-500/10 border border-rose-500/20 rounded-2xl p-4 mb-8 flex items-start gap-3 animate-shake">
                        <svg class="w-5 h-5 text-rose-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-sm font-bold text-rose-200">{{ $errors->first() }}</p>
                    </div>
                @endif

                @if (session('status') || session('success'))
                    <div class="bg-emerald-500/10 border border-emerald-500/20 rounded-2xl p-4 mb-8 flex items-start gap-3">
                        <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-sm font-bold text-emerald-200">{{ session('status') ?? session('success') }}</p>
                    </div>
                @endif

                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="space-y-1.5">
                        <label for="email" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email Journey</label>
                        <input id="email" name="email" type="email" autocomplete="off" required value="{{ old('email') }}" 
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all"
                            placeholder="explorer@salpat.com">
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex justify-between items-center px-1">
                            <label for="password" class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Secret Key</label>
                            <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-primary-400 hover:text-primary-300 uppercase tracking-tighter transition-colors">Forgot?</a>
                        </div>
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all"
                            placeholder="••••••••">
                    </div>

                    <div class="flex items-center px-1">
                        <label class="relative flex items-center cursor-pointer group/check">
                            <input type="checkbox" name="remember" class="peer sr-only">
                            <div class="w-5 h-5 bg-white/5 border border-white/10 rounded-lg transition-all peer-checked:bg-primary-600 peer-checked:border-primary-600 flex items-center justify-center group-hover/check:border-white/30">
                                <svg class="w-3 h-3 text-white scale-0 peer-checked:scale-100 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="ml-3 text-xs font-bold text-slate-400 group-hover/check:text-slate-300 transition-colors">Keep me signed in</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-black py-4 rounded-2xl shadow-2xl shadow-primary-600/20 transform active:scale-[0.98] transition-all uppercase tracking-widest text-xs">
                        Enter Workspace
                    </button>
                </form>
            </div>

            <div class="text-center">
                <p class="text-slate-500 text-xs font-medium uppercase tracking-[0.2em] opacity-50">Contact your administrator for access</p>
            </div>
        </div>
    </div>
@endsection