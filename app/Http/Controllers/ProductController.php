<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = Category::all(); // Mengambil semua kategori

        $products = Product::all(); // Mengambil semua data produk dari database

        // return view('admin.product', compact('products')); 
        return view('admin.product', compact('products', 'categories')); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'nullable|mimes:png,jpeg,jpg|max:2048',
            'product_name' => 'required|string',
            'description' => 'required|string',
            'brand' => 'required|string',
            'cpu' => 'required|string',
            'gpu' => 'required|string',
            'memory' => 'required|string',
            'storage' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required',
        ]);

        // Upload file photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath; // Simpan path foto di database
        }
        
        Product::create($validated);
       
        return redirect()->back()->with('success', 'Product added successfully');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'photo' => 'nullable|mimes:png,jpeg,jpg|max:2048',
            'product_name' => 'required|string',
            'description' => 'required|string',
            'brand' => 'required|string',
            'cpu' => 'required|string',
            'gpu' => 'required|string',
            'memory' => 'required|string',
            'storage' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required',
        ]);

        // Update file photo jika ada
        if ($request->hasFile('photo')) {
            // Hapus file lama jika ada
            if ($product->photo && Storage::disk('public')->exists($product->photo)) {
                Storage::disk('public')->delete($product->photo);
            }

            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }

        $product->update($validated);
        return redirect()->back()->with('success', 'Product updated successfully');
    }

    
    // public function index()
    // {
    //     $products = Product::all();
    //     $categories = ProductCategory::getValues(); // Ambil semua kategori
    //     return view('admin.product', compact('products', 'categories'));
    // }
    
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'product_name' => 'required|string|max:255',
    //         'brand' => 'required|string|max:255',
    //         'cpu' => 'required|string|max:255',
    //         'gpu' => 'required|string|max:255',
    //         'memory' => 'required|string|max:255',
    //         'storage' => 'required|string|max:255',
    //         'stock' => 'required|integer|min:0',
    //         'price' => 'required|numeric|min:0',
    //         'category' => 'required|string|in:' . implode(',', ProductCategory::getValues()),
    //         'image' => 'nullable|image|max:2048',
    //     ]);
        
    //     if ($request->hasFile('image')) {
    //         $validated['image'] = $request->file('image')->store('products', 'public');
    //     }
        
    //     Product::create($validated);
    //     return redirect()->route('admin.product');
    // }
    
    // public function update(Request $request, Product $product)
    // {
    //     $validated = $request->validate([
    //         'product_name' => 'required|string|max:255',
    //         'brand' => 'required|string|max:255',
    //         'cpu' => 'required|string|max:255',
    //         'gpu' => 'required|string|max:255',
    //         'memory' => 'required|string|max:255',
    //         'storage' => 'required|string|max:255',
    //         'stock' => 'required|integer|min:0',
    //         'price' => 'required|numeric|min:0',
    //         'category' => 'required|string|in:' . implode(',', ProductCategory::getValues()),
    //         'image' => 'nullable|image|max:2048',
    //     ]);
        
    //     if ($request->hasFile('image')) {
    //         // Hapus gambar lama jika ada
    //         if ($product->image) {
    //             Storage::disk('public')->delete($product->image);
    //         }
    //         $validated['image'] = $request->file('image')->store('products', 'public');
    //     }
        
    //     $product->update($validated);
    //     return redirect()->route('admin.product');
    // }
    
    public function destroy(Product $product)
    {
        // Hapus file photo jika ada
        if ($product->photo && Storage::disk('public')->exists($product->photo)) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
    
}