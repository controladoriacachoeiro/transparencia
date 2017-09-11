@extends('formFiltro')

@section('htmlheader_title')
    Almoxarifado
@stop

@section('filtro_titulo')
    Por Almoxarifado
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/patrimonios/almoxarifado/porAlmoxarifado', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-md-4">
                {{ Form::label('Almoxarifado', '', array('id'=>'lblAlmoxarifado')) }}
                {{ Form::select('slcAlmoxarifado', array(), 'default', array('id'=>'slcAlmoxarifado', 'class'=>'form-control')) }}
            </div>            
        </div>                                                
        <div class="row form-group">
            <div class="col-md-6">
                {{ Form::submit('Pesquisar', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
@stop

@section('scriptsadd')
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/options.min.js') }}"></script>  
    <script>
            $(document).ready(function() {        
                var dadosDb=<?php echo $dadosDb ?>;
                $('#slcAlmoxarifado').show();
                $('#slcAlmoxarifado').addClass("select2");
                var select = document.getElementById("slcAlmoxarifado");
                arrayTipoConsulta2(dadosDb,select);
                $(".select2").select2();
             });    

    </script>
@endsection