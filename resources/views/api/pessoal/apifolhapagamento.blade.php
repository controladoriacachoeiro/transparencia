@extends('layouts.app')
@section('htmlheader_title', 'API Folha de Pagamento')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Folha de Pagamento'));
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
                <pre class="acessibilidade">transparencia.cachoeiro.es.gov.br/api/pessoal/servidores/pagamento/{matricula}</pre>
                
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
                                    <td scope="col">Matrícula do servidor para buscar a folha de pagamento</td>
                                    <td scope="col">int</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/api/pessoal/servidores/pagamento/11111">transparencia.cachoeiro.es.gov.br/api/pessoal/servidores/pagamento/11111</a></p>
                <p>Obs.: O número de inscrição utilizado acima não é válido. Número utilizado apenas para demonstração</p>
                <h4>Retorno<h4>
                <div class="">
                <pre class="acessibilidade">[{"Matricula":11111,"Nome":"JOAO","CPF":"99999999999","MesPagamento":1,"AnoPagamento":2016,"CodigoEvento":475,"DescricaoEvento":"PRO-TEMPORE","TipoEvento":"Crédito","Quantidade":5,"Valor":44.18}]</pre>
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
                                    <td scope="col">int</td>
                                    <td scope="col">Número de matrícula identificando o Servidor na Administração Municipal</td>
                                </tr>   
                                <tr>
                                    <td scope="col">Nome</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome completo do servidor</td>
                                </tr>
                                <tr>
                                    <td scope="col">CPF</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Número do CPF do servidor, podendo estar parte oculta</td>
                                </tr>
                                <tr>
                                    <td scope="col">MesPagamento</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Mês ao qual se refere aquele pagamento</td>
                                </tr>         
                                <tr>
                                    <td scope="col">AnoPagamento</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Ano ao qual se refere a rubrica lançada no pagamento</td>
                                </tr>   
                                <tr>
                                    <td scope="col">CodigoEvento</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Código numérico que identifica unicamente a rúbrica do pagamento</td>
                                </tr>    
                                <tr>
                                    <td scope="col">DescricaoEvento</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Descrição da rúbrica (ex.: Vencimento, Adicional por Tempo de Serviço, Décimo Terceiro Salário, etc)</td>
                                </tr> 
                                <tr>
                                    <td scope="col">TipoEnvento</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Identificador se a rúbrica é uma rúbrica de crédito ou de débito</td>
                                </tr>
                                <tr>
                                    <td scope="col">Quantidade</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Refere-se ao campo “Quantidade” listado no contracheque. Exemplo: 11%, 27,5%, 29D, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Valor</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Valor de crédito ou débito da rúbrica</td>
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