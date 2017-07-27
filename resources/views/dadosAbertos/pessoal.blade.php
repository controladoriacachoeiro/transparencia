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
            <div class="col-md-6">
                {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
        {{ Form::close() }}
      </div>
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
            <div class="col-md-2">
                {{ Form::label('Mês', '', array('id'=>'lblTipoConsulta')) }}
                {{ Form::text('txtMes', '', array('id'=>'txtMes', 'class' => 'form-control','style'=>'width: 76px')) }}                                
            </div>   
            <div class="col-md-4">
                {{ Form::label('Ano', '', array('id'=>'lblTipoConsulta2')) }}
                {{ Form::text('txtAno', '', array('id'=>'txtAno', 'class' => 'form-control','style'=>'width: 76px')) }}                                
            </div>    
        </div>                                              
        <div class="row form-group">
            <div class="col-md-6">
                {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>

</div>

@endsection

@section('scriptsadd')
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