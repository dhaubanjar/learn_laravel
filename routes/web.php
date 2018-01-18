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
//Category
Route::get('/category', 'CategoryController@index')->name('category.index')->middleware("auth");
Route::post('/category','CategoryController@store')->name('category.store');
Route::get('/category/create-form','CategoryController@create')->name('category.create');
Route::get('/category/{id}/edit','CategoryController@edit')->name('category.edit');
Route::put('/category/{id}', 'CategoryController@update')->name('category.update');
Route::delete("/category/{id}", "CategoryController@destroy")->name('category.delete');
Route::get('/category/{name}/{names}', 'CategoryController@show');

//post
Route::get('/post', 'PostController@index')->name('post.index')->middleware("auth");
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::get('post/{id}/edit', 'PostController@edit')->name('post.edit');
Route::delete('/post/{id}', 'PostController@destroy')->name('post.delete');
Route::put('/post/{id}', 'PostController@update')->name('post.update');
Route::post('/post', 'PostController@store')->name('post.store');
Route::get('/post/{id}/show','PostController@show')->name('post.show');

//Tag
Route::get('/tag','TagController@index')->name('tag.index')->middleware('auth');
Route::get('/tag/create-form','TagController@create')->name('tag.create');
Route::get('/tag/store','TagController@store')->name('tag.store');
Route::get('/tag/edit','TagController@edit')->name('tag.edit');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
