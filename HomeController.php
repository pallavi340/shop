<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
     {
    public function home()
    {
        $products = Product::paginate(12);
        $categories = Category::whereNull('category_id',null)->get();
        return view('home', compact('products', 'categories'));
    }

    public function search(Request $req){
        $search = $req->search;
        $products = Product::where('title', 'like', "%$search%")->paginate(50);
        $categories = Category::whereNull('category_id')->get();
       return view("home", compact('products', 'categories'));
    }

    public function filter($catId){
        $products = Product::where('category_id', "$catId")->paginate(50);
        $categories = Category::where('category_id')->get();
       return view("home", compact('products', 'categories'));
    }


}
