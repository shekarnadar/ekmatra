<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
	use HasFactory;
	protected $fillable = [
		'name',
		'image',
		'price',
		'mrp',
		'maq',
		'warrenty',
		'description',
		'sub_category_feature_id',
		'category_id',
		'sub_category_id',
		'created_by',
		'feature_attribute_id',
		'status'
	];

	public static function saveProduct($post){
		 if(isset($post['id'])){
            $id = $post['id'];
        }else{
            $id = 0;
        }
        if(getAuthGaurd() == 'admin'){
        	$post['status'] = 1;
        }else{
        	$post['status'] = 0;
        }
        $post['created_by'] = \Auth::guard(getAuthGaurd())->user()->id; 
        $matchThese = ['id'=>$id];
        $product = Product::updateOrCreate($matchThese,$post);
       
       

        return $product;
	}

	public function category(){
	  return $this->belongsTo('App\Models\Category', 'category_id','id');
   }

   public function subCategory(){
	  return $this->belongsTo('App\Models\SubCategory', 'sub_category_id','id');
   }

   public static function getProducts(){
   	$query = Product::with(['createdBy','category','subCategory'])->select(['id','name','image','price','category_id','sub_category_id','created_by','status']);
   	if(getAuthGaurd() != 'admin'){
   		$query->where('created_by',\Auth::guard(getAuthGaurd())->user()->id);
   	}
   	$query = $query->orderBy('created_at','desc')->get();
   	return $query;
   }

   public function createdBy(){
	  return $this->belongsTo('App\Models\user', 'created_by','id');
   }

   //get Latest Product
   public static function getLatestProduct(){
   	$product = Product::where('status',1)->latest()->take(5)->get();
   	return $product;
   }

   //get Brand
   public  function getBrands(){
   		return $this->belongsTo('App\Models\SubCategoryFeature', 'sub_category_feature_id','id');
	}
	public function feature_attributes(){
		return $this->belongsTo('App\Models\FeatureAttribute', 'feature_attribute_id','id');
	}

}
