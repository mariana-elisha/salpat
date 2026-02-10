@extends('layouts.panel')

@section('title', 'Edit Room')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">Edit Room:
                    {{ $room->name }}</h2>
            </div>
            <div class="mt-4 flex md:ml-4 md:mt-0">
                <a href="{{ auth()->user()->isAdmin() ? route('admin.rooms.index') : route('receptionist.rooms.index') }}"
                    class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50">
                    Back to List
                </a>
            </div>
        </div>

        <div class="bg-white shadow-sm ring-1 ring-slate-900/5 sm:rounded-xl md:col-span-2">
            @php
                $updateRoute = auth()->user()->isAdmin() ? route('admin.rooms.update', $room) : route('receptionist.rooms.update', $room);
            @endphp
            <form action="{{ $updateRoute }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="name" class="block text-sm font-medium leading-6 text-slate-900">Room
                                Name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" autocomplete="off" required
                                    value="{{ old('name', $room->name) }}"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="type" class="block text-sm font-medium leading-6 text-slate-900">Type</label>
                            <div class="mt-2">
                                <select id="type" name="type"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                                    @foreach(['Single', 'Double', 'Family', 'Suite', 'Tent'] as $type)
                                        <option value="{{ $type }}"
                                            {{ old('type', $room->type) == $type ? 'selected' : '' }}>{{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('type')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="price_per_night" class="block text-sm font-medium leading-6 text-slate-900">Price
                                per Night ($)</label>
                            <div class="mt-2">
                                <input type="number" name="price_per_night" id="price_per_night" step="0.01" min="0" required
                                    value="{{ old('price_per_night', $room->price_per_night) }}"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('price_per_night')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="capacity" class="block text-sm font-medium leading-6 text-slate-900">Max
                                Capacity</label>
                            <div class="mt-2">
                                <input type="number" name="capacity" id="capacity" min="1" required
                                    value="{{ old('capacity', $room->capacity) }}"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('capacity')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="description"
                                class="block text-sm font-medium leading-6 text-slate-900">Description</label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('description', $room->description) }}</textarea>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-slate-600">Write a few sentences about the room.</p>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="image" class="block text-sm font-medium leading-6 text-slate-900">Room
                                Image</label>
                            @if($room->image)
                                <div class="mt-2 mb-4">
                                    <img src="{{ asset('storage/' . $room->image) }}" alt="Current Image"
                                        class="h-32 w-32 object-cover rounded-lg border border-slate-200">
                                    <p class="text-xs text-slate-500 mt-1">Current image</p>
                                </div>
                            @endif
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-slate-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-slate-300" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-slate-600 justify-center">
                                        <label for="image"
                                            class="relative cursor-pointer rounded-md bg-white font-semibold text-primary-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-600 focus-within:ring-offset-2 hover:text-primary-500">
                                            <span>Upload a new file</span>
                                            <input id="image" name="image" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-slate-600">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                            @error('image')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="is_available" name="is_available" type="checkbox" value="1"
                                        {{ old('is_available', $room->is_available) ? 'checked' : '' }}
                                        class="h-4 w-4 rounded border-slate-300 text-primary-600 focus:ring-primary-600">
                                </div>
                                <div class="text-sm leading-6">
                                    <label for="is_available" class="font-medium text-slate-900">Available for
                                        booking</label>
                                    <p class="text-slate-500">Uncheck to mark this room as unavailable/maintenance mode.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-slate-900/10 px-4 py-4 sm:px-8">
                    <button type="button" class="text-sm font-semibold leading-6 text-slate-900">Cancel</button>
                    <button type="submit"
                        class="rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Update
                        Room</button>
                </div>
            </form>
        </div>
    </div>
@endsection
