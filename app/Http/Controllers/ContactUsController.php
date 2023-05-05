<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\contactUsInquiry;
use App\Models\Faq;
use App\Http\Requests\CreateContactRequest;

use Mail; 

class ContactUsController extends Controller
{
		//
		public function index(){
			$contact = ContactUs::first();
			$faq = Faq::orderBy('created_at','desc')->get();
			return view('contact-us',compact('contact','faq'));
		}

		public function weAreHiring(){
			$contact = ContactUs::first();
			$faq = Faq::orderBy('created_at','desc')->get();
			return view('contact-us',compact('contact','faq'));

		}

		public function aboutUs(){
		 $contact = ContactUs::first();
		 $faq = Faq::orderBy('created_at','desc')->get();
			return view('contact-us',compact('contact','faq'));

		}

		public function addContactUs(){
			$contact = ContactUs::first();
			return view('admin.contact-us.create',compact('contact'));
		}
		public function inquiry(CreateContactRequest $request){
			try {
			
			   $to_email = ContactUs::pluck('email')->first();
				 $data =  [
				 	'name' => $request['name'],
				 	'description' => $request['description'],
				 	'email' => $request['email']
				 ];
					contactUsInquiry::saveInquiry($request->input());
					 Mail::send('emails.contact-us', ['data' => $data], function($message) use($request, $to_email){
              $message->to($to_email);
              $message->from($request->email);
              $message->subject('Contact Us inquiry');
          });
					return response()->json(['success' => true,
						'message' => 'your query has been submited successfully.'
					], 200);

			} catch(\Exception $e)		{
				echo $e->getMessage();
					return response()->json(['success' => false,
						'message' => 'something went wrong'], 200);
					}
			}
		}
