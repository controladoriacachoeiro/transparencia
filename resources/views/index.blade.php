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
                <!--<img src="{{ ('/img/baner_cachoeiro.jpg') }}" class="img-responsive" alt="cachoeiro">-->
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
                <a href="#messages" data-toggle="tab">Licitações e Contratos</a>
            </li>
            <li>
                <a href="#messages" data-toggle="tab">Gestão Fiscal</a>
            </li>
            <li>
                <a href="#messages" data-toggle="tab">Patrimônio</a>
            </li>
            <li>
                <a href="#messages" data-toggle="tab">Pessoal</a>
            </li>
            <li>
                <a href="#messages" data-toggle="tab">Convênios e Transferências</a>
            </li>
            <li>
                <a href="#messages" data-toggle="tab">Dados Abertos</a>
            </li>            
        </ul>        
        <!-- End Tab Navigation -->
        <!-- Tab Panes -->
        <div class="tab-content">
            <div class="tab-pane fade active in" id="despesas">
                <div class="col-sm-3">
                    <!--<img style="float: left; margin-right: 25px; margin-bottom: 10px;" src="assets/img/frontpage/filler1.jpg" alt="filler image">-->
                    <h3>Empenhos</h3>
                    <p>Por Órgão</p>
                    <p>Por Fornecedor</p>
                    <p>Por Função</p>
                    <p>Por Elemento de Despesa</p>
                    <p>Por Nota de Empenho</p>
                </div>
                <div class="col-sm-3">
                    <!--<img style="float: left; margin-right: 25px; margin-bottom: 10px;" src="assets/img/frontpage/filler1.jpg" alt="filler image">-->
                    <h3>Liquidações</h3>
                    <p>Por Órgão</p>
                    <p>Por Fornecedor</p>
                    <p>Por Função</p>
                    <p>Por Elemento de Despesa</p>
                    <p>Por Nota de Empenho</p>
                </div>
                <div class="col-sm-3">
                    <!--<img style="float: left; margin-right: 25px; margin-bottom: 10px;" src="assets/img/frontpage/filler1.jpg" alt="filler image">-->
                    <h3>Pagamentos</h3>
                    <p>Por Órgão</p>
                    <p>Por Fornecedor</p>
                    <p>Por Função</p>
                    <p>Por Elemento de Despesa</p>
                    <p>Por Nota de Empenho</p>
                </div>
                <div class="col-sm-3">
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
                <!--<img style="float: left; margin-right: 25px; margin-bottom: 10px;" src="assets/img/frontpage/filler2.jpg" alt="filler image">-->
                <h3>Mirum Est Notare</h3>
                <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui
                    sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem
                    modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
            </div>
            <div class="tab-pane fade" id="messages">
                <!--<img style="float: left; margin-right: 25px; margin-bottom: 10px;" src="assets/img/frontpage/filler3.jpg" alt="filler image">-->
                <h3>Sollemnes In Futurum</h3>
                <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui
                    sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem
                    modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
            </div>
        </div>
        <!-- End Tab Panes -->
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
