<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('register', [UserController::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [UserController::class, 'register'])->name('register');

Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login'])->name('login.submit');

//Route::get('add-shop', [ShopController::class, 'showAddShopForm'])
//    ->middleware('role:shop_owner')
//    ->name('shop.add');
//
//Route::post('add-shop', [ShopController::class, 'storeShop'])
//    ->middleware('role:shop_owner')
//    ->name('shop.store');
//
//Route::get('dashboard', function () {
//    return view('dashboard');
//})->middleware('role:dashboard')->name('dashboard');
//
//Route::get('shopkeeper', function () {
//    return view('shopkeeper');
//})->middleware('role:shopkeeper')->name('shopkeeper.page');
//
//Route::get('customer', function () {
//    return view('customer');
//})->middleware('role:customer')->name('customer.page');

// Route to show the form for adding a shop
//Route::get('add-shop', [ShopController::class, 'showAddShopForm'])
//    ->middleware('role:shop_owner')
//    ->name('shop.add');
//
//// Route to handle the form submission for adding a shop
//Route::post('add-shop', [ShopController::class, 'storeShop'])
//    ->middleware('role:shop_owner')
//    ->name('shop.store');

Route::get('shops', [ShopController::class, 'index'])
    ->middleware('role:shop_owner')
    ->name('shops.index');

// Route to show the form for adding a shop
Route::get('add-shop', [ShopController::class, 'showAddShopForm'])
    ->middleware('role:shop_owner')
    ->name('shop.add');

// Route to handle the form submission for adding a shop
Route::post('add-shop', [ShopController::class, 'storeShop'])
    ->middleware('role:shop_owner')
    ->name('shop.store');

// Route to show a specific shop's details
Route::get('shops/{id}', [ShopController::class, 'show'])
    ->middleware('role:shop_owner,customer')
    ->name('shops.show');

// Route to show the form for editing a shop
Route::get('shops/{id}/edit', [ShopController::class, 'edit'])
    ->middleware('role:shop_owner')
    ->name('shops.edit');

// Route to handle the form submission for updating a shop
Route::put('shops/{id}', [ShopController::class, 'update'])
    ->middleware('role:shop_owner')
    ->name('shops.update');

// Route to delete a shop
Route::delete('shops/{id}', [ShopController::class, 'destroy'])
    ->middleware('role:shop_owner')
    ->name('shops.destroy');

// Route for the dashboard (accessible by shop owners only)
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('role:shop_owner')->name('dashboard');

// Route for shopkeeper page (accessible by shopkeepers only)
Route::get('shopkeeper', function () {
    return view('shopkeeper');
})->middleware('role:shopkeeper')->name('shopkeeper.page');

// Route for customer page (accessible by customers only)
Route::get('customer', function () {
    return view('customer.index');
})->middleware('role:customer')->name('customer.page');

//Route::get('customer', function () {
//    return view('customer');
//})->middleware('role:customer')->name('customer.page');

// Route to view shops as a customer
Route::get('customer/shops', [ShopController::class, 'viewShops'])
    ->middleware('role:customer')
    ->name('customer.view.shops');

Route::post('/logout', [ShopController::class, 'logout'])->name('logout');

// Error Handling
//Route::fallback(function () {
//    abort(404);
//    return '<h1>Page Not Found!!!!</h1>';
//});
Route::fallback(function () {
    return view('errors.404');
});

