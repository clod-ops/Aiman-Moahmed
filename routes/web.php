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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return 'Hello World';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('/playgrounds', 'PlaygroundController');

Route::get('/playgrounds', 'PlaygroundController@index')->name('playgrounds')->middleware('role:Admin|User|Customer');
Route::get('/playgrounds', 'PlaygroundController@index')->name('playgrounds.index')->middleware('role:Admin|User|Customer');
Route::get('/playgrounds/create', 'PlaygroundController@create')->name('playgrounds.create')->middleware('role:Admin|User');
Route::post('/playgrounds', 'PlaygroundController@store')->name('playgrounds.store');
Route::put('/playgrounds/{playgrounds}', 'PlaygroundController@update')->name('playgrounds.update');
Route::get('/playgrounds/{playgrounds}/edit', 'PlaygroundController@edit')->name('playgrounds.edit')->middleware('permission:Edit');
Route::delete('/playgrounds/{playgrounds}', 'PlaygroundController@destroy')->name('playgrounds.destroy')->middleware('permission:Delete');

Route::get('/customers', 'CustomerController@index')->name('customers')->middleware('role:Admin|User|Customer');
Route::get('/customers', 'CustomerController@index')->name('customers.index')->middleware('role:Admin|User|Customer');
Route::get('/customers/create', 'CustomerController@create')->name('customers.create')->middleware('permission:Create');
Route::post('/customers', 'CustomerController@store')->name('customers.store');
Route::put('/customers/{customers}', 'CustomerController@update')->name('customers.update');
Route::get('/customers/{customers}/edit', 'CustomerController@edit')->name('customers.edit')->middleware('permission:Edit');
Route::delete('/customers/{customers}', 'CustomerController@destroy')->name('customers.destroy')->middleware('permission:Delete');

Route::get('/bookings', 'BookingController@index')->name('bookings')->middleware('role:Admin|User|Customer');
Route::get('/bookings', 'BookingController@index')->name('bookings.index')->middleware('role:Admin|User|Customer');
Route::get('/bookings/create', 'BookingController@create')->name('bookings.create')->middleware('permission:Create');
Route::post('/bookings', 'BookingController@store')->name('bookings.store');
Route::put('/bookings/{bookings}', 'BookingController@update')->name('bookings.update');
Route::get('/bookings/{bookings}/edit', 'BookingController@edit')->name('bookings.edit')->middleware('permission:Edit');
Route::delete('/bookings/{bookings}', 'BookingController@destroy')->name('bookings.destroy')->middleware('permission:Delete');