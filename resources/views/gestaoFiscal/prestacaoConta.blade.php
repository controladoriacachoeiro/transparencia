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
            <div class="box-body text-justify" style="font-size:15;">      
              <!--2013-->
              <div class="row">
                <div class="col-md-8">      
                  <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
                  <a  href="#" data-toggle="collapse" data-target="#2013"><font size="4">2013</font></a>
                  <br>
                  <div id="2013" class="collapse">
                    <ul style="list-style: none;">
                      <!--balanco-->
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/demreceita">Demostrativo da Receita e Despesa Segundo Categorias Econômicas</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/resecat">Receitas Segundo as Categorias Econômicas</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/nadese">Natureza da Despeza Segundo a Categoria Econômica</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/progtrab">Programa de Trabalho</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/derepa">Demostrativo dos Restos a Pagar</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/demfun">Demostrativo de Função, Subfunção, Programa por Projeto e Atividade</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/demdes">Demostrativo da Despesa por Orgão e Funções</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/compde">Comparativo da Despesa Autorizada e a Realizada</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/baloc">Balanço Orçamentario</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/balfin">Balanço Financeiro</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/balpat">Balanço Patrimonial</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/demvap">Demostrativo das Variações Patrimoniais</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/demdif">Demostração da Divida Fundada</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/demdfl">Demostração da Divida Flutuante</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/balver">Balancete de Verificação Contábil</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/boletin">Boletim Diário</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/capabalanco">Capa Balanço 2013 e Sumário</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/demsaude">Demostrativo Aplicação com Saúde</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/fundeb">Parecer de Aprovação Contas 2013 Conselho Fundeb</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/aprovsaude">Parecer de Aprovação Contas 2013 Conselho Saúde</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/relgis">Relatório de Gestão- Prestação de Contas Anual 2013 PMCI</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2013/balanco/respag">Resto a Pagar 2013</a></li>
                          
                    </ul> 
                  </div>
                </div>
              </div>

              <!--2015-->
              <div class="row">
                <div class="col-md-8">      
                  <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
                  <a href="#" data-toggle="collapse" data-target="#2015"><font size="4">2015</font></a>
                  <br>
                  <div id="2015" class="collapse">
                    <ul style="list-style: none;">
                      <!--consolidado-->
                      <li><a href="#" data-toggle="collapse" data-target="#consolidado2015"><font size="4">Consolidado</font></a>
                        <ul id="consolidado2015" class="collapse" style="list-style: none;">
                          <li><a href="#" target="_blank"href="/download/pca/2015/consolidado/relges">Relatório de Gestão</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/consolidado/balorc">Balanço Orçamentário</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/consolidado/balfin">Balanço Financeiro</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/consolidado/balpat">Balanço Patrimonial</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/consolidado/demvap">Demostração das Variações Patrimoniais</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/consolidado/demdif">Demostração da Dívida Fundada Interna</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/consolidado/demdfl">Demostração da Dívida Flutuante</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/consolidado/demfca">Demostração dos Fluxos de Caixa</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/consolidado/balver">Balanço de Verificação</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/consolidado/reluci">Relatório Conclusivo</a></li>
                        </ul>
                      </li>
                      <!--fim consolidado-->
                      <!--Saude-->
                      <li><a   href="#"data-toggle="collapse" data-target="#saude2015"><font size="4">Fundo de Saúde Municipal</font></a>
                        <ul id="saude2015" class="collapse" style="list-style: none;">
                          <li><a href="#" target="_blank"href="/download/pca/2015/fundosaude/relges">Relatório de Gestão</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/fundosaude/balorc">Balanço Orçamentário</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/fundosaude/balfin">Balanço Financeiro</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/fundosaude/balpat">Balanço Patrimonial</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/fundosaude/demvap">Demostração das Variações Patrimoniais</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/fundosaude/demdif">Demostração da Dívida Fundada Interna</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/fundosaude/demdfl">Demostração da Dívida Flutuante</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/fundosaude/demfca">Demostração dos Fluxos de Caixa</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/fundosaude/balver">Balanço de Verificação</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/fundosaude/reluci">Relatório Conclusivo</a></li>
                        </ul>
                      </li>
                      <!--fim saude-->
                      <!--PMCI-->
                      <li><a  href="#" data-toggle="collapse" data-target="#pmci2015"><font size="4">Prefeitura Municipal de Cachoeiro de Itapemerim</font></a>
                        <ul id="pmci2015" class="collapse" style="list-style: none;">
                          <li><a href="#" target="_blank"href="/download/pca/2015/pmci/relges">Relatório de Gestão</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/pmci/balorc">Balanço Orçamentário</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/pmci/balfin">Balanço Financeiro</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/pmci/balpat">Balanço Patrimonial</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/pmci/demvap">Demostração das Variações Patrimoniais</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/pmci/demdif">Demostração da Dívida Fundada Interna</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/pmci/demdfl">Demostração da Dívida Flutuante</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/pmci/demfca">Demostração dos Fluxos de Caixa</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/pmci/balver">Balanço de Verificação</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2015/pmci/reloci">Relatório Conclusivo</a></li>
                        </ul>
                      </li>
                      <!--PMCI-->
                    </ul> 
                  </div>
                </div>
              </div>

              <!--2016-->
              <div class="row">
                <div class="col-md-8">      
                  <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
                  <a  href="#"data-toggle="collapse" data-target="#2016"><font size="4">2016</font></a>
                  <br>
                  <div id="2016" class="collapse">
                    <ul style="list-style: none;">
                      <!--consolidado-->
                      <li><a  href="#" data-toggle="collapse" data-target="#consolidado2016"><font size="4">Consolidado</font></a>
                        <ul id="consolidado2016" class="collapse" style="list-style: none;">
                          <li><a  href="#" target="_blank"href="/download/pca/2016/consolidado/relges">Relatório de Gestão</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/balorc">Balanço Orçamentário</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/balfin">Balanço Financeiro</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/balpat">Balanço Patrimonial</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/demvap">Demostração das Variações Patrimoniais</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/reluci">Relatório Conclusivo</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/demcad">Demonstrativo consolidado dos créditos adicionais</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/demrap">Demonstrativo de Restos a Pagar</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/docspca">Documentos Não Estruturados</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/proexe">Pronunciamento Expresso</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/relpre">Relação Consolidada dos Precatórios Judiciais</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/relsci">Relatório do Sistema de Controle Interno</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/consolidado/tvdisp">Termo de Verificação de Disponibilidades</a></li>
                        </ul>
                      </li>
                      <!--fim consolidado-->
                      <!--Saude-->
                      <li><a  href="#" data-toggle="collapse" data-target="#saude2016"><font size="4">Fundo Municipal de Saúde</font></a>
                        <ul id="saude2016" class="collapse" style="list-style: none;">
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/balorc">Balanço Orçamentário</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/balfin">Balanço Financeiro</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/balpat">Balanço Patrimonial</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/demvap">Demostração das Variações Patrimoniais</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/demdat">Demonstrativo da Dívida Ativa</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/reluci">Relatório Conclusivo</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/demrap">Demonstrativo de Restos a Pagar</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/docspca">Documentos Não Estruturados</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/relsci">Relatório do Sistema de Controle Interno</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/folrgp">Resumo Anual da Folha de Pagamento dos servidores vinculados ao Regime Geral de Previdência Social (RGPS)</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/invalm">Inventário Anual dos Bens em Almoxarifad</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/invimo">nventário Anual dos Bens Imóveis</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/invint">Inventário Anual dos Bens Intangíveis</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/invmov">Inventário Anual dos Bens Móveis</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/fundosaude/tvdisp">Termo de Verificação de Disponibilidades</a></li>
                        </ul>
                      </li>
                      <!--fim saude-->
                      <!--PMCI-->
                      <li><a  data-toggle="collapse" data-target="#pmci2016"><font size="4">Prefeitura Municipal de Cachoeiro de Itepemerim</font></a>
                        <ul id="pmci2016" class="collapse" style="list-style: none;">
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/relges">Relatório de Gestão</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/balorc">Balanço Orçamentário</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/balfin">Balanço Financeiro</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/balpat">Balanço Patrimonial</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/demvap">Demostração das Variações Patrimoniais</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/demdat">Demonstrativo da Dívida Ativa</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/demrap">Demonstrativo de Restos a Pagar</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/reluci">Relatório Conclusivo</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/docspca">Documentos Não Estruturados</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/folrgp">Resumo Anual da Folha de Pagamento dos servidores vinculados ao Regime Geral de Previdência Social (RGPS)</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/folrpp">Resumo Anual da Folha de Pagamento dos Servidores Vinculados ao Regime Próprio de Previdência Social (RPPS)</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/invalm">Inventário Anual dos Bens em Almoxarifad</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/invimo">nventário Anual dos Bens Imóveis</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/invint">Inventário Anual dos Bens Intangíveis</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/invmov">Inventário Anual dos Bens Móveis</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/proexe">Pronunciamento Expresso</a></li>
                          <li><a href="#" target="_blank"href="/download/pca/2016/pmci/tvdisp">Termo de Verificação de Disponibilidades</a></li>
                        </ul>
                      </li>
                      <!--PMCI-->
                    </ul> 
                  </div>
                </div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection

@section('scriptsadd')
@endsection