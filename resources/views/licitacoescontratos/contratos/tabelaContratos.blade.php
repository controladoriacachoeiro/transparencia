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
            document.getElementById("titulo").innerHTML = '<span>Contrato</span> ';            

            var contratante = '';
            var downloads = '';
            var arrayContratante = new Array();
            var arrayContratoDownload = new Array();
            var aux = false;
            var cont = 0;
            $.each(data, function(i, valor){
                aux = false;
                $.each(arrayContratante, function(k, valor2){
                    if(valor.OrgaoContratante == valor2){
                        aux = true;                        
                    }
                });
                if(aux == false){
                    if (i > 0){
                        contratante = contratante + '<br>';
                    }
                    contratante = contratante + valor.OrgaoContratante;
                    arrayContratante.push(valor.OrgaoContratante);                   
                }
            });

            $.each(data, function(i, valor){
                aux = false;
                if (valor.IntegraContratoNome == null){
                    aux = true;
                }else{
                    $.each(arrayContratoDownload, function(k, valor2){
                        var concatenado = valor.IntegraContratoNome + '.' + valor.IntegraContratoEXT;
                        if(concatenado == valor2){
                            aux = true;
                        }
                    });
                }
                
                if(aux == false){
                    // if (cont > 0){
                    //     downloads = downloads + '<br>';
                    // }                    
                    cont++;
                    downloads = downloads + '<tr><td><a href="/licitacoescontratos/contratos/Download/' + valor.ContratoID + '" class="" role="button">' + valor.IntegraContratoNome + '.' +  valor.IntegraContratoEXT+'</a></td></tr>';
                    arrayContratoDownload.push(valor.IntegraContratoNome + '.' + valor.IntegraContratoEXT);
                }
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
                                            '<td>Número do Contrato:</td>' +
                                            '<td>' + data[0].NumeroContrato + '</td>'+                                                        
                                            '</tr>'+ 
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
                                            '<td>Processo Licitatório:</td>';
                                            if((data[0].ProcessoLicitatorio == '')||(data[0].ProcessoLicitatorio == null)){
                                                body = body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data[0].ProcessoLicitatorio) + '</td>'; 
                                            }
                                            body = body + '</tr>' +
                                            '<tr>'+
                                            '<td>Edital da Licitação:</td>';
                                            if((data[0].Edital == '/')||(data[0].Edital == null)){
                                                body = body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data[0].Edital) + '</td>'; 
                                            }
                                            body = body + '</tr>' +
                                            '<tr>'+
                                            '<td>Protocolo do Contrato:</td>';
                                            if((data[0].Protocolo == '/')||(data[0].Protocolo == null)){
                                                body = body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data[0].Protocolo) + '</td>'; 
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
                                        //         '<th>Valor do Contrato:</th>'+
                                        //         '<th>' +  'R$ ' + currencyFormat(data[0].ValorContratado) +'</th>'+ 
                                        //         '</tr>'+
                                        //         '</tbody>'+
                                        //         '</table>'+                                   
                                        //     '</tbody>'+
                                        // '</table>'+
                                    // if (data[0].IntegraContratoNome != null){
                                    //     body = body + '<a href="/licitacoescontratos/contratos/Download/' + data[0].ContratoID + '" class="btn btn-info" role="button">Download do Contrato</a>';
                                    // }
                                    '<table class="table table-sm">'+                                            
                                            '<tbody>' +                                        
                                            '<tr>'+
                                            '<th>ANEXOS</th>'+                                            
                                            '</tr>';
                                            if (downloads == ''){
                                                body = body + '<p>Nenhum anexo disponível para download.</p>';
                                            }else{
                                                body = body + downloads;
                                            }                                            
                                            body = body + '</tbody>'+
                                            '</table>'+                                   
                                        '</tbody>'+
                                    '</table>'+                                                                                                                                                           
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