@extends('layouts.app')
@section('htmlheader_title', 'API Bens Imóveis')

@section('cssheader')
@endsection

@section('main-content')
    <?php //Configurar variável para Navegação
        $Navegacao = array(
                        array('url' => '/api' ,'Descricao' => 'WebService'),
                        array('url' => '#' ,'Descricao' => 'API Bens Imóveis'));
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
                <p>transparencia.cachoeiro.es.gov.br/api/patrimonios/bensimoveis</p>

                <h3>Exemplo</h3>
                <p><a href="/api/patrimonios/bensimoveis">transparencia.cachoeiro.es.gov.br/api/patrimonios/bensimoveis</a></p>
                <h4>Retorno<h4>
                <div class="">
                    <pre>[{"BemID":1,"UnidadeGestora":"Secretaria Municipal de Educação","IdentificacaoBem":"EMEB “Abgail dos Santos Simões”","Descricao":"Escola Municipal de Ensino Básico","Localizacao":"Rua Antero Soares, s\/n – Pacotuba \/ Urbana – CEP: 29.323-000","DestinacaoAtual":"Escola Municipal de Ensino Básico","Situacao":"Próprio"}]</pre>
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
                             <td scope="col">UnidadeGestora</td>
                             <td scope="col">string</td>
                             <td scope="col">Órgão, Autarquia, etc.</td>
                        </tr>
                        <tr>
                             <td scope="col">IdentificacaoBem</td>
                             <td scope="col">string</td>
                             <td scope="col">identificação do Imóvel </td>
                        </tr>
                        <tr>
                            <td scope="col">Descricao</td>
                            <td scope="col">string</td>
                            <td scope="col">Descrição que permita entender o que é o bem imóvel</td>
                        </tr>
                        <tr>
                             <td scope="col">Localizacao</td>
                             <td scope="col">string</td>
                             <td scope="col">Endereço do imóvel</td>
                        </tr>
                        <tr>
                             <td scope="col">DestinacaoAtual</td>
                             <td scope="col">string</td>
                             <td scope="col">Destinação atual do imóvel</td>
                        </tr>  
                        <tr>
                             <td scope="col">Situacao</td>
                             <td scope="col">string</td>
                             <td scope="col">Situação do imóvel (Ex: próprio)</td>
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