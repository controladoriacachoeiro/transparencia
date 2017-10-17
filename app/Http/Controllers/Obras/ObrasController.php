<?php

namespace App\Http\Controllers\Obras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarPessoalModel;
use App\Models\Obras\ObraModel;
use App\Auxiliar as Auxiliar;

class ObrasController extends Controller
{
    public function filtrarObra(Request $request){        
        $situacao=Auxiliar::ajusteUrl($request->slcSituacao);
        return redirect()->route('filtrarObras2', ['situacao' => $situacao]);
    }

    public function filtroSituacao($situacao){        
       $breadcrumbNavegacao =[];    
       $situacao=Auxiliar::desajusteUrl($situacao);

       if($situacao=='todos'){
       $dadosDb=ObraModel::orderBy('CodigoObra');
       $dadosDb->selectRaw('TipoServico, ObraID, DescricaoObra,Situacao, ValorContrato');
       $dadosDb->orderBy( 'CodigoObra', 'desc');
       $dadosDb->groupBy('CodigoObra');
       $dadosDb = $dadosDb->get();  
       }
       else{
       $dadosDb=ObraModel::orderBy('CodigoObra');
       $dadosDb->selectRaw('TipoServico, ObraID, DescricaoObra,Situacao, ValorContrato');
       $dadosDb->orderBy( 'CodigoObra', 'desc');
       $dadosDb->groupBy('CodigoObra');
       $dadosDb->where('Situacao', '=', $situacao);
       $dadosDb = $dadosDb->get();        
       }
       $colunaDados = [ 'Serviço', 'Descrição', 'Situação', 'Valor'];
       array_push($breadcrumbNavegacao, []);
        // TipoConsulta
        array_push($breadcrumbNavegacao, []);
        
       return View('maisiformacoes.obra.ObraTabela', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
    }

    public function montaFiltro()
    {
        $dadosDb = ObraModel::orderBy('CodigoObra');
        $dadosDb->select('Situacao');
        $dadosDb->distinct('Situacao');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->OrgaoLocalizacao);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;
        $consulta='patrimonio';
        $subConsulta='bensmoveis';
        $tipoConsulta='orgaos';
                                
        return View('maisinformacoes.obras.FiltroObras', compact('dadosDb', 'consulta', 'subConsulta', 'tipoConsulta'));
    }

    //POST
    public function recuperaObras(){    
       $breadcrumbNavegacao =[];    
       $dadosDb=ObraModel::orderBy('CodigoObra');
       $dadosDb->selectRaw('TipoServico, ObraID, DescricaoObra,Situacao, ValorContrato');
       $dadosDb->orderBy( 'CodigoObra', 'desc');
       $dadosDb->groupBy('CodigoObra');
       $dadosDb = $dadosDb->get();
       $colunaDados = [ 'Serviço', 'Descrição', 'Situação', 'Valor'];
       array_push($breadcrumbNavegacao, []);
        // TipoConsulta
        array_push($breadcrumbNavegacao, []);
        
       return View('obra.ObraTabela', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
       //return Json_encode($dadosDb);
    }

    public function showObra(){    
        
       $obraID =  isset($_GET['ObraID']) ? $_GET['ObraID'] : 'null';
       $dadosDb=ObraModel::orderBy('CodigoObra');
       $dadosDb->where('CodigoObra', '=', $obraID);
       $dadosDb = $dadosDb->get();
       
       return json_encode($dadosDb);
    }
}