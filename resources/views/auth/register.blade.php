@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-900 relative overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                alt="Background" class="h-full w-full object-cover opacity-20 blur-[2px]">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-900/80 to-slate-900/40"></div>
        </div>

        <div class="max-w-3xl w-full space-y-8 relative z-10">
            <div class="text-center">
                <a href="/" class="inline-flex flex-col items-center group">
                    <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center text-white shadow-2xl shadow-primary-500/20 group-hover:scale-110 transition-transform duration-500">
                        <span class="text-3xl font-serif font-bold italic">S</span>
                    </div>
                    <span class="mt-4 text-xs font-black text-primary-400 uppercase tracking-[0.4em] group-hover:text-primary-300 transition-colors">Salpat Camp</span>
                </a>
                <h2 class="mt-8 text-4xl font-serif font-bold text-white tracking-tight">Join the Sanctuary</h2>
                <p class="mt-3 text-slate-400 font-light">Create your account to start your luxury adventure</p>
            </div>

            <div class="bg-white/10 backdrop-blur-xl border border-white/10 p-8 sm:p-12 rounded-[32px] shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary-500 to-transparent opacity-50"></div>
                
                @if($errors->any())
                    <div class="bg-rose-500/10 border border-rose-500/20 rounded-2xl p-4 mb-10">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-rose-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div>
                                <h3 class="text-sm font-bold text-rose-200">Registration encountered issues:</h3>
                                <ul class="mt-1 text-xs text-rose-300/80 list-disc list-inside space-y-0.5">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form class="space-y-12" action="{{ route('register') }}" method="POST">
                    @csrf

                    {{-- Section: Identity --}}
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="h-8 w-8 rounded-full bg-primary-500/20 flex items-center justify-center text-primary-400 text-xs font-black">01</div>
                            <h3 class="text-sm font-black text-white uppercase tracking-widest">Personal Identity</h3>
                            <div class="h-px flex-1 bg-white/10"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2 space-y-1.5">
                                <label for="name" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Full Name</label>
                                <input id="name" name="name" type="text" required value="{{ old('name') }}" 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-primary-500/50 transition-all font-medium"
                                    placeholder="John Doe">
                            </div>

                            <div class="space-y-1.5">
                                <label for="id_number" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">ID / Passport</label>
                                <input id="id_number" name="id_number" type="text" value="{{ old('id_number') }}" 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-primary-500/50 transition-all"
                                    placeholder="A1234567">
                            </div>

                            <div class="space-y-1.5">
                                <label for="nationality" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Home Country</label>
                                <input id="nationality" name="nationality" type="text" value="{{ old('nationality') }}" 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-primary-500/50 transition-all"
                                    placeholder="Tanzanian">
                            </div>

                            <div class="space-y-1.5">
                                <label for="age" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Age</label>
                                <input id="age" name="age" type="number" value="{{ old('age') }}" 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-primary-500/50 transition-all"
                                    placeholder="25">
                            </div>

                            <div class="space-y-1.5">
                                <label for="gender" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Gender</label>
                                <select id="gender" name="gender" class="w-full bg-slate-800 border border-white/10 rounded-2xl px-5 py-4 text-white focus:outline-none focus:ring-2 focus:ring-primary-500/50 transition-all appearance-none cursor-pointer">
                                    <option value="" class="bg-slate-900">Select...</option>
                                    <option value="male" class="bg-slate-900" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" class="bg-slate-900" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" class="bg-slate-900" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Section: Connectivity --}}
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="h-8 w-8 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-400 text-xs font-black">02</div>
                            <h3 class="text-sm font-black text-white uppercase tracking-widest">Connectivity</h3>
                            <div class="h-px flex-1 bg-white/10"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label for="email" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Digital Address</label>
                                <input id="email" name="email" type="email" required value="{{ old('email') }}" 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 transition-all"
                                    placeholder="explorer@salpat.com">
                            </div>

                            <div class="space-y-1.5">
                                <label for="phone" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Phone Line</label>
                                <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 transition-all"
                                    placeholder="+255 770 307 759">
                            </div>

                            <div class="md:col-span-2 space-y-1.5">
                                <label for="address" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Base Location</label>
                                <textarea id="address" name="address" rows="2" 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 transition-all resize-none"
                                    placeholder="Wailes Street, Soweto Moshi...">{{ old('address') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Section: Security --}}
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="h-8 w-8 rounded-full bg-rose-500/20 flex items-center justify-center text-rose-400 text-xs font-black">03</div>
                            <h3 class="text-sm font-black text-white uppercase tracking-widest">Security Gate</h3>
                            <div class="h-px flex-1 bg-white/10"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label for="password" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Secret Key</label>
                                <input id="password" name="password" type="password" required 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-rose-500/50 transition-all"
                                    placeholder="••••••••">
                            </div>

                            <div class="space-y-1.5">
                                <label for="password_confirmation" class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Verify Key</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" required 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-rose-500/50 transition-all"
                                    placeholder="••••••••">
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-500 hover:to-primary-600 text-white font-black py-5 rounded-[20px] shadow-2xl shadow-primary-500/20 transform active:scale-[0.98] transition-all uppercase tracking-[0.2em] text-sm">
                            Initialize Membership
                        </button>
                    </div>
                </form>
            </div>

            <div class="text-center pb-12">
                <p class="text-slate-500 text-xs font-medium decoration-primary-400/30">Already have a base? <a href="{{ route('login') }}" class="text-primary-400 font-black border-b border-primary-400/20 hover:border-primary-400 transition-all ml-1">Sign In Here</a></p>
            </div>
        </div>
    </div>
@endsection