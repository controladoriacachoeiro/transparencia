<?php

namespace App\Http\Controllers\Pessoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auxiliares\AuxiliarPessoalModel;
use App\Models\Pessoal\ServidorModel;
use App\Models\Pessoal\FolhaPagamentoModel;
use Illuminate\Support\Facades\DB;
use App\Auxiliar as Auxiliar;

class ServidoresController extends Controller
{    
    /*Os dados dos servidores já estão vindo da maneira correta, com uma linha para cada servidor,
    sempre sendo o mais recente de acordo com a dataExercício.*/


    //GET
    public function FiltroNome(){
        $dadosDb = ServidorModel::orderBy('Situacao');
        $dadosDb->select('Situacao');
        $dadosDb->distinct('Situacao');
        $dadosDb = $dadosDb->get();        

        $arrayDataFiltro =[];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro,$valor->Situacao);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;
                                
        return View('pessoal.servidores.filtroNome',compact('dadosDb'));
    }

    //POST
    public function nome(Request $request){
        //Com essa lógica irá filtrar só se algum dos dois forms for usado.               
        if (($request->txtNome == '') && ($request->selectTipoConsulta == 'Todos')) {
            return redirect('/servidores/nome');
        }
        if ($request->txtNome == ''){
            $request->txtNome = 'todos';
        }            
        return redirect()->route('MostrarServidoresNome', ['nome' => $request->txtNome, 'situacao' => $request->selectTipoConsulta]);                
    }

    //GET
    public function MostrarServidoresNome($nome, $situacao){        
        $dadosDb = ServidorModel::orderBy('Nome');
        $dadosDb->selectRaw('ServidorID, Nome, OrgaoLotacao, Matricula, Cargo, Funcao, Situacao');                

        if ($nome != 'todos'){  
            //$dadosDb->where('Nome', 'like', '%' . $nome . '%');

            //Separa a string sempre que encontrar um espaço em branco, e divide ela em palavras. Essas palavras são usadas no LIKE do SQL. Serve caso o usuário só saiba o nome e um pedaço do sobrenome da pessoa
            $arrayPalavras = explode(' ', $nome);

            foreach ($arrayPalavras as $palavra) {
                $dadosDb->where('Nome', 'like', '%' . $palavra . '%');
            }                     
        }

        if ($situacao != 'Todos'){
            $dadosDb->where('Situacao', '=', $situacao);
        }
        
        $dadosDb = $dadosDb->get();        

        $colunaDados = [ 'Nome', 'Órgão Lotação','Matrícula', 'Cargo', 'Função', 'Situação'];
        $Navegacao = array(            
                array('url' => '/servidores/nome' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $nome . " - Situação: ". $situacao)
        );
        if (count($dadosDb)==0)
        {
            return redirect()->back()->with('message', 'Não foram encontrados servidores com esse nome');
        }
        else
        {
            return View('pessoal/servidores.tabelaNome', compact('dadosDb', 'colunaDados', 'Navegacao', 'nome', 'situacao'));    
        }
        //return View('pessoal/servidores.tabelaNome', compact('dadosDb', 'colunaDados', 'Navegacao', 'nome', 'situacao'));
    }
    

    //GET
    public function FiltroOrgao(){
        //Para o form de Órgão
        $dadosDb = ServidorModel::orderBy('OrgaoLotacao');
        $dadosDb = $dadosDb->select('OrgaoLotacao')->distinct('OrgaoLotacao')->get();
        $arrayDataFiltro =[];                
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro,$valor->OrgaoLotacao);
        }
        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

        //Para o form de Situação
        $dadosDb2 = ServidorModel::orderBy('Situacao');        
        $dadosDb2 = $dadosDb2->select('Situacao')->distinct('Situacao')->get();        
        
        $arrayDataFiltro2 =[];                
        foreach ($dadosDb2 as $valor) {
            array_push($arrayDataFiltro2,$valor->Situacao);
        }
        $arrayDataFiltro2 = json_encode($arrayDataFiltro2);
        $dadosDb2 = $arrayDataFiltro2;        
                                                
        return View('pessoal.servidores.filtroOrgao',compact('dadosDb', 'dadosDb2'));
    }

    //POST
    public function orgao(Request $request){        
        return redirect()->route('MostrarServidoresOrgao', ['orgao' => $request->selectTipoConsulta, 'situacao' => $request->selectTipoConsulta2]);
    }

    //GET
    public function MostrarServidoresOrgao($orgao, $situacao){
        if (($orgao == "todos") || ($orgao == "Todos")){
            $dadosDb = ServidorModel::orderBy('OrgaoLotacao');
            $dadosDb->selectRaw('OrgaoLotacao, Situacao, count(*) as Quantidade');            
            $dadosDb->groupBy('OrgaoLotacao');
            $colunaDados = [ 'Órgão Lotação', 'Quantidade de Servidores'];
            $Navegacao = array(            
                array('url' => '/servidores/orgao' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => 'Órgãos')
            );
            $nivel = 1;            
        }
        else{
            $dadosDb = ServidorModel::orderBy('Nome');
            $dadosDb->select('ServidorID', 'Nome','OrgaoLotacao','Matricula','Cargo','Funcao','Situacao');
            $dadosDb->where('OrgaoLotacao', '=', $orgao);    
            $colunaDados = [ 'Nome', 'Órgão Lotação','Matrícula', 'Cargo', 'Função', 'Situação' ];
            $Navegacao = array(            
                array('url' => '/servidores/orgao' ,'Descricao' => 'Filtro'),
                array('url' => '/servidores/orgao/todos/situacao/Todos' ,'Descricao' => 'Órgãos'),
                array('url' => '#' ,'Descricao' => $orgao)
            );                    
            $nivel = 2;
        }

        if($situacao != 'Todos'){
            $dadosDb->where('Situacao', '=', $situacao);
        }

        $dadosDb = $dadosDb->get();

        return View('pessoal/servidores.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao', 'situacao', 'orgao', 'nivel'));
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
        
        // Casting da matrícula (string para int) para não haver problema na hora que pesquisar alguma matrícula com algum 0 à esquerda
        $matricula = (int)$matricula;

        if ($matricula == null || $matricula == ''){
            return redirect()->back()->with('message', 'Por favor digite um número de matrícula para prosseguir');
        }

        $dadosDb = ServidorModel::orderBy('Nome');        
        $dadosDb->select('ServidorID', 'Nome','OrgaoLotacao','Matricula','Cargo','Funcao','Situacao');

        if ($matricula != 'todos'){
            $dadosDb->where('Matricula', '=', $matricula);                        
        }

        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Nome', 'Órgão Lotação','Matrícula', 'Cargo', 'Função', 'Situação' ];
        $Navegacao = array(            
                array('url' => '/servidores/matricula' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $matricula)
        );

        
        if (count($dadosDb)==0){
            return redirect()->back()->with('message', 'Não foram encontrados servidores com essa matricula');
        }
        else{
            $nome=$dadosDb[0]->Nome;
            $situacao='todos';
            return View('pessoal/servidores.tabelaNome', compact('dadosDb', 'colunaDados', 'Navegacao','nome','situacao'));
        }
    }

    //GET
    public function FiltroCargoFuncao(){
        //Para o form de Cargo/Função
        $dadosDb = ServidorModel::orderBy('Situacao');
        $dadosDb = $dadosDb->select('Situacao')->distinct('Situacao')->get();
        $arrayDataFiltro =[];                
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro,$valor->Situacao);
        }
        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;
                                                
        return View('pessoal.servidores.filtroCargoFuncao',compact('dadosDb'));
    }

    //POST
    public function cargofuncao(Request $request){
        if (($request->txtCargoFuncao != '') && ($request->txtCargoFuncao != null)) {
            return redirect()->route('MostrarCargoFuncao', ['cargofuncao' => $request->txtCargoFuncao, 'situacao' => $request->selectTipoConsulta]);
        }
        return redirect()->route('MostrarCargoFuncao', ['cargofuncao' => 'Todos', 'situacao' => $request->selectTipoConsulta]);
    }

    //GET
    public function MostrarCargoFuncao($cargofuncao, $situacao){
        //Cargo
        $dadosDb = ServidorModel::orderBy('Cargo');
        $dadosDb->selectRaw('Cargo, count(*) as Quantidade');
        $dadosDb->whereNotNull('Cargo');
        $dadosDb->groupBy('Cargo');



            if (($cargofuncao != 'todos') && ($cargofuncao != 'Todos')){            
                $dadosDb->where('Cargo', 'like', '%' . $cargofuncao . '%');                    
        }
        if (($situacao != 'todos') && ($situacao != 'Todos')){
            $dadosDb->where('Situacao', '=', $situacao);                     
        }  
        $dadosDb = $dadosDb->get();        
                              

        $colunaDados = [ 'Cargo/Função', 'Quantidade de Servidores'];
        $Navegacao = array(            
                array('url' => '/servidores/cargofuncao' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $cargofuncao)
        );

        if (count($dadosDb) == 0)
        {
            return redirect()->back()->with('message', 'Não foram encontrados cargos ou funções com essa descriçao ');
        }
        else
        {
            return View('pessoal/servidores.tabelaCargoFuncao', compact('dadosDb', 'colunaDados', 'Navegacao', 'cargofuncao', 'situacao'));
        }
        //return View('pessoal/servidores.tabelaCargoFuncao', compact('dadosDb', 'colunaDados', 'Navegacao', 'cargofuncao', 'situacao'));
    }
    
    //GET
    public function MostrarServidoresCargoFuncao($cargofuncao, $situacao){
        $dadosDb = ServidorModel::orderBy('Nome');
        $dadosDb->select('ServidorID', 'Nome','OrgaoLotacao','Matricula','Cargo','Funcao','Situacao');

        if (($cargofuncao != 'todos') && ($cargofuncao != 'Todos')) {
            $dadosDb->where('Cargo', '=', $cargofuncao);
            if (($situacao != 'todos') && ($situacao != 'Todos')){
                $dadosDb->where('Situacao', '=', $situacao);
            } 
            $dadosDb->orWhere('Funcao', '=', $cargofuncao);
            if (($situacao != 'todos') && ($situacao != 'Todos')){
                $dadosDb->where('Situacao', '=', $situacao);
            }                                        
        }else if (($situacao != 'todos') && ($situacao != 'Todos')){
                $dadosDb->where('Situacao', '=', $situacao);        
        }
        
        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Nome', 'Órgão Lotação','Matrícula', 'Cargo', 'Função', 'Situação' ];
        $Navegacao = array(            
                array('url' => '/servidores/cargofuncao' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $cargofuncao)
        );

        return View('pessoal/servidores.tabelaCargoFuncao', compact('dadosDb', 'colunaDados', 'Navegacao', 'cargofuncao', 'situacao'));
    }


    //GET        
    public function showServidor(){
        $ServidorID =  isset($_GET['ServidorID']) ? $_GET['ServidorID'] : 'null';

        $dadosDb = ServidorModel::orderBy('Nome');        
        $dadosDb->where('ServidorID', '=', $ServidorID);
        $dadosDb = $dadosDb->get();

        //Camuflar o CPF
        $dadosDb = Auxiliar::ModificarCPF($dadosDb);

        return json_encode($dadosDb);
    }

    //GET
    public function DetalhesServidores($nome, $situacao, $matricula){
        $dadosDb = ServidorModel::orderBy('Nome');
        $dadosDb->select('Nome','Matricula', 'CPF', 'Cargo', 'Funcao', 'TipoVinculo', 'DataExercicio', 'OrgaoLotacao', 'Situacao', 'CargaHoraria', 'Referencia', 'Sigla');
        $dadosDb->where('Matricula', '=', $matricula);
        $dadosDb = $dadosDb->get();

        $dadosDb = Auxiliar::ModificarCPF($dadosDb);

        $dadosDb2 = FolhaPagamentoModel::orderBy('Nome');
        $dadosDb2->select('Nome','Matricula', 'MesPagamento', 'AnoPagamento');
        $dadosDb2->where('Matricula', '=', $matricula);                
        $dadosDb2->groupBy('MesPagamento', 'AnoPagamento');
        $dadosDb2->orderBy( 'AnoPagamento', 'desc');
        $dadosDb2->orderBy( 'MesPagamento', 'desc');        
        $dadosDb2 = $dadosDb2->get();                                
        $colunaDados = ['Mês', 'Ano'];
        $Navegacao = array(            
                array('url' => '/servidores/nome' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarServidoresNome', ['nome' => $nome ,'situacao' => $situacao]), 'Descricao' => $nome),
                array('url' => '#' ,'Descricao' => 'Matrícula: ' . $matricula)
        );

        if (count($dadosDb2) > 0){
            $Titulo = $dadosDb2[0]->Nome;
        }else{
            $Titulo = 'Nenhum Pagamento Encontrado';
        }
        
        return View('pessoal/servidores.detalhesServidores', compact('dadosDb', 'dadosDb2', 'colunaDados', 'Navegacao', 'Titulo'));
    }

    //GET
    public function GerarRelatorioServidor($situacao, $matricula){

        //Usando a biblioteca barryvdh/laravel-dompdf
        //https://blog.especializati.com.br/gerar-pdf-no-laravel-com-dompdf/
        //https://github.com/barryvdh/laravel-dompdf


        $dadosDb = ServidorModel::orderBy('Nome');
        $dadosDb->select('Nome','Matricula', 'CPF', 'Cargo', 'Funcao', 'TipoVinculo', 'DataExercicio', 'OrgaoLotacao', 'Situacao', 'CargaHoraria', 'Referencia', 'Sigla');
        $dadosDb->where('Matricula', '=', $matricula);
        $dadosDb = $dadosDb->get();

        $dadosDb = Auxiliar::ModificarCPF($dadosDb);
        $data = date('d/m/Y');

        return \PDF::loadView('pessoal/servidores.impressaoServidorPDF', compact('dadosDb', 'data'))->stream('impressao_servidor_' . $dadosDb[0]->Nome . '.pdf');
    }
}