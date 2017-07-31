@extends('layouts.app')
@section('htmlheader_title', 'Estrutura Organizacional')

@section('cssheader')
    <style>
        @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css);
        @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css);

        /* #region Organizational Chart*/
       .tree li {
    margin: 0px 0;
	
	list-style-type: none;
    position: relative;
	padding: 20px 5px 0px 5px;
}

.tree li::before{
    content: '';
	position: absolute; 
    top: 0;
	width: 1px; 
    height: 100%;
	right: auto; 
    left: -20px;
	border-left: 1px solid #ccc;
    bottom: 50px;
}
.tree li::after{
    content: '';
	position: absolute; 
    top: 30px; 
	width: 25px; 
    height: 20px;
	right: auto; 
    left: -20px;
	border-top: 1px solid #ccc;
}
.tree li a{
    display: inline-block;
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	background-color: #007EBC;
    color: white;
	font-family: arial, verdana, tahoma;
	font-size: 12px;
    border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
} 

/*Remove connectors before root*/
.tree > ul > li::before, .tree > ul > li::after{
	border: 0;
}
/*Remove connectors after last child*/
.tree li:last-child::before{ 
      height: 30px;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}

    </style>
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
                                        <ul>
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
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scriptsadd')

@endsection