<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

use Midtrans\Snap;
use Midtrans\Config;

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
    // Route::get('/cart', [UserController::class, 'cart'])->name('user.cart');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart');;
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::post('/cart/update/{id}', [CartController::class, 'update']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    // Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    // Route::post('/payment/confirm', [PaymentController::class, 'confirm'])->name('payment.confirm');
    // Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    // Route::post('/transaction/refund/{id}', [TransactionController::class, 'refund'])->name('transaction.refund');
    // Route::post('/transaction/approve-refund/{id}', [TransactionController::class, 'approveRefund'])->name('transaction.approve_refund');
    Route::get('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [TransactionController::class, 'handleCheckout'])->name('checkout.handle');
    Route::get('/transactions', [TransactionController::class, 'listTransactions'])->name('transactions');
    Route::post('/transactions/cancel/{id}', [TransactionController::class, 'cancelTransaction'])->name('transactions.cancel');

    Route::post('/checkout/token', function (Request $request) {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false; // Ubah ke `true` untuk mode produksi
        Config::$isSanitized = true;
        Config::$is3ds = true;
    
        // Data transaksi
        $transactionDetails = [
            'order_id' => uniqid(),
            'gross_amount' => $request->input('total'), // Total dari keranjang
        ];
    
        $customerDetails = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ];
    
        $transaction = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
        ];
    
        // Generate token Snap
        $snapToken = Snap::getSnapToken($transaction);
    
        return response()->json(['token' => $snapToken]);
    })->name('checkout.token');
    Route::post('/transactions/{id}/confirm', [TransactionController::class, 'confirm'])->name('transactions.confirm');

    
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
    Route::get('/admin/transactions', [TransactionController::class, 'adminHandleTransactions'])->name('admin.transactions');
});
