@extends('layouts.app') 
@section('htmlheader_title', 'Lei nº 13.019/2014')

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
					{{-- <li class="active">Manual de Prestação de Contas da Lei nº 13.019/2014</li> --}}
					<li class="active">Lei nº 13.019/2014</li>
                </ol>        
            </div>
        </div>            
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border with-border-top" style="padding-top: 15px;">
				<h3 class="box-title">Lei nº 13.019/2014</h3>
			</div>

			<div class="box-group box-body text-justify" style="padding-bottom: 20px" id="accordion">				
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
								Anexos
							</a>
						</h4>
					</div>

					<div id="collapse1" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 01 - Modelo de Ofício de Encaminhamento da Proposta.docx'])}}">Anexo 01 - Modelo de Ofício de Encaminhamento da Proposta</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 02 - Modelo de plano de trabalho.docx'])}}">Anexo 02 - Modelo de plano de trabalho</a>
								</li>            
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 03 - Modelo declaração capacidade técnica operacional.docx'])}}">Anexo 03 - Modelo declaração capacidade técnica operacional</a>
								</li>     
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 04 - Declaração de início das atividades.docx'])}}">Anexo 04 - Declaração de início das atividades</a>
								</li> 
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 05 - Declaração endereço de funcionamento.docx'])}}">Anexo 05 - Declaração endereço de funcionamento</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 06 - Relação nominal de dirigentes.docx'])}}">Anexo 06 - Relação nominal de dirigentes</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 07 - Declaração não remuneração servidor.docx'])}}">Anexo 07 - Declaração não remuneração servidor</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 08 - Declaração de que não emprega menor.docx'])}}">Anexo 08 - Declaração de que não emprega menor</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 09 - Termo de encaminhamento abertura de conta bancária.docx'])}}">Anexo 09 - Termo de encaminhamento abertura de conta bancária</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 10 - Declaração de abertura de conta específica.docx'])}}">Anexo 10 - Declaração de abertura de conta específica</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 11 - Declaração de Adimplência com o Poder Público.docx'])}}">Anexo 11 - Declaração de Adimplência com o Poder Público</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 12 - Declaração de publicidade da parceria.docx'])}}">Anexo 12 - Declaração de publicidade da parceria</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 13 - Declaração contador responsável.docx'])}}">Anexo 13 - Declaração contador responsável</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 14 - Check list de normas estatutárias.docx'])}}">Anexo 14 - Check list de normas estatutárias</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 15 - Mapa comparativo de preços.xlsx'])}}">Anexo 15 - Mapa comparativo de preços</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 16 - Modelo de Ofício de Encaminhamento da Prestação de Contas.docx'])}}">Anexo 16 - Modelo de Ofício de Encaminhamento da Prestação de Contas</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 17 - Modelo de relatório de execução do objeto.docx'])}}">Anexo 17 - Modelo de relatório de execução do objeto</a>
								</li>
								<li> 
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 18 - Modelo de relatório de bens adquiridos.docx'])}}">Anexo 18 - Modelo de relatório de bens adquiridos</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 19 - Modelo de relatório fotográfico.docx'])}}">Anexo 19 - Modelo de relatório fotográfico</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 20 - Modelo de relatório de execução física e financeira.xlsx'])}}">Anexo 20 - Modelo de relatório de execução física e financeira</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 21 - Modelo de relação de pagamentos.xlsx'])}}">Anexo 21 - Modelo de relação de pagamentos</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 22 - Modelo de conciliação bancária.xlsx'])}}">Anexo 22 - Modelo de conciliação bancária</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 23 - Modelo de declaração de guarda da documentação original apresentada na prestação de contas.docx'])}}">Anexo 23 - Modelo de declaração de guarda da documentação original apresentada na prestação de contas</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 24 - Relatório de monitoramento e avaliação - gestor da parceria.docx'])}}">Anexo 24 - Relatório de monitoramento e avaliação - gestor da parceria</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadLei130192014', ['nomeArquivo' => 'Anexo 25 - Parecer comissão de monitoramento e avaliação.docx'])}}">Anexo 25 - Parecer comissão de monitoramento e avaliação</a>
								</li>
							</ul>     
						</div>
					</div>
				</div>
			</div>

			<div class="box-header with-border with-border-top" style="padding-top: 15px;">
				<h3 class="box-title">Prestação de Contas</h3>
			</div>
			
			<div class="box-group box-body text-justify" style="padding-bottom: 20px" id="accordion2">				
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
								2017
							</a>
						</h4>
					</div>

					<div id="collapse2" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">
								<!-- APAE - Associação de Pais e Amigos dos Excepcionais -->
								<li>
									<a class="acessibilidade" href="#apae2017" data-toggle="collapse">APAE - Associação de Pais e Amigos dos Excepcionais</a>
									<ul id="apae2017" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_006_2017">Termo de Colaboração nº 006/2017</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_007_2017">Termo de Colaboração nº 007/2017</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_013_2017">Termo de Colaboração nº 013/2017</a>
										</li>
									</ul>
								</li>
								<!-- APAE - Associação de Pais e Amigos dos Excepcionais -->

								<!-- ASILO JOÃO XXIII -->
								<li>
									<a class="acessibilidade" href="#joaoxxiii2017" data-toggle="collapse">ASILO JOÃO XXIII</a>
									<ul id="joaoxxiii2017" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_004_2017">Termo de Colaboração nº 004/2017</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_008_2017">Termo de Colaboração nº 008/2017</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_009_2017">Termo de Colaboração nº 009/2017</a>
										</li>
									</ul>
								</li>
								<!-- ASILO JOÃO XXIII -->

								<!-- INSTITUTO SUL CAPIXABA DE ATENÇÃO À SAÚDE E ASSISTÊNCIA SOCIAL (Lar Adelson Rebello Moreira) -->
								<li>
									<a class="acessibilidade" href="#laradelsonrebello2017" data-toggle="collapse">INSTITUTO SUL CAPIXABA DE ATENÇÃO À SAÚDE E ASSISTÊNCIA SOCIAL (Lar Adelson Rebello Moreira)</a>
									<ul id="laradelsonrebello2017" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_005_2017">Termo de Colaboração nº 005/2017</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_014_2017">Termo de Colaboração nº 014/2017</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_015_2017">Termo de Colaboração nº 015/2017</a>
										</li>
									</ul>
								</li>
								<!-- INSTITUTO SUL CAPIXABA DE ATENÇÃO À SAÚDE E ASSISTÊNCIA SOCIAL (Lar Adelson Rebello Moreira) -->

								<!-- LAR NINA ARUEIRA -->
								<li>
									<a class="acessibilidade" href="#ninaarueira2017" data-toggle="collapse">LAR NINA ARUEIRA</a>
									<ul id="ninaarueira2017" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_010_2017">Termo de Colaboração nº 010/2017</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_011_2017">Termo de Colaboração nº 011/2017</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_012_2017">Termo de Colaboração nº 012/2017</a>
										</li>
									</ul>
								</li>
								<!-- LAR NINA ARUEIRA -->
							</ul>
						</div>
					</div>
				</div>

				
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
								2018
							</a>
						</h4>
					</div>

					<div id="collapse3" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">
								<!-- A.A.T.R. Associação de Apoio Terapêutico Reviver -->
								<li>
									<a class="acessibilidade" href="#aatr2018" data-toggle="collapse">A.A.T.R. Associação de Apoio Terapêutico Reviver</a>
									<ul id="aatr2018" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="/downloadPrestacaoDeContasLei130192014/Termo_003_2018">Termo de Colaboração nº 003/2018</a>
										</li>
									</ul>
								</li>
								<!-- A.A.T.R. Associação de Apoio Terapêutico Reviver -->
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!-- /.box -->
	</div>
	<!-- ./col -->
</div>
<!-- /.row -->

@endsection 

@section('scriptsadd')

@endsection