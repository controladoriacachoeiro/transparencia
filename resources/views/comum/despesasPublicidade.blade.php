@extends('layouts.app')
@section('htmlheader_title', 'Despesas com Publicidade')

@section('cssheader')
@endsection

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
            <li class="active">Despesas com Publicidade</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Planilhas das Despesas</h3>
        </div>

        <div class="box-group box-body text-justify"  id="accordion">
          <!--2018-->
          <div class="panel box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                  2018
                </a>
              </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
              <div class="box-body">
                <ul class="links-gestao">
                  <!--Janeiro-->
                  <li>
                    <a class="acessibilidade" href="#janeiro2018" data-toggle="collapse">Janeiro</a>
                    <ul id="janeiro2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornecedores contratados janeiro 2018.pdf'])}}">Fornecedores contratados no mês de janeiro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores janeiro 2018.pdf'])}}">Valores dos fornecedores no mês de janeiro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculações contratadas janeiro 2018.pdf'])}}">Veiculações contratadas no mês de janeiro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculos contratados janeiro 2018.pdf'])}}">Veículos contratados no mês de janeiro de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Janeiro-->
                  <!--Fevereiro-->
                  <li>
                    <a class="acessibilidade" href="#fevereiro2018" data-toggle="collapse">Fevereiro</a>
                    <ul id="fevereiro2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornecedores contratados fevereiro 2018.pdf'])}}">Fornecedores contratados no mês de fevereiro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores fevereiro 2018.pdf'])}}">Valores dos fornecedores no mês de fevereiro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculações contratadas fevereiro 2018.pdf'])}}">Veiculações contratadas no mês de fevereiro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculos contratados fevereiro 2018.pdf'])}}">Veículos contratados no mês de fevereiro de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Fevereiro-->
                  <!--Março-->
                  <li>
                    <a class="acessibilidade" href="#marco2018" data-toggle="collapse">Março</a>
                    <ul id="marco2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornecedores contratados março 2018.pdf'])}}">Fornecedores contratados no mês de março de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores março 2018.pdf'])}}">Valores dos fornecedores no mês de março de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculações contratadas março 2018.pdf'])}}">Veiculações contratadas no mês de março de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculos contratados março 2018.pdf'])}}">Veículos contratados no mês de março de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Março-->
                  <!--Abril-->
                  <li>
                    <a class="acessibilidade" href="#abril2018" data-toggle="collapse">Abril</a>
                    <ul id="abril2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornecedores contratados abril 2018.pdf'])}}">Fornecedores contratados no mês de abril de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores contratados abril 2018.pdf'])}}">Valores dos fornecedores contratados no mês de abril de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores de veiculações contratadas abril 2018.pdf'])}}">Valores de veiculações contratadas no mês de abril de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculos contratados abril 2018.pdf'])}}">Veículos contratados no mês de abril de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Abril-->
                  <!--Maio-->
                  <li>
                    <a class="acessibilidade" href="#maio2018" data-toggle="collapse">Maio</a>
                    <ul id="maio2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornecedores contratados maio 2018.pdf'])}}">Fornecedores contratados no mês de maio de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores contratados maio 2018.pdf'])}}">Valores dos fornecedores contratados no mês de maio de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores de veiculações contratadas maio 2018.pdf'])}}">Valores de veiculações contratadas no mês de maio de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculos contratados maio 2018.pdf'])}}">Veículos contratados no mês de maio de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Maio-->
                  <!--Junho-->
                  <li>
                    <a class="acessibilidade" href="#junho2018" data-toggle="collapse">Junho</a>
                    <ul id="junho2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornededores contratados no mês de junho.pdf'])}}">Fornecedores contratados no mês de junho de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores contratados no mês de junho.pdf'])}}">Valores dos fornecedores contratados no mês de junho de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos veículos contratados no mês de junho.pdf'])}}">Valores de veiculações contratadas no mês de junho de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculos contratados no mês de junho.pdf'])}}">Veículos contratados no mês de junho de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Junho-->
                  <!--Julho-->
                  <li>
                    <a class="acessibilidade" href="#julho2018" data-toggle="collapse">Julho</a>
                    <ul id="julho2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornecedores contratados no mês de jullho.pdf'])}}">Fornecedores contratados no mês de julho de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores contratados no mês de julho.pdf'])}}">Valores dos fornecedores contratados no mês de julho de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos veículos contratados no mês de julho.pdf'])}}">Valores de veiculações contratadas no mês de julho de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculos contratados no mês de julho.pdf'])}}">Veículos contratados no mês de julho de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Julho-->
                  <!--Agosto-->
                  <li>
                    <a class="acessibilidade" href="#agosto2018" data-toggle="collapse">Agosto</a>
                    <ul id="agosto2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornecedores contratados agosto 2018.pdf'])}}">Fornecedores contratados no mês de agosto de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores contratados agosto 2018.pdf'])}}">Valores dos fornecedores contratados no mês de agosto de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos veículos contratados no mês de agosto 2018.pdf'])}}">Valores dos veículos contratados no mês de agosto de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculos contratados no mês de agosto.pdf'])}}">Veículos contratados no mês de agosto de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Agosto-->
                  <!--Setembro-->
                  <li>
                    <a class="acessibilidade" href="#setembro2018" data-toggle="collapse">Setembro</a>
                    <ul id="setembro2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornecedores contratados setembro 2018.pdf'])}}">Fornecedores contratados no mês de setembro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores contratados setembro 2018.pdf'])}}">Valores dos fornecedores contratados no mês de setembro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos veiculos contratados no mês de setembro 2018.pdf'])}}">Valores dos veículos contratados no mês de setembro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculos contratados no mês de setembro.pdf'])}}">Veículos contratados no mês de setembro de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Setembro-->
                  <!--Outubro-->
                  <li>
                    <a class="acessibilidade" href="#outubro2018" data-toggle="collapse">Outubro</a>
                    <ul id="outubro2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornecedores contratados no mês de outubro 2018.pdf'])}}">Fornecedores contratados no mês de outubro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores contratados no mês de outubro de 2018.pdf'])}}">Valores dos fornecedores contratados no mês de outubro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos veículos contratados no mês de outubro de 2018.pdf'])}}">Valores dos veículos contratados no mês de outubro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculos contratados no mês de outubro de 2018.pdf'])}}">Veículos contratados no mês de outubro de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Outubro-->
                  <!--Novembro-->
                  <li>
                    <a class="acessibilidade" href="#novembro2018" data-toggle="collapse">Novembro</a>
                    <ul id="novembro2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornecedores contratados no mês de novembro de 2018.pdf'])}}">Fornecedores contratados no mês de novembro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores contratados no mês de novembro de 2018.pdf'])}}">Valores dos fornecedores contratados no mês de novembro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos veículos contratados no mês de novembro de 2018.pdf'])}}">Valores dos veículos contratados no mês de novembro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veiculos contratados no mês de novembro de 2018.pdf'])}}">Veículos contratados no mês de novembro de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Novembro-->
                  <!--Dezembro-->
                  <li>
                    <a class="acessibilidade" href="#dezembro2018" data-toggle="collapse">Dezembro</a>
                    <ul id="dezembro2018" class="collapse links-gestao">
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Fornecedores contratados no mês de dezembro 2018.pdf'])}}">Fornecedores contratados no mês de dezembro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos fornecedores contratados no mês de dezembro 2018.pdf'])}}">Valores dos fornecedores contratados no mês de dezembro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Valores dos veículos contratados no mês de dezembro 2018.pdf'])}}">Valores dos veículos contratados no mês de dezembro de 2018</a>
                      </li>
                      <li>
                        <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['ano' => '2018', 'arquivo' => 'Veículos contratados no mês de dezembro 2018.pdf'])}}">Veículos contratados no mês de dezembro de 2018</a>
                      </li>
                    </ul>
                  </li>
                  <!--Fim Dezembro-->
                </ul>
              </div>
            </div>
          </div>
          <!--2018-->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->

@endsection