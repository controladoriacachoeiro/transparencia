@extends('formFiltro')

@section('htmlheader_title')
    Bens e Produtos Adquiridos
@stop

@section('filtro_titulo')
    Por Orgão
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/licitacoescontratos/bensadquiridos/orgao', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-md-4">
                {{ Form::label('Orgão', '', array('id'=>'lblOrgao')) }}
                {{ Form::select('slcOrgao', array(), 'default', array('id'=>'slcOrgao', 'class'=>'form-control')) }}
            </div>            
        </div>     
        @include('layouts.filtroPeriodo')                                           
        <div class="row form-group">
            <div class="col-md-6">
                {{ Form::submit('Pesquisar', array('class'=>'btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
@stop

@section('scriptsadd')
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/options.js') }}"></script>  
    <script>
            $(document).ready(function() {        
                var dadosDb=<?php echo $dadosDb ?>;
                $('#slcOrgao').show();
                $('#slcOrgao').addClass("select2");
                var select = document.getElementById("slcOrgao");
                arrayTipoConsulta2(dadosDb,select);
                $(".select2").select2();
             });    

    </script>
@endsection
