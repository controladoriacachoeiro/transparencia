@extends('layouts.app')
@section('htmlheader_title', 'Home')

@section('cssheader')
@show

@section('header')    
@Show

@section('main-content')

  <div class="row">
    <div class="col-md-12">
      <img src="{{ ('/img/cachoeiroturismo.jpg') }}" class="img-responsive" alt="Imagem Responsiva">
    </div>
  </div>

  <br>

  <div class="row">
      <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <h3><?php echo $receitaPrevista ?></h3>
                  <p>Receita Prevista</p>
              </div>
              <div class="icon">
                  <i class="fa fa-line-chart"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <h3>311 Milhões</h3>
                  <p>Receita Arrecadada</p>
              </div>
              <div class="icon">
                  <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                  <h3>217 Milhões</h3>
                  <p>Despesa Empenhada</p>
              </div>
              <div class="icon">
                  <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                  <h3>209 Milhões</h3>
                  <p>Despesa Liquidada</p>
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                  <h3>287 Milhões</h3>
                  <p>Despesa Paga</p>
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-purple">
              <div class="inner">
                  <h3>287 Milhões</h3>
                  <p>Servidores</p>
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-green">
              <div class="inner">
                  <h3>287 Milhões</h3>
                  <p>Contratos</p>
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-yellow">
              <div class="inner">
                  <h3>287 Milhões</h3>
                  <p>Veículos</p>
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
  </div>

  <br>

  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-app" href="despesas">
        <span class="badge bg-teal">3</span>
        <i class="fa fa-area-chart"></i> Despesas
      </a>
      <a class="btn btn-app" href="receitas">
        <span class="badge bg-orange">2</span>
        <i class="fa fa-line-chart"></i> Receitas
      </a>
      <a class="btn btn-app" href="licitacoes_contratos">
        <span class="badge bg-maroon">4</span>
        <i class="fa fa-shopping-cart"></i> Licitações e Contratos
      </a>
      <a class="btn btn-app" href="gestao_fiscal">
        <span class="badge bg-green">4</span>
        <i class="fa fa-exclamation-triangle"></i> Gestão Fiscal
      </a>
      <a class="btn btn-app" href="patrimonio">
        <span class="badge bg-navy">3</span>
        <i class="fa fa-institution"></i> Patrimônio
      </a>
      <a class="btn btn-app" href="pessoal">
        <span class="badge bg-purple">4</span>
        <i class="fa fa-users"></i> Pessoal
      </a>
      <a class="btn btn-app" href="convenios_transferencias">
        <span class="badge bg-aqua">3</span>
        <i class="fa fa-chain"></i> Convênios e Transferências
      </a>
      <a class="btn btn-app" href="informacoes">
        <span class="badge bg-yellow">2</span>
        <i class="fa fa-info"></i> Mais Informações
      </a>
      <a class="btn btn-app" href="#contatos">
        <span class="badge bg-black">12</span>
        <i class="fa fa-envelope"></i> Contatos
      </a>
      <a class="btn btn-app" href="#links_uteis">
        <span class="badge bg-red">531</span>
        <i class="fa fa-heart-o"></i> Linkes Úteis
      </a>
    </div>
  </div>

  <br>

  <div class="row">
    <div class="col-md-6">
      <div id="divDespesa"></div>
    </div>
    <div class="col-md-6">
      <div id="divReceita"></div>
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
        $(function () {
            
          // Charts

            var ReceitaDb = {
              'Lançada': <?php echo json_encode($receitaLancada); ?>,
              'Arrecadada': <?php echo json_encode($receitaArrecadada); ?>
            }
            var DespesaDb = {
              'Empenhada': <?php echo json_encode($despesaEmpenhada); ?>,
              'Liquidada': <?php echo json_encode($despesaLiquidada); ?>,
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
                  labels: {
                      format: 'R$ {value},00',
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
                    text: 'Receitas'
                },
                series: arrayReceita
              })
            );

            $('#divDespesa').highcharts(
              $.extend(baseConfig, {                
                title: {
                    text: 'Despesas'
                },
                series: arrayDespesa
              })
            );

          // Fim charts
        });
    </script>
@endsection