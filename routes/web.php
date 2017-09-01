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
use App\Location;

Route::get('/', 'LocationsController@start');
Route::post('/getplace', 'LocationsController@randPlace');

Route::get('/locations', 'LocationsController@index');
Route::get('/locations/edit', 'LocationsController@edit');
Route::get('/locations/{location}', 'LocationsController@show');

Route::get('/faq', 'StaticSitesController@faq');
Route::get('/impressum', 'StaticSitesController@impressum');
