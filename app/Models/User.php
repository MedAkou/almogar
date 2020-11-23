<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;
use Auth;
use App\Models\Addresses;

class User extends Authenticatable
{

 use SoftDeletes;


   protected $guarded = ['id', 'created_at', 'updated_at'];


   public function scopeMerchant($query) {
        if (Auth::user() && Auth::user()->role == 'merchant'&& !empty(Auth::user()->store_id)) {
            return $query->where('store_id', Auth::user()->id);
        }
   }

 

    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role', 'password', 'device_token', 'last_login'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function readableTime()
    {
        return $this->created_at->diffForHumans();
    }

  
    public function activate()
    {
         
    } 
  
    public function block()
    {
        return $this->statue='block';
    } 
   
    public function created_at()
    {
        return $this->created_at->diffForHumans();
    }   


    public function addresses() {
        return $this->hasMany('App\Models\Addresses');
    }

        
    public function wishlist()    {
        return $this->hasMany('App\Models\WishList');
    }

       
    public function orders()    {
        return $this->hasMany('App\Models\Orders');
    }


    public static function defaultAdress(){
            return Addresses::where('is_primary',true)->first();
    }       


    public function presentStatue() {

        if(empty($this->statue)){
            return 'active';
        }

        return $this->statue;
    }


    public function store() {
        return $this->hasOne('App\Models\Stores');
    }



}
