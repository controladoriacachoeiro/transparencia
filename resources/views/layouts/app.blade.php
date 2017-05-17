<html>
    <head>
        <title>Transparência - @yield('htmlheader_title', '') </title>
		@section('htmlheader')
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Transparencia - @yield('htmlheader_title')</title>
			<!-- Tell the browser to be responsive to screen width -->
			<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			<!-- Bootstrap 3.3.6 -->
			<link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" />
			<!-- Font Awesome -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
			<!-- Ionicons -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
			
			@section('cssheader')
			@show

            <!-- Theme style -->
            <link rel="stylesheet" href="{{ asset('/dist/css/AdminLTE.min.css') }}">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="{{ asset('/dist/css/skins/_all-skins.min.css') }}">
        @show
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{ ('/') }}" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>T</b></span>
				<!-- logo for regular state and mobile devices -->
				<!--<span class="logo-lg"><b>Transparência</b></span>-->
				<span class="logo-lg">
					<img src="http://www.cachoeiro.es.gov.br/transparencia/images/brazao_pmci.jpg" class="img-responsive" alt="Cachoeiro De Itapemirim">
				</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- Sidebar Menu -->
				<ul class="sidebar-menu">
					<li class="header">MENU</li>
					<!--Home-->
					<li class="active">
						<a href="{{ ('/') }}">
							<i class="fa fa-home"></i>
							<span>Home</span>
						</a>
					</li>
					<!--O Portal-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-info-circle"></i>
							<span>O Portal</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="{{ ('/portal') }}">O que é o Portal</a>
							</li>
							<li>
								<a href="{{ ('/glossario') }}">Glossário</a>
							</li>
							<!--<li>
								<a href="{{ ('/manual') }}">Manual de Navegação</a>
							</li>-->
							<li>
								<a href="{{ ('/legislacao') }}">Legislação</a>
							</li>
							<li>
								<a href="{{ ('/faq') }}">Perguntas Frequentes</a>
							</li>
							<li>
								<a href="{{ ('/mapasite') }}">Estrutura Organizacional</a>
							</li>
						</ul>
					</li>
					<!--Despesas-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-area-chart"></i>
							<span>Despesas</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<!--Empenhos-->
						<ul class="treeview-menu">
							<li class="treeview">
								<a href="#">
									<span>Empenhos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'orgaos'])}}">Órgãos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'fornecedores'])}}">Fornecedores</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'funcoes'])}}">Funções</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'elementos'])}}">Elementos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'empenhos','tipoConsulta' => 'nota'])}}">Nota</a>
									</li>
								</ul>
							</li>
						</ul>
						<!--Liquidações-->
						<ul class="treeview-menu">
							<li class="treeview">
								<a href="#">
									<span>Liquidações</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'orgaos'])}}">Órgãos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'fornecedores'])}}">Fornecedores</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'funcoes'])}}">Funções</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'elementos'])}}">Elementos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'liquidacoes','tipoConsulta' => 'nota'])}}">Nota</a>
									</li>
								</ul>
							</li>
						</ul>
						<!--Pagamentos-->
						<ul class="treeview-menu">
							<li class="treeview">
								<a href="#">
									<span>Pagamentos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'orgaos'])}}">Órgãos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'fornecedores'])}}">Fornecedores</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'funcoes'])}}">Funções</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'elementos'])}}">Elementos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'despesas','subConsulta' => 'pagamentos','tipoConsulta' => 'nota'])}}">Nota</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!--Receitas-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-line-chart"></i>
							<span>Receitas</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<!--Lançamentos-->
						<ul class="treeview-menu">
							<li class="treeview">
								<a href="#">
									<span>Lançamentos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'receitas','subConsulta' => 'lancamentos','tipoConsulta' => 'orgaos'])}}">Órgãos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'receitas','subConsulta' => 'lancamentos','tipoConsulta' => 'categorias'])}}">Categorias</a>
									</li>
								</ul>
							</li>
						</ul>
						<!--Recebimentos-->
						<ul class="treeview-menu">
							<li class="treeview">
								<a href="#">
									<span>Recebimentos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'receitas','subConsulta' => 'recebimentos','tipoConsulta' => 'orgaos'])}}">Órgãos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'receitas','subConsulta' => 'recebimentos','tipoConsulta' => 'categorias'])}}">Categorias</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!--Licitações e Contratos-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-shopping-cart"></i>
							<span>Licitações e Contratos</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'licitacoes_contratos','subConsulta' => 'default','tipoConsulta' => 'andamentos'])}}">Andamentos</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'licitacoes_contratos','subConsulta' => 'default','tipoConsulta' => 'concluidos'])}}">Concluidos</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'licitacoes_contratos','subConsulta' => 'default','tipoConsulta' => 'contratos'])}}">Contratos</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'licitacoes_contratos','subConsulta' => 'default','tipoConsulta' => 'bens_produtos_adquiridos'])}}">Bens e Produtos Adquiridos</a>
							</li>
						</ul>
					</li>
					<!--Gestão Fiscal-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-exclamation-triangle"></i>
							<span>Gestão Fiscal</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<!--Registro Orçamentário-->
						<ul class="treeview-menu">
							<li class="treeview">
								<a href="#">
									<span>Registro Orçamentário</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'registro_orcamentario','tipoConsulta' => 'ppa'])}}">PPA</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'registro_orcamentario','tipoConsulta' => 'ldo'])}}">LDO</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'registro_orcamentario','tipoConsulta' => 'loa'])}}">LOA</a>
									</li>
								</ul>
							</li>
						</ul>
						<!--Relatório LRF-->
						<ul class="treeview-menu">
							<li class="treeview">
								<a href="#">
									<span>Relatório LRF</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'relatorio_lrf','tipoConsulta' => 'rgf'])}}">RGF</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'relatorio_lrf','tipoConsulta' => 'rreo'])}}">RREO</a>
									</li>
								</ul>
							</li>
						</ul>
						<ul class="treeview-menu">
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'default','tipoConsulta' => 'prestacoes_contas'])}}">Prestações de Contas</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'gestao_fiscal','subConsulta' => 'default','tipoConsulta' => 'auditorias_inspecoes'])}}">Auditorias e Inspeções</a>
							</li>
						</ul>
					</li>
					<!--Patrimônio-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-institution"></i>
							<span>Patrimônio</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'patrimonio','subConsulta' => 'default','tipoConsulta' => 'bens_moveis'])}}">Bens Móveis</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'patrimonio','subConsulta' => 'default','tipoConsulta' => 'bens_imoveis'])}}">Bens Imóveis</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'patrimonio','subConsulta' => 'default','tipoConsulta' => 'frota'])}}">Frota</a>
							</li>
						</ul>
					</li>
					<!--Pessoal-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-users"></i>
							<span>Pessoal</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<!--Servidores-->
						<ul class="treeview-menu">
							<li class="treeview">
								<a href="#">
									<span>Servidores</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'servidores','tipoConsulta' => 'orgaos'])}}">Órgãos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'servidores','tipoConsulta' => 'orgaos'])}}">Funções</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'servidores','tipoConsulta' => 'orgaos'])}}">Cargos</a>
									</li>
									<li>
										<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'servidores','tipoConsulta' => 'orgaos'])}}">Matrícula</a>
									</li>
								</ul>
							</li>
						</ul>
						<ul class="treeview-menu">
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'default','tipoConsulta' => 'estrutura_pessoal'])}}">Estrutura de Pessoal</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'default','tipoConsulta' => 'folha_pagamento'])}}">Folha de Pagamento</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'pessoal','subConsulta' => 'default','tipoConsulta' => 'concurso_publico'])}}">Concurso Público</a>
							</li>
						</ul>
					</li>
					<!--Convênios e Transferências-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-chain"></i>
							<span>Convênios e Transferências</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'convenios_transferencias','subConsulta' => 'default','tipoConsulta' => 'recursos_recebidos_uniao'])}}">Recursos Recebidos da União</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'convenios_transferencias','subConsulta' => 'default','tipoConsulta' => 'recursos_recebidos_estado'])}}">Recursos Recebidos do Estado</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'convenios_transferencias','subConsulta' => 'default','tipoConsulta' => 'recursos_concedidos_pelo_municipio'])}}">Recursos Concedidos Pelo Município</a>
							</li>
						</ul>
					</li>
					<!--Mais Informações-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-info"></i>
							<span>Mais Informações</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'mais_informacoes','subConsulta' => 'default','tipoConsulta' => 'obras'])}}">Obras</a>
							</li>
							<li>
								<a href="{{route('filtroIndex', ['consulta' => 'mais_informacoes','subConsulta' => 'default','tipoConsulta' => 'outros'])}}">Outros</a>
							</li>
						</ul>
					</li>
					<!--Áreas Temáticas--
					<li class="treeview">
						<a href="#">
							<i class="fa fa-university"></i>
							<span>Áreas Temáticas</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="#">Educação</a>
							</li>
							<li>
								<a href="#">Obras</a>
							</li>
							<li>
								<a href="#">Saúde</a>
							</li>
							<li>
								<a href="#">Segurança</a>
							</li>
						</ul>
					</li>
					<!--Mapa--
					<li>
						<a href="#">
							<i class="fa fa-map"></i>
							<span>Mapas</span>
						</a>
					</li>
					<!--Dados Abertos-->
					<li>
						<a href="#">
							<i class="fa fa-folder-open"></i>
							<span>Dados Abertos</span>
						</a>
					</li>
					@section('nav')
					@show
				</ul>
				<!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <h1>
				@yield('htmlheader_title', '')
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ ('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <!--<li class="active">Dashboard</li>-->
				@yield('breadcrumb')
            </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('main-content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer row">
			<div class="col-md-6">
				<strong>
					<i class="fa fa-creative-commons"></i> 2016
					<a href="#">Controladoria</a>.
				</strong>
				Rua Brahim Antônio Seder, 96/102, Centro - CEP: 29300060
				<br />
				Cachoeiro de Itapemirim / ES.
				<br />
				Tel: (0xx28) 3155-5237 / Ouvidoria: 156 / E-mail: controladoria@cachoeiro.es.gov.br
			</div>
			
			<div class="col-md-6">
				<div class="pull-right hidden-xs">
					<a href="http://www.cachoeiro.es.gov.br" target="_blank">
						<img src="{{ ('/img/cachoeiro.png') }}" class="img-responsive" alt="Cachoeiro De Itapemirim" style="height: 50px;"></a>
				</div>
				<div class="pull-right hidden-xs">
					<a href="http://www.ipaci.es.gov.br" target="_blank">
						<img src="{{ ('/img/ipaci.png') }}" class="img-responsive" alt="IPACI" style="height: 50px;"></a>
				</div>
				<div class="pull-right hidden-xs">
					<a href="http://www.dataci.es.gov.br" target="_blank">
						<img src="{{ ('/img/dataci.png') }}" class="img-responsive" alt="DATACI" style="height: 50px;"></a>
				</div>
				<div class="pull-right hidden-xs">
					<a href="http://agersa.es.gov.br" target="_blank">
						<img src="{{ ('/img/agersa.png') }}" class="img-responsive" alt="AGERSA" style="height: 50px;"></a>
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
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<button type="button" class="btn btn-primary">Salvar</button>
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
        @show
        @section('scriptsadd')
        @show
    </body>
</html>