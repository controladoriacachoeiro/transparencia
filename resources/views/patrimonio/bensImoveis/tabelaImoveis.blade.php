@extends('patrimonio.PatrimonioTabela')

@section('htmlheader_title')
    Bens Imóveis
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped" summary="Resultado da pesquisa">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            echo "<th scope='col' style='vertical-align:middle'>" . $valor . "</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                @foreach($dadosDb as $valor)
                    <tr>
                        @foreach($colunaDados as $valorColuna)
                            @switch($valorColuna)
                                @case('Imóvel')
                                    <td scope='col'><a href='#' onclick=ShowImovel({{$valor->BemID}}) data-toggle='modal' data-target='#myModal'> {{$valor->IdentificacaoBem}} </a></td>
                                    @break
                                @case('Unidade Gestora')
                                    <td scope='col' style='vertical-align:middle'> {{$valor->UnidadeGestora}} </td>
                                    @break
                                @case('Descrição')
                                    <td scope='col' style='vertical-align:middle'> {{$valor->Descricao}} </td>
                                    @break
                                @case('Localização')
                                    <td scope='col' style='vertical-align:middle'> {{$valor->Localizacao}} </td>
                                    @break
                            @endswitch
                        @endforeach
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('scriptsadd')
@parent
<script>
    function ShowImovel(BemID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowImovel')}}", {BemID: BemID}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>IMÓVEL </span> ';

            if(data[0].ValorAvaliacao != 'A ser calculado'){
                data[0].ValorAvaliacao = 'R$ ' + currencyFormat(data[0].ValorAvaliacao);
            }

            if(data[0].DataAvaliacao != 'Data desconhecida'){
                data[0].DataAvaliacao = stringToDate(data[0].DataAvaliacao);
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
                                                '<td>Bem Imóvel:</td>' +
                                                '<td>' + data[0].IdentificacaoBem + '</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Unidade Gestora:</td>' +
                                                '<td>' + data[0].UnidadeGestora + '</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Descrição:</td>' +
                                                '<td>' + data[0].Descricao + '</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Localização:</td>' +
                                                '<td>' + data[0].Localizacao + '</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Destinação Atual:</td>' +
                                                '<td>' + $.trim(data[0].DestinacaoAtual) + '</td>'+ 
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Situação:</td>' +
                                                '<td>' + data[0].Situacao + '</td>'+
                                            '</tr>' +
                                            '<tr>'+
                                                '<td>Valor de Avaliação:</td>' +
                                                '<td>' + data[0].ValorAvaliacao + '</td>'+
                                            '</tr>' +
                                            '<tr>'+
                                                '<td>Data da Avaliação:</td>' +
                                                '<td>' + data[0].DataAvaliacao +'</td>'+
                                            '</tr>' +
                                            '<tr>'+
                                                '<td>Área:</td>' +
                                                '<td>' + data[0].Area + '</td>'+
                                            '</tr>' +
                                        '</tbody>'+
                                    '</table>';
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
    filename:'imoveis'
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
@endsection