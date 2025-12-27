<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['image', 'name', 'description', 'price', 'stock_quantity'];

    /**
     * Get all order items for this product
    */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
