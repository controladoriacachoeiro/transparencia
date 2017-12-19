@extends('convenios.tabelaConvenios')

@section('htmlheader_title')
    Convênios Recebidos
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {                            
                            if ($valor == "Valor"){
                                echo "<th scope='col' style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if ($valor == "Data da Celebração"){
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
                            case 'Objeto':
                                echo "<td scope='col'><a href='#' onclick=ShowConvenioRecebido(". $valor->ConveniosID . ") data-toggle='modal' data-target='#myModal'>". $valor->Objeto."</a></td>";
                                break;
                            case 'Data da Celebração':                                                                    
                                echo "<td scope='col'>". $valor->DataCelebracao ."</td>";                                                                                                                                        
                                break;                                                           
                            case 'Valor':                                                                    
                                    echo "<td scope='col'>". $valor->ValorAReceber ."</td>";
                                break;
                            case 'Concedente':                                                                    
                                    echo "<td scope='col'>". $valor->Concedente ."</td>";
                                break;
                            case 'Tipo':                                                                    
                                    echo "<td scope='col'>". $valor->Tipo ."</td>";
                                break;
                            case 'Número do Convênio':                                                                    
                                    echo "<td scope='col'>". $valor->NumeroConvenio ."</td>";
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
    function ShowConvenioRecebido(convenioID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowConvenioRecebido')}}", {ConvenioID: convenioID}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Convênio Recebido</span>';
                                                                                                                                                                                    
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
                                            '<td>Concedente:</td>' +
                                            '<td>' + $.trim(data[0].Concedente) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Número do Convênio:</td>' +
                                            '<td>' + data[0].NumeroConvenio + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Convênio Original:</td>' +
                                            '<td>' + $.trim(data[0].ConvenioAditivo) + '</td>'+                                            
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Tipo:</td>' +
                                            '<td>' + $.trim(data[0].Tipo) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                            
                                            '<tr>'+
                                            '<tr>'+                                                    
                                            '<td>Objeto:</td>' +
                                            '<td>' + data[0].Objeto + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Data da Celebração:</td>' +
                                            '<td>' + stringToDate(data[0].DataCelebracao) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Prazo Vigência:</td>' +
                                            '<td>' + stringToDate(data[0].PrazoVigencia) + '</td>'+                                                        
                                            '</tr>'+

                                            '<table class="table table-sm">'+                                            
                                            '<tbody>' +                                        
                                            '<tr>'+
                                            '<th style="padding-right: 60px;">Valor:</th>'+
                                            '<th>' +  'R$ ' + $.trim(currencyFormat(data[0].ValorAReceber)) +'</th>'+ 
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
                                    if(data[0].IntegraTermoNome != null){
                                        body = body + '<a href="/convenios/recebidos/download/' + data[0].ConveniosID + '" class="btn btn-info" role="button">Download do Edital</a>';
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
    filename:'convenio recebido'
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