<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => User::factory(),
            'product_id'  => Product::factory(),
            'rating'      => $this->faker->numberBetween(1, 5),
            'comment'     => $this->faker->sentence(),
            'created_at'  => now(),

        ];
    }
}

