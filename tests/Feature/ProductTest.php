<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_view_product_details()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create([
            'name' => 'Acne Cleanser',
            'price' => 15.99,
            'description' => 'Test product',
        ]);

        $response = $this->actingAs($user)
                         ->get(route('product.details', $product->id));

        $response->assertStatus(200);
        $response->assertSeeText('Acne Cleanser');
        $response->assertSeeText('15.99');
        $response->assertSeeText('Test product');
    }
}
