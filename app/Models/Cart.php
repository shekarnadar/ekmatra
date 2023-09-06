<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','client_id', 'quantity', 'price','image','status'];

    // Define the relationship with the Product model (assuming you have a Product model).
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Optionally, define the relationship with the User model if the cart is user-specific.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'id');
    }
}