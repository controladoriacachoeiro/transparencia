@extends('formFiltro')

@section('htmlheader_title')
    Pessoal
@stop
@section('contentForm')

<div class="box-group" id="accordion">
<!--Almoxarifado-->
  <div class="panel box box-primary">
    <div class="box-header with-border">
      <h4 class="box-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
          Servidor
        </a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="box-body">
        {{ Form::open(array('url' => '/dadosabertos/pessoal/servidores', 'method' => 'POST')) }}
        <div class="row form-group">    
               <div class="col-md-4">
                {{ Form::label('Nome', '', array('id'=>'lblNome')) }}
                {{ Form::text('txtNome', '', array('id'=>'txtNome', 'class' => 'form-control')) }}                                
            </div> 
        </div>                                              
        <div class="row form-group">
                <div class="col-md-2" style="width: 110px;">
                    {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
                <div class="col-md-2 button-detalhes">
                    <span class="btn btn-primary" data-toggle="collapse" data-target="#servidores">Detalhes</span>
                </div>
        </div>
        
      </div>
      <!--Tabela de Descricao-->
        <div id="servidores" class="collapse">
          <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Coluna</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                    <th style='vertical-align:middle'>Descriçao</th>
                                </tr>
                            </thead>                            
                            <tbody>
                                <tr>
                                    <td>Matricula</td>
                                    <td>string</td>
                                    <td>Número de matrícula identificando o Servidor na Administração Municipal</td>
                                </tr>
                                <tr>
                                    <td>CPF</td>
                                    <td>string</td>
                                    <td>Número do CPF do servidor, podendo estar parte oculta</td>
                                </tr>
                                <tr>
                                    <td>Nome</td>
                                    <td>string</td>
                                    <td>Nome completo do Servidor</td>
                                </tr>
                                <tr>
                                    <td>Cargo</td>
                                    <td>string</td>
                                    <td>Indicação do nome do cargo efetivo que o servidor ocoupa</td>
                                </tr>
                                <tr>
                                    <td>Funcao</td>
                                    <td>string</td>
                                    <td>Identificação do Cargo Comissionado ou Função Gratificada que o servidor exerce</td>
                                </tr>
                                <tr>
                                    <td>Tipo Vinculo</td>
                                    <td>string</td>
                                    <td>Tipo de vínculo, se Efetivo, Comissionado, Temporário ou outro</td>
                                </tr>
                                <tr>
                                    <td>Data Exercício</td>
                                    <td>string</td>
                                    <td>Data em que o servidor entrou em exercício</td>
                                </tr>
                                <tr>
                                    <td>Data Demissão</td>
                                    <td>string</td>
                                    <td>Data em que o servidor foi exonerado do seu cargo ou função</td>
                                </tr>
                                <tr>
                                    <td>Situação</td>
                                    <td>string</td>
                                    <td>Situação do Servidor na data em pesquisa, se Ativo, em Licença Remunerada, em Licença sem Vencimentos, etc</td>
                                </tr>
                                <tr>
                                    <td>Órgão</td>
                                    <td>string</td>
                                    <td>Órgão onde o servidor exerce suas atividades</td>
                                </tr>
                                <tr>
                                    <td>Carga Horária</td>
                                    <td>string</td>
                                    <td>Informação da carga horária Semanal ou Diária do servidor</td>
                                </tr>
                                <tr>
                                    <td>Referência</td>
                                    <td>string</td>
                                    <td>campo responável pelo enquadramento salarial</td>
                                </tr>
                                <tr>
                                    <td>Sigla</td>
                                    <td>string</td>
                                    <td>campo responável pelo enquadramento salarial</td>
                                </tr>
                                <tr>
                                    <td>Referência Sigla</td>
                                    <td>string</td>
                                    <td>campo responável pelo enquadramento salarial</td>
                                </tr>
                                 
                            </tbody>
                        </table>
        </div> 
      <!--Fim Tabela de Descricao-->
    </div>
  </div>

<!--Folha de Pagamento-->
  <div class="panel box box-primary">
    <div class="box-header with-border">
      <h4 class="box-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
          Folha de Pagamento
        </a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="box-body">
        {{ Form::open(array('url' => '/dadosabertos/pessoal/folhapagamento', 'method' => 'POST')) }}
        <div class="row form-group">   
            <div class="col-sm-4 col-md-4 col-lg-2">
                {{ Form::label('Mês', '', array('id'=>'lblTipoConsulta')) }}
                {{ Form::select('txtMes', array('01'=>'Janeiro','02'=>'Fevereiro','03'=>'Março','04'=>'Abril','05'=>'Maio',
                '06'=>'Junho','07'=>'Julho','08'=>'Agosto','09'=>'Setembro','10'=>'Outubro','11'=>'Novembro','12'=>'Dezembro'), 'default', array('id'=>'selectTipoConsulta2', 'class'=>'form-control ajuste-campo')) }}
            </div>   
            <div class="col-sm-2 col-lg-2">
                {{ Form::label('Anos', '', array('id'=>'lblTipoConsulta')) }}
                <div class="row">
                    <div class="col-sm-2 col-lg-2">
                        {{ Form::select('txtAno', array(), 'default', array('id'=>'selectTipoConsulta', 'class'=>'form-control '))  }}
                    </div>
                </div>
            </div>    
        </div>                                              
          <div class="row form-group">
                <div class="col-md-4" style="width: 110px;">
                    {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
                <div class="col-md-2 button-detalhes">
                    <span class="btn btn-primary" data-toggle="collapse" data-target="#folha">Detalhes</span>
                </div>
        </div>
        
      </div>
      <!--Tabela de Descricao-->
        <div id="folha" class="collapse">
          <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Coluna</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                    <th style='vertical-align:middle'>Descriçao</th>
                                </tr>
                            </thead>
                            <tbody>                           
                                <tr>
                                    <td>Matrícula</td>
                                    <td>string</td>
                                    <td>Número de matrícula identificando o Servidor na Administração Municipal</td>
                                </tr>   
                                <tr>
                                    <td>Nome</td>
                                    <td>string</td>
                                    <td>Nome completo do servidor</td>
                                </tr>
                                <tr>
                                    <td>CPF</td>
                                    <td>string</td>
                                    <td>Número do CPF do servidor, podendo estar parte oculta</td>
                                </tr>
                                <tr>
                                    <td>Mês</td>
                                    <td>string</td>
                                    <td>Mês ao qual se refere aquele pagamento</td>
                                </tr>         
                                <tr>
                                    <td>Ano</td>
                                    <td>string</td>
                                    <td>Ano ao qual se refere a rubrica lançada no pagamento</td>
                                </tr>   
                                <tr>
                                    <td>Evento</td>
                                    <td>string</td>
                                    <td>Código numérico que identifica unicamente a rubrica do pagamento</td>
                                </tr>    
                                <tr>
                                    <td>Descricao Evento</td>
                                    <td>string</td>
                                    <td>Descrição da rubrica (ex.: Vencimento, Adicional por Tempo de Serviço, Décimo Terceiro Salário, etc)</td>
                                </tr> 
                                <tr>
                                    <td>Tipo Envento</td>
                                    <td>string</td>
                                    <td>Identificador se a rubrica é uma rubrica de crédito ou de débito</td>
                                </tr>
                                <tr>
                                    <td>Quantidade</td>
                                    <td>string</td>
                                    <td>Refere-se ao campo “Quantidade” listado no contracheque. Exemplo: 11%, 27,5%, 29D, etc</td>
                                </tr>
                                <tr>
                                    <td>Valor</td>
                                    <td>string</td>
                                    <td>Valor de crédito ou débito da rubrica</td>
                                </tr>
                            </tbody>
                        </table>
        </div> 
      <!--Fim Tabela de Descricao-->
    </div>
  </div>

</div>

@endsection

@section('scriptsadd')
<link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/options.js') }}"></script> 
    <script src="https://rawgit.com/digitalBush/jquery.maskedinput/master/dist/jquery.maskedinput.min.js"></script>
    <script>
    for (i = 1; i <= 4 ; i++) { 
        jQuery(function($) {
            $(document).on('focus', '#datetimepickerDataInicio'+i, function () {
                var me = $("#datetimepickerDataInicio"+i);
                me.mask('99/99/9999');
            });
            $(document).on('focus', '#datetimepickerDataFim'+i, function () {
                var me = $("#datetimepickerDataFim"+i);
                me.mask('99/99/9999');
            });  
        });
        //configura os calendários de data de início e data fim
        datepickerFiltro('#datetimepickerDataInicio'+i, '#datetimepickerDataFim'+i);
    }
    </script>  
    <script>
            $(document).ready(function() {        
                $('#selectTipoConsulta').show();
                $('#selectTipoConsulta').addClass("select2");
                var select = document.getElementById("selectTipoConsulta");
                montarAnoDropdown(select);
                $(".select2").select2();
             });    
    </script>
@endsection