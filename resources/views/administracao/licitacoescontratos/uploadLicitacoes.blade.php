@extends('layouts.app')
@section('htmlheader_title', 'Upload Licitação')

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
                <div class="panel-heading acessibilidade">Upload Licitação</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="idForm" action="/uploadArquivoLicitacao" enctype="multipart/form-data" data-toggle="validator" role="form">
                        @csrf

                        <div class="form-group">
                            <label for="codigoLicitacaoLabel" class="col-md-4 control-label">Código da Licitação</label>

                            <div class="col-md-6">
                                <input id="codigoLicitacao" type="text" class="form-control{{ $errors->has('codigoLicitacao') ? ' is-invalid' : '' }}" name="codigoLicitacao" value="{{ old('codigoLicitacao') }}" autofocus placeholder="Digite o código da licitação." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('codigoLicitacao'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('codigoLicitacao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="numeroEditalLabel" class="col-md-4 control-label">Número do Edital</label>

                            <div class="col-md-6">
                                <input id="numeroEdital" type="text" class="form-control{{ $errors->has('numeroEdital') ? ' is-invalid' : '' }}" name="numeroEdital" value="{{ old('numeroEdital') }}" autofocus placeholder="Digite o número do edital." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('numeroEdital'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('numeroEdital') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="anoEditalLabel" class="col-md-4 control-label">Ano do Edital</label>

                            <div class="col-md-6">
                                <input id="anoEdital" type="text" class="form-control{{ $errors->has('anoEdital') ? ' is-invalid' : '' }}" name="anoEdital" value="{{ old('anoEdital') }}" autofocus placeholder="Digite o ano do edital." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('anoEdital'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('anoEdital') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="orgaoLicitanteLabel" class="col-md-4 control-label">Órgão Licitante</label>

                            <div class="col-md-6">
                                <select id="orgaoLicitante" class="form-control acessibilidade" name="orgaoLicitante">
                                    @foreach ($dadosDb4 as $valor4)
                                        <option value="{{ $valor4->OrgaoLicitante }}">{{ $valor4->OrgaoLicitante }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="numeroProcessoLabel" class="col-md-4 control-label">Número do Processo</label>

                            <div class="col-md-6">
                                <input id="numeroProcesso" type="text" class="form-control{{ $errors->has('numeroProcesso') ? ' is-invalid' : '' }}" name="numeroProcesso" value="{{ old('numeroProcesso') }}" autofocus placeholder="Digite o número do processo." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('numeroProcesso'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('numeroProcesso') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="anoProcessoLabel" class="col-md-4 control-label">Ano do Processo</label>

                            <div class="col-md-6">
                                <input id="anoProcesso" type="text" class="form-control{{ $errors->has('anoProcesso') ? ' is-invalid' : '' }}" name="anoProcesso" value="{{ old('anoProcesso') }}" autofocus placeholder="Digite o ano do processo." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('anoProcesso'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('anoProcesso') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="statusLabel" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select id="status" class="form-control acessibilidade" name="status">
                                    @foreach ($dadosDb as $valor)
                                        <option value="{{ $valor->Status }}">{{ $valor->Status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="modalidadeLicitatoriaLabel" class="col-md-4 control-label">Modalidade Licitatória</label>

                            <div class="col-md-6">
                                <select id="modalidadeLicitatoria" class="form-control acessibilidade" name="modalidadeLicitatoria">
                                    @foreach ($dadosDb2 as $valor2)
                                        <option value="{{ $valor2->ModalidadeLicitatoria }}">{{ $valor2->ModalidadeLicitatoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dataPropostaLabel" class="col-md-4 control-label">Data da Proposta</label>

                            <div class="col-md-6">
                                <input id="dataProposta" type="date" class="form-control{{ $errors->has('dataProposta') ? ' is-invalid' : '' }}" name="dataProposta" value="{{ old('dataProposta') }}" autofocus placeholder="Digite a Data da Proposta." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('dataProposta'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dataProposta') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="horarioSessaoLabel" class="col-md-4 control-label">Horário da Sessão</label>

                            <div class="col-md-6">
                                <input id="horarioSessao" type="text" class="form-control{{ $errors->has('horarioSessao') ? ' is-invalid' : '' }}" name="horarioSessao" value="{{ old('horarioSessao') }}" autofocus placeholder="Digite o horário da sessão." required>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>

                                @if ($errors->has('horarioSessao'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('horarioSessao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tipoJulgamentoLabel" class="col-md-4 control-label">Tipo de Julgamento</label>

                            <div class="col-md-6">
                                <select id="tipoJulgamento" class="form-control acessibilidade" name="tipoJulgamento">
                                    @foreach ($dadosDb3 as $valor3)
                                        <option value="{{ $valor3->TipoJulgamento }}">{{ $valor3->TipoJulgamento }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="divPerguntaAnexo">
                            <label for="perguntaHomologadoLabel" class="col-md-4 control-label">Já foi homologado?</label>

                            <div class="col-md-6">
                                <select id="perguntaHomologado" class="form-control acessibilidade" name="perguntaHomologado">
                                    <option value="Não">Não</option>
                                    <option value="Sim">Sim</option>
                                </select>
                            </div>
                        </div>

                        <div id="divDataHomologacao">
                            <div class="form-group">
                                <label for="dataHomologacaoLabel" class="col-md-4 control-label">Data da Homologação</label>
    
                                <div class="col-md-6">
                                    <input id="dataHomologacao" type="date" class="form-control{{ $errors->has('dataHomologacao') ? ' is-invalid' : '' }}" name="dataHomologacao" value="{{ old('dataHomologacao') }}" autofocus placeholder="Digite a Data da Homologação." required>
                                    <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
    
                                    @if ($errors->has('dataHomologacao'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('dataHomologacao') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="objetoLicitadoLabel" class="col-md-4 control-label">Objeto Licitado</label>

                            <div class="col-md-6">
                                <textarea id="objetoLicitado" rows="3" class="form-control acessibilidade{{ $errors->has('objetoLicitado') ? ' is-invalid' : '' }}" name="objetoLicitado" autofocus placeholder="Digite qual foi o objeto licitado." required></textarea>
                                <div class="help-block with-errors alert-danger" style="font-size: 14px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
    
                                @if ($errors->has('objetoLicitado'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('objetoLicitado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" id="divPerguntaAnexo">
                            <label for="perguntaAnexoLabel" class="col-md-4 control-label">Deseja anexar algum arquivo agora?</label>

                            <div class="col-md-6">
                                <select id="perguntaAnexo" class="form-control acessibilidade" name="perguntaAnexo">
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select>
                            </div>
                        </div>
    
                        <div id="divAnexoArquivoIntegra">    
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

                        Fazer a parte de inserção dos participantes
                        Fazer a parte de inserção dos itens
                        Fazer a parte de inserção dos vencedores
                        Valor Homologado

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

        $("#buttonVoltarTelaAdmin").click(function() {
            window.location.href = "/administracao";
        }); 

        $(document).ready(function () { 
            if($('#perguntaHomologado').val() == "Não"){
                $("#divDataHomologacao").attr("hidden", "true");
            } else {
                $("#divDataHomologacao").removeAttr("hidden");
            } 
        });

        $("#perguntaHomologado").change(function() {
            if($('#perguntaHomologado').val() == "Não"){
                $("#divDataHomologacao").attr("hidden", "true");
            } else {
                $("#divDataHomologacao").removeAttr("hidden");
            } 
        });

        $(document).ready(function () { 
            if($('#perguntaAnexo').val() == "Não"){
                $("#divAnexoArquivoIntegra").attr("hidden", "true");
            } else {
                $("#divAnexoArquivoIntegra").removeAttr("hidden");
            } 
        });

        $("#perguntaAnexo").change(function() {
            if($('#perguntaAnexo').val() == "Não"){
                $("#divAnexoArquivoIntegra").attr("hidden", "true");
            } else {
                $("#divAnexoArquivoIntegra").removeAttr("hidden");
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

        var dataProposta = ano + "-" + mes + "-" + dia;
        var dataHomologacao = ano + "-" + mes + "-" + dia;

        $(function () {
            $('#dataProposta').val(dataProposta);
            $('#dataHomologacao').val(dataProposta);
        }); 



    </script>

@endsection

