<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas\DespesaModel;
use App\Models\Despesas\EmpenhoModel;
use App\Models\Despesas\PagamentoModel;

class DespesasController extends Controller
{

    // public function index($consulta,$subConsulta,$tipoConsulta,$tipoConsultaSelecionada)
    public function index($consulta,$subConsulta,$tipoConsulta,$nivel1='n1',$nivel2='n2',$nivel3='n3',$nivel4='n4')
    {
        /**********************************************************/
        /* CAPTURA E TRATAMENTO DE PARAMETROS E MONTAGEM DE LINKS */
        /**********************************************************/
            include (base_path().'\public\functionsphp\FunctionsAux.php');
            
            // $consulta = str_replace($arraySearch,$arrayReplace, $consulta);
            $consulta = desajusteUrl($consulta);
            $subConsulta = desajusteUrl($subConsulta);
            $tipoConsulta = desajusteUrl($tipoConsulta);
            $nivel1 = desajusteUrl($nivel1);
            $nivel2 = desajusteUrl($nivel2);
            $nivel3 = desajusteUrl($nivel3);
            $nivel4 = desajusteUrl($nivel4);
        
            // breadcrumb navegação
            $breadcrumbNavegacao = [];
            $nivel = 0;
            
            // Montagem do link
                if($nivel1 === 'selecione...') {
                    $nivel = 1;
                    $link = route('rota.despesas', [
                        'consulta' => isset($consulta) ? $consulta : 'null',
                        'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                        'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                        'nivel1' => 'nivelAtual']);
                                        
                    // Filtro
                    array_push($breadcrumbNavegacao,[
                        'Filtro' => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null'])
                        ]);
                    // TipoConsulta
                    array_push($breadcrumbNavegacao,[
                        $tipoConsulta => '#']);
                }
                else if($nivel1 !== 'selecione...' && $nivel1 !== 'n1' && $nivel2 === 'n2') {
                    $nivel = 2;
                    $link = route('rota.despesas', [
                        'consulta' => isset($consulta) ? $consulta : 'null',
                        'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                        'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                        'nivel1' => ajusteUrl(isset($nivel1) ? $nivel1 : 'null'),
                        'nivel2' => 'nivelAtual']);
                        
                    // Filtro
                    array_push($breadcrumbNavegacao,[
                        'Filtro' => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null'])
                        ]);
                    // TipoConsulta
                    array_push($breadcrumbNavegacao,[
                        $tipoConsulta => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                            'nivel1' => 'selecione...'])
                        ]);
                    // Nivel1
                    array_push($breadcrumbNavegacao,[
                        $nivel1 => '#']);
                }
                else if($nivel2 !== 'n2' && $nivel3 === 'n3') {
                    $nivel = 3;
                    $link = route('rota.despesas', [
                        'consulta' => isset($consulta) ? $consulta : 'null',
                        'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                        'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                        'nivel1' => ajusteUrl(isset($nivel1) ? $nivel1 : 'null'),
                        'nivel2' => ajusteUrl(isset($nivel2) ? $nivel2 : 'null'),
                        'nivel3' => 'nivelAtual']);
                        
                    // Filtro
                    array_push($breadcrumbNavegacao,[
                        'Filtro' => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null'])
                        ]);
                    // TipoConsulta
                    array_push($breadcrumbNavegacao,[
                        $tipoConsulta => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                            'nivel1' => 'selecione...'])
                        ]);
                    // Nivel1
                    array_push($breadcrumbNavegacao,[
                        $nivel1 => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                            'nivel1' => ajusteUrl(isset($nivel1) ? $nivel1 : 'null')])
                        ]);
                    // Nivel2
                    array_push($breadcrumbNavegacao,[
                        $nivel2 => '#']);
                }
                else if($nivel3 !== 'n3' && $nivel4 === 'n4') {
                    $nivel = 4;
                    $link = route('rota.despesas', [
                        'consulta' => isset($consulta) ? $consulta : 'null',
                        'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                        'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                        'nivel1' => ajusteUrl(isset($nivel1) ? $nivel1 : 'null'),
                        'nivel2' => ajusteUrl(isset($nivel2) ? $nivel2 : 'null'),
                        'nivel3' => ajusteUrl(isset($nivel3) ? $nivel3 : 'null'),
                        'nivel4' => 'nivelAtual']);
                        
                    // Filtro
                    array_push($breadcrumbNavegacao,[
                        'Filtro' => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null'])
                        ]);
                    // TipoConsulta
                    array_push($breadcrumbNavegacao,[
                        $tipoConsulta => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                            'nivel1' => 'selecione...'])
                        ]);
                    // Nivel1
                    array_push($breadcrumbNavegacao,[
                        $nivel1 => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                            'nivel1' => ajusteUrl(isset($nivel1) ? $nivel1 : 'null')])
                        ]);
                    // Nivel2
                    array_push($breadcrumbNavegacao,[
                        $nivel2 => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                            'nivel1' => ajusteUrl(isset($nivel1) ? $nivel1 : 'null'),
                            'nivel2' => ajusteUrl(isset($nivel2) ? $nivel2 : 'null')])
                        ]);
                    // Nivel3
                    array_push($breadcrumbNavegacao,[
                        $nivel3 => '#']);
                }
                else if($nivel4 !== 'n4') {
                    $nivel = 4;
                    $link = route('rota.despesas', [
                        'consulta' => isset($consulta) ? $consulta : 'null',
                        'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                        'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                        'nivel1' => ajusteUrl(isset($nivel1) ? $nivel1 : 'null'),
                        'nivel2' => ajusteUrl(isset($nivel2) ? $nivel2 : 'null'),
                        'nivel3' => ajusteUrl(isset($nivel3) ? $nivel3 : 'null'),
                        'nivel4' => ajusteUrl(isset($nivel4) ? $nivel4 : 'null')]);
                        
                    // Filtro
                    array_push($breadcrumbNavegacao,[
                        'Filtro' => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null'])
                        ]);
                    // TipoConsulta
                    array_push($breadcrumbNavegacao,[
                        $tipoConsulta => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                            'nivel1' => 'selecione...'])
                        ]);
                    // Nivel1
                    array_push($breadcrumbNavegacao,[
                        $nivel1 => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                            'nivel1' => ajusteUrl(isset($nivel1) ? $nivel1 : 'null')])
                        ]);
                    // Nivel2
                    array_push($breadcrumbNavegacao,[
                        $nivel2 => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                            'nivel1' => ajusteUrl(isset($nivel1) ? $nivel1 : 'null'),
                            'nivel2' => ajusteUrl(isset($nivel2) ? $nivel2 : 'null')])
                        ]);
                    // Nivel3
                    array_push($breadcrumbNavegacao,[
                        $nivel3 => route('rota.despesas', [
                            'consulta' => isset($consulta) ? $consulta : 'null',
                            'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                            'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                            'nivel1' => ajusteUrl(isset($nivel1) ? $nivel1 : 'null'),
                            'nivel2' => ajusteUrl(isset($nivel2) ? $nivel2 : 'null'),
                            'nivel3' => ajusteUrl(isset($nivel3) ? $nivel3 : 'null')])
                        ]);
                    // Nivel4
                    array_push($breadcrumbNavegacao,[
                        $nivel4 => '#']);
                }
                else
                {
                    $link = '#';
                }
            // Fim da montagem do link
        
        /* FIM TRATAMENTO DE PARAMETROS E MONTAGEM DE LINKS */

        /**********/
        /* SELECT */
        /**********/
            // Fluxo
            // Parametros de acordo com o TipoConsulta e Nivel
                $ultimoNivel = false;
                switch($tipoConsulta){
                    case 'orgaos':
                        switch($nivel){
                            case 1:
                                $campoTipoConsulta = 'UnidadeGestora';
                                $campoTipoConsultaTitulo = 'Órgãos';
                                break;
                            case 2:
                                $campoTipoConsulta = 'Beneficiario';
                                $campoTipoConsultaTitulo = 'Fornecedores';
                                $campoWhereNivel1 = 'UnidadeGestora';
                                break;
                            case 3:
                                $campoTipoConsulta = 'ElemDespesa';
                                $campoTipoConsultaTitulo = 'Elementos';
                                $campoWhereNivel1 = 'UnidadeGestora';
                                $campoWhereNivel2 = 'Beneficiario';
                                $ultimoNivel = true;
                                $link = '#';
                                break;
                        }
                        break;
                    case 'fornecedores':
                        switch($nivel){
                            case 1:
                                $campoTipoConsulta = 'Beneficiario';
                                $campoTipoConsultaTitulo = 'Fornecedores';
                                break;
                            case 2:
                                $campoTipoConsulta = 'UnidadeGestora';
                                $campoTipoConsultaTitulo = 'Órgãos';
                                $campoWhereNivel1 = 'Beneficiario';
                                break;
                            case 3:
                                $campoTipoConsulta = 'ElemDespesa';
                                $campoTipoConsultaTitulo = 'Elementos';
                                $campoWhereNivel1 = 'Beneficiario';
                                $campoWhereNivel2 = 'UnidadeGestora';
                                $ultimoNivel = true;
                                $link = '#';
                                break;
                        }
                        break;
                    case 'elementos':
                        switch($nivel){
                            case 1:
                                $campoTipoConsulta = 'ElemDespesa';
                                $campoTipoConsultaTitulo = 'Elementos';
                                break;
                            case 2:
                                $campoTipoConsulta = 'UnidadeGestora';
                                $campoTipoConsultaTitulo = 'Órgãos';
                                $campoWhereNivel1 = 'ElemDespesa';
                                break;
                            case 3:
                                $campoTipoConsulta = 'Beneficiario';
                                $campoTipoConsultaTitulo = 'Fornecedores';
                                $campoWhereNivel1 = 'ElemDespesa';
                                $campoWhereNivel2 = 'UnidadeGestora';
                                $ultimoNivel = true;
                                $link = '#';
                                break;
                        }
                        break;
                    case 'funcoes':                    
                        switch($nivel){
                            case 1:
                                $campoTipoConsulta = 'Funcao';
                                $campoTipoConsultaTitulo = 'Funções';
                                break;
                            case 2:
                                $campoTipoConsulta = 'UnidadeGestora';
                                $campoTipoConsultaTitulo = 'Órgãos';
                                $campoWhereNivel1 = 'Funcao';
                                break;
                            case 3:
                                $campoTipoConsulta = 'Beneficiario';
                                $campoTipoConsultaTitulo = 'Fornecedores';
                                $campoWhereNivel1 = 'Funcao';
                                $campoWhereNivel2 = 'UnidadeGestora';
                                break;
                            case 4:
                                $campoTipoConsulta = 'ElemDespesa';
                                $campoTipoConsultaTitulo = 'Elementos';
                                $campoWhereNivel1 = 'Funcao';
                                $campoWhereNivel2 = 'UnidadeGestora';
                                $campoWhereNivel3 = 'Beneficiario';
                                $ultimoNivel = true;
                                $link = '#';
                                break;
                        }
                        break;
                    default:
                        $campoTipoConsulta = 'UnidadeGestora';
                        $campoTipoConsultaTitulo = 'Órgãos';
                        break;
                }
            // Fim fluxo

            // Montagem dos parametros para o select
                switch($subConsulta){
                    case 'empenhos':
                        $campoData = 'DataEmpenho';
                        $tituloData = 'Data de Empenho';
                        $campoNumeroNota = 'NotaEmpenho';
                        $tituloNumeroNota = 'Nota de Empenho';
                        $campoValor = 'ValorEmpenho';
                        $tituloValor = 'Valor Empenhado';
                        $view = 'despesas.despesa';
                        $dadosDb = EmpenhoModel::orderBy($campoData);
                        break;
                    case 'liquidacoes':
                        break;
                    case 'pagamentos':
                        $campoData = 'DataPagamento';
                        $tituloData = 'Data do Pagamento';
                        $campoNumeroNota = 'NotaPagamento';
                        $tituloNumeroNota = 'Nota de Pagamento';
                        $campoValor = 'ValorPago';
                        $tituloValor = 'Valor Pago';
                        $view = 'despesas.despesa';
                        $dadosDb = PagamentoModel::orderBy($campoData);
                        break;
                }
            // Fim da montagem dos parametros para o select

            // Select de acordo com o tipoConsulta e Nível
                if($tipoConsulta === 'nota')
                {
                    $dadosDb->select($campoTipoConsulta,'Beneficiario',$campoNumeroNota,$campoData,$campoValor);
                    $dadosDb->where($campoNumeroNota, '=', $nivel1);
                    $dadosDb = $dadosDb->get();
                    $colunaDados = [ $tituloNumeroNota, $campoTipoConsultaTitulo,'Fornecedores', $tituloData, $tituloValor ];
                    $link = '#';
                    return View($view, compact('consulta', 'subConsulta', 'tipoConsulta', 'dadosDb', 'colunaDados', 'link'));
                }
                // Nivel1
                else if($nivel1 === 'selecione...')
                {
                    $dadosDb->selectRaw($campoTipoConsulta.', '.$campoData.', sum('.$campoValor.') as '.$campoValor.' ');
                    $dadosDb->groupBy($campoTipoConsulta);
                    $colunaDados = [ $campoTipoConsultaTitulo,$tituloValor ];
                } 
                // Nivel2
                else if($nivel1 !== 'selecione...' && $nivel1 !== 'n1' && $nivel2 === 'n2')
                {
                    $dadosDb->selectRaw($campoTipoConsulta.','.$campoWhereNivel1.', '.$campoData.', sum('.$campoValor.') as '.$campoValor.' ');
                    $dadosDb->where($campoWhereNivel1, '=', $nivel1);
                    $dadosDb->groupBy($campoTipoConsulta);
                    $colunaDados = [ $campoTipoConsultaTitulo,$tituloValor ];
                } 
                // Nivel3
                else if($nivel2 !== 'n2' && $nivel3 === 'n3')
                {
                    $dadosDb->selectRaw($campoTipoConsulta.','.$campoWhereNivel1.','.$campoWhereNivel2.','.$campoNumeroNota.','.$campoData.', sum('.$campoValor.') as '.$campoValor.' ');
                    $dadosDb->where($campoWhereNivel1, '=', $nivel1);
                    $dadosDb->where($campoWhereNivel2, '=', $nivel2);
                    $dadosDb->groupBy($campoTipoConsulta);
                    if($ultimoNivel == false){
                        $colunaDados = [ $campoTipoConsultaTitulo,$tituloValor ];
                    }else{
                        $colunaDados = [ $campoTipoConsultaTitulo,$tituloNumeroNota,$tituloData,$tituloValor ];
                    }
                }
                // Nivel4
                else if($nivel3 !== 'n3' && $nivel4 === 'n4')
                {
                    $dadosDb->selectRaw($campoTipoConsulta.','.$campoWhereNivel1.','.$campoWhereNivel2.','.$campoWhereNivel3.', '.$campoNumeroNota.', '.$campoData.', sum('.$campoValor.') as '.$campoValor.' ');
                    $dadosDb->where($campoWhereNivel1, '=', $nivel1);
                    $dadosDb->where($campoWhereNivel2, '=', $nivel2);
                    $dadosDb->where($campoWhereNivel3, '=', $nivel3);
                    $dadosDb->groupBy($campoTipoConsulta);
                    $colunaDados = [ $campoTipoConsultaTitulo,$tituloNumeroNota,$tituloData,$tituloValor ];
                } 
                // Nivel5 - não existe esse nivel ainda
                else if($nivel4 != 'n4')
                {
                    $dadosDb->selectRaw($campoTipoConsulta.', '.$campoData.', sum('.$campoValor.') as '.$campoValor.' ');
                    $dadosDb->where($campoWhereNivel1, '=', $nivel1);
                    $dadosDb->where($campoWhereNivel2, '=', $nivel2);
                    $dadosDb->where($campoWhereNivel3, '=', $nivel3);
                    $dadosDb->where($campoWhereNivel4, '=', $nivel4);
                    $dadosDb->groupBy($campoTipoConsulta);
                    $colunaDados = [ $campoTipoConsultaTitulo,$tituloNumeroNota,$tituloData,$tituloValor ];
                }
                // Caso não tenha nível
                else 
                {
                    $dadosDb->select($campoTipoConsulta,'AnoExercicio','Beneficiario',$campoNumeroNota,$campoData,$campoValor);
                    $dadosDb->where($campoTipoConsulta, $nivel1);
                    $colunaDados = [ $campoTipoConsultaTitulo,'AnoExercicio','Fornecedores', $tituloNumeroNota,$tituloData,$tituloValor ];
                }
            // Fim select de acordo com a subConsulta e Nivel
        /* FIM SELECT */


        /*******************/
        /* FILTRO TEMPORAL */
        /*******************/
            // Capturar parametros temporal            
                session_set_cookie_params( 60 ); 
                // return session_get_cookie_params();
                session_start();
                if (isset($_SESSION["parametrosTemporal"])) {
                    $periodo = $_SESSION["parametrosTemporal"]['periodo'];
                    switch($periodo){
                        case 'Livre':
                            $dataInicio = $_SESSION["parametrosTemporal"]['dataInicio'];
                            $dataFim = $_SESSION["parametrosTemporal"]['dataFim'];
                            $dataInicio = desajusteUrl($dataInicio);
                            $dataFim = desajusteUrl($dataFim);
                            break;
                        case 'Mês':
                            $ano = $_SESSION["parametrosTemporal"]['ano'];
                            $mes = $_SESSION["parametrosTemporal"]['mes'];
                            $ano = desajusteUrl($ano);
                            $mes = desajusteUrl($mes);
                            break;
                        case 'Bimestral':
                            $ano = $_SESSION["parametrosTemporal"]['ano'];
                            $bimestre = $_SESSION["parametrosTemporal"]['bimestre'];
                            $ano = desajusteUrl($ano);
                            $bimestre = desajusteUrl($bimestre);
                            break;
                        case 'Trimestral':
                            $ano = $_SESSION["parametrosTemporal"]['ano'];
                            $trimestre = $_SESSION["parametrosTemporal"]['trimestre'];
                            $ano = desajusteUrl($ano);
                            $trimestre = desajusteUrl($trimestre);
                            break;
                        case 'Quadrimestral':
                            $ano = $_SESSION["parametrosTemporal"]['ano'];
                            $quadrimestre = $_SESSION["parametrosTemporal"]['quadrimestre'];
                            $ano = desajusteUrl($ano);
                            $quadrimestre = desajusteUrl($quadrimestre);
                            break;
                        case 'Semestral':
                            $ano = $_SESSION["parametrosTemporal"]['ano'];
                            $semestre = $_SESSION["parametrosTemporal"]['semestre'];
                            $ano = desajusteUrl($ano);
                            $semestre = desajusteUrl($semestre);
                            break;
                        default:
                            break;
                    }
                }
            // Fim da Capturar parametros temporal

            // Caso seja bimestre, trimestre, quadrimestre ou semestre, a população do $dadosDb é feito em um únco local
            // já as opções Livre e Mês são personalizadas
            $popularDados = false;
            switch($periodo){
                case 'Livre':             
                    $dadosDb->whereBetween($campoData, [$dataInicio, $dataFim]);
                    break;
                case 'Mês':
                    $array = [
                        '01' => 'Janeiro',
                        '02' => 'Fevereiro',
                        '03' => 'Março',
                        '04' => 'Abril',
                        '05' => 'Maio',
                        '06' => 'Junho',
                        '07' => 'Julho',
                        '08' => 'Agosto',
                        '09' => 'Setembro',
                        '10' => 'Outubro',
                        '11' => 'Novembro',
                        '12' => 'Dezembro'];
                    
                    foreach($array as $key => $value){
                        if($mes === $value) {
                            $dadosDb->whereYear($campoData, $ano);
                            $dadosDb->whereMonth($campoData, $key);
                        }
                    };
                    break;
                case 'Bimestral':
                    $array = [
                        '01' => '1º Bimestre',
                        '02' => '1º Bimestre',
                        '03' => '2º Bimestre',
                        '04' => '2º Bimestre',
                        '05' => '3º Bimestre',
                        '06' => '3º Bimestre',
                        '07' => '4º Bimestre',
                        '08' => '4º Bimestre',
                        '09' => '5º Bimestre',
                        '10' => '5º Bimestre',
                        '11' => '6º Bimestre',
                        '12' => '6º Bimestre'];
                        
                    $arrayMes = [];
                    foreach($array as $key => $value){
                        if($bimestre === $value) {
                            array_push($arrayMes, $key);
                        }
                    }
                    $popularDados = true;     

                    break;
                case 'Trimestral':
                    $array = [
                        '01' => '1º Trimestre',
                        '02' => '1º Trimestre',
                        '03' => '1º Trimestre',
                        '04' => '2º Trimestre',
                        '05' => '2º Trimestre',
                        '06' => '2º Trimestre',
                        '07' => '3º Trimestre',
                        '08' => '3º Trimestre',
                        '09' => '3º Trimestre',
                        '10' => '4º Trimestre',
                        '11' => '4º Trimestre',
                        '12' => '4º Trimestre'];
                        
                    $arrayMes = [];
                    foreach($array as $key => $value){
                        if($trimestre === $value) {
                            array_push($arrayMes, $key);
                        }
                    }
                    $popularDados = true;
                    
                    break;
                case 'Quadrimestral':
                    $array = [
                        '01' => '1º Quadrimestre',
                        '02' => '1º Quadrimestre',
                        '03' => '1º Quadrimestre',
                        '04' => '1º Quadrimestre',
                        '05' => '2º Quadrimestre',
                        '06' => '2º Quadrimestre',
                        '07' => '2º Quadrimestre',
                        '08' => '2º Quadrimestre',
                        '09' => '3º Quadrimestre',
                        '10' => '3º Quadrimestre',
                        '11' => '3º Quadrimestre',
                        '12' => '3º Quadrimestre'];
                        
                    $arrayMes = [];
                    foreach($array as $key => $value){
                        if($quadrimestre === $value) {
                            array_push($arrayMes, $key);
                        }
                    }
                    $popularDados = true;     

                    break;
                case 'Semestral':
                    $array = [
                        '01' => '1º Semestre',
                        '02' => '1º Semestre',
                        '03' => '1º Semestre',
                        '04' => '1º Semestre',
                        '05' => '1º Semestre',
                        '06' => '1º Semestre',
                        '07' => '2º Semestre',
                        '08' => '2º Semestre',
                        '09' => '2º Semestre',
                        '10' => '2º Semestre',
                        '11' => '2º Semestre',
                        '12' => '2º Semestre'];
                        
                    $arrayMes = [];
                    foreach($array as $key => $value){
                        if($semestre === $value) {
                            array_push($arrayMes, $key);
                        }
                    }
                    $popularDados = true;     

                    break;
                default:
                    $dadosDb->all();
                    break;
            }
            if($popularDados){
                    $dadosDb->whereYear($campoData, $ano);
                    $dadosDb->Where(function ($query) use ($arrayMes, $campoData) {
                        $query->whereMonth($campoData, '>=', array_shift($arrayMes))
                            ->whereMonth($campoData, '<=', end($arrayMes));
                    });

            }

        /* FIM FILTRO TEMPORAL */

        
        $dadosDb = $dadosDb->get();
        // return $dadosDb;
        return View($view, compact('consulta', 'subConsulta', 'tipoConsulta', 'dadosDb', 'colunaDados', 'link', 'nivel', 'breadcrumbNavegacao'));
    }

    public function showNota()
    {
        $subConsulta =  isset($_GET['subConsulta']) ? $_GET['subConsulta'] : 'null';
        $nota =  isset($_GET['nota']) ? $_GET['nota'] : 'null';

        // Select de acordo com a subConsulta
        switch($subConsulta){
            case 'empenhos':
                $dadoDb = EmpenhoModel::where('NotaEmpenho', '=', $nota)->get();
                break;
            case 'liquidacoes':
                $dadoDb = LiquidacaoModel::where('NotaLiquidacao', '=', $nota)->get();
                break;
            case 'pagamentos':
                $dadoDb = PagamentoModel::where('NotaPagamento', '=', $nota)->get();
                break;
        }

        return $dadoDb;
    }

    public function showFornecedor()
    {
        include (base_path().'\public\functionsphp\FunctionsAux.php');

        $nomeFornecedor =  isset($_GET['nomeFornecedor']) ? $_GET['nomeFornecedor'] : 'null';

        if($nomeFornecedor != 'null'){
            $nomeFornecedor = desajusteUrl($nomeFornecedor);
            $dadoDb = EmpenhoModel::where('Beneficiario', '=', $nomeFornecedor)->get();
        }

        return $dadoDb;
    }

    public function index1()
    {
        $despesas = DespesaModel::all();

        return View('despesas.despesa', compact('despesas'));
    }

    public function teste()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $empenho = isset($_POST['empenho']) ? $_POST['empenho'] : null;

        if ($id != null){
            $despesas = DespesaModel::where('despesa_id', '=', $id)->get();
        } elseif ($empenho != null) {
            $despesas = DespesaModel::where('despesa_empenho', '=', $empenho)->get();
        } else {
            $despesas = DespesaModel::all();
            }

        $colunaDados = [ 'Empenho', 'Liquidado', 'Pago' ];
        $despesas = DespesaModel::all('despesa_orgao','despesa_empenho','despesa_liquidado','despesa_pago');


        return View('despesas.teste', compact('despesas', 'colunaDados'));

    }
}
