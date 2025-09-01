<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'rating',
        'comment',
        'created_at',

    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
