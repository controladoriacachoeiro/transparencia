@extends('layouts.app')
@section('htmlheader_title', 'Secretarias')

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
            <li class="active">Secretarias</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        {{-- <div class="box-header with-border">
          <h3 class="box-title">Planilhas das Despesas</h3>
        </div> --}}

        <div class="box-group box-body text-justify" id="Secretarias">

            <!--SEMAD-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMAD">
                            Administração
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMAD" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Administração - SEMAD</b></h4>
                        <p class="acessibilidade"><b>Competência:</b>
                            <br>Art. 24. São atribuições básicas da Secretaria Municipal de Administração:
                            <br>I - Programar, supervisionar e controlar as atividades de administração geral da Administração Municipal;
                            <br>II - Planejar, desenvolver, coordenar e executar a política geral de gestão de pessoas da administração direta;
                            <br>III - Promover aplicação da política de cargos, carreiras e remuneração dos servidores públicos municipais
                            <br>IV – Gerir as atividades de recrutamento, seleção, registro e controle funcionais, pagamento e demais atividades de natureza administrativa relacionadas aos recursos humanos da Administração Municipal;
                            <br>V – Coordenar o processo de avaliação e desempenho dos servidores públicos;
                            <br>VI - Formular a política, a promoção e coordenação de atividades relacionadas à segurança no trabalho, ao bem-estar e aos benefícios para os servidores públicos da Administração Municipal;
                            <br>VII - Planejar e executar atividades relativas ao treinamento dos servidores municipais, bem como identificar necessidade de capacitação e desenvolvimento das pessoas;
                            <br>VIII - Estabelecer diálogo permanente com as entidades representantes dos servidores públicos municipais;
                            <br>IX - Administrar e coordenar as Comissões de Permanentes de Processo Administrativo Disciplinar;
                            <br>X - Controlar e organizar os registros e os cadastros relativos ao patrimônio mobiliário e imobiliário da Administração Municipal sem que haja exclusividade na execução de tais atividades;
                            <br>XI - Acompanhar e controlar os contratos, convênios e similares da Administração Municipal.
                            <br>XII - Planejar, orientar e coordenar a padronização, guarda, distribuição e controle dos materiais, bens e serviços na Administração Municipal;
                            <br>XIII - Dirigir a política e a administração das compras governamentais mediante coordenação e execução dos procedimentos licitatórios provocados pelos demais órgãos da Administração Municipal, podendo haver segregação da execução dos certames licitatórios às outras secretarias;
                            <br>XIV - Publicar e expedir atos da Administração Municipal, bem como manter os originais de leis, decretos, portarias e outros atos normativos;
                            <br>XV - Administrar e organizar os serviços de protocolo, tramitação de processos, arquivo geral e publicação de atos oficiais;
                            <br>XVI - Administrar e controlar os serviços relativos à telefonia, energia elétrica, água e demais serviços básicos necessários ao funcionamento da Administração Municipal;
                            <br>XVII - Desempenhar outras atribuições inerentes ao seu âmbito de atuação.
                            <br>
                            <br>Parágrafo único. A Secretaria Municipal de Administração compreende em sua estrutura as seguintes unidades administrativas:
                            <br>I - Coordenadoria Executiva de Compras Governamentais;
                            <br>II - Subsecretaria de Gestão Administrativa;
                            <br>III - Subsecretaria de Gestão de Recursos Humanos;
                            <br>IV - Gerência de Compra Direta;
                            <br>V - Gerência de Licitação;
                            <br>VI - Gerência de Apoio Logístico;
                            <br>VII - Gerência de Contratos, Convênios e Atos Oficiais;
                            <br>VIII - Gerência de Tecnologia da Informação;
                            <br>IX - Gerência de Almoxarifado e Patrimônio;
                            <br>X - Gerência da Escola do Servidor;
                            <br>XI - Gerência de Gestão de Servidor;
                            <br>XII - Gerência de Pagamento;
                            <br>XIII - Gerência de Segurança e Medicina do Trabalho;
                            <br>XIV - Gerência da Comissão de Processo Administrativo Disciplinar;
                            <br>XV - Gerência de Direitos e Vantagens;
                            <br>XVI - Gerência de Recrutamento, Seleção e Admissão;
                            <br>XVII - Gerência Administrativa;
                            <br>XVIII - Coordenação do Arquivo Público;
                            <br>XIX - Coordenação do Protocolo;
                            <br>XX - Coordenação dos Atos Oficiais;
                            <br>XXI - Coordenação do Almoxarifado;
                            <br>XXII - Coordenação do Patrimônio Mobiliário;
                            <br>XXIII - Coordenação do Patrimônio Imobiliário;
                            <br>
                            <br>Art. 66 Compete especialmente a Coordenação Executiva de Compras Governamentais:
                            <br>I - Administrar as atividades de aquisição de bens e serviços para os diversos órgãos da Administração Municipal;
                            <br>II - Elaborar o calendário de compras para a Administração Municipal;
                            <br>III - Estimar o montante de requisições de compras, com base nos dados do cadastro de preços, para fins de licitação;
                            <br>IV - Tomar providências, junto à Gerência de Contabilidade para a reserva orçamentária, com a aquisição de materiais e serviços, e contratos com fornecedores;
                            <br>V - Estabelecer quais os documentos necessários a serem apresentados para o cadastramento e recadastramento de empresas junto à Administração Municipal;
                            <br>VI - Classificar que tipo de serviço as empresas poderão atuar junto à Administração Municipal, após análise da documentação fornecida;
                            <br>VII - Promover a emissão e a entrega do certificado para as empresas;
                            <br>VIII - Promover a emissão de relatório mensal para publicação, por nome de empresas com cadastramento, recadastramento e aditamento;
                            <br>IX - Promover a verificação das penalidades aplicadas às empresas publicadas diariamente e manter os órgãos da Administração Municipal informados quanto à idoneidade das mesmas;
                            <br>X - Tornar aptas as empresas que tenham quitado suas multas ou cumprido os prazos de suspensão ou inidoneidade, dando baixa imediata da sanção sofrida;
                            <br>XI - Promover a emissão de relatório mensal sobre a quantidade de empresas multadas, e suas sanções;
                            <br>XII - Manter arquivados em segurança, todos os documentos entregues pelos fornecedores que se encontram sob a guarda da Coordenação;
                            <br>XIII - Exercer de outras atribuições afins;
                            <br>
                            <br>Art. 67 Compete especialmente a Subsecretaria de Gestão Administrativa:
                            <br>I - Prestar apoio administrativo ao Gabinete do Secretário;
                            <br>II - Acompanhar a execução de normas e procedimentos baixados pelo Titular da Secretaria visando o bom funcionamento e atendimento ao público;
                            <br>III - Acompanhar o desempenho de cada Gerência, e se for necessário propor novas metas para direcionamento das atividades;
                            <br>IV - Controlar manutenção das instalações da Secretaria e seus equipamentos;
                            <br>V - Acompanhar os serviços de contratos e convênios firmados pela Prefeitura Municipal;
                            <br>VI - Acompanhar os trabalhos de tramitação de documentos no âmbito da Prefeitura;
                            <br>VII - Acompanhar os trabalhos do Arquivo Público Municipal;
                            <br>VIII - Acompanhar os gastos com os serviços de fornecimento de energia, água e telefonia, orientando quanto à racionalização de despesas;
                            <br>IX - Acompanhar os serviços de administração do Centro de Manutenção Urbana - CMU;
                            <br>X - Acompanhar os serviços de rede e manutenção de equipamentos de Informática prestados à Secretaria;
                            <br>XI - Acompanhar o controle dos serviços de limpeza e conservação da Secretaria;
                            <br>XII - Manter atualizado quadro de pessoal da Secretaria;
                            <br>XIII - Orientar os Gerentes da Secretaria quanto aos procedimentos a serem adotados em relação aos serviços de suas responsabilidades;
                            <br>XIV - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 68 Compete especialmente a Subsecretaria de Gestão de Recursos Humanos:
                            <br>I - Coordenar atividades relativas à administração de cargos, vencimentos, promoções, direitos, vantagens, aposentadoria;
                            <br>II - Informar, orientar e atender os servidores quanto as suas atividades funcionais;
                            <br>III - Controle e acompanhamento das atividades de segurança e medicina trabalho, exames de admissão e concessão de licenças médicas e licenças previstas no Estatuto dos Servidores Municipais;
                            <br>IV - Realizar interferências se necessário a mudança no direcionamento de atividades propostas pelas Gerências subordinadas;
                            <br>V - Realizar atividades necessárias ao cumprimento e obrigações de âmbito de atuação e responsabilidade compactuada pelo Município e órgãos da esfera estadual, federal e da saúde;
                            <br>VI - Cumprimento de outras finalidades que sejam oportunas e adequadas à administração dos serviços de recursos humanos;
                            <br>VII - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 69 Compete especialmente a Gerência de Compra Direta:
                            <br>I - Organizar e manter atualizado o cadastro de preços correntes dos materiais de emprego mais frequente;
                            <br>II - Elaborar e manter atualizado o catálogo de materiais e serviços, promovendo a especificação dos mesmos;
                            <br>III - Orientar a realização de pesquisa periódica de preços de materiais e serviços no mercado;
                            <br>IV - Organizar e manter atualizado o cadastro de fornecedores;
                            <br>V - Receber e analisar os documentos necessários para o cadastramento de fornecedores, prestadores de serviço de acordo com as normas e rotinas implantadas;
                            <br>VI - Promover ao cadastramento do tipo de penalidade sofrida pela empresa advertência, multa, suspensão, inidoneidade e outras;
                            <br>
                            <br>Art. 70 Compete especialmente a Gerência de Licitação:
                            <br>I - Gerenciar a tramitação de processos licitatórios do Poder Executivo Municipal, em suas diversas modalidades, em cumprimento aos ditames da legislação federal sobre o assunto;
                            <br>II - Verificar o cumprimento de todos os requisitos legais dos processos de licitação, em face das suas diversas modalidades, responsabilizando-se pela sua integridade;
                            <br>III - Preparar editais de licitação, em suas diversas modalidades; pregoeiros….
                            <br>IV - Orientar as Secretarias Municipais quanto aos requisitos e exigências legais dos processos de licitação e contratação com a administração pública;
                            <br>V - Organizar e manter arquivos de dados e informações que permitam a realização dos seus objetivos, articulando as relações administrativas que sejam necessárias envolvendo as diversas Secretarias Municipais;
                            <br>VI - Atender às demandas específicas originadas do Presidente da Comissão Municipal de Licitações;
                            <br>VII - Providenciar as comunicações e as publicações oficiais que sejam necessárias ao cumprimento de legislação;
                            <br>VIII - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 71 Compete especialmente a Gerência de Apoio Logístico:
                            <br>I - Promover estudos e implantar normas de organização de recebimento, numeração, controle da movimentação e arquivo de papéis e documentos da Administração Municipal;
                            <br>II - Promover o recebimento, classificação, numeração, distribuição e controle da tramitação de documentos e papéis relativos à Administração Municipal;
                            <br>III - Assegurar o registro e o controle da movimentação de processos e outros documentos, bem como de seu despacho final e da data do arquivamento;
                            <br>IV - Orientar o fornecimento de informações sobre processos e documentos aos respectivos interessados;
                            <br>V - Estudar e propor medidas que visem melhorar o atendimento ao público e tornar mais rápida a tramitação de papéis;
                            <br>VI - Promover o exame final dos aspectos administrativos dos processos encaminhados para arquivamento;
                            <br>VII - Estudar planos de trabalho de racionalização do arquivo;
                            <br>VIII - Orientar, organizar e supervisionar os serviços de telefonia;
                            <br>IX - Supervisionar os serviços de reprodução de documentos;
                            <br>X - Dispor normas sobre o sistema de iluminação, consumo de água e tarifas telefônicas nas instalações da Administração Municipal e controlar sua adequada utilização;
                            <br>XI - Programar, organizar e supervisionar a execução das atividades relativas a limpeza, guarda e conservação de móveis e instalações da Administração Municipal;
                            <br>XII - Providenciar medidas e contratos de segurança e conservação dos imóveis municipais ou ocupados pela sede da Administração Municipal;
                            <br>XIII - Preparar, registrar, publicar e expedir atos do Chefe do Poder Executivo Municipal;
                            <br>XIV - Organizar, numerar e manter os originais de leis, decretos, portarias e outros atos normativos pertinentes ao Executivo Municipal;
                            <br>XV - Organizar e manter atualizada a coletânea, arquivo e fichário de leis, decretos, projetos de lei e outros de interesse da Administração;
                            <br>XVI - Providenciar a remessa das cópias de leis, decretos e demais atos normativos aos órgãos municipais;
                            <br>XVII - Exercer outras atribuições afins.
                            <br>
                            <br>Art. 72 Compete especialmente a Gerência de Contratos, Convênios e Atos Oficiais:
                            <br>I - Redigir minutas e administrar contratos e convênios firmados pela Prefeitura Municipal;
                            <br>II - Orientar os contratantes e convenientes a respeito das exigências para assinatura do contrato ou convênio;
                            <br>III - Elaborar e numerar atos oficiais ou não para publicação no diário oficial do Município;
                            <br>IV - Proceder na elaboração e distribuição dos diários oficiais publicados;
                            <br>V - Manter o arquivo dos destinatários e assinantes do diário oficial atualizado;
                            <br>VI - Prestar esclarecimentos sobre leis, decretos e demais publicações oficiais;
                            <br>VII - Realizar demais atividades necessárias ao cumprimento de suas atribuições e obrigações que estejam compreendidas no âmbito de atuação e da responsabilidade pactuada pelo Município com os Órgãos Estaduais e federais da área de serviços internos da Administração;
                            <br>VIII - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 73 Compete especialmente a Gerência de Tecnologia da Informação:
                            <br>I - Organizar e controlar equipes de profissionais para prestação de serviços específicos da Gerência ou de acordo com a necessidade da secretaria;
                            <br>II - Gerenciar serviços de terceiros (contratos de prestação de serviços, etc.);
                            <br>III - Gerenciar melhorias, inovações e mudanças na área de serviços de TI, desenvolvendo e mantendo procedimentos associados à area;
                            <br>IV - Gerenciar e solucionar incidentes e problemas, através da estrutura de canais e de manutenção de TI;
                            <br>V - Gerenciar atividades do Help Desk, capacidade e desempenho dos ativos disponíveis, serviços de impressão, pós-impressão e expedição;
                            <br>VI - Prospectar, identificar e propor o uso de novas soluções e tecnologias para área;
                            <br>VII - Gerenciar uso e aplicação da política de segurança (habilitação e troca da login e senhas, manutenção de perfis, diretórios, ambientes, etc.);
                            <br>VIII - Garantir a distribuição e uso adequado de licenças de software;
                            <br>IX - Garantir a disponibilidade e continuidade dos serviços de TI;
                            <br>X - Efetuar segurança de dados, arquivos e aplicações (backup e recuperaçãXV -, registrando e controlando as ocorrências;
                            <br>XI - Gerenciar o levantamento de peças para o estoque de informática;
                            <br>XII - Procurar, avaliar e organizar informações que sejam de interesse e relacionadas com os objetivos da secretaria;
                            <br>XIII - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas na área de Tecnologia da Informação.
                            <br>
                            <br>Art. 74 Compete especialmente a Gerência de Almoxarifado e Patrimônio:
                            <br>I - Estabelecer normas para especificação, guarda, distribuição, registro e controle de estoques de materiais e para a elaboração dos demonstrativos pertinentes;
                            <br>II - Manter o estoque em condições de atender à demanda dos órgãos da Administração Municipal, providenciando pedidos de compra, sempre que os níveis de estoque assim o indicarem;
                            <br>III - Programar e coordenar as atividades de recebimento, conferência, armazenamento, distribuição e controle dos materiais utilizados na Administração Municipal;
                            <br>IV - Efetuar rigoroso controle de recebimento de materiais quando do recebimento dos mesmos no Almoxarifado;
                            <br>V - Dar encaminhamento nos processos de compras para pagamento, após declaração de recebimento e aceitação do material pelo requisitante;
                            <br>VI - Organizar os almoxarifados e armazenar, em condições de perfeita ordem, conservação e registro bem como distribuir e controlar os materiais estocados;
                            <br>VII - Manter atualizada a escrituração referente ao movimento de entrada e saída dos materiais e dos estoques existentes nos almoxarifados sob sua responsabilidade, bem como elaborar os demonstrativos e relatórios pertinentes;
                            <br>VIII - Suprir órgãos da Administração Municipal com os materiais armazenados nos almoxarifados e registrar o seu consumo por espécie e por repartição, para previsão e controle dos custos;
                            <br>IX - Coordenar os processos de informatização das rotinas e processos de trabalho da Coordenação, inclusive quanto à adequação de sistemas e aplicativos às finalidades do órgão, em articulação com a Secretaria Municipal de Finanças, através da área de Tecnologia da Informação;
                            <br>X - Promover a guarda e a conservação do estoque de material de consumo, estabelecendo normas e controles de classificação e registro;
                            <br>XI - Adotar as devidas providências conforme edital e contrato, referente a entrega de materiais de forma única ou programada;
                            <br>XII - Fazer cumprir rigorosamente os prazos de entrega dos materiais conforme especificação nos editais ou contratos;
                            <br>XIII - Instruir os processos para tomada de decisões quanto à aplicação de penalidades a fornecedores quando do descumprimento da entrega de materiais quanto a especificação técnica e prazos;
                            <br>XIV - Elaborar mensalmente os balancetes e encaminhar bimestralmente ao Secretário Municipal de Administração, com a finalidade de consolidação do Inventário anual;
                            <br>XV - Exercer outras atribuições afins.
                            <br>
                            <br>Art. 75 Compete especialmente a Gerência da Escola do Servidor:
                            <br>I - Promover o levantamento permanente das necessidades de treinamento nos diversos órgãos da Prefeitura;
                            <br>II - Proceder à análise de diagnósticos das necessidades de treinamento e/ou formação, capacitação e desenvolvimento de servidores;
                            <br>III - Articular-se, sistematicamente, com as demais unidades administrativas da Prefeitura na definição de programas e projetos de capacitação e desenvolvimento dos servidores;
                            <br>IV - Planejar cursos de natureza técnica e administrativa, visando à formação, aperfeiçoamento e especialização profissional dos servidores da Prefeitura, promovendo o respectivo acompanhamento e avaliação;
                            <br>V - Propor a realização de seminários ou conferências sobre assuntos especializados do interesse da Prefeitura;
                            <br>VI - Acompanhar a evolução dos resultados dos cursos ministrados, interna ou externamente, através de entrevistas com os participantes e de mecanismos pedagógicos de medição da retenção do aprendizado;
                            <br>VII - Emitir certificados à cursistas;
                            <br>VIII - Estabelecer articulações entre as atividades de treinamento com outras que lhe são afins, dentro de uma perspectiva interdisciplinar;
                            <br>IX - Promover, quando autorizada, a celebração de convênios e/ou contratos com órgãos municipais, estaduais, federais, universidades e entidades públicas e privadas objetivando ações de formação, capacitação e desenvolvimento;
                            <br>X - Identificar, em conjunto com as demais Secretarias, servidores com potencial para ministrar cursos internamente;
                            <br>XI - Desenvolver e planejar programas e projetos em andamento;
                            <br>XII - Avaliar as ações das coordenações para a constatação dos resultados da ações efetivas;
                            <br>XIII - Planejar, orientar e supervisionar as atividades de treinamento;
                            <br>XIV - Planejar o grupo de Servidores que participarão dos treinamentos;
                            <br>XV - Manter contato com Instituições dentro e fora do Município de acordo com as necessidades, especialidades e/ou especifidades de cada treinamento;
                            <br>XVI - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 76 Compete especialmente a Gerência de Gestão do Servidor:
                            <br>I - Elaborar e controlar estatisticamente o quantitativo de cargos ocupados em cada secretaria, realizando a sua manutenção quanto às modificações que forem sendo efetuadas;
                            <br>II - Monitorar a Execução do processo de progressão e ascensão funcional existentes nos diversos Quadros de Cargos;
                            <br>III - Prestar informações em processos e documentos diversos de natureza administrativa;
                            <br>IV - Acompanhar a legislação aplicável aos servidores em seus diversos vínculos, no que tange ao cumprimento de procedimentos administrativos;
                            <br>V - Prestar informações funcionais pertinentes a servidores, em atendimento à órgãos de Justiça, Trabalho e Previdência Social;
                            <br>VI - Orientar o servidor quanto aos seus direitos, deveres, vantagens, responsabilidade e Obrigações;
                            <br>VII - Controlar o pagamento dos benefícios e outros adicionais concedidos aos servidores;
                            <br>VIII - Elaborar certidões de tempo de contribuição/ e ou serviços para fins de averbação e aposentadoria do servidor;
                            <br>IX - Preparar declarações para fins de comprovação de prestação de serviços, e movimentação bancária;
                            <br>X - Promover averbação de tempo de contribuição, de acordo com efetivo exercício dos servidores estatutários;
                            <br>XI - Administrar e prestar informações relativas a servidores disponibilizados através de convênios, a outros Municípios e Órgãos;
                            <br>XII - Proceder a cálculos e acompanhar pagamento de gratificações, adicional de tempo de serviço e outros benefícios atribuídos aos servidores Municipais;
                            <br>XIII - Administrar e acompanhar concessão de pagamento de adicional de insalubridade, periculosidade, e outras verbas similares, de acordo com laudo técnico e legislação vigente;
                            <br>XIV - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 77 Compete especialmente a Gerência de Pagamento:
                            <br>I - Processar folha de pagamento de servidores, cumprindo datas estabelecidas e legislação pertinente;
                            <br>II - Monitorar os pagamentos de benefícios devidos aos servidores públicos municipais;
                            <br>III - Proceder de acordo com a lei ou decisão judicial, o recolhimento ou pagamento de quem de direito, obedecendo a prazos definidos;
                            <br>IV - Administrar o recolhimento de obrigações trabalhistas e previdenciárias;
                            <br>V - Orientar a realização da projeção de gastos com pessoal;
                            <br>VI - Elaborar quadros estatísticos de despesas mensais, para fins de acompanhamento e avaliação administrativa;
                            <br>VII - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 78 Compete especialmente a Gerência de Segurança e Medicina do Trabalho:
                            <br>I - acompanhar atividades voltadas à Saúde e Segurança do Servidor Municipal;
                            <br>II - Executar vistorias, análises e avaliação quantitativa e qualitativa a fim de medir o grau de complexidade das atividades desenvolvidas pelo servidor;
                            <br>III - Elaborar estudos voltados à preservação e controle de acidentes no trabalho;
                            <br>IV - Realizar estudos relativos às condições de segurança dos locais de trabalho, visando à integridade física do servidor municipal;
                            <br>V - Realizar demais atividades necessárias ao cumprimento de suas atribuições e obrigações, no âmbito de atuação e responsabilidade pactuada pelo Município com órgãos estaduais e federais;
                            <br>VI - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 79 Compete especialmente a Gerência da Comissão de Processo Administrativo Disciplinar:
                            <br>I - Gerenciar as atividades de apoio administrativo e técnico aos trabalhos desenvolvidos pela Comissão de Processo Administrativo Disciplinar – COPAD;
                            <br>II - Preparar relatório sobre o conteúdo do processo para análise da COPAD;
                            <br>III - Despachar os processos com o Presidente da COPAD, adotando as providências administrativas ou técnicas determinadas para seu encaminhamento processual;
                            <br>IV - Analisar os processos encaminhados para análise da COPAD, providenciando a sua instrução naquilo que for necessário para o seu julgamento;
                            <br>V - Providenciar, junto aos órgãos competentes, a inserção de documentos ou informações que sejam pertinentes ao esclarecimento dos fatos contidos em processo administrativo;
                            <br>VI - Providenciar os despachos que forem necessários e que estejam em sua alçada de atribuições;
                            <br>VII - Manter registros e arquivos sobre os processos, assuntos e servidores públicos Municipais que forem objeto ou alvo de investigação e julgamento da COPAD;
                            <br>VIII - Providenciar a emissão de pareceres que forem necessários nos processos disciplinares encaminhados à COPAD;
                            <br>IX - Acompanhar a tramitação dos processos, verificando os prazos processuais de andamento de cada um deles;
                            <br>X - Convocar servidores públicos Municipais ou testemunhas para prestar depoimento nos autos dos processos;
                            <br>XI - Providenciar a publicação no Diário Oficial do Município das deliberações tomadas pela COPAD, quando decididas pelo Chefe do Executivo Municipal;
                            <br>XII - Realizar demais atividades que sejam oportunas, pertinentes e adequadas à execução das atividades de apoio administrativo e técnico aos trabalhos da COPAD;
                            <br>XIII - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 80 Compete especialmente a Gerência de Direitos e Vantagens:
                            <br>I - Administrar o quadro de pessoal, tomando as medidas necessárias para o controle de cargos e funções vagos e a solicitação de seu preenchimento, inclusive através do pedido para abertura de concurso público ou para a convocação dos candidatos aprovados em concursos ainda em vigor;
                            <br>II - Organizar e gerir as atividades de recrutamento e seleção de servidores municipais, de acordo com os procedimentos determinados, inclusive os concursos públicos;
                            <br>III - Tomar as providências gerenciais e administrativas relativas aos concursos públicos;
                            <br>IV - Submeter ao seu Gerente os resultados dos concursos públicos com vista a sua homologação pelo Chefe do Poder executivo Municipal;
                            <br>V - Elaborar estudos de dimensionamento da força de trabalho e implementação de planos de lotação;
                            <br>VI - Identificar os quantitativos necessários para o suprimento de pessoal nos órgãos da Administração Direta, e tomar as providências cabíveis para a contratação de estagiários bem como orientar a de pessoal temporário, de acordo com a legislação e demais normas pertinentes;
                            <br>VII - Desenvolver e implementar o sistema de avaliação de desempenho dos servidores, em articulação com a avaliação do desempenho institucional da Administração Municipal;
                            <br>VIII - Propor e desenvolver sistemas de carreiras que estimulem o crescimento funcional do servidor e de uma política de remuneração atraente, observada a disponibilidade financeira da Administração Municipal;
                            <br>IX - Monitorar, avaliar e propor a reformulação do plano de carreiras da Administração Municipal;
                            <br>X - Exercer outras atribuições afins a Gerência de Direitos e Vantagens;
                            <br>
                            <br>Art. 81 Compete especialmente a Gerência de Recrutamento, Seleção e Admissão:
                            <br>I - Administrar o quadro de pessoal, tomando as medidas necessárias para o controle de cargos e funções vagos e a solicitação de seu preenchimento, inclusive através do pedido para abertura de concurso público ou para a convocação dos candidatos aprovados em concursos ainda em vigor;
                            <br>II - Organizar e gerir as atividades de recrutamento e seleção de servidores municipais, de acordo com os procedimentos determinados, inclusive os concursos públicos;
                            <br>III - Tomar as providências gerenciais e administrativas relativas aos concursos públicos;
                            <br>IV - Submeter ao seu Gerente os resultados dos concursos públicos com vista a sua homologação pelo Chefe do Poder executivo Municipal;
                            <br>V - Elaborar estudos de dimensionamento da força de trabalho e implementação de planos de lotação;
                            <br>VI - Identificar os quantitativos necessários para o suprimento de pessoal nos órgãos da Administração Direta, e tomar as providências cabíveis para a contratação de estagiários bem como orientar a de pessoal temporário, de acordo com a legislação e demais normas pertinentes;
                            <br>VII - Desenvolver e implementar o sistema de avaliação de desempenho dos servidores, em articulação com a avaliação do desempenho institucional da Administração Municipal;
                            <br>VIII - Propor e desenvolver sistemas de carreiras que estimulem o crescimento funcional do servidor e de uma política de remuneração atraente, observada a disponibilidade financeira da Administração Municipal;
                            <br>IX - Monitorar, avaliar e propor a reformulação do plano de carreiras da Administração Municipal;
                            <br>X - Exercer outras atribuições afins;
                            <br>
                            <br>Art. 82 Compete especialmente a Gerência Administrativa:
                            <br>I - Assistir ao Secretário Municipal de Administração no planejamento e orientação da execução das atividades administrativas e financeiras da Secretaria, provendo suporte à realização dos programas, projetos e atividades da Secretaria;
                            <br>II - Elaborar o Plano Plurianual - PPA e a proposta orçamentária de cada exercício financeiro, em conjunto com o Ordenador de Despesas, observados os limites das despesas e receita definidos pela Secretaria de Fazenda;
                            <br>III - Realizar o controle orçamentário e financeiro da Secretaria, através da apuração, análise e controle de custos;
                            <br>IV - Elaborar projeções da execução orçamentária ao longo do exercício financeiro para conhecimento e tomada de decisão do Ordenador de Despesas;
                            <br>V - Monitorar a utilização dos recursos da Secretaria com emissão periódica de relatórios;
                            <br>VI - Analisar e classificar a natureza econômica das despesas da Secretaria;
                            <br>VII - Indicar dotação orçamentária e elemento de despesa de acordo com a fonte de recursos;
                            <br>VIII - Solicitar remanejamentos, anulações parciais ou totais e suplementações orçamentárias de acordo com a disponibilidade financeira, dentro dos dispositivos legais;
                            <br>IX - Acompanhar e controlar a execução orçamentária da Secretaria (saldos de empenhos de contratos e convênios);
                            <br>X - Propor medidas de contenção de despesas ao Secretário;
                            <br>XI - Controlar a frequência dos servidores da Secretaria;
                            <br>XII - Efetuar no Sistema de Gestão de Pessoas, lançamentos específicos de verbas legais, tais como: produtividade, hora extra e demais gratificações;
                            <br>XIII - Efetuar a distribuição de vales-transportes, vale-alimentação e contracheques aos servidores da Secretaria;
                            <br>XIV - Controlar a lotação e movimentação dos servidores da Secretaria;
                            <br>XV - Providenciar as liquidações nos processos de pagamentos de compras no âmbito da Secretaria;
                            <br>XVI - Controlar as contas de telefone, água e luz, de imóveis, locados ou do próprio Município, para atender ao interesse da Secretaria e providenciar seu encaminhamento ao órgão competente para providências de pagamento;
                            <br>XVII - Preparar e acompanhar os processos de requisição de taxa de inscrição, diárias e passagens, e sua prestação de contas;
                            <br>XVIII - Despachar, receber e efetuar a distribuição da correspondência encaminhada à Secretaria;
                            <br>XIX - Supervisionar os serviços de reprografia da Secretaria;
                            <br>XX - Supervisionar os serviços de controle do transporte oficial a cargo da Secretaria;
                            <br>XXI - Supervisionar o controle de patrimônio da Secretaria;
                            <br>XXII - Controlar a movimentação dos materiais de consumo e permanente do almoxarifado da unidade gestora;
                            <br>XXIII - Controlar a transferência dos bens móveis, no âmbito da Secretaria;
                            <br>XXIV - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 83 Compete especialmente a Coordenação do Arquivo Público:
                            <br>I - Manter organizado os documentos encaminhados para arquivamento no Arquivo Público Municipal;
                            <br>II - Organizar e acompanhar o funcionamento do sistema de cadastro, classificação e controle de entrada e saída dos documentos encaminhados para o Arquivo Público Municipal;
                            <br>III - Coordenar o arquivamento e desarquivamento de documentos diversos;
                            <br>IV - Orientar e informar aos interessados em processos e/ou documentos em tramitação e/ou arquivados;
                            <br>V - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 84 Compete especialmente a Coordenação do Protocolo:
                            <br>I - Autuar processos e proceder a abertura de novos volumes processuais, quando vislumbrada necessidade;
                            <br>II - Efetuar nos autos em tramitação a juntada de documentos, seja por anexação ou apensamento e, da mesma forma, realizar o desapensamento e o desentranhamento mediante despacho;
                            <br>III - Registrar a autuação do processo no Sistema de Controle Processual desta Municipalidade ou dar-lhe seguimento, sem autuação, se não lhe couber.
                            <br>IV - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 85 Compete especialmente a Coordenação dos Atos Oficiais:
                            <br>I - Coordenar a preparação e a numeração dos atos oficiais a serem firmados pelo Secretário Municipal de Administração e Serviços Internos, encaminhando as cópias aos interessados e controlando-os no que se fizer necessário;
                            <br>II - Coordenar a conclusão e organização dos documentos oficiais ou não para agendamento de publicação no Diário Oficial do Município;
                            <br>III - Coordenar o lançamento e a indexação de dados (leis, decretos e portarias) no sistema de legislação on line da Prefeitura Municipal, para exposição via internet;
                            <br>IV - Coordenar a elaborar e diagramação do Diário Oficial do Município;
                            <br>V - Manter arquivo organizado com o nome o endereço dos destinatários e assinantes do Diário Oficial do Município;
                            <br>VI - Prestar informações e esclarecimentos sobre as atividades efetuadas;
                            <br>VII - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 86 Compete especialmente a Coordenação do Almoxarifado:
                            <br>I - Administrar e organizar manutenção de materiais em estoques necessários para atendimento às Secretarias Municipais;
                            <br>II - Definir e controlar a entrega de materiais às Secretarias Municipais;
                            <br>III - Assumir a responsabilidade pelo recebimento, guarda e segurança dos bens e materiais mantidos em estoque;
                            <br>IV - Zelar pela manutenção, asseio, limpeza, arrumação dos materiais estocados no Almoxarifado;
                            <br>V - Orientar os responsáveis pelas Secretarias Municipais quanto os procedimentos a serem adotados em relação à solicitação dos materiais estocados no Almoxarifado;
                            <br>VI - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 87 Compete especialmente a Coordenação do Patrimônio Mobiliário:
                            <br>I - Organizar, implantar e acompanhar o funcionamento do sistema de cadastro, classificação e controle do patrimônio mobiliário da Prefeitura Municipal;
                            <br>II - Codificar a plaquetagem dos bens móveis cadastrados, classificados e registrados no sistema;
                            <br>III - Manter o sistema de transferência de móveis, equipamentos, máquinas, veículos, instalações e demais bens classificados e registrados no cadastro, no interior de uma mesma Secretaria ou para outra;
                            <br>IV - Promover a reforma ou o reaproveitamento de bens móveis;
                            <br>V - Propor a destinação de bens móveis inservíveis ou aqueles classificados como sucatas;
                            <br>VI - Realizar demais atividades que sejam necessárias ao cumprimento das suas atribuições e obrigações que estejam compreendidas no âmbito de atuação e da responsabilidade pactuada pelo Município com os órgãos Estaduais e Federais da área de serviços internos;
                            <br>VII - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>Art. 88 Compete especialmente a Coordenação do Patrimônio Imobiliário:
                            <br>I - Organizar, implantar e acompanhar o funcionamento do sistema de cadastro, classificação e controle do patrimônio imobiliário da Prefeitura Municipal;
                            <br>II - Manter atualizados o cadastro, os registros o acompanhamento das transformações relativas ao patrimônio imobiliário da Prefeitura, mantendo escrituras, registros oficiais e demais documentos de propriedade, posse, uso e destinação do imóvel;
                            <br>III - Manter atualizados o cadastro, os registros e demais anotações em relação a imóveis pertencentes à Prefeitura Municipal cedidos para uso de outras instituições, assim como os respectivos termos oficiais de cessão, prazos e finalidades;
                            <br>IV - Providenciar a vistoria das condições dos imóveis locados ou cedidos a terceiros, no seu início ou término, elaborando relatório circunstanciado a respeito;
                            <br>V - Realizar demais atividades que sejam necessárias ao cumprimento das suas atribuições e obrigações que estejam compreendidas no âmbito de atuação e da responsabilidade pactuada pelo Município com os órgãos Estaduais e Federais da área de serviços internos;
                            <br>VI - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Av. Brahim Antônio Seder, 96/102 - 3º andar Ed. Centro Administrativo Hélio Carlos Manhães, CEP.: 29.300.060</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 09:00 às 18:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5304</p>
                    </div>
                </div>
            </div>
            <!--SEMAD-->

            <!--SEMAI-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMAI">
                            Agricultura e Interior
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMAI" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Agricultura e Interior - SEMAI</b></h4>
                        <p class="acessibilidade"><b>Competência:</b></p>
                        <p class="acessibilidade"><b>Endereço:</b> </p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> </p>
                        <p class="acessibilidade"><b>Telefone:</b> </p>
                    </div>
                </div>
            </div>
            <!--SEMAI-->

            <!--CGM-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseCGM">
                            Controladoria Geral do Município
                        </a>
                    </h4>
                </div>
                <div id="collapseCGM" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Controladoria Geral do Município - CGM</b></h4>
                        <p class="acessibilidade"><b>Competência:</b> 
                            <br>Art. 22. São atribuições básicas da Controladoria Geral do Município:
                            <br>I - Orientar as Unidades Gestoras quanto aos procedimentos técnicos e aplicação correta das normas administrativas para implantação das ações e programas definidos pela Administração Municipal;
                            <br>II - Desempenhar as atividades do órgão central do sistema de controle interno da Administração Municipal, por meio da supervisão dos procedimentos e normas internas de trabalho;
                            <br>III - Exercer, por meio dos trabalhos de auditoria interna, a fiscalização contábil, financeira, orçamentária, operacional e patrimonial quanto à legalidade, legitimidade e economicidade;
                            <br>IV - Acompanhar e analisar as contas públicas, com o intuito de verificar a sua regularidade e exatidão, adotando as medidas necessárias ao seu fiel cumprimento;
                            <br>V - Controlar os prazos referentes às prestações de contas dos ordenadores de despesa, a serem encaminhadas aos Tribunais de Contas e à Câmara Municipal, examinando-as previamente à vista das exigências dessas entidades;
                            <br>VI - Promover a análise prévia de conformidade dos procedimentos administrativos destinados à aquisição de bens, serviços e à execução de obras públicas, dentro dos limites e competências estabelecidos por meio de regulamentos internos;
                            <br>VII - Analisar e auditar a aplicação de subvenções, contratação de operações crédito e renúncia de receitas;
                            <br>VIII - Examinar e acompanhar, em parceria com a Secretaria de Administração, a realização e execução dos contratos de terceirização, celebrados pela Administração Municipal;
                            <br>IX - Realizar as atividades de Ouvidoria Geral, por meio do recebimento, exame e encaminhamento de denúncias, reclamações, elogios, sugestões e pedidos de acesso à informação, referentes à atuação dos órgãos e entidades da Administração Municipal;
                            <br>X - Promover mecanismos de transparência destinados ao acesso à informação pública, o fortalecimento do controle social, do combate à corrupção e dos princípios éticos nos órgãos e entidades da Administração Municipal;
                            <br>XI - Apoiar o controle externo no exercício de sua missão institucional;
                            <br>XII - Desempenhar outras atribuições inerentes ao seu âmbito de atuação;
                            <br>
                            <br>Parágrafo único. A Controladoria Geral do Município compreende em sua estrutura as seguintes unidades administrativas:
                            <br>I - Ouvidoria Geral;
                            <br>II - Subsecretaria de Controle Interno e Transparência;
                            <br>III - Gerência de Transparência;
                            <br>IV - Gerência de Contas de Governo;
                            <br>V - Gerência de Controle Interno e Orientação Técnica;
                            <br>VI - Gerência de Auditoria e Análise Processual;
                            <br>VII - Gerência Administrativa.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Rua Brahim Antônio Seder, 96/102, Centro, CEP: 29300-060</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> Segunda a Sexta-feira de 07:30 às 17:30</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5384</p>
                    </div>
                </div>
            </div>
            <!--CGM-->

            <!--SEMCULT-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMCULT">
                            Cultura e Turismo
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMCULT" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Cultura e Turismo - SEMCULT</b></h4>
                        <p class="acessibilidade"><b>Competência:</b> 
                            <br>Fomentador de políticas culturais e políticas;
                            <br>
                            <br>Art. 33. São atribuições básicas da Secretaria Municipal de Cultura e Turismo:
                            <br>I - Realizar as atividades concernentes à promoção e ao desenvolvimento da arte e da cultura municipal;
                            <br>II - Preservar o patrimônio histórico, artístico e cultural municipal;
                            <br>III - Promover eventos de natureza cultural e artística no âmbito municipal;
                            <br>IV - Divulgar a cultura da arte e demais expressões da identidade municipal em nível nacional;
                            <br>V - Gerenciar os centros culturais, teatros, museus e demais equipamentos urbanos que se relacionem com a cultura, o patrimônio histórico e a arte;
                            <br>VI - Planejar e executar em conjunto com as diretrizes da Administração Municipal os serviços relativos à infraestrutura operacional e das instalações necessárias à viabilização e realização de eventos culturais e artísticos;
                            <br>VII - Elaborar planos, programas e projetos culturais, em articulação com os órgãos estaduais e federais da área;
                            <br>VIII - Propor políticas e estratégias de atração de atividades turísticas para a Administração Municipal;
                            <br>IX - Analisar e propor políticas e estudos para a dinamização do turismo no Município;
                            <br>X - Elaborar e executar o plano de desenvolvimento turístico do Município;
                            <br>XI - Promover o levantamento e cadastramento de todas as atividades culturais e artísticas municipais;
                            <br>XII - Realizar estudos e pesquisas tendo em vista a preservação e a divulgação do patrimônio histórico municipais;
                            <br>XIII - Prestar apoio técnico e administrativo ao Conselho Municipal de Cultura;
                            <br>XIV - Promover atividades voltadas para o desenvolvimento da economia turística do Município, viabilizando o aproveitamento das suas potencialidades, inclusive o turismo rural e o agroturismo, qualificando serviços, elaborando projetos e realizando eventos que promovam as possibilidades de investimentos no município;
                            <br>XV - Desempenhar outras atribuições inerentes ao seu âmbito de atuação.
                            <br>
                            <br>Parágrafo único. A Secretaria Municipal de Cultura e Turismo compreende em sua estrutura as seguintes unidades administrativas:
                            <br>I - Subsecretaria de Cultura;
                            <br>II - Gerência de Turismo;
                            <br>III - Gerência de Eventos e Patrimônio Imaterial;
                            <br>IV - Gerência de Infraestrutura e Equipamentos;
                            <br>V - Gerência de Centros Culturais;
                            <br>VI - Gerência Administrativa;
                            <br>VII – Coordenação de Turismo Rural;
                            <br>VIII - Coordenação de Artes;
                            <br>IX - Coordenação de Patrimônio Imaterial;
                            <br>X - Coordenação de Equipamentos Culturais;</p>
                        <p class="acessibilidade"><b>Endereços:</b> 
                            <br>- Casa de Cultura Roberto Carlos - R João de Deus Madureira, SN – Recanto CEP: 29.300-435
                            <br>- Biblioteca Municipal Coronel Major Walter Salles - Rua 25 de Março, 118 – Centro CEP: 29.300-100
                            <br>- Museu Ferroviário Domingos Lage - Rua Coronel Francisco Braga, SN - Centro CEP: 29.300-220
                            <br>- Casa dos Braga - Rua 25 de Março, 182 - Centro CEP: 29.300-100
                            <br>- Teatro Municipal Rubem Braga - Avenida Beira Rio, 237 – Centro, CEP: 29.300-784
                            <br>- Mestre Salatiel - Rua Reinaldo Machado, 113 – Centro Recanto CEP: 29.303-011
                            <br>- Circo da Cultura - Av. Beira-Rio, 1 - Guandú, Cachoeiro de Itapemirim - ES, 29.300-300</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 
                            <br>Segunda à Sexta de 09h às 18h
                            <br>Sábados, Domingos e Feriados de 09h às 15h (exceto, Mestre Salatiel, Museu Ferroviário, que não abre domingos e feriados, e Teatro Municipal que depende da pauta para abrir nos finais de semana e feriado)</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5245</p>
                    </div>
                </div>
            </div>
            <!--SEMCULT-->

            <!--SEMDEC-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMDEC">
                            Desenvolvimento Econômico
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMDEC" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Desenvolvimento Econômico - SEMDEC</b></h4>
                        <p class="acessibilidade"><b>Competência:</b> A Secretaria Municipal de Desenvolvimento Econômico (Semdec) tem como principal missão planejar, executar e avaliar as políticas públicas voltadas para promover o desenvolvimento do município por meio do fomento de atividades econômicas e sociais nas áreas da indústria, comércio, serviços. 
                        <br>Sendo assim, realiza ações, projetos e programas de crescimento econômico sustentável, que estimulem a competitividade do mercado local e seu entorno, que possibilitem a capacitação e orientação dos empresários/empreendedores, que apóiem a manutenção e expansão das empresas sediadas no município e incentivem a implantação de novas empresas, além de estimular os arranjos produtivos entre pequenos e microempresários. 
                        <br>Responsável pelo Programa Nossocrédito, Sala do Empreendedor, Aeroporto Municipal, Trabalho, Economia Solidária e Artesanato, Ciência e Tecnologia.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Rua Moreira, 317 - Coronel Borges | CEP: 29306320</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 09:00 às 18:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5243</p>
                    </div>
                </div>
            </div>
            <!--SEMDEC-->

            <!--SEMDES-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMDES">
                            Desenvolvimento Social
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMDES" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Desenvolvimento Social - SEMDES</b></h4>
                        <p class="acessibilidade"><b>Competência:</b>
                            <br>Art. 28. São atribuições básicas da Secretaria Municipal de Desenvolvimento Social:
                            <br>I - Promover a implantação da política pública de Assistência Social em consonância com a Lei Orgânica da Assistência Social – LOAS, com a Política Nacional de Assistência Social – PNAS, com o Sistema Único da Assistência Social – SUAS e com outras
                            leis específicas das áreas de Assistência Social;
                            <br>II - Articular esforços com os setores governamental e privado no processo de implementação da Assistência Social do município, incluindo a celebração de parcerias com organizações da sociedade civil;
                            <br>III - Desenvolver uma política de inclusão social das camadas mais pobres da população, combatendo às consequências da pobreza, garantindo o acesso às políticas públicas essenciais para a vida, nas esferas municipal, estadual e federal;
                            <br>IV - Promover a organização das redes de atendimento pública e privada de assistência social, na execução de programas, projetos, benefícios e serviços;
                            <br>V - Promover a supervisão, acompanhamento, monitoramento e avaliação das ações e da prestação de contas da rede pública, e das organizações da sociedade civil;
                            <br>VI - Elaborar e coordenar as estratégias de implementação de planos, programas e projetos de proteção social;
                            <br>VII - Implementar e coordenar as atividades e ações relativas a direitos humanos e cidadania;
                            <br>VIII - Implementar e coordenar as atividades e ações de Política de Segurança Alimentar e Nutricional;
                            <br>IX - Coordenar e executar os serviços de Proteção Social Básica e de Proteção Social Especial;
                            <br>X - Promover a atenção prioritária à infância e à adolescência em situação de vulnerabilidade e risco social e pessoal, bem como ao idoso e às pessoas com deficiência;
                            <br>XI - Realizar estudos, diagnósticos e perfis socioeconômicos da população, voltados para os programas de assistência social promovidos pela própria secretaria ou por outros órgãos municipais;
                            <br>XII - Elaborar e implantar programas, projetos e serviços específicos e de ações assistenciais de caráter emergencial;
                            <br>XIII - Gerir os fundos municipais de Assistência Social, da Criança e do Adolescente, de Segurança Alimentar e Nutricional, do Idoso, da Juventude, da Igualdade Racial, e da Mulher;
                            <br>XIV - Prestar apoio técnico e administrativo aos Conselhos Municipais de Assistência Social, da pessoa idosa, da pessoa com deficiência, de segurança alimentar e nutricional, dos direitos da criança e do adolescente e Conselhos Tutelares;
                            <br>XV - Conceder benefícios assistenciais de caráter emergencial às famílias e pessoas em situação de alto risco social;
                            <br>XVI - Desempenhar outras atribuições inerentes ao seu âmbito de atuação.
                            <br>
                            <br>Parágrafo único. A Secretaria Municipal de Desenvolvimento Social compreende em sua estrutura as seguintes unidades administrativas:
                            <br>I - Subsecretaria de Assistência Social;
                            <br>II - Subsecretaria de Segurança Alimentar e Cidadania;
                            <br>III - Subsecretaria Administrativa e Financeira;
                            <br>IV - Gerência de Planejamento e Gestão Social;
                            <br>V - Gerência de Proteção Social Básica;
                            <br>VI - Gerência de Gestão do Sistema Único de Assistência Social - SUAS;
                            <br>VII - Gerência de Serviços de Acolhimento;
                            <br>VIII - Gerência de Proteção Social Especial;
                            <br>IX - Gerência do Centro de Referência da Juventude
                            <br>X - Gerência de Direitos Humanos, Cidadania e Política de Gêneros;
                            <br>XI - Gerência de Educação Alimentar;
                            <br>XII - Gerência de Sistemas Descentralizados;
                            <br>XIII - Gerência de Contratos e Convênios;
                            <br>XIV - Gerência de Logística, Manutenção, Patrimônio e Almoxarifado;
                            <br>XV - Gerência Contábil e Execução Orçamentária;
                            <br>XVI - Gerência Administrativa;
                            <br>XVII - Coordenação do Centro de Convivência Vida Ativa - CCVA (atualmente chamado de Centro de Convivência Vovó Matilde - CCVM);
                            <br>XVIII - Coordenação do Cadastro Único;
                            <br>XIX - Coordenação de Transferência de Renda;
                            <br>XX - Coordenação de Benefícios Continuados e Eventuais;
                            <br>XXI - Coordenação de Centros de Referência de Assistência Social - CRAS;
                            <br>XXII - Coordenação do Centro de Referência Especializado de Assistência Social - CREAS;
                            <br>XXIII - Coordenação de Centro POP;
                            <br>XXIV - Coordenação de Medida Sócio Educativa;
                            <br>XXV - Coordenação de Atenção à Criança;
                            <br>XXVI - Coordenação Atenção à Igualdade Racial;
                            <br>XXVII - Coordenação de Almoxarifado de Alimentos e Padaria;
                            <br>XXVIII - Coordenação de Inclusão Produtiva em Segurança Alimentar e Nutricional - SAN;
                            <br>XXIX - Coordenação de Banco de Alimentos e Cesta Verde;
                            <br>XXX - Coordenação de Gestão do Programa de Aquisição de Alimentos - PAA;
                            <br>XXXI - Coordenação de Logística;
                            <br>XXXII - Coordenação de Recursos Humanos;
                            <br>XXXIII - Coordenação Geral dos Conselhos.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Rua Joubert Alves Ayub, 48/50, Ilha da Luz, Cachoeiro de Itapemirim - ES, CEP: 29309-803</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> Segunda a Sexta-feira de 08:00 às 18:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5410</p>
                    </div>
                </div>
            </div>
            <!--SEMDES-->

            <!--SEMDURB-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMDURB">
                            Desenvolvimento Urbano
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMDURB" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Desenvolvimento Urbano - SEMDURB</b></h4>
                        <p class="acessibilidade"><b>Competência:</b></p>
                        <p class="acessibilidade"><b>Endereço:</b> </p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> </p>
                        <p class="acessibilidade"><b>Telefone:</b> </p>
                    </div>
                </div>
            </div>
            <!--SEMDURB-->

            <!--SEME-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEME">
                            Educação
                        </a>
                    </h4>
                </div>
                <div id="collapseSEME" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Educação - SEME</b></h4>
                        <p class="acessibilidade"><b>Competência:</b> 
                            A Secretaria Municipal de Educação de Cachoeiro de Itapemirim tem como atribuições organizar e manter a Rede Municipal de Ensino em suas especifidades, incorporando políticas e planos educacionais Estaduais e Nacionais, atendendo-os em suas demandas. Planejar e estruturar a oferta de vagas para profissionais e alunos em atendimento a Unidade Central e Unidades de Ensino.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Rua Moreira Nº235 Bairro: Independência CEP 29306-320</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 7:00 às 18:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5219</p>
                    </div>
                </div>
            </div>
            <!--SEME-->

            <!--SEMESP-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMESP">
                            Esporte e Lazer
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMESP" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Esporte e Lazer - SEMESP</b></h4>
                        <p class="acessibilidade"><b>Competência:</b>
                            <br>I - Planejamento estratégico, coordenação e execução das políticas de esportes, lazer, entretenimento e na atuação preventiva na promoção da qualidade de vida da população, através de programas de esporte e lazer;
                            <br>II - Realização das atividades concernentes à promoção e ao desenvolvimento do esporte e do lazer da população em toda sua extensão e abrangência sociais;
                            <br>III - Atuação articulada com órgãos e entidades públicas, privadas e do terceiro setor para o desenvolvimento de programas, eventos e certames esportivos e de lazer voltados para as comunidades do município;
                            <br>IV - Gerenciamento de praças de esportes e demais equipamentos urbanos que se relacionem com a prática esportiva e execução de atividades de lazer;
                            <br>V - Promoção de atividades de lazer e de esportes voltadas para segmentos sociais da população, em parceria com outras organizações e com os órgãos municipais que atuariam na área social, tais como: saúde, educação e desenvolvimento social;
                            <br>VI - Execução dos serviços relativos à infraestrutura operacional e das instalações necessárias à viabilização e realização de eventos esportivos e de lazer;
                            <br>VII - Execução dos demais serviços públicos municipais que estejam compreendidos no seu âmbito de atuação.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Rua Agildo Romero, s/n - Bairro - São Geraldo - CEP: 29300170;</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 08:00 às 18:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5616</p>
                    </div>
                </div>
            </div>
            <!--SEMESP-->

            <!--SEMFA-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMFA">
                            Fazenda
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMFA" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Fazenda - SEMFA</b></h4>
                        <p class="acessibilidade"><b>Competência:</b>
                            <br>Art. 23. São atribuições básicas da Secretaria Municipal de Fazenda:
                            <br>I - Executar e acompanhar as políticas de tributação e finanças da Administração Municipal;
                            <br>II - Promover o lançamento, arrecadação, controle de créditos e fiscalização dos tributos e demais receitas municipais;
                            <br>III - Organizar, atualizar e manter o Cadastro Imobiliário Tributário e do Cadastro Mobiliário Tributário, promovendo a inscrição, o registro e a baixa de contribuintes;
                            <br>IV - Promover a inscrição, administração, notificação e cobrança das dívidas para com o  Município que não foram liquidadas nos prazos legais;
                            <br>V - Elaborar e executar o cronograma mensal de desembolso da Administração  Municipal;
                            <br>VI - Promover o recebimento, pagamento, guarda e movimentação dos recursos financeiros da Administração Municipal;
                            <br>VII - Articular com as equipes multidisciplinares, compostas de fiscais e de outros profissionais de várias Secretarias, na realização de trabalhos conjuntos e inspeções, que envolvam o exercício de diversas modalidades do poder de polícia administrativa;
                            <br>VIII - Acompanhar o desenvolvimento de sistemas de informação do contribuinte integrando os cadastros tributários;
                            <br>IX - Promover o acompanhamento e a execução do comportamento da despesa e propor medidas visando a racionalização de gastos;
                            <br>X - Estruturar a programação diária do fluxo de caixa, elaborar o calendário e programação financeira e submeter e ao Chefe do Poder Executivo Municipal para autorização e efetivação de pagamentos;
                            <br>XI - Apresentar ao Chefe do Poder Executivo Municipal semanalmente e mensalmente o resumo das movimentações das contas bancárias e aplicações financeiras, especificando entradas e saídas de receitas;
                            <br>XII - Elaborar, em coordenação com os demais órgãos da Administração Municipal, o Plano Plurianual, os Anteprojetos de Lei de Diretrizes Orçamentárias e de Orçamento Anual;
                            <br>XIII - Acompanhar as transferências constitucionais;
                            <br>XIV - Elaborar, executar e acompanhar a contabilidade municipal, promovendo os balanços orçamentários e financeiros, bem como, efetuar os registros contábeis diários;
                            <br>XV - Elaborar e executar as prestações de contas dos recursos municipais, a conferência e o encaminhamento aos órgãos oficiais competentes, respeitando obrigatoriamente os prazos legais;
                            <br>XVI - Desempenhar outras atribuições inerentes ao seu âmbito de atuação.
                            <br>
                            <br>Parágrafo único. A Secretaria Municipal de Fazenda compreende em sua estrutura as seguintes unidades administrativas:
                            <br>I - Subsecretaria Tributária;
                            <br>II - Subsecretaria Contábil;
                            <br>III - Subsecretaria Financeira;
                            <br>IV – Subsecretaria de Planejamento e Gestão Orçamentária;
                            <br>V - Gerência de Arrecadação Rural;
                            <br>VI - Gerência de Cobrança;
                            <br>VII - Gerência de Dívida Ativa;
                            <br>VIII - Gerência de Cadastro Imobiliário;
                            <br>IX - Gerência de Cadastro Mobiliário;
                            <br>X - Gerência de Fiscalização Tributária;
                            <br>XI - Gerência de Contencioso Fiscal;
                            <br>XII - Gerência de Serviços Bancários e Financeiros;
                            <br>XIII - Gerência de Obrigações Legais e Informações;
                            <br>XIV - Gerência de Liquidação;
                            <br>XV - Gerência de Empenho e Contabilização;
                            <br>XVI - Gerência de Programação e Elaboração do Orçamento;
                            <br>XVII - Gerência de Controle da Execução Orçamentária;
                            <br>XVIII - Gerência Administrativa;
                            <br>XIX – Coordenação de Lançamento;
                            <br>XX – Coordenação de Geoprocessamento;
                            <br>XXI – Coordenação de Atendimento;
                            <br>XXII – Coordenação de Atendimento Virtual;
                            <br>XXIII – Coordenação de Fiscalização;
                            <br>XXIV – Coordenação de Transferência de Receita;
                            <br>XXV – Coordenação de Renúncia Fiscal.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Rua 25 de Março, nº 8, Centro - Cachoeiro de Itapemirim</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 09:00 às 18:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5230</p>
                    </div>
                </div>
            </div>
            <!--SEMFA-->

            <!--GAP-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseGAP">
                            Gabinete do Prefeito
                        </a>
                    </h4>
                </div>
                <div id="collapseGAP" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Gabinete do Prefeito - GAP</b></h4>
                        <p class="acessibilidade"><b>Competência:</b> Conforme Decreto 27780/2018, segue atribuições da Secretaria de Gabinete
                        <br>Art. 5º Compete especialmente a Secretaria de Gabinete:
                        <br>I - Assessorar diretamente o Prefeito na sua representação civil, social e administrativa;
                        <br>II - Assessorar o Prefeito na adoção de medidas administrativas que propiciem a harmonização das iniciativas dos diferentes órgãos municipais;
                        <br>III - Prestar assessoramento ao Prefeito, encaminhando-lhe, para pronunciamento final, as matérias que lhe forem submetidas pelo Prefeito;
                        <br>IV - Elaborar e assessorar o expediente oficial do Prefeito, supervisionar a elaboração de sua agenda administrativa e social;
                        <br>V - Encaminhar para publicação os atos do Prefeito, articulando-se, para efeito de observância a prazos, requisitos e demais formalidades legais, com a Secretaria Municipal de Governo;
                        <br>VI - Apoiar o Prefeito no acompanhamento das ações das demais Secretarias, em sincronia com o plano de governo municipal;
                        <br>VII - Apoiar a Secretaria Municipal de Governo, no atendimento às solicitações e convocações da Câmara Municipal de Cachoeiro de Itapemirim;
                        <br>VIII - Cuidar da administração geral do prédio em que funciona o Gabinete do Prefeito, zelando pelos bens imóveis e móveis;
                        <br>IX - Supervisionar a elaboração de pronunciamentos, pareceres e informações da responsabilidade do Prefeito;
                        <br>X - Receber e atender com cordialidade a todos quantos o procurem para tratar, junto a si ou ao Prefeito, de assuntos de interesse do cidadão ou da comunidade, providenciando, quando for o caso, o seu encaminhamento às secretarias da área;
                        <br>XI - Supervisionar a organização do cerimonial das solenidades realizadas no âmbito da Administração Municipal que contem com a participação do Prefeito;
                        <br>XII - Receber e analisar sugestões ou reclamações do público em geral, preparando as respostas do Chefe do Poder Executivo sobre as matérias em questão;
                        <br>XIII - Proceder no âmbito do órgão à gestão e ao controle financeiro dos recursos orçamentários previstos na sua Unidade, bem como à gestão de pessoas e dos recursos materiais existentes, em consonância com as diretrizes e regulamentos emanados do Chefe do Poder Executivo;
                        <br>XIV - Efetuar a triagem e o encaminhamento dos documentos e correspondências endereçados ao Chefe do Poder Executivo;
                        <br>XV - Proferir despachos meramente interlocutórios ou de simples encaminhamento de processos;
                        <br>XVI - Informar as partes sobre os processos e assuntos sujeitos à apreciação do Prefeito;
                        <br>XVII - Orientar os serviços de recepção e atendimento ao público no âmbito da Secretaria;
                        <br>XVIII - Acompanhar o Chefe do Poder Executivo nas reuniões e ações externas desenvolvidas pela Secretaria;
                        <br>XIX - Efetuar a conferência dos processos e documentos a serem despachados ou referendados ao Prefeito, providenciando, antes de submetê-los à sua apreciação, a sua conveniente instrução;
                        <br>XX - Coordenar o controle de concessão de férias, de prêmio incentivo e demais licenças aos servidores;
                        <br>XXI - Garantir o funcionamento autônomo e dinâmico da Junta do Serviço Militar e do Tiro de Guerra do Município referente às ações sob responsabilidade;
                        <br>XXII - Exercer outras atividades correlatas ou que lhe sejam delegadas pelo Prefeito Municipal.
                        <br>    
                        <br>Art. 6º Compete especialmente a Coordenadoria Executiva de Eventos Oficiais:
                        <br>I - Planejar com o Prefeito Municipal, os Secretários Municipais e os titulares de igual nível hierárquico, os eventos de âmbito Municipal;
                        <br>II - Acompanhar na direção, orientação, coordenação, supervisão, e avaliação dos eventos promovidos pelo Município de Cachoeiro de Itapemirim;
                        <br>III - Organizar, planejar e executar as atividades de cerimonial do Gabinete do Prefeito;
                        <br>
                        <br>Art. 7º Compete especialmente a Chefia de Gabinete do Vice-Prefeito: (<a href="https://leis.cachoeiro.es.gov.br:8081/normas/images/leis/html/D278562018.html#a1" target="_blank" class="acessibilidade">Redação dada pelo Decreto nº 27856/2018</a>)
                        <br>I - Organizar os serviços de recepção e atendimento ao público no âmbito do Gabinete do Vice-Prefeito; (<a href="https://leis.cachoeiro.es.gov.br:8081/normas/images/leis/html/D278562018.html#a1" target="_blank" class="acessibilidade">Redação dada pelo Decreto nº 27856/2018</a>)
                        <br>II - Organizar as audiências do Vice-Prefeito; (<a href="https://leis.cachoeiro.es.gov.br:8081/normas/images/leis/html/D278562018.html#a1" target="_blank" class="acessibilidade">Redação dada pelo Decreto nº 27856/2018</a>)
                        <br>III - Despachar pessoalmente com o Vice-Prefeito todo o expediente dos serviços que dirige, bem como participar de reuniões coletivas, quando convocadas; (<a href="https://leis.cachoeiro.es.gov.br:8081/normas/images/leis/html/D278562018.html#a1" target="_blank" class="acessibilidade">Redação dada pelo Decreto nº 27856/2018</a>)
                        <br>IV - Assistir ao Vice-Prefeito em suas relações com o Secretariado e representantes de órgãos da Administração Municipal e com o público em geral; (<a href="https://leis.cachoeiro.es.gov.br:8081/normas/images/leis/html/D278562018.html#a1" target="_blank" class="acessibilidade">Redação dada pelo Decreto nº 27856/2018</a>)
                        <br>V - Prestar assistência ao Vice-Prefeito em suas relações político-administrativas com os munícipes; (<a href="https://leis.cachoeiro.es.gov.br:8081/normas/images/leis/html/D278562018.html#a1" target="_blank" class="acessibilidade">Redação dada pelo Decreto nº 27856/2018</a>)
                        <br>VI - Coordenar a gestão administrativa do Gabinete do Vice-Prefeito; (<a href="https://leis.cachoeiro.es.gov.br:8081/normas/images/leis/html/D278562018.html#a1" target="_blank" class="acessibilidade">Redação dada pelo Decreto nº 27856/2018</a>)
                        <br>VII - Exercer outras atribuições afins. (<a href="https://leis.cachoeiro.es.gov.br:8081/normas/images/leis/html/D278562018.html#a1" target="_blank" class="acessibilidade">Redação dada pelo Decreto nº 27856/2018</a>)
                        <br>
                        <br>Art. 8º Compete especialmente a Gerência de Cerimonial:
                        <br>I - Planejar e executar as atividades de cerimonial em eventos promovidos pelo Gabinete do Prefeito;
                        <br>II - Preparar a participação do Prefeito e do Vice-Prefeito em atividades de cerimonial e em eventos promovidos por outros órgãos e entidades;
                        <br>III - Assessorar ao Prefeito nas recepções e visitas oficiais que envolvam protocolo e procedimentos especiais;
                        <br>IV - Orientar o Prefeito, o Vice-Prefeito e outras autoridades municipais quanto à indumentária, atitudes e procedimentos protocolares especiais;
                        <br>V - Supervisionar e orientar as Secretarias quanto ao formato, convites, regras e encaminhamentos de aspectos formais e protocolares dos eventos;
                        <br>VI - Realizar atividades de Relações públicas junto aos órgãos e entidades públicas e privadas quanto a eventos e afins;
                        <br>VII - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.
                        <br>
                        <br>Art. 9º Compete especialmente a Gerência de Atendimento:
                        <br>I – Assessorar diretamente o Prefeito na sua representação civil, social e administrativa;
                        <br>II – Assessorar o Prefeito na adoção de medidas administrativas que propiciem a harmonização das iniciativas dos diferentes órgãos municipais;
                        <br>III - Manter atualizado o catálogo de autoridades municipais, estaduais, federais e entidades representativas da sociedade de interesse da Secretaria;
                        <br>IV - Exercer outras atribuições compatíveis com a natureza de suas funções e que lhe forem delegadas pelo Secretário.
                        <br>V - Divulgar, no âmbito da Secretaria, os atos do Executivo Municipal de interesse da área.
                        <br>
                        <br>Art. 10 Compete especialmente a Gerência Administrativa:
                        <br>I - Assistir ao Secretário de Gabinete no planejamento e orientação da execução das atividades administrativas e financeiras da Secretaria, provendo suporte à realização dos programas, projetos e atividades da Secretaria;
                        <br>II - Elaborar o Plano Plurianual - PPA e a proposta orçamentária de cada exercício financeiro, em conjunto com o Ordenador de Despesas, observados os limites das despesas e receita definidos pela Secretaria de Fazenda;
                        <br>III - Realizar o controle orçamentário e financeiro da Secretaria, através da apuração, análise e controle de custos;
                        <br>IV - Elaborar projeções da execução orçamentária ao longo do exercício financeiro para conhecimento e tomada de decisão do Ordenador de Despesas;
                        <br>V - Monitorar a utilização dos recursos da Secretaria com emissão periódica de relatórios;
                        <br>VI - Analisar e classificar a natureza econômica das despesas da Secretaria;
                        <br>VII - Indicar dotação orçamentária e elemento de despesa de acordo com a fonte de recursos;
                        <br>VIII - Solicitar remanejamentos, anulações parciais ou totais e suplementações orçamentárias de acordo com a disponibilidade financeira, dentro dos dispositivos legais;
                        <br>IX - Acompanhar e controlar a execução orçamentária da Secretaria (saldos de empenhos de contratos e convênios);
                        <br>X - Propor medidas de contenção de despesas ao Secretário;
                        <br>XI - Controlar a frequência dos servidores da Secretaria;
                        <br>XII - Efetuar no Sistema de Gestão de Pessoas, lançamentos específicos de verbas legais, tais como: produtividade, hora extra e demais gratificações;
                        <br>XIII - Efetuar a distribuição de vales-transportes, vale-alimentação e contracheques aos servidores da Secretaria;
                        <br>XIV - Controlar a lotação e movimentação dos servidores da Secretaria;
                        <br>XV - Providenciar as liquidações nos processos de pagamentos de compras no âmbito da Secretaria;
                        <br>XVI - Controlar as contas de telefone, água e luz, de imóveis, locados ou do próprio Município, para atender ao interesse da Secretaria e providenciar seu encaminhamento ao órgão competente para providências de pagamento;
                        <br>XVII - Preparar e acompanhar os processos de requisição de taxa de inscrição, diárias e passagens, e sua prestação de contas;
                        <br>XVIII - Despachar, receber e efetuar a distribuição da correspondência encaminhada à Secretaria;
                        <br>XIX - Supervisionar os serviços de reprografia da Secretaria;
                        <br>XX - Supervisionar os serviços de controle do transporte oficial a cargo da Secretaria;
                        <br>XXI - Supervisionar o controle de patrimônio da Secretaria;
                        <br>XXII - Controlar a movimentação dos materiais de consumo e permanente do almoxarifado da unidade gestora;
                        <br>XXIII - Controlar a transferência dos bens móveis, no âmbito da Secretaria;
                        <br>XXIV - Exercer outras atividades correlatas ou que lhe venham a ser atribuídas.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Praça Jerônimo Monteiro, 28 - Centro | CEP: 29300170</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 9:00 às 18:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5280</p>
                    </div>
                </div>
            </div>
            <!--GAP-->

            <!--SEMTRA-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMTRA">
                            Gestão de Transportes
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMTRA" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Gestão de Transportes - SEMTRA</b></h4>
                        <p class="acessibilidade"><b>Competência:</b></p>
                        <p class="acessibilidade"><b>Endereço:</b> </p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> </p>
                        <p class="acessibilidade"><b>Telefone:</b> </p>
                    </div>
                </div>
            </div>
            <!--SEMTRA-->

            <!--SEMGOV-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMGOV">
                        Governo
                    </a>
                    </h4>
                </div>
                <div id="collapseSEMGOV" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Governo - SEMGOV</b></h4>
                        <p class="acessibilidade"><b>Competência:</b> 
                            <br>Art. 20. São atribuições básicas da Secretaria Municipal de Governo:
                            <br>I - Promover, controlar e fazer cumprir os princípios da legalidade, moralidade, impessoalidade e economicidade na gestão municipal;
                            <br>II - Elaborar e coordenar o Planejamento Estratégico bem como a execução das Políticas, Programas e Ações da Administração Municipal;
                            <br>III - Coordenar a estratégia e a metodologia de gestão que acompanham os programas e projetos prioritários do Governo Municipal;
                            <br>IV - Acompanhar a produção de informações, dados e indicadores visando o controle e avaliação do desempenho da Administração Municipal;
                            <br>V - Promover a integração das áreas da Administração Municipal, tendo como instrumento o Planejamento Estratégico de Governo;
                            <br>VI - Acompanhar as ações desenvolvidas pelas diversas unidades da Administração Municipal, verificando o cumprimento das metas e objetivos estabelecidos no Planejamento Estratégico de Governo;
                            <br>VII – Participar da elaboração de mensagens, projetos de lei e decretos;
                            <br>VIII - Coordenar a metodologia de levantamento, análise e publicação de informações municipais;
                            <br>IX - Promover a execução da política de comunicação social da Administração Municipal;
                            <br>X - Propor normas e padrões criando uma identidade uniforme para o material de publicidade, campanhas e demais eventos promovidos pela Administração Municipal;
                            <br>XI - Realizar a divulgação das ações e dos programas de Governo, organizando a publicidade e a propaganda institucional, para a conscientização e o desenvolvimento da cidadania da população;
                            <br>XII - Definir os meios a serem utilizados na divulgação das ações municipais, integrando e organizando a utilização da mídia eletrônica e impressa;
                            <br>XIII - Realizar pesquisas de opinião pública visando o acompanhamento da imagem da Administração Municipal;
                            <br>XIV - Realizar atividades de jornalismo e de assessoria de imprensa no âmbito da Administração Municipal;
                            <br>XV - Promover as relações institucionais com o Legislativo Municipal, Estadual e Federal, e com os demais Municípios, desenvolvendo as articulações de natureza política que envolva os interesses da Administração Municipal;
                            <br>XVI – Promover parcerias com o setor privado visando fomentar iniciativas nas áreas econômica, social e acadêmica.
                            <br>XVII - Promover as articulações com as comunidades municipais organizadas, assim como as demais entidades representativas da sociedade;
                            <br>XVIII - Promover o acompanhamento e atendimento, mediante estudo de viabilidade, das solicitações do Poder Legislativo Municipal, referentes a indicações, pleitos e outros assuntos correlatos;
                            <br>XIX - Desempenhar outras atribuições inerentes ao seu âmbito de atuação</p>
                        <p class="acessibilidade"><b>Endereço:</b> Praça Bernardino Monteiro, 32, Centro - Palácio Bernardino Monteiro
                            CEP 29.300-170 - Cachoeiro de Itapemirim - ES</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> De segunda a sexta-feira - das 08:00 às 19:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5011</p>
                    </div>
                </div>
            </div>
            <!--SEMGOV-->

            <!--SEMMA-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMMA">
                        Meio Ambiente
                    </a>
                    </h4>
                </div>
                <div id="collapseSEMMA" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Meio Ambiente - SEMMA</b></h4>
                        <p class="acessibilidade"><b>Competência:</b> 
                            <br>- EMISSÃO DE LICENÇAS AMBIENTAIS - Procesos Julgados em 1ª Instância - Autoridade Julgadora 
                            <br>- Solicitação de supressão arbória em via pública - através do 156 
                            <br>- Doação de Mudas 
                            <br>- Doação de Kits Nascente - Projeto Nascente Viva 
                            <br>- Arborização urbana (plantio de mudas) 
                            <br>- Implantação de Pontos de Entrega Voluntária - PEV 
                            <br>- Ações Administrativas 
                            <br>- Participação e Apoio a Eventos 
                            <br>- Participação de Reuniões-Audiências no Ministério Público 
                            <br>- Assessoria Técnica (Consultores Internos) 
                            <br>- Ações de Fiscalização</p>
                        <p class="acessibilidade"><b>Endereço:</b> RUA AGRIPINO DE MORES Nº 60 CEP 29306-450</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 07:00 AS 18:00 PROTOCOLO DE 12:30 AS 16:30</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5326</p>
                    </div>
                </div>
            </div>
            <!--SEMMA-->

            <!--SEMMAC-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMMAC">
                            Modernização e Análise de Custos
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMMAC" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Modernização e Análise de Custos - SEMMAC</b></h4>
                        <p class="acessibilidade"><b>Competência:</b>
                            <br>I - Captar recursos para projetos do governo; Realizar análises dos contratos em geral, ajustando-os às necessidades da demanda e à disponibilidade orçamentária para o exercício, avaliando o custo/benefício; Desempenhar as atividades relativas à promoção e execução das políticas e diretrizes afetas à modernização institucional, no âmbito da Administração Municipal; 
                            <br>II - Articular as diversas iniciativas de projetos das áreas de racionalização e modernização da gestão com vistas à inovação, eficiência e eficácia na Administração Municipal; 
                            <br>III - Coordenar e executar diretrizes, planos e projetos direcionados às áreas de modernização, estrutura organizacional e custos; 
                            <br>IV - Realizar diagnósticos objetivando subsidiar ações inerentes às atribuições da pasta; 
                            <br>V - Analisar, de forma proativa e corretiva, a composição de custos para as contratações de bens e serviços pela Administração Municipal; 
                            <br>VI - Realizar análises dos contratos em geral, ajustando-os às necessidades da demanda e à disponibilidade orçamentária para o exercício, avaliando o custo/benefício; 
                            <br>VII - Subsidiar os demais órgãos da Administração Municipal quanto a projetos relativos a gestão dos recursos públicos; 
                            <br>VIII - Fomentar a constante revisão dos procedimentos técnicos e administrativos objetivando a eficiência dos serviços prestados; 
                            <br>IX - Propor a elaboração, atualização e divulgação de normas, rotinas e procedimentos a serem implementados pela Administração Municipal, com interação aos demais órgãos da Administração Municipal visando à uniformidade dos procedimentos; 
                            <br>X - Dimensionar o quadro funcional em consonância com as necessidades, objetivos e competência organizacional; 
                            <br>XI - Monitorar e controlar os gastos e metas públicas; 
                            <br>XII - Realizar análise pormenorizada das despesas das demais secretarias municipais, buscando identificar oportunidades de redução de custos e otimização dos recursos disponíveis; 
                            <br>XIII - Prestar, de forma sistêmica, orientação técnica e administrativa às demais secretarias municipais; 
                            <br>XIV - Elaborar referências de estimativas de custos de serviços terceirizados e de aquisição de materiais de consumo e permanentes; 
                            <br>XV - Estudar e analisar o funcionamento e a organização dos serviços da Administração Municipal, promovendo a execução de medidas para simplificação, racionalização e aprimoramento de suas atividades, bem como identificando áreas que necessitem de modernização administrativa; 
                            <br>XVI - Coordenar o processo de desconcentração administrativa, visando a otimização dos recursos públicos; 
                            <br>XVII - Promover a identificação de fontes de recursos e atividades para a captação de recursos para investimento e financiamento de programas e projetos municipais, articulando parcerias e acompanhando a sua execução, assim como a organização de relatórios de evolução e desenvolvimento para prestação de contas junto às suas fontes; 
                            <br>XVIII - Desempenhar outras atribuições inerentes ao seu âmbito de atuação. </p>
                        <p class="acessibilidade"><b>Endereço:</b> Palácio Bernardino Monteiro 28 - Praça Jerônimo Monteiro</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 09:00 às 18:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5315</p>
                    </div>
                </div>
            </div>
            <!--SEMMAC-->

            <!--SEMO-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMO">
                            Obras
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMO" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Obras - SEMO</b></h4>
                        <p class="acessibilidade"><b>Competência:</b>
                            <br>Art. 36. São atribuições básicas da Secretaria Municipal de Obras:
                            <br>I - Realizar projetos técnicos, orçamentários, a gestão contratual e o acompanhamento físico-financeiro das obras públicas de responsabilidade municipal, a ela delegadas;
                            <br>II - Estruturar e gerenciar as obras relativas à infraestrutura urbana do município;
                            <br>III - Produzir e beneficiar materiais básicos de utilização em manutenção urbana;
                            <br>IV - Realizar manutenção, reparos e obras de pequeno porte, relativos ao sistema viário, drenagem e equipamentos públicos municipais;
                            <br>V - Controlar e fiscalizar as obras públicas terceirizadas pela Administração Municipal;
                            <br>VI - Promover a abertura de vias e logradouros;
                            <br>VII - Desempenhar outras atribuições inerentes ao seu âmbito de atuação.
                            <br>
                            <br>Parágrafo único. A Secretaria Municipal de Obras compreende em sua estrutura as seguintes unidades administrativas:
                            <br>
                            <br>I - Subsecretaria de Projetos e Fiscalização;
                            <br>Art. xxx A Subsecretaria de Projetos e Fiscalização tem a missão de fiscalizar e coordenar a elaboração de projetos que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Subsecretaria de Projetos e Fiscalização:
                            <br>a) Colaborar com o titular da Secretaria ou de órgão para o qual tenha sido designado, na direção, orientação, coordenação, supervisão, e avaliação e controle do órgão e de suas unidades, exercendo as atribuições que lhe forem solicitadas ou formalmente delegadas;
                            <br>b) Substituir o titular do órgão em seus impedimentos, quando indicado pelo titular da pasta;
                            <br>c) Auxiliar e assessorar o Secretário Municipal no exercício de suas funções, e ao Chefe do Executivo Municipal quando lhe for delegado;
                            <br>d) Orientar, controlar e fazer cumprir a política estabelecida, no que se refere ao planejamento, orientação e definição das atividades desenvolvidas para consecução dos programas e projetos da área sob sua responsabilidade;
                            <br>e) Acompanhar a execução e coordenar a aplicação do planejamento estratégico estabelecido para sua área;
                            <br>f) Avaliar o desempenho e resultados dos programas, projetos e atividades empreendidos sob sua responsabilidade;
                            <br>g) Apresentar, periodicamente, relatório circunstanciado e crítico sobre as ações empreendidas, seu monitoramento, desenvolvimento e aperfeiçoamento;
                            <br>h) Auxiliar na implantação de novos métodos de trabalho;
                            <br>i) Exercer outras funções técnicas ou administrativas que lhe forem delegadas pelo titular do órgão;
                            <br>j) Coordenar as atividades de planejamento, organização e gerenciamento, relacionadas às Coordenadorias Executivas constante da estrutura organizacional de sua pasta;
                            <br>k) Acompanhar à execução de obras distribuídas no Município;
                            <br>l) Coordenar e acompanhar a elaboração de projetos;
                            <br>m) Vistoriar e fiscalizar a construção das obras;
                            <br>n) Desenvolver estudos de viabilidade;
                            <br>e) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>o) Executar outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>II - Subsecretaria de Obras e Manutenção de Vias;
                            <br>Art. xxx A Subsecretaria de Obras e Manutenção de Vias tem a missão de acompanhar as obras diretas e a manutenção de todas as vias municipais que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Subsecretaria de Obras e Manutenção de Vias:
                            <br>a) Colaborar com o titular da Secretaria ou de órgão para o qual tenha sido designado, na direção, orientação, coordenação, supervisão, e avaliação e controle do órgão e de suas unidades, exercendo as atribuições que lhe forem solicitadas ou formalmente delegadas;
                            <br>b) Substituir o titular do órgão em seus impedimentos, quando indicado pelo titular da pasta;
                            <br>c) Auxiliar e assessorar o Secretário Municipal no exercício de suas funções, e ao Chefe do Executivo Municipal quando lhe for delegado;
                            <br>d) Orientar, controlar e fazer cumprir a política estabelecida, no que se refere ao planejamento, orientação e definição das atividades desenvolvidas para consecução dos programas e projetos da área sob sua responsabilidade;
                            <br>e) Acompanhar a execução e coordenar a aplicação do planejamento estratégico estabelecido para sua área;
                            <br>f) Avaliar o desempenho e resultados dos programas, projetos e atividades empreendidos sob sua responsabilidade;
                            <br>g) Apresentar, periodicamente, relatório circunstanciado e crítico sobre as ações empreendidas, seu monitoramento, desenvolvimento e aperfeiçoamento;
                            <br>h) Auxiliar na implantação de novos métodos de trabalho;
                            <br>i) Exercer outras funções técnicas ou administrativas que lhe forem delegadas pelo titular do órgão;
                            <br>j) Coordenar as atividades de planejamento, organização e gerenciamento, relacionadas às Coordenadorias Executivas constante da estrutura organizacional de sua pasta;
                            <br>k) Acompanhar a execução de todas as obras diretas executadas pelo Município;
                            <br>l) Controlar a saída, o emprego e o recebimento de todo material solicitado nas obras;
                            <br>m) Zelar pela manutenção de todas as vias do Município;
                            <br>n) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>o) Responsabilizar-se pela liberação de materiais solicitados pelos gerentes nas obras;
                            <br>p) Executar outras atividades correlatas ou que lhe venham a ser atribuídas
                            <br>
                            <br>III - Gerência de Vistoria de Obras;
                            <br>Art. xxx A Gerência de Vistoria de Obras tem a missão de acompanhar às obras em execução que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Gerência de Vistoria de Obras:
                            <br>a) Assistir aos Secretários e equivalentes e Subsecretários em questões relativas às rotinas de trabalho da Gerência;
                            <br>b) Subsidiar as instâncias superiores conforme lhe seja solicitado, no que concerne ao planejamento e ao processo decisório relativo às políticas, programas, projetos e atividades de sua área de competência;
                            <br>c) Solucionar problemas surgidos no âmbito de sua Gerência, submetendo os de maior relevância e peculiaridade à apreciação superior;
                            <br>d) Elaborar relatórios gerenciais, relacionando as atividades e principais ocorrências observadas na Gerência, apresentando alternativas de soluções, objetivando suprir a administração superior, com elementos necessários à tomada de decisões;
                            <br>e) Participar de reuniões com os Secretários e equivalentes, Subsecretários, Assessores e Assistentes a fim de intercambiar informações, apresentando sugestões, metas de trabalho e/ou assuntos inerentes à sua área de atuação;
                            <br>f) Providenciar a organização e manutenção atualizada dos registros das atividades da unidade que dirige;
                            <br>g) Registrar e fornecer informações e subsídios para a prestação de contas dos convênios que executam;
                            <br>h) Acompanhar as etapas de execução das obras;
                            <br>i) Avaliar a qualidade dos serviços executados;
                            <br>j) Emitir relatórios periódicos sobre o andamento das obras;
                            <br>k) Responsabilizar-se pelo uso correto de veículos que atendem a secretaria;
                            <br>l) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>m) Executar outras atividades correlatas ou que lhe venham a ser atribuídas
                            <br>
                            <br>IV - Gerência de Projetos;
                            <br>Art. xxx A Gerência de Projetos tem a missão de estudar a elaboração/execução de projetos que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Gerência de Projetos:
                            <br>a) Gerenciar a realização da execução de projetos de arquitetura e engenharia das obras públicas de qualquer natureza, sejam viárias, edifícios e demais equipamentos urbanos, inclusive para reformas, necessários à melhoria da prestação de serviços e da qualidade de vida da população do Município;
                            <br>b) Providenciar a elaboração de projetos executivos de engenharia e arquitetura que sejam necessários ao programa de obras públicas do Município;
                            <br>c) Elaborar os projetos complementares necessários à execução da obra compreendendo projeto estrutural, hidro-sanitário, elétrico, telefônico, acústico, incêndios, assim o de rede de comunicação de dados e outros;
                            <br>d) Gerenciar a realização da execução de projetos específicos e/ou complementares que sejam necessários para a execução da obra de acordo com a sua natureza e finalidades;
                            <br>e) Promover os estudos relativos ao impacto dos fatores condicionantes do desenvolvimento e execução de obras públicas de natureza geológica, geotécnica e ambiental;
                            <br>f) Realizar os projetos em estrita observância às normas contidas nos Planos Diretores e Códigos Municipais aplicáveis à natureza e características do projeto e, em especial, à legislação ambiental, com vistas à promoção do desenvolvimento sustentável do Município;
                            <br>g) Proceder ao detalhamento das especificações técnicas dos materiais necessários à execução das obras, nos termos dos projetos previamente elaborados;
                            <br>h) Acompanhar a execução das obras para verificar a compatibilidade entre a especificação técnica aprovada e o material que está sendo utilizado, preparando relatório sobre os resultados encontrados;
                            <br>i) Acompanhar, juntamente com as demais gerências da Secretaria, o desenvolvimento da execução de obras de execução indireta, quando contratadas com terceiros;
                            <br>j) Manter e atualizar cadastro e arquivos de plantas de obras públicas Municipais;
                            <br>k) Efetuar o acompanhamento e a avaliação dos projetos de engenharia e arquitetura, verificando a sua funcionalidade, qualidade e integração sistêmica;
                            <br>l) Acompanhar e assessorar a execução das obras, promovendo ajustes nos projetos que forem necessários;
                            <br>m) Promover o controle técnico e de qualidade das obras executadas;
                            <br>n) Providenciar a elaboração de estudos, levantamentos e projetos complementares que forem necessários à execução das atividades da Gerência;
                            <br>o) Cumprir outras atividades que sejam oportunas, pertinentes e adequadas à elaboração de projetos de arquitetura e engenharia de obras do Município;
                            <br>p) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>q) Executar outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>V - Gerência de Orçamentos;
                            <br>Art. xxx A Gerência de Orçamentos tem a missão de confeccionar planilhas de custos após a elaboração dos projetos que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Gerência de Orçamentos:
                            <br>a) Gerenciar a elaboração dos orçamentos das obras a serem realizadas pela secretaria;
                            <br>b) Preparar tabelas de composição de preços unitários;
                            <br>c) Coletar e analisar preços de materiais de construção;
                            <br>d) Elaborar estimativas de custos por demanda das áreas da Secretaria;
                            <br>e) Elaborar cronograma físico-financeiro-orçamentário dos projetos executados;
                            <br>f) Prestar assessoria à Comissão Municipal de Licitações na análise de especificações técnicas de materiais, quando necessário;
                            <br>g) Cumprir outras atividades que sejam oportunas, pertinentes e adequadas à definição de orçamentos e especificações técnicas de obras;
                            <br>h) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>i) Executar outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>VI - Gerência de Contratos e Convênios;
                            <br>Art. xxx A Gerência de Contratos e Convênios tem a missão de elaborar contratos de obras que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Gerência de Contratos e Convênios:
                            <br>a) Assistir aos Secretários e equivalentes e Subsecretários em questões relativas às rotinas de trabalho da Gerência;
                            <br>b) Subsidiar as instâncias superiores conforme lhe seja solicitado, no que concerne ao planejamento e ao processo decisório relativo às políticas, programas, projetos e atividades de sua área de competência;
                            <br>c) Solucionar problemas surgidos no âmbito de sua Gerência, submetendo os de maior relevância e peculiaridade à apreciação superior;
                            <br>d) Elaborar relatórios gerenciais, relacionando as atividades e principais ocorrências observadas na Gerência, apresentando alternativas de soluções, objetivando suprir a administração superior, com elementos necessários à tomada de decisões;
                            <br>e) Participar de reuniões com os Secretários e equivalentes, Subsecretários, Assessores e Assistentes a fim de intercambiar informações, apresentando sugestões, metas de trabalho e/ou assuntos inerentes à sua área de atuação;
                            <br>f) Providenciar a organização e manutenção atualizada dos registros das atividades da unidade que dirige;
                            <br>g) Registrar e fornecer informações e subsídios para a prestação de contas dos convênios que executam;
                            <br>h) Instruir processos licitatórios;
                            <br>i) Confeccionar contratos de obras indiretas;
                            <br>j) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>k) Executar outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>VII - Gerência de Produção e Insumos;
                            <br>Art. xxx A Gerência de Produção e Insumos tem a missão de zelar pelo abastecimento com materiais nas obras que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Gerência de Produção e Insumos:
                            <br>a) Gerenciar a produção de materiais básicos e essenciais que são necessários à execução, manutenção ou conservação de obras, equipamentos urbanos, prédios públicos Municipais e outros próprios do Município;
                            <br>b) Executar a extração de pedras e de areia para utilização na execução, manutenção e conservação de obras, prédios, equipamentos urbanos, prédios públicos e demais próprios Municipais;
                            <br>c) Gerenciar as atividades de fabricação de manilhas, paralelepípedos, e outros materiais que estejam no escopo de atuação, especialização e habilitação da Gerência;
                            <br>d) Cumprir outras atividades que sejam oportunas, pertinentes e adequadas à produção de materiais básicos para uso em obras públicas;
                            <br>e) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>f) Responsabilizar-se pela liberação de materiais solicitados pelos gerentes nas obras;
                            <br>g) Executar outras atividades correlatas ou que lhe venham a ser atribuídas;
                            <br>
                            <br>VIII - Gerência de Obras Viárias;
                            <br>Art. xxx A Gerência de Obras Viárias tem a missão de gerenciar todas as necessidades de obras de vias que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Gerência de Obras Viárias:
                            <br>a) Gerenciar a realização das obras públicas e viárias, e serviços de engenharia e arquitetura programados, nos exatos termos dos projetos, dos orçamentos e dos cronogramas físico-financeiros aprovados, cuidando do cumprimento das normas técnicas aplicáveis a cada situação e a cada caso;
                            <br>b) Acompanhar, juntamente com as demais gerências da Secretaria, o desenvolvimento da execução de obras de execução indireta, quando contratadas com terceiros;
                            <br>c) Promover o controle técnico e de qualidade das obras executadas;
                            <br>d) Promover o recebimento, a guarda e a conservação dos materiais e equipamentos a serem utilizados na execução das obras e sua respectiva distribuição e aplicação no decorrer do seu desenvolvimento;
                            <br>e) Elaborar relatórios periódicos das obras em andamento, bem como o relatório final quando da sua conclusão;
                            <br>f) Providenciar a elaboração de estudos, levantamentos e projetos complementares que forem necessários à execução das atividades da Gerência;
                            <br>g) Realizar o acompanhamento, a vistoria e a fiscalização das obras de infra-estrutura executadas por terceiros;
                            <br>h) Cumprir outras atividades que sejam oportunas, pertinentes e adequadas à execução de obras públicas do Município;
                            <br>i) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>j) Responsabilizar-se pelo recebimento e correta destinação de todo material solicitado nas obras;
                            <br>k) Executar outras atividades correlatas ou que lhe venham a ser atribuídas;
                            <br>
                            <br>IX - Gerência Operacional;
                            <br>Art. xxx A Gerência Operacional tem a missão de implementar planos de ações para as equipes que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Gerência Operacional:
                            <br>a) Gerenciar as atividades de planejamento a serem realizadas compreendendo a elaboração dos planos periódicos de trabalho, desdobrando-os em programas, projetos e ações, mediante a definição de objetivos, metas, resultados a serem alcançados e indicadores de resultados, que possam atender às finalidades da Política Pública Municipal voltada para as obras públicas viárias do Município;
                            <br>b) Operacionalizar a política, as diretrizes e os programas voltados para a área de obras públicas viárias no Município;
                            <br>c) Planejar, organizar, coordenar, executar, acompanhar e controlar, em conjunto com as demais gerências, os serviços voltados para realização de obras viárias no âmbito do Município;
                            <br>d) Cumprir outras atividades que sejam oportunas, pertinentes e adequadas à execução das atividades operacionais da prestação de serviços públicos urbanos e à melhoria da qualidade de vida da população;
                            <br>e) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>f) Responsabilizar-se pelo recebimento e correta destinação de todo material solicitado nas obras;
                            <br>g) Executar outras atividades correlatas ou que lhe venham a ser atribuídas;
                            <br>
                            <br>X - Gerência de Drenagem;
                            <br>Art. xxx A Gerência de Drenagem tem a missão de zelar pelas obras de infraestrutura do Município que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Gerência de Drenagem:
                            <br>a) Gerenciar a realização das atividades necessárias à recuperação da infra-estrutura de drenagem do Município de modo a garantir a sua utilização com segurança e conforto pela população;
                            <br>b) Cuidar da manutenção e da recuperação específica da infra-estrutura de drenagem de logradouros públicos (ruas, avenidas, praças, becos, pontes e assemelhados);
                            <br>c) Realizar operações de urgência e/ou emergência visando à recuperação imediata de infra-estrutura de drenagem urbana;
                            <br>d) Realizar operações programadas de recuperação de infra-estrutura de drenagem urbana abrangendo regiões, bairros ou logradouros específicos;
                            <br>e) Organizar equipes extraordinárias de recuperação de infra-estrutura de drenagem urbana em caso de calamidade pública ou acontecimentos inesperados que ocasionem deterioração ou impedimento da sua utilização;
                            <br>f) Cumprir outras atividades que sejam oportunas, pertinentes e adequadas à recuperação de drenagem do Município;
                            <br>g) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>h) Responsabilizar-se pelo recebimento e correta destinação de todo material solicitado nas obras;
                            <br>i) Executar outras atividades correlatas ou que lhe venham a ser atribuídas;
                            <br>
                            <br>XI - Gerência de Manutenção Viária;
                            <br>Art. xxx A Gerência de Manutenção Viária tem a missão de gerenciar todas as necessidades de manutenção de vias que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Gerência de Manutenção Viária:
                            <br>a) Executar o cumprimento do programa de obras viárias naquilo que se refere à construção, pavimentação, drenagem e demais serviços de arquitetura e engenharia que sejam necessários ao cumprimento dos objetivos pretendidos, nos termos dos projetos, dos orçamentos e dos cronogramas físico-financeiros aprovados, cuidando do cumprimento das normas técnicas aplicáveis a cada situação e a cada caso;
                            <br>b) Acompanhar, vistoriar e realizar manutenção dos pontos de ônibus dentro do perímetro urbano do Município;
                            <br>c) Acompanhar, vistoriar e fiscalizar a observância dos dispositivos contratuais de obras viárias executadas por terceiros quanto às especificações técnicas, prazos, pagamentos e demais obrigações constantes do cronograma físico-financeiro;
                            <br>d) Acompanhar, juntamente com as demais gerências da Secretaria, o desenvolvimento do cumprimento de obras de execução indireta, quando contratadas com terceiros;
                            <br>e) Promover o controle técnico e de qualidade das obras executadas;
                            <br>f) Promover o recebimento, a guarda e a conservação dos materiais e equipamentos a serem utilizados na execução das obras e sua respectiva distribuição e aplicação no decorrer do seu desenvolvimento;
                            <br>g) Elaborar relatórios periódicos das obras em andamento, bem como o relatório final quando da sua conclusão;
                            <br>h) Providenciar a elaboração de estudos, levantamentos e projetos complementares que forem necessários à execução das atividades da Gerência;
                            <br>i) Realizar o acompanhamento, vistoria e fiscalização das obras de infra-estrutura executadas por terceiros;
                            <br>j) Cumprir outras atividades que sejam oportunas, pertinentes e adequadas à execução de obras viárias do Município;
                            <br>k) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>l) Responsabilizar-se pelo recebimento e correta destinação de todo material solicitado nas obras;
                            <br>m) Executar outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>XII - Gerência de Manutenção Urbana;
                            <br>Art. xxx A Gerência de Manutenção Urbana tem a missão de ser responsável por manutenções nas vias urbanas que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Gerência de Manutenção Urbana:
                            <br>a) Executar o cumprimento do programa de obras viárias naquilo que se refere à construção, pavimentação, drenagem e demais serviços de arquitetura e engenharia que sejam necessários ao cumprimento dos objetivos pretendidos, nos termos dos projetos, dos orçamentos e dos cronogramas físico-financeiros aprovados, cuidando do cumprimento das normas técnicas aplicáveis a cada situação e a cada caso;
                            <br>b) Acompanhar, vistoriar e fiscalizar a observância dos dispositivos contratuais de obras de manutenção das vias urbanas, que exijam o uso de máquinas pesadas, executadas por terceiros quanto às especificações técnicas, prazos, pagamentos e demais obrigações constantes do cronograma físico-financeiro;
                            <br>c) Acompanhar, juntamente com as demais gerências da Secretaria, o desenvolvimento do cumprimento de obras de execução indireta, quando contratadas com terceiros;
                            <br>d) Promover o controle técnico e de qualidade das obras de manutenção das vias urbanas executadas;
                            <br>e) Promover o recebimento, a guarda e a conservação dos materiais e equipamentos a serem utilizados na execução das obras de manutenção das vias urbanas e sua respectiva distribuição e aplicação no decorrer do seu desenvolvimento;
                            <br>f) Elaborar relatórios periódicos das obras em andamento, bem como o relatório final quando da sua conclusão;
                            <br>g) Realizar o acompanhamento, vistoria e fiscalização das obras de infra-estrutura executadas por terceiros;
                            <br>h) Cumprir outras atividades que sejam oportunas, pertinentes e adequadas à execução de obras de manutenção das vias urbanas do Município;
                            <br>k) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>l) Responsabilizar-se pelo recebimento e correta destinação de todo material solicitado nas obras;
                            <br>i) Executar outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>
                            <br>XIII - Gerência Administrativa.
                            <br>Art. xxx A Gerência Administrativa tem a missão de cumprir as atividades administrativas internas que lhe são subordinadas.
                            <br>Parágrafo único. Compete especialmente a Gerência Administrativa:
                            <br>a) Realizar as atividades administrativas na resolução de demandas específicas dos trabalhos administrativos da Secretaria Municipal de Obras, dando suporte ao Secretário Municipal, aos Subsecretários e aos demais Gerentes da SEMO, em conjunto com a sua equipe de trabalho;
                            <br>b) Analisar ações e resultados, emitindo pareceres e respaldando ações em apoio aos Subsecretários da SEMO;
                            <br>c) Administrar os trabalhos, delegando funções aos servidores lotados na Secretaria Municipal para o perfeito cumprimento das atividades administrativas internas do órgão;
                            <br>d) Acompanhar a vida funcional dos servidores lotados na Secretaria Municipal, mantendo atualizado o quadro de pessoal do órgão;
                            <br>e) Administrar os trabalhos indispensáveis à manutenção, ao reparo, à conservação e limpeza do patrimônio mobiliário e imobiliário da SEMO, procedendo a levantamentos e vistorias necessárias e, solicitando materiais e serviços;
                            <br>f) Administrar os materiais de consumo, compreendendo materiais de escritório, de informática, de limpeza e outros necessários ao funcionamento do órgão;
                            <br>g) Administrar os valores de adiantamento da Secretaria Municipal de Obras;
                            <br>h) Executar serviços de controle de banco de dados e arquivo eletrônico de documentos;
                            <br>i) Administrar a tramitação de processos e documentos no âmbito da SEMO, inclusive o arquivo de documentos internos;
                            <br>j) Divulgar no âmbito da SEMO, os atos do Executivo Municipal de interesse da área;
                            <br>k) Subsidiar as instâncias superiores conforme lhe seja solicitado, no que concerne à prestação dos serviços realizados pela sua equipe de trabalho;
                            <br>l) Zelar e fazer zelar pelos demais servidores, pelo patrimônio mobiliário e imobiliário da SEMO, em conformidade com a legislação, normas, padrões, regras e procedimentos aprovados;
                            <br>m) Executar outras atividades correlatas ou que lhe venham a ser atribuídas.
                            <br>n) Responsabilizar-se pelo uso correto, ou seja, para fins específicos de suas funções, de veículos, equipamentos, máquinas, ferramentas e outros que atendem a secretaria;
                            <br>o) Executar outras atividades correlatas ou que lhe venham a ser atribuídas.
                            </p>
                        <p class="acessibilidade"><b>Endereço:</b> Rua Agildo Romero, nº 467 - Bairro São Geraldo - CEP 29.314-679</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 07:00 às 17:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5222</p>
                    </div>
                </div>
            </div>
            <!--SEMO-->

            <!--PGM-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapsePGM">
                            Procuradoria-Geral do Município
                        </a>
                    </h4>
                </div>
                <div id="collapsePGM" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Procuradoria-Geral do Município - PGM</b></h4>
                        <p class="acessibilidade"><b>Competência:</b>
                        De acordo com o previsto no art. 19, e seus incisos, da Lei Municipal nº 7.516, de 04 de dezembro de 2017, são atribuições da Procuradoria-Geral do Município representar e defender o Município em qualquer instância judicial e extrajudicial as quais for autor, réu, assistente, ou por qualquer forma, interessado, usando de todos os recursos legalmente previstos; 
                        <br>- Prestar assessoramento e consultoria jurídica a Administração Pública Municipal, através de estudos e pareceres; 
                        <br>- Promover a cobrança de dívidas do Município pelas vias judiciais; emitir pareceres acerca de regulamentos, projetos de leis, vetos, decretos e outros similares, quanto a natureza jurídica da questão, de acordo com o interesse da Administração Pública e por solicitação do Chefe do Executivo Municipal e demais Secretários Municipais; 
                        <br>- Prestar assessoramento a Administração Pública Municipal nos atos executivos relativos à desapropriação, alienação e aquisição de imóveis pelo poder público; 
                        <br>- Atuar na defesa dos interesses da Administração Pública Municipal perante o Tribunal de Contas do Estado do Espírito Santo, em plenário ou fora dele, inclusive quando da apreciação das contas municipais, promovendo e requerendo o que for de direito; 
                        <br>- Levar ao conhecimento do Chefe do Executivo Municipal, para fins de direito, qualquer dolo, fraude, concussão, simulação, peculato ou outras irregularidades de que venha a ter ciência; 
                        <br>- Manter atualizada as legislações municipal, estadual e federal, bem como jurisprudência de interesse da Administração Municipal; 
                        <br>- Emitir parecer em todos os procedimentos administrativos cujo objeto seja sobre licitações, em especial, procedendo a análise de minutas de editais, contratos e similares; 
                        <br>- Organizar e executar atividades relativas à defesa do consumidor, seja na prestação de serviços de atendimento e orientação, como também na fiscalização do cumprimento dos direitos do cidadão em suas relações de consumo de bens e serviços, podendo, inclusive, aplicar o poder de polícia administrativa quando necessário; 
                        <br>- E, por fim, desempenhar outras atribuições inerentes ao seu âmbitos de atuação.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Praça Jerônimo Monteiro, nº 67 - Ed. Eletromax, 2º andar, salas 207 e 208 - Bairro Centro, Cachoeiro de Itapemirim/ES, CEP 29.300-170</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 09:00 às 18:00.</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5225</p>
                    </div>
                </div>
            </div>
            <!--PGM-->

            <!--SEMUS-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMUS">
                            Saúde
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMUS" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Saúde - SEMUS</b></h4>
                        <p class="acessibilidade"><b>Competência:</b>
                            <br>Art. 27. São atribuições básicas da Secretaria Municipal de Saúde:
                            <br>I - Atuar sempre em consonância com as diretrizes e os princípios do Sistema Único de Saúde;
                            <br>II - Implementar diretrizes e promover o desenvolvimento da política de saúde, por meio da formulação e execução do Plano Municipal de Saúde e demais instrumentos de planejamento;
                            <br>III - Realizar a gestão da saúde do município de forma que venha possibilitar o acesso  igualitário e integral à população, de modo contínuo, em consonância com o princípio da eqüidade;
                            <br>IV - Efetivar ações de integralidade, a saber: integração de ações programáticas e demanda espontânea, articulação entre as ações de promoção à saúde, prevenção de agravos, vigilância à saúde, tratamento e reabilitação, trabalhando de forma interdisciplinar e em equipe, bem como a coordenação do cuidado na rede de serviços;
                            <br>V - Prestar o serviço de saúde que esteja no âmbito do Sistema Único de Saúde sob a responsabilidade da Administração Municipal, nos limites pactuados com os órgãos Federais e Estaduais, compreendendo a atenção básica, assistência em saúde e vigilância em saúde;
                            <br>VI – Aplicar os programas complementares de saúde pactuados com os órgãos federais e estaduais, assim como a aplicação de programas específicos da Administração Municipal;
                            <br>VII – Implementar ações intersetoriais de promoção da saúde, em articulação com outras secretarias municipais;
                            <br>VIII - Promover a vigilância à saúde, através da implementação de ações e programas de vigilância ambiental, epidemiológica e sanitária, atuando na fiscalização e controle de serviços, indústrias e comércios de interesse à saúde, bem como exercer o poder de polícia administrativa, quando couber, e nos limites de atuação e responsabilidades pactuadas com os órgãos federais e municipais;
                            <br>IX - Aplicar o controle, monitoramento, avaliação e a auditoria das ações e serviços de saúde sob gestão municipal;
                            <br>X - Administrar os serviços relativos à saúde pública municipal nos termos e nas condições pactuadas na municipalização da saúde;
                            <br>XI - Realizar as atividades de administração de recursos humanos e educação permanente do pessoal da saúde pública municipal, em conjunto com a Secretaria Municipal de Administração;
                            <br>XII - Promover a capacitação e treinamento aos profissionais de saúde para qualificar a atenção à saúde da população, em conjunto com a Secretaria Municipal de Administração;
                            <br>XIII - Realizar avaliação e acompanhamento sistemático dos resultados alcançados, como parte do processo de planejamento e gestão do sistema municipal de saúde;
                            <br>XIV - Desenvolver a gestão da saúde de forma transparente, promovendo a divulgação dos resultados alcançados; num processo contínuo de comunicação em saúde;
                            <br>XV - Estimular a participação popular e o controle social, adotando atitudes proativas de integração entre a secretaria e a sociedade, por meio do Conselho Municipal de Saúde;
                            <br>XVI - Desempenhar outras atribuições inerentes ao seu âmbito de atuação.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Rua Fernando de Abreu 99 - Bairro Ferroviários, Cachoeiro de Itapemirim, CEP 29.308-050</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 07:00 às 17:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5252</p>
                    </div>
                </div>
            </div>
            <!--SEMUS-->

            <!--SEMSET-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMSET">
                            Segurança e Trânsito
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMSET" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Segurança e Trânsito - SEMSET</b></h4>
                        <p class="acessibilidade"><b>Competência:</b> 
                            Está descrita na LEI 7516/2017, 04/12/2017, Art. 32:
                            <br>Art. 32. São atribuições básicas da Secretaria Municipal de Segurança e Trânsito: 
                            <br>I - Promover, em conjunto com outros órgãos públicos municipais, a implementação de políticas públicas de prevenção a violência e ações de promoção da segurança pública com ênfase nas políticas sociais e na promoção da cidadania e dos direitos humanos; 
                            <br>II - Planejar, coordenar e gerenciar as atividades da guarda civil municipal, em conformidade com a Lei Federal n° 13.022/14; 
                            <br>III - Estabelecer as políticas, diretrizes e programas de segurança, de trânsito, a proteção dos bens, serviços e instalações municipais na forma da Lei; 
                            <br>IV - Promover a concepção de bases de dados que forneçam informações para o planejamento de trânsito e para suporte à análise, à previsão e ao monitoramento do trânsito em geral; 
                            <br>V - Estabelecer, em conjunto com outros órgãos públicos municipais, diretrizes, objetivando o controle e a fiscalização do trânsito, firmando convênio com os órgãos de segurança estadual e federal, quando necessário; 
                            <br>VI - Estabelecer parcerias com os órgãos de segurança estadual e federal, visando o planejamento de ações integradas no Município; 
                            <br>VII - Contribuir para a prevenção e diminuição da violência e da criminalidade, promovendo a mediação de conflitos e o respeito aos direitos fundamentais de cidadania; 
                            <br>VIII - Planejar, fixar diretrizes, coordenar e executar a fiscalização de trânsito nos termos da legislação em vigor; 
                            <br>IX - Assegurar o funcionamento dos Conselhos Municipais de Segurança e Trânsito; 
                            <br>X - Administrar e coordenar a nível municipal as ações de Defesa Civil;
                            <br>XI - Desempenhar outras atribuições inerentes ao seu âmbito de atuação.
                            <br>
                            <br>Parágrafo único. A Secretaria Municipal de Segurança e Trânsito compreende em sua estrutura as seguintes unidades administrativas:
                            <br>I - Ouvidoria da Guarda Civil Municipal; 
                            <br>II - Corregedoria da Guarda Civil Municipal;
                            <br>III - Coordenadoria Executiva de Defesa Civil;
                            <br>IV - Subsecretaria da Guarda Civil Municipal;
                            <br>V - Subsecretaria de Trânsito;
                            <br>VI - Gerência de Vistoria e Infraestrutura; 
                            <br>VII - Gerência de Prevenção e Mobilização; 
                            <br>VIII - Gerência de Segurança e Inspetoria; 
                            <br>IX - Gerência de Prevenção Escolar; 
                            <br>X - Gerência de Planejamento Operacional, Ensino e Formação;
                            <br>XI - Gerência de Logística; 
                            <br>XII - Gerência de Videomonitoramento;
                            <br>XIII - Gerência de Fiscalização e Operação de Trânsito; 
                            <br>XIV - Gerência de Análise, Estatística e de Processamento de Autos de Infração; 
                            <br>XV - Gerência de Tráfego;
                            <br>XVI - Gerência de Educação de Trânsito;
                            <br>XVII - Gerência Administrativa; 
                            <br>XVIII – Coordenação de Controle de Infrações e Recursos;
                            <br>XIX – Coordenação de Sinalização da Malha Viária; 
                            <br>XX – Coordenação de Sinalização Semafórica.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Rua: 25 de Março, nº 10, Ed. Santa Catarina, sala 201/202, Centro</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 09:00  às 18:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3511-5332</p>
                    </div>
                </div>
            </div>
            <!--SEMSET-->

            <!--SEMSUR-->
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#Secretarias" href="#collapseSEMSUR">
                            Serviços Urbanos
                        </a>
                    </h4>
                </div>
                <div id="collapseSEMSUR" class="panel-collapse collapse">
                    <div class="box-body">
                        <h4 class="acessibilidade"><b>Secretaria Municipal de Serviços Urbanos - SEMSUR</b></h4>
                        <p class="acessibilidade"><b>Competência:</b> Conforme lei nº 7.516/2017, a competência  da SEMSUR é:
                            <br>Art. 37. São atribuições básicas da Secretaria Municipal de Serviços Urbanos:
                            <br>I - Realizar atividades relativas aos serviços urbanos, executando os serviços de limpeza, arborização, de manutenção de praças, parques e jardins, nos termos da política municipal;
                            <br>II - Promover a ampliação, modernização e manutenção do sistema de iluminação pública;
                            <br>III - Conservar as vias urbanas, bem como promover a instalação e conservação de bueiros e da rede de drenagem pluvial;
                            <br>IV - Executar e fiscalizar os serviços de capina, varrição e limpeza das vias e logradouros públicos;
                            <br>V - Acompanhar, controlar e fiscalizar a coleta dos resíduos sólidos hospitalares, industriais, comerciais e residenciais;
                            <br>VI - Empreender estudos técnicos e pesquisas, visando a melhoria dos serviços de limpeza pública e destinação final do lixo;
                            <br>VII - Garantir os serviços com manejo de resíduos sólidos de forma sanitária e ambientalmente adequada, a fim de promover a saúde pública e prevenir a poluição das águas superficiais e subterrâneas, do solo e do ar;
                            <br>VIII - Incentivar e apoiar as ações voltadas para a reciclagem de materiais;
                            <br>IX - Administrar os cemitérios municipais, propondo medidas para a sua utilização racional de modo a evitar problemas de saturação;
                            <br>X - Gerir em parceria com as Secretarias de Obras e Gestão de Transportes, o Centro de Manutenção Urbana;
                            <br>XI - Desempenhar outras atribuições inerentes ao seu âmbito de atuação.</p>
                        <p class="acessibilidade"><b>Endereço:</b> Rua Agildo Romero, s/nº - Bairro São Geraldo, Cachoeiro de Itapemirim - ES CEP: 29.300-170</p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> 07:00 às 16:00</p>
                        <p class="acessibilidade"><b>Telefone:</b> (28) 3155-5328</p>
                    </div>
                </div>
            </div>
            <!--SEMSUR-->

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->

@endsection