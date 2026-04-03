@extends('layouts.panel')

@section('title', 'Sanctuary Profile')
@section('breadcrumbs', 'Identity / Profile')

@section('content')
<div class="max-w-5xl mx-auto space-y-12">
    {{-- Elite Identity Header --}}
    <div class="relative bg-slate-900 rounded-[3rem] p-10 md:p-16 overflow-hidden shadow-2xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary-500 rounded-full blur-[100px] opacity-10"></div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-accent-500 rounded-full blur-[100px] opacity-10"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center gap-10">
            <div class="relative group">
                <div class="w-32 h-32 rounded-3xl bg-gradient-to-br from-primary-400 to-primary-700 p-1 shadow-2xl transition-all duration-700 group-hover:rotate-12 group-hover:scale-110">
                    <div class="w-full h-full rounded-[1.4rem] bg-slate-900 flex items-center justify-center text-white text-5xl font-serif font-black">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
                <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-emerald-500 border-4 border-slate-900 rounded-full shadow-lg flex items-center justify-center text-white text-[10px]">
                    <i class="fas fa-check"></i>
                </div>
            </div>
            
            <div class="text-center md:text-left space-y-4">
                <div class="flex flex-wrap justify-center md:justify-start items-center gap-4">
                    <h1 class="text-4xl md:text-5xl font-serif font-bold text-white tracking-tight">{{ auth()->user()->name }}</h1>
                    <span class="px-4 py-1.5 rounded-full bg-primary-500/10 text-primary-400 border border-primary-500/20 text-[10px] font-bold uppercase tracking-[0.3em]">
                        {{ auth()->user()->role }} Status
                    </span>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-6 text-slate-400 text-sm font-light">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-envelope text-primary-500/50"></i>
                        <span>{{ auth()->user()->email }}</span>
                    </div>
                    <div class="hidden md:block w-1.5 h-1.5 rounded-full bg-slate-700"></div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-primary-500/50"></i>
                        <span>Resident since {{ auth()->user()->created_at->format('M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12" x-data="{ tab: 'personal' }">
        {{-- Elite Navigation --}}
        <div class="lg:col-span-1 space-y-4">
            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.4em] mb-6 pl-4">Account Ledger</p>
            <nav class="space-y-3">
                <button @click="tab = 'personal'" 
                        :class="tab === 'personal' ? 'bg-primary-600 text-white shadow-xl shadow-primary-900/20 border-primary-500' : 'text-slate-400 hover:bg-white/5 border-transparent'"
                        class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all text-left border text-sm group">
                    <i class="fas fa-id-card text-base group-hover:scale-110 transition-transform" :class="tab === 'personal' ? 'text-white' : 'text-slate-600'"></i>
                    Persona details
                </button>
                <button @click="tab = 'security'" 
                        :class="tab === 'security' ? 'bg-primary-600 text-white shadow-xl shadow-primary-900/20 border-primary-500' : 'text-slate-400 hover:bg-white/5 border-transparent'"
                        class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all text-left border text-sm group">
                    <i class="fas fa-shield-alt text-base group-hover:scale-110 transition-transform" :class="tab === 'security' ? 'text-white' : 'text-slate-600'"></i>
                    Secure Protocols
                </button>
            </nav>
        </div>

        {{-- Content Area --}}
        <div class="lg:col-span-3">
            @if ($errors->any())
                <div class="mb-10 animate-slide-up">
                    <div class="rounded-3xl bg-red-500/5 p-6 border border-red-500/20 backdrop-blur-md">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-red-500 rounded-2xl flex items-center justify-center text-white shrink-0">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-black text-red-500 uppercase tracking-widest mb-3">Validation Protocols Failed</h3>
                                <ul class="list-none space-y-2">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-xs text-red-400/80 font-medium flex items-center gap-2">
                                            <span class="w-1 h-1 rounded-full bg-red-500"></span>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Personal Details Form --}}
            <div x-show="tab === 'personal'" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0"
                 class="bg-slate-900/40 backdrop-blur-xl rounded-[3rem] p-10 md:p-16 border border-slate-800 shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary-600/5 rounded-full -mr-32 -mt-32 blur-3xl"></div>
                
                <h2 class="text-3xl font-serif font-bold text-white mb-10 flex items-center gap-5">
                    <span class="w-1.5 h-10 bg-primary-500 rounded-full shadow-[0_0_20px_rgba(59,130,246,0.5)]"></span>
                    Personal Ledger
                </h2>

                <form action="{{ route('profile.update') }}" method="POST" class="space-y-10 relative z-10">
                    @csrf
                    @method('PATCH')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="block text-[8px] font-bold text-slate-500 uppercase tracking-[0.4em] ml-4">Full Legal Name</label>
                            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                                   class="w-full bg-slate-800/50 border border-slate-700 text-white px-6 py-4 rounded-2xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all outline-none font-medium" required>
                        </div>
                        <div class="space-y-3">
                            <label class="block text-[8px] font-bold text-slate-500 uppercase tracking-[0.4em] ml-4">Digital Identity (Email)</label>
                            <input type="email" value="{{ auth()->user()->email }}"
                                   class="w-full bg-slate-900/50 border border-slate-800 text-slate-500 px-6 py-4 rounded-2xl cursor-not-allowed font-medium italic" readonly disabled>
                        </div>
                        <div class="space-y-3">
                            <label class="block text-[8px] font-bold text-slate-500 uppercase tracking-[0.4em] ml-4">Secure Line (Phone)</label>
                            <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                                   class="w-full bg-slate-800/50 border border-slate-700 text-white px-6 py-4 rounded-2xl focus:ring-2 focus:ring-primary-500 transition-all outline-none font-medium">
                        </div>
                        <div class="space-y-3">
                            <label class="block text-[8px] font-bold text-slate-500 uppercase tracking-[0.4em] ml-4">ID / Passport Registry</label>
                            <input type="text" name="id_number" value="{{ old('id_number', auth()->user()->id_number) }}"
                                   class="w-full bg-slate-800/50 border border-slate-700 text-white px-6 py-4 rounded-2xl focus:ring-2 focus:ring-primary-500 transition-all outline-none font-medium">
                        </div>
                        <div class="md:col-span-2 space-y-3">
                            <label class="block text-[8px] font-bold text-slate-500 uppercase tracking-[0.4em] ml-4">Current Residence</label>
                            <textarea name="address" rows="3"
                                      class="w-full bg-slate-800/50 border border-slate-700 text-white px-6 py-4 rounded-2xl focus:ring-2 focus:ring-primary-500 transition-all outline-none font-medium resize-none">{{ old('address', auth()->user()->address) }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end pt-8 border-t border-slate-800">
                        <button type="submit" class="bg-primary-600 hover:bg-primary-500 text-white px-12 py-5 rounded-2xl font-bold uppercase tracking-widest text-xs transition-all shadow-xl shadow-primary-950/20 active:scale-95">
                            Update Registry
                        </button>
                    </div>
                </form>
            </div>

            {{-- Security / Password Form --}}
            <div x-show="tab === 'security'" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0"
                 class="bg-slate-900/40 backdrop-blur-xl rounded-[3rem] p-10 md:p-16 border border-slate-800 shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-accent-600/5 rounded-full -mr-32 -mt-32 blur-3xl"></div>
                
                <h2 class="text-3xl font-serif font-bold text-white mb-10 flex items-center gap-5">
                    <span class="w-1.5 h-10 bg-accent-500 rounded-full shadow-[0_0_20px_rgba(232,153,104,0.5)]"></span>
                    Security Protocols
                </h2>

                <form action="{{ route('profile.password') }}" method="POST" class="space-y-10 relative z-10">
                    @csrf
                    @method('PATCH')
                    
                    <div class="space-y-8">
                        <div class="space-y-3">
                            <label class="block text-[8px] font-bold text-slate-500 uppercase tracking-[0.4em] ml-4">Current Authorization</label>
                            <input type="password" name="current_password"
                                   class="w-full bg-slate-800/50 border border-slate-700 text-white px-6 py-4 rounded-2xl focus:ring-2 focus:ring-accent-500 transition-all outline-none font-medium" required>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="block text-[8px] font-bold text-slate-500 uppercase tracking-[0.4em] ml-4">New Credential</label>
                                <input type="password" name="password"
                                       class="w-full bg-slate-800/50 border border-slate-700 text-white px-6 py-4 rounded-2xl focus:ring-2 focus:ring-accent-500 transition-all outline-none font-medium" required>
                            </div>
                            <div class="space-y-3">
                                <label class="block text-[8px] font-bold text-slate-500 uppercase tracking-[0.4em] ml-4">Confirm Credential</label>
                                <input type="password" name="password_confirmation"
                                       class="w-full bg-slate-800/50 border border-slate-700 text-white px-6 py-4 rounded-2xl focus:ring-2 focus:ring-accent-500 transition-all outline-none font-medium" required>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end pt-8 border-t border-slate-800">
                        <button type="submit" class="bg-accent-600 hover:bg-accent-500 text-white px-12 py-5 rounded-2xl font-bold uppercase tracking-widest text-xs transition-all shadow-xl shadow-accent-950/20 active:scale-95">
                            Rotate Keys
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes slide-up {
        0%   { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-slide-up { animation: slide-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>
@endsection