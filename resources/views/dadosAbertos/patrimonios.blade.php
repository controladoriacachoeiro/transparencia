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
            <div class="col-md-6">
                {{ Form::submit('Pesquisar', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
        {{ Form::close() }}
      </div>
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
            <div class="col-md-6">
                {{ Form::submit('Pesquisar', array('class'=>'btn btn-primary')) }}
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