<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 1,
            'attributes' => [
                'size' => $product->size,
                'image' => $product->image,
            ],
        ]);


        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function showCart()
    {
        // Retrieve cart items
        $cartItems = Cart::content();

        return view('cart.index', compact('cartItems'));
    }

    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.show')->with('success', 'Item removed from the cart.');
    }
}
