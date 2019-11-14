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


    public function uom(){
        return $this->belongsTo('App\Uom');
    }

	public function producttype(){
        return $this->belongsTo('App\Producttype');
    }
}
