@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="min-h-[80vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-slate-50 relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                alt="Background" class="h-full w-full object-cover opacity-10 blur-sm">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-50 via-slate-50/80 to-transparent"></div>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-2xl relative z-10">
            <div class="flex justify-center">
                <div
                    class="h-12 w-12 rounded-xl bg-[var(--color-primary)] flex items-center justify-center text-white shadow-lg shadow-sky-600/30">
                    <span class="text-2xl font-serif font-bold">S</span>
                </div>
            </div>
            <h2 class="mt-6 text-center text-3xl font-serif font-bold tracking-tight text-slate-900 leading-tight">Create an
                account</h2>
            <p class="mt-2 text-center text-sm text-slate-600">
                Join Salpat Camp and start your adventure
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-2xl relative z-10">
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
                                    <ul role="list" class="list-disc pl-5 space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <form class="space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf

                    {{-- Section: Personal Information --}}
                    <div>
                        <h3 class="text-base font-semibold text-slate-700 border-b border-slate-200 pb-2 mb-4">Personal
                            Information</h3>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label for="name" class="form-label">Full Name <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <input id="name" name="name" type="text" autocomplete="name" required
                                        value="{{ old('name') }}" class="form-input" placeholder="John Doe">
                                </div>
                            </div>

                            <div>
                                <label for="id_number" class="form-label">ID / Passport Number</label>
                                <div class="mt-2">
                                    <input id="id_number" name="id_number" type="text" value="{{ old('id_number') }}"
                                        class="form-input" placeholder="A1234567">
                                </div>
                            </div>

                            <div>
                                <label for="nationality" class="form-label">Nationality</label>
                                <div class="mt-2">
                                    <input id="nationality" name="nationality" type="text" value="{{ old('nationality') }}"
                                        class="form-input" placeholder="Tanzanian">
                                </div>
                            </div>

                            <div>
                                <label for="age" class="form-label">Age</label>
                                <div class="mt-2">
                                    <input id="age" name="age" type="number" min="1" max="120" value="{{ old('age') }}"
                                        class="form-input" placeholder="25">
                                </div>
                            </div>

                            <div>
                                <label for="gender" class="form-label">Gender</label>
                                <div class="mt-2">
                                    <select id="gender" name="gender" class="form-input">
                                        <option value="">Select gender</option>
                                        <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Section: Contact Information --}}
                    <div>
                        <h3 class="text-base font-semibold text-slate-700 border-b border-slate-200 pb-2 mb-4">Contact
                            Information</h3>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="email" class="form-label">Email Address <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email" required
                                        value="{{ old('email') }}" class="form-input" placeholder="you@example.com">
                                </div>
                            </div>

                            <div>
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="mt-2">
                                    <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" class="form-input"
                                        placeholder="+255 770 307 759">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="address" class="form-label">Home Address</label>
                                <div class="mt-2">
                                    <textarea id="address" name="address" rows="2" class="form-input"
                                        placeholder="Wailes Street, Soweto Moshi, Kilimanjaro">{{ old('address') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Section: Stay Preferences --}}
                    <div>
                        <h3 class="text-base font-semibold text-slate-700 border-b border-slate-200 pb-2 mb-4">Stay
                            Preferences</h3>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="preferred_room_type" class="form-label">Preferred Room Type</label>
                                <div class="mt-2">
                                    <select id="preferred_room_type" name="preferred_room_type" class="form-input">
                                        <option value="">No preference</option>
                                        <option value="single" {{ old('preferred_room_type') === 'single' ? 'selected' : '' }}>Single</option>
                                        <option value="double" {{ old('preferred_room_type') === 'double' ? 'selected' : '' }}>Double</option>
                                        <option value="twin" {{ old('preferred_room_type') === 'twin' ? 'selected' : '' }}>
                                            Twin</option>
                                        <option value="suite" {{ old('preferred_room_type') === 'suite' ? 'selected' : '' }}>
                                            Suite</option>
                                        <option value="family" {{ old('preferred_room_type') === 'family' ? 'selected' : '' }}>Family</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="dietary_requirements" class="form-label">Dietary Requirements</label>
                                <div class="mt-2">
                                    <select id="dietary_requirements" name="dietary_requirements" class="form-input">
                                        <option value="">None</option>
                                        <option value="vegetarian" {{ old('dietary_requirements') === 'vegetarian' ? 'selected' : '' }}>Vegetarian</option>
                                        <option value="vegan" {{ old('dietary_requirements') === 'vegan' ? 'selected' : '' }}>
                                            Vegan</option>
                                        <option value="halal" {{ old('dietary_requirements') === 'halal' ? 'selected' : '' }}>
                                            Halal</option>
                                        <option value="gluten_free" {{ old('dietary_requirements') === 'gluten_free' ? 'selected' : '' }}>Gluten Free</option>
                                        <option value="other" {{ old('dietary_requirements') === 'other' ? 'selected' : '' }}>
                                            Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Section: Emergency Contact --}}
                    <div>
                        <h3 class="text-base font-semibold text-slate-700 border-b border-slate-200 pb-2 mb-4">Emergency
                            Contact</h3>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="emergency_contact_name" class="form-label">Contact Name</label>
                                <div class="mt-2">
                                    <input id="emergency_contact_name" name="emergency_contact_name" type="text"
                                        value="{{ old('emergency_contact_name') }}" class="form-input"
                                        placeholder="Jane Doe">
                                </div>
                            </div>

                            <div>
                                <label for="emergency_contact_phone" class="form-label">Contact Phone</label>
                                <div class="mt-2">
                                    <input id="emergency_contact_phone" name="emergency_contact_phone" type="tel"
                                        value="{{ old('emergency_contact_phone') }}" class="form-input"
                                        placeholder="+255 700 000 000">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Section: Account Security --}}
                    <div>
                        <h3 class="text-base font-semibold text-slate-700 border-b border-slate-200 pb-2 mb-4">Account
                            Security</h3>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="password" class="form-label">Password <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <input id="password" name="password" type="password" autocomplete="new-password"
                                        required class="form-input">
                                    <p class="mt-2 text-xs text-slate-500">Must be at least 8 characters.</p>
                                </div>
                            </div>

                            <div>
                                <label for="password_confirmation" class="form-label">Confirm Password <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        autocomplete="new-password" required class="form-input">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <button type="submit" class="btn btn-primary w-full">Create Account</button>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-slate-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="bg-white px-2 text-slate-500">Already have an account?</span>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('login') }}"
                            class="flex w-full justify-center rounded-lg bg-white px-3 py-2.5 text-sm font-semibold leading-6 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50 transition-colors">Sign
                            in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection