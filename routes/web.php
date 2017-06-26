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

Route::get('/', ['as'=> 'index', 'uses'=>'ComumController@index']);



/* COMUM */

    Route::get('/portal', function () {
        return view('comum.portal');
    });

    Route::get('/resultado', function () {
        return view('comum.resultado');
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

/* FIM COMUM */

/* CHAMADAS AJAX */

    /* Nota Completa */
    Route::get('/showNota', ['as' => 'rota.consulta.showNota', 'uses' => 'ConsultasController@showNota']);

    // Fornecedor Completo
    Route::get('/showFornecedor', ['as' => 'rota.consulta.showFornecedor', 'uses' => 'ConsultasController@showFornecedor']);

/* FIM CHAMADAS AJAX */

/* MENU */
    Route::get('/menu', ['as'=> 'menu', 'uses'=>'AuxController@menu']);
/* FIM MENU */

/* PESSOAL */
    Route::get('/servidores/nome', function () {
        return view('pessoal/servidores.filtroNome');
    });
    Route::post('/servidores/nome', 'Pessoal\ServidoresController@nome');    
    Route::get('/servidores/nome/{nome}',  ['as'=> 'MostrarServidoresNome', 'uses'=>'Pessoal\ServidoresController@MostrarServidoresNome']);
    Route::get('/servidores/orgao', 'Pessoal\ServidoresController@FiltroOrgao');
    Route::post('/servidores/orgao', 'Pessoal\ServidoresController@orgao');
    Route::get('/servidores/orgao/{orgao}',  ['as'=> 'MostrarServidoresOrgao', 'uses'=>'Pessoal\ServidoresController@MostrarServidoresOrgao']);
    Route::get('/servidores/matricula', function () {
        return view('pessoal/servidores.filtroMatricula');
    });
    Route::post('/servidores/cargofuncao', 'Pessoal\ServidoresController@cargofuncao');
    Route::get('/servidores/cargofuncao/{cargofuncao}',  ['as'=> 'MostrarServidoresCargoFuncao', 'uses'=>'Pessoal\ServidoresController@MostrarServidoresCargoFuncao']);
    Route::post('/servidores/matricula', 'Pessoal\ServidoresController@matricula');
    Route::get('/servidores/matricula/{matricula}',  ['as'=> 'MostrarServidoresMatricula', 'uses'=>'Pessoal\ServidoresController@MostrarServidoresMatricula']);
    Route::get('/servidores/cargofuncao', function () {
        return view('pessoal/servidores.filtroCargoFuncao');
    });
    Route::get('/servidores/ShowServidor',['as'=> 'ShowServidor', 'uses'=>'Pessoal\ServidoresController@showServidor']);
/* FIM PESSOAL */

/* FOLHA DE PAGAMENTO */
    Route::get('/folhadepagamento/matricula', function () {
        return view('pessoal/folhapagamento.filtroMatricula');
    });
    Route::post('/folhadepagamento/matricula', 'Pessoal\FolhaPagamentoController@matricula');
    Route::get('/folhadepagamento/matricula/{matricula}',
                ['as'=> 'MostrarPagamentos', 'uses'=>'Pessoal\FolhaPagamentoController@MostrarPagamentos']);    
    Route::get('/folhadepagamento/ShowPagamento',['as'=> 'ShowPagamento', 'uses'=>'Pessoal\FolhaPagamentoController@ShowPagamento']);                                                                  

/* FIM FOLHA DE PAGAMENTO */

/*Patrimonio*/
    Route::get('/patrimonios/bensmoveis/orgaos',  ['as'=> 'filtroBensMoveis', 'uses'=>'Patrimonio\BensMoveisController@filtro']);
    Route::post('/patrimonios/bensmoveis/orgao', 'Patrimonio\BensMoveisController@orgao');
/*Fim Patrimonio*/

/*Api */
Route::group(['prefix' => 'api'],function(){  
    Route::get('/empenhos/nota/{numeroNota}', ['as'=> 'ApiConsulta', 'uses'=>'ApiController@notasEmpenho']);
    Route::get('/liquidacoes/nota/{numeroNota}', ['as'=> 'ApiConsulta', 'uses'=>'ApiController@notasLiquidacao']);
    Route::get('/pagamentos/nota/{numeroNota}', ['as'=> 'ApiConsulta', 'uses'=>'ApiController@notasPagamento']);
    Route::get('/restospagar/nota/{numeroNota}', ['as'=> 'ApiConsulta', 'uses'=>'ApiController@notasRestoPagar']);
    Route::get('/empenhos/{dataInicial}/{dataFinal}', ['as'=> 'ApiConsulta', 'uses'=>'ApiController@empenhos']);
    Route::get('/liquidacoes/{dataInicial}/{dataFinal}', ['as'=> 'ApiConsulta', 'uses'=>'ApiController@liquidacoes']);
    Route::get('/pagamentos/{dataInicial}/{dataFinal}', ['as'=> 'ApiConsulta', 'uses'=>'ApiController@pagamentos']);
    Route::get('/restospagar/{dataInicial}/{dataFinal}', ['as'=> 'ApiConsulta', 'uses'=>'ApiController@restospagar']); 
});
/* FIm API */

/* FILTROS */
    Route::post('/filtro', 'FiltroController@filtrar')->name('filtrar');
    Route::get('{consulta}', ['as'=> 'filtroConsulta', 'uses'=>'FiltroController@consulta']);
    Route::get('{consulta}/{subconsulta?}', ['as'=> 'filtroSubconsulta', 'uses'=>'FiltroController@subConsulta']);
    Route::get('{consulta}/{subconsulta?}/{tipoConsulta?}', ['as'=> 'filtroIndex', 'uses'=>'FiltroController@index']);
/* FIM FILTROS */

/* CONSULTAS */

    Route::get('{consulta}/{subconsulta}/{tipoFiltro}/{nivel1?}', ['as' => 'rota.consulta', 'uses' => 'ConsultasController@index']);
    Route::get('{consulta}/{subconsulta}/{tipoFiltro}/{nivel1?}/{nivel2?}', ['as' => 'rota.consulta', 'uses' => 'ConsultasController@index']);
    Route::get('{consulta}/{subconsulta}/{tipoFiltro}/{nivel1?}/{nivel2?}/{nivel3?}', ['as' => 'rota.consulta', 'uses' => 'ConsultasController@index']);
    Route::get('{consulta}/{subconsulta}/{tipoFiltro}/{nivel1?}/{nivel2?}/{nivel3?}/{nivel4?}', ['as' => 'rota.consulta', 'uses' => 'ConsultasController@index']);
    
/* FIM CONSULTAS */
