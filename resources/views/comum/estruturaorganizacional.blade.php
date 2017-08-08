@extends('layouts.app')
@section('htmlheader_title', 'Estrutura Organizacional')

@section('cssheader')
<link rel="stylesheet" href="{{ asset('/dist/css/estruturaorgazacional.css') }}">
@endsection

@section('main-content')
        <div class="box box-solid" style="margin-top:20px">
            <div class="row">
                <div class="col-md-12">
                    <div class="tree">
                        <ul>
                            <li>
                                <a href="{{ ('/img/gabinete.png') }}" data-lightbox="gabinete">
                                    <div class="container-fluid">
                                        <div class="row">
                                            Gabinete
                                        </div>
                                    </div>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ ('/img/procuradoria.png') }}" data-lightbox="procuradoria">
                                            <div class="container-fluid">
                                                    Procuradoria Geral Do Município
                                            </div>
                                        </a>
                                    </li>    
                                    <li>
                                        
                                        <a href="{{ ('/img/controladoria.png') }}" data-lightbox="controladoria">
                                            <div class="container-fluid">
                                                    Controladoria
                                            </div>
                                        </a>
                                        
                                            <li>
                                                <a href="{{ ('/img/gestao_estrategica.png') }}" data-lightbox="gestao_estrategica">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Gestão Estratégica
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ ('/img/comunicacao_social.png') }}" data-lightbox="comunicacao_social">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Comunicação Social
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ ('/img/fazenda.png') }}" data-lightbox="fazenda">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Fazenda
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ ('/img/servicos_internos.png') }}" data-lightbox="servicos_internos">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Administração e Serviços internos
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ ('/img/saude.png') }}" data-lightbox="saude">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Saúde
                                                    </div>
                                                </a>
                                            </li>   
                                            <li>
                                                <a href="{{ ('/img/educacao.png') }}" data-lightbox="educacao">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Educação
                                                    </div>
                                                </a>
                                            </li> 
                                            <li>
                                                <a href="{{ ('/img/desenvolvimento_economico.png') }}" data-lightbox="desenvolvimento_economigo">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Desenvolvimento Econômico
                                                    </div>
                                                </a>
                                            </li> 
                                            <li>
                                                <a href="{{ ('/img/desenvolvimento_social.png') }}" data-lightbox="desenvolvimento_social">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Desenvolvimento Social
                                                    </div>
                                                </a>
                                            </li> 
                                            <li>
                                                <a href="{{ ('/img/trabalho_habitacao.png') }}" data-lightbox="trabalho_habitacao">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Trabalho e Habitação
                                                    </div>
                                                </a>
                                            </li> 
                                            <li>
                                                <a href="{{ ('/img/cultura.png') }}" data-lightbox="cultura">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Cultura
                                                    </div>
                                                </a>
                                            </li> 
                                            <li>
                                                <a href="{{ ('/img/esporte_lazer.png') }}" data-lightbox="esporte_lazer">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Esporte e Lazer
                                                    </div>
                                                </a>
                                            </li> 
                                            <li>
                                                <a href="{{ ('/img/defesa_social.png') }}" data-lightbox="defesa_social">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Defesa Social
                                                    </div>
                                                </a>
                                            </li> 
                                            <li>
                                                <a href="{{ ('/img/agricultura_abastecimento.png') }}" data-lightbox="agricultura_abastecimento">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Agricultura e Abastecimento
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ ('/img/meio_ambiente.png') }}" data-lightbox="meio_ambiente">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Meio Ambiente
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ ('/img/desenvolvimento_urbano.png') }}" data-lightbox="fazenda">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Desenvolvimento Urbano
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ ('/img/obras.png') }}" data-lightbox="obras">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Obras
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ ('/img/servico_urbanos.png') }}" data-lightbox="servico_urbanos">
                                                    <div class="container-fluid">
                                                            Secretaria Municipal de Serviços Urbanos
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ ('/img/interior.png') }}" data-lightbox="interior">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            Secretaria Municipal de Interior
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scriptsadd')
<link rel="stylesheet" href="{{ asset('/dist/css/lightbox.min.css') }}" />
<script src="{{ asset('/dist/js/lightbox-plus-jquery.min.js') }}"></script>
@endsection