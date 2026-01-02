<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Import Controller Utama
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Customer\ReviewController;

// Import Controller khusus Customer
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;

// Import Controller khusus Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
|--------------------------------------------------------------------------
| 1. RUTE PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

Route::view('/about', 'pages.about')->name('about');
Route::view('/privacy-policy', 'pages.privacy')->name('privacy');
Route::view('/terms-of-service', 'pages.terms')->name('terms');
Route::view('/contact', 'pages.contact')->name('contact');

/*
|--------------------------------------------------------------------------
| 2. RUTE AUTENTIKASI
|--------------------------------------------------------------------------
*/
Auth::routes(['verify' => true]);

Route::get('/home', function () {
    $user = auth()->user();
    if ($user) {
        return $user->role === 'admin' 
            ? redirect()->route('admin.dashboard') 
            : redirect()->route('customer.dashboard');
    }
    return redirect('/');
})->middleware(['auth'])->name('home.redirect');

/*
|--------------------------------------------------------------------------
| 3. RUTE CUSTOMER (User Role: Customer)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
    
    // RUTE YANG DIPERBAIKI:
    // 1. Rute untuk menampilkan halaman konfirmasi pembatalan (GET)
    Route::get('/orders/{order}/cancel', [CustomerOrderController::class, 'cancel'])
        ->name('orders.cancel'); 

    // 2. Rute untuk memproses pembatalan (POST) - Ubah namanya agar unik
    Route::post('/orders/{order}/cancel', [CustomerOrderController::class, 'cancelProcess'])
        ->name('orders.cancel.process'); 

    Route::resource('/orders', CustomerOrderController::class)->only(['index', 'show', 'create', 'store']);
});

/*
|--------------------------------------------------------------------------
| 4. RUTE ADMIN (User Role: Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/reports', [AdminDashboardController::class, 'reports'])->name('reports');
    
    Route::resource('/services', AdminServiceController::class);
    Route::resource('/orders', AdminOrderController::class);
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::resource('/users', AdminUserController::class);
    
    Route::post('/orders/{order}/approve-cancel', [AdminOrderController::class, 'approveCancel'])->name('orders.approve-cancel');
    Route::post('/orders/{order}/reject-cancel', [AdminOrderController::class, 'rejectCancel'])->name('orders.reject-cancel');
});

/*
|--------------------------------------------------------------------------
| 5. RUTE UMUM (Semua User Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});