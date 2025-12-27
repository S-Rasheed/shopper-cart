<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
    ];

    /**
     * An order belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An order has many order items
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
