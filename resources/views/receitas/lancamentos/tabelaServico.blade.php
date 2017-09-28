@extends('receitas.tabelaReceitas')

@section('htmlheader_title')
    Receita Lançada
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Valor Lançado"){
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }
                            // }else if($valor == "Data do Lançamento"){
                            //     echo "<th style='vertical-align:middle' data-dynatable-column='dataColumn'>" . $valor . "</th>";
                            // }
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
                            case 'Data do Lançamento':
                                echo "<td><a href='#' onclick=ShowReceitaLancada(". $valor->IssID . ") data-toggle='modal' data-target='#myModal'>". App\Auxiliar::DesajustarDataComBarra($valor->DataNFSe) ."</a></td>";                                                                                                                            
                                break;                            
                            case 'Serviço':
                                if ($nivel == 1){
                                    echo "<td><a href='". route('MostrarLancamentosServico', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => $valor->DescricaoServico]) ."'>". $valor->DescricaoServico ."</a></td>";    
                                }
                                else{                                                                     
                                    echo "<td>". $valor->DescricaoServico ."</td>";
                                }
                                break;
                            case 'Dia':
                                echo "<td><a href='" . route('MostrarLancamentosServicoDia', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => $valor->DescricaoServico, 'dia' => $valor->DataNFSe]) . "'>". App\Auxiliar::DesajustarDataComBarra($valor->DataNFSe) ."</a></td>";
                                break;
                            case 'Categoria Econômica':
                                if ($nivel == 2){
                                    echo "<td><a href='". route('MostrarLancamentosServicoCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => $valor->DescricaoServico, 'categoria' => $valor->CategoriaEconomica]) ."'>". $valor->CategoriaEconomica ."</a></td>";    
                                }
                                else{                                                                     
                                    echo "<td>". $valor->CategoriaEconomica ."</td>";
                                }
                                break;
                            case 'Espécie':
                                if ($nivel == 3){
                                    echo "<td><a href='". route('MostrarLancamentosServicoCategoriaEspecie', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => $valor->DescricaoServico, 'categoria' => $valor->CategoriaEconomica, 'especie' => $valor->Especie]) ."'>". $valor->Especie ."</a></td>";    
                                }
                                break;
                            case 'Rubrica':
                                echo "<td>" . $valor->Rubrica . "</td>";                                
                                break;
                            case 'Alínea':
                                echo "<td>" . $valor->Alinea . "</td>";                                                                
                                break;                                                                                                                                                                                           
                            case 'Subalínea':                                
                                echo "<td><a href='#' onclick=ShowReceitaLancada(". $valor->IssID . ") data-toggle='modal' data-target='#myModal'>". $valor->Subalinea ."</a></td>";                                                                
                                break;                                                                                                                                                                                                                                                                                                       
                            case 'Valor Lançado':                                
                                echo "<td>" . $valor->ValorISS . "</td>";
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
    function ShowReceitaLancada(issID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowReceitaLancada')}}", {IssID: issID}, function(value){
            var data = JSON.parse(value);
            document.getElementById("titulo").innerHTML = '<span>RECEITA LANÇADA</span>';
            
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
                                            '<td>Data do Lançamento:</td>' +
                                            '<td>' + stringToDate(data[0].DataNFSe) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Descrição do Serviço:</td>' +
                                            '<td>' + data[0].DescricaoServico + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Código do Serviço:</td>' +
                                            '<td>' + data[0].CodigoServico + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Valor do Serviço:</td>' +
                                            '<td> R$ ' + currencyFormat(data[0].ValorServico, 2)+ '</td>'+                                                        
                                            '</tr>' +                                            
                                            '<tr>'+                                                        
                                            '<td>Quantidade:</td>' +
                                            '<td>' + data[0].Quantidade + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Desconto:</td>' +
                                            '<td> R$ ' + currencyFormat(data[0].Desconto, 2) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Dedução:</td>' +
                                            '<td> R$ ' + currencyFormat(data[0].Deducao, 2) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Base de Cálculo:</td>' +
                                            '<td> R$ ' + currencyFormat(data[0].BaseCalculo, 2)+ '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Alíquota:</td>' +
                                            '<td>' + data[0].Aliquota + '% </td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Valor da Nota:</td>' +
                                            '<td> R$ ' + currencyFormat(data[0].ValorNota, 2)+ '</td>'+
                                            '</tr>' +                                                                                                                                                                                            
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
                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th>VALOR LANÇADO</th>'+                                            
                                            '<th>' + 'R$ ' + currencyFormat(data[0].ValorISS, 2) + '</th>'+
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
    filename:'receita lançada'
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