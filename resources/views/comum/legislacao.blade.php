@extends('layouts.app')
@section('htmlheader_title', 'Legislação')

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
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Decreto Municipal xxxxx
                      </a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Regulamenta, no âmbito do Poder Executivo, os procedimentos para a garantia do acesso
                         à informação e para a classificação de informações sob restrição de acesso.</p>
                         <a href="http://server03.pge.sc.gov.br/LegislacaoEstadual/2012/001048-005-0-2012-005.htm" target="_blank" class="btn btn-success">
                         <span class="glyphicon glyphicon-new-window"></span> Acessar </a>
                    </div>
                  </div>
                </div>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        Decreto Federal Nº 7.724, de 16 de Maio de 2012
                      </a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Regulamenta a Lei no 12.527, de 18 de novembro de 2011, que dispõe sobre o acesso a informações previsto no inciso XXXIII do caput do art. 5o , no inciso II do § 3o do art. 37 e no § 2o do art. 216 da Constituição.</p>
                        <a href="http://www.planalto.gov.br/ccivil_03/_ato2011-2014/2012/decreto/d7724.htm" target="_blank" class="btn btn-success">
                            <span class="glyphicon glyphicon-new-window"></span> Acessar 
                        </a>
                    </div>
                  </div>
                </div>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                        Lei Federal Nº 12.527, de 18 de Novembro de 2011
                      </a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Regula o acesso a informações previsto no inciso XXXIII do art. 5o, no inciso II do § 3o do art. 37 e no § 2o do art. 216 da Constituição Federal; altera a Lei no 8.112, de 11 de dezembro de 1990; revoga a Lei no 11.111, de 5 de maio de 2005, 
                        e dispositivos da Lei no 8.159, de 8 de janeiro de 1991; e dá outras providências.</p>
                        <a href="http://www.planalto.gov.br/ccivil_03/_Ato2011-2014/2011/Lei/L12527.htm" target="_blank" class="btn btn-success">
                            <span class="glyphicon glyphicon-new-window"></span> Acessar 
                        </a>
                    </div>
                  </div>
                </div>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                        Decreto Federal Nº 7.185, de 27 de Maio de 2010
                      </a>
                    </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Dispõe sobre o padrão mínimo de qualidade do sistema integrado de administração financeira e controle, no âmbito de cada ente da Federação, nos termos do art. 48, parágrafo único, inciso III, da Lei Complementar no 101, de 4 de maio de 2000, e dá outras providências.</p>
                        <a href="http://www.planalto.gov.br/ccivil_03/_ato2007-2010/2010/decreto/d7185.htm" target="_blank" class="btn btn-success">
                            <span class="glyphicon glyphicon-new-window"></span> Acessar 
                        </a>
                    </div>
                  </div>
                </div>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                        Lei Complementar Nº 131, de 27 de Maio de 2009
                      </a>
                    </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Acrescenta dispositivos à Lei Complementar no 101, de 4 de maio de 2000, que estabelece normas de finanças públicas voltadas para a responsabilidade na gestão fiscal e dá outras providências, a fim de determinar a disponibilização, em tempo real, de informações pormenorizadas
                         sobre a execução orçamentária e financeira da União, dos Estados, do Distrito Federal e dos Municípios.</p>
                        <a href="http://www.planalto.gov.br/ccivil_03/leis/lcp/lcp131.htm" target="_blank" class="btn btn-success">
                            <span class="glyphicon glyphicon-new-window"></span> Acessar 
                        </a>
                    </div>
                  </div>
                </div>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                        Lei Complementar Nº 101, de 04 de Maio de 2000
                      </a>
                    </h4>
                  </div>
                  <div id="collapse6" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Estabelece normas de finanças públicas voltadas para a responsabilidade na gestão fiscal e dá outras providências.</p>
                    </div>
                  </div>
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