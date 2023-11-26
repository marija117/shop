<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products from the 'products' table
        $products = Product::all();

        // Pass the products to the view
        return view('products.index', ['products' => $products]);
    }

}
