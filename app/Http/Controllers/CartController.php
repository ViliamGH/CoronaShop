<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function index()
    {
        $cartItems = CartFacade::getContent();
        return view('productcart', compact('cartItems'));
    }
    function addCart(Request $request)
    {
        CartFacade::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('productcart');
    }
}
