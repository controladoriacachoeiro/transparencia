@extends('receitas.tabelaReceitas')

@section('htmlheader_title')
    Recebimentos
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Valor Arrecadado"){
                                echo "<th style='vertical-align:middle' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }
                            else{
                                echo "<th style='vertical-align:middle'>" . $valor . "</th>";
                            }
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
                            case 'Categoria Econômica':                                
                                    echo "<td><a href='". route('MostrarReceitasCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'categoria' => $valor->CategoriaEconomica]) ."'>". $valor->CategoriaEconomica ."</a></td>";                                    
                                break;
                            case 'Espécie':
                                    echo "<td><a href='". route('MostrarReceitasCategoriaEspecie', ['dataini' => $dataini, 'datafim' => $datafim, 'categoria' => $valor->CategoriaEconomica, 'especie' => $valor->Especie]) ."'>". $valor->Especie ."</a></td>";
                                break;
                            case 'Rubrica':
                                echo "<td>" . $valor->Rubrica . "</td>";                                
                                break;
                            case 'Alínea':
                                echo "<td><a href='#' onclick=ShowReceita(". $valor->ReceitaID . ") data-toggle='modal' data-target='#myModal'>". $valor->Alinea ."</a></td>";                                                                
                                break;                                                                                                                                                                                           
                            case 'Subalínea':                                
                                echo "<td><a href='#' onclick=ShowReceita(". $valor->ReceitaID . ") data-toggle='modal' data-target='#myModal'>". $valor->Subalinea ."</a></td>";                                                                
                                break;
                            case 'Data da Arrecadação':
                                echo "<td>" . date("d/m/Y", strtotime($valor->DataArrecadacao)) . "</td>";
                                break;
                            case 'Valor Arrecadado':
                                echo "<td>" . $valor->ValorArrecadado . "</td>";
                                break;                                                                                           
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
@stop

@section('scriptsadd')
@parent
<script>
    // Anexe dynatable à nossa tabela e ative nossa
    // função de atualização sempre que interagimos com ela.
    $('#tabela')
        .dynatable({
            //definir e configurar a coluna para a ordenaçao
            readers: {
                'valormoeda': function(el, record) {        
                    return parseFloat(el.innerHTML)
                }
            },
            //definir e configurar a exibição da coluna após a configuração para ordenação
            writers: {
                'valormoeda': function(record) {
                    return record['valormoeda'] ? currencyFormat(record['valormoeda'], 2) : ' ';
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



    //Função para o Model ou PopUP
    function ShowReceita(receitaID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowReceita')}}", {ReceitaID: receitaID}, function(value){
            var data = JSON.parse(value);
            document.getElementById("titulo").innerHTML = '<span>RECEITA ARRECADADA</span>';
            
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
                                            '<td>Data da Arrecadação:</td>' +
                                            '<td>' + stringToDate(data[0].DataArrecadacao) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Unidade Gestora:</td>' +
                                            '<td>' + data[0].UnidadeGestora + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Ano do Exercício:</td>' +
                                            '<td>' + data[0].AnoExercicio + '</td>'+                                                        
                                            '</tr>'+                                            
                                            '<tr>'+                                                        
                                            '<td>Categoria Econômica:</td>' +
                                            '<td>' + data[0].CategoriaEconomica + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Origem:</td>' +
                                            '<td>' + data[0].Origem + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Espécie:</td>' +
                                            '<td>' + $.trim(data[0].Especie) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Rubrica:</td>' +
                                            '<td>' + $.trim(data[0].Rubrica) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Alínea:</td>' +
                                            '<td>' + $.trim(data[0].Alinea) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Subalínea:</td>' +
                                            '<td>' + $.trim(data[0].Subalinea) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                                                                                                                                                                         
                                        '</tbody>'+
                                    '</table>'+
                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th>VALOR ARRECADADO</th>'+                                            
                                            '<th>' + 'R$ ' + currencyFormat(data[0].ValorArrecadado, 2) + '</th>'+
                                            '</tr>'+
                                        '</thead>'+                                        
                                    '</table>';
            
            body = body + '</div>' + '</div>';

            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>
@stop