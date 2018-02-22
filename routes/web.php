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
Route::get('/admin', function () {
    return view('admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'AdminController@index')->name('users');
Route::get('/users/users', 'AdminController@show_users')->name('show_users');
Route::get('/category', 'CategoryController@index')->name('category');
Route::post('/category', 'CategoryController@store_category')->name('store_category');

Route::group(['middleware'=>'multi'], function (){
    Route::get('/movies', 'MoviesController@index')->name('movies');
});

Route::post('/movies', 'MoviesController@store_movie')->name('store_movies');
Route::get('/actors', 'ActorsController@index')->name('actors');
Route::post('/actors', 'ActorsController@store_actor')->name('store_actor');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category_edit');
Route::post('/category/update/{id}', 'CategoryController@update')->name('category_update');
Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category_delete');
Route::get('/movies/edit/{id}', 'MoviesController@edit')->name('movies_edit');
Route::post('/movies/update/{id}', 'MoviesController@update')->name('movie_update');
Route::get('/movies/delete/{id}', 'MoviesController@destroy')->name('movie_delete');
Route::get('/actors/edit/{id}', 'ActorsController@edit')->name('actors_edit');
Route::post('/actors/update/{id}', 'ActorsController@update')->name('actors_update');
Route::get('/actors/delete/{id}', 'ActorsController@destroy')->name('actors_delete');
