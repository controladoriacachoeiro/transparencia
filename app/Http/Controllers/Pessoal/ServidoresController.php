<?php

namespace App\Http\Controllers\Pessoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarPessoalModel;
use App\Models\Pessoal\ServidorModel;
use Illuminate\Support\Facades\DB;

class ServidoresController extends Controller
{    
    /*Os dados dos servidores já estão vindo da maneira correta, com uma linha para cada servidor,
    sempre sendo o mais recente de acordo com a dataExercício.

    Uma forma de fazer essa operação aqui, se os dados vier como sem o tratamento

    $dadosDb = DB::select('select  *
                                from Servidores t1
                                where Nome like :nome and DataExercicio = (select max(t2.DataExercicio)
                                            from Servidores t2
                                            where t2.CPF = t1.CPF)', ['nome' => '%' . $nome . '%']);
    */


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
        $dadosDb->selectRaw('Nome, OrgaoLotacao, Matricula, Cargo, Funcao, Situacao');        

        if ($nome != 'todos'){                                                                                                    
            $dadosDb->where('Nome', 'like', '%' . $nome . '%');                        
        }
        
        $dadosDb = $dadosDb->get();

        $colunaDados = [ 'Nome', 'Órgão Lotação','Matrícula', 'Cargo', 'Função', 'Situação' ];        
        $Navegacao = array(            
                array('url' => '/servidores/nome' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $nome)
        );

        return View('pessoal/servidores.tabelaNome', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }    
    

    //GET
    public function FiltroOrgao(){
        $dadosDb = ServidorModel::orderBy('OrgaoLotacao');
        $dadosDb->select('OrgaoLotacao');
        $dadosDb->distinct('OrgaoLotacao');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro,$valor->OrgaoLotacao);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;
                                
        return View('pessoal.servidores.filtroOrgao',compact('dadosDb'));
    }

    //POST
    public function orgao(Request $request){        
        if (($request->selectTipoConsulta != '') && ($request->selectTipoConsulta != null)) {
            return redirect()->route('MostrarServidoresOrgao', ['orgao' => $request->selectTipoConsulta]);
        }
        return redirect()->route('MostrarServidoresOrgao', ['orgao' => 'todos']);
    }

    //GET
    public function MostrarServidoresOrgao($orgao){
        $dadosDb = ServidorModel::orderBy('Nome');
        $dadosDb->select('Nome','OrgaoLotacao','Matricula','Cargo','Funcao','Situacao' );

        if (($orgao != 'todos') && ($orgao != 'Todos')){                                                                                                    
            $dadosDb->where('OrgaoLotacao', '=', $orgao);                        
        }

        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Nome', 'Órgão Lotação','Matrícula', 'Cargo', 'Função', 'Situação' ];
        $Navegacao = array(            
                array('url' => '/servidores/nome' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $nome)
        );

        return View('pessoal/servidores.tabelaNome', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //POST
    public function matricula(Request $request){
        if (($request->txtMatricula != '') && ($request->txtMatricula != null)) {
            return redirect()->route('MostrarServidoresMatricula', ['matricula' => $request->txtMatricula]);
        }
        return redirect()->route('MostrarServidoresMatricula', ['matricula' => 'todos']);
    }

    //GET
    public function MostrarServidoresMatricula($matricula){
        $dadosDb = ServidorModel::orderBy('Nome');
        $dadosDb->select('Nome','OrgaoLotacao','Matricula','Cargo','Funcao','Situacao' );

        if ($matricula != 'todos'){
            $dadosDb->where('Matricula', '=', $matricula);                        
        }

        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Nome', 'Órgão Lotação','Matrícula', 'Cargo', 'Função', 'Situação' ];
        $Navegacao = array(            
                array('url' => '/servidores/matricula' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $matricula)
        );

        return View('pessoal/servidores.tabelaNome', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }


    //POST
    public function cargofuncao(Request $request){
        if (($request->txtCargoFuncao != '') && ($request->txtCargoFuncao != null)) {
            return redirect()->route('MostrarServidoresCargoFuncao', ['cargofuncao' => $request->txtCargoFuncao]);
        }
        return redirect()->route('MostrarServidoresCargoFuncao', ['cargofuncao' => 'todos']);
    }

    //GET
    public function MostrarServidoresCargoFuncao($cargofuncao){
        $dadosDb = ServidorModel::orderBy('Nome');
        $dadosDb->select('Nome','OrgaoLotacao','Matricula','Cargo','Funcao','Situacao' );

        if ($cargofuncao != 'todos'){
            $dadosDb->where('Cargo', 'like', '%'.$cargofuncao.'%');
            $dadosDb->orWhere('Funcao', 'like', '%'.$cargofuncao.'%');                                       
        }

        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Nome', 'Órgão Lotação','Matrícula', 'Cargo', 'Função', 'Situação' ];
        $Navegacao = array(            
                array('url' => '/servidores/cargofuncao' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $cargofuncao)
        );

        return View('pessoal/servidores.tabelaNome', compact('dadosDb', 'colunaDados', 'Navegacao'));
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