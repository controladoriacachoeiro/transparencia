<div class="row form-group">    
    <div id='divDataInicio'>
        <div class="col-md-3">
            {{ Form::label('datetimepickerDataInicio', 'Data Início') }}
            <div class="input-group ">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <label for="datetimepickerDataInicio" style="display:none">Data Início</label>
                {{ Form::text('datetimepickerDataInicio', '', array('id'=>'datetimepickerDataInicio', 'class' => 'form-control','aria-label'=>'informar data inicial')) }}
            </div>
        </div>
    </div>
    <div id='divDataFim'>
        <div class="col-md-3">
            {{ Form::label('datetimepickerDataFim', 'Data Fim') }}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <label for="datetimepickerDataFim" style="display:none">Data Fim</label>
                {{ Form::text('datetimepickerDataFim', '', array('id'=>'datetimepickerDataFim', 'class' => 'form-control')) }}
            </div>
        </div>
    </div>    
</div>

<!-- SCRIPTs PARA TRABALHAR COM AS FUNCOES DO PERÍODO-->

@section('scriptsadd')
@parent
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
        //configura os calendários de data de início e data fim
        datepickerFiltro('#datetimepickerDataInicio', '#datetimepickerDataFim');
    </script>
@stop