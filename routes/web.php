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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');




// ADMIN PANEL =======================================================================================================//

Route::group([
	'namespace' => 'Admin',
	'prefix'    => 'admin',
	'name'      => 'admin'] , function() {

	Route::get('/',                                         [ 'as' => 'admin.dashboard', 'uses' => 'AdminController@index' ]);
	Route::resource('news',         'NewsController',       [ 'as' => 'admin' ]);
	Route::resource('stories',      'StoryController',      [ 'as' => 'admin' ]);
	Route::resource('pages',        'PageController',       [ 'as' => 'admin' ]);
	Route::resource('comments',     'CommentController',    [ 'as' => 'admin' ]);
	Route::resource('categories',   'CategoryController',   [ 'as' => 'admin' ]);
	Route::resource('tags',         'TagController',        [ 'as' => 'admin' ]);


});




