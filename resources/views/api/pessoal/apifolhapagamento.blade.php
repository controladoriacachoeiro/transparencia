@extends('layouts.app')
@section('htmlheader_title', 'API Folha de Pagamento')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <h3>Url da API</h3>
                <p>transparencia.cachoeiro.es.gov.br/api/pessoal/servidores/pagamento/{matricula}</p>
                
                <h3>Parâmetros da Url</h3>
                <div class="col-md-12">
                    <div class="row">
                        <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='vertical-align:middle'>Parâmetros</th>
                                    <th style='vertical-align:middle'>Descrição</th>
                                    <th style='vertical-align:middle'>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>matricula</td>
                                    <td>matricula do servidor para buscar a folha de pagamento</td>
                                    <td>string</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div> 

                <h3>Exemplo</h3>
                <p><a href="/pessoal/servidores/pagamento/11111">transparencia.cachoeiro.es.gov.br/api/pessoal/servidores/pagamento/11111</a></p>
                <h4>Retorno<h4>
                <div class="">
                <pre>[{"FolhaPagamentoID":11111,"Matricula":11111,"Nome":"JOAO","CPF":"99999999999","MesPagamento":1,"AnoPagamento":2016,"CodigoEvento":475,"DescricaoEvento":"PRO-TEMPORE","TipoEvento":"Cr\u00e9dito","Quantidade":5,"Valor":44.18},{"FolhaPagamentoID":180480,"Matricula":11111,"Nome":"Joao","CPF":"99999999999","MesPagamento":1,"AnoPagamento":2016,"CodigoEvento":18,"DescricaoEvento":"ADICIONAL NOTURNO - 25%","TipoEvento":"Cr\u00e9dito","Quantidade":100,"Valor":61.85},{"FolhaPagamentoID":756225,"Matricula":11111,"Nome":"jOAO","CPF":"99999999999","MesPagamento":1,"AnoPagamento":2016,"CodigoEvento":541,"DescricaoEvento":"DESCONTO IPACI","TipoEvento":"D\u00e9bito","Quantidade":11,"Valor":102.06}]</pre>
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