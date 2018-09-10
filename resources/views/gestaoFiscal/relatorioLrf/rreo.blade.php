@extends('formFiltro')

@section('htmlheader_title')
    Relatórios da  LRF
@stop

@section('filtro_titulo')
    RREO - Relatório Resumido da Execução Orçamentária
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/gestaofiscal/lrf/rreo', 'method' => 'POST')) }}  
    <div class="row form-group">                                                                                              
        <div class="col-md-4">
            {{ Form::label('ano', 'Ano') }}
            {{ Form::select('selectAno', array(), 'default', array('id'=>'selectAno', 'class'=>'form-control', 'onchange'=>'selecAnoDropdown();')) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('bimestre', 'Bimestre') }}
            {{ Form::select('selectBimestre', array(), 'default', array('id'=>'selectBimestre', 'class'=>'form-control')) }}
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
        </div>
    </div>
    @if(session()->has('message'))
        <div class="col-md-8 alert alert-danger" style="font-size:20px">
                {{ session()->get('message') }}
        </div>
    @endif
    {{ Form::close() }}
    
@endsection

@section('scriptsadd')
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/options.min.js') }}"></script>  
    <script>
        // LoadPage
        $(function () {
            $(document).ready(function() {
                var sAno = document.getElementById("selectAno");
                var select = document.getElementById("selectBimestre");
                var optionArrayAno = [];
                var optionArrayPeriodo = [];
               
                $.each(arrayGenerico('anos'), function (key, value) {
                    optionArrayAno.push(value+'|'+value);
                });

                //Incluir o ano de 2012 no array
                optionArrayAno.push('2012|2012');
        
                $.each(montarObjDropdown(optionArrayAno), function (key, value) {
                    sAno.options.add(value);
                });

                optionArrayPeriodo = optionArray('bimestre');

                $.each(montarObjDropdown(optionArrayPeriodo), function (key, value) {
                    select.options.add(value);
                });
            });
        });

        function selecAnoDropdown() {
            var selectAno = parseInt(document.getElementById("selectAno").value);
            
            var select = "";
            var arrayPeriodo = "";
            select = document.getElementById("selectBimestre");
            arrayPeriodo = optionArray('bimestre', selectAno);
            select.innerHTML = "";
            $.each(montarObjDropdown(arrayPeriodo), function (key, value) {
                select.options.add(value);
            });
        };
    </script>
@endsection