<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// user routes
Route::middleware(['auth', 'userMiddleware'])->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('dashboard');
    Route::get('/favorite', [FavoriteController::class, 'index'])->name('user.favorite');
    Route::post('/profile/upload', [UserController::class, 'upload'])->name('profile.upload');
    Route::get('/contactus', [UserController::class, 'contactus'])->name('contact.us');
    Route::get('/cart', [UserController::class, 'cart'])->name('user.cart');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::post('/cart/update/{id}', [CartController::class, 'update']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});


// admin routes
Route::middleware(['auth', 'adminMiddleware'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
    Route::post('/profile/upload', [AdminController::class, 'upload'])->name('profile.upload');

    // Route::get('/products', [ProductController::class, 'index'])->name('admin.product');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/view/messages', [MessageController::class, 'index'])->name('view.messages');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
});
