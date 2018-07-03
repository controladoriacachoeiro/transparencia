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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Planilhas das Despesas</h3>
            </div>
            <!-- /.box-header -->
            <div class="row">
              <div class="col-lg-10">
                <div class="box-body text-justify">
                <ul class="links-gestao">
                  <li> 
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Fornecedores contratados janeiro 2018.pdf'])}}">Fornecedores contratados janeiro 2018</a>
                  </li>
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Valores dos fornecedores janeiro 2018.pdf'])}}">Valores dos fornecedores janeiro 2018</a>
                  </li>
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Veiculações contratadas janeiro 2018.pdf'])}}">Veiculações contratadas janeiro 2018</a>
                  </li>
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Veiculos contratados janeiro 2018.pdf'])}}">Veículos contratados janeiro 2018</a>
                  </li>
                </ul>

                <ul class="links-gestao">
                  <li>     
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Fornecedores contratados fevereiro 2018.pdf'])}}">Fornecedores contratados fevereiro 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Valores dos fornecedores fevereiro 2018.pdf'])}}">Valores dos fornecedores fevereiro 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Veiculações contratadas fevereiro 2018.pdf'])}}">Veiculações contratadas fevereiro 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Veiculos contratados fevereiro 2018.pdf'])}}">Veículos contratados fevereiro 2018</a>
                  </li>
                </ul>   

                <ul class="links-gestao">
                  <li>     
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Fornecedores contratados março 2018.pdf'])}}">Fornecedores contratados março 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Valores dos fornecedores março 2018.pdf'])}}">Valores dos fornecedores março 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Veiculações contratadas março 2018.pdf'])}}">Veiculações contratadas março 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Veiculos contratados março 2018.pdf'])}}">Veículos contratados março 2018</a>
                  </li>
                </ul>    

                <ul class="links-gestao">
                  <li>     
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Fornecedores contratados abril 2018.pdf'])}}">Fornecedores contratados abril 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Valores dos fornecedores contratados abril 2018.pdf'])}}">Valores dos fornecedores contratados abril 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Valores de veiculações contratadas abril 2018.pdf'])}}">Valores de veiculações contratadas abril 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Veiculos contratados abril 2018.pdf'])}}">Veículos contratados abril 2018</a>
                  </li>
                </ul>     

                <ul class="links-gestao">
                  <li>     
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Fornecedores contratados maio 2018.pdf'])}}">Fornecedores contratados maio 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Valores dos fornecedores contratados maio 2018.pdf'])}}">Valores dos fornecedores contratados maio 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Valores de veiculações contratadas maio 2018.pdf'])}}">Valores de veiculações contratadas maio 2018</a>
                  </li>                  
                  <li>
                    <a target="_blank" class="acessibilidade" href="{{route('downloadPublicidade', ['arquivo' => 'Veiculos contratados maio 2018.pdf'])}}">Veículos contratados maio 2018</a>
                  </li>
                </ul>             
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