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
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Lei nº 13.019/2014</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body text-justify">
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
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- ./col -->
</div>
<!-- /.row -->

@endsection 

@section('scriptsadd')

@endsection