@extends('layouts.app')

@section('htmlheader_title')
    Detalhes do Servidor
@stop

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection

@section('main-content')
    <div class='row'>
        <div class='col-md-12'>
            @include('layouts.navegacao')
        </div>
    </div>

    <!-- Detalhes do Servidor -->
    <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title tablelici">DADOS DO SERVIDOR</h3>
            </div>            
            <div class="box-body">
                <div class="row">                    
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Nome</h4>
                            </div>
                            <p>{{$dadosDb[0]->Nome}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Matrícula</h4>
                            </div>
                            <p>{{$dadosDb[0]->Matricula}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>CPF</h4>
                            </div>
                            <p>{{$dadosDb[0]->CPF}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Cargo Efetivo</h4>
                            </div>                            
                            <p>{{$dadosDb[0]->Cargo}}</p>             
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Função Gratificada</h4>
                            </div>
                            <p>{{$dadosDb[0]->Funcao}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Tipo de Vínculo</h4>
                            </div>
                            <p>{{$dadosDb[0]->TipoVinculo}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Início do Exercício</h4>
                            </div>                           
                            <p>{{date('d/m/Y', strtotime($dadosDb[0]->DataExercicio))}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Órgão de Lotação</h4>
                            </div>
                            <p>{{$dadosDb[0]->OrgaoLotacao}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Situação Funcional</h4>
                            </div>
                            <p>{{$dadosDb[0]->Situacao}}</p>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Carga Horária Semanal</h4>
                            </div>
                            <p>{{$dadosDb[0]->CargaHoraria}} h</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Referência</h4>
                            </div>
                            <p>{{$dadosDb[0]->Referencia == null ? 'Não se aplica' : $dadosDb[0]->Referencia}}</p>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Sigla</h4>
                            </div>
                            <p>{{$dadosDb[0]->Sigla == null ? 'Não se aplica' : $dadosDb[0]->Sigla}}</p>
                        </div>
                    </div> 
                </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Tabela Folha de Pagamento -->
     <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs acessibilidade">
                <li><a class="tablelici">{{$Titulo == 'Nenhum Pagamento Encontrado' ? strtoupper($Titulo) : 'FOLHA DE PAGAMENTO'}}</a></li>
                    <!-- <li class="active"><a href="#tab_1" data-toggle="tab" class="text-muted"><i class="fa fa-table text-purple"></i></a></li>
                    <li><a class="mouse-download" id="customCSVButton"><i class='fa fa-download text-success'> CSV</i></a></li>
                    <li><a class="mouse-download" id="customXLSButton"><i class='fa fa-download text-danger'> XLS</i></a></li> -->
                    <li class="pull-right"><div id="chart-por-pagina"></div></li>
                    <li class="pull-right"><div id="chart-filtro"></div></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <!--Tabela-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-body">
                                    <!-- Conteúdo da Tabela -->
                                    <div class="row" style="overflow:auto">
                                        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
                                            <thead>
                                                <tr>
                                                    <?PHP
                                                        foreach ($colunaDados as $valor) {
                                                            echo "<th scope='col' style='vertical-align:middle'>" . $valor . "</th>";
                                                        }                        
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?PHP
                                                foreach ($dadosDb2 as $valor) {                    
                                                    echo "<tr>";
                                                    foreach ($colunaDados as $valorColuna) {
                                                        switch ($valorColuna) {
                                                            case 'Nome':
                                                                echo "<td scope='col'><a href='#' onclick=ShowPagamento(". $valor->Matricula . ',' . $valor->MesPagamento. ',' . $valor->AnoPagamento . ") data-toggle='modal' data-target='#myModal'>". $valor->Nome ."</a></td>";                                    
                                                                break;                            
                                                            case 'Matrícula':                                                            
                                                                echo "<td scope='col'>".$valor->Matricula."</td>";                       
                                                                break;                                                                   
                                                            case 'Mês':                                
                                                                echo "<td scope='col'><a href='#' onclick=ShowPagamento(". $valor->Matricula . ',' . $valor->MesPagamento. ',' . $valor->AnoPagamento . ") data-toggle='modal' data-target='#myModal'>". $valor->MesPagamento ."</a></td>";
                                                                break;
                                                            case 'Ano':
                                                                echo "<td scope='col'><a href='#' onclick=ShowPagamento(". $valor->Matricula . ',' . $valor->MesPagamento. ',' . $valor->AnoPagamento . ") data-toggle='modal' data-target='#myModal'>". $valor->AnoPagamento ."</a></td>";
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
                            perPageOptions: [5, 10, 15],
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
    function ShowPagamento(matricula, mes, ano) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowPagamento')}}", {Matricula: matricula, Mes: mes, Ano: ano}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>Folha de Pagamento de: </span> ' + data[0].Nome;

            var creditos = '';
            var debitos = '';
            var neutros = '';
            var add = 0;
            var liquido = 0;
            var ExisteNeutro = false;                        
            $.each(data, function(i, valor){
                if (valor.TipoEvento == "C"){
                    add = add + valor.Valor;
                    creditos = creditos + '<tr>'+                                                                                      
                            '<td>' + valor.DescricaoEvento + '</td>'+                                                        
                            '<td>' + currencyFormat(valor.Valor) + '</td>'+
                            '</tr>';
                }else if (valor.TipoEvento == "D"){
                    liquido = liquido + valor.Valor;
                    debitos = debitos + '<tr>'+                                                                                      
                            '<td>' + valor.DescricaoEvento + '</td>'+                                                                                    
                            '<td>' + currencyFormat(valor.Valor) + '</td>'+
                            '</tr>';
                }else if (valor.TipoEvento == "N"){
                    existeNeutro = true;
                    neutros = neutros + '<tr>'+                                                                                      
                            '<td>' + valor.DescricaoEvento + '</td>'+                                                        
                            '<td>' + currencyFormat(valor.Valor) + '</td>'+
                            '</tr>';
                }
            });
            if (ExisteNeutro){
                var aux = neutro;
                neutros = '<tr>'+
                          '<th colspan="2">NEUTROS</th>'+                                            
                          '</tr>'+
                          aux;
            }
            liquido = add - liquido;

            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                '<table class="table table-sm" style="font-size:'+tamanho+'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                    
                                            '<td>Nome do Servidor:</td>' +
                                            '<td>' + data[0].Nome + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Matrícula:</td>' +
                                            '<td>' + data[0].Matricula + '</td>'+                                                        
                                            '</tr>'+                                            
                                            '<tr>'+                                                        
                                            '<td>CPF:</td>' +
                                            '<td>' + FormatCpfCnpj(data[0].CPF) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Data do Pagamento:</td>' +
                                            '<td>' + data[0].MesPagamento + '/' + data[0].AnoPagamento + '</td>'+                                                        
                                            '</tr>' +                                                                                                      
                                        '</tbody>'+
                                    '</table>'+

                                    '<table class="table table-sm" style="font-size:'+tamanho+'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">CRÉDITOS</th>'+                                            
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>' +
                                        creditos +
                                        '<tr>'+
                                        '<th colspan="2">DÉBITOS</th>'+
                                        '</tr>'+
                                        debitos +
                                        neutros;                                        
                                                                                                                                                                                                                                               
            body = body + '</tbody>'+'</table>';

            body = body + '<table class="table table-sm" style="font-size:'+tamanho+'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th>SALÁRIO BRUTO</th>'+
                                            '<th>' + 'R$ ' + currencyFormat(add) +'</th>'+                                            
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>' +                                        
                                        '<tr>'+
                                        '<th>SALÁRIO LÍQUIDO</th>'+
                                        '<th>' +  'R$ ' + currencyFormat(liquido) +'</th>'+ 
                                        '</tr>'; 


            body = body + '</tbody>'+'</table>';
            body = body + '</div>' + '</div>';
            body=body+'<div style="text-align: justify;color:#4C4C4C;">'+
                       '<span style="font-size:'+tamanho+'">Obs.: O salário líquido pode não corresponder ao valor efetivamente recebido pelo servidor, porque não são exibidos os descontos de cunho pessoal, como empréstimo consignado ou pensão alimentícia.</span>'+
                       '</div>';


            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>

@stop