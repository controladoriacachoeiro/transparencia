@extends('patrimonio.PatrimonioTabela')

@section('htmlheader_title')
    Frotas
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
                <?PHP
                foreach ($dadosDb as $valor) {
                    echo "<tr>";
                    foreach ($colunaDados as $valorColuna) {
                        switch ($valorColuna) {
                            case 'Placa':
                                echo "<td scope='col'><a href='#' onclick=ShowFrota(". $valor->FrotaID .") data-toggle='modal' data-target='#myModal'>". $valor->PlacaVeiculo ."</a></td>";
                                break;
                            case 'Marca':
                                echo "<td scope='col' style='vertical-align:middle'>" . $valor->Marca . "</td>";
                                break;
                            case 'Modelo':                                                                                                                                                                                                                
                                echo "<td scope='col' style='vertical-align:middle'>" . $valor->Modelo . "</td>";
                                break;  
                            case 'Status':                                                                                                                                                                                                                
                                echo "<td scope='col' style='vertical-align:middle'>" . $valor->Status . "</td>";
                                break;
                            case 'Ano':                                                                                                                                                                                                                
                                echo "<td scope='col' style='vertical-align:middle'>" . $valor->Ano . "</td>";
                                break;                                                                                                                                                                                                                                                                                                                  
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
@endsection

@section('scriptsadd')
@parent
<script>
    function ShowFrota(FrotaID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowFrota')}}", {FrotaID: FrotaID}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>Veículo: </span>' + data[0].PlacaVeiculo;
                                                                                                                                                                                    
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
                                            '<td>Placa:</td>' +
                                            '<td>' + $.trim(data[0].PlacaVeiculo) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Destinaçao Atual:</td>' +
                                            '<td>' + $.trim(data[0].DestinacaoAtual) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Localização:</td>' +
                                            '<td>' + $.trim(data[0].VeiculoLocalizacao) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Marca:</td>' +
                                            '<td>' + $.trim(data[0].Marca) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Modelo:</td>' +
                                            '<td>' + $.trim(data[0].Modelo) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Cor:</td>' +
                                            '<td>' + $.trim(data[0].Cor) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Ano de Fabricação:</td>' +
                                            '<td>' + $.trim(data[0].Ano) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Status:</td>' +
                                            '<td>' + $.trim(data[0].Status)+'</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Propriedade:</td>' +
                                            '<td>' + $.trim(data[0].Propriedade)+'</td>'+                                                        
                                            '</tr>'+                                                                                                                                                 
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
    filename:'frota'
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