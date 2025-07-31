<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseItemController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('stock', StockController::class);
Route::resource('shops', ShopController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('purchase-items', PurchaseItemController::class);
Route::resource('stocks', StockController::class);
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login', [AuthenticationController::class, 'authenticate']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
