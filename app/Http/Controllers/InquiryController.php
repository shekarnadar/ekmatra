<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inquiry;
use Carbon\Carbon;
use DataTables;
use App\Http\Requests\CreateEnquiryRequest;
use App\Http\Requests\CreateRfqRequest;

class InquiryController extends Controller
{
	//
	public function customerInquiry(CreateEnquiryRequest $request){
		$product = Product::find($request['product_id']);
		$client_id = \Auth::user()->id;

		$check = Inquiry::whereDate('created_at',Carbon::today())->where([
			'product_id' => $request['product_id'],
			'quantity' => $request['quantity'],
			'client_id' => $client_id,
		])->first();

		if(!$check){
		 
		 $inquiry = Inquiry::create([
			'product_id' => $request['product_id'],
			'quantity' => ($request['quantity'])? $request['quantity'] : 1,
			'client_id' => $client_id,
			'vendor_id' => $product['created_by'],
			'enquiry' => $request['enquiry'],
			'type' => 'enquiry'
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
		$inquiry = Inquiry::with('product.createdBy')->where('client_id',$client_id)->where('type','enquiry')->get();

		$rfq = Inquiry::with('product.createdBy')->where('client_id',$client_id)->where('type','rfq')->get();
		return view('inquiry.index',compact('inquiry','rfq'));
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
	public function submitanenquiry(){
		$user = \Auth()->user();
		return view('submit-enquiry',compact('user'));
	}

	public function savesubmitanenquiry(CreateRfqRequest $request){
		$post = $request->input();
		$client_id = \Auth::user()->id;

		$inquiry = Inquiry::create([
			'quantity' => ($request['quantity'])? $request['quantity'] : 1,
			'client_id' => $client_id,
			
			'prefered_category' => $request['prefered_category'],
			'prefered_brand' => $request['prefered_brand'],
			'min' => $request['min'],
			'max' => $request['max'],
			'delivery_date' => $request['delivery_date'],
			'type' => 'rfq'
		 ]);
		return response()->json(['success' => true,
				'message' => 'Inquiry has been send sucessfully',
			], 200);
	}
}
