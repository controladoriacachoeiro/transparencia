@extends('licitacoescontratos.tabelaLiciCon')

@section('htmlheader_title')
    Licitações Conlcuídas
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {                            
                            if($valor == "Data da Proposta"){
                                echo "<th style='vertical-align:middle' data-dynatable-column='dataColumn'>" . $valor . "</th>";                            
                            }else{
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
                            case 'Órgão':
                                echo "<td>".$valor->OrgaoLicitante."</td>";
                                break;
                            case 'Número do Processo':
                                echo "<td>" . $valor->NumeroProcesso ."</a></td>";                                                                                                                                       
                                break;
                            case 'Objeto Licitado':                                                                    
                                echo "<td><a href='#' onclick=ShowLicitacao(". $valor->LicitacaoID . ") data-toggle='modal' data-target='#myModal'>". $valor->ObjetoLicitado . "</td>";                                                                                                                                        
                                break;                                                           
                            case 'Data da Proposta':                                                                                                        
                                echo "<td>". $valor->DataPropostas ."</td>";
                                break;  
                            case 'Modalidade':                                                                    
                                echo "<td>".$valor->ModalidadeLicitatoria."</td>";  
                                break;
                            case 'Número do Edital':
                                echo "<td>" . $valor->NumeroEdital . '/' . $valor->AnoEdital . "</td>";
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
    function ShowLicitacao(licitacaoID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowLicitacaoConcluida')}}", {LicitacaoID: licitacaoID}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Licitação Concluída</span>';
                                                                                                                                                                                    
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm" style="font-size:'+tamanho+'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS DA LICITAÇÃO</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                        
                                            '<td>Objeto Licitado:</td>' +
                                            '<td>' + data[0].ObjetoLicitado + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+
                                            '<td>Número do Edital:</td>' +
                                            '<td>' + $.trim(data[0].NumeroEdital + '/' + data[0].AnoEdital) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Órgão Licitante:</td>' +
                                            '<td>' + $.trim(data[0].OrgaoLicitante) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Número do Processo:</td>' +
                                            '<td>' + $.trim(data[0].NumeroProcesso) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Modalidade Licitatória:</td>' +
                                            '<td>' + $.trim(data[0].ModalidadeLicitatoria) + '</td>'+
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Data da Proposta:</td>' +
                                            '<td>' + stringToDate(data[0].DataPropostas )+ '</td>'+                                                        
                                            '</tr>' +                                        
                                        '</tbody>'+
                                    '</table>';
                                    if ((data[0].IntegraEditalNome != ' ') && (data[0].IntegraEditalNome != null)){
                                        body = body + '<a href="/licitacoescontratos/concluida/Download/' + data[0].LicitacaoID + '" class="btn btn-info" role="button">Download do Edital</a>';    
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
    filename:'licitacao concluida'
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