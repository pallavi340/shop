<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy("id", "DESC")->paginate(10);
        return view('admin.manageProducts', compact('products'));
    }

    public function insert()
    {
        $categories = Category::orderBy("id", "DESC")->get();
        return view('admin.insertProduct', compact("categories"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        

        // Handle image upload
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Create product
        Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'brand' => $request->brand,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);

        session()->flash('success', 'Product Created Successfully.');
        return redirect()->route('admin.manageProduct');
    }
}
