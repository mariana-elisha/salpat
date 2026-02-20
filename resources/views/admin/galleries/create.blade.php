@extends('layouts.panel')

@section('title', 'Add New Image')

@section('content')
    <div class="space-y-6">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">Add New
                    Image</h1>
                <p class="mt-1 text-sm text-slate-500">Upload a new image to the gallery.</p>
            </div>
            <div class="mt-4 flex sm:ml-4 sm:mt-0">
                @php
                    $backRoute = auth()->user()->isAdmin() ? route('admin.galleries.index') : route('manager.galleries.index');
                @endphp
                <a href="{{ $backRoute }}" class="text-sm font-semibold leading-6 text-slate-900">
                    <span aria-hidden="true">&larr;</span> Back to Gallery
                </a>
            </div>
        </div>

        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                @php
                    $storeRoute = auth()->user()->isAdmin() ? route('admin.galleries.store') : route('manager.galleries.store');
                @endphp
                <form action="{{ $storeRoute }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-medium leading-6 text-slate-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description"
                            class="block text-sm font-medium leading-6 text-slate-900">Description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-slate-600">Brief description of the image.</p>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium leading-6 text-slate-900">Image</label>
                        <div class="mt-2">
                            <input type="file" name="image" id="image" required accept="image/*" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-primary-50 file:text-primary-700
                                    hover:file:bg-primary-100">
                        </div>
                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end pt-5">
                        <button type="submit"
                            class="rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                            Upload Image
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection