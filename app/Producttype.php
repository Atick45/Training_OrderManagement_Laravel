<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producttype extends Model
{
    Protected $table = 'ord_producttypes';

    // Primary Key
    public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    


}
