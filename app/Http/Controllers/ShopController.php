<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\SubCategoryFeature;



class ShopController extends Controller
{
	//
	public function index($category){
		
		$category = Category::with(['subCategory','brands'])->where('name',$category)->first();
		
		$cat_id = $category['id'];
		$cat_name = $category['name'];
		
		$subCategory = $category['subCategory'];
		$brand = $category['brands'];

		$product = Product::where('category_id',$cat_id)->where('status',1)->get();
		
		return view ('shop',compact('cat_id','subCategory','brand','cat_name','product'));
	}

	public function subCategoryList($category,$subcategory){
		
		$sub_cat = SubCategory::with('features')->where('name',$subcategory)->first();
		return view ('subCategoryshop',compact('sub_cat'));
	
	}
}
