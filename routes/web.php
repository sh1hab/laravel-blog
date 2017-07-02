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

//Route::get('/', function () {
//    return view('welcome');
//});

//Blog

Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@index']);
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']);

//Pages

Route::get('/', 'pagesController@index');
Route::get('/about', 'pagesController@about');
Route::get('/contact', 'pagesController@getContact');
Route::post('/contact',['uses'=>'pagesController@postContact'])->name('contact.post');

//Post

Route::resource('posts', 'PostController');

//['only'=>'index','create']

//Comment

Route::post('comments/{post_id}','CommentController@store')->name('comment');
Route::get('comments/{id}/edit','CommentController@edit')->name('comment.edit');
Route::put('comments/{id}','CommentController@update')->name('comment.update');
Route::get('comments/{id}/delete','CommentController@delete')->name('comment.delete');
Route::delete('comments/{id}/destroy','CommentController@destroy')->name('comment.destroy');

//Category

Route::resource('category','CategoryController',['except'=>'create']);

//Tag

Route::resource('tag','TagController',['except'=>'create']);

//users
Route::get('/pp/index','PpController@create')->name('pp.create');
Route::post('/pp/{id}/update','PpController@update')->name('pp.update');
//Route::get('pp','PpController@index')->name('pp.index');
//Authetication Middleware

// Route::get('logout','LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
