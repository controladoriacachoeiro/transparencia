@extends('despesas.tabelaDespesas')

@section('htmlheader_title')
    Pagamentos
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Valor Pago"){
                                echo "<th style='vertical-align:middle;text-align:right' data-dynatable-column='valormoeda'>" . $valor . "</th>";
                            }else if($valor == "Data de Pagamento"){
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
                                echo "<td><a href='". route('MostrarPagamentoFuncaoOrgao', ['datainicio' => $datainicio, 'datafim' => $datafim,'funcao' =>$funcao ,'orgao' => $orgao]) ."'>". $valor->UnidadeGestora ."</a></td>";
                                break;
                            case 'Funções':
                                $funcao = App\Auxiliar::ajusteUrl($valor->Funcao);
                                echo "<td><a href='". route('MostrarPagamentoFuncao', ['datainicio' => $datainicio, 'datafim' => $datafim, 'orgao' => $valor->UnidadeGestora,'funcao' =>$funcao]) ."'>". $valor->Funcao ."</a></td>";
                                break;
                            case 'Fornecedor':
                                $orgao = App\Auxiliar::ajusteUrl($valor->UnidadeGestora);
                                $funcao = App\Auxiliar::ajusteUrl($valor->Funcao);
                                $fornecedor = App\Auxiliar::ajusteUrl($valor->Beneficiario);
                                echo "<td><a href='". route('MostrarPagamentoFuncaoOrgaoFornecedor', ['datainicio' => $datainicio, 'datafim' => $datafim,'funcao' =>$funcao, 'orgao' => $orgao,'fornecedor' =>$fornecedor]) ."'>". $valor->Beneficiario ."</a></td>";
                                break;  
                            case 'Data de Pagamento':
                                echo "<td>". $valor->DataPagamento ."</td>";
                                break;
                            case 'Elemento':
                                echo "<td>". $valor->ElemDespesa ."</td>";
                                break;    
                            case 'Nota de Pagamento':
                                echo "<td><a href='#' onclick=ShowPagamento(". $valor->PagamentoID .") data-toggle='modal' data-target='#myModal'> ".$valor->NotaPagamento."</a></td>";
                                break;                        
                            case 'Valor Pago':                                
                                echo "<td>" . $valor->ValorPago . "</td>";
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
    function ShowPagamento(pagamentoID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowDespPagamento')}}", {PagamentoID: pagamentoID}, function(value){
            var data = JSON.parse(value);
            document.getElementById("titulo").innerHTML = '<span>Nota de Pagamento Nº: </span> ' + data[0].NotaPagamento + '/' + data[0].AnoExercicio;
            
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
                                            '<td>Processo:</td>' ;
                                            if((data[0].Processo=='')||(data[0].Processo==null)){
                                                body=body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body=body+'<td>' +$.trim(data[0].Processo)+ '</td>';
                                            }
                                                                                                    
                                body=body+'</tr>'+      
                                            '<tr>'+                                                    
                                            '<td>Ação:</td>' +
                                            '<td>' + data[0].Acao + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                    
                                            '<td>Subtítulo:</td>';
                                            if((data[0].Subtitulo=='')||(data[0].Subtitulo==null)){
                                                body=body+'<td>Cachoeiro de Itapemirim</td>';
                                            }
                                            else{
                                                body=body+'<td>' +$.trim(data[0].Subtitulo)+ '</td>';
                                            }                                                 
                                body=body+'</tr>'+
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
                                            '<td>Data de Pagamento:</td>' +
                                            '<td>' +stringToDate(data[0].DataPagamento) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Modalidade Licitatória:</td>';
                                            if((data[0].ModalidadeLicitatoria=='')||(data[0].ModalidadeLicitatoria==null)){
                                                body=body+'<td>Não Aplicável</td>';
                                            }
                                            else{
                                                body=body+'<td>' +$.trim(data[0].ModalidadeLicitatoria)+ '</td>';
                                            }     
                                body=body+'</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Categoria Econômica:</td>' +
                                            '<td>' + data[0].CatEconomica + '</td>'+                                                        
                                            '</tr>'+ 
                                            '<tr>'+                                                        
                                            '<td>Modalidade Aplicação:</td>' +
                                            '<td>' + $.trim(data[0].ModalidadeAplicacao) + '</td>'+
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Natureza da Despesa:</td>' +
                                            '<td>' + data[0].NaturezaDespesa + '</td>'+                                                        
                                            '</tr>'+ 
                                            '<tr>'+                                                        
                                            '<td>Nota do Empenho:</td>' +
                                            '<td><a href=/despesas/empenhos/nota/'+data[0].NotaEmpenho+'/'+data[0].AnoNotaEmpenho+'>' + data[0].NotaEmpenho +'/'+data[0].AnoNotaEmpenho+ '</a></td>'+
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Nota da Liquidação:</td>' +
                                            '<td><a href=/despesas/liquidacoes/nota/'+data[0].NotaLiquidacao+'/'+data[0].AnoNotaLiquidacao+'>' + data[0].NotaLiquidacao +'/'+data[0].AnoNotaLiquidacao+ '</a></td>'+
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
                                            '<th>Valor Pago</th>'+
                                            '<th>'+'R$ '+currencyFormat(data[0].ValorPago)+'</th>'+
                                            '</tr>'+                                        
                                        '</thead>'+                                        
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
    filename:'pagamentos funcao'
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