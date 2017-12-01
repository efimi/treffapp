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
Auth::routes();

// LocationsController Routes
Route::get('/', 'LocationsController@start');
Route::post('/getplace', 'LocationsController@randPlace');
Route::get('/locations', 'LocationsController@index');
Route::get('/locations/edit', 'LocationsController@edit');
Route::post('/locations/edit', 'LocationsController@store');
Route::get('/location/{location}', 'LocationsController@show');
Route::get('/home', 'LocationsController@start')->name('home');

// StaticSitesController Routes
Route::get('/faq', 'StaticSitesController@faq');
Route::get('/impressum', 'StaticSitesController@impressum');

// LoginController Routes
Route::get('auth/facebook', ['as' => 'auth/facebook', 'uses' => 'Auth\LoginController@redirectToProvider']);
Route::get('auth/facebook/callback', [ 'as' => 'auth/facebook/callback', 'uses' => 'Auth\LoginController@handleProviderCallback']);
Route::get('/user', 'HomeController@showuser');
Route::post('/user', 'HomeController@updateuser');
