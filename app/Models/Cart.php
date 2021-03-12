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
        
        $totalQuantity = $quantity;

        if ($item->offers()->count())
        {

            // item offers order should be desc by qty
            foreach ($item->offers as $offer)
            {
                // offer should match the quanity based on condition
                if ($quantity >= $offer->quantity) {                    
                    $itemPrice += $offer->price;
                    $totalQuantity -= $offer->quantity;
                }
            }
        }

        if ($totalQuantity > 0)
        {
            $itemPrice = ($item->price * $totalQuantity);
        }

        return $itemPrice;
    }
}
