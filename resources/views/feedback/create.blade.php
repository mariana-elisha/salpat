@extends('layouts.app')

@section('title', 'Leave Feedback')

@section('content')
    <div class="py-20 bg-slate-50 min-h-[80vh] flex items-center justify-center">
        <div class="max-w-2xl w-full mx-auto px-4">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
                <div
                    class="bg-slate-900 text-white p-8 text-center bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]">
                    <h1 class="text-4xl font-serif text-accent-400 mb-2">How Was Your Stay?</h1>
                    <p class="text-slate-300">We'd love to hear your thoughts to help us improve.</p>
                </div>

                <div class="p-8">
                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 text-red-600">
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('feedback.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="guest_name" class="block text-sm font-semibold text-slate-700 mb-2">Full Name
                                    <span class="text-rose-500">*</span></label>
                                <input type="text" id="guest_name" name="guest_name" value="{{ old('guest_name') }}"
                                    required
                                    class="w-full rounded-xl border-slate-300 focus:border-accent-500 focus:ring-accent-500 shadow-sm px-4 py-3"
                                    placeholder="Jane Doe">
                            </div>
                            <div>
                                <label for="booking_reference"
                                    class="block text-sm font-semibold text-slate-700 mb-2">Booking Reference <span
                                        class="text-slate-400 font-normal">(Optional)</span></label>
                                <input type="text" id="booking_reference" name="booking_reference"
                                    value="{{ old('booking_reference', $bookingRef) }}"
                                    class="w-full rounded-xl border-slate-300 focus:border-accent-500 focus:ring-accent-500 shadow-sm px-4 py-3 bg-slate-50 focus:bg-white"
                                    placeholder="SAL-...">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-3">Overall Rating <span
                                    class="text-rose-500">*</span></label>
                            <div class="flex items-center gap-4 flex-row-reverse justify-end">
                                <input type="radio" id="star5" name="rating" value="5" class="peer/5 hidden" required>
                                <label for="star5"
                                    class="text-slate-300 peer-checked/5:text-yellow-400 hover:text-yellow-400 cursor-pointer transition-colors"
                                    title="5 Stars">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </label>

                                <input type="radio" id="star4" name="rating" value="4" class="peer/4 hidden">
                                <label for="star4"
                                    class="text-slate-300 peer-checked/4:text-yellow-400 peer-checked/5:text-yellow-400 hover:text-yellow-400 cursor-pointer transition-colors"
                                    title="4 Stars">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </label>

                                <input type="radio" id="star3" name="rating" value="3" class="peer/3 hidden">
                                <label for="star3"
                                    class="text-slate-300 peer-checked/3:text-yellow-400 peer-checked/4:text-yellow-400 peer-checked/5:text-yellow-400 hover:text-yellow-400 cursor-pointer transition-colors"
                                    title="3 Stars">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </label>

                                <input type="radio" id="star2" name="rating" value="2" class="peer/2 hidden">
                                <label for="star2"
                                    class="text-slate-300 peer-checked/2:text-yellow-400 peer-checked/3:text-yellow-400 peer-checked/4:text-yellow-400 peer-checked/5:text-yellow-400 hover:text-yellow-400 cursor-pointer transition-colors"
                                    title="2 Stars">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </label>

                                <input type="radio" id="star1" name="rating" value="1" class="peer/1 hidden">
                                <label for="star1"
                                    class="text-slate-300 peer-checked/1:text-yellow-400 peer-checked/2:text-yellow-400 peer-checked/3:text-yellow-400 peer-checked/4:text-yellow-400 peer-checked/5:text-yellow-400 hover:text-yellow-400 cursor-pointer transition-colors"
                                    title="1 Star">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </label>

                            </div>
                        </div>

                        <div>
                            <label for="comments" class="block text-sm font-semibold text-slate-700 mb-2">Your Experience
                                <span class="text-rose-500">*</span></label>
                            <textarea id="comments" name="comments" rows="5" required
                                class="w-full rounded-xl border-slate-300 focus:border-accent-500 focus:ring-accent-500 shadow-sm px-4 py-3"
                                placeholder="Tell us what you liked and how we can improve...">{{ old('comments') }}</textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-accent-500 text-white font-bold py-4 px-6 rounded-xl hover:bg-accent-600 transition-colors shadow-lg hover:shadow-accent-500/30 flex justify-center items-center gap-2">
                            <span>Submit Feedback</span>
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection