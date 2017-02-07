@extends('layouts.app')
@section('htmlheader_title', 'FAQ')

@section('main-content')
      <div class="row">
        <div class="col-md-8">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        1. A quem se aplica a LRF?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>A LRF aplica-se à União, aos Estados, ao Distrito Federal e aos Municípios, compreendendo os Poderes Legislativo - neste incluídos os Tribunais de Contas -, Executivo e Judiciário, as respectivas administrações diretas, fundos, autarquias, fundações e empresas estatais dependentes. (art. 1º, § 2º)</p>
                    </div>
                  </div>
                </div>
                <!-- /.panel -->
                <div class="panel box box-primary">
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
                <!-- /.panel -->
                <div class="panel box box-primary">
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
                <!-- /.panel -->
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