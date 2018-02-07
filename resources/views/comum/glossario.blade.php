@extends('layouts.app')
@section('htmlheader_title', 'Glossário')

@section('cssheader')
@endsection

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
                        <li class="active">Glossário</li>                                                                                                                           
                    </ol>        
                </div>
            </div>            
        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#number" data-toggle="tab">#</a></li>
              <li id="default"><a href="#a" data-toggle="tab">A</a></li>
              <li><a href="#b" data-toggle="tab">B</a></li>
              <li><a href="#c" data-toggle="tab">C</a></li>
              <li><a href="#d" data-toggle="tab">D</a></li>
              <li><a href="#e" data-toggle="tab">E</a></li>
              <li><a href="#f" data-toggle="tab">F</a></li>
              <li><a href="#g" data-toggle="tab">G</a></li>
              <li><a href="#h" data-toggle="tab">H</a></li>
              <li><a href="#i" data-toggle="tab">I</a></li>
              <li><a href="#j" data-toggle="tab">J</a></li>
              <li><a href="#l" data-toggle="tab">L</a></li>
              <li><a href="#m" data-toggle="tab">M</a></li>
              <li><a href="#n" data-toggle="tab">N</a></li>
              <li><a href="#o" data-toggle="tab">O</a></li>
              <li><a href="#p" data-toggle="tab">P</a></li>
              <li><a href="#q" data-toggle="tab">Q</a></li>
              <li><a href="#r" data-toggle="tab">R</a></li>
              <li><a href="#s" data-toggle="tab">S</a></li>
              <li><a href="#t" data-toggle="tab">T</a></li>
              <li><a href="#u" data-toggle="tab">U</a></li>
              <li><a href="#v" data-toggle="tab">V</a></li>
              <li><a href="#x" data-toggle="tab">X</a></li>
              <li><a href="#z" data-toggle="tab">Z</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="number">
                <p><b>#</b></p>                                
              </div>
              <div class="tab-pane active" id="a">
                <p><b>A</b></p>
                <dl>
                    <dt>Ação:</dt>
                    <dd>Representa, no âmbito do Plano Plurianual (PPA), o conjunto de operações cujos produtos (bens ou serviços) contribuem para os objetivos de um programa. A ação pode ser um projeto, uma atividade ou uma operação especial.</dd>
                    <br>
                    <dt>Administração Direta:</dt>
                    <dd>São os órgãos que compõem a estrutura administrativa do governo e que executam diretamente as funções do Estado, tais como as Secretarias de Estado (Educação, Saúde, Segurança Pública, Fazenda, etc.), as Agências de Desenvolvimento Regional, entre outros.</dd>
                    <br>
                    <dt>Administração Indireta:</dt>
                    <dd>É o conjunto de órgãos e entidades do governo com a responsabilidade de prestar os serviços públicos e atender aos interesses da população, tais como educação, saúde, segurança, etc.</dd>
                    <br>
                    <dt>Administração Pública:</dt>
                    <dd>É o conjunto de órgãos e entidades do governo com a responsabilidade de prestar os serviços públicos e atender aos interesses da população, tais como educação, saúde, segurança, etc.</dd>
                    <br>
                    <dt>Alienação de Bens:</dt>
                    <dd>É a receita proveniente da venda de bens móveis (veículos, computadores, equipamentos, etc.) ou imóveis (terrenos, salas, prédios, etc.).</dd>
                    <br>
                    <dt>Alínea</dt>
                    <dd>Para melhor identificação das receitas públicas, utilizam-se níveis de classificação para os seus registros, que possibilitam a identificação detalhada dos recursos que ingressam nos cofres públicos. A alínea representa o quinto e o sexto dígito da classificação da receita pública e informa o “nome” da receita que receberá o registro pela entrada de recursos financeiros.</dd>
                    <br>
                    <dt>Amortização da Dívida:</dt>
                    <dd>É o pagamento de parcelas da dívida pública.</dd>
                    <br>
                    <dt>Amortização de Empréstimos Concedidos</dt>
                    <dd>É a receita proveniente de empréstimos concedidos a terceiros.</dd>
                    <br>
                    <dt>Ampliação:</dt>
                    <dd>Produz aumento na área construída ou na capacidade de uma obra que já existe.</dd>
                    <br>
                    <dt>Ano Financeiro:</dt>
                    <dd>É o mesmo que exercício financeiro, que no Brasil coincide com o ano civil, iniciando em 1º de janeiro e terminando em 31 de dezembro.</dd>
                    <br>
                    <dt>Arrecadação:</dt>
                    <dd>É o dinheiro que entrou nos cofres públicos em virtude do poder do Estado de tributar e de obter rendas. Exemplo: o Estado de Santa Catarina arrecadou sete milhões em 2005 de IPVA.</dd>
                    <br>
                    <dt>Arrecadado:</dt>
                    <dd>Dinheiro que efetivamente entrou nos cofres públicos. Exemplo: o Estado de Santa Catarina arrecadou sete milhões em 2005 de IPVA. Os valores podem ser brutos, que não incluem deduções, ou seja, descontos para o Estado. E também valores líquidos, que consideram essas deduções.</dd>
                    <br>
                    <dt>Arrecadado Bruto:</dt>
                    <dd>Dinheiro que efetivamente entrou nos cofres públicos antes das respectivas deduções.</dd>
                    <br>
                    <dt>Arrecadado Líquido</dt>
                    <dd>Dinheiro que efetivamente entrou nos cofres públicos após as deduções como, por exemplo, os valores a serem repassados aos municípios.</dd>
                    <br>
                    <dt>Atividade</dt>
                    <dd>Representa, no âmbito do Plano Plurianual (PPA), um conjunto de operações que se realizam de modo contínuo e permanente, das quais resulta um produto ou um serviço necessário à manutenção da ação de governo.</dd>
                    <br>
                    <dt>Autarquia</dt>
                    <dd>São entidades criadas pelo governo, com personalidade jurídica própria e autonomia, para desempenharem atividades públicas específicas. Ex.: DEINFRA, IPREV, etc.</dd>
                    <br>
                    <dt>Auxílios</dt>
                    <dd>São ajudas financeiras concedidas pelo Governo do Estado para investimentos de outras esferas de governo (municípios) ou entidades privadas sem fins lucrativos.</dd>
                    <br>                    
                </dl>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="b">
                <p><b>B</b></p>
                <dl>
                    <dt>Balanço:</dt>
                    <dd>É um demonstrativo contábil que apresenta, num dado momento, a situação patrimonial da entidade pública.</dd>
                    <br>
                    <dt>Beneficiário:</dt>
                    <dd>É aquele que recebe recursos públicos.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="c">
                <p><b>C</b></p>
                <dl>
                    <dt>Cargo Público de Provimento Efetivo:</dt>
                    <dd>É o cargo a que faz jus o servidor que foi aprovado em concurso público pertencente ao quadro de pessoal da estrutura organizacional de um órgão/entidade da administração direta, autarquia e fundação pública e que, por suas atribuições e responsabilidades, será remunerado pelo erário público.</dd>
                    <br>
                    <dt>Cargo Público de Provimento em Comissão:</dt>
                    <dd>É o cargo de direção, chefia ou assessoramento ao servidor público cujo provimento dispensa concurso público. Será ocupado, em caráter transitório, por pessoa de confiança da autoridade competente para livremente nomear e exonerar. Esses cargos são criados e limitados em quantidade por lei, com denominação própria e remuneração paga pelo erário, e pertencem ao quadro de pessoal da estrutura organizacional de um órgão/entidade da administração direta, autarquia e fundação pública.</dd>
                    <br>
                    <dt>Cartão Corporativo :</dt>
                    <dd>É o cartão de pagamentos da Prefeitura, utilizado para realizar despesas emergenciais e de pequeno valor.</dd>
                    <br>
                    <dt>Categoria Econômica:</dt>
                    <dd>É uma classificação da receita e da despesa, com a finalidade de identificar o fato econômico que ocasionou o ingresso e a saída de recursos nos cofres públicos. As receitas e as despesas podem ser classificadas em duas categorias econômicas: Correntes e de Capital. Ver mais (Receita Corrente, Receita de Capital, Despesa Corrente, Despesa de Capital).</dd>
                    <br>
                    <dt>Classificação Funcional:</dt>
                    <dd>É a classificação utilizada para informar a área de atuação do governo em que serão alocados os recursos públicos, por exemplo, saúde, educação, segurança, etc.</dd>
                    <br>
                    <dt>Classificação Institucional:</dt>
                    <dd>É a classificação da despesa que informa o órgão responsável pela execução de determinada parcela do orçamento público.</dd>
                    <br>
                    <dt>Concedente:</dt>
                    <dd>É o órgão financiador de um projeto que será executado por meio de um convênio.</dd>
                    <br>
                    <dt>Concorrência:</dt>
                    <dd>É uma modalidade de licitação utilizada pelo governo para contratações de grande valor.</dd>
                    <br>
                    <dt>Concurso:</dt>
                    <dd>É uma modalidade de licitação destinada à escolha de trabalho técnico ou artístico, mediante a instituição de prêmio. Existe, ainda, o Concurso Público que é um processo seletivo para contratação de servidores públicos.</dd>
                    <br>
                    <dt>Construção:</dt>
                    <dd>Consiste no ato de executar ou edificar uma obra nova.</dd>
                    <br>
                    <dt>Contragarantia:</dt>
                    <dd>Bem ou direito do devedor, oferecido ao garantidor da dívida, para ser utilizado no caso de inadimplência do devedor.</dd>
                    <br>
                    <dt>Contrapartida:</dt>
                    <dd>São os recursos que um órgão ou entidade se compromete a aplicar na realização de um projeto.</dd>
                    <br>
                    <dt>Contratado:</dt>
                    <dd>É aquele que assinou um contrato com o governo para entrega de bens ou serviços.</dd>
                    <br>
                    <dt>Contratante:</dt>
                    <dd>Órgão ou entidade da Prefeitura que assinou um contrato para aquisição de bens ou serviços.</dd>
                    <br>
                    <dt>Contrato:</dt>
                    <dd>É um acordo ou ajuste entre partes que define direitos e obrigações.</dd>
                    <br>
                    <dt>Contribuições:</dt>
                    <dd>Despesas destinadas a atender a gastos de manutenção de outras entidades de direito público ou privado, sem contraprestação direta em bens e serviços, baseadas em legislação pertinente.</dd>
                    <br>
                    <dt>Convenente:</dt>
                    <dd>É o órgão ou a entidade que recebe recursos do governo mediante convênio.</dd>
                    <br>
                    <dt>Convênio:</dt>
                    <dd>É um instrumento realizado entre órgãos ou entidades com interesses comuns que disciplina os repasses ou os recebimentos de recursos públicos, visando à execução de plano de trabalho, projeto/atividade ou evento de interesse recíproco, em regime de mútua cooperação.</dd>
                    <br>
                    <dt>Crédito Adicional:</dt>
                    <dd>É a autorização legal para a realização de despesas não previstas ou insuficientemente previstas na Lei Orçamentária Anual (LOA). Dependendo da sua finalidade, classificam-se em: suplementares, especiais e extraordinários. Os créditos adicionais, após aprovação, são incorporados ao orçamento do exercício.</dd>
                    <br>
                    <dt>Crédito Especial:</dt>
                    <dd>É um tipo de crédito adicional que visa atender à realização de despesas não previstas na Lei Orçamentária Anual (LOA).</dd>
                    <br>
                    <dt>Crédito Extraordinário:</dt>
                    <dd>É um tipo de crédito adicional, que autoriza a realização de despesas que pressupõem uma situação de urgência ou imprevisão, tal como guerra, comoção interna ou calamidade pública.</dd>
                    <br>
                    <dt>Crédito Orçamentário:</dt>
                    <dd>É o valor previsto na Lei Orçamentária Anual (LOA) para a realização das despesas públicas.</dd>
                    <br>
                    <dt>Crédito Suplementar:</dt>
                    <dd>É um tipo de crédito adicional que se destina ao reforço de despesas insuficientemente previstas na Lei Orçamentária Anual (LOA).</dd>
                    <br>
                    <dt>Credor:</dt>
                    <dd>É aquele que recebe recursos públicos.</dd>
                    <br>
                    <dt>Custos:</dt>
                    <dd>São gastos realizados para a entrega de um produto ou serviço à população.</dd>
                    <br>                    
                </dl>
              </div>
              <div class="tab-pane" id="d">
                <p><b>D</b></p>
                <dl>
                    <dt>Dados Abertos:</dt>
                    <dd>Dado aberto é um dado que pode ser livremente utilizado, reutilizado e redistribuído por qualquer um.</dd>
                    <br>
                    <dt>Descentralização de Crédito:</dt>
                    <dd>É uma forma de transferência de parcelas do orçamento público entre uma unidade gestora (UG) da Prefeitura e outra.</dd>
                    <br>
                    <dt>Desdobramento:</dt>
                    <dd>É o nono e décimo dígito da classificação da receita pública e possui um grau de detalhamento superior ao da subalínea. Até o presente momento esse nível de classificação não é utilizado pelo governo.</dd>
                    <br>
                    <dt>Despesa Antecipada:</dt>
                    <dd>É o pagamento efetuado, de forma antecipada, de uma determinada despesa que se refere a períodos de competência subsequentes, como, por exemplo, os prêmios de seguro e as assinaturas anuais de periódicos.</dd>
                    <br>
                    <dt>Despesa com Pessoal e Encargos Sociais:</dt>
                    <dd>São as despesas com o pagamento de salários ou outras obrigações dos servidores públicos.</dd>
                    <br>
                    <dt>Despesa com Serviços de Terceiros:</dt>
                    <dd>São as despesas efetuadas com a contratação de serviços prestados por pessoa física ou jurídica, a exemplo de consultorias, cessão de mão de obra, etc.</dd>
                    <br>
                    <dt>Despesa Corrente:</dt>
                    <dd>São despesas que se destinam à manutenção e ao funcionamento dos serviços públicos e não contribuem, diretamente, para a construção ou aquisição de prédios ou obras públicas, veículos e bens duráveis ou para o pagamento do principal da dívida pública.</dd>
                    <br>
                    <dt>Despesa de Capital:</dt>
                    <dd>São despesas que contribuem, diretamente, para a construção ou aquisição de prédios, veículos e outros bens duráveis, para a realização de obras públicas ou para o pagamento do principal da dívida pública.</dd>
                    <br>
                    <dt>Despesa de Custeio:</dt>
                    <dd>São as despesas realizadas pelo governo para a manutenção de suas atividades básicas, como, por exemplo, materiais de consumo, manutenção de equipamentos, despesas com água, energia, telefone, etc.</dd>
                    <br>
                    <dt>Despesa de Exercícios Anteriores:</dt>
                    <dd>É a despesa realizada pelo governo no orçamento público vigente, decorrente de compromissos assumidos em exercícios anteriores que, por algum motivo, não foram empenhadas à época, ou, se foram, tiveram os seus empenhos anulados ou cancelados. Não se confunde com restos a pagar, que são despesas já empenhadas em exercícios anteriores e que não completaram a execução orçamentária (pagamento).</dd>
                    <br>
                    <dt>Despesa Empenhada:</dt>
                    <dd>São as parcelas da Lei Orçamentária Anual (LOA) já comprometidas para pagar contratos assinados com fornecedores de bens, materiais ou serviços.</dd>
                    <br>
                    <dt>Despesa Extraorçamentária:</dt>
                    <dd>São despesas não previstas no orçamento público, pois não se referem a despesas do governo. Como exemplo, têm-se os empréstimos consignados, quando um servidor público faz um empréstimo para ser descontado diretamente na folha de pagamento. Nesse caso, o governo desconta do salário do servidor e transfere o dinheiro ao banco que emprestou. Portanto, essa despesa não é da Prefeitura, que atua como um simples repassador do recurso.</dd>
                    <br>
                    <dt>Despesa Liquidada:</dt>
                    <dd>É a fase da despesa em que se confere se o recebimento de bens, materiais ou serviços está de acordo com o solicitado. Representa efetivamente a despesa realizada.</dd>
                    <br>
                    <dt>Despesa Orçamentária:</dt>
                    <dd>São as despesas previstas na Lei Orçamentária Anual, aprovada pela Assembleia Legislativa.</dd>
                    <br>
                    <dt>Despesa Pública:</dt>
                    <dd>São as despesas realizadas pelo governo para a disponibilização dos serviços públicos à população.</dd>
                    <br>
                    <dt>Dívida Ativa:</dt>
                    <dd>É o direito da Prefeitura de receber quando um devedor não paga seus débitos dentro do prazo estabelecido por lei.</dd>
                    <br>
                    <dt>Dívida Consolidada:</dt>
                    <dd>São as obrigações financeiras da Prefeitura, assumidas em virtude de leis, contratos, convênios ou tratados e da realização de operações de crédito.</dd>
                    <br>
                    <dt>Dívida Externa:</dt>
                    <dd>São os compromissos financeiros assumidos pelo governo com entidades do exterior, portanto, em moeda estrangeira.</dd>
                    <br>
                    <dt>Dívida Flutuante:</dt>
                    <dd>São as dívidas do governo com vencimento inferior a doze meses.</dd>
                    <br>
                    <dt>Dívida Fundada:</dt>
                    <dd>São as dívidas do governo com vencimento superior a doze meses, contraídas para atender a um desequilíbrio orçamentário ou a um financiamento de obras e serviços públicos.</dd>
                    <br>
                    <dt>Dívida Interna:</dt>
                    <dd>São os compromissos financeiros assumidos pelo governo com instituições dentro do País, portanto, em moeda nacional.</dd>
                    <br>
                    <dt>Dívida Pública:</dt>
                    <dd>São os compromissos financeiros assumidos pelo governo, geralmente em virtude de empréstimos.</dd>
                    <br>
                    <dt>Dotação:</dt>
                    <dd>São os valores consignados na Lei Orçamentária Anual (LOA) para atender a determinada despesa.</dd>
                    <br>
                    <dt>Dotação Atualizada:</dt>
                    <dd>São os valores consignados inicialmente na Lei Orçamentária Anual (LOA) para atender a determinada despesa, considerando os acréscimos ou as reduções durante o ano. No município, os valores estão discriminados até o nível de elemento de despesa.</dd>
                    <br>
                    <dt>Dotação Inicial:</dt>
                    <dd>São os valores consignados inicialmente na Lei Orçamentária Anual (LOA) para atender a determinada despesa. Na Prefeitura, os valores estão discriminados até o nível de elemento de despesa.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="e">
                <p><b>E</b></p>
                <dl>
                    <dt>Edital:</dt>
                    <dd>O edital é a lei interna das licitações por força do princípio da vinculação ao ato convocatório, portanto, tudo o que nele constar e for legítimo, será obrigatório, tanto para o administrado como para o administrador.</dd>
                    <br>
                    <dt>Elemento de despesa:</dt>
                    <dd>É a classificação detalhada da despesa, que tem a finalidade de identificar os objetos de gastos do governo, tais como vencimentos, juros, diárias, material de consumo, serviços de terceiros, subvenções sociais, obras e instalações, equipamentos e material permanente, auxílios, etc. Representa o quinto e o sexto dígito da classificação da despesa pública.</dd>
                    <br>
                    <dt>Empenho da despesa:</dt>
                    <dd>É o ato que compromete parte do orçamento previsto na Lei Orçamentária Anual (LOA) para pagar contratos assinados com fornecedores de bens, materiais ou serviços.</dd>
                    <br>
                    <dt>Empenho Global:</dt>
                    <dd>É o comprometimento de parte do orçamento previsto na Lei Orçamentária Anual (LOA) no valor total de um contrato, com pagamentos parcelados.</dd>
                    <br>
                    <dt>Empenho Ordinário:</dt>
                    <dd>É o comprometimento de parte do orçamento previsto na Lei Orçamentária Anual (LOA) para pagar contratos de parcela única.</dd>
                    <br>
                    <dt>Empregado Público:</dt>
                    <dd>Para fins de consulta de remuneração do Portal da Transparência, são considerados neste contexto os empregados celetistas do IMETRO e das empresas públicas dependentes: CIDASC, EPAGRI, COHAB e SANTUR.</dd>
                    <br>
                    <dt>Ente da Federação:</dt>
                    <dd>Os entes da Federação são a União, os Estados, o Distrito Federal e os Municípios.</dd>
                    <br>
                    <dt>Entidade Sem Fins Lucrativos:</dt>
                    <dd>É aquela entidade que não tem objetivo de lucros em suas operações.</dd>
                    <br>
                    <dt>Espécie:</dt>
                    <dd>Para melhor identificação das receitas públicas, utilizam-se níveis de classificação para seus registros, os quais possibilitam a identificação detalhada dos recursos que ingressam nos cofres públicos. A espécie é o terceiro dígito da classificação da receita pública e possui um grau de detalhamento superior ao da origem. Por exemplo, dentro da Origem Receita Tributária, há as espécies "Impostos", "Taxas" e "Contribuições de Melhoria".</dd>
                    <br>
                    <dt>Execução Direta:</dt>
                    <dd>É a que é feita pelos órgãos e pelas entidades da administração pública por meios próprios, ou seja, sem a contratação de terceiros.</dd>
                    <br>
                    <dt>Execução Indireta:</dt>
                    <dd>É aquela que o órgão ou entidade contrata terceiros para prestar o serviço ou executar a obra.</dd>
                    <br>
                    <dt>Exercício Financeiro:</dt>
                    <dd>É o período em que deve vigorar ou ser executada a Lei Orçamentária Anual (LOA). No Brasil, coincide com o ano civil, iniciando em 1º de janeiro e terminando em 31 de dezembro.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="f">
                <p><b>F</b></p>
                <dl>
                    <dt>Favorecido:</dt>
                    <dd>É aquele que recebeu recursos pela prestação de serviço ou pela entrega de um bem.</dd>
                    <br>
                    <dt>Fiscal da Obra:</dt>
                    <dd>É o servidor que representa a administração pública na relação contratual, e compete a ele o acompanhamento da execução da obra pela contratada.</dd>
                    <br>
                    <dt>Fonte de Recursos:</dt>
                    <dd>É o código utilizado para controlar a origem do dinheiro arrecadado e a sua destinação. A fonte de recurso mais comum na Prefeitura é a fonte 0.100, ou simplesmente chamada "fonte cem", que representa basicamente os recursos de impostos.</dd>
                    <br>
                    <dt>Função:</dt>
                    <dd>Representa a área de atuação do governo, com a finalidade de atingir os seus objetivos. Exemplos: saúde, educação, segurança, etc.</dd>
                    <br>
                    <dt>Fundação Pública:</dt>
                    <dd>É uma entidade sem fins lucrativos criada pelo governo para desenvolver atividades de interesse público nas áreas de educação, cultura e pesquisa.</dd>
                    <br>
                    <dt>FUNDEB:</dt>
                    <dd>O Fundo de Manutenção e Desenvolvimento da Educação Básica e de Valorização dos Profissionais da Educação (FUNDEB) é um fundo especial, de natureza contábil e de âmbito estadual (um fundo por estado e Distrito Federal, num total de vinte e sete fundos), formado, na quase totalidade, por recursos provenientes dos impostos e das transferências dos estados, do Distrito Federal e dos municípios vinculados à educação.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="g">
                <p><b>G</b></p>
                <dl>
                    <dt>Grupo de Natureza da Despesa:</dt>
                    <dd>É uma forma de classificação da despesa orçamentária, conforme as suas características mais comuns, composta de seis subdivisões, a saber: 1 – Despesas com Pessoal e Encargos Sociais; 2 – Juros e Encargos da Dívida; 3 – Outras Despesas Correntes; 4 – Investimentos; 5 - Inversões Financeiras; 6 – Amortização da Dívida.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="h">
                <p><b>H</b></p>                                
              </div>
              <div class="tab-pane" id="i">
                <p><b>I</b></p>
                <dl>
                    <dt>Id-Uso:</dt>
                    <dd>É o código utilizado na fonte de recursos para indicar se os recursos compõem contrapartida de empréstimos ou não, a saber: 0 - Recursos não destinados à contrapartida; 1 - Contrapartida – Banco Internacional para a Reconstrução e o Desenvolvimento (BIRD); 2 - Contrapartida – Banco Interamericano de Desenvolvimento (BID); 3 - Contrapartida de empréstimos com enfoque setorial amplo; 4 - Contrapartida de outros empréstimos; 5 - Contrapartida de doações; 7 - Contrapartida de Convênios; 8 - Contrapartida de Empréstimos Internos.</dd>
                    <br>
                    <dt>Interveniente:</dt>
                    <dd>É o órgão da administração pública ou entidade privada que participa de um convênio para concordar com obrigações no convênio ou assumi-las.</dd>
                    <br>
                    <dt>Inversões Financeiras:</dt>
                    <dd>São as despesas com aquisição de imóveis ou bens de capital já em utilização, títulos financeiros e constituição ou aumento do capital de entidades ou empresas.</dd>
                    <br>
                    <dt>Investimentos:</dt>
                    <dd>São as despesas com obras públicas e com aquisição de instalações, equipamentos e material permanente.</dd>
                    <br>
                    <dt>Isenção:</dt>
                    <dd>É um benefício que dispensa o contribuinte de pagar um imposto ou taxa.</dd>
                    <br>                    
                </dl>
              </div>
              <div class="tab-pane" id="j">
                <p><b>J</b></p>
                <dl>
                    <dt>Juros e Encargos da Dívida:</dt>
                    <dd>São as despesas com juros e demais encargos sobre os empréstimos que o governo realizou.</dd>
                    <br>
                    <dt>Juros e Encargos da Dívida Externa:</dt>
                    <dd>São as despesas com juros e demais encargos sobre os empréstimos que o governo realizou com entidades do exterior.</dd>
                    <br>
                    <dt>Juros e Encargos da Dívida Interna:</dt>
                    <dd>São as despesas com juros e demais encargos sobre os empréstimos que o governo realizou com entidades do Brasil.</dd>
                    <br>
                    <dt>Juros sobre a Dívida por Contrato:</dt>
                    <dd>São as despesas com juros e demais encargos sobre empréstimos e financiamentos contratados pelo governo.</dd>
                    <br>
                </dl>
              </div>              
              <div class="tab-pane" id="l">
                <p><b>L</b></p>
                <dl>
                    <dt>Lei de Diretrizes Orçamentárias (LDO):</dt>
                    <dd>É a lei que define as metas e as prioridades da administração pública municipal, incluindo as despesas de capital. Esta lei orienta a elaboração da Lei Orçamentária Anual (LOA), dispõe sobre as alterações na legislação tributária e estabelece a política de aplicação das agências financeiras oficiais de fomento.</dd>
                    <br>
                    <dt>Lei de Licitações:</dt>
                    <dd>É a Lei Federal nº 8.666, de 1993, que estabelece normas para compras e contratos do governo.</dd>
                    <br>
                    <dt>Lei de Responsabilidade Fiscal - LRF:</dt>
                    <dd>É a Lei Complementar Federal nº 101, de 2000, que impõe normas para a gestão fiscal responsável por meio do controle dos gastos públicos e da definição de limites de gastos com pessoal, dívida pública, entre outros..</dd>
                    <br>
                    <dt>Lei Nº 4.320/64:</dt>
                    <dd>É uma lei federal editada em 1964 para estabelecer regras de direito financeiro para elaboração e controle do orçamento e relatórios contábeis.</dd>
                    <br>
                    <dt>Lei Orçamentária Anual (LOA):</dt>
                    <dd>É a lei que prevê a arrecadação para o ano e define onde serão aplicados os recursos públicos arrecadados.</dd>
                    <br>
                    <dt>Leilão:</dt>
                    <dd>É uma modalidade de licitação utilizada para a venda de bens ou de produtos a quem oferecer maior lance.</dd>
                    <br>
                    <dt>Licitação:</dt>
                    <dd>É um procedimento que o governo utiliza para escolher a proposta mais vantajosa para a aquisição de um bem ou a contratação de um serviço que pretende realizar, de acordo com as regras da Lei Federal nº 8.666, de 1993.</dd>
                    <br>
                    <dt>Liquidação da Despesa:</dt>
                    <dd>São as despesas com juros e demais encargos sobre empréstimos e financiamentos contratados pelo governo.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="m">
                <p><b>M</b></p>
                <dl>
                    <dt>Material de Consumo:</dt>
                    <dd>É o material cuja duração é inferior a dois anos. Exemplos: material odontológico, hospitalar e ambulatorial, artigos de escritório, material gráfico e de processamento de dados, material de limpeza e higiene, material elétrico e de iluminação, gêneros alimentícios, artigos de mesa, combustíveis, etc.</dd>
                    <br>
                    <dt>Material Permanente:</dt>
                    <dd>É o material cuja duração é superior a dois anos. Exemplos: mesas, máquinas, equipamentos de laboratórios, ferramentas, veículos, etc.</dd>
                    <br>
                    <dt>Medição:</dt>
                    <dd>Corresponde à avaliação e à quantificação, realizadas pela administração pública, dos serviços executados pela contratada no período fixado no contrato. Na medição, é verificado se a execução dos serviços é condizente com os projetos técnicos, o memorial descritivo e demais normas técnicas pertinentes, conforme acordado no contrato.</dd>
                    <br>
                    <dt>Modalidade de Aplicação:</dt>
                    <dd>É o código utilizado na classificação da despesa para indicar se os recursos são aplicados diretamente por órgãos ou entidades no âmbito da mesma esfera do governo ou por outro ente da Federação e suas respectivas entidades. Objetiva, também, possibilitar a eliminação da dupla contagem de recursos transferidos dentro de uma mesma esfera de governo. Representa o terceiro e o quarto dígito da classificação da despesa pública, sendo a modalidade mais comum a “aplicação direta” codificada pelo número 90.</dd>
                    <br>
                    <dt>Modalidade de Licitação:</dt>
                    <dd>A modalidade indica o procedimento que irá reger a licitação. Exemplo: concorrência, convite, tomada de preços, etc.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="n">
                <p><b>N</b></p>
                <dl>
                    <dt>Natureza da Despesa:</dt>
                    <dd>É uma forma de classificação da despesa orçamentária, conforme as suas características comuns, composta de seis subdivisões, a saber: 1 – Despesas com Pessoal e Encargos Sociais; 2 – Juros e Encargos da Dívida; 3 – Outras Despesas Correntes; 4 – Investimentos; 5 - Inversões Financeiras; e 6 – Amortização da Dívida.</dd>
                    <br>
                    <dt>Natureza Jurídica:</dt>
                    <dd>Classificação dos fornecedores do município conforme a Tabela de Natureza Jurídica da Receita Federal. Exemplo: entidades empresariais, entidades sem fins lucrativos e pessoas físicas.</dd>
                    <br>
                    <dt>Nota de Dotação:</dt>
                    <dd>É o documento de registro dos créditos previstos na Lei Orçamentária Anual (LOA).</dd>
                    <br>
                    <dt>Nota de Empenho:</dt>
                    <dd>É o documento de registro do empenho, que é o compromisso assumido pelo governo para pagar contratos assinados com fornecedores de bens, materiais ou serviços. No Portal, esse documento reúne informações geradas a partir do Sistema Integrado de Planejamento e Gestão Fiscal (SIGEF), no momento do empenhamento da despesa.</dd>
                    <br>
                    <dt>Nota de Liquidação:</dt>
                    <dd>É um documento do Portal que reúne informações geradas a partir do Sistema Integrado de Planejamento e Gestão Fiscal (SIGEF), gerado no sistema no momento da liquidação da despesa.</dd>
                    <br>
                    <dt>Nota de Pagamento:</dt>
                    <dd>É um documento do Portal que reúne informações da Preparação de Pagamento e da Ordem Bancária, que são documentos gerados no Sistema Integrado de Planejamento e Gestão Fiscal (SIGEF) quando ocorre o processo de pagamento.</dd>
                    <br>                    
                </dl>
              </div>
              <div class="tab-pane" id="o">
                <p><b>O</b></p>
                <dl>
                    <dt>Objeto do contrato:</dt>
                    <dd>Corresponde à obra ou ao serviço que a administração pública contratou.</dd>
                    <br>
                    <dt>Objeto do Convênio:</dt>
                    <dd>É aquilo que o governo pretende realizar por intermédio de convênio.</dd>
                    <br>
                    <dt>Obra:</dt>
                    <dd>Corresponde a toda ação de construir, reformar, fabricar, recuperar ou ampliar um bem, realizada por execução direta ou indireta.</dd>
                    <br>
                    <dt>Obra de arte especial:</dt>
                    <dd>É aquilo que o governo pretende realizar por intermédio de convênio.</dd>
                    <br>
                    <dt>Obra pública:</dt>
                    <dd>É toda construção, reforma, fabricação, recuperação ou ampliação de um bem público.</dd>
                    <br>
                    <dt>Operações de Crédito:</dt>
                    <dd>É a receita proveniente da contratação de empréstimos em bancos, tais como o BNDES, o Banco do Brasil, o BID, entre outros.</dd>
                    <br>
                    <dt>Operação Especial:</dt>
                    <dd>São despesas que não contribuem para a manutenção das ações de governo, das quais não resulta um produto e não geram contraprestação direta sob a forma de bens ou serviços..</dd>
                    <br>
                    <dt>Objeto do Convênio:</dt>
                    <dd>É aquilo que o governo pretende realizar por intermédio de convênio.</dd>
                    <br>
                    <dt>Orçado:</dt>
                    <dd>O mesmo que programado, planejado. Exemplo: a reforma de uma escola, orçada em vinte e cinco mil reais, corresponde a uma previsão de gastos para essa finalidade. No setor público, os valores das despesas orçadas devem seguir a Lei Orçamentária Anual (LOA). O termo é utilizado tanto para a Receita como para a Despesa.</dd>
                    <br>
                    <dt>Orçado Bruto:</dt>
                    <dd>É aquilo que o governo pretende realizar por intermédio de convênio.</dd>
                    <br>
                    <dt>Orçado líquido:</dt>
                    <dd>Receita programada, planejada, considerando as respectivas deduções, como, por exemplo, os valores a serem repassados aos municípios.</dd>
                    <br>
                    <dt>Orçamento de Investimento:</dt>
                    <dd>É a parte da Lei Orçamentária Anual (LOA), que se refere ao investimento das empresas em que a prefeitura, direta ou indiretamente, detenha a maioria do capital social com direito a voto.</dd>
                    <br>
                    <dt>Orçamento Fiscal e da Seguridade Social:</dt>
                    <dd>É a parte principal da Lei Orçamentária Anual (LOA) e que abrange todos os órgãos e as entidades da administração direta e indireta, e onde estão previstas as receitas a serem arrecadadas e os gastos com a manutenção das atividades do governo e com os investimentos.</dd>
                    <br>
                    <dt>Orçamento Público:</dt>
                    <dd>É a Lei Orçamentária Anual (LOA), que contém as previsões de receitas e de gastos do governo para um determinado exercício. É dividido em Orçamento Fiscal e da Seguridade Social e Orçamento de Investimento.</dd>
                    <br>
                    <dt>Ordem Bancária:</dt>
                    <dd>É o documento utilizado para o pagamento de compromissos do governo.</dd>
                    <br>
                    <dt>Ordem de serviço:</dt>
                    <dd>É o instrumento utilizado pela administração pública para fixar, para a contratada, a data de início do prazo de execução do contrato.</dd>
                    <br>
                    <dt>Ordenador de Despesa:</dt>
                    <dd>É a autoridade do governo responsável pela contratação de despesas públicas.</dd>
                    <br>
                    <dt>Órgão:</dt>
                    <dd>É a denominação dada às unidades administrativas responsáveis pelo desempenho das funções de governo.</dd>
                    <br>
                    <dt>Órgão de Exercício:</dt>
                    <dd>É o órgão onde o servidor público trabalha.</dd>
                    <br>
                    <dt>Origem:</dt>
                    <dd>Para melhor identificação das receitas públicas, utilizam-se níveis de classificação para seus registros que possibilitam o detalhamento dos recursos que ingressam nos cofres públicos. A origem é o segundo dígito da classificação da receita pública e possui um grau de detalhamento superior ao da categoria econômica. Exemplos de origem: Receita Tributária, de Contribuições, Patrimonial, de Operações de Crédito, de Alienação de Bens, etc.</dd>
                    <br>
                    <dt>Outras Despesas Correntes:</dt>
                    <dd>São as despesas com a manutenção e o funcionamento da máquina administrativa do governo, tais como material de consumo, pagamento de serviços prestados por pessoas físicas sem vínculo empregatício, ou por pessoas jurídicas, etc.</dd>
                    <br>
                    <dt>Outros Serviços de Terceiros - Pessoa Física:</dt>
                    <dd>São as despesas decorrentes de serviços prestados por pessoa física a órgãos públicos, tais como consultores, estagiários, serviços técnicos profissionais, e outras despesas pagas diretamente à pessoa física.</dd>
                    <br>
                    <dt>Outros Serviços de Terceiros - Pessoa Jurídica:</dt>
                    <dd>São as despesas com a prestação de serviços por empresas a órgãos públicos, tais como assinaturas de jornais e periódicos, energia elétrica, gás, água e esgoto, serviços de comunicação (telefone, telex, correios, etc.), locação de imóveis, locação de equipamentos e materiais permanentes, conservação e adaptação de bens móveis, seguros em geral, serviços de publicidade e propaganda, entre outras despesas.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="p">
                <p><b>P</b></p>
                <dl>
                    <dt>Pensionistas Especiais:</dt>
                    <dd>São os beneficiários não previdenciários que recebem recursos públicos conforme autorização legal.</dd>
                    <br>
                    <dt>Pensionistas Previdenciários:</dt>
                    <dd>São os beneficiários dependentes do segurado do Regime Previdenciário, após a morte do segurado, nos termos da lei.</dd>
                    <br>
                    <dt>Pergunta Cidadã:</dt>
                    <dd>Um instrumento criado para facilitar o acesso do cidadão às informações de maneira simples e rápida. Perguntas como quanto foi aplicado em investimentos em determinado ano, quanto foi aplicado em diárias, quanto foi arrecadado com impostos e uma série de outras questões são respondidas rapidamente após a seleção desejada pelo cidadão, que recebe o retorno dos dados de maneira detalhada. O objetivo é que, a partir da pergunta cidadã, o usuário desenvolva interesse por outros temas e passe a explorar ainda mais o Portal da Transparência.</dd>
                    <br>
                    <dt>Plano de Trabalho:</dt>
                    <dd>É o instrumento que integra as solicitações de convênios, contendo o detalhamento das responsabilidades assumidas por cada um dos participantes, conforme apresentado em propostas referentes à realização de projetos.</dd>
                    <br>
                    <dt>Plano Plurianual (PPA):</dt>
                    <dd>É toda construção, reforma, fabricação, recuperação ou ampliação de um bem público.</dd>
                    <br>
                    <dt>Preparação de Pagamento:</dt>
                    <dd>É o documento que registra a etapa em que se prepara o pagamento de um compromisso do governo. É anterior à emissão da ordem bancária, que é o pagamento efetivo./dd>
                    <br>
                    <dt>Prestação de Contas:</dt>
                    <dd>É um processo detalhado de todas as ações e despesas realizadas pela pessoa responsável pelos recursos públicos recebidos.</dd>
                    <br>
                    <dt>Previsto Bruto:</dt>
                    <dd>Receita programada, planejada, sem considerar as respectivas deduções, como, por exemplo, os valores a serem repassados aos municípios.</dd>
                    <br>
                    <dt>Previsto Líquido:</dt>
                    <dd>Receita programada, planejada, considerando as respectivas deduções, como, por exemplo, os valores a serem repassados aos municípios.</dd>
                    <br>
                    <dt>Programa:</dt>
                    <dd>É um instrumento que o governo utiliza para otimizar os recursos entre os setores e que articula um conjunto de ações suficientes para resolver um problema.</dd>
                    <br>
                    <dt>Programação Financeira:</dt>
                    <dd>É a metodologia utilizada pelo governo para melhor organizar a utilização dos recursos que serão aplicados em suas ações, de acordo com o seu fluxo financeiro, compatibilizando a realização da receita e a execução da despesa.</dd>
                    <br>
                    <dt>Programa Finalístico:</dt>
                    <dd>É um programa que resulta em bens e serviços ofertados diretamente à sociedade.</dd>
                    <br>
                    <dt>Projeto:</dt>
                    <dd>É uma ação limitada no tempo, realizada para alcançar o objetivo de um programa, que resultará em um produto que concorre para a expansão ou para o aperfeiçoamento da ação governamental.</dd>
                    <br>
                    <dt>Projeto Básico:</dt>
                    <dd>Conjunto de desenhos, memoriais descritivos, especificações técnicas, orçamento, cronograma e demais elementos técnicos necessária à precisa caracterização da obra ou do serviço a ser executado, atendendo às Normas Técnicas e à legislação vigente. É elaborado com base em estudos preliminares que assegurem a viabilidade técnica, a avaliação do custo, o adequado tratamento ambiental e o prazo de execução.</dd>
                    <br>
                    <dt>Projeto Executivo:</dt>
                    <dd>É o conjunto dos elementos necessários e suficientes à execução completa da obra.</dd>
                    <br>
                    <dt>Projetos Estruturantes:</dt>
                    <dd>São instrumentos utilizados para operacionalizar a estratégia, direcionando-a para a execução do planejamento.</dd>
                    <br>
                    <dt>Proposta Orçamentária:</dt>
                    <dd>É o projeto de Lei Orçamentária enviado à Assembleia Legislativa que apresenta a previsão das receitas e das despesas para o ano seguinte.</dd>
                    <br>
                    <dt>Publicação:</dt>
                    <dd>É dar publicidade aos atos do governo no Diário Oficial de Cachoeiro de Itapemirim.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="q">
                <p><b>Q</b></p>                                
              </div>
              <div class="tab-pane" id="r">
                <p><b>R</b></p>
                <dl>
                    <dt>Receita:</dt>
                    <dd>São todos os recursos recebidos pelo governo, provenientes do seu poder de tributar e de obter rendas.</dd>
                    <br>
                    <dt>Receita Acumulada:</dt>
                    <dd>É o montante da receita arrecadada pelo governo até um período determinado.</dd>
                    <br>
                    <dt>Receita Agropecuária:</dt>
                    <dd>É a receita proveniente da atividade agropecuária, como a venda de produtos agrícolas (grãos, tecnologia, insumos, etc.) e produtos pecuários (sêmens, técnicas em inseminação, matrizes, etc.).</dd>
                    <br>
                    <dt>Receita Corrente:</dt>
                    <dd>São os recursos recebidos pelo governo que, em geral, afetam positivamente o seu patrimônio líquido (diferença entre os bens e os direitos do município e as suas obrigações). Como exemplo, têm-se as receitas tributárias, patrimoniais, industriais e outras de natureza semelhante, bem como as provenientes de transferências correntes. Analisando-se o efeito dessas receitas sobre o patrimônio líquido, verifica-se que, ao mesmo tempo que aumentam a disponibilidade de recursos (ativo), elas não criam nenhuma obrigação para o município (passivo), portanto aumentam o patrimônio líquido municipal.</dd>
                    <br>
                    <dt>Receita Corrente Líquida (RCL):</dt>
                    <dd>É o somatório dos valores que compõem a Receita Corrente, deduzido o seguinte: as parcelas de impostos e as transferências pertencentes aos municípios, por determinação constitucional; a parcela destinada ao Fundeb; a contribuição dos servidores para o custeio do seu sistema de previdência e assistência social; e as receitas provenientes da compensação financeira previdenciária.</dd>
                    <br>
                    <dt>Receita de Alienação de Bens:</dt>
                    <dd>É a receita proveniente da venda de bens móveis (veículos, computadores, equipamentos, etc.) ou imóveis (terrenos, salas, prédios, etc.).</dd>
                    <br>
                    <dt>Receita de Amortização de Empréstimos:</dt>
                    <dd>É a receita proveniente do recebimento por empréstimos oferecidos a terceiros.</dd>
                    <br>
                    <dt>Receita de Capital:</dt>
                    <dd>É a receita derivada da obtenção de recursos mediante a constituição de dívidas, recebimento de empréstimos concedidos ou venda de bens e direitos, entre outras receitas de capital. De forma diversa da receita corrente, a receita de capital, em geral, não altera o patrimônio líquido (diferença entre os bens e direitos do município e suas obrigações), uma vez que gera ao mesmo tempo um aumento das disponibilidades (ativo) e uma baixa de seus bens (ativo) ou de suas obrigações (passivo).</dd>
                    <br>
                    <dt>Receita de Contribuições:</dt>
                    <dd>É o recurso recebido proveniente de contribuições sociais ao Regime Próprio de Previdência dos Servidores Públicos Municipais.</dd>
                    <br>
                    <dt>Receita de Operações de Crédito:</dt>
                    <dd>É a receita proveniente da contratação de empréstimos com bancos, tais como o BNDES, o Banco do Brasil, o BID, entre outros.</dd>
                    <br>
                    <dt>Receita de Serviços:</dt>
                    <dd>É o recurso financeiro recebido em virtude dos serviços prestados por órgãos e entidades do governo.</dd>
                    <br>
                    <dt>Receita Extraorçamentária:</dt>
                    <dd>São todos os recursos recebidos que não transitam pelo orçamento público e, consequentemente, não constituem renda do Município, como, por exemplo, as cauções depositadas pelo contratado como garantia para a execução de um contrato.</dd>
                    <br>
                    <dt>Receita Industrial:</dt>
                    <dd>É o recurso financeiro recebido da atividade industrial exercida por órgãos e entidades do governo.</dd>
                    <br>
                    <dt>Receita Intraorçamentária:</dt>
                    <dd>É a receita decorrente do fornecimento de materiais, bens e serviços, entre outras operações, de órgãos ou entidades da mesma esfera de governo.</dd>
                    <br>
                    <dt>Receita Patrimonial:</dt>
                    <dd>É o recurso financeiro recebido pela exploração do patrimônio público, como a locação de imóveis, os rendimentos de aplicações financeiras e a participação societária do governo.</dd>
                    <br>
                    <dt>Receita Tributária:</dt>
                    <dd>São todos os recursos financeiros obtidos pela arrecadação de impostos, taxas e contribuições de melhoria.</dd>
                    <br>
                    <dt>Repasse Financeiro:</dt>
                    <dd>É uma forma de transferência de recursos financeiros entre uma unidade gestora (UG) da Prefeitura e outra.</dd>
                    <br>
                    <dt>Reserva de Contingência:</dt>
                    <dd>É uma reserva de recursos orçamentários sem vinculação a órgão, unidade orçamentária, programa ou categoria econômica, para utilização em passivos contingentes e outros riscos, bem como eventos fiscais imprevistos que possam ocorrer.</dd>
                    <br>
                    <dt>Restos a Pagar:</dt>
                    <dd>São despesas assumidas pelo governo, mas não pagas, até o final do exercício, dividindo-se em restos processados e não processados. Os restos a pagar processados são despesas empenhadas e liquidadas que não foram pagas até 31/12. Já os restos a pagar não processados são aquelas despesas que foram somente empenhadas, não sendo liquidadas nem pagas até o final do ano.</dd>
                    <br>
                    <dt>Restos a Pagar não Processados:</dt>
                    <dd>Despesas realizadas dentro do ano civil que não receberam a análise e o aval do governo, sendo feito esse processamento somente no próximo ano.</dd>
                    <br>
                    <dt>Restos a Pagar Processados:</dt>
                    <dd>Despesas realizadas dentro do ano civil que receberam a análise e o aval do governo, porém somente serão pagas no próximo ano.</dd>
                    <br>
                    <dt>Restos Não Processados a Liquidar:</dt>
                    <dd>Despesas realizadas no ano anterior que não receberam a análise e o aval do governo (liquidação da despesa) naquele ano, e que estão aguardando esse procedimento no ano seguinte.</dd>
                    <br>
                    <dt>Restos Não Processados Cancelados:</dt>
                    <dd>Cancelamento de despesa empenhada no ano anterior, inscrita em restos não processados.</dd>
                    <br>
                    <dt>Restos Não Processados Inscritos:</dt>
                    <dd>Despesas realizadas no ano anterior que não receberam a análise e o aval do governo (liquidação da despesa), sendo feito esse processamento somente no ano seguinte.</dd>
                    <br>
                    <dt>Restos Não Processados Liquidados a pagar:</dt>
                    <dd>Despesas realizadas no ano anterior que não receberam a análise e o aval do governo (liquidação da despesa) naquele ano, sendo feito esse procedimento no ano seguinte, porém ainda não foram pagas.</dd>
                    <br>
                    <dt>Restos Não Processados Pagos:</dt>
                    <dd>Despesas realizadas no ano anterior que não receberam a análise e o aval do governo (liquidação da despesa), sendo feito esse processamento e o pagamento somente no ano seguinte ao da despesa.</dd>
                    <br>
                    <dt>Restos Processados a Pagar:</dt>
                    <dd>Despesas realizadas no ano anterior que receberam a análise e o aval do governo (liquidação da despesa), porém serão pagas no ano seguinte ao da despesa.</dd>
                    <br>
                    <dt>Restos Processados Cancelados:</dt>
                    <dd>Cancelamento de despesa liquidada inscrita em restos processados no ano anterior.</dd>
                    <br>
                    <dt>Restos Processados Inscritos:</dt>
                    <dd>Despesas realizadas no ano anterior, que receberam a análise e aval do governo (liquidação da despesa), porém, somente serão pagas no ano atual.</dd>
                    <br>
                    <dt>Restos Processados Pagos:</dt>
                    <dd>Despesas realizadas no ano anterior que receberam a análise e o aval do governo (liquidação da despesa), porém foram pagas no ano atual.</dd>
                    <br>
                    <dt>Rubrica:</dt>
                    <dd>Para melhor identificação das receitas públicas, utilizam-se níveis de classificação para os seus registros e que possibilitam o detalhamento dos recursos que ingressam nos cofres públicos. É o quarto dígito da classificação da receita pública e possui um grau de detalhamento superior ao da espécie. Por exemplo, dentro da Espécie "Impostos", pode-se destacar a Rubrica "Impostos sobre o Patrimônio e a Renda".</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="s">
                <p><b>S</b></p>
                <dl>
                    <dt>Saldo contratual:</dt>
                    <dd>Corresponde à diferença entre o valor total contratado e o valor total medido do referido contrato.</dd>
                    <br>
                    <dt>Serviço de engenharia:</dt>
                    <dd>É toda atividade que necessite da participação e do acompanhamento de profissional legalmente habilitado.</dd>
                    <br>
                    <dt>Serviços de Terceiros:</dt>
                    <dd>São serviços prestados por pessoa física ou jurídica, a exemplo de consultorias e cessão de mão de obra.</dd>
                    <br>
                    <dt>Servidor CLT:</dt>
                    <dd>É o servidor contratado com carteira assinada, ou seja, sob o regime da Consolidação das Leis do Trabalho (CLT).</dd>
                    <br>
                    <dt>Servidor Comissionado:</dt>
                    <dd>É o servidor nomeado sem necessidade de concurso público para exercer funções de direção, chefia ou assessoramento em cargos de livre nomeação e exoneração.</dd>
                    <br>
                    <dt>Servidor Comissionado com Vínculo Efetivo:</dt>
                    <dd>Para fins de consulta de remuneração do Portal da Transparência, são considerados nesse contexto os servidores efetivos que têm cargo de comissão.</dd>
                    <br>
                    <dt>Servidor Comissionado sem Vínculo Efetivo:</dt>
                    <dd>Para fins de consulta de remuneração do Portal da Transparência, são os servidores comissionados puros, sem vínculo efetivo com a Prefeitura.</dd>
                    <br>
                    <dt>Servidor Efetivo:</dt>
                    <dd>É o servidor que foi aprovado em concurso público para exercer as suas atividades. Para fins de consulta de remuneração do Portal da Transparência, são considerados todos os servidores ativos e aposentados, incluindo o grupo de empregados públicos, exceto temporários e comissionados puros (comissionado sem vínculo efetivo).</dd>
                    <br>
                    <dt>Servidor Efetivo/Função Gratificada:</dt>
                    <dd>É o servidor efetivo que foi designado para exercer funções de direção, chefia ou assessoramento.</dd>
                    <br>
                    <dt>Servidor Público:</dt>
                    <dd>É o empregado ou servidor, investido em emprego ou cargo público, de provimento efetivo ou em comissão, da administração pública direta, das autarquias e das fundações públicas dos Poderes Legislativos, Executivo e Judiciário.</dd>
                    <br>
                    <dt>Servidor Temporário:</dt>
                    <dd>Para fins de consulta de remuneração do Portal da Transparência, são considerados os servidores admitidos em caráter temporário (DTs), estagiários e bolsistas.</dd>
                    <br>
                    <dt>Servidores Ativos:</dt>
                    <dd>Para fins de consulta de remuneração do Portal da Transparência, são considerados todos os servidores (inclusive os empregados públicos desta consulta), exceto o grupo de servidores inativos. Também não estão incluídos os pensionistas especiais e previdenciários.</dd>
                    <br>
                    <dt>Servidores Inativos:</dt>
                    <dd>Para fins de consulta de remuneração do Portal da Transparência, são os servidores que receberam o direito à inatividade remunerada, conforme condições previstas em lei.</dd>
                    <br>
                    <dt>Setor Beneficiado:</dt>
                    <dd>Indica a área de governo atendida com o contrato.</dd>
                    <br>
                    <dt>Sistema Único de Saúde (SUS):</dt>
                    <dd>É o sistema público de gestão da saúde no Brasil. Abrange, para toda a população do País, desde o simples atendimento ambulatorial até o transplante de órgãos.</dd>
                    <br>
                    <dt>Sociedade de Economia Mista:</dt>
                    <dd>São as empresas criadas por lei para exercício de atividade econômica, nas quais o Poder Público possui a maioria das ações com direito a voto.</dd>
                    <br>
                    <dt>Subalínea:</dt>
                    <dd>Para melhor identificação das receitas públicas, utilizam-se níveis de classificação para seus registros, que possibilitam o detalhamento dos recursos que ingressam nos cofres públicos. A subalínea corresponde ao sétimo e ao oitavo dígito da classificação da receita pública e possui um grau de detalhamento superior ao da alínea. Por exemplo, na alínea "Impostos sobre a Renda e Proventos de Qualquer Natureza", pode-se destacar a subalínea "Pessoas Físicas", que corresponde ao valor arrecadado com imposto de renda das pessoas físicas.</dd>
                    <br>
                    <dt>Subelemento:</dt>
                    <dd>É o nível mais detalhado de informação da despesa pública e identifica o objeto de gasto. Como exemplo, pode-se citar os materiais hospitalares, que são um subelemento do elemento material de consumo.</dd>
                    <br>
                    <dt>Subfunção:</dt>
                    <dd>É um nível de detalhe da função que evidencia com mais detalhes cada área da atuação do governo. Exemplo: na Secretaria de Estado de Turismo, Cultura e Esporte, temos a “Difusão Cultural”, uma subfunção da função "Cultura".</dd>
                    <br>
                    <dt>Subvenção Econômica:</dt>
                    <dd>São despesas com ajuda financeira a entidades privadas com fins lucrativos, concessão de bonificações a produtores, distribuidores e vendedores, cobertura, direta ou indireta, de parcela de encargos de empréstimos e financiamentos e dos custos de aquisição, de produção, de escoamento, de distribuição, de venda e de manutenção de bens, produtos e serviços em geral, e ainda outras operações com características semelhantes.</dd>
                    <br>
                    <dt>Subvenções Sociais:</dt>
                    <dd>São os recursos repassados para a cobertura de despesas de instituições privadas de caráter assistencial ou cultural, sem finalidade lucrativa.</dd>
                    <br>
                    <dt>Superávit Financeiro:</dt>
                    <dd>É a diferença positiva entre o ativo financeiro e o passivo financeiro apurada no balanço patrimonial. Pode ser traduzido como a "sobra de caixa".</dd>
                    <br>
                    <dt>Superávit Orçamentário:</dt>
                    <dd>É o resultado positivo da diferença entre as receitas e as despesas orçamentárias.</dd>
                    <br>
                    <dt>Suprimento de Fundos:</dt>
                    <dd>É um adiantamento de recursos a servidor para que execute despesas que não possam aguardar o procedimento normal, resguardadas as limitações legais, como, por exemplo, as despesas de caráter emergencial e de pequeno valor.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="t">
                <p><b>T</b></p>
                <dl>
                    <dt>Taxas:</dt>
                    <dd>São os recursos financeiros arrecadados pela Prefeitura em virtude do exercício do poder de polícia, ou da utilização, efetiva ou potencial, de serviço público específico e divisível.</dd>
                    <br>
                    <dt>Termo Aditivo:</dt>
                    <dd>É um instrumento utilizado para alteração de contratos, convênios ou acordos firmados pela administração pública.</dd>
                    <br>
                    <dt>Tomada de Contas Especial:</dt>
                    <dd>É um instrumento utilizado pela administração pública para ressarcir-se de eventuais prejuízos que lhe forem causados, utilizado somente depois de esgotadas as medidas administrativas para reparação do dano.</dd>
                    <br>
                    <dt>Tomada de Preços:</dt>
                    <dd>É uma modalidade de licitação que se destina a interessados devidamente cadastrados, observada a necessária qualificação.</dd>
                    <br>
                    <dt>Transferências Constitucionais:</dt>
                    <dd>São os recursos transferidos, por força de previsão constitucional, de uma parte das receitas arrecadadas pela União aos estados e aos municípios e dos estados aos municípios, como, por exemplo, 50% do IPVA que é repassado aos municípios.</dd>
                    <br>
                    <dt>Transferências da União:</dt>
                    <dd>São transferências de dinheiro feitas pelo Governo Federal e recebidas pela Prefeitura. Podem ser divididas em Transferências Obrigatórias e Voluntárias.</dd>
                    <br>
                    <dt>Transferências Fundo a Fundo:</dt>
                    <dd>Caracterizam-se pelo repasse, por meio da descentralização, de recursos diretamente de fundos da esfera federal para fundos da esfera estadual, municipal e do Distrito Federal, dispensando a celebração de convênios. As transferências fundo a fundo são utilizadas nas áreas de assistência social e de saúde. </dd>
                    <br>
                    <dt>Transferências Intergovernamentais:</dt>
                    <dd>São transferências realizadas entre a União, os estados, o Distrito Federal e os municípios.</dd>
                    <br>
                    <dt>Transferências Legais:</dt>
                    <dd>É a transferência, por força de leis específicas, de uma parte das receitas arrecadadas pelo ente a outros entes da Federação.</dd>
                    <br>
                    <dt>Transferências Obrigatórias:</dt>
                    <dd>São transferências de dinheiro feitas pelo Governo Federal por obrigação contida em lei ou na própria Constituição Federal.</dd>
                    <br>
                    <dt>Transferências Voluntárias:</dt>
                    <dd>São recursos transferidos, a título de cooperação, auxílio ou assistência financeira, a outro ente da Federação ou para entidades sem fins lucrativos, para a realização de obras ou serviços de interesse comum. São recursos que não decorrem de determinação constitucional ou legal.</dd>
                    <br>
                    <dt>Transferências Voluntárias à Instituições Privadas:</dt>
                    <dd>São os recursos repassados para a cobertura de despesas de instituições privadas de caráter assistencial ou cultural, sem finalidade lucrativa.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="u">
                <p><b>U</b></p>
                <dl>
                    <dt>Unidade Administrativa:</dt>
                    <dd>É toda e qualquer organização de governo definida pelo Estatuto ou Regimento do órgão.</dd>
                    <br>
                    <dt>Unidade Gestora (UG):</dt>
                    <dd>É uma unidade investida do poder de gerir recursos orçamentários e financeiros para a realização de despesas.</dd>
                    <br>
                    <dt>Unidade Orçamentária (UO):</dt>
                    <dd>É uma unidade que possui recursos orçamentários para a realização de despesas.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="v">
                <p><b>V</b></p>
                <dl>
                    <dt>Valor Empenhado:</dt>
                    <dd>É o valor da parcela da Lei Orçamentária Anual (LOA) já comprometida para pagar contratos assinados com fornecedores de bens, materiais ou serviços.</dd>
                    <br>
                    <dt>Valor Liquidado:</dt>
                    <dd>É o valor das despesas que já passaram pela fase em que se verifica se os bens, materiais ou serviços recebidos estão de acordo com o solicitado.</dd>
                    <br>
                    <dt>Valor Pago:</dt>
                    <dd>Após a conferência do recebimento de bens, materiais e serviços (liquidação), a despesa foi devidamente paga.</dd>
                    <br>
                    <dt>Valor Total Contratado:</dt>
                    <dd>É o valor atualizado do contrato e corresponde à soma do valor originalmente contratado mais os valores aditados e os reajustes.</dd>
                    <br>
                    <dt>Valor Total Medido:</dt>
                    <dd>É o valor correspondente ao total dos serviços executados pela contratada e auferidos pelo fiscal da obra.</dd>
                    <br>
                    <dt>Vínculo do Servidor:</dt>
                    <dd>Representa a ligação do servidor com o governo, se efetivo, comissionado, celetista, etc.</dd>
                    <br>
                </dl>
              </div>
              <div class="tab-pane" id="x">
                <p><b>X</b></p>                                
              </div>
              <div class="tab-pane" id="z">
                <p><b>Z</b></p>                                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

@endsection

@section('scriptsadd')
  <!-- Adicionar propriedades CSS -->
  <script>      
      $( document ).ready(function() {
          $("#default").addClass("active");          
      });
  </script>
@endsection