<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryFeature;



class ShopController extends Controller
{
	//
	public function index($category){
		
		$category = Category::where('name',$category)->first();
		$cat_id = $category['id'];
		
		$subCategory = SubCategory::select('id','name')->where('category_id',$category['id'])->get();
		
		$brand = SubCategoryFeature::select('id','name')->where('category_id',$cat_id)->get();
		return view ('shop',compact('cat_id','subCategory','brand'));
	}
}
