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
            <!-- Theme style -->
            <link rel="stylesheet" href="{{ asset('/dist/css/AdminLTE.min.css') }}">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="{{ asset('/dist/css/skins/_all-skins.min.css') }}">
        @show
        @section('cssheader')
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
            <span class="logo-lg"><b>Transparência</b></span>
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
					<!-- Optionally, you can add icons to the links -->
					<li class="active">
						<a href="{{ ('/') }}">
							<i class="fa fa-home"></i>
							<span>Home</span>
						</a>
					</li>
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
							<li>
								<a href="{{ ('/manual') }}">Manual de Navegação</a>
							</li>
							<li>
								<a href="{{ ('/legislacao') }}">Legislação</a>
							</li>
							<li>
								<a href="{{ ('/faq') }}">Perguntas Frequentes</a>
							</li>
							<li>
								<a href="{{ ('/mapasite') }}">Mapa do Site</a>
							</li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-search"></i>
							<span>Consultas</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="treeview">
								<a href="#">
									<span>Receitas e Orçamentos</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="#">Receita</a>
									</li>
									<li class="treeview">
										<a href="#">
											<span>Leis Orçamentárias</span>
											<span class="pull-right-container">
												<i class="fa fa-angle-left pull-right"></i>
											</span>
										</a>
										<ul class="treeview-menu">
											<li>
												<a href="#">Plano Plurianual PPA</a>
											</li>
											<li>
												<a href="#">Lei de Diretrizes Orçamentárias LDO</a>
											</li>
											<li>
												<a href="#">Orçamentos</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#">Orçamento x Executado</a>
									</li>
								</ul>
							</li>
							<li class="treeview">
								<a href="#">
									<span>Despesas e Repasses</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{ ('/despesas/despesa') }}">Despesa</a>
									</li>
									<li>
										<a href="#">Saldo de Restos a Pagar</a>
									</li>
									<li>
										<a href="#">Relatório LRF</a>
									</li>
									<li>
										<a href="#">Convênios com Municípios</a>
									</li>
									<li>
										<a href="#">Convênios da União</a>
									</li>
									<li>
										<a href="#">Transferências para Municípios</a>
									</li>
									<li>
										<a href="#">Transferências da União</a>
									</li>
									<li>
										<a href="#">Cartão Corporativo</a>
									</li>
									<li>
										<a href="#">Glossário</a>
									</li>
									<li>
										<a href="#">Despesas com Publicidade </a>
									</li>
								</ul>
							</li>
							<li class="treeview">
								<a href="#">
									<span>Compras</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="#">Compras Governamentais</a>
									</li>
									<li>
										<a href="#">Contratos</a>
									</li>
									<li>
										<a href="#">Patrimônio</a>
									</li>
									<li>
										<a href="#">Portal de Compras</a>
									</li>
									<li>
										<a href="#">Tabelas de Preços Referenciais</a>
									</li>
									<li>
										<a href="#">Empresas Inidôneas e Suspensas</a>
									</li>
									<li>
										<a href="#">Empresas Punidas</a>
									</li>
									<li>
										<a href="#">Fornecedores Sancionados</a>
									</li>
								</ul>
							</li>
							<li class="treeview">
								<a href="#">
									<span>Pessoal</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="#">Servidores Públicos</a>
									</li>
									<li>
										<a href="#">Diárias por Orgão</a>
									</li>
									<li>
										<a href="#">Diárias por favorecido</a>
									</li>
									<li>
										<a href="#">Jetons por favorecido</a>
									</li>
									<li>
										<a href="#">Diárias da Polícia Militar</a>
									</li>
								</ul>
							</li>
							<li class="treeview">
								<a href="#">
									<span>Outras Consultas</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="#">Diário Oficial</a>
									</li>
									<li>
										<a href="#">Prestação de Contas do Governador</a>
									</li>
									<li>
										<a href="#">Fluxo de Veículos na Rodovia do Sol</a>
									</li>
									<li>
										<a href="#">Empresas Públicas e Outros Poderes</a>
									</li>
									<li>
										<a href="#">Conselhos Estaduais</a>
									</li>
									<li>
										<a href="#">Monte sua consulta</a>
									</li>
									<li>
										<a href="#">Relatório de Atividades CPCT</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
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
					<li>
						<a href="#">
							<i class="fa fa-map"></i>
							<span>Mapas</span>
						</a>
					</li>
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
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <!--<li class="active">Dashboard</li>-->
            </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('main-content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>
				&copy; 2016
				<a href="#">Controladoria</a>.
			</strong>
			Rua Brahim Antônio Seder, 96/102, Centro - CEP: 29300060 - Cachoeiro de Itapemirim / ES.
			<br />
			Tel: (0xx28) 3155-5237 / Ouvidoria: 156 / E-mail: controladoria@cachoeiro.es.gov.br
        </footer>
        <!-- ./wrapper -->

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