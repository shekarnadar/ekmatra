<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vender\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Vender\VenderController;


Route::group(['prefix' => 'vender'], function(){

	Route::group(['middleware' => 'vender-guest'], function () {
		Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('vender.login');
		Route::post('login', [AuthenticatedSessionController::class, 'store']);
	});
	
	Route::group(['middleware' => 'vender-auth'], function () {
		 Route::get('dashboard',[VenderController::class,'dashboard'])->name('vender.dashboard');
	
		Route::get('/', function () {
			return redirect('vender/dashboard');
		})->name('vender.dashboard');

		Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
				->name('vender.logout');
		});
	
  });

?>