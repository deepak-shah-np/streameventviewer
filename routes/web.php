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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login/twitch', 'Auth\LoginController@redirectToProvider')->name('twitch_redirect');
//Route::post('login/twitch/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('login/twitch/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('home', 'StreamerController@home')->name("home");
Route::get('stream/{streamid}', 'StreamerController@streamDetail')->name("stream_detail");

