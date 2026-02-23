<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\RoomManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Receptionist\ReceptionistDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\BarKeeperController;
use App\Http\Controllers\HousekeepingController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

// Auth routes (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Password Reset Routes
    Route::get('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [\App\Http\Controllers\Auth\PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [\App\Http\Controllers\Auth\PasswordResetController::class, 'reset'])->name('password.update');

    // Registration disabled — accounts are created by admin only
    // Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    // Route::post('/register', [AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

// Rooms (public)
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');

// Bookings
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/rooms/{room}/book', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{booking:booking_reference}', [BookingController::class, 'show'])->name('bookings.show');
Route::get('/bookings/{booking}/payment', [BookingController::class, 'payment'])->name('bookings.payment');
Route::post('/bookings/{booking}/payment', [BookingController::class, 'processPayment'])->name('bookings.payment.process');
Route::patch('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.update-status');

// Admin panel
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/bookings', fn() => redirect()->route('bookings.index'))->name('bookings');
    Route::resource('rooms', RoomManagementController::class);
    Route::resource('users', UserManagementController::class);
    Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
    Route::get('/reports', [\App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    Route::get('/contact-messages', [\App\Http\Controllers\ContactMessageController::class, 'index'])->name('contact_messages.index');
});

// Receptionist panel
Route::middleware(['auth', 'role:receptionist'])->prefix('receptionist')->name('receptionist.')->group(function () {
    Route::get('/dashboard', [ReceptionistDashboardController::class, 'index'])->name('dashboard');
    Route::get('/bookings', fn() => redirect()->route('bookings.index'))->name('bookings');
    // Receptionists can manage rooms too, reusing the same controller logic but ensuring route name access
    Route::resource('rooms', RoomManagementController::class)->names([
        'index' => 'rooms.index',
        'create' => 'rooms.create',
        'store' => 'rooms.store',
        'edit' => 'rooms.edit',
        'update' => 'rooms.update',
        'destroy' => 'rooms.destroy',
    ]);
    Route::get('/bookings/{booking}/bill', [ReceptionistDashboardController::class, 'checkoutBill'])->name('bookings.bill');
    Route::get('/reports', [\App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    Route::get('/contact-messages', [\App\Http\Controllers\ContactMessageController::class, 'index'])->name('contact_messages.index');
});

// Chef panel
Route::middleware(['auth', 'role:chef'])->prefix('chef')->name('chef.')->group(function () {
    Route::get('/dashboard', [ChefController::class, 'index'])->name('dashboard');
    Route::patch('/orders/{order}/status', [ChefController::class, 'updateStatus'])->name('orders.update');
});

// Bar Keeper panel
Route::middleware(['auth', 'role:barkeeper'])->prefix('barkeeper')->name('barkeeper.')->group(function () {
    Route::get('/dashboard', [BarKeeperController::class, 'index'])->name('dashboard');
    Route::patch('/orders/{order}/status', [BarKeeperController::class, 'updateStatus'])->name('orders.update');
});

// Housekeeping panel
Route::middleware(['auth', 'role:housekeeping'])->prefix('housekeeping')->name('housekeeping.')->group(function () {
    Route::get('/dashboard', [HousekeepingController::class, 'index'])->name('dashboard');
    Route::patch('/rooms/{room}/status', [HousekeepingController::class, 'updateRoomStatus'])->name('rooms.update');
    Route::patch('/orders/{order}/status', [HousekeepingController::class, 'updateOrderStatus'])->name('orders.update');
});

// Manager panel
Route::middleware(['auth', 'role:manager'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/dashboard', [ManagerController::class, 'index'])->name('dashboard');
    Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
    Route::get('/reports', [\App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    Route::get('/contact-messages', [\App\Http\Controllers\ContactMessageController::class, 'index'])->name('contact_messages.index');
    Route::get('/activity-log', [\App\Http\Controllers\Manager\ActivityLogController::class, 'index'])->name('activity_log.index');
});

// User panel (Guest)
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [GuestController::class, 'dashboard'])->name('dashboard');
    Route::get('/services/book', [GuestController::class, 'showBookingForm'])->name('services.book');
    Route::post('/services/book', [GuestController::class, 'bookService'])->name('services.store');
});

// Staff Reports (All staff)
Route::middleware(['auth'])->group(function () {
    Route::resource('staff-reports', \App\Http\Controllers\StaffReportController::class)->names('staff_reports');

    // Profile Management
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.password');
    // Notifications
    Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [\App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/mark-all-read', [\App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
});
