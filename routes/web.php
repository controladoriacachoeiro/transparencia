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

Route::get('/', ['as'=> 'index', 'uses'=>'HomeController@index']);



/* COMUM */

    Route::get('/construcao', function () {
        return view('Construcao.Construcao');
    });
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
    Route::get('/gestaofiscal/legislacao/ppa', function () {
        return view('gestaoFiscal.legislacaoOrcamentaria.ppa');
    });
    Route::get('/gestaofiscal/legislacao/ldo', function () {
        return view('gestaoFiscal.legislacaoOrcamentaria.ldo');
    });
    Route::get('/gestaofiscal/legislacao/loa', function () {
        return view('gestaoFiscal.legislacaoOrcamentaria.loa');
    });
    Route::get('/gestaofiscal/lrf/rgf', function () {
        return view('gestaoFiscal.relatorioLrf.rgf');
    });
    Route::get('/gestaofiscal/lrf/rreo', function () {
        return view('gestaoFiscal.relatorioLrf.rreo');
    });
    Route::get('/gestaofiscal/prestacaoconta', function () {
        return view('gestaoFiscal.prestacaoConta');
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

/* RECEITAS */
    Route::get('/receitas/recebimentos/orgao', 'Receitas\ReceitasController@FiltroOrgao');
    Route::post('/receitas/recebimentos/orgao', 'Receitas\ReceitasController@orgao');
    Route::get('/receitas/recebimentos/orgao/{dataini}/{datafim}/{orgao}', ['as'=> 'MostrarReceitasOrgao', 'uses'=>'Receitas\ReceitasController@MostrarReceitasOrgao']);
    Route::get('/receitas/recebimentos/orgao/{dataini}/{datafim}/{orgao}/{categoria}', ['as'=> 'MostrarReceitasOrgaoCategoria', 'uses'=>'Receitas\ReceitasController@MostrarReceitasOrgaoCategoria']);
    Route::get('/receitas/recebimentos/orgao/{dataini}/{datafim}/{orgao}/{categoria}/{especie}', ['as'=> 'MostrarReceitasOrgaoCategoriaEspecie', 'uses'=>'Receitas\ReceitasController@MostrarReceitasOrgaoCategoriaEspecie']);

    Route::get('/receitas/recebimentos/categoria', 'Receitas\ReceitasController@FiltroCategoria');
    Route::post('/receitas/recebimentos/categoria', 'Receitas\ReceitasController@categoria');
    Route::get('/receitas/recebimentos/categoria/{dataini}/{datafim}/{categoria}', ['as'=> 'MostrarReceitasCategoria', 'uses'=>'Receitas\ReceitasController@MostrarReceitasCategoria']);
    Route::get('/receitas/recebimentos/categoria/{dataini}/{datafim}/{categoria}/{especie}', ['as'=> 'MostrarReceitasCategoriaEspecie', 'uses'=>'Receitas\ReceitasController@MostrarReceitasCategoriaEspecie']);

    Route::get('/receitas/showReceita', ['as'=> 'ShowReceita', 'uses'=>'Receitas\ReceitasController@ShowReceita']);
/* FIM RECEITAS */

/* CONTRATOS */

    

/* FIM CONTRATOS */

/*licitacoes e contratos*/
    Route::group(['prefix' => 'licitacoescontratos'], function () {
        Route::get('/andamento/orgao', ['as' => 'filtroOrgao','uses' =>'LicitacoesContratos\LicitacoesAndamentoController@MostrarLicitacaoAndamento']);
        Route::get('/andamento/ShowLicitacaoAndamento', ['as'=> 'ShowLicitacaoAndamento', 'uses'=> 'LicitacoesContratos\LicitacoesAndamentoController@ShowLicitacaoAndamento']);
        Route::get('/andamento/download/{id}', ['as'=> 'DownloadLicitacaoAndamento', 'uses'=> 'LicitacoesContratos\LicitacoesAndamentoController@DownloadLicitacaoAndamento']);

        Route::get('/concluida/orgao', ['as'=> 'filtroOrgao', 'uses'=> 'LicitacoesContratos\LicitacoesConcluidasController@MostrarLicitacaoConcluida']);
        Route::get('/andamento/download/{id}', ['as'=> 'DownloadLicitacaoAndamento', 'uses'=> 'LicitacoesContratos\LicitacoesAndamentoController@DownloadLicitacaoAndamento']);
        Route::get('/andamento/download/{id}', ['as'=> 'DownloadLicitacaoAndamento', 'uses'=> 'LicitacoesContratos\LicitacoesAndamentoController@DownloadLicitacaoAndamento']);

        Route::get('/contratos', 'LicitacoesContratos\ContratosController@ListarContratos');
        Route::get('/contratos/ShowContrato', ['as'=> 'ShowContrato', 'uses'=> 'LicitacoesContratos\ContratosController@ShowContrato']);
        Route::get('/contratos/Download/{id}', ['as'=> 'DownloadContrato', 'uses'=> 'LicitacoesContratos\ContratosController@DownloadContrato']);

        Route::get('/bensadquiridos/orgao', ['as' => 'filtroProdutosAdquirido','uses' =>'LicitacoesContratos\ProdutosAdquiridosController@montarFiltroProdutosAdquiridos']);
        Route::post('/bensadquiridos/orgao', 'LicitacoesContratos\ProdutosAdquiridosController@Filtrar');
        Route::get('/bensadquiridos/orgao/{orgao}', ['as'=> 'BensAdquiridosOrgao', 'uses'=>'LicitacoesContratos\ProdutosAdquiridosController@FiltrarProdutosAdquiridos']);
        Route::get('/bensadquiridos/ShowbensAdquiridos', ['as'=> 'ShowBensAdquiridos', 'uses'=> 'LicitacoesContratos\ProdutosAdquiridosController@ShowBemAdquirido']);
        
        
    });
/*fim licitacoes e contratos*/

 /*Convenios*/
    Route::group(['prefix' => 'convenios'], function () {
        Route::get('/cedidos/todos', ['as' => 'filtroOrgao','uses' =>'Convenios\ConveniosCedidosController@MostrarConveniosRecebidos']);
        Route::get('/cedidos/ShowConvenioCedido', ['as'=> 'ShowConvenioCedido', 'uses'=> 'Convenios\ConveniosCedidosController@ShowConvenioCedido']);
        Route::get('/cedidos/download/{id}', ['as'=> 'DownloadConveioCedido', 'uses'=> 'Convenios\ConveniosCedidosController@DownloadConveniosCedidos']);

        Route::get('/recebidos/todos', ['as'=> 'filtroConvenioRecebido', 'uses'=> 'Convenios\ConveniosRecebidosController@MostrarConveniosRecebidos']);
        Route::get('/recebidos/ShowConvenioRecebido', ['as'=> 'ShowConvenioRecebido', 'uses'=> 'Convenios\ConveniosRecebidosController@ShowConvenioRecebido']);
        Route::get('/recebidos/download/{id}', ['as'=> 'DownloadConveioRecebido', 'uses'=> 'Convenios\ConveniosRecebidosController@DownloadConveniosRecebido']);
    });
 /* fim*/


/* PESSOAL */
    /* SERVIDORES */
        Route::get('/servidores/nome', function () {
            return view('pessoal/servidores.filtroNome');
        });
        Route::post('/servidores/nome', 'Pessoal\ServidoresController@nome');
        Route::get('/servidores/nome/{nome}', ['as'=> 'MostrarServidoresNome', 'uses'=>'Pessoal\ServidoresController@MostrarServidoresNome']);
        Route::get('/servidores/orgao', 'Pessoal\ServidoresController@FiltroOrgao');
        Route::post('/servidores/orgao', 'Pessoal\ServidoresController@orgao');
        Route::get('/servidores/orgao/{orgao}', ['as'=> 'MostrarServidoresOrgao', 'uses'=>'Pessoal\ServidoresController@MostrarServidoresOrgao']);
        Route::get('/servidores/matricula', function () {
            return view('pessoal/servidores.filtroMatricula');
        });
        Route::post('/servidores/cargofuncao', 'Pessoal\ServidoresController@cargofuncao');
        Route::get('/servidores/cargofuncao/{cargofuncao}', ['as'=> 'MostrarServidoresCargoFuncao', 'uses'=>'Pessoal\ServidoresController@MostrarServidoresCargoFuncao']);
        Route::post('/servidores/matricula', 'Pessoal\ServidoresController@matricula');
        Route::get('/servidores/matricula/{matricula}', ['as'=> 'MostrarServidoresMatricula', 'uses'=>'Pessoal\ServidoresController@MostrarServidoresMatricula']);
        Route::get('/servidores/cargofuncao', function () {
            return view('pessoal/servidores.filtroCargoFuncao');
        });
        Route::get('/servidores/ShowServidor', ['as'=> 'ShowServidor', 'uses'=>'Pessoal\ServidoresController@showServidor']);
    /* FIM SERVIDORES */

    /* FOLHA DE PAGAMENTO */
        Route::get('/folhadepagamento/matricula', function () {
            return view('pessoal/folhapagamento.filtroMatricula');
        });
        Route::post('/folhadepagamento/matricula', 'Pessoal\FolhaPagamentoController@matricula');
        Route::get('/folhadepagamento/matricula/{matricula}',
                    ['as'=> 'MostrarPagamentos', 'uses'=>'Pessoal\FolhaPagamentoController@MostrarPagamentos']);
        Route::get('/folhadepagamento/ShowPagamento', ['as'=> 'ShowPagamento', 'uses'=>'Pessoal\FolhaPagamentoController@ShowPagamento']);

    /* FIM FOLHA DE PAGAMENTO */

    Route::get('/concursos', function () {
        return view('pessoal.concursos');
    });
/* FIM PESSOAL */


/*Patrimonio*/
    /*Bens móveis*/    
    Route::get('/patrimonios/bensmoveis/orgao', 'Patrimonio\BensMoveisController@FiltroOrgao');
    Route::post('/patrimonios/bensmoveis/orgao', 'Patrimonio\BensMoveisController@orgao');
    Route::get('/patrimonios/bensmoveis/orgao/{orgao}', ['as'=> 'BensOrgao', 'uses'=>'Patrimonio\BensMoveisController@BensOrgao']);
    Route::get('/patrimonios/bensmoveis/orgao/{orgao}/{tipo}', ['as'=> 'BensOrgaoTipo', 'uses'=>'Patrimonio\BensMoveisController@BensOrgaoTipo']);

    Route::get('/patrimonios/bensmoveis/numeropatrimonio', function () {
        return view('patrimonio.BensMoveis.filtroNumeroPatrimonio');
    });
    Route::post('/patrimonios/bensmoveis/numeropatrimonio', 'Patrimonio\BensMoveisController@numeroPatrimonio');
    Route::get('/patrimonios/bensmoveis/numeropatrimonio/{numeropatrimonio}', ['as'=> 'BensNumeroPatrimonio', 'uses'=>'Patrimonio\BensMoveisController@BensNumeroPatrimonio']);

    Route::get('/patrimonios/bensmoveis/ShowBensMoveis', ['as'=> 'ShowBemMovel', 'uses'=>'Patrimonio\BensMoveisController@ShowBemMovel']);
    /*Bens móveis*/

    /*Almoxarifado*/
        Route::group(['prefix' => 'patrimonios/almoxarifado'], function () {
            Route::post('/porAlmoxarifado', 'Patrimonio\AlmoxarifadoController@filtrar')->name('filtrarAlmoxarifado');
            Route::get('/porAlmoxarifado', ['as' => 'filtroAlmoxarifado','uses' =>'Patrimonio\AlmoxarifadoController@montarFiltroAlmoxarifado']);
            Route::get('/porAlmoxarifado/{tipoConsulta}', ['as'=> 'filtroAlmoxarifado2', 'uses'=>'Patrimonio\AlmoxarifadoController@FiltrarAlmoxarifado']);
            Route::get('/ShowAlmoxarifado', ['as'=> 'ShowAlmoxarifado', 'uses'=>'Patrimonio\AlmoxarifadoController@ShowAlmoxarifado']);
        });
    /*fim licitacoes em adamento*/
/*Fim Patrimonio*/

/*Mais Informações*/    
    Route::group(['prefix' => 'maisinformacoes'], function () {
        Route::get('/obras', ['as' => 'filtroObras','uses' =>'obras\ObrasController@montaFiltro']);
        Route::post('/obras/filtra', ['as' => 'filtrarObras','uses' =>'obras\ObrasController@filtrarObra']);
        Route::get('/obras/{situacao}', ['as' => 'filtrarObras2','uses' =>'obras\ObrasController@filtroSituacao']);
    });
/*Fim Mais Informações*/

/*Api */
    Route::group(['prefix' => 'api'], function () {
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
