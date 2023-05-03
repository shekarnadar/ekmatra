<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    //
    public function index(){
      $contact = ContactUs::first();
      return view('contact-us',compact('contact'));
    }

    public function weAreHiring(){
      $contact = ContactUs::first();
      return view('contact-us',compact('contact'));

    }

    public function aboutUs(){
     $contact = ContactUs::first();
     return view('contact-us',compact('contact'));

    }

    public function addContactUs(){
      $contact = ContactUs::first();
      return view('admin.contact-us.create',compact('contact'));
    }
    public function contactusSave(Request $request){
      try {
      
      ContactUs::saveContact($request->input());
      return response()->json(['success' => true,
        'message' => 'Contact has been '.($request['id'] ? 'updated' : 'added')  .' successfully.'
      ], 200);

    } catch(\Exception $e){
      echo $e->getMessage();
      return response()->json(['success' => false,
        'message' => 'something went wrong'], 200);
    }
    }
}
