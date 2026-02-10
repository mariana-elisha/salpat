@extends('layouts.panel')

@section('title', 'Manage Rooms')

@section('content')
    <div class="space-y-6">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">Rooms
                </h1>
                <p class="mt-1 text-sm text-slate-500">Manage hotel room inventory, pricing, and availability.</p>
            </div>
            <div class="mt-4 flex sm:ml-4 sm:mt-0">
                @if(auth()->user()->isAdmin() || auth()->user()->isReceptionist())
                    <a href="{{ auth()->user()->isAdmin() ? route('admin.rooms.create') : route('receptionist.rooms.create') }}"
                        class="inline-flex items-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path
                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        Add Room
                    </a>
                @endif
            </div>
        </div>

        <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Image</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Name/Type</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Capacity</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Price</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-slate-500">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse($rooms as $room)
                            <tr class="hover:bg-slate-50">
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if($room->image)
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}">
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-slate-100 flex items-center justify-center">
                                            <svg class="h-6 w-6 text-slate-300" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="text-sm font-medium text-slate-900">{{ $room->name }}</div>
                                    <div class="text-sm text-slate-500">{{ $room->type }}</div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    {{ $room->capacity }} Guests
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-900">
                                    ${{ number_format($room->price_per_night, 2) }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span
                                        class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 {{ $room->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $room->is_available ? 'Available' : 'Unavailable' }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                    @php
                                        $editRoute = auth()->user()->isAdmin() ? route('admin.rooms.edit', $room) : route('receptionist.rooms.edit', $room);
                                        $deleteRoute = auth()->user()->isAdmin() ? route('admin.rooms.destroy', $room) : route('receptionist.rooms.destroy', $room);
                                    @endphp
                                    <a href="{{ $editRoute }}" class="text-primary-600 hover:text-primary-900 mr-4">Edit</a>

                                    @if(auth()->user()->isAdmin())
                                        <form action="{{ $deleteRoute }}" method="POST" class="inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this room?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                                    No rooms found. Get started by adding a new room.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($rooms->hasPages())
                <div class="border-t border-slate-200 bg-slate-50 px-4 py-3 sm:px-6">
                    {{ $rooms->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection