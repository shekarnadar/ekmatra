<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;


Route::group(['prefix' => 'admin'], function(){

	Route::group(['middleware' => 'admin-guest'], function () {
		Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
		Route::post('login', [AuthenticatedSessionController::class, 'store']);
	});
	
	Route::group(['middleware' => 'admin-auth'], function () {
		 Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
	
		Route::get('/', function () {
			return redirect('admin/dashboard');
		})->name('dashboard');

		Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
				->name('admin.logout');
		});
	
  });

?>