@extends('tabela')

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
                            case 'Nome':
                                    echo "<td><a href='#' onclick=ShowPagamento(". $valor->Matricula . ',' . $valor->MesPagamento. ',' . $valor->AnoPagamento .") data-toggle='modal' data-target='#myModal'>". $valor->Nome ."</a></td>";                                    
                                    // echo "<td><a href='". route('ShowPagamento', ['matricula' => $valor->Matricula, 'mes' => $valor->MesPagamento, 'ano' => $valor->AnoPagamento]) ."'>". $valor->Nome ."</a></td>";
                                break;                            
                            case 'Matrícula':                                                                    
                                echo "<td>".$valor->Matricula."</td>";                                                                                                                                        
                                break;                                                                                                                                                                                           
                            case 'Mês':
                                echo "<td>" . $valor->MesPagamento . "</td>";
                                break;
                            case 'Ano':
                                echo "<td>" . $valor->AnoPagamento . "</td>";
                                break;
                            // case 'Nota de Liquidação':
                            //     $numNota = '"' . $valor->NotaLiquidacao.'"';
                            //     $anoExercicio = '"' . $valor->AnoExercicio .'"';
                            //     echo "<td><a href='#' onclick=notaShow(". $numNota . ',' . $anoExercicio .") data-toggle='modal' data-target='#myModal'>". $valor->NotaLiquidacao ."</a></td>";
                            //     break;
                            // case 'Data de Liquidação':
                            //     echo "<td>" . date("d-m-Y", strtotime($valor->DataLiquidacao )) . "</td>";
                            //     break;
                            // case 'Valor Liquidação':
                            //     echo "<td>" . number_format($valor->ValorLiquidado, 2, ',', '.') . "</td>";
                            //     //echo "<td>" . $valor->ValorLiquidado . "</td>";
                            //     break;
                            
                            // case 'Data do Pagamento':
                            //     echo "<td>" . date("d-m-Y", strtotime($valor->DataPagamento )) . "</td>";
                            //     break;                                                                
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
@stop

<script>
    function ShowPagamento(matricula, mes, ano) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowPagamento')}}", {Matricula: matricula, Mes: mes, Ano: ano}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Folha de Pagamento de: </span> ' + data[0].Nome;
                                                                                                                                                                                    
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
                                            '<th>Código</th>'+
                                            '<th>Descrição</th>'+
                                            '<th>Tipo</th>'+
                                            '<th>Valor</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>';

            $.each(data, function(i, valor){
                body = body + '<tr>'+                                                        
                              '<td>' + valor.CodigoEvento+'</td>' +
                              '<td>' + valor.DescricaoEvento + '</td>'+                                                        
                              '<td>' + valor.TipoEvento + '</td>'+
                              '<td>' + valor.Valor + '</td>'+
                              '</tr>';
            });                                                                                                               
                                        

            body = body + '</tbody>'+'</table>';
            body = body + '</div>' + '</div>';


            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>