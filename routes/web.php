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

Route::get('/', 'LocationsController@start');
Route::post('/getplace', 'LocationsController@randPlace');

Route::get('/locaitons', 'LocationsController@show');
Route::get('/faq', function(){return view('faq');});
Route::get('/impressum', function(){return view('impressum');});
