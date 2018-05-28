@extends('licitacoescontratos.tabelaLiciCon')

@section('htmlheader_title')
    Atas de Registro de Preço
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {
                            if ($valor == "Data da Validade"){
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
                            case 'Data da Validade':
                                echo  "<td>".$valor->DataFinal."</td>";;
                                break;
                            case 'Nº da Ata':                                
                                echo "<td><a href='#' onclick=ShowAta('".  $valor->AtaID . "') data-toggle='modal' data-target='#myModal'>". $valor->NumeroAta . "/" . $valor->AnoAta ."</a></td>";
                                break;
                            case 'Fornecedor':
                                echo "<td>".$valor->Fornecedor."</td>";   
                                break;                         
                            case 'Descrição':                                                                    
                                echo "<td>".$valor->Descricao."</td>";                                                                                                                                        
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
    function ShowAta(id) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{route('ShowAta')}}", {AtaID: id}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>Ata de Registro de Preço: ' + data.NumeroAta + '/' + data.AnoAta + '</span> ';
                                                                                                                                                                                                
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS DA ATA</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                    
                                            '<td>Número da Ata:</td>' +
                                            '<td>' + data.NumeroAta + '/' + data.AnoAta + '</td>'+
                                            '</tr>'+                                                                                                                                     
                                            '<tr>'+                                                        
                                            '<td>Fornecedor:</td>' +
                                            '<td>' + data.Fornecedor + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>CPF/CNPJ do Fornecedor:</td>' +
                                            '<td>' + data.CPF_CNPJFornecedor + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Data Inicial:</td>' +
                                            '<td>' + stringToDate(data.DataInicial) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Data Final:</td>' +
                                            '<td>' + stringToDate(data.DataFinal) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                                                                   
                                            '<td>Data da Publicação:</td>' +
                                            '<td>' + stringToDate(data.DataPublicacao) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+                                                        
                                            '<td>Data da Assinatura:</td>' +
                                            '<td>' + stringToDate(data.DataAssinatura) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+
                                            '<td>Descrição:</td>' +
                                            '<td>' + data.Descricao + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Processo Licitatório:</td>';
                                            if((data.NumeroLicitacaoOrigem == '')||(data.NumeroLicitacaoOrigem == null)){
                                                body = body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data.NumeroLicitacaoOrigem + '/' + data.AnoLicitacaoOrigem) + '</td>';
                                            }
                                            body = body + '</tr>' +
                                            '<tr>'+
                                            '<td>Modalidade Licitatório:</td>';
                                            if((data.ModalidadeLicitatoria == '')||(data.ModalidadeLicitatoria == null)){
                                                body = body+'<td>Não informado</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data.ModalidadeLicitatoria) + '</td>';
                                            }
                                            body = body + '</tr>' +                                             
                                        '</tbody>' +
                                        '</table>';
                                        if(data.Arquivos.length > 0){
                                            body = body + '<table class="table table-sm" style="font-size:'+ tamanho +'">'+
                                            '<thead>'+
                                                '<tr>'+
                                                '<th colspan="2">ANEXOS</th>'+                                                    
                                                '</tr>'+
                                            '</thead>'+
                                            '<tbody>';
                                            $.each(data.Arquivos, function (key, arquivo) {
                                                body = body + '<tr><td><a target="_blank" href="/arquivosintegra/exibirarquivo/' + arquivo.ArquivoID + '" >' + arquivo.DescricaoArquivo + '</a></td></tr>';
                                            });
                                            body = body + '</tbody> </table>';
                                        }
                                        // if (($.trim(data.IntegraAtaEXT) != '') && (data.IntegraAtaEXT != null)){
                                        //     body = body + '<a href="/licitacoescontratos/ataregistropreco/Download/' + data.AtaID + '" class="btn btn-info" role="button">Download da Ata</a>';    
                                        // }                                                                                                                                                                                                                                                                      
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
        filename:'ata-registro-de-preco'
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