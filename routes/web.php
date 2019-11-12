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
	Route::get('/','HomeController@index')->name('home');


	//Route RoleController
	Route::resource('/role', 'RoleController');

	Route::resource('/user', 'UserController');

	Route::resource('department', 'DepartmentController');

	Route::resource('/producttype', 'ProducttypeController');

	Route::resource('/supplier', 'SupplierController');

	Route::resource('/product', 'ProductController');

	Route::resource('/uom', 'UomController');

	Route::get('order/clear', 'OrderController@order_clear');
	Route::get('item/clear/{id}', 'OrderController@destroy');
	Route::get('checkout', 'OrderController@checkout');
	Route::post('checkout', 'OrderController@checkout_save');
	Route::resource('/order', 'OrderController');
	

});



Auth::routes();


