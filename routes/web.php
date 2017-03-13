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

Route::resource('supplier', 'SuppliersController');

Route::resource('user', 'UsersController');

Route::resource('supplier_type', 'SupplierTypesController');

Route::resource('unity', 'UnitiesController');

Route::resource('product_type', 'ProductTypesController');

Route::resource('supplier_product', 'SupplierProductsController');

Route::resource('extra', 'ExtrasController');

Route::resource('combo','CombosController');

Route::get('/calendar', 'CalendarController@index');
Route::post('/calendar', 'CalendarController@store')->name('calendar.store');

Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');

Route::get('/event', 'EventsController@index')->name('event.index');

Route::get('productmanager/type/{type_id}', 'ProductManagerController@productsByType');
Route::get('productmanager/{entity_name}/{entity_id}', 'ProductManagerController@productsByEntity');
Route::post('productmanager/{entity_name}/{entity_id}/products', 'ProductManagerController@update')->name('productmanager.update');
