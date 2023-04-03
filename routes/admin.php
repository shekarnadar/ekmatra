<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DealController;



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

		Route::get('vendors',[VendorController::class,'index'])->name('vendor.index');

		Route::get('vendor/add',[VendorController::class,'create'])->name('vendor.create');

		Route::post('vendor/store',[VendorController::class,'store'])->name('vendor.store');
		Route::get('vendor/edit/{id}',[VendorController::class,'edit'])->name('vendor.edit');

		//feature
		Route::get('features',[FeatureController::class,'index'])->name('feature.index');
		Route::get('feature/add',[FeatureController::class,'create'])->name('feature.create');

		Route::post('feature/store',[FeatureController::class,'store'])->name('feature.store');
		Route::get('feature/edit/{id}',[FeatureController::class,'edit'])->name('feature.edit');
		Route::delete('feature/{id}', [FeatureController::class,'destroy'])->name('feature.delete');


		Route::get('categories',[CategoryController::class,'index'])->name('category.index');

		Route::get('category/add',[CategoryController::class,'create'])->name('category.create');
		Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
		Route::delete('category/{id}', [CategoryController::class,'destroy'])->name('category.delete');
		Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');

		//sub category
		Route::get('category/{id}/sub-cat',[SubCategoryController::class,'index'])->name('subcategory.index');
		Route::get('category/{id}/sub-cat/add',[SubCategoryController::class,'create'])->name('subcategory.add');
		Route::post('category/sub-cat/store',[SubCategoryController::class,'store'])->name('subcategory.store');
		Route::get('category/sub-cat/show/{id}',[SubCategoryController::class,'show'])->name('subcategory.show');
		Route::get('category/sub-cat/edit/{id}',[SubCategoryController::class,'edit'])->name('subcategory.edit');
		Route::post('category/sub-cat/update/{id}',[SubCategoryController::class,'update'])->name('subcategory.update');

		//Product
		Route::get('products',[ProductController::class,'index'])->name('product.index');
		Route::get('product/add',[ProductController::class,'create'])->name('product.create');
		Route::post('product/store',[ProductController::class,'store'])->name('product.store');
		Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
		Route::post('product/status-change',[ProductController::class,'statusChange'])->name('status.change');

		Route::get('deals',[DealController::class,'index'])->name('deal.index');
		Route::get('product/deal/{id}',[DealController::class,'productDeals'])->name('product.deal');
		Route::post('product/deal-save',[DealController::class,'dealSave'])->name('product.deal.save');

		Route::get('deal/add',[DealController::class,'create'])->name('deal.create');
		Route::post('deal/store',[DealController::class,'store'])->name('deal.store');
		Route::get('deal/edit/{id}',[DealController::class,'edit'])->name('deal.edit');

		Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
				->name('admin.logout');
		});
	
  });

?>