@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="min-h-[80vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-slate-50 relative overflow-hidden">
        <!-- Background Decoration -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1496545672479-7f9462694d54?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                alt="Background" class="h-full w-full object-cover opacity-10 blur-sm">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-50 via-slate-50/80 to-transparent"></div>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-md relative z-10">
            <div class="flex justify-center">
                <div
                    class="h-12 w-12 rounded-xl bg-primary-600 flex items-center justify-center text-white shadow-lg shadow-primary-600/30">
                    <span class="text-2xl font-serif font-bold">S</span>
                </div>
            </div>
            <h2 class="mt-6 text-center text-3xl font-serif font-bold tracking-tight text-slate-900 leading-tight">
                Forgot your password?
            </h2>
            <p class="mt-2 text-center text-sm text-slate-600 px-4">
                No problem. Just enter the email address associated with your account and we'll send you a link to reset
                your password.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md relative z-10 px-4 sm:px-0">
            <div
                class="bg-white py-8 px-4 shadow-xl shadow-slate-200/50 sm:rounded-2xl sm:px-10 border border-slate-100 ring-1 ring-slate-900/5 card">
                @if (session('status'))
                    <div
                        class="mb-6 font-medium text-sm text-emerald-600 bg-emerald-50 p-4 rounded-xl border border-emerald-100 flex items-center gap-3">
                        <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">
                            Email address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 font-bold" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full pl-11 rounded-xl border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm py-3 px-4 @error('email') border-red-500 @enderror transition"
                                value="{{ old('email') }}" placeholder="you@example.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-xl bg-primary-600 py-3.5 px-4 text-sm font-bold text-white shadow-lg shadow-primary-600/20 hover:bg-primary-700 transition transform active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                            Email Password Reset Link
                        </button>
                    </div>
                </form>

                <div
                    class="mt-8 text-center bg-slate-50 -mx-4 -mb-8 sm:-mx-10 sm:-mb-8 py-6 rounded-b-2xl border-t border-slate-100">
                    <a href="{{ route('login') }}"
                        class="text-sm font-bold text-primary-600 hover:text-primary-500 flex items-center justify-center gap-2 group transition">
                        <svg class="h-4 w-4 transform group-hover:-translate-x-1 transition" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Back to login
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection