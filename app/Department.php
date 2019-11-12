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


}
