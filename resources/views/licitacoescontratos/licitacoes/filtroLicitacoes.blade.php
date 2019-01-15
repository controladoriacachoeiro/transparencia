@extends('formFiltro')

@section('htmlheader_title')
    Licitações
@stop

@section('filtro_titulo')
    Filtro de Licitação
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/licitacoescontratos/licitacoes', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-md-4 filtro-form">
                {{ Form::label('Status', '', array('id'=>'lblStatus')) }}
                {{ Form::select('slcStatus', array(), 'default', array('id'=>'slcStatus', 'class'=>'form-control')) }}
            </div>
            <div class="col-md-4 filtro-form">
                {{ Form::label('Modalidade Licitatória', '', array('id'=>'lblModalidade')) }}
                {{ Form::select('slcModalidade', array(), 'default', array('id'=>'slcModalidade', 'class'=>'form-control')) }}
            </div>
            
        </div>
        <div class="row form-group">
            <div class="col-md-4 filtro-form">
                {{ Form::label('Objeto Licitado / Número do Edital / Número do Processo', '', array('id'=>'lblObjeto')) }}
                {{ Form::text('slcObjeto', '', array('id'=>'slcObjeto', 'class'=>'form-control')) }}
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
                $('#slcStatus').addClass("select2");
                var select = document.getElementById("slcStatus");
                arrayTipoConsulta2(dadosDb,select);

                var dadosDb2 = <?php echo $dadosDb2 ?>;                
                $('#slcModalidade').addClass("select2");
                select = document.getElementById("slcModalidade");
                arrayTipoConsulta2(dadosDb2,select);

                $(".select2").select2();
             });
    </script>
@endsection