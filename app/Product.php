<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Protected $table ='ord_products';

    // Primary Key
    public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
	public function users(){
        return $this->hasMany('App\User');
    }

    public function uoms(){
        return $this->hasMany('App\Uom');
    }

    public function uom(){
        return $this->belongsTo('App\Uom');
    }

    public function producttypes(){
        return $this->hasMany('App\Producttype');
    }
	public function producttype(){
        return $this->belongsTo('App\Producttype');
    }
}
