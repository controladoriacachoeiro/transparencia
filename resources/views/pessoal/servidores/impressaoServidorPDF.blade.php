<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">        
    <!-- jQuery -->
    <link href="../public/css/app.css" rel="stylesheet">
    <script src="../public/js/jquery.js"></script>
    <link rel="stylesheet" href="../public/css/estilo-pdf.css">


    <style>

        body {
            font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 400;
            overflow-x: hidden;
            overflow-y: auto;
            max-width: 1920px;
            margin-left: auto;
            margin-right: auto;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
            display: block;
        }

        .container{

        }

        .content {
            min-height: 250px;
            padding: 15px;
            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        div {
            display: block;
        }

        .tablelici{
            font-weight: 700;
            display: inline-block;
            margin: 0;
            line-height: 1;
            font-family: 'Source Sans Pro', sans-serif;
            color: inherit;
            box-sizing: border-box;
            -webkit-margin-before: 1em;
            -webkit-margin-after: 1em;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
        }

        .col-md-12{
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .box.box-primary {
            border-top-color: #3c8dbc;
        }

        .box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title {
            display: inline-block;
            font-size: 18px;
            margin: 0;
            line-height: 1;
        }

        .box-header.with-border {
            border-bottom: 1px solid #f4f4f4;
        }

        .box-body {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            padding: 10px;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .container{
            padding-left: 22px;
        }

        .col-md-3{
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
            width: 195px;
            height: 160px;
            display: inline-block;
        }

        .detalheslici {
            margin-bottom: 15px;
        }

        .detalhestitle {
            text-align: center;
            background-color: #4B95BC;
            padding-top: 1px;
            padding-bottom: 1px;
            color: white;
            margin-bottom: 5px;
            /* height: 45px; */
        }

        .detalhestitle h4 {
            font-size: 18px;
            font-weight: 700;
            margin-top: 3px;
            margin-bottom: 3px;
            padding-left: 3px;
            padding-right: 3px;
            vertical-align: middle;
        }

        .detalheslici p {
            font-size: 16px;
            margin-top: 5px;
            margin-bottom: 5px;
            margin-left: 5px;
        }
        
    </style>

    <title>Dados do Servidor {{ $dadosDb[0]->Nome }}</title>
</head>

<body>
    <header>
        <span class="logo-lg">
            <img src="../public/img/logo.png" class="img-responsive img-center"  alt="Transparência Cachoeiro" width="40%">
        </span>
    </header>

    <div id="app">
        
        <div class="container">
            <br>
            <br>
            <h1 class="box-title tablelici" style="text-align: center; display: block">Detalhes do Servidor</h1>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="row">                    
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Nome</h4>
                                        </div>
                                        <p>{{$dadosDb[0]->Nome}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Matrícula</h4>
                                        </div>
                                        <p>{{$dadosDb[0]->Matricula}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>CPF</h4>
                                        </div>
                                        <p>{{$dadosDb[0]->CPF}}</p>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Cargo</h4>
                                        </div>                            
                                        <p>{{$dadosDb[0]->Cargo}}</p>             
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Função</h4>
                                        </div>
                                        <p>{{$dadosDb[0]->Funcao}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Tipo de Vínculo</h4>
                                        </div>
                                        <p>{{$dadosDb[0]->TipoVinculo}}</p>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Início do Exercício</h4>
                                        </div>                           
                                        <p>{{date('d/m/Y', strtotime($dadosDb[0]->DataExercicio))}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Órgão de Lotação</h4>
                                        </div>
                                        <p>{{$dadosDb[0]->OrgaoLotacao}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Situação Funcional</h4>
                                        </div>
                                        <p>{{$dadosDb[0]->Situacao}}</p>
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Carga Horária</h4>
                                        </div>
                                        <p>{{$dadosDb[0]->CargaHoraria}} h</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Referência</h4>
                                        </div>
                                        <p>{{$dadosDb[0]->Referencia == null ? 'Não se aplica' : $dadosDb[0]->Referencia}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class='detalheslici'>
                                        <div class="detalhestitle">
                                            <h4>Sigla</h4>
                                        </div>
                                        <p>{{$dadosDb[0]->Sigla == null ? 'Não se aplica' : $dadosDb[0]->Sigla}}</p>
                                    </div>
                                </div>
                                <div>
                                    <p style="float: right; font-size: 16px; margin-right: 52px">Data da Impressão: {{ $data }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <!-- Scripts -->

    <script src="../public/js/app.js"></script>

    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>

    
</body>

</html>

