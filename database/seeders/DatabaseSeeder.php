<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin
        Admin::factory()->create([
            'name' => 'admin',
            'password' => bcrypt('password'),
        ]);

        // Create 10 users
        $users = User::factory(10)->create();

        // Create categories
        $categoryNames = [
            'Acne',
            'Hyperpigmentation',
            'Brightening',
            'Cleanser & Makeup Remover',
            'Moisturizer',
            'Makeup'
        ];

        $categories = [];
        foreach ($categoryNames as $name) {
            $categories[$name] = Category::create([
                'name' => $name,
                'description' => "This category is for " . $name,
            ]);
        }

        // Create products for each category
        $products = [];
        foreach ($categories as $name => $category) {
            $products = array_merge($products, Product::factory(5)->create([
                'category_id' => $category->id,
                'name' => $name . ' Product',
            ])->all());
        }

        // Create orders, order items, and payments
        $orders = Order::factory(10)->create([
            'customer_id' => $users->random()->id,
        ]);

        foreach ($orders as $order) {
            $items = OrderItem::factory(rand(1, 3))->create([
                'order_id' => $order->id,
                'product_id' => Product::inRandomOrder()->first()->id,
            ]);

            // Calculate total amount
            $totalAmount = $items->sum(fn($item) => $item->price * $item->quantity);
            $order->update(['totalamount' => $totalAmount]);

            // Create payment
            Payment::factory()->create([
                'order_id' => $order->id,
                'payment_amount' => $totalAmount,
            ]);
        }

        // Create 1–3 random reviews for each product
        foreach ($products as $product) {
            $reviewCount = rand(1, 3);
            for ($i = 0; $i < $reviewCount; $i++) {
                $randomCustomerId = $users->random()->id;

                Review::factory()->create([
                    'customer_id' => $randomCustomerId,
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
