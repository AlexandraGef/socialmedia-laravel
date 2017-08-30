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
/*Home*/
Route::get('/',[
    'uses' => '\Bevy\Http\Controllers\HomeController@index',
    'as' => 'home',
]);
/*Authentication*/

Route::get('/rejestracja',[
    'uses' => '\Bevy\Http\Controllers\AuthController@getSignup',
    'as'=> 'auth.signup',
    'middleware' => ['guest'],
]);

Route::post('/rejestracja',[
    'uses' => '\Bevy\Http\Controllers\AuthController@postSignup',
    'middleware' => ['guest'],
]);


Route::get('/logowanie',[
    'uses' => '\Bevy\Http\Controllers\AuthController@getSignin',
    'as'=> 'auth.signin'
]);

Route::post('/logowanie',[
    'uses' => '\Bevy\Http\Controllers\AuthController@postSignin',
]);

Route::get('/wyloguj',[
    'uses' => '\Bevy\Http\Controllers\AuthController@getSignout',
    'as'=> 'auth.signout',
]);



