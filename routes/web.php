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

Route::get('/noticia', 'noticiaController@show')->name('noticia')->middleware('auth');
Route::get('/noticiaForm', 'noticiaController@showForm')->name('noticiaForm')->middleware('auth');
Route::get('/noticiaFormUpdate/{id?}', 'noticiaController@showFormUpdate')->name('noticiaFormUpdate')->middleware('auth');
Route::put('/noticiaForm/update/{id?}','noticiaController@update');
Route::post('/noticiaForm/create', 'noticiaController@create')->name('noticiaForm')->middleware('auth');
//Route::post('/noticiaForm/create', 'noticiaController@create')->name('noticiaCreate')->middleware('auth');



Route::get('/home', 'HomeController@index')->name('home');


