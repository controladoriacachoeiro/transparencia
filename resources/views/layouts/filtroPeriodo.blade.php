<div class="row form-group">    
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