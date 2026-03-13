@extends('layouts.app')

@section('title', 'Reset Password')

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
                <div class="inline-flex flex-col items-center">
                    <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center text-white shadow-2xl shadow-primary-500/20">
                        <span class="text-3xl font-serif font-bold italic">S</span>
                    </div>
                </div>
                <h2 class="mt-8 text-3xl font-serif font-bold text-white tracking-tight">Redefine Security</h2>
                <p class="mt-3 text-slate-400 font-light px-4">Initialize your new secret key to regain access to the sanctuary.</p>
            </div>

            <div class="bg-white/10 backdrop-blur-xl border border-white/10 p-8 sm:p-10 rounded-[32px] shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary-500 to-transparent opacity-50"></div>
                
                <form action="{{ route('password.update') }}" method="POST" class="space-y-8">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="space-y-6">
                        <div class="space-y-1.5">
                            <label for="email" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Digital Address</label>
                            <input id="email" name="email" type="email" autocomplete="email" required readonly
                                class="w-full bg-white/5 border border-white/5 rounded-2xl px-5 py-4 text-slate-500 font-medium cursor-not-allowed"
                                value="{{ old('email', $email) }}">
                        </div>

                        <div class="space-y-1.5">
                            <label for="password" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">New Secret Key</label>
                            <input id="password" name="password" type="password" required 
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-primary-500/50 transition-all font-medium @error('password') border-rose-500/50 @enderror"
                                placeholder="Min. 8 characters">
                            @error('password')
                                <p class="mt-2 text-[10px] font-bold text-rose-400 uppercase tracking-tight ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label for="password_confirmation" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Confirm Secret Key</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required 
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-primary-500/50 transition-all font-medium"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-500 hover:to-primary-600 text-white font-black py-5 rounded-[20px] shadow-2xl shadow-primary-500/20 transform active:scale-[0.98] transition-all uppercase tracking-[0.2em] text-xs">
                        Authorize New Security Key
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection