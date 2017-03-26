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

Route::get('/', 'IndexController@index');

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('productmanager/type/{type_id}', 'ProductManagerController@productsByType');
Route::get('productmanager/{entity_name}/{entity_id}', 'ProductManagerController@productsByEntity');
Route::post('productmanager/{entity_name}/{entity_id}/products', 'ProductManagerController@update')->name('productmanager.update');

Route::resource('client', 'ClientsController');
Route::resource('kid', 'KidsController');

Route::get('/event', 'EventsController@index')->name('event.index');
Route::post('/event/step1', 'EventsController@step1')->name('event.step1');
Route::post('/event/step2', 'EventsController@step2')->name('event.step2');
Route::post('/event/step3', 'EventsController@step3')->name('event.step3');