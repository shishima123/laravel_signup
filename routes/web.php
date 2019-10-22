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
})->name('index');

Route::get('register', 'Auth\RegisterController@getRegister')->name('getRegister');
Route::post('register', 'Auth\RegisterController@postRegister')->name('postRegister');

Route::get('login', 'Auth\LoginController@getLogin')->name('getLogin');
Route::post('login', 'Auth\LoginController@postLogin')->name('postLogin');

Route::post('logout', 'Auth\LoginController@postLogout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home')->middleware('check.verified1');

Route::get('verify', function() {
    return view('auth.verify');
})->name('verify');//->middleware('check.verified2');

Route::get('register/verify/{code}','Auth\RegisterController@verify');

// Auth::routes(['verify' => true]);