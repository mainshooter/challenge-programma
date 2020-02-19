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
    return view('home');
});

Route::get('home', 'HomeController@index')->name('home');
// Route::get('/', 'Auth\RegisterController@register_global')->name('register_global');
// Route::get('/', 'Auth\RegisterController@register_students')->name('register_students');

// custom auth routes
Route::get('global_register', 'Auth\RegisterController@showGlobalRegisterForm')->name('global_register');
Route::get('register_students', 'Auth\RegisterController@showStudentRegisterForm')->name('register_students');
Route::get('register_company', 'Auth\RegisterController@showCompanyRegisterForm')->name('register_company');

Auth::routes();


