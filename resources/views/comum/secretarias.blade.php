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
                        <p class="acessibilidade"><b>Competência:</b></p>
                        <p class="acessibilidade"><b>Endereço:</b> </p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> </p>
                        <p class="acessibilidade"><b>Telefone:</b> </p>
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
                        <p class="acessibilidade"><b>Competência:</b></p>
                        <p class="acessibilidade"><b>Endereço:</b> </p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> </p>
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
                        <p class="acessibilidade"><b>Competência:</b> Fomentador de políticas culturais e políticas</p>
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
                        <p class="acessibilidade"><b>Competência:</b></p>
                        <p class="acessibilidade"><b>Endereço:</b> </p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> </p>
                        <p class="acessibilidade"><b>Telefone:</b> </p>
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
                        <p class="acessibilidade"><b>Competência:</b></p>
                        <p class="acessibilidade"><b>Endereço:</b> </p>
                        <p class="acessibilidade"><b>Horário de Atendimento/Funcionamento:</b> </p>
                        <p class="acessibilidade"><b>Telefone:</b> </p>
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