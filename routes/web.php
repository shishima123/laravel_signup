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

Route::get('register',  [
  'as' => 'getRegister',
  'uses' => 'Auth\RegisterController@getRegister'
]);
Route::post('register', [
  'as' => 'postRegister',
  'uses' => 'Auth\RegisterController@postRegister'
]);

Route::get('login', [
  'as' => 'getLogin',
  'uses' => 'Auth\LoginController@getLogin'
]);
Route::post('login', [
  'as' => 'postLogin',
  'uses' => 'Auth\LoginController@postLogin'
]);

Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@postLogout'
]);

Route::get('/home', [
  'as' => 'home',
  'uses' => 'HomeController@index'
])->middleware('check.verified');

Route::get('verify', [
  'as' => 'verify',
  'uses' => 'Auth\LoginController@checkVerify'
]);

Route::get('register/verify/{code}', [
  'uses' => 'Auth\RegisterController@verify'
]);

Route::get('resend', [
  'as' => 'resend',
  'uses' => 'Auth\RegisterController@resendEmailVerify'
]);

Route::post('password/email_reset', [
  'as' => 'password.email_reset',
  'uses' => 'Auth\ForgotPasswordController@sendLinkEmailReset'
]);

Route::get('password/reset', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showForgotPasswordForm'
]);

Route::get('password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetPasswordForm'
]);

Route::post('password/reset', [
  'as' => 'password.update',
  'uses' => 'Auth\ResetPasswordController@resetPassword'
]);