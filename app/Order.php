<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // model table name
    Protected $table = 'ord_orders';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function Orders(){
        return $this->hasMany('App\OrderDetails');
    }
    
}
