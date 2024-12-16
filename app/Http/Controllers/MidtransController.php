<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    //
    public function handleNotification(Request $request)
    {
        // Mendapatkan data notifikasi dari Midtrans
        $notification = $request->all();

        // Validasi Signature Key (opsional)
        $serverKey = 'SB-Mid-server-oMwzHTehVPNXAR92-ba_cE_J';
        $calculatedSignatureKey = hash("sha512", $notification['order_id'] . $notification['status_code'] . $notification['gross_amount'] . $serverKey);

        if ($notification['signature_key'] !== $calculatedSignatureKey) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        // Cari transaksi berdasarkan order_id
        $transaction = Transaction::where('order_id', $notification['order_id'])->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // Perbarui status transaksi sesuai dengan notifikasi Midtrans
        $transaction->status = $notification['transaction_status'];
        $transaction->save();

        return response()->json(['message' => 'Transaction status updated']);
    }
}
