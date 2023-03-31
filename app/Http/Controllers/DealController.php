<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;
use App\Http\Requests\admin\CreateDealRequest;
use DataTables;

class DealController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		if ($request->ajax()) {
			
			$data = Deal::getDeals();
			return Datatables::of($data)
				->addColumn('action', function($row){
					$url = url('admin/deal/edit/'.$row->id);
					$btn = '<a href="'.$url.'" class="edit btn btn-danger btn-sm text-white">Edit</a>&nbsp;&nbsp;';
					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
		}
		 return view('admin.deal.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return view('admin.deal.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateDealRequest $request)
	{
		//
		try {
			
			Deal::saveDeal($request->input());
			
			return response()->json(['success' => true,
				'message' => 'Deal has been'.($request['id'] ? 'updated' : 'added')  .' successfully.'
		  ], 200);

		} catch(\Exception $e){
			return response()->json(['success' => false,
				'message' => 'something went wrong'], 200);
		}  
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Deal  $deal
	 * @return \Illuminate\Http\Response
	 */
	public function show(Deal $deal)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Deal  $deal
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
		$deal = Deal::find($id);
		return view('admin.deal.create',compact('deal'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Deal  $deal
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Deal $deal)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Deal  $deal
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Deal $deal)
	{
		//
	}
}
