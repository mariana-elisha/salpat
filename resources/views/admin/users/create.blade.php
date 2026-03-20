@extends('layouts.panel')

@section('title', 'Create User')
@section('breadcrumbs', 'Admin / Users / Create')

@section('content')
    <div class="max-w-3xl mx-auto space-y-6">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Create New User</h1>
                <p class="mt-1 text-sm text-slate-500">All accounts are created by the administrator.</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-4 sm:mt-0">← Back to Users</a>
        </div>

        @if($errors->any())
            <div class="rounded-md bg-red-50 p-4 border border-red-100">
                <h3 class="text-sm font-medium text-red-800">Please fix the following errors:</h3>
                <ul class="mt-2 text-sm text-red-700 list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Section: Role --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-semibold text-slate-700 border-b border-slate-200 pb-3 mb-5">Account Role</h2>
                <div>
                    <label for="role" class="form-label">Role <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <select id="role" name="role" class="form-input" required>
                            <option value="">Select a role</option>
                            @foreach($roles as $value => $label)
                                <option value="{{ $value }}" {{ old('role') === $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- Section: Personal Information --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-semibold text-slate-700 border-b border-slate-200 pb-3 mb-5">Personal Information
                </h2>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="name" class="form-label">Full Name <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input id="name" name="name" type="text" required value="{{ old('name') }}" class="form-input"
                                placeholder="John Doe">
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
                                <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section: Contact Information --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-semibold text-slate-700 border-b border-slate-200 pb-3 mb-5">Contact Information
                </h2>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div>
                        <label for="email" class="form-label">Email Address <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                class="form-input" placeholder="user@example.com">
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
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-semibold text-slate-700 border-b border-slate-200 pb-3 mb-5">Stay Preferences</h2>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div>
                        <label for="preferred_room_type" class="form-label">Preferred Room Type</label>
                        <div class="mt-2">
                            <select id="preferred_room_type" name="preferred_room_type" class="form-input">
                                <option value="">No preference</option>
                                <option value="single" {{ old('preferred_room_type') === 'single' ? 'selected' : '' }}>Single
                                </option>
                                <option value="double" {{ old('preferred_room_type') === 'double' ? 'selected' : '' }}>Double
                                </option>
                                <option value="twin" {{ old('preferred_room_type') === 'twin' ? 'selected' : '' }}>Twin
                                </option>
                                <option value="suite" {{ old('preferred_room_type') === 'suite' ? 'selected' : '' }}>Suite
                                </option>
                                <option value="family" {{ old('preferred_room_type') === 'family' ? 'selected' : '' }}>Family
                                </option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="dietary_requirements" class="form-label">Dietary Requirements</label>
                        <div class="mt-2">
                            <select id="dietary_requirements" name="dietary_requirements" class="form-input">
                                <option value="">None</option>
                                <option value="vegetarian" {{ old('dietary_requirements') === 'vegetarian' ? 'selected' : '' }}>Vegetarian</option>
                                <option value="vegan" {{ old('dietary_requirements') === 'vegan' ? 'selected' : '' }}>Vegan
                                </option>
                                <option value="halal" {{ old('dietary_requirements') === 'halal' ? 'selected' : '' }}>Halal
                                </option>
                                <option value="gluten_free" {{ old('dietary_requirements') === 'gluten_free' ? 'selected' : '' }}>Gluten Free</option>
                                <option value="other" {{ old('dietary_requirements') === 'other' ? 'selected' : '' }}>Other
                                </option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="emergency_contact_name" class="form-label">Emergency Contact Name</label>
                        <div class="mt-2">
                            <input id="emergency_contact_name" name="emergency_contact_name" type="text"
                                value="{{ old('emergency_contact_name') }}" class="form-input" placeholder="Jane Doe">
                        </div>
                    </div>

                    <div>
                        <label for="emergency_contact_phone" class="form-label">Emergency Contact Phone</label>
                        <div class="mt-2">
                            <input id="emergency_contact_phone" name="emergency_contact_phone" type="tel"
                                value="{{ old('emergency_contact_phone') }}" class="form-input"
                                placeholder="+255 700 000 000">
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-semibold text-slate-700 border-b border-slate-200 pb-3 mb-5">Account Security</h2>
                <div>
                    <label for="password" class="form-label">Password <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" required class="form-input"
                            placeholder="Min. 8 characters">
                        <p class="mt-1 text-xs text-slate-500">Must be at least 8 characters. Share this securely with the
                            user.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4 pb-8">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Create User Account</button>
            </div>
        </form>
    </div>
@endsection