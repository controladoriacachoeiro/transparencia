@extends('patrimonio.PatrimonioTabela')
@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection
@section('contentTabela')
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
                            case 'Orgão':
                                echo "<td><a href='". route('BensAdquiridosOrgao', ['orgao' => $valor->OrgaoAdquirente]) ."'>". $valor->OrgaoAdquirente ."</a></td>";
                                break;
                            case 'Produto':                                                                                                                                                                                                    
                                echo "<td><a href='#' onclick=ShowBenAdquirido(". $valor->ProdutoID .") data-toggle='modal' data-target='#myModal'>". $valor->IdentificacaoProduto ."</a></td>";
                                break;  
                            case 'Valor':                                                                                                                                                                                                                
                                 echo "<td>".  number_format($valor->ValorTotal, 2, ',', '.') ."</td>";
                                break;   
                            case 'Valor Unidade':                                                                                                                                                                                                                
                                 echo "<td>".  number_format($valor->PrecoUnitario, 2, ',', '.') ."</td>";
                                break;
                            case 'Quantidade':                                                                                                                                                                                                                
                                 echo "<td>". $valor->QuantidadeAdquirida."</td>";
                                break;                                                                                                                                                                                                                                              
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

@section('scriptsadd')
    <!-- Opções de configuração para tabelas e gráficos -->
    <script src="{{ asset('/js/options.js') }}"></script>
    <!-- DataTables -->
    <!-- Chart -->
        <!--paginação-->
        <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
        <!--grafico-->    
        <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
        <!--tabela-->
        <script src="{{ asset('/js/highcharts.js') }}"></script>
        <!--<script src="https://code.highcharts.com/highcharts.js"></script>-->
    <!-- fim Chart //-->

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
    function ShowBenAdquirido(produto) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowBensAdquiridos')}}", {BemID: produto}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Item: </span> ' + data[0].IdentificacaoProduto;
                                                                                                                                                                                    
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                    
                                            '<td>Orgão:</td>' +
                                            '<td>' + data[0].OrgaoAdquirente + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Fornecedor:</td>' +
                                            '<td>' + data[0].NomeFornecedor + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>CNPJ:</td>' +
                                            '<td>' + data[0].OrgaoLocalizacao + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Preço Unidade:</td>' +
                                            '<td>' +'R$ ' + currencyFormat(data[0].PrecoUnitario)+'</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Unidade de Medida:</td>' +
                                            '<td>' + data[0].UnidadeMedida+'</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Quantidade:</td>' +
                                            '<td>' + data[0].QuantidadeAdquirida+'</td>'+                                                        
                                            '</tr>' +
                                            '<table class="table table-sm">'+
                                            '<thead>'+
                                            '<tbody>' +                                        
                                            '<tr>'+
                                            '<th>Valor Total:</th>'+
                                            '<th>' +  'R$ ' + currencyFormat(calcularTotal(data[0].PrecoUnitario, data[0].QuantidadeAdquirida), 2)+'</th>'+ 
                                            '</tr>'+
                                            '</tbody>'+
                                            '</table>'+                                                                                                      
                                        '</tbody>'+
                                    '</table>';
            body = body + '</div>' + '</div>';
            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>

<script>
function calcularTotal(num1,num2)
{
    var total=num1*num2;
    return(total);
}
</script>

@endsection

@stop