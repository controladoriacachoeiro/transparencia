@extends('layouts.app')

@section('htmlheader_title')
    Detalhes do Empenho
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
                <h3 class="box-title acessibilidade">Dados do Empenho {{$dadosDb[0]->NotaEmpenho . '/' . $dadosDb[0]->AnoExercicio}}</h3>
            </div>
            <div class="box-body">
                <div class="row">                    
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Nota de Empenho</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->NotaEmpenho}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Órgão</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->Orgao}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Unidade Gestora</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->UnidadeGestora}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Número do Processo</h4>
                            </div>                            
                            @php
                                use App\Auxiliar as Auxiliar;                                
                            @endphp
                            @if ($dadosDb[0]->NumeroProcesso != '')
                                <p class="acessibilidade"><a target='_blank' href="http://{{Auxiliar::LinkProcesso($dadosDb[0]->NumeroProcesso, $dadosDb[0]->AnoProcesso)}}">{{$dadosDb[0]->NumeroProcesso}}/{{$dadosDb[0]->AnoProcesso}}</a></p>
                            @else
                                <p class="acessibilidade">Não informado</p>
                            @endif                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Ação</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->Acao}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Subtítulo</h4>
                            </div>
                            @if($dadosDb[0]->Subtitulo == '' || $dadosDb[0]->Subtitulo == null)
                                <p class="acessibilidade">Cachoeiro de Itapemirim</p>
                            @else
                                <p class="acessibilidade">{{$dadosDb[0]->Subtitulo}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Elemento da Despesa</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->ElemDespesa}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Programa</h4>
                            </div>                           
                            <p class="acessibilidade">{{$dadosDb[0]->Programa}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Fonte de Recursos</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->FonteRecursos}}</p>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Função</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->Funcao}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Subfunção</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->SubFuncao}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Ano Exercício</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->AnoExercicio}}</p>
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Data do Empenho</h4>
                            </div>                           
                            <p class="acessibilidade">{{date('d/m/Y', strtotime($dadosDb[0]->DataEmpenho))}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Modalidade Licitatória</h4>
                            </div>
                            @if($dadosDb[0]->ModalidadeLicitatoria == '' || $dadosDb[0]->ModalidadeLicitatoria == null)
                                <p class="acessibilidade">Não Aplicável</p>
                            @else
                                <p class="acessibilidade">{{$dadosDb[0]->ModalidadeLicitatoria}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Categoria Econômica</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->CatEconomica}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Modalidade Aplicação</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->ModalidadeAplicacao}}</p>
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Natureza da Despesa</h4>
                            </div>                           
                            <p class="acessibilidade">{{$dadosDb[0]->NaturezaDespesa}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Descrição</h4>
                            </div>
                            <p class="acessibilidade">{{$dadosDb[0]->ProdutoServico}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class='detalheslici'>
                            <div class="detalhestitle">
                                <h4 class="acessibilidade">Valor Empenhado</h4>
                            </div>
                            <p class="acessibilidade" id="valorEmpenhado">{{$dadosDb[0]->ValorEmpenho}}</p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title acessibilidade">Credor</h3>
                </div>
                <div class="box-body">
                    <div class="row">                    
                        <div class="col-md-3">
                            <div class='detalheslici'>
                                <div class="detalhestitle">
                                    <h4 class="acessibilidade">Nome</h4>
                                </div>
                                <p class="acessibilidade">{{$dadosDb[0]->Beneficiario}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class='detalheslici'>
                                <div class="detalhestitle">
                                    <h4 class="acessibilidade">CPF/CNPJ</h4>
                                </div>
                                <p class="acessibilidade" id="cpfCnpj">{{$dadosDb[0]->CPF_CNPJ}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TABELA PARA OS ITENS DO EMPENHO -->
    <div class="row">
        <div class="col-md-12">            
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs acessibilidade">
                    <li><a class="tablelici acessibilidade">ITENS</a></li>
                    <!-- <li><a class="mouse-download" id="customCSVButton"><i class='fa fa-download text-success'> CSV</i></a></li>
                    <li><a class="mouse-download" id="customXLSButton"><i class='fa fa-download text-danger'> XLS</i></a></li> -->
                    <li class="pull-right"><div id="chart-por-pagina"></div></li>
                    <li class="pull-right"><div id="chart-filtro"></div></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-body">
                                    <div class="row" style="overflow:auto">
                                        @if(isset($dadosDb2) && !$dadosDb2->isEmpty())
                                            <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
                                                <thead>
                                                    <tr>
                                                        @foreach($colunaDadosItens as $valorColuna)
                                                            @if($valorColuna == "Valor Unitário")
                                                                <th scope='col' style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>{{ $valorColuna }}</th>
                                                            @else
                                                                <th scope='col' style='vertical-align:middle'>{{ $valorColuna }}</th>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($dadosDb2 as $item)
                                                        <tr>
                                                            @foreach($colunaDadosItens as $valorColuna)
                                                                @switch($valorColuna)
                                                                    @case('Produto/Serviço')
                                                                        <td scope='col'><a href='#' data-toggle='modal' data-target='#myModal{{$item->EmpenhoItemID}}'>{{ $item->NomeProdutoServico }}</td>
                                                                        @break
                                                                    @case('Tipo')
                                                                        <td scope='col'>{{ $item->TipoProdutoServico }}</td>
                                                                        @break
                                                                    @case('Quantidade')
                                                                        <td scope='col'>{{ $item->Quantidade }}</td>
                                                                        @break
                                                                    @case('Valor Unitário')
                                                                        <td scope='col'>{{ $item->ValorUnitario }}</td>
                                                                        @break
                                                                @endswitch
                                                            @endforeach
                                                        </tr>   
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            @foreach($dadosDb2 as $item)
                                                {{-- Modal --}}
                                                <div id='myModal{{$item->EmpenhoItemID}}' class='modal fade' role='dialog'>
                                                    <div class='modal-dialog'>
                                                        {{-- Conteúdo do Modal --}}
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <span style="font-size: 18px" class="acessibilidade">Item do Empenho</span>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <table class="table table-sm" style="font-size:16px">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th colspan="2">DADOS DO ITEM</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Nome do Produto/Serviço:</td>
                                                                                    <td>{{ $item->NomeProdutoServico }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Tipo do Item:</td>
                                                                                    <td>{{ $item->TipoProdutoServico }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Descrição do Produto/Serviço:</td>
                                                                                    <td>{{ $item->DescricaoProdutoServico }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Valor Unitário:</td>
                                                                                    <td id="valorUnitarioItem{{$item->EmpenhoItemID}}">{{ $item->ValorUnitario }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Quantidade:</td>
                                                                                    <td>{{ $item->Quantidade }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Valor Total:</td>
                                                                                    <td id="valorTotalItem{{$item->EmpenhoItemID}}">{{ $item->ValorTotal }}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' class='btn btn-primary' data-dismiss='modal'>Fechar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <h4>Nenhum item encontrado</h4>
                                        @endif
                                    </div>
                                </div>                                
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

    <!-- Conserta o CPF/CNPJ -->
    <script>
         $(document).ready(function () { 
            $('#cpfCnpj').html(FormatCpfCnpj($('#cpfCnpj').html()));
    
            var valorEmpenhado = <?php echo $dadosDb[0]->ValorEmpenho ?>;
            
            $("#valorEmpenhado").html(valorEmpenhado.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}));

            <?php 
                if(isset($dadosDb2)){
            ?>

            var dadosDb2 = <?php echo $dadosDb2 ?>;

            for(var i = 0; i < dadosDb2.length; i++){
                var valorUnitarioItem = dadosDb2[i].ValorUnitario;
                var valorTotalItem = dadosDb2[i].ValorTotal;

                $("#valorUnitarioItem"+ dadosDb2[i].EmpenhoItemID).html(valorUnitarioItem.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}));

                $("#valorTotalItem"+ dadosDb2[i].EmpenhoItemID).html(valorTotalItem.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}));
            }

            <?php 
                }
            ?>
        });
    </script>

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
        });
    </script>

@stop