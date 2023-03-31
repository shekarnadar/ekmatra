<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryFeature;
use App\Models\Product;
use App\Models\Deal;
use App\Models\ProductDeal;

use DataTables;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		//
		if ($request->ajax()) {
					$data = Product::getProducts();

					return Datatables::of($data)
					->addColumn('category_name', function($row){
						return $row->category->name;
					 })
					->addColumn('subcategory_name',function($row){
						return $row->subCategory->name;
					})
					->addColumn('createdBy',function($row){
						if(getAuthGaurd() == 'admin'){
							return $row->createdBy->name;	
						}else{
							return '';
						}
						
					})
					->addColumn('image', function($row){
						$imageval = url('product/' . $row->image);
                    return '<img src="' . $imageval . '" class="h-50 w-50"/>';
					 })
						->addColumn('action', function($row){
								$url = url(getAuthGaurd().'/product/edit')."/".$row->id;
								$btn = '<a href="'.$url.'" class="edit btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;';
								if(getAuthGaurd() != 'admin'){
									$status = ($row['status']== 0) ? 'DeActive' : 'Active';
									$class = ($row['status']== 0) ? 'danger' : 'success';
									$btn.= '<span  class="edit btn btn-'.$class.' btn-sm">'.$status.'</span>&nbsp;&nbsp;';
								}else{
									$status = ($row['status']== 0) ? 'Active' : 'DeActive';
									$class = ($row['status']== 0) ? 'success' : 'danger';
									$status_val = ($row['status']== 0) ? '1' : '0';
									$btn.= '<button class="edit btn btn-'.$class.' btn-sm changestaus" data-id='.$row["id"].' data-status='.$status_val.' data-msg='.$status.'>'.$status.'</button>&nbsp;&nbsp;';
								}
										
									
								
								
								return $btn;
					 })
					->rawColumns(['action', 'image'])
					->make(true);
			}
			return view('product.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		$category =  Category::get();
		$deals = Deal::get();
		return view('product.create',compact('category','deals'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		try {
			
			if($request->file('image')){
				if($request['id']){

				$image_path = public_path("product/".$request['old_image']);  // Value is not URL but directory file path
					if(\File::exists($image_path)) {
    					\File::delete($image_path);
					}
				}
			 	$image = uploadImage('product',$request->image);
		    $request['image'] = $image;
			}
		 	
		 	Product::saveProduct($request->input());
			return response()->json(['success' => true,
				'message' => 'Product has been'.($request['id'] ? 'updated' : 'added')  .' successfully.'
		  ], 200);

		} catch(\Exception $e){
			echo $e->getMessage();
			return response()->json(['success' => false,
				'message' => 'something went wrong'], 200);
		} 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
		$product = Product::find($id);
		$product_deals = ProductDeal::where('product_id',$id)->pluck('deal_id')->toArray();
		$deals = Deal::get();
		$category =  Category::get();
		$subCategory = SubCategory::where('category_id',$product['category_id'])->get();
		$brand = SubCategoryFeature::where('sub_category_id',$product['sub_category_id'])->get();
		return view('product.create',compact('category','product','subCategory','brand','deals','product_deals'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * get subcategory by id
	 */ 
	public function getSubCategoryById(Request $request){
		$category_id = $request->input('category_id');
		$sub_cat = SubCategory::where('category_id',$category_id)->select(['name','id'])->get();
		return response()->json($sub_cat);
	}

	public function getBrand(Request $request){
		$subcategory_id = $request->input('sub_category_id');
		$brand = SubCategoryFeature::where('sub_category_id',$subcategory_id)->get();
		return response()->json($brand);
	}

	public function statusChange(Request $request){
		try {
			$status_msg = ($request->status == 0)? 'DeActive' : 'Active';
			Product::where('id',$request->id)->update(['status'=>$request->status]);
			
			return response()->json(['success' => true,
				'message' => 'Product has been '.$status_msg  .' successfully.'
		  ], 200);

		} catch(\Exception $e){
			return response()->json(['success' => false,
				'message' => 'something went wrong'], 200);
		}  

	}
}
