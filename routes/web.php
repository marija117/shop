<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/products', [ProductController::class, 'index'])
->middleware(['auth', 'verified'])->name('products.index');

Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->middleware(['auth', 'verified'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->middleware(['auth', 'verified'])->name('cart.show');
Route::delete('/cart/remove/{rowId}', [CartController::class, 'removeItem'])->middleware(['auth', 'verified'])->name('cart.remove');
Route::post('/cart/increase/{rowId}', [CartController::class, 'increaseOne'])->middleware(['auth', 'verified'])->name('cart.increase');
Route::post('/cart/reduce/{rowId}', [CartController::class, 'reduceOne'])->middleware(['auth', 'verified'])->name('cart.reduce');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
