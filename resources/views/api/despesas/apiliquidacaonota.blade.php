@extends('layouts.app')
@section('htmlheader_title', 'API Nota Liquidação')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Nota Liquidação'));
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
                <p>transparencia.cachoeiro.es.gov.br/api/despesas/notaliquidacao/{numeronota}/{ano}</p>
                
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
                                    <tdscope="col">varchar(4)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo 1</h3>
                <p><a href="/api/despesas/notaliquidacao/17004217/2017">transparencia.cachoeiro.es.gov.br/api/despesas/notaliquidacao/17004217/2017</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"LiquidacaoID":2093,"AnoExercicio":2017,"UnidadeGestora":"PREFEITURA MUNICIPAL DE CACHOEIRO DE ITAPEMIRIM","Orgao":"SECRETARIA MUNICIPAL DE EDUCA\u00c7\u00c3O","Processo":null,"ProdutoServico":"REFERENTE AO EMPENHO 17003338\/2017-DI\u00c1RIA PARA PARTICIPAR DA REUNI\u00c3O SOBRE PROGRAMA ESTADUAL DE TRANSPORTE ESCOLAR, NO AUDIT\u00d3RIO DA SEDU, EM VIT\u00d3RIA-ES DIA 13\/12\/2017.PROT.43097\/2017","Beneficiario":"CREUSA NUNES","CPF_CNPJ":"***.365.257-**","ModalidadeLicitatoria":"N\u00e3o Aplic\u00e1vel","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"APLICA\u00c7\u00d5ES DIRETAS","ElemDespesa":"DIARIAS - PESSOAL CIVIL","Programa":"EDUCA\u00c7\u00c3O DE QUALIDADE","Acao":"MANUTEN\u00c7\u00c3O DAS UNIDADES DE EDUCA\u00c7\u00c3O INFANTIL","Subtitulo":null,"FonteRecursos":"MDE","Funcao":"EDUCA\u00c7\u00c3O","SubFuncao":"EDUCA\u00c7\u00c3O INFANTIL","NotaEmpenho":"17003338","NotaLiquidacao":"17004217","DataLiquidacao":"2017-12-20","ValorLiquidado":50,"AnoNotaEmpenho":2017}]</pre>
                </div>
                <h3>Exemplo 2</h3>
                <p><a href="/api/despesas/notaliquidacao/16001373
/2016">transparencia.cachoeiro.es.gov.br/api/despesas/notaliquidacao/16001373
/2016</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"LiquidacaoID":2360,"AnoExercicio":2016,"UnidadeGestora":"FUNDO MUNICIPAL DE SA\u00daDE DE CACHOEIRO DE ITAPEMIRIM","Orgao":"SECRETARIA MUNICIPAL DE SAUDE","Processo":null,"ProdutoServico":"ABACO - CONTRATO 280\/2014 - CONTRATA\u00c7\u00c3O DE EMPRESA PARA PRESTA\u00c7\u00c3O DE SERVI\u00c7OS ESPECIALIZADOS EM TI DE ACOMPANHAMENTO T\u00c9CNICO OPERACIONAL COM O OBJETIVO DE ATENDER AOS SISTEMAS DE GEST\u00c3O P\u00daBLICA ANTERIORMENTE DESENVOLVIDOS E INSTALADOS NA PMCI, SISTEMA DE GEST\u00c3O DE PESSOAS (RECURSOS HUMANOS, FOLHA DE PAGAMENTO E PREVID\u00caNCIA SOCIAL) - eTURMALINA E SISTEMA DE GEST\u00c3O ADMINISTRATIVA NAS \u00c1REAS DE COMPRAS, PATRIMONIO, CONTRATO, CONTROLE DE OBRAS E MATERIAIS - eJADE, DE PROPRIEDADE DO ER\u00c1RIO MUNICIPAL POR LICEN\u00c7A DE USO PERMANENTE, ENGLOBANDO OS SERVI\u00c7OS ESPECIALIZADOS DE MANUTEN\u00c7\u00c3O CORRETIVA, ADAPTATIVA E EVOLUTIVA, INCLUINDO SUPORTE T\u00c9CNICO, ATUALIZA\u00c7\u00d5ES E MELHORIAS NOS APLICATIVOS, BEM COMO ATUALIZA\u00c7\u00c3O E ALTERA\u00c7\u00d5ES NA BASE DE DADOS QUE SE FIZEREM NECESS\u00c1RIOS - PROT. 01-29800\/2014\nREEMPENHO DA NOTA DE ANULA\u00c7\u00c3O 16000557\/2015 - EMPENHO 16000392\/2015","Beneficiario":"ABACO TECNOLOGIA DE INFORMACAO LTDA","CPF_CNPJ":"37432689000133","ModalidadeLicitatoria":"N\u00e3o Aplic\u00e1vel","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"APLICA\u00c7\u00d5ES DIRETAS","ElemDespesa":"OUTROS SERVICOS DE TERCEIROS-PESSOA JURIDICA","Programa":"GEST\u00c3O DIGITAL CACHOEIRO","Acao":"IMPLEMENTA\u00c7\u00c3O DE SISTEMAS CORPORATIVOS DA SA\u00daDE","Subtitulo":null,"FonteRecursos":"RECURSOS PR\u00d3PRIOS - SA\u00daDE","Funcao":"SA\u00daDE","SubFuncao":"ATEN\u00c7\u00c3O B\u00c1SICA","NotaEmpenho":"16000396","NotaLiquidacao":"16001373","DataLiquidacao":"2016-03-30","ValorLiquidado":9229.12,"AnoNotaEmpenho":2016}]</pre>
                </div>

                
                <h3>Detalhes das Colunas</h3>
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
                                    <td scope="col">Unidade Gestora das liquidações.</td>
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
                                    <td scope="col">Subfuncao</td>
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
                                    <td scope="col">DataLiquidacao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">A data em que a liquidação foi realizada</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorLiquidado</td>
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