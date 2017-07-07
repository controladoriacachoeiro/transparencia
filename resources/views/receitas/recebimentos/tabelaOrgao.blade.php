@extends('pessoal.tabelaPessoal')

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
                            case 'Órgão':
                                if ($nivel == 1){                                                                
                                    echo "<td><a href='". route('MostrarReceitasOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $valor->UnidadeGestora]) ."'>". $valor->UnidadeGestora ."</a></td>";
                                }
                                // else{
                                //     echo "<td><a href='#' onclick=ShowReceita(". $valor->ReceitaID . ") data-toggle='modal' data-target='#myModal'>". $valor->UnidadeGestora ."</a></td>";
                                // }
                                break;                            
                            case 'Categoria':
                                if ($nivel == 2){
                                    echo "<td><a href='". route('MostrarReceitasOrgaoCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => $valor->UnidadeGestora, 'categoria' => $valor->CategoriaEconomica]) ."'>". $valor->CategoriaEconomica ."</a></td>";    
                                }
                                else{                                                                     
                                    echo "<td>".$valor->CategoriaEconomica."</td>";
                                }
                                break;                                                                                                                                                                                           
                            case 'Subalínea':
                                echo "<td>" . $valor->Subalinea . "</td>";
                                break;
                            case 'Data da Arrecadação':
                                echo "<td>" . $valor->DataArrecadacao . "</td>";
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
    function ShowReceita(receitaID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowReceita')}}", {ReceitaID: receitaID}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Folha de Pagamento de: </span> ' + data[0].Nome;

            var creditos = '';
            var debitos = '';
            var neutros = '';
            var add = 0;
            var liquido = 0;
            var ExisteNeutro = false;                        
            $.each(data, function(i, valor){
                if (valor.TipoEvento == "Crédito"){
                    add = add + valor.Valor;
                    creditos = creditos + '<tr>'+                                                                                      
                            '<td>' + valor.DescricaoEvento + '</td>'+                                                        
                            '<td>' + valor.Valor + '</td>'+
                            '</tr>';
                }else if (valor.TipoEvento == "Débito"){
                    liquido = liquido + valor.Valor;
                    debitos = debitos + '<tr>'+                                                                                      
                            '<td>' + valor.DescricaoEvento + '</td>'+                                                                                    
                            '<td>' + valor.Valor + '</td>'+
                            '</tr>';
                }else if (valor.TipoEvento == "Neutro"){
                    existeNeutro = true;
                    neutros = neutros + '<tr>'+                                                                                      
                            '<td>' + valor.DescricaoEvento + '</td>'+                                                        
                            '<td>' + valor.Valor + '</td>'+
                            '</tr>';
                }                                            
            });
            if (ExisteNeutro){
                var aux = neutro;
                neutros = '<tr>'+
                          '<th colspan="2">NEUTROS</th>'+                                            
                          '</tr>'+
                          aux;
            }
            liquido = add - liquido;

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
                                            '<td>Nome do Servidor:</td>' +
                                            '<td>' + data[0].Nome + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Matrícula:</td>' +
                                            '<td>' + data[0].Matricula + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>CPF:</td>' +
                                            '<td>' + data[0].CPF + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Data do Pagamento:</td>' +
                                            '<td>' + data[0].MesPagamento + '/' + data[0].AnoPagamento + '</td>'+                                                        
                                            '</tr>' +                                                                                                      
                                        '</tbody>'+
                                    '</table>'+

                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">CRÉDITOS</th>'+                                            
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>' +
                                        creditos +
                                        '<tr>'+
                                        '<th colspan="2">DÉBITOS</th>'+
                                        '</tr>'+
                                        debitos +
                                        neutros;                                        
                                                                                                                                                                                                                                               
            body = body + '</tbody>'+'</table>';

            body = body + '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th>SALÁRIO BRUTO</th>'+
                                            '<th>' + add +'</th>'+                                            
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>' +                                        
                                        '<tr>'+
                                        '<th>SALÁRIO LÍQUIDO</th>'+
                                        '<th>' +  liquido +'</th>'+ 
                                        '</tr>'; 


            body = body + '</tbody>'+'</table>';
            body = body + '</div>' + '</div>';


            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>
@stop