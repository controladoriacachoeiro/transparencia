@extends('layouts.app')
@section('htmlheader_title', 'Filtro')

@section('cssheader')
	  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" />
@endsection

@extends('layouts.breadcrumb')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
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
                    {{ Form::open(array('route' => 'filtrar', 'method' => 'POST')) }}

                        {{ Form::hidden('hiddenConsulta', $consulta, array('id' => 'hiddenConsulta')) }}
                        {{ Form::hidden('hiddenSubConsulta', $subConsulta, array('id' => 'hiddenSubConsulta')) }}
                        {{ Form::hidden('hiddenTipoConsulta', $tipoConsulta, array('id' => 'hiddenTipoConsulta')) }}
                        
                        <div class="row form-group">
                            <div class="col-md-4">
                                {{ Form::label('lblTipoConsulta', '', array('id'=>'lblTipoConsulta')) }}
                                {{ Form::text('txtTipoConsulta', '', array('id'=>'txtTipoConsulta', 'class' => 'form-control')) }}
                                {{ Form::select('selectTipoConsulta', array(), 'default', array('id'=>'selectTipoConsulta', 'class'=>'form-control select2')) }}
                            </div>
                        </div>

                        <div class="row form-group">
                            <div id='divPeriodo'>
                                <div class="col-md-4">
                                    {{ Form::label('periodo', 'Período') }}
                                    {{ 
                                        Form::select('selectPeriodo', [], 
                                            'default', 
                                            array(
                                                'id'=>'selectPeriodo',
                                                'class'=>'form-control', 
                                                'onchange'=>"opcoesPeriodo(this.id,
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
                            </div>
                            <div id='divDataInicio'>
                                <div class="col-md-4">
                                    {{ Form::label('dataInicio', 'Data Início') }}
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        {{ Form::text('datetimepickerDataInicio', '', array('id'=>'datetimepickerDataInicio', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div id='divDataFim'>
                                <div class="col-md-4">
                                    {{ Form::label('dataFim', 'Data Fim') }}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        {{ Form::text('datetimepickerDataFim', '', array('id'=>'datetimepickerDataFim', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div id='divAno'>
                                <div class="col-md-4">
                                    {{ Form::label('ano', 'Ano') }}
                                    {{ Form::select('selectAno', array(), 'default', array('id'=>'selectAno', 'class'=>'form-control', 'onchange'=>'selecAnoDropdown();')) }}
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
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
    <!-- /.row -->
@endsection

@section('scriptsadd')
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/options.js') }}"></script>
    
    <!--Mask-->
    <script src="https://rawgit.com/digitalBush/jquery.maskedinput/master/dist/jquery.maskedinput.min.js"></script>
    <script>
        jQuery(function($) {
            $(document).on('focus', '#datetimepickerDataInicio', function () {
                var me = $("#datetimepickerDataInicio");
                me.mask('99/99/9999');
            });
            $(document).on('focus', '#datetimepickerDataFim', function () {
                var me = $("#datetimepickerDataFim");
                me.mask('99/99/9999');
            });
        });
    </script>

    <script>
        // LoadPage
        $(function () {
            $(document).ready(function() {
                // Ocultar todos os campos de filtro
                ocultarOpcoesFiltro()

                if('<?php echo $tipoConsulta ?>' == 'nota')
                {
                    $('#txtTipoConsulta').show();
                    document.getElementById("lblTipoConsulta").innerText = '<?php echo $labelFiltro ?>';
                } else {
                    $('#selectTipoConsulta').show();
                    $(".select2").select2();
                    // Monta um select de acordo com o que esta sendo procurado, órgão, fornecedor, funcao, elemento
                    arrayTipoConsulta('<?php echo $tipoConsulta ?>', '<?php echo $labelFiltro ?>', '<?php echo $arrayDataFiltro ?>');

                    // Popular select período
                    $('#divPeriodo').show();
                    arrayPeriodo();

                    // Exibe e configura os calendários de data de início e data fim
                    $('#divDataInicio').show();
                    $('#divDataFim').show();
                    datepickerFiltro('#datetimepickerDataInicio', '#datetimepickerDataFim');
                }
            });
        });

        // Acionado ao clicar no período
        function opcoesPeriodo(
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

            ocultarOpcoesFiltro();
            $('#divPeriodo').show();

            var optionArrayAno = [];
            var optionArrayPeriodo = [];

            var showDivAno = false;

            switch(sPeriodo.value){
                case 'Livre':
                    $('#divDataInicio').show();
                    $('#divDataFim').show();
                    break;
                case 'Mês':
                    showDivAno = true;
                    $('#divMes').show();
                    select = document.getElementById(selectMes);
                    optionArrayPeriodo = optionArray('meses');
                    break;
                case 'Bimestral':
                    showDivAno = true;
                    $('#divBimestre').show();
                    select = document.getElementById(selectBimestre);
                    optionArrayPeriodo = optionArray('bimestre');
                    break;
                case 'Trimestral':
                    showDivAno = true;
                    $('#divTrimestre').show();
                    select = document.getElementById(selectTrimestre);
                    optionArrayPeriodo = optionArray('trimestre');
                    break;
                case 'Quadrimestral':
                    showDivAno = true;
                    $('#divQuadrimestre').show();
                    select = document.getElementById(selectQuadrimestre);
                    optionArrayPeriodo = optionArray('quadrimestre');
                    break;
                case 'Semestral':
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
        
        // Acionado ao clicar no ano
        function selecAnoDropdown() {
            var selectAno = parseInt(document.getElementById("selectAno").value);
            
            var select = "";
            var selectPeriodo = document.getElementById("selectPeriodo");
            var arrayPeriodo = "";
            var periodo = "";

            switch(selectPeriodo.value){
                case 'Mês':
                    select = document.getElementById("selectMes");
                    arrayPeriodo = optionArray('meses', selectAno);
                    periodo = 'meses';
                    break;
                case 'Bimestral':
                    select = document.getElementById("selectBimestre");
                    arrayPeriodo = optionArray('bimestre', selectAno);
                    periodo = 'bimestre';
                    break;
                case 'Trimestral':
                    select = document.getElementById("selectTrimestre");
                    arrayPeriodo = optionArray('trimestre', selectAno);
                    periodo = 'trimestre';
                    break;
                case 'Quadrimestral':
                    select = document.getElementById("selectQuadrimestre");
                    arrayPeriodo = optionArray('quadrimestre', selectAno);
                    periodo = 'quadrimestre';
                    break;
                case 'Semestral':
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