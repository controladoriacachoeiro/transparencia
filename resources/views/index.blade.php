@extends('layouts.app')
@section('htmlheader_title', 'Home')

@section('cssheader')
@show

@section('header')    
@Show

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="banner">
                <h3>Gestão transparente,<br> Cidade inteligente.</h3>
                <p>Aqui você encontra informações sobre as receitas e
                <br>despesas do Municipio, servidores, licitações, contratos e muito mais.</p>                 
            </div>
        </div>
    </div>

    <div class="tabs-dark" style="padding:0;">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs">
            <li id="default" class="active">
                <a href="#despesas" data-toggle="tab">Despesas</a>
            </li>
            <li>
                <a href="#receitas" data-toggle="tab">Receitas</a>
            </li>
            <li>
                <a href="#licitacoes" data-toggle="tab">Licitações e Contratos</a>
            </li>
            <li>
                <a href="#gestaofiscal" data-toggle="tab">Gestão Fiscal</a>
            </li>
            <li>
                <a href="#patrimonio" data-toggle="tab">Patrimônio</a>
            </li>
            <li>
                <a href="#pessoal" data-toggle="tab">Pessoal</a>
            </li>
            <li>
                <a href="#convenios" data-toggle="tab">Convênios e Transferências</a>
            </li>
            <li>
                <a href="#dados" data-toggle="tab">Dados Abertos</a>
            </li>            
        </ul>
        <!-- End Tab Navigation -->
        <!-- Tab Panes -->
        <div class="tab-content">
            <div class="tab-pane fade active in" id="despesas">
                <div class="col-md-3">
                    <!--<div class="icone-borda">
                        <i class="fa fa-lock circle-icon"></i>
                    </div>-->
                    <h3>Empenhos</h3>
                    <p>Por Órgão</p>
                    <p>Por Fornecedor</p>
                    <p>Por Função</p>
                    <p>Por Elemento de Despesa</p>
                    <p>Por Nota de Empenho</p>
                </div>
                <div class="col-md-3">
                    <!--<img style="float: left; margin-right: 25px; margin-bottom: 10px;" src="assets/img/frontpage/filler1.jpg" alt="filler image">-->
                    <h3>Liquidações</h3>
                    <p>Por Órgão</p>
                    <p>Por Fornecedor</p>
                    <p>Por Função</p>
                    <p>Por Elemento de Despesa</p>
                    <p>Por Nota de Empenho</p>
                </div>
                <div class="col-md-3">
                    <!--<img style="float: left; margin-right: 25px; margin-bottom: 10px;" src="assets/img/frontpage/filler1.jpg" alt="filler image">-->
                    <h3>Pagamentos</h3>
                    <p>Por Órgão</p>
                    <p>Por Fornecedor</p>
                    <p>Por Função</p>
                    <p>Por Elemento de Despesa</p>
                    <p>Por Nota de Empenho</p>
                </div>
                <div class="col-md-3">
                    <!--<img style="float: left; margin-right: 25px; margin-bottom: 10px;" src="assets/img/frontpage/filler1.jpg" alt="filler image">-->
                    <h3>Resto a Pagar</h3>
                    <p>Por Órgão</p>
                    <p>Por Fornecedor</p>
                    <p>Por Função</p>
                    <p>Por Elemento de Despesa</p>
                    <p>Por Nota de Empenho</p>
                </div>
            </div>
            <div class="tab-pane fade" id="receitas">
                <div class="col-sm-3">
                    <h3>Arrecadada</h3>
                    <p>Por Órgão</p>
                    <p>Por Categoria</p>                    
                </div>
            </div>
            <div class="tab-pane fade" id="licitacoes">
                <div class="col-md-3">
                    <h3>Licitações em Andamento</h3>                                        
                </div>
                <div class="col-md-3">
                    <h3>Licitações Concluídas</h3>                                       
                </div>
                <div class="col-md-3">
                    <h3>Contratos</h3>                                       
                </div>
                <div class="col-md-3">
                    <h3>Bens e Produtos Adquiridos</h3>                                      
                </div>
            </div>
            <div class="tab-pane fade" id="gestaofiscal">
                <div class="col-sm-3">
                    <h3>Legislação Orçamentária</h3>                                        
                </div>
                <div class="col-sm-3">
                    <h3>Relatórios da LRF</h3>                                       
                </div>
                <div class="col-sm-3">
                    <h3>Prestações de Contas</h3>                                       
                </div>
                <div class="col-sm-3">
                    <h3>Auditorias e Inspeções</h3>                                      
                </div>
            </div>
            <div class="tab-pane fade" id="patrimonio">
                <div class="col-sm-4">
                    <h3>Almoxarifado</h3>                                        
                </div>
                <div class="col-sm-4">
                    <h3>BensMóveis</h3>
                    <a href="#">Por Órgão</a>                                       
                    <a href="#">Por Número Patrimônio</a>
                </div>
                <div class="col-sm-4">
                    <h3>Frota</h3>                                       
                </div>                
            </div>
            <div class="tab-pane fade" id="pessoal">
                <div class="col-sm-4">
                    <h3>Servidores e Salários</h3>                                        
                </div>
                <div class="col-sm-4">
                    <h3>Estrutura de Pessoal</h3>                   
                </div>
                <div class="col-sm-4">
                    <h3>Concurso Público</h3>                                       
                </div>                
            </div>
            <div class="tab-pane fade" id="convenios">
                <div class="col-sm-6">
                    <h3>Recursos Recebidos</h3>                                        
                </div>
                <div class="col-sm-6">
                    <h3>Recursos Concedidos</h3>                   
                </div>                              
            </div>
            <div class="tab-pane fade" id="dados">
                <div class="col-sm-6">
                    <h3>Downloads</h3>
                    <a href="#">Despesas</a>                                        
                    <a href="#">Receitas</a>
                    <a href="#">Licitações e Contratos</a>
                    <a href="#">Patrimônios</a>
                    <a href="#">Pessoal</a>
                    <a href="#">Convênios e Transferências</a>
                </div>
                <div class="col-sm-6">
                    <h3>Web Service</h3>                   
                </div>                              
            </div>
        </div>
    </div>
    <div class="tab-busca">
        <div class="col-md-6 ">
            <h3>Estamos aqui para te ajudar</h3>
            <p>Encontre a informação que precisa utilizando o campo abaixo</p>
            <form action="/resultado" method="get" class="tab-busca-form">
                    <div class="input-group">
                        <input type="hidden" name="cx" value="010719052729445061611:ntj0aehspma" />
                        <input type="hidden" name="cof" value="FORID:10" />
                        <input type="hidden" name="ie" value="utf-8" />
                        <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" class="btn"><i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
            </form>
        </div>

    </div>



@endsection

@section('scriptsadd')
    <!-- Opções de configuração para tabelas e gráficos -->
    <script src="{{ asset('/js/options.js') }}"></script>

    <!-- Chart -->
      <!--paginação-->
      <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
      <!--grafico-->
      <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
      <!--tabela-->
      <script src="{{ asset('/js/highcharts.js') }}"></script>
    <!-- fim Chart //-->

    <script>
        $( document ).ready(function() {
            $("#default").addClass("active");
        });
        $(function () {
            
          // Charts
            var ReceitaDb = {
            //   'Lançada': <?php echo json_encode($receitaLancada); ?>,
              'Arrecadada': <?php echo json_encode($receitaArrecadada); ?>
            }
            var DespesaDb = {
            //   'Empenhada': <?php echo json_encode($despesaEmpenhada); ?>,
            //   'Liquidada': <?php echo json_encode($despesaLiquidada); ?>,
              'Paga': <?php echo json_encode($despesaPaga); ?>
            }

            // Receita
              var arrayReceita = [], i = 0;
              $.each(ReceitaDb, function(index, value) {
                var obj = {
                  type: 'line',
                  name: index,
                  data: value,
                  color: Highcharts.getOptions().colors[i]
                };
                arrayReceita.push(obj);
                i++;
              });
            // Fim Receita

            // Despesa
              var arrayDespesa = [], i = 0;
              $.each(DespesaDb, function(index, value) {
                var obj = {
                  type: 'line',
                  name: index,
                  data: value,
                  color: Highcharts.getOptions().colors[i]
                };
                arrayDespesa.push(obj);
                i++;
              });
            // Fim Despesa
            
            var baseConfig = {
              credits: {
                enabled: false
              },
              chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
              },
              legend: {
                  verticalAlign: 'bottom'
              },
              xAxis: {
                categories: <?php echo json_encode($meses); ?>
              },
              yAxis: [{
                  min:0,
                  labels: {
                      formatter: function() {
                      //return 'R$ '+this.value.toString().substring(0, 4);
                      return 'R$ '+ Math.round(this.value/1000000)+' Milhões';
                     },
                      style: {
                          color: '#4572A7'
                      }
                  },
                  title: {
                      text: 'Total R$',
                      style: {
                          color: '#4572A7'
                      }
                  }
              }]
            };

            $('#divReceita').highcharts(
              $.extend(baseConfig, {                
                title: {
                    text: 'Receitas Arrecadadas'
                },
                series: arrayReceita
              })
            );

            $('#divDespesa').highcharts(
              $.extend(baseConfig, {                
                title: {
                    text: 'Despesas Pagas'
                },
                //yAxis: { min: 0 },
                series: arrayDespesa
              })
            );

          // Fim charts
        });
    </script>
@endsection
