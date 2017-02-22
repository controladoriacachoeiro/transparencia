@extends('layouts.app')
@section('htmlheader_title', 'Despesa')

@section('cssheader')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" />
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtro</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        {{ Form::open(array('route' => 'filtro', 'method' => 'get')) }}
                            {{Form::text('id', '', array('placeholder' => 'ID'))}}
                            {{Form::submit('Filtrar')}}
                        {{ Form::close() }}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabela</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tabela" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Função / Subfunção / Órgão</th>
                                <th>Empenho</th>
                                <th>Liquidado</th>
                                <th>Pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                                //Realiza um foreach com os dados passado pela model
                                foreach ($despesas as $despesa) {
                                    echo "<tr>";
                                    echo "<td>" . $despesa->despesa_orgao . "</td>";
                                    echo "<td>" . $despesa->despesa_empenho . "</td>";
                                    echo "<td>" . $despesa->despesa_liquidado . "</td>";
                                    echo "<td>" . $despesa->despesa_pago . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
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
    <!-- Opções de configuração para tabelas e gráficos -->
    <script src="{{ asset('/js/options.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- ChartJS 1.0.1 -->
    <!--<script src="{{ asset('/plugins/chartjs/Chart.min.js') }}"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            //-------------
            //- DATATABLE -
            //-------------
                $("#tabela").DataTable(dataTableJs());
        });        
    </script>
@endsection