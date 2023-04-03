<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'role_id',
		'phone',
		'address',
		'company_name',
		'image'
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function roles()
  {
    return $this->belongsToMany(Role::class);
  }

	public static function assignRole($role) {
		$role =Role::where('name',$role)->first();
		return $role['id']; //Crashes here
	}

	 public function role(){
        return $this->belongsTo('App\Models\Role', 'role_id');
   }

    public function hasRole(string $role): bool
    {
        return $this->getAttribute('role') === $role;
    }

    //save vendor
    public static function saveVendor($request){
       
        $role_id = getRole('vendor');

        if(@$request['id']){

			$matchThese = ['id' => $request['id']];
			$user = User::updateOrCreate($matchThese,$request);

        }else{

        	$user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make(123456),
            'address' => $request['address'],
            'company_name' => $request['company_name'],
            'role_id' => $role_id,
            'image' => $request['image']
        	]);
        	event(new Registered($user));   
        }
        
        return $user;        

    }

    //get vendors
    public static function getVendors($request){

    	$role_id = getRole('vendor');
    	$vendor = User::where('role_id',$role_id);
    	return $vendor;
    }

    public static function getLatestVendor(){
    	$role_id = getRole('vendor');
    	$vendor = User::with('getVendorTopProducts')->withCount('products')->where('role_id',$role_id)->latest()->take(4)->get();
    	return $vendor;
    }
	public function products(){
 		return $this->hasMany('App\Models\Product','created_by','id');
 	}
 	public function getVendorTopProducts(){
 		return $this->hasMany('App\Models\Product','created_by','id')->latest();
 	}
    
}
