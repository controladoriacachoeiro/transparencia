@extends('licitacoescontratos.tabelaLiciCon')

@section('htmlheader_title')
    Convênios Cedidos
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
                                echo "<td>".$valor->OrgaoConcedente."</td>";
                                break;
                            case 'Beneficiário':
                                echo "<td><a href='#' onclick=ShowConvenioCedido(". $valor->ConveniosID . ") data-toggle='modal' data-target='#myModal'>". $valor->NomeBeneficiario ."</a></td>";
                                break;
                            case 'Data':                                                                    
                                echo "<td>".date("d/m/Y", strtotime($valor->DataCelebracao ))."</td>";                                                                                                                                        
                                break;                                                           
                            case 'Valor':                                                                    
                                    echo "<td>". number_format($valor->ValorACeder, 2, ',', '.') ."</td>";
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
    function ShowConvenioCedido(convenioID) {
        document.getElementById("modal-body").innerHTML = '';
        document.getElementById("titulo").innerHTML = '';
        
        $.get("{{ route('ShowConvenioCedido')}}", {ConvenioID: convenioID}, function(value){
            var data = JSON.parse(value)
            document.getElementById("titulo").innerHTML = '<span>Convênio cedido para: </span> ' + data[0].NomeBeneficiario;
                                                                                                                                                                                    
            var body = '' + '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<table class="table table-sm">'+
                                        '<thead>'+
                                            '<tr>'+
                                            '<th colspan="2">DADOS DO CONVÊNIO</th>'+                                                    
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+                                                    
                                            '<td>Orgão Concedente:</td>' +
                                            '<td>' + data[0].OrgaoConcendente + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Nome Beneficiário:</td>' +
                                            '<td>' + data[0].NomeBeneficioario + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>CNPJ:</td>' +
                                            '<td>' + data[0].CNPJBeneficiario + '</td>'+                                                        
                                            '</tr>'+
                                            '<tr>'+                                                        
                                            '<td>Objeto:</td>' +
                                            '<td>' + data[0].Objeto + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Data da Celebração:</td>' +
                                            '<td>' + stringToDate(data[0].DataCelebracao )+ '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Prazo:</td>' +
                                            '<td>' + data[0].PrazoVigencia + '</td>'+                                                        
                                            '</tr>' +
                                            '<tr>'+
                                            '<td>Valor Cedido:</td>' +
                                            '<td>' + data[0].ValorACeder + '</td>'+                                                        
                                            '</tr>' +                                         
                                        '</tbody>'+
                                    '</table>'+
                                    '<a href="/convenios/cedidos/download/' + data[0].ConveniosID + '" class="btn btn-info" role="button">Download do Edital</a>';
                                                
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