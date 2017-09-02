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
    'as'=> 'auth.signin',
    'middleware' => ['guest'],
]);

Route::post('/logowanie',[
    'uses' => '\Bevy\Http\Controllers\AuthController@postSignin',
    'middleware' => ['guest'],
]);

Route::get('/wyloguj',[
    'uses' => '\Bevy\Http\Controllers\AuthController@getSignout',
    'as'=> 'auth.signout',
]);

/*Search*/

Route::get('/szukaj',[
    'uses' => '\Bevy\Http\Controllers\SearchController@getResults',
    'as'=> 'search.results',
]);

/*User profile*/


Route::get('/uzytkownik/{username}',[
    'uses' => '\Bevy\Http\Controllers\ProfileController@getProfile',
    'as'=> 'profile.index',
]);

Route::get('/profil/edycja',[
    'uses' => '\Bevy\Http\Controllers\ProfileController@getEdit',
    'as'=> 'profile.edit',
    'middleware'=>['auth'],
]);

Route::post('/profil/edycja',[
    'uses' => '\Bevy\Http\Controllers\ProfileController@postEdit',
    'middleware'=>['auth'],
]);
/*Friends*/

Route::get('/znajomi',[
    'uses' => '\Bevy\Http\Controllers\FriendController@getIndex',
    'as'=> 'friend.index',
    'middleware'=>['auth'],
]);

Route::get('/znajomi/dodaj/{username}',[
    'uses' => '\Bevy\Http\Controllers\FriendController@getAdd',
    'as'=> 'friend.add',
    'middleware'=>['auth'],
]);

Route::get('/znajomi/akceptuj/{username}',[
    'uses' => '\Bevy\Http\Controllers\FriendController@getAccept',
    'as'=> 'friend.accept',
    'middleware'=>['auth'],
]);
/*Statuses*/

Route::post('/status',[
    'uses' => '\Bevy\Http\Controllers\StatusController@postStatus',
    'as'=> 'status.post',
    'middleware'=>['auth'],
]);

Route::post('/status/{statusId}/odpowiedz',[
    'uses' => '\Bevy\Http\Controllers\StatusController@postReply',
    'as'=> 'status.reply',
    'middleware'=>['auth'],
]);
