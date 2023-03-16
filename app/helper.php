<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Role;


function getUrl()
{
	return getAuthGaurd()."/";
}

/* get guard name */
function getAuthGaurd()
{
	foreach(array_keys(config('auth.guards')) as $guard){
		if(auth()->guard($guard)->check()) return $guard;
	}
	return null;
}

/* get role name */
function getRole($role) {
	$role =Role::where('name',$role)->first();
	return $role['id']; 
}
