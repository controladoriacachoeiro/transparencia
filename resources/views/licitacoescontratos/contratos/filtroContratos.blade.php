@extends('formFiltro')

@section('htmlheader_title')
    Contratos
@stop

@section('filtro_titulo')
    Por Status
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/licitacoescontratos/contratos', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-md-4">
                {{ Form::label('Status', '', array('id'=>'lblStatus')) }}
                {{ Form::select('slcStatus', array(), 'default', array('id'=>'slcStatus', 'class'=>'form-control')) }}
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
                $('#slcStatus').show();
                $('#slcStatus').addClass("select2");
                var select = document.getElementById("slcStatus");
                arrayTipoConsulta2(dadosDb,select);
                $(".select2").select2();
             });
    </script>
@endsection