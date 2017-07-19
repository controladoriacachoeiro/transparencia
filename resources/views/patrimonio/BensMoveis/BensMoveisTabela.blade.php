@extends('patrimonio.PatrimonioTabela')

@section('htmlheader_title')
    Bens Móveis
@stop

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
                            case 'Órgão':
                                echo "<td><a href='". route('BensOrgao', ['orgao' => $valor->OrgaoLocalizacao]) ."'>". $valor->OrgaoLocalizacao ."</a></td>";
                                break;
                            case 'Tipo':
                                echo "<td><a href='". route('BensOrgaoTipo', ['orgao' => $valor->OrgaoLocalizacao, 'tipo' => str_replace('/', '@', $valor->Tipo)]) ."'>". $valor->Tipo ."</a></td>";
                                break;
                            case 'Patrimônio':                                                                                                                                                                                                                
                                 echo "<td><a href='#' onclick=ShowBemMovel(". $valor->IdentificacaoBem .") data-toggle='modal' data-target='#myModal'>". $valor->IdentificacaoBem ."</a></td>";
                                break;
                            case 'Descrição':                                                                    
                                echo "<td>".$valor->Descricao."</td>";                                                                                                                                        
                                break;                                                                 
                            case 'Valor':      
                                    echo "<td>" . number_format($valor->ValorAquisicao, 2, ',', '.') . "</td>";                                                                                                                                                                                                                                                                            
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
    function ShowBemMovel(patrimonio) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowBemMovel')}}", {Patrimonio: patrimonio}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Dados do Patrimônio Nº: </span> ' + data[0].IdentificacaoBem;
                                                                                                                                                                                    
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
                                            '<td>Número do Patrimonio:</td>' +
                                            '<td>' + data[0].IdentificacaoBem + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Tipo:</td>' +
                                            '<td>' + data[0].Tipo + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Descrição:</td>' +
                                            '<td>' + data[0].Descricao + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Orgão:</td>' +
                                            '<td>' + data[0].OrgaoLocalizacao + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Observação:</td>' +
                                            '<td>' + data[0].Observacao+'</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Valor:</td>' +
                                            '<td>' + currencyFormat(data[0].ValorAquisicao,2)+'</td>'+                                                        
                                            '</tr>' +                                                                                                      
                                        '</tbody>'+
                                    '</table>';
            body = body + '</div>' + '</div>';
            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>

<script>

function currencyFormat (num,c) {
var n = parseFloat(num), 
     c = isNaN(c = Math.abs(c)) ? 2 : c, 
     d = d == undefined ? "," : d, 
     t = t == undefined ? "." : t, 
     s = n < 0 ? "-" : "", 
     i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
     j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
</script>

@endsection

@stop