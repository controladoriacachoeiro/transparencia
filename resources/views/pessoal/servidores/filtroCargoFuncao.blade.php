@extends('formFiltro')

@section('contentForm')
    {{ Form::open(array('url' => '/servidores/cargofuncao', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-md-4">
                {{ Form::label('Cargo ou Função', '', array('id'=>'lblTipoConsulta')) }}
                {{ Form::text('txtCargoFuncao', '', array('id'=>'txtTipoConsulta', 'class' => 'form-control')) }}                                
            </div>            
        </div>                                                
        <div class="row form-group">
            <div class="col-md-6">
                {{ Form::submit('Pesquisar', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
@stop
