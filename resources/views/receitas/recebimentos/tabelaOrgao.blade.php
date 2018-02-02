@extends('receitas.tabelaReceitas')

@section('htmlheader_title')
    Recebimentos
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Valor Arrecadado"){
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
                foreach ($dadosDb as $valor) {                    
                    echo "<tr>";
                    foreach ($colunaDados as $valorColuna) {
                        switch ($valorColuna) {
                            case 'Órgão':
                                if ($nivel == 1){                                                                
                                    echo "<td scope='col'><a href='". route('MostrarReceitasOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $valor->UnidadeGestora]) ."'>". $valor->UnidadeGestora ."</a></td>";
                                }                                
                                break;                            
                            case 'Categoria Econômica':
                                if ($nivel == 2){
                                    echo "<td scope='col'><a href='". route('MostrarReceitasOrgaoCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $valor->UnidadeGestora, 'categoria' => $valor->CategoriaEconomica]) ."'>". $valor->CategoriaEconomica ."</a></td>";    
                                }
                                else{                                                                     
                                    echo "<td scope='col'>".$valor->CategoriaEconomica."</td>";
                                }
                                break;
                            case 'Espécie':                                
                                echo "<td scope='col'><a href='". route('MostrarReceitasOrgaoCategoriaEspecie', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $valor->UnidadeGestora, 'categoria' => $valor->CategoriaEconomica, 'especie' => App\Auxiliar::ajusteUrl($valor->Especie), 'rubrica' => App\Auxiliar::ajusteUrl($valor->Rubrica)]) ."'>". $valor->Especie ."</a></td>";                                    
                                break;
                            case 'Rubrica':
                                echo "<td scope='col'><a href='". route('MostrarReceitasOrgaoCategoriaEspecie', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $valor->UnidadeGestora, 'categoria' => $valor->CategoriaEconomica, 'especie' => App\Auxiliar::ajusteUrl($valor->Especie), 'rubrica' => App\Auxiliar::ajusteUrl($valor->Rubrica)]) ."'>". $valor->Rubrica ."</a></td>";                                                                   
                                break;
                            case 'Alínea':
                                echo "<td scope='col'><a href='". route('MostrarReceitasOrgaoCategoriaEspRubAliSub', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $valor->UnidadeGestora, 'categoria' => $valor->CategoriaEconomica, 'especie' => App\Auxiliar::ajusteUrl($valor->Especie), 'rubrica' => App\Auxiliar::ajusteUrl($valor->Rubrica), 'alinea' => App\Auxiliar::ajusteUrl($valor->Alinea), 'subalinea' => App\Auxiliar::ajusteUrl($valor->Subalinea)]) ."'>". $valor->Alinea ."</a></td>";                                    
                                break;                                                                                                                                                                                           
                            case 'Subalínea':
                                echo "<td scope='col'><a href='". route('MostrarReceitasOrgaoCategoriaEspRubAliSub', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $valor->UnidadeGestora, 'categoria' => $valor->CategoriaEconomica, 'especie' => App\Auxiliar::ajusteUrl($valor->Especie), 'rubrica' => App\Auxiliar::ajusteUrl($valor->Rubrica), 'alinea' => App\Auxiliar::ajusteUrl($valor->Alinea), 'subalinea' => App\Auxiliar::ajusteUrl($valor->Subalinea)]) ."'>". $valor->Subalinea ."</a></td>";                                
                                break;
                            case 'Data da Arrecadação':
                                echo "<td scope='col'><a href='#' onclick=ShowReceita(". $valor->ReceitaID . ") data-toggle='modal' data-target='#myModal'>". App\Auxiliar::DesajustarDataComBarra($valor->DataArrecadacao) ."</a></td>";                                
                                break;
                            case 'Valor Arrecadado':                                
                                echo "<td scope='col'>" . $valor->ValorArrecadado . "</td>";
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
    //Função para o Model ou PopUP
    function ShowReceita(receitaID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowReceita')}}", {ReceitaID: receitaID}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>RECEITA ARRECADADA</span>';
            
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
                                            '<td>' +$.trim(data[0].Especie) + '</td>'+                                                        
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
                                    '<table class="table table-sm" style="font-size:'+tamanho+'">'+
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
<script>
var ExportButtons = document.getElementById('tabela');
var instance = new TableExport(ExportButtons, {
    formats: ['xls','csv'],
    exportButtons: false,
    filename:'arrecadada orgao'
});
var exportDataXls = instance.getExportData()['tabela']['xls'];
var exportDataCsv = instance.getExportData()['tabela']['csv'];

var XLSbutton = document.getElementById('customXLSButton');
XLSbutton.addEventListener('click', function (e) {
    instance.export2file(exportDataXls.data, exportDataXls.mimeType, exportDataXls.filename, exportDataXls.fileExtension);
});


var XLSbutton = document.getElementById('customCSVButton');
XLSbutton.addEventListener('click', function (e) {
    instance.export2file(exportDataCsv.data, exportDataCsv.mimeType, exportDataCsv.filename, exportDataCsv.fileExtension);
});
</script>
@stop