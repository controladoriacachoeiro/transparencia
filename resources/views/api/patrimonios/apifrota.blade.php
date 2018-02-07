@extends('layouts.app')
@section('htmlheader_title', 'API Frota')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Frota'));
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
                <p>transparencia.cachoeiro.es.gov.br/api/patrimonios/frota</p>

                <h3>Exemplo</h3>
                <p><a href="/api/patrimonios/frota">transparencia.cachoeiro.es.gov.br/api/patrimonios/frota</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[[{"FrotaID":1,"PlacaVeiculo":"MTB-3270","Propriedade":"Pr\u00f3prio","Marca":"VW","Modelo":"GOL","Ano":"2005","Cor":null,"DestinacaoAtual":null,"Status":"Em Utiliza\u00e7\u00e3o","Categoria":"Leves","Subcategoria":"Ve\u00edculo Administrativo"}]</pre>
                </div>
                <h3> Detalhes das colunas</h3>
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
                             <td scope="col">Placa</td>
                             <td scope="col">string</td>
                             <td scope="col">Placa do Veículo</td>
                         </tr>
                         <tr>
                             <td scope="col">Propriedade</td>
                             <td scope="col">string</td>
                             <td scope="col">Identificar se o veículo é próprio, locado, cedido, etc</td>
                         </tr>
                         <tr>
                             <td scope="col">Marca</td>
                             <td scope="col">string</td>
                             <td scope="col">Marca do Veículo (ex. Ford, Fiat, etc)</td>
                         </tr>
                         <tr>
                             <td scope="col">Modelo</td>
                             <td scope="col">string</td>
                             <td scope="col">Modelo do Veículo (ex. Gol, Palio, Fiesta, etc)</td>
                         </tr>
                         <tr>
                             <td scope="col">Ano</td>
                             <td scope="col">string</td>
                             <td scope="col">Ano de Fabricação do Veículo</td>
                         </tr>  
                         <tr>
                             <td scope="col">Cor</td>
                             <td scope="col">string</td>
                             <td scope="col">Cor do Veículo</td>
                         </tr> 
                         <tr>
                             <td scope="col">Destinação Atual</td>
                             <td scope="col">string</td>
                             <td scope="col">Descrição da destinação do veículo. Se está em uso, por qual secretaria está sendo usado, se está cedido, baixado etc</td>
                         </tr>
                         <tr>
                             <td scope="col">Status</td>
                             <td scope="col">string</td>
                             <td scope="col">Status atual do veículo (em utilização, em manuteção, etc)</td>
                         </tr>
                         <tr>
                             <td scope="col">Categoria</td>
                             <td scope="col">string</td>
                             <td scope="col">Categoria do veículo (leve, pesado, etc)</td>
                         </tr>
                         <tr>
                             <td scope="col">Subcategoria</td>
                             <td scope="col">string</td>
                             <td scope="col">Subcategoria do veículo (administrativo, transporte, etc)</td>
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