<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_id', // Assuming you have a client_id foreign key in your orders table
        'total_amount',
        // ... other fields ...
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'client_id'); // Adjust the foreign key column name if needed
    }

    // Define the relationship with OrderItem model
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
}

