<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::middleware(['auth'])->group(function(){
    Route::prefix('checkout')->group(function(){
        Route::get('/', [HomeController::class, 'checkout'])->name('checkout');
        Route::post('order', [HomeController::class, 'order'])->name('order');
    });

    Route::prefix('cart')->group(function(){
        Route::get('/', [HomeController::class, 'cart'])->name('cart');
        Route::post('add/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
        Route::get('delete/{id}', [HomeController::class, 'delete_CartProduct'])->name('delete_CartProduct');
    });
    Route::get('profile', [HomeController::class, 'profile'])->name('profile');

    Route::prefix('bank_account')->group(function(){
        Route::get('/', [HomeController::class, 'view_bank'])->name('view_bank');
        Route::post('add', [HomeController::class, 'add_bank'])->name('add_bank');
        Route::post('edit/{id}', [HomeController::class, 'edit_bank'])->name('edit_bank');
        Route::get('delete/{id}', [HomeController::class, 'delete_bank'])->name('delete_bank');
    });
});

Route::get('/product_detail/{id}', [HomeController::class, 'product_detail'])->name('product_detail');

Route::middleware(['auth', 'admin'])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::prefix('category')->group(function(){
            Route::get('/', [DashboardController::class, 'view_category'])->name('category');
            Route::post('add', [DashboardController::class, 'add_category'])->name('add_category');
            Route::post('edit/{id}', [DashboardController::class, 'edit_category'])->name('edit_category');
            Route::get('delete/{id}', [DashboardController::class, 'delete_category'])->name('delete_category');
        });

        Route::prefix('product')->group(function(){
            Route::get('/', [DashboardController::class, 'view_product'])->name('product');
            Route::post('add', [DashboardController::class, 'add_product'])->name('add_product');
            Route::post('edit/{id}', [DashboardController::class, 'edit_product'])->name('edit_product');
            Route::post('update/{id}', [DashboardController::class, 'update_product'])->name('update_product');
            Route::get('delete/{id}', [DashboardController::class, 'delete_product'])->name('delete_product');
        });

    });

});
