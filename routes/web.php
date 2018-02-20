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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category', 'CategoryController@index')->name('category');
Route::post('/category', 'CategoryController@store_category')->name('store_category');
Route::get('/movies', 'MoviesController@index')->name('movies');
Route::post('/movies', 'MoviesController@store_movie')->name('store_movies');
Route::get('/actors', 'ActorsController@index')->name('actors');
Route::post('/actors', 'ActorsController@store_actor')->name('store_actor');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category_edit');
Route::get('/actors/edit/{id}', 'ActorsController@edit')->name('actors_edit');
Route::get('/movies/edit/{id}', 'MoviesController@edit')->name('movies_edit');
Route::delete('/category/delete/{id}', 'CategoryController@destroy')->name('category_delete');