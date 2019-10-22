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

Route::get('/', 'ListingController@index')->name('listings.index');

Route::get('/listing/{id}', 'ListingController@show')->name('listings.show');

Route::post('/momo/sendInvoice', 'MoMoController@sendInvoice');

Route::post('/momo/validateInvoice', 'MoMoController@validateInvoice');

Route::get('/momo/invoice/{id}', 'MoMoController@showInvoice');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin.index')->middleware('auth');

Route::resource('admin/packages', 'PackagesController')->middleware('auth');

Route::resource('admin/payments', 'PaymentsController')->middleware('auth');

Route::resource('admin/customers', 'CustomersController')->middleware('auth');

Route::resource('admin/reservations', 'ReservationsController')->middleware('auth');

Auth::routes();

