@extends('layouts.app')
@section('htmlheader_title', 'API Servidor Matricula')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/pessoal/servidores/matricula/{matricula}</p>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row">
                        <table id="tabela1" class="table table-bordered table-striped" summary="Tabela com os parâmetros, descrição, tipo e formato da url da api">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Parâmetros</th>
                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">matricula</td>
                                    <td scope="col">matricula do servidor a ser buscado</td>
                                    <td scope="col">string</td>
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
                <pre>[{"ServidorID":20357,"Matricula":"11111","CPF":"99999999999","Nome":"JOAO ","Cargo":"TECNICO INFORMATICA","Funcao":null,"TipoVinculo":"CONTRATO TEMPOR\u00c1RIO","DataExercicio":"2017-02-01","DataDemissao":"2017-12-31","Situacao":"EM EXERCICIO","OrgaoLotacao":"SEME - SECRETARIA MUNICIPAL DE EDUCA\u00c7\u00c3O","CargaHoraria":40,"Referencia":"871","Sigla":"B10","ReferenciaSigla":"871A","NumeroContrato":1}]</pre>
                </div>

                                <h3>Detalhes das colunas</h3>
                <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição do retorno da api">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Coluna</th>
                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                </tr>
                            </thead>                            
                            <tbody>
                                <tr>
                                    <td scope="col">Matricula</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número de matrícula identificando o Servidor na Administração Municipal</td>
                                </tr>
                                <tr>
                                    <td scope="col">CPF</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número do CPF do servidor, podendo estar parte oculta</td>
                                </tr>
                                <tr>
                                    <td scope="col">Nome</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome completo do Servidor</td>
                                </tr>
                                <tr>
                                    <td scope="col">Cargo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Indicação do nome do cargo efetivo que o servidor ocoupa</td>
                                </tr>
                                <tr>
                                    <td scope="col">Funcao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificação do Cargo Comissionado ou Função Gratificada que o servidor exerce</td>
                                </tr>
                                <tr>
                                    <td scope="col">Tipo Vinculo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Tipo de vínculo, se Efetivo, Comissionado, Temporário ou outro</td>
                                </tr>
                                <tr>
                                    <td scope="col">Data Exercício</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Data em que o servidor entrou em exercício</td>
                                </tr>
                                <tr>
                                    <td scope="col">Data Demissão</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Data em que o servidor foi exonerado do seu cargo ou função</td>
                                </tr>
                                <tr>
                                    <td scope="col">Situação</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Situação do Servidor na data em pesquisa, se Ativo, em Licença Remunerada, em Licença sem Vencimentos, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Órgão</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão onde o servidor exerce suas atividades</td>
                                </tr>
                                <tr>
                                    <td scope="col">Carga Horária</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Informação da carga horária Semanal ou Diária do servidor</td>
                                </tr>
                                <tr>
                                    <td scope="col">Referência</td>
                                    <td scope="col">string</td>
                                    <td scope="col">campo responável pelo enquadramento salarial</td>
                                </tr>
                                <tr>
                                    <td scope="col">Sigla</td>
                                    <td scope="col">string</td>
                                    <td scope="col">campo responável pelo enquadramento salarial</td>
                                </tr>
                                <tr>
                                    <td scope="col">Referência Sigla</td>
                                    <td scope="col">string</td>
                                    <td scope="col">campo responável pelo enquadramento salarial</td>
                                </tr>
                                <tr>
                                    <td scope="col">NumeroContrato</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Número do contrato do Servidor</td>
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