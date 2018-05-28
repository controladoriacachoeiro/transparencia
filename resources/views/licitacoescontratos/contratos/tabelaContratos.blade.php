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
                            else if ($valor == "Data da Assinatura"){
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
                            case 'Data da Assinatura':
                                echo  "<td>".$valor->DataAssinatura."</td>";
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
            document.getElementById("titulo").innerHTML = '<span>Contrato: ' + data.NumeroContrato + '/' + data.AnoContrato + '</span>';            
                                                                                                                                                                                    
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
                                            '<td>' + data.NumeroContrato + '/' + data.AnoContrato + '</td>'+                                                        
                                            '</tr>'+ 
                                            '<tr>'+                                                    
                                            '<td>Nome do Contratado:</td>' +
                                            '<td>' + data.NomeContratado + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>CNPJ do Contratado:</td>' +
                                            '<td>' + data.CPF_CNPJContratado + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Órgão Contratante:</td>' +
                                            '<td>' + data.OrgaoContratante + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                                                                   
                                            '<td>Status:</td>' +
                                            '<td>' + data.Status + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                                                                   
                                            '<td>Data da Assinatura:</td>' +
                                            '<td>' + stringToDate(data.DataAssinatura) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                                                                   
                                            '<td>Data Inicial do Contrato:</td>' +
                                            '<td>' + stringToDate(data.DataInicial) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Data Final do Contrato:</td>' +
                                            '<td>' + stringToDate(data.DataFinal) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Objeto do Contrato:</td>' +
                                            '<td>' + data.Objeto + '</td>'+
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Processo Licitatório:</td>';
                                            if((data.NumeroLicitacaoOrigem == '')||(data.NumeroLicitacaoOrigem == null)){
                                                body = body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data.NumeroLicitacaoOrigem + '/' + data.AnoLicitacaoOrigem) + '</td>';
                                            }
                                            body = body + '</tr>' +
                                            '<tr>'+
                                            '<td>Modalidade Licitatório:</td>';
                                            if((data.ModalidadeLicitatoria == '')||(data.ModalidadeLicitatoria == null)){
                                                body = body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data.ModalidadeLicitatoria) + '</td>';
                                            }
                                            body = body + '</tr>' +
                                            '<tr>'+
                                            '<td>Protocolo do Contrato:</td>';
                                            if((data.NumeroProcesso == '000000') || (data.NumeroProcesso == '/')||(data.NumeroProcesso == null)){
                                                body = body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data.NumeroProcesso + '/' + data.AnoProcesso) + '</td>';
                                            }
                                            body = body + '</tr>' +
                                            '<tr>' +
                                            '<td>Valor do Contrato:</td>'+
                                            '<td>' +  'R$ ' + currencyFormat(data.ValorContratado) +'</td>'+
                                            '</tr>' +
                                        '</tbody>'+
                                    '</table>';
                                    if(data.Arquivos.length > 0){
                                        body = body + '<table class="table table-sm" style="font-size:'+ tamanho +'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">ANEXOS</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>';
                                        $.each(data.Arquivos, function (key, arquivo) {
                                            body = body + '<tr><td><a target="_blank" href="/arquivosintegra/exibirarquivo/' + arquivo.ArquivoID + '" >' + arquivo.DescricaoArquivo + '</a></td></tr>';
                                        });
                                        body = body + '</tbody> </table>';
                                    }
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