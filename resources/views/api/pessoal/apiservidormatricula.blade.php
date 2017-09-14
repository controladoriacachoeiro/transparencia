@extends('layouts.app')
@section('htmlheader_title', 'API Servidor Matricula')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/pessoal/servidores/matricula/{matricula}</p>
                
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
                                    <td>matricula</td>
                                    <td>matricula do servidor a ser buscado</td>
                                    <td>string</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/pessoal/servidores/matricula/11111">transparencia.cachoeiro.es.gov.br/api/pessoal/servidores/matricula/11111</a></p>
                <p>Obs.: O número de inscrição utilizado acima não é válido. Número utilizado apenas para demonstração.
                <h4>Retorno<h4>
                <div class="">
                <pre>[{"ServidorID":20357,"Matricula":"11111","CPF":"99999999999","Nome":"JOAO ","Cargo":"TECNICO INFORMATICA","Funcao":null,"TipoVinculo":"CONTRATO TEMPOR\u00c1RIO","DataExercicio":"2017-02-01","DataDemissao":"2017-12-31","Situacao":"EM EXERCICIO","OrgaoLotacao":"SEME - SECRETARIA MUNICIPAL DE EDUCA\u00c7\u00c3O","CargaHoraria":40,"Referencia":"871","Sigla":"B10","ReferenciaSigla":"871A"}]</pre>
                </div>

                                <h3>Detalhes das colunas</h3>
                <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Coluna</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                    <th style='vertical-align:middle'>Descrição</th>
                                </tr>
                            </thead>                            
                            <tbody>
                                <tr>
                                    <td>Matricula</td>
                                    <td>string</td>
                                    <td>Número de matrícula identificando o Servidor na Administração Municipal</td>
                                </tr>
                                <tr>
                                    <td>CPF</td>
                                    <td>string</td>
                                    <td>Número do CPF do servidor, podendo estar parte oculta</td>
                                </tr>
                                <tr>
                                    <td>Nome</td>
                                    <td>string</td>
                                    <td>Nome completo do Servidor</td>
                                </tr>
                                <tr>
                                    <td>Cargo</td>
                                    <td>string</td>
                                    <td>Indicação do nome do cargo efetivo que o servidor ocoupa</td>
                                </tr>
                                <tr>
                                    <td>Funcao</td>
                                    <td>string</td>
                                    <td>Identificação do Cargo Comissionado ou Função Gratificada que o servidor exerce</td>
                                </tr>
                                <tr>
                                    <td>Tipo Vinculo</td>
                                    <td>string</td>
                                    <td>Tipo de vínculo, se Efetivo, Comissionado, Temporário ou outro</td>
                                </tr>
                                <tr>
                                    <td>Data Exercício</td>
                                    <td>string</td>
                                    <td>Data em que o servidor entrou em exercício</td>
                                </tr>
                                <tr>
                                    <td>Data Demissão</td>
                                    <td>string</td>
                                    <td>Data em que o servidor foi exonerado do seu cargo ou função</td>
                                </tr>
                                <tr>
                                    <td>Situação</td>
                                    <td>string</td>
                                    <td>Situação do Servidor na data em pesquisa, se Ativo, em Licença Remunerada, em Licença sem Vencimentos, etc</td>
                                </tr>
                                <tr>
                                    <td>Órgão</td>
                                    <td>string</td>
                                    <td>Órgão onde o servidor exerce suas atividades</td>
                                </tr>
                                <tr>
                                    <td>Carga Horária</td>
                                    <td>string</td>
                                    <td>Informação da carga horária Semanal ou Diária do servidor</td>
                                </tr>
                                <tr>
                                    <td>Referência</td>
                                    <td>string</td>
                                    <td>campo responável pelo enquadramento salarial</td>
                                </tr>
                                <tr>
                                    <td>Sigla</td>
                                    <td>string</td>
                                    <td>campo responável pelo enquadramento salarial</td>
                                </tr>
                                <tr>
                                    <td>Referência Sigla</td>
                                    <td>string</td>
                                    <td>campo responável pelo enquadramento salarial</td>
                                </tr>
                                 
                            </tbody>
                        </table>
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