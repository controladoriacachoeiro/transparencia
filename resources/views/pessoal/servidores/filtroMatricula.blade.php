@extends('formFiltro')

@section('htmlheader_title')
    Servidores
@stop

@section('filtro_titulo')
    Por Matrícula
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/servidores/matricula', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-md-4">
                {{ Form::label('Matrícula', '', array('id'=>'lblTipoConsulta')) }}
                {{ Form::text('txtMatricula', '', array('id'=>'txtTipoConsulta', 'class' => 'form-control')) }}                                
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

@section('scriptsadd')
    <script>
        $(document).ready(function() {        
            var txtTipoConsulta = $("#txtTipoConsulta");
            txtTipoConsulta.mask('000000000000');
        });
    </script>
@endsection