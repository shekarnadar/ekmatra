<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\CategoryController;





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

		Route::get('vendor/add',[VendorController::class,'create'])->name('vendor.create');
		Route::post('vendor/store',[VendorController::class,'store'])->name('vendor.store');

		//feature
		Route::get('feature/add',[FeatureController::class,'create'])->name('feature.create');
		Route::post('feature/store',[FeatureController::class,'store'])->name('feature.store');

		Route::get('category/add',[CategoryController::class,'create'])->name('category.create');
		Route::post('category/store',[CategoryController::class,'store'])->name('category.store');

		Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
				->name('admin.logout');
		});
	
  });

?>