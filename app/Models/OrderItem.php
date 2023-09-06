<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        // ... other fields ...
    ];

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class); // Adjust the class name if needed
    }
}

