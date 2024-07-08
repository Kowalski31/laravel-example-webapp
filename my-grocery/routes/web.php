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




Route::middleware(['auth', 'verified'])->group(function() {

    Route::prefix('dashboard')->group(function() {
        Route::get('/', [HomeController::class, 'home'])->name('dashboard');
    });
    
    
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::prefix('category')->group(function(){
            Route::get('/', [DashboardController::class, 'view_category'])->name('category');
            Route::post('add', [DashboardController::class, 'add_category'])->name('add_category');
            Route::get('edit/{id}', [DashboardController::class, 'edit_category'])->name('edit_category');
            Route::post('update/{id}', [DashboardController::class, 'update_category'])->name('update_category');
            Route::get('delete/{id}', [DashboardController::class, 'delete_category'])->name('delete_category');

        });

        Route::prefix('product')->group(function(){
            Route::get('/', [DashboardController::class, 'view_product'])->name('product');
            Route::post('add', [DashboardController::class, 'add_product'])->name('add_product');

        });
        
    });
    
});