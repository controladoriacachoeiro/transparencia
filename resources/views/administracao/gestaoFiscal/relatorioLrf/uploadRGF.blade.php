@extends('layouts.app')
@section('htmlheader_title', 'Upload RGF')

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
                <div class="panel-heading">Upload RGF</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="idForm" action="/uploadArquivoRGF" enctype="multipart/form-data" data-toggle="validator" role="form">
                        @csrf

                        <div class="form-group">
                            <label for="nomeExibicaoLabel" class="col-md-4 control-label">Nome para Exibição</label>

                            <div class="col-md-6">
                                <input id="nomeExibicao" type="text" class="form-control{{ $errors->has('nomeExibicao') ? ' is-invalid' : '' }}" name="nomeExibicao" value="{{ old('nomeExibicao') }}" autofocus placeholder="Digite o nome de exibição do arquivo." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('nomeExibicao'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomeExibicao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="anoLabel" class="col-md-4 control-label">Ano</label>

                            <div class="col-md-6">
                                <select id="ano" class="form-control" name="ano">
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="quadrimestreLabel" class="col-md-4 control-label">Quadrimestre</label>

                            <div class="col-md-6">
                                <select id="quadrimestre" class="form-control" name="quadrimestre">
                                    <option value="1º Quadrimestre">1º Quadrimestre</option>
                                    <option value="2º Quadrimestre">2º Quadrimestre</option>
                                    <option value="3º Quadrimestre">3º Quadrimestre</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fileLabel" class="col-md-4 control-label">Anexo</label>

                            <div class="col-md-6">
                                <input type="file" name="file[]" id="file" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
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

        var d = new Date();
        var ano = d.getFullYear();
        var arrayAno = [];
        var j = ano - 10;
        var k = ano;

        for (j; j < ano; j++){
            arrayAno.push(j);
        }

        for(k; k <= ano + 5; k++){
            arrayAno.push(k);
        }

        //Populando o select de ano
        var option = "";
        for(var i = 0; i < arrayAno.length; i++){
            option = option + "<option value='" + arrayAno[i] + "'>"+arrayAno[i]+"</option>";                
        }
        
        $('#ano').html(option).show();

        $("#ano").val(ano);
    </script>

@endsection
