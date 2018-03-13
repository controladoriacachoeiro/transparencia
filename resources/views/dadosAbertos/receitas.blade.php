@extends('formFiltro')
@section('htmlheader_title')
    Download - Receitas
@stop
@section('main-content')
<div class='row'>
    <div class='col-md-12'>
        <div id="navegacao" class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Navegação</h3>                   
            </div>
            <div class="box-body">                                                        
                <ol class="breadcrumb">
                    <li><a href="/">Início</a></li>                                                
                    <li class="active">Download - Receitas</li>                                                                                                                           
                </ol>        
            </div>
        </div>            
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box-body box box-solid">
            <div class="box-group" id="accordion">
                <!--Arecadada-->
                    <!--Titulo-->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                Arrecadada
                            </h4>
                        </div>
                    <div>
                    <!--fim titulo-->
                    <!--body arrecadada-->
                        <div class="box-body">
                            {{ Form::open(array('url' => '/dadosabertos/receitas/arrecadadas', 'method' => 'POST')) }}
                            <div class="row form-group">    
                                <div id='divDataInicio'>
                                    <div class="col-md-3">
                                        {{ Form::label('dataInicio', 'Data Início') }}
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <label for="datetimepickerDataInicio1" style="display:none">Data Inicio</label>
                                            {{ Form::text('datetimepickerDataInicio1', '', array('id'=>'datetimepickerDataInicio1', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div id='divDataFim'>
                                    <div class="col-md-3">
                                        {{ Form::label('dataFim', 'Data Fim') }}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <label for="datetimepickerDataFim1" style="display:none">Data Fim</label>
                                            {{ Form::text('datetimepickerDataFim1', '', array('id'=>'datetimepickerDataFim1', 'class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="row form-group">
                                <div class="col-xs-2" style="width: 110px;">
                                    {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}                                    
                                </div>
                                <div class="col-xs-2">
                                    <span class="btn btn-primary" data-toggle="collapse" data-target="#resto">Detalhes</span>
                                </div>
                            </div>
                            {{ Form::close() }}

                            <!-- Erro -->
                            @if(session()->has('mensagemArrecadada'))
                                <div class="col-md-8 alert alert-danger" style="font-size:20px">
                                    {{ session()->get('mensagemArrecadada') }}
                                </div>
                            @endif

                            @if(session()->has('arrecadada'))
                            <div class="alert alert-danger error-download">
                                {{ session()->get('arrecadada') }}
                            </div>
                            @endif
                            <!--Fim erro-->

                        </div>
                    <!--fim body -->
                    <!--Tabela de Descricao-->
                        <div id="resto" class="panel-collapse collapse">
                            <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas de download de receitas arrecadadas">
                                <thead>
                                    <tr>
                                        <th scope="col" style='vertical-align:middle'>Coluna</th>
                                        <th scope="col" style='vertical-align:middle'>Tipo</th>
                                        <th scope="col" style='vertical-align:middle'>Descrição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="col">Ano Exercício</td>
                                        <td scope="col">texto</td>
                                        <td scope="col">Ano do exercício ao qual se refere o orçamento da receita</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Data Arrecadação</td>
                                        <td scope="col">texto</td>
                                        <td scope="col">Data que a receita foi realizada</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Unidade Gestora</td>
                                        <td scope="col">texto</td>
                                        <td scope="col">Unidade gestora responsável pela arrecadação da receita</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Categoria Econômica</td>
                                        <td scope="col">texto</td>
                                        <td scope="col">Receitas Correntes, Receitas de Capital</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Origem</td>
                                        <td scope="col">texto</td>
                                        <td scope="col">Receita Tributária, Receita de Contribuições, Receita Patrimonial, Receita Agropecuária, Receita Industrial, Receita de Serviços, Transferências Correntes, Outras Receitas Correntes, Operações de Crédito, Alienação de Bens, Amortização de Empréstimos, Transferências de Capital, Outras Receitas de Capital.</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Espécie</td>
                                        <td scope="col">texto</td>
                                        <td scope="col">Impostos, Taxas, Contribuição de Melhoria, Contribuições Sociais, Contribuições de Intervenção no Domínio Econômico, Contribuição para o Custeio do Serviço de Iluminação Pública, Receitas Imobiliárias, Receitas de Valores Mobiliários, Receita de Concessões e Permissões, Compensações Financeiras, Receita da Produção Vegetal, etc.</td>
                                    </tr>
                                    <tr>
                                       <td scope="col">Rúbrica</td>
                                       <td scope="col">texto</td>
                                       <td scope="col">Impostos sobre o Comércio Exterior, Impostos sobre o Patrimônio e a Renda, Impostos sobre a Produção e a Circulação, Impostos Extraordinários, Taxas pelo Exercício do Poder de Polícia, Taxas pela Prestação de Serviços, Remuneração de Depósitos Bancários, Dividendos, Arrendamentos, Aluguéis, etc.</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Alínea</td>
                                        <td scope="col">texto</td>
                                        <td scope="col">Imposto sobre a Circulação de Mercadoria e Serviços – ICMS, Imposto sobre a Renda e Proventos de Quaisquer Natureza, Imposto sobre a Propriedade de Veículos Automotores, Imposto sobre transmissão causa-mortis e doação.</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Subalínea</td>
                                        <td scope="col">texto</td>
                                        <td scope="col">ICMS-Indústria, ICMS-Comércio, ICMS-Serviços de Energia Elétrica, ICMS-Serviços de Comunicação, ICMS-Importação, ICMS-Simples Nacional, ICMS-Comércio Exterior, Imposto de Renda Pessoa Física – IRPF, Imposto de Renda Pessoa Jurídica – IRPJ, IPVA, ITCD.</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Valor Arrecadado</td>
                                        <td scope="col">texto</td>
                                        <td scope="col">Valor da receita realizada</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div> 
                    <!--Fim Tabela de Descricao-->
                    </div>
                    </div>
                <!--Fim Arrecadada-->

                <!--iss-->
                    <div class="box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">                        
                        Lançada                
                    </h4>
                    </div>
                    <div>
                    <div class="box-body">
                        {{ Form::open(array('url' => '/dadosabertos/receitas/lancadas', 'method' => 'POST')) }}
                        <div class="row form-group">    
                        <div id='divDataInicio'>
                            <div class="col-md-3">
                            {{ Form::label('dataInicio', 'Data Início') }}
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <label for="datetimepickerDataInicio2" style="display:none">Data Inicio</label>
                                {{ Form::text('datetimepickerDataInicio2', '', array('id'=>'datetimepickerDataInicio2', 'class' => 'form-control')) }}
                            </div>
                            </div>
                        </div>
                        <div id='divDataFim'>
                            <div class="col-md-3">
                            {{ Form::label('dataFim', 'Data Fim') }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <label for="datetimepickerDataFim2" style="display:none">Data Fim</label>
                                {{ Form::text('datetimepickerDataFim2', '', array('id'=>'datetimepickerDataFim2', 'class' => 'form-control')) }}
                            </div>
                            </div>
                        </div>    
                        </div>                                              
                        <div class="row form-group">
                            <div class="col-xs-2" style="width: 110px;">
                                {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}                                    
                            </div>
                            <div class="col-xs-2">
                                <span class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" data-target="#iss">Detalhes</span>
                            </div>                                
                        </div>
                        {{ Form::close() }}                        
                        
                        <!-- Erro -->
                        @if(session()->has('mensagemLancada'))
                            <div class="col-md-8 alert alert-danger" style="font-size:20px">
                                {{ session()->get('mensagemLancada') }}
                            </div>
                        @endif
                        
                        @if(session()->has('iss'))
                        <div class="alert alert-danger error-download">
                            {{ session()->get('iss') }}
                        </div>
                        @endif
                        <!--Fim erro-->
                        
                    </div>
                    <!--Tabela de Descricao-->
                        <div id="iss" class="panel-collapse collapse">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas de download de iss">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style='vertical-align:middle'>Coluna</th>
                                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="col">Ano Exercício</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Ano do exercício ao qual se refere o orçamento da receita</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Data Arrecadação</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Data que a receita foi realizada</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Órgão</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Unidade gestora responsál pela arrecadação da receita</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Categoria Econômica</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Receitas Correntes, Receitas de Capital</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Origem</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Receita Tributária, Receita de Contribuições, Receita Patrimonial, Receita Agropecuária, Receita Industrial, Receita de Serviços, Transferências Correntes, Outras Receitas Correntes, Operações de Crédito, Alienação de Bens, Amortização de Empréstimos, Transferências de Capital, Outras Receitas de Capital.</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Espécie</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Impostos, Taxas, Contribuição de Melhoria, Contribuições Sociais, Contribuições de Intervenção no Domínio Econômico, Contribuição para o Custeio do Serviço de Iluminação Pública, Receitas Imobiliárias, Receitas de Valores Mobiliários, Receita de Concessões e Permissões, Compensações Financeiras, Receita da Produção Vegetal, etc.</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Rúbrica</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Impostos sobre o Comércio Exterior, Impostos sobre o Patrimônio e a Renda, Impostos sobre a Produção e a Circulação, Impostos Extraordinários, Taxas pelo Exercício do Poder de Polícia, Taxas pela Prestação de Serviços, Remuneração de Depósitos Bancários, Dividendos, Arrendamentos, Aluguéis, etc.</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Alínea</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Imposto sobre a Circulação de Mercadoria e Serviços – ICMS, Imposto sobre a Renda e Proventos de Quaisquer Natureza, Imposto sobre a Propriedade de Veículos Automotores, Imposto sobre transmissão causa-mortis e doação.</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Subalínea</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">ICMS-Indústria, ICMS-Comércio, ICMS-Serviços de Energia Elétrica, ICMS-Serviços de Comunicação, ICMS-Importação, ICMS-Simples Nacional, ICMS-Comércio Exterior, Imposto de Renda Pessoa Física – IRPF, Imposto de Renda Pessoa Jurídica – IRPJ, IPVA, ITCD.</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Valor</td>
                                                    <td scope="col">texto</td>
                                                    <td scope="col">Valor da receita realizada</td>
                                                </tr>
                                            </tbody>
                                        </table>
                        </div> 
                    <!--Fim Tabela de Descricao-->
                    </div>
                    </div>
                <!--Fim iss-->
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
            //configura os calendários de data de início e data fim
            datepickerFiltroDownload('#datetimepickerDataInicio'+i, '#datetimepickerDataFim'+i);
        }
    </script> 

    <script>
        $('.download').on('click', function () { 
            $('.error-download').hide();
        });
    </script>
@endsection