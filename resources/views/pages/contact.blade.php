@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="bg-slate-50 min-h-screen pb-24">
        <!-- Hero Section -->
        <div class="relative bg-slate-900 py-28 sm:py-36 overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1596524430615-b46475ddff6e?ixlib=rb-4.0.3')] bg-cover bg-center opacity-20 filter grayscale mix-blend-overlay"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/40 to-slate-900/90"></div>
            <!-- Decorative blobs -->
            <div class="absolute -top-32 -right-32 w-96 h-96 bg-accent-500 rounded-full blur-[100px] opacity-20 pointer-events-none"></div>
            <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-primary-500 rounded-full blur-[100px] opacity-10 pointer-events-none"></div>
            <!-- Bottom fade -->
            <div class="absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-slate-50 to-transparent z-10 pointer-events-none"></div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-widest mb-8 animate-fade-in">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-500 animate-pulse"></span>
                    Here To Help
                </div>
                <h1 class="text-5xl md:text-7xl font-serif font-bold text-white mb-6 drop-shadow-xl animate-slide-up">
                    Contact <span class="text-accent-400 italic">Us</span>
                </h1>
                <p class="text-lg md:text-xl text-slate-300 max-w-2xl mx-auto font-light animate-slide-up animation-delay-200">
                    We'd love to hear from you. Get in touch with our team for reservations or general inquiries.
                </p>
            </div>
        </div>

        <!-- Stats strip -->
        <div class="max-w-5xl mx-auto px-4 -mt-6 relative z-20 mb-16">
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-xl border border-white/40 grid grid-cols-3 divide-x divide-slate-100 overflow-hidden">
                <div class="px-8 py-6 text-center">
                    <p class="text-3xl font-bold text-slate-900 font-serif">24/7</p>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Support</p>
                </div>
                <div class="px-8 py-6 text-center">
                    <p class="text-3xl font-bold text-accent-500 font-serif">~1h</p>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Response Time</p>
                </div>
                <div class="px-8 py-6 text-center">
                    <p class="text-3xl font-bold text-slate-900 font-serif">100%</p>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Satisfaction</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl p-8 md:p-12 border border-white/40 relative overflow-hidden animate-slide-up animation-delay-400">
                        <!-- Decorative corner -->
                        <div class="absolute top-0 right-0 w-48 h-48 bg-accent-500/5 rounded-full -mr-24 -mt-24 blur-2xl"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-primary-500/5 rounded-full -ml-16 -mb-16 blur-xl"></div>

                        <div class="relative z-10">
                            <div class="flex items-center gap-3 mb-8">
                                <span class="w-1.5 h-10 bg-accent-500 rounded-full"></span>
                                <h2 class="text-3xl font-serif font-bold text-slate-900">Send us a Message</h2>
                            </div>

                            @if($errors->any())
                                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-6 py-4 rounded-r-2xl mb-8 shadow-sm">
                                    <ul class="list-disc list-inside text-sm font-medium">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label for="name" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Your Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                            class="w-full px-4 py-3.5 rounded-xl border border-slate-200 focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 bg-slate-50 focus:bg-white transition-all duration-300 font-medium text-slate-700"
                                            placeholder="John Doe">
                                    </div>
                                    <div class="group">
                                        <label for="email" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Email Address</label>
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                            class="w-full px-4 py-3.5 rounded-xl border border-slate-200 focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 bg-slate-50 focus:bg-white transition-all duration-300 font-medium text-slate-700"
                                            placeholder="you@example.com">
                                    </div>
                                </div>

                                <div>
                                    <label for="subject" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Subject</label>
                                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                                        class="w-full px-4 py-3.5 rounded-xl border border-slate-200 focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 bg-slate-50 focus:bg-white transition-all duration-300 font-medium text-slate-700"
                                        placeholder="How can we help you?">
                                </div>

                                <div>
                                    <label for="message" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Message</label>
                                    <textarea name="message" id="message" rows="6" required
                                        class="w-full px-4 py-3.5 rounded-xl border border-slate-200 focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 bg-slate-50 focus:bg-white transition-all duration-300 resize-none font-medium text-slate-700"
                                        placeholder="Tell us more about your inquiry…">{{ old('message') }}</textarea>
                                </div>

                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center bg-accent-500 text-white hover:bg-accent-600 shadow-xl shadow-accent-500/30 px-8 py-5 rounded-2xl font-bold text-lg transition-all hover:-translate-y-1 hover:scale-[1.01]">
                                    Send Message
                                    <svg class="w-5 h-5 ml-2 animate-bounce-x" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="space-y-6 animate-slide-up animation-delay-600">
                    <div class="bg-slate-900 rounded-3xl shadow-2xl p-8 text-white relative overflow-hidden border border-slate-800">
                        <div class="absolute top-0 right-0 w-48 h-48 bg-accent-500 rounded-full opacity-10 filter blur-3xl pointer-events-none"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-primary-400 rounded-full opacity-10 filter blur-3xl pointer-events-none"></div>

                        <div class="flex items-center gap-3 mb-8 relative z-10">
                            <span class="w-1.5 h-10 bg-accent-500 rounded-full"></span>
                            <h3 class="text-2xl font-serif font-bold">Get in Touch</h3>
                        </div>

                        <div class="space-y-6 relative z-10">
                            <div class="flex items-start gap-4 group">
                                <div class="w-12 h-12 bg-slate-800 border border-slate-700 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-accent-500 group-hover:border-accent-500 transition-all duration-300">
                                    <svg class="w-5 h-5 text-accent-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Email</p>
                                    <a href="mailto:salpatcamp@gmail.com" class="text-base font-semibold hover:text-accent-400 transition-colors">salpatcamp@gmail.com</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 group">
                                <div class="w-12 h-12 bg-slate-800 border border-slate-700 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-accent-500 group-hover:border-accent-500 transition-all duration-300">
                                    <svg class="w-5 h-5 text-accent-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Phone</p>
                                    <a href="tel:+255770307759" class="text-base font-semibold hover:text-accent-400 transition-colors">+255 0770 307 759</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 group">
                                <div class="w-12 h-12 bg-slate-800 border border-slate-700 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-accent-500 group-hover:border-accent-500 transition-all duration-300">
                                    <svg class="w-5 h-5 text-accent-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Address</p>
                                    <p class="text-base font-semibold leading-relaxed">Falcon Street 1, Soweto Moshi<br>Kilimanjaro, Tanzania</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- WhatsApp CTA -->
                    <a href="https://wa.me/255770307759" target="_blank"
                        class="flex items-center gap-4 bg-green-500 hover:bg-green-600 rounded-3xl p-6 text-white shadow-xl shadow-green-500/30 transition-all hover:-translate-y-1 group">
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-lg">Chat on WhatsApp</p>
                            <p class="text-green-100 text-sm font-light">Quick replies, anytime</p>
                        </div>
                    </a>

                    <!-- 24/7 card -->
                    <div class="bg-gradient-to-br from-accent-500 to-accent-700 rounded-3xl p-8 text-white shadow-xl shadow-accent-500/20 hover:-translate-y-1 transition-transform">
                        <div class="flex items-center gap-3 mb-3">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h4 class="text-xl font-bold">24/7 Assistance</h4>
                        </div>
                        <p class="text-accent-100 font-light leading-relaxed">Our reception is always available to ensure your stay is flawless. Contact us any time.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 animate-slide-up animation-delay-600">
            <div class="bg-white rounded-[2.5rem] p-4 shadow-2xl border border-slate-100 relative overflow-hidden group">
                <div class="absolute inset-0 bg-slate-900/5 group-hover:bg-transparent transition-colors duration-500 pointer-events-none z-10"></div>
                <div class="relative h-[450px] w-full rounded-[2rem] overflow-hidden shadow-inner">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.3644149864223!2d37.32356527584145!3d-3.354093635766205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1837119ff336b907%3A0xe53fa28983808b8b!2sSalpat%20Camp!5e0!3m2!1sen!2stz!4v1710264000000!5m2!1sen!2stz" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="grayscale-[20%] contrast-[110%] group-hover:grayscale-0 transition-all duration-700">
                    </iframe>
                </div>
                
                <!-- Map Overlay Label -->
                <div class="absolute bottom-10 left-10 z-20 bg-slate-900/90 backdrop-blur-md text-white px-6 py-4 rounded-2xl border border-white/10 shadow-2xl flex items-center gap-4">
                    <div class="w-10 h-10 bg-accent-500 rounded-xl flex items-center justify-center shadow-lg shadow-accent-500/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Our Location</p>
                        <p class="text-lg font-serif font-bold">Salpat Camp, Moshi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- WhatsApp Floating Button --}}
    <a href="https://wa.me/255770307759" target="_blank"
        class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-green-500/40">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
@endsection

@push('styles')
<style>
    @keyframes slide-up {
        0%   { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes fade-in {
        0%   { opacity: 0; }
        100% { opacity: 1; }
    }
    @keyframes bounce-x {
        0%, 100% { transform: translateX(0); }
        50%       { transform: translateX(5px); }
    }
    .animate-slide-up   { animation: slide-up 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
    .animate-fade-in    { animation: fade-in 1.2s ease-out forwards; opacity: 0; }
    .animate-bounce-x   { animation: bounce-x 1.5s ease-in-out infinite; }
    .animation-delay-200{ animation-delay: 200ms; }
    .animation-delay-400{ animation-delay: 400ms; }
    .animation-delay-600{ animation-delay: 600ms; }
</style>
@endpush