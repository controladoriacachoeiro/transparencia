<?php

namespace App\Http\Controllers\Patrimonio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarPessoalModel;
use App\Models\Patrimonio\BensMoveisModel;

class BensMoveisController extends Controller
{
    
    public function filtro(){    
    
       $dadosDb = BensMoveisModel::orderBy('OrgaoLocalizacao');
       $dadosDb->select('OrgaoLocalizacao');
       $dadosDb->distinct('OrgaoLocalizacao');
       $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro,$valor->OrgaoLocalizacao);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;
                                
        return View('patrimonio.BensMoveis.FiltroBensMoveis',compact('dadosDb'));
    }

    public function orgao(Request $request){   
        $dadosDb=[];     
        if (($request->selectTipoConsulta != '') && ($request->selectTipoConsulta != null)) {                        
            $dadosDb = BensMoveisModel::orderBy('Descricao');
            $dadosDb->select('IdentificacaoBem','Descricao','Observacao','ValorAquisicao');
            $dadosDb->where('OrgaoLocalizacao', '=',$request->selectTipoConsulta);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Número Patrimonio', 'Descrição','Observacão', 'Valor'];
            $breadcrumbNavegacao = '';
            //return Json_encode($dadosDb);
            return View('patrimonio.BensMoveis.BensMoveisTabela', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));            
        }
       return Json_encode('dadosDb');
        // dd($dadosDb, $colunaDados, $breadcrumbNavegacao);
    }

    public function nome2($nomeServidor){
        if (($request->txtNome != '') && ($request->txtNome != null)) {                        
            $dadosDb = ServidorModel::orderBy('Nome');
            $dadosDb->select('Nome','OrgaoLotacao','Matricula','Cargo','Funcao','Situacao' );
            $dadosDb->where('Nome', 'like', '%' . $request->txtNome . '%');                            
            $dadosDb = $dadosDb->get();
            $colunaDados = [ 'Nome', 'Órgão Lotação','Matrícula', 'Cargo', 'Função', 'Situação' ];
        }        
        //Mandar pra view da tabela agora, e achar uma forma de criar o fluxo.
        return $request;
    }
}