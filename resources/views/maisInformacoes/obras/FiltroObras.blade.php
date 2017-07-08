@extends('formFiltro')

@section('cssheader')
	  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" />
@endsection

@extends('layouts.breadcrumb')

@section('contentForm')
    {{ Form::open(array('route' => 'filtrarObras', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-sm-4">
                {{ Form::label('Situação', '', array('id'=>'lblsituacao')) }}
                {{ Form::select('sltSituacao', array(), 'default', array('id'=>'sltSituacao', 'class'=>'form-control')) }}
            </div>

            <div class="col-sm-4">
                {{ Form::label('Ano', '', array('id'=>'lblAno')) }}
                {{ Form::select('sltAno', array(), 'default', array('id'=>'sltAno', 'class'=>'form-control')) }}
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
    <script src="{{ asset('/js/options.js') }}"></script>  
    <script>
            $(document).ready(function() {        
                var dadosDb=<?php echo $dadosDb ?>;
                $('#sltSituacao').show();
                $('#sltSituacao').addClass("select2");
                var select = document.getElementById("sltSituacao");
                arrayTipoConsulta2(dadosDb,select);
                $(".select2").select2();
                $('#sltAno').show();
                $('#sltAno').addClass("select2");
                select = document.getElementById("sltAno");
                arrayTipoConsulta2(dadosDb,select);
                $(".select2").select2();
            });    

    </script>
@endsection  




