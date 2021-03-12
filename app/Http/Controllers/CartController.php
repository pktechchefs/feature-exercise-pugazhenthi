<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

    }

    public function store()
    {
        Cart::create(request()->all());

        return redirect('cart');
    }
}
