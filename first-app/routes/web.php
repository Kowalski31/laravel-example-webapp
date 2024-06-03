<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;

// Client Routes

Route::prefix('categories')->group(function() {
    //Danh sach chuyen muc
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');

    //Lay chi tiet 1 chuyen muc
    Route::get('edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

    //Xu ly update chuyen muc
    Route::post('edit/{id}', [CategoriesController::class, 'updateCategory']);

    //Hien thi form add du lieu
    Route::get('add', [CategoriesController::class, 'addCategory'])->name('categories.add');

    //Xu ly them chuyen muc
    Route::post('add', [CategoriesController::class, 'handleAddCategory']);

    //Xoa chuyen muc
    Route::delete('delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');
});

// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('tin-tuk', [HomeController::class, 'getNews'])->name('news');
// Route::get('chuyen-muc/{id?}', [HomeController::class, 'getCategory'])->name('category');

// // Route::get('home', function (){
// //     return view('home');
// // });

// Route::get('show-form', function() {
//     return view('form');
// });

// // Route::post('khanhtoan', function () {
// //     return view('hi');
// // });

// // Route::match (['get', 'post'], 'khanhtoan', function () {
// //     return $_SERVER['REQUEST_METHOD'];
// // }); 

// // Route::any('khanhtoan', function (Request $request) {   
// //     return $request->method();
// // });

// // Route::redirect('khanhtoan', 'show-form');

// Route::prefix('admin')->group(function () {
    
//     Route::get('tin-tuc/{slug?}-{id?}.html', function($slug=null, $id=null){
//         $content = 'id = '.$id.'<br/>';
//         $content .= 'slug = '.$slug;
//         return $content;
//     })->where([
//         'slug' => '[a-z0-9-]+',
//         'id' => '[0-9]+'
//     ])->name('admin.tin-tuc');

//     Route::get('show-form', function () {
//         return view('form');
//     })->name('admin.show-form');

//     // Route::get('products/{id?}', function ($id=null) {
//     //     return 'products '. $id;
//     // });

//     Route::prefix('products')->group(function () {
//         Route::get('/', function() {
//             return 'Danh sach san pham';
//         });

//         Route::get('add', function() {
//             return 'Them san pham';
//         })->name('admin.products.add');

//         Route::get('edit', function() {
//             return 'Sua san pham';
//         })->name('admin.products.edit');
//     });

    


// });