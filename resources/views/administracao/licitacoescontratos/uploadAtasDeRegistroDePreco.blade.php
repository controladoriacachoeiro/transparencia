@extends('layouts.app')
@section('htmlheader_title', 'Upload de Atas de Registro de Preço')

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
                <div class="panel-heading">Upload de Atas de Registro de Preço</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="idForm" action="/uploadArquivoAtasDeRegistroDePreco" enctype="multipart/form-data" data-toggle="validator" role="form">
                        @csrf

                        <div class="form-group">
                            <label for="processoLicitatorioLabel" class="col-md-4 control-label">Processo Licitatório</label>

                            <div class="col-md-6">
                            <input id="processoLicitatorio" type="text" class="form-control" name="processoLicitatorio" value="{{ $dadosDb2[0]->NumeroProcesso }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nomeExibicaoLabel" class="col-md-4 control-label">Número da Ata</label>

                            <div class="col-md-6">
                                <input id="numeroAta" type="text" class="form-control{{ $errors->has('numeroAta') ? ' is-invalid' : '' }}" name="numeroAta" value="{{ old('numeroAta') }}" autofocus placeholder="Digite o número da Ata." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('numeroAta'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('numeroAta') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fornecedorLabel" class="col-md-4 control-label">Fornecedor</label>

                            <div class="col-md-6">
                                <select id="fornecedor" class="form-control" name="fornecedor">
                                    @foreach($dadosDb as $valor)
                                        <option value="{{ $valor->NomeParticipante }}">{{ $valor->NomeParticipante }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cpfCnpjFornecedorLabel" class="col-md-4 control-label">CPF/CNPJ Fornecedor</label>

                            <div class="col-md-6">
                                <input id="cpfCnpjFornecedor" type="text" class="form-control" name="cpfCnpjFornecedor" value="{{ $dadosDb[0]->CNPJParticipante }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="modalidadeLicitatoriaLabel" class="col-md-4 control-label">Modalidade Licitatória</label>

                            <div class="col-md-6">
                                <input id="modalidadeLicitatoria" type="text" class="form-control{{ $errors->has('modalidadeLicitatoria') ? ' is-invalid' : '' }}" name="modalidadeLicitatoria" value="{{ old('modalidadeLicitatoria') }}" autofocus placeholder="Digite a Modalidade Licitatória." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('modalidadeLicitatoria'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('modalidadeLicitatoria') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dataValidadeLabel" class="col-md-4 control-label">Data da Validade</label>

                            <div class="col-md-6">
                                <input id="dataValidade" type="date" class="form-control{{ $errors->has('dataValidade') ? ' is-invalid' : '' }}" name="dataValidade" value="{{ old('dataValidade') }}" autofocus placeholder="Digite a Data da Validade." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('dataValidade'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dataValidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descricaoLabel" class="col-md-4 control-label">Descrição</label>

                            <div class="col-md-6">
                                <textarea id="descricao" rows="3" class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" name="descricao" value="" autofocus placeholder="Digite a Descrição da Ata." required>{{ $dadosDb2[0]->ObjetoLicitado }}</textarea>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('descricao'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                        Fazer a pergunta se tem anexo, e se for marcado que sim, mostrar a opção de upload do arquivo e de escolher o tipo de arquivo, o sub caminho e nome para exibição.

                        <div class="form-group" id="divPerguntaAnexo">
                            <label for="perguntaAnexoLabel" class="col-md-4 control-label">Deseja anexar algum arquivo agora?</label>

                            <div class="col-md-6">
                                <select id="perguntaAnexo" class="form-control" name="perguntaAnexo">
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select>
                            </div>
                        </div>

                        <div id="divAnexoArquivoIntegra">
                            <div class="form-group" id="divPerguntaAnexo">
                                <label for="perguntaAnexoLabel" class="col-md-4 control-label">Tipo de Documento</label>
    
                                <div class="col-md-6">
                                    <select class="form-control" name="perguntaAnexo">
                                        <option value="Contrato/Termo">Contrato/Termo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fileLabel" class="col-md-4 control-label">Anexo</label>
                                
                                <div class="col-md-6">
                                    <input type="file" name="file[]" id="file" style="padding-bottom: 10px">
                                </div>
                            </div>
                            
                            <div class="form-group row col-md-6" style="float: right">
                                <label for="fileLabel" class="col-md-4 col-form-label text-md-right labelDescricao"></label>
                                
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" id="addArquivo">Adicionar mais arquivos</button>
                                </div>
                            </div> 
                            <br>
                        </div>
                            
                        <div class="form-group">
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

        $(document).ready(function () { 
            if($('#perguntaAnexo').val() == "Não"){
                $("#divAnexoArquivoIntegra").attr("hidden", "true");
                // $("#file").removeAttr("required");
            } else {
                $("#divAnexoArquivoIntegra").removeAttr("hidden");
                // $("#file").attr("required", "true");
            } 
        });

        $("#perguntaAnexo").change(function() {
            if($('#perguntaAnexo').val() == "Não"){
                $("#divAnexoArquivoIntegra").attr("hidden", "true");
                // $("#file").removeAttr("required");
            } else {
                $("#divAnexoArquivoIntegra").removeAttr("hidden");
                // $("#file").attr("required", "true");
            } 
        });

        $("#addArquivo").click(function(){
            addField();
        });

        function addField(){
            $('form input:file').last().after($('<input type="file" name="file[]" class="file" style="padding-bottom: 10px">'));
        }

        var d = new Date();
        
        var dia = d.getDate();
        var mes = d.getMonth() + 1;
        var ano = d.getFullYear();

        if(mes < 10){
            mes = "0" + mes;
        }

        if(dia < 10){
            dia = "0" + dia;
        }

        var dataValidade = ano + "-" + mes + "-" + dia;

        $(function () {
            $('#dataValidade').val(dataValidade);
        }); 

        var dadosDb = <?php echo $dadosDb ?>;
        var indice;
        
        $("#fornecedor").change(function() {
            // $("#fornecedor").find(":selected").index();
            indice = $("#fornecedor").find(":selected").index();
            $("#cpfCnpjFornecedor").attr("value", dadosDb[indice].CNPJParticipante); 
        });
    </script>

@endsection
