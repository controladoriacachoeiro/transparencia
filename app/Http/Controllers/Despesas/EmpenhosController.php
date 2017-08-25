<?php

namespace App\Http\Controllers\Receitas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesas\EmpenhoModel;
use App\Auxiliar as Auxiliar;

class EmpenhosController extends Controller
{    
    //GET
    public function FiltroOrgao(){
        $dadosDb = EmpenhoModel::orderBy('UnidadeGestora');
        $dadosDb->select('UnidadeGestora');
        $dadosDb->distinct('UnidadeGestora');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->UnidadeGestora);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;        
                                
        return View('receitas/recebimentos.filtroOrgao', compact('dadosDb'));
    }

    public function FiltroFornecedor(){
        $dadosDb = EmpenhoModel::orderBy('Beneficiario');
        $dadosDb->select('Beneficiario');
        $dadosDb->distinct('Beneficiario');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->Beneficiario);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;        
                                
        return View('receitas/recebimentos.filtroOrgao', compact('dadosDb'));
    }

    public function FiltroFuncao(){
        $dadosDb = EmpenhoModel::orderBy('Funcao');
        $dadosDb->select('Funcao');
        $dadosDb->distinct('Funcao');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->Funcao);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;        
                                
        return View('receitas/recebimentos.filtroOrgao', compact('dadosDb'));
    }

    public function FiltroElementoDespesa(){
        $dadosDb = EmpenhoModel::orderBy('ElemDespesa');
        $dadosDb->select('ElemDespesa');
        $dadosDb->distinct('ElemDespesa');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->ElemDespesa);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;        
                                
        return View('receitas/recebimentos.filtroOrgao', compact('dadosDb'));
    }

}