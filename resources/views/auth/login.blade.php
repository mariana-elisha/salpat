@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold text-slate-800 mb-6">Login to Your Account</h1>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                       class="w-full border-slate-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full border-slate-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-slate-300 text-orange-600 focus:ring-orange-500">
                    <span class="ml-2 text-sm text-slate-600">Remember me</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-orange-500 text-white px-6 py-3 rounded-md hover:bg-orange-600 font-semibold">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-600">
            Don't have an account? <a href="{{ route('register') }}" class="text-orange-600 hover:text-orange-800 font-medium">Register</a>
        </p>
    </div>
</div>
@endsection
