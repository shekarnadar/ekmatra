<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'image'
    ];

   //save category
    public static function saveCategory($request){
        if(!empty($request['id'])){
            $Category = Category::where('id', $request['id'])->first();
        } else {
            $Category = new Category();
        }
        $Category->name = $request['name'];
        $Category->image = $request['image'];
        $Category->save();
        return $Category;
    }

    public static function getCategories() {

         $category = Category::orderBy('created_at','desc')->get();
         return $category;
    }
}
