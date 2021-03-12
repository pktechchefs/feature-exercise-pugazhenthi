<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Cart;
use App\Models\Item;
use App\Models\ItemOffer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_see_cart()
    {
        $this->get('cart')
            ->assertOk();
    }

    public function test_a_user_can_add_item_to_cart()
    {
        $this->withoutExceptionHandling();

        $item = Item::factory()->create(['price' => 50]);

        $response = $this->post('cart', [
            'item_id' => $item->id,
            'price' => $item->price,
            'quantity' => 2
        ]);

        $this->assertDatabaseHas('carts', [
            'price' => 50,
            'amount' => 100,
        ]);

        $response->assertRedirect('cart');        
    }

    public function test_an_item_can_have_a_offer_and_special_price()
    {
        $this->withoutExceptionHandling();

        $item = Item::factory()->create(['name' => 'A', 'price' => 50]);

        ItemOffer::factory()->create([
            'item_id' => $item->id,
            'price'=> 130,
            'quantity' => 3
        ]);

        $amount = Cart::calculateAmount($item->id, 3);

        $this->assertEquals(130, $amount);        
    }

    public function test_an_item_can_have_multiple_offers()
    {
        $this->withoutExceptionHandling();

        $item = Item::factory()->create(['name' => 'C', 'price' => 20]);

        // if user buy 2 items price will be 38
        ItemOffer::factory()->create([
            'item_id' => $item->id,
            'price'=> 38,
            'quantity' => 2
        ]);

        // if user buy 3 items price will be 50
        ItemOffer::factory()->create([
            'item_id' => $item->id,
            'price'=> 50,
            'quantity' => 3
        ]);

        // if user buy 5 items price shoul be 38+50 = 88
        $amount = Cart::calculateAmount($item->id, 5);
        $this->assertEquals(88, $amount);        
    }

    public function test_an_item_can_have_combo_offer()
    {
        $this->withoutExceptionHandling();

        $itemA = Item::factory()->create(['name' => 'A', 'price' => 50]);

        $itemD = Item::factory()->create(['name' => 'D', 'price' => 15]);

        ItemOffer::factory()->create([
            'item_id' => $itemD->id,
            'price'=> 5,
            'quantity' => 1,
            'combo_item_id' => $itemA->id
        ]);

        $this->post('cart', [
            'item_id' => $itemA->id,
            'price' => $itemA->price,
            'quantity' => 6
        ]);

        $this->post('cart', [
            'item_id' => $itemD->id,
            'price' => $itemD->price,
            'quantity' => 10
        ]);

        // if user buy 6 items of D then 6 time the offer price should be applied
        $amount = Cart::calculateAmount($itemD->id, 10);
        
        $this->assertEquals(90, $amount);
    }
    
}
