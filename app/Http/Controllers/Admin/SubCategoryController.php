<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\SubCategory;
use App\Models\SubCategoryFeature;
use DataTables;

class SubCategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request,$id)
	{
		//
		$cat_id = $id;
		if ($request->ajax()) {
			$data = SubCategory::with('category')->where('category_id',$cat_id)->get();

					return Datatables::of($data)
					->addColumn('category', function($row){
							
						return $row['category']['name'];
					 })
						->addColumn('action', function($row){
								$url = url('admin/category/edit')."/".$row->id;
								$sub_cat = url('admin/category/sub-cat/show').'/'.$row->id;
								$sub_cat_edit = url('admin/category/sub-cat/edit/').'/'.$row->id;
								$btn = '<a href="'.$sub_cat_edit.'" class="edit btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;';
								$btn.='<a href="'.$sub_cat.'" class="btn btn-primary btn-sm">View</a>';
								return $btn;
					 })
					->rawColumns(['action', 'image'])
					->make(true);
		}
		return view('admin.sub-category.index',compact('cat_id'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($id)
	{
		//
		$feature = Feature::get();
		$cat_id = $id;
		return view('admin.sub-category.create',compact('cat_id','feature'));
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
			
			if($request['id']){
				$post = $request->input();
				$subCategory = SubCategory::find($request['id']);
				foreach($post['faetures'] as $key=>$value){
					print_r($value);

				}
				// foreach($post['faetures'] as $key=>$value){
				// 	 $tagsNames = explode(',', $value);
				// 	 foreach($tagsNames as $tagName){
				// 	 	  $matches = [
				// 	 	  	'name' => $tagName,
        // 				'feature_id' =>$key,
        // 				'sub_category_id' => $request['id']
				// 	 	  ];
        // 			$t = SubCategoryFeature::updateOrCreate([
        // 				'name' => $tagName,
        // 				'feature_id' =>$key,
        // 				'sub_category_id' => $request['id'],
        // 				'category_id' => $request['category_id'],
        // 				'feature_id' => $key

        // 			])->save();

        // 			//  $subCategory->tags()->sync($t);
    		// 	 }
    		// 	  // $tags = SubCategoryFeature::whereIn('name', $tagsNames)->pluck('id','name','feature_id','sub_category_id','category_id','feature_id');
    		// 	  //  $subCategory->tags()->sync($tags);

				// }
			}
			exit();
			SubCategory::saveSubcategory($request->input());
			return response()->json(['success' => true,
				'message' => 'Subcategory has been added successfully.'
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
		$subCat = SubCategoryFeature::select('*', \DB::raw("(GROUP_CONCAT(sub_category_features.name )) as `names`"))->with(['featureName','subCategory'])->where('sub_category_id',$id)->groupBy('sub_category_features.feature_id')->get();
		return view('admin.sub-category.show',compact('subCat'));
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

		$subCat = SubCategoryFeature::select('*', \DB::raw("(GROUP_CONCAT(sub_category_features.name )) as `names`"))->with(['featureName','subCategory'])->where('sub_category_id',$id)->groupBy('sub_category_features.feature_id')->get();
		return view('admin.sub-category.edit',compact('subCat'));
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
}
