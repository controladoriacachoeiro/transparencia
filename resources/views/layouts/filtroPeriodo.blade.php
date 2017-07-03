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

<!-- SCRIPTs PARA TRABALHAR COM AS FUNCOES DO PERÍODO-->

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
                ocultarOpcoesFiltro();

                var labels = <?php echo $labelFiltro ?>;
                var boolPeriodo = <?php echo $boolPeriodo ?>;
                var tipoConsulta = '<?php echo $tipoConsulta ?>'; 
                var dados = <?php echo $dados ?>;                              

                //Responsável por verificar os forms necessários para o filtro
                for (var i = 0; i < labels.length; i++) {
                    if (labels[i].Ativo == true) {
                        if (i != 0) {                            
                            $('#lblTipoConsulta' + String(i+1)).show();                            
                            var lblTipoConsulta = document.getElementById("lblTipoConsulta" + String(i+1));
                            if (labels[i].Tipo == 'select') {
                                $('#selectTipoConsulta' + String(i+1)).show();
                                $('#selectTipoConsulta' + String(i+1)).addClass("select2");
                                var select = document.getElementById("selectTipoConsulta" + String(i+1));
                                arrayTipoConsulta(tipoConsulta, labels[i], dados[i], select);
                            } else if (labels[i].Tipo == 'text') {
                                $('#txtTipoConsulta' + String(i+1)).show();
                                var text = document.getElementById("txtTipoConsulta" + String(i+1));
                            }
                        } else {
                            var lblTipoConsulta = document.getElementById("lblTipoConsulta");
                            if (labels[i].Tipo == 'select') {
                                $('#selectTipoConsulta').show();
                                $('#selectTipoConsulta').addClass("select2");
                                var select = document.getElementById("selectTipoConsulta");
                                arrayTipoConsulta(tipoConsulta, labels[i], dados[i], select);
                            } else if (labels[i].Tipo == 'text') {
                                $('#txtTipoConsulta').show();
                                var text = document.getElementById("txtTipoConsulta");
                            }
                        }
                        lblTipoConsulta.innerText = labels[i].Nome;                        
                    }
                }
                                
                // Classe para por nos selects a função de buscar
                $(".select2").select2();

                if ( boolPeriodo == true){
                    // Popular select período
                    // $('#divPeriodo').show();
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

<script>
    $(document).ready(function () {
        var url = window.location.pathname;
        url = url.toString();
        var modulo = url.split('/');
        switch (modulo[1]) {
            case "despesas":
                $('#corpo').removeClass("box-success");
                $('#corpo').addClass("box-danger");
            break;
            case"receitas":
                $('#corpo').removeClass("box-success");
                $('#corpo').addClass("box-info");
            break;
            case"pessoal":
                $('#corpo').removeClass("box-success");
                $('#corpo').addClass("box-person");
            break;
        }
    });
</script>