@extends('layouts.app')
@section('htmlheader_title', 'Acessibilidade')

@section('cssheader')
@endsection

@section('main-content')
<div clas='row'>
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
                        <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Botão</th>
                                    <th style='vertical-align:middle'>Função</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="btn btn-xs jfontsize-button botoes-acessibilidade">
							            <i class="fa fa-wheelchair circle-border"></i>
							        </span></td>
                                    <td>Acessar página de acessibilidade.</td>
                                </tr>
                                <tr>
                                    <td><span class="btn btn-xs jfontsize-button botoes-acessibilidade">
							            <i class="fa fa-font"></i>
							        </span></td>
                                    <td>Redimensiona os textos para o tamanho original.</td>
                                </tr>
                                <tr>
                                    <td><span class="btn btn-xs jfontsize-button botoes-acessibilidade">
                                    <i class="fa fa-font"></i><i class="fa fa-plus" style="margin-left:-1px;"></i>
							        </span></td>
                                    <td>Aumenta o tamanho da fonte.</td>
                                </tr>
                                <tr>
                                    <td><span class="btn btn-xs jfontsize-button botoes-acessibilidade">
                                    <i class="fa fa-font"></i><i class="fa fa-minus" style="margin-left:-1px;"></i>
							        </span></td>
                                    <td>Diminui o tamanho da fonte.</td>
                                </tr>
                                <tr>
                                    <td><span class="btn btn-xs jfontsize-button botoes-acessibilidade">
                                    <i class="fa fa-adjust action-contraste"></i>
							        </span></td>
                                    <td>Altera o contraste entre as cores do texto e o fundo.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Navegação</h3>
                <div class="col-md-12">
                    <div class="row" style="overflow:auto">
                        <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Atalho Firefox</th>
                                    <th style='vertical-align:middle'>Atalho Chrome</th>
                                    <th style='vertical-align:middle'>Atalho Internet Explorer</th>
                                    <th style='vertical-align:middle'>Função</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Alt+Shift+1</td>
                                    <td>Alt+1</td>
                                    <td>Alt+1,Enter</td>
                                    <td>Início.</td>
                                </tr>
                                <tr>
                                    <td>Alt+Shift+2</td>
                                    <td>Alt+2</td>
                                    <td>Alt+2,Enter</td>
                                    <td>O Portal.</td>
                                </tr>
                                <tr>
                                    <td>Alt+Shift+3</td>
                                    <td>Alt+3</td>
                                    <td>Alt+3,Enter</td>
                                    <td>Glossário.</td>
                                </tr>
                                <tr>
                                    <td>Alt+Shift+4</td>
                                    <td>Alt+4</td>
                                    <td>Alt+4,Enter</td>
                                    <td>Perguntas Frequentes.</td>
                                </tr>
                                <tr>
                                    <td>Alt+5</td>
                                    <td>Alt+5</td>
                                    <td>Alt+5</td>
                                    <td>Página de acessibilidade.</td>
                                </tr>
                                <tr>
                                    <td>Alt+6</td>
                                    <td>Alt+6</td>
                                    <td>Alt+6</td>
                                    <td>Redimensionar texto.</td>
                                </tr>
                                <tr>
                                    <td>Alt+7</td>
                                    <td>Alt+7</td>
                                    <td>Alt+7</td>
                                    <td>Aumentar fonte.</td>
                                </tr>
                                <tr>
                                    <td>Alt+8</td>
                                    <td>Alt+8</td>
                                    <td>Alt+8</td>
                                    <td>Diminuir fonte.</td>
                                </tr>
                                <tr>
                                    <td>Alt+9</td>
                                    <td>Alt+9</td>
                                    <td>Alt+9</td>
                                    <td>Alterar contraste.</td>
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