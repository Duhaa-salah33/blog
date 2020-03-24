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
//Authentication Routes



Route::get('blog/{slug}' , ['as'=>'blog.single' , 'uses'=>'BlogController@getSlug'])->where('slug' ,'[\w\d\-\_]+');

Route::get('blog',['as'=>'blog.index' , 'uses'=>'Blogcontroller@getIndex']);

Route::get('about', 'pagesController@getAbout');

Route::get('contact','pagesController@getContact');

Route::get('/','pagesController@getIndex');

Route::resource('posts', 'PostController');
            
Route::resource('category', 'CategoryController');

Route::resource('tags', 'TagController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
