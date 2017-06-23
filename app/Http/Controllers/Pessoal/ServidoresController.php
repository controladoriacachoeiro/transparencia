<?php

namespace App\Http\Controllers\Pessoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarPessoalModel;
use App\Models\Pessoal\ServidorModel;

class ServidoresController extends Controller
{
    //POST
    public function nome(Request $request){        
        if (($request->txtNome != '') && ($request->txtNome != null)) {
            return redirect()->route('MostrarServidoresNome', ['nome' => $request->txtNome]);
        }
        return redirect()->route('MostrarServidoresNome', ['nome' => 'todos']);
    }

    //GET
    public function MostrarServidoresNome($nome){
        $dadosDb = ServidorModel::orderBy('Nome');
        $dadosDb->select('Nome','OrgaoLotacao','Matricula','Cargo','Funcao','Situacao' );

        if ($nome != 'todos'){                                                                                                    
            $dadosDb->where('Nome', 'like', '%' . $nome . '%');                        
        }

        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Nome', 'Órgão Lotação','Matrícula', 'Cargo', 'Função', 'Situação' ];
        $breadcrumbNavegacao = '';

        return View('pessoal/servidores.tabelaNome', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
    }    

    //GET        
    public function nomeToPagamentos($matricula){
        return redirect()->route('MostrarPagamentos', ['matricula' => $matricula]);        
    }

    

    //GET        
    public function showServidor(){
        $Matricula =  isset($_GET['Matricula']) ? $_GET['Matricula'] : 'null';

        $dadosDb = ServidorModel::orderBy('Nome');        
        $dadosDb->where('Matricula', '=', $Matricula);                            
        $dadosDb = $dadosDb->get();                        
        return json_encode($dadosDb);
    }
}