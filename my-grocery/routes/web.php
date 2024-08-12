<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\BankController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');


Route::middleware(['auth'])->group(function(){
    Route::prefix('checkout')->group(function(){
        Route::get('/', [OrderController::class, 'checkout'])->name('checkout');
        Route::post('order', [OrderController::class, 'order'])->name('order');
    });

    Route::prefix('cart')->group(function(){
        Route::get('/', [CartController::class, 'cart'])->name('cart');
        Route::post('add/{id}', [CartController::class, 'addCart'])->name('addCart');
        Route::get('delete/{id}', [CartController::class, 'deleteCartProduct'])->name('deleteCartProduct');
        Route::post('update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('updateQuantity');
    });

    Route::get('profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('history', [HomeController::class, 'history'])->name('history');

    Route::prefix('bank_account')->group(function(){
        Route::get('/', [BankController::class, 'viewBank'])->name('view_bank');
        Route::post('add', [BankController::class, 'addBank'])->name('add_bank');
        Route::post('edit/{id}', [BankController::class, 'editBank'])->name('edit_bank');
        Route::get('delete/{id}', [BankController::class, 'deleteBank'])->name('delete_bank');
    });
});

Route::get('/product_detail/{id}', [HomeController::class, 'productDetail'])->name('product_detail');

Route::middleware(['auth', 'admin'])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::prefix('category')->group(function(){
            Route::get('/', [CategoryController::class, 'viewCategory'])->name('category');
            Route::post('add', [CategoryController::class, 'addCategory'])->name('addCategory');
            Route::post('edit/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
            Route::get('delete/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
        });

        Route::prefix('product')->group(function(){
            Route::get('/', [ProductController::class, 'viewProduct'])->name('product');
            Route::post('add', [ProductController::class, 'addProduct'])->name('addProduct');
            Route::post('edit/{id}', [ProductController::class, 'editProduct'])->name('editProduct');
            Route::get('delete/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        });

    });

});
