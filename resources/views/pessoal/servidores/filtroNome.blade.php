@extends('formFiltro')

@section('contentForm')
    {{ Form::open(array('url' => '/servidores/nome', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-sm-4">
                {{ Form::label('Nome', '', array('id'=>'lblTipoConsulta')) }}
                {{ Form::text('txtNome', '', array('id'=>'txtTipoConsulta', 'class' => 'form-control')) }}                                
            </div>            
        </div>                                                
        <div class="row form-group">
            <div class="col-md-6">
                {{ Form::submit('Pesquisar', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
@stop