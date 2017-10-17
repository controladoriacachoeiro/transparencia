<?php

namespace App\Http\Controllers\Obras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obras\ObraModel;
use App\Auxiliar as Auxiliar;

class ObrasController extends Controller
{    
    //GET
    public function listarObras(){                              
       $dadosDb=ObraModel::select('TipoServico', 'ObraID', 'CodigoObra', 'DescricaoObra', 'Situacao', 'ValorContrato');
       $dadosDb->orderBy( 'CodigoObra', 'desc');
       $dadosDb->groupBy('CodigoObra');
       $dadosDb = $dadosDb->get();         
       $colunaDados = ['Descrição', 'Situação', 'Valor da Obra'];
       $Navegacao = array(array('url' => '#' ,'Descricao' => 'Todas as Obras'));       
    
       return View('obra.obraTabela', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }
    
    //GET
    public function showObra(){            
       $CodigoObra =  isset($_GET['CodigoObra']) ? $_GET['CodigoObra'] : 'null';       
       $dadosDb=ObraModel::orderBy('CodigoObra');
       $dadosDb->where('CodigoObra', '=', $CodigoObra);
       $dadosDb = $dadosDb->get();
       
       return json_encode($dadosDb);
    }
}