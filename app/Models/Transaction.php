<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Transaction extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'gross_amount',
        'status',
        'snap_token',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'transaction_id');
    }
}
