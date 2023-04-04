<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\customer\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/vendor.php';
Route::middleware('customer')->group(function () {
		Route::get('dashboard',[CustomerController::class, 'dashboard'])->name('profile.update');
});


Route::get('/',[WelcomeController::class, 'index'])->name('index');



//Shop page

Route::get('shop/{category}',[ShopController::class, 'index'])->name('shopindex');
Route::get('shop/{category}/{subcategory}',[ShopController::class, 'subCategoryList'])->name('subcategory.list');

//Product page

Route::get('product',[CustomerController::class, 'product'])->name('product');

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::post('product/subcategory',[ProductController::class,'getSubCategoryById'])->name('product.subCategory');

Route::post('product/brand',[ProductController::class,'getBrand'])->name('product.brand');

Route::get('product-detail/{id}',[ProductController::class,'getProductDetail'])->name('product.detail');
