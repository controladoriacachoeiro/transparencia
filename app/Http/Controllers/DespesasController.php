<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas\DespesaModel;
use App\Models\Despesas\EmpenhoModel;
use App\Models\Despesas\PagamentoModel;

class DespesasController extends Controller
{
    public function index($consulta,$subConsulta,$tipoConsulta,$tipoConsultaSelecionada,$periodo,$dataInicio,$dataFim,$ano,$mes,$bimestre,$trimestre,$quadrimestre,$semestre)
    {

        /************************************************/
        /* TRATAMENTO DE PARAMETROS E MONTAGEM DE LINKS */
        /************************************************/
            $link = route('rota.despesas', [
                'consulta' => isset($consulta) ? $consulta : 'null',
                'subConsulta' => isset($subConsulta) ? $subConsulta : 'null',
                'tipoConsulta' => isset($tipoConsulta) ? $tipoConsulta : 'null',
                'tipoConsultaSelecionada' => 'tipoConsultaSelecionadaReplace',
                'periodo' => isset($periodo) ? $periodo : 'null',
                'dataInicio' => isset($dataInicio) ? $dataInicio : 'null',
                'dataFim' => isset($dataFim) ? $dataFim : 'null',
                'ano' => isset($ano) ? $ano : 'null',
                'mes' => isset($mes) ? $mes : 'null',
                'bimestre' => isset($bimestre) ? $bimestre : 'null',
                'trimestre' => isset($trimestre) ? $trimestre : 'null',
                'quadrimestre' => isset($quadrimestre) ? $quadrimestre : 'null',
                'semestre' => isset($semestre) ? $semestre : 'null']);

            $arraySearch = ['_', '@'];
            $arrayReplace = [' ', '/'];

            $consulta = str_replace($arraySearch,$arrayReplace, $consulta);
            $subConsulta = str_replace($arraySearch,$arrayReplace, $subConsulta);
            $tipoConsulta = str_replace($arraySearch,$arrayReplace, $tipoConsulta);
            $tipoConsultaSelecionada = str_replace($arraySearch,$arrayReplace, $tipoConsultaSelecionada);
            $dataInicio = str_replace($arraySearch,$arrayReplace, $dataInicio);
            $dataFim = str_replace($arraySearch,$arrayReplace, $dataFim);
            $ano = str_replace($arraySearch,$arrayReplace, $ano);
            $mes = str_replace($arraySearch,$arrayReplace, $mes);
            $bimestre = str_replace($arraySearch,$arrayReplace, $bimestre);
            $trimestre = str_replace($arraySearch,$arrayReplace, $trimestre);
            $quadrimestre = str_replace($arraySearch,$arrayReplace, $quadrimestre);
            $semestre = str_replace($arraySearch,$arrayReplace, $semestre);
        
        /* FIM TRATAMENTO DE PARAMETROS E MONTAGEM DE LINKS */

        /**********/
        /* SELECT */
        /**********/
            // Parametros de acordo com o TipoConsulta
            switch($tipoConsulta){
                case 'orgaos':
                    $campoTipoConsulta = 'UnidadeGestora';
                    $campoTipoConsultaTitulo = 'Órgãos';
                    break;
                case 'fornecedores':
                    $campoTipoConsulta = 'Beneficiario';
                    $campoTipoConsultaTitulo = 'Fornecedores';
                    break;
                case 'funcoes':
                    $campoTipoConsulta = 'Funcao';
                    $campoTipoConsultaTitulo = 'Funções';
                break;
                case 'elementos':
                    $campoTipoConsulta = 'ElemDespesa';
                    $campoTipoConsultaTitulo = 'Elementos';
                    break;
                default:
                    $campoTipoConsulta = 'UnidadeGestora';
                    $campoTipoConsultaTitulo = 'Órgãos';
                    break;
            }

            // Select de acordo com a subConsulta
            switch($subConsulta){
                case 'empenhos':
                    $campoData = 'DataEmpenho';
                    $view = 'despesas.empenho';

                    if($tipoConsulta === 'nota'){
                        $dadosDb = EmpenhoModel::select($campoTipoConsulta,'CPF_CNPJ','NotaEmpenho','DataEmpenho','ValorEmpenho');
                        $dadosDb->where('NotaEmpenho', '=', $tipoConsultaSelecionada);
                        $dadosDb = $dadosDb->get();
                        $colunaDados = [ 'Nota de Empenho', $campoTipoConsultaTitulo,'CPF/CNPJ', 'Data de Empenho', 'Valor Empenhado' ];

                        return View($view, compact('consulta', 'subConsulta', 'tipoConsulta', 'dadosDb', 'colunaDados', 'link'));
                    } else if($tipoConsultaSelecionada == 'Selecione...'){
                        $dadosDb = EmpenhoModel::selectRaw($campoTipoConsulta.',DataEmpenho, sum(ValorEmpenho) as ValorEmpenho');
                        $dadosDb->groupBy($campoTipoConsulta);
                        $colunaDados = [ $campoTipoConsultaTitulo,'Valor Empenhado' ];
                    } else {
                        $dadosDb = EmpenhoModel::select($campoTipoConsulta,'AnoExercicio','CPF_CNPJ','NotaEmpenho','DataEmpenho','ValorEmpenho');
                        $dadosDb->where($campoTipoConsulta, $tipoConsultaSelecionada);
                        $colunaDados = [ $campoTipoConsultaTitulo,'AnoExercicio','CPF/CNPJ', 'Nota de Empenho', 'Data de Empenho', 'Valor Empenhado' ];
                        $link = '#';
                    }
                    break;
                case 'liquidacoes':
                    $dadosDb = LiquidacaoModel::select('UnidadeGestora','AnoExercicio','CPF_CNPJ','NotaLiquidacao','DataLiquidacao','ValorLiquidado');
                    $campoData = 'DataLiquidacao';
                    $campoNota = 'NotaLiquidacao';
                    $campoTipoConsulta = 'UnidadeGestora';
                    $view = 'despesas.liquidacao';
                    $colunaDados = [ 'AnoExercicio','CPF/CNPJ', 'Nota de Liquidação', 'Data de Liquidação', 'Valor Liquidado' ];
                    break;
                case 'pagamentos':
                    $dadosDb = PagamentoModel::select('UnidadeGestora','AnoExercicio','CPF_CNPJ','NotaPagamento','DataPagamento','ValorPago');
                    $campoData = 'DataPagamento';
                    $campoNota = 'NotaPagamento';
                    $campoTipoConsulta = 'UnidadeGestora';
                    $view = 'despesas.pagamento';
                    $colunaDados = [ 'AnoExercicio','CPF/CNPJ', 'Nota de Pagamento', 'Data de Pagamento', 'Valor Pago' ];
                    break;
            }
        /* FIM SELECT */

        
        $dadosDb->orderBy($campoData);


        /*******************/
        /* FILTRO TEMPORAL */
        /*******************/
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
        return View($view, compact('consulta', 'subConsulta', 'tipoConsulta', 'dadosDb', 'colunaDados', 'link'));
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
        $nomeFornecedor =  isset($_GET['nomeFornecedor']) ? $_GET['nomeFornecedor'] : 'null';

        $arraySearch = ['_', '@'];
        $arrayReplace = [' ', '/'];
        
        if($nomeFornecedor != 'null'){
            $nomeFornecedor = str_replace($arraySearch,$arrayReplace, $nomeFornecedor);
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
