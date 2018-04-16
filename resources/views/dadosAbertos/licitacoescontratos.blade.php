@extends('formFiltro')

@section('htmlheader_title')
    Download - Licitações e Contratos
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
                    <li class="active">Download - Licitações e Contratos</li>                                                                                                                           
                </ol>        
            </div>
        </div>            
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class=" box-body box box-solid">
            <div class="box-group" id="accordion">

            <!--Licitações-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                <h4 class="box-title">                    
                    Licitações                   
                </h4>
                </div>
                <div id="collapse1">
                <div class="box-body">
                    {{ Form::open(array('url' => '/dadosabertos/licitacoescontratos/licitacoes', 'method' => 'POST')) }}                                              
                    <div class="row form-group">
                        <div class="col-xs-2" style="width: 110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}                            
                        </div>
                        <div class="col-xs-2">
                            <span class="btn btn-primary" data-toggle="collapse" data-target="#andamento">Detalhes</span>
                        </div>
                    </div>
                    {{ Form::close() }}

                    <!-- Erro -->
                    @if(session()->has('mensagemLicitacoes'))
                        <div class="col-md-8 alert alert-danger" style="font-size:20px">
                            {{ session()->get('mensagemLicitacoes') }}
                        </div>
                    @endif

                    @if(session()->has('andamento'))
                        <div class="alert alert-danger error-download">
                            {{ session()->get('andamento') }}
                        </div>
                    @endif
                    <!--Fim erro-->

                </div>
                <!--Tabela de Descricao-->
                    <div id="andamento" class="collapse">
                    <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas de download de licitações em andamento">
                                        <thead>
                                            <tr>
                                                <th scope="col" style='vertical-align:middle'>Coluna</th>
                                                <th scope="col" style='vertical-align:middle'>Tipo</th>
                                                <th scope="col" style='vertical-align:middle'>Descrição</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="col">Data das Propostas</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Indica a data da proposta</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">Modalidade Licitatória</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Indicação da modalidade, se pregão, concorrência, tomada de preços, convite</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">Número do Edital</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Indicação do númedo do edital da licitação</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">Número do Processo</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Número do processo licitatório</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">Órgão Licitante</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Indicação do órgão que realiza a licitação</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">Objeto Licitado</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Indicação do objeto licitado, de forma clara e precisa</td>
                                            </tr>            
                                        </tbody>
                                    </table>
                    </div> 
                <!--Fim Tabela de Descricao-->
                </div>
            </div>
            <!--Fim Licitaçãoes-->

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
                        </div>
                        <div class="col-xs-2">
                            <span class="btn btn-primary" data-toggle="collapse" data-target="#contrato">Detalhes</span>
                        </div>                            
                    </div>
                    {{ Form::close() }}

                    <!-- Erro -->
                    @if(session()->has('mensagemContratos'))
                        <div class="col-md-8 alert alert-danger" style="font-size:20px">
                            {{ session()->get('mensagemContratos') }}
                        </div>
                    @endif
                    <!--Fim erro-->

                </div>
                <!--Tabela de Descricao-->
                    <div id="contrato" class="collapse">
                    <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas de download de contratos">
                                        <thead>
                                            <tr>
                                                <th scope="col" style='vertical-align:middle'>Coluna</th>
                                                <th scope="col" style='vertical-align:middle'>Tipo</th>
                                                <th scope="col" style='vertical-align:middle'>Descrição</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="col">Data Inicial</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Data de Assinatura, Publicação ou Início de Vigência do Contrato</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">Data Final</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Data do fim do contrato</td>
                                            </tr>                      
                                            <tr>
                                                <td scope="col">Nome do Contratado</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Nome do Contratado</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">CPF/CNPJ do Contratado</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">CPF/CNPJ do fornecedor contratado</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">Órgão Contratante</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Órgão cujo titular assina o contrato</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">Objeto do Contrato</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Descrição do objeto do contrato</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">Número do Processo</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Número do processo ou do edital de licitação que originou o contrato, ou informação de sua dispensa, caso ocorra</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">Valor do Contrato</td>
                                                <td scope="col">texto</td>
                                                <td scope="col">Valor global do contrato</td>
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
                            <label for="datetimepickerDataInicio3" style="display:none">Data Inicio</label>
                            {{ Form::text('datetimepickerDataInicio3', '', array('id'=>'datetimepickerDataInicio3', 'class' => 'form-control')) }}
                        </div>
                        </div>
                    </div>
                    <div id='divDataFim'>
                        <div class="col-md-3">
                        {{ Form::label('dataFim', 'Data Fim') }}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <label for="datetimepickerDataFim3" style="display:none">Data Fim</label>
                            {{ Form::text('datetimepickerDataFim3', '', array('id'=>'datetimepickerDataFim3', 'class' => 'form-control')) }}
                        </div>
                        </div>
                    </div>    
                    </div>                                              
                    <div class="row form-group">
                        <div class="col-xs-2" style="width: 110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}                                
                        </div>
                        <div class="col-xs-2">
                            <span class="btn btn-primary" data-toggle="collapse" data-target="#bens">Detalhes</span>
                        </div>
                    </div>
                    {{ Form::close() }}

                    <!-- Erro -->
                    @if(session()->has('mensagemBens'))
                        <div class="col-md-8 alert alert-danger" style="font-size:20px">
                            {{ session()->get('mensagemBens') }}
                        </div>
                    @endif

                    @if(session()->has('bens'))
                        <div class="alert alert-danger error-download">
                            {{ session()->get('bens') }}
                        </div>
                    @endif                    
                    <!--Fim erro-->
                    
                </div>
                <!--Tabela de Descricao-->
                    <div id="bens" class="collapse">
                    <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas de download de bens e produtos adquiridos">
                        <thead>
                            <tr>
                                <th scope="col" style='vertical-align:middle'>Coluna</th>
                                <th scope="col" style='vertical-align:middle'>Tipo</th>
                                <th scope="col" style='vertical-align:middle'>Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col">Data Aquisição</td>
                                <td scope="col">texto</td>
                                <td scope="col">Data em que o bem/produto foi entregue</td>
                            </tr>
                            <tr>
                                <td scope="col">Órgão Adquirente</td>
                                <td scope="col">texto</td>
                                <td scope="col">Órgão que adquiriu o bem/produto</td>
                            </tr>
                            <tr>
                                <td scope="col">Identificação do Produto</td>
                                <td scope="col">texto</td>
                                <td scope="col">Nome do bem ou produto que foi adquirido</td>
                            </tr>
                            <tr>
                                <td scope="col">Nome do Fornecedor</td>
                                <td scope="col">texto</td>
                                <td scope="col">Razão social ou nome fantasia do fornecedor</td>
                            </tr>
                            <tr>
                                <td scope="col">CNPJ do Fornecedor</td>
                                <td scope="col">texto</td>
                                <td scope="col">CNPJ do fornecedor que vendeu o produto</td>
                            </tr>
                            <tr>
                                <td scope="col">Preço Unitário</td>
                                <td scope="col">texto</td>
                                <td scope="col">Preço de cada item</td>
                            </tr>
                            <tr>
                                <td scope="col">Unidade de Medida</td>
                                <td scope="col">texto</td>
                                <td scope="col">Unidade de Medida do bem/produto</td>
                            </tr>
                            <tr>
                                <td scope="col">Quantidade Adquirida</td>
                                <td scope="col">texto</td>
                                <td scope="col">Quantidade de cada item entregue</td>
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