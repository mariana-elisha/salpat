@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold text-slate-800 mb-6">Create an Account</h1>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                       class="w-full border-slate-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                       class="w-full border-slate-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full border-slate-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
                <p class="mt-1 text-xs text-slate-500">Minimum 8 characters</p>
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full border-slate-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            </div>

            <button type="submit" class="w-full bg-orange-600 text-white px-6 py-3 rounded-md hover:bg-orange-700 font-semibold">
                Register
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-600">
            Already have an account? <a href="{{ route('login') }}" class="text-orange-600 hover:text-orange-800 font-medium">Login</a>
        </p>
    </div>
</div>
@endsection
