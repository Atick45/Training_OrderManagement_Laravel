<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group( function(){

	//home route
	Route::get('/', function () {
	    return view('home');
	});

	//Route RoleController
	Route::resource('/role', 'RoleController');
	

});

Route::resource('/user', 'UserController');

Route::resource('department', 'DepartmentController');

Route::resource('/producttype', 'ProducttypeController');

Route::resource('/supplier', 'SupplierController');

Route::resource('/product', 'ProductController');

Route::resource('/uom', 'UomController');

Auth::routes();


