<?php

namespace App\Http\Controllers\Despesas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesas\EmpenhoModel;
use App\Auxiliar as Auxiliar;

class EmpenhosController extends Controller
{    
    //GET
    //Orgao
        public function FiltroOrgao(){
            $dadosDb = EmpenhoModel::orderBy('UnidadeGestora');
            $dadosDb->select('UnidadeGestora');
            $dadosDb->distinct('UnidadeGestora');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->UnidadeGestora);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/empenhos.filtroOrgao', compact('dadosDb'));
        }

        public function orgao(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarEmpenhoOrgao',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'orgao' => $request->selectTipoConsulta]);
        }

        public function MostrarEmpenhoOrgao($datainicio, $datafim, $orgao){        
            if (($orgao == "todos") || ($orgao == "Todos")){
                $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
                $dadosDb->selectRaw('UnidadeGestora, sum(ValorEmpenho) as ValorEmpenho');
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('UnidadeGestora');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Órgão', 'Valor Empenhado'];
                $Navegacao = array(
                        array('url' => '/despesas/empenhos/orgaos' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $orgao)
                );
                $nivel = 1;
            }
            else{
                $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
                $dadosDb->selectRaw('UnidadeGestora,Beneficiario, sum(ValorEmpenho) as ValorEmpenho');            
                $dadosDb->where('UnidadeGestora', '=', $orgao);
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Fornecedor', 'Valor Empenhado'];
                $Navegacao = array(            
                        array('url' => '/despesas/empenhos/orgaos' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarEmpenhoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                        array('url' => '#' ,'Descricao' => $orgao)
                );
                $nivel = 2;
            }

            return View('despesas/empenhos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nivel'));
        }

        public function MostrarEmpenhoOrgaoFornecedor($datainicio, $datafim, $orgao,$beneficiario){        
            $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
            $dadosDb->select('EmprenhoID','DataEmpenho','ElemDespesa','NotaEmpenho','ValorEmpenho');
            $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('UnidadeGestora','=',$orgao);
            $dadosDb->where('Beneficiario','=',$beneficiario);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Empenho','Elemento','Nota de Empenho','Valor Empenhado'];
            $Navegacao = array(            
                array('url' => '/despesas/empenhos/orgaos' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarEmpenhoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                array('url' => route('MostrarEmpenhoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => $orgao]),'Descricao' => $orgao),
                array('url' =>'#','Descricao' =>$beneficiario)
            );
            $nivel = 1;
            
            return View('despesas/empenhos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nivel'));
        }
    //Fim Orgao

    //Fornecedor
        public function FiltroFornecedor(){
            $dadosDb = EmpenhoModel::orderBy('Beneficiario');
            $dadosDb->select('Beneficiario');
            $dadosDb->distinct('Beneficiario');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->Beneficiario);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/empenhos.filtroFornecedor', compact('dadosDb'));
        }

        public function fornecedor(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarEmpenhoFornecedor',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'fornecedor' => $request->selectTipoConsulta]);
        }

        public function MostrarEmpenhoFornecedor($datainicio, $datafim, $fornecedor){        
            if (($fornecedor == "todos") || ($fornecedor == "Todos")){
                $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
                $dadosDb->selectRaw('Beneficiario, sum(ValorEmpenho) as ValorEmpenho');
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Fornecedor', 'Valor Empenhado'];
                $Navegacao = array(
                        array('url' => '/despesas/empenhos/fornecedor' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $fornecedor)
                );
                $nivel = 1;
            }
            else{
                $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
                $dadosDb->selectRaw('UnidadeGestora,Beneficiario, sum(ValorEmpenho) as ValorEmpenho');            
                $dadosDb->where('Beneficiario', '=', $fornecedor);
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgão', 'Valor Empenhado'];
                $Navegacao = array(            
                        array('url' => '/despesas/empenhos/fornecedores' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarEmpenhoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'fornecedor' => 'todos']),'Descricao' => 'Fornecedores'),
                        array('url' => '#' ,'Descricao' => $fornecedor)
                );
                $nivel = 2;
            }

            return View('despesas/empenhos.tabelaFornecedor', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nivel'));
        }

        public function MostrarEmpenhoFornecedorOrgao($datainicio, $datafim, $beneficiario,$orgao){        
            $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
            $dadosDb->select('EmprenhoID','DataEmpenho','ElemDespesa','NotaEmpenho','ValorEmpenho');
            $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('UnidadeGestora','=',$orgao);
            $dadosDb->where('Beneficiario','=',$beneficiario);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Empenho','Elemento','Nota de Empenho','Valor Empenhado'];
            $Navegacao = array(            
                array('url' => '/despesas/empenhos/fornecedores' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarEmpenhoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Fornecedores'),
                array('url' => route('MostrarEmpenhoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => $beneficiario]),'Descricao' => $beneficiario),
                array('url' =>'#','Descricao' =>$beneficiario)
            );
            $nivel = 1;
            
            return View('despesas/empenhos.tabelaFornecedor', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nivel'));
        }
    //Fim Fornecedor    

    //Funcao
        public function FiltroFuncao(){
            $dadosDb = EmpenhoModel::orderBy('Funcao');
            $dadosDb->select('Funcao');
            $dadosDb->distinct('Funcao');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->Funcao);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/empenhos.filtroFuncao', compact('dadosDb'));
        }

        public function funcao(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarEmpenhoFuncao',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'funcao' => $request->selectTipoConsulta]);
        }

        public function MostrarEmpenhoFuncao($datainicio, $datafim, $funcao){        
            if (($funcao == "todos") || ($funcao == "Todos")){
                $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
                $dadosDb->selectRaw('Funcao, sum(ValorEmpenho) as ValorEmpenho');
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Funcao');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Função', 'Valor Empenhado'];
                $Navegacao = array(
                        array('url' => '/despesas/empenhos/fornecedor' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $funcao)
                );
                $nivel = 1;
            }
            else{
                $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
                $dadosDb->selectRaw('UnidadeGestora,Funcao, sum(ValorEmpenho) as ValorEmpenho');            
                $dadosDb->where('Funcao', '=', $funcao);
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Funcao');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgãos', 'Valor Empenhado'];
                $Navegacao = array(            
                        array('url' => '/despesas/empenhos/fornecedores' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarEmpenhoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'fornecedor' => 'todos']),'Descricao' => 'Fornecedores'),
                        array('url' => '#' ,'Descricao' => $funcao)
                );
                $nivel = 2;
            }

            return View('despesas/empenhos.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nivel'));
        }

        public function MostrarEmpenhoFuncaoOrgao($datainicio, $datafim, $funcao,$orgao){        
            $dadosDb = EmpenhoModel::orderBy('DataEmpenho');
            $dadosDb->selectRaw('UnidadeGestora,Funcao, sum(ValorEmpenho) as ValorEmpenho');
            $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Funcao','=',$funcao);
            $dadosDb->where('UnidadeGestora','=',$orgao);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Empenho','Elemento','Nota de Empenho','Valor Empenhado'];
            $Navegacao = array(            
                array('url' => '/despesas/empenhos/fornecedores' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarEmpenhoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Fornecedores'),
                array('url' => route('MostrarEmpenhoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => $orgao]),'Descricao' => $orgao),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nivel = 1;
            
            return View('despesas/empenhos.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nivel'));
        }
    //Fim Funcao

    public function FiltroElementoDespesa(){
        $dadosDb = EmpenhoModel::orderBy('ElemDespesa');
        $dadosDb->select('ElemDespesa');
        $dadosDb->distinct('ElemDespesa');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->ElemDespesa);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;        
                                
        return View('despesas/empenhos.filtroElementoDespesa', compact('dadosDb'));
    }

    public function ShowEmpenho(){
        $EmpenhoID =  isset($_GET['EmpenhoID']) ? $_GET['EmpenhoID'] : 'null';               

        $dadosDb = EmpenhoModel::where('EmprenhoID', '=', $EmpenhoID);        
        $dadosDb = $dadosDb->get();                       
        return json_encode($dadosDb);
    }

}