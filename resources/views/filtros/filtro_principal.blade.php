@extends('layouts.app')
@section('htmlheader_title', 'Filtro')

@section('cssheader')
	  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtro</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        {{ Form::open(array('route' => 'filtro', 'method' => 'POST')) }}

                            <div class="row form-group">
                                <div class="col-md-4">
                                    {{ Form::label('periodo', 'Período') }}
                                    {{ 
                                        Form::select('selectPeriodo', 
                                            array(
                                                'Livre' => 'Livre',
                                                'Mes' => 'Mês',
                                                'Bimestre' => 'Bimestral',
                                                'Trimestre' => 'Trimestral',
                                                'Quadrimestre' => 'Quadrimestral',
                                                'Semestre' => 'Semestral',
                                            ), 
                                            'default', 
                                            array(
                                                'id'=>'selectPeriodo',
                                                'class'=>'form-control', 
                                                'onchange'=>"populate(this.id,
                                                    'selectDataInicio', 
                                                    'selectDataFim', 
                                                    'selectAno', 
                                                    'selectMes', 
                                                    'selectBimestre', 
                                                    'selectTrimestre', 
                                                    'selectQuadrimestre', 
                                                    'selectSemestre')"
                                            )
                                        )
                                    }}
                                </div>
                                <div id='divDataInicio'>
                                    <div class="col-md-4">
                                        {{ Form::label('dataInicio', 'Data Início') }}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            {{ Form::text('datetimepickerDataInicio', '', array('id'=>'datetimepickerDataInicio', 'class' => 'form-control', 'readonly'=>"true")) }}
                                            </div>
                                        </div>
                                </div>
                                <div id='divDataFim'>
                                    <div class="col-md-4">
                                        {{ Form::label('dataFim', 'Data Fim') }}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            {{ Form::text('datetimepickerDataFim', '', array('id'=>'datetimepickerDataFim', 'class' => 'form-control', 'readonly'=>"true")) }}
                                        </div>
                                    </div>
                                </div>
                                <div id='divAno'>
                                    <div class="col-md-4">
                                        {{ Form::label('ano', 'Ano') }}
                                        {{ Form::select('selectAno', array(), 'default', array('id'=>'selectAno', 'class'=>'form-control', 'onchange'=>'selecDropdown();')) }}
                                    </div>
                                </div>
                                <div id='divMes'>
                                    <div class="col-md-4">
                                        {{ Form::label('mes', 'Mês') }}
                                        {{ Form::select('selectMes', array(), 'default', array('id'=>'selectMes', 'class'=>'form-control')) }}
                                    </div>
                                </div>
                                <div id='divBimestre'>
                                    <div class="col-md-4">
                                        {{ Form::label('bimestre', 'Bimestral') }}
                                        {{ Form::select('selectBimestre', array(), 'default', array('id'=>'selectBimestre', 'class'=>'form-control')) }}
                                    </div>
                                </div>
                                <div id='divTrimestre'>
                                    <div class="col-md-4">
                                        {{ Form::label('trimestre', 'Trimestral') }}
                                        {{ Form::select('selectTrimestre', array(), 'default', array('id'=>'selectTrimestre', 'class'=>'form-control')) }}
                                    </div>
                                </div>
                                <div id='divQuadrimestre'>
                                    <div class="col-md-4">
                                        {{ Form::label('quadrimestre', 'Quadrimestral') }}
                                        {{ Form::select('selectQuadrimestre', array(), 'default', array('id'=>'selectQuadrimestre', 'class'=>'form-control')) }}
                                    </div>
                                </div>
                                <div id='divSemestre'>
                                    <div class="col-md-4">
                                        {{ Form::label('semestre', 'Semestral') }}
                                        {{ Form::select('selectSemestre', array(), 'default', array('id'=>'selectSemestre', 'class'=>'form-control')) }}
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    {{ Form::submit('Pesquisar', array('class'=>'btn btn-primary')) }}
                                </div>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Resultado</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <?php
                        if($selectPeriodo != null){
                            echo '<p>Foi selecionado o período: ' . $selectPeriodo . '</p>';
                        }

                        if($selectPeriodo == 'Livre'){
                            echo '<p>Foi selecionado a data início: ' . $datetimepickerDataInicio . '</p>';
                            echo '<p>Foi selecionado a data fim: ' . $datetimepickerDataFim . '</p>';
                        }

                        if($selectAno != null){
                            echo '<p>Foi selecionado o ano: ' . $selectAno . '</p>';
                        }
                        if($selectMes != null){
                            echo '<p>Foi selecionado o mês: ' . $selectMes . '</p>';
                        }
                        if($selectBimestre != null){
                            echo '<p>Foi selecionado o bimestre: ' . $selectBimestre . '</p>';
                        }
                        if($selectTrimestre != null){
                            echo '<p>Foi selecionado o trimestre: ' . $selectTrimestre . '</p>';
                        }
                        if($selectQuadrimestre != null){
                            echo '<p>Foi selecionado o quadrimestre: ' . $selectQuadrimestre . '</p>';
                        }
                        if($selectSemestre != null){
                            echo '<p>Foi selecionado o semestre: ' . $selectSemestre . '</p>';
                        }
                    ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
    <!-- /.row -->
@endsection

@section('scriptsadd')
    <script src="{{ asset('/js/options.js') }}"></script>

<script>
    $(function () {
        $(document).ready(function() {
            ocultarDiv()

            $('#divDataInicio').show();
            $('#divDataFim').show();

            datepickerFiltro('#datetimepickerDataInicio', '#datetimepickerDataFim');
        }); 
    });


    function ocultarDiv() {
        $('#divDataInicio').hide();
        $('#divDataFim').hide();
        $('#divAno').hide();
        $('#divMes').hide();
        $('#divBimestre').hide();
        $('#divTrimestre').hide();
        $('#divQuadrimestre').hide();
        $('#divSemestre').hide();
    };

    // Acionado ao clicar no período
    function populate(
        selectPeriodo,
        selectDataInicio,
        selectDataFim,
        selectAno,
        selectMes,
        selectBimestre,
        selectTrimestre,
        selectQuadrimestre,
        selectSemestre)
    {
        var sPeriodo = document.getElementById(selectPeriodo);
        var sAno = document.getElementById(selectAno);

        sAno.innerHTML = "";
        var select = ""

        ocultarDiv();

        var optionArrayAno = [];
        var optionArrayPeriodo = [];

        var showDivAno = false;

        switch(sPeriodo.value){
            case 'Livre':
                $('#divDataInicio').show();
                $('#divDataFim').show();
                break;
            case 'Mes':
                showDivAno = true;
                $('#divMes').show();
                select = document.getElementById(selectMes);
                optionArrayPeriodo = optionArray('meses');
                break;
            case 'Bimestre':
                showDivAno = true;
                $('#divBimestre').show();
                select = document.getElementById(selectBimestre);
                optionArrayPeriodo = optionArray('bimestre');
                break;
            case 'Trimestre':
                showDivAno = true;
                $('#divTrimestre').show();
                select = document.getElementById(selectTrimestre);
                optionArrayPeriodo = optionArray('trimestre');
                break;
            case 'Quadrimestre':
                showDivAno = true;
                $('#divQuadrimestre').show();
                select = document.getElementById(selectQuadrimestre);
                optionArrayPeriodo = optionArray('quadrimestre');
                break;
            case 'Semestre':
                showDivAno = true;
                $('#divSemestre').show();
                select = document.getElementById(selectSemestre);
                optionArrayPeriodo = optionArray('semestre');
                break;
        }
        if(showDivAno){
            $('#divAno').show();
            $.each(arrayGenerico('anos'), function (key, value) {
                optionArrayAno.push(value+'|'+value);
            });
        
            $.each(montarObjDropdown(optionArrayAno), function (key, value) {
                sAno.options.add(value);
            });
        }

        select.innerHTML = "";
        $.each(montarObjDropdown(optionArrayPeriodo), function (key, value) {
            select.options.add(value);
        });
    }
    
    function selecDropdown() {
        var selectAno = parseInt(document.getElementById("selectAno").value);
        
        var select = "";
        var selectPeriodo = document.getElementById("selectPeriodo");
        var arrayPeriodo = "";
        var periodo = "";

        switch(selectPeriodo.value){
            case 'Mes':
                select = document.getElementById("selectMes");
                arrayPeriodo = optionArray('meses', selectAno);
                periodo = 'meses';
                break;
            case 'Bimestre':
                select = document.getElementById("selectBimestre");
                arrayPeriodo = optionArray('bimestre', selectAno);
                periodo = 'bimestre';
                break;
            case 'Trimestre':
                select = document.getElementById("selectTrimestre");
                arrayPeriodo = optionArray('trimestre', selectAno);
                periodo = 'trimestre';
                break;
            case 'Quadrimestre':
                select = document.getElementById("selectQuadrimestre");
                arrayPeriodo = optionArray('quadrimestre', selectAno);
                periodo = 'quadrimestre';
                break;
            case 'Semestre':
                select = document.getElementById("selectSemestre");
                arrayPeriodo = optionArray('semestre', selectAno);
                periodo = 'semestre';
                break;
        }
        
        select.innerHTML = "";
        $.each(montarObjDropdown(arrayPeriodo), function (key, value) {
            select.options.add(value);
        });
    };

</script>
@endsection