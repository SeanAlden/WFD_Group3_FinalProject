<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();

        // melakukan pendataan produk berdasarkan kategori yang dipilih
        $categoryId = $request->query('category_id');
        $products = Product::when($categoryId, function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })->get();

        return view('dashboard', compact('products', 'categories', 'categoryId'));
    }

    public function contactus()
    {
        $user = Auth::user();
        return view('contactus', compact('user'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('profile')->store('profile_images', 'public');

        $user = auth()->Guard::user();
        $user->profile_image = $path;
        $user->save();

        return redirect()->back()->with('status', 'profile-updated');
    }
}
