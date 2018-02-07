@extends('formFiltro')
@section('htmlheader_title')
    Download - Patrimônios
@stop
@section('main-content')
<div class='row'>
    <div class='col-md-12'>
        <div id="navegacao" class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Navegação</h3>                   
            </div>
            <div class="box-body">                                                        
                <ol class="breadcrumb">
                    <li><a href="/">Início</a></li>                                                
                    <li class="active">Download - Patrimônios</li>                                                                                                                           
                </ol>        
            </div>
        </div>            
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class=" box-body box box-solid">
            <div class="box-group" id="accordion">
                <!--Almoxarifado-->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">                        
                            Almoxarifado                        
                        </h4>
                    </div>
                    <div id="collapse1">
                        <div class="box-body">
                            {{ Form::open(array('url' => '/dadosabertos/patrimonios/almoxarifado', 'method' => 'POST')) }}                        
                                <div class="row form-group">
                                    <div class="col-xs-2" style="width: 110px;">
                                        {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                                        {{ Form::close() }}
                                    </div>
                                    <div class="col-xs-2">
                                        <span class="btn btn-primary" data-toggle="collapse" data-target="#almoxarifado">Detalhes</span>
                                    </div>
                                </div>                                    
                        </div>
                        <!--Tabela de Descricao-->
                        <div id="almoxarifado" class="collapse">
                            <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas de download de almoxarifado">
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
                    </div>
                </div>
                <!--Fim Almoxarifado-->

                <!--Bens Moveis-->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">                        
                        Bens Móveis                        
                    </h4>
                    </div>
                    <div id="collapse2">
                    <div class="box-body">
                        {{ Form::open(array('url' => '/dadosabertos/patrimonios/bensmoveis', 'method' => 'POST')) }}                                                                     
                        <div class="row form-group">
                                <div class="col-xs-2" style="width: 110px;">
                                    {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                                    {{ Form::close() }}
                                </div>
                                <div class="col-xs-2">
                                    <span class="btn btn-primary" data-toggle="collapse" data-target="#bens">Detalhes</span>
                                </div>
                        </div>
                    </div>
                    <!--Tabela de Descricao-->
                        <div id="bens" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas de download de bens moveis">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style='vertical-align:middle'>Coluna</th>
                                                    <th scope="col" style='vertical-align:middle'>Tipo</th>
                                                    <th scope="col" style='vertical-align:middle'>Descrição</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                <tr>
                                                    <td scope="col">Número Patrimônio</td>
                                                    <td scope="col">string</td>
                                                    <td scope="col">Código Identificador do bem</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Descrição</td>
                                                    <td scope="col">string</td>
                                                    <td scope="col">Descrição permita entender o que é o bem móvel</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Órgão</td>
                                                    <td scope="col">string</td>
                                                    <td scope="col">Órgão onde o bem está localizado</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Observação</td>
                                                    <td scope="col">string</td>
                                                    <td scope="col">Observações a respeito do bem móvel</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Valor</td>
                                                    <td scope="col">string</td>
                                                    <td scope="col">Valor de avaliação do bem imóvel</td>
                                                </tr>                                              
                                            </tbody>
                                        </table>
                        </div> 
                    <!--Fim Tabela de Descricao-->
                    </div>
                </div>
                <!--Fim Bens Moveis-->

                <!--Bens Imoveis-->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">                        
                        Bens Imóveis                        
                    </h4>
                    </div>
                    <div id="collapse4">
                    <div class="box-body">
                        {{ Form::open(array('url' => '/dadosabertos/patrimonios/bensimoveis', 'method' => 'POST')) }}                                                                     
                        <div class="row form-group">
                                <div class="col-xs-2" style="width: 110px;">
                                    {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                                    {{ Form::close() }}
                                </div>
                                <div class="col-xs-2">
                                    <span class="btn btn-primary" data-toggle="collapse" data-target="#bensimoveis">Detalhes</span>
                                </div>
                        </div>
                    </div>
                    <!--Tabela de Descricao-->
                        <div id="bensimoveis" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas de download de bens imoveis">
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
                    <!--Fim Tabela de Descricao-->
                    </div>
                </div>
                <!--Fim Bens Imoveis-->

                <!--Frota-->
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">                        
                        Frota                        
                    </h4>
                    </div>
                    <div id="collapse3">
                    <div class="box-body">
                        {{ Form::open(array('url' => '/dadosabertos/patrimonios/frota', 'method' => 'POST')) }}                                                                     
                        <div class="row form-group">
                                <div class="col-xs-2" style="width: 110px;">
                                    {{ Form::submit('Download', array('class'=>'btn btn-primary')) }}
                                    {{ Form::close() }}
                                </div>
                                <div class="col-xs-2">
                                    <span class="btn btn-primary" data-toggle="collapse" data-target="#frota">Detalhes</span>
                                </div>
                        </div>
                    </div>
                    <!--Tabela de Descricao-->
                        <div id="frota" class="collapse">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a descrição das colunas de download de frota">
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
                    <!--Fim Tabela de Descricao-->
                    </div>
                </div>
                <!--Fim Frota-->
            </div>
        </div>
    </div>
</div>    

@endsection

@section('scriptsadd') 
    <link rel="stylesheet" media="all" href="{{ asset('/css/jquery.dynatable.css') }}" />
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/options.min.js') }}"></script> 
    <script src="https://rawgit.com/digitalBush/jquery.maskedinput/master/dist/jquery.maskedinput.min.js"></script>
@endsection