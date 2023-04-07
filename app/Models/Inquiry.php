<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
     protected $fillable = [
        'product_id',
        'quantity',
        'client_id',
        'vendor_id'
    ];
}
