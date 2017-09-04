@extends('licitacoescontratos.tabelaLiciCon')

@section('htmlheader_title')
    Contratos Vigentes
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {           
                            if ($valor == "Valor Contratado"){
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }
                            else if ($valor == "Data de Vencimento"){
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
                            case 'Data de Vencimento':
                            echo  "<td>".$valor->DataFinal."</td>";;
                                break;
                            case 'Contratado':
                                echo "<td><a href='#' onclick=ShowContrato('".  $valor->NumeroContrato . "') data-toggle='modal' data-target='#myModal'>". $valor->NomeContratado ."</a></td>";
                                break;
                            case 'Contratante':                                                                    
                                echo "<td>".$valor->OrgaoContratante."</td>";                                                                                                                                        
                                break;
                            case 'Objeto':                                                                    
                                echo "<td>".$valor->Objeto."</td>";                                                                                                                                        
                                break;                                                                 
                            case 'Valor Contratado':                                                                    
                                echo "<td>".$valor->ValorContratado ."</td>";
                                break;  
                            case 'Nº Contrato':
                                echo "<td>".$valor->NumeroContrato ."</td>";
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
    function ShowContrato(numerocontrato) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowContrato')}}", {NumeroContrato: numerocontrato}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Contrato da: </span> ' + data[0].NomeContratado;

            var contratante = '';
            $.each(data, function(i, valor){
                if (i > 0){
                    contratante = contratante + '<br>';
                }
                contratante = contratante + valor.OrgaoContratante;
            });
                                                                                                                                                                                    
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS DO CONTRATO</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                    
                                            '<td>Nome do Contratado:</td>' +
                                            '<td>' + data[0].NomeContratado + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>CNPJ do Contratado:</td>' +
                                            '<td>' + FormatCpfCnpj(data[0].CNPJContratado) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Órgão Contratante:</td>' +
                                            '<td>' + contratante + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Data Inicial do Contrato:</td>' +
                                            '<td>' + stringToDate(data[0].DataInicial) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Data Final do Contrato:</td>' +
                                            '<td>' + stringToDate(data[0].DataFinal) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Objeto do Contrato:</td>' +
                                            '<td>' + data[0].Objeto + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Processo Licitatório:</td>' +
                                            '<td>' + $.trim(data[0].ProcessoLicitatorio) + '</td>'+                                                        
                                            '</tr>' +                                            
                                        '</tbody>'+
                                    '</table>'+
                                    '<table class="table table-sm">'+                                            
                                            '<tbody>' +                                        
                                            '<tr>'+
                                            '<th>Valor do Contrato:</th>'+
                                            '<th>' +  'R$ ' + currencyFormat(data[0].ValorContratado) +'</th>'+ 
                                            '</tr>'+
                                            '</tbody>'+
                                            '</table>'+                                   
                                        '</tbody>'+
                                    '</table>';
                                    if (data[0].IntegraContratoNome != null){
                                        body = body + '<a href="/licitacoescontratos/contratos/Download/' + data[0].ContratoID + '" class="btn btn-info" role="button">Download do Contrato</a>';    
                                    }
                                                
            body = body + '</div>' + '</div>';


            document.getElementById("modal-body").innerHTML = body;

        });
    }
</script>
@stop