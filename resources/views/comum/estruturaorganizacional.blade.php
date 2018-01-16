@extends('layouts.app') @section('htmlheader_title', 'Estrutura Organizacional')
@section('cssheader')
<link href="{{ asset('/dist/css/lightbox.min.css') }}" rel="stylesheet">
@endsection @section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<!-- /.box-header -->
			<div class="box-body">
				<div class="col-md-8">
					<a href="{{ ('/img/estrutura/organograma.jpg') }}" data-title="Estrutura Organizacional" data-lightbox="organograma">
						<img src="{{ ('/img/estrutura/organograma.jpg') }}" class="organograma" alt="Organograma da estrura organizacional da Prefeitura de Cachoeiro de Itapemirim">
					</a>
				</div>
				<div class="col-md-4">
					<div class="box-group box-body" id="accordion">

						<div class="panel">
							<div class="box-header with-border">
								<h4 class="box-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Gabinete do Prefeito</a>
								</h4>
							</div>
							<div id="collapse1" class="panel-collapse collapse">
								<div class="box-body">
									<ul class="links-gestao">
										<li>
											<a href="{{ ('/img/estrutura/gabinete.png') }}" data-lightbox="gabinete">Gabinete do Prefeito</a>
										</li>
										<li>
											<a href="{{ ('/img/gabinete.png') }}" data-lightbox="gabinete">Agência Municipal de Regulação dos Serviços Públicos Delegados de Cachoeiro de Itapemirim</a>
										</li>
										<li>
											<a href="{{ ('/img/gabinete.png') }}" data-lightbox="gabinete">Empresa de Tecnologia da Informação de Cachoeiro de Itapemirim</a>
										</li>
										<li>
											<a href="{{ ('/img/gabinete.png') }}" data-lightbox="gabinete">Instito de Previdência do Município de Cachoeiro de Itapemirim</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel">
							<div class="box-header with-border">
								<h4 class="box-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
										Órgãos de Assessoramento
									</a>
								</h4>
							</div>
							<div id="collapse2" class="panel-collapse collapse">
								<div class="box-body">
									<ul class="links-gestao">
										<li>
											<a href="{{ ('/img/estrutura/governo.png') }}" data-lightbox="governo">Secretaria Municipal de Governo</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/procuradoria.png') }}" data-lightbox="procuradoria">Procuradoria Geral do Município</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/analise.png') }}" data-lightbox="analise">Secretaria Municipal de Modernização e Análise de Custos</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel">
							<div class="box-header with-border">
								<h4 class="box-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
										Órgãos de Atuação Instrumental
									</a>
								</h4>
							</div>
							<div id="collapse3" class="panel-collapse collapse">
								<div class="box-body">
									<ul class="links-gestao">
										<li>
											<a href="{{ ('/img/estrutura/administracao.png') }}" data-lightbox="administracao">Secretaria Municipal de Administração</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/fazenda.png') }}" data-lightbox="fazenda">Secretaria Municipal de Fazenda</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/controladoria.png') }}" data-lightbox="controladoria">Controladoria Geral do Município</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/transporte.png') }}" data-lightbox="transporte">Secretaria Municipal de Gestão de Transportes</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel">
							<div class="box-header with-border">
								<h4 class="box-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
										Órgãos de Atuação Finalística
									</a>
								</h4>
							</div>
							<div id="collapse4" class="panel-collapse collapse">
								<div class="box-body">
									<ul class="links-gestao">
										<li>
											<a href="{{ ('/img/estrutura/agricultura.png') }}" data-lightbox="agricultura">Secretaria Municipal de Agricultura e Interior</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/economico.png') }}" data-lightbox="economico">Secretaria Municipal de Desenvolvimento Econômico</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/urbano.png') }}" data-lightbox="urbano">Secretaria Municipal de Desenvolvimento Urbano</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/lazer.png') }}" data-lightbox="lazer">Secretaria Municipal de Esporte e Lazer</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/obras.png') }}" data-lightbox="obras">Secretaria Municipal de Obras</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/transito.png') }}" data-lightbox="transito">Secretaria Municipal de Segurança e Trânsito</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/turismo.png') }}" data-lightbox="turismo">Secretaria Municipal de Cultura e Turismo</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/social.png') }}" data-lightbox="social">Secretaria Municipal de Desenvolvimento Social</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/educacao.png') }}" data-lightbox="educacao">Secretaria Municipal de Educação</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/social.png') }}" data-lightbox="saude">Secretaria Municipal de Saúde</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/serUrbano.png') }}" data-lightbox="servicosUrbanos">Secretaria Municipal de Serviços Urbanos</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/ambiente.png') }}" data-lightbox="ambiente">Secretaria Municipal de Meio Ambiente</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

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
@endsection @section('scriptsadd')
<link rel="stylesheet" href="{{ asset('/dist/css/lightbox.min.css') }}" />
<script src="{{ asset('/dist/js/lightbox.min.js') }}"></script>
@endsection