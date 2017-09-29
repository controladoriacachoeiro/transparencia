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
                $dadosDb = ISSModel::orderBy('DataNFSe');
                $dadosDb->selectRaw('DataNFSe, DescricaoServico, sum(ValorISS) as ValorISS');
                $dadosDb->where('DescricaoServico', '=', $servico);
                $dadosDb->whereBetween('DataNFSe', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);            
                $dadosDb->groupBy('DataNFSe');
                $dadosDb = $dadosDb->get();                 
                $colunaDados = ['Data do Lançamento', 'Valor Lançado'];
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
        //Usado para enviar via Ajax        
        public function ShowReceitaLancadaServico(){
            $DataNFSe =  isset($_GET['DataNFSe']) ? $_GET['DataNFSe'] : 'null';
            $DescricaoServico = isset($_GET['DescricaoServico']) ? $_GET['DescricaoServico'] : 'null';                       
            
            $dadosDb = ISSModel::selectRaw('DataNFSe, DescricaoServico, sum(ValorISS) as ValorISS, sum(Quantidade) as Quantidade, 
                CategoriaEconomica, Origem, Especie, Rubrica, Alinea, Subalinea');             
            $dadosDb->where('DataNFSe', '=', $DataNFSe);
            $dadosDb->where('DescricaoServico', '=', $DescricaoServico);
            $dadosDb = $dadosDb->get();                       

            return json_encode($dadosDb);
        }

        // //GET
        // public function MostrarLancamentosServicoDia($dataini, $datafim, $servico, $dia){
        //     $dadosDb = ISSModel::orderBy('DataNFSe');
        //     $dadosDb->selectRaw('IssID, DataNFSe, DescricaoServico, ValorISS');            
        //     $dadosDb->where('DescricaoServico', '=', $servico);            
        //     $dadosDb->where('DataNFSe', '=', $dia);            
        //     $dadosDb = $dadosDb->get();
        //     $colunaDados = ['Data do Lançamento', 'Valor Lançado'];
        //     $Navegacao = array(
        //             array('url' => '/receitas/lancamentos/servico' ,'Descricao' => 'Filtro'),
        //             array('url' => route('MostrarLancamentosServico', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => 'todos']),'Descricao' => 'Serviços'),
        //             array('url' => route('MostrarLancamentosServico', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => $servico]),'Descricao' => $servico),
        //             array('url' => '#' ,'Descricao' => Auxiliar::DesajustarDataComBarra($dia))
        //     );
        //     $nivel = 3;

        //     return View('receitas/lancamentos.tabelaServico', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel'));
        // }
    //Fim Por Serviço


    //Por Categoria
        //GET
        public function FiltroCategoria(){
            $dadosDb = AuxiliarLancamentoModel::orderBy('CategoriaEconomica');
            $dadosDb->select('CategoriaEconomica');
            $dadosDb->whereNotNull('CategoriaEconomica');        
            $dadosDb = $dadosDb->get();

            $arrayDataFiltro =[];
            
            foreach ($dadosDb as $valor) {
                array_push($arrayDataFiltro, $valor->CategoriaEconomica);
            }

            $arrayDataFiltro = json_encode($arrayDataFiltro);
            $dadosDb = $arrayDataFiltro;        
                                    
            return View('receitas/lancamentos.filtroCategoria', compact('dadosDb'));
        }

        //POST
        public function categoria(Request $request){                          
            if (($request->selectTipoConsulta != '') && ($request->selectTipoConsulta != null)) {

                //trocar das datas o "/" por "-".
                $request->datetimepickerDataInicio = str_replace("/", "-", $request->datetimepickerDataInicio);
                $request->datetimepickerDataFim = str_replace("/", "-", $request->datetimepickerDataFim);

                return redirect()->route('MostrarLancamentosCategoria',
                                        ['dataini' => $request->datetimepickerDataInicio, 
                                            'datafim' => $request->datetimepickerDataFim,
                                            'categoria' => $request->selectTipoConsulta]);            
            }
            return view('receitas/lancamentos.filtroCategoria');
        }

        //GET
        //Se o valor for 'todos', será enviado para o nível 1 e
        //se o valor for diferente de 'todos' será enviado para o nível 2
        //mas referenciando no 'navegação' o nível 1. Ambos retornam a mesma view.
        public function MostrarLancamentosCategoria($dataini, $datafim, $categoria){        
            if (($categoria == "todos") || ($categoria == "Todos")){
                $dadosDb = ISSModel::orderBy('CategoriaEconomica');
                $dadosDb->selectRaw('CategoriaEconomica, sum(ValorISS) as ValorISS');
                $dadosDb->whereBetween('DataNFSe', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('CategoriaEconomica');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Categoria Econômica', 'Valor Lançado'];
                $Navegacao = array(
                        array('url' => '/receitas/lancamentos/categoria' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $categoria)
                );
                $nivel = 1;
            }
            else{
                $dadosDb = ISSModel::orderBy('DataNFSe');
                $dadosDb->selectRaw('DataNFSe, CategoriaEconomica, sum(ValorISS) as ValorISS');
                $dadosDb->where('CategoriaEconomica', '=', $categoria);
                $dadosDb->whereBetween('DataNFSe', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);            
                $dadosDb->groupBy('DataNFSe');
                $dadosDb = $dadosDb->get();                 
                $colunaDados = ['Dia', 'Valor Lançado'];
                $Navegacao = array(            
                        array('url' => '/receitas/lancamentos/categoria' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarLancamentosCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'categoria' => 'todos']), 'Descricao' => 'Categorias'),
                        array('url' => '#' ,'Descricao' => $categoria)
                );
                $nivel = 2;
            }
                
            return View('receitas/lancamentos.tabelaCategoria', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel'));
        }

        //GET
        public function MostrarLancamentosCategoriaDia($dataini, $datafim, $categoria, $dia){
            $dadosDb = ISSModel::orderBy('DataNFSe');
            $dadosDb->selectRaw('IssID, DataNFSe, CategoriaEconomica, ValorISS');            
            $dadosDb->where('CategoriaEconomica', '=', $categoria);            
            $dadosDb->where('DataNFSe', '=', $dia);            
            $dadosDb = $dadosDb->get();
            $colunaDados = ['Data do Lançamento', 'Valor Lançado'];
            $Navegacao = array(
                    array('url' => '/receitas/lancamentos/categoria' ,'Descricao' => 'Filtro'),
                    array('url' => route('MostrarLancamentosCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'categoria' => 'todos']),'Descricao' => 'Categorias'),
                    array('url' => route('MostrarLancamentosCategoria', ['dataini' => $dataini, 'datafim' => $datafim, 'categoria' => $categoria]),'Descricao' => $categoria),
                    array('url' => '#' ,'Descricao' => Auxiliar::DesajustarDataComBarra($dia))
            );
            $nivel = 3;

            return View('receitas/lancamentos.tabelaCategoria', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel'));
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