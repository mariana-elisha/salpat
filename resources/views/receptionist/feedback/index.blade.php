@extends('layouts.panel')

@section('title', 'Guest Feedback')

@section('breadcrumbs', 'Receptionist / Guest Feedback')

@section('content')
    <div class="space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="card p-6 bg-white flex items-center gap-4">
                <div class="p-4 bg-accent-100 text-accent-600 rounded-xl">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 uppercase tracking-widest">Average Rating</p>
                    <p class="text-3xl font-black text-slate-900">{{ number_format($averageRating, 1) }} <span
                            class="text-lg text-slate-400 font-normal">/ 5</span></p>
                </div>
            </div>
            <div class="card p-6 bg-white flex items-center gap-4">
                <div class="p-4 bg-indigo-100 text-indigo-600 rounded-xl">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 uppercase tracking-widest">Total Reviews</p>
                    <p class="text-3xl font-black text-slate-900">{{ $totalFeedback }}</p>
                </div>
            </div>
        </div>

        <div class="card bg-white overflow-hidden shadow-sm border border-slate-200">
            <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <h2 class="text-lg font-bold text-slate-800 font-serif">Recent Feedback</h2>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse($feedbacks as $feedback)
                    <div class="p-6 hover:bg-slate-50 transition-colors">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="font-bold text-slate-900 text-lg">{{ $feedback->guest_name }}</h3>
                                <p class="text-xs text-slate-500 mt-0.5">
                                    Submitted {{ $feedback->created_at->format('M d, Y') }}
                                    @if($feedback->booking)
                                        &bull; Booking <a href="{{ route('bookings.show', $feedback->booking->booking_reference) }}"
                                            class="text-primary-600 hover:underline">#{{ $feedback->booking->booking_reference }}</a>
                                    @endif
                                </p>
                            </div>
                            <div class="flex items-center gap-1 text-yellow-400 bg-yellow-50 px-2 py-1 rounded-lg">
                                <span class="font-bold text-slate-700 text-sm mr-1">{{ $feedback->rating }}.0</span>
                                @for($i = 0; $i < $feedback->rating; $i++)
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        <p class="text-slate-600 mt-3 text-sm leading-relaxed border-l-2 border-slate-200 pl-4 italic">
                            "{{ $feedback->comments }}"
                        </p>
                    </div>
                @empty
                    <div class="p-10 text-center text-slate-400 text-sm italic">
                        <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        No feedback received yet.
                    </div>
                @endforelse
            </div>
            @if($feedbacks->hasPages())
                <div class="px-6 py-4 border-t border-slate-100 bg-slate-50">
                    {{ $feedbacks->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection