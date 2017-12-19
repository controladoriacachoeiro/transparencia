@extends('layouts.app')
@section('htmlheader_title', 'API Nota Liquidação')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/despesas/notarestopagar/{numeronota}/{nota}</p>
                
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
                <p><a href="/api/despesas/notarestopagar/08000115/2016">transparencia.cachoeiro.es.gov.br/api/despesas/notarestopagar/08000115/2016</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"LiquidacaoID":89349,"AnoExercicio":2017,"UnidadeGestora":"SECRETARIA MUNICIPAL DE ADMINISTRA\u00c7\u00c3O E SERVI\u00c7OS INTERNOS","Processo":"207","ProdutoServico":"REFERENTE AO EMPENHO 18000008\/2017","Beneficiario":"IPACI-INST.PREV.AS.SERV.M.CAH.ITAP.","CPF_CNPJ":"02548293000171","ModalidadeLicitatoria":"APLICACOES DIRETAS","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"PESSOAL E ENCARGOS SOCIAIS","ModalidadeAplicacao":"OUTROS\/N\u00c3O APLIC\u00c1VEL**","ElemDespesa":"VENCIMENTOS E VANTAGENS FIXAS - PESSOAL CIVIL","Programa":"ADMINISTRA\u00c7\u00c3O GERAL","Acao":"GEST\u00c3O DE PESSOAS E CONTRATOS","Subtitulo":null,"FonteRecursos":"RECURSOS ORDIN\u00c1RIOS","Funcao":"ADMINISTRA\u00c7\u00c3O","SubFuncao":"ADMINISTRA\u00c7\u00c3O GERAL","NotaEmpenho":"18000008","NotaLiquidacao":"18000003","DataLiquidacao":"2017-01-02","ValorLiquidado":200}]</pre>
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