@extends('layouts.panel')

@section('title', 'Notifications')

@section('breadcrumbs', 'Notifications')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-slate-900 font-serif">Notifications</h1>
            @if(auth()->user()->unreadNotifications->count() > 0)
                <form action="{{ route('notifications.mark-all-read') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary text-sm">
                        Mark all as read
                    </button>
                </form>
            @endif
        </div>

        <div class="card bg-white shadow-sm overflow-hidden">
            <div class="divide-y divide-slate-100">
                @forelse($notifications as $notification)
                    <div class="p-6 transition-colors hover:bg-slate-50 {{ $notification->unread() ? 'bg-primary-50/20' : '' }}">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex items-start gap-4">
                                <div class="mt-1">
                                    @if(($notification->data['type'] ?? '') === 'booking')
                                        <div class="p-2 bg-primary-100 text-primary-600 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @elseif(($notification->data['type'] ?? '') === 'order')
                                        <div class="p-2 bg-accent-100 text-accent-600 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                        </div>
                                    @else
                                        <div class="p-2 bg-slate-100 text-slate-600 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-900 {{ $notification->unread() ? '' : 'font-normal' }}">
                                        {{ $notification->data['message'] ?? 'New notification' }}
                                    </p>
                                    @if(isset($notification->data['url']))
                                        <a href="{{ $notification->data['url'] }}" class="mt-2 text-xs font-bold text-primary-600 hover:text-primary-700 underline">View Details &rarr;</a>
                                    @endif
                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>

                            @if($notification->unread())
                                <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-xs font-bold text-slate-400 hover:text-primary-600 transition-colors uppercase tracking-wider">
                                        Mark read
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="p-12 text-center">
                        <svg class="w-12 h-12 text-slate-200 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p class="text-slate-400 font-medium italic">No notifications to show.</p>
                    </div>
                @endforelse
            </div>

            @if($notifications->hasPages())
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                    {{ $notifications->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
