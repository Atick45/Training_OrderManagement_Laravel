<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  // model table name
  Protected $table = 'ord_departments';

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
}
