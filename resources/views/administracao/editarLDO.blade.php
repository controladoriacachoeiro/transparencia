@extends('layouts.app')
@section('htmlheader_title', 'Editar Arquivo LDO')

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
            <div class="panel panel-default">
                <div class="panel-heading">Editar Arquivo LDO</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="idForm" action="/editarArquivoLDO" enctype="multipart/form-data" data-toggle="validator" role="form">
                        @csrf

                        <input id="idArquivo" type="hidden" name="idArquivo" value="{{ $dadosDb[0]->idArquivo }}">

                        <div class="form-group">
                            <label for="nomeExibicaoLabel" class="col-md-4 control-label">Nome para Exibição</label>

                            <div class="col-md-6">
                                <input id="nomeExibicao" type="text" class="form-control{{ $errors->has('nomeExibicao') ? ' is-invalid' : '' }}" name="nomeExibicao" value="{{ $dadosDb[0]->nomeExibicao }}" autofocus placeholder="Digite o nome de exibição do arquivo." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('nomeExibicao'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomeExibicao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fileLabel" class="col-md-4 control-label">Anexo</label>

                            <div class="col-md-6">
                                <input type="file" name="file[]" id="file">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Editar</button>
                                <button type="button" class="btn btn-primary" id="buttonVoltar">Voltar</button>
                            </div>
                        </div>
                        <!-- Erro -->
                        @if(session()->has('message'))
                            <br>
                            <div class="form-group row mb-0 alert alert-danger" style="font-size:20px">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <!--Fim erro-->
                    </form>
                </div>
            </div>
        </div>
    </div>

@endguest

@endsection

@section('scriptsadd')

    <script>
        $("#buttonVoltar").click(function() {
            window.history.go(-1);
        }); 
    </script>

@endsection
