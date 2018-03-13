<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoal\ServidorModel;
use App\Models\Pessoal\FolhaPagamentoModel;
use App\Auxiliar as Auxiliar;

class ApiPessoalController extends Controller
{

    public function servidoresnome($nome)
    {
        $dadosDb = ServidorModel::orderBy('Nome');
        // $dadosDb->select('Nome', 'Matricula', 'CPF', 'Cargo', 'Funcao', 'TipoVinculo',
        // 'DataExercicio','OrgaoLotacao','Situacao','CargaHoraria','Referencia','Sigla');

        if ($nome != 'todos'){                                                                                                    
            //Separa a string sempre que encontrar um espaço em branco, e divide ela em palavras. Essas palavras são usadas no LIKE do SQL. Serve caso o usuário só saiba o nome e um pedaço do sobrenome da pessoa  
            $arrayPalavras = explode(' ', $nome);

            foreach ($arrayPalavras as $palavra) {
                $dadosDb->where('Nome', 'like', '%' . $palavra . '%');
            }               
            //$dadosDb->where('Nome', 'like', '%' . $nome . '%');                         
        }
        $dadosDb = $dadosDb->get();
        $dadosDb = Auxiliar::ModificarCPF($dadosDb);
        return Json_encode($dadosDb);
    }

    public function servidormatricula($matricula)
    {
        $dadosDb = ServidorModel::orderBy('Nome');
        // $dadosDb->select('Nome', 'Matricula', 'CPF', 'Cargo', 'Funcao', 'TipoVinculo',
        // 'DataExercicio','OrgaoLotacao','Situacao','CargaHoraria','Referencia','Sigla');
        $dadosDb->where('Matricula', '=', $matricula);
        $dadosDb = $dadosDb->get();
        $dadosDb = Auxiliar::ModificarCPF($dadosDb);
        return Json_encode($dadosDb);
    }

    public function pagamento($matricula)
    {
        $dadosDb = FolhaPagamentoModel::orderBy('Nome');   
        $dadosDb->where('Matricula', '=', $matricula);     
        $dadosDb = $dadosDb->get();      

        //Método abaixo retira os eventos que não podem ser mostrados, como por exemplo os empréstimos.
       $eventos = [612, 617, 618, 630, 631, 632, 640, 516, 560, 511, 626, 504, 602, 605, 510, 512, 582, 584, 587, 588, 589, 601, 602, 607, 611, 619, 625, 626, 650, 682];
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
        
        $dadosDb = Auxiliar::ModificarCPF($dadosDb);
        return Json_encode($dadosDb);
    }
}