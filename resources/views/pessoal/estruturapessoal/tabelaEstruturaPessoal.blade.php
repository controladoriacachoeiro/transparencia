@extends('pessoal.tabelaPessoal')

@section('htmlheader_title')
    Estrutura de Pessoal
@stop

@section('contentTabela')

    <div class="row" style="overflow:auto">
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
                                    <td scope='col'><a href='/estruturapessoalcargo/{{App\Auxiliar::ajusteUrl($valor->CargoFuncao)}}'> {{$valor->CargoFuncao}} </a>
                                    </td>
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
            <tfoot>
                <tr>
                    <td scope='col' colspan="4">
                        <b>Obs.:</b> Todos os Cargos acima listados contemplam os seguintes Tipos de Vínculo: Afastado, Agente Político, Aposentado, Celetista, Comissionado, Contrato, Contrato Determinado, Contrato Indeterminado, Efetivo, Efetivo/Comissionado, Eleito, Estabilitário, Estagiário, Estatutario, Inativo, Outros, Pensionista, Suplementar (Inativado).
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@stop

@section('scriptsadd')
@parent
<script>
    function ShowCargoFuncao(cargofuncao, tipovinculo) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowCargoFuncao')}}", {CargoFuncao: cargofuncao, TipoVinculo: tipovinculo}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>Cargo/Função: </span> ' + data[0].CargoFuncao;

            var tabelaReferencia = '';

            $.each(data, function(i, valor){
                tabelaReferencia = tabelaReferencia + '<tr><td>' + data[i].SiglaReferencia + '</td>'+
                                    '<td>' + 'R$ ' + currencyFormat(data[i].ValorReferencia) + '</td></tr>';
            });

            var Lei;
            if(data[0].LeiNumero == '0' || data[0].LeiNumero == null){
                Lei = '<td>' + 'Lei Desconhecida' + '</td>';
            } else{
                Lei = '<td>' + data[0].LeiNumero + '</td>';
            }
       
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm" style="font-size:'+tamanho+'">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th colspan="2">DADOS</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                    
                                                '<td>Nome do Cargo ou Função:</td>' +
                                                '<td>' + data[0].CargoFuncao + '</td>'+
                                            '</tr>'+
                                            '<tr>'+                                                        
                                                '<td>Tipo do Vínculo:</td>' +
                                                '<td>' + data[0].TipoVinculo + '</td>'+
                                            '</tr>'+
                                            '<tr>'+                                                        
                                                '<td>Vagas Ocupadas:</td>' +
                                                '<td>' + $.trim(data[0].Quantidade) + '</td>'+    
                                            '</tr>'+
                                            '<tr>'+                                                        
                                                '<td>Vagas em Aberto:</td>' +
                                                '<td>' + $.trim(data[0].VagasAberto) + '</td>'+
                                            '</tr>' +
                                            '<tr>'+
                                                '<td>Lei de Criação:</td>' +
                                                Lei +                                                        
                                            '</tr>' +
                                        '</tbody>'+
                                    '</table>'+
                                '</div>' + 
                            '</div>';

            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>
<script>
var ExportButtons = document.getElementById('tabela');
var instance = new TableExport(ExportButtons, {
    formats: ['xls','csv'],
    exportButtons: false,
    filename:'estrutura pessoal'
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