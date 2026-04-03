@extends('layouts.panel')

@section('title', 'Edit Image')

@section('content')
    <div class="space-y-6">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">Edit Image
                </h1>
                <p class="mt-1 text-sm text-slate-500">Update image details.</p>
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
                    $updateRoute = auth()->user()->isAdmin() ? route('admin.galleries.update', $gallery) : route('manager.galleries.update', $gallery);
                @endphp
                <form action="{{ $updateRoute }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="title" class="block text-sm font-medium leading-6 text-slate-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}"
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
                                class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">{{ old('description', $gallery->description) }}</textarea>
                        </div>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium leading-6 text-slate-900">Current Image</label>
                        <div class="mt-2">
                            <img src="{{ asset('images/' . $gallery->image_path) }}" alt="{{ $gallery->title }}"
                                class="h-48 w-auto rounded-lg object-cover">
                        </div>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium leading-6 text-slate-900">New Image
                            (Optional)</label>
                        <div class="mt-2">
                            <input type="file" name="image" id="image" accept="image/*" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-primary-50 file:text-primary-700
                                    hover:file:bg-primary-100">
                        </div>
                        <p class="mt-1 text-xs text-slate-500">Leave blank to keep current image.</p>
                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-x-6 pt-8 border-t border-slate-900/10">
                        <a href="{{ $backRoute }}" class="text-sm font-bold leading-6 text-slate-600 hover:text-slate-900 uppercase tracking-widest transition-colors self-center">Cancel</a>
                        <button type="submit"
                            class="rounded-xl bg-primary-600 px-8 py-3 text-sm font-black text-white shadow-[0_10px_30px_rgba(11,123,191,0.3)] hover:bg-primary-500 hover:-translate-y-0.5 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 transition-all uppercase tracking-[0.2em]">
                            Update Gallery Image
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection