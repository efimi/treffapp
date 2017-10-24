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
Route::post('/locations/edit', 'LocationsController@store');

Route::get('/locations/{location}', 'LocationsController@show');

Route::get('/faq', 'StaticSitesController@faq');
Route::get('/impressum', 'StaticSitesController@impressum');

Route::get('/code', 'CodesController@index');
Route::post('/code', 'CodesController@codeCheck');


Route::get('/chat', 'ChatsController@index');

Auth::routes();
Route::get('/home', 'LocationsController@index')->name('home');

Route::get('auth/facebook', ['as' => 'auth/facebook', 'uses' => 'Auth\LoginController@redirectToProvider']);
Route::get('auth/facebook/callback', [ 'as' => 'auth/facebook/callback','Auth\LoginController@handleProviderCallback']);
