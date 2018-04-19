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


Route::get('/','TeamsController@index')->name('teams.index');
Route::get('/teams/{id}','TeamsController@show')->name('teams.show');
Route::get('/players/{id}','PlayersController@show')->name('players.show');

// register routes

Route::get('/register', 'RegisterController@create')->name('register.create');
Route::post('/register', 'RegisterController@store')->name('register.store');

// login routes

Route::get('/login', 'LoginController@create')->name('login');
Route::post('/log', 'LoginController@store')->name('login.store');
Route::get('/logout', 'LoginController@logout')->name('logout');

// verification user

Route::get('register/verify/{confirmationCode}', 'RegisterController@confirm')->name('register.confirm');
