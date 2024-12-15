<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        // Logic untuk menampilkan halaman checkout
        return view('checkout');
    }
}
