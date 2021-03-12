<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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

        $item = Item::factory()->create();

        $response = $this->post('cart', [
            'item_id' => $item->id,
            'price' => $item->price,
            'quantity' => 1
        ]);

        $response->assertRedirect('cart');        
    }
}
