<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Requests\admin\CreateFeatureRequest;


class FeatureController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
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
	public function edit(Feature $feature)
	{
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
	public function destroy(Feature $feature)
	{
		//
	}
}
