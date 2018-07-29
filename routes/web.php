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

Route::get('/interesados/noticia/{id?}', 'interesadoController@showForm');
Route::post('/interesados/create', 'interesadoController@create');
Route::get('/noticia/{id?}/interesados		', 'interesadoController@show');

Route::get('/idioma', 'idiomaController@show')->name('idiomaShow')->middleware('auth');
Route::post('/idioma/create', 'idiomaController@create')->middleware('auth');
Route::put('/idioma/update/{id?}', 'idiomaController@update')->middleware('auth');
Route::get('/idioma/buscar/{id?}', 'idiomaController@buscar')->name('idiomaBuscar')->middleware('auth');

//Route::post('/noticiaForm/create', 'noticiaController@create')->name('noticiaCreate')->middleware('auth');



Route::get('/home', 'HomeController@index')->name('home');


