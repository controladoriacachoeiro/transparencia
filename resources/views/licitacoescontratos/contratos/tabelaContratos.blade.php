@extends('licitacoescontratos.tabelaLiciCon')

@section('htmlheader_title')
    Contratos Vigentes
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {           
                            if ($valor == "Valor Contratado"){
                                echo "<th scope='col' style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }
                            else if ($valor == "Data de Vencimento"){
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
                            case 'Data de Vencimento':
                            echo  "<td>".$valor->DataFinal."</td>";
                                break;
                            case 'Contratado':
                                echo "<td scope='col'><a href='#' onclick=ShowContrato('".  $valor->ContratoID . "') data-toggle='modal' data-target='#myModal'>". $valor->NomeContratado ."</a></td>";
                                break;
                            case 'Contratante':                                                                    
                                echo "<t scope='col'd>".$valor->OrgaoContratante."</td>";                                                                                                                                        
                                break;
                            case 'Objeto':                                                                    
                                echo "<td scope='col'>".$valor->Objeto."</td>";                                                                                                                                        
                                break;                                                                 
                            case 'Valor Contratado':                                                                    
                                echo "<td scope='col'>".$valor->ValorContratado ."</td>";
                                break;  
                            case 'Nº Contrato':
                                echo "<td scope='col'>".$valor->NumeroContrato . "/" . $valor->AnoContrato ."</td>";
                                break;
                            case 'Status':
                                echo "<td scope='col'>". $valor->Status ."</td>";
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
    function ShowContrato(contratoid) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowContrato')}}", {ContratoID: contratoid}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>Contrato: ' + data[0].NumeroContrato + '/' + data[0].AnoContrato + '</span>';            
                                                                                                                                                                                    
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm" style="font-size:'+tamanho+'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS DO CONTRATO</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+                                            
                                            '<tr>'+                                                    
                                            '<td>Número do Contrato:</td>' +
                                            '<td>' + data[0].NumeroContrato + '/' + data[0].AnoContrato + '</td>'+                                                        
                                            '</tr>'+ 
                                            '<tr>'+                                                    
                                            '<td>Nome do Contratado:</td>' +
                                            '<td>' + data[0].NomeContratado + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>CNPJ do Contratado:</td>' +
                                            '<td>' + data[0].CPF_CNPJContratado + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Órgão Contratante:</td>' +
                                            '<td>' + data[0].OrgaoContratante + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                                                                   
                                            '<td>Status:</td>' +
                                            '<td>' + data[0].Status + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                                                                   
                                            '<td>Data da Assinatura:</td>' +
                                            '<td>' + stringToDate(data[0].DataAssinatura) + '</td>'+                                                        
                                            '</tr>' +
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
                                            '<td>Processo Licitatório:</td>';
                                            if((data[0].NumeroLicitacaoOrigem == '')||(data[0].NumeroLicitacaoOrigem == null)){
                                                body = body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data[0].NumeroLicitacaoOrigem) + '</td>'; 
                                            }
                                            body = body + '</tr>' +                                            
                                            '<tr>'+
                                            '<td>Protocolo do Contrato:</td>';
                                            if((data[0].NumeroProcesso == '/')||(data[0].NumeroProcesso == null)){
                                                body = body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data[0].NumeroProcesso + '/' + data[0].AnoProcesso) + '</td>'; 
                                            }
                                            body = body + '</tr>' +                                            
                                            '<tr>' +
                                            '<td>Valor do Contrato:</td>'+
                                            '<td>' +  'R$ ' + currencyFormat(data[0].ValorContratado) +'</td>'+                                             
                                            '</tr>' +
                                        '</tbody>'+
                                    '</table>'+                                       
                                    // '<table class="table table-sm">'+                                            
                                    //         '<tbody>' +                                        
                                    //         '<tr>'+
                                    //         '<th>ANEXOS</th>'+                                            
                                    //         '</tr>';
                                    //         if (downloads == ''){
                                    //             body = body + '<tr><td>Nenhum anexo disponível para download.</td></tr>';
                                    //         }else{
                                    //             body = body + downloads;
                                    //         }                                            
                                    //         body = body + '</tbody>'+
                                    //         '</table>'+                                   
                                    //     '</tbody>'+
                                    // '</table>'+                                                                                                                                                           
                                '</div>' + '</div>';

            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>
<script>
    var ExportButtons = document.getElementById('tabela');
    var instance = new TableExport(ExportButtons, {
        formats: ['xls','csv'],
        exportButtons: false,
        filename:'contrato'
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