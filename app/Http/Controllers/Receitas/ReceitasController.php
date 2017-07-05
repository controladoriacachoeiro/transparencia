<?php

namespace App\Http\Controllers\Receitas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receitas\ReceitaModel;

class ReceitasController extends Controller
{
    //GET
    public function FiltroOrgao(){
        $dadosDb = ReceitaModel::orderBy('UnidadeGestora');
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

    //POST
    public function orgao(Request $request){                          
        if (($request->selectTipoConsulta != '') && ($request->selectTipoConsulta != null)) {

            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataInicio);

            return redirect()->route('MostrarReceitasOrgao',
                                     ['dataini' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'orgao' => $request->selectTipoConsulta]);            
        }
        return view('receitas/recebimentos.filtroOrgao');
    }    

    //GET
    public function MostrarReceitasOrgao($dataini, $datafim, $orgao){        
        $dadosDb = ReceitaModel::orderBy('Nome');
        $dadosDb->select('Nome','Matricula', 'MesPagamento', 'AnoPagamento');
        $dadosDb->where('Matricula', '=', $matricula);
        $dadosDb->groupBy('MesPagamento', 'AnoPagamento');
        $dadosDb->orderBy( 'AnoPagamento', 'desc');
        $dadosDb->orderBy( 'MesPagamento', 'desc');        
        $dadosDb = $dadosDb->get();                                
        $colunaDados = [ 'Nome', 'Matrícula','Mês', 'Ano'];
        $Navegacao = array(            
                array('url' => '/folhadepagamento/matricula' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $matricula)
        );

        return View('pessoal/folhapagamento.tabelaPagamentos', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    // //GET        
    // public function showPagamento(){
    //     $Matricula =  isset($_GET['Matricula']) ? $_GET['Matricula'] : 'null';
    //     $Mes =  isset($_GET['Mes']) ? $_GET['Mes'] : 'null';
    //     $Ano =  isset($_GET['Ano']) ? $_GET['Ano'] : 'null';        

    //     $dadosDb = FolhaPagamentoModel::orderBy('Nome');        
    //     $dadosDb->where('Matricula', '=', $Matricula);
    //     $dadosDb->where('MesPagamento', '=', $Mes);
    //     $dadosDb->where('AnoPagamento', '=', $Ano);
    //     $dadosDb = $dadosDb->get();                       

    //     return json_encode($dadosDb);
    // }    
}