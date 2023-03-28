<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategoryFeature;


class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categorys';
    protected $fillable = [
        'name',
        'category_id'
    ];

    public static function saveSubcategory($request) {
       
        $subcat = SubCategory::Create([
            'category_id' => $request['id'],
            'name' => $request['name']
        ]);
        
        $features = $request['faetures'];
        
        foreach($features as $key=>$val) {
            $explode = explode(',',$val);
            foreach($explode as $ex){
                SubCategoryFeature::Create([
                    'category_id' => $request['id'],
                    'sub_category_id' => $subcat->id,
                    'name' => $ex,
                    'feature_id' => $key
                ]);
            }
        }

        return $subcat;  
    }

    public function features(){
        return $this->hasMany('App\Models\SubCategoryFeature');
    }


    public function category(){
      return $this->belongsTo('App\Models\Category', 'category_id','id');
   }

    public function tags(){
     return $this->belongsToMany('App\Models\SubCategoryFeature','sub_category_features');
  }
}
