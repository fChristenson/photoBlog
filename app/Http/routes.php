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

Route::get('/', 'DayController@index');

Route::get('home', 'DayController@index');

Route::get('day/{id}', 'DayController@show');

Route::get('create', ['middleware' => 'auth', 'uses' => 'DayController@create']);

Route::post('create', ['middleware' => 'auth', 'uses' => 'DayController@store']);

Route::get('theme', 'DayController@theme');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
