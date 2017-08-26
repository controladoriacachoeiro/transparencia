<?php

namespace App\Http\Controllers\Despesas;

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
                                
        return View('despesas/empenhos.filtroOrgao', compact('dadosDb'));
    }

    public function orgao(Request $request)
    {
        //trocar das datas o "/" por "-".
        $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
        $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

        return redirect()->route('MostrarEmpenhoOrgao',
                                 ['datainicio' => $request->datetimepickerDataInicio, 
                                    'datafim' => $request->datetimepickerDataFim,
                                    'orgao' => $request->selectTipoConsulta]);
    }

    public function MostrarEmpenhoOrgao($datainicio, $datafim, $orgao){        
        if (($orgao == "todos") || ($orgao == "Todos")){
            $dadosDb = EmpenhoModel::orderBy('UnidadeGestora');
            $dadosDb->selectRaw('UnidadeGestora, sum(ValorEmpenho) as ValorEmpenho');
            $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
            $dadosDb->groupBy('UnidadeGestora');
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Órgão', 'Valor Empenhado'];
            $Navegacao = array(
                    array('url' => '/despesas/empenhos/orgao' ,'Descricao' => 'Filtro'),
                    array('url' => '#' ,'Descricao' => $orgao)
            );
            $nivel = 1;
        }
        else{
            $dadosDb = EmpenhoModel::orderBy('Beneficiario');
            $dadosDb->selectRaw('Beneficiario, sum(ValorEmpenho) as ValorArrecadado');            
            $dadosDb->where('UnidadeGestora', '=', $orgao);
            $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
            $dadosDb->groupBy('Beneficiario');                                   
            $dadosDb = $dadosDb->get();                                
            $colunaDados = ['Fornecedor', 'Valor Empenhado'];
            $Navegacao = array(            
                    array('url' => '/despesas/empenhos/orgao' ,'Descricao' => 'Filtro'),
                    array('url' => route('MostrarEmpenhoOrgao', ['dataini' => $dataini, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                    array('url' => '#' ,'Descricao' => $orgao)
            );
            $nivel = 2;
        }
               
        return View('despesas/empenhos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel'));
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
                                
        return View('despesas/empsenhos.filtroFornecedor', compact('dadosDb'));
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
                                
        return View('despesas/empenhos.filtroFuncao', compact('dadosDb'));
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
                                
        return View('despesas/empenhos.filtroElementoDespesa', compact('dadosDb'));
    }

}