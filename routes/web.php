<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('products');
Route::get('/products/add', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/view/{id}', [ProductController::class, 'view'])->name('products.view');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/update', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('products/cart', [ProductController::class, 'cart'])->name('products.cart');

Route::get('products/checkout', [ProductController::class, 'checkout'])->name('products.checkout');
Route::get('products/checkoutDetails', [ProductController::class, 'checkoutDetails'])->name('products.checkoutDetails');
