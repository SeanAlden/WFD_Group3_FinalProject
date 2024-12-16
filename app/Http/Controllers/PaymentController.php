<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    //

    public function checkout()
    {
        // Logic untuk menampilkan halaman checkout
        return view('checkout');
    }
    public function confirm(Request $request)
    {
        // Midtrans configuration
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Config::$is3ds = env('MIDTRANS_IS_3DS');

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => 10000, // Replace with actual total
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('checkout', ['snapToken' => $snapToken]);
    }
}
