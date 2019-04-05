@extends('formFiltro')

@section('htmlheader_title')
    Atas de Registro de Preço
@stop

@section('filtro_titulo')
    Por Situação
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/licitacoescontratos/ataregistropreco', 'method' => 'POST')) }}

        <div class="row form-group">
            <div class="col-md-4 filtro-form">
                {{ Form::label('Situação', '', array('id'=>'lblSituacao')) }}
                {{ Form::select('slcSituacao', array(), 'default', array('id'=>'slcSituacao', 'class'=>'form-control')) }}
            </div>
            <div class="col-md-4 filtro-form">
                {{ Form::label('Fornecedor / Número da Ata / Descrição', '', array('id'=>'lblDescricao')) }}
                {{ Form::text('slcDescricao', '', array('id'=>'slcDescricao', 'class'=>'form-control')) }}
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
            $('#slcSituacao').show();
            $('#slcSituacao').addClass("select2");
            var select = document.getElementById("slcSituacao");
            arrayTipoConsulta2(dadosDb,select);
            $('#slcSituacao option[value="VIGENTE"]').attr("selected",true);
            $(".select2").select2();
            });
    </script>
@endsection