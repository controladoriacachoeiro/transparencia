@extends('patrimonio.PatrimonioTabela')

@section('htmlheader_title')
    Bens Imóveis
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            echo "<th style='vertical-align:middle'>" . $valor . "</th>";
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
                            case 'Orgão':
                            echo "<td style='vertical-align:middle'>" . $valor->UnidadeGestora . "</td>";
                                break;
                            case 'Imóvel':
                            echo "<td><a href='#' onclick=ShowImovel(". $valor->BemID .") data-toggle='modal' data-target='#myModal'>". $valor->UnidadeGestora ."</a></td>";
                                break;
                            case 'Descrição':                                                                                                                                                                                                                
                                echo "<td style='vertical-align:middle'>" . $valor->Descricao . "</td>";
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
    function ShowImovel(BemID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowImovel')}}", {BemID: BemID}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Dados ao imóvel: </span> ' + data[0].IdentificacaoBem;
                                                                                                                                                                                    
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                    
                                            '<td>Orgão Gestor:</td>' +
                                            '<td>' +data[0].UnidadeGestora+ '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Descrição:</td>' +
                                            '<td>' + data[0].Descricao + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Endereço:</td>' +
                                            '<td>' + data[0].Localizacao+ '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Destinação Atual:</td>' +
                                            '<td>' +data[0].DestinacaoAtual + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Situação:</td>' +
                                            '<td>' + data[0].Situacao+'</td>'+                                                        
                                            '</tr>' +
                                        '</tbody>'+
                                    '</table>';
            body = body + '</div>' + '</div>';
            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>

<script>
function DownloadXls() {
	$("#tabela").table2excel({
        exclude: ".noExl",
        name: "Excel Document Name",
        filename: "Imoveis",
        fileext: ".xls",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true
    });
}
</script>
<script>    
 $(document).ready(function() {
      $(".export").on('click', function(event) {
        var args = [$('#tabela'), 'Imoveis.csv'];
        exportTableToCSV.apply(this, args);
      });
    });
</script>
@endsection