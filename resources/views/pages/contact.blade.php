@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-12">
        <h1 class="text-4xl font-bold text-slate-800 mb-4 flex items-center gap-3">
            <span class="w-2 h-12 bg-sky-500 rounded"></span>
            Contact Us
        </h1>
        <p class="text-xl text-slate-600">We'd love to hear from you. Get in touch with our team.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Contact Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-orange-50">
                <h2 class="text-2xl font-bold text-slate-800 mb-6">Send us a Message</h2>

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                        <ul class="list-disc list-inside text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Your Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                   class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-medium text-slate-700 mb-2">Subject</label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                               class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium text-slate-700 mb-2">Message</label>
                        <textarea name="message" id="message" rows="5" required
                                  class="w-full border-slate-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500"
                                  placeholder="How can we help you?">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-orange-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-orange-600 transition">
                        Send Message
                    </button>
                </form>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-orange-50">
                <h3 class="font-bold text-slate-800 mb-4">Get in Touch</h3>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-800">Email</p>
                            <a href="mailto:info@salpatcamp.com" class="text-slate-600 hover:text-orange-600">info@salpatcamp.com</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-sky-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-800">Phone</p>
                            <a href="tel:+1234567890" class="text-slate-600 hover:text-orange-600">+1 (234) 567-890</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-800">Address</p>
                            <p class="text-slate-600">123 Lodge Lane<br>Nature Valley, NV 12345</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-orange-500 to-sky-600 rounded-2xl p-6 text-white">
                <p class="font-semibold mb-2">Need immediate assistance?</p>
                <p class="text-sm text-white/90">Our reception is available 24/7. Call us anytime!</p>
            </div>
        </div>
    </div>
</div>
@endsection
