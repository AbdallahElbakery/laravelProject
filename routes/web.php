<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\categories\CategoryController;
use App\Http\Controllers\Admin\products\ProductController;
use App\Http\Controllers\Admin\user\UserController;

Route::get('/', function () {
    return view('Home');
})->name('home.page');

Route::get('shop', function () {
    return view('user.products.products');
});

Route::get('/checks', function () {
    return view('Admin.checks.checks');
});

Route::get('/orders', function () {
    return view('Admin.orders.orders');
});
Route::get('createorders', function () {
    return view('Admin.orders.createorder');
});

//<<<<<<< mohrail
Route::get('/edit-product', function () {
    return view('Admin.products.edit');
});
Route::get('/add-product', function () {
    return view('Admin.products.create');
});

Route::get('/myorder', function () {
    return view('user.order.myorder');
});


Route::get('addcategories', function () {
    // return view('Admin.categories.index');
    return view('Admin.categories.create');
    // return view('Admin.categories.edit');
});
Route::get('categories', function () {
    return view('Admin.categories.index');
    // return view('Admin.categories.create');
    // return view('Admin.categories.edit');
});
// products
Route::resource('products', ProductController::class);


// user
Route::resource('users', UserController::class);


// categories
Route::resource('categories', CategoryController::class);

// auth login and register .....
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//>>>>>>> main
