<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // Total Sales
        // $totalSales = DB::table('results')
        //     ->where('status', 'completed')
        //     ->count();
        $results = Result::all();

        // Total Income
        // $totalIncome = DB::table('results')
        //     ->where('status', 'completed')
        //     ->sum('total_cost');

        // Total Users
        $totalUsers = DB::table('users')
            ->where('usertype', 'user')
            ->count();

        // Recent Orders
        // $recentOrders = DB::table('transactions')
        //     ->join('products', 'transactions.id', '=', 'products.id')
        //     ->where('transactions.status', 'completed')
        //     ->orderBy('transactions.created_at', 'desc')
        //     ->take(4)
        //     ->select(
        //         'transactions.id as order_id',
        //         'products.product_name as product_name',
        //         'products.photo as product_photo',
        //         'products.price as product_price',
        //         'carts.quantity',
        //         DB::raw('products.price * carts.quantity as total_price')
        //     )
        //     ->get();
        $carts = Cart::all()
        ->take(4);

        // Best Seller Products
        // $bestSellerProducts = DB::table('transactions')
        //     ->join('products', 'transactions.product_id', '=', 'products.id')
        //     ->where('transactions.status', 'completed')
        //     ->select(
        //         'products.id as product_id',
        //         'products.name as product_name',
        //         'products.photo as product_photo',
        //         'products.price as product_price',
        //         DB::raw('SUM(transactions.quantity) as total_sold')
        //     )
        //     ->groupBy('products.id', 'products.name', 'products.photo', 'products.price')
        //     ->orderBy('total_sold', 'desc')
        //     ->take(3)
        //     ->get();
        $products = Product::all()
        ->take(3);

        // Return Data to View
        // return view('admin.dashboard', compact('result', 'totalUsers', 'recentOrders', 'bestSellerProducts'));
        return view('admin.dashboard', compact('results', 'totalUsers', 'carts', 'products'));
    }

    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $path = $request->file('profile_image')->store('profile_images', 'public');

    //     $user = auth()->Guard::user();
    //     $user->profile_image = $path;
    //     $user->save();

    //     return redirect()->back()->with('status', 'profile-updated');
    // }
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
