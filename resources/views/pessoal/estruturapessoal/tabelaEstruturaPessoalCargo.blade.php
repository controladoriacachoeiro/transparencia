@extends('pessoal.tabelaPessoal')

@section('htmlheader_title')
    Estrutura de Pessoal Por Cargo
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <a class="btn btn-primary btn-print" href="/estruturapessoalcargo/TODOS/TODOS" role="button" style="float: right">Ver Todos os Cargos Detalhados</a>
        <br>
        <br>

        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    @foreach($colunaDados as $valor)                         
                        <th scope='col' style='vertical-align:middle'> {{$valor}} </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($dadosDb as $valor)
                    <tr>
                        @foreach($colunaDados as $valorColuna)
                            @switch($valorColuna)
                                @case('Cargo/Função')
                                    <td scope='col'>{{$valor->CargoFuncao}}</td>
                                    @break

                                @case('Tipo de Vínculo')
                                    <td scope='col'>{{$valor->TipoVinculo}}</td>
                                    @break

                                @case('Vagas em Aberto')
                                    <td scope='col'>{{$valor->VagasAberto}}</td>
                                    @break

                                @case('Vagas Ocupadas')
                                    <td scope='col'>{{$valor->VagasOcupadas}}</td>
                                    @break

                                @case('Lei de Criação')
                                    @if($valor->LeiNumero == '0' || $valor->LeiNumero == null)
                                        <td scope='col'>Lei Desconhecida</td>
                                        @else
                                            <td scope='col'>{{$valor->LeiNumero}}</td>
                                    @endif
                                    @break

                            @endswitch
                        @endforeach
                    </tr>
                @endforeach
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
    filename:'estrutura pessoal por cargo'
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