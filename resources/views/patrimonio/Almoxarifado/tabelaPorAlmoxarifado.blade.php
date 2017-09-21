@extends('patrimonio.PatrimonioTabela')

@section('htmlheader_title')
    Patrimônio
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Valor"){
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }
                            else if($valor == "Quantidade"){
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='inteiro'>" . $valor . "</th>";
                            }
                            else{
                                echo "<th style='vertical-align:middle'>" . $valor . "</th>";
                            }
                        }                        
                    ?>
                </tr>
            </thead>
            <tbody>
                <?PHP
                use App\Auxiliar as Auxiliar;
                foreach ($dadosDb as $valor) {                    
                    echo "<tr>";
                    foreach ($colunaDados as $valorColuna) {
                        switch ($valorColuna) {
                            case 'Almoxarifado':
                                echo "<td><a href='". route('filtroAlmoxarifado2', ['tipoConsulta' => $valor->NomeAlmoxarifado]) ."'>". $valor->NomeAlmoxarifado ."</a></td>";
                                break;
                            case 'Material':      
                                $material = Auxiliar::ajusteUrl($valor->NomeMaterial);
                                $almoxarifado =Auxiliar::ajusteUrl($valor->NomeAlmoxarifado);
                                echo "<td><a href='". route('filtroAlmoxarifadoMaterial', ['tipoConsulta' => $almoxarifado,'material' =>$material]) ."'>". $valor->NomeMaterial ."</a></td>";
                                break;  
                            case 'Descrição do Item':      
                                echo "<td><a href='#' onclick=ShowProduto(".$valor->EstoqueID.") data-toggle='modal' data-target='#myModal'>". $valor->Especificacao ."</a></td>";
                                break; 
                            case 'Quantidade de Itens':                                                                    
                                echo "<td>". $valor->Quantidade ."</td>";
                                break;
                            case 'Valor':                                                                                                                                                                                                                
                                 echo "<td>". $valor->ValorAquisicao ."</td>";
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
    function ShowProduto(estoqueId) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowAlmoxarifado')}}", {EstoqueId: estoqueId}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Item: </span> ' + data[0].NomeMaterial;
                                                                                                                                                                                    
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
                                            '<td>Almoxarifado Localizado:</td>' +
                                            '<td>' + data[0].NomeAlmoxarifado + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Orgão Localizado:</td>' +
                                            '<td>' + data[0].OrgaoLocalizacao + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Grupo Material:</td>' +
                                            '<td>' + data[0].NomeGrupo + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Especificação:</td>' +
                                            '<td>' + data[0].Especificacao+'</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Quantidade:</td>' +
                                            '<td>' + data[0].Quantidade+'</td>'+                                                        
                                            '</tr>' +
                                            '<table class="table table-sm">'+
                                            '<thead>'+
                                            '<tbody>' +                                        
                                            '<tr>'+
                                            '<th>Valor do Item:</th>'+
                                            '<th>' +  'R$ ' + currencyFormat(data[0].ValorAquisicao) +'</th>'+ 
                                            '</tr>'+
                                            '</tbody>'+
                                            '</table>'+                                                                                                      
                                        '</tbody>'+
                                    '</table>';
            body = body + '</div>' + '</div>';
            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>
@stop