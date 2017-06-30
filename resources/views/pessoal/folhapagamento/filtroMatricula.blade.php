@extends('formFiltro')

@section('htmlheader_title')
    Folha de Pagamento
@stop

@section('filtro_titulo')
    Por Matrícula
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/folhadepagamento/matricula', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-md-4">
                {{ Form::label('Matrícula do Servidor', '', array('id'=>'lblTipoConsulta')) }}
                {{ Form::text('txtMatricula', '', array('id'=>'txtTipoConsulta', 'class' => 'form-control')) }}                                
            </div>            
        </div>                                                
        <div class="row form-group">
            <div class="col-md-6">
                {{ Form::submit('Pesquisar', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
@stop