@extends('layouts.app')

@section('title', 'Login')

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
                    class="h-12 w-12 rounded-xl bg-[var(--color-primary)] flex items-center justify-center text-white shadow-lg shadow-sky-600/30">
                    <span class="text-2xl font-serif font-bold">S</span>
                </div>
            </div>
            <h2 class="mt-6 text-center text-3xl font-serif font-bold tracking-tight text-slate-900 leading-tight">Welcome
                back</h2>
            <p class="mt-2 text-center text-sm text-slate-600">
                Sign in to manage your bookings and profile
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md relative z-10">
            <div
                class="bg-white py-8 px-4 shadow-xl shadow-slate-200/50 sm:rounded-2xl sm:px-10 border border-slate-100 ring-1 ring-slate-900/5 card">
                @if($errors->any())
                    <div class="rounded-md bg-red-50 p-4 mb-6 border border-red-100">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <p>{{ $errors->first() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="form-label">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                value="{{ old('email') }}" class="form-input">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="form-label">Password</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="form-input">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="h-4 w-4 rounded border-slate-300 text-[var(--color-primary)] focus:ring-[var(--color-primary)]">
                            <label for="remember" class="ml-2 block text-sm text-slate-900">Remember me</label>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-full">Sign in</button>
                    </div>
                </form>

                <div class="mt-6 text-center text-sm text-slate-500">
                    Contact your administrator if you need an account.
                </div>
            </div>
        </div>
    </div>
@endsection