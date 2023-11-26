<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'size' => $product->size,
            ],
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }
}
