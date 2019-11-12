<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	protected $table ='ord_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $primaryKey = 'id';


    public $timestamps = true;

    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	 public function role(){
        return $this->belongsTo('App\Role');
    }

	 public function department(){
        return $this->belongsTo('App\Department');
    }

	public function producttype(){
        return $this->hasMany('App\Producttype');
    }


    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }

    public function uom(){
        return $this->belongsTo('App\Uom');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

    
    public function Orders(){
        return $this->hasMany('App\Order');
    }

}
