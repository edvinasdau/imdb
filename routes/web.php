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
