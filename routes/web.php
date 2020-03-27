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

Route::get('/idioma', 'idiomaController@show')->name('idioma')->middleware('auth');
Route::post('/idioma/create', 'idiomaController@create')->middleware('auth');
Route::put('/idioma/update/{id?}', 'idiomaController@update')->middleware('auth');
Route::get('/idioma/buscar/{id?}', 'idiomaController@buscar')->name('idiomaBuscar')->middleware('auth');
Route::put('/idioma/cambiarEstado/{id?}', 'idiomaController@cambiarEstado')->middleware('auth');

Route::get('/categoria', 'categoriaController@show')->name('categoria')->middleware('auth');
Route::post('/categoria/create', 'categoriaController@create')->middleware('auth');
Route::put('/categoria/update/{id?}', 'categoriaController@update')->middleware('auth');
Route::get('/categoria/buscar/{id?}', 'categoriaController@buscar')->name('categoriaBuscar')->middleware('auth');

Route::get('/estudiante', 'estudianteController@show')->name('estudiante')->middleware('auth');
Route::post('/estudiante/create', 'estudianteController@create')->middleware('auth');
Route::post('/estudiante/createUser', 'estudianteController@createUser')->middleware('auth');
Route::put('/estudiante/update/{id?}', 'estudianteController@update')->middleware('auth');
Route::get('/estudiante/buscar/{id?}', 'estudianteController@buscar')->name('estudianteBuscar')->middleware('auth');
Route::get('/estudiante/buscar1/{id?}', 'estudianteController@buscar1')->name('estudianteBuscar1')->middleware('auth');
Route::get('/estudiante/bus/responsables','estudianteController@busquedaSelect');


Route::get('/docente', 'docenteController@show')->name('docente')->middleware('auth');
Route::post('/docente/create', 'docenteController@create');
Route::post('/docente/createUser', 'docenteController@createUser')->middleware('auth');
Route::put('/docente/update/{id?}', 'docenteController@update')->middleware('auth');
Route::get('/docente/buscar/{id?}', 'docenteController@buscar')->name('docenteBuscar')->middleware('auth');
Route::put('/docente/cambiarEstado/{id?}', 'docenteController@cambiarEstado')->middleware('auth');


Route::get('/modalidad', 'modalidadController@show')->name('modalidad')->middleware('auth');
Route::post('/modalidad/create', 'modalidadController@create')->middleware('auth');
Route::put('/modalidad/update/{id?}', 'modalidadController@update')->middleware('auth');
Route::get('/modalidad/buscar/{id?}', 'modalidadController@buscar')->name('modalidadBuscar')->middleware('auth');

Route::get('/aula', 'aulaController@show')->name('aula')->middleware('auth');
Route::post('/aula/create', 'aulaController@create')->middleware('auth');
Route::put('/aula/update/{id?}', 'aulaController@update')->middleware('auth');
Route::get('/aula/buscar/{id?}', 'aulaController@buscar')->name('aulaBuscar')->middleware('auth');
Route::put('/aula/cambiarEstado/{id?}', 'aulaController@cambiarEstado')->middleware('auth');

Route::get('/responsable', 'responsableController@show')->name('responsable')->middleware('auth');
Route::post('/responsable/create', 'responsableController@create')->middleware('auth');
Route::put('/responsable/update/{id?}', 'responsableController@update')->middleware('auth');
Route::get('/responsable/buscar/{id?}', 'responsableController@buscar')->name('responsableBuscar')->middleware('auth');

Route::get('/curso', 'cursoController@show')->name('curso')->middleware('auth');
Route::get('/curso/{id?}', 'cursoController@showPorIdioma')->name('cursoShowIdioma')->middleware('auth');
Route::get('/curso/estado/{estado?}/{id?}', 'cursoController@showPorEstado')->name('cursoShow2')->middleware('auth');
Route::post('/curso/create', 'cursoController@create')->middleware('auth');
Route::get('/curso/bus/idioma','cursoController@busquedaSelectIdioma');
Route::get('/curso/bus/modalidad','cursoController@busquedaSelectModalidad');
Route::get('/curso/bus/categoria','cursoController@busquedaSelectCategoria');
Route::get('/curso/bus/selectformulario','cursoController@llenarSelectFormulario');
Route::get('/curso/buscarHorarios/{id?}', 'cursoController@buscarHorarios')->middleware('auth');;
Route::put('/curso/cambiarEstado/{id?}', 'cursoController@cambiarEstado')->middleware('auth');
Route::put('/curso/actualizarPrecio', 'cursoController@actualizarPrecio')->middleware('auth');
Route::post('/curso/modificarHorarios', 'cursoController@modificarHorarios')->middleware('auth');
Route::post('/curso/createCategoria', 'cursoController@createCategoria')->middleware('auth');
Route::put('/curso/cambiarEstadoCurso/{id?}', 'cursoController@cambiarEstadoCurso')->middleware('auth');
Route::get('/cursoNiveles/{id?}', 'cursoController@showNiveles')->name('cursoShowNiveles')->middleware('auth');

Route::put('/nivel/cambiarEstado/{id?}', 'nivelController@cambiarEstado')->middleware('auth');
Route::post('/nivel/create', 'nivelController@create')->middleware('auth');

Route::get('/periodo', 'periodoController@show')->name('periodoShow')->middleware('auth');
Route::post('/periodo/create', 'periodoController@create')->middleware('auth');
Route::put('/periodo/update/{id?}', 'periodoController@update')->middleware('auth');
Route::get('/periodo/buscar/{id?}', 'periodoController@buscar')->name('periodoBuscar')->middleware('auth');
Route::put('/periodo/cambiarEstado/{id?}', 'periodoController@cambiarEstado')->middleware('auth');
Route::get('/periodo/filtrar/{anho?}/{nperiodofiltro?}', 'periodoController@filtrar')->name('periodoFiltrar')->middleware('auth');


Route::get('/grupos', 'grupoController@show')->name('grupo')->middleware('auth');
Route::get('/gruposExample', 'grupoController@showEditable')->name('grupoShowEditable')->middleware('auth');
Route::post('/grupos/create', 'grupoController@create')->middleware('auth');
Route::put('/grupos/update/{idgrupos?}', 'grupoController@update')->middleware('auth');
Route::get('/grupos/categorias/{idcurso?}', 'grupoController@buscarCategorias')->middleware('auth');
Route::put('/grupos/categoriasPeriodoFiltro/{idcurso?}', 'grupoController@buscarCategoriasPeriodofiltro')->middleware('auth');
Route::get('/grupos/niveles/{idcursocategorias?}', 'grupoController@buscarNiveles')->middleware('auth');
Route::put('/grupos/filtrar', 'grupoController@filtrar')->middleware('auth');
Route::get('/grupos/busquedaAula/{texto?}', 'grupoController@busquedaAula')->middleware('auth');
Route::put('/grupos/updateAula/{idgrupos?}', 'grupoController@updateAula')->middleware('auth');
Route::get('/grupos/busquedaDocente/{texto?}', 'grupoController@busquedaDocente')->middleware('auth');
Route::put('/grupos/updateDocente/{idgrupos?}', 'grupoController@updateDocente')->middleware('auth');
Route::put('/grupos/periodos', 'grupoController@buscarPeriodos')->middleware('auth');
Route::get('/grupos/buscar/{idgrupos?}', 'grupoController@buscarGrupos')->middleware('auth');

Route::get('/grupos/estudiantes/{idgrupos?}', 'estudianteGrupoController@show')->middleware('auth');
Route::get('/estudiantegrupo/{idgrupos?}', 'estudianteGrupoController@busquedaEstudiante')->middleware('auth');
Route::post('/estudiantegrupo/create', 'estudianteGrupoController@create')->middleware('auth');
Route::put('/estudiantegrupo/cambiarEstado/{id?}', 'estudianteGrupoController@cambiarEstado')->middleware('auth');
Route::put('/estudiantegrupo/createPonderacion', 'estudianteGrupoController@createPonderacion')->middleware('auth');

Route::group(['middleware'=>['adminDocente:1,2']],function(){
Route::get('/grupos/notas/{idgrupos?}', 'notaController@show')->middleware('auth');
Route::put('/estudiantegrupo/createNota', 'notaController@createNota')->middleware('auth');
});

Route::get('/record', 'userRecordEstudianteController@show')->middleware('auth');
Route::get('/record/{ididiomas?}', 'userRecordEstudianteController@showParametros')->middleware('auth');
Route::put('/record/filtrar', 'userRecordEstudianteController@filtrar')->middleware('auth');

Route::get('/notas', 'userNotasEstudianteController@show')->middleware('auth');



//Route::get('/modalidad', 'modalidadController@show')->name('modalidadShow')->middleware('auth');


//Route::post('/noticiaForm/create', 'noticiaController@create')->name('noticiaCreate')->middleware('auth');



Route::get('/home', 'HomeController@index')->name('home');


