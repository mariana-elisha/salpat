@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="bg-slate-50 min-h-screen pb-24">
        <!-- Header -->
        <div class="relative bg-slate-900 py-24 sm:py-32 overflow-hidden border-b-4 border-accent-500 mb-16">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1596524430615-b46475ddff6e?ixlib=rb-4.0.3')] bg-cover bg-center opacity-20 filter grayscale mix-blend-overlay">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent"></div>
            <div
                class="absolute -bottom-24 -left-24 w-64 h-64 bg-accent-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 text-center">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-widest mb-6">
                    Here To Help</div>
                <h1 class="text-4xl md:text-6xl font-serif font-bold text-white mb-6 drop-shadow-lg">Contact Us</h1>
                <p class="text-lg text-slate-300 max-w-2xl mx-auto font-light">We'd love to hear from you. Get in touch with
                    our team for reservations or general inquiries.</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 relative z-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div
                        class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-slate-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-slate-50 rounded-bl-full opacity-50"></div>

                        <h2 class="text-3xl font-serif font-bold text-slate-900 mb-8 relative z-10">Send us a Message</h2>

                        @if($errors->any())
                            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-6 py-4 rounded-r-xl mb-8 shadow-sm">
                                <ul class="list-disc list-inside text-sm font-medium">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6 relative z-10">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label for="name"
                                        class="block text-sm font-bold text-slate-700 uppercase tracking-widest mb-2">Your
                                        Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-accent-500 focus:ring-accent-500/20 bg-slate-50 focus:bg-white transition-colors duration-300">
                                </div>
                                <div>
                                    <label for="email"
                                        class="block text-sm font-bold text-slate-700 uppercase tracking-widest mb-2">Email
                                        Address</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-accent-500 focus:ring-accent-500/20 bg-slate-50 focus:bg-white transition-colors duration-300">
                                </div>
                            </div>

                            <div>
                                <label for="subject"
                                    class="block text-sm font-bold text-slate-700 uppercase tracking-widest mb-2">Subject</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-accent-500 focus:ring-accent-500/20 bg-slate-50 focus:bg-white transition-colors duration-300">
                            </div>

                            <div>
                                <label for="message"
                                    class="block text-sm font-bold text-slate-700 uppercase tracking-widest mb-2">Message</label>
                                <textarea name="message" id="message" rows="6" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-accent-500 focus:ring-accent-500/20 bg-slate-50 focus:bg-white transition-colors duration-300 resize-none"
                                    placeholder="How can we help you?">{{ old('message') }}</textarea>
                            </div>

                            <button type="submit"
                                class="w-full inline-flex items-center justify-center bg-accent-500 text-white hover:bg-accent-600 shadow-xl shadow-accent-500/20 px-8 py-4 rounded-xl font-bold text-lg transition-transform transform hover:-translate-y-1">
                                Send Message
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8">
                    <div
                        class="bg-slate-900 rounded-3xl shadow-2xl p-8 text-white relative overflow-hidden border border-slate-800">
                        <div
                            class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-accent-500 rounded-full opacity-10 filter blur-2xl">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-accent-500 rounded-full opacity-10 filter blur-2xl">
                        </div>

                        <h3 class="text-3xl font-serif font-bold mb-8 relative z-10">Get in Touch</h3>

                        <div class="space-y-8 relative z-10">
                            <div class="flex items-start gap-4 group">
                                <div
                                    class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-accent-500 transition-colors duration-300">
                                    <svg class="w-6 h-6 text-accent-500 group-hover:text-white transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Email</p>
                                    <a href="mailto:salpatcamp@yahoo.com"
                                        class="text-lg font-medium hover:text-accent-400 transition-colors">salpatcamp@yahoo.com</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 group">
                                <div
                                    class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-accent-500 transition-colors duration-300">
                                    <svg class="w-6 h-6 text-accent-500 group-hover:text-white transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Phone</p>
                                    <a href="tel:+255770307759"
                                        class="text-lg font-medium hover:text-accent-400 transition-colors">+255 0770 307
                                        759</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 group">
                                <div
                                    class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-accent-500 transition-colors duration-300">
                                    <svg class="w-6 h-6 text-accent-500 group-hover:text-white transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Address</p>
                                    <p class="text-lg font-medium">Falcon Street 1, Soweto Moshi<br>Kilimanjaro, Tanzania
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-gradient-to-br from-accent-500 to-accent-600 rounded-3xl p-8 text-white shadow-xl shadow-accent-500/20 transform hover:-translate-y-1 transition-transform">
                        <h4 class="text-xl font-bold mb-3 flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            24/7 Assistance
                        </h4>
                        <p class="text-accent-100 font-light leading-relaxed">Our reception is always available to ensure
                            your stay is flawless. Feel free to contact us any time.</p>
                    </div>
                </div>
            </div>
        </div>
@endsection