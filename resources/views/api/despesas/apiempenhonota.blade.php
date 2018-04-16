@extends('layouts.app')
@section('htmlheader_title', 'API Nota Empenho')

@section('cssheader')
@endsection

@section('main-content')
    
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Nota Empenho'));
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
                <pre>transparencia.cachoeiro.es.gov.br/api/despesas/notaempenho/{numeronota}/{nota}</pre>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row" style="overflow:auto">
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
                <p><a href="/api/despesas/notaempenho/19000406/2017">transparencia.cachoeiro.es.gov.br/api/despesas/notaempenho/19000406/2017</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"EmpenhoID":1071,"AnoExercicio":2017,"UnidadeGestora":"PREFEITURA MUNICIPAL DE CACHOEIRO DE ITAPEMIRIM","Orgao":"SECRETARIA MUNICIPAL DE OBRAS","NumeroProcesso":"14667","AnoProcesso":"2015","ProdutoServico":"TERMO DE APOSTILAMENTO AO 1º T.A. AO CONTRATO 132\/2015-CONTRATAÇÃO DE EMPRESA ESPECIALIZADA PARA REALIZAÇÃO DE OBRAS URBANIZAÇÃO DA PONTE FERNANDO DE ABREU, NA RUA VINTE E CINCO DE MARÇO – CENTRO – CACHOEIRO DE ITAPEMIRIM – ES-TOMADA DE PREÇO 03\/2015-PROT.LIC.14667\/2015-PROT.19765\/2016","Beneficiario":"CONSTRUSUL LTDA EPP","CPF_CNPJ":"31281652000175","ModalidadeLicitatoria":"Tomada de Preços","CatEconomica":"DESPESAS DE CAPITAL","NaturezaDespesa":"INVESTIMENTOS","ModalidadeAplicacao":"APLICAÇÕES DIRETAS","ElemDespesa":"OBRAS E INSTALAÇÕES","Programa":"CACHOEIRO MELHOR","Acao":"CONSTRUÇÃO DE PONTES","Subtitulo":null,"FonteRecursos":"CEX - COMPENSAÇÃO FINANCEIRA ESFORÇO EXPORTAÇÃO","Funcao":"URBANISMO","SubFuncao":"INFRA-ESTRUTURA URBANA","NotaEmpenho":"19000406","DataEmpenho":"2017-11-01","ValorEmpenho":54090.59}]</pre>
                </div>
                <h3>Exemplo 2</h3>
                <p><a href="/api/despesas/notaempenho/19000406/2016">transparencia.cachoeiro.es.gov.br/api/despesas/notaempenho/19000406/2016</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"EmpenhoID":269,"AnoExercicio":2016,"UnidadeGestora":"PREFEITURA MUNICIPAL DE CACHOEIRO DE ITAPEMIRIM","Orgao":"SECRETARIA MUNICIPAL DE OBRAS","NumeroProcesso":"19000406","AnoProcesso":"2016","ProdutoServico":"PRESTACAO DE SERVICOS CONFORME PEDIDO ANEXO. CONTRATAÇÃO DE EMPRESA PARA REALIZAÇÃO DE OBRA DE DRENAGEM, PAVIMENTAÇÃO E CONSTRUÇÃO DE ESCADARIA NA RUA JACINTA MARIA DA PENHA-ALTO NOVO PARQUE- TOMADA DE PREÇO: 012\/2014- PROCESSO LIC.:23199\/2014 -PROT: 32038\/2014","Beneficiario":"CONSTRUSUL LTDA EPP","CPF_CNPJ":"31281652000175","ModalidadeLicitatoria":"Não Aplicável","CatEconomica":"DESPESAS DE CAPITAL","NaturezaDespesa":"INVESTIMENTOS","ModalidadeAplicacao":"APLICAÇÕES DIRETAS","ElemDespesa":"OBRAS E INSTALAÇÕES","Programa":"CACHOEIRO MELHOR","Acao":"CONSTRUÇÃO E REFORMA DE ESCADARIAS","Subtitulo":null,"FonteRecursos":"CIDE-EXERCÍCIOS ANTERIORES","Funcao":"URBANISMO","SubFuncao":"INFRA-ESTRUTURA URBANA","NotaEmpenho":"19000406","DataEmpenho":"2016-09-16","ValorEmpenho":82696.84}]</pre>
                </div>
                <h3>Detalhes das colunas</h3>
                <div class="row" style="overflow:auto">
                    <div class="col-md-12">
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
                                    <td scope="col">Ano do exercício ao qual se refere o orçamento da despesa.</td>
                                </tr>
                                <tr>
                                    <td scope="col">UnidadeGestora</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Unidade Gestora do empenho.</td>
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
                                    <td scope="col">DataEmpenho</td>
                                    <td scope="col">date</td>
                                    <td scope="col">A data em que o empenho foi realizado</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorEmpenho</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Indicação do valor empenhado ou do valor da anulação do empenho, incluindo também o valor do reforço do empenho, se houver</td>
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