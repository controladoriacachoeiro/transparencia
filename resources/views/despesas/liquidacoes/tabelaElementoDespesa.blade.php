@extends('despesas.tabelaDespesas')

@section('htmlheader_title')
    Liquidações
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Valor Liquidado"){
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if($valor == "Data de Liquidação"){
                                echo "<th style='vertical-align:middle' data-dynatable-column='dataColumn'>" . $valor . "</th>";
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
                foreach ($dadosDb as $valor) {                    
                    echo "<tr>";
                    foreach ($colunaDados as $valorColuna) {
                        switch ($valorColuna) {
                            case 'Órgãos':
                                echo "<td><a href='". route('MostrarLiquidacaoElementoOrgao', ['datainicio' => $datainicio, 'datafim' => $datafim,'elemento' =>$valor->ElemDespesa ,'orgao' => $valor->UnidadeGestora]) ."'>". $valor->UnidadeGestora ."</a></td>";
                                break;
                            case 'Elementos':
                                $elemento = App\Auxiliar::ajusteUrl($valor->ElemDespesa);
                                echo "<td><a href='". route('MostrarLiquidacaoElemento', ['datainicio' => $datainicio, 'datafim' => $datafim, 'elemento' => $elemento]) ."'>". $valor->ElemDespesa ."</a></td>";
                                break;  
                            case 'Data de Liquidação':
                                echo "<td>". $valor->DataLiquidacao ."</td>";
                                break;
                            case 'Fornecedores':
                                echo "<td>". $valor->Beneficiario ."</td>";
                                break;    
                            case 'Nota de Liquidação':
                                echo "<td><a href='#' onclick=ShowLiquidacao(". $valor->LiquidacaoID .") data-toggle='modal' data-target='#myModal'> ".$valor->NotaLiquidacao."</a></td>";
                                break;                        
                            case 'Valor Liquidado':                                
                                echo "<td>" . $valor->ValorLiquidado . "</td>";
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
//Função para o Model ou PopUP
function ShowLiquidacao(liquidacaoID) {
    document.getElementById("modal-body").innerHTML = '';
    document.getElementById("titulo").innerHTML = '';
    
    $.get("{{ route('ShowLiquidacao')}}", {LiquidacaoID: liquidacaoID}, function(value){
        var data = JSON.parse(value);
        document.getElementById("titulo").innerHTML = '<span>Nota de Liquidação Nº: </span> ' + data[0].NotaLiquidacao + '/' + data[0].AnoExercicio;
        
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
                                        '<td>Órgão:</td>' +
                                        '<td>' +data[0].UnidadeGestora+ '</td>'+                                                        
                                        '</tr>'+
                                        '<tr>'+                                                        
                                        '<td>Processo:</td>' +
                                        '<td>' +$.trim(data[0].Processo)+ '</td>'+                                                        
                                        '</tr>'+
                                        '<tr>'+                                                    
                                        '<td>Projeto/Atividade:</td>' +
                                        '<td>' + data[0].Acao + '</td>'+                                                        
                                        '</tr>'+
                                        '<tr>'+                                                    
                                        '<td>Subtítulo:</td>' +
                                        '<td>' + $.trim(data[0].Subtitulo) + '</td>'+
                                        '</tr>'+
                                        '<tr>'+                                                        
                                        '<td>Elemento da Despesa:</td>' +
                                        '<td>' + data[0].ElemDespesa + '</td>'+                                                        
                                        '</tr>'+   
                                        '<tr>'+                                                        
                                        '<td>Programa:</td>' +
                                        '<td>' + data[0].Programa + '</td>'+                                                        
                                        '</tr>'+                                          
                                        '<tr>'+                                                        
                                        '<td>Fonte de Recursos:</td>' +
                                        '<td>' + data[0].FonteRecursos + '</td>'+                                                        
                                        '</tr>' +
                                        '<tr>'+                                                        
                                        '<td>Função:</td>' +
                                        '<td>' + data[0].Funcao + '</td>'+                                                        
                                        '</tr>' +
                                        '<tr>'+                                                        
                                        '<td>Subfunção:</td>' +
                                        '<td>' +data[0].SubFuncao + '</td>'+                                                        
                                        '</tr>' +
                                        '<tr>'+                                                        
                                        '<td>Ano Exercício:</td>' +
                                        '<td>' + data[0].AnoExercicio + '</td>'+                                                        
                                        '</tr>' +
                                        '<tr>'+                                                        
                                        '<td>Data de Empenho:</td>' +
                                        '<td>' +stringToDate(data[0].DataLiquidacao) + '</td>'+                                                        
                                        '</tr>' +
                                        '<tr>'+                                                        
                                        '<td>Modalidade Licitatória:</td>' +
                                        '<td>' + data[0].ModalidadeLicitatoria + '</td>'+                                                        
                                        '</tr>' +
                                        '<tr>'+                                                        
                                        '<td>Categoria Econômica:</td>' +
                                        '<td>' + data[0].CatEconomica + '</td>'+                                                        
                                        '</tr>'+ 
                                        '<tr>'+                                                        
                                        '<td>Natureza da Despesa:</td>' +
                                        '<td>' + data[0].NaturezaDespesa + '</td>'+                                                        
                                        '</tr>'+ 
                                        '<tr>'+                                                        
                                        '<td>Nota do Empenho:</td>' +
                                        '<td><a href=/despesas/empenhos/nota/'+data[0].NotaEmpenho+'/'+data[0].AnoNotaEmpenho+'>' + data[0].NotaEmpenho +'/'+data[0].AnoNotaEmpenho+ '</a></td>'+
                                        '</tr>' +
                                        '<tr>'+                                                        
                                        '<td>Descrição:</td>' +
                                        '<td>' + data[0].ProdutoServico + '</td>'+                                                        
                                        '</tr>' +
                                        '<tr>'+                                                                                                                                                                                                         
                                    '</tbody>'+
                                '</table>'+
                                '<table class="table table-sm">'+
                                    '<thead>'+
                                        '<tr>'+
                                        '<th colspan="2">Credor</th>'+
                                        '</tr>'+
                                        '<tr>'+                                                        
                                        '<td>Nome:</td>' +
                                        '<td>' + data[0].Beneficiario + '</td>'+                                                        
                                        '</tr>' +
                                        '<tr>'+                                                        
                                        '<td>CPF/CNPJ:</td>' +
                                        '<td>' + FormatCpfCnpj(data[0].CPF_CNPJ) + '</td>'+                                                        
                                        '</tr>' +
                                    '</thead>'+                                        
                                '</table>'+
                                '<table class="table table-sm">'+
                                    '<thead>'+
                                        '<tr>'+
                                        '<th>Valor Liquidado</th>'+
                                        '<th>'+'R$ '+currencyFormat(data[0].ValorLiquidado)+'</th>'+
                                        '</tr>'+                                        
                                    '</thead>'+                                        
                                '</table>';
        
        body = body + '</div>' + '</div>';

        document.getElementById("modal-body").innerHTML = body;
    });
}
</script>

@stop