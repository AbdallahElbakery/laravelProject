<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/checks', function () {
    return view('checks');
});

Route::get('/orders', function () {
    return view('orders');
});

Route::get('/edit-product', function () {
    return view('edit');
});
Route::get('/add-product', function () {
    return view('create');
});
