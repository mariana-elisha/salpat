@extends('layouts.app')

@section('title', 'Register - Salpat Camp Lodge-Moshi')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-20 px-4 sm:px-6 lg:px-8 bg-navy relative overflow-hidden">
        {{-- Luxury Shining Background Elements --}}
        <div class="absolute inset-0 z-0 bg-navy overflow-hidden">
            <div class="absolute -top-[20%] -left-[10%] w-[900px] h-[900px] rounded-full bg-gold/15 blur-[150px] mix-blend-screen animate-pulse pointer-events-none"></div>
            <div class="absolute top-[30%] -right-[15%] w-[800px] h-[800px] rounded-full bg-white/5 blur-[150px] mix-blend-screen animate-pulse pointer-events-none" style="animation-delay: 2s;"></div>
            <div class="absolute -bottom-[20%] left-[15%] w-[1000px] h-[1000px] rounded-full bg-gold/10 blur-[200px] mix-blend-screen animate-pulse pointer-events-none" style="animation-delay: 4s;"></div>
            
            <!-- Architectural Lines -->
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none">
                <div class="absolute top-0 left-1/4 w-px h-full bg-white"></div>
                <div class="absolute top-0 left-2/4 w-px h-full bg-white"></div>
                <div class="absolute top-0 left-3/4 w-px h-full bg-white"></div>
                <div class="absolute top-1/2 left-0 w-full h-px bg-white"></div>
            </div>
            
            <div class="absolute inset-0 bg-gradient-to-b from-navy/40 via-navy/95 to-navy"></div>
        </div>

        <div class="max-w-5xl w-full space-y-16 relative z-10 animate-slide-up">
            <!-- Luxury Branding Header -->
            <div class="text-center">
                <a href="/" class="inline-flex flex-col items-center group">
                    <div class="h-20 w-20 rounded-2xl bg-white p-1.5 shadow-[0_30px_90px_rgba(240,138,75,0.25)] transition-all duration-1000 transform group-hover:rotate-[360deg]">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div class="mt-8 space-y-2">
                        <span class="text-2xl md:text-3xl font-serif font-bold text-white tracking-widest uppercase block">Salpat <span class="text-gold italic font-normal">Lodge</span></span>
                        <span class="text-[8px] font-black text-gold/60 uppercase tracking-[0.5em] block">Camp Lodge-Moshi</span>
                    </div>
                </a>
            </div>

            <!-- Registration Card -->
            <div class="bg-white/[0.03] backdrop-blur-3xl border border-white/10 p-12 md:p-20 rounded-[4rem] shadow-4xl relative overflow-hidden group">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-64 h-1 bg-gradient-to-r from-transparent via-gold to-transparent opacity-60"></div>
                
                <div class="mb-20 text-center">
                    <h2 class="text-4xl md:text-5xl font-serif font-bold text-white mb-4 tracking-tight">Establish Residency</h2>
                    <p class="text-slate-400 font-light italic tracking-widest text-sm italic">"Join the circle of elite guests at the foothills of Kilimanjaro."</p>
                </div>

                @if($errors->any())
                    <div class="bg-rose-500/10 border-l-4 border-rose-500 rounded-r-3xl p-8 mb-16 animate-shake">
                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 bg-rose-500/20 rounded-2xl flex items-center justify-center text-rose-500 shrink-0">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div>
                                <h3 class="text-[10px] font-bold text-rose-200 uppercase tracking-[0.4em] mb-3">Validation Requirements</h3>
                                <ul class="text-[11px] text-rose-300/70 space-y-2 uppercase tracking-widest font-bold">
                                    @foreach($errors->all() as $error)
                                        <li class="flex items-center gap-2"><span class="w-1 h-1 bg-rose-500 rounded-full"></span>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form class="space-y-20" action="{{ route('register') }}" method="POST">
                    @csrf

                    <!-- Step 1: Identity -->
                    <div class="space-y-12">
                        <div class="flex items-center gap-8">
                            <div class="h-14 w-14 rounded-2xl bg-gold/10 border border-gold/20 flex items-center justify-center text-gold text-xl font-serif font-bold italic">01</div>
                            <h3 class="text-xs font-bold text-white uppercase tracking-[0.5em]">Identity Profile</h3>
                            <div class="h-px flex-1 bg-white/5"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div class="md:col-span-2 space-y-4">
                                <label for="name" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em] ml-2">Legal Patron Name</label>
                                <div class="relative group">
                                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-gold transition-colors">
                                        <i class="fas fa-user-tie text-lg"></i>
                                    </div>
                                    <input id="name" name="name" type="text" required value="{{ old('name') }}" 
                                        class="w-full bg-navy/40 border-2 border-white/5 rounded-2xl pl-16 pr-8 py-6 text-xl font-serif text-white placeholder-slate-600 focus:outline-none focus:border-gold/30 focus:bg-navy/60 transition-all shadow-inner"
                                        placeholder="Name as it appears on Passport / ID">
                                </div>
                            </div>

                            <div class="space-y-4">
                                <label for="id_number" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em] ml-2">Credential No.</label>
                                <input id="id_number" name="id_number" type="text" value="{{ old('id_number') }}" 
                                    class="w-full bg-navy/40 border-2 border-white/5 rounded-2xl px-8 py-5 text-lg font-serif text-white placeholder-slate-600 focus:outline-none focus:border-gold/30 focus:bg-navy/60 transition-all shadow-inner"
                                    placeholder="ID / Passport">
                            </div>

                            <div class="space-y-4">
                                <label for="nationality" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em] ml-2">Citizenship</label>
                                <input id="nationality" name="nationality" type="text" value="{{ old('nationality') }}" 
                                    class="w-full bg-navy/40 border-2 border-white/5 rounded-2xl px-8 py-5 text-lg font-serif text-white placeholder-slate-600 focus:outline-none focus:border-gold/30 focus:bg-navy/60 transition-all shadow-inner"
                                    placeholder="Country of Residence">
                            </div>

                            <div class="space-y-4">
                                <label for="age" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em] ml-2">Age</label>
                                <input id="age" name="age" type="number" value="{{ old('age') }}" 
                                    class="w-full bg-navy/40 border-2 border-white/5 rounded-2xl px-8 py-5 text-lg font-serif text-white placeholder-slate-600 focus:outline-none focus:border-gold/30 focus:bg-navy/60 transition-all shadow-inner"
                                    placeholder="Years">
                            </div>

                            <div class="space-y-4">
                                <label for="gender" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em] ml-2">Identity</label>
                                <div class="relative">
                                    <select id="gender" name="gender" class="w-full bg-navy/40 border-2 border-white/5 rounded-2xl px-8 py-5 text-lg font-serif text-white focus:outline-none focus:border-gold/30 transition-all appearance-none cursor-pointer">
                                        <option value="" class="bg-navy text-slate-500">Select Gender</option>
                                        <option value="male" class="bg-navy" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" class="bg-navy" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" class="bg-navy" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <div class="absolute right-6 top-1/2 -translate-y-1/2 text-gold pointer-events-none">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Communication -->
                    <div class="space-y-12">
                        <div class="flex items-center gap-8">
                            <div class="h-14 w-14 rounded-2xl bg-gold/10 border border-gold/20 flex items-center justify-center text-gold text-xl font-serif font-bold italic">02</div>
                            <h3 class="text-xs font-bold text-white uppercase tracking-[0.5em]">Global Connectivity</h3>
                            <div class="h-px flex-1 bg-white/5"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div class="space-y-4">
                                <label for="email" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em] ml-2">Digital Endpoint</label>
                                <div class="relative group">
                                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-gold transition-colors">
                                        <i class="fas fa-envelope text-lg"></i>
                                    </div>
                                    <input id="email" name="email" type="email" required value="{{ old('email') }}" 
                                        class="w-full bg-navy/40 border-2 border-white/5 rounded-2xl pl-16 pr-8 py-5 text-lg font-serif text-white placeholder-slate-600 focus:outline-none focus:border-gold/30 focus:bg-navy/60 transition-all shadow-inner"
                                        placeholder="patron@salpat.com">
                                </div>
                            </div>

                            <div class="space-y-4">
                                <label for="phone" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em] ml-2">Voice Line</label>
                                <div class="relative group">
                                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-gold transition-colors">
                                        <i class="fas fa-phone-alt text-lg"></i>
                                    </div>
                                    <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" 
                                        class="w-full bg-navy/40 border-2 border-white/5 rounded-2xl pl-16 pr-8 py-5 text-lg font-serif text-white placeholder-slate-600 focus:outline-none focus:border-gold/30 focus:bg-navy/60 transition-all shadow-inner"
                                        placeholder="+255 ...">
                                </div>
                            </div>

                            <div class="md:col-span-2 space-y-4">
                                <label for="address" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em] ml-2">Base of Operations</label>
                                <textarea id="address" name="address" rows="2" 
                                    class="w-full bg-navy/40 border-2 border-white/5 rounded-[2rem] px-8 py-6 text-lg font-serif text-white placeholder-slate-600 focus:outline-none focus:border-gold/30 transition-all resize-none shadow-inner"
                                    placeholder="Residential Address / Headquarters...">{{ old('address') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Security -->
                    <div class="space-y-12">
                        <div class="flex items-center gap-8">
                            <div class="h-14 w-14 rounded-2xl bg-gold/10 border border-gold/20 flex items-center justify-center text-gold text-xl font-serif font-bold italic">03</div>
                            <h3 class="text-xs font-bold text-white uppercase tracking-[0.5em]">Sanctuary Access Key</h3>
                            <div class="h-px flex-1 bg-white/5"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div class="space-y-4">
                                <label for="password" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em] ml-2">Secret Entrance Key</label>
                                <div class="relative group">
                                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-gold transition-colors">
                                        <i class="fas fa-lock text-lg"></i>
                                    </div>
                                    <input id="password" name="password" type="password" required 
                                        class="w-full bg-navy/40 border-2 border-white/5 rounded-2xl pl-16 pr-8 py-5 text-lg font-serif text-white placeholder-slate-600 focus:outline-none focus:border-gold/30 focus:bg-navy/60 transition-all shadow-inner"
                                        placeholder="••••••••">
                                </div>
                            </div>

                            <div class="space-y-4">
                                <label for="password_confirmation" class="text-[10px] font-bold text-gold/60 uppercase tracking-[0.4em] ml-2">Verify Secret Key</label>
                                <div class="relative group">
                                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-gold transition-colors">
                                        <i class="fas fa-shield-alt text-lg"></i>
                                    </div>
                                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                                        class="w-full bg-navy/40 border-2 border-white/5 rounded-2xl pl-16 pr-8 py-5 text-lg font-serif text-white placeholder-slate-600 focus:outline-none focus:border-gold/30 focus:bg-navy/60 transition-all shadow-inner"
                                        placeholder="••••••••">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-12">
                        <button type="submit" class="group relative w-full flex justify-center py-8 rounded-[2.5rem] bg-gold hover:bg-gold-dark text-white font-bold uppercase tracking-[0.6em] text-[10px] transition-all shadow-[0_30px_90px_rgba(240,138,75,0.4)] hover:-translate-y-2 active:scale-[0.98]">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-10 opacity-40 group-hover:opacity-100 transition-opacity">
                                <i class="fas fa-file-signature text-xl"></i>
                            </span>
                            Authenticate Membership
                        </button>
                    </div>
                </form>

                <div class="mt-20 text-center border-t border-white/5 pt-12">
                    <p class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.3em]">Already recognized by the Sanctuary?</p>
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-4 text-gold hover:text-white font-bold mt-6 transition-all group">
                        <span class="text-[11px] uppercase tracking-[0.5em]">Sign In To Residence</span>
                        <i class="fas fa-arrow-right text-xs group-hover:translate-x-2 transition-transform"></i>
                    </a>
                </div>
            </div>

            <div class="text-center pb-24 italic opacity-40">
                <a href="{{ route('home') }}" class="text-slate-500 hover:text-gold text-[10px] font-bold uppercase tracking-[0.4em] transition-all flex items-center justify-center gap-3">
                    <i class="fas fa-long-arrow-alt-left"></i>
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
    .animate-slide-up { animation: slide-up 1.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .animate-shake { animation: shake 0.4s ease-in-out; }
</style>
@endpush