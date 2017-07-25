@extends('pessoal.tabelaPessoal')

@section('htmlheader_title')
    Folha de Pagamento
@stop

@section('tabela_titulo')
    {{$dadosDb[0]->Nome}}
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
                            case 'Nome':
                                echo "<td><a href='#' onclick=ShowPagamento(". $valor->Matricula . ',' . $valor->MesPagamento. ',' . $valor->AnoPagamento .") data-toggle='modal' data-target='#myModal'>". $valor->Nome ."</a></td>";                                    
                                break;                            
                            case 'Matrícula':                                                                    
                                echo "<td>".$valor->Matricula."</td>";                                                                                                                                        
                                break;                                                                                                                                                                                           
                            case 'Mês':                                
                                echo "<td><a href='#' onclick=ShowPagamento(". $valor->Matricula . ',' . $valor->MesPagamento. ',' . $valor->AnoPagamento .") data-toggle='modal' data-target='#myModal'>". $valor->MesPagamento ."</a></td>";
                                break;
                            case 'Ano':
                                echo "<td><a href='#' onclick=ShowPagamento(". $valor->Matricula . ',' . $valor->MesPagamento. ',' . $valor->AnoPagamento .") data-toggle='modal' data-target='#myModal'>". $valor->AnoPagamento ."</a></td>";
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
    function ShowPagamento(matricula, mes, ano) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowPagamento')}}", {Matricula: matricula, Mes: mes, Ano: ano}, function(value){
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
                            '<td>' + currencyFormat(valor.Valor) + '</td>'+
                            '</tr>';
                }else if (valor.TipoEvento == "Débito"){
                    liquido = liquido + valor.Valor;
                    debitos = debitos + '<tr>'+                                                                                      
                            '<td>' + valor.DescricaoEvento + '</td>'+                                                                                    
                            '<td>' + currencyFormat(valor.Valor) + '</td>'+
                            '</tr>';
                }else if (valor.TipoEvento == "Neutro"){
                    existeNeutro = true;
                    neutros = neutros + '<tr>'+                                                                                      
                            '<td>' + valor.DescricaoEvento + '</td>'+                                                        
                            '<td>' + currencyFormat(valor.Valor) + '</td>'+
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
                                            '<td>' + FormatCpfCnpj(data[0].CPF) + '</td>'+                                                        
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
                                            '<th>' + 'R$ ' + currencyFormat(add) +'</th>'+                                            
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>' +                                        
                                        '<tr>'+
                                        '<th>SALÁRIO LÍQUIDO</th>'+
                                        '<th>' +  'R$ ' + currencyFormat(liquido) +'</th>'+ 
                                        '</tr>'; 


            body = body + '</tbody>'+'</table>';
            body = body + '</div>' + '</div>';


            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>
@stop