@extends('layouts.app')
@section('htmlheader_title', 'Filtro - Consulta')

@section('cssheader')
@endsection

@extends('layouts.breadcrumb')

@section('main-content')
    <div class="col-md-12">
        <!-- BAR CHART -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo ucfirst($consulta) ?></h3>

                <!--<div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>-->
            </div>
            <div class="box-body">
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection

@section('scriptsadd')
    <!-- Opções de configuração para tabelas e gráficos -->
    <script src="{{ asset('/js/options.js') }}"></script>

    <script>
        // LoadPage
        $(function () {
            $(document).ready(function() {
                var linkBase = "{{route('filtroIndex', ['consulta' => 'consulta','subConsulta' => 'subConsulta','tipoConsulta' => 'tipoConsulta'])}}";
                dadosConsultaMenu("{{route('menu')}}", linkBase,'<?php echo $consulta ?>');
            });
        });
    </script>

    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100688690-1', 'auto');
  ga('send', 'pageview');

</script>
@endsection