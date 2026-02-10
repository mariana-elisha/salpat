@extends('layouts.panel')

@section('title', 'Manage Bookings')

@section('content')
    <div class="space-y-6">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">Bookings
                </h1>
                <p class="mt-1 text-sm text-slate-500">View and manage all room reservations.</p>
            </div>
            <div class="mt-4 flex sm:ml-4 sm:mt-0">
                <a href="{{ route('bookings.create', 1) }}"
                    class="inline-flex items-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                    <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    New Booking
                </a>
            </div>
        </div>

        <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Guest</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Room</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Check-in</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Check-out</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Total</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-slate-50">
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-900">
                                    #{{ $booking->id }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    {{ $booking->user->name ?? 'N/A' }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    {{ $booking->room->name ?? 'N/A' }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    {{ $booking->check_in ? \Carbon\Carbon::parse($booking->check_in)->format('M d, Y') : 'N/A' }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    {{ $booking->check_out ? \Carbon\Carbon::parse($booking->check_out)->format('M d, Y') : 'N/A' }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm">
                                    @if ($booking->status === 'confirmed')
                                        <span
                                            class="inline-flex rounded-full bg-emerald-100 px-2 text-xs font-semibold leading-5 text-emerald-800">Confirmed</span>
                                    @elseif($booking->status === 'pending')
                                        <span
                                            class="inline-flex rounded-full bg-amber-100 px-2 text-xs font-semibold leading-5 text-amber-800">Pending</span>
                                    @elseif($booking->status === 'cancelled')
                                        <span
                                            class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">Cancelled</span>
                                    @else
                                        <span
                                            class="inline-flex rounded-full bg-slate-100 px-2 text-xs font-semibold leading-5 text-slate-800">{{ ucfirst($booking->status) }}</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-semibold text-slate-900">
                                    ${{ number_format($booking->total_price ?? 0, 2) }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    <a href="{{ route('bookings.show', $booking) }}"
                                        class="text-primary-600 hover:text-primary-900 block mb-1">View Details</a>

                                    @if(auth()->user()->isAdmin() || auth()->user()->isReceptionist())
                                        <div class="flex flex-col gap-1 mt-2">
                                            @if($booking->status === 'pending')
                                                <form action="{{ route('bookings.update-status', $booking) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="confirmed">
                                                    <button type="submit"
                                                        class="text-xs w-full text-center rounded bg-emerald-100 py-1 px-2 font-medium text-emerald-800 hover:bg-emerald-200">
                                                        Confirm
                                                    </button>
                                                </form>
                                            @endif

                                            @if($booking->status !== 'cancelled' && $booking->status !== 'completed')
                                                <form action="{{ route('bookings.update-status', $booking) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="cancelled">
                                                    <button type="submit"
                                                        class="text-xs w-full text-center rounded bg-red-100 py-1 px-2 font-medium text-red-800 hover:bg-red-200">
                                                        Cancel
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-10 text-center text-slate-500">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-semibold text-slate-900">No bookings found</h3>
                                    <p class="mt-1 text-sm text-slate-500">Get started by creating a new booking.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($bookings->hasPages())
                <div class="border-t border-slate-200 bg-slate-50 px-4 py-3 sm:px-6">
                    {{ $bookings->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection