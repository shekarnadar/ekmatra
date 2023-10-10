<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\ProductWishList;
use PDF;

class WishlistController extends Controller
{
	//
	public function setMargin(Request $request){
		$wishlist_id = $request->wishlist_id;
		$margin_type = $request->margin_type;
		$margin_price = $request->margin;

		$product = ProductWishList::where('wishlist_id',$wishlist_id)->get();
		foreach($product as $value){
			if($margin_type == 'rs'){
				$price = $value['price'] + $margin_price;
			}else{
				$calculate_price = ($margin_price / 100) * $value['price'];
				$price  = $value['price'] + $calculate_price;

			}
			ProductWishList::where('id',$value['id'])->update(['margin_price'=>$price,
			'margin_type' => $margin_type,
			'margin_value' => $margin_price
		]);
		}
		$Wishlist = Wishlist::where('id',$wishlist_id)->update([
			'margin_type' => $margin_type,
			'margin_value' => $margin_price
		]);	
		$wishlist = Wishlist::with('ProductWishList.getProduct')->where('id',$wishlist_id)->first();	
		$result = ProductWishList::with('getProduct')->where('wishlist_id',$wishlist_id)->get();
	
		$html = view('wishlist.wishlist-margin')->with(compact('result','margin_price','margin_type','wishlist'))->render();
		return response()->json(['success' => true,
				'html' => $html,
		  ], 200);

	}

	public function singlesetMargin(Request $request){
		$wishlist_id = $request->wishlist_id;
		$margin_type = $request->margin_type;
		$margin_price = $request->margin;
		$wishlistid = $request->wishlistid;

		$product = ProductWishList::where('id',$wishlist_id)->first();
		
			if($margin_type == 'rs'){
				$price = $product['price'] + $margin_price;
			}else{
				$calculate_price = ($margin_price / 100) * $product['price'];
				$price  = $product['price'] + $calculate_price;

			}
		
			ProductWishList::where('id', $wishlist_id)->update([
				'margin_price'=>$price,
				'margin_type' => $margin_type,
			    'margin_value' => $margin_price
			]);
		
			$wishlist = Wishlist::with('ProductWishList.getProduct')->where('id',$wishlistid)->first();

		 

		$result = ProductWishList::with('getProduct')->where('wishlist_id',$wishlistid)->get();
	
		$html = view('wishlist.wishlist-margin')->with(compact('result','wishlist','margin_price','margin_type'))->render();
		return response()->json(['success' => true,
				'html' => $html,
		  ], 200);

	}

	public function store(Request $request){
		$client_id = \Auth::user()->id;
		$product_price = $request['product_price'];
		$wishlist = Wishlist::create([
			'name' => $request['name'],
			'client_id' => $client_id
		]);
		if(@$request['multipleProduct']){
				foreach($request['multipleProduct'] as $value){
					ProductWishList::create([
			 			'client_id' => $client_id,
			 			'product_id' => $value['product_id'],
			 			'wishlist_id' => $wishlist->id,
			 			'price' => $value['price'],
			 			'margin_price' => $value['price']
				 ]);
			}
		}else{
			ProductWishList::create([
			 'client_id' => $client_id,
			 'product_id' => $request->product_id,
			 'wishlist_id' => $wishlist->id,
			 'price' => $product_price,
			 'margin_price' => $product_price
			]);
		}
		
		 $count = ProductWishList::where('client_id',$client_id)->count();
        \Session::put('wishlistCount',$count);
		 
		 $html= '<li><input type="checkbox" name="wishlist[]" id="wishlist" class="wishlist" value="'.$wishlist->id.'" checked="checked"/>'.$request['name'].'</li>';
		 
		 return response()->json(['success' => true,
				'html' => $html,
				'count' => $count
		  ], 200);
	}
	public function getUserWishList($product_id){
		if (\Auth::user()){
			$client_id = \Auth()->user()->id;
			if($product_id == 0){
					$wishlist = Wishlist::where('client_id',$client_id)->get();
			}else{
					$wishlist = Wishlist::with('ProductWishList')->where('client_id',$client_id)->get();
			}
		
			$html = '';

			foreach($wishlist as $value){
				if($product_id  == 0){
					$checked = '';
				}else{
					$product_array = $value->ProductWishList->pluck('product_id')->toArray();
					if(in_array($product_id,$product_array)){
						$checked = 'checked=checked';
					}else{
						$checked = '';
					}
				}
				
			
				$html.= '<li><input type="checkbox" name="wishlist[]" id="wishlist" class="wishlist" value="'.$value['id'].'" '.$checked.'/>'.$value['name'].'</li>';

			}
			return $html;
		}
	}
		
		
	
	public function assignProduct(Request $request){
		$wishlist_id =  $request->wishlist_id;
		$product_id =  $request->product_id;
		$client_id = \Auth()->user()->id;
		
		$wishlist = Wishlist::where('id',$wishlist_id)->first();
		
		if(@$request['multipleProduct']){
				foreach($request['multipleProduct'] as $value){
					$matchThese = [
							'wishlist_id' => $wishlist_id,
							'product_id' => $value['product_id'],
							'price'=> $value['price'],
							'client_id' => $client_id
				 	];
				 	$productWishList = ProductWishList::where($matchThese)->first();
					 
				 	if(!$productWishList){
				 			  
							  $matchThese['margin_type'] = $wishlist['margin_type'];
							  $matchThese['margin_value'] = $wishlist['margin_value'];
							  $matchThese['price'] =  $value['price'];
							  $matchThese['margin_price'] = $value['price'];
						if($wishlist['margin_type']){
							if($wishlist['margin_type'] == 'percent'){
								
								$calculate = ($value['price'] / 100) * $wishlist['margin_value'];
								
								$matchThese['margin_price'] = $value['price'] + $calculate;
								
							}else{
								$matchThese['margin_price'] = $value['price'] + $wishlist['margin_value'];
								
							}
						}
						
						
							
						ProductWishList::create($matchThese);
					}
				
			}
		}else{
				$matchThese = [
					'wishlist_id' => $wishlist_id,
					'product_id' => $product_id,
					'client_id' => $client_id
				];
				
				$productWishList = ProductWishList::where($matchThese)->first();
				//$wishlist = Wishlist::where('id',$wishlist_id)->first();

				if($productWishList){
					$productWishList->delete();
				}else{
					$matchThese['price'] = $request['product_price'];
					
					if($wishlist['margin_type']){
						if($wishlist['margin_type'] == 'percent'){
							$calculate = ($request['product_price'] / 100) * $wishlist['margin_value'];
							$matchThese['margin_price'] = $request['product_price'] + $calculate;
						}else{
							$matchThese['margin_price'] = $request['product_price'] + $wishlist['margin_value'];
						}
					}else{
						$matchThese['margin_price'] = $request['product_price'];
					}
					$matchThese['margin_type'] = $wishlist['margin_type'];
					$matchThese['margin_value'] = $wishlist['margin_value'];
					// print_r($matchThese);
					// die();
					ProductWishList::create($matchThese);
				}
		}
		
     $count = ProductWishList::where('client_id',$client_id)->count();
     \Session::put('wishlistCount',$count);
     return $count;
	}

	public function wishlist(){
		$client_id = \Auth()->user()->id;
		$wishlist = Wishlist::withCount('ProductWishList')->where('client_id',$client_id)->get();
		return view('wishlist.index',compact('wishlist'));
	}

	public function wishlistDownload($id){
	$wishlist = Wishlist::with('ProductWishList.getProduct.category.subCategory')->where('id',$id)->first();

		 $data = [
            'wishlists' => $wishlist
        ]; 
            
        $pdf = PDF::loadView('wishlistPDF', $data);
     
        return $pdf->download($wishlist['name'].'.pdf');
	}

	public function wishlistView($id){
		$wishlist = Wishlist::with('ProductWishList.getProduct')->where('id',$id)->first();

		 
        return view('wishlist.detail',compact('wishlist'));
	}


	// public function wishlistView($id){
 //    $wishlist = Wishlist::with(['ProductWishList' => function ($query) {
 //        $query->orderBy('margin_price', 'asc');
 //    }])->where('id', $id)->first();

 //    return view('wishlist.detail', compact('wishlist'));
 //    }


	public function removeProductWishlist(Request $request){
		$id = $request->id;

		ProductWishList::where('id',$id)->delete();
		$client_id = \Auth()->user()->id;
        $count = ProductWishList::where('client_id',$client_id)->count();
        \Session::put('wishlistCount',$count);
		return response()->json(['success' => true,
				'message' => 'Product has been deleted sucessfully',
				'count' => $count
		  ], 200);

	}

	public function savewishlist(Request $request){
		$id = $request->id;
		Wishlist::where('id',$id)->update([
			'name' => $request->name
		]);	
		return response()->json(['success' => true,
				'message' => 'wishlist has been updated sucessfully',
		  ], 200);
	}

	public function uploadlogo(Request $request)
	{
		if ($request->hasfile('logo')) 
		{
			$image = $request->file('logo');
            $imageName = time() . rand(11111, 99999) . '.' . $image->getClientOriginalExtension();
		    $destination = public_path() . '/'.'logo';

			//check directory avilable
			if (!is_dir($destination)) {
					\File::makeDirectory($destination, $mode = 0777, true, true);
			}
		    $fileName = str_replace(" ", "-", $imageName);
		    $image->move($destination, $fileName);
		    $id = $request->id;
		    Wishlist::where('id',$id)->update([
			'logo' => $fileName
		    ]);	
			return response()->json([
				'success' => true,
				'message' => 'Wishlist logo has been updated successfully.',
			], 200);
			
        }
		else
		{
			return response()->json([
				'error' => true,
				'message' => 'Wishlist logo cannot be empty.',
			], 400); // 400 Bad Request status code for errors
        }

	}

	public function deletelogo(Request $request)
{
    $id = $request->id;
    $wishlist = Wishlist::find($id);

    if ($wishlist) {
        if ($wishlist->logo) {
            // Delete the logo file
            $logoPath = public_path('logo') . '/' . $wishlist->logo;
            if (file_exists($logoPath)) {
                unlink($logoPath);
            }

            // Clear the logo column in the table
            $wishlist->update(['logo' => null]);

            return response()->json([
                'success' => true,
                'message' => 'Logo has been deleted successfully.'
            ], 200);
        }
    }

    return response()->json([
        'failed' => true,
        'message' => 'Logo could not be deleted.'
    ], 400);
}



	public function removewishlist(Request $request){
		
		$id = $request->id;
		
		Wishlist::where('id',$id)->delete();
		
		$client_id = \Auth()->user()->id;
        
        $count = ProductWishList::where('client_id',$client_id)->count();

        \Session::put('wishlistCount',$count);

		return response()->json(['success' => true,
				'message' => 'wishlist has been deleted sucessfully',
				'count' => $count
		  ], 200);
	}
}
