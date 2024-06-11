<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('view_category', [AdminController::class, 'view_category']);

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
});


