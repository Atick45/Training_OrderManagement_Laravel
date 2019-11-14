<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
   // model table name
   Protected $table = 'ord_uoms';

   // Primary Key
   public $primaryKey = 'id';
   
   // Timestamps
   public $timestamps = true;

   
    public function user(){
        return $this->belongsTo('App\User');
    }

}
