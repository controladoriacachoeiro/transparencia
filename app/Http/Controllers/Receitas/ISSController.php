<?php

namespace App\Http\Controllers\Receitas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receitas\ISSModel;
use App\Auxiliar as Auxiliar;
use App\Models\Auxiliares\AuxiliarLancamentoModel as AuxiliarLancamentoModel;

class ISSController extends Controller
{   
    //Por Serviço 
        //GET
        public function FiltroServico(){
            $dadosDb = AuxiliarLancamentoModel::orderBy('DescricaoServico');
            $dadosDb->select('DescricaoServico');
            $dadosDb->whereNotNull('DescricaoServico');        
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->DescricaoServico);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('receitas/lancamentos.filtroServico', compact('dadosDb'));
        }

        //POST
        public function servico(Request $request){                          
            if (($request->selectTipoConsulta != '') && ($request->selectTipoConsulta != null)) {

                //trocar das datas o "/" por "-".
                $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
                $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

                return redirect()->route('MostrarLancamentosServico',
                                        ['dataini' => $request->datetimepickerDataInicio, 
                                            'datafim' => $request->datetimepickerDataFim,
                                            'servico' => $request->selectTipoConsulta]);            
            }
            return view('receitas/lancamentos.filtroServico');
        }

        //GET
        //Se o valor for 'todos', será enviado para o nível 1 e
        //se o valor for diferente de 'todos' será enviado para o nível 2
        //mas referenciando no 'navegação' o nível 1. Ambos retornam a mesma view.
        public function MostrarLancamentosServico($dataini, $datafim, $servico){        
            if (($servico == "todos") || ($servico == "Todos")){
                $dadosDb = ISSModel::orderBy('DescricaoServico');
                $dadosDb->selectRaw('DescricaoServico, sum(ValorISS) as ValorISS');
                $dadosDb->whereBetween('DataNFSe', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('DescricaoServico');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Serviço', 'Valor Lançado'];
                $Navegacao = array(
                        array('url' => '/receitas/lancamentos/servico' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $servico)
                );
                $nivel = 1;
            }
            else{
                $dadosDb = ISSModel::orderBy('DescricaoServico');
                $dadosDb->selectRaw('DescricaoServico, CategoriaEconomica, sum(ValorISS) as ValorISS');
                $dadosDb->where('DescricaoServico', '=', $servico);
                $dadosDb->whereBetween('DataNFSe', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);            
                $dadosDb->groupBy('CategoriaEconomica');
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Categoria Econômica', 'Valor Lançado'];
                $Navegacao = array(            
                        array('url' => '/receitas/lancamentos/servico' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarLancamentosServico', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => 'todos']), 'Descricao' => 'Serviços'),
                        array('url' => '#' ,'Descricao' => $servico)
                );
                $nivel = 2;
            }
                
            return View('receitas/lancamentos.tabelaServico', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel'));
        }

        //GET
        public function MostrarLancamentosServicoCategoria($dataini, $datafim, $servico, $categoria){
            $dadosDb = ISSModel::orderBy('Especie');
            $dadosDb->selectRaw('DescricaoServico, CategoriaEconomica, Especie, Rubrica, sum(ValorISS) as ValorISS');            
            $dadosDb->where('DescricaoServico', '=', $servico);
            $dadosDb->where('CategoriaEconomica', '=', $categoria);
            $dadosDb->whereBetween('DataNFSe', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
            $dadosDb->groupBy('Especie');                                   
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Espécie', 'Rubrica', 'Valor Lançado'];
            $Navegacao = array(
                    array('url' => '/receitas/lancamentos/servico' ,'Descricao' => 'Filtro'),
                    array('url' => route('MostrarLancamentosServico', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => 'todos']),'Descricao' => 'Serviços'),
                    array('url' => route('MostrarLancamentosServico', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => $servico]),'Descricao' => $servico),
                    array('url' => '#' ,'Descricao' => $categoria)
            );
            $nivel = 3;

            return View('receitas/lancamentos.tabelaServico', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel'));
        }

        //GET
        public function MostrarLancamentosServicoCategoriaEspecie($dataini, $datafim, $servico, $categoria, $especie){
            $dadosDb = ISSModel::orderBy('Alinea');
            $dadosDb->selectRaw('IssID, DataNFSe, DescricaoServico, CategoriaEconomica, Especie, Rubrica, Alinea, Subalinea, ValorISS');            
            $dadosDb->where('DescricaoServico', '=', $servico);
            $dadosDb->where('CategoriaEconomica', '=', $categoria);
            $dadosDb->where('Especie', '=', $especie);
            $dadosDb->whereBetween('DataNFSe', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);                                           
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data do Lançamento', 'Alínea', 'Subalínea', 'Valor Lançado'];
            $Navegacao = array(
                    array('url' => '/receitas/lancamentos/servico' ,'Descricao' => 'Filtro'),
                    array('url' => route('MostrarLancamentosServico', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => 'todos']),'Descricao' => 'Serviços'),
                    array('url' => route('MostrarLancamentosServico', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => $servico]),'Descricao' => $servico),
                    array('url' => route('MostrarLancamentosServicoCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => $servico, 'categoria' => $categoria]),'Descricao' => $categoria),
                    array('url' => '#' ,'Descricao' => $especie)
            );
            $nivel = 4;

            return View('receitas/lancamentos.tabelaServico', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel'));
        }



    //Fim Por Serviço


    //Por Categoria
        //GET
        public function FiltroCategoria(){
            $dadosDb = AuxiliarLancamentoModel::orderBy('DescricaoServico');
            $dadosDb->select('DescricaoServico');
            $dadosDb->whereNotNull('DescricaoServico');        
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->DescricaoServico);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('receitas/lancamentos.filtroServico', compact('dadosDb'));
        }
    //Fim Por Categoria 


    //GET
    //Usado para enviar via Ajax        
    public function ShowReceitaLancada(){
        $IssID =  isset($_GET['IssID']) ? $_GET['IssID'] : 'null';               

        $dadosDb = ISSModel::where('IssID', '=', $IssID);        
        $dadosDb = $dadosDb->get();                       

        return json_encode($dadosDb);
    }
}