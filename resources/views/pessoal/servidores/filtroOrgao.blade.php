@extends('formFiltro')

@section('htmlheader_title')
    Servidores
@stop

@section('filtro_titulo')
    Por Órgão
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/servidores/orgao', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-sm-6 col-lg-4">
                {{ Form::label('Orgão', '', array('id'=>'lblTipoConsulta')) }}
                {{ Form::select('selectTipoConsulta', array(), 'default', array('id'=>'selectTipoConsulta', 'class'=>'form-control')) }}
            </div>
            <div class="col-sm-6 col-lg-4">
                {{ Form::label('Situação', '', array('id'=>'lblTipoConsulta2')) }}
                {{ Form::select('selectTipoConsulta2', array(), 'default', array('id'=>'selectTipoConsulta2', 'class'=>'form-control')) }}
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
                $('#selectTipoConsulta').show();
                $('#selectTipoConsulta').addClass("select2");
                var select = document.getElementById("selectTipoConsulta");
                arrayTipoConsulta2(dadosDb,select);

                var dadosDb2=<?php echo $dadosDb2 ?>;
                $('#selectTipoConsulta2').show();
                $('#selectTipoConsulta2').addClass("select2");
                var select = document.getElementById("selectTipoConsulta2");
                arrayTipoConsulta2(dadosDb2,select);
                $('#selectTipoConsulta2 option[value="Ativo"]').attr("selected",true);
                
                $(".select2").select2();
             });
    </script>
@endsection