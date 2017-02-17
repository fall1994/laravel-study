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

// Route::get('/', function () {
//     return view('welcome');
// });

get('/','StaticPagesController@home')->name('home');
get('/help','StaticPagesController@help')->name('help');
get('/about','StaticPagesController@about')->name('about');

get('signup','UsersController@create')->name('signup');

resource('users','UsersController');

get('login','SessionsController@create')->name('login');
post('login','SessionsController@store')->name('login');
delete('logout','SessionsController@destroy')->name('logout');

get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

// 重置密码
get('password/email', 'Auth\PasswordController@getEmail')->name('passowrd.reset');
post('password/email', 'Auth\PasswordController@postEmail')->name('passowrd.reset');
get('password/reset/{token}', 'Auth\PasswordController@getReset')->name('password.edit');
post('password/reset', 'Auth\PasswordController@postReset')->name('password.update');

resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);