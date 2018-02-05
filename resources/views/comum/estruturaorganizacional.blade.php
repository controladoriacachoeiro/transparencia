@extends('layouts.app') 
@section('htmlheader_title', 'Estrutura Organizacional')
@section('cssheader')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.6/css/lightgallery.min.css">
@endsection 

@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body">
				<div class="col-md-8">					
					<div id="lightgallery">
						<a href="{{ ('/img/estrutura/organograma.jpg') }}">
							<img src="{{ ('/img/estrutura/organograma.jpg') }}" class="organograma" />
						</a>						
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="box-group box-body" id="accordion">
						<div class="panel">
							<div class="box-header with-border">
								<h4 class="box-title">
									<div id="lightgallery2">									
										<a href="{{ ('/img/estrutura/gabinete.jpg') }}" title="Gabinete do Prefeito">Gabinete do Prefeito</a>
									</div>
								</h4>
							</div>							
							<div id="collapse1" class="panel-collapse collapse">								
								<div class="box-body">
									<ul class="links-gestao">
										<li>																					
											
										</li>
										<!--<li>
											<a href="http://agersa.es.gov.br/2016/agersa-organograma.asp" target="_blank">Agência Municipal de Regulação dos Serviços Públicos Delegados de Cachoeiro de Itapemirim</a>
										</li>
										<li>
											<a href="http://www.dataci.es.gov.br/arquivos/organograma.pdf" target="_blank">Empresa de Tecnologia da Informação de Cachoeiro de Itapemirim</a>
										</li>
										<li>
											<a href="http://ipaci.es.gov.br/quemsomos.aspx" target="_blank">Instito de Previdência do Município de Cachoeiro de Itapemirim</a>
										</li>-->
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
											<a href="{{ ('/img/estrutura/governo.jpg') }}" title="Secretaria Municipal de Governo">Secretaria Municipal de Governo</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/procuradoria.jpg') }}" title="Procuradoria Geral do Município">Procuradoria Geral do Município</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/analise.jpg') }}" title="Secretaria Municipal de Modernização e Análise de Custos">Secretaria Municipal de Modernização e Análise de Custos</a>
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
											<a href="{{ ('/img/estrutura/administracao.jpg') }}" title="Secretaria Municipal de Administração">Secretaria Municipal de Administração</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/fazenda.jpg') }}" title="Secretaria Municipal de Fazenda">Secretaria Municipal de Fazenda</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/controladoria.jpg') }}" title="Controladoria Geral do Município">Controladoria Geral do Município</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/transporte.jpg') }}" title="Secretaria Municipal de Gestão de Transportes">Secretaria Municipal de Gestão de Transportes</a>
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
									<ul class="gallery links-gestao">
										<li>
											<a href="{{ ('/img/estrutura/agricultura.jpg') }}" title="Secretaria Municipal de Agricultura e Interior">Secretaria Municipal de Agricultura e Interior</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/economico.jpg') }}" title="Secretaria Municipal de Desenvolvimento Econômico">Secretaria Municipal de Desenvolvimento Econômico</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/urbano.jpg') }}" title="Secretaria Municipal de Desenvolvimento Urbano" >Secretaria Municipal de Desenvolvimento Urbano</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/lazer.jpg') }}" title="Secretaria Municipal de Esporte e Lazer"
											>Secretaria Municipal de Esporte e Lazer</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/obras.jpg') }}" title="Secretaria Municipal de Obras">Secretaria Municipal de Obras</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/transito.jpg') }}" title="Secretaria Municipal de Segurança e Trânsito">Secretaria Municipal de Segurança e Trânsito</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/turismo.jpg') }}" title="Secretaria Municipal de Cultura e Turismo">Secretaria Municipal de Cultura e Turismo</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/social.jpg') }}" title="Secretaria Municipal de Desenvolvimento Social">Secretaria Municipal de Desenvolvimento Social</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/educacao.jpg') }}"  title="Secretaria Municipal de Educação">Secretaria Municipal de Educação</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/saude.jpg') }}" title="Secretaria Municipal de Saúde">Secretaria Municipal de Saúde</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/servUrbanos.jpg') }}" title="Secretaria Municipal de Serviços Urbanos">Secretaria Municipal de Serviços Urbanos</a>
										</li>
										<li>
											<a href="{{ ('/img/estrutura/ambiente.jpg') }}" title="Secretaria Municipal de Meio Ambiente">Secretaria Municipal de Meio Ambiente</a>
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
@endsection 

@section('scriptsadd')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.6/js/lightgallery.min.js"></script>
<script src="{{ asset('/js/lg-zoom.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#lightgallery").lightGallery({
			hideBarsDelay: 2000
		});
		$("#lightgallery2").lightGallery({
			hideBarsDelay: 2000
		});
		$(".links-gestao li").lightGallery({
			hideBarsDelay: 2000
		}); 
    });	
</script>
@endsection