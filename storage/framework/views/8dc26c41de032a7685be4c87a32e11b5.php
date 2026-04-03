

<?php $__env->startSection('title', 'Edit Room'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-3xl mx-auto">
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">Edit Room:
                    <?php echo e($room->name); ?></h2>
            </div>
            <div class="mt-4 flex md:ml-4 md:mt-0">
                <?php
                    $backRoute = auth()->user()->isAdmin() ? route('admin.rooms.index') : 
                               (auth()->user()->isManager() ? route('manager.rooms.index') : route('receptionist.rooms.index'));
                ?>
                <a href="<?php echo e($backRoute); ?>"
                    class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50">
                    Back to List
                </a>
            </div>
        </div>

        <div class="bg-white shadow-sm ring-1 ring-slate-900/5 sm:rounded-xl md:col-span-2">
            <?php
                $updateRoute = auth()->user()->isAdmin() ? route('admin.rooms.update', $room) : 
                             (auth()->user()->isManager() ? route('manager.rooms.update', $room) : route('receptionist.rooms.update', $room));
            ?>
            <form action="<?php echo e($updateRoute); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                
                <?php if($errors->any()): ?>
                    <div class="m-8 p-4 rounded-xl bg-red-500/10 border border-red-500/20">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-bold text-red-100 uppercase tracking-widest">There were errors with your submission</h3>
                                <div class="mt-2 text-sm text-red-200/80">
                                    <ul role="list" class="list-disc space-y-1 pl-5">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="name" class="block text-sm font-medium leading-6 text-slate-900">Room
                                Name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" autocomplete="off" required
                                    value="<?php echo e(old('name', $room->name)); ?>"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            </div>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="room_number" class="block text-sm font-medium leading-6 text-slate-900">Room Number</label>
                            <div class="mt-2">
                                <input type="text" name="room_number" id="room_number" autocomplete="off"
                                    value="<?php echo e(old('room_number', $room->room_number)); ?>"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            </div>
                            <?php $__errorArgs = ['room_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="type" class="block text-sm font-medium leading-6 text-slate-900">Type</label>
                            <div class="mt-2">
                                <select id="type" name="type"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                                    <?php $__currentLoopData = ['Single', 'Double', 'Family', 'Suite', 'Tent']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type); ?>"
                                            <?php echo e(old('type', $room->type) == $type ? 'selected' : ''); ?>><?php echo e($type); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="price_per_night" class="block text-sm font-medium leading-6 text-slate-900">Non-Resident Price ($)</label>
                            <div class="mt-2">
                                <input type="number" name="price_per_night" id="price_per_night" step="0.01" min="0" required
                                    value="<?php echo e(old('price_per_night', $room->price_per_night)); ?>"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            </div>
                            <?php $__errorArgs = ['price_per_night'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="resident_price_per_night" class="block text-sm font-medium leading-6 text-slate-900">Resident Price (TSH)</label>
                            <div class="mt-2">
                                <input type="number" name="resident_price_per_night" id="resident_price_per_night" step="0.01" min="0"
                                    value="<?php echo e(old('resident_price_per_night', $room->resident_price_per_night)); ?>"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            </div>
                            <?php $__errorArgs = ['resident_price_per_night'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="capacity" class="block text-sm font-medium leading-6 text-slate-900">Max
                                Capacity</label>
                            <div class="mt-2">
                                <input type="number" name="capacity" id="capacity" min="1" required
                                    value="<?php echo e(old('capacity', $room->capacity)); ?>"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6">
                            </div>
                            <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-span-full">
                            <label for="description"
                                class="block text-sm font-medium leading-6 text-slate-900">Description</label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm sm:leading-6"><?php echo e(old('description', $room->description)); ?></textarea>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-slate-600">Write a few sentences about the room.</p>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-span-full border-b border-slate-900/10 pb-4 mb-4">
                            <h3 class="text-base font-semibold leading-7 text-slate-900">Room Media & Amenities</h3>
                        </div>

                        <div class="col-span-full sm:col-span-3">
                            <label for="image" class="block text-sm font-medium leading-6 text-slate-900">Primary Thumbnail Image</label>
                            <?php if($room->image): ?>
                                <div class="mt-2 mb-4">
                                    <img src="<?php echo e(asset('images/' . $room->image)); ?>" alt="Current Image"
                                        class="h-32 w-32 object-cover rounded-lg border border-slate-200">
                                    <p class="text-xs text-slate-500 mt-1">Current image</p>
                                </div>
                            <?php endif; ?>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-slate-900/25 px-6 py-6">
                                <div class="text-center">
                                    <svg class="mx-auto h-10 w-10 text-slate-300" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-2 flex text-sm justify-center">
                                        <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-primary-600 hover:text-primary-500">
                                            <span>Upload a new file</span>
                                            <input id="image" name="image" type="file" class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-slate-600">Replaces current primary image.</p>
                                </div>
                            </div>
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-span-full sm:col-span-3">
                            <label for="images" class="block text-sm font-medium leading-6 text-slate-900">Additional Images</label>
                            <?php if($room->images && count($room->images) > 0): ?>
                                <div class="mt-2 mb-4 flex gap-2 flex-wrap">
                                    <?php $__currentLoopData = $room->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="relative group">
                                            <img src="<?php echo e(asset('images/' . $img)); ?>" alt="Additional Image" class="h-20 w-20 object-cover rounded shadow-sm border border-slate-200">
                                            <?php
                                                $deleteImgRoute = auth()->user()->isAdmin() ? route('admin.rooms.images.destroy', $room) : 
                                                                (auth()->user()->isManager() ? route('manager.rooms.images.destroy', $room) : route('receptionist.rooms.images.destroy', $room));
                                            ?>
                                            <button type="button" 
                                                    onclick="if(confirm('Delete this image?')) { document.getElementById('delete-img-<?php echo e($loop->index); ?>').submit(); }"
                                                    class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full p-1 transition-opacity flex items-center justify-center w-6 h-6 shadow-md hover:bg-red-700">
                                                <i class="fas fa-times text-[10px]"></i>
                                            </button>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <p class="text-xs text-slate-500 mb-2"><?php echo e(count($room->images)); ?> additional images saved.</p>
                            <?php endif; ?>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-slate-900/25 px-6 py-6">
                                <div class="text-center">
                                    <svg class="mx-auto h-10 w-10 text-slate-300" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" d="M11.622 1.602a4.5 4.5 0 011.756 0l2.358.834a2.25 2.25 0 001.362.08l2.368-.684a4.5 4.5 0 012.51.53c.691.432 1.253 1.05 1.636 1.772l1.06 2.016a2.25 2.25 0 001.071 1.07l2.016 1.06a4.5 4.5 0 011.772 1.636c.432.691.53 1.512.43 2.51l-.684 2.368a2.25 2.25 0 00.08 1.362l.834 2.358a4.5 4.5 0 010 1.756l-.834 2.358a2.25 2.25 0 00-.08 1.362l.684 2.368c.099.998-.108 2.016-.54 2.71a4.5 4.5 0 01-1.636 1.772l-2.016 1.06a2.25 2.25 0 00-1.071 1.07l-1.06 2.016a4.5 4.5 0 01-1.772 1.636 4.411 4.411 0 01-2.51.53l-2.368-.684a2.25 2.25 0 00-1.362-.08l-2.358.834a4.5 4.5 0 01-1.756 0l-2.358-.834a2.25 2.25 0 00-1.362-.08l-2.368.684a4.5 4.5 0 01-2.51-.53c-.691-.432-1.253-1.05-1.636-1.772l-1.06-2.016a2.25 2.25 0 00-1.071-1.07l-2.016-1.06a4.5 4.5 0 01-1.772-1.636 4.411 4.411 0 01-.53-2.51l.684-2.368a2.25 2.25 0 00-.08-1.362l-.834-2.358a4.5 4.5 0 010-1.756l.834-2.358a2.25 2.25 0 00.08-1.362l-.684-2.368a4.5 4.5 0 01.53-2.51c.432-.691 1.05-1.253 1.772-1.636l2.016-1.06a2.25 2.25 0 001.071-1.07l1.06-2.016c.432-.691 1.05-1.253 1.772-1.636a4.411 4.411 0 012.51-.53l2.368.684a2.25 2.25 0 001.362.08l2.358-.834zM12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-2 flex text-sm justify-center">
                                        <label for="images" class="relative cursor-pointer rounded-md bg-white font-semibold text-primary-600 hover:text-primary-500">
                                            <span>Upload multiple files</span>
                                            <input id="images" name="images[]" type="file" multiple class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-slate-600">Appends to existing images.</p>
                                </div>
                            </div>
                            <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php $__errorArgs = ['images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-span-full">
                            <label class="block text-sm font-medium leading-6 text-slate-900">Amenities</label>
                            <div class="mt-2 grid grid-cols-2 gap-4 sm:grid-cols-4">
                                <?php
                                    $availableAmenities = ['Wi-Fi', 'TV', 'Air Conditioning', 'Balcony', 'Mini Fridge', 'Room Service', 'Coffee Maker', 'Ocean View'];
                                    $currentAmenities = is_array($room->amenities) ? $room->amenities : [];
                                ?>
                                <?php $__currentLoopData = $availableAmenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="relative flex items-start">
                                        <div class="flex h-6 items-center">
                                            <input id="amenity_<?php echo e($loop->index); ?>" name="amenities[]" type="checkbox" value="<?php echo e($amenity); ?>"
                                                <?php echo e(in_array($amenity, $currentAmenities) ? 'checked' : ''); ?>

                                                class="h-4 w-4 rounded border-slate-300 text-primary-600 focus:ring-primary-600">
                                        </div>
                                        <div class="ml-3 text-sm leading-6">
                                            <label for="amenity_<?php echo e($loop->index); ?>" class="font-medium text-slate-700"><?php echo e($amenity); ?></label>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="col-span-full border-t border-slate-900/10 pt-4 mt-4">
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="is_available" name="is_available" type="checkbox" value="1"
                                        <?php echo e(old('is_available', $room->is_available) ? 'checked' : ''); ?>

                                        class="h-4 w-4 rounded border-slate-300 text-primary-600 focus:ring-primary-600">
                                </div>
                                <div class="text-sm leading-6">
                                    <label for="is_available" class="font-medium text-slate-900">Available for booking</label>
                                    <p class="text-slate-500">Uncheck to mark this room as unavailable/maintenance mode.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-slate-900/10 px-4 py-6 sm:px-8 bg-slate-50/50">
                    <a href="<?php echo e($backRoute); ?>" class="text-sm font-bold leading-6 text-slate-600 hover:text-slate-900 uppercase tracking-widest transition-colors">Cancel</a>
                    <button type="submit"
                        class="rounded-xl bg-primary-600 px-8 py-3 text-sm font-black text-white shadow-[0_10px_30px_rgba(11,123,191,0.3)] hover:bg-primary-500 hover:-translate-y-0.5 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 transition-all uppercase tracking-[0.2em]">
                        Update Room Details
                    </button>
                </div>
            </form>
        </div>
    </div>

    
    <?php if($room->images && count($room->images) > 0): ?>
        <?php $__currentLoopData = $room->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $deleteImgRoute = auth()->user()->isAdmin() ? route('admin.rooms.images.destroy', $room) : 
                                (auth()->user()->isManager() ? route('manager.rooms.images.destroy', $room) : route('receptionist.rooms.images.destroy', $room));
            ?>
            <form id="delete-img-<?php echo e($loop->index); ?>" action="<?php echo e($deleteImgRoute); ?>" method="POST" class="hidden">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input type="hidden" name="image_path" value="<?php echo e($img); ?>">
            </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sallpat\resources\views/admin/rooms/edit.blade.php ENDPATH**/ ?>