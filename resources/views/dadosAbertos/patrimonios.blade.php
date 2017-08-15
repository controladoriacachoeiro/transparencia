@extends('formFiltro')

@section('htmlheader_title')
    Patrimônios
@stop
@section('contentForm')

<div class="box-group" id="accordion">

<!--Almoxarifado-->
  <div class="panel box box-primary">
    <div class="box-header with-border">
      <h4 class="box-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
          Almoxarifado
        </a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="box-body">
        {{ Form::open(array('url' => '/dadosabertos/patrimonios/almoxarifado', 'method' => 'POST')) }}
        <div class="row form-group">    
        </div>
       <div class="row form-group">
                <div class="col-md-2" style="width: 110px;">
                    {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
                <div class="col-md-2 button-detalhes">
                    <span class="btn btn-primary" data-toggle="collapse" data-target="#almoxarifado">Detalhes</span>
                </div>
        </div>
        
      </div>
      <!--Tabela de Descricao-->
        <div id="almoxarifado" class="collapse">
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
                                    <td>Item</td>
                                    <td>string</td>
                                    <td>Nome identificador do material, ex: Assadeira, Avental, Bota, Cabo, Botina, etc</td>
                                </tr>
                                <tr>
                                    <td>Almoxarifado localizado</td>
                                    <td>string</td>
                                    <td>Nome identificador do almoxarifado onde o item está armazenado</td>
                                </tr>
                                <tr>
                                    <td>Órgão</td>
                                    <td>string</td>
                                    <td>Órgão ao qual o almoxarifado está vinculado</td>
                                </tr>
                                <tr>
                                    <td>Grupo Material</td>
                                    <td>string</td>
                                    <td>Nome do grupo de material. Ex: Material de Copa e Cozinha; Material de Expediente, etc</td>
                                </tr>
                                <tr>
                                    <td>Especificação</td>
                                    <td>string</td>
                                    <td>Especificação detalhada do material</td>
                                </tr>
                                <tr>
                                    <td>Quantidade</td>
                                    <td>string</td>
                                    <td>Quantidade em estoque do item</td>
                                </tr>
                                <tr>
                                    <td>Valor do Item</td>
                                    <td>string</td>
                                    <td>Valor de aquisição do item</td>
                                </tr>                      
                            </tbody>
                        </table>
        </div> 
      <!--Fim Tabela de Descricao-->
    </div>
  </div>

<!--Bens Moveis-->
  <div class="panel box box-primary">
    <div class="box-header with-border">
      <h4 class="box-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
          Bens Móveis
        </a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="box-body">
        {{ Form::open(array('url' => '/dadosabertos/patrimonios/bensmoveis', 'method' => 'POST')) }}
        <div class="row form-group">    
        </div>                                              
        <div class="row form-group">
                <div class="col-md-2" style="width: 110px;">
                    {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
                <div class="col-md-2 button-detalhes">
                    <span class="btn btn-primary" data-toggle="collapse" data-target="#bens">Detalhes</span>
                </div>
        </div>
      </div>
      <!--Tabela de Descricao-->
        <div id="bens" class="collapse">
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
                                    <td>Número Patrimônio</td>
                                    <td>string</td>
                                    <td>Código Identificador do bem</td>
                                </tr>
                                <tr>
                                    <td>Descrição</td>
                                    <td>string</td>
                                    <td>Descrição permita entender o que é o bem móvel</td>
                                </tr>
                                <tr>
                                    <td>Órgão</td>
                                    <td>string</td>
                                    <td>Órgão onde o bem está localizado</td>
                                </tr>
                                <tr>
                                    <td>Observação</td>
                                    <td>string</td>
                                    <td>Observações a respeito do bem móvel</td>
                                </tr>
                                <tr>
                                    <td>Valor</td>
                                    <td>string</td>
                                    <td>Valor de avaliação do bem imóvel</td>
                                </tr>                                              
                            </tbody>
                        </table>
        </div> 
      <!--Fim Tabela de Descricao-->
    </div>
  </div>

  <!--Frota-->
  <div class="panel box box-primary">
    <div class="box-header with-border">
      <h4 class="box-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
          Frota
        </a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="box-body">
        {{ Form::open(array('url' => '/dadosabertos/patrimonios/frota', 'method' => 'POST')) }}
        <div class="row form-group">    
        </div>                                              
        <div class="row form-group">
                <div class="col-md-2" style="width: 110px;">
                    {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
                <div class="col-md-2 button-detalhes">
                    <span class="btn btn-primary" data-toggle="collapse" data-target="#frota">Detalhes</span>
                </div>
        </div>
      </div>
      <!--Tabela de Descricao-->
        <div id="frota" class="collapse">
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
                                    <td>Placa</td>
                                    <td>string</td>
                                    <td>Placa do Veículo</td>
                                </tr>
                                <tr>
                                    <td>Propriedade</td>
                                    <td>string</td>
                                    <td>Identificar se o veículo é próprio, locado, cedido, etc</td>
                                </tr>
                                <tr>
                                    <td>Marca</td>
                                    <td>string</td>
                                    <td>Marca do Veículo (ex. Ford, Fiat, etc)</td>
                                </tr>
                                <tr>
                                    <td>Modelo</td>
                                    <td>string</td>
                                    <td>Modelo do Veículo (ex. Gol, Palio, Fiesta, etc)</td>
                                </tr>
                                <tr>
                                    <td>Ano</td>
                                    <td>string</td>
                                    <td>Ano de Fabricação do Veículo</td>
                                </tr>  
                                <tr>
                                    <td>Cor</td>
                                    <td>string</td>
                                    <td>Cor do Veículo</td>
                                </tr> 
                                <tr>
                                    <td>Destinação Atual</td>
                                    <td>string</td>
                                    <td>Descrição da destinação do veículo. Se está em uso, por qual secretaria está sendo usado, se está cedido, baixado etc</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>string</td>
                                    <td>Status atual do veículo (em utilização, em manuteção, etc)</td>
                                </tr>
                                <tr>
                                    <td>Categoria</td>
                                    <td>string</td>
                                    <td>Categoria do veículo (leve, pesado, etc)</td>
                                </tr>
                                <tr>
                                    <td>Subcategoria</td>
                                    <td>string</td>
                                    <td>Subcategoria do veículo (administrativo, transporte, etc)</td>
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
@endsection