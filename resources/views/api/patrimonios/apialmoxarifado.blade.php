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
                 <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Coluna</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                    <th style='vertical-align:middle'>Descriçao</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Item</td>
                                    <td>string</td>
                                    <td>Nome identificador do material, ex: Assadeira, Avental, Bota, Cabo, Botina, etc</td>
                                </tr>
                                <tr>
                                    <td>Almoxarifado localizado</td>
                                    <td>string</td>
                                    <td>Nome identificador do almoxarifado onde o item está armazenado</td>
                                </tr>
                                <tr>
                                    <td>Órgão</td>
                                    <td>string</td>
                                    <td>Órgão ao qual o almoxarifado está vinculado</td>
                                </tr>
                                <tr>
                                    <td>Grupo Material</td>
                                    <td>string</td>
                                    <td>Nome do grupo de material. Ex: Material de Copa e Cozinha; Material de Expediente, etc</td>
                                </tr>
                                <tr>
                                    <td>Especificação</td>
                                    <td>string</td>
                                    <td>Especificação detalhada do material</td>
                                </tr>
                                <tr>
                                    <td>Quantidade</td>
                                    <td>string</td>
                                    <td>Quantidade em estoque do item</td>
                                </tr>
                                <tr>
                                    <td>Valor do Item</td>
                                    <td>string</td>
                                    <td>Valor de aquisição do item</td>
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