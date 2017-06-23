@extends('formFiltro')

@section('cssheader')
	  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" />
@endsection

@section('contentForm')
    {{ Form::open(array('route' => 'filtrarNumero', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-sm-4">
                {{ Form::label('Número Patrimônio', '', array('id'=>'lblTipoConsulta')) }}
                {{ Form::text('txtpatrimonio', '', array('id'=>'txtTipoConsulta', 'class' => 'form-control')) }}                                

            </div>            
        </div>                                                
        <div class="row form-group">
            <div class="col-md-6">
                {{ Form::submit('Pesquisar', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
    
@stop




