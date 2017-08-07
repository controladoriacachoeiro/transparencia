@extends('licitacoescontratos.tabelaLiciCon')

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
                            if (($valor == "Valor") || ($valor == "Valor Unidade")){
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if($valor == "Quantidade"){
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='inteiro'>" . $valor . "</th>";
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
                            case 'Orgão':
                                echo "<td><a href='". route('BensAdquiridosOrgao', ['orgao' => $valor->OrgaoAdquirente]) ."'>". $valor->OrgaoAdquirente ."</a></td>";
                                break;
                            case 'Produto':                                                                                                                                                                                                    
                                echo "<td><a href='#' onclick=ShowBenAdquirido(". $valor->ProdutoID .") data-toggle='modal' data-target='#myModal'>". $valor->IdentificacaoProduto ."</a></td>";
                                break;  
                            case 'Valor':                                                                                                                                                                                                                
                                 echo "<td>".  $valor->ValorTotal ."</td>";
                                break;   
                            case 'Valor Unidade':                                                                                                                                                                                                                
                                 echo "<td>".  $valor->PrecoUnitario ."</td>";
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
@parent    
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
                                            '<td>' + data[0].CNPJFornecedor + '</td>'+                                                        
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