@extends('formFiltro')

@section('htmlheader_title')
    Restos a Pagar
@stop

@section('filtro_titulo')
    Nota de Pagamento
@stop

@section('contentForm')
    {{ Form::open(array('url' => '/despesas/restosapagar/nota', 'method' => 'POST')) }}                                                                                                
        <div class="row form-group">
            <div class="col-md-4">
                {{ Form::label('Número da Nota ', '', array('id'=>'lblTipoConsulta')) }}
                {{ Form::text('txtNumeroNota', '', array('id'=>'txtTipoConsulta', 'class' => 'form-control')) }}                                
            </div>          
            <div class="col-md-4">
                {{ Form::label('ano', 'Ano') }}
                {{ Form::select('selectAno', array(), 'default', array('id'=>'selectAno', 'class'=>'form-control select2')) }}
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
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/options.min.js') }}"></script>  
    <script>
        // LoadPage
        $(function () {
            $(document).ready(function() {
                var sAno = document.getElementById("selectAno");
                var optionArrayAno = [];
                optionArrayAno.push('Todos'+'|'+'Todos');
                $.each(arrayGenerico('anos'), function (key, value) {
                    optionArrayAno.push(value+'|'+value);
                });
        
                $.each(montarObjDropdown(optionArrayAno), function (key, value) {
                    sAno.options.add(value);
                });

                $(".select2").select2();

            });
        });
    </script>
@endsection