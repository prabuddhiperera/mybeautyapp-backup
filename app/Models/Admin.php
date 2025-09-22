<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    // The guard used for this model (optional)
    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'password',
    ];

    // Hide sensitive fields
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // If you add email_verified_at etc.
    protected $casts = [
        'email_verified_at' => 'datetime',
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

