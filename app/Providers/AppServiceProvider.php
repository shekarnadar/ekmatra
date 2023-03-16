<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
		/* @description validation for check valid vendor email
		 * @return type boolean
		 */

		
		Validator::extend('vendor_email_valid', function ($attribute, $value, $parameters, $validator){
			$role_id = getRole('Vendor');
			$users = \DB::table('users')->where(['email' => $value, 'role_id' => $role_id])
					//->where('status', '!=', 'deleted')
					->first(['id']);
			if (!empty($users)) {
				return true;
			} else {
				return false;
			}
		}); 
		Validator::extend('admin_email_valid', function ($attribute, $value, $parameters, $validator) {
			$role_id = getRole('admin');
			$users = \DB::table('users')->where(['email' => $value, 'role_id' => $role_id])
					//->where('status', '!=', 'deleted')
					->first(['id']);
			if (!empty($users)) {
				return true;
			} else {
				return false;
			}
		}); 
	}
}
