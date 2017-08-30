@extends('formFiltro')

@section('htmlheader_title')
    Empenhos
@stop

@section('filtro_titulo')
    Nota de Empenho
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/despesas/empenhos/nota', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-md-4">
                {{ Form::label('Número da Nota', '', array('id'=>'lblTipoConsulta')) }}
                {{ Form::text('txtNumeroNota', '', array('id'=>'txtTipoConsulta', 'class' => 'form-control')) }}                                
            </div>            
        </div>                                                
        <div class="row form-group">
            <div class="col-md-6">
                {{ Form::submit('Pesquisar', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
        @if(session()->has('message'))
        <div class="col-md-8 alert alert-danger" style="font-size:16px">
            {{ session()->get('message') }}
        </div>
        @endif
    {{ Form::close() }}
@stop
