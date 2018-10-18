@extends('layouts.app')
@section('htmlheader_title', 'Administração')

@section('cssheader')
@endsection

@section('main-content')

  @guest
      <?php  
          echo "<script> window.location.href = '/login';</script>";
      ?>
  @else

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- /.box-header -->
          <div style="font-size: 18px; padding-right: 10px; padding-top: 5px; font-weight: bold; float: right;">
              <a class="acessibilidade" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  Sair
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>     

        <div class="box-body text-justify">
          <!-- Erro -->
          @if(session()->has('message'))
              <br>
              <div class="col-md-12 alert alert-danger" style="font-size:20px">
                  {{ session()->get('message') }}
              </div>
          @endif
          <!--Fim erro-->

          <!-- Sucesso -->
          @if(session()->has('sucesso'))
              <br>
              <div class="col-md-12 alert alert-success" style="font-size:20px">
                  {{ session()->get('sucesso') }}
              </div>
          @endif
          <!--Fim sucesso-->
          <ul class="links-gestao">
            @foreach($dadosDb as $valor)
              @if($valor->idPermissao == '1')
                <li> 
                  <a class="acessibilidade" href="/verificaPermissaoPPA">PPA</a>
                </li>
              @endif

              @if($valor->idPermissao == '2')
                <li> 
                  <a class="acessibilidade" href="/verificaPermissaoLDO">LDO</a>
                </li>    
              @endif

              @if($valor->idPermissao == '3')
                <li>     
                  <a class="acessibilidade" href="/verificaPermissaoLOA">LOA</a>
                </li>
              @endif

              @if($valor->idPermissao == '4')
                <li>
                  <a class="acessibilidade" href="/verificaPermissaoRGF">RGF</a>
                </li>
              @endif

              @if($valor->idPermissao == '5')
                <li>
                  <a class="acessibilidade" href="/verificaPermissaoRREO">RREO</a>
                </li>
              @endif

              @if($valor->idPermissao == '6')
                <li>
                  <a class="acessibilidade" href="/verificaPermissaoPrestacaoDeConta">Balanço Anual</a>
                </li>
              @endif

              @if($valor->idPermissao == '7')
                <li>
                  <a class="acessibilidade" href="/verificaPermissaoPrestacaoDeConta">Royalties</a>
                </li>
              @endif

              @if($valor->idPermissao == '8')
                <li>
                  <a class="acessibilidade" href="/verificaPermissaoAtasDeRegistroDePreco">Atas de Registro de Preço</a>
                </li>
              @endif

              @if($valor->idPermissao == '9')
                <li>
                  <a class="acessibilidade" href="/uploadContratos">Contratos</a>
                </li>
              @endif

              @if($valor->idPermissao == '10')
                <li>
                  <a class="acessibilidade" href="/verificaPermissaoLicitacao">Licitações</a>
                </li>
              @endif

            @endforeach    
          </ul>            
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  @if(Auth::user()->status != "Ativo")
    <script> alert('Não é possível acessar o sistema pois este usuário está desativado!'); </script>
    {{Auth::logout()}}
    <script> window.location.href = '/login';</script>
  @endif

@endguest
      
@endsection

@section('scriptsadd')

@endsection