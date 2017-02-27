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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/', 'WebController@index')->name('site');
Route::get('/convert', 'WebController@convert')->name('convert');

Route::resource('currencies', 'CurrencyController');
Route::get('/refresh', 'CurrencyController@refresh')->name('refresh-list');

Route::get('/audit-trail', 'AdminController@auditTrail')->name('audit-trail');
Route::get('/admin', 'AdminController@index')->name('admin');

Route::resource('rates', 'RatesController');
