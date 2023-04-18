<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\SubCategoryFeature;


class ShopController extends Controller
{
	//
	public function index($category,Request $request){
		
		$category = Category::with(['subCategory'])->where('name',$category)->first();
		
		$cat_id = $category['id'];
		$cat_name = $category['name'];
		
		$subCategory = $category['subCategory'];
		//$brand = $category['brands'];
		
		$brand = Product::with('feature_attributes')
		->where('category_id',$cat_id)->where('status',1)->groupBy('feature_attribute_id')->get();

    	
		$product = Product::where('category_id',$cat_id)->where('status',1);
		$product=$product->orderBy('created_at','desc')->paginate(10);
		
		
		return view ('shop',compact('cat_id','subCategory','brand','cat_name','product'));
	}
    
    public function filterResult(Request $request){

    	$product = Product::where('category_id',$request['cat_id']);
    	if($request['sub_cat_id']){
    		$product->where('sub_category_id',$request['sub_cat_id']);
    	}
    	if($request['brand_array']){
    		$product->whereIn('feature_attribute_id',$request['brand_array']);
    	}
    	if($request['warranty']){
    		$product->where('warrenty',$request['warranty']);
    	}
    	if($request['min_price'] > 0 && $request['max_price']  > 0)
        {
            $product->whereBetween('price', [$request['min_price'] , $request['max_price'] ]);
        }
        if($request['min_qty'] > 0 && $request['max_qty']  > 0)
        {
            $product->whereBetween('maq', [$request['min_qty'] , $request['max_qty'] ]);
        }
        if($request['max_qty'] == 150) {
        	 $product->where('maq','>=',$request['max_qty']);
        }
        if($request['max_price'] == 5000){
        	$product->where('price','>=',$request['max_price']);
        }
        if($request['page_limit']){
        	$page_limit = $request['page_limit'];
        }else{
        	$page_limit = 10;
        }
    	$product = $product->where('status',1);
    	
    	
    	if($request['sort_by']){
    		$product->orderBy($request['sort_by'],$request['order_by']);
    	}else{
    		 $product->orderBy('created_at','desc');
		}

    	$product= $product->paginate($page_limit);
  

		if ($request->ajax()) {
			return view('presult', compact('product'));
		}
    }
	public function subCategoryList($category,$subcategory){
		
		$category_name = $category;
		$sub_cat = SubCategory::where('name',$subcategory)->first();
		
		$product = Product::where('sub_category_id',$sub_cat['id'])->where('category_id',$sub_cat['category_id'])->where('status',1); 
		
		$product = $product->orderBy('created_at','desc')->paginate(10);
		

		$brand = Product::with('feature_attributes')
		->where('category_id',$sub_cat['category_id'])->where('sub_category_id',$sub_cat['id'])->where('status',1)->groupBy('feature_attribute_id')->get();
		

		return view ('subCategoryshop',compact('sub_cat','product','category_name','subcategory','brand'));
	
	}
}
