@extends('layouts.app')
@section('htmlheader_title', 'Prestação de Contas')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Balanço Anual</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-group box-body text-justify" id="accordion" style="font-size:15;"> 
              <!--2013-->
              <div class="panel box box-primary">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" >
                      2013
                    </a>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                  <div class="box-body"> 
                  <ul style="list-style-type:circle;line-height:2;font-size:18;">
                      <!--balanco-->
                          <li><a  target="_blank"href="/download/pca/2013/balanco/demreceita">Demostrativo da Receita e Despesa Segundo Categorias Econômicas</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/resecat">Receitas Segundo as Categorias Econômicas</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/nadese">Natureza da Despeza Segundo a Categoria Econômica</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/progtrab">Programa de Trabalho</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/derepa">Demostrativo dos Restos a Pagar</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/demfun">Demostrativo de Função, Subfunção, Programa por Projeto e Atividade</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/demdes">Demostrativo da Despesa por Orgão e Funções</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/compde">Comparativo da Despesa Autorizada e a Realizada</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/balorc">Balanço Orçamentario - BALORC</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/balfin">Balanço Financeiro - BALFIN</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/balpat">Balanço Patrimonial - BALPAT</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/demvap">Demostrativo das Variações Patrimoniais - DEMVAP</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/demdif">Demostração da Divida Fundada - DEMDIF</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/demdfl">Demostração da Divida Flutuante - DEMDFL</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/balver">Balancete de Verificação Contábil - BALVER</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/boletin">Boletim Diário</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/capabalanco">Capa Balanço 2013 e Sumário</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/demsaude">Demostrativo Aplicação com Saúde</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/fundeb">Parecer de Aprovação Contas 2013 Conselho Fundeb</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/aprovsaude">Parecer de Aprovação Contas 2013 Conselho Saúde</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/relges">Relatório de Gestão- Prestação de Contas Anual 2013 PMCI - RELGES</a></li>
                          <li><a  target="_blank"href="/download/pca/2013/balanco/respag">Resto a Pagar 2013</a></li>
                          
                    </ul>        
                  </div>
                </div>
              </div>  
              <!--2013-->

              <!--2015-->
              <div class="panel box box-primary">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" >
                      2015
                    </a>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                <div class="box-body">
                            <ul id="menu1" style="list-style-type:circle;line-height:2;font-size:18;">
                                <!--consolidado-->
                                <li><a href="#" data-toggle="collapse"  data-target="#consolidado2015"><font size="4">Consolidado</font></a>
                                    <ul id="consolidado2015" class="collapse" style="list-style-type:circle;line-height:2;font-size:18;">
                                    <li><a target="_blank"href="/download/pca/2015/consolidado/relges">Relatório de Gestão</a></li>
                                    <li><a target="_blank"href="/download/pca/2015/consolidado/balorc">Balanço Orçamentário</a></li>
                                    <li><a target="_blank"href="/download/pca/2015/consolidado/balfin">Balanço Financeiro</a></li>
                                    <li><a target="_blank"href="/download/pca/2015/consolidado/balpat">Balanço Patrimonial</a></li>
                                    <li><a target="_blank"href="/download/pca/2015/consolidado/demvap">Demostração das Variações Patrimoniais</a></li>
                                    <li><a target="_blank"href="/download/pca/2015/consolidado/demdif">Demostração da Dívida Fundada Interna</a></li>
                                    <li><a target="_blank"href="/download/pca/2015/consolidado/demdfl">Demostração da Dívida Flutuante</a></li>
                                    <li><a target="_blank"href="/download/pca/2015/consolidado/demfca">Demostração dos Fluxos de Caixa</a></li>
                                    <li><a target="_blank"href="/download/pca/2015/consolidado/balver">Balanço de Verificação</a></li>
                                    <li><a target="_blank"href="/download/pca/2015/consolidado/reluci">Relatório Conclusivo</a></li>
                                </ul>
                                </li>
                                <!--fim consolidado-->
                                <!--Saude-->
                                <li><a href="#" data-toggle="collapse"  data-target="#saude2015"><font size="4">Fundo de Saúde Municipal</font></a>
                                    <ul id="saude2015" class="collapse" style="list-style-type:circle;line-height:2;font-size:18;">
                                        <li><a target="_blank"href="/download/pca/2015/fundosaude/relges">Relatório de Gestão</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/fundosaude/balorc">Balanço Orçamentário</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/fundosaude/balfin">Balanço Financeiro</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/fundosaude/balpat">Balanço Patrimonial</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/fundosaude/demvap">Demostração das Variações Patrimoniais</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/fundosaude/demdif">Demostração da Dívida Fundada Interna</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/fundosaude/demdfl">Demostração da Dívida Flutuante</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/fundosaude/demfca">Demostração dos Fluxos de Caixa</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/fundosaude/balver">Balanço de Verificação</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/fundosaude/reluci">Relatório Conclusivo</a></li>
                                    </ul>
                                </li>
                                <!--fim saude-->
                                <!--PMCI-->
                                <li><a href="#" data-toggle="collapse"  data-target="#pmci2015"><font size="4">Prefeitura Municipal de Cachoeiro de Itapemerim</font></a>
                                    <ul id="pmci2015" class="collapse" style="list-style-type:circle;line-height:2;font-size:18;">
                                        <li><a target="_blank"href="/download/pca/2015/pmci/relges">Relatório de Gestão</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/pmci/balorc">Balanço Orçamentário</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/pmci/balfin">Balanço Financeiro</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/pmci/balpat">Balanço Patrimonial</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/pmci/demvap">Demostração das Variações Patrimoniais</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/pmci/demdif">Demostração da Dívida Fundada Interna</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/pmci/demdfl">Demostração da Dívida Flutuante</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/pmci/demfca">Demostração dos Fluxos de Caixa</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/pmci/balver">Balanço de Verificação</a></li>
                                        <li><a target="_blank"href="/download/pca/2015/pmci/reluci">Relatório Conclusivo</a></li>
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
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" >
                      2016
                    </a>
                  </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                <div class="box-body"> 
                        <ul style="list-style-type:circle;line-height:2;font-size:18;">
                            <!--consolidado-->
                            <li><a href="#" data-toggle="collapse" data-target="#consolidado2016"><font size="4">Consolidado</font></a>
                                <ul id="consolidado2016" class="collapse" style="list-style-type:circle;line-height:2;font-size:18;">
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/relges">Relatório de Gestão</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/balorc">Balanço Orçamentário</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/balfin">Balanço Financeiro</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/balpat">Balanço Patrimonial</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/demvap">Demostração das Variações Patrimoniais</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/reluci">Relatório Conclusivo</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/demcad">Demonstrativo consolidado dos créditos adicionais</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/demrap">Demonstrativo de Restos a Pagar</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/docspca">Documentos Não Estruturados</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/proexe">Pronunciamento Expresso</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/relpre">Relação Consolidada dos Precatórios Judiciais</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/relsci">Relatório do Sistema de Controle Interno</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/consolidado/tvdisp">Termo de Verificação de Disponibilidades</a></li>
                                </ul>
                            </li>
                            <!--fim consolidado-->
                            <!--Saude-->
                            <li><a href="#" data-toggle="collapse" data-target="#saude2016"><font size="4">Fundo Municipal de Saúde</font></a>
                                <ul id="saude2016" class="collapse" style="list-style-type:circle;line-height:2;font-size:18;">
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/balorc">Balanço Orçamentário</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/balfin">Balanço Financeiro</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/balpat">Balanço Patrimonial</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/demvap">Demostração das Variações Patrimoniais</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/demdat">Demonstrativo da Dívida Ativa</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/reluci">Relatório Conclusivo</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/demrap">Demonstrativo de Restos a Pagar</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/docspca">Documentos Não Estruturados</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/relsci">Relatório do Sistema de Controle Interno</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/folrgp">Resumo Anual da Folha de Pagamento dos servidores vinculados ao Regime Geral de Previdência Social (RGPS)</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/invalm">Inventário Anual dos Bens em Almoxarifad</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/invimo">nventário Anual dos Bens Imóveis</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/invint">Inventário Anual dos Bens Intangíveis</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/invmov">Inventário Anual dos Bens Móveis</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/fundosaude/tvdisp">Termo de Verificação de Disponibilidades</a></li>
                                </ul>
                            </li>
                            <!--fim saude-->
                            <!--PMCI-->
                            <li><a href="#" data-toggle="collapse" data-target="#pmci2016"><font size="4">Prefeitura Municipal de Cachoeiro de Itepemerim</font></a>
                                <ul id="pmci2016" class="collapse" style="list-style-type:circle;line-height:2;font-size:18;">
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/relges">Relatório de Gestão</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/balorc">Balanço Orçamentário</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/balfin">Balanço Financeiro</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/balpat">Balanço Patrimonial</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/demvap">Demostração das Variações Patrimoniais</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/demdat">Demonstrativo da Dívida Ativa</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/demrap">Demonstrativo de Restos a Pagar</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/reluci">Relatório Conclusivo</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/docspca">Documentos Não Estruturados</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/folrgp">Resumo Anual da Folha de Pagamento dos servidores vinculados ao Regime Geral de Previdência Social (RGPS)</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/folrpp">Resumo Anual da Folha de Pagamento dos Servidores Vinculados ao Regime Próprio de Previdência Social (RPPS)</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/invalm">Inventário Anual dos Bens em Almoxarifad</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/invimo">nventário Anual dos Bens Imóveis</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/invint">Inventário Anual dos Bens Intangíveis</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/invmov">Inventário Anual dos Bens Móveis</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/proexe">Pronunciamento Expresso</a></li>
                                    <li><a  target="_blank"href="/download/pca/2016/pmci/tvdisp">Termo de Verificação de Disponibilidades</a></li>
                                </ul>
                            </li>
                            <!--PMCI-->
                        </ul>        
                    </div>
                </div>
              </div>  
              <!--2016-->
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection

@section('scriptsadd')
<script>
$("a").click(function() {
  $("ul").removeClass('in');
});
</script>
@endsection