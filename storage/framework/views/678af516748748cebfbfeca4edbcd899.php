<?php $__env->startSection('title', 'Concierge & Contact - Salpat Camp Lodge-Moshi'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white min-h-screen">
        <!-- Luxury Page Header -->
        <section class="relative h-[70vh] min-h-[600px] flex items-center justify-center bg-navy overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-1000 scale-105" 
                     style="background-image: url('<?php echo e(asset('images/pcs16.png')); ?>'); opacity: 0.4;"></div>
            </div>
            
            <!-- Luxury Gradient Overlay -->
            <div class="absolute inset-0 z-10 bg-gradient-to-b from-navy/80 via-navy/20 to-navy pointer-events-none"></div>

            <div class="relative z-20 text-center px-4 max-w-5xl mx-auto">
                <div class="inline-flex items-center gap-6 mb-8 animate-fade-in">
                    <div class="h-px w-12 bg-gold"></div>
                    <h2 class="text-gold font-black uppercase tracking-[0.6em] text-xs md:text-sm drop-shadow-lg">Est. 2024</h2>
                    <div class="h-px w-12 bg-gold"></div>
                </div>
                <h1 class="text-7xl md:text-[11rem] font-serif font-bold text-white mb-10 leading-none drop-shadow-3xl animate-slide-up tracking-tighter">
                    Reach <span class="italic font-normal text-gold block md:inline">Out</span>
                </h1>
                <div class="w-20 h-px bg-gold/50 mx-auto mb-10 animate-scale-x"></div>
                <p class="text-white text-xl md:text-2xl font-serif font-bold italic tracking-widest animate-fade-in animation-delay-300 drop-shadow-xl max-w-3xl mx-auto leading-relaxed">
                    Our team is ready to help you.
                </p>
            </div>
        </section>

        <!-- Main Contact Grid -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-40 relative z-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-24">
                
                <!-- Contact Info Column (Left) -->
                <div class="lg:col-span-4 space-y-20">
                    <div class="animate-slide-up">
                        <h3 class="text-[10px] font-bold text-gold uppercase tracking-[0.6em] mb-12 border-b border-gold/10 pb-6">Contact Information</h3>
                        
                        <div class="space-y-16">
                            <!-- Email -->
                            <div class="group">
                                <p class="text-[8px] font-bold text-slate-400 uppercase tracking-[0.4em] mb-4">Email Address</p>
                                <a href="mailto:salpatcamp@gmail.com" class="text-2xl md:text-3xl font-serif font-bold text-navy hover:text-gold transition-colors duration-500 block">
                                    salpatcamp@gmail.com
                                </a>
                            </div>

                            <!-- Phone -->
                            <div class="group">
                                <p class="text-[8px] font-bold text-slate-400 uppercase tracking-[0.4em] mb-4">Phone Number</p>
                                <a href="tel:+255770307759" class="text-2xl md:text-3xl font-serif font-bold text-navy hover:text-gold transition-colors duration-500 block">
                                    +255 770 307 759
                                </a>
                            </div>

                            <!-- Location -->
                            <div class="group">
                                <p class="text-[8px] font-bold text-slate-400 uppercase tracking-[0.4em] mb-4">Our Physical Address</p>
                                <address class="text-xl md:text-2xl font-serif font-bold text-navy not-italic leading-relaxed">
                                    Falcon Street 1, Soweto<br>
                                    Near Mount Kilimanjaro (Specialized climbing accommodation)
                                </address>
                            </div>
                        </div>
                    </div>

                    <!-- WhatsApp Luxury Button -->
                    <div class="animate-slide-up animation-delay-300">
                        <a href="https://wa.me/255770307759" target="_blank"
                           class="flex items-center justify-between bg-navy rounded-3xl p-8 text-gold border border-gold/20 hover:bg-gold hover:text-white transition-all duration-700 group shadow-2xl">
                            <div class="flex items-center gap-6">
                                <div class="w-14 h-14 bg-white/5 rounded-2xl flex items-center justify-center group-hover:bg-white/10 transition-colors shadow-inner">
                                    <i class="fab fa-whatsapp text-3xl"></i>
                                </div>
                                <div class="text-left">
                                    <p class="text-[9px] font-bold uppercase tracking-[0.3em] opacity-60">Instant Support</p>
                                    <p class="text-xl font-bold tracking-tight">WhatsApp Support</p>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-xs transform group-hover:translate-x-2 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- Contact Form Column (Right) -->
                <div class="lg:col-span-8">
                    <div class="bg-slate-50 rounded-[4rem] p-12 md:p-24 shadow-inner border border-slate-100 relative animate-slide-up animation-delay-200">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-[100px] opacity-60 -mr-32 -mt-32"></div>
                        
                        <div class="relative z-10">
                            <div class="mb-20">
                                <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6">Send a Message</h2>
                                <h3 class="text-5xl md:text-7xl font-serif font-bold text-navy leading-none">Contact <span class="italic font-normal text-gold block mt-2">Salpat Lodge</span></h3>
                            </div>

                            <form action="<?php echo e(route('contact.submit')); ?>" method="POST" class="space-y-16">
                                <?php echo csrf_field(); ?>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                                    <!-- Name -->
                                    <div class="relative group">
                                        <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" required
                                            class="w-full bg-transparent border-b-2 border-slate-200 py-6 text-xl font-serif text-navy focus:outline-none focus:border-gold transition-colors peer placeholder-transparent">
                                        <label for="name" class="absolute left-0 -top-4 text-[9px] font-bold text-slate-400 uppercase tracking-[0.3em] transition-all peer-placeholder-shown:text-xl peer-placeholder-shown:top-6 peer-placeholder-shown:text-slate-300 peer-focus:-top-4 peer-focus:text-gold peer-focus:text-[9px]">Your Name</label>
                                    </div>

                                    <!-- Email -->
                                    <div class="relative group">
                                        <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required
                                            class="w-full bg-transparent border-b-2 border-slate-200 py-6 text-xl font-serif text-navy focus:outline-none focus:border-gold transition-colors peer placeholder-transparent">
                                        <label for="email" class="absolute left-0 -top-4 text-[9px] font-bold text-slate-400 uppercase tracking-[0.3em] transition-all peer-placeholder-shown:text-xl peer-placeholder-shown:top-6 peer-placeholder-shown:text-slate-300 peer-focus:-top-4 peer-focus:text-gold peer-focus:text-[9px]">Your Email</label>
                                    </div>
                                </div>

                                <!-- Regarding -->
                                <div class="relative group">
                                    <input type="text" name="subject" id="subject" value="<?php echo e(old('subject')); ?>" required
                                        class="w-full bg-transparent border-b-2 border-slate-200 py-6 text-xl font-serif text-navy focus:outline-none focus:border-gold transition-colors peer placeholder-transparent">
                                    <label for="subject" class="absolute left-0 -top-4 text-[9px] font-bold text-slate-400 uppercase tracking-[0.3em] transition-all peer-placeholder-shown:text-xl peer-placeholder-shown:top-6 peer-placeholder-shown:text-slate-300 peer-focus:-top-4 peer-focus:text-gold peer-focus:text-[9px]">Subject</label>
                                </div>

                                <!-- Message -->
                                <div class="relative group">
                                    <textarea name="message" id="message" rows="5" required
                                        class="w-full bg-transparent border-b-2 border-slate-200 py-6 text-xl font-serif text-navy focus:outline-none focus:border-gold transition-colors peer placeholder-transparent resize-none"><?php echo e(old('message')); ?></textarea>
                                    <label for="message" class="absolute left-0 -top-4 text-[9px] font-bold text-slate-400 uppercase tracking-[0.3em] transition-all peer-placeholder-shown:text-xl peer-placeholder-shown:top-6 peer-placeholder-shown:text-slate-300 peer-focus:-top-4 peer-focus:text-gold peer-focus:text-[9px]">How may we serve you?</label>
                                </div>

                                <button type="submit"
                                    class="inline-flex items-center gap-6 bg-navy text-gold px-12 py-6 rounded-2xl font-bold uppercase tracking-[0.4em] text-[10px] hover:bg-gold hover:text-white transition-all transform hover:-translate-y-2 shadow-2xl shadow-navy/20 active:scale-95">
                                    Send Message
                                    <i class="fas fa-paper-plane text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Luxury Map Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-40">
            <div class="relative group rounded-[4rem] overflow-hidden shadow-3xl bg-navy p-6 border border-white/5 animate-slide-up">
                <div class="h-[700px] w-full rounded-[3.5rem] overflow-hidden relative">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.3644149864223!2d37.32356527584145!3d-3.354093635766205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1837119ff336b907%3A0xe53fa28983808b8b!2sSalpat%20Camp!5e0!3m2!1sen!2stz!4v1710264000000!5m2!1sen!2stz" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" 
                        class="grayscale contrast-[1.2] invert brightness-[0.8] transition-all duration-[2s] group-hover:grayscale-0 group-hover:invert-0 group-hover:brightness-100">
                    </iframe>
                    
                    <!-- High-End Location Card -->
                    <div class="absolute bottom-16 right-16 z-20 bg-white/95 backdrop-blur-3xl p-16 rounded-[3rem] shadow-4xl border border-white w-full max-w-md transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-1000">
                        <div class="flex items-center gap-6 mb-10">
                            <div class="w-16 h-16 bg-navy text-gold rounded-2xl flex items-center justify-center shadow-xl">
                                <i class="fas fa-location-arrow text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="text-[10px] font-bold text-gold uppercase tracking-[0.5em] mb-2">Our Sanctuary</h4>
                                <p class="text-3xl font-serif font-bold text-navy leading-none">The Lodge</p>
                            </div>
                        </div>
                        <p class="text-slate-500 font-light leading-relaxed italic mb-10">
                            Nestled in the heart of Soweto, Moshi, offering a panoramic gateway to the majestic Kilimanjaro.
                        </p>
                        <a href="https://maps.app.goo.gl/YourMapLink" target="_blank" class="text-[10px] font-bold text-navy uppercase tracking-[0.4em] border-b-2 border-gold/20 hover:border-gold transition-all pb-2">Get Directions</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    
    <a href="https://wa.me/255770307759" target="_blank"
        class="fixed bottom-10 right-10 z-50 w-20 h-20 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-[0_20px_60px_rgba(34,197,94,0.4)] flex items-center justify-center transition-all duration-500 hover:scale-110 group border-4 border-white">
        <i class="fab fa-whatsapp text-4xl group-hover:rotate-12 transition-transform"></i>
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    @keyframes slide-up {
        0%   { opacity: 0; transform: translateY(60px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes fade-in {
        0%   { opacity: 0; }
        100% { opacity: 1; }
    }
    @keyframes scale-x {
        0%   { transform: scaleX(0); }
        100% { transform: scaleX(1); }
    }
    .animate-slide-up   { animation: slide-up 1.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
    .animate-fade-in    { animation: fade-in 2s ease-out forwards; opacity: 0; }
    .animate-scale-x    { animation: scale-x 1.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; transform-origin: center; }
    .animation-delay-200{ animation-delay: 200ms; }
    .animation-delay-300{ animation-delay: 300ms; }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sallpat\resources\views/pages/contact.blade.php ENDPATH**/ ?>