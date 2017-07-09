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
                                echo "<td>" . $valor->Alinea . "</td>";
                                break;                                                                                                                                                                                           
                            case 'Subalínea':                                
                                echo "<td><a href='#' onclick=ShowReceita(". $valor->ReceitaID . ") data-toggle='modal' data-target='#myModal'>". $valor->Subalinea ."</a></td>";                                                                
                                break;
                            case 'Data da Arrecadação':
                                echo "<td>" . date("d/m/Y", strtotime($valor->DataArrecadacao)) . "</td>";
                                break;
                            case 'Valor Arrecadado':
                                echo "<td>" . number_format($valor->ValorArrecadado, 2, ',', '.') . "</td>";
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
                                            '<td>' + data[0].DataArrecadacao + '</td>'+                                                        
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
                                            '<td>' + data[0].Especie + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Rubrica:</td>' +
                                            '<td>' + data[0].Rubrica + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Alínea:</td>' +
                                            '<td>' + data[0].Alinea + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Subalínea:</td>' +
                                            '<td>' + data[0].Subalinea + '</td>'+                                                        
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
@stop