<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarHomeModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // $dadosDb = AuxiliarHomeModel::select('DespesaPaga', 'DespesaEmpenhada', 'DespesaLiquidada', 'ReceitaArrecadada', 'Servidores', 'ContratosAtivos')
        // ->whereNotNull('DespesaPaga')
        // ->get();
        
        // $dados = ['DespesaPaga' => $this->NomearValor($dadosDb[0]->DespesaPaga), 'DespesaEmpenhada' => $this->NomearValor($dadosDb[0]->DespesaEmpenhada),
        //         'DespesaLiquidada' => $this->NomearValor($dadosDb[0]->DespesaLiquidada), 'Servidores' => $dadosDb[0]->Servidores,
        //         'ContratosAtivos' => $dadosDb[0]->ContratosAtivos, 'ReceitaArrecadada' => $this->NomearValor($dadosDb[0]->ReceitaArrecadada)];
        // $dadosGraficos = AuxiliarHomeModel::select('Mes', 'Ano','Arrecadado','Pago')
        // ->where('Ano','=','2017')
        // ->get();
        
        // $meses = [];
        // $receitaLancada = [];
        // $receitaArrecadada = [];
        // $despesaEmpenhada = [];
        // $despesaLiquidada = [];
        // $despesaPaga = [];
   
        // for ($i = 0; $i < count($dadosGraficos); $i++){
        //     array_push($meses, $dadosGraficos[$i]->Mes);
        //     //array_push($receitaLancada, $dadosGraficos[$i]->Lancado);
        //     array_push($receitaArrecadada,$dadosGraficos[$i]->Arrecadado);
        //     //array_push($despesaEmpenhada,$dadosGraficos[$i]->Empenhado);
        //     //array_push($despesaLiquidada,$dadosGraficos[$i]->Liquidado);
        //     array_push($despesaPaga,$dadosGraficos[$i]->Pago);            
        // }
               
        // return View('index', compact('dados','meses', 'receitaLancada', 'receitaArrecadada',
        // 'despesaEmpenhada', 'despesaLiquidada', 'despesaPaga'));                
        return View('index');
    }
    
    public function NomearValor($valor){        
        //retira toda formatação
        $valor = (0+str_replace(",","",$valor));
        //é um número?
        if(!is_numeric($valor)) return false;
        //filtros
        if($valor>1000000000000) return str_replace(".", ",",round(($valor/1000000000000),0).' Trilhões');
        else if($valor>1000000000) return str_replace(".", ",",round(($valor/1000000000),0).' Bilhões');
        else if($valor>1000000) return str_replace(".", ",",round(($valor/1000000),0).' Milhões');
        else if($valor>1000) return str_replace(".", ",",round(($valor/1000),0).' Mil');
        //resultados
        //247.704.360 -> 247,7 Millhões
        //866.965.260.000 -> 867 Billhões
    }
}
