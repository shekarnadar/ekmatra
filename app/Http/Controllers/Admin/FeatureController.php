<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Requests\admin\CreateFeatureRequest;
use DataTables;

class FeatureController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
			if ($request->ajax()) {
					$data = Feature::getFeatures();
					return Datatables::of($data)
						->addColumn('action', function($row){
							$url = url('admin/feature/edit/'.$row->id);
							$btn = '<a href="'.$url.'" class="edit btn btn-danger btn-sm text-white">Edit</a>&nbsp;&nbsp;';
							$btn.= '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm text-white" data-id="'.$row->id.'">Delete</a>';

							return $btn;
					 })
					->rawColumns(['action'])
					->make(true);
			}
				return view('admin.feature.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		 return view('admin.feature.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateFeatureRequest $request)
	{
		try {
			
			Feature::saveFeature($request->input());
			return response()->json(['success' => true,
				'message' => 'Feature has been added successfully.'
			], 200);

		} catch(\Exception $e){
			return response()->json(['success' => false,
				'message' => 'something went wrong'], 200);
		}  
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Feature  $feature
	 * @return \Illuminate\Http\Response
	 */
	public function show(Feature $feature)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Feature  $feature
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
			$feature = Feature::find($id);
		 	return view('admin.feature.create',compact('feature'));
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Feature  $feature
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Feature $feature)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Feature  $feature
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
			 try {

            $feature  = Feature::find($id);
            $feature->delete();

            return response()->json(['success' => true,
                     'message' => 'deleted sucessfully'
            ], 200);

        } catch(\Exception $e){
            return response()->json(['success' => false,
                'message' => 'something went wrong'], 200);
        }  
	}
}
