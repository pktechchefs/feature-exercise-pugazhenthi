<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\ItemOffer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'A', 'price' => 50],
            ['name' => 'B', 'price' => 30],
            ['name' => 'C', 'price' => 20],
            ['name' => 'D', 'price' => 15],
            ['name' => 'E', 'price' => 5],
        ];

        foreach($items as $item) {
            Item::factory()->create($item);
        }

        $offers = [
            ['item_id' => 1, 'quantity' => 3, 'price' => 130],
            ['item_id' => 2, 'quantity' => 2, 'price' => 45],
            ['item_id' => 3, 'quantity' => 2, 'price' => 38],
            ['item_id' => 3, 'quantity' => 3, 'price' => 50],
            ['item_id' => 4, 'quantity' => 5, 'price' => 5, 'combo_item_id' => 1]
        ];
        
        foreach($offers as $offer) {
            ItemOffer::factory()->create($offer);
        }
    }
}
