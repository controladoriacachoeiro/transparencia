<!DOCTYPE html>
<html lang="pt-br" xml:lang="pt-br">
    <head>        	
		@section('htmlheader')
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">			
			<meta name="theme-color" content="#007EBC">
			<title>@yield('htmlheader_title')</title>
			<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

			<!-- CSRF Token -->
			<meta name="csrf-token" content="{{ csrf_token() }}">
			
			<meta name="language" content="pt-br" />
			<meta name="resource-type" content="document" />			
			<meta name="robots" content="ALL" />
			<meta name="distribution" content="Global" />
			<meta name="rating" content="General" />
			<meta name="author" content="Controladoria de Cachoeiro de Itapemirim" />
			<meta name="title" content="@yield('htmlheader_title')" />
			<meta name="description" content="Portal de Transparência do município de Cachoeiro de Itapemirim" />
			<meta name="keywords" content="Transparência, Cachoeiro de Itapemirim, Contas públicas, Despesas, Receitas" />

			<!-- Bootstrap 3.3.6 -->
			<link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" />
			
			<!-- Font Awesome -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<!-- Ionicons -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
			
			@section('cssheader')
			@show
            
            <link rel="stylesheet" href="{{ asset('/dist/css/AdminLTE-1.1.4.min.css') }}">
			<link rel="stylesheet" href="{{ asset('/dist/css/skins/_all-skins.min.css') }}">
			<link rel="stylesheet" href="{{ asset('/dist/css/contrast.css') }}">
        @show
    </head>
    <body class="hold-transition skin-blue sidebar-mini">		
        <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ ('/') }}" class="logo">
				<span class="logo-mini"><b>T</b></span>
				<span class="logo-lg">
					<img src="/img/logo.png" class="img-responsive img-center"  alt="Transparência Cachoeiro">
				</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" id="#icone-menu" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
			<div class="grande-menu">
				<ul class="nav navbar-nav">					
					<li>
						<a accesskey="1" class="acessibilidade" href="/" english="Home" id="menuInicio">Início</a>
					</li>					
					<li>
						<a accesskey="2" class="acessibilidade" href="/portal" english="Portal" id="menuPortal">O Portal</a>
					</li>					
					<li>
						<a accesskey="3" class="acessibilidade" href="/glossario" english="Glossary" id="menuGlossario">Glossário</a>
					</li>					
					<li>
						<a accesskey="4" class="acessibilidade" href="/faq" english="FAQ" id="menuFaq">Perguntas Frequentes</a>
					</li>					
				</ul>
			</div>
			<div>
				<div class="row icones-top">
					<ul class="nav navbar-nav">					
						<li>
							<a href="http://leis.cachoeiro.es.gov.br:8081/portalcidadao/" target="_blank">
								<img src="/img/icon-156.png" alt="Portal do cidadão" class="img-icones-top"/>
							</a>
						</li>
						
						<li>
							<a href="https://www.facebook.com/prefeituradecachoeiro/" target="_blank">
								<img src="/img/icon-face.png" alt="Facebook Prefeitura municipal de Cachoeiro de Itapemerim" class="img-icones-top"/>
							</a>
						</li>
						
						<li>
							<a href="https://www.instagram.com/cachoeiro_online/" target="_blank">
								<img src="/img/icon-insta.png" alt="Instagran Prefeitura Municipal Cachoeiro de Itapemerim" class="img-icones-top"/>
							</a>
						</li>
						<li>
							<a href="https://twitter.com/PrefCachoeiro" target="_blank">
								<img src="/img/icon-twit.png" alt="Twitter Prefeitura de Cachoeiro de Itapemerim" class="img-icones-top"/>
							</a>
						</li>
						
						<li>
							<ul style="padding-left: 1px">
								<li>
									<span class="btn btn-xs botoes-acessibilidade" id="trocaIngles" data-original-title="Mudar para Inglês">
									<img src="{{ ('/img/bandeiraEUA.png') }}" alt="Botão para trocar o idioma para Inglês" width="20px" height="20px"></a>
									</span>
								</li>	

								<li>
									<span class="btn btn-xs botoes-acessibilidade" id="trocaPortugues" data-original-title="Mudar para Português-BR">
									<img src="{{ ('/img/bandeiraBrasil.png') }}" alt="Botão para trocar o idioma para Português" width="20px" height="20px"></a>
									</span>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
				<div class="row acessibilidade-top">
					<ul class="list-inline" style="list-style: none;">					
						<li>
							<span class="btn btn-xs botoes-acessibilidade" data-original-title="Página de Acessibilidade">
							<a href="/acessibilidade" class="btnsAcessibilidade"><img src="{{ ('/img/acessibilidade.png') }}" alt="Botão para acessar a página de acessibilidade"></a>
							</span>
						</li>
						<li>
							<span class="btn btn-xs jfontsize-button botoes-acessibilidade" data-original-title="Voltar ao tamanho padrão">
							<a id="FonteNormal" href="#" class="btnsAcessibilidade"><img src="{{ ('/img/fonteNormal.png') }}" alt="Botão para voltar ao tamanho de fonte padrão"></a>
							</span>
						</li>
						
						<li>
							<span class="btn btn-xs jfontsize-button botoes-acessibilidade" data-original-title="Aumentar tamanho da fonte">
							<a id="AumentarFonte" href="#" class="btnsAcessibilidade"><img src="{{ ('/img/fonteMaior.png') }}" alt="Botão para aumentar o tamanho da fonte"></a>
							</span>
						</li>
						
						<li>
							<span class="btn btn-xs jfontsize-button botoes-acessibilidade" data-original-title="Diminuir tamanho da fonte">
							<a id="DiminuirFonte" href="#" class="btnsAcessibilidade"><img src="{{ ('/img/fonteMenor.png') }}" alt="Botão para diminuir o tamanho da fonte"></a>
							</span>
						</li>

						<li>
							<span class="btn btn-xs botoes-acessibilidade" data-original-title="Contraste">
							<a id="btnContraste" href="#" class="btnsAcessibilidade"><img src="{{ ('/img/contraste.png') }}" alt="Botão para inverter o contraste"></a>
							</span>
						</li>	
						<li>
							<span class="btn btn-xs botoes-acessibilidade" data-original-title="Contraste" data-toggle="modal" data-target="#myModal2">
							<a id="btnLibras" href="#" class="btnsAcessibilidade btnDivLibras" data-element="#libras" ><img src="{{ ('/img/libras.png') }}" alt="Botão para exibir o link para o VLibras"></a>
							</span>
						</li>		
				
					</ul>

					<div id="myModal2" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div id="libras1" class="row vlibras">
								<img src="{{ ('/img/libras.gif') }}" alt="Imagem do avatar do VLibras" width="220" height="165">
								<br>
								<br>Este portal é acessível em <strong>Libras</strong>.<br> 
								<a href="http://www.vlibras.gov.br/" target="_blank">Utilize o Vlibras</a> 
								<span><a href="" class="btnDivLibras btnfechar" data-element="#libras1">X</a></span>
							</div>
						</div>
					</div>

					<div id="libras" class="row vlibras">
						<img src="{{ ('/img/libras.gif') }}" alt="Imagem do avatar do VLibras" width="220" height="165">
						<br>
						<br>Este portal é acessível em <strong>Libras</strong>.<br> 
						<a href="http://www.vlibras.gov.br/" target="_blank">Utilize o Vlibras</a> 
						<span><a href="" class="btnDivLibras btnfechar" data-element="#libras">X</a></span>
					</div>
				</div>
			</div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar" style="height: auto;">
            <!-- search form -->
            <form action="/resultado" method="get" role="search" class="sidebar-form" id="cse-search-box">
                <div class="input-group">
					<input type="hidden" name="cx" value="010719052729445061611:ntj0aehspma" />
					<input type="hidden" name="cof" value="FORID:10" />
					<input type="hidden" name="ie" value="utf-8" />
					<label for="PesquisaLateral" style="display:none">Pesquisar</label>
					<input type="text" id="PesquisaLateral" title="Caixa de Pesquisa lateral" name="q" class="form-control" placeholder="Pesquisar...">
					<input type="submit" name="search" value=" " id="search-btn" class="btnsearch" alt="Efetuar busca">
                </div>
            </form>
            <!-- /.search form -->
            <!-- Sidebar Menu -->
				<ul class="sidebar-menu">					
					<!--Home-->
					<li id="Home" class="active">
						<a href="{{ ('/') }}">
							<i class="fa fa-home"></i>
							<span class="acessibilidade">Home</span>
						</a>
					</li>					
					<!--Despesas-->
					<li id="Despesas" class="treeview ">
						<a href="#">
							<i class="fa fa-usd"></i>
							<span class="acessibilidade despesas" english="Expenses">Despesas</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu itens">
						   <!--Empenhos-->
							<li id="Empenhos" class="treeview">
								<a href="#">
									<span class="acessibilidade empenhos" english="Efforts">Empenhos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="EmpenhosOrgaos">
										<a class="acessibilidade orgao" href="/despesas/empenhos/orgaos" english="By Public Agency">Por Órgão</a>
									</li>
									<li id="EmpenhosFornecedores">
										<a class="acessibilidade fornecedor" href="/despesas/empenhos/fornecedores" english="By Provider">Por Fornecedor</a>
									</li>
									<li id="EmpenhosFuncoes">
										<a class="acessibilidade funcao" href="/despesas/empenhos/funcoes" english="By Function">Por Função</a>
									</li>
									<li id="EmpenhosElementos">
										<a class="acessibilidade elementoDespesa" href="/despesas/empenhos/elementos" english="By Expense Element">Por Elemento de Despesa</a>
									</li>
									<li id="EmpenhosNota">
										<a class="acessibilidade notaEmpenho" href="/despesas/empenhos/nota" english="By Effort Note">Por Nota de Empenho</a>
									</li>
								</ul>
							</li>
							<!--Liquidações-->
							<li id="Liquidacoes" class="treeview">
								<a href="#">
									<span class="acessibilidade liquidacoes" english="Liquidations">Liquidações</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="LiquidacoesOrgaos">
										<a class="acessibilidade orgao" href="/despesas/liquidacoes/orgaos">Por Órgão</a>
									</li>
									<li id="LiquidacoesFornecedores">
										<a class="acessibilidade fornecedor" href="/despesas/liquidacoes/fornecedores">Por Fornecedor</a>
									</li>
									<li id="LiquidacoesFuncoes">
										<a class="acessibilidade funcao" href="/despesas/liquidacoes/funcoes">Por Função</a>
									</li>
									<li id="LiquidacoesElementos">
										<a class="acessibilidade elementoDespesa" href="/despesas/liquidacoes/elementos">Por Elemento de Despesa</a>
									</li>
									<li id="LiquidacoesNota">
										<a class="acessibilidade notaLiquidacao" href="/despesas/liquidacoes/nota"english="By Liquidation Note">Por Nota de Liquidação</a>
									</li>
								</ul>
							</li>
							<!--Pagamentos-->
                                <li id="Pagamentos" class="treeview">
								<a href="#">
									<span class="acessibilidade pagamentos" english="Payments">Pagamentos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="PagamentosOrgaos">
										<a class="acessibilidade orgao" href="/despesas/pagamentos/orgaos">Por Órgão</a>
									</li>
									<li id="PagamentosFornecedores">
										<a class="acessibilidade fornecedor" href="/despesas/pagamentos/fornecedores">Por Fornecedor</a>
									</li>
									<li id="PagamentosFuncoes">
										<a class="acessibilidade funcao" href="/despesas/pagamentos/funcoes">Por Função</a>
									</li>
									<li id="PagamentosElementos">
										<a class="acessibilidade elementoDespesa" href="/despesas/pagamentos/elementos">Por Elemento de Despesa</a>
									</li>
									<li id="PagamentosNota">
										<a class="acessibilidade notaPagamentos" href="/despesas/pagamentos/nota" english="By Payment Note">Por Nota de Pagamento</a>
									</li>
								</ul>
							</li>
							<!--Restos a Pagar-->
							<li id="Restos-A-Pagar" class="treeview">
								<a href="#">
									<span class="acessibilidade restosAPagar" english="Remnants to Pay">Restos a Pagar</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="RestosOrgaos">
										<a class="acessibilidade orgao" href="/despesas/restosapagar/orgaos">Por Órgão</a>
									</li>
									<li id="RestosFornecedores">
										<a class="acessibilidade fornecedor" href="/despesas/restosapagar/fornecedores">Por Fornecedor</a>
									</li>
									<li id="RestosFuncoes">
										<a class="acessibilidade funcao" href="/despesas/restosapagar/funcoes">Por Função</a>
									</li>
									<li id="RestosElementos">
										<a class="acessibilidade elementoDespesa" href="/despesas/restosapagar/elementos">Por Elemento de Despesa</a>
									</li>
									<li id="RestosNota">
										<a class="acessibilidade notaRestos" href="/despesas/restosapagar/nota" english="By Note of Remnants to Pay">Por Nota de resto a Pagar</a>
									</li>
								</ul>
							</li>
						</ul>
							
					<!--Receitas-->
					<li id="Receitas" class="treeview">
						<a href="#">
							<i class="fa fa-line-chart"></i>
							<span class="acessibilidade receitas" english="Revenues">Receitas</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<!--Lançamentos-->
						<ul class="treeview-menu itens">
							<li id="Lancamentos" class="treeview">
								<a href="#">
									<span class="acessibilidade lancada" english="Launched">Lançada</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="LancamentosServico">
										<a class="acessibilidade servico" href="/receitas/lancamentos/servico" english="By Service">Por Serviço</a>
									</li>
									<li id="LancamentosCategoria">
										<a class="acessibilidade categoria" href="/receitas/lancamentos/categoria" english="By Category">Por Categoria</a>
									</li>
								</ul>
							</li>

						<!--Recebimentos-->
							<li id="Recebimentos" class="treeview">
								<a href="#">
									<span class="acessibilidade arrecadada" english="Collected">Arrecadada</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="RecebimentosOrgao">
										<a class="acessibilidade orgao" href="/receitas/recebimentos/orgao">Por Órgão</a>
									</li>
									<li id="RecebimentosCategoria">										
										<a class="acessibilidade categoria" href="/receitas/recebimentos/categoria">Por Categoria</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!--Licitações e Contratos-->
					<li id="LicitacoesContratos" class="treeview">
						<a href="#">
							<i class="fa fa-shopping-cart"></i>
							<span class="acessibilidade licitacoesEContratos" english="Biddings and Contracts">Licitações e Contratos</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu itens">
							<li id="Licitacoes">
								<a class="acessibilidade licitacoes" href="/licitacoescontratos/licitacoes" english="Biddings">Licitações</a>
							</li>														
							<li id="LCContratos">
								<a class="acessibilidade contratos" href="/licitacoescontratos/contratos" english="Contracts">Contratos</a>
							</li>
							<li id="LCBensAdquiridos">
								<a class="acessibilidade bens" href="/licitacoescontratos/bensadquiridos/orgao" english="Properties and Acquired Products">Bens e Produtos Adquiridos</a>
							</li>
							<li id="LCAtaRegistroPreco">
								<a class="atas" href="/licitacoescontratos/ataregistropreco" english="Price Record Minutes">Atas de Registro de Preço</a>
							</li>							
						</ul>
					</li>
					<!--Gestão Fiscal-->
					<li id="GestaoFiscal" class="treeview">
						<a href="#">
							<i class="fa fa-percent"></i>
							<span class="acessibilidade gestaoFiscal" english="Tax Management">Gestão Fiscal</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<!--Registro Orçamentário-->
						<ul class="treeview-menu itens">
							<li id="LegislacaoOrc" class="treeview">
								<a href="#">
									<span class="acessibilidade legislacaoOrcamentaria" english="Budget Legislation">Legislação Orçamentária</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="PPA">
										<a class="acessibilidade" href="/gestaofiscal/legislacao/ppa">PPA</a>
									</li>
									<li  id="LDO">
										<a class="acessibilidade" href="/gestaofiscal/legislacao/ldo">LDO</a>
									</li>
									<li id="LOA">
										<a class="acessibilidade" href="/gestaofiscal/legislacao/loa">LOA</a>
									</li>
								</ul>
							</li>
						<!--Relatório LRF-->
							<li id="LRF" class="treeview">
								<a href="#">
									<span class="acessibilidade relatoriosLRF" english="LRF's Report">Relatórios da LRF</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="RGF">
										<a class="acessibilidade" href="/gestaofiscal/lrf/rgf">RGF</a>
									</li>
									<li id="RREO">
										<a class="acessibilidade" href="/gestaofiscal/lrf/rreo">RREO</a>
									</li>
								</ul>
							</li>
							<li id="PrestacaoConta">
								<a class="acessibilidade prestacaoDeConta" href="/gestaofiscal/prestacaoconta" english="Accountability">Prestação de Contas</a>
							</li>							
						</ul>
					</li>
					<!--Patrimônio-->
					<li id="Patrimonios" class="treeview">
						<a href="#">
							<i class="fa fa-institution"></i>
							<span class="acessibilidade patrimonio" english="Patrimony">Patrimônio</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu itens">
							<li id="Almoxarifado">
								<a class="acessibilidade almoxarifado" href="/patrimonios/almoxarifado/porAlmoxarifado" english="Warehouse">Almoxarifado</a>
							</li>
							<li id="BensMoveis" class="treeview">
								<a href="#">
								<span class="acessibilidade bensMoveis" english="Movable Property">Bens Móveis</span>
								<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="BensMovOrgao">
										<a class="acessibilidade orgao" href="{{'/patrimonios/bensmoveis/orgao'}}">Por Orgão</a>
									</li>
									<li id="BensMovNumero">
										<a class="acessibilidade numeroPatrimonio" href="{{('/patrimonios/bensmoveis/numeropatrimonio')}}" english="By Patrimony Number">Por Número Patrimônio</a>
									</li>
								</ul>
							</li>
							<li id="BensImoveis">
								<a class="acessibilidade bensImoveis" href="/patrimonios/bensimoveis" english="Real estate">Bens Imóveis</a>
							</li>
							<li id="Frota">
								<a class="acessibilidade frota" href="/patrimonios/frota" english="Fleet">Frota</a>
							</li>														
						</ul>
					</li>
					<!--Pessoal-->
					<li id="Pessoal" class="treeview">
						<a href="#">
							<i class="fa fa-user"></i>
							<span class="acessibilidade pessoal" english="Staff">Pessoal</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<!--Servidores-->
						<ul class="treeview-menu itens">
							<li id="Servidores" class="treeview">
								<a href="#">
									<span class="acessibilidade servidoresESalarios" english="Public Servers and Salary">Servidores e Salários</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="ServidoresNome">
										<a class="acessibilidade nome" href="{{'/servidores/nome'}}" english="By Name">Por Nome</a>
									</li>
									<li id="ServidoresOrgao">
										<a class="acessibilidade orgao" href="{{'/servidores/orgao'}}">Por Órgão</a>
									</li>
									<li id="ServidoresCargoFuncao">
										<a class="acessibilidade cargoFuncao" href="{{'/servidores/cargofuncao'}}" english="By Job Role/Function">Por Cargo/Função</a>
									</li>
									<li id="ServidoresMatricula">
										<a class="acessibilidade matricula" href="{{'/servidores/matricula'}}" english="By Registration">Por Matrícula</a>
									</li>
								</ul>
							</li>							
							<li id="EstruturaP" class="treeview">
								<a class="acessibilidade estruturaPessoal" href="/estruturapessoal" english="Staff Structure">Estrutura de Pessoal</a>
							</li>							
							<li id="ConcursoPublico" class="treeview">
								<a class="acessibilidade concursoPublico" href="/concursos" english="Public Tender">Concurso Público</a>								
							</li>
						</ul>
					</li>
					<!--Convênios e Transferências-->
					<li id="Convenios" class="treeview">
						<a href="#">
							<i class="fa fa-chain"></i>
							<span class="acessibilidade convenios" english="Agreements and Transfers">Convênios e Transferências</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu itens">
							<li id="RecursosRecebidos">
								<a class="acessibilidade recursosRecebidos" href="/convenios/recebidos/todos" english="Resources Received">Recursos Recebidos</a>
							</li>							
							<li id="RecursosConcedidos">
								<a class="acessibilidade recursosCedidos" href="/convenios/cedidos/todos" english="Resources Granted">Recursos Concedidos</a>
							</li>
							<li id="TermoColaboracao">
								<a href="/convenios/termocolaboracao" english="Collaboration Terms" id="sidebarTermosColaboracao">Termos de Colaboração</a>
							</li>
						</ul>
					</li>
					<!--Mais Informações-->
					<li id="MaisInfo" class="treeview">
						<a href="#">
							<i class="fa fa-info"></i>
							<span class="acessibilidade" english="More information" id="sidebarMaisInformacoes">Mais Informações</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu itens">							
							<li id="Obras" class="treeview">
								<a class="acessibilidade" href="https://geoobras.tce.es.gov.br/cidadao/" target="_blank" english="Constructions" id="sidebarObras">Obras</a>
							</li>
							<li id="EstrutOrg">
								<a class="acessibilidade" href="/estruturaorganizacional" english="Organizational Structure" id="sidebarEstruturaOrganizacional">Estrutura Organizacional</a>
							</li>
							<li id="ProgProjAcoes">
								<a class="acessibilidade" href="/ppacao" english="Programs, Projects and Actions" id="sidebarProgramasProjetosAcoes">Programas, Projetos e Ações</a>
							</li>
							<li id="Normativa">
								<a href="/normativa" english="Normative Instructions" id="sidebarInstrucoesNormativas">Instruções Normativas</a>
							</li>
							<li>
								<a href="http://www.cachoeiro.es.gov.br/servicos/site.php?nomePagina=DIARIO" target="_blank" english="Official Diary" id="sidebarDiarioOficial">Diário Oficial</a>
							</li>							
							<li class="treeview">
								<a href="#">
									<span class="acessibilidade" english="Indirect Administration" id="sidebarAdministracaoIndireta">Administração Indireta</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li>
										<a class="acessibilidade" href="http://agersa.es.gov.br" target="_blank">Agersa</a>
									</li>
									<li>
										<a class="acessibilidade" href="http://www.dataci.es.gov.br/index.php?pag=INFORMA" target="_blank">Dataci</a>
									</li>
									<li>
										<a class="acessibilidade" href="http://ipaci.es.gov.br/Default.aspx" target="_blank">Ipaci</a>
									</li>									
								</ul>
							</li>
						</ul>
					</li>
					<li id="DadosAbertos" class="treeview">
						<a href="#">
							<i class="fa fa-folder-open"></i>
							<span class="acessibilidade dadosAbertos" english="Open Data">Dados Abertos</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu itens">
							<li id="Downloads" class="treeview">
								<a href="#">
									<span class="acessibilidade">Downloads</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu itens">
									<li id="DownDespesas">
										<a class="acessibilidade despesas" href="/dadosabertos/despesas">Despesas</a>
									</li>
									<li id="DownReceitas">
										<a class="acessibilidade receitas" href="/dadosabertos/receitas">Receitas</a>
									</li>
									<li id="DownLiciCon">
										<a class="acessibilidade licitacoesEContratos" href="/dadosabertos/licitacoescontratos">Licitações e Contratos</a>
									</li>
									<li id="DownPat">
										<a class="acessibilidade patrimonio" href="/dadosabertos/patrimonios">Patrimônios</a>
									</li>
									<li id="DownPessoal">
										<a class="acessibilidade pessoal" href="/dadosabertos/pessoal">Pessoal</a>
									</li>
									<li id="DownConvenios">
										<a class="acessibilidade convenios" href="/dadosabertos/convenios">Convênios e Transferências</a>
									</li>
								</ul>
							</li>
							<li id="API">
								<a class="acessibilidade" href="/api">Web Service</a>
							</li>
						</ul>
					</li>
					@section('nav')
					@show
				</ul>
				<!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" >
            <!-- Content Header (Page header) -->
			@section('header')
            <section class="content-header">
				<h1>
					@yield('htmlheader_title', '')
				</h1>
            </section>
			@Show

            <!-- Main content -->
            <section id="conteudo-principal" class="content" style="min-height:650px;">
                @yield('main-content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer formatacao-footer">
			<div id="base" class="col-md-12">					
				<div class="row footer-sm">
				<!-- Mapa Site -->
					<div class="col-md-4 div-footer">
						<h3 class="margin-bottom-20" english="Portal" id="footerPortal">O Portal</h3>
						<p><a href="/portal" english="What there are on the Portal" id="footerOQueTemNoPortal">O que tem no Portal</a></p>                    	
						<p><a href="{{ ('/glossario') }}" english="Glossary" id="footerGlossario">Glossário</a></p>               						 
						<p><a href="{{ ('/faq') }}" english="FAQ" id="footerFAQ">Perguntas Frequentes</a></p>
						<p><a href="{{ ('/quemsomos') }}" english="About us" id="footerQuemSomos">Quem Somos</a></p>
					</div>
				<!-- Fim Mapa Site -->
				<!-- Contatos  -->
					<div class="col-md-4 border-footer border-footer2 border-footer3 border-footer-sm" >
						<h3 class="margin-bottom-20" english="Contacts" id="footerContatos">Contatos</h3>
						<p>Prefeitura Municipal de Cachoeiro de Itapemirim.</p>
						<p>Controladoria Geral do Município.</p>
						<p>Rua Brahin Antônio Seder, 96/102, Centro</p>
						<p>CEP: 29300-060</p>
						<p>Cachoeiro de Itapemirim, Espírito Santo</p>
						<p>Tel: (028) 3155-5237 / Ouvidoria: 156</p>
						<p>Email: controladoria@cachoeiro.es.gov.br</p>
					</div>
				<!-- Fim Contatos -->
				<!-- Telfones Uteis -->
					<div class="col-md-4  div-footer">
						<h3 class="margin-bottom-20" english="Useful Telephone Numbers" id="footerTelefones">Telefones Úteis</h3>
						<p>Disque Denúncia - 181</p>
						<p>Corpo de Bombeiros - 193</p>
						<p>Polícia Civil - 147</p>
						<p>Polícia Militar - 190</p>
						<p>Guarda Municipal - 153</p>
						<p>Ouvidoria - 156</p>
						<div class="col-md-12">
						<ul class="list-inline">
							<li>
								<a href="http://www.cachoeiro.es.gov.br" target="_blank">
								<img src="{{ ('/img/acessonew.png') }}" style="max-width:30px;padding-top: 20px" alt="Cachoeiro De Itapemirim" ></a>
							</li>
							<li>
								<a href="http://www.dataci.es.gov.br" target="_blank">
								<img src="{{ ('/img/datacinew.png') }}" style="max-width:40px;padding-top: 20px"  alt="DATACI"></a>
							</li>
							<li>
								<a href="http://www.cachoeiro.es.gov.br" target="_blank">
								<img src="{{ ('/img/cachoeironew.png') }}" style="max-width:40px;padding-top: 20px" alt="Cachoeiro De Itapemirim" ></a>
							</li>
							<li>
								<a href="https://github.com/controladoriacachoeiro/transparencia" target="_blank">
								<img src="{{ ('/img/gitnew.png') }}" style="max-width:30px;padding-top: 20px"  alt="DATACI"></a>
							</li>
						</ul>
						</div>
					</div>
					<!-- Fim Telfones Uteis -->  
				</div>
				         
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="list-inline text-center" style="padding-top: 20px; padding-bottom: 20px">
							<li>
								<a href="http://leis.cachoeiro.es.gov.br:8081/portalcidadao/" target="_blank">
								<img src="{{ ('/img/156.png') }}" class="img-footer" alt="Cachoeiro De Itapemirim" ></a>
							</li>
							<li>
								<a href="https://www.facebook.com/prefeituradecachoeiro/" target="_blank">
								<img src="{{ ('/img/face.png') }}" class="img-footer"  alt="DATACI"></a>
							</li>
							<li>
								<a href="https://www.instagram.com/cachoeiro_online/" target="_blank">
								<img src="{{ ('/img/insta.png') }}" class="img-footer" alt="Cachoeiro De Itapemirim" ></a>
							</li>
							<li>
								<a href="https://twitter.com/PrefCachoeiro" target="_blank">
								<img src="{{ ('/img/twitter.png') }}" class="img-footer"  alt="DATACI"></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div id="creative" class="col-md-12 col-sm-12 text-center icones-footer" >	
						<p english="The content on this site is licensed under a <a rel='license' href='http://creativecommons.org/licenses/by/4.0/' target='_blank'>Creative Commons Atribuição 4.0 Internacional</a>" id="footerLicensa">Essa obra está licenciada com uma Licença <a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="_blank">Creative Commons Atribuição 4.0 Internacional</a><p>
					</div>
					<div class="row">
						<div class="text-center">
							<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Licença Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a>
						</div>
					</div>
				</div>				
			</div>
        </footer>
        <!-- ./wrapper -->

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><span id="titulo"></span></h4>
				</div>
				<div class="modal-body" id="modal-body">
				</div>								
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>					
				</div>
				</div>
			</div>
		</div>

        @section('scripts')
            <!-- jQuery 2.2.3 -->
            <script src="{{ asset('/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
            $.widget.bridge('uibutton', $.ui.button);
            </script>
            <!-- Bootstrap 3.3.6 -->
            <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
            <!-- Slimscroll -->
            <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
            <!-- FastClick -->
            <script src="{{ asset('/plugins/fastclick/fastclick.js') }}"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('/dist/js/app.min.js') }}"></script>
			<!--Script ppara destacar no menu qual pagina que esta sendo exibida-->
			<script src="{{ asset('js/menu.1.2.min.js') }}"></script>			
			<script src="{{ asset('js/jstorage.js')}}"></script>
			<script src="{{ asset('js/jquery.jfontsize-2.0.js')}}"></script>
			<script src="{{ asset('js/high-contrast.js')}}"></script>
        @show

        @section('scriptsadd')
        @show

    </body>
<script>
   $(".box-body,.main-footer,.acessibilidade,.btn-primary,h1,h3,h4,table,input,label").jfontsize({
     btnMinusClasseId: '#DiminuirFonte', // Defines the class or id of the decrease button
     btnDefaultClasseId: '#FonteNormal', // Defines the class or id of default size button
     btnPlusClasseId: '#AumentarFonte', // Defines the class or id of the increase button
     btnMinusMaxHits: 5, // How many times the size can be decreased
     btnPlusMaxHits: 5, // How many times the size can be increased
     sizeChange: 2 // Defines the range of change in pixels
   });
</script>

<!--Scripts de acessibilidade  -->
	<script>
	$(document).on('keydown', function(e) {
	console.log(e.which); // Retorna o número código da tecla
	console.log(e.altKey); // Se o alt foi Pressionado retorna true
	
	if ((e.altKey) && (e.which === 53)) {
		$("#BtnAcessibilidade").trigger('click');
	}else if ((e.altKey) && (e.which === 54)) {
		$("#FonteNormal").trigger('click');
	}else if((e.altKey) && (e.which === 55)) {
		$("#AumentarFonte").trigger('click');
	} else if ((e.altKey) && (e.which === 56)) {
		$("#DiminuirFonte").trigger('click');
	} else if ((e.altKey) && (e.which === 57)) {
		$("#btnContraste").trigger('click');
	}
	});
	//chama a biblioteca high-contrast.js
	$( "#btnContraste" ).click(function() {
		window.toggleContrast()
	});

	$(function(){
			$(".btnDivLibras").click(function(e){
				e.preventDefault();
				el = $(this).data('element');
				$(el).toggle();
			});

			// $("#libras").click(function(){
			// 	alert('a');
			// 	$(el).toggle();
			// });
		});
	</script>
<!--Fim scripts acessiblidade-->

<!-- Chamando o plugin de carregamento de cookie com jQuery -->
<script src="/plugins/jQueryCookie/jquery.cookie.js"></script>

<!-- Chamando o arquivo de tradução da página app -->
<script src="/dist/js/english/appEnglish.js"></script>

<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-100688690-1', 'auto');
	ga('send', 'pageview');
</script>
</html>