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
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if($valor == "Data de Empenho"){
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
                                $orgao = App\Auxiliar::ajusteUrl($valor->UnidadeGestora);
                                $funcao = App\Auxiliar::ajusteUrl($valor->Funcao);
                                echo "<td><a href='". route('MostrarEmpenhoFuncaoOrgao', ['datainicio' => $datainicio, 'datafim' => $datafim,'funcao' =>$funcao ,'orgao' => $orgao]) ."'>". $valor->UnidadeGestora ."</a></td>";
                                break;
                            case 'Funções':
                                $funcao = App\Auxiliar::ajusteUrl($valor->Funcao);
                                echo "<td><a href='". route('MostrarEmpenhoFuncao', ['datainicio' => $datainicio, 'datafim' => $datafim, 'orgao' => $valor->UnidadeGestora,'funcao' =>$funcao]) ."'>". $valor->Funcao ."</a></td>";
                                break;
                            case 'Fornecedor':
                                $orgao = App\Auxiliar::ajusteUrl($valor->UnidadeGestora);
                                $funcao = App\Auxiliar::ajusteUrl($valor->Funcao);
                                $fornecedor = App\Auxiliar::ajusteUrl($valor->Beneficiario);
                                echo "<td><a href='". route('MostrarEmpenhoFuncaoOrgaoFornecedor', ['datainicio' => $datainicio, 'datafim' => $datafim,'funcao' =>$funcao, 'orgao' => $orgao,'fornecedor' =>$fornecedor]) ."'>". $valor->Beneficiario ."</a></td>";
                                break;  
                            case 'Data de Empenho':
                                echo "<td>". $valor->DataEmpenho ."</td>";
                                break;
                            case 'Elemento':
                                echo "<td>". $valor->ElemDespesa ."</td>";
                                break;    
                            case 'Nota de Empenho':
                                echo "<td><a href='#' onclick=ShowEmpenho(". $valor->EmprenhoID .") data-toggle='modal' data-target='#myModal'> ".$valor->NotaEmpenho."</a></td>";
                                break;                        
                            case 'Valor Empenhado':                                
                                echo "<td>" . $valor->ValorEmpenho . "</td>";
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
    function ShowEmpenho(empenhoID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowEmpenho')}}", {EmpenhoID: empenhoID}, function(value){
            var data = JSON.parse(value);
            document.getElementById("titulo").innerHTML = '<span>Nota de Empenho Nº: </span> ' + data[0].NotaEmpenho + '/' + data[0].AnoExercicio;
            
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
                                            '<td>' +stringToDate(data[0].DataEmpenho) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Modalidade Licitatória:</td>' +
                                            '<td>' + $.trim(data[0].ModalidadeLicitatoria) + '</td>'+                                                        
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
                                            '<th>Valor Empenhado</th>'+
                                            '<th>'+'R$ '+currencyFormat(data[0].ValorEmpenho)+'</th>'+
                                            '</tr>'+                                        
                                        '</thead>'+                                        
                                    '</table>';
            
            body = body + '</div>' + '</div>';

            document.getElementById("modal-body").innerHTML = body;
        });
    }
</script>
<script>    
 $(document).ready(function() {
      $(".export").on('click', function(event) {
        var args = [$('#tabela'), 'empenho.csv'];
        exportTableToCSV.apply(this, args);
      });
    });
</script>

@stop