<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('breadcrumbs', 'Overview'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-8">

    
    <div class="relative bg-slate-900 rounded-3xl p-8 overflow-hidden shadow-xl border border-slate-800">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
        <div class="absolute -top-16 -right-16 w-48 h-48 bg-accent-500 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute -bottom-16 -left-16 w-48 h-48 bg-primary-500 rounded-full blur-3xl opacity-10"></div>
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <p class="text-accent-400 text-xs font-bold uppercase tracking-widest mb-1">Control Center</p>
                <h1 class="text-3xl font-serif font-bold text-white">Admin Dashboard</h1>
                <p class="text-slate-400 mt-1 font-light">Full overview of Salpat Camp operations.</p>
            </div>
            <div class="text-right">
                <p class="text-slate-400 text-xs uppercase tracking-widest">Today</p>
                <p class="text-white font-bold"><?php echo e(now()->format('l, M d Y')); ?></p>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-primary-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-primary-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-primary-500/20 border border-primary-500/30 rounded-2xl flex items-center justify-center text-primary-400 group-hover:bg-primary-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Asset Base</p>
                    <p class="text-3xl font-black text-white leading-none"><?php echo e($stats['rooms'] ?? 0); ?> <span class="text-sm font-medium text-slate-400 ml-1 italic">Rooms</span></p>
                </div>
            </div>
        </div>

        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-emerald-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-emerald-500/20 border border-emerald-500/30 rounded-2xl flex items-center justify-center text-emerald-400 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Total Volume</p>
                    <p class="text-3xl font-black text-white leading-none"><?php echo e($stats['bookings'] ?? 0); ?> <span class="text-sm font-medium text-slate-400 ml-1 italic">Sales</span></p>
                </div>
            </div>
        </div>

        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-amber-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-amber-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-amber-500/20 border border-amber-500/30 rounded-2xl flex items-center justify-center text-amber-400 group-hover:bg-amber-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Pending Ops</p>
                    <p class="text-3xl font-black text-white leading-none"><?php echo e($stats['pending_bookings'] ?? 0); ?> <span class="text-sm font-medium text-slate-400 ml-1 italic">Waiting</span></p>
                </div>
            </div>
        </div>

        <div class="group bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 p-6 hover:border-blue-500/50 transition-all duration-500 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-blue-600/10 rounded-full -mr-12 -mt-12 blur-2xl"></div>
            <div class="relative z-10 flex items-center gap-5">
                <div class="w-14 h-14 bg-blue-500/20 border border-blue-500/30 rounded-2xl flex items-center justify-center text-blue-400 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Guest Network</p>
                    <p class="text-3xl font-black text-white leading-none"><?php echo e($stats['users'] ?? 0); ?> <span class="text-sm font-medium text-slate-400 ml-1 italic">Members</span></p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
        <div class="border-b border-slate-800 px-6 py-5 flex justify-between items-center bg-slate-800/30">
            <h3 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                <span class="w-1.5 h-6 bg-primary-500 rounded-full shadow-[0_0_15px_rgba(59,130,246,0.5)]"></span>
                Recent Reservations
            </h3>
            <a href="<?php echo e(route('admin.bookings')); ?>" class="text-[10px] font-bold text-slate-400 hover:text-white uppercase tracking-widest transition-colors">Global Log →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-800">
                <thead class="bg-slate-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Guest</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Room</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Check-in</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Total</th>
                        <th class="px-6 py-3 text-right text-xs font-bold text-slate-400 uppercase tracking-widest">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    <?php $__empty_1 = true; $__currentLoopData = $recentBookings ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-mono text-sm font-bold text-primary-500">#<?php echo e($booking->id); ?></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0 shadow-lg">
                                        <?php echo e(strtoupper(substr($booking->user?->name ?? $booking->guest_name ?? 'G', 0, 1))); ?>

                                    </div>
                                    <span class="text-sm font-semibold text-white"><?php echo e($booking->user?->name ?? 'Guest'); ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="text-white font-bold"><?php echo e($booking->room?->name ?? '—'); ?></span>
                                <?php if($booking->room?->room_number): ?>
                                    <span class="block text-[10px] text-primary-400 font-black uppercase tracking-widest mt-0.5">Room #<?php echo e($booking->room->room_number); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500"><?php echo e($booking->check_in ? \Carbon\Carbon::parse($booking->check_in)->format('M d, Y') : '—'); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if($booking->status === 'confirmed'): ?>
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs font-bold"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Confirmed</span>
                                <?php elseif($booking->status === 'pending'): ?>
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-amber-500/10 text-amber-500 border border-amber-500/20 text-xs font-bold"><span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>Pending</span>
                                <?php elseif($booking->status === 'cancelled'): ?>
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-red-500/10 text-red-400 border border-red-500/20 text-xs font-bold"><span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>Cancelled</span>
                                <?php else: ?>
                                    <span class="inline-flex px-3 py-1 rounded-lg bg-slate-800 text-slate-400 border border-slate-700 text-xs font-bold"><?php echo e(ucfirst($booking->status)); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-black text-white">$<?php echo e(number_format($booking->total_price ?? 0, 2)); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?php echo e(route('bookings.show', $booking)); ?>" class="text-xs font-bold text-white bg-slate-800 hover:bg-primary-600 border border-slate-700 px-4 py-2 rounded-xl transition-all">Details</a>
                                    <?php if($booking->status === 'confirmed'): ?>
                                        <form action="<?php echo e(route('bookings.checkin', $booking)); ?>" method="POST" class="inline-block">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-emerald-500/10 hover:bg-emerald-500 text-emerald-400 hover:text-white transition-all border border-emerald-500/20 text-xs font-bold">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                                                Check In
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    <?php if($booking->status === 'checked_in'): ?>
                                        <form action="<?php echo e(route('bookings.checkout', $booking)); ?>" method="POST" onsubmit="return confirm('Confirm check out?');" class="inline-block">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-blue-500/10 hover:bg-blue-500 text-blue-400 hover:text-white transition-all border border-blue-500/20 text-xs font-bold">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                                Check Out
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="w-16 h-16 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-3 border border-slate-700">
                                    <svg class="h-8 w-8 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                                </div>
                                <p class="text-sm font-semibold text-slate-300">No reservations records found</p>
                                <p class="text-xs text-slate-500 mt-1">Data will populate as bookings are secured.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
                <h3 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-primary-500 rounded-full shadow-[0_0_15px_rgba(59,130,246,0.3)]"></span>
                    Operational Intelligence
                </h3>
                <a href="<?php echo e(route('manager.activity_log.index')); ?>" class="text-[10px] font-bold text-slate-500 hover:text-white uppercase tracking-[0.2em] transition-colors">Audit Rail →</a>
            </div>
            <div class="divide-y divide-slate-800 overflow-y-auto max-h-[380px] custom-scrollbar">
                <?php $__empty_1 = true; $__currentLoopData = $recentActivity ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="p-4 hover:bg-white/5 transition-all flex items-start gap-4 border-l-2 border-transparent hover:border-primary-500">
                        <div class="w-9 h-9 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-primary-400 shrink-0 text-sm font-black shadow-lg">
                            <?php echo e(strtoupper(substr($log->user?->name ?? '?', 0, 1))); ?>

                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-slate-200"><span class="font-bold text-white tracking-tight"><?php echo e($log->user?->name ?? 'System'); ?></span> <span class="text-slate-400 lowercase"><?php echo e($log->action); ?></span></p>
                            <p class="text-[11px] text-slate-500 leading-relaxed truncate mt-1"><?php echo e($log->description); ?></p>
                        </div>
                        <p class="text-[9px] font-bold text-slate-600 uppercase tracking-tighter shrink-0 pt-1"><?php echo e($log->created_at->diffForHumans()); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="p-12 text-center text-slate-500 text-sm italic">No recent activity recorded.</div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-800 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-800/30">
                <h3 class="text-lg font-bold text-white font-serif flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-accent-500 rounded-full shadow-[0_0_15px_rgba(232,153,104,0.5)]"></span>
                    Staff Reports
                </h3>
                <a href="<?php echo e(route('staff_reports.index')); ?>" class="text-[10px] font-bold text-slate-400 hover:text-white uppercase tracking-widest transition-colors">Review →</a>
            </div>
            <div class="divide-y divide-slate-800">
                <?php $__empty_1 = true; $__currentLoopData = $recentReports ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e(route('staff_reports.show', $report)); ?>" class="block p-5 hover:bg-white/5 transition-all group">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-[10px] font-black px-2 py-0.5 rounded bg-accent-500/10 text-accent-400 border border-accent-500/20 uppercase tracking-widest"><?php echo e($report->section); ?></span>
                            <span class="text-[9px] font-bold text-slate-500 uppercase"><?php echo e(\Carbon\Carbon::parse($report->report_date)->format('M d')); ?></span>
                        </div>
                        <p class="text-sm font-bold text-white group-hover:text-accent-400 transition-colors truncate"><?php echo e($report->title); ?></p>
                        <p class="text-[11px] text-slate-500 mt-2 flex justify-between items-center italic">
                            <span>By <?php echo e($report->user?->name); ?></span>
                            <span class="bg-slate-800 px-2 py-0.5 rounded border border-slate-700 not-italic text-[9px] font-bold uppercase"><?php echo e($report->report_type); ?></span>
                        </p>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="py-12 text-center text-slate-600 text-sm font-medium italic">No strategic reports yet.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div>
        <h3 class="text-xs font-bold text-slate-500 uppercase tracking-[0.2em] mb-4">Strategic Fast-Tracks</h3>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <a href="<?php echo e(route('admin.rooms.index')); ?>"
                class="group flex items-center gap-4 bg-slate-900/50 backdrop-blur-xl border border-slate-800 rounded-2xl px-6 py-5 shadow-2xl hover:border-primary-500/50 hover:-translate-y-1 transition-all duration-500">
                <span class="w-12 h-12 bg-primary-500/20 rounded-xl flex items-center justify-center text-primary-400 group-hover:bg-primary-500 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" /></svg>
                </span>
                <div>
                    <p class="text-sm font-bold text-white group-hover:text-primary-400 transition-colors tracking-tight">Manage Inventory</p>
                    <p class="text-[11px] text-slate-500 font-medium">Control Rooms & Suites</p>
                </div>
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sallpat\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>