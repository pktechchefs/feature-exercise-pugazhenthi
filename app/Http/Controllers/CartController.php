<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::all();
        
        return view('cart', compact('items'));
    }

    public function store()
    {
        $data = request()->only(['item_id', 'quantity', 'price']);
        
        $data['amount'] = Cart::calculateAmount($data['item_id'], $data['quantity']);

        Cart::create($data);

        return redirect('cart');
    }
}
