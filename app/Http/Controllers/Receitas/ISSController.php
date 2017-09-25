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

                return redirect()->route('MostrarLancamentos',
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
                $dadosDb->selectRaw('DataNFSe, DescricaoServico, sum(Quantidade) as Quantidade, sum(ValorISS) as ValorISS, sum(ValorNota) as ValorNota');
                $dadosDb->whereBetween('DataNFSe', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);
                $dadosDb->groupBy('DescricaoServico');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Serviço', 'Quantidade de Notas', 'Valor Lançado'];
                $Navegacao = array(
                        array('url' => '/receitas/lancamentos' ,'Descricao' => 'Filtro'),
                        array('url' => '#' ,'Descricao' => $servico)
                );
                $nivel = 1;
            }
            else{
                $dadosDb = ISSModel::orderBy('DescricaoServico');
                $dadosDb->selectRaw('IssID, DataNFSe, DescricaoServico, ValorServico, Aliquota, ValorISS, ValorNota');
                $dadosDb->where('DescricaoServico', '=', $servico);
                $dadosDb->whereBetween('DataNFSe', [Auxiliar::AjustarData($dataini), Auxiliar::AjustarData($datafim)]);            
                $dadosDb = $dadosDb->get();                                
                $colunaDados = ['Data do Lançamento', 'Valor do Serviço','Alíquota', 'Valor Lançado', 'Valor da Nota'];
                $Navegacao = array(            
                        array('url' => '/receitas/lancamentos' ,'Descricao' => 'Filtro'),
                        array('url' => route('MostrarLancamentos', ['dataini' => $dataini, 'datafim' => $datafim, 'servico' => 'todos']), 'Descricao' => 'Serviços'),
                        array('url' => '#' ,'Descricao' => $servico)
                );
                $nivel = 2;
            }
                
            return View('receitas/lancamentos.tabelaISS', compact('dadosDb', 'colunaDados', 'Navegacao','dataini','datafim','nivel'));
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
    public function ShowLancamento(){
        $IssID =  isset($_GET['IssID']) ? $_GET['IssID'] : 'null';               

        $dadosDb = ISSModel::where('IssID', '=', $IssID);        
        $dadosDb = $dadosDb->get();                       

        return json_encode($dadosDb);
    }
}