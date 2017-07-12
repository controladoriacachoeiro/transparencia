<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarHomeModel;

class HomeController extends Controller
{
    public function index(){
        $dadosDb = AuxiliarHomeModel::select('DespesaPaga', 'DespesaEmpenhada', 'DespesaLiquidada', 'ReceitaArrecadada', 'Servidores', 'ContratosAtivos')
        ->whereNotNull('DespesaPaga')
        ->get();
        
        $dados = ['DespesaPaga' => $this->NomearValor($dadosDb[0]->DespesaPaga), 'DespesaEmpenhada' => $this->NomearValor($dadosDb[0]->DespesaEmpenhada),
                'DespesaLiquidada' => $this->NomearValor($dadosDb[0]->DespesaLiquidada), 'Servidores' => $dadosDb[0]->Servidores,
                'ContratosAtivos' => $dadosDb[0]->ContratosAtivos, 'ReceitaArrecadada' => $this->NomearValor($dadosDb[0]->ReceitaArrecadada)];

        $dadosGraficos = AuxiliarHomeModel::select('Mes', 'Ano', 'Lancado', 'Arrecadado', 'Empenhado', 'Liquidado', 'Pago')
        ->whereNotNull('Mes')
        ->get();
        
        $meses = [];

        $receitaLancada = [];
        $receitaArrecadada = [];

        $despesaEmpenhada = [];
        $despesaLiquidada = [];
        $despesaPaga = [];

        for ($i = 0; $i < count($dadosGraficos); $i++){
            array_push($meses, $dadosGraficos[$i]->Mes);
            array_push($receitaLancada, $dadosGraficos[$i]->Lancado);
            array_push($receitaArrecadada, $dadosGraficos[$i]->Arrecadado);
            array_push($despesaEmpenhada, $dadosGraficos[$i]->Empenhado);
            array_push($despesaLiquidada, $dadosGraficos[$i]->Liquidado);
            array_push($despesaPaga, $dadosGraficos[$i]->Pago);            
        }
        

        return View('index', compact('dados','meses', 'receitaLancada', 'receitaArrecadada',
        'despesaEmpenhada', 'despesaLiquidada', 'despesaPaga'));                
    }
    

    public function NomearValor($valor){        
        //retira toda formatação
        $valor = (0+str_replace(",","",$valor));

        //é um número?
        if(!is_numeric($valor)) return false;

        //filtros
        if($valor>1000000000000) return str_replace(".", ",",round(($valor/1000000000000),1).' Trilhões');
        else if($valor>1000000000) return str_replace(".", ",",round(($valor/1000000000),1).' Bilhões');
        else if($valor>1000000) return str_replace(".", ",",round(($valor/1000000),1).' Milhões');
        else if($valor>1000) return str_replace(".", ",",round(($valor/1000),1).' Mil');

        //resultados
        //247.704.360 -> 247,7 Millhões
        //866.965.260.000 -> 867 Billhões
    }
}