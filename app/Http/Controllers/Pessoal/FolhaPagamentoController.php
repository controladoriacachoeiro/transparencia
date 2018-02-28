<?php

namespace App\Http\Controllers\Pessoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoal\FolhaPagamentoModel;
use App\Auxiliar as Auxiliar;

class FolhaPagamentoController extends Controller
{
    //POST
    public function matricula(Request $request){        
        if (($request->txtMatricula != '') && ($request->txtMatricula != null)) {
            return redirect()->route('MostrarPagamentos', ['matricula' => $request->txtMatricula]);
        }
        return view('pessoal/folhapagamento.filtroMatricula');
    }   

    //GET    
    public function MostrarPagamentos($matricula){                                                      
        $dadosDb = FolhaPagamentoModel::orderBy('Nome');
        $dadosDb->select('Nome','Matricula', 'MesPagamento', 'AnoPagamento');
        $dadosDb->where('Matricula', '=', $matricula);                
        $dadosDb->groupBy('MesPagamento', 'AnoPagamento');
        $dadosDb->orderBy( 'AnoPagamento', 'desc');
        $dadosDb->orderBy( 'MesPagamento', 'desc');        
        $dadosDb = $dadosDb->get();                                
        $colunaDados = ['Mês', 'Ano'];
        $Navegacao = array(            
                array('url' => '/servidores/nome' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => 'Matrícula: ' . $matricula)
        );

        if (count($dadosDb) > 0){
            $Titulo = $dadosDb[0]->Nome;
        }else{
            $Titulo = 'Nenhum Pagamento Encontrado';
        }
        
        return View('pessoal/folhapagamento.tabelaPagamentos', compact('dadosDb', 'colunaDados', 'Navegacao', 'Titulo'));
    }

    //GET
    public function showPagamento(){
        $Matricula =  isset($_GET['Matricula']) ? $_GET['Matricula'] : 'null';        
        $Mes =  isset($_GET['Mes']) ? $_GET['Mes'] : 'null';
        $Ano =  isset($_GET['Ano']) ? $_GET['Ano'] : 'null';

        $dadosDb = FolhaPagamentoModel::orderBy('Nome');
        $dadosDb->where('Matricula', '=', $Matricula);        
        $dadosDb->where('MesPagamento', '=', $Mes);
        $dadosDb->where('AnoPagamento', '=', $Ano);
        $dadosDb = $dadosDb->get();    
        
        //Camuflar o CPF
        $dadosDb = Auxiliar::ModificarCPF($dadosDb);

        return json_encode($dadosDb);
    }    
}