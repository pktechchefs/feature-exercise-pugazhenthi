<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];


    public static function calculateAmount($data)
    {

        return $data['price'] * $data['quantity'];

    }
}
