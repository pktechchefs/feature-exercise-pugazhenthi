<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('cart');
});

Route::post('cart', [CartController::class, 'store']);