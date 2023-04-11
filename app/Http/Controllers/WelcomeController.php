<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
Use App\Models\User;
Use App\Models\Deal;


class WelcomeController extends Controller
{
	//
	public function index(){
		
		$deal = Deal::with('productDeals.getProduct')->get();

		$product = Product::getLatestProduct();
		$vendor = User::getLatestVendor();
		return view('welcome',compact('product','vendor','deal'));
	}
}
