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

Route::resource('products', 'ProductsController');

Route::resource('extra', 'ExtrasController');

Route::resource('combo','CombosController');
Route::get('/combo/configurable/{combo_id}', 'CombosController@getConfigurableProducts');
Route::get('/combo/properties/{combo_id}', 'CombosController@getProperties');

Route::get('/calendar', 'CalendarController@index');
Route::post('/calendar', 'CalendarController@store')->name('calendar.store');
Route::get('/calendar/freebusy', 'CalendarController@freebusy');

Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');

Route::get('client/search/select', 'ClientsController@searchForSelect');
Route::get('client/search/autocomplete', 'ClientsController@searchForAutocomplete');
Route::resource('client', 'ClientsController');

Route::resource('kid', 'KidsController');
Route::get('kid/find/{kid_id}', 'KidsController@find');

Route::resource('events', 'EventsController');

Route::resource('properties', 'PropertiesController');

Route::get('/configurations/{configuration}', 'ConfigurationsController@index')->name('configurations.index');
Route::match(['put', 'patch'], '/configurations/{configuration}', 'ConfigurationsController@update')->name('configurations.update');

Route::get('/event/property/{property}', 'EventPropertiesController@show')->name('event_property.show');
Route::match(['put', 'patch'], '/event/{event}/property/{property}', 'EventPropertiesController@update')->name('event_property.update');

Route::get('/quantities/{entity_id}/{entity_type}', 'QuantifiableController@index');
Route::match(['put', 'patch'], '/quantities/{entity_id}/{entity_type}', 'QuantifiableController@update');
