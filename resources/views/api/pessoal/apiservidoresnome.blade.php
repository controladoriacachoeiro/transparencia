@extends('layouts.app')
@section('htmlheader_title', 'API Servidores Nome')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/pessoal/servidores/nome/{nome}</p>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row">
                        <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Parâmetros</th>
                                    <th style='vertical-align:middle'>Descrição</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>nome</td>
                                    <td>nome ou parte do nome do servidor para que a busca</td>
                                    <td>string</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/pessoal/servidores/nome/joao">transparencia.cachoeiro.es.gov.br/api/pessoal/servidores/nome/joao</a></p>
                <h4>Retorno<h4>
                <div class="">
                <pre>[{"ServidorID":20357,"Matricula":"11111","CPF":"99999999999","Nome":"JOAO ","Cargo":"TECNICO INFORMATICA","Funcao":null,"TipoVinculo":"CONTRATO TEMPOR\u00c1RIO","DataExercicio":"2017-02-01","DataDemissao":"2017-12-31","Situacao":"EM EXERCICIO","OrgaoLotacao":"SEME - SECRETARIA MUNICIPAL DE EDUCA\u00c7\u00c3O","CargaHoraria":40,"Referencia":"871","Sigla":"B10","ReferenciaSigla":"871A"}]</pre>
                </div>
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
    <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <!--grafico-->    
    <script src="{{ asset('/js/jquery.dynatable.js') }}"></script>
@endsection