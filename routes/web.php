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
Route::get('/category', 'CategoryController@index')->name('category.index');
Route::post('/category','CategoryController@store')->name('category.store');
Route::get('/category/create-form','CategoryController@create')->name('category.create');
Route::get('/category/{id}/edit','CategoryController@edit')->name('category.edit');
Route::put('/category/{id}', 'CategoryController@update')->name('category.update');
Route::delete("/category/{id}", "CategoryController@destroy")->name('category.delete');
Route::get('/category/{name}/{names}', 'CategoryController@show');

//post
Route::get('/post', 'PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::get('post/{id}/edit', 'PostController@edit')->name('post.edit');
Route::delete('/post/{id}', 'PostController@destroy')->name('post.delete');
Route::put('/post/{id}', 'PostController@update')->name('post.update');
Route::post('/post', 'PostController@store')->name('post.store');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
