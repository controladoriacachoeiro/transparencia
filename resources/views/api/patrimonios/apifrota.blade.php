@extends('layouts.app')
@section('htmlheader_title', 'API Frota')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
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
                             <td>Placa</td>
                             <td>string</td>
                             <td>Placa do Veículo</td>
                         </tr>
                         <tr>
                             <td>Propriedade</td>
                             <td>string</td>
                             <td>Identificar se o veículo é próprio, locado, cedido, etc</td>
                         </tr>
                         <tr>
                             <td>Marca</td>
                             <td>string</td>
                             <td>Marca do Veículo (ex. Ford, Fiat, etc)</td>
                         </tr>
                         <tr>
                             <td>Modelo</td>
                             <td>string</td>
                             <td>Modelo do Veículo (ex. Gol, Palio, Fiesta, etc)</td>
                         </tr>
                         <tr>
                             <td>Ano</td>
                             <td>string</td>
                             <td>Ano de Fabricação do Veículo</td>
                         </tr>  
                         <tr>
                             <td>Cor</td>
                             <td>string</td>
                             <td>Cor do Veículo</td>
                         </tr> 
                         <tr>
                             <td>Destinação Atual</td>
                             <td>string</td>
                             <td>Descrição da destinação do veículo. Se está em uso, por qual secretaria está sendo usado, se está cedido, baixado etc</td>
                         </tr>
                         <tr>
                             <td>Status</td>
                             <td>string</td>
                             <td>Status atual do veículo (em utilização, em manuteção, etc)</td>
                         </tr>
                         <tr>
                             <td>Categoria</td>
                             <td>string</td>
                             <td>Categoria do veículo (leve, pesado, etc)</td>
                         </tr>
                         <tr>
                             <td>Subcategoria</td>
                             <td>string</td>
                             <td>Subcategoria do veículo (administrativo, transporte, etc)</td>
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