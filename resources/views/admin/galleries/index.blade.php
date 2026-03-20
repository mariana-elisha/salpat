@extends('layouts.panel')

@section('title', 'Gallery Management')

@section('content')
    <div class="space-y-6">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">Gallery</h1>
                <p class="mt-1 text-sm text-slate-500">Manage images displayed in the public gallery.</p>
            </div>
            <div class="mt-4 flex sm:ml-4 sm:mt-0">
                @php
                    $createRoute = auth()->user()->isAdmin() ? route('admin.galleries.create') : route('manager.galleries.create');
                @endphp
                <a href="{{ $createRoute }}"
                    class="inline-flex items-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                    <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    Add Image
                </a>
            </div>
        </div>

        <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Image</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">Description</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-slate-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse($galleries as $gallery)
                            <tr class="hover:bg-slate-50">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="h-16 w-16 flex-shrink-0">
                                        <img class="h-16 w-16 rounded object-cover" src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}">
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="text-sm font-medium text-slate-900">{{ $gallery->title ?? 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-slate-500 truncate max-w-xs">{{ $gallery->description ?? 'N/A' }}</div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                    @php
                                        $editRoute = auth()->user()->isAdmin() ? route('admin.galleries.edit', $gallery) : route('manager.galleries.edit', $gallery);
                                        $deleteRoute = auth()->user()->isAdmin() ? route('admin.galleries.destroy', $gallery) : route('manager.galleries.destroy', $gallery);
                                    @endphp
                                    <a href="{{ $editRoute }}" class="text-primary-600 hover:text-primary-900 mr-4">Edit</a>
                                    <form action="{{ $deleteRoute }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-slate-500">
                                    No images found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($galleries->hasPages())
                <div class="border-t border-slate-200 bg-slate-50 px-4 py-3 sm:px-6">
                    {{ $galleries->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
