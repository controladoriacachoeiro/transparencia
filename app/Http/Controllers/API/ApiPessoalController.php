<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoal\ServidorModel;
use App\Models\Pessoal\FolhaPagamentoModel;

class ApiPessoalController extends Controller
{

    public function servidoresnome($nome)
    {
        $dadosDb = ServidorModel::orderBy('Nome');
        // $dadosDb->select('Nome', 'Matricula', 'CPF', 'Cargo', 'Funcao', 'TipoVinculo',
        // 'DataExercicio','OrgaoLotacao','Situacao','CargaHoraria','Referencia','Sigla');

        if ($nome != 'todos'){                                                                                                    
            $dadosDb->where('Nome', 'like', '%' . $nome . '%');                        
        }
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }

    public function servidormatricula($matricula)
    {
        $dadosDb = ServidorModel::orderBy('Nome');
        // $dadosDb->select('Nome', 'Matricula', 'CPF', 'Cargo', 'Funcao', 'TipoVinculo',
        // 'DataExercicio','OrgaoLotacao','Situacao','CargaHoraria','Referencia','Sigla');
        $dadosDb->where('Matricula', '=', $matricula);
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }

    public function pagamento($matricula)
    {
        $dadosDb = FolhaPagamentoModel::orderBy('Nome');   
        $dadosDb->where('Matricula', '=', $matricula);     
        $dadosDb = $dadosDb->get();      

        //Método abaixo retira os eventos que não podem ser mostrados, como por exemplo os empréstimos.
        $eventos = [612, 617, 618, 630, 631, 632, 516, 560, 511];
        $dadosDbAux = [];        
        
        for ($i = 0; $i < count($dadosDb); $i++){
            $aux = false;
             foreach ($eventos as $value){
                 if ($dadosDb[$i]->CodigoEvento == $value){
                     $aux = true;
                     break;
                 }
             }
             if ($aux != true){
                array_push($dadosDbAux, $dadosDb[$i]);
             }
        }         

        $dadosDb = $dadosDbAux;
    
        return Json_encode($dadosDb);
    }
}