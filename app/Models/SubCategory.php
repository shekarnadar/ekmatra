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
		
		foreach($features as $key=>$feature_val) {
				$decode = json_decode($feature_val,true);
				$array = (array)$decode;
				foreach($array as $val){
					SubCategoryFeature::Create([
							'category_id' => $request['id'],
							'sub_category_id' => $subcat->id,
							'name' => $val['value'],
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
