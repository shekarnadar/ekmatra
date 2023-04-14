<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
		
		
		return $subcat;  
	}

	

	public function category(){
	  return $this->belongsTo('App\Models\Category', 'category_id','id');
   }

	
}
