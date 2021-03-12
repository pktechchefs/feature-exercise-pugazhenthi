<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $cartItems = Cart::all();
        
        return view('cart', compact('items', 'cartItems'));
    }

    public function store()
    {
        $data = request()->only(['item_id', 'quantity', 'price']);
        
        $data['amount'] = Cart::calculateAmount($data['item_id'], $data['quantity']);

        $data['amount'] = Cart::calculateAmount($data['item_id'], $data['quantity']);
        
        $isItemExist = Cart::find($data['item_id']);
        
        if ($isItemExist) {
            
            $quantity = $isItemExist->quantity + $data['quantity'];
            
            $amount = $isItemExist->quantity + $data['amount'];
            
            $isItemExist->update(['quantity' => $quantity]);

        } else {
            Cart::create($data);
        }

        return redirect('cart');
    }
}
