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

Route::get('/', 'WelcomeController@index');
Route::get('centro/{id}', 'WelcomeController@showProfile');


Route::get('evento/', 'EventController@index');
Route::get('evento/{id}', 'EventController@showEvent');
Route::get('evento/tipo/{id}', 'EventController@showEventTipo');


Route::get('distritos', 'WelcomeController@showDistritos');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);