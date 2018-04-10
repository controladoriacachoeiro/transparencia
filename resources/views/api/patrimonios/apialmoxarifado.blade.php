@extends('layouts.app')
@section('htmlheader_title', 'API Almoxarifado')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Almoxarifado'));
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
                <pre>transparencia.cachoeiro.es.gov.br/api/patrimonios/almoxarifado</pre>
                

                <h3>Exemplo</h3>
                <p><a href="/api/patrimonios/almoxarifado">transparencia.cachoeiro.es.gov.br/api/patrimonios/almoxarifado</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"NomeMaterial":"AUTOPEÇAS","NomeAlmoxarifado":"ALMOXARIFADO CENTRAL SEMUS","OrgaoLocalizacao":"SEMUS - SECRETARIA MUNICIPAL DE SAÚDE","NomeGrupo":"115610400000 - AUTOPEÇAS","Especificacao":"PNEU 205\/75\/16 (MASTER).","Quantidade":18,"ValorAquisicao":435}]</pre>
                </div>

                <h3>Detalhes das colunas</h3>
                 <table id="tabela1" class="table table-bordered table-striped" summary="Tabela com os parâmetros, descrição, tipo e formato da url da api">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Coluna</th>
                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">NomeMaterial</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome identificador do material, ex: Assadeira, Avental, Bota, Cabo, Botina, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">NomeAlmoxarifado</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome identificador do almoxarifado onde o item está armazenado</td>
                                </tr>
                                <tr>
                                    <td scope="col">OrgaoLocalizacao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão ao qual o almoxarifado está vinculado</td>
                                </tr>
                                <tr>
                                    <td scope="col">NomeGrupo</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome do grupo de material. Ex: Material de Copa e Cozinha; Material de Expediente, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Especificacao</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Especificação detalhada do material</td>
                                </tr>
                                <tr>
                                    <td scope="col">Quantidade</td>
                                    <td scope="col">int</td>
                                    <td scope="col">Quantidade em estoque do item</td>
                                </tr>
                                <tr>
                                    <td scope="col">ValorAquisicao</td>
                                    <td scope="col">double</td>
                                    <td scope="col">Valor de aquisição do item</td>
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