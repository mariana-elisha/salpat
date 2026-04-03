

<?php $__env->startSection('title', 'The Legacy - Salpat Luxury Sanctuary'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white min-h-screen bg-[url('https://www.transparenttextures.com/patterns/gplay.png')]">
        <!-- Luxury Page Header -->
        <section class="relative h-[65vh] min-h-[500px] flex items-center justify-center bg-navy overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-1000" style="background-image: url('<?php echo e(asset('images/pcs16.png')); ?>'); opacity: 0.3;"></div>
            </div>
            
            <!-- Luxury Gradient Overlay -->
            <div class="absolute inset-0 z-10 bg-gradient-to-b from-navy/60 via-transparent to-navy pointer-events-none"></div>

            <div class="relative z-20 text-center px-4 max-w-5xl mx-auto mt-20">
                <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] md:text-xs mb-8 animate-fade-in text-center mx-auto">Our History</h2>
                <h1 class="text-6xl md:text-9xl font-serif font-bold text-white mb-10 leading-tight drop-shadow-2xl animate-slide-up text-center">
                    Our <span class="italic font-normal text-gold">Story</span>
                </h1>
                <div class="w-16 h-px bg-gold/40 mx-auto animate-scale-x"></div>
            </div>
        </section>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-30 pb-40 space-y-40">

            <!-- Story Section -->
            <section class="relative animate-slide-up">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    <!-- Image Showcase -->
                    <div class="lg:col-span-6 relative">
                        <div class="relative group">
                            <!-- Background Accent -->
                            <div class="absolute -top-12 -left-12 w-64 h-64 bg-gold/5 rounded-full blur-3xl animate-pulse"></div>
                            
                            <!-- Main Frame -->
                            <div class="relative rounded-[4rem] overflow-hidden shadow-4xl border-8 border-white group-hover:-translate-y-4 transition-all duration-1000">
                                <img src="<?php echo e(asset('images/pcs17.png')); ?>"
                                    alt="Salpat Luxury Exterior"
                                    class="w-full object-cover h-[800px] scale-105 group-hover:scale-100 transition-transform duration-[3s]">
                                <div class="absolute inset-0 bg-navy/10 group-hover:bg-transparent transition-colors duration-1000"></div>
                            </div>

                        </div>
                    </div>

                    <!-- Text Narrative -->
                    <div class="lg:col-span-1"></div>
                    <div class="lg:col-span-5 space-y-16 py-12">
                        <div class="space-y-10">
                            <div class="inline-flex items-center gap-6">
                                <div class="w-16 h-px bg-gold"></div>
                                <h2 class="text-gold font-bold uppercase tracking-[0.6em] text-[10px]">A Great Place in Moshi</h2>
                            </div>
                            
                            <h3 class="text-6xl md:text-8xl font-serif font-bold text-navy leading-[1.1] tracking-tight">
                                The Art of <br>
                                <span class="text-gold italic font-normal">Great Service</span>
                            </h3>

                            <div class="space-y-10 text-slate-500 font-light leading-relaxed text-xl text-justify">
                                <p class="first-letter:text-7xl first-letter:font-serif first-letter:font-bold first-letter:text-gold first-letter:mr-4 first-letter:float-left first-letter:leading-[0.8]">
                                    Salpat Camp is a premium lodge located in the peaceful Soweto district of Moshi. While located near the mountain, we specialize in providing dedicated accommodations primarily for those embarking on mountain climbing expeditions. We are dedicated to providing a superior experience for tourists, families, and business travelers, offering high-quality accommodation and genuine Tanzanian hospitality for a perfect stay.
                                </p>
                                <p class="italic text-slate-400">
                                    "Whether you're preparing for climbing Kilimanjaro, going on a safari, or visiting for business, our well-designed rooms offer the perfect place for you."
                                </p>
                            </div>
                        </div>

                        <!-- Highlights -->
                        <div class="grid grid-cols-2 gap-12 pt-8 border-t border-slate-100">
                            <div class="space-y-4">
                                <div class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center text-gold border border-gold/10">
                                    <i class="fas fa-gem text-xl"></i>
                                </div>
                                <h4 class="text-navy font-serif font-bold text-xl uppercase tracking-widest">Quality</h4>
                                <p class="text-xs text-slate-400 leading-relaxed font-light">Well designed guest experiences.</p>
                            </div>
                            <div class="space-y-4">
                                <div class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center text-gold border border-gold/10">
                                    <i class="fas fa-crown text-xl"></i>
                                </div>
                                <h4 class="text-navy font-serif font-bold text-xl uppercase tracking-widest">Elite</h4>
                                <p class="text-xs text-slate-400 leading-relaxed font-light">Refining the standards of prestige.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Mission & Vision Split -->
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-0 rounded-[4rem] overflow-hidden shadow-4xl animate-slide-up">
                <div class="bg-navy p-20 md:p-32 flex flex-col justify-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-gold/5 -mr-32 -mt-32 rounded-full blur-3xl"></div>
                    <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-12">Our Mission</h2>
                    <h3 class="text-4xl md:text-5xl font-serif font-bold text-white mb-10 leading-tight">Helping <span class="italic font-normal text-gold italic">All Travelers</span></h3>
                    <p class="text-white/60 font-light leading-relaxed text-lg balance italic">
                        To provide a comfortable experience that combines Tanzanian kindness with good service, making sure every guest has a happy stay.
                    </p>
                </div>
                <div class="bg-gold p-20 md:p-32 flex flex-col justify-center relative overflow-hidden">
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-navy/5 -ml-32 -mb-32 rounded-full blur-3xl"></div>
                    <h2 class="text-white font-bold uppercase tracking-[0.5em] text-[10px] mb-12">Our Vision</h2>
                    <h3 class="text-4xl md:text-5xl font-serif font-bold text-navy mb-10 leading-tight">Modern <span class="italic font-normal text-white">Comfort for All</span></h3>
                    <p class="text-navy/70 font-light leading-relaxed text-lg balance italic">
                        To be the best lodge in Moshi, known for modern design and the highest standards of comfort in East Africa.
                    </p>
                </div>
            </section>

            <!-- Values Section -->
            <section class="animate-slide-up">
                <div class="text-center mb-32">
                    <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-6 underline decoration-gold/20 underline-offset-8">Discerning Values</h2>
                    <h3 class="text-5xl md:text-7xl font-serif font-bold text-navy tracking-tight">Excellence in <span class="italic font-normal text-gold">Every Detail</span></h3>
                    <div class="w-16 h-px bg-gold/40 mx-auto mt-12"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                    <?php $__currentLoopData = [
                        ['icon' => 'crown', 'title' => 'Elite Comfort', 'desc' => 'Spacious accommodations with bespoke amenities thoughtfully curated for your ultimate distinction.'],
                        ['icon' => 'user-clock', 'title' => 'Concierge 24/7', 'desc' => 'Our dedicated professional staff is always available around the clock to cater to your every whim.'],
                        ['icon' => 'heart', 'title' => 'Heritage Grace', 'desc' => 'Experience genuine Tanzanian warmth that makes every resident feel like the master of the house.'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white p-16 rounded-[4rem] shadow-2xl shadow-navy/5 border border-slate-50 text-center group relative overflow-hidden hover:shadow-navy/20 hover:-translate-y-6 transition-all duration-1000">
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-gold scale-x-0 group-hover:scale-x-100 transition-transform duration-1000 origin-center"></div>
                        <div class="w-24 h-24 mx-auto mb-10 bg-slate-50 text-gold rounded-full flex items-center justify-center group-hover:bg-navy group-hover:text-gold transition-all duration-1000 shadow-inner group-hover:rotate-[360deg]">
                            <i class="fas fa-<?php echo e($value['icon']); ?> text-3xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold font-serif text-navy mb-8 group-hover:text-gold transition-colors"><?php echo e($value['title']); ?></h3>
                        <p class="text-slate-500 font-light leading-relaxed text-sm italic"><?php echo e($value['desc']); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>

            <!-- CTA -->
            <section class="bg-navy rounded-[5rem] p-24 md:p-40 text-center relative overflow-hidden shadow-4xl border border-white/5">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/black-linen.png')] opacity-10"></div>
                <!-- Decorative Gold Accent -->
                <div class="absolute -top-32 -right-32 w-96 h-96 bg-gold/10 rounded-full blur-3xl"></div>
                
                <div class="relative z-10 max-w-4xl mx-auto">
                    <h2 class="text-gold font-bold uppercase tracking-[0.5em] text-[10px] mb-12">Book Your Stay</h2>
                    <h3 class="text-5xl md:text-9xl font-serif font-bold text-white mb-16 leading-none">Your Private <br><span class="italic font-normal text-gold">Lodge</span></h3>
                    <p class="text-slate-400 font-light mb-20 text-xl md:text-2xl leading-relaxed max-w-2xl mx-auto italic">
                        Whether you are climbing the mountain or just relaxing in Moshi, experience our kindness and great service.
                    </p>
                    <a href="<?php echo e(route('rooms.index')); ?>"
                        class="inline-block bg-gold hover:bg-white hover:text-navy text-white px-20 py-8 rounded-3xl font-black uppercase tracking-[0.4em] text-[10px] transition-all transform hover:-translate-y-2 shadow-2xl shadow-gold/20">
                        Book Your Stay Now
                    </a>
                </div>
            </section>
        </div>
    </div>
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
    
    .shadow-4xl { box-shadow: 0 50px 150px -30px rgba(11, 16, 33, 0.15); }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\salpat\resources\views/pages/about.blade.php ENDPATH**/ ?>