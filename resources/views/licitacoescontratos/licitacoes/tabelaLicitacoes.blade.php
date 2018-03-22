@extends('licitacoescontratos.tabelaLiciCon')

@section('htmlheader_title')
    Licitações
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {                            
                            if($valor == "Data da Proposta"){
                                echo "<th scope='col' style='vertical-align:middle' data-dynatable-column='dataColumn'>" . $valor . "</th>";                            
                            }else{
                                echo "<th scope='col' style='vertical-align:middle'>" . $valor . "</th>";                                
                            }
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                @php
                    foreach ($dadosDb as $valor) {                    
                        echo "<tr>";
                        foreach ($colunaDados as $valorColuna) {                        
                            switch ($valorColuna) {
                                case 'Orgao Licitante':
                                    echo "<td scope='col'>".$valor->OrgaoLicitante."</td>";
                                    break;
                                case 'Status':
                                    echo "<td scope='col'>".$valor->Status."</td>";
                                    break;
                                case 'Nº Processo':
                                    if($valor->NumeroProcesso != ''){
                                        echo "<td scope='col'>" . $valor->NumeroProcesso . "/" . $valor->AnoProcesso . "</td>";
                                    }else{                                                                   
                                        echo "<td scope='col'></td>";                                                                                                                                       
                                    }
                                    break;
                                case 'Objeto Licitado':
                                    echo "<td scope='col'><a href='". route('DetalhesLicitacao', ['status' => $valor->Status, 'licitante' => $valor->OrgaoLicitante, 'codigolicitacao' => $valor->CodigoLicitacao]) ."'>". $valor->ObjetoLicitado ."</a></td>";
                                    break;
                                case 'Data da Proposta':                                                                                                        
                                    echo "<td scope='col'>". $valor->DataPropostas ."</td>";
                                    break;
                                case 'Modalidade':                                                                    
                                    echo "<td scope='col'>".$valor->ModalidadeLicitatoria."</td>";  
                                    break;
                                case 'Nº Edital':
                                    echo "<td scope='col'>" . $valor->NumeroEdital . '/' . $valor->AnoEdital . "</td>";
                                    break;
                            }                        
                        }
                        echo "</tr>";
                    }
                @endphp
            </tbody>
        </table>
    </div>
@stop

@section('scriptsadd')
@parent
<script>
var ExportButtons = document.getElementById('tabela');
var instance = new TableExport(ExportButtons, {
    formats: ['xls','csv'],
    exportButtons: false,
    filename:'licitacoes'
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