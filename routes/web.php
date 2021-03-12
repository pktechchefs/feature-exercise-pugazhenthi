<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/cart', function(){
    echo "Okay";
});

Route::post('cart', [CartController::class, 'store']);