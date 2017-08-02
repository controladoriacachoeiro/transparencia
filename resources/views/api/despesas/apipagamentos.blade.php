@extends('layouts.app')
@section('htmlheader_title', 'API Pagamentos')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/despesas/pagamentos/{dataInicial}/{dataFinal}</p>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row">
                        <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Parâmetros</th>
                                    <th style='vertical-align:middle'>Descrição</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                    <th style='vertical-align:middle'>Formato</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>dataInicial</td>
                                    <td>data que define a partir de que dia os pagamentos serão buscados</td>
                                    <td>string</td>
                                    <td>dd-mm-yyyy</td>
                                </tr>
                                <tr>
                                    <td>dataFinal</td>
                                    <td>data que define a data máxima para a busca do pagamento</td>
                                    <td>string</td>
                                    <td>dd-mm-yyyy</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/despesas/pagamentos/03-01-2017/03-01-2017">transparencia.cachoeiro.es.gov.br/api/despesas/pagamentos/03-01-2017/01-01-2013</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"PagamentoID":78991,"AnoExercicio":2017,"UnidadeGestora":"SECRETARIA MUNICIPAL DA FAZENDA","Processo":"103","ProdutoServico":"REFERENTE A LIQUIDA\u00c7\u00c3O 08000001\/2017","Beneficiario":"CAIXA ECONOMICA FEDERAL","CPF_CNPJ":"00360305000104","ModalidadeLicitatoria":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","CatEconomica":"DESPESAS DE CAPITAL","NaturezaDespesa":"AMORTIZACAO DA DIVIDA","ModalidadeAplicacao":"APLICACOES DIRETAS","ElemDespesa":"PRINCIPAL DA D\u00cdVIDA CONTRATUAL RESGATADO","Programa":"OPERA\u00c7\u00d5ES ESPECIAIS","Acao":"PAGAMENTO DE D\u00cdVIDA CONTRATUAL","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ENCARGOS ESPECIAIS","SubFuncao":"SERVI\u00c7O DA D\u00cdVIDA INTERNA","NotaEmpenho":"08000001","NotaLiquidacao":"08000001","NotaPagamento":"08000066","OrdemBancaria":null,"DataPagamento":"2017-01-03","ValorPago":5174.91},{"PagamentoID":78997,"AnoExercicio":2017,"UnidadeGestora":"SECRETARIA MUNICIPAL DA FAZENDA","Processo":"103","ProdutoServico":"REFERENTE A LIQUIDA\u00c7\u00c3O 08000002\/2017","Beneficiario":"CAIXA ECONOMICA FEDERAL","CPF_CNPJ":"00360305000104","ModalidadeLicitatoria":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"JUROS E ENCARGOS DA DIVIDA","ModalidadeAplicacao":"APLICACOES DIRETAS","ElemDespesa":"JUROS SOBRE A DIVIDA POR CONTRATO","Programa":"OPERA\u00c7\u00d5ES ESPECIAIS","Acao":"PAGAMENTO DE D\u00cdVIDA CONTRATUAL","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ENCARGOS ESPECIAIS","SubFuncao":"SERVI\u00c7O DA D\u00cdVIDA INTERNA","NotaEmpenho":"08000002","NotaLiquidacao":"08000002","NotaPagamento":"08000067","OrdemBancaria":null,"DataPagamento":"2017-01-03","ValorPago":13210.23}]</pre>
                </div>

                        <h3>Detalhes das colunas</h3>
                <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Coluna</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                    <th style='vertical-align:middle'>Descriçao</th>
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