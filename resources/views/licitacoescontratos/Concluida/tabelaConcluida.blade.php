@extends('licitacoescontratos.tabelaLiciCon')

@section('htmlheader_title')
    Licitações Conlcuídas
@stop

@section('contentTabela')
    <div class="row" style="overflow:auto">
        <table id="tabela" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?PHP
                        foreach ($colunaDados as $valor) {                            
                            if($valor == "Data da Proposta"){
                                echo "<th style='vertical-align:middle' data-dynatable-column='dataColumn'>" . $valor . "</th>";                            
                            }else{
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
                            case 'Órgão':
                                echo "<td>".$valor->OrgaoLicitante."</td>";
                                break;
                            case 'Número do Processo':
                                echo "<td>" . $valor->NumeroProcesso ."</a></td>";                                                                                                                                       
                                break;
                            case 'Objeto Licitado':                                                                    
                                echo "<td><a href='#' onclick=ShowLicitacao(". $valor->LicitacaoConcluidaID . ") data-toggle='modal' data-target='#myModal'>". $valor->ObjetoLicitado . "</td>";                                                                                                                                        
                                break;                                                           
                            case 'Data da Proposta':                                                                                                        
                                    echo "<td>". $valor->DataPropostas ."</td>";
                                break;  
                            case 'Modalidade':                                                                    
                                    echo "<td>".$valor->ModalidadeLicitatoria."</td>";  
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
    function ShowLicitacao(licitacaoConcluidaID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowLicitacaoConcluida')}}", {LicitacaoConcluidaID: licitacaoConcluidaID}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Licitação Concluída</span>';
                                                                                                                                                                                    
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS DA LICITAÇÃO</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                    
                                            '<td>Orgão Licitante:</td>' +
                                            '<td>' + $.trim(data[0].OrgaoLicitante) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Objeto Licitado:</td>' +
                                            '<td>' + data[0].ObjetoLicitado + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Número Processo:</td>' +
                                            '<td>' + $.trim(data[0].NumeroProcesso) + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Modalidade:</td>' +
                                            '<td>' + $.trim(data[0].ModalidadeLicitatoria) + '</td>'+
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Data da Proposta:</td>' +
                                            '<td>' + stringToDate(data[0].DataPropostas )+ '</td>'+                                                        
                                            '</tr>' +                                        
                                        '</tbody>'+
                                    '</table>';
                                    if ((data[0].IntegraEditalNome != ' ') && (data[0].IntegraEditalNome != null)){
                                        body = body + '<a href="/licitacoescontratos/concluida/Download/' + data[0].LicitacaoConcluidaID + '" class="btn btn-info" role="button">Download do Edital</a>';    
                                    }
                                                
            body = body + '</div>' + '</div>';


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
               , filename: 'Licitacoes_concluida'
            });
        });
    });
</script>
<script>    
 $(document).ready(function() {
      $(".export").on('click', function(event) {
        var args = [$('#tabela'), 'Licitacoes_concluida.csv'];
        exportTableToCSV.apply(this, args);
      });
    });
</script>
@stop