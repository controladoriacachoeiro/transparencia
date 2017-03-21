<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas\EmpenhoModel;

class EmpenhoController extends Controller
{
    public function index($consulta,$subConsulta,$tipoConsulta,$unidadeGestora,$periodo,$dataInicio,$dataFim,$ano,$mes,$bimestre,$trimestre,$quadrimestre,$semestre)
    {
        // Caso seja bimestre, trimestre, quadrimestre ou semestre, a população do $empenhos é feito em um únco local
        // já as opções Livre e Mês são personalizadas
        $popularDados = false;

        $empenhos = EmpenhoModel::orderBy('DataEmpenho');
        if($unidadeGestora != 'Selecione...')
            $empenhos->where('UnidadeGestora', $unidadeGestora);   

        switch($periodo){
            case 'Livre':             
                $empenhos->whereBetween('DataEmpenho', [$dataInicio, $dataFim]);
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
                        $empenhos->whereYear('DataEmpenho', $ano);
                        $empenhos->whereMonth('DataEmpenho', $key);
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
                $empenhos = EmpenhoModel::all();
                break;
        }

        if($popularDados){
                $empenhos->whereYear('DataEmpenho', $ano);
                $empenhos->Where(function ($query) use ($arrayMes) {
                    $query->whereMonth('DataEmpenho', '>=', array_shift($arrayMes))
                          ->whereMonth('DataEmpenho', '<=', end($arrayMes));
                });

        }
        
        $empenhos = $empenhos->get();

        $colunaDados = [ 'AnoExercicio','CPF/CNPJ', 'Nota de Empenho', 'Data de Empenho', 'Valor Empenhado' ];

        return View('despesas.empenho', compact('empenhos', 'colunaDados'));
    }
}
