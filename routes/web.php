<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/checks', function () {
    return view('checks');
});

Route::get('/orders', function () {
    return view('orders');
});

