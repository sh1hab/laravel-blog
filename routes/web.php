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

Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@index']);
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']);

Route::get('/', 'pagesController@index');
Route::get('/about', 'pagesController@about');
Route::get('/contact', 'pagesController@contact');

Route::resource('posts', 'PostController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
