<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@contact');

Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::get('/yours','PagesController@yours');
	Route::get('/users','PagesController@manage');
	Route::get('/users/edit{id}','PagesController@edit');
	Route::post('/users/zaktualizuj{id}','PagesController@zaktualizuj');
	Route::get('/users/delete{id}','PagesController@delete');

	Route::get('/videos/delete{id}','VideosController@delete');
	Route::resource('videos','VideosController');
    Route::auth();
});



