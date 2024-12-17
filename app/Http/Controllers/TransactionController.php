<?php

namespace App\Http\Controllers;

// use App\Helpers\MidtransHelper;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Result;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class TransactionController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');
        $transactions = Transaction::query()
            ->when($search, function ($query, $search) {
                return $query->where('order_id', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('transaction', compact('transactions'));
    }

    public function checkout()
    {
        $cartItems = Cart::with('product')->get();
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('checkout', [
            'cartItems' => $cartItems,
            'total' => $total,
        ]);
    }

    public function handleCheckout(Request $request)
    {
        // Konfigurasi Midtrans
        // Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        // Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        // Config::$is3ds = env('MIDTRANS_IS_3DS');

        Config::$serverKey = 'SB-Mid-server-oMwzHTehVPNXAR92-ba_cE_J';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $cartItems = Cart::with('product')->get();
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        // Data untuk transaksi Midtrans
        $transactionDetails = [
            'order_id' => 'ORDER-' . uniqid(),
            'gross_amount' => $total,
        ];

        $itemDetails = $cartItems->map(function ($item) {
            return [
                'id' => $item->product->id,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'name' => $item->product->product_name,
            ];
        })->toArray();

        $customerDetails = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ];

        $transactionPayload = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
        ];

        try {
            $snapToken = Snap::getSnapToken($transactionPayload);

            // Simpan transaksi ke database
            $transaction = Transaction::create([
                'user_id' => Auth::id(),
                'order_id' => $transactionDetails['order_id'],
                'gross_amount' => $total,
                'status' => 'pending',
                'snap_token' => $snapToken,
            ]);

            return response()->json([
                'snap_token' => $snapToken,
                'transaction' => $transaction,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function listTransactions()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();
        return view('transaction', compact('transactions'));
    }

    public function adminHandleTransactions()
    {
        $transactions = Transaction::all();
        return view('transaction_handle', compact('transactions'));
    }

    public function cancelTransaction($id)
    {
        $transaction = Transaction::findOrFail($id);

        if ($transaction->status === 'pending') {

            $transaction->status = 'cancelled';
            $transaction->save();
        }

        return redirect()->back()->with('success', 'Transaction has been cancelled.');
    }

    public function confirm($id)
    {
        $transaction = Transaction::findOrFail($id);

        if ($transaction->status === 'pending') {
            // Update status to "Completed"
            $transaction->status = 'completed';
            $transaction->save();

            // Calculate total completed transactions and total cost
            $completedTransactions = Transaction::where('status', 'completed')->get();
            $totalTransactions = $completedTransactions->count();
            $totalCost = $completedTransactions->sum('gross_amount');

            // Update or Create result entry
            Result::updateOrCreate(
                ['id' => 1], // Assuming single result row
                [
                    'total_completed_transactions' => $totalTransactions,
                    'total_cost' => $totalCost,
                ]
            );
        }

        return redirect()->back()->with('success', 'Transaction confirmed successfully.');
    }
}
