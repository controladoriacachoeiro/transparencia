@extends('formFiltro')

@section('htmlheader_title')
    Receita Lançada
@stop

@section('filtro_titulo')
    Por Serviço
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/receitas/lancamentos/servico', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-md-4">
                {{ Form::label('Serviços', '', array('id'=>'lblTipoConsulta')) }}
                {{ Form::select('selectTipoConsulta', array(), 'default', array('id'=>'selectTipoConsulta', 'class'=>'form-control')) }}
            </div>            
        </div>
        @include('layouts.filtroPeriodo')                                                
        <div class="row form-group">
            <div class="col-md-6">
                {{ Form::submit('Pesquisar', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
    
@endsection

@section('scriptsadd')
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/options.min.js') }}"></script>  
    <script>
            $(document).ready(function() {        
                var dadosDb=<?php echo $dadosDb ?>;
                $('#selectTipoConsulta').show();
                $('#selectTipoConsulta').addClass("select2");
                var select = document.getElementById("selectTipoConsulta");
                arrayTipoConsulta2(dadosDb,select);
                $(".select2").select2();
             });    

    </script>
@endsection