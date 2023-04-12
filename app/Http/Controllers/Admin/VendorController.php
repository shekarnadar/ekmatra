<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\admin\CreateVendorRequest;
use DataTables;

class VendorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
				if ($request->ajax()) {
					$data = User::getVendors($request);
					return Datatables::of($data)
						->addColumn('action', function($row){
					 	$url = url('admin/vendor/edit')."/".$row['id'];
   						$btn = '<a href="'.$url.'" class="edit btn btn-primary btn-sm">Edit</a>';
							return $btn;
					 })
					->skipTotalRecords()
					->make(true);
				}
	  

		return view('vendor.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return view('vendor.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateVendorRequest $request)
	{
		//
		try {
			if($request->file('image')){
				if($request['id']){

					$image_path = public_path("vendor/".$request['old_image']);  // Value is not URL but directory file path
					if(\File::exists($image_path)) {
    					\File::delete($image_path);
					}
				}
			$image = uploadImage('vendor',$request->image);
		    $request['image'] = $image;
			}
			User::saveVendor($request->input());
			return response()->json(['success' => true,
				'message' => 'Vendor has been '.($request['id'] ? 'updated' : 'added')  .' successfully.'
		  ], 200);
			

		} catch(\Exception $e){
			echo $e->getMessage();
			exit();
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
		$vendor = User::find($id);
		return view('vendor.create',compact('vendor'));
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
