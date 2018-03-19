@extends('layouts.app')

@section('htmlheader_title')
    Detálhes da Licitação
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

    <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Dados da Licitação</h3>
            </div>
            <!-- /.box-header -->
            <div class="row">
                <div class="box-body text-justify">
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Código da Licitação</h4>
                            </div>
                            <p>{{$dadosDb[0]->CodigoLicitacao}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Número do Edital</h4>
                            </div>
                            <p>{{$dadosDb[0]->NumeroEdital . '/' . $dadosDb[0]->AnoEdital}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Órgão Licitante</h4>
                            </div>
                            <p>{{$dadosDb[0]->OrgaoLicitante}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Objeto Licitado</h4>
                            </div>
                            <p>{{$dadosDb[0]->ObjetoLicitado}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box-body text-justify">
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Status</h4>
                            </div>
                            <p>{{$dadosDb[0]->Status}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Modalidade Licitatória</h4>
                            </div>
                            <p>{{$dadosDb[0]->ModalidadeLicitatoria}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Data das Propostas</h4>
                            </div>
                            <p>{{$dadosDb[0]->DataPropostas}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Horário da Sessão</h4>
                            </div>
                            <p>{{$dadosDb[0]->HorarioSessao}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box-body text-justify">
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4>Número do Processo</h4>
                            </div>
                            <p>{{$dadosDb[0]->NumeroProcesso . '/' . $dadosDb[0]->AnoProcesso}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
    </div>



    <!-- TABELA PARA OS ITENS DA LICITAÇÃO -->
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs acessibilidade">
                    <li>ITENS</li>
                    <li class="active"><a href="#tab_1" data-toggle="tab" class="text-muted"><i class="fa fa-table text-purple"></i></a></li>
                    <li><a class="mouse-download" id="customCSVButton"><i class='fa fa-download text-success'> CSV</i></a></li>
                    <li><a class="mouse-download" id="customXLSButton"><i class='fa fa-download text-danger'> XLS</i></a></li>
                    <li class="pull-right"><div id="chart-por-pagina"></div></li>
                    <li class="pull-right"><div id="chart-filtro"></div></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <div class="box box-info" id='divTable'> -->
                                    <div class="box-body">

                                        <div class="row" style="overflow:auto">
                                            <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
                                                <thead>
                                                    <tr>
                                                        <?PHP
                                                            foreach ($colunaDadosItens as $valor) {                                                                                                                        
                                                                echo "<th scope='col' style='vertical-align:middle'>" . $valor . "</th>";
                                                            }
                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?PHP
                                                    foreach ($Itens as $valor) {
                                                        echo "<tr>";
                                                        foreach ($colunaDadosItens as $valorColuna) {
                                                            switch ($valorColuna) {
                                                                case 'Nome do Lote':
                                                                    echo "<td scope='col'>".$valor->NomeLote."</td>";
                                                                    break;
                                                                case 'Produto/Serviço':
                                                                    echo "<td scope='col'><a href='#' onclick=ShowLicitacao(". $valor->LicitacaoItemID . ") data-toggle='modal' data-target='#myModal'>". $valor->NomeProdutoServico . "</td>";
                                                                    break;
                                                                case 'Tipo':
                                                                    echo "<td scope='col'>" . $valor->TipoItem ."</a></td>";
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
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li><div id="chart-info"></div></li>
                    <li class="pull-right"><div id="chart-paginacao"></div></li>
                </ul>
            </div>
        </div>
    </div>


    <!-- TABELA PARA OS PARTICIPANTES DA LICITAÇÃO -->
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs acessibilidade">
                    <li>PARTICIPANTES</li>
                    <li class="active"><a href="#tab_1" data-toggle="tab" class="text-muted"><i class="fa fa-table text-purple"></i></a></li>
                    <li><a class="mouse-download" id="customCSVButton"><i class='fa fa-download text-success'> CSV</i></a></li>
                    <li><a class="mouse-download" id="customXLSButton"><i class='fa fa-download text-danger'> XLS</i></a></li>
                    <li class="pull-right"><div id="chart-por-pagina2"></div></li>
                    <li class="pull-right"><div id="chart-filtro2"></div></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info" id='divTable2'>
                                    <div class="box-body">

                                        <div class="row" style="overflow:auto">
                                            <table id="tabela2" class="table table-bordered table-striped" summary="Resultado da pesquisa">
                                                <thead>
                                                    <tr>
                                                        <?PHP
                                                            foreach ($colunaDadosParticipantes as $valor) {
                                                                echo "<th scope='col' style='vertical-align:middle'>" . $valor . "</th>";
                                                            }
                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?PHP
                                                    foreach ($Participantes as $valor) {
                                                        echo "<tr>";
                                                        foreach ($colunaDadosParticipantes as $valorColuna) {
                                                            switch ($valorColuna) {
                                                                case 'Nome do Participante':
                                                                    echo "<td scope='col'>".$valor->NomeParticipante."</td>";
                                                                    break;
                                                                case 'CNPJ':
                                                                    echo "<td scope='col'>".$valor->CNPJParticipante."</td>";
                                                                    break;
                                                                case 'Tipo do Participante':
                                                                    echo "<td scope='col'>".$valor->TipoParticipante."</td>";
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
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li><div id="chart-info2"></div></li>
                    <li class="pull-right"><div id="chart-paginacao2"></div></li>
                </ul>
            </div>
        </div>
    </div>


    <!-- TABELA PARA OS VENCEDORES DE CADA ITEM DA LICITAÇÃO -->
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs acessibilidade">
                    <li>VENCEDORES e ITENS</li>
                    <li class="active"><a href="#tab_1" data-toggle="tab" class="text-muted"><i class="fa fa-table text-purple"></i></a></li>
                    <li><a class="mouse-download" id="customCSVButton"><i class='fa fa-download text-success'> CSV</i></a></li>
                    <li><a class="mouse-download" id="customXLSButton"><i class='fa fa-download text-danger'> XLS</i></a></li>
                    <li class="pull-right"><div id="chart-por-pagina3"></div></li>
                    <li class="pull-right"><div id="chart-filtro3"></div></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info" id='divTable3'>
                                    <div class="box-body">

                                        <div class="row" style="overflow:auto">
                                            <table id="tabela3" class="table table-bordered table-striped" summary="Resultado da pesquisa">
                                                <thead>
                                                    <tr>
                                                        <?PHP
                                                            foreach ($colunaDadosVencedorItens as $valor) {
                                                                if ($valor == "Valor Total"){
                                                                    echo "<th scope='col' style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";                            
                                                                }else{
                                                                echo "<th scope='col' style='vertical-align:middle'>" . $valor . "</th>";
                                                                }
                                                            }
                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?PHP
                                                    foreach ($VencedorItens as $valor) {
                                                        echo "<tr>";
                                                        foreach ($colunaDadosVencedorItens as $valorColuna) {
                                                            switch ($valorColuna) {
                                                                case 'Nome do Vencedor':
                                                                    echo "<td scope='col'>".$valor->NomeParticipante."</td>";
                                                                    break;
                                                                case 'Produto/Serviço':
                                                                    // echo "<td scope='col'><a href='#' onclick=ShowLicitacao(". $valor->LicitacaoVencedorItemID . ") data-toggle='modal' data-target='#myModal'>". $valor->NomeProdutoServico . "</td>";
                                                                    echo "<td scope='col'>".$valor->NomeProdutoServico."</td>";
                                                                    break;
                                                                case 'Quantidade':
                                                                    echo "<td scope='col'>".$valor->Quantidade."</td>";
                                                                    break;
                                                                case 'Valor Total':
                                                                    echo "<td scope='col'>".$valor->ValorTotal."</td>";
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
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li><div id="chart-info3"></div></li>
                    <li class="pull-right"><div id="chart-paginacao3"></div></li>
                </ul>
            </div>
        </div>
    </div>

    @yield('AtaDownload')

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
                // função de atualização sempre que interagirmos com ela.
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


                    //Dynatable para segunda tabela
                    var $table2 = $('#tabela2'),
                        $chartFiltro2 = $('#chart-filtro2'),
                        $chartPorPagina2 = $('#chart-por-pagina2'),
                        $chartInfo2 = $('#chart-info2'),
                        $chartPaginacao2 = $('#chart-paginacao2');

                    $table2
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
                            recordCountTarget: $chartInfo2,
                            paginationLinkTarget: $chartPaginacao2,
                            searchTarget: $chartFiltro2,
                            perPageTarget: $chartPorPagina2,

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


                    //Dynatable para terceira tabela
                    var $table3 = $('#tabela3'),
                        $chartFiltro3 = $('#chart-filtro3'),
                        $chartPorPagina3 = $('#chart-por-pagina3'),
                        $chartInfo3 = $('#chart-info3'),
                        $chartPaginacao3 = $('#chart-paginacao3');

                    $table3
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
                            recordCountTarget: $chartInfo3,
                            paginationLinkTarget: $chartPaginacao3,
                            searchTarget: $chartFiltro3,
                            perPageTarget: $chartPorPagina3,

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