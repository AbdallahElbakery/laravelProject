<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('Home');
})->name('home.page');

Route::get('/products', function () {
    return view('products');
});

Route::get('/checks', function () {
    return view('checks');
});

Route::get('/orders', function () {
    return view('orders');
});

//<<<<<<< mohrail
Route::get('/edit-product', function () {
    return view('edit');
});
Route::get('/add-product', function () {
    return view('create');
});




Route::get('Admin/categories', function () {
    // return view('Admin.categories.index');
    // return view('Admin.categories.create');
    return view('Admin.categories.edit');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//>>>>>>> main
