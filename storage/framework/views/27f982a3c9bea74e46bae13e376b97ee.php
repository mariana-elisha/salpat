<?php $__env->startSection('title', 'Gallery'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-slate-950 min-h-screen">
        <!-- Hero Section -->
        <div class="relative isolate overflow-hidden bg-slate-950 py-28 sm:py-36">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1496545672447-f699b503d270?ixlib=rb-4.0.3')] bg-cover bg-center opacity-30 filter grayscale mix-blend-overlay"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/60 via-slate-950/50 to-slate-950"></div>
            <!-- Decorative blobs -->
            <div class="absolute -top-32 -right-32 w-96 h-96 bg-accent-500 rounded-full blur-[120px] opacity-15 pointer-events-none"></div>
            <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-primary-500 rounded-full blur-[100px] opacity-10 pointer-events-none"></div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent-500/20 border border-accent-500/30 text-accent-300 text-xs font-bold uppercase tracking-widest mb-8 animate-fade-in">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-500 animate-pulse"></span>
                    Visual Journey
                </div>
                <h1 class="text-5xl md:text-7xl font-serif font-bold tracking-tight text-white mb-6 drop-shadow-xl animate-slide-up">
                    Our <span class="text-accent-400 italic">Experiences</span>
                </h1>
                <p class="text-lg md:text-xl leading-8 text-slate-300 max-w-2xl mx-auto font-light animate-slide-up animation-delay-200">
                    Explore our accommodations, scenic views, and the vibrant life within our sanctuary.
                </p>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 -mt-4 relative z-20 pb-0">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-[320px]">
                <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="group relative overflow-hidden rounded-3xl <?php echo e($loop->first ? 'md:col-span-2 row-span-2' : ''); ?> bg-slate-900 shadow-2xl gallery-item" style="animation-delay: <?php echo e($loop->index * 100); ?>ms">
                        <img src="<?php echo e(asset('storage/' . $gallery->image_path)); ?>"
                            alt="<?php echo e($gallery->title); ?>"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/30 to-transparent"></div>
                        <div class="absolute inset-0 bg-accent-500/0 group-hover:bg-accent-500/10 transition-colors duration-500"></div>
                        <div class="absolute inset-0 p-8 flex flex-col justify-end transform translate-y-3 group-hover:translate-y-0 transition-transform duration-500">
                            <h3 class="text-white text-2xl font-bold font-serif"><?php echo e($gallery->title); ?></h3>
                            <?php if($gallery->description): ?>
                                <p class="text-slate-300 text-sm mt-2 font-light opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-150">
                                    <?php echo e($gallery->description); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                        <!-- Zoom icon -->
                        <div class="absolute top-4 right-4 w-10 h-10 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 scale-75 group-hover:scale-100">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <!-- Placeholder if empty -->
                    <?php $__currentLoopData = [1, 2, 3, 4, 5]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="group relative overflow-hidden rounded-3xl bg-slate-900 shadow-xl gallery-item" style="animation-delay: <?php echo e($i * 100); ?>ms">
                            <div class="h-full w-full bg-slate-800 flex items-center justify-center">
                                <span class="text-slate-600 font-serif italic text-xl">Coming Soon</span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- CTA -->
        <div class="bg-slate-950 py-24 relative overflow-hidden mt-4">
            <div class="absolute inset-0 z-0">
                <div class="absolute w-[500px] h-[500px] rounded-full bg-accent-500 blur-[120px] -top-64 left-1/2 -translate-x-1/2 opacity-10"></div>
            </div>
            <div class="max-w-3xl mx-auto px-6 text-center relative z-10">
                <h3 class="text-4xl md:text-5xl font-serif font-bold text-white mb-6">Experience it <span class="text-accent-400 italic">for yourself</span></h3>
                <p class="text-slate-400 text-lg font-light mb-10">Don't just see it — live it. Book your stay and make your own memories.</p>
                <a href="<?php echo e(route('rooms.index')); ?>"
                    class="inline-flex items-center justify-center bg-accent-500 text-white hover:bg-accent-600 shadow-2xl shadow-accent-500/40 px-12 py-5 rounded-2xl font-bold text-xl transition-all hover:-translate-y-1 hover:scale-105">
                    Book Your Stay
                    <svg class="w-5 h-5 ml-3 animate-bounce-x" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
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

    .gallery-item { animation: slide-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) both; opacity: 0; }
    .gallery-delay-1 { animation-delay: 100ms; }
    .gallery-delay-2 { animation-delay: 200ms; }
    .gallery-delay-3 { animation-delay: 300ms; }
    .gallery-delay-4 { animation-delay: 400ms; }
    .gallery-delay-5 { animation-delay: 500ms; }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\salpat\resources\views/pages/gallery.blade.php ENDPATH**/ ?>