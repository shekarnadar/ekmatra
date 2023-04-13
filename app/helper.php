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

function generateRandomStringToken($type, $length = 4)
{
	if ($type == 'otp') {
		return substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 1, $length);
	} else {
		return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
	}
}
//upload image
function uploadImage($foldername,$image){
	
	$imageName = time() . rand(11111, 99999) . '.' . $image->getClientOriginalExtension();
  $destination = public_path() . '/'.$foldername;

  //check directory avilable
  if (!is_dir($destination)) {
            \File::makeDirectory($destination, $mode = 0777, true, true);
  }
  $fileName = str_replace(" ", "-", $imageName);
  $image->move($destination, $fileName);
  return $fileName;
}