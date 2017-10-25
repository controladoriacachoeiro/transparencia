@extends('pessoal.tabelaPessoal')

@section('htmlheader_title')
    Folha de Pagamento
@stop

@section('tabela_titulo')
    {{$Titulo or 'Nenhum Pagamento Encontrado'}}    
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
                            case 'Nome':
                                echo "<td><a href='#' onclick=ShowPagamento(". $valor->Matricula . ',' . $valor->MesPagamento. ',' . $valor->AnoPagamento . ',' . $valor->NumeroContrato . ") data-toggle='modal' data-target='#myModal'>". $valor->Nome ."</a></td>";                                    
                                break;                            
                            case 'Matrícula':                                                                    
                                echo "<td>".$valor->Matricula."</td>";                                                                                                                                        
                                break;                                                                                                                                                                                           
                            case 'Mês':                                
                                echo "<td><a href='#' onclick=ShowPagamento(". $valor->Matricula . ',' . $valor->MesPagamento. ',' . $valor->AnoPagamento . ',' . $valor->NumeroContrato .") data-toggle='modal' data-target='#myModal'>". $valor->MesPagamento ."</a></td>";
                                break;
                            case 'Ano':
                                echo "<td><a href='#' onclick=ShowPagamento(". $valor->Matricula . ',' . $valor->MesPagamento. ',' . $valor->AnoPagamento . ',' . $valor->NumeroContrato .") data-toggle='modal' data-target='#myModal'>". $valor->AnoPagamento ."</a></td>";
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
    function ShowPagamento(matricula, mes, ano, contrato) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowPagamento')}}", {Matricula: matricula, Mes: mes, Ano: ano, Contrato: contrato}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>Folha de Pagamento de: </span> ' + data[0].Nome;

            var creditos = '';
            var debitos = '';
            var neutros = '';
            var add = 0;
            var liquido = 0;
            var ExisteNeutro = false;                        
            $.each(data, function(i, valor){
                if (valor.TipoEvento == "Crédito"){
                    add = add + valor.Valor;
                    creditos = creditos + '<tr>'+                                                                                      
                            '<td>' + valor.DescricaoEvento + '</td>'+                                                        
                            '<td>' + currencyFormat(valor.Valor) + '</td>'+
                            '</tr>';
                }else if (valor.TipoEvento == "Débito"){
                    liquido = liquido + valor.Valor;
                    debitos = debitos + '<tr>'+                                                                                      
                            '<td>' + valor.DescricaoEvento + '</td>'+                                                                                    
                            '<td>' + currencyFormat(valor.Valor) + '</td>'+
                            '</tr>';
                }else if (valor.TipoEvento == "Neutro"){
                    existeNeutro = true;
                    neutros = neutros + '<tr>'+                                                                                      
                            '<td>' + valor.DescricaoEvento + '</td>'+                                                        
                            '<td>' + currencyFormat(valor.Valor) + '</td>'+
                            '</tr>';
                }
            });
            if (ExisteNeutro){
                var aux = neutro;
                neutros = '<tr>'+
                          '<th colspan="2">NEUTROS</th>'+                                            
                          '</tr>'+
                          aux;
            }
            liquido = add - liquido;

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
                                            '<td>Nome do Servidor:</td>' +
                                            '<td>' + data[0].Nome + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Matrícula:</td>' +
                                            '<td>' + data[0].Matricula + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Número do Contrato:</td>' +
                                            '<td>' + data[0].NumeroContrato + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>CPF:</td>' +
                                            '<td>' + FormatCpfCnpj(data[0].CPF) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Data do Pagamento:</td>' +
                                            '<td>' + data[0].MesPagamento + '/' + data[0].AnoPagamento + '</td>'+                                                        
                                            '</tr>' +                                                                                                      
                                        '</tbody>'+
                                    '</table>'+

                                    '<table class="table table-sm" style="font-size:'+tamanho+'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">CRÉDITOS</th>'+                                            
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>' +
                                        creditos +
                                        '<tr>'+
                                        '<th colspan="2">DÉBITOS</th>'+
                                        '</tr>'+
                                        debitos +
                                        neutros;                                        
                                                                                                                                                                                                                                               
            body = body + '</tbody>'+'</table>';

            body = body + '<table class="table table-sm" style="font-size:'+tamanho+'">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th>SALÁRIO BRUTO</th>'+
                                            '<th>' + 'R$ ' + currencyFormat(add) +'</th>'+                                            
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>' +                                        
                                        '<tr>'+
                                        '<th>SALÁRIO LÍQUIDO</th>'+
                                        '<th>' +  'R$ ' + currencyFormat(liquido) +'</th>'+ 
                                        '</tr>'; 


            body = body + '</tbody>'+'</table>';
            body = body + '</div>' + '</div>';
            body=body+'<div style="text-align: justify;color:#4C4C4C;">'+
                       '<span>Obs.: O salário líquido pode não corresponder ao valor efetivamente recebido pelo servidor, porque não são exibidos os descontos de cunho pessoal, como empréstimo consignado ou pensão alimentícia.</span>'+
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
    filename:'folha pagamento'
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