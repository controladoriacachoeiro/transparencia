@extends('layouts.app')

@section('htmlheader_title')
    Patrimônio
@stop

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection

@section('main-content')
    <div clas='row'>
        <div class='col-md-12'>
            @include('layouts.navegacao')            
        </div>
    </div>


     <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" class="text-muted"><i class="fa fa-table text-purple"></i></a></li>
                    <li><a href="#tab_2" data-toggle="tab" class="text-muted"><i class="fa fa-pie-chart text-danger"></i></a></li>
                    <li><a href="#tab_3" data-toggle="tab" class="text-muted"><i class="fa fa-bar-chart text-success"></i></a></li>
                    <li class="pull-right"><div id="chart-por-pagina"></div></li>
                    <li class="pull-right"><div id="chart-filtro"></div></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <!--Tabela-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info" id='divTable'>
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Tabela</h3>                                       
                                    </div>
                                    <div class="box-body">
                                        @yield('contentTabela')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Pizza</h3>                                        
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div id="divPie"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Barra</h3>                                        
                                    </div>                                    
                                    <div class="box-body">
                                        <div id="divColumn"></div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <ul class="nav nav-tabs">
                    <li><div id="chart-info"></div></li>
                    <li class="pull-right"><div id="chart-paginacao"></div></li>
                </ul>
            </div>            
        </div>        
    </div>    
@endsection

@section('scriptsadd')
  <script src="{{ asset('/js/options.js') }}"></script>
    <!--paginação-->
    <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <!--grafico-->
    <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
    <!--tabela-->
    <script src="{{ asset('/js/highcharts.js') }}"></script>
@stop 