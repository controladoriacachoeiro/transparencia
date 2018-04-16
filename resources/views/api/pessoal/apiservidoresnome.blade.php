@extends('layouts.app')
@section('htmlheader_title', 'API Servidores Nome')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Servidores Nome'));
    ?>

    <div class='row'>
        <div class='col-md-12'>
            @include('layouts.navegacao')
        </div>
    </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <pre>transparencia.cachoeiro.es.gov.br/api/pessoal/servidores/nome/{nome}</pre>
                
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
                                    <td scope="col">nome</td>
                                    <td scope="col">Nome ou parte do nome do servidor para ser buscado</td>
                                    <td scope="col">string</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/pessoal/servidores/nome/joao%20picoli">transparencia.cachoeiro.es.gov.br/api/pessoal/servidores/nome/joao%20picoli</a></p>
                <h4>Retorno<h4>
                <div class="">
                <pre>[{"Matricula":"00811102","CPF":"***.166.597-**","Nome":"JOAO PICOLI","Cargo":"VIGIA","Funcao":"VIGIA","TipoVinculo":null,"DataExercicio":"1997-04-10","DataDemissao":"1997-12-31","Situacao":"Demitido","OrgaoLotacao":"SEMDEF - SECRETARIA MUNICIPAL DE DEFESA SOCIAL","CargaHoraria":"44","Sigla":null}]</pre>
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
                                    <td scope="col">Indicação do nome do cargo efetivo que o servidor ocupa</td>
                                </tr>
                                <tr>
                                    <td scope="col">Funcao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificação do Cargo Comissionado ou Função Gratificada que o servidor exerce</td>
                                </tr>
                                <tr>
                                    <td scope="col">TipoVinculo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Tipo de vínculo, se Efetivo, Comissionado, Temporário ou outro</td>
                                </tr>
                                <tr>
                                    <td scope="col">DataExercicio</td>
                                    <td scope="col">date</td>
                                    <td scope="col">Data em que o servidor entrou em exercício</td>
                                </tr>
                                <tr>
                                    <td scope="col">DataDemissao</td>
                                    <td scope="col">date</td>
                                    <td scope="col">Data em que o servidor foi exonerado do seu cargo ou função</td>
                                </tr>
                                <tr>
                                    <td scope="col">Situacao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Situação do Servidor na data em pesquisa, se Ativo, em Licença Remunerada, em Licença sem Vencimentos, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">OrgaoLotacao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão onde o servidor exerce suas atividades</td>
                                </tr>
                                <tr>
                                    <td scope="col">CargaHoraria</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Informação da carga horária Semanal ou Diária do servidor</td>
                                </tr>
                                <tr>
                                    <td scope="col">Sigla</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Campo responsável pelo enquadramento salarial</td>
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