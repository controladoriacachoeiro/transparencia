@extends('layouts.app') 
@section('htmlheader_title', 'Prestação de Contas') 

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
					<li class="active">Prestação de Contas</li>
				</ol>        
			</div>
		</div>            
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">

			<div class="box-header with-border with-border-top" style="padding-top: 15px;">
				<h3 class="box-title">Parecer Prévio</h3>
			</div>
			
			<div class="box-group box-body text-justify" style="padding-bottom: 20px" id="accordion3">				
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion3" href="#collapse7">
								2014
							</a>
						</h4>
					</div>

					<div id="collapse7" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">								
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadControleInternoParecerPrevio', ['ano' => '2014', 'nomeArquivo' => 'PTCC-PARECER-01-201800.pdf'])}}">Resultado do Julgamento pelo Poder Legislativo</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadControleInternoParecerPrevio', ['ano' => '2014', 'nomeArquivo' => 'PTCE-001-B.pdf'])}}">Parecer Prévio do Tribunal de Contas</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
				
			<div class="box-header with-border">
				<h3 class="box-title">Balanço Anual</h3>
			</div>

			<!-- /.box-header -->
			<div class="box-group box-body text-justify" id="accordion">
				<!--2013-->
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
								2013
							</a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">
								<!--balanco-->
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/demreceita">Demonstrativo da Receita e Despesa Segundo Categorias Econômicas</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/resecat">Receitas Segundo as Categorias Econômicas</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/nadese">Natureza da Despeza Segundo a Categoria Econômica</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/progtrab">Programa de Trabalho</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/derepa">Demonstrativo dos Restos a Pagar</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/demfun">Demonstrativo de Função, Subfunção, Programa por Projeto e Atividade</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/demdes">Demonstrativo da Despesa por Orgão e Funções</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/compde">Comparativo da Despesa Autorizada e a Realizada</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/balorc">Balanço Orçamentario - BALORC</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/balfin">Balanço Financeiro - BALFIN</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/balpat">Balanço Patrimonial - BALPAT</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/demvap">Demonstrativo das Variações Patrimoniais - DEMVAP</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/demdif">Demonstração da Dívida Fundada - DEMDIF</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/demdfl">Demonstração da Dívida Flutuante - DEMDFL</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/balver">Balancete de Verificação Contábil - BALVER</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/boletin">Boletim Diário</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/capabalanco">Capa Balanço 2013 e Sumário</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/demsaude">Demonstrativo Aplicação com Saúde</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/fundeb">Parecer de Aprovação Contas 2013 Conselho Fundeb</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/aprovsaude">Parecer de Aprovação Contas 2013 Conselho Saúde</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/relges">Relatório de Gestão- Prestação de Contas Anual 2013 PMCI - RELGES</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2013/balanco/respag">Resto a Pagar 2013</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--2013-->

				<!--2014-->
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
								2014
							</a>
						</h4>
					</div>
					<div id="collapse4" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">
								<!--balanco-->
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2014/balanco/balfin">Balanço Financeiro - BALFIN</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2014/balanco/balpat">Balanço Patrimonial - BALPAT</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2014/balanco/balver">Balancete de Verificação Contábil - BALVER</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2014/balanco/demdfl">Demonstração da Dívida Flutuante - DEMDFL</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2014/balanco/demdfl">Demonstração da Dívida Flutuante - DEMDFL</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2014/balanco/proexe">Pronunciamento Expresso</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2014/balanco/relges">Relatório de Gestão- Prestação de Contas Anual 2013 PMCI - RELGES</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2014/balanco/reluci">Relatório Conclusivo</a>
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="/download/pca/2014/balanco/relsci">Relatório do Sistema de Controle Interno</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--2014-->

				<!--2015-->
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
								2015
							</a>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">
								<!--consolidado-->
								<li>
									<a class="acessibilidade" href="#consolidado2015" data-toggle="collapse">Consolidado</a>
									<ul id="consolidado2015" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/consolidado/relges">Relatório de Gestão</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/consolidado/balorc">Balanço Orçamentário</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/consolidado/balfin">Balanço Financeiro</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/consolidado/balpat">Balanço Patrimonial</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/consolidado/demvap">Demonstração das Variações Patrimoniais</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/consolidado/demdif">Demonstração da Dívida Fundada Interna</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/consolidado/demdfl">Demonstração da Dívida Flutuante</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/consolidado/demfca">Demonstração dos Fluxos de Caixa</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/consolidado/balver">Balanço de Verificação</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/consolidado/reluci">Relatório Conclusivo</a>
										</li>
									</ul>
								</li>
								<!--fim consolidado-->
								<!--Saude-->
								<li>
									<a class="acessibilidade" href="#saude2015" data-toggle="collapse">Fundo de Saúde Municipal</a>
									<ul id="saude2015" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/fundosaude/relges">Relatório de Gestão</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/fundosaude/balorc">Balanço Orçamentário</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/fundosaude/balfin">Balanço Financeiro</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/fundosaude/balpat">Balanço Patrimonial</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/fundosaude/demvap">Demonstração das Variações Patrimoniais</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/fundosaude/demdif">Demonstração da Dívida Fundada Interna</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/fundosaude/demdfl">Demonstração da Dívida Flutuante</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/fundosaude/demfca">Demonstração dos Fluxos de Caixa</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/fundosaude/balver">Balanço de Verificação</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/fundosaude/reluci">Relatório Conclusivo</a>
										</li>
									</ul>
								</li>
								<!--fim saude-->
								<!--PMCI-->
								<li>
									<a class="acessibilidade" href="#pmci2015" data-toggle="collapse">Prefeitura Municipal de Cachoeiro de Itapemirim</a>
									<ul id="pmci2015" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/pmci/relges">Relatório de Gestão</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/pmci/balorc">Balanço Orçamentário</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/pmci/balfin">Balanço Financeiro</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/pmci/balpat">Balanço Patrimonial</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/pmci/demvap">Demonstração das Variações Patrimoniais</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/pmci/demdif">Demonstração da Dívida Fundada Interna</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/pmci/demdfl">Demonstração da Dívida Flutuante</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/pmci/demfca">Demonstração dos Fluxos de Caixa</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/pmci/balver">Balanço de Verificação</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2015/pmci/reluci">Relatório Conclusivo</a>
										</li>
									</ul>
								</li>
								<!--PMCI-->
							</ul>
						</div>
					</div>
				</div>
				<!--2015-->

				<!--2016-->
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
								2016
							</a>
						</h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">
								<!--consolidado-->
								<li>
									<a class="acessibilidade" href="#consolidado2016" data-toggle="collapse">Consolidado</a>
									<ul id="consolidado2016" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/relges">Relatório de Gestão</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/balorc">Balanço Orçamentário</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/balfin">Balanço Financeiro</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/balpat">Balanço Patrimonial</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/demvap">Demonstração das Variações Patrimoniais</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/reluci">Relatório Conclusivo</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/demcad">Demonstrativo consolidado dos créditos adicionais</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/demrap">Demonstrativo de Restos a Pagar</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/docspca">Documentos Não Estruturados</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/proexe">Pronunciamento Expresso</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/relpre">Relação Consolidada dos Precatórios Judiciais</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/relsci">Relatório do Sistema de Controle Interno</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/consolidado/tvdisp">Termo de Verificação de Disponibilidades</a>
										</li>
									</ul>
								</li>
								<!--fim consolidado-->
								<!--Saude-->
								<li>
									<a class="acessibilidade" href="#saude2016" data-toggle="collapse">Fundo Municipal de Saúde</a>
									<ul id="saude2016" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/balorc">Balanço Orçamentário</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/balfin">Balanço Financeiro</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/balpat">Balanço Patrimonial</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/demvap">Demonstração das Variações Patrimoniais</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/demdat">Demonstrativo da Dívida Ativa</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/reluci">Relatório Conclusivo</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/demrap">Demonstrativo de Restos a Pagar</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/docspca">Documentos Não Estruturados</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/folrgp">Resumo Anual da Folha de Pagamento dos servidores vinculados ao Regime Geral de Previdência Social (RGPS)</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/invalm">Inventário Anual dos Bens em Almoxarifado</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/invimo">Inventário Anual dos Bens Imóveis</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/invint">Inventário Anual dos Bens Intangíveis</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/invmov">Inventário Anual dos Bens Móveis</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/fundosaude/tvdisp">Termo de Verificação de Disponibilidades</a>
										</li>
									</ul>
								</li>
								<!--fim saude-->
								<!--PMCI-->
								<li>
									<a class="acessibilidade" href="#pmci2016" data-toggle="collapse">Prefeitura Municipal de Cachoeiro de Itapemirim</a>
									<ul id="pmci2016" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/relges">Relatório de Gestão</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/balorc">Balanço Orçamentário</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/balfin">Balanço Financeiro</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/balpat">Balanço Patrimonial</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/demvap">Demonstração das Variações Patrimoniais</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/demdat">Demonstrativo da Dívida Ativa</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/demrap">Demonstrativo de Restos a Pagar</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/reluci">Relatório Conclusivo</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/docspca">Documentos Não Estruturados</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/folrgp">Resumo Anual da Folha de Pagamento dos servidores vinculados ao Regime Geral de Previdência Social (RGPS)</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/folrpp">Resumo Anual da Folha de Pagamento dos Servidores Vinculados ao Regime Próprio de Previdência Social (RPPS)</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/invalm">Inventário Anual dos Bens em Almoxarifado</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/invimo">Inventário Anual dos Bens Imóveis</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/invint">Inventário Anual dos Bens Intangíveis</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/invmov">Inventário Anual dos Bens Móveis</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/proexe">Pronunciamento Expresso</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="/download/pca/2016/pmci/tvdisp">Termo de Verificação de Disponibilidades</a>
										</li>
									</ul>
								</li>
								<!--PMCI-->
							</ul>
						</div>
					</div>
				</div>
				<!--2016-->

				<!--2017-->
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
								2017
							</a>
						</h4>
					</div>
					<div id="collapse5" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">
								<!--consolidado-->
								<li>
									<a class="acessibilidade" href="#consolidado2017" data-toggle="collapse">Consolidado</a>
									<ul id="consolidado2017" class="collapse" class="links-gestao">
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_I_-_Balanco_Orcamentario_-_RPNP.pdf'])}}">Anexo I - Balanço Orçamentário - RPNP</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_II_-_Balanco_Orcamentario_-_RPP_e_RPNP_Liquidados.pdf'])}}">Anexo II - Balanço Orçamentário - RPP e RPNP Liquidados</a>
										</li>
										<li> 
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_VII_-_Demonstrativo_por_Funcao,_Subfuncao_e_Programa_por_Projeto-Atividade.pdf'])}}">Anexo VII - Demonstrativo por Função, Subfunção e Programa por Projeto/Atividade</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_VIII_-_Demonstrativo_por_Funcao,_Subfuncao_e_Programas_conforme_vinculos_com_recursos.pdf'])}}">Anexo VIII - Demonstrativo por Função, Subfunção e Programas conforme vínculos com recursos</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_IX_-_Demonstrativo_da_Despesa_por_Orgao_e_Funcao.pdf'])}}">Anexo IX - Demonstrativo da Despesa por Órgão e Função</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_X_-_Comparativo_da_Receita_Orcada_com_Arrecadada.pdf'])}}">Anexo X - Comparativo da Receita Orçada com Arrecadada</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_XI_-_Comparativo_da_Despesa_Autorizada_com_a_Realizada.pdf'])}}">Anexo XI - Comparativo da Despesa Autorizada com a Realizada</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_XII_-_Balanco_Orcamentario.pdf'])}}">Anexo XII - Balanço Orçamentário</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_XIV_-_Balanco_Patrimonial.pdf'])}}">Anexo XIV - Balanço Patrimonial</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_XV_-_Variacoes_Patrimoniais.pdf'])}}">Anexo XV - Variações Patrimoniais</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_XVI_-_Demonstrativo_da_Divida_Fundada.pdf'])}}">Anexo XVI - Demonstrativo da Dívida Fundada</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_XVII_-_Demonstrativo_dos_Creditos_a_Receber.pdf'])}}">Anexo XVII - Demonstrativo dos Créditos a Receber</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_XVII_-_Demonstrativo_da_Divida_Flutuante.pdf'])}}">Anexo XVII - Demonstrativo da Dívida Flutuante</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Anexo_XVIII_-_Inventario_das_Contas_do_Ativo_Permanente.pdf'])}}">Anexo XVIII - Inventário das Contas do Ativo Permanente</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Balancete_de_Verificacao.pdf'])}}">Balancete de Verificação</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Balanco_Financeiro.pdf'])}}">Balanço Financeiro</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Demonstrativo_do_Superavit-Deficit_Financeiro_apurado_no_Balanco_Patrimonial.pdf'])}}">Demonstrativo do Superávit/Déficit Financeiro apurado no Balanço Patrimonial</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Demonstracao_das_Mutacoes_do_Patrimonio_Liquido.pdf'])}}">Demonstração das Mutações do Patrimônio Líquido</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Demonstracao_dos_Fluxos_de_Caixa.pdf'])}}">Demonstração dos Fluxos de Caixa</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Relatorio_Analitico_dos_Elementos_que_compoem_o_Ativo_Circulante.pdf'])}}">Relatório Analítico dos Elementos que compõem o Ativo Circulante</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Relatorio_Analitico_dos_Elementos_que_compoem_os_Passivos_Circulante_e_nao_Circulante.pdf'])}}">Relatório Analítico dos Elementos que compõem os Passivos Circulante e não Circulante</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'RELOCI.pdf'])}}">RELOCI</a>
										</li>
										<li>
											<a class="acessibilidade" target="_blank" href="{{route('DownloadArquivoPCA', ['ano' => '2017', 'tipo' => 'Consolidado', 'arquivo' => 'Sumario_Geral_da_Receita_por_Fonte_e_da_Despesa_por_Funcoes_de_Governo.pdf'])}}">Sumário Geral da Receita por Fonte e da Despesa por Funções de Governo</a>
										</li>
									</ul>
								</li>
								<!--fim consolidado-->		
							</ul>
						</div>
					</div>
				</div>
				<!--2017-->
			</div>

			

			<div class="box-header with-border with-border-top" style="padding-top: 15px;">
				<h3 class="box-title">Royalties</h3>
			</div>
			
			<div class="box-group box-body text-justify" style="padding-bottom: 20px" id="accordion2">				
				<div class="panel box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse6">
								2017
							</a>
						</h4>
					</div>

					<div id="collapse6" class="panel-collapse collapse">
						<div class="box-body">
							<ul class="links-gestao">								
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscalAno', ['tipoArquivo' => 'royalties' , 'ano' => '2017' ,'nomeArquivo' => 'royalties-2017-receita-despesa.pdf'])}}">Receita/Despesa</a>									
								</li>
								<li>
									<a class="acessibilidade" target="_blank" href="{{route('downloadGestaoFiscalAno', ['tipoArquivo' => 'royalties' , 'ano' => '2017' ,'nomeArquivo' => 'royalties-2017-relacao-pagtos.pdf'])}}">Relação dos Pagamentos</a>									
								</li>								
							</ul>
						</div>
					</div>
				</div>
			</div>


		</div>
		<!-- /.box -->
	</div>
</div>

@endsection 

@section('scriptsadd')

@endsection