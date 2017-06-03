<?php
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Home Routes
Route::get('/home', 'HomeController@index')->name('home');

// Schedule Routes
Route::get('/calendar', 'CalendarController@index');
Route::post('/calendar', 'CalendarController@store')->name('calendar.store');
Route::get('/calendar/freebusy', 'CalendarController@freebusy');
Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');

// Events Routes
Route::resource('events', 'EventsController');

// Combos Routes
Route::resource('combos','CombosController');

// Extras Routes
Route::resource('extras', 'ExtrasController');

// Clients Routes
Route::get('client/search/select', 'ClientsController@searchForSelect');
Route::get('client/search/autocomplete', 'ClientsController@searchForAutocomplete');
Route::resource('clients', 'ClientsController');

// Kids Routes
Route::resource('kids', 'KidsController');
Route::get('kid/find/{kid_id}', 'KidsController@find');

// Suppliers Routes
Route::resource('suppliers', 'SuppliersController');

// Products Routes
Route::resource('products', 'ProductsController');

// Product Types Routes
Route::resource('product-types', 'ProductTypesController');

// Supplier Types Routes
Route::resource('supplier-types', 'SupplierTypesController');

// Properties Routes
Route::resource('properties', 'PropertiesController');

// Unities Routes
Route::resource('unities', 'UnitiesController');

// Users Routes
Route::resource('users', 'UsersController');

// Quantifiable Vue Component Routes
Route::get('/quantities/{entity_id}/{entity_type}', 'QuantifiableController@index');
Route::match(['put', 'patch'], '/quantities/{entity_id}/{entity_type}', 'QuantifiableController@update');

// Configurations Routes
Route::get('/configurations/{configuration}', 'ConfigurationsController@index')->name('configurations.index');
Route::match(['put', 'patch'], '/configurations/{configuration}', 'ConfigurationsController@update')->name('configurations.update');

// Statements Routes
Route::get('statements/{event}', 'StatementsController@index');
Route::post('statements', 'StatementsController@store');

// Event Properties
Route::get('/event/property/{property}', 'EventPropertiesController@show')->name('event-property.show');
Route::match(['put', 'patch'], '/event/{event}/property/{property}', 'EventPropertiesController@update')->name('event-property.update');