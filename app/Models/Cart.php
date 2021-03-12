<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];


    public static function calculateAmount($itemId, $quantity)
    {
        $item = Item::find($itemId);
        
        $itemPrice = 0;

        if ($item->offers()->count())
        {
            foreach ($item->offers as $offer)
            {
                if ($quantity >= $offer->quantity) {
                    $itemPrice += $offer->price;
                    $quantity -= $offer->quantity;                    
                }
            }
        }

        if ($quantity > 0)
        {
            $itemPrice = ($item->price * $quantity);
        }

        return $itemPrice;
    }
}
