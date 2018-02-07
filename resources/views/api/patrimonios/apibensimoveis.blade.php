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
                    <pre>[{"BemID":1,"UnidadeGestora":"Secretaria Municipal de Educa\u00e7\u00e3o","IdentificacaoBem":"EMEB \u201cAbgail dos Santos Sim\u00f5es\u201d","Descricao":"Escola Municipal de Ensino B\u00e1sico","Localizacao":"Rua Antero Soares, s\/n \u2013 Pacotuba \/ Urbana \u2013 CEP: 29.323-000","DestinacaoAtual":"Escola Municipal de Ensino B\u00e1sico","Situacao":"Pr\u00f3prio"},{"BemID":2,"UnidadeGestora":"Secretaria Municipal de Educa\u00e7\u00e3o","IdentificacaoBem":"EMEB \u201cAlair Turbay Bai\u00e3o\u201d","Descricao":"Escola Municipal de Ensino B\u00e1sico","Localizacao":"Rua Mileto Louzada, n\u00ba 15 \u2013 Otton Marins \/ Urbana \u2013 CEP: 29.301-807","DestinacaoAtual":"Escola Municipal de Ensino B\u00e1sico","Situacao":"Pr\u00f3prio"},{"BemID":3,"UnidadeGestora":"Secretaria Municipal de Educa\u00e7\u00e3o","IdentificacaoBem":"EMEB \u201cAlbertina Macedo\u201d","Descricao":"Escola Municipal de Ensino B\u00e1sico","Localizacao":"Rua Leto Ant\u00f4nio Duarte, n\u00ba 1 - Santa Cec\u00edlia \/ Urbana \u2013 CEP: 29.307.560","DestinacaoAtual":"Escola Municipal de Ensino B\u00e1sico","Situacao":"Pr\u00f3prio"},{"BemID":4,"UnidadeGestora":"Secretaria Municipal de Educa\u00e7\u00e3o","IdentificacaoBem":"EMEB \"Alberto Sart\u00f3rio\"","Descricao":"Escola Municipal de Ensino B\u00e1sico","Localizacao":"Estrada da Gruta, s\/n - Distrito de Gruta \/ Rural \u2013 CEP: 29.324-000","DestinacaoAtual":"Escola Municipal de Ensino B\u00e1sico","Situacao":"Pr\u00f3prio"},{"BemID":5,"UnidadeGestora":"Secretaria Municipal de Educa\u00e7\u00e3o","IdentificacaoBem":"EMEB \"Anacleto Ramos\"","Descricao":"Escola Municipal de Ensino B\u00e1sico","Localizacao":"Rua M\u00e1rio Imperial n\u00ba 2 - Ferrovi\u00e1rios \/ Urbana \u2013 CEP: 29.308.014","DestinacaoAtual":"Escola Municipal de Ensino B\u00e1sico","Situacao":"Pr\u00f3prio (Municipalizada)"}]</pre>
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
                            <td scope="col">Descrição</td>
                            <td scope="col">string</td>
                            <td scope="col">Descrição permita entender o que é o bem móvel</td>
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