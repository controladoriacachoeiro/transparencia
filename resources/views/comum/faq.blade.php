@extends('layouts.app')
@section('htmlheader_title', 'FAQ')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <!--Panel-->
                <div class="panelFaq">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        1.  A quem se aplica a LRF?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>A LRF aplica-se à União, aos Estados, ao Distrito Federal e aos Municípios, compreendendo os Poderes Legislativo - neste incluídos os Tribunais de Contas -, Executivo e Judiciário, as respectivas administrações diretas, fundos, autarquias, fundações e empresas estatais dependentes. (art. 1º, § 2º)</p>
                    </div>
                  </div>
                </div>
                <!--/Panel-->
                <!--Panel-->
                <div class="panelFaq">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                       2. O que vem a ser administração direta?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>É aquela atividade de prestação ou execução de serviços públicos feita pelos próprios órgãos integrantes da estrutura do aparelho administrativo. São as Secretarias Municipais, as diretorias, os departamentos, os setores, entre outros órgãos prestadores ou executores de serviço.</p>
                    </div>
                  </div>
                </div>
                <!--/Panel-->
               <!--Panel-->
                <div class="panelFaq">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                      3. O que vem a ser fundo ?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Fundo, na administração pública, é o produto de receitas especificadas que, por lei, se vinculam à realização de determinados objetivos ou serviços, facultada a adoção de normas peculiares de aplicação. Os Municípios possuem vários fundos instituídos, como por exemplo: o fundo municipal da assistência social e o fundo municipal da saúde. Estes fundos integram o orçamento do Município (art. 71, da Lei 4.320/64).</p>
                    </div>
                  </div>
                </div>
                <!--/Panel-->
                <!--Panel-->
                <div class="panelFaq">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                      4. O que são empresas estatais dependentes?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>São as empresas controladas que recebam do ente controlados recursos financeiros para pagamento de despesas com pessoal ou de custeio em geral ou de capital, excluídos, no último caso, aqueles provenientes de aumento de participação acionária. (art. 2º, I e II)</p>
                    </div>
                  </div>
                </div>
                <!--/Panel-->
                <!--Panel-->
                <div class="panelFaq">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                      5. O que se entende por receita corrente líquida, no caso dos Municípios?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Receita Corrente Líquida é a soma de toda a receita corrente (tributárias, de contribuições, patrimoniais, industriais, agropecuárias, de serviços, transferências correntes) arrecadada no mês em referência e nos onze anteriores, deduzidos: a) a contribuição dos servidores para o custeio do seu sistema de previdência e assistência social e as receitas provenientes da compensação financeira citada no § 9º da Constituição; b) as receitas em duplicidade; c) e, por último, considerar no cálculo o resultado líquido do FUNDEF. (art. 2º, IV, e §1º)</p>
                    </div>
                  </div>
                </div>
                <!--/Panel-->
                <!--Panel-->
                <div class="panelFaq">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                     6. O que é o Plano Plurianual – PPA?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse6" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>De acordo com a Constituição Federal, o PPA é o instrumento orçamentário destinado a estabelecer as diretrizes, objetivos e metas da administração pública dos entes federados para as despesas de capital (relativas a investimentos) e outras que dela decorram e para as relativas aos programas de duração continuada (art. 165, § 1º). Terá validade de 4 (quatro) anos, cuja vigência irá até o final do primeiro exercício financeiro do mandato do Prefeito (art. 35, § 2º, I, do ADCT). Aliás, é da competência privativa dos Chefes do Poder Executivo a iniciativa de tal projeto de lei.</p>
                    </div>
                  </div>
                </div>
                <!--/Panel-->
                <!--Panel-->
                <div class="panelFaq">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                     7. O que é a Lei de Diretrizes Orçamentárias – LDO?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse7" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Também de acordo com a Constituição Federal, a LDO destina-se a apontar as metas e prioridades da administração pública dos entes federados incluindo as despesas de capital para o exercício financeiro seguinte, sendo certo que orientará a elaboração da LOA, tratará a respeito das alterações na legislação tributária e também, para o nível federal, estabelecerá a política das agências financeiras oficiais de fomento (art. 165, § 2º). A sua vigência é anual. A LRF previu a integração na LDO dos anexos de metas fiscais e de riscos fiscais, atribuindo a cada anexo um conteúdo específico. (art. 4º, §§ 1º, 2º e 3º)</p>
                    </div>
                  </div>
                </div>
                <!--/Panel-->
                <!--Panel-->
                <div class="panelFaq">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                     8. Para que serve o anexo de metas fiscais?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse8" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>O anexo de metas fiscais serve para avaliação do cumprimento das metas fiscais dos três exercícios anteriores e para demonstrar o que está planejado para o exercício vigente e para os dois seguintes em termos financeiros envolvendo receitas, despesas, resultados nominal e primário e montante da dívida pública, inclusive com memória e metodologia de cálculo, além da demonstração da evolução do patrimônio líquido dos três últimos exercícios, da avaliação da situação financeiro e atuarial do regime próprio de previdência, da estimativa e compensação da renúncia de receita e da margem de expansão das despesas obrigatórias de caráter continuado. (art. 4º, §§ 2º e 3º)</p>
                    </div>
                  </div>
                </div>
                <!--/Panel-->
                <!--Panel-->
                <div class="panelFaq">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                     9. O que é resultado primário?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse9" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Resultado Primário é a diferença entre as receitas orçamentárias e as despesas orçamentárias, deduzindo das receitas orçamentárias aquelas receitas de natureza financeira (receitas provenientes de aplicações financeiras e operações de crédito) e das despesas orçamentárias aquelas despesas com amortização e juros da dívida pública interna e externa, aquisição de títulos representativos de capital já integralizados e relativas a concessão de empréstimos.</p>
                    </div>
                  </div>
                </div>
                <!--/Panel-->
                <!--Panel-->
                <div class="panelFaq">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                     10. O que é resultado nominal?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse10" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Resultado Nominal é a diferença entre a variação da dívida fiscal líquida entre dois períodos.</p>
                    </div>
                  </div>
                </div>
                <!--/Panel-->


              </div>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection

@section('scriptsadd')
@endsection