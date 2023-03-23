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
        
        if(isset($request['id'])){
            $id = $request['id'];
        }else{
            $id = 0;
        }
        $matchThese = ['id'=>$id];
        $feature = Feature::updateOrCreate($matchThese,
            ['name' => $request['name']]
        );
        
        return $feature;
    }

    //get features
    public static function getFeatures() {

         $feature = Feature::orderBy('created_at','desc')->get();
         return $feature;
    }
}
