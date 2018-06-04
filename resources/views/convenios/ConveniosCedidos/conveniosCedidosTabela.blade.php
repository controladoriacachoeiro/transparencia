@extends('convenios.tabelaConvenios')

@section('htmlheader_title')
    Convênios Concedidos
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {     
                            if ($valor == "Valor do Convênio"){
                                echo "<th scope='col' style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if ($valor == "Data da Assinatura"){
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
                            case 'Beneficiário':
                                echo "<td scope='col'><a href='#' onclick=ShowConvenioCedido(". $valor->ConveniosID . ") data-toggle='modal' data-target='#myModal'>". $valor->NomeBeneficiario ."</a></td>";
                                break;
                            case 'Data da Assinatura':                                                                    
                                echo "<td scope='col'>". $valor->DataAssinatura ."</td>";                                                                                                                                        
                                break;                                                           
                            case 'Valor do Convênio':                                                                    
                                echo "<td scope='col'>". $valor->ValorConvenio ."</td>";
                                break;   
                            case 'Status':                                                                    
                                echo "<td scope='col'>". $valor->Status ."</td>";
                                break;      
                            case 'Nº do Convênio':                                                                    
                                echo "<td scope='col'>". $valor->NumeroConvenio . '/' . $valor->AnoConvenio ."</td>";
                                break;     
                            case 'Categoria':                                                                    
                                echo "<td scope='col'>". $valor->CategoriaConvenio ."</td>";
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
    function ShowConvenioCedido(convenioID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowConvenioCedido')}}", {ConvenioID: convenioID}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>Convênio Concedido: ' + data.NumeroConvenio + '/' + data.AnoConvenio + '</span>';
                                                                                                                                                                                    
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS DO CONVÊNIO</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                    
                                            '<td>Órgão Concedente:</td>' +
                                            '<td>' + data.OrgaoConcedente + '</td>'+              
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Nome do Beneficiário:</td>' +
                                            '<td>' + data.NomeBeneficiario + '</td>'+                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>CNPJ:</td>' +
                                            '<td>' + FormatCpfCnpj(data.CNPJBeneficiario) + '</td>'+              
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Nº do Convênio:</td>' +
                                            '<td>' + data.NumeroConvenio + '/' + data.AnoConvenio + '</td>'+ 
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Vigência Inicial:</td>' +
                                            '<td>' + stringToDate(data.VigenciaInicial) + '</td>'+                                                 
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Vigência Final:</td>' +
                                            '<td>' + stringToDate(data.VigenciaFinal) + '</td>'+                                                    
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Objeto:</td>' +
                                            '<td>' + data.Objeto + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Data da Assinatura:</td>' +
                                            '<td>' + stringToDate(data.DataAssinatura)+ '</td>'+                
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Nº do Processo:</td>' +
                                            '<td>' + data.NumeroProcesso + '/' + data.AnoProcesso + '</td>'+        
                                            '</tr>'+       
                                            '<tr>'+                                                        
                                            '<td>Status do Convênio:</td>' +
                                            '<td>' + data.Status + '</td>'+   
                                            '</tr>'+
                                            '<tr>'+
                                            '<td>Categoria do Convênio:</td>' +
                                            '<td>' + data.CategoriaConvenio + '</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                            '<td>Valor do Convênio:</td>'+
                                            '<td>' +  'R$ ' + currencyFormat(data.ValorConvenio) +'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                            '<td>Valor da Contrapartida:</td>'+
                                            '<td>' +  'R$ ' + currencyFormat(data.ValorContrapartida) +'</td>'+
                                            '</tr>'+
                                            '<table class="table table-sm">'+                                            
                                            '<tbody>' +                                                           
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
    filename:'convenio cedido'
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