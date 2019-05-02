<?php

namespace App\Http\Controllers\Despesas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesas\PagamentoModel;
use App\Auxiliar as Auxiliar;

class PagamentosController extends Controller
{    
    //Orgao
        public function FiltroOrgao(){
            $dadosDb = PagamentoModel::orderBy('Orgao');
            $dadosDb->select('Orgao');
            $dadosDb->distinct('Orgao');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->Orgao);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/pagamentos.filtroOrgao', compact('dadosDb'));
        }

        public function orgao(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarPagamentoOrgao',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'orgao' => $request->selectTipoConsulta]);
        }

        public function MostrarPagamentoOrgao($datainicio, $datafim, $orgao){
            if (($orgao == "todos") || ($orgao == "Todos")){
                $dadosDb = PagamentoModel::orderBy('Orgao');
                $dadosDb->selectRaw('Orgao, sum(ValorPago) as ValorPago');
                $dadosDb->where('Orgao', '<>', 'NULL');
                $dadosDb->where('Beneficiario', '<>', 'NULL');
                $dadosDb->where('Funcao', '<>', 'NULL');
                $dadosDb->where('ElemDespesa', '<>', 'NULL');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Órgão', 'Valor Pago'];
                $Navegacao = array(
                        array('url' => '/despesas/pagamentos/orgaos' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $orgao)
                );
            }
            else{
                $dadosDb = PagamentoModel::orderBy('Beneficiario');
                $dadosDb->selectRaw('Orgao, Beneficiario, sum(ValorPago) as ValorPago');            
                $dadosDb->where('Orgao', '=', $orgao);
                $dadosDb->where('Beneficiario', '<>', 'NULL');
                $dadosDb->where('Funcao', '<>', 'NULL');
                $dadosDb->where('ElemDespesa', '<>', 'NULL');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Fornecedores', 'Valor Pago'];
                $Navegacao = array(            
                        array('url' => '/despesas/pagamento/orgaos' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarPagamentoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                        array('url' => '#' ,'Descricao' => $orgao)
                );
            }
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/pagamentos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarPagamentoOrgaoFornecedor($datainicio, $datafim, $orgao,$beneficiario){ 
            $beneficiario=Auxiliar::desajusteUrl($beneficiario); 
            $dadosDb = PagamentoModel::orderBy('DataPagamento', 'DESC');
            $dadosDb->select('PagamentoID','UnidadeGestora','DataPagamento','ElemDespesa','NotaPagamento','ValorPago');
            $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->where('Beneficiario','=',$beneficiario);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Pagamento','Unidade Gestora','Elemento','Nota de Pagamento','Valor Pago'];
            $Navegacao = array(            
                array('url' => '/despesas/liquidacoes/orgaos' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarPagamentoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                array('url' => route('MostrarPagamentoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => $orgao]),'Descricao' => $orgao),
                array('url' =>'#','Descricao' =>$beneficiario)
            );
            $nota = true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/pagamentos.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }
    //Fim Orgao

    //Fornecedor
        public function FiltroFornecedor(){
            $dadosDb = PagamentoModel::orderBy('Beneficiario');
            $dadosDb->select('Beneficiario');
            $dadosDb->distinct('Beneficiario');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->Beneficiario);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/pagamentos.filtroFornecedor', compact('dadosDb'));
        }

        public function fornecedor(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);
            $request->selectTipoConsulta=Auxiliar::ajusteUrl($request->selectTipoConsulta);
            return redirect()->route('MostrarPagamentoFornecedor',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'fornecedor' => $request->selectTipoConsulta]);
        }

        public function MostrarPagamentoFornecedor($datainicio, $datafim, $fornecedor){
            $fornecedor=Auxiliar::desajusteUrl($fornecedor);
            if (($fornecedor == "todos") || ($fornecedor == "Todos")){
                $dadosDb = PagamentoModel::orderBy('Beneficiario');
                $dadosDb->selectRaw('Beneficiario, sum(ValorPago) as ValorPago');
                $dadosDb->where('Orgao', '<>', 'NULL');
                $dadosDb->where('Beneficiario', '<>', 'NULL');
                $dadosDb->where('Funcao', '<>', 'NULL');
                $dadosDb->where('ElemDespesa', '<>', 'NULL');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Fornecedores', 'Valor Pago'];
                $Navegacao = array(
                        array('url' => '/despesas/pagamentos/fornecedores' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $fornecedor)
                );
            } else{
                $dadosDb = PagamentoModel::orderBy('Orgao');
                $dadosDb->selectRaw('Orgao,Beneficiario, sum(ValorPago) as ValorPago');            
                $dadosDb->where('Beneficiario', '=', $fornecedor);
                $dadosDb->where('Orgao', '<>', 'NULL');
                $dadosDb->where('Funcao', '<>', 'NULL');
                $dadosDb->where('ElemDespesa', '<>', 'NULL');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgão', 'Valor Pago'];
                $Navegacao = array(            
                        array('url' => '/despesas/pagamentos/fornecedores' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarPagamentoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'fornecedor' => 'todos']),'Descricao' => 'Fornecedores'),
                        array('url' => '#' ,'Descricao' => $fornecedor)
                );
            }
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/pagamentos.tabelaFornecedor', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarPagamentoFornecedorOrgao($datainicio, $datafim, $beneficiario,$orgao){
            $beneficiario=Auxiliar::desajusteUrl($beneficiario);
            $dadosDb = PagamentoModel::orderBy('DataPagamento', 'DESC');
            $dadosDb->select('PagamentoID','UnidadeGestora','DataPagamento','ElemDespesa','NotaPagamento','ValorPago');
            $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->where('Beneficiario','=',$beneficiario);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Pagamento','Unidade Gestora','Elemento','Nota de Pagamento','Valor Pago'];
            $Navegacao = array(            
                array('url' => '/despesas/pagamentos/fornecedores' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarPagamentoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'fornecedor' => 'todos']),'Descricao' => 'Fornecedores'),
                array('url' => route('MostrarPagamentoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'fornecedor' => Auxiliar::ajusteUrl($beneficiario)]),'Descricao' => $beneficiario),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota = true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/pagamentos.tabelaFornecedor', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }
    //Fim Fornecedor    

    //Funcao
        public function FiltroFuncao(){
            $dadosDb = PagamentoModel::orderBy('Funcao');
            $dadosDb->select('Funcao');
            $dadosDb->distinct('Funcao');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->Funcao);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/pagamentos.filtroFuncao', compact('dadosDb'));
        }

        public function funcao(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);
            $request->selectTipoConsulta=Auxiliar::ajusteUrl($request->selectTipoConsulta);
            return redirect()->route('MostrarPagamentoFuncao',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'funcao' => $request->selectTipoConsulta]);
        }

        public function MostrarPagamentoFuncao($datainicio, $datafim, $funcao){
            $funcao=Auxiliar::desajusteUrl($funcao);
            if (($funcao == "todos") || ($funcao == "Todos")){
                $dadosDb = PagamentoModel::orderBy('Funcao');
                $dadosDb->selectRaw('Funcao, sum(ValorPago) as ValorPago');
                $dadosDb->where('Orgao', '<>', 'NULL');
                $dadosDb->where('Beneficiario', '<>', 'NULL');
                $dadosDb->where('Funcao', '<>', 'NULL');
                $dadosDb->where('ElemDespesa', '<>', 'NULL');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Funcao');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Funções', 'Valor Pago'];
                $Navegacao = array(
                        array('url' => '/despesas/pagamentos/funcoes' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $funcao)
                );
            } else{
                $dadosDb = PagamentoModel::orderBy('Orgao');
                $dadosDb->selectRaw('Orgao,Funcao, sum(ValorPago) as ValorPago');            
                $dadosDb->where('Funcao', '=', $funcao);
                $dadosDb->where('Orgao', '<>', 'NULL');
                $dadosDb->where('Beneficiario', '<>', 'NULL');
                $dadosDb->where('ElemDespesa', '<>', 'NULL');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgão', 'Valor Pago'];
                $Navegacao = array(            
                        array('url' => '/despesas/pagamento/funcoes' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarPagamentoFuncao', ['datainicio' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                        array('url' => '#' ,'Descricao' => $funcao)
                );
            }
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/pagamentos.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarPagamentoFuncaoOrgao($datainicio, $datafim, $funcao,$orgao){   
            $funcao=Auxiliar::desajusteUrl($funcao);
            $orgao=Auxiliar::desajusteUrl($orgao);
            $dadosDb = PagamentoModel::orderBy('Beneficiario');
            $dadosDb->selectRaw('Beneficiario,Orgao,Funcao, sum(ValorPago) as ValorPago');
            $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Funcao','=',$funcao);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->groupBy('Beneficiario'); 
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Fornecedores','Valor Pago'];
            $Navegacao = array(            
                array('url' => '/despesas/pagamentos/funcoes' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarPagamentoFuncao', ['datainicio' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                array('url' => route('MostrarPagamentoFuncao', ['datainicio' => $datainicio, 'datafim' => $datafim, 'funcao' => Auxiliar::ajusteUrl($funcao)]),'Descricao' => $funcao),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota = false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/pagamentos.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarPagamentoFuncaoOrgaoFornecedor($datainicio, $datafim,$funcao,$orgao,$fornecedor){
            $funcao=Auxiliar::desajusteUrl($funcao);
            $orgao=Auxiliar::desajusteUrl($orgao);
            $fornecedor=Auxiliar::desajusteUrl($fornecedor);
            $dadosDb = PagamentoModel::select('PagamentoID','UnidadeGestora','DataPagamento','ElemDespesa','NotaPagamento','ValorPago');
            $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->where('Beneficiario','=',$fornecedor);
            $dadosDb->where('Funcao','=',$funcao);
            $dadosDb->orderBy('DataPagamento', 'DESC');
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Pagamento','Unidade Gestora','Elemento','Nota de Pagamento','Valor Pago'];
            $Navegacao = array(            
                array('url' => '/despesas/pagamentos/funcoes' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarPagamentoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                array('url' => route('MostrarPagamentoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => Auxiliar::ajusteUrl($funcao)]),'Descricao' => $funcao),
                array('url' => route('MostrarPagamentoFuncaoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => Auxiliar::ajusteUrl($funcao), 'orgao' =>$orgao]),'Descricao' => $orgao),
                array('url' =>'#','Descricao' =>$fornecedor)
            );
            $nota = true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/pagamentos.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }
    //Fim Funcao

    //Elemento de Despesa
        public function FiltroElementoDespesa()
        {
            $dadosDb = PagamentoModel::orderBy('ElemDespesa');
            $dadosDb->select('ElemDespesa');
            $dadosDb->distinct('ElemDespesa');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->ElemDespesa);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/pagamentos.filtroElementoDespesa', compact('dadosDb'));
        }

        public function elementoDespesa(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);
            $request->selectTipoConsulta=Auxiliar::ajusteUrl($request->selectTipoConsulta);

            return redirect()->route('MostrarPagamentoElemento',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'elemento' => $request->selectTipoConsulta]);
        }

        public function MostrarPagamentoElemento($datainicio, $datafim, $elemento){
            $elemento=Auxiliar::desajusteUrl($elemento);
            if (($elemento == "todos") || ($elemento == "Todos")){
                $dadosDb = PagamentoModel::orderBy('ElemDespesa');
                $dadosDb->selectRaw('ElemDespesa, sum(ValorPago) as ValorPago');
                $dadosDb->where('Orgao', '<>', 'NULL');
                $dadosDb->where('Beneficiario', '<>', 'NULL');
                $dadosDb->where('Funcao', '<>', 'NULL');
                $dadosDb->where('ElemDespesa', '<>', 'NULL');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('ElemDespesa');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Elementos', 'Valor Pago'];
                $Navegacao = array(
                        array('url' => '/despesas/pagamentos/elementos' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $elemento)
                );
            } else{
                $dadosDb = PagamentoModel::orderBy('Orgao');
                $dadosDb->selectRaw('Orgao,ElemDespesa, sum(ValorPago) as ValorPago');
                $dadosDb->where('ElemDespesa', '=', $elemento);
                $dadosDb->where('Orgao', '<>', 'NULL');
                $dadosDb->where('Beneficiario', '<>', 'NULL');
                $dadosDb->where('Funcao', '<>', 'NULL');
                $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Orgao');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgão', 'Valor Pago'];
                $Navegacao = array(            
                        array('url' => '/despesas/pagamentos/elementos' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarPagamentoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => 'todos']),'Descricao' => 'Elementos'),
                        array('url' => '#' ,'Descricao' => $elemento)
                );
            }
            $nota=false;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/pagamentos.tabelaElementoDespesa', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

        public function MostrarPagamentoElementoOrgao($datainicio, $datafim, $elemento,$orgao){
            $elemento=Auxiliar::desajusteUrl($elemento);
            $dadosDb = PagamentoModel::orderBy('DataPagamento', 'DESC');
            $dadosDb->select('PagamentoID','UnidadeGestora','DataPagamento','Beneficiario','NotaPagamento','ValorPago');
            $dadosDb->whereBetween('DataPagamento', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Orgao','=',$orgao);
            $dadosDb->where('ElemDespesa','=',$elemento);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Pagamento','Unidade Gestora','Fornecedores','Nota de Pagamento','Valor Pago'];
            $Navegacao = array(            
                array('url' => '/despesas/pagamentos/elementos' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarPagamentoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => 'todos']),'Descricao' => 'Elementos'),
                array('url' => route('MostrarPagamentoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => Auxiliar::ajusteUrl($elemento)]),'Descricao' => $elemento),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota = true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/pagamentos.tabelaElementoDespesa', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }

    //Fim Elemento despesa

    //Nota
        public function nota(Request $request)
        {
            if (($request->txtNumeroNota != '') && ($request->txtNumeroNota != null))
            {
                return redirect()->route('MostarPagamentoNota',
                ['numeroNota' => $request->txtNumeroNota,
                'ano' =>$request->selectAno]);
            }
            else
            {
                return redirect()->back()->with('message', 'O número da nota não pode ser em branco');
            }

         
        }

        public function MostrarPagamentoNota($numeroNota,$ano){        
            $dadosDb = PagamentoModel::orderBy('DataPagamento','desc');
            $dadosDb->select('PagamentoID','UnidadeGestora','DataPagamento','Orgao','Beneficiario','ValorPago','NotaPagamento');
            $dadosDb->where('Orgao', '<>', 'NULL');
            $dadosDb->where('Beneficiario', '<>', 'NULL');
            $dadosDb->where('Funcao', '<>', 'NULL');
            $dadosDb->where('ElemDespesa', '<>', 'NULL');

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
                array('url' => '/despesas/pagamentos/nota' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $numeroNota)
            );
            $datainicio='';
            $datafim='';
            $nota=true;
            $soma=Auxiliar::SomarCampo($dadosDb,'ValorPago');
            return View('despesas/pagamentos.tabelaNota', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota','soma'));
        }
    //Fim Nota

    public function ShowPagamento(){
        $PagamentoID =  isset($_GET['PagamentoID']) ? $_GET['PagamentoID'] : 'null';               

        $dadosDb = PagamentoModel::where('PagamentoID', '=', $PagamentoID);        
        $dadosDb = $dadosDb->get();    
        $dadosDb = Auxiliar::ModificarCPF_CNPJ($dadosDb);                   
        return json_encode($dadosDb);
    }
}