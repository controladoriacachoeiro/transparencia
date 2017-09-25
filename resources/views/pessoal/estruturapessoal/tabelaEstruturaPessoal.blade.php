@extends('pessoal.tabelaPessoal')

@section('htmlheader_title')
    Estrutura de Pessoal
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
                            case 'Cargo/Funcao':                                    
                                    $CargoFuncao = '"'.App\Auxiliar::ajusteUrl($valor->CargoFuncao).'"';
                                    echo "<td><a href='#' onclick=ShowCargoFuncao(". $CargoFuncao .") data-toggle='modal' data-target='#myModal'>". $valor->CargoFuncao ."</a></td>";                                    
                                break;
                            case 'Tipo do Vínculo':                                                                    
                                echo "<td>".$valor->TipoVinculo."</td>";                                                                                                                                        
                                break;
                            case 'Classe':                                                                    
                                echo "<td>".$valor->ClasseNome."</td>";                                                                                                                                        
                                break;                                                                 
                            case 'Sigla da Classe':                                                                    
                                    echo "<td>".$valor->ClasseSigla."</td>";                                                                                                                                                                                                                
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
    function ShowCargoFuncao(cargofuncao) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowCargoFuncao')}}", {CargoFuncao: cargofuncao}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Cargo/Função: </span> ' + data[0].CargoFuncao;

            var tabelaReferencia = '';

            
            

            $.each(data, function(i, valor){
                tabelaReferencia = tabelaReferencia + '<tr><td>' + data[i].SiglaReferencia + '</td>'+
                                    '<td>' + 'R$ ' + currencyFormat(data[i].ValorReferencia) + '</td></tr>';
            });
                                                                                                                                                                                    
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
                                            '<td>Nome do Cargo ou Função:</td>' +
                                            '<td>' + data[0].CargoFuncao + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Tipo do Vínculo:</td>' +
                                            '<td>' + data[0].TipoVinculo + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Vagas Ocupadas:</td>' +
                                            '<td>' + $.trim(data[0].VagasOcupadas) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Vagas em Aberto:</td>' +
                                            '<td>' + $.trim(data[0].VagasAberto) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Lei:</td>' +
                                            '<td>' + data[0].LeiNumero + ' de ' + data[0].LeiAno + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Classe:</td>'+
                                            '<td>' + data[0].ClasseSigla + '</td>'+
                                            '</tr>'+                                                                                                                                                                                 
                                        '</tbody>'+
                                    '</table>'+
                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th>Sigla Referência</th>'+                                                    
                                                '<th>Valor Referência</th>'+
                                            '</tr>'+
                                        '<thead>'+                                            
                                        '<tbody>'+
                                            tabelaReferencia +
                                        '</tbody>'+
                                    '</table>'+
                                    '</div>' + '</div>';

            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>
<script>
    $(document).ready(function () {
        $("#btnXls").click(function () {
            $("#tabela").btechco_excelexport({
                containerid: "tabela"
               , datatype: $datatype.Table
               , filename: 'Estrutura_pessoal'
            });
        });
    });
</script>
<script>    
 $(document).ready(function() {
      $(".export").on('click', function(event) {
        var args = [$('#tabela'), 'Estrutura_pessoal.csv'];
        exportTableToCSV.apply(this, args);
      });
    });
</script>
@stop