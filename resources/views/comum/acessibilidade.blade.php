@extends('layouts.app')
@section('htmlheader_title', 'Acessibilidade')

@section('cssheader')
@endsection

@section('main-content')
<div class='row'>
    <div id="navegacao" class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Navegação</h3>                   
        </div>
        <div class="box-body">                                                        
            <ol class="breadcrumb">
                <li><a href="/">Início</a></li>                                                
                <li class="active">Acessibilidade</li>                                                                     
            </ol>        
        </div>
    </div>           
</div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">                
                <h3>Visualização</h3>
                <div class="col-md-12">
                    <div class="row" style="overflow:auto">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com a lista de botões de acessibilidade e suas descrições">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Botão</th>
                                    <th scope="col" style='vertical-align:middle'>Função</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col" class="text-center"><img src="{{ ('/img/acessibilidade.png') }}" alt="Icone da pagina de acessibilidade"></td>
                                    <td scope="col">Acessar página de acessibilidade.</td>
                                </tr>
                                <tr>
                                    <td scope="col" class="text-center"><img src="{{ ('/img/fonteNormal.png') }}" alt="Icone do botão de aumentar otamanho de fonte padrão"></td>
                                    <td scope="col">Redimensiona os textos para o tamanho original.</td>
                                </tr>
                                <tr>
                                    <td scope="col" class="text-center"><img src="{{ ('/img/fonteMaior.png') }}" alt="Icone do botão para aumentar o tamanho da fonte"></td>
                                    <td scope="col">Aumenta o tamanho da fonte.</td>
                                </tr>
                                <tr>
                                    <td scope="col" class="text-center"><img src="{{ ('/img/fonteMenor.png') }}" alt="Icone do botão para diminuir o tamanho da fonte"></td>
                                    <td scope="col">Diminui o tamanho da fonte.</td>
                                </tr>
                                <tr>
                                    <td scope="col" class="text-center"><img src="{{ ('/img/contraste.png') }}" alt="Icone do botão para inverter o contraste"></td>
                                    <td scope="col">Altera o contraste entre as cores do texto e o fundo.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Navegação</h3>
                <div class="col-md-12">
                    <div class="row" style="overflow:auto">
                        <table id="tabela" class="table table-bordered table-striped" summary="Tabela com os atalhos de teclado">
                            <thead>
                                <tr>
                                    <th scope="col" style='vertical-align:middle'>Atalho Firefox</th>
                                    <th scope="col" style='vertical-align:middle'>Atalho Chrome</th>
                                    <th scope="col" style='vertical-align:middle'>Atalho Internet Explorer</th>
                                    <th scope="col" style='vertical-align:middle'>Função</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">Alt+Shift+1</td>
                                    <td scope="col">Alt+1</td>
                                    <td scope="col">Alt+1,Enter</td>
                                    <td scope="col">Início.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alt+Shift+2</td>
                                    <td scope="col">Alt+2</td>
                                    <td scope="col">Alt+2,Enter</td>
                                    <td scope="col">O Portal.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alt+Shift+3</td>
                                    <td scope="col">Alt+3</td>
                                    <td scope="col">Alt+3,Enter</td>
                                    <td scope="col">Glossário.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alt+Shift+4</td>
                                    <td scope="col">Alt+4</td>
                                    <td scope="col">Alt+4,Enter</td>
                                    <td scope="col">Perguntas Frequentes.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alt+5</td>
                                    <td scope="col">Alt+5</td>
                                    <td scope="col">Alt+5</td>
                                    <td scope="col">Página de acessibilidade.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alt+6</td>
                                    <td scope="col">Alt+6</td>
                                    <td scope="col">Alt+6</td>
                                    <td scope="col">Redimensionar texto.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alt+7</td>
                                    <td scope="col">Alt+7</td>
                                    <td scope="col">Alt+7</td>
                                    <td scope="col">Aumentar fonte.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alt+8</td>
                                    <td scope="col">Alt+8</td>
                                    <td scope="col">Alt+8</td>
                                    <td scope="col">Diminuir fonte.</td>
                                </tr>
                                <tr>
                                    <td scope="col">Alt+9</td>
                                    <td scope="col">Alt+9</td>
                                    <td scope="col">Alt+9</td>
                                    <td scope="col">Alterar contraste.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 
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