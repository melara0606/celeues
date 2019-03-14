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
Route::get('/noticia/buscar/{id?}', 'noticiaController@buscar')->middleware('auth');

Route::get('/interesados/noticia/{id?}', 'interesadoController@showForm');
Route::post('/interesados/create', 'interesadoController@create');
Route::get('/noticia/{id?}/interesados		', 'interesadoController@show');

Route::get('/idioma', 'idiomaController@show')->name('idiomaShow')->middleware('auth');
Route::post('/idioma/create', 'idiomaController@create')->middleware('auth');
Route::put('/idioma/update/{id?}', 'idiomaController@update')->middleware('auth');
Route::get('/idioma/buscar/{id?}', 'idiomaController@buscar')->name('idiomaBuscar')->middleware('auth');
Route::put('/idioma/cambiarEstado/{id?}', 'idiomaController@cambiarEstado')->middleware('auth');

Route::get('/categoria', 'categoriaController@show')->name('categoriaShow')->middleware('auth');
Route::post('/categoria/create', 'categoriaController@create')->middleware('auth');
Route::put('/categoria/update/{id?}', 'categoriaController@update')->middleware('auth');
Route::get('/categoria/buscar/{id?}', 'categoriaController@buscar')->name('categoriaBuscar')->middleware('auth');

Route::get('/estudiante', 'estudianteController@show')->name('estudianteShow')->middleware('auth');
Route::post('/estudiante/create', 'estudianteController@create')->middleware('auth');
Route::put('/estudiante/update/{id?}', 'estudianteController@update')->middleware('auth');
Route::get('/estudiante/buscar/{id?}', 'estudianteController@buscar')->name('estudianteBuscar')->middleware('auth');
Route::get('/estudiante/buscar1/{id?}', 'estudianteController@buscar1')->name('estudianteBuscar')->middleware('auth');
Route::get('/estudiante/bus/responsables','estudianteController@busquedaSelect');


Route::get('/docente', 'docenteController@show')->name('docente')->middleware('auth');
Route::post('/docente/create', 'docenteController@create');
Route::put('/docente/update/{id?}', 'docenteController@update')->middleware('auth');
Route::get('/docente/buscar/{id?}', 'docenteController@buscar')->name('docenteBuscar')->middleware('auth');

Route::get('/modalidad', 'modalidadController@show')->name('modalidadShow')->middleware('auth');
Route::post('/modalidad/create', 'modalidadController@create')->middleware('auth');
Route::put('/modalidad/update/{id?}', 'modalidadController@update')->middleware('auth');
Route::get('/modalidad/buscar/{id?}', 'modalidadController@buscar')->name('modalidadBuscar')->middleware('auth');

Route::get('/aula', 'aulaController@show')->name('aulaShow')->middleware('auth');
Route::post('/aula/create', 'aulaController@create')->middleware('auth');
Route::put('/aula/update/{id?}', 'aulaController@update')->middleware('auth');
Route::get('/aula/buscar/{id?}', 'aulaController@buscar')->name('aulaBuscar')->middleware('auth');
Route::put('/aula/cambiarEstado/{id?}', 'aulaController@cambiarEstado')->middleware('auth');

Route::get('/responsable', 'responsableController@show')->name('responsableShow')->middleware('auth');
Route::post('/responsable/create', 'responsableController@create')->middleware('auth');
Route::put('/responsable/update/{id?}', 'responsableController@update')->middleware('auth');
Route::get('/responsable/buscar/{id?}', 'responsableController@buscar')->name('responsableBuscar')->middleware('auth');

Route::get('/curso', 'cursoController@show')->name('cursoShow')->middleware('auth');
Route::post('/curso/create', 'cursoController@create')->middleware('auth');
Route::get('/curso/bus/idioma','cursoController@busquedaSelectIdioma');
Route::get('/curso/bus/modalidad','cursoController@busquedaSelectModalidad');
Route::get('/curso/bus/categoria','cursoController@busquedaSelectCategoria');
Route::get('/curso/buscarHorarios/{id?}', 'cursoController@buscarHorarios')->middleware('auth');;
Route::put('/curso/cambiarEstado/{id?}', 'cursoController@cambiarEstado')->middleware('auth');
Route::put('/curso/actualizarPrecio', 'cursoController@actualizarPrecio')->middleware('auth');

Route::get('/grupos', 'grupoController@show')->name('grupoShow')->middleware('auth');


//Route::get('/modalidad', 'modalidadController@show')->name('modalidadShow')->middleware('auth');


//Route::post('/noticiaForm/create', 'noticiaController@create')->name('noticiaCreate')->middleware('auth');



Route::get('/home', 'HomeController@index')->name('home');


