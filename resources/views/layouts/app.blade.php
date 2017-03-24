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
					<!--Consultas-->
					<li class="treeview">
						<a href="#">
							<i class="fa fa-search"></i>
							<span>Consultas</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<!--Despesas-->
							<li class="treeview">
								<a href="#">
									<span>Despesas e Repasses</span>
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
						</ul>
					</li>
					<!--Áreas Temáticas-->
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
					<!--Mapa-->
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