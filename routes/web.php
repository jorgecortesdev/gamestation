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
Route::get('/combo/configurable/{combo_id}', 'CombosController@getConfigurableProducts');
Route::get('/combo/properties/{combo_id}', 'CombosController@getProperties');

Route::get('/calendar', 'CalendarController@index');
Route::post('/calendar', 'CalendarController@store')->name('calendar.store');
Route::get('/calendar/freebusy', 'CalendarController@freebusy');

Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');

Route::get('productmanager/extras/list', 'ProductManagerController@extrasList');
Route::get('productmanager/{entity_name}/{entity_id}/product_types', 'ProductManagerController@productTypes');
Route::get('productmanager/{entity_name}/{entity_id}', 'ProductManagerController@productsByEntity');
Route::post('productmanager/{entity_name}/{entity_id}/products', 'ProductManagerController@update')->name('productmanager.update');

Route::get('client/search/select', 'ClientsController@searchForSelect');
Route::get('client/search/autocomplete', 'ClientsController@searchForAutocomplete');
Route::resource('client', 'ClientsController');

Route::resource('kid', 'KidsController');
Route::get('kid/find/{kid_id}', 'KidsController@find');

Route::resource('events', 'EventsController');

Route::resource('properties', 'PropertiesController');
