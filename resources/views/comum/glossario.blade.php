@extends('layouts.app')
@section('htmlheader_title', 'Glossário')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#" data-toggle="tab">#</a></li>
              <li><a href="#a" data-toggle="tab">A</a></li>
              <li><a href="#b" data-toggle="tab">B</a></li>
              <li><a href="#c" data-toggle="tab">C</a></li>
              <li><a href="#d" data-toggle="tab">D</a></li>
              <li><a href="#e" data-toggle="tab">E</a></li>
              <li><a href="#f" data-toggle="tab">F</a></li>
              <li><a href="#g" data-toggle="tab">G</a></li>
              <li><a href="#h" data-toggle="tab">H</a></li>
              <li><a href="#i" data-toggle="tab">I</a></li>
              <li><a href="#j" data-toggle="tab">J</a></li>
              <li><a href="#l" data-toggle="tab">L</a></li>
              <li><a href="#m" data-toggle="tab">M</a></li>
              <li><a href="#n" data-toggle="tab">N</a></li>
              <li><a href="#o" data-toggle="tab">O</a></li>
              <li><a href="#p" data-toggle="tab">P</a></li>
              <li><a href="#q" data-toggle="tab">Q</a></li>
              <li><a href="#r" data-toggle="tab">R</a></li>
              <li><a href="#s" data-toggle="tab">S</a></li>
              <li><a href="#t" data-toggle="tab">T</a></li>
              <li><a href="#u" data-toggle="tab">U</a></li>
              <li><a href="#v" data-toggle="tab">V</a></li>
              <li><a href="#x" data-toggle="tab">X</a></li>
              <li><a href="#z" data-toggle="tab">Z</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="a">
                <p><b>A</b></p>
                <dl>
                    <dt>Abertura de Crédito Adicional:</dt>
                    <dd>Decreto do Poder Executivo determinando a disponibilidade do crédito orçamentário, com base em autorização legislativa específica.</dd>
                    <dd>Fonte: Tesouro Nacional</dd>
                    <br>
                    <dt>Ação Governamental:</dt>
                    <dd>Conjunto de operações, cujos produtos contribuem para os objetivos do programa governamental. A ação pode ser um projeto, atividade ou operação especial. Para conhecer o Cadastro das Ações Governamentais acesse:</dd>
                    <dd>Fonte: Câmara dos Deputados</dd>
                    <br>
                    <dt>Adimplente:</dt>
                    <dd>Cumprimento, em tempo hábil, das obrigações contratuais pelo contratante ou convenente.</dd>
                    <dd>Fonte: Manual do Siafi com adaptações</dd>
                </dl>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="b">
                <p><b>B</b></p>
                <dl>
                    <dt>Baixado:</dt>
                    <dd>O convênio é assim registrado no caso de extinção de órgão, desde que não ocorra a transferência dos saldos contábeis e documentações referentes aos convênios firmados com o órgão em extinção para o órgão sucessor. O registro desse tipo de execução só poderá ocorrer quando o convênio se encontrar aprovado.</dd>
                    <dd>Fonte: Manual do Siafi com adaptações</dd>
                    <br>
                    <dt>Balanço:</dt>
                    <dd>Demonstrativo contábil que representa num dado momento, a situação do patrimônio da entidade pública.</dd>
                    <dd>Fonte: Tesouro Nacional</dd>
                    <br>
                    <dt>Balanço patrimonial:</dt>
                    <dd>Demonstrativo contábil que representa num dado momento, a situação estática do patrimônio da entidade em termos de ativo, passivo e patrimônio líquido.</dd>
                    <dd>Fonte: Câmara dos Deputados</dd>
                    <br>
                    <dt>Beneficiário:</dt>
                    <dd>DÉ o órgão da Administração Pública Direta, Autarquias ou Fundações que estejam recebendo o recurso e tem a responsabilidade de utilizá-lo.</dd>
                    <dd>Fonte: Comprasnet/SIASG</dd>
                </dl>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

@endsection

@section('scriptsadd')
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100688690-1', 'auto');
  ga('send', 'pageview');

</script>
@endsection