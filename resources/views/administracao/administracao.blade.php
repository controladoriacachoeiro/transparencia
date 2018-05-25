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
        <div class="box-body">
          <div class="box-group" id="accordion">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-top: 0px; padding-bottom: 0px">
                        <b>{{ Auth::user()->name }}</b> <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
          </div>
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

@endguest
      
@endsection

@section('scriptsadd')
@endsection