@extends('layouts.app')
@section('htmlheader_title', 'WebService')

@section('cssheader')
@endsection

@section('main-content')
    <div class='row'>
        <div class='col-md-12'>
            <div id="navegacao" class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Navegação</h3>                   
                </div>
                <div class="box-body">                                                        
                    <ol class="breadcrumb">
                        <li><a href="/">Início</a></li>                                                
                        <li class="active">WebService</li>                                                                                                                           
                    </ol>        
                </div>
            </div>            
        </div>
    </div>

    <div class="row acessibilidade">
        <div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <!--Despesas-->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Despesas
                      </a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Empenhos</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de despesas">
                                    <thead>
                                        <tr>
                                            <th scope='col' style='vertical-align:middle'>API</th>
                                            <th scope='col' style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope='col'><a href='/apiempenhos'>api/despesas/empenhos/{dataInicial}/{dataFinal}</a></td>
                                            <td scope='col'>Retorna um Json com os empenhos entre as datas informadas</td>
                                        </tr>
                                        <tr>
                                            <td scope='col'><a href='/apinotaempenho'>api/despesas/notaempenho/{numeronota}/{ano}</a></td>
                                            <td scope='col'>Retorna um Json com a nota de empenho entre as datas informadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>    

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Liquidações</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de liquidações">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apiliquidacao'>api/despesas/liquidacoes/{dataInicial}/{dataFinal}</a></td>
                                            <td scope="col">Retorna um Json com as liquidações entre as datas informadas</td>
                                        </tr>
                                        <tr>
                                            <td scope="col"><a href='/apinotaliquidacao'>api/liquidacoes/notaliquidacao/{numeronota}/{ano}</a></td>
                                            <td scope="col">Retorna um Json com a nota de liquidação entre as datas informadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>   

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Pagamentos</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de pagamento">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apipagamento'>api/despesas/pagamentos/{dataInicial}/{dataFinal}</a></td>
                                            <td scope="col">Retorna um Json com os pagamentos entre as datas informadas</td>
                                        </tr>
                                        <tr>
                                            <td scope="col"><a href='/apinotapagamento'>api/despesas/notapagamentos/{numeronota}/{ano}</a></td>
                                            <td scope="col">Retorna um Json com a nota de pagamento entre as datas informadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>   

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Restos a Pagar</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de Restos a pagar">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='apirestopagar'>api/despesas/restospagar/{dataInicial}/{dataFinal}</a></td>
                                            <td scope="col">Retorna um Json com os restos a pagar entre as datas informadas</td>
                                        </tr>
                                        <tr>
                                            <td scope="col"><a href='apinotarestopagar'>api/despesas/notarestopagar/{numeronota}/{ano}</a></td>
                                            <td scope="col">Retorna um Json com a nota restos a pagar entre as datas informadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>   
                    </div>
                  </div>
                </div>

                <!--Receitas-->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        Receitas
                      </a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                  <!--arrecadada-->
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Arrecadadas</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de Receitas arrecadada">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apiarrecadada'>api/receitas/arrecadadas/{dataInicial}/{dataFinal}</a></td>
                                            <td scope="col">Retorna um Json com as receitas arrecadadas entre as datas informadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>      
                    </div>
                  <!--arrecadada-->  
                  <!--iss-->
                  <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Lançadas</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de receitas lançada">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle;width: 427px;'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apilancamento'>api/receitas/lancamentos/{dataInicial}/{dataFinal}</a></td>
                                            <td scope="col">Retorna um Json com as receitas lançadas entre as datas informadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>      
                    </div>
                  <!--iss-->  
                  </div>
                </div>

                <!--Licitações e Contratos-->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                        Licitações e Contratos
                      </a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Licitações</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de licitações em andamento">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='apilicitacoes'>api/licitacoescontratos/licitacoes/{status}</a></td>
                                            <td scope="col">Retorna um Json com as licitações pertencentes àquele status</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>  

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Contratos</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de Contratos">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apicontratos'>api/licitacoescontratos/contratos/{status}</a></td>
                                            <td scope="col">Retorna um Json com os contratos pertencentes àquele status</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Bens e Produtos Adquiridos</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api  de bens e produtos adquiridos">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apibensadquiridos'>/licitacoescontratos/bensadquiridos/{dataInicial}/{dataFinal}</a></td>
                                            <td scope="col">Retorna um Json com os bens e produtos adquiridos entre as datas especificadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>    
                    </div>
                  </div>
                </div>

                <!--Patrimônios-->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                        Patrimônios
                      </a>
                    </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Almoxarifado</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabele de api de almoxarifado">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='apialmoxarifado'>api/patrimonios/almoxarifado</a></td>
                                            <td scope="col">Retorna um Json com os itens do almoxarifado</td>
                                        </tr>
                                        <tr>
                                            <td scope="col"><a href='apiquantidadealmoxarifado'>api/patrimonios/almoxarifado/{numPagina}/{itensPorPagina}</a></td>
                                            <td scope="col">Retorna um Json com os itens do almoxarifado, separando-os em uma certa quantidade por página</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>  
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Bens Móveis</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de bens móveis">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apibensmoveis'>api/patrimonios/bensmoveis</a></td>
                                            <td scope="col">Retorna um Json com os bens móveis</td>
                                        </tr>
                                        <tr>
                                            <td scope="col"><a href='/apiquantidadebensmoveis'>api/patrimonios/bensmoveis/{numPagina}/{itensPorPagina}</a></td>
                                            <td scope="col">Retorna um Json com os bens móveis, divididos em quantidade específica por página</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>    

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Bens Imóveis</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de bens imóveis">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apibensimoveis'>api/patrimonios/bensimoveis</a></td>
                                            <td scope="col">Retorna um Json com os bens imóveis</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>  

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Frota</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de frotas">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apifrota'>api/patrimonios/frota</a></td>
                                            <td scope="col">Retorna um Json com a frota</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>  
                    </div>
                  </div>
                </div>

                <!--Pessoal-->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                        Pessoal
                      </a>
                    </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Servidores</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de pessoal">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apiservidoresnome'>api/pessoal/servidores/nome/{nome}</a></td>
                                            <td scope="col">Retorna um Json com os servidores </td>
                                        </tr>
                                        <tr>
                                            <td scope="col"><a href='/apiservidormatricula'>api/pessoal/servidores/matricula/{matricula}</a></td>
                                            <td scope="col">Retorna um Json com o servidor com a matricula</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>  
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Folha de Pagamento</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de folha de pagamento">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apifolhapagamento'>api/pessoal/servidores/pagamento/{matricula}</a></td>
                                            <td scope="col">Retorna um Json com a folha de pagamento por matricula</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>    
                    </div>
                  </div>
                </div>

                <!--Convênvios e Transferências-->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                        Convênios e Transferências
                      </a>
                    </h4>
                  </div>
                  <div id="collapse6" class="panel-collapse collapse">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Recursos Recebidos</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de recursos recebidos">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apiconveniorecebidos'>api/convenios/recebidos</a></td>
                                            <td scope="col">Retorna um Json com os convênios recebidos </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>  
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Recursos Concedidos</h4>
                                <table id="tabela" class="table table-bordered table-striped" summary="Tabela de api de recursos concedidos">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='vertical-align:middle'>API</th>
                                            <th scope="col" style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="col"><a href='/apiconvenioconcedidos'>api/convenios/concedidos</a></td>
                                            <td scope="col">Retorna um Json com os convênios concedidos </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>    
                    </div>
                  </div>
                </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection

@section('scriptsadd')
    <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <!--grafico-->    
    <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
@endsection