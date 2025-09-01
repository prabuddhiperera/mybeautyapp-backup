<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'totalamount' => $this->faker->randomFloat(2, 20, 1000),
            'orderdate'   => $this->faker->dateTime(),
            'status'      => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
        ];
    }
}
