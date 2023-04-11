<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
		/**
		 * Display the login view.
		 */
		public function create(): View
		{
				return view('auth.admin.login');
		}

		/**
		 * Handle an incoming authentication request.
		 */
		public function store(AdminLoginRequest $request): RedirectResponse
		{
			
        if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){

	        $request->session()->regenerate();
	        //Authentication passed...
	        return redirect()
	            ->intended(route('admin.dashboard'))
	            ->with('status','You are Logged in as Admin!');
    	  }else{
    	  	return redirect()
        		 ->back()
        		 ->withInput()
        		 ->with('error','Login failed, please try again!');
        }
		}

		/**
		 * Destroy an authenticated session.
		 */
		public function destroy(Request $request): RedirectResponse
		{
				$url = getAuthGaurd();
				
				Auth::guard('web')->logout();

				$request->session()->invalidate();

				$request->session()->regenerateToken();
				return redirect($url == 'web' ? '/' : $url.'/login');
		}
}
