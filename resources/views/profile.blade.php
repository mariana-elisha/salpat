@extends('layouts.panel')

@section('title', 'My Profile')

@section('breadcrumbs', 'User / Profile')

@section('content')
    <div class="max-w-4xl mx-auto space-y-8">
        <!-- Header -->
        <div class="flex items-center gap-6 bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
            <div
                class="w-24 h-24 rounded-2xl bg-primary-600 flex items-center justify-center text-white text-4xl font-bold shadow-lg shadow-primary-200">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <div>
                <h1 class="text-3xl font-serif font-bold text-slate-900">{{ auth()->user()->name }}</h1>
                <p class="text-slate-500 font-medium">
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-primary-50 text-primary-700 uppercase tracking-wider mr-2">
                        {{ auth()->user()->role }}
                    </span>
                    Member since {{ auth()->user()->created_at->format('M Y') }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Sidebar Navigation -->
            <div class="space-y-2">
                <button onclick="switchTab('personal')" id="tab-personal"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all text-left bg-primary-600 text-white shadow-md">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Personal Info
                </button>
                <button onclick="switchTab('security')" id="tab-security"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all text-left text-slate-600 hover:bg-slate-50">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Security & Password
                </button>
            </div>

            <!-- Content Area -->
            <div class="md:col-span-2">
                @if ($errors->any())
                    <div class="mb-6 fade-in">
                        <div class="rounded-xl bg-red-50 p-4 border border-red-100 shadow-sm">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-bold text-red-800">Please correct the following errors:</h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul role="list" class="list-disc pl-5 space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Personal Info Tab -->
                <div id="content-personal" class="card p-8 bg-white fade-in">
                    <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-primary-600 rounded-full"></span>
                        Update Personal Information
                    </h2>
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                                    class="form-input" required>
                            </div>
                            <div>
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                    class="form-input bg-slate-50 cursor-not-allowed" readonly disabled>
                                <p class="text-[10px] text-slate-400 mt-1 italic">Email cannot be changed manually.</p>
                            </div>
                            <div>
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                                    class="form-input">
                            </div>
                            <div>
                                <label class="form-label">ID / Passport Number</label>
                                <input type="text" name="id_number"
                                    value="{{ old('id_number', auth()->user()->id_number) }}" class="form-input">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="form-label">Address</label>
                                <textarea name="address" rows="3"
                                    class="form-input">{{ old('address', auth()->user()->address) }}</textarea>
                            </div>
                        </div>
                        <div class="flex justify-end border-t border-slate-100 pt-6">
                            <button type="submit" class="btn btn-primary px-10">Save Changes</button>
                        </div>
                    </form>
                </div>

                <!-- Security Tab -->
                <div id="content-security" class="card p-8 bg-white hidden fade-in">
                    <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-accent-600 rounded-full"></span>
                        Change Password
                    </h2>
                    <form action="{{ route('profile.password') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-4">
                            <div>
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-input" required>
                            </div>
                            <div>
                                <label class="form-label">New Password</label>
                                <input type="password" name="password" class="form-input" required>
                            </div>
                            <div>
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="password_confirmation" class="form-input" required>
                            </div>
                        </div>
                        <div class="flex justify-end border-t border-slate-100 pt-6">
                            <button type="submit" class="btn btn-primary px-10">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            // Hide all content
            document.getElementById('content-personal').classList.add('hidden');
            document.getElementById('content-security').classList.add('hidden');

            // Remove active styles from buttons
            const personalBtn = document.getElementById('tab-personal');
            const securityBtn = document.getElementById('tab-security');

            personalBtn.className = 'w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all text-left text-slate-600 hover:bg-slate-50';
            securityBtn.className = 'w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all text-left text-slate-600 hover:bg-slate-50';

            // Show selected content and set active button
            if (tab === 'personal') {
                document.getElementById('content-personal').classList.remove('hidden');
                personalBtn.className = 'w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all text-left bg-primary-600 text-white shadow-md';
            } else {
                document.getElementById('content-security').classList.remove('hidden');
                securityBtn.className = 'w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all text-left bg-primary-600 text-white shadow-md';
            }
        }
    </script>
@endsection