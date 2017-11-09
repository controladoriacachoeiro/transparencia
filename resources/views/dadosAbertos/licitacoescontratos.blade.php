@extends('formFiltro')

@section('htmlheader_title')
    Download - Licitações e Contratos
@stop
@section('main-content')

<div class="row">
    <div class="col-md-12">
        <div class=" box-body box box-solid">
            <div class="box-group" id="accordion">

            <!--Licitações em Andamento-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                <h4 class="box-title">                    
                    Licitações em Andamento                    
                </h4>
                </div>
                <div id="collapse1">
                <div class="box-body">
                    {{ Form::open(array('url' => '/dadosabertos/licitacoescontratos/andamento', 'method' => 'POST')) }}                                              
                    <div class="row form-group">
                        <div class="col-xs-2" style="width: 110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}
                            {{ Form::close() }}
                        </div>
                        <div class="col-xs-2">
                            <span class="btn btn-primary" data-toggle="collapse" data-target="#andamento">Detalhes</span>
                        </div>
                    </div>
                    @if(session()->has('andamento'))
                        <div class="alert alert-danger error-download">
                            {{ session()->get('andamento') }}
                        </div>
                     @endif
                </div>
                <!--Tabela de Descricao-->
                    <div id="andamento" class="collapse">
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
                                                <td>Data das Propostas</td>
                                                <td>data</td>
                                                <td>Indicação da data de início das propostas</td>
                                            </tr>
                                            <tr>
                                                <td>Órgão Licitante</td>
                                                <td>string</td>
                                                <td>Indicação do Órgão que realiza a licitação</td>
                                            </tr>
                                            <tr>
                                                <td>Objeto Licitado</td>
                                                <td>string</td>
                                                <td>Indicação do objeto licitado, de forma clara e precisa</td>
                                            </tr>
                                            <tr>
                                                <td>Processo</td>
                                                <td>string</td>
                                                <td>Número do processo licitatório</td>
                                            </tr>
                                            <tr>
                                                <td>Modalidade Licitatória</td>
                                                <td>string</td>
                                                <td>Indicação da modalidade, se pregão, concorrência, tomada de preços, convite</td>
                                            </tr>
                                            <tr>
                                                <td>Número do Edital</td>
                                                <td>inteiro</td>
                                                <td>Indicação do númedo do edital da licitação</td>
                                            </tr>
                                            <tr>
                                                <td>Ano do Edital</td>
                                                <td>inteiro</td>
                                                <td>Indicação do ano do edital da licitação</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>string</td>
                                                <td>Indicação do status atual do processo licitatório</td>
                                            </tr>                
                                        </tbody>
                                    </table>
                    </div> 
                <!--Fim Tabela de Descricao-->
                </div>
            </div>
            <!--Fim Licitaçãoes em Andamento-->


            <!--Licitações Concluídas-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                <h4 class="box-title">                    
                    Licitações Concluídas                    
                </h4>
                </div>
                <div id="collapse1">
                <div class="box-body">
                    {{ Form::open(array('url' => '/dadosabertos/licitacoescontratos/concluida', 'method' => 'POST')) }}                                              
                    <div class="row form-group">
                        <div class="col-xs-2" style="width: 110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}
                            {{ Form::close() }}
                        </div>
                        <div class="col-xs-2">
                            <span class="btn btn-primary" data-toggle="collapse" data-target="#concluida">Detalhes</span>
                        </div>
                    </div>
                    @if(session()->has('concluida'))
                        <div class="alert alert-danger error-download">
                            {{ session()->get('concluida') }}
                        </div>
                     @endif
                </div>
                <!--Tabela de Descricao-->
                    <div id="concluida" class="collapse">
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
                                                <td>Órgão</td>
                                                <td>string</td>
                                                <td>Indicação do Órgão que realizou a licitação</td>
                                            </tr>
                                            <tr>
                                                <td>Objeto Licitado</td>
                                                <td>string</td>
                                                <td>Indicação do objeto licitado</td>
                                            </tr>
                                            <tr>
                                                <td>Processo</td>
                                                <td>string</td>
                                                <td>Número do processo licitatório</td>
                                            </tr>
                                            <tr>
                                                <td>Modalidade Licitatória</td>
                                                <td>string</td>
                                                <td>Indicação da modalidade, se pregão, concorrência, tomada de preços, convite</td>
                                            </tr>
                                            <tr>
                                                <td>Data das Propostas</td>
                                                <td>data</td>
                                                <td>Indicação da data de início das propostas</td>
                                            </tr>                                            
                                            <tr>
                                                <td>Número do Edital</td>
                                                <td>inteiro</td>
                                                <td>Indicação do númedo do edital da licitação</td>
                                            </tr>
                                            <tr>
                                                <td>Ano do Edital</td>
                                                <td>inteiro</td>
                                                <td>Indicação do ano do edital da licitação</td>
                                            </tr>                                                                                                                                                                                               
                                        </tbody>
                                    </table>
                    </div> 
                <!--Fim Tabela de Descricao-->
                </div>
            </div>
            <!--Fim Licitaçãoes Concluídas-->


            <!--Contratos-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                <h4 class="box-title">                    
                    Contratos                    
                </h4>
                </div>
                <div id="collapse2">
                <div class="box-body">
                    {{ Form::open(array('url' => '/dadosabertos/licitacoescontratos/contrato', 'method' => 'POST')) }}
                    <div class="row form-group">    
                    </div>                                              
                    <div class="row form-group">
                            <div class="col-xs-2" style="width: 110px;">
                                {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                                {{ Form::close() }}
                            </div>
                            <div class="col-xs-2">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#contrato">Detalhes</span>
                            </div>
                    </div>
                    
                </div>
                <!--Tabela de Descricao-->
                    <div id="contrato" class="collapse">
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
                                                <td>Órgão contratante</td>
                                                <td>string</td>
                                                <td>Órgão cujo titular assina o contrato</td>
                                            </tr>
                                            <tr>
                                                <td>CNPJ do Contratado</td>
                                                <td>string</td>
                                                <td>CNPJ do fornecedor contratado</td>
                                            </tr>
                                            <tr>
                                                <td>Nome do Contratado</td>
                                                <td>string</td>
                                                <td>Nome do Contratado</td>
                                            </tr>
                                            <tr>
                                                <td>Data Inicial</td>
                                                <td>string</td>
                                                <td>Data de Assinatura, Publicação ou Início de Vigência do Contrato</td>
                                            </tr>
                                            <tr>
                                                <td>Data Final</td>
                                                <td>string</td>
                                                <td>Data do fim do contrato</td>
                                            </tr>                      
                                            <tr>
                                                <td>Objeto do Contrato</td>
                                                <td>string</td>
                                                <td>Descrição do objeto do contrato</td>
                                            </tr>
                                            <tr>
                                                <td>Valor do Contrato</td>
                                                <td>string</td>
                                                <td>Valor global do contrato</td>
                                            </tr>
                                            <tr>
                                                <td>Processo Licitatório</td>
                                                <td>string</td>
                                                <td>Informar o número do processo ou do edital de licitação que originou o contrato, ou informação de su dispensa, caso ocorra</td>
                                            </tr>
                                        </tbody>
                                    </table>
                    </div> 
                <!--Fim Tabela de Descricao-->
                </div>
            </div>
            <!--Fim Contratos-->

            <!--Bens e produtos Adquiridos-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                <h4 class="box-title">                    
                    Bens e Produtos Adquiridos                    
                </h4>
                </div>
                <div id="collapse3">
                <div class="box-body">
                    {{ Form::open(array('url' => '/dadosabertos/licitacoescontratos/bensadquiridos', 'method' => 'POST')) }}
                    <div class="row form-group">    
                    <div id='divDataInicio'>
                        <div class="col-md-3">
                        {{ Form::label('dataInicio', 'Data Início') }}
                        <div class="input-group ">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::text('datetimepickerDataInicio3', '', array('id'=>'datetimepickerDataInicio3', 'class' => 'form-control')) }}
                        </div>
                        </div>
                    </div>
                    <div id='divDataFim'>
                        <div class="col-md-3">
                        {{ Form::label('dataFim', 'Data Fim') }}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::text('datetimepickerDataFim3', '', array('id'=>'datetimepickerDataFim3', 'class' => 'form-control')) }}
                        </div>
                        </div>
                    </div>    
                    </div>                                              
                    <div class="row form-group">
                            <div class="col-xs-2" style="width: 110px;">
                                {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                                {{ Form::close() }}
                            </div>
                            <div class="col-xs-2">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#bens">Detalhes</span>
                            </div>
                    </div>
                    @if(session()->has('bens'))
                            <div class="alert alert-danger error-download">
                                {{ session()->get('bens') }}
                            </div>
                            @endif                    
                </div>
                <!--Tabela de Descricao-->
                    <div id="bens" class="collapse">
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
                                                <td>Data Aquisicao</td>
                                                <td>string</td>
                                                <td>Data em que o bem/produto foi entregue</td>
                                            </tr>
                                            <tr>
                                                <td>Item</td>
                                                <td>string</td>
                                                <td>Informar a data que a receita foi realizada</td>
                                            </tr>
                                            <tr>
                                                <td>Órgão</td>
                                                <td>string</td>
                                                <td>Órgão que adquiriu o bem/produto</td>
                                            </tr>
                                            <tr>
                                                <td>Fornecedor</td>
                                                <td>string</td>
                                                <td>Razão social ou nome fantasia do fornecedor</td>
                                            </tr>
                                            <tr>
                                                <td>CNPJ</td>
                                                <td>string</td>
                                                <td>CNPJ do fornecedor que vendeu o produto</td>
                                            </tr>
                                            <tr>
                                                <td>Preço Unidade</td>
                                                <td>string</td>
                                                <td>Preço de cada item</td>
                                            </tr>
                                            <tr>
                                                <td>Quantidade</td>
                                                <td>string</td>
                                                <td>Quantidade de cada item entregue</td>
                                            </tr>                      
                                        </tbody>
                                    </table>
                    </div> 
                <!--Fim Tabela de Descricao-->
                </div>
            </div>
            <!--Fim Bens e produtos adquiridos-->
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
@endsection