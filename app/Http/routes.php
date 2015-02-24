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

Route::group(['prefix' => 'evento'], function()
{
    Route::get('/', ['as' => 'evento.index', 'uses' => 'EventController@index']);
    Route::get('{id}',['as' => 'evento.show', 'uses' => 'EventController@showEvent']);
    Route::get('tipo/{id}', ['as' => 'evento.tipo', 'uses' =>'EventController@showEventTipo']);
});

Route::group(['prefix' => 'centro'], function()
{
    Route::get('{id}',['as' => 'centro.show', 'uses' => 'WelcomeController@showProfile']);
});


Route::get('distritos', 'DistritoController@index');

Route::get('sitemap.xml', 'SeoController@sitemap');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
