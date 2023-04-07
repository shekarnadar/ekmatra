<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inquiry;
use Carbon\Carbon;


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
}
