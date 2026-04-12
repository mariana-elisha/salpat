@extends('layouts.app')

@section('title', 'Leave Feedback')

@section('content')
    <div class="bg-creme min-h-screen pt-20 pb-40">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-20 animate-fade-in">
                <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-8 underline decoration-gold/20 underline-offset-8">Guest Impressions</h2>
                <h1 class="text-5xl md:text-7xl font-serif font-bold text-navy mb-8 leading-tight">Your <span class="italic font-normal text-gold italic">Experience</span></h1>
                <p class="text-slate-500 font-light italic text-lg max-w-2xl mx-auto leading-relaxed">
                    We invite you to share the moments that defined your stay. Your insights help us refine our sanctuary of comfort.
                </p>
                <div class="w-16 h-px bg-gold/40 mx-auto mt-12"></div>
            </div>

            <!-- Feedback Card -->
            <div class="bg-white rounded-[3rem] shadow-4xl overflow-hidden border border-gold/10 relative group transition-all duration-700 hover:shadow-navy/10">
                <div class="absolute top-0 right-0 w-64 h-64 bg-gold/5 rounded-bl-[10rem] pointer-events-none transition-transform duration-1000 group-hover:scale-110"></div>
                
                <div class="p-10 md:p-20 relative z-10">
                    @if ($errors->any())
                        <div class="mb-12 p-6 rounded-2xl bg-rose-50 border border-rose-100 text-rose-600 animate-shake">
                            <div class="flex items-center gap-4 mb-3">
                                <i class="fas fa-exclamation-circle"></i>
                                <span class="font-bold uppercase tracking-widest text-[10px]">Please correct the following:</span>
                            </div>
                            <ul class="list-disc list-inside text-xs space-y-1 font-light italic">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('feedback.store') }}" method="POST" class="space-y-12">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-4">
                                <label for="guest_name" class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.3em] ml-2">Your Distinguished Name</label>
                                <input type="text" id="guest_name" name="guest_name" value="{{ old('guest_name', $guestName) }}"
                                    required
                                    class="w-full bg-creme-dark/30 border-2 border-transparent rounded-2xl px-6 py-5 text-lg font-serif text-navy placeholder-slate-300 focus:outline-none focus:border-gold/20 focus:bg-white transition-all shadow-inner"
                                    placeholder="Alexander Hamilton">
                            </div>
                            <div class="space-y-4">
                                <label for="booking_reference"
                                    class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.3em] ml-2">Booking Reference</label>
                                <input type="text" id="booking_reference" name="booking_reference"
                                    value="{{ old('booking_reference', $bookingRef) }}"
                                    class="w-full bg-creme-dark/30 border-2 border-transparent rounded-2xl px-6 py-5 text-lg font-serif text-navy placeholder-slate-300 focus:outline-none focus:border-gold/20 focus:bg-white transition-all shadow-inner"
                                    placeholder="SAL-XXXXXX (Optional)">
                            </div>
                        </div>

                        <!-- Refined Rating System -->
                        <div class="space-y-6">
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.3em] ml-2 text-center">Your Overall Rating</label>
                            <div class="flex items-center gap-4 flex-row-reverse justify-center group/stars">
                                @foreach([5, 4, 3, 2, 1] as $star)
                                    <input type="radio" id="star{{ $star }}" name="rating" value="{{ $star }}" class="peer/{{ $star }} hidden" {{ $star == 5 ? 'required' : '' }}>
                                    <label for="star{{ $star }}"
                                        class="text-slate-200 peer-checked/{{ $star }}:text-gold group-hover/stars:text-slate-200 hover:!text-gold hover:scale-125 transition-all cursor-pointer duration-300"
                                        title="{{ $star }} Stars">
                                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label for="comments" class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.3em] ml-2">A Narrative of Your Stay</label>
                            <textarea id="comments" name="comments" rows="6" required
                                class="w-full bg-creme-dark/30 border-2 border-transparent rounded-[2rem] px-8 py-6 text-xl font-serif text-navy placeholder-slate-300 focus:outline-none focus:border-gold/20 focus:bg-white transition-all shadow-inner resize-none italic"
                                placeholder="Details of your experiences, the staff, the ambiance...">{{ old('comments') }}</textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-navy hover:bg-gold text-white font-bold py-8 px-10 rounded-2xl transition-all duration-500 shadow-2xl hover:shadow-gold/30 hover:-translate-y-2 flex justify-center items-center gap-6 group">
                            <span class="uppercase tracking-[0.5em] text-[10px]">Submit Impressions</span>
                            <i class="fas fa-arrow-right text-[10px] transform group-hover:translate-x-2 transition-transform"></i>
                        </button>

                    </form>
                </div>
            </div>

            <!-- Return Link -->
            <div class="mt-20 text-center">
                <a href="{{ route('home') }}" class="text-slate-400 hover:text-gold text-[10px] font-bold uppercase tracking-[0.4em] transition-all flex items-center justify-center gap-3 italic">
                    <i class="fas fa-arrow-left text-[8px]"></i>
                    Return to Grand Lobby
                </a>
            </div>
        </div>
    </div>
@endsection