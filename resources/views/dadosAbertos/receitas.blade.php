@extends('formFiltro')
@section('htmlheader_title')
    Download - Receitas
@stop
@section('main-content')

<div class="row">
    <div class="col-md-12">
        <div class=" box-body box box-solid">
            <div class="box-group" id="accordion">
                <!--Arecadada-->
                    <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Arrecadada
                        </a>
                    </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                    <div class="box-body">
                        {{ Form::open(array('url' => '/dadosabertos/receitas/arrecadadas', 'method' => 'POST')) }}
                        <div class="row form-group">    
                        <div id='divDataInicio'>
                            <div class="col-md-3">
                            {{ Form::label('dataInicio', 'Data Início') }}
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {{ Form::text('datetimepickerDataInicio1', '', array('id'=>'datetimepickerDataInicio1', 'class' => 'form-control')) }}
                            </div>
                            </div>
                        </div>
                        <div id='divDataFim'>
                            <div class="col-md-3">
                            {{ Form::label('dataFim', 'Data Fim') }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {{ Form::text('datetimepickerDataFim1', '', array('id'=>'datetimepickerDataFim1', 'class' => 'form-control')) }}
                            </div>
                            </div>
                        </div>    
                        </div>                                              
                        <div class="row form-group">
                                <div class="col-md-2" style="width: 110px;">
                                    {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                                    {{ Form::close() }}
                                </div>
                                <div class="col-md-2 button-detalhes">
                                    <span class="btn btn-primary" data-toggle="collapse" data-target="#resto">Detalhes</span>
                                </div>
                        </div>
                        
                    </div>
                    <!--Tabela de Descricao-->
                        <div id="resto" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style='vertical-align:middle'>Coluna</th>
                                                    <th style='vertical-align:middle'>Tipo</th>
                                                    <th style='vertical-align:middle'>Descrição</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ano Exercício</td>
                                                    <td>string</td>
                                                    <td>Ano do exercício ao qual se refere o orçamento da receita</td>
                                                </tr>
                                                <tr>
                                                    <td>Data Arrecadaão</td>
                                                    <td>string</td>
                                                    <td>Informar a data que a receita foi realizada</td>
                                                </tr>
                                                <tr>
                                                    <td>Órgão</td>
                                                    <td>string</td>
                                                    <td>Informar a unidade gestora responsál pela arrecadação da receita</td>
                                                </tr>
                                                <tr>
                                                    <td>Categoria Econômica</td>
                                                    <td>string</td>
                                                    <td>Receitas Correntes, Receitas de Capital</td>
                                                </tr>
                                                <tr>
                                                    <td>Origem</td>
                                                    <td>string</td>
                                                    <td>Receita Tributária, Receita de Contribuições, Receita Patrimonial, Receita Agropecuária, Receita Industrial, Receita de Serviços, Transferências Correntes, Outras Receitas Correntes, Operações de Crédito, Alienação de Bens, Amortização de Empréstimos, Transferências de Capital, Outras Receitas de Capital.</td>
                                                </tr>
                                                <tr>
                                                    <td>Espécie</td>
                                                    <td>string</td>
                                                    <td>Impostos, Taxas, Contribuição de Melhoria, Contribuições Sociais, Contribuições de Intervenção no Domínio Econômico, Contribuição para o Custeio do Serviço de Iluminação Pública, Receitas Imobiliárias, Receitas de Valores Mobiliários, Receita de Concessões e Permissões, Compensações Financeiras, Receita da Produção Vegetal, etc.</td>
                                                </tr>
                                                <tr>
                                                    <td>Rubrica</td>
                                                    <td>string</td>
                                                    <td>Impostos sobre o Comércio Exterior, Impostos sobre o Patrimônio e a Renda, Impostos sobre a Produção e a Circulação, Impostos Extraordinários, Taxas pelo Exercício do Poder de Polícia, Taxas pela Prestação de Serviços, Remuneração de Depósitos Bancários, Dividendos, Arrendamentos, Aluguéis, etc.</td>
                                                </tr>
                                                <tr>
                                                    <td>Alínea</td>
                                                    <td>string</td>
                                                    <td>Imposto sobre a Circulação de Mercadoria e Serviços – ICMS, Imposto sobre a Renda e Proventos de Quaisquer Natureza, Imposto sobre a Propriedade de Veículos Automotores, Imposto sobre transmissão causa-mortis e doação.</td>
                                                </tr>
                                                <tr>
                                                    <td>Subalínea</td>
                                                    <td>string</td>
                                                    <td>ICMS-Indústria, ICMS-Comércio, ICMS-Serviços de Energia Elétrica, ICMS-Serviços de Comunicação, ICMS-Importação, ICMS-Simples Nacional, ICMS-Comércio Exterior, Imposto de Renda Pessoa Física – IRPF, Imposto de Renda Pessoa Jurídica – IRPJ, IPVA, ITCD.</td>
                                                </tr>
                                                <tr>
                                                    <td>Valor</td>
                                                    <td>string</td>
                                                    <td>Valor da receita realizada</td>
                                                </tr>
                                            </tbody>
                                        </table>
                        </div> 
                    <!--Fim Tabela de Descricao-->
                    </div>
                    </div>
                <!--Fim Arrecadada-->
        </div>
    </div>    
</div>
@endsection

@section('scriptsadd')
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <script src="{{ asset('/js/options.min.js') }}"></script> 
        <script src="https://rawgit.com/digitalBush/jquery.maskedinput/master/dist/jquery.maskedinput.min.js"></script>
    <script>
    for (i = 1; i <= 4 ; i++) { 
        jQuery(function($) {
            $(document).on('focus', '#datetimepickerDataInicio'+i, function () {
                var me = $("#datetimepickerDataInicio"+i);
                me.mask('99/99/9999');
            });
            $(document).on('focus', '#datetimepickerDataFim'+i, function () {
                var me = $("#datetimepickerDataFim"+i);
                me.mask('99/99/9999');
            });  
        });
        //configura os calendários de data de início e data fim
        datepickerFiltro('#datetimepickerDataInicio'+i, '#datetimepickerDataFim'+i);
    }
    </script> 
@endsection