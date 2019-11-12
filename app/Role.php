<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	// model table name
    Protected $table = 'ord_roles';

    // Primary Key
    public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = true;

}
