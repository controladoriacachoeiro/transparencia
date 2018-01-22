@extends('layouts.app') @section('htmlheader_title', 'Estrutura Organizacional')
@section('cssheader')
<link href="{{ asset('/dist/css/prettyPhoto.css') }}" rel="stylesheet">
@endsection @section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-body">
				<div class="col-md-8">
					<a href="{{ ('/img/estrutura/organograma.png') }}" title="Estrutura Organizacional de Prefeitura Municipal de Cachoeiro de Itapemirim" rel="prettyPhoto[unusual]">
						<img src="{{ ('/img/estrutura/organograma.png') }}" class="organograma">
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
											<a href="{{ ('/img/estrutura/gabinete.png') }}" title="Gabinete do Prefeito" rel="prettyPhoto[unusual]">Gabinete do Prefeito</a>
										</li>
										<li>
											<a href="http://agersa.es.gov.br/2016/agersa-organograma.asp" target="_blank">Agência Municipal de Regulação dos Serviços Públicos Delegados de Cachoeiro de Itapemirim</a>
										</li>
										<li>
											<a href="http://www.dataci.es.gov.br/arquivos/organograma.pdf" target="_blank">Empresa de Tecnologia da Informação de Cachoeiro de Itapemirim</a>
										</li>
										<li>
											<a href="http://ipaci.es.gov.br/quemsomos.aspx" target="_blank">Instito de Previdência do Município de Cachoeiro de Itapemirim</a>
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
											<a href="{{ ('/img/estrutura/governo.png') }}" title="Secretaria Municipal de Governo" rel="prettyPhoto[unusual]">Secretaria Municipal de Governo</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/procuradoria.png') }}" title="Procuradoria Geral do Município" rel="prettyPhoto[unusual]">Procuradoria Geral do Município</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/analise.png') }}" title="Secretaria Municipal de Modernização e Análise de Custos" rel="prettyPhoto[unusual]">Secretaria Municipal de Modernização e Análise de Custos</a>
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
											<a href="{{ ('/img/estrutura/administracao.png') }}" title="Secretaria Municipal de Administração" rel="prettyPhoto[unusual]">Secretaria Municipal de Administração</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/fazenda.png') }}" title="Secretaria Municipal de Fazenda" rel="prettyPhoto[unusual]">Secretaria Municipal de Fazenda</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/controladoria.png') }}" title="Controladoria Geral do Município" rel="prettyPhoto[unusual]">Controladoria Geral do Município</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/transporte.png') }}" title="Secretaria Municipal de Gestão de Transportes" rel="prettyPhoto[unusual]">Secretaria Municipal de Gestão de Transportes</a>
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
									<ul class=" gallery links-gestao">
										<li>
											<a href="{{ ('/img/estrutura/agricultura.png') }}" title="Secretaria Municipal de Agricultura e Interior" rel="prettyPhoto[unusual]">Secretaria Municipal de Agricultura e Interior</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/economico.png') }}" title="Secretaria Municipal de Desenvolvimento Econômico" rel="prettyPhoto[unusual]">Secretaria Municipal de Desenvolvimento Econômico</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/urbano.png') }}" title="Secretaria Municipal de Desenvolvimento Urbano" rel="prettyPhoto[unusual]">Secretaria Municipal de Desenvolvimento Urbano</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/lazer.png') }}" title="Secretaria Municipal de Esporte e Lazer" rel="prettyPhoto[unusual]">Secretaria Municipal de Esporte e Lazer</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/obras.png') }}" title="Secretaria Municipal de Obras" rel="prettyPhoto[unusual]">Secretaria Municipal de Obras</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/transito.png') }}" title="Secretaria Municipal de Segurança e Trânsito" rel="prettyPhoto[unusual]">Secretaria Municipal de Segurança e Trânsito</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/turismo.png') }}" title="Secretaria Municipal de Cultura e Turismo" rel="prettyPhoto[unusual]">Secretaria Municipal de Cultura e Turismo</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/social.png') }}" title="Secretaria Municipal de Desenvolvimento Social" rel="prettyPhoto[unusual]">Secretaria Municipal de Desenvolvimento Social</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/educacao.png') }}"  title="Secretaria Municipal de Educação" rel="prettyPhoto[unusual]">Secretaria Municipal de Educação</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/saude.png') }}" title="Secretaria Municipal de Saúde" rel="prettyPhoto[unusual]">Secretaria Municipal de Saúde</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/serUrbano.png') }}" title="Secretaria Municipal de Serviços Urbanos" rel="prettyPhoto[unusual]">Secretaria Municipal de Serviços Urbanos</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/ambiente.png') }}" title="Secretaria Municipal de Meio Ambiente" rel="prettyPhoto[unusual]">Secretaria Municipal de Meio Ambiente</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection @section('scriptsadd')
<script src="{{ asset('/dist/js/jquery.prettyPhoto.js') }}"></script>
<script>
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto({
			show_title: true, /* true/false */
			allow_resize: false, /* Resize the photos bigger than viewport. true/false */
			counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
			wmode: 'opaque', /* Set the flash wmode attribute */
			modal: false, /* If set to true, only the close button will close the window */
			deeplinking: false, /* Allow prettyPhoto to update the url to enable deeplinking. */
			social_tools: false,
			image_markup: '<img id="fullResImage" src="{path}" />'
		});
	});


</script>
@endsection