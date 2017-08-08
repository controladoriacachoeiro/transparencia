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
            <div class="box-body text-justify">      
              <div class="col-md-4">      
                <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
                <a href="#"  data-toggle="collapse" data-target="#teste"><font size="4">2013</font></a>
                <br>
                <div id="teste" class="collapse">
                <p>teste</p>
                </div>
              </div>

              <div class="col-md-4" style="color:">      
                <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
                <a  data-toggle="collapse" data-target="#2015"><font size="4">2015</font></a>
                <br>
                <div id="2015" class="collapse">
                  <ul style="list-style: none;">
                    <!--consolidado-->
							      <li><a  data-toggle="collapse" data-target="#consolidado2015"><font size="4">Consolidado</font></a>
								      <ul id="consolidado2015" class="collapse" style="list-style: none;">
                        <li><a target="_blank"href="/download/pca/2015/consolidado/relges">Relatório de Gestão</a></li>
                        <li><a target="_blank"href="/download/pca/2015/consolidado/balorc">Balanço Orçamentário</a></li>
                        <li><a target="_blank"href="/download/pca/2015/consolidado/balfin">Balanço Financeiro</a></li>
                        <li><a target="_blank"href="/download/pca/2015/consolidado/balpat">Balanço Patrimonial</a></li>
                        <li><a target="_blank"href="/download/pca/2015/consolidado/demvap">Demostração das Variações Patrimoniais</a></li>
                        <li><a target="_blank"href="/download/pca/2015/consolidado/demdif">Demostração da Dívida Fundada Interna</a></li>
                        <li><a target="_blank"href="/download/pca/2015/consolidado/demdfl">Demostração da Dívida Flutuante</a></li>
                        <li><a target="_blank"href="/download/pca/2015/consolidado/demfca">Demostração dos Fluxos de Caixa</a></li>
                        <li><a target="_blank"href="/download/pca/2015/consolidado/balver">Balanço de Verificação</a></li>
                        <li><a target="_blank"href="/download/pca/2015/consolidado/reloci">Relatório Conclusivo</a></li>
								      </ul>
							      </li>
                    <!--fim consolidado-->
                    <!--Saude-->
                    <li><a  data-toggle="collapse" data-target="#saude2015"><font size="4">Fundo Municipal de Saúde</font></a>
								      <ul id="saude2015" class="collapse">
									      <li id="OqueTem">
										      <a href="/portal">O que tem no Portal</a>
									      </li>
								      </ul>
							      </li>
                    <!--fim saude-->
                    <!--PMCI-->
                    <li><a  data-toggle="collapse" data-target="#pmci2015"><font size="4">Prefeitura Municipal de Cachoeiro de Itapemerim</font></a>
								      <ul id="pmci2015" class="collapse">
									      <li id="OqueTem">
										      <a href="/portal">O que tem no Portal</a>
									      </li>
								      </ul>
							      </li>
                    <!--PMCI-->


                  </ul> 
 
                </div>
              </div>

              <div class="col-md-4">      
                <i class="fa fa-shield fa-rotate-270" style="margin-right: 5px;"></i>
                <a  data-toggle="collapse" data-target="#teste3"><font size="4">2013</font></a>
                <br>
                <div id="teste3" class="collapse">
                <p>teste</p>
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