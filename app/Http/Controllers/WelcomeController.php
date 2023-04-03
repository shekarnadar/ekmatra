<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
Use App\Models\User;

class WelcomeController extends Controller
{
	//
	public function index(){
		$product = Product::getLatestProduct();
		$vendor = User::getLatestVendor();
		return view('welcome',compact('product','vendor'));
	}
}
