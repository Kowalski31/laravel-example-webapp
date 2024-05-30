<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/khanhtoan', function () {
    return view('hi');
});

Route::get('/home', function (){
    return view('home');
});