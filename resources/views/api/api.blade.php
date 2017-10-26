@extends('layouts.app')
@section('htmlheader_title', 'WebService')

@section('cssheader')
@endsection

@section('main-content')
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
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apiempenhos'>api/despesas/empenhos/{dataInicial}/{dataFinal}</a></td>
                                            <td>Retorna um Json com os empenhos entre as datas informadas</td>
                                        </tr>
                                        <tr>
                                            <td><a href='/apinotaempenho'>api/despesas/notaempenho/{numeronota}/{nota}</a></td>
                                            <td>Retorna um Json com a nota de empenho entre as datas informadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>    

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Liquidações</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apiliquidacao'>api/despesas/liquidacoes/{dataInicial}/{dataFinal}</a></td>
                                            <td>Retorna um Json com as liquidações entre as datas informadas</td>
                                        </tr>
                                        <tr>
                                            <td><a href='/apinotaliquidacao'>api/liquidacoes/notaliquidacao/{numeronota}/{nota}</a></td>
                                            <td>Retorna um Json com a nota de liquidação entre as datas informadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>   

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Pagamentos</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apipagamento'>api/despesas/pagamentos/{dataInicial}/{dataFinal}</a></td>
                                            <td>Retorna um Json com os pagamentos entre as datas informadas</td>
                                        </tr>
                                        <tr>
                                            <td><a href='/apinotapagamento'>api/despesas/notapagamentos/{numeronota}/{nota}</a></td>
                                            <td>Retorna um Json com a nota de pagamento entre as datas informadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>   

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Restos a Pagar</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='apirestopagar'>api/despesas/restospagar/{dataInicial}/{dataFinal}</a></td>
                                            <td>Retorna um Json com os restos a pagar entre as datas informadas</td>
                                        </tr>
                                        <tr>
                                            <td><a href='apinotarestopagar'>api/despesas/notarestopagar/{numeronota}/{nota}</a></td>
                                            <td>Retorna um Json com a nota restos a pagar entre as datas informadas</td>
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
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apiarrecadada'>api/receitas/arrecadadas/{dataInicial}/{dataFinal}</a></td>
                                            <td>Retorna um Json com as receitas arrecadadas entre as datas informadas</td>
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
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle;width: 427px;'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apilancamento'>api/receitas/lancamentos/{dataInicial}/{dataFinal}</a></td>
                                            <td>Retorna um Json com as receitas lançadas entre as datas informadas</td>
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
                                <h4>Licitações em Andamento</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='apilicandamento'>api/licitacoescontratos/licandamento/{dataInicial}/{dataFinal}</a></td>
                                            <td>Retorna um Json com as licitações em andamento entre as datas informadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>  

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Contratos</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apicontratos'>api/licitacoescontratos/contratos</a></td>
                                            <td>Retorna um Json com os contratos</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Bens e Produtos Adquiridos</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apibensadquiridos'>/licitacoescontratos/bensadquiridos/{dataInicial}/{dataFinal}</a></td>
                                            <td>Retorna um Json com os bens e produtos adquiridos entre as datas</td>
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
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='apialmoxarifado'>api/patrimonios/almoxarifado</a></td>
                                            <td>Retorna um Json com os itens do almoxarifado</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>  
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Bens Móveis</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apibensmoveis'>api/patrimonios/bensmoveis</a></td>
                                            <td>Retorna um Json com os bens móveis</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>    

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Bens imóveis</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apibensimoveis'>api/patrimonios/bensimoveis</a></td>
                                            <td>Retorna um Json com os bens imóveis</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>  

                        <div class="col-md-12">
                            <div class="row">
                                <h4>Frota</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apifrota'>api/patrimonios/frota</a></td>
                                            <td>Retorna um Json com a frota</td>
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
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apiservidoresnome'>api/pessoal/servidores/nome/{nome}</a></td>
                                            <td>Retorna um Json com os servidores </td>
                                        </tr>
                                        <tr>
                                            <td><a href='/apiservidormatricula'>api/pessoal/servidores/matricula/{matricula}</a></td>
                                            <td>Retorna um Json com o servidor com a matricula</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>  
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Folha de Pagamento</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apifolhapagamento'>api/pessoal/servidores/pagamento/{matricula}</a></td>
                                            <td>Retorna um Json com a folha de pagamento por matricula</td>
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
                        Convênvios e Transferências
                      </a>
                    </h4>
                  </div>
                  <div id="collapse6" class="panel-collapse collapse">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Recursos Recebidos</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apiconveniorecebidos'>api/convenios/recebidos</a></td>
                                            <td>Retorna um Json com os convênios recebidos </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>  
                        <div class="col-md-12">
                            <div class="row">
                                <h4>Recursos Concedidos</h4>
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style='vertical-align:middle'>API</th>
                                            <th style='vertical-align:middle'>Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href='/apiconvenioconcedidos'>api/convenios/concedidos</a></td>
                                            <td>Retorna um Json com os convênios concedidos </td>
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