<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        if ($product->stock < 1) {
            return response()->json(['error' => 'Stock not sufficient'], 400);
        }

        Cart::create([
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        return response()->json(['success' => 'Product added to cart'], 200);
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::find($id);
        $newQuantity = $cartItem->quantity + $request->delta;

        if ($newQuantity > $cartItem->product->stock || $newQuantity < 1) {
            return response()->json(['error' => 'Invalid quantity'], 400);
        }

        $cartItem->update(['quantity' => $newQuantity]);

        return response()->json(['success' => 'Quantity updated'], 200);
    }

    public function index()
    {
        $cartItems = Cart::with('product')->get();
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('cart', compact('cartItems', 'total'));
    }

    public function destroy($id)
    {
        // Cari item cart berdasarkan ID
        $cartItem = Cart::findOrFail($id);

        // Hapus item
        $cartItem->delete();

        // Redirect kembali ke halaman cart dengan pesan sukses
        return redirect()->route('cart')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
