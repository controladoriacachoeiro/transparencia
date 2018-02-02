@extends('licitacoescontratos.tabelaProdutosAdquiridos')
@section('htmlheader_title')
    Bens e Produtos Adquiridos
@stop

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection
@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if (($valor == "Valor") || ($valor == "Preço Unidade")){
                                echo "<th scope='col' style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if($valor == "Quantidade"){
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='inteiro'>" . $valor . "</th>";
                            }
                            else if($valor == "Data Aquisição"){
                            echo "<th scope='col' style='vertical-align:middle' data-dynatable-column='dataColumn'>" . $valor . "</th>";
                            }
                            else{
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
                                echo "<td scope='col'><a href='". route('BensAdquiridosOrgao', ['orgao' => $valor->OrgaoAdquirente,'datainicio' =>$datainicio,'datafim' => $datafim]) ."'>". $valor->OrgaoAdquirente ."</a></td>";
                                break;
                            case 'Data Aquisição':
                                echo "<td scope='col'>". $valor->DataAquisicao ."</td>";
                                break;
                            case 'Produto':        
                                if ($nivel==3)
                                {
                                    echo "<td scope='col'><a href='#' onclick=ShowBenAdquirido(". $valor->ProdutoID .") data-toggle='modal' data-target='#myModal'>". $valor->IdentificacaoProduto ."</a></td>";
                                } 
                                else{
                                    $Produto = App\Auxiliar::ajusteUrl($valor->IdentificacaoProduto);                                                                                                                                                                                           
                                    echo "<td scope='col'><a href='". route('BensAdquiridosProduto', ['orgao' => $valor->OrgaoAdquirente,'datainicio' =>$datainicio,'datafim' => $datafim,'produto' =>$Produto] ) ."'>". $valor->IdentificacaoProduto ."</a></td>";
                                }
                                break;  
                            case 'Valor':                                                                                                                                                                                                                
                                 echo "<td scope='col'>".  $valor->ValorTotal ."</td>";
                                break;   
                            case 'Preço Unidade':                                                                                                                                                                                                                
                                 echo "<td scope='col'>".  $valor->PrecoUnitario ."</td>";
                                break;
                            case 'Quantidade':                                                                                                                                                                                                                
                                 echo "<td scope='col'>". $valor->QuantidadeAdquirida."</td>";
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
@parent    
<script>
    function ShowBenAdquirido(produto) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowBensAdquiridos')}}", {BemID: produto}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>Item: </span> ' + data[0].IdentificacaoProduto;
                                                                                                                                                                                    
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
                                            '<td>Orgão:</td>' +
                                            '<td>' + data[0].OrgaoAdquirente + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Fornecedor:</td>' +
                                            '<td>' + data[0].NomeFornecedor + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>CNPJ:</td>' +
                                            '<td>' + FormatCpfCnpj(data[0].CNPJFornecedor) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Data da Aquisição:</td>' +
                                            '<td>' + stringToDate(data[0].DataAquisicao) +'</td>'+                                                        
                                            '</tr>' +
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
<script>
var ExportButtons = document.getElementById('tabela');
var instance = new TableExport(ExportButtons, {
    formats: ['xls','csv'],
    exportButtons: false,
    filename:'produto adquirido'
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
@endsection

@stop