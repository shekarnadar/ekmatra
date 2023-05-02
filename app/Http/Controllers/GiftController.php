<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occasions;
use App\Models\ProductOccasion;
use App\Models\FeatureAttribute;
use App\Models\Product;

class GiftController extends Controller
{
	//
	public function index(Request $request,$type,$value){

		if($type == 'occasions'){
			
			$occasion_id = Occasions::where('name',$value)->pluck('id')->first();
			
			$feature_attribute_id = '';
			
			$product = ProductOccasion::with('getProduct')->where('occasion_id',$occasion_id);
 		}
		else if($type == 'brand'){
			$occasion_id = '';
			$feature_attribute_id = FeatureAttribute::where('name',$value)->pluck('id')->first();
			$product = Product::where('feature_attribute_id',$feature_attribute_id);
		}
		$product = $product->paginate(10);
		return view('gift', compact('product','occasion_id','feature_attribute_id','type'));
	}

	public function shopByFilter(Request $request){

			if($request['type'] == 'occasions'){
					$product = ProductOccasion::with('getProduct')->where('occasion_id',$request->occasion_id);
			}else{
						$product = Product::where('feature_attribute_id',$request['feature_attribute_id']);
			}
	
		if($request['page_limit']){
        	$page_limit = $request['page_limit'];
        }else{
        	$page_limit = 10;
        }
    	
    	if($request['sort_by']){
    		$product->orderBy($request['sort_by'],$request['order_by']);
    	}else{
    		 $product->orderBy('created_at','desc');
		}

		$product = $product->paginate($page_limit);
		return view('presult', compact('product'));
	}
}
