@extends('formFiltro')
@section('htmlheader_title')
    Download - Despesas
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
                    <li class="active">Download - Despesas</li>                                                                                                                           
                </ol>        
            </div>
        </div>            
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box-body box box-solid">
            <div class="box-group" id="accordion">
                <!--Empenho-->
                    <!--Titulo-->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                Empenho
                            </h4>
                        </div>
                    </div>
                    <!--Fim Titulo-->
                    <div class="box-body">
                        {{Form::open(array('url' => '/dadosabertos/despesa/empenhos', 'method' => 'POST')) }}
                        <!---Inputs de data-->
                        <div class="row form-group">
                            <div id="divDataInicio">
                                <div class="col-md-3">
                                {{ Form::label('dataInicio', 'Data Início') }}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <label for="datetimepickerDataInicio1" style="display:none">Data Inicio</label>
                                        {{ Form::text('datetimepickerDataInicio1', '', array('id'=>'datetimepickerDataInicio1', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div id="divDataFim">
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
                        <!--Fim inputs de data-->
                        <!--btns-->
                        <div class="row form-group">
                            <div class="col-xs-2" style="width:110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}                            
                            </div>
                            <div class="col-xs-2">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#empenho">Detalhes</span>
                            </div>
                        </div>
                        {{ Form::close() }}
                        <!---Fim btns-->
                        <!---Erro-->
                        @if(session()->has('empenho'))
                            <div class="alert alert-danger error-download">
                                {{ session()->get('empenho') }}
                            </div>
                        @endif
                        <!--Fim erro-->
                    </div>
                    <!--Tabela Detalhes-->
                    <div id="empenho" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas do download de empenho">
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
                                    <td scope="col">string</td>
                                    <td scope="col">Ano do exercício ao qual se refere o orçamento da despesa</td>
                                </tr>
                                <tr>
                                <td scope="col">Órgão</td>
                                <td scope="col">string</td>
                                <td scope="col">Órgão, Autarquia, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Processo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número do processo administrativo.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Produto/Serviço</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Especificação do Produto ou serviço.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Credor Nome</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome ou Razão Social</td>
                                </tr>
                                <tr>
                                    <td scope="col">CPF/CNPJ</td>
                                    <td scope="col">string</td>
                                    <td scope="col">CPF ou CNPJ</td>
                                </tr>
                                <tr>
                                    <td scope="col">Modalidade Licitatoria</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificação da Modalidade Licitatória Aplicada. Ex: Pregão, Carta Convite, Inexigível</td>
                                </tr>
                                <tr>
                                    <td scope="col">Categoria Econômica</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificação se trata de Despesa Corrente ou Despesa de Capital</td>
                                </tr>
                                <tr>
                                    <td scope="col">Natureza</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Pessoal e Encargos Sociais, Juros e Encargos da Dívida, Outras Despesas Correntes, Investimentos, Inversões Financeiras, Amortização da Dívida</td>
                                </tr>
                                <tr>
                                    <td scope="col">Modalidade Aplicação</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Aplicações Diretas, Transferências à União, Transferências a Instituições Privadas sem Fins Lucrativos, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Descricao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Tem por finalidade identificar os objetos de gasto, tais como vencimentos e vantagens fixas, juros, diárias, material de consumo, serviços de terceiros prestados sob qualquer forma, subvenções sociais, obras e instalações, equipamentos e material permanente, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Programa</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador da ação no PPA. Exemplo: Programa Transporte Rodoviário</td>
                                </tr>
                                <tr>
                                    <td scope="col">Acao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador da ação no PPA, podendo ser uma Atividade, um Projeto ou uma Operação Especial. Exemplo: “Asfaltamento das ruas do bairo xxx"</td>
                                </tr>
                                <tr>    
                                    <td scope="col">Subtitulo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Informa a localização do gasto, como o Bairro, ou região do município beneficiária daquele gasto</td>
                                </tr>
                                <tr>
                                    <td scope="col">Fonte Recursos</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Recursos Ordinários, Recursos de Convênios, Recursos do FUNDEB, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Função</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Se relaciona com a missão institucional do órgão, por exemplo, cultura, educação, saúde, defesa, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Subfunção</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Representa um nível de agregação imediatamente inferior à função e deve evidenciar cada área da atuação governamental, por exemplo "Educação Infantil", "Educação de Jovens e Adultos", etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Nota</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de empenho</td>
                                </tr>
                                <tr>
                                    <td scope="col">Data</td>
                                    <td scope="col">string</td>
                                    <td scope="col">A data em que o empenho foi realizado</td>
                                </tr>
                                <tr>
                                    <td scope="col">Valor</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!---Fim tabela detalhes-->
                <!--fim Empenho-->

                <!--Liquidação-->
                    <!--Titulo-->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                Liquidações
                            </h4>
                        </div>
                    </div>
                    <!--Fim Titulo-->
                    <div class="box-body">
                        {{Form::open(array('url' => '/dadosabertos/despesa/liquidacoes', 'method' => 'POST')) }}
                        <!---Inputs de data-->
                        <div class="row form-group">
                            <div id="divDataInicio">
                                <div class="col-md-3">
                                {{ Form::label('dataInicio', 'Data Início') }}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <label for="datetimepickerDataInicio2" style="display:none">Data Inicio</label>
                                        {{ Form::text('datetimepickerDataInicio2', '', array('id'=>'datetimepickerDataInicio2', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div id="divDataFim">
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
                        <!--Fim inputs de data-->
                        <!--btns-->
                        <div class="row form-group">
                            <div class="col-xs-2" style="width:110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}                            
                            </div>
                            <div class="col-xs-2">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#liquidacao">Detalhes</span>
                            </div>
                        </div>
                        {{ Form::close() }}
                        <!---Fim btns-->
                        <!---Erro-->
                        @if(session()->has('liquidacao'))
                            <div class="alert alert-danger error-download">
                                {{ session()->get('liquidacao') }}
                            </div>
                        @endif
                        <!--Fim erro-->
                    </div>
                    <!--Tabela Detalhes-->
                    <div id="liquidacao" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas do download de liquidação">
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
                                    <td scope="col">string</td>
                                    <td scope="col">Ano do exercício ao qual se refere o orçamento da despesa</td>
                                </tr>
                                <tr>
                                    <td scope="col">Órgão</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão, Autarquia, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Processo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número do processo administrativo.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Produto/Serviço</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Especificação do Produto ou serviço.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Credor Nome</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome ou Razão Social</td>
                                </tr>
                                <tr>
                                    <td scope="col">CPF/CNPJ</td>
                                    <td scope="col">string</td>
                                    <td scope="col">CPF ou CNPJ</td>
                                </tr>
                                <tr>
                                    <td scope="col">Modalidade Licitatoria</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificação da Modalidade Licitatória Aplicada. Ex: Pregão, Carta Convite, Inexigível</td>
                                </tr>
                                <tr>
                                    <td scope="col">Categoria Econômica</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificação se trata de Despesa Corrente ou Despesa de Capital</td>
                                </tr>
                                <tr>
                                    <td scope="col">Natureza</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Pessoal e Encargos Sociais, Juros e Encargos da Dívida, Outras Despesas Correntes, Investimentos, Inversões Financeiras, Amortização da Dívida</td>
                                </tr>
                                <tr>
                                    <td scope="col">Modalidade Aplicação</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Aplicações Diretas, Transferências à União, Transferências a Instituições Privadas sem Fins Lucrativos, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Descricao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Tem por finalidade identificar os objetos de gasto, tais como vencimentos e vantagens fixas, juros, diárias, material de consumo, serviços de terceiros prestados sob qualquer forma, subvenções sociais, obras e instalações, equipamentos e material permanente, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Programa</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador da ação no PPA. Exemplo: Programa Transporte Rodoviário</td>
                                </tr>
                                <tr>
                                    <td scope="col">Acao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador da ação no PPA, podendo ser uma Atividade, um Projeto ou uma Operação Especial. Exemplo: “Asfaltamento das ruas do bairo xxx"</td>
                                </tr>
                                <tr>
                                    <td scope="col">Subtitulo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Informa a localização do gasto, como o Bairro, ou região do município beneficiária daquele gasto</td>
                                </tr>
                                <tr>
                                    <td scope="col">Fonte Recursos</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Recursos Ordinários, Recursos de Convênios, Recursos do FUNDEB, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Função</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Se relaciona com a missão institucional do órgão, por exemplo, cultura, educação, saúde, defesa, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Subfunção</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Representa um nível de agregação imediatamente inferior à função e deve evidenciar cada área da atuação governamental, por exemplo "Educação Infantil", "Educação de Jovens e Adultos", etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Nota Empenho</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de empenho</td>
                                </tr>
                                <tr>
                                    <td scope="col">Nota Liquidacao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de liquidação</td>
                                </tr>
                                <tr>
                                    <td scope="col">Data</td>
                                    <td scope="col">string</td>
                                    <td scope="col">A data em que a liquidação foi realizada</td>
                                </tr>
                                <tr>
                                    <td scope="col">Valor</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!---Fim tabela detalhes-->
                <!--fim Liquidação-->

                <!--Pagamento-->
                    <!--Titulo-->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                Pagamentos
                            </h4>
                        </div>
                    </div>
                    <!--Fim Titulo-->
                    <div class="box-body">
                        {{Form::open(array('url' => '/dadosabertos/despesa/pagamentos', 'method' => 'POST')) }}
                        <!---Inputs de data-->
                        <div class="row form-group">
                            <div id="divDataInicio">
                                <div class="col-md-3">
                                {{ Form::label('dataInicio', 'Data Início') }}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <label for="datetimepickerDataInicio3" style="display:none">Data Inicio</label>
                                        {{ Form::text('datetimepickerDataInicio3', '', array('id'=>'datetimepickerDataInicio3', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div id="divDataFim">
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
                        <!--Fim inputs de data-->
                        <!--btns-->
                        <div class="row form-group">
                            <div class="col-xs-2" style="width:110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}                            
                            </div>
                            <div class="col-xs-2">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#pagamento">Detalhes</span>
                            </div>
                        </div>
                        {{ Form::close() }}
                        <!---Fim btns-->
                        <!---Erro-->
                        @if(session()->has('pagamento'))
                            <div class="alert alert-danger error-download">
                                {{ session()->get('pagamento') }}
                            </div>
                        @endif
                        <!--Fim erro-->
                    </div>
                    <!--Tabela Detalhes-->
                    <div id="pagamento" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas do download de pagamento">
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
                                    <td scope="col">string</td>
                                    <td scope="col">Ano do exercício ao qual se refere o orçamento da despesa</td>
                                </tr>
                                <tr>
                                    <td scope="col">Órgão</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão, Autarquia, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Processo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número do processo administrativo.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Produto/Serviço</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Especificação do Produto ou serviço.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Credor Nome</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome ou Razão Social</td>
                                </tr>
                                <tr>
                                    <td scope="col">CPF/CNPJ</td>
                                    <td scope="col">string</td>
                                    <td scope="col">CPF ou CNPJ</td>
                                </tr>
                                <tr>
                                    <td scope="col">Modalidade Licitatoria</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificação da Modalidade Licitatória Aplicada. Ex: Pregão, Carta Convite, Inexigível</td>
                                </tr>
                                <tr>
                                    <td scope="col">Categoria Econômica</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificação se trata de Despesa Corrente ou Despesa de Capital</td>
                                </tr>
                                <tr>
                                    <td scope="col">Natureza</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Pessoal e Encargos Sociais, Juros e Encargos da Dívida, Outras Despesas Correntes, Investimentos, Inversões Financeiras, Amortização da Dívida</td>
                                </tr>
                                <tr>
                                    <td scope="col">Modalidade Aplicação</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Aplicações Diretas, Transferências à União, Transferências a Instituições Privadas sem Fins Lucrativos, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Descricao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Tem por finalidade identificar os objetos de gasto, tais como vencimentos e vantagens fixas, juros, diárias, material de consumo, serviços de terceiros prestados sob qualquer forma, subvenções sociais, obras e instalações, equipamentos e material permanente, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Programa</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador da ação no PPA. Exemplo: Programa Transporte Rodoviário</td>
                                </tr>
                                <tr>
                                    <td scope="col">Acao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador da ação no PPA, podendo ser uma Atividade, um Projeto ou uma Operação Especial. Exemplo: “Asfaltamento das ruas do bairo xxx"</td>
                                </tr>
                                <tr>
                                    <td scope="col">Subtitulo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Informa a localização do gasto, como o Bairro, ou região do município beneficiária daquele gasto</td>
                                </tr>
                                <tr>
                                    <td scope="col">Fonte Recursos</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Recursos Ordinários, Recursos de Convênios, Recursos do FUNDEB, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Função</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Se relaciona com a missão institucional do órgão, por exemplo, cultura, educação, saúde, defesa, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Subfunção</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Representa um nível de agregação imediatamente inferior à função e deve evidenciar cada área da atuação governamental, por exemplo "Educação Infantil", "Educação de Jovens e Adultos", etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Nota</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de empenho</td>
                                </tr>
                                <tr>
                                    <td scope="col">Nota Liquidacao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de liquidação</td>
                                </tr>
                                <tr>
                                    <td scope="col">Nota Pagamento</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de pagamento</td>
                                </tr>
                                <tr>
                                    <td scope="col">Ordem pagamento</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O código identificador da ordem bancária na qual o pagamento foi realizado</td>
                                </tr>
                                <tr>
                                    <td scope="col">Data</td>
                                    <td scope="col">string</td>
                                    <td scope="col">A data em que o empenho foi realizado</td>
                                </tr>
                                <tr>
                                    <td scope="col">Valor</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!---Fim tabela detalhes-->
                <!--fim pagamento-->

                <!--Resto-->
                    <!--Titulo-->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                Resto a Pagar
                            </h4>
                        </div>
                    </div>
                    <!--Fim Titulo-->
                    <div class="box-body">
                        {{Form::open(array('url' => '/dadosabertos/despesa/restospagar', 'method' => 'POST')) }}
                        <!---Inputs de data-->
                        <div class="row form-group">
                            <div id="divDataInicio">
                                <div class="col-md-3">
                                {{ Form::label('dataInicio', 'Data Início') }}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <label for="datetimepickerDataInicio4" style="display:none">Data Inicio</label>
                                        {{ Form::text('datetimepickerDataInicio4', '', array('id'=>'datetimepickerDataInicio4', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div id="divDataFim">
                                <div class="col-md-3">
                                {{ Form::label('dataFim', 'Data Fim') }}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <label for="datetimepickerDataFim4" style="display:none">Data Fim</label>
                                        {{ Form::text('datetimepickerDataFim4', '', array('id'=>'datetimepickerDataFim4', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fim inputs de data-->
                        <!--btns-->
                        <div class="row form-group">
                            <div class="col-xs-2" style="width:110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}
                            </div>
                            <div class="col-xs-2">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#resto">Detalhes</span>
                            </div>
                        </div>
                        {{ Form::close() }}
                        <!---Fim btns-->
                        <!---Erro-->
                        @if(session()->has('resto'))
                            <div class="alert alert-danger error-download">
                                {{ session()->get('resto') }}
                            </div>
                        @endif
                        <!--Fim erro-->
                    </div>
                    <!--Tabela Detalhes-->
                    <div id="resto" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas do download de restos a pagar">
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
                                    <td scope="col">string</td>
                                    <td scope="col">Ano do exercício ao qual se refere o orçamento da despesa</td>
                                </tr>
                                <tr>
                                    <td scope="col">Órgão</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão, Autarquia, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Processo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número do processo administrativo.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Produto/Serviço</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Especificação do Produto ou serviço.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Credor Nome</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome ou Razão Social</td>
                                </tr>
                                <tr>
                                    <td scope="col">CPF/CNPJ</td>
                                    <td scope="col">string</td>
                                    <td scope="col">CPF ou CNPJ</td>
                                </tr>
                                <tr>
                                    <td scope="col">Modalidade Licitatoria</td>
                                    <td scope="col">string</td>
            
                                    <td scope="col">Identificação da Modalidade Licitatória Aplicada. Ex: Pregão, Carta Convite, Inexigível</td>
                                </tr>
                                <tr>
                                    <td scope="col">Categoria Econômica</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificação se trata de Despesa Corrente ou Despesa de Capital</td>
                                </tr>
                                <tr>
                                    <td scope="col">Natureza</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Pessoal e Encargos Sociais, Juros e Encargos da Dívida, Outras Despesas Correntes, Investimentos, Inversões Financeiras, Amortização da Dívida</td>
                                </tr>
                                <tr>
                                    <td scope="col">Modalidade Aplicação</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Aplicações Diretas, Transferências à União, Transferências a Instituições Privadas sem Fins Lucrativos, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Descricao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Tem por finalidade identificar os objetos de gasto, tais como vencimentos e vantagens fixas, juros, diárias, material de consumo, serviços de terceiros prestados sob qualquer forma, subvenções sociais, obras e instalações, equipamentos e material permanente, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Programa</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador da ação no PPA. Exemplo: Programa Transporte Rodoviário</td>
                                </tr>
                                <tr>
                                    <td scope="col">Acao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador da ação no PPA, podendo ser uma Atividade, um Projeto ou uma Operação Especial. Exemplo: “Asfaltamento das ruas do bairo xxx"</td>
                                </tr>
                                <tr>
                                    <td scope="col">Subtitulo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Informa a localização do gasto, como o Bairro, ou região do município beneficiária daquele gasto</td>
                                </tr>
                                <tr>
                                    <td scope="col">Fonte Recursos</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Recursos Ordinários, Recursos de Convênios, Recursos do FUNDEB, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Função</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Se relaciona com a missão institucional do órgão, por exemplo, cultura, educação, saúde, defesa, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Subfunção</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Representa um nível de agregação imediatamente inferior à função e deve evidenciar cada área da atuação governamental, por exemplo "Educação Infantil", "Educação de Jovens e Adultos", etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Nota</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de empenho</td>
                                </tr>
                                <tr>
                                    <td scope="col">Nota Liquidacao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de liquidação</td>
                                </tr>
                                <tr>
                                    <td scope="col">Nota Pagamento</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de pagamento</td>
                                </tr>
                                <tr>
                                    <td scope="col">Ordem pagamento</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O código identificador da ordem bancária na qual o pagamento foi realizado</td>
                                </tr>
                                <tr>
                                    <td scope="col">Data</td>
                                    <td scope="col">string</td>
                                    <td scope="col">A data em que o empenho foi realizado</td>
                                </tr>
                                <tr>
                                    <td scope="col">Valor</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
                                </tr>
                            </tbody>        
                        </table>
                    </div>
                    <!---Fim tabela detalhes-->
                <!--fim Resto-->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scriptsadd')
<link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
<!--grafico-->    
<script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
<script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/js/options.min.js') }}"></script> 
<script src="https://rawgit.com/digitalBush/jquery.maskedinput/master/dist/jquery.maskedinput.min.js"></script>
<script>
   for (i = 1; i <= 5 ; i++) { 
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