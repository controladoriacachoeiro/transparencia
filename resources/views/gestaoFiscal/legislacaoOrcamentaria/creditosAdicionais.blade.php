@extends('layouts.app')
@section('htmlheader_title', 'Créditos Adicionais')

@section('cssheader')
@endsection

@section('main-content')
<div class='row'>
    <div class='col-md-12'>
        <div id="navegacao" class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Navegação</h3>                   
            </div>
            <div class="box-body">                                                        
                <ol class="breadcrumb">
                    <li><a href="/">Início</a></li>                                                
                    <li class="active">Créditos Adicionais</li>
                </ol>        
            </div>
        </div>            
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Créditos Suplementares</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify" id="accordion">
                <!--2018-->
				<div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                2018
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="box-body">
                            <ul class="links-gestao">
                                <li>
                                    <a class="acessibilidade" href="/download/creditossuplementares/2018/Janeiro">Janeiro</a>
                                </li>
                                <li>
                                    <a class="acessibilidade" href="/download/creditossuplementares/2018/Fevereiro">Fevereiro</a>
                                </li>
                                <li>
                                    <a class="acessibilidade" href="/download/creditossuplementares/2018/Março">Março</a>
                                </li>
                                <li>
                                    <a class="acessibilidade" href="/download/creditossuplementares/2018/Abril">Abril</a>
                                </li>
                                <li>
                                    <a class="acessibilidade" href="/download/creditossuplementares/2018/Maio">Maio</a>
                                </li>
                                <li>
                                    <a class="acessibilidade" href="/download/creditossuplementares/2018/Junho">Junho</a>
                                </li>
                                <li>
                                    <a class="acessibilidade" href="/download/creditossuplementares/2018/Julho">Julho</a>
                                </li>
                                <li>
                                    <a class="acessibilidade" href="/download/creditossuplementares/2018/Agosto">Agosto</a>
                                </li>
                                <li>
                                    <a class="acessibilidade" href="/download/creditossuplementares/2018/Setembro">Setembro</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--2018-->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

@endsection

@section('scriptsadd')
@endsection