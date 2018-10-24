@extends('despesas.tabelaDespesas')

@section('htmlheader_title')
    Empenhos
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Valor Empenhado"){
                                echo "<th scope='col' style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if($valor == "Data de Empenho"){
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
                            case 'Órgão':
                                echo "<td scope='col'><a href='". route('MostrarEmpenhoElementoOrgao', ['datainicio' => $datainicio, 'datafim' => $datafim,'elemento' =>$valor->ElemDespesa ,'orgao' => $valor->Orgao]) ."'>". $valor->Orgao ."</a></td>";
                                break;
                            case 'Unidade Gestora':
                                echo "<td scope='col'>". $valor->UnidadeGestora ."</td>";
                                break;
                            case 'Elementos':
                                echo "<td scope='col'><a href='". route('MostrarEmpenhoElemento', ['datainicio' => $datainicio, 'datafim' => $datafim, 'elemento' => $valor->ElemDespesa]) ."'>". $valor->ElemDespesa ."</a></td>";
                                break;  
                            case 'Data de Empenho':
                                echo "<td scope='col'>". $valor->DataEmpenho ."</td>";
                                break;
                            case 'Fornecedores':
                                echo "<td scope='col'>". $valor->Beneficiario ."</td>";
                                break;    
                            case 'Nota de Empenho':
                                
                                $navegacao = serialize($Navegacao); ?>
                                <td scope='col'>
                                    {{Form::open(array('action' => array('Despesas\EmpenhosController@mostrarEmpenhoPelaNota', 'elementos')))}}
                                            <input type="hidden" name="navegacao" value="{{$navegacao}}">
                                            <input type="hidden" name="EmpenhoID" value="{{$valor->EmpenhoID}}">
                                            <input type="hidden" name="datainicio" value="{{$datainicio}}">
                                            <input type="hidden" name="datafim" value="{{$datafim}}">
                                            <button style='border-color:transparent; background-color:transparent; color:steelblue' type='submit'>{{$valor->NotaEmpenho}}</button>
                                    {{Form::close()}}
                                </td>
                                <?PHP

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
    filename:'empenho elemento despesa'
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