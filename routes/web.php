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

Route::get('/', 'HomepageController@index');

Route::get('/homepage', 'HomepageController@index');



Route::get("page/{any}", "Cms@viewPage")->name('cms.view')->where("any", ".*");

Route::get('reviews', "ReviewController@index");

Route::prefix("admin")->group(function() {
  Route::prefix("user")->group(function() {
    Route::get("/", "UserController@index")->name("user.index");
  });
  Route::prefix('cms')->group(function() {
    Route::get('/', "Cms@index")->name("cms.index");
    Route::get('create', "Cms@createPage")->name("cms.create");
    Route::get('edit/{id}', "Cms@editPage")->name("cms.edit");
    Route::get('delete/{id}', "Cms@delete")->name('cms.delete');

    Route::post("edit/{id}", 'Cms@edit')->name('cms.edit.post');
    Route::post('create', "Cms@create")->name("cms.create.post");
  });
});
