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
        // Select de acordo com a subConsulta
        switch($subConsulta){
            case 'empenhos':
                $dadosDb = EmpenhoModel::select('UnidadeGestora','AnoExercicio','CPF_CNPJ','NotaEmpenho','DataEmpenho','ValorEmpenho');
                $campoData = 'DataEmpenho';
                $campoNota = 'NotaEmpenho';
                $campoTipoConsulta = 'UnidadeGestora';
                $view = 'despesas.empenho';
                $colunaDados = [ 'AnoExercicio','CPF/CNPJ', 'Nota de Empenho', 'Data de Empenho', 'Valor Empenhado' ];
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

        if($tipoConsulta === 'nota'){
            $dadosDb->where($campoNota, '=', $tipoConsultaSelecionada);
            $dadosDb = $dadosDb->get();
            return View($view, compact('consulta', 'subConsulta', 'tipoConsulta', 'dadosDb', 'colunaDados'));
        }


        // Caso seja bimestre, trimestre, quadrimestre ou semestre, a população do $dadosDb é feito em um únco local
        // já as opções Livre e Mês são personalizadas
        $popularDados = false;

        $dadosDb->orderBy($campoData);

        if($tipoConsultaSelecionada != 'Selecione...')
            $dadosDb->where($campoTipoConsulta, $tipoConsultaSelecionada);   

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
        
        $dadosDb = $dadosDb->get();

        return View($view, compact('consulta', 'subConsulta', 'tipoConsulta', 'dadosDb', 'colunaDados'));
    }

    public function show()
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
