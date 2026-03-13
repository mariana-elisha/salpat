

<?php $__env->startSection('title', 'Welcome to Salpat Camp'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <div class="relative bg-slate-900 overflow-hidden flex flex-col items-center justify-center min-h-[90vh] pb-32">
        <div class="absolute inset-0 z-0 bg-black">
            <!-- Background Video -->
            <video id="hero-video" class="absolute inset-0 w-full h-full object-cover z-0 transition-opacity duration-1000 opacity-100" muted playsinline autoplay>
                <source src="<?php echo e(asset('images/salpatcamp env.mp4')); ?>" type="video/mp4">
            </video>
            
            <!-- Slideshow Container -->
            <div id="hero-slideshow" class="absolute inset-0 w-full h-full z-0 opacity-0 transition-opacity duration-1000"></div>

            <div
                class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/40 to-slate-900/90 mix-blend-multiply z-10">
            </div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8 text-center pt-24 mb-16">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-accent-500/30 bg-accent-500/10 backdrop-blur-sm mb-8 animate-fade-in">
                <span class="w-2 h-2 rounded-full bg-accent-500 animate-pulse"></span>
                <span class="text-xs font-bold uppercase tracking-widest text-accent-100">Experience Luxury Nature</span>
            </div>

            <h1
                class="text-5xl md:text-7xl lg:text-8xl font-serif font-bold text-white mb-6 drop-shadow-xl animate-slide-up">
                A Haven <span class="text-accent-400 italic font-medium">Near</span> <br> Kilimanjaro
            </h1>

            <p
                class="mt-6 text-lg md:text-xl text-slate-200 max-w-2xl mx-auto font-light leading-relaxed mb-12 animate-slide-up animation-delay-200">
                Immerse yourself in authentic comfort. Salpat Camp blends the spirit of adventure with premium hospitality.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-slide-up animation-delay-400">
                <a href="<?php echo e(route('rooms.index')); ?>"
                    class="w-full sm:w-auto px-8 py-4 bg-accent-500 hover:bg-accent-600 text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-accent-500/30 hover:-translate-y-1">
                    Book Your Stay Now
                </a>
                <a href="<?php echo e(route('gallery')); ?>"
                    class="w-full sm:w-auto px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-bold rounded-xl transition-all border border-white/20 hover:border-white/40 hover:-translate-y-1 backdrop-blur-sm">
                    Explore Gallery
                </a>
            </div>
        </div>
        
        <!-- Decorative bottom separator -->
        <div class="absolute bottom-0 inset-x-0 h-48 bg-gradient-to-t from-slate-50 to-transparent z-10 pointer-events-none"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 -mt-32 mb-20 animate-slide-up animation-delay-400">
        <!-- Booking Search Form -->
        <div
            class="rounded-3xl shadow-2xl p-8 border border-white/40 backdrop-blur-xl bg-white/80 w-full overflow-hidden relative">
            <div class="absolute inset-0 bg-gradient-to-br from-white/40 to-white/10 pointer-events-none"></div>
            <h2 class="text-2xl font-serif font-bold mb-6 text-slate-900 flex items-center gap-3 relative z-10">
                <span class="w-1.5 h-8 bg-accent-500 rounded-full"></span>
                Check Availability
            </h2>
            <form action="<?php echo e(route('rooms.index')); ?>" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6 relative z-10">
                <div>
                    <label for="check_in"
                        class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wider">Check-in</label>
                    <input type="date" name="check_in" id="check_in" value="<?php echo e(request('check_in')); ?>"
                        min="<?php echo e(date('Y-m-d')); ?>"
                        class="w-full border-slate-200 bg-white/50 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500 py-3 transition-colors hover:bg-white"
                        required>
                </div>
                <div>
                    <label for="check_out"
                        class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wider">Check-out</label>
                    <input type="date" name="check_out" id="check_out" value="<?php echo e(request('check_out')); ?>"
                        min="<?php echo e(date('Y-m-d', strtotime('+1 day'))); ?>"
                        class="w-full border-slate-200 bg-white/50 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500 py-3 transition-colors hover:bg-white"
                        required>
                </div>
                <div>
                    <label for="guests"
                        class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wider">Guests</label>
                    <select name="guests" id="guests"
                        class="w-full border-slate-200 bg-white/50 rounded-xl shadow-sm focus:border-accent-500 focus:ring-accent-500 py-3 transition-colors hover:bg-white"
                        required>
                        <?php for($i = 1; $i <= 10; $i++): ?>
                            <option value="<?php echo e($i); ?>" <?php echo e(request('guests', 1) == $i ? 'selected' : ''); ?>><?php echo e($i); ?>

                                <?php echo e(Str::plural('Guest', $i)); ?>

                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit"
                        class="w-full bg-accent-500 text-white px-6 py-3 rounded-xl hover:bg-accent-600 font-bold transition-all shadow-lg hover:shadow-accent-500/30 active:transform active:scale-95">
                        Search Rooms
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Featured Rooms -->
    <div class="bg-slate-50 relative pb-24 pt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 max-w-2xl mx-auto">
                <h2 class="text-primary-600 font-bold uppercase tracking-widest text-sm mb-3 mt-10">Curated Collection</h2>
                <h3 class="text-4xl md:text-5xl font-serif font-bold text-slate-900 mb-4">Featured Accommodations</h3>
                <div class="w-24 h-1 bg-accent-500 mx-auto rounded-full"></div>
                <p class="mt-6 text-slate-600 max-w-xl mx-auto font-medium text-lg">Discover our handpicked selection of premium rooms designed for your ultimate comfort.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <?php $__empty_1 = true; $__currentLoopData = $featuredRooms ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div
                        class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 overflow-hidden flex flex-col h-full hover:-translate-y-2">
                        <div class="relative overflow-hidden h-72">
                            <?php if($room->image): ?>
                                <img src="<?php echo e(asset('storage/' . $room->image)); ?>" alt="<?php echo e($room->name); ?>"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <?php else: ?>
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                            <div
                                class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-bold text-accent-600 uppercase tracking-widest shadow-lg">
                                <?php echo e($room->type); ?>

                            </div>
                        </div>

                        <div class="p-8 flex flex-col flex-grow bg-white">
                            <div class="flex flex-col mb-4">
                                <div class="flex justify-between items-start gap-4 mb-2">
                                    <h3 class="text-2xl font-serif font-bold text-slate-900 group-hover:text-accent-600 transition-colors">
                                        <?php echo e($room->name); ?>

                                        <?php if($room->room_number): ?>
                                            <span class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mt-1 italic">Room #<?php echo e($room->room_number); ?></span>
                                        <?php endif; ?>
                                    </h3>
                                    <div class="bg-accent-50 text-accent-600 px-4 py-2 rounded-xl flex flex-col items-center shrink-0 border border-accent-100">
                                        <span class="text-2xl font-bold leading-none">$<?php echo e(number_format($room->price_per_night, 0)); ?></span>
                                        <span class="text-[9px] font-black uppercase tracking-widest mt-1 opacity-70">Per Night</span>
                                    </div>
                                </div>
                                
                                <div class="text-accent-600 font-bold text-xs bg-accent-50/50 px-2 py-1 rounded w-fit">
                                    ~ <?php echo e(number_format($room->tzs_price, 0)); ?> TZS
                                </div>
                            </div>

                             <p class="text-slate-600 mb-4 flex-grow line-clamp-3 leading-relaxed font-light italic"><?php echo e($room->description); ?></p>

                            
                            <?php if($room->amenities && count($room->amenities) > 0): ?>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <?php $__currentLoopData = array_slice($room->amenities, 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wide border border-emerald-100">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    <?php echo e($amenity); ?>

                                </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if(count($room->amenities) > 4): ?>
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-slate-100 text-slate-500 text-[10px] font-bold uppercase tracking-wide border border-slate-200">
                                    +<?php echo e(count($room->amenities) - 4); ?> more
                                </span>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <div class="mt-auto pt-6 border-t border-slate-100 space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]"><?php echo e($room->type); ?> Selection</span>
                                    <a href="<?php echo e(route('rooms.show', $room)); ?>" class="text-[10px] font-bold text-accent-500 hover:text-accent-600 uppercase tracking-widest transition-colors">
                                        View Details →
                                    </a>
                                </div>
                                <?php
                                    $amenityList = ($room->amenities && count($room->amenities) > 0)
                                        ? implode(', ', $room->amenities)
                                        : 'Standard amenities';
                                    $resLine = $room->resident_price_per_night
                                        ? "\n💰 Resident Rate: TZS " . number_format($room->resident_price_per_night, 0) . " / night"
                                        : '';
                                    $roomNo = $room->room_number ? " (Room #" . $room->room_number . ")" : '';
                                    $waMsg =
                                        "🏕️ *SALPAT CAMP — ROOM RESERVATION REQUEST*\n" .
                                        "━━━━━━━━━━━━━━━━━━━━\n\n" .
                                        "📋 *Room Details*\n" .
                                        "🛏️ Room: *{$room->name}{$roomNo}*\n" .
                                        "🏷️ Type: " . ucfirst($room->type) . "\n" .
                                        "💵 Rate: $" . number_format($room->price_per_night, 0) . " USD / night\n" .
                                        "💴 Rate: TZS " . number_format($room->tzs_price, 0) . " / night" . $resLine . "\n" .
                                        "✨ Amenities: {$amenityList}\n\n" .
                                        "💳 *Payment Details*\n" .
                                        "🏦 Bank: CRDB BANK\n" .
                                        "👤 Account Holder: DAVID SALVATORY PATRICK\n" .
                                        "🔢 Account No (TZS): 0152269300100\n" .
                                        "🔢 Account No (USD): 0252269300100\n\n" .
                                        "Please confirm the availability of this room. Thank you! 🙏";
                                    $waUrl = "https://wa.me/255770307759?text=" . urlencode($waMsg);
                                ?>
                                <a href="<?php echo e($waUrl); ?>" target="_blank" rel="noopener noreferrer"
                                   class="w-full flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-5 rounded-2xl transition-all shadow-md hover:shadow-green-500/30 hover:-translate-y-0.5 text-sm">
                                    <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                    Reserve via WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-3 text-center py-20 bg-white rounded-3xl border border-slate-200">
                        <p class="text-slate-500 text-lg">No featured rooms available at the moment.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <!-- Features Section -->
    <div class="bg-white py-24 relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20">
                <h2 class="text-primary-600 font-bold uppercase tracking-widest text-sm mb-3">Our Distinction</h2>
                <h3 class="text-4xl font-serif font-bold text-slate-900">Elevating Your Journey</h3>
                <div class="w-24 h-1 bg-accent-500 mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 lg:gap-16">
                <!-- Feature 1 -->
                <div
                    class="bg-slate-50 rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                    <div
                        class="w-16 h-16 rounded-2xl bg-white text-primary-600 shadow-sm flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-primary-600 group-hover:text-white transition-all">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3 font-serif">Premium Accommodation</h4>
                    <p class="text-slate-600 leading-relaxed">Relax in meticulously designed rooms that prioritize your
                        comfort after a long day of adventuring.</p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-slate-50 rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                    <div
                        class="w-16 h-16 rounded-2xl bg-white text-accent-600 shadow-sm flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-accent-500 group-hover:text-white transition-all">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3 font-serif">Exquisite Dining</h4>
                    <p class="text-slate-600 leading-relaxed">Savor locally inspired dishes and international cuisine
                        crafted by our expert resident chefs.</p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-slate-50 rounded-3xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                    <div
                        class="w-16 h-16 rounded-2xl bg-white text-primary-600 shadow-sm flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-primary-600 group-hover:text-white transition-all">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3 font-serif">Strategic Location</h4>
                    <p class="text-slate-600 leading-relaxed">Perfectly situated in Moshi, offering easy access to
                        Kilimanjaro and beautiful city environments.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-primary-900 py-24 relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute w-[500px] h-[500px] rounded-full bg-accent-500 blur-[80px] -top-48 -left-48"></div>
            <div class="absolute w-[400px] h-[400px] rounded-full bg-primary-400 blur-[80px] bottom-0 right-0"></div>
        </div>

        <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-white mb-6">Discover Your Perfect Stay</h2>
            <p class="text-xl text-primary-100 mb-10 font-light">Join the countless guests who have made Salpat Camp their
                home away from home. Availability is limited during peak seasons.</p>

            <a href="<?php echo e(route('rooms.index')); ?>"
                class="inline-flex items-center gap-3 px-8 py-4 bg-white text-primary-700 font-bold rounded-xl transition-all shadow-xl hover:shadow-2xl hover:-translate-y-1 hover:bg-primary-50">
                <span>View Availability</span>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
    
    <!-- Map Section -->
    <div class="bg-slate-50 py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 max-w-2xl mx-auto">
                <h2 class="text-primary-600 font-bold uppercase tracking-widest text-sm mb-3">Location</h2>
                <h3 class="text-4xl md:text-5xl font-serif font-bold text-slate-900 mb-4">Where to Find Us</h3>
                <div class="w-24 h-1 bg-accent-500 mx-auto rounded-full"></div>
                <p class="mt-6 text-slate-600 max-w-xl mx-auto font-medium text-lg text-center">Visit us at Falcon Street 1, Soweto Moshi. We are perfectly situated for your Kilimanjaro adventure.</p>
            </div>

            <div class="bg-white rounded-[3rem] p-4 shadow-2xl border border-slate-100 relative overflow-hidden group">
                <div class="relative h-[500px] w-full rounded-[2.5rem] overflow-hidden shadow-inner">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.3644149864223!2d37.32356527584145!3d-3.354093635766205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1837119ff336b907%3A0xe53fa28983808b8b!2sSalpat%20Camp!5e0!3m2!1sen!2stz!4v1710264000000!5m2!1sen!2stz" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="grayscale-[10%] group-hover:grayscale-0 transition-all duration-1000">
                    </iframe>
                </div>
                
                <!-- Map Overlay Label -->
                <div class="absolute top-10 right-10 z-20 bg-white/90 backdrop-blur-md px-6 py-4 rounded-2xl border border-slate-200 shadow-xl hidden md:flex items-center gap-4 animate-fade-in">
                    <div class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Moshi, Tanzania</p>
                        <p class="text-base font-serif font-bold text-slate-900">Salpat Camp</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <a href="https://wa.me/255770307759" target="_blank"
        class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-green-500/40">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
        </svg>
    </a>

    <!-- Scripts for Hero Slideshow -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('hero-video');
            const slideshowContainer = document.getElementById('hero-slideshow');
            
            let images = [
                "<?php echo e(asset('images/pcs1.jpeg')); ?>",
                "<?php echo e(asset('images/pcs2.jpeg')); ?>",
                "<?php echo e(asset('images/pcs3.jpeg')); ?>",
                "<?php echo e(asset('images/pcs4.png')); ?>",
                "<?php echo e(asset('images/pcs5.png')); ?>",
                "<?php echo e(asset('images/pcs6.png')); ?>",
                "<?php echo e(asset('images/pcs7.png')); ?>",
                "<?php echo e(asset('images/pcs8.png')); ?>",
                "<?php echo e(asset('images/pcs9.png')); ?>",
                "<?php echo e(asset('images/pcs10.png')); ?>",
                "<?php echo e(asset('images/pcs11.png')); ?>",
                "<?php echo e(asset('images/pcs12.png')); ?>",
                "<?php echo e(asset('images/pcs13.png')); ?>",
                "<?php echo e(asset('images/pcs14.png')); ?>",
                "<?php echo e(asset('images/pcs15.jpeg')); ?>",
                "<?php echo e(asset('images/pcs16.png')); ?>",
                "<?php echo e(asset('images/pcs17.png')); ?>",
                "<?php echo e(asset('images/pcs18.png')); ?>"
            ];
            
            let currentImageIndex = 0;
            let slideInterval;

            function updateSlide() {
                if (!slideshowContainer) return;

                const nextSlide = document.createElement('div');
                nextSlide.className = 'absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-1000 opacity-0';
                nextSlide.style.backgroundImage = `url('${images[currentImageIndex]}')`;
                slideshowContainer.appendChild(nextSlide);
                
                // Trigger reflow
                void nextSlide.offsetWidth;
                
                nextSlide.classList.replace('opacity-0', 'opacity-100');
                
                setTimeout(() => {
                    const slides = slideshowContainer.querySelectorAll('div');
                    if (slides.length > 2) {
                        slides[0].remove();
                    }
                }, 1000);
                
                currentImageIndex = (currentImageIndex + 1) % images.length;
            }

            if (video) {
                video.addEventListener('ended', function() {
                    video.classList.replace('opacity-100', 'opacity-0');
                    slideshowContainer.classList.replace('opacity-0', 'opacity-100');
                    updateSlide();
                    slideInterval = setInterval(updateSlide, 4000);
                });
                
                let playPromise = video.play();
                if (playPromise !== undefined) {
                    playPromise.catch(e => {
                        // Autoplay blocked, just show slideshow immediately
                        video.classList.replace('opacity-100', 'opacity-0');
                        slideshowContainer.classList.replace('opacity-0', 'opacity-100');
                        updateSlide();
                        slideInterval = setInterval(updateSlide, 4000);
                    });
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        @keyframes slide-up {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        .animate-slide-up {
            animation: slide-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        .animate-fade-in {
            animation: fade-in 1s ease-out forwards;
            opacity: 0;
        }
        .animation-delay-200 { animation-delay: 200ms; }
        .animation-delay-400 { animation-delay: 400ms; }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\salpat\resources\views/home.blade.php ENDPATH**/ ?>