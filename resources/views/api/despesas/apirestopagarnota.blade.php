@extends('layouts.app')
@section('htmlheader_title', 'API Nota Resto a Pagar')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Nota Resto a Pagar'));
    ?>

    <div class='row'>
        <div class='col-md-12'>
            @include('layouts.navegacao')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <pre>transparencia.cachoeiro.es.gov.br/api/despesas/notarestopagar/{numeronota}/{nota}</pre>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row">
                        <table id="tabela1" class="table table-bordered table-striped" summary="Tabela com os parâmetros, descrição, tipo e formato da url da api">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Parâmetros</th>
                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">numeronota</td>
                                    <td scope="col">Número da nota</td>
                                    <td scope="col">varchar(20)</td>
                                </tr>
                                <tr>
                                    <td scope="col">ano</td>
                                    <td scope="col">Ano de exercício da nota</td>
                                    <td scope="col">int</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo 1</h3>
                <p><a href="/api/despesas/notarestopagar/7/2018">transparencia.cachoeiro.es.gov.br/api/despesas/notarestopagar/7/2018</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"PagamentoID":554,"AnoExercicio":2018,"UnidadeGestora":"FUNDO MUNICIPAL DE SAÚDE DE CACHOEIRO DE ITAPEMIRIM","Orgao":"SECRETARIA MUNICIPAL DE SAUDE","NumeroProcesso":"5180","AnoProcesso":"2017","ProdutoServico":"PAGTº REF. SERV. DE FORNECIMENTO DE ÁGUA E COLETA DE ESGOTO PRESTADOS A SEMUS, NOS MESES DE OUTUBRO E NOVEMBRO\/2017 - CONF. PROC. 01-29619\/2017","Beneficiario":"BRK AMBIENTAL - CACHOEIRO DE ITAPEMIRIM S.A.","CPF_CNPJ":"02628150000170","ModalidadeLicitatoria":"Não Aplicável","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"APLICAÇÕES DIRETAS","ElemDespesa":"OUTROS SERVICOS DE TERCEIROS-PESSOA JURIDICA","Programa":"ADMINISTRAÇÃO EM SAÚDE - CACHOEIRO","Acao":"GESTÃO ADMINISTRATIVA EM SAÚDE","Subtitulo":null,"FonteRecursos":"SAUDE - RECURSOS PROPRIOS","Funcao":"SAÚDE","SubFuncao":"ATENÇÃO BÁSICA","NotaEmpenho":"16000065","NotaLiquidacao":"16008578","NotaPagamento":"7","OrdemBancaria":null,"DataPagamento":"2018-01-05","ValorPago":54123.4,"AnoNotaEmpenho":2017,"AnoNotaLiquidacao":2017}]</pre>
                </div>
                
                <h3>Detalhes das colunas</h3>
                 <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição do retorno da api">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Coluna</th>
                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">AnoExercicio</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Ano do exercício ao qual se refere o orçamento da despesa</td>
                                </tr>
                                <tr>
                                    <td scope="col">UnidadeGestora</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Unidade Gestora de Restos a Pagar</td>
                                </tr>
                                <tr>
                                    <td scope="col">Orgao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão, Autarquia, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">NumeroProcesso</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número do processo administrativo.</td>
                                </tr>
                                <tr>
                                    <td scope="col">AnoProcesso</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Ano do processo administrativo.</td>
                                </tr>
                                <tr>
                                    <td scope="col">ProdutoServico</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Especificação do Produto ou serviço.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Beneficiario</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome ou Razão Social</td>
                                </tr>
                                <tr>
                                    <td scope="col">CPF_CNPJ</td>
                                    <td scope="col">string</td>
                                    <td scope="col">CPF ou CNPJ</td>
                                </tr>
                                <tr>
                                    <td scope="col">ModalidadeLicitatoria</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificação da Modalidade Licitatória Aplicada. Ex: Pregão, Carta Convite, Inexigível</td>
                                </tr>
                                <tr>
                                    <td scope="col">CatEconomica</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificação se trata de Despesa Corrente ou Despesa de Capital</td>
                                </tr>
                                <tr>
                                    <td scope="col">NaturezaDespesa</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Pessoal e Encargos Sociais, Juros e Encargos da Dívida, Outras Despesas Correntes, Investimentos, Inversões Financeiras, Amortização da Dívida</td>
                                </tr>
                                <tr>
                                    <td scope="col">ModalidadeAplicacao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Aplicações Diretas, Transferências à União, Transferências a Instituições Privadas sem Fins Lucrativos, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">ElemDespesa</td>
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
                                    <td scope="col">FonteRecursos</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Recursos Ordinários, Recursos de Convênios, Recursos do FUNDEB, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Funcao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Se relaciona com a missão institucional do órgão, por exemplo, cultura, educação, saúde, defesa, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">SubFuncao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Representa um nível de agregação imediatamente inferior à função e deve evidenciar cada área da atuação governamental, por exemplo "Educação Infantil", "Educação de Jovens e Adultos", etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">NotaEmpenho</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de empenho</td>
                                </tr>
                                <tr>
                                    <td scope="col">NotaLiquidacao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de liquidação</td>
                                </tr>
                                <tr>
                                    <td scope="col">NotaPagamento</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O identificador único daquela nota de pagamento</td>
                                </tr>
                                <tr>
                                    <td scope="col">OrdemBancaria</td>
                                    <td scope="col">string</td>
                                    <td scope="col">O código identificador da ordem bancária na qual o pagamento foi realizado</td>
                                </tr>
                                <tr>
                                    <td scope="col">DataPagamento</td>
                                    <td scope="col">date</td>
                                    <td scope="col">A data em que o empenho foi realizado</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorPago</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
                                </tr>
                                <tr>
                                    <td scope="col">AnoNotaEmpenho</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Ano da nota de empenho.</td>
                                </tr>
                                <tr>
                                    <td scope="col">AnoNotaLiquidacao</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Ano da nota de liquidação.</td>
                                </tr>
                            </tbody>
                        </table>
    
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

@endsection

@section('scriptsadd')
    <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <!--grafico-->    
    <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
@endsection