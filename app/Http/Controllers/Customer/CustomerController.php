<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Order;

class CustomerController extends Controller
{
    //
    public function dashboard(){
        $client_id = \Auth::user()->id;
        $inquiry = Inquiry::with('product.createdBy')->where('client_id',$client_id)->where('type','enquiry')->orderBy('created_at','DESC')->get();

        $rfq = Inquiry::with('product.createdBy')->where('client_id',$client_id)->where('type','rfq')->orderBy('created_at','DESC')->get();
         return view('customer.dashboard',compact('inquiry','rfq'));

         $myorders = Order::where('client_id', $client_id)->with('orderItems.product')->orderBy('created_at','DESC')->get();
         return view('customer.myorders',compact('orders'));

    }
    public function myorders()
    {
        $client_id = \Auth::user()->id;
    $orders = Order::where('client_id',$client_id)->with('orderItems.product')->orderBy('created_at','DESC')->get();
    
    return view('customer.myorders', compact('orders'));
    }

    public function OrderDetails($orderId)
    {
        $client_id = \Auth::user()->id;
    $order = Order::where('client_id', $client_id)->findOrFail($orderId);

    return view('customer.order_details', compact('order'));
    }

    public function shop()
    {
        return view ('shop');
    }
    public function product()
    {
        return view ('product');
    }
}
