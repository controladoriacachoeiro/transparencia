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
                            case 'Órgão':
                                echo "<td>".$valor->OrgaoLicitante."</td>";
                                break;
                            case 'Número do Processo':
                                echo "<td><a href='#' onclick=ShowLicitacao(". $valor->LicitacaoID . ") data-toggle='modal' data-target='#myModal'>". $valor->NumeroProcesso ."</a></td>";                                                                                                                                       
                                break;
                            case 'Objeto Licitado':                                                                    
                                echo "<td>".$valor->ObjetoLicitado."</td>";                                                                                                                                        
                                break;                                                           
                            case 'Data da Proposta':                                                                    
                                    //echo "<td>".$valor->DataPropostas."</td>";
                                    echo "<td>".date("d/m/Y", strtotime($valor->DataPropostas ))."</td>";
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
    function ShowLicitacao(licitacaoID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowLicitacaoAndamento')}}", {LicitacaoID: licitacaoID}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Licitação para: </span> ' + data[0].ObjetoLicitado;
                                                                                                                                                                                    
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
                                            '<td>' + data[0].OrgaoLicitante + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Objeto Licitado:</td>' +
                                            '<td>' + data[0].ObjetoLicitado + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Número Processo:</td>' +
                                            '<td>' + data[0].NumeroProcesso + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Modalidade:</td>' +
                                            '<td>' + data[0].ModalidadeLicitatoria + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Data da Proposta:</td>' +
                                            '<td>' + stringToDate(data[0].DataPropostas )+ '</td>'+                                                        
                                            '</tr>' +                                        
                                        '</tbody>'+
                                    '</table>'+
                                    '<a href="/licitacoescontratos/andamento/download/' + data[0].LicitacaoID + '" class="btn btn-info" role="button">Download do Edital</a>';
                                                
            body = body + '</div>' + '</div>';


            document.getElementById("modal-body").innerHTML = body;

        });
    }

function stringToDate(date)
{
    var parts=date.split('-');
    var formatedDate = (parts[2]+'/'+parts[1]+'/'+parts[0]);         
    return formatedDate;
}
</script>


@stop