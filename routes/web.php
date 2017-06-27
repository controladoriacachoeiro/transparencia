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

    Route::get('/quemsomos', function () {
        return view('comum.quemsomos');
    });
    Route::get('/lai', function () {
        return view('comum.lai');
    });
    Route::get('/gestaifiscal/legislacao/ppa', function () {
        return view('gestaoFiscal.legislacaoOrcamentaria.ppa');
    });
    Route::get('/gestaifiscal/legislacao/ldo', function () {
        return view('gestaoFiscal.legislacaoOrcamentaria.ldo');
    });
    Route::get('/gestaifiscal/legislacao/loa', function () {
        return view('gestaoFiscal.legislacaoOrcamentaria.loa');
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

/*Download*/
Route::get('download/{nomeArquivo}', ['as' => 'download', 'uses' => 'DownloadController@download']);
/*Fim Download*/


/* PESSOAL */
    Route::get('/servidores/nome', function () {
        return view('pessoal/servidores.filtroNome');
    });
    Route::post('/servidores/nome', 'Pessoal\ServidoresController@nome');
    Route::get('/servidores/nome/{nomeservidor}',  ['as'=> 'ServidoresNome2', 'uses'=>'Pessoal\ServidoresController@nome2']);
/* FIM PESSOAL*/
/* FOLHA DE PAGAMENTO */
    Route::get('/folhadepagamento/matricula', 'FolhaDePagamentoController@matricula');
/* FIM PESSOAL*/

/*Patrimonio*/
    Route::post('/filtroPatrimonioOrgao', 'Patrimonio\BensMoveisController@filtrar')->name('filtrarPatrimonio');
    Route::get('/patrimonios/bensmoveis/orgaos',  ['as'=> 'MontaBensMoveis', 'uses'=>'Patrimonio\BensMoveisController@montaFiltroOrgao']);
    Route::get('/patrimonios/bensmoveis/orgaos/{tipoConsulta}',  ['as'=> 'filtroBensMoveis', 'uses'=>'Patrimonio\BensMoveisController@orgao']);
    Route::get('/patrimonios/bensmoveis/orgaos/{orgao}',  ['as'=> 'filtroPorOrgao', 'uses'=>'Patrimonio\BensMoveisController@porOrgao']);
    Route::post('/filtroPatrimonioNumero', 'Patrimonio\BensMoveisController@filtrarPatrimonio')->name('filtrarNumero');
    Route::get('/patrimonios/bensmoveis/numero', function () {
        return view('patrimonio.BensMoveis.FiltroBensMoveisPatrimonio');
    });
    Route::get('/patrimonios/bensmoveis/patrimonio/{patrimonio}',  ['as'=> 'filtroPorPatrimonio', 'uses'=>'Patrimonio\BensMoveisController@porPatrimonio']);    
    
    Route::get('/patrimonios/bensmoveis/ShowBensMoveis',['as'=> 'ShowBemMovel', 'uses'=>'Patrimonio\BensMoveisController@ShowBemMovel']);
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
/* FIm API*/

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


