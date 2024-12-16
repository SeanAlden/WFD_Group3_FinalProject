<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class MidtransHelper
{
    public static function checkTransactionStatus($orderId)
    {
        $serverKey = 'SB-Mid-server-oMwzHTehVPNXAR92-ba_cE_J';
        $url = "https://api.sandbox.midtrans.com/v2/$orderId/status";

        $response = Http::withBasicAuth($serverKey, '')
                        ->get($url);

        if ($response->ok()) {
            return $response->json();
        }

        return null;
    }
}