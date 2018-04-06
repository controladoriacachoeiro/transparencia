@extends('pessoal.tabelaPessoal')

@section('htmlheader_title')
    Servidores
@stop

@section('elementosDoFiltro')
    <span class="quadroFiltro">Cargo/Função</span>: {{$cargofuncao}} </br>
    <span class="quadroFiltro">Situação</span>: {{$situacao}} 
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
                            case 'Cargo/Função':
                                echo "<td scope='col'><a href='". route('MostrarServidoresCargoFuncao', ['cargofuncao' => $valor->Cargo, 'situacao' => $situacao]) ."'>". $valor->Cargo ."</a></td>"; 
                                break;
                            case 'Nome':                                    
                                    echo "<td scope='col'><a href='#' onclick=ShowServidor(". $valor->ServidorID . ") data-toggle='modal' data-target='#myModal'>". $valor->Nome ."</a></td>";                                                                        
                                break;
                            case 'Órgão Lotação':                                                                                                                              
                                    echo "<td scope='col'>" . $valor->OrgaoLotacao . "</td>";                                                                                                                                                                        
                                break;
                            case 'Quantidade de Servidores':
                                echo "<td scope='col'>" . $valor->Quantidade . "</td>";
                                break;
                            case 'Matrícula':                                                                    
                                echo "<td scope='col'>" . $valor->Matricula . "</td>";                                                                                                                                        
                                break;                                                                 
                            case 'Cargo':                                                                    
                                echo "<td scope='col'>". $valor->Cargo . "</td>";                                                                                                                                                                                                                
                                break;
                            case 'Função':                                                                    
                                echo "<td scope='col'>". $valor->Funcao . "</td>";                                                                                                                                                                                                                
                                break;                                                                  
                            case 'Situação':
                                echo "<td scope='col'>" . $valor->Situacao . "</td>";
                                break;
                            case 'Mês':
                                echo "<td scope='col'>" . $valor->MesPagamento . "</td>";
                                break;
                            case 'Ano':
                                echo "<td scope='col'>" . $valor->AnoPagamento . "</td>";
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
    function ShowServidor(id) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        tamanho=$("table").css('font-size');
        $.get("{{ route('ShowServidor')}}", {ServidorID: id}, function(value){
            var data = JSON.parse(value);
            $("#myModalLabel").css('font-size',tamanho);
            document.getElementById("titulo").innerHTML = '<span>Servidor: </span> ' + data[0].Nome;
                                                                                                                                                                                    
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
                                            '<td>CPF:</td>' +
                                            '<td>' + FormatCpfCnpj(data[0].CPF) + '</td>'+                                                        
                                            '</tr>'+                                            
                                            '<tr>'+                                                        
                                            '<td>Cargo Efetivo:</td>' +
                                            '<td>' + $.trim(data[0].Cargo) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Função Gratificada:</td>' +
                                            '<td>' + $.trim(data[0].Funcao) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Tipo de Vínculo:</td>' +
                                            '<td>' + $.trim(data[0].TipoVinculo) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Início do Exercício:</td>' +
                                            '<td>' + stringToDate(data[0].DataExercicio) + '</td>'+                                                        
                                            '</tr>';
                                            if(data[0].DataDemissao != null){
                                                body = body +
                                                        '<tr>'+
                                                        '<td>Data da Demissão:</td>' +
                                                        '<td>' + stringToDate(data[0].DataDemissao) + '</td>'+                                                        
                                                        '</tr>';
                                            }                                            
                                            body = body + 
                                            '<tr>'+
                                            '<td>Órgão de Lotação :</td>' +
                                            '<td>' + $.trim(data[0].OrgaoLotacao) + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Situação Funcional :</td>' +
                                            '<td>' + data[0].Situacao + '</td>'+                                                        
                                            '</tr>' + 
                                            '<tr>'+
                                            '<td>Carga Horária Semanal:</td>' +
                                            '<td>' + data[0].CargaHoraria + ' Horas</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<th colspan="2">Enquadramento Salarial</th>'+                                                    
                                            '</tr>'+
                                            '<tr>'+
                                            '<td>Referência:</td>';
                                            if((data[0].Referencia == '')||(data[0].Referencia == null)){
                                                body = body+'<td>Não se aplica</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data[0].Referencia) + '</td>'; 
                                            }
                                            body = body + '</tr>' +                                            
                                            '<tr>'+
                                            '<td>Sigla:</td>';
                                            if((data[0].Sigla == '')||(data[0].Sigla == null)){
                                                body = body + '<td>Não se aplica</td>';
                                            }
                                            else{
                                                body = body + '<td>' + $.trim(data[0].Sigla) + '</td>'; 
                                            }
                                        body = body+'</tr>' +                                                                                                                                                  
                                        '</tbody>'+
                                    '</table>'+
                                '<a href="/folhadepagamento/matricula/' + data[0].Matricula + '"class="btn btn-info" role="button">Contracheque</a>'
                                                
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
    filename:'servidor cargo/funcao'
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