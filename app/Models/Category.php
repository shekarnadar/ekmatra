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
         if(isset($request['id'])){
            $id = $request['id'];
        }else{
            $id = 0;
        }
        $matchThese = ['id'=>$id];
        $Category = Category::updateOrCreate($matchThese,$request);
        return $Category;
    }

    public static function getCategories() {

         $category = Category::orderBy('created_at','desc')->get();
         return $category;
    }

    //get subcategory
    public  function subCategory() {
        return $this->hasMany('App\Models\SubCategory');
    }

    public  function brands() {
        return $this->hasMany('App\Models\SubCategoryFeature','category_id','id');
    }

    public function getDeals() {
       return Deal::get();
    }
}
