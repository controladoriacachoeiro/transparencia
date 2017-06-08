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
      <div class="col-sm-6 col-md-4 col-lg-3">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <!--<h3><?php echo $receitaPrevista ?></h3>-->
                  <h3>411 Milhões</h3>
                  <p>Receita Prevista</p>
              </div>
              <div class="icon">
                  <i class="fa fa-line-chart"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-sm-6 col-md-4 col-lg-3">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <h3>155 Milhões</h3>
                  <p>Receita Arrecadada</p>
              </div>
              <div class="icon">
                  <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <!-- small box -->
          <div class="small-box bg-purple">
              <div class="inner">
                  <h3>5853</h3>
                  <p>Servidores</p>
              </div>
              <div class="icon">
                  <i class="ion ion-ios-person"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-sm-6 col-md-4 col-md-offset-2 col-lg-3 col-lg-offset-0">
          <!-- small box -->
          <div class="small-box bg-green">
              <div class="inner">
                  <h3>162</h3>
                  <p>Contratos</p>
              </div>
              <div class="icon">
                  <i class="ion ion-ios-paper"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-sm-6 col-md-4 col-lg-3">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                  <h3>211 Milhões</h3>
                  <p>Despesa Empenhada</p>
              </div>
              <div class="icon">
                  <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
         <!-- ./col -->
      <div class="col-sm-6 col-md-4 col-lg-3">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                  <h3>92 Milhões</h3>
                  <p>Despesa Liquidada</p>
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
      <div class="col-sm-6 col-md-4 col-lg-3">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                  <h3>84 Milhões</h3>
                  <p>Despesa Paga</p>
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>     
      <!-- ./col -->
      <div class="col-sm-6 col-md-4 col-lg-3">
          <!-- small box -->
          <div class="small-box bg-yellow">
              <div class="inner">
                  <h3>500</h3>
                  <p>Veículos</p>
              </div>
              <div class="icon">
                  <i class="ion ion-android-car"></i>
              </div>
              <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <!-- ./col -->
  </div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h6 align="right">*Dados referentes ao ano vigente</h6>
    </div>
</div>
  <br>

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

  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100688690-1', 'auto');
  ga('send', 'pageview');

  </script>
@endsection