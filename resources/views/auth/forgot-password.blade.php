@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="min-h-[60vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-slate-50">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-serif font-bold tracking-tight text-slate-900">
                Forgot your password?
            </h2>
            <p class="mt-2 text-center text-sm text-slate-600">
                No problem. Just let us know your email address and we will email you a password reset link.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-xl border border-slate-200 rounded-2xl sm:px-10">
                @if (session('status'))
                    <div
                        class="mb-4 font-medium text-sm text-emerald-600 bg-emerald-50 p-3 rounded-lg border border-emerald-100">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700">
                            Email address
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full rounded-xl border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm py-3 px-4 @error('email') border-red-500 @enderror"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-xl bg-primary-600 py-3 px-4 text-sm font-bold text-white shadow-lg hover:bg-primary-700 transition transform active:scale-95">
                            Email Password Reset Link
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-primary-600 hover:text-primary-500">
                        Back to login
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection