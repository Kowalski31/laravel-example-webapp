<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'login_home'])->name('dashboard');
    Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
    Route::get('mycart', [HomeController::class, 'mycart'])->name('mycart');
    Route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->name('delete_cart');
    Route::post('confirm_order', [HomeController::class, 'confirm_order'])->name('confirm_order');
    Route::get('myorders', [HomeController::class, 'myorders'])->name('myorders');
});

Route::get('product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('view_category', [AdminController::class, 'view_category'])->name('view_category');
    Route::post('add_category', [AdminController::class, 'add_category'])->name('add_category');
    Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category');
    Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->name('edit_category');
    Route::post('update_category/{id}', [AdminController::class, 'update_category'])->name('update_category');

    Route::get('add_product', [AdminController::class, 'add_product'])->name('add_product');
    Route::post('upload_product', [AdminController::class, 'upload_product'])->name('upload_product');
    Route::get('view_product', [AdminController::class, 'view_product'])->name('view_product');
    Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');
    Route::get('edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit_product');
    Route::post('update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');
    Route::get('product_search', [AdminController::class, 'product_search'])->name('product_search');

    Route::get('view_order', [AdminController::class, 'view_order'])->name('view_order');
    Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way']);
    Route::get('delivered/{id}', [AdminController::class, 'delivered']);
    Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf']);
});


