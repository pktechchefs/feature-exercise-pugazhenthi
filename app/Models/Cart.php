<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public static function calculateAmount($itemId, $quantity)
    {
        $item = Item::find($itemId);
        
        $itemPrice = 0;

        $totalQuantity = $quantity;

        $cartItems = Cart::all();

        if ($item->offers()->count())
        {
            // item offers order should be desc by qty
            foreach ($item->offers as $offer)
            {
                if ($quantity >= $offer->quantity && $offer->combo_item_id) {
                
                    if ($cartItems->count())
                    {
                        $isExist = $cartItems->find($offer->combo_item_id);
                        
                        if ($isExist)
                        {
                            $itemPrice += ($isExist->quantity * $offer->price);
                            $totalQuantity -= $isExist->quantity;
                        }
                    }

                } else if ($quantity >= $offer->quantity) {
                    // offer should match the quanity based on condition
                    
                    $itemPrice += $offer->price;
                    $totalQuantity -= $offer->quantity;
                }
            }
        }
 
        if ($totalQuantity > 0)
        {
            $itemPrice += ($item->price * $totalQuantity);
        }

        return $itemPrice;
    }
}
