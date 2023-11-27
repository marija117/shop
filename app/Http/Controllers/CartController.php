<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $quantity = $request->input('quantity');
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'size' => $product->size,
                'image' => Storage::url('public/product1.png'),
                'discounted_price' => $product->price,
            'qty' => $quantity,
            [
                'size' => $product->size,
                'image' => $product->image,
                'discounted_price' => $product->price,
            ],
        ]);


        return redirect()->back()->with('success', 'Proizvod je dodat u korpu uspešno.');
    }

    public function showCart()
    {
        // Retrieve cart items
        $cartItems = Cart::content();
        $totalQuantity = 0;

        foreach ($cartItems as $item) {
            $totalQuantity = $totalQuantity + $item->qty;
        }
        $manualTotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        return view('cart.index', compact('cartItems', 'manualTotal'));
    }

    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.show')->with('success', 'Proizvod je uklonjen iz korpe.');
    }

    public function increaseOne($rowId)
    {
        $item = Cart::get($rowId);

        if (!$item) {
            return redirect()->route('cart.show')->with('error', 'Proizvod nije pronadjen u korpi.');
        }

        Cart::update($rowId, $item->qty + 1);
        return redirect()->route('cart.show')->with('success', "Količina proizvoda {$item->name} je uvećana za 1.");
    }

    public function reduceOne($rowId)
    {
        $item = Cart::get($rowId);

        if (!$item) {
            return redirect()->route('cart.show')->with('error', 'Proizvod nije pronadjen u korpi.');
        }

        Cart::update($rowId, $item->qty - 1);       
        return redirect()->route('cart.show')->with('success', "Količina proizvoda {$item->name} je umanjena za 1.");
    }
}
