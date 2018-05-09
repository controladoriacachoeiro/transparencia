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
        
        $.get("{{ route('ShowConvenioCedido')}}", {ConvenioID: convenioID}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Convênio cedido</span>';
                                                                                                                                                                                    
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
                                            '<td>' + data[0].OrgaoConcedente + '</td>'+              
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Nome do Beneficiário:</td>' +
                                            '<td>' + data[0].NomeBeneficiario + '</td>'+                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>CNPJ:</td>' +
                                            '<td>' + FormatCpfCnpj(data[0].CNPJBeneficiario) + '</td>'+              
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Nº do Convênio:</td>' +
                                            '<td>' + data[0].NumeroConvenio + '/' + data[0].AnoConvenio + '</td>'+ 
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Vigência Inicial:</td>' +
                                            '<td>' + stringToDate(data[0].VigenciaInicial) + '</td>'+                                                 
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Vigência Final:</td>' +
                                            '<td>' + stringToDate(data[0].VigenciaFinal) + '</td>'+                                                    
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Objeto:</td>' +
                                            '<td>' + data[0].Objeto + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Data da Assinatura:</td>' +
                                            '<td>' + stringToDate(data[0].DataAssinatura)+ '</td>'+                
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Nº do Processo:</td>' +
                                            '<td>' + data[0].NumeroProcesso + '/' + data[0].AnoProcesso + '</td>'+        
                                            '</tr>'+       
                                            '<tr>'+                                                        
                                            '<td>Status do Convênio:</td>' +
                                            '<td>' + data[0].Status + '</td>'+   
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Categoria do Convênio:</td>' +
                                            '<td>' + data[0].CategoriaConvenio + '</td>'+ 
                                            '</tr>'+                                
                                            '<table class="table table-sm">'+                                            
                                            '<tbody>' +                                        
                                            '<tr>'+
                                            '<th style="padding-right: 200px;">Valor do Convênio:</th>'+
                                            '<th>' +  'R$ ' + currencyFormat(data[0].ValorConvenio) +'</th>'+ 
                                            '</tr>'+
                                            '</tbody>'+
                                            '</table>'+        

                                            '<table class="table table-sm">'+                                            
                                            '<tbody>' +                                        
                                            '<tr>'+
                                            '<th>Valor da Contrapartida:</th>'+
                                            '<th>' +  'R$ ' + currencyFormat(data[0].ValorContrapartida) +'</th>'+ 
                                            '</tr>'+
                                            '</tbody>'+
                                            '</table>'+                                   
                                        '</tbody>'+
                                    '</table>';
                                    if (data[0].IntegraTermoEXT != null){
                                        body = body + '<a href="/convenios/cedidos/download/' + data[0].ConveniosID + '" class="btn btn-info" role="button">Download do Termo de Convênio</a>';    
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