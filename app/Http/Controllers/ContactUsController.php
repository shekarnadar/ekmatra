<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\contactUsInquiry;
use Mail; 

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
		public function inquiry(Request $request){
			try {
			
				 // $data =  [
				 // 	'name' => $request['name'],
				 // 	'description'
				 // ]
					contactUsInquiry::saveInquiry($request->input());
					//  Mail::send('emails.contact-us', ['data' => $token], function($message) use($request){
          //     $message->to('krishnapatel.santophy@gmail.com');
          //     $message->from($request->email);
          //     $message->subject('Contact Us inquiry');
          // });
					return response()->json(['success' => true,
						'message' => 'your query has been submited successfully.'
					], 200);

			} catch(\Exception $e)		{
					return response()->json(['success' => false,
						'message' => 'something went wrong'], 200);
					}
			}
		}
