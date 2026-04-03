

<?php $__env->startSection('title', 'Manage Rooms'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">Rooms
                </h1>
                <p class="mt-1 text-sm text-slate-500">Manage hotel room inventory, pricing, and availability.</p>
            </div>
            <div class="mt-4 flex sm:ml-4 sm:mt-0">
                <?php if(auth()->user()->isAdmin() || auth()->user()->isReceptionist() || auth()->user()->isManager()): ?>
                    <?php
                        $createRoute = auth()->user()->isAdmin() ? route('admin.rooms.create') : 
                                     (auth()->user()->isManager() ? route('manager.rooms.create') : route('receptionist.rooms.create'));
                    ?>
                    <a href="<?php echo e($createRoute); ?>"
                        class="inline-flex items-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path
                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        Add Room
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Image</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Name/Type</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Capacity</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Price</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-slate-500">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-slate-500">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        <?php $__empty_1 = true; $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-slate-50">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <?php if($room->image): ?>
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="<?php echo e(asset('images/' . $room->image)); ?>" alt="<?php echo e($room->name); ?>">
                                    <?php else: ?>
                                        <div class="h-10 w-10 rounded-full bg-slate-100 flex items-center justify-center">
                                            <svg class="h-6 w-6 text-slate-300" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="text-sm font-medium text-slate-900"><?php echo e($room->name); ?></div>
                                    <div class="text-sm text-slate-500"><?php echo e($room->type); ?></div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    <?php echo e($room->capacity); ?> Guests
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-900">
                                    <div>$<?php echo e(number_format($room->price_per_night, 2)); ?></div>
                                    <div class="text-[10px] text-slate-500 font-bold tracking-tight"><?php echo e(number_format($room->tzs_price, 0)); ?> TZS</div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span
                                        class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 <?php echo e($room->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                        <?php echo e($room->is_available ? 'Available' : 'Unavailable'); ?>

                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                    <?php
                                        $editRoute = auth()->user()->isAdmin() ? route('admin.rooms.edit', $room) : 
                                                   (auth()->user()->isManager() ? route('manager.rooms.edit', $room) : route('receptionist.rooms.edit', $room));
                                        $deleteRoute = auth()->user()->isAdmin() ? route('admin.rooms.destroy', $room) : 
                                                     (auth()->user()->isManager() ? route('manager.rooms.destroy', $room) : route('receptionist.rooms.destroy', $room));
                                    ?>
                                    <a href="<?php echo e($editRoute); ?>" class="text-primary-600 hover:text-primary-900 mr-4">Edit</a>

                                    <?php if(auth()->user()->isAdmin()): ?>
                                        <form action="<?php echo e($deleteRoute); ?>" method="POST" class="inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this room?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                                    No rooms found. Get started by adding a new room.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php if($rooms->hasPages()): ?>
                <div class="border-t border-slate-200 bg-slate-50 px-4 py-3 sm:px-6">
                    <?php echo e($rooms->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sallpat\resources\views/admin/rooms/index.blade.php ENDPATH**/ ?>