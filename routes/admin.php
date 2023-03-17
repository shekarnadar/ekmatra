<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VendorController;



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

		Route::get('vendor/create',[VendorController::class,'create'])->name('vendor.create');
		Route::post('vendor/store',[VendorController::class,'store'])->name('vendor.store');

		Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
				->name('admin.logout');
		});
	
  });

?>