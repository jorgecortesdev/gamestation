<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');

// Route::get('suppliers', 'SuppliersController@index');
// Route::get('suppliers/{supplier}', 'SuppliersController@show');
Route::resource('supplier', 'SuppliersController');

Route::resource('user', 'UsersController');

Route::resource('supplier_type', 'SupplierTypesController');

Route::resource('unity', 'UnitiesController');

Route::resource('product_type', 'ProductTypesController');

Route::resource('supplier_product', 'SupplierProductsController');

Route::resource('product', 'ProductsController');

Route::resource('combo','CombosController');
Route::delete('combo_item/{item}', 'CombosController@destroyItem')->name('combo.destroy_item');