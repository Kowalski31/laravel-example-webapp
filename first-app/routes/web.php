<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

// Route::get('home', function (){
//     return view('home');
// });

Route::get('show-form', function() {
    return view('form');
});

// Route::post('khanhtoan', function () {
//     return view('hi');
// });

// Route::match (['get', 'post'], 'khanhtoan', function () {
//     return $_SERVER['REQUEST_METHOD'];
// }); 

// Route::any('khanhtoan', function (Request $request) {   
//     return $request->method();
// });

// Route::redirect('khanhtoan', 'show-form');

Route::prefix('admin')->group(function () {
    
    Route::get('tin-tuc/{slug?}-{id?}.html', function($slug=null, $id=null){
        $content = 'id = '.$id.'<br/>';
        $content .= 'slug = '.$slug;
        return $content;
    })->where([
        'slug' => '[a-z0-9-]+',
        'id' => '[0-9]+'
    ])->name('admin.tin-tuc');

    Route::get('show-form', function () {
        return view('form');
    })->name('admin.show-form');

    // Route::get('products/{id?}', function ($id=null) {
    //     return 'products '. $id;
    // });

    Route::prefix('products')->group(function () {
        Route::get('/', function() {
            return 'Danh sach san pham';
        });

        Route::get('add', function() {
            return 'Them san pham';
        })->name('admin.products.add');

        Route::get('edit', function() {
            return 'Sua san pham';
        })->name('admin.products.edit');
    });

    


});