<?php

namespace App\Http\Controllers\vender\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorLoginRequest;
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
		return view('auth.vender.login');
	}

	/**
	 * Handle an incoming authentication request.
	 */
	public function store(VendorLoginRequest $request): RedirectResponse
	{

		 if(Auth::guard('vender')->attempt($request->only('email','password'),$request->filled('remember'))){
    	  //$request->authenticate();
    	  $request->session()->regenerate();
        return redirect()
            ->intended(route('vender.dashboard'))
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
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect('/vender');
	}
}
