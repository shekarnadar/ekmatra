<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    //save feature
    public static function saveFeature($request) {
        
        $feature = Feature::create([
            'name' => $request['name']
        ]);

        return $feature;
    }
}
