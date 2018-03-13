<?php

namespace App\Http\Controllers\Despesas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesas\PagamentoRestoModel;
use App\Auxiliar as Auxiliar;

class PagamentoRestoController extends Controller
{    
    //Orgao
        public function FiltroOrgao(){
            $dadosDb = PagamentoRestoModel::orderBy('Orgao');
            $dadosDb->select('Orgao');
            $dadosDb->distinct('Orgao');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->Orgao);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/restos.filtroOrgao', compact('dadosDb'));
        }

        public function orgao(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarPagamentoRestoOrgao',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'orgao' => $request->selectTipoConsulta]);
        }

        public function MostrarPagamentoRestoOrgao($datainicio, $datafim, $orgao){        
            if (($orgao == "todos") || ($orgao == "Todos")){
                $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
                $dadosDb->selectRaw('Orgao, sum(ValorPago) as ValorPago');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Órgão', 'Valor Pago'];
                $Navegacao = array(
                        array('url' => '/despesas/restosapagar/orgaos' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $orgao)
                );
            }
            else{
                $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
                $dadosDb->selectRaw('Orgao,Beneficiario, sum(ValorPago) as ValorPago');            
                $dadosDb->where('Orgao', '=', $orgao);
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Fornecedores', 'Valor Pago'];
                $Navegacao = array(            
                        array('url' => '/despesas/restosapagar/orgaos' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarPagamentoRestoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                        array('url' => '#' ,'Descricao' => $orgao)
                );
            }
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/restos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarPagamentoRestoOrgaoFornecedor($datainicio, $datafim, $orgao,$beneficiario){ 
            $beneficiario=Auxiliar::desajusteUrl($beneficiario); 
            $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
            $dadosDb->select('PagamentoID','UnidadeGestora','DataPagamento','ElemDespesa','NotaPagamento','ValorPago');
            $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->where('Beneficiario','=',$beneficiario);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Pagamento','Unidade Gestora','Elementos','Nota de Pagamento','Valor Pago'];
            $Navegacao = array(            
                array('url' => '/despesas/restosapagar/orgaos' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarPagamentoRestoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                array('url' => route('MostrarPagamentoRestoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => $orgao]),'Descricao' => $orgao),
                array('url' =>'#','Descricao' =>$beneficiario)
            );
            $nota = true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/restos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }
    //Fim Orgao

    //Fornecedor
        public function FiltroFornecedor(){
            $dadosDb = PagamentoRestoModel::orderBy('Beneficiario');
            $dadosDb->select('Beneficiario');
            $dadosDb->distinct('Beneficiario');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->Beneficiario);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/restos.filtroFornecedor', compact('dadosDb'));
        }

        public function fornecedor(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);
            $request->selectTipoConsulta=Auxiliar::ajusteUrl($request->selectTipoConsulta);

            return redirect()->route('MostrarPagamentoRestoFornecedor',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'fornecedor' => $request->selectTipoConsulta]);
        }

        public function MostrarPagamentoRestoFornecedor($datainicio, $datafim, $fornecedor){   
            $fornecedor=Auxiliar::desajusteUrl($fornecedor);    
            if (($fornecedor == "todos") || ($fornecedor == "Todos")){
                $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
                $dadosDb->selectRaw('Beneficiario, sum(ValorPago) as ValorPago');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Fornecedores', 'Valor Pago'];
                $Navegacao = array(
                        array('url' => '/despesas/restosapagar/fornecedores' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $fornecedor)
                );
            }
            else{
                $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
                $dadosDb->selectRaw('Orgao,Beneficiario, sum(ValorPago) as ValorPago');            
                $dadosDb->where('Beneficiario', '=', $fornecedor);
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgão', 'Valor Pago'];
                $Navegacao = array(            
                        array('url' => '/despesas/restosapagar/fornecedores' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarPagamentoRestoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'fornecedor' => 'todos']),'Descricao' => 'Fornecedores'),
                        array('url' => '#' ,'Descricao' => $fornecedor)
                );
            }
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/restos.tabelaFornecedor', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarPagamentoRestoFornecedorOrgao($datainicio, $datafim, $beneficiario,$orgao){ 
            $beneficiario=Auxiliar::desajusteUrl($beneficiario);       
            $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
            $dadosDb->select('PagamentoID','UnidadeGestora','DataPagamento','ElemDespesa','NotaPagamento','ValorPago');
            $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->where('Beneficiario','=',$beneficiario);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Pagamento','Unidade Gestora','Elementos','Nota de Pagamento','Valor Pago'];
            $Navegacao = array(            
                array('url' => '/despesas/pagamentos/fornecedores' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarPagamentoRestoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Fornecedores'),
                array('url' => route('MostrarPagamentoRestoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => Auxiliar::ajusteUrl($beneficiario)]),'Descricao' => $beneficiario),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota = true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/restos.tabelaFornecedor', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }
    //Fim Fornecedor    

    //Funcao
        public function FiltroFuncao(){
            $dadosDb = PagamentoRestoModel::orderBy('Funcao');
            $dadosDb->select('Funcao');
            $dadosDb->distinct('Funcao');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->Funcao);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/restos.filtroFuncao', compact('dadosDb'));
        }

        public function funcao(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);
            $request->selectTipoConsulta=Auxiliar::ajusteUrl($request->selectTipoConsulta);
            return redirect()->route('MostrarPagamentoRestoFuncao',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'funcao' => $request->selectTipoConsulta]);
        }

        public function MostrarPagamentoRestoFuncao($datainicio, $datafim, $funcao)
        { 
            $funcao=Auxiliar::desajusteUrl($funcao);       
            if (($funcao == "todos") || ($funcao == "Todos")){
                $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
                $dadosDb->selectRaw('Funcao, sum(ValorPago) as ValorPago');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Funcao');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Funções', 'Valor Pago'];
                $Navegacao = array(
                        array('url' => '/despesas/restosapagar/funcoes' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $funcao)
                );
            }
            else{
                $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
                $dadosDb->selectRaw('Orgao,Funcao, sum(ValorPago) as ValorPago');            
                $dadosDb->where('Funcao', '=', $funcao);
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgão', 'Valor Pago'];
                $Navegacao = array(            
                        array('url' => '/despesas/restosapagar/funcoes' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarPagamentoRestoFuncao', ['datainicio' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                        array('url' => '#' ,'Descricao' => $funcao)
                );
            }
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/restos.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarPagamentoRestoFuncaoOrgao($datainicio, $datafim, $funcao,$orgao){   
            $funcao=Auxiliar::desajusteUrl($funcao);
            $orgao=Auxiliar::desajusteUrl($orgao);
            $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
            $dadosDb->selectRaw('Beneficiario,Orgao,Funcao, sum(ValorPago) as ValorPago');
            $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Funcao','=',$funcao);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->groupBy('Beneficiario'); 
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Fornecedores','Valor Pago'];
            $Navegacao = array(            
                array('url' => '/despesas/restosapagar/funcoes' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarPagamentoRestoFuncao', ['datainicio' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                array('url' => route('MostrarPagamentoRestoFuncao', ['datainicio' => $datainicio, 'datafim' => $datafim, 'funcao' => Auxiliar::ajusteUrl($funcao)]),'Descricao' => $funcao),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota = false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/restos.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarPagamentoRestoFuncaoOrgaoFornecedor($datainicio, $datafim,$funcao,$orgao,$fornecedor)
        {
            $funcao=Auxiliar::desajusteUrl($funcao);
            $orgao=Auxiliar::desajusteUrl($orgao);
            $fornecedor=Auxiliar::desajusteUrl($fornecedor);
            $dadosDb = PagamentoRestoModel::select('PagamentoID','UnidadeGestora','DataPagamento','ElemDespesa','NotaPagamento','ValorPago');
            $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->where('Beneficiario','=',$fornecedor);
            $dadosDb->where('Funcao','=',$funcao);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Pagamento','Unidade Gestora','Elementos','Nota de Pagamento','Valor Pago'];
            $Navegacao = array(            
                array('url' => '/despesas/restosapagar/funcoes' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarPagamentoRestoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                array('url' => route('MostrarPagamentoRestoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => Auxiliar::ajusteUrl($funcao)]),'Descricao' => $funcao),
                array('url' => route('MostrarPagamentoRestoFuncaoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => $funcao, 'orgao' =>Auxiliar::ajusteUrl($orgao)]),'Descricao' => $orgao),
                array('url' =>'#','Descricao' =>$fornecedor)
            );
            $nota = true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/restos.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }
    //Fim Funcao

    //Elemento de Despesa
        public function FiltroElementoDespesa()
        {
            $dadosDb = PagamentoRestoModel::orderBy('ElemDespesa');
            $dadosDb->select('ElemDespesa');
            $dadosDb->distinct('ElemDespesa');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->ElemDespesa);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/restos.filtroElementoDespesa', compact('dadosDb'));
        }

        public function elementoDespesa(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);
            $request->selectTipoConsulta=Auxiliar::ajusteUrl($request->selectTipoConsulta);
            return redirect()->route('MostrarPagamentoRestoElemento',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'elemento' => $request->selectTipoConsulta]);
        }

        public function MostrarPagamentoRestoElemento($datainicio, $datafim, $elemento){ 
            $elemento=Auxiliar::desajusteUrl($elemento);       
            if (($elemento == "todos") || ($elemento == "Todos")){
                $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
                $dadosDb->selectRaw('ElemDespesa, sum(ValorPago) as ValorPago');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('ElemDespesa');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Elementos', 'Valor Pago'];
                $Navegacao = array(
                        array('url' => '/despesas/restosapagar/elementos' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $elemento)
                );
            }
            else{
                $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
                $dadosDb->selectRaw('Orgao,ElemDespesa, sum(ValorPago) as ValorPago');
                $dadosDb->where('ElemDespesa', '=', $elemento);
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgão', 'Valor Pago'];
                $Navegacao = array(            
                        array('url' => '/despesas/restosapagar/elementos' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarPagamentoRestoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => 'todos']),'Descricao' => 'Elementos'),
                        array('url' => '#' ,'Descricao' => $elemento)
                );
            }
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/restos.tabelaElementoDespesa', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarPagamentoRestoElementoOrgao($datainicio, $datafim, $elemento,$orgao){  
            $elemento=Auxiliar::desajusteUrl($elemento);      
            $dadosDb = PagamentoRestoModel::orderBy('DataPagamento');
            $dadosDb->select('PagamentoID','UnidadeGestora','DataPagamento','Beneficiario','NotaPagamento','ValorPago');
            $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->where('ElemDespesa','=',$elemento);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Pagamento','Unidade Gestora','Fornecedores','Nota de Pagamento','Valor Pago'];
            $Navegacao = array(            
                array('url' => '/despesas/restosapagar/elementos' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarPagamentoRestoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => 'todos']),'Descricao' => 'Elementos'),
                array('url' => route('MostrarPagamentoRestoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => Auxiliar::ajusteUrl($elemento)]),'Descricao' => $elemento),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota = true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/restos.tabelaElementoDespesa', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

    //Fim Elemento despesa

    //Nota
        public function nota(Request $request)
        {
            if (($request->txtNumeroNota != '') && ($request->txtNumeroNota != null))
            {
                return redirect()->route('MostarPagamentoRestoNota',
                ['numeroNota' => $request->txtNumeroNota,
                'ano' =>$request->selectAno]);
            }
            else
            {
                return redirect()->back()->with('message', 'O número da nota não pode ser em branco');
            }

         
        }

        public function MostrarPagamentoRestoNota($numeroNota,$ano){        
            $dadosDb = PagamentoRestoModel::orderBy('DataPagamento','desc');
            $dadosDb->select('PagamentoID','UnidadeGestora','DataPagamento','Orgao','Beneficiario','ValorPago','NotaPagamento');
            
            if (($ano == "todos") || ($ano == "Todos"))
            {
                $dadosDb->where('NotaPagamento','=',$numeroNota);
            }
            else
            {
                $dadosDb->where('NotaPagamento','=',$numeroNota);
                $dadosDb->where('AnoExercicio','=',$ano);
            }
         
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Pagamento','Unidade Gestora','Nota de Pagamento','Órgão','Fornecedores','Valor Pago'];
            $Navegacao = array(
                array('url' => '/despesas/restosapagar/nota' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $numeroNota)
            );
            $datainicio='';
            $datafim='';
            $nota=true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/restos.tabelaNota', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }
    //Fim Nota

    public function ShowPagamentoResto(){
        $PagamentoID =  isset($_GET['PagamentoID']) ? $_GET['PagamentoID'] : 'null';               

        $dadosDb = PagamentoRestoModel::where('PagamentoID', '=', $PagamentoID);        
        $dadosDb = $dadosDb->get();    
        $dadosDb = Auxiliar::ModificarCPF_CNPJ($dadosDb);                   
        return json_encode($dadosDb);
    }
}