<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch total sales and income
        $result = Result::first(); // Asumsi hanya ada satu entry untuk statistik

        // Fetch total users with 'usertype' user
        $totalUsers = User::where('usertype', 'user')->count();

        // Fetch recent orders (last 4 completed transactions)
        $recentOrders = Cart::join('products', 'carts.product_id', '=', 'products.id')
            ->select('carts.*', 'products.product_name', 'products.photo', 'products.price', DB::raw('carts.quantity * products.price as total_price'))
            ->orderByDesc('carts.created_at')
            ->limit(4)
            ->get();

        // Fetch best seller products (top 3 by quantity sold)
        $bestSellers = Cart::join('products', 'carts.product_id', '=', 'products.id')
            ->select('products.product_name', 'products.photo', 'products.price', DB::raw('SUM(carts.quantity) as total_sold'))
            ->groupBy('carts.product_id', 'products.product_name', 'products.photo', 'products.price')
            ->orderByDesc('total_sold')
            ->limit(3)
            ->get();

        return view('admin.dashboard', [
            'totalSales' => $result->total_completed_transactions ?? 0,
            'totalIncome' => $result->total_cost ?? 0,
            'totalUsers' => $totalUsers,
            'recentOrders' => $recentOrders,
            'bestSellers' => $bestSellers,
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $imagePath = $request->file('avatar')->store('profile_images', 'public');

            // Delete the old profile image if exists
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }

            // Update the user's profile image in the database
            $user->profile_image = $imagePath;
            $user->user::save();
        }

        return back()->with('status', 'Profile image updated successfully!');
    }
}
