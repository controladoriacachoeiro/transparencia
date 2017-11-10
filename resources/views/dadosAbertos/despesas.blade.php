@extends('formFiltro')
@section('htmlheader_title')
    Download - Despesas
@stop
@section('main-content')

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
                                        {{ Form::text('datetimepickerDataInicio1', '', array('id'=>'datetimepickerDataInicio1', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div id="divDataFim">
                                <div class="col-md-3">
                                {{ Form::label('dataFim', 'Data Fim') }}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
                            {{ Form::close() }}
                            </div>
                            <div class="col-xs-2">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#empenho">Detalhes</span>
                            </div>
                        </div>
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
                                    <td>Ano do exercício ao qual se refere o orçamento da despesa</td>
                                </tr>
                                <tr>
                                <td>Órgão</td>
                                <td>string</td>
                                <td>Órgão, Autarquia, etc.</td>
                                </tr>
                                <tr>
                                    <td>Processo</td>
                                    <td>string</td>
                                    <td>Número do processo administrativo.</td>
                                </tr>
                                <tr>
                                    <td>Produto/Serviço</td>
                                    <td>string</td>
                                    <td>Especificação do Produto ou serviço.</td>
                                </tr>
                                <tr>
                                    <td>Credor Nome</td>
                                    <td>string</td>
                                    <td>Nome ou Razão Social</td>
                                </tr>
                                <tr>
                                    <td>CPF/CNPJ</td>
                                    <td>string</td>
                                    <td>CPF ou CNPJ</td>
                                </tr>
                                <tr>
                                    <td>Modalidade Licitatoria</td>
                                    <td>string</td>
                                    <td>Identificação da Modalidade Licitatória Aplicada. Ex: Pregão, Carta Convite, Inexigível</td>
                                </tr>
                                <tr>
                                    <td>Categoria Econômica</td>
                                    <td>string</td>
                                    <td>Identificação se trata de Despesa Corrente ou Despesa de Capital</td>
                                </tr>
                                <tr>
                                    <td>Natureza</td>
                                    <td>string</td>
                                    <td>Pessoal e Encargos Sociais, Juros e Encargos da Dívida, Outras Despesas Correntes, Investimentos, Inversões Financeiras, Amortização da Dívida</td>
                                </tr>
                                <tr>
                                    <td>Modalidade Aplicação</td>
                                    <td>string</td>
                                    <td>Aplicações Diretas, Transferências à União, Transferências a Instituições Privadas sem Fins Lucrativos, etc</td>
                                </tr>
                                <tr>
                                    <td>Descricao</td>
                                    <td>string</td>
                                    <td>Tem por finalidade identificar os objetos de gasto, tais como vencimentos e vantagens fixas, juros, diárias, material de consumo, serviços de terceiros prestados sob qualquer forma, subvenções sociais, obras e instalações, equipamentos e material permanente, etc.</td>
                                </tr>
                                <tr>
                                    <td>Programa</td>
                                    <td>string</td>
                                    <td>O identificador da ação no PPA. Exemplo: Programa Transporte Rodoviário</td>
                                </tr>
                                <tr>
                                    <td>Acao</td>
                                    <td>string</td>
                                    <td>O identificador da ação no PPA, podendo ser uma Atividade, um Projeto ou uma Operação Especial. Exemplo: “Asfaltamento das ruas do bairo xxx"</td>
                                </tr>
                                <tr>    
                                    <td>Subtitulo</td>
                                    <td>string</td>
                                    <td>Informa a localização do gasto, como o Bairro, ou região do município beneficiária daquele gasto</td>
                                </tr>
                                <tr>
                                    <td>Fonte Recursos</td>
                                    <td>string</td>
                                    <td>Recursos Ordinários, Recursos de Convênios, Recursos do FUNDEB, etc</td>
                                </tr>
                                <tr>
                                    <td>Função</td>
                                    <td>string</td>
                                    <td>Se relaciona com a missão institucional do órgão, por exemplo, cultura, educação, saúde, defesa, etc</td>
                                </tr>
                                <tr>
                                    <td>Subfunção</td>
                                    <td>string</td>
                                    <td>Representa um nível de agregação imediatamente inferior à função e deve evidenciar cada área da atuação governamental, por exemplo "Educação Infantil", "Educação de Jovens e Adultos", etc</td>
                                </tr>
                                <tr>
                                    <td>Nota</td>
                                    <td>string</td>
                                    <td>O identificador único daquela nota de empenho</td>
                                </tr>
                                <tr>
                                    <td>Data</td>
                                    <td>string</td>
                                    <td>A data em que o empenho foi realizado</td>
                                </tr>
                                <tr>
                                    <td>Valor</td>
                                    <td>string</td>
                                    <td>Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
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
                                        {{ Form::text('datetimepickerDataInicio2', '', array('id'=>'datetimepickerDataInicio2', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div id="divDataFim">
                                <div class="col-md-3">
                                {{ Form::label('dataFim', 'Data Fim') }}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        {{ Form::text('datetimepickerDataFim2', '', array('id'=>'datetimepickerDataFim2', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fim inputs de data-->
                        <!--btns-->
                        <div class="row form-group">
                            <div class="col-md-2" style="width:110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}
                            {{ Form::close() }}
                            </div>
                            <div class="col-md-2 button-detalhes">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#liquidacao">Detalhes</span>
                            </div>
                        </div>
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
                                    <td>Ano do exercício ao qual se refere o orçamento da despesa</td>
                                </tr>
                                <tr>
                                    <td>Órgão</td>
                                    <td>string</td>
                                    <td>Órgão, Autarquia, etc.</td>
                                </tr>
                                <tr>
                                    <td>Processo</td>
                                    <td>string</td>
                                    <td>Número do processo administrativo.</td>
                                </tr>
                                <tr>
                                    <td>Produto/Serviço</td>
                                    <td>string</td>
                                    <td>Especificação do Produto ou serviço.</td>
                                </tr>
                                <tr>
                                    <td>Credor Nome</td>
                                    <td>string</td>
                                    <td>Nome ou Razão Social</td>
                                </tr>
                                <tr>
                                    <td>CPF/CNPJ</td>
                                    <td>string</td>
                                    <td>CPF ou CNPJ</td>
                                </tr>
                                <tr>
                                    <td>Modalidade Licitatoria</td>
                                    <td>string</td>
                                    <td>Identificação da Modalidade Licitatória Aplicada. Ex: Pregão, Carta Convite, Inexigível</td>
                                </tr>
                                <tr>
                                    <td>Categoria Econômica</td>
                                    <td>string</td>
                                    <td>Identificação se trata de Despesa Corrente ou Despesa de Capital</td>
                                </tr>
                                <tr>
                                    <td>Natureza</td>
                                    <td>string</td>
                                    <td>Pessoal e Encargos Sociais, Juros e Encargos da Dívida, Outras Despesas Correntes, Investimentos, Inversões Financeiras, Amortização da Dívida</td>
                                </tr>
                                <tr>
                                    <td>Modalidade Aplicação</td>
                                    <td>string</td>
                                    <td>Aplicações Diretas, Transferências à União, Transferências a Instituições Privadas sem Fins Lucrativos, etc</td>
                                </tr>
                                <tr>
                                    <td>Descricao</td>
                                    <td>string</td>
                                    <td>Tem por finalidade identificar os objetos de gasto, tais como vencimentos e vantagens fixas, juros, diárias, material de consumo, serviços de terceiros prestados sob qualquer forma, subvenções sociais, obras e instalações, equipamentos e material permanente, etc.</td>
                                </tr>
                                <tr>
                                    <td>Programa</td>
                                    <td>string</td>
                                    <td>O identificador da ação no PPA. Exemplo: Programa Transporte Rodoviário</td>
                                </tr>
                                <tr>
                                    <td>Acao</td>
                                    <td>string</td>
                                    <td>O identificador da ação no PPA, podendo ser uma Atividade, um Projeto ou uma Operação Especial. Exemplo: “Asfaltamento das ruas do bairo xxx"</td>
                                </tr>
                                <tr>
                                    <td>Subtitulo</td>
                                    <td>string</td>
                                    <td>Informa a localização do gasto, como o Bairro, ou região do município beneficiária daquele gasto</td>
                                </tr>
                                <tr>
                                    <td>Fonte Recursos</td>
                                    <td>string</td>
                                    <td>Recursos Ordinários, Recursos de Convênios, Recursos do FUNDEB, etc</td>
                                </tr>
                                <tr>
                                    <td>Função</td>
                                    <td>string</td>
                                    <td>Se relaciona com a missão institucional do órgão, por exemplo, cultura, educação, saúde, defesa, etc</td>
                                </tr>
                                <tr>
                                    <td>Subfunção</td>
                                    <td>string</td>
                                    <td>Representa um nível de agregação imediatamente inferior à função e deve evidenciar cada área da atuação governamental, por exemplo "Educação Infantil", "Educação de Jovens e Adultos", etc</td>
                                </tr>
                                <tr>
                                    <td>Nota Empenho</td>
                                    <td>string</td>
                                    <td>O identificador único daquela nota de empenho</td>
                                </tr>
                                <tr>
                                    <td>Nota Liquidacao</td>
                                    <td>string</td>
                                    <td>O identificador único daquela nota de liquidação</td>
                                </tr>
                                <tr>
                                    <td>Data</td>
                                    <td>string</td>
                                    <td>A data em que a liquidação foi realizada</td>
                                </tr>
                                <tr>
                                    <td>Valor</td>
                                    <td>string</td>
                                    <td>Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
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
                                        {{ Form::text('datetimepickerDataInicio3', '', array('id'=>'datetimepickerDataInicio3', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div id="divDataFim">
                                <div class="col-md-3">
                                {{ Form::label('dataFim', 'Data Fim') }}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        {{ Form::text('datetimepickerDataFim3', '', array('id'=>'datetimepickerDataFim3', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fim inputs de data-->
                        <!--btns-->
                        <div class="row form-group">
                            <div class="col-md-2" style="width:110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}
                            {{ Form::close() }}
                            </div>
                            <div class="col-md-2 button-detalhes">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#pagamento">Detalhes</span>
                            </div>
                        </div>
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
                                    <td>Ano do exercício ao qual se refere o orçamento da despesa</td>
                                </tr>
                                <tr>
                                    <td>Órgão</td>
                                    <td>string</td>
                                    <td>Órgão, Autarquia, etc.</td>
                                </tr>
                                <tr>
                                    <td>Processo</td>
                                    <td>string</td>
                                    <td>Número do processo administrativo.</td>
                                </tr>
                                <tr>
                                    <td>Produto/Serviço</td>
                                    <td>string</td>
                                    <td>Especificação do Produto ou serviço.</td>
                                </tr>
                                <tr>
                                    <td>Credor Nome</td>
                                    <td>string</td>
                                    <td>Nome ou Razão Social</td>
                                </tr>
                                <tr>
                                    <td>CPF/CNPJ</td>
                                    <td>string</td>
                                    <td>CPF ou CNPJ</td>
                                </tr>
                                <tr>
                                    <td>Modalidade Licitatoria</td>
                                    <td>string</td>
                                    <td>Identificação da Modalidade Licitatória Aplicada. Ex: Pregão, Carta Convite, Inexigível</td>
                                </tr>
                                <tr>
                                    <td>Categoria Econômica</td>
                                    <td>string</td>
                                    <td>Identificação se trata de Despesa Corrente ou Despesa de Capital</td>
                                </tr>
                                <tr>
                                    <td>Natureza</td>
                                    <td>string</td>
                                    <td>Pessoal e Encargos Sociais, Juros e Encargos da Dívida, Outras Despesas Correntes, Investimentos, Inversões Financeiras, Amortização da Dívida</td>
                                </tr>
                                <tr>
                                    <td>Modalidade Aplicação</td>
                                    <td>string</td>
                                    <td>Aplicações Diretas, Transferências à União, Transferências a Instituições Privadas sem Fins Lucrativos, etc</td>
                                </tr>
                                <tr>
                                    <td>Descricao</td>
                                    <td>string</td>
                                    <td>Tem por finalidade identificar os objetos de gasto, tais como vencimentos e vantagens fixas, juros, diárias, material de consumo, serviços de terceiros prestados sob qualquer forma, subvenções sociais, obras e instalações, equipamentos e material permanente, etc.</td>
                                </tr>
                                <tr>
                                    <td>Programa</td>
                                    <td>string</td>
                                    <td>O identificador da ação no PPA. Exemplo: Programa Transporte Rodoviário</td>
                                </tr>
                                <tr>
                                    <td>Acao</td>
                                    <td>string</td>
                                    <td>O identificador da ação no PPA, podendo ser uma Atividade, um Projeto ou uma Operação Especial. Exemplo: “Asfaltamento das ruas do bairo xxx"</td>
                                </tr>
                                <tr>
                                    <td>Subtitulo</td>
                                    <td>string</td>
                                    <td>Informa a localização do gasto, como o Bairro, ou região do município beneficiária daquele gasto</td>
                                </tr>
                                <tr>
                                    <td>Fonte Recursos</td>
                                    <td>string</td>
                                    <td>Recursos Ordinários, Recursos de Convênios, Recursos do FUNDEB, etc</td>
                                </tr>
                                <tr>
                                    <td>Função</td>
                                    <td>string</td>
                                    <td>Se relaciona com a missão institucional do órgão, por exemplo, cultura, educação, saúde, defesa, etc</td>
                                </tr>
                                <tr>
                                    <td>Subfunção</td>
                                    <td>string</td>
                                    <td>Representa um nível de agregação imediatamente inferior à função e deve evidenciar cada área da atuação governamental, por exemplo "Educação Infantil", "Educação de Jovens e Adultos", etc</td>
                                </tr>
                                <tr>
                                    <td>Nota</td>
                                    <td>string</td>
                                    <td>O identificador único daquela nota de empenho</td>
                                </tr>
                                <tr>
                                    <td>Nota Liquidacao</td>
                                    <td>string</td>
                                    <td>O identificador único daquela nota de liquidação</td>
                                </tr>
                                <tr>
                                    <td>Nota Pagamento</td>
                                    <td>string</td>
                                    <td>O identificador único daquela nota de pagamento</td>
                                </tr>
                                <tr>
                                    <td>Ordem pagamento</td>
                                    <td>string</td>
                                    <td>O código identificador da ordem bancária na qual o pagamento foi realizado</td>
                                </tr>
                                <tr>
                                    <td>Data</td>
                                    <td>string</td>
                                    <td>A data em que o empenho foi realizado</td>
                                </tr>
                                <tr>
                                    <td>Valor</td>
                                    <td>string</td>
                                    <td>Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
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
                                        {{ Form::text('datetimepickerDataInicio4', '', array('id'=>'datetimepickerDataInicio4', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                            <div id="divDataFim">
                                <div class="col-md-3">
                                {{ Form::label('dataFim', 'Data Fim') }}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        {{ Form::text('datetimepickerDataFim4', '', array('id'=>'datetimepickerDataFim4', 'class' => 'form-control')) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fim inputs de data-->
                        <!--btns-->
                        <div class="row form-group">
                            <div class="col-md-2" style="width:110px;">
                            {{ Form::submit('Download', array('class'=>'btn btn-primary download')) }}
                            {{ Form::close() }}
                            </div>
                            <div class="col-md-2 button-detalhes">
                                <span class="btn btn-primary" data-toggle="collapse" data-target="#resto">Detalhes</span>
                            </div>
                        </div>
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
                                    <td>Ano do exercício ao qual se refere o orçamento da despesa</td>
                                </tr>
                                <tr>
                                    <td>Órgão</td>
                                    <td>string</td>
                                    <td>Órgão, Autarquia, etc.</td>
                                </tr>
                                <tr>
                                    <td>Processo</td>
                                    <td>string</td>
                                    <td>Número do processo administrativo.</td>
                                </tr>
                                <tr>
                                    <td>Produto/Serviço</td>
                                    <td>string</td>
                                    <td>Especificação do Produto ou serviço.</td>
                                </tr>
                                <tr>
                                    <td>Credor Nome</td>
                                    <td>string</td>
                                    <td>Nome ou Razão Social</td>
                                </tr>
                                <tr>
                                    <td>CPF/CNPJ</td>
                                    <td>string</td>
                                    <td>CPF ou CNPJ</td>
                                </tr>
                                <tr>
                                    <td>Modalidade Licitatoria</td>
                                    <td>string</td>
            
                                    <td>Identificação da Modalidade Licitatória Aplicada. Ex: Pregão, Carta Convite, Inexigível</td>
                                </tr>
                                <tr>
                                    <td>Categoria Econômica</td>
                                    <td>string</td>
                                    <td>Identificação se trata de Despesa Corrente ou Despesa de Capital</td>
                                </tr>
                                <tr>
                                    <td>Natureza</td>
                                    <td>string</td>
                                    <td>Pessoal e Encargos Sociais, Juros e Encargos da Dívida, Outras Despesas Correntes, Investimentos, Inversões Financeiras, Amortização da Dívida</td>
                                </tr>
                                <tr>
                                    <td>Modalidade Aplicação</td>
                                    <td>string</td>
                                    <td>Aplicações Diretas, Transferências à União, Transferências a Instituições Privadas sem Fins Lucrativos, etc</td>
                                </tr>
                                <tr>
                                    <td>Descricao</td>
                                    <td>string</td>
                                    <td>Tem por finalidade identificar os objetos de gasto, tais como vencimentos e vantagens fixas, juros, diárias, material de consumo, serviços de terceiros prestados sob qualquer forma, subvenções sociais, obras e instalações, equipamentos e material permanente, etc.</td>
                                </tr>
                                <tr>
                                    <td>Programa</td>
                                    <td>string</td>
                                    <td>O identificador da ação no PPA. Exemplo: Programa Transporte Rodoviário</td>
                                </tr>
                                <tr>
                                    <td>Acao</td>
                                    <td>string</td>
                                    <td>O identificador da ação no PPA, podendo ser uma Atividade, um Projeto ou uma Operação Especial. Exemplo: “Asfaltamento das ruas do bairo xxx"</td>
                                </tr>
                                <tr>
                                    <td>Subtitulo</td>
                                    <td>string</td>
                                    <td>Informa a localização do gasto, como o Bairro, ou região do município beneficiária daquele gasto</td>
                                </tr>
                                <tr>
                                    <td>Fonte Recursos</td>
                                    <td>string</td>
                                    <td>Recursos Ordinários, Recursos de Convênios, Recursos do FUNDEB, etc</td>
                                </tr>
                                <tr>
                                    <td>Função</td>
                                    <td>string</td>
                                    <td>Se relaciona com a missão institucional do órgão, por exemplo, cultura, educação, saúde, defesa, etc</td>
                                </tr>
                                <tr>
                                    <td>Subfunção</td>
                                    <td>string</td>
                                    <td>Representa um nível de agregação imediatamente inferior à função e deve evidenciar cada área da atuação governamental, por exemplo "Educação Infantil", "Educação de Jovens e Adultos", etc</td>
                                </tr>
                                <tr>
                                    <td>Nota</td>
                                    <td>string</td>
                                    <td>O identificador único daquela nota de empenho</td>
                                </tr>
                                <tr>
                                    <td>Nota Liquidacao</td>
                                    <td>string</td>
                                    <td>O identificador único daquela nota de liquidação</td>
                                </tr>
                                <tr>
                                    <td>Nota Pagamento</td>
                                    <td>string</td>
                                    <td>O identificador único daquela nota de pagamento</td>
                                </tr>
                                <tr>
                                    <td>Ordem pagamento</td>
                                    <td>string</td>
                                    <td>O código identificador da ordem bancária na qual o pagamento foi realizado</td>
                                </tr>
                                <tr>
                                    <td>Data</td>
                                    <td>string</td>
                                    <td>A data em que o empenho foi realizado</td>
                                </tr>
                                <tr>
                                    <td>Valor</td>
                                    <td>string</td>
                                    <td>Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
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