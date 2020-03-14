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

Route::get('home', 'HomepageController@index')->name('home');

Route::get('homepage', 'HomepageController@index');

Route::get("page/{any}", "CmsController@viewPage")->name('cms.view')->where("any", ".*");

Route::get('reviews', "ReviewController@index");

Auth::routes();

Route::namespace('Auth')->group(function() {
  Route::prefix('register')->group(function() {
    Route::get('student', 'RegisterController@createStudentPage')->name('register.student');
    Route::post('student', 'RegisterController@createStudent')->name('register.student.post');
    Route::get('company', 'RegisterController@createCompanyPage')->name('register.company');
    Route::post('company', 'RegisterController@createCompany')->name('register.company.post');
  });
});

Route::middleware('role:student')->group(function() {
    Route::prefix('profile')->group(function() {
        Route::get('/', 'ProfileController@index')->name('profile.index');
        Route::get('delete/{id}', 'ProfileController@delete')->name('profile.delete');
        Route::get('terminate/{id}', 'ProfileController@terminate')->name('profile.terminate');
    });
});

Route::middleware('role:admin')->group(function () {
  Route::prefix('admin')->group(function() {
    Route::get('/', function(){
      return view('management.index');
    });
    Route::prefix("event")->group(function() {
      Route::get('/', 'EventController@index')->name('event.index');
      Route::get('create', 'EventController@createPage')->name('event.create');
      Route::post('create', 'EventController@create')->name('event.create.post');
      Route::get("delete/{id}", "EventController@delete")->name("event.delete");
    });
    Route::prefix("user")->group(function() {
      Route::get("/", "UserController@index")->name("user.index");
      Route::get('edit/{id}', 'UserController@editPage')->name('user.edit');
      Route::post('update/student/{id}', 'UserController@updateStudent')->name('user.update.student.post');
      Route::post('update/company/{id}', 'UserController@updateCompany')->name('user.update.company.post');
      Route::post('update/admin/{id}', 'UserController@updateAdmin')->name('user.update.admin.post');
      Route::get('accept-users', 'UserController@notAcceptedStudentsOverview')->name('user.not.accepted.overview');
      Route::get('delete-user/{id}', 'UserController@deleteUser')->name('user.delete');
      Route::get('accept-user/{id}', 'UserController@acceptUser')->name('user.accept');
    });
    Route::prefix('image')->group(function() {
      Route::get('/', 'ImageController@index')->name('image.index');
      Route::post('/store', 'ImageController@store')->name('image.store.post');
    });
    Route::prefix('cms')->group(function() {
      Route::get('/', "CmsController@index")->name("cms.index");
      Route::get('create', "CmsController@createPage")->name("cms.create");
      Route::get('edit/{id}', "CmsController@editPage")->name("cms.edit");
      Route::get('delete/{id}', "CmsController@delete")->name('cms.delete');

      Route::post("edit/{id}", 'CmsController@edit')->name('cms.edit.post');
      Route::post('create', "CmsController@create")->name("cms.create.post");
      });
    });
});

Route::get('/agenda', 'EventController@agenda')->name('event.agenda');
Route::get('/agenda/detail/{id}', 'EventController@agendaDetails')->name('event.details.api');
