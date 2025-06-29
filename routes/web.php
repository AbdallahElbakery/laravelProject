<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('Home');
})->name('home.page');

Route::get('/checks', function () {
    return view('checks');
});

Route::get('/orders', function () {
    return view('orders');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




