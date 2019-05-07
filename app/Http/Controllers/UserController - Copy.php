<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Department;

class UserController extends Controller
{
    public function index()
    {
       
        return view('pages.user.create');
    }
    public function create()
    {	
		$data = [
			'asdflks' => Role::pluck('name','id'),
			//'departments' => Department::pluck('name','id'),
			'departments' => [
				'1' => 'Accounts',
				'2' => 'Production',
				'3' => 'Store',
			],
		];
		
		
        return view('pages.user.create')->with($data);
    }

}
