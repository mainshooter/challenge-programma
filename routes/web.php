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

Route::prefix('cms')->group(function() {
  Route::get('/', "Cms@index")->name("cms.index");
  Route::get('create', "Cms@createPage")->name("cms.create");
  Route::post('create', "Cms@create")->name("cms.create.post");
});

Route::get("page/{slug}", "Cms@viewPage");
