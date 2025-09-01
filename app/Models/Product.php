<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'description',
        'price',
        'quantity',
        'category_id',
        'image',
    ];

    // Each product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A product can appear in many order_items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // A product belongs to many orders via order_items
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

    // Customers who purchased this product (via order_items → orders)
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'order_items', 'product_id', 'order_id')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

    // Reviews for this product
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Optional: if products are created by admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
