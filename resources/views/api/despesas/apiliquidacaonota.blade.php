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
                <pre class="acessibilidade">transparencia.cachoeiro.es.gov.br/api/despesas/notaliquidacao/{numeronota}/{ano}</pre>
                
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
                <p><a href="/api/despesas/notaliquidacao/17004217/2017">transparencia.cachoeiro.es.gov.br/api/despesas/notaliquidacao/17004217/2017</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre class="acessibilidade">[{"LiquidacaoID":164,"AnoExercicio":2017,"UnidadeGestora":"PREFEITURA MUNICIPAL DE CACHOEIRO DE ITAPEMIRIM","Orgao":"SECRETARIA MUNICIPAL DE EDUCAÇÃO","NumeroProcesso":"43097","AnoProcesso":"2017","ProdutoServico":"REFERENTE AO EMPENHO 17003338\/2017-DIÁRIA PARA PARTICIPAR DA REUNIÃO SOBRE PROGRAMA ESTADUAL DE TRANSPORTE ESCOLAR, NO AUDITÓRIO DA SEDU, EM VITÓRIA-ES DIA 13\/12\/2017.PROT.43097\/2017","Beneficiario":"CREUSA NUNES","CPF_CNPJ":"***.365.257-**","ModalidadeLicitatoria":"Não Aplicável","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"APLICAÇÕES DIRETAS","ElemDespesa":"DIARIAS - PESSOAL CIVIL","Programa":"EDUCAÇÃO DE QUALIDADE","Acao":"MANUTENÇÃO DAS UNIDADES DE EDUCAÇÃO INFANTIL","Subtitulo":null,"FonteRecursos":"MDE","Funcao":"EDUCAÇÃO","SubFuncao":"EDUCAÇÃO INFANTIL","NotaEmpenho":"17003338","NotaLiquidacao":"17004217","DataLiquidacao":"2017-12-20","ValorLiquidado":50,"AnoNotaEmpenho":2017}]</pre>
                </div>
                <h3>Exemplo 2</h3>
                <p><a href="/api/despesas/notaliquidacao/16001373/2016">transparencia.cachoeiro.es.gov.br/api/despesas/notaliquidacao/16001373/2016</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre class="acessibilidade">[{"LiquidacaoID":253,"AnoExercicio":2016,"UnidadeGestora":"FUNDO MUNICIPAL DE SAÚDE DE CACHOEIRO DE ITAPEMIRIM","Orgao":"SECRETARIA MUNICIPAL DE SAUDE","NumeroProcesso":"16000396","AnoProcesso":"2016","ProdutoServico":"ABACO - CONTRATO 280\/2014 - CONTRATAÇÃO DE EMPRESA PARA PRESTAÇÃO DE SERVIÇOS ESPECIALIZADOS EM TI DE ACOMPANHAMENTO TÉCNICO OPERACIONAL COM O OBJETIVO DE ATENDER AOS SISTEMAS DE GESTÃO PÚBLICA ANTERIORMENTE DESENVOLVIDOS E INSTALADOS NA PMCI, SISTEMA DE GESTÃO DE PESSOAS (RECURSOS HUMANOS, FOLHA DE PAGAMENTO E PREVIDÊNCIA SOCIAL) - eTURMALINA E SISTEMA DE GESTÃO ADMINISTRATIVA NAS ÁREAS DE COMPRAS, PATRIMONIO, CONTRATO, CONTROLE DE OBRAS E MATERIAIS - eJADE, DE PROPRIEDADE DO ERÁRIO MUNICIPAL POR LICENÇA DE USO PERMANENTE, ENGLOBANDO OS SERVIÇOS ESPECIALIZADOS DE MANUTENÇÃO CORRETIVA, ADAPTATIVA E EVOLUTIVA, INCLUINDO SUPORTE TÉCNICO, ATUALIZAÇÕES E MELHORIAS NOS APLICATIVOS, BEM COMO ATUALIZAÇÃO E ALTERAÇÕES NA BASE DE DADOS QUE SE FIZEREM NECESSÁRIOS - PROT. 01-29800\/2014\nREEMPENHO DA NOTA DE ANULAÇÃO 16000557\/2015 - EMPENHO 16000392\/2015","Beneficiario":"ABACO TECNOLOGIA DE INFORMACAO LTDA","CPF_CNPJ":"37432689000133","ModalidadeLicitatoria":"Não Aplicável","CatEconomica":"DESPESAS CORRENTES","NaturezaDespesa":"OUTRAS DESPESAS CORRENTES","ModalidadeAplicacao":"APLICAÇÕES DIRETAS","ElemDespesa":"OUTROS SERVICOS DE TERCEIROS-PESSOA JURIDICA","Programa":"GESTÃO DIGITAL CACHOEIRO","Acao":"IMPLEMENTAÇÃO DE SISTEMAS CORPORATIVOS DA SAÚDE","Subtitulo":null,"FonteRecursos":"RECURSOS PRÓPRIOS - SAÚDE","Funcao":"SAÚDE","SubFuncao":"ATENÇÃO BÁSICA","NotaEmpenho":"16000396","NotaLiquidacao":"16001373","DataLiquidacao":"2016-03-30","ValorLiquidado":9229.12,"AnoNotaEmpenho":2016}]</pre>
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
                                    <td scope="col">int</td>
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
                                    <td scope="col">date</td>
                                    <td scope="col">A data em que a liquidação foi realizada</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorLiquidado</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
                                </tr>
                                <tr>
                                    <td scope="col">AnoNotaEmpenho</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Ano da nota de empenho.</td>
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