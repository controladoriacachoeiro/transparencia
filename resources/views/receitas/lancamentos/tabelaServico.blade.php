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
                            if ($valor == "Valor de ISS"){
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if($valor == "Data da NFS-e"){
                                echo "<th style='vertical-align:middle' data-dynatable-column='dataColumn'>" . $valor . "</th>";
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
                            case 'Data da NFS-e':
                                echo "<td>" . $valor->DataNFSe . "</td>";
                                break;
                            case 'Codigo do Serviço':
                                echo "<td>" . $valor->CodigoServico . "</td>";                                
                                break;
                            case 'Serviço':
                                echo "<td><a href='#' onclick=ShowReceita(". $valor->IssID . ") data-toggle='modal' data-target='#myModal'>". $valor->DescricaoServico ."</a></td>";                                                                
                                break;
                            case 'Aliquota':                                
                                echo "<td>". $valor->Aliquota ."</td>";                                                                
                                break;                                                       
                            case 'Categoria Econômica':
                                if ($nivel == 2){
                                    echo "<td><a href='". route('MostrarReceitasOrgaoCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $valor->UnidadeGestora, 'categoria' => $valor->CategoriaEconomica]) ."'>". $valor->CategoriaEconomica ."</a></td>";    
                                }
                                else{                                                                     
                                    echo "<td>".$valor->CategoriaEconomica."</td>";
                                }
                                break;                                                                                                                                                                                                                                                                                                       
                            case 'Valor do ISS':                                
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
    function ShowReceita(receitaID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowReceita')}}", {ReceitaID: receitaID}, function(value){
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