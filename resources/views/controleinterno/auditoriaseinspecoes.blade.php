@extends('layouts.app') 
@section('htmlheader_title', 'Auditorias e Inspeções do Controle Interno') 

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
                    <li class="active">Auditorias e Inspeções do Controle Interno</li>
                </ol>        
            </div>
        </div>            
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">

			<div class="box-header with-border with-border-top" style="padding-top: 15px;">
				<h3 class="box-title">Relatório de Auditoria Interna</h3>
			</div>
			
			<div class="box-group box-body text-justify" style="padding-bottom: 20px">				
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse">
								2017
							</a>
						</h4>
					</div>

					<div id="collapse" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">								
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadControleInternoAuditoriasEInspecoes', ['nomeArquivo' => 'Relatório de auditoria interna 01-2017.pdf'])}}">Relatório de Auditoria Interna 01/2017</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadControleInternoAuditoriasEInspecoes', ['nomeArquivo' => 'Relatório de auditoria interna 02-2017.pdf'])}}">Relatório de Auditoria Interna 02/2017</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadControleInternoAuditoriasEInspecoes', ['nomeArquivo' => 'Relatório de auditoria interna 03-2017.pdf'])}}">Relatório de Auditoria Interna 03/2017</a>
                                </li>
                                <li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadControleInternoAuditoriasEInspecoes', ['nomeArquivo' => 'Relatório de auditoria interna 04-2017.pdf'])}}">Relatório de Auditoria Interna 04/2017</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>

@endsection 

@section('scriptsadd')

@endsection