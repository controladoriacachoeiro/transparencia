@extends('layouts.app')
@section('htmlheader_title', 'API Nota Pagamento')

@section('cssheader')
@endsection

@section('main-content')

    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Nota Pagamento'));
    ?>

    <div class='row'>
        <div class='col-md-12'>
            @include('layouts.navegacao')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/despesas/notapagamentos/{numeronota}/{ano}'</p>
                
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
                                    <td scope="col">varchar(4)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo 1</h3>
                <p><a href="/api/despesas/notapagamentos/1491/2018">transparencia.cachoeiro.es.gov.br/api/despesas/notapagamentos/1491/2018</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"PagamentoID":933,"AnoExercicio":2018,"UnidadeGestora":"PREFEITURA MUNICIPAL DE CACHOEIRO DE ITAPEMIRIM","Orgao":"SECRETARIA MUNICIPAL DE SERVI\u00c7OS URBANOS","Processo":null,"ProdutoServico":"LIQUIDA\u00c7\u00c3O COMPLEMENTAR A LIQUIDA\u00c7\u00c3O N\u00ba 1312\/2018, REFERENTE A DESPESA COM DESTINA\u00c7\u00c3O FINAL DOS RES\u00cdDUOS S\u00d3LIDOS DOMICILIARES E COMERCIAIS COLEGADOS NO MUNIC\u00cdPIO DE CACHOEIRO DE ITAPEMIRIM, DE ACORDO COM O CONTRATO N\u00ba 132\/2017, ALUSIVO AO PER\u00cdODO DE 01 A 31 DE DEZEMBRO DE 2017, CONFORME JUSTIFICATIVAS E DOCUMENTA\u00c7\u00d5ES EM ANEXO. (PROCESSO N\u00ba 729\/2018)","Beneficiario":"CTRCI CENTRAL DE TRATAMENTO DE RESIDUOS C ITAP LTD","CPF_CNPJ":"07562881000183","ModalidadeLicitatoria":"Preg\u00e3o Presencial","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"APLICA\u00c7\u00d5ES DIRETAS","ElemDespesa":"OUTROS SERVICOS DE TERCEIROS-PESSOA JURIDICA","Programa":"CIDADE MAIS HUMANA","Acao":"RECOLHIMENTO DE RES\u00cdDUOS S\u00d3LIDOS","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"URBANISMO","SubFuncao":"SERVI\u00c7OS URBANOS","NotaEmpenho":"310","NotaLiquidacao":"1313","NotaPagamento":"1491","OrdemBancaria":null,"DataPagamento":"2018-02-20","ValorPago":101670.38,"AnoNotaEmpenho":2018,"AnoNotaLiquidacao":2018}]</pre>
                </div>
                <h3>Exemplo 2</h3>
                <p><a href="/api/despesas/notapagamentos/1550/2018">transparencia.cachoeiro.es.gov.br/api/despesas/notapagamentos/1550/2018</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"PagamentoID":972,"AnoExercicio":2018,"UnidadeGestora":"PREFEITURA MUNICIPAL DE CACHOEIRO DE ITAPEMIRIM","Orgao":"SECRETARIA MUNICIPAL DA FAZENDA","Processo":null,"ProdutoServico":"LIQUIDA\u00c7\u00c3O REFERENTE AO PAGAMENTO POR INDENIZA\u00c7AO DOS SERVI\u00c7OS DE TELECOMUNICA\u00c7OES PRESTADAS PELA TELEMAR NO MES DE DEZEMBRO\/2017, CONFORME JUSTIFICATIVAS E DOCUMENTA\u00c7\u00d5ES EM ANEXO. (PROCESSO N\u00ba 25.371\/2017)","Beneficiario":"TELEMAR NORTE LESTE S\/A","CPF_CNPJ":"33000118000179","ModalidadeLicitatoria":"N\u00e3o Aplic\u00e1vel","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"APLICA\u00c7\u00d5ES DIRETAS","ElemDespesa":"INDENIZA\u00c7\u00d5ES E RESTITUI\u00c7\u00d5ES","Programa":"ADMINISTRA\u00c7\u00c3O GERAL","Acao":"GEST\u00c3O FAZENDARIA","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ADMINISTRA\u00c7\u00c3O","SubFuncao":"ADMINISTRA\u00c7\u00c3O FINANCEIRA","NotaEmpenho":"1245","NotaLiquidacao":"1981","NotaPagamento":"1550","OrdemBancaria":null,"DataPagamento":"2018-02-21","ValorPago":851.07,"AnoNotaEmpenho":2018,"AnoNotaLiquidacao":2018}]</pre>
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
                                    <td scope="col">string</td>
                                    <td scope="col">Ano do exercício ao qual se refere o orçamento da despesa</td>
                                </tr>
                                <tr>
                                    <td scope="col">UnidadeGestora</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Unidade Gestora dos pagamentos.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Orgao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão, Autarquia, etc.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Processo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número do processo administrativo.</td>
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
                                    <td scope="col">string</td>
                                    <td scope="col">A data em que o empenho foi realizado</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorPago</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
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