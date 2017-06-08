@extends('layouts.app')
@section('htmlheader_title', 'Legislação')

@section('cssheader')
@endsection

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
                        Constituição da República Federativa do Brasil
                      </a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="box-body">
                        <p>Constituição Federal de 1988</p>
                        <a href="http://www.planalto.gov.br/ccivil_03/Constituicao/Constituicao.htm" target="_blank" class="btn btn-success">
                            <span class="glyphicon glyphicon-new-window"></span> Acessar 
                        </a>
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        Lei Complementar nº. 101/2000
                      </a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="box-body">
                      <p>Lei de Responsabilidade Fiscal - Estabelece normas de finanças públicas voltadas para a responsabilidade na gestão fiscal e dá outras providências.</p>
                      <a href="http://www.planalto.gov.br/ccivil_03/Leis/LCP/Lcp101.htm" target="_blank" class="btn btn-success">
                        <span class="glyphicon glyphicon-new-window"></span> Acessar 
                      </a>
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100688690-1', 'auto');
  ga('send', 'pageview');

</script>
@endsection