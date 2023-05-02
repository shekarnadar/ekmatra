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
			$product->whereHas('getProduct',function ($statusquery) use ($request){
						//I need to write query 
						$statusquery->where('status',1);
					});

 		}
		else if($type == 'brand'){
			$occasion_id = '';
			$feature_attribute_id = FeatureAttribute::where('name',$value)->pluck('id')->first();
			$product = Product::where('feature_attribute_id',$feature_attribute_id)->where('status',1);
		}
		$product = $product->paginate(10);
		return view('gift', compact('product','occasion_id','feature_attribute_id','type'));
	}

	public function shopByFilter(Request $request){

		if($request['type'] == 'occasions'){
				$product = ProductOccasion::with('getProduct')->where('occasion_id',$request->occasion_id);
				$product->whereHas('getProduct',function ($statusquery) use ($request){
						//I need to write query 
						$statusquery->where('status',1);
					});

		}else{
				$product = Product::where('feature_attribute_id',$request['feature_attribute_id'])->where('status',1);

	  }
	 	 if($request['warranty']){
	 	 	  if($request['type'] == 'occasions'){
    			$product->whereHas('getProduct',function ($warrentyquery) use ($request){
						//I need to write query 
						$warrentyquery->where('warrenty',$request['warranty']);
					});
    		}else{
    			$product->where('warrenty',$request['warranty']);
    		}
    	}

    	if($request['min_price'] > 0 && $request['max_price']  > 0)
        {
        	  if($request['type'] == 'occasions'){
        	  	$product->whereHas('getProduct',function ($pricequery) use ($request){
								 $pricequery->whereBetween('price', [$request['min_price'] , $request['max_price'] ]);
					    });
        	  }else{
           	 $product->whereBetween('price', [$request['min_price'] , $request['max_price'] ]);
        	  }
        }
        if($request['min_qty'] > 0 && $request['max_qty']  > 0)
        {
        	   if($request['type'] == 'occasions'){
        	   		$product->whereHas('getProduct',function ($qtyquery) use ($request){
									$qtyquery->whereBetween('maq', [$request['min_qty'] , $request['max_qty'] ]);
								});
        	   }else{
        	   	 $product->whereBetween('maq', [$request['min_qty'] , $request['max_qty'] ]);
        	   }
           
        }
        if($request['max_qty'] == 150) {
        	 if($request['type'] == 'occasions'){
        	 	$product->whereHas('getProduct',function ($maqquery) use ($request){
									 	$maqquery->where('maq','>=',$request['max_qty']);
						});
        	 }else{
        	 	$product->where('maq','>=',$request['max_qty']);
        	 }
        	 
        }
        if($request['max_price'] == 5000){
        	if($request['type'] == 'occasions'){
        		$product->whereHas('getProduct',function ($pricequery) use ($request){
        			$pricequery->where('price','>=',$request['max_price']);
        		});
        	}else{
        		$product->where('price','>=',$request['max_price']);
        	}
        }
	
		if($request['page_limit']){
       $page_limit = $request['page_limit'];
    }else{
       $page_limit = 10;
    }
    	
    if($request['sort_by']){
    	    $product->orderBy(Product::select($request['sort_by'])->whereColumn('products.id', 'product_occasions.product_id'),$request['order_by']);

    		//$product->orderBy($request['sort_by'],$request['order_by']);
    }else{
    		 $product->orderBy('created_at','desc');
		}

		$product = $product->paginate($page_limit);
		return view('presult', compact('product'));
	}
}
