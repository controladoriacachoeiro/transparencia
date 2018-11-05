@extends('despesas.tabelaDespesas')

@section('htmlheader_title')
    Empenhos
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Valor Empenhado"){
                                echo "<th scope='col' style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if($valor == "Data de Empenho"){
                                echo "<th  scope='col'style='vertical-align:middle' data-dynatable-column='dataColumn'>" . $valor . "</th>";
                            }
                            else{
                                echo "<th  scope='col'style='vertical-align:middle'>" . $valor . "</th>";
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
                            case 'Data de Empenho':
                                echo "<td scope='col'>". $valor->DataEmpenho ."</td>";
                            break;
                            case 'Nota de Empenho':
                                $valor->Orgao = App\Auxiliar::ajusteUrl($valor->Orgao);
                                $valor->Beneficiario = App\Auxiliar::ajusteUrl($valor->Beneficiario);
                                echo "<td scope='col'><a href='". route('DetalhesEmpenho', ['orgao' => $valor->Orgao, 'fornecedor' => $valor->Beneficiario, 'notaempenho' => $valor->NotaEmpenho]) ."' class='link'> ".$valor->NotaEmpenho."</a></td>";
                            break; 
                            case 'Órgão':
                                echo "<td scope='col'>". $valor->Orgao ."</td>";
                                break;
                            case 'Unidade Gestora':
                                echo "<td scope='col'>". $valor->UnidadeGestora ."</td>";
                                break;
                            case 'Fornecedores':
                                echo "<td scope='col'>". $valor->Beneficiario ."</td>";
                                break;  
                            case 'Valor Empenhado':                                
                                echo "<td scope='col'>" . $valor->ValorEmpenho . "</td>";
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
<!-- Modal de Empenho -->
<script src="{{ asset('/dist/js/modals/empenho-modal.js') }}"></script>

<script>
var ExportButtons = document.getElementById('tabela');
var instance = new TableExport(ExportButtons, {
    formats: ['xls','csv'],
    exportButtons: false,
    filename:'empenho nota'
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