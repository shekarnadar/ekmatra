<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inquiry;
use Carbon\Carbon;
use DataTables;


class InquiryController extends Controller
{
	//
	public function customerInquiry(Request $requst){
		$product = Product::find($requst['product_id']);
		$client_id = \Auth::user()->id;

		$check = Inquiry::whereDate('created_at',Carbon::today())->where([
			'product_id' => $requst['product_id'],
			'quantity' => $requst['quantity'],
			'client_id' => $client_id,
		])->first();

		if(!$check){
		 
		 $inquiry = Inquiry::create([
			'product_id' => $requst['product_id'],
			'quantity' => $requst['quantity'],
			'client_id' => $client_id,
			'vendor_id' => $product['created_by']
		 ]);

			return response()->json(['success' => true,
				'message' => 'Inquiry has been send sucessfully',
			], 200);
		}else{
			return response()->json(['success' => false,
				'message' => 'Already this product has been submited'], 200);
		}
		
	}

	public function inquiryView(){
		$client_id = \Auth::user()->id;
		$inquiry = Inquiry::with('product.createdBy')->where('client_id',$client_id)->get();
		return view('inquiry.index',compact('inquiry'));
	}

	public function inquirylist(Request $request) {
	   
		if ($request->ajax()) {
					$data = Inquiry::with(['product.createdBy','customer']);
					if(getAuthGaurd() == 'vendor'){
						$client_id = \Auth::guard(getAuthGaurd())->user()->id;
						$data->where('vendor_id',$client_id);
					}
					$data = $data->get();
					return Datatables::of($data)
					->addColumn('name', function($row){
						return $row['product']['name'];
					 })
					->addColumn('price', function($row){
						return $row['product']['price'];
					 })
					->addColumn('quantity', function($row){
						return $row['quantity'];
					 })
					->addColumn('vendor',function($row){
						return $row['product']['createdBy']['name'];
					})
					->addColumn('customer_detail',function($row){
						return $row['customer']['name'];
					})
					->addColumn('image', function($row){
						$imageval = url('product/' . $row['product']['image']);
					return '<img src="' . $imageval . '" class="h-50 w-50"/>';
					 })
						
					->rawColumns(['action','image'])
					->make(true);
			}
			return view('inquiry.admin-inquiry-list');
	}
}
