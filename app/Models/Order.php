<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'customer_id',
        'totalamount',
        'orderdate',
        'status',
        
    ];

    public function customer() {
        return $this->belongsto(User::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItems::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
