<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('cart', [CartController::class, 'index']);

Route::post('cart', [CartController::class, 'store']);