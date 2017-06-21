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
            $dadosDb = ServidorModel::orderBy('Nome');
            $dadosDb->select('Nome','OrgaoLotacao','Matricula','Cargo','Funcao','Situacao' );
            $dadosDb->where('Nome', 'like', '%' . $request->txtNome . '%');
            $dadosDb = $dadosDb->get();
            $colunaDados = [ 'Nome', 'Órgão Lotação','Matrícula', 'Cargo', 'Função', 'Situação' ];
            $breadcrumbNavegacao = '';

            return View('pessoal/servidores.tabelaNome', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));            
        }        
        return View('pessoal/servidores.filtroNome');                                
    }

    //GET        
    public function nomeToPagamentos($matricula){
        return redirect()->route('MostrarPagamentos', ['matricula' => $matricula]);        
    }

    //GET        
    public function showServidor($matricula){                                      
        $dadosDb = ServidorModel::orderBy('Nome');        
        $dadosDb->where('Matricula', '=', $matricula);                            
        $dadosDb = $dadosDb->get();                        
        return json_encode($dadosDb);
    }
}