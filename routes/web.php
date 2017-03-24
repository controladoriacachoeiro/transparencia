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
    return view('index');
});



/* COMUM */

Route::get('/portal', function () {
    return view('comum.portal');
});

Route::get('/glossario', function () {
    return view('comum.glossario');
});

Route::get('/manual', function () {
    return view('comum.manual');
});

Route::get('/legislacao', function () {
    return view('comum.legislacao');
});

Route::get('/faq', function () {
    return view('comum.faq');
});

Route::get('/mapasite', function () {
    return view('comum.mapasite');
});

/* FILTROS */
Route::get('{consulta}', ['as'=> 'filtroConsulta', 'uses'=>'FiltroController@consulta']);
Route::get('{consulta}/{subconsulta?}', ['as'=> 'filtroSubconsulta', 'uses'=>'FiltroController@subConsulta']);
Route::get('{consulta}/{subconsulta?}/{tipoFiltro?}', ['as'=> 'filtroIndex', 'uses'=>'FiltroController@index']);
Route::post('/filtro', 'FiltroController@filtrar')->name('filtrar');

/* DESPESAS */
Route::get('/despesas', 'DespesasController@index');
Route::get('/despesas/despesa', 'DespesasController@index');
Route::get('/despesas/teste', 'DespesasController@teste');
Route::post('/despesas/teste', 'DespesasController@teste')->name('despesa.filtro');

Route::get('{consulta}/{subconsulta}/{tipoFiltro}/{unidadeGestora?}/{periodo?}/{dataInicio?}/{dataFim?}/{ano?}/{mes?}/{bimestre?}/{trimestre?}/{quadrimestre?}/{semestre?}', ['as' => 'despesa.empenho', 'uses' => 'EmpenhoController@index']);