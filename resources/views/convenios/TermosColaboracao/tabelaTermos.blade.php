@extends('convenios.tabelaConvenios')

@section('htmlheader_title')
    Termos de Colaboração
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {           
                            if ($valor == "Valor"){
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }
                            else if ($valor == "Data da Assinatura"){
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
                            case 'Prazo':
                                echo  "<td>". $valor->Prazo ."</td>";
                                break;
                            case 'Beneficiário':                                                                    
                                echo "<td><a href='#' onclick=ShowTermo('".  $valor->TermoID . "') data-toggle='modal' data-target='#myModal'>". $valor->NomeBeneficiario ."</a></td>";                                                                                                                                      
                                break;
                            case 'Data da Assinatura':
                                echo "<td>". $valor->DataAssinatura ."</td>";
                                break;
                            case 'Ano':                                                                    
                                echo "<td>".$valor->Ano."</td>";                                                                                                                                        
                                break;                                                                 
                            case 'Valor':                                                                    
                                echo "<td>".$valor->Valor ."</td>";
                                break;  
                            case 'Nº do Termo':
                                echo "<td>".$valor->NumeroTermo . "/" . $valor->Ano ."</td>";
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
    function ShowTermo(termoid) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowTermo')}}", {TermoID: termoid}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Termo de Colaboração</span> ';            

            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm" style="font-size:'+ tamanho +'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS DO TERMO</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                    
                                            '<td>Número do Termo:</td>' +
                                            '<td>' + data[0].NumeroTermo + '</td>'+                                                        
                                            '</tr>'+                                             
                                            '<tr>'+                                                    
                                            '<td>Ano do Termo:</td>' +
                                            '<td>' + data[0].Ano + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Órgão Concedente:</td>' +
                                            '<td>' + data[0].OrgaoConcedente + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Objeto:</td>' +
                                            '<td>' + data[0].Objeto + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Data da Assinatura:</td>' +
                                            '<td>' + data[0].DataAssinatura + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Prazo:</td>' +
                                            '<td>' + data[0].Prazo + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                                                                   
                                            '<td>Data da Publicação:</td>' +
                                            '<td>' + stringToDate(data[0].DataPublicacao) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                                                                   
                                            '<td>Fiscal:</td>' +
                                            '<td>' + data[0].Fiscal + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                                                                   
                                            '<td>Número do Protocolo:</td>' +
                                            '<td>' + data[0].Protocolo + '</td>'+                                                        
                                            '</tr>' +                                                                                        
                                        '</tbody>' +
                                        '</table>' +
                                        '<table class="table table-sm" style="font-size:'+ tamanho +'">' +
                                        '<thead>'+
                                            '<tr>'+
                                            '<th>VALOR:</th>'+
                                            '<th>' + 'R$ '+currencyFormat(data[0].Valor) + '</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '</table>';
                                        if (($.trim(data[0].IntegraTermoEXT) != '') && (data[0].IntegraTermoEXT != null)){
                                            body = body + '<a target=_blank href="/convenios/termocolaboracao/Download/' + data[0].IntegraTermoNome + '.' + data[0].IntegraTermoEXT + '" class="btn btn-info" role="button">Download do Termo</a>';
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
        filename:'termocolaboracao'
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