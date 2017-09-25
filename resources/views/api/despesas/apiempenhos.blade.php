@extends('layouts.app')
@section('htmlheader_title', 'API Empenhos')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <pre>transparencia.cachoeiro.es.gov.br/api/despesas/empenhos/dataInicial/dataFinal</pre>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row" style="overflow:auto">
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
                                    <td>data que define a partir de que dia os empenhos serão buscados</td>
                                    <td>string</td>
                                    <td>dd-mm-yyyy</td>
                                </tr>
                                <tr>
                                    <td>dataFinal</td>
                                    <td>define a data máxima para a busca do empenho</td>
                                    <td>string</td>
                                    <td>dd-mm-yyyy</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/despesas/empenhos/03-01-2017/03-01-2017">transparencia.cachoeiro.es.gov.br/api/despesas/empenhos/03-01-2017/03-01-2017</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"EmprenhoID":60616,"AnoExercicio":2017,"UnidadeGestora":"SECRETARIA MUNICIPAL DE ADMINISTRA\u00c7\u00c3O E SERVI\u00c7OS INTERNOS","Processo":null,"ProdutoServico":"DESPESA COM PUBLICA\u00c7OES DOS RESUMOS DE EDITAIS PARA O EXERCICIO DE 2017 - PROT. 299\/2017","Beneficiario":"IMPRENSA NACIONAL - PR","CPF_CNPJ":"04196645000100","ModalidadeLicitatoria":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"APLICACOES DIRETAS","ElemDespesa":"OUTROS SERV TERC - PESSOA JURIDICA","Programa":"ADMINISTRA\u00c7\u00c3O GERAL","Acao":"GEST\u00c3O DA COMISS\u00c3O DE LICITA\u00c7\u00c3O","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ADMINISTRA\u00c7\u00c3O","SubFuncao":"ADMINISTRA\u00c7\u00c3O GERAL","NotaEmpenho":"18000064","DataEmpenho":"2017-01-03","ValorEmpenho":2761},{"EmprenhoID":60617,"AnoExercicio":2017,"UnidadeGestora":"SECRETARIA MUNICIPAL DE ADMINISTRA\u00c7\u00c3O E SERVI\u00c7OS INTERNOS","Processo":null,"ProdutoServico":"DESPESA COM PUBLICA\u00c7OES DOS RESUMOS DE EDITAIS PARA O EXERCICIO DE 2017 - PROT. 307\/2017","Beneficiario":"DIO - DEPART. DE IMPRENSA OFICIAL DO EST.ESP.SANTO","CPF_CNPJ":"28161362000183","ModalidadeLicitatoria":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"APLICACOES DIRETAS","ElemDespesa":"OUTROS SERV TERC - PESSOA JURIDICA","Programa":"ADMINISTRA\u00c7\u00c3O GERAL","Acao":"GEST\u00c3O DA COMISS\u00c3O DE LICITA\u00c7\u00c3O","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ADMINISTRA\u00c7\u00c3O","SubFuncao":"ADMINISTRA\u00c7\u00c3O GERAL","NotaEmpenho":"18000065","DataEmpenho":"2017-01-03","ValorEmpenho":10000}]</pre>
                </div>

                <div class="row" style="overflow:auto">
                    <div class="col-md-12">
                        <h3>Detalhes das colunas</h3>
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
                </div>
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