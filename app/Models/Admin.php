<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory; 

    protected $fillable = [
        'name',
        'password',
    ];

    // can manage users
    public function user()
    {
        return $this->hasMany(User::class);
    }

    //can mage orders
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    //can manage payments
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    //can manage products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //can manage categories
     public function categories()
    {
        return $this->hasMany(Category::class);
    }

    //can manage reviews 
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

