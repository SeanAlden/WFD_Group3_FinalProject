<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

use Midtrans\Snap;
use Midtrans\Config;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// user routes
Route::middleware(['auth', 'userMiddleware'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::post('/profile/upload', [UserController::class, 'upload'])->name('profile.upload');
    Route::get('/contactus', [UserController::class, 'contactus'])->name('contact.us');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart');;
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::post('/cart/update/{id}', [CartController::class, 'update']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [TransactionController::class, 'handleCheckout'])->name('checkout.handle');
    Route::get('/transactions', [TransactionController::class, 'listTransactions'])->name('transactions');
});


// admin routes
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
    Route::post('/profile/upload', [AdminController::class, 'upload'])->name('profile.upload');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/view/messages', [MessageController::class, 'index'])->name('view.messages');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('/admin/transactions', [TransactionController::class, 'adminHandleTransactions'])->name('admin.transactions');
    Route::post('/transactions/{id}/confirm', [TransactionController::class, 'confirm'])->name('transactions.confirm');
    Route::post('/transactions/{id}/cancel', [TransactionController::class, 'cancelTransaction'])->name('transactions.cancel');
});
