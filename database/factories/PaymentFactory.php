<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id'       => Order::factory(),
            'payment_method' => $this->faker->randomElement(['cash', 'card']),
            'payment_status' => $this->faker->randomElement(['pending', 'paid', 'failed']),
            'payment_date'   => $this->faker->dateTime(),
            'payment_amount' => $this->faker->randomFloat(2, 20, 1000),
        ];
    }
}
