@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-serif font-bold text-black mb-6">Contact Us</h1>
            <div class="w-24 h-1.5 bg-accent-500 mx-auto rounded-full mb-6"></div>
            <p class="text-xl text-black font-medium max-w-2xl mx-auto">We'd love to hear from you. Get in touch with our
                team.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-slate-100">
                    <h2 class="text-2xl font-serif font-bold text-black mb-8">Send us a Message</h2>

                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-8">
                            <ul class="list-disc list-inside text-sm">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="form-input">
                            </div>
                            <div>
                                <label for="email" class="form-label">Email
                                    Address</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="form-input">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                                class="form-input">
                        </div>

                        <div>
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" id="message" rows="6" required class="form-input"
                                placeholder="How can we help you?">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-full py-4 text-lg shadow-lg">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="space-y-8">
                <div class="bg-primary-600 rounded-2xl shadow-xl p-8 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-primary-700 rounded-full opacity-50"></div>
                    <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-primary-700 rounded-full opacity-50">
                    </div>

                    <h3 class="text-2xl font-serif font-bold mb-8 relative z-10">Get in Touch</h3>

                    <div class="space-y-8 relative z-10">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary-700 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white mb-1">Email</p>
                                <a href="mailto:salpatcamp@yahoo.com"
                                    class="text-lg font-semibold hover:text-accent-500 transition-colors">salpatcamp@yahoo.com</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary-700 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white mb-1">Phone</p>
                                <a href="tel:+255770307759"
                                    class="text-lg font-semibold hover:text-accent-500 transition-colors">+255 0770 307
                                    759</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary-700 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white mb-1">Address</p>
                                <p class="text-lg font-semibold">Falcon Street 1, Soweto Moshi<br>Kilimanjaro, Tanzania</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-accent-500 to-accent-600 rounded-2xl p-8 text-white shadow-lg">
                    <h4 class="text-xl font-bold mb-2">Need immediate assistance?</h4>
                    <p class="text-accent-100">Our reception is available 24/7. Call us anytime!</p>
                </div>
            </div>
        </div>
    </div>
@endsection