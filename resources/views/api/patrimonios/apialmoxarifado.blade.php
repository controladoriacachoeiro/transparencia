@extends('layouts.app')
@section('htmlheader_title', 'API Almoxarifado')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/patrimonios/almoxarifado</p>
                
            

                <h3>Exemplo</h3>
                <p><a href="/api/patrimonios/almoxarifado">transparencia.cachoeiro.es.gov.br/api/patrimonios/almoxarifado</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"NomeMaterial":"PENICILINA G. PROCA\u00cdNA + POT\u00c1SSIO","NomeAlmoxarifado":"SEMUS - FARMACIA","NomeGrupo":"MEDICAMENTOS","Especificacao":"CONCENTRA\u00c7\u00c3O: 300.000 +100.000UI.\n- APRESENTA\u00c7\u00c3O: SOLU\u00c7\u00c3O INJET\u00c1VEL.\n","Quantidade":"70","ValorAquisicao":2.2178}]</pre>
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
                                    <td scope="col">Item</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome identificador do material, ex: Assadeira, Avental, Bota, Cabo, Botina, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Almoxarifado localizado</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome identificador do almoxarifado onde o item está armazenado</td>
                                </tr>
                                <tr>
                                    <td scope="col">Órgão</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Órgão ao qual o almoxarifado está vinculado</td>
                                </tr>
                                <tr>
                                    <td scope="col">Grupo Material</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Nome do grupo de material. Ex: Material de Copa e Cozinha; Material de Expediente, etc</td>
                                </tr>
                                <tr>
                                    <td scope="col">Especificação</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Especificação detalhada do material</td>
                                </tr>
                                <tr>
                                    <td scope="col">Quantidade</td>
                                    <td scope="col">string</td>
                                    <td scope="col">Quantidade em estoque do item</td>
                                </tr>
                                <tr>
                                    <td scope="col">Valor do Item</td>
                                    <td scope="col">string</td>
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