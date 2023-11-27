<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{ protected $category;
    protected $product;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index()
    {
        $username = session('username');
        $products = $this->product->with('category')->get();

        return view('client.home.index', compact('products'));
    }

    public function detail($id) 
    {
        $product = Product::with('details')->findOrFail($id);
        return view('client.products.detail', compact('product'));
    }
}
