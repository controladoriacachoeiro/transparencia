<?php

namespace App\Http\Controllers\Pessoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoal\FolhaPagamentoModel;

class FolhaPagamentoController extends Controller
{
    //POST
    public function matricula(Request $request){        
        if (($request->txtMatricula != '') && ($request->txtMatricula != null)) {                        
            $dadosDb = FolhaPagamentoModel::orderBy('Nome');
            $dadosDb->select('Nome','Matricula', 'MesPagamento', 'AnoPagamento');
            $dadosDb->where('Matricula', '=', $request->txtMatricula);
            $dadosDb->groupBy('MesPagamento', 'AnoPagamento');
            $dadosDb->orderBy( 'AnoPagamento', 'desc');
            $dadosDb->orderBy( 'MesPagamento', 'desc');            
            $dadosDb = $dadosDb->get();
            $colunaDados = [ 'Nome', 'Matrícula','Mês', 'Ano'];
            $breadcrumbNavegacao = '';

            return View('pessoal/folhapagamento.tabelaPagamentos', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));            
        }
        return view('pessoal/folhapagamento.filtroMatricula');
    }

    //GET        
    public function MostrarPagamentos($matricula){
        //Deverá ser criado views para cada tabela, ou achar uma forma de mandar por parâmetro aonde será inserida o link que por sua
        //vez irá enviar para a respectiva rota para então gerar o novo fluxo de dados.                                              
        $dadosDb = FolhaPagamentoModel::orderBy('Nome');
        $dadosDb->select('Nome','Matricula', 'MesPagamento', 'AnoPagamento');
        $dadosDb->where('Matricula', '=', $matricula);
        $dadosDb->groupBy('MesPagamento', 'AnoPagamento');
        $dadosDb->orderBy( 'AnoPagamento', 'desc');
        $dadosDb->orderBy( 'MesPagamento', 'desc');        
        $dadosDb = $dadosDb->get();                                
        $colunaDados = [ 'Nome', 'Matrícula','Mês', 'Ano'];
        $breadcrumbNavegacao = '';

        return View('pessoal/folhapagamento.tabelaPagamentos', compact('dadosDb', 'colunaDados', 'breadcrumbNavegacao'));
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
        
        //Método para camuflar o CPF
        $dadosDb = $this->ModificarCPF($dadosDb);




        return json_encode($dadosDb);
    }

    private function ModificarCPF($dados){
        for ($i = 0; $i < count($dados); $i++){
            $dados[$i]->CPF = '***'.'.'.substr($dados[$i]->CPF,3,3).'.'.substr($dados[$i]->CPF,6,3).'-**';
        }        
        return $dados;
    }



    // static public $EventosProibidos = new Array(215, 91, 449, 470, 512, 582, 682, 511, 601, 628, 30, 204, );
}