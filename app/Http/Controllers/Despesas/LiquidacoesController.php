<?php

namespace App\Http\Controllers\Despesas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesas\LiquidacaoModel;
use App\Auxiliar as Auxiliar;

class LiquidacoesController extends Controller
{    
    //Orgao
        public function FiltroOrgao(){
            $dadosDb = LiquidacaoModel::orderBy('UnidadeGestora');
            $dadosDb->select('UnidadeGestora');
            $dadosDb->distinct('UnidadeGestora');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->UnidadeGestora);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/liquidacoes.filtroOrgao', compact('dadosDb'));
        }

        public function orgao(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarLiquidacaoOrgao',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'orgao' => $request->selectTipoConsulta]);
        }

        public function MostrarLiquidacaoOrgao($datainicio, $datafim, $orgao){        
            if (($orgao == "todos") || ($orgao == "Todos")){
                $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
                $dadosDb->selectRaw('UnidadeGestora, sum(ValorLiquidado) as ValorLiquidado');
                $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('UnidadeGestora');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Órgãos', 'Valor Liquidado'];
                $Navegacao = array(
                        array('url' => '/despesas/liquidacoes/orgaos' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $orgao)
                );
            }
            else{
                $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
                $dadosDb->selectRaw('UnidadeGestora,Beneficiario, sum(ValorLiquidado) as ValorLiquidado');            
                $dadosDb->where('UnidadeGestora', '=', $orgao);
                $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Fornecedor', 'Valor Liquidado'];
                $Navegacao = array(            
                        array('url' => '/despesas/liquidacoes/orgaos' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarLiquidacaoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                        array('url' => '#' ,'Descricao' => $orgao)
                );
            }
            $nota=false;

            return View('despesas/liquidacoes.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota'));
        }

        public function MostrarLiqudacaoOrgaoFornecedor($datainicio, $datafim, $orgao,$beneficiario){ 
            $beneficiario=Auxiliar::desajusteUrl($beneficiario); 
            $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
            $dadosDb->select('LiquidacaoID','DataLiquidacao','ElemDespesa','NotaLiquidacao','ValorLiquidado');
            $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('UnidadeGestora','=',$orgao);
            $dadosDb->where('Beneficiario','=',$beneficiario);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Liquidação','Elemento','Nota de Liquidação','Valor Liquidado'];
            $Navegacao = array(            
                array('url' => '/despesas/liquidacoes/orgaos' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarLiquidacaoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Órgãos'),
                array('url' => route('MostrarLiquidacaoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => $orgao]),'Descricao' => $orgao),
                array('url' =>'#','Descricao' =>$beneficiario)
            );
            $nota = false;
            
            return View('despesas/liquidacoes.tabelaOrgao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota'));
        }
    //Fim Orgao

    //Fornecedor
        public function FiltroFornecedor(){
            $dadosDb = LiquidacaoModel::orderBy('Beneficiario');
            $dadosDb->select('Beneficiario');
            $dadosDb->distinct('Beneficiario');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->Beneficiario);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/liquidacoes.filtroFornecedor', compact('dadosDb'));
        }

        public function fornecedor(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarLiquidacaoFornecedor',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'fornecedor' => $request->selectTipoConsulta]);
        }

        public function MostrarLiquidacaoFornecedor($datainicio, $datafim, $fornecedor){        
            if (($fornecedor == "todos") || ($fornecedor == "Todos")){
                $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
                $dadosDb->selectRaw('Beneficiario, sum(ValorLiquidado) as ValorLiquidado');
                $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Fornecedor', 'Valor Liquidado'];
                $Navegacao = array(
                        array('url' => '/despesas/liquidacoes/fornecedor' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $fornecedor)
                );
            }
            else{
                $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
                $dadosDb->selectRaw('UnidadeGestora,Beneficiario, sum(ValorLiquidado) as ValorLiquidado');            
                $dadosDb->where('Beneficiario', '=', $fornecedor);
                $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Beneficiario');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgãos', 'Valor Liquidado'];
                $Navegacao = array(            
                        array('url' => '/despesas/liquidacoes/fornecedores' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarLiquidacaoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'fornecedor' => 'todos']),'Descricao' => 'Fornecedores'),
                        array('url' => '#' ,'Descricao' => $fornecedor)
                );
            }
            $nota=false;
            return View('despesas/liquidacoes.tabelaFornecedor', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota'));
        }

        public function MostrarLiquidacaoFornecedorOrgao($datainicio, $datafim, $beneficiario,$orgao){        
            $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
            $dadosDb->select('LiquidacaoID','DataLiquidacao','ElemDespesa','NotaLiquidacao','ValorLiquidado');
            $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('UnidadeGestora','=',$orgao);
            $dadosDb->where('Beneficiario','=',$beneficiario);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Liquidação','Elemento','Nota de Liquidação','Valor Liquidado'];
            $Navegacao = array(            
                array('url' => '/despesas/liquidacoes/fornecedores' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarLiquidacaoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => 'todos']),'Descricao' => 'Fornecedores'),
                array('url' => route('MostrarLiquidacaoFornecedor', ['dataini' => $datainicio, 'datafim' => $datafim, 'orgao' => $beneficiario]),'Descricao' => $beneficiario),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota = false;
            
            return View('despesas/liquidacoes.tabelaFornecedor', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota'));
        }
    //Fim Fornecedor    

    //Funcao
        public function FiltroFuncao(){
            $dadosDb = LiquidacaoModel::orderBy('Funcao');
            $dadosDb->select('Funcao');
            $dadosDb->distinct('Funcao');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->Funcao);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/liquidacoes.filtroFuncao', compact('dadosDb'));
        }

        public function funcao(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarLiquidacaoFuncao',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'funcao' => $request->selectTipoConsulta]);
        }

        public function MostrarLiquidacaoFuncao($datainicio, $datafim, $funcao)
        { 
            $funcao=Auxiliar::desajusteUrl($funcao);       
            if (($funcao == "todos") || ($funcao == "Todos")){
                $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
                $dadosDb->selectRaw('Funcao, sum(ValorLiquidado) as ValorLiquidado');
                $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Funcao');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Funções', 'Valor Liquidado'];
                $Navegacao = array(
                        array('url' => '/despesas/liquidacoes/funcoes' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $funcao)
                );
            }
            else{
                $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
                $dadosDb->selectRaw('UnidadeGestora,Funcao, sum(ValorLiquidado) as ValorLiquidado');            
                $dadosDb->where('Funcao', '=', $funcao);
                $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('Funcao');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgãos', 'Valor Liquidado'];
                $Navegacao = array(            
                        array('url' => '/despesas/liquidacoes/funcoes' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarLiquidacaoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                        array('url' => '#' ,'Descricao' => $funcao)
                );
            }
            $nota=false;
            return View('despesas/liquidacoes.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota'));
        }

        public function MostrarLiquidacaoFuncaoOrgao($datainicio, $datafim, $funcao,$orgao){   
            $funcao=Auxiliar::desajusteUrl($funcao);
            $orgao=Auxiliar::desajusteUrl($orgao);
            $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
            $dadosDb->selectRaw('Beneficiario,UnidadeGestora,Funcao, sum(ValorLiquidado) as ValorLiquidado');
            $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('Funcao','=',$funcao);
            $dadosDb->where('UnidadeGestora','=',$orgao);
            $dadosDb->groupBy('Beneficiario'); 
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Fornecedor','Valor Liquidado'];
            $Navegacao = array(            
                array('url' => '/despesas/liquidacoes/funcoes' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarLiquidacaoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                array('url' => route('MostrarLiquidacaoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => $funcao]),'Descricao' => $funcao),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota = false;
            
            return View('despesas/liquidacoes.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota'));
        }

        public function MostrarLiquidacaoFuncaoOrgaoFornecedor($datainicio, $datafim,$funcao,$orgao,$fornecedor)
        {
            $funcao=Auxiliar::desajusteUrl($funcao);
            $orgao=Auxiliar::desajusteUrl($orgao);
            $fornecedor=Auxiliar::desajusteUrl($fornecedor);
            $dadosDb = LiquidacaoModel::select('LiquidacaoID','DataLiquidacao','ElemDespesa','NotaLiquidacao','ValorLiquidado');
            $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('UnidadeGestora','=',$orgao);
            $dadosDb->where('Beneficiario','=',$fornecedor);
            $dadosDb->where('Funcao','=',$funcao);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Liquidação','Elemento','Nota de Liquidação','Valor Liquidado'];
            $Navegacao = array(            
                array('url' => '/despesas/liquidacoes/funcoes' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarLiquidacaoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => 'todos']),'Descricao' => 'Funções'),
                array('url' => route('MostrarLiquidacaoFuncao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => $funcao]),'Descricao' => $funcao),
                array('url' => route('MostrarLiquidacaoFuncaoOrgao', ['dataini' => $datainicio, 'datafim' => $datafim, 'funcao' => $funcao, 'orgao' =>$orgao]),'Descricao' => $orgao),
                array('url' =>'#','Descricao' =>$fornecedor)
            );
            $nota = false;
            
            return View('despesas/liquidacoes.tabelaFuncao', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota'));
        }
    //Fim Funcao

    //Elemento de Despesa
        public function FiltroElementoDespesa()
        {
            $dadosDb = LiquidacaoModel::orderBy('ElemDespesa');
            $dadosDb->select('ElemDespesa');
            $dadosDb->distinct('ElemDespesa');
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->ElemDespesa);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('despesas/liquidacoes.filtroElementoDespesa', compact('dadosDb'));
        }

        public function elementoDespesa(Request $request)
        {
            //trocar das datas o "/" por "-".
            $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
            $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

            return redirect()->route('MostrarLiquidacaoElemento',
                                    ['datainicio' => $request->datetimepickerDataInicio, 
                                        'datafim' => $request->datetimepickerDataFim,
                                        'elemento' => $request->selectTipoConsulta]);
        }

        public function MostrarLiquidacaoElemento($datainicio, $datafim, $elemento){        
            if (($elemento == "todos") || ($elemento == "Todos")){
                $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
                $dadosDb->selectRaw('ElemDespesa, sum(ValorLiquidado) as ValorLiquidado');
                $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('ElemDespesa');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Elementos', 'Valor Liquidado'];
                $Navegacao = array(
                        array('url' => '/despesas/liquidacoes/elementos' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $elemento)
                );
            }
            else{
                $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
                $dadosDb->selectRaw('UnidadeGestora,ElemDespesa, sum(ValorLiquidado) as ValorLiquidado');
                $dadosDb->where('ElemDespesa', '=', $elemento);
                $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('UnidadeGestora');                                   
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Órgãos', 'Valor Liquidado'];
                $Navegacao = array(            
                        array('url' => '/despesas/liquidacoes/elementos' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarLiquidacaoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => 'todos']),'Descricao' => 'Elementos'),
                        array('url' => '#' ,'Descricao' => $elemento)
                );
            }
            $nota=false;
            return View('despesas/liquidacoes.tabelaElementoDespesa', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota'));
        }

        public function MostrarLiquidacaoElementoOrgao($datainicio, $datafim, $elemento,$orgao){        
            $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao');
            $dadosDb->select('LiquidacaoID','DataLiquidacao','Beneficiario','NotaLiquidacao','ValorLiquidado');
            $dadosDb->whereBetween('DataLiquidacao', [Auxiliar::AjustarData($datainicio), Auxiliar::AjustarData($datafim)]);
            $dadosDb->where('UnidadeGestora','=',$orgao);
            $dadosDb->where('ElemDespesa','=',$elemento);
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Liquidação','Fornecedores','Nota de Liquidação','Valor Liquidado'];
            $Navegacao = array(            
                array('url' => '/despesas/liquidacoes/elemento' ,'Descricao' => 'Filtro'),
                array('url' => route('MostrarLiquidacaoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => 'todos']),'Descricao' => 'Elementos'),
                array('url' => route('MostrarLiquidacaoElemento', ['dataini' => $datainicio, 'datafim' => $datafim, 'elemento' => $elemento]),'Descricao' => $elemento),
                array('url' =>'#','Descricao' =>$orgao)
            );
            $nota = false;
            
            return View('despesas/liquidacoes.tabelaElementoDespesa', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota'));
        }

    //Fim Elemento despesa

    //Nota
        public function nota(Request $request)
        {
            if (($request->txtNumeroNota != '') && ($request->txtNumeroNota != null))
            {
                return redirect()->route('MostarLiquidacaoNota',
                ['numeroNota' => $request->txtNumeroNota,
                'ano' =>$request->selectAno]);
            }
            else
            {
                return redirect()->back()->with('message', 'O número da nota não pode ser em branco');
            }

         
        }

        public function MostrarLiquidacaoNota($numeroNota,$ano){        
            $dadosDb = LiquidacaoModel::orderBy('DataLiquidacao','desc');
            $dadosDb->select('LiquidacaoID','DataLiquidacao','UnidadeGestora','Beneficiario','ValorLiquidado','NotaLiquidacao');
            
            if (($ano == "todos") || ($ano == "Todos"))
            {
                $dadosDb->where('NotaLiquidacao','=',$numeroNota);
            }
            else
            {
                $dadosDb->where('NotaLiquidacao','=',$numeroNota);
                $dadosDb->where('AnoExercicio','=',$ano);
            }
         
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data de Liquidação', 'Nota de Liquidação','Órgãos','Fornecedores','Valor Liquidado'];
            $Navegacao = array(
                array('url' => '/despesas/liquidacoes/nota' ,'Descricao' => 'Filtro'),
                array('url' => '#' ,'Descricao' => $numeroNota)
            );
            $datainicio='';
            $datafim='';
            $nota=true;
            return View('despesas/liquidacoes.tabelaNota', compact('dadosDb', 'colunaDados', 'Navegacao','datainicio','datafim','nota'));
        }
    //Fim Nota

    public function ShowLiquidacao(){
        $LiquidacaoID =  isset($_GET['LiquidacaoID']) ? $_GET['LiquidacaoID'] : 'null';               

        $dadosDb = LiquidacaoModel::where('LiquidacaoID', '=', $LiquidacaoID);        
        $dadosDb = $dadosDb->get();    
        $dadosDb = Auxiliar::ModificarCPF_CNPJ($dadosDb);                   
        return json_encode($dadosDb);
    }

}