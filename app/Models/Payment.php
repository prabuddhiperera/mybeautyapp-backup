<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order-id',
        'payment_method',
        'payemnt_status',
        'payment_date',
        'payment_amount',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}

