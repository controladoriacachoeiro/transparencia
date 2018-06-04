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
              <a class="" href="{{ route('logout') }}"
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
              @if($valor->descricao == 'PPA')
                <li> 
                  <a class="acessibilidade" href="/uploadPPA">Upload PPA</a>
                </li>
              @endif

              @if($valor->descricao == 'LDO')
                <li> 
                  <a class="acessibilidade" href="/uploadLDO">Upload LDO</a>
                </li>    
              @endif

              @if($valor->descricao == 'LOA')
                <li>     
                  <a class="acessibilidade" href="/uploadLOA">Upload LOA</a>
                </li>
              @endif

              @if($valor->descricao == 'RGF')
                <li>
                  <a class="acessibilidade" href="/uploadRGF">Upload RGF</a>
                </li>
              @endif

              @if($valor->descricao == 'RREO')
                <li>
                  <a class="acessibilidade" href="/uploadRREO">Upload RREO</a>
                </li>
              @endif

              @if($valor->descricao == 'Balanço Anual')
                <li>
                  <a class="acessibilidade" href="/uploadBalancoAnual">Upload Balanço Anual</a>
                </li>
              @endif

              @if($valor->descricao == 'Royalties')
                <li>
                  <a class="acessibilidade" href="/uploadRoyalties">Upload Royalties</a>
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