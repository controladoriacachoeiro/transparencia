@extends('layouts.app')

@section('htmlheader_title')
    Licitações e Contratos
@stop

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection


@section('main-content')
    @if(isset($status))    
        <div class='row'>
            <div class='col-md-9'>
                @include('layouts.navegacao')
            </div>        
            <div class='col-md-3'>
                <div id="divPeriodo" class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Filtro</h3>
                    </div>
                    <div class="box-body">                    
                        Status: {{ $status }} <br>
                        @if(isset($modalidade))
                            Modalidade: {{ $modalidade }} <br>
                        @endif
                        @if(isset($objeto))
                            @php 
                                $objeto = App\Auxiliar::desajusteUrl($objeto);
                            @endphp
                            Objeto: {{ $objeto }}
                        @endif
                    </div>
                </div>
            </div>        
        </div>
    @elseif(isset($situacao))    
        <div class='row'>
            <div class='col-md-9'>
                @include('layouts.navegacao')
            </div>        
            <div class='col-md-3'>
                <div id="divPeriodo" class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Filtro</h3>
                    </div>
                    <div class="box-body">                    
                        Situação: {{ $situacao }} <br>
                        @if(isset($descricao))
                            @php 
                                $descricao = App\Auxiliar::desajusteUrl($descricao);
                            @endphp
                            Descrição: {{ $descricao }}
                        @endif
                    </div>
                </div>
            </div>        
        </div>
    @else
        <div class='row'>
            <div class='col-md-12'>
                @include('layouts.navegacao')
            </div>                          
        </div>
    @endif


    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs acessibilidade">
                    <li class="active"><a href="#tab_1" data-toggle="tab" class="text-muted"><i class="fa fa-table text-purple"></i></a></li>
                    <li><a class="mouse-download" id="customCSVButton"><i class='fa fa-download text-success'> CSV</i></a></li>
                    <li><a class="mouse-download" id="customXLSButton"><i class='fa fa-download text-danger'> XLS</i></a></li>
                    <li class="pull-right"><div id="chart-por-pagina"></div></li>
                    <li class="pull-right"><div id="chart-filtro"></div></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <!--Tabela-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info" id='divTable'>
                                    <div class="box-header with-border">
                                    </div>
                                    <div class="box-body">
                                        @yield('contentTabela')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Pizza</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div id="divPie"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Barra</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="divColumn"></div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <ul class="nav nav-tabs acessibilidade">
                    <li><div id="chart-info"></div></li>
                    <li class="pull-right"><div id="chart-paginacao"></div></li>
                </ul>
            </div>
        </div>
    </div>   
@endsection

@section('scriptsadd')
    <!-- Opções de configuração para tabelas e gráficos -->
    <script src="{{ asset('/js/options.min.js') }}"></script>
    <script src="{{ asset('/js/xlsx.core.min.js') }}"></script>
    <script src="{{ asset('/js/FileSaver.js') }}"></script>
    <script src="{{ asset('/js/tableexport.js') }}"></script>
    <!--paginação-->
    <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <!--grafico-->
    <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
    <!--tabela-->
    <script src="{{ asset('/js/highcharts.js') }}"></script>
    <!--<script src="https://code.highcharts.com/highcharts.js"></script>-->

    <script>
        $(function () {
            // Charts
                var $table = $('#tabela'),
                    $chartFiltro = $('#chart-filtro'),
                    $chartPorPagina = $('#chart-por-pagina'),
                    $chartInfo = $('#chart-info'),
                    $chartPaginacao = $('#chart-paginacao');

                var baseConfig = {
                    credits: {
                        enabled: false
                    },
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        width: $('#tabela').width()
                    },
                    legend: {
                        // align: 'right',
                        // verticalAlign: 'middle',
                        // layout: 'vertical'
                        verticalAlign: 'top'
                    },
                    title: {
                        text: null
                    },
                    xAxis: {
                        categories: ['Título']
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
                    }],
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    }
                };

                // Crie uma função para atualizar o gráfico com o conjunto atual de registros
                // de dynatable, após todas as operações terem sido executadas.
                function updateChart() {
                    // Data
                        var dynatable = $table.data('dynatable'), arrayData = [], i = 0;
                        $.each(dynatable.settings.dataset.records, function() {
                            var row = Object.values(this);
                            var obj = {
                                name: Object.values(row[1])[0],
                                y: parseFloat(row[row.length - 1]),
                                color: Highcharts.getOptions().colors[i]
                            };
                            arrayData.push(obj);
                            i++;
                        });
                    // Fim data

                    // Column
                        var coluna = [];
                        $.each(arrayData, function() {
                            var obj = {
                                type: 'column',
                                name: this.name,
                                data: [this.y]
                            };
                            coluna.push(obj);
                        });
                        var dataColumn = {
                            series: coluna,
                            tooltip: {
                                formatter: function() {
                                    return '<small style="color: '+this.series.color+'">'+
                                    this.series.name +'</small>: <b>'+
                                    this.y.toLocaleString("pt-BR", { minimumFractionDigits: 2 , style: 'currency', currency: 'BRL' });
                                }
                            }
                        };
                    // Fim column

                    // Pie
                        var dataPie = {
                            series: [{
                                type: 'pie',
                                data: arrayData
                            }],
                            tooltip: {
                                formatter: function() {
                                    return '<small style="color: '+this.point.color+'">'+
                                    this.key +'</small>: <b>'+
                                    this.y.toLocaleString("pt-BR", { minimumFractionDigits: 2 , style: 'currency', currency: 'BRL' });
                                }
                            }
                        };
                    // Fim pie

                    $('#divColumn').highcharts(
                        $.extend(baseConfig, dataColumn)
                    );
                    $('#divPie').highcharts(
                        $.extend(baseConfig, dataPie)
                    );
                };
                
                // Anexe dynatable à nossa tabela e ative nossa
                // função de atualização sempre que interagimos com ela.
                $table
                    .dynatable({                        
                        //definir e configurar a coluna para a ordenaçao
                        readers: {
                            'valormoeda': function(el, record) {        
                                return parseFloat(el.innerHTML)
                            },
                            'inteiro': function(el, record){
                                return parseInt(el.innerHTML)
                            }
                        },
                        //definir e configurar a exibição da coluna após a configuração para ordenação
                        writers: {
                            'valormoeda': function(record) {
                                return record['valormoeda'] ? currencyFormat(record['valormoeda'], 2) : 0;
                            },
                            'dataColumn': function(record) {
                                return record['dataColumn'] ? stringToDate(record['dataColumn']) : ' ';
                            }
                        },
                        inputs: {
                            queryEvent: 'blur change keyup',
                            recordCountTarget: $chartInfo,
                            paginationLinkTarget: $chartPaginacao,
                            searchTarget: $chartFiltro,
                            perPageTarget: $chartPorPagina,

                            paginationPrev: 'Anterior',
                            paginationNext: 'Próximo',
                            searchText: 'Pesquisar: ',
                            perPageText: 'Mostrar: ',
                            pageText: 'Páginas: ',
                            recordCountPageBoundTemplate: ' de {pageLowerBound} até {pageUpperBound} de',
                            recordCountPageUnboundedTemplate: '{recordsShown} de',
                            recordCountTotalTemplate: '{recordsQueryCount} {collectionName}',
                            recordCountFilteredTemplate: ' (Filtrados de {recordsTotal} registros)',
                            recordCountText: 'Mostrando',
                            recordCountTextTemplate: '{text} {pageTemplate} {totalTemplate} {filteredTemplate}',
                            recordCountTemplate: '<span id="dynatable-record-count-{elementId}" class="dynatable-record-count">{textTemplate}</span>',
                            processingText: 'Processando...'
                        },
                        params: {
                            queries: 'consultas',
                            sorts: 'classificar',
                            page: 'página',
                            perPage: 'por página',
                            records: 'registros'
                        },
                        dataset: {
                            perPageOptions: [5, 10, 15]                            
                        }
                    })
                    // .hide()
                    .bind('dynatable:afterProcess', updateChart);

                // Execute nossa função updateChart pela primeira vez.
                updateChart();
            // Fim charts
        });
    </script>
@stop