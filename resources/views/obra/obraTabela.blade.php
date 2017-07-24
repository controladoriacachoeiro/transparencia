@extends('layouts.app')

@section('htmlheader_title')
    Obras
@stop

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection

@section('main-content')
    <div clas='row'>
        <div class='col-md-9'>
            @include('layouts.navegacao')
        </div>        
    </div>

     <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" class="text-muted"><i class="fa fa-table text-purple"></i></a></li>                    
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
                                        <h3 class="box-title">Tabela</h3>                                       
                                    </div>
                                    <div class="box-body">
                                        <div class="row" style="overflow:auto">
                                            <table id="tabela" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <?PHP
                                                            foreach ($colunaDados as $valor) {
                                                                echo "<th style='vertical-align:middle'>" . $valor . "</th>";
                                                            }
                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?PHP
                                                    foreach ($dadosDb as $valor) {
                                                        echo "<tr>";
                                                        foreach ($colunaDados as $valorColuna) {
                                                            switch ($valorColuna) {                                                                
                                                                case 'Descrição':                                                                                                                                                                                                                
                                                                    echo "<td><a href='#' onclick=ShowObra(". $valor->CodigoObra.") data-toggle='modal' data-target='#myModal'>". $valor->DescricaoObra."</td>";
                                                                    break;                                 
                                                                case 'Situação':      
                                                                    echo "<td>".$valor->Situacao."</td>";                                                                                                                                                                                                                
                                                                    break;
                                                                case 'Valor da Obra':                                                                      
                                                                    echo "<td>".$valor->ValorContrato."</td>";                                                                
                                                                break;                                                                                                                                                                                                                                                              
                                                            }
                                                        }
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
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
                <ul class="nav nav-tabs">
                    <li><div id="chart-info"></div></li>
                    <li class="pull-right"><div id="chart-paginacao"></div></li>
                </ul>
            </div>            
        </div>        
    </div>    
@endsection

@section('scriptsadd')
    <!-- Opções de configuração para tabelas e gráficos -->
    <script src="{{ asset('/js/options.js') }}"></script>    
    <!--paginação-->
    <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <!--grafico-->    
    <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
    <!--tabela-->
    <script src="{{ asset('/js/highcharts.js') }}"></script>
    <!--<script src="https://code.highcharts.com/highcharts.js"></script>-->

    <script>
        // Dados Model
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
                            perPageOptions: [5, 10],
                            sortTypes: {
                                'valor': 'number'
                            }
                        }
                    })
                    // .hide()
                    .bind('dynatable:afterProcess', updateChart);

                // Execute nossa função updateChart pela primeira vez.
                updateChart();
            // Fim charts
        });
    </script>

    <script>
        function ShowObra(codigoObra) {
            document.getElementById("modal-body").innerHTML = '';
            document.getElementById("titulo").innerHTML = '';
            
            $.get("{{ route('ShowObra')}}", {CodigoObra: codigoObra}, function(value){
                var data = JSON.parse(value)                

            var body = '' + '<div class="row">'+
                                    '<div class="col-md-12">'+
                                        '<table class="table table-sm">'+
                                            '<thead>'+
                                                '<tr>'+
                                                '<th colspan="2">DADOS DA OBRA</th>'+                                                    
                                                '</tr>'+
                                            '</thead>'+
                                            '<tbody>'+
                                                '<tr>'+
                                                '<td>Descrição:</td>' +
                                                '<td>' + data[0].DescricaoObra + '</td>'+                                                        
                                                '</tr>'+
                                                '<tr>'+                                                    
                                                '<td>Serviço:</td>' +
                                                '<td>' + data[0].TipoServico + '</td>'+                                                        
                                                '</tr>'+                                                
                                                '<tr>'+
                                                '<td>Data de Inicio:</td>' +
                                                '<td>' + data[0].DataInicio+'</td>'+
                                                '<tr>'+
                                                '<td>Prazo para Conclusão</td>'+  
                                                '<td>' + data[0].PrazoConclusao+'</td>'+                                                         
                                                '</tr>'+
                                                '<tr>'+
                                                '<td>Rua:</td>' +
                                                '<td>' + data[0].Rua + '</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                '<td>Número:</td>'+
                                                '<td>' + data[0].Numero + '</td>'+  
                                                '</tr>'+
                                                '<tr>'+                                                        
                                                '<td>Município:</td>' +
                                                '<td>' + data[0].Complemento+'</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                '<td>Bairro:</td>'+ 
                                                '<td>' + data[0].Bairro+'</td>'+                                                      
                                                '</tr>' +
                                                '<tr>'+                                                        
                                                '<td>CEP:</td>'+
                                                '<td>'+ data[0].CEP+'</td>'+                                                        
                                                '</tr>'+
                                                '<tr>'+
                                                '<td>Latitude:</td>'+ 
                                                '<td>' +data[0].Latitude+'</td>'+                                                       
                                                '</tr>'+
                                                '<tr>'+
                                                '<td>Longitude:</td>' +
                                                '<td>'+data[0].Longitude+'</td>'+
                                                '</tr>'+                                                                                                 
                                                '<tr>'+ 
                                                '<td>Empresa Contratada:</td>' +
                                                '<td>' +data[0].EmpresaContratada+'</td>'+                                                        
                                                '</tr>' +
                                                '<tr>'+  
                                                '<td>Valor do Contrato:</td>' +
                                                '<td>' + currencyFormat(data[0].ValorContrato,2)+'</td>'+                                                        
                                                '</tr>' +                                                                                                                                        
                                            '</tbody>'+
                                        '</table>';
                body = body + '</div>' + '</div>';
                document.getElementById("modal-body").innerHTML = body;
            });
        }
    </script> 
@stop 