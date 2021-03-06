<?php

namespace App\Http\Controllers\Despesas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesas\EmpenhoModel;
use App\Auxiliar as Auxiliar;

class EmpenhosController extends Controller
{    
    //Orgao
        public function FiltroOrgao(){
            $dadosDb = EmpenhoModel::orderBy('Orgao');
            $dadosDb->select('Orgao');
            $dadosDb->distinct('Orgao');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->Orgao);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/empenhos.filtroOrgao', compact('dadosDb'));
        }

        public function orgao(Request $request){
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
                $dadosDb = EmpenhoModel::orderBy('Orgao');
                $dadosDb->selectRaw('Orgao, sum(ValorEmpenho) as ValorEmpenho');
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Órgão', 'Valor Empenhado'];
                $Navegacao = array(
                        array('url' => '/despesas/empenhos/orgaos' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $orgao)
                );
            } else{
                $dadosDb = EmpenhoModel::orderBy('Beneficiario');
                $dadosDb->selectRaw('Orgao,Beneficiario, sum(ValorEmpenho) as ValorEmpenho');            
                $dadosDb->where('Orgao', '=', $orgao);
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Fornecedor', 'Valor Empenhado'];
                $Navegacao = array(            
                        array('url' => '/despesas/empenhos/orgaos' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarEmpenhoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                        array('url' => '#' ,'Descricao' => $orgao)
                );
            }
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorEmpenho');            
            $nota=false;
            return View('despesas/empenhos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarEmpenhoOrgaoFornecedor($datainicio, $datafim, $orgao, $beneficiario){
            $beneficiario=Auxiliar::desajusteUrl($beneficiario);         
            $dadosDb = EmpenhoModel::orderBy('DataEmpenho', 'DESC');
            $dadosDb->select('EmpenhoID','UnidadeGestora','DataEmpenho','ElemDespesa','NotaEmpenho','ValorEmpenho');
            $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao', '=', $orgao);
            $dadosDb->where('Beneficiario', '=', $beneficiario);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Empenho','Unidade Gestora','Elemento','Nota de Empenho','Valor Empenhado'];
            $Navegacao = array(            
                array('url' => '/despesas/empenhos/orgaos' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarEmpenhoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                array('url' => route('MostrarEmpenhoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => $orgao]),'Descricao' => $orgao),
                array('url' =>'#','Descricao' =>Auxiliar::desajusteUrl($beneficiario))
            );
            $nota=true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorEmpenho');
            return View('despesas/empenhos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
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
            $request->selectTipoConsulta=Auxiliar::ajusteUrl($request->selectTipoConsulta);  
            return redirect()->route('MostrarEmpenhoFornecedor',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'fornecedor' => $request->selectTipoConsulta]);
        }

        public function MostrarEmpenhoFornecedor($datainicio, $datafim, $fornecedor){
            $fornecedor=Auxiliar::desajusteUrl($fornecedor);    
            if (($fornecedor == "todos") || ($fornecedor == "Todos")){
                $dadosDb = EmpenhoModel::orderBy('Beneficiario');
                $dadosDb->selectRaw('Beneficiario, sum(ValorEmpenho) as ValorEmpenho');
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Fornecedor', 'Valor Empenhado'];
                $Navegacao = array(
                        array('url' => '/despesas/empenhos/fornecedores' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $fornecedor)
                );
            } else{
                $dadosDb = EmpenhoModel::orderBy('Orgao');
                $dadosDb->selectRaw('Orgao,Beneficiario, sum(ValorEmpenho) as ValorEmpenho');            
                $dadosDb->where('Beneficiario', '=', $fornecedor);
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgão', 'Valor Empenhado'];
                $Navegacao = array(            
                        array('url' => '/despesas/empenhos/fornecedores' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarEmpenhoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'fornecedor' => 'todos']),'Descricao' => 'Fornecedores'),
                        array('url' => '#' ,'Descricao' => $fornecedor)
                );
            }
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorEmpenho');
            return View('despesas/empenhos.tabelaFornecedor', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarEmpenhoFornecedorOrgao($datainicio, $datafim, $beneficiario,$orgao){
            $beneficiario=Auxiliar::desajusteUrl($beneficiario);
            $dadosDb = EmpenhoModel::orderBy('DataEmpenho', 'DESC');
            $dadosDb->select('EmpenhoID','UnidadeGestora','DataEmpenho','ElemDespesa','NotaEmpenho','ValorEmpenho');
            $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->where('Beneficiario','=',$beneficiario);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Empenho','Unidade Gestora','Elemento','Nota de Empenho','Valor Empenhado'];
            $Navegacao = array(            
                array('url' => '/despesas/empenhos/fornecedores' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarEmpenhoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Fornecedores'),
                array('url' => route('MostrarEmpenhoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => Auxiliar::ajusteUrl($beneficiario)]),'Descricao' => $beneficiario),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota=true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorEmpenho');
            return View('despesas/empenhos.tabelaFornecedor', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
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
            $request->selectTipoConsulta=Auxiliar::ajusteUrl($request->selectTipoConsulta); 
            return redirect()->route('MostrarEmpenhoFuncao',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'funcao' => $request->selectTipoConsulta]);
        }

        public function MostrarEmpenhoFuncao($datainicio, $datafim, $funcao){
            $funcao=Auxiliar::desajusteUrl($funcao);
            if (($funcao == "todos") || ($funcao == "Todos")){
                $dadosDb = EmpenhoModel::orderBy('Funcao');
                $dadosDb->selectRaw('Funcao, sum(ValorEmpenho) as ValorEmpenho');
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Funcao');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Funções', 'Valor Empenhado'];
                $Navegacao = array(
                        array('url' => '/despesas/empenhos/funcoes' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $funcao)
                );
            } else{
                $dadosDb = EmpenhoModel::orderBy('Orgao');
                $dadosDb->selectRaw('Orgao,Funcao, sum(ValorEmpenho) as ValorEmpenho');            
                $dadosDb->where('Funcao', '=', $funcao);
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgão', 'Valor Empenhado'];
                $Navegacao = array(            
                        array('url' => '/despesas/empenhos/funcoes' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarEmpenhoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                        array('url' => '#' ,'Descricao' => $funcao)
                );
            }
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorEmpenho');
            return View('despesas/empenhos.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarEmpenhoFuncaoOrgao($datainicio, $datafim, $funcao,$orgao){
            $funcao=Auxiliar::desajusteUrl($funcao);
            $orgao=Auxiliar::desajusteUrl($orgao);
            $dadosDb = EmpenhoModel::orderBy('Beneficiario');
            $dadosDb->selectRaw('Beneficiario,Orgao,Funcao, sum(ValorEmpenho) as ValorEmpenho');
            $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Funcao','=',$funcao);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->groupBy('Beneficiario'); 
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Fornecedor','Valor Empenhado'];
            $Navegacao = array(            
                array('url' => '/despesas/empenhos/funcoes' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarEmpenhoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                array('url' => route('MostrarEmpenhoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => Auxiliar::ajusteUrl($funcao)]),'Descricao' => $funcao),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorEmpenho');
            return View('despesas/empenhos.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarEmpenhoFuncaoOrgaoFornecedor($datainicio, $datafim,$funcao,$orgao,$fornecedor){
            $funcao=Auxiliar::desajusteUrl($funcao);
            $orgao=Auxiliar::desajusteUrl($orgao);
            $fornecedor=Auxiliar::desajusteUrl($fornecedor);
            $dadosDb = EmpenhoModel::select('EmpenhoID','UnidadeGestora','DataEmpenho','ElemDespesa','NotaEmpenho','ValorEmpenho');
            $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->where('Beneficiario','=',$fornecedor);
            $dadosDb->where('Funcao','=',$funcao);
            $dadosDb->orderBy('DataEmpenho', 'DESC');
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Empenho','Unidade Gestora','Elemento','Nota de Empenho','Valor Empenhado'];
            $Navegacao = array(            
                array('url' => '/despesas/empenhos/funcoes' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarEmpenhoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                array('url' => route('MostrarEmpenhoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => Auxiliar::ajusteUrl($funcao)]),'Descricao' => $funcao),
                array('url' => route('MostrarEmpenhoFuncaoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => Auxiliar::ajusteUrl($funcao), 'orgao' =>$orgao]),'Descricao' => $orgao),
                array('url' =>'#','Descricao' =>$fornecedor)
            );
            $nota=true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorEmpenho');
            return View('despesas/empenhos.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }
    //Fim Funcao

    //Elemento de Despesa
        public function FiltroElementoDespesa()
        {
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

        public function elementoDespesa(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);
            $request->selectTipoConsulta=Auxiliar::ajusteUrl($request->selectTipoConsulta); 
            return redirect()->route('MostrarEmpenhoElemento',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'elemento' => $request->selectTipoConsulta]);
        }

        public function MostrarEmpenhoElemento($datainicio, $datafim, $elemento){
            $elemento=Auxiliar::desajusteUrl($elemento);
            if (($elemento == "todos") || ($elemento == "Todos")){
                $dadosDb = EmpenhoModel::orderBy('ElemDespesa');
                $dadosDb->selectRaw('ElemDespesa, sum(ValorEmpenho) as ValorEmpenho');
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('ElemDespesa');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Elementos', 'Valor Empenhado'];
                $Navegacao = array(
                        array('url' => '/despesas/empenhos/elementos' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $elemento)
                );
            } else{
                $dadosDb = EmpenhoModel::orderBy('Orgao');
                $dadosDb->selectRaw('Orgao,ElemDespesa, sum(ValorEmpenho) as ValorEmpenho');
                $dadosDb->where('ElemDespesa', '=', $elemento);
                $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgão', 'Valor Empenhado'];
                $Navegacao = array(            
                        array('url' => '/despesas/empenhos/elementos' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarEmpenhoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => 'todos']),'Descricao' => 'Elementos'),
                        array('url' => '#' ,'Descricao' => $elemento)
                );
            }
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorEmpenho');
            return View('despesas/empenhos.tabelaElementoDespesa', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarEmpenhoElementoOrgao($datainicio, $datafim, $elemento,$orgao){
            $elemento=Auxiliar::desajusteUrl($elemento);      
            $dadosDb = EmpenhoModel::orderBy('DataEmpenho', 'DESC');
            $dadosDb->select('EmpenhoID','UnidadeGestora','DataEmpenho','Beneficiario','NotaEmpenho','ValorEmpenho');
            $dadosDb->whereBetween('DataEmpenho', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->where('ElemDespesa','=',$elemento);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Empenho','Unidade Gestora','Fornecedores','Nota de Empenho','Valor Empenhado'];
            $Navegacao = array(            
                array('url' => '/despesas/empenhos/elemento' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarEmpenhoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => 'todos']),'Descricao' => 'todos'),
                array('url' => route('MostrarEmpenhoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => Auxiliar::ajusteUrl($elemento)]),'Descricao' => $elemento),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota=true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorEmpenho');
            return View('despesas/empenhos.tabelaElementoDespesa', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

    //Fim Elemento despesa

    //Nota
        public function nota(Request $request)
        {
            if (($request->txtNumeroNota != '') && ($request->txtNumeroNota != null))
            {
                return redirect()->route('MostarEmpenhoNota',
                ['numeroNota' => $request->txtNumeroNota,
                 'ano' =>$request->selectAno]);
            }
            else
            {
                return redirect()->back()->with('message', 'Não foram encontrados notas com esse número');
            }
        }

        public function MostrarEmpenhoNota($numeroNota,$ano){        
            $dadosDb = EmpenhoModel::orderBy('DataEmpenho','desc');
            $dadosDb->select('EmpenhoID','UnidadeGestora','DataEmpenho','Orgao','Beneficiario','ValorEmpenho','NotaEmpenho');
            if (($ano == "todos") || ($ano == "Todos"))
            {
                $dadosDb->where('NotaEmpenho','=',$numeroNota);
            }
            else
            {
                $dadosDb->where('NotaEmpenho','=',$numeroNota);
                $dadosDb->where('AnoExercicio','=',$ano);
            }
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Empenho','Unidade Gestora','Nota de Empenho','Órgão','Fornecedores','Valor Empenhado'];
            $Navegacao = array(
                array('url' => '/despesas/empenhos/nota' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $numeroNota)
            );
            $datainicio='';
            $datafim='';
            $nota=true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorEmpenho');
            return View('despesas/empenhos.tabelaNota', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }
    //Fim Nota

    public function ShowEmpenho(){
        $EmpenhoID =  isset($_GET['EmpenhoID']) ? $_GET['EmpenhoID'] : 'null';               

        $dadosDb = EmpenhoModel::where('EmpenhoID', '=', $EmpenhoID);        
        $dadosDb = $dadosDb->get();    
        $dadosDb = Auxiliar::ModificarCPF_CNPJ($dadosDb);                   
        return json_encode($dadosDb);
    }

}