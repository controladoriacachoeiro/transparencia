@extends('patrimonio.PatrimonioTabela')

@section('htmlheader_title')
    Frotas
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
                            case 'Placa':
                                echo "<td><a href='#' onclick=ShowFrota(". $valor->FrotaID .") data-toggle='modal' data-target='#myModal'>". $valor->PlacaVeiculo ."</a></td>";
                                break;
                            case 'Marca':
                                echo "<td style='vertical-align:middle'>" . $valor->Marca . "</td>";
                                break;
                            case 'Modelo':                                                                                                                                                                                                                
                                echo "<td style='vertical-align:middle'>" . $valor->Modelo . "</td>";
                                break;  
                            case 'Status':                                                                                                                                                                                                                
                                echo "<td style='vertical-align:middle'>" . $valor->Status . "</td>";
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
        
        $.get("{{ route('ShowFrota')}}", {FrotaID: FrotaID}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Dados referente a placa: </span> ' + data[0].PlacaVeiculo;
                                                                                                                                                                                    
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
                                            '<td>Propriedade:</td>' +
                                            '<td>' + $.trim(data[0].Propriedade) + '</td>'+                                                        
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
                                            '<td>Ano:</td>' +
                                            '<td>' + $.trim(data[0].Ano) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Status:</td>' +
                                            '<td>' + $.trim(data[0].Status)+'</td>'+                                                        
                                            '</tr>' +
                                            '<td>Categoria:</td>' +
                                            '<td>' +$.trim(data[0].Categoria)+'</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Subcategoria:</td>' +
                                            '<td>' + $.trim(data[0].Subcategoria)+'</td>'+                                                        
                                            '</tr>' +                                                                                                      
                                        '</tbody>'+
                                    '</table>';
            body = body + '</div>' + '</div>';
            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>

@endsection