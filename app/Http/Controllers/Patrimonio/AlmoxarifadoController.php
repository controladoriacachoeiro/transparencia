<?php

namespace App\Http\Controllers\Patrimonio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patrimonio\AlmoxarifadoModel;
use App\Auxiliar as Auxiliar;

class AlmoxarifadoController extends Controller
{
    //GET    
    public function montarFiltroAlmoxarifado()
    {    
        $dadosDb = AlmoxarifadoModel::orderBy('NomeAlmoxarifado');
        $dadosDb->select('NomeAlmoxarifado');
        $dadosDb->distinct('NomeAlmoxarifado');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->NomeAlmoxarifado);
        }
        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

                                
        return View('patrimonio.Almoxarifado.filtroAlmoxarifado', compact('dadosDb'));
    }

    //POST
    public function filtrar(Request $request)
    {        
        $parametros = [
            'consulta' =>$request->slcAlmoxarifado
        ];
        
        $parametros = Auxiliar::ajusteArrayUrl($parametros);
        return redirect()->route('filtroAlmoxarifado2', $parametros);
    }

    //GET
    public function FiltrarAlmoxarifado($orgao)
    {
        $orgao=Auxiliar::desajusteUrl($orgao);
        $dadosDb=[];        

        switch ($orgao) {
            case 'todos':
                $dadosDb = AlmoxarifadoModel::orderBy('NomeAlmoxarifado');
                $dadosDb->selectRaw('NomeAlmoxarifado, sum( valorAquisicao * Quantidade) as ValorAquisicao');
                $dadosDb->whereRaw('Quantidade > 0 AND ValorAquisicao > 0');
                $colunaDados = [ 'Almoxarifado','Valor' ];
                $dadosDb->groupBy('NomeAlmoxarifado');
                $dadosDb = $dadosDb->get();
                $Navegacao = array(
                    array('url' => route('filtroAlmoxarifado') ,'Descricao' => 'Filtro'),
                    array('url' => '#' ,'Descricao' => $orgao));                                
                
                break;
            default:
                $dadosDb = AlmoxarifadoModel::orderBy('NomeAlmoxarifado');
                $dadosDb->selectRaw('NomeAlmoxarifado,EstoqueID,NomeMaterial,sum(Quantidade)as Quantidade,sum(ValorAquisicao) as ValorAquisicao');
                $dadosDb->where('Quantidade','>','0');
                $dadosDb->where('ValorAquisicao','>','0');
                $dadosDb->where('NomeAlmoxarifado', '=', $orgao);
                $dadosDb->groupBy('NomeMaterial');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Material', 'Valor','Quantidade'];
                $Navegacao = array(
                    array('url' => route('filtroAlmoxarifado') ,'Descricao' => 'Filtro'),
                    array('url' => '/patrimonios/almoxarifado/porAlmoxarifado/todos' ,'Descricao' => 'Órgãos'),
                    array('url' => '#' ,'Descricao' => $orgao));                                
                break;
        }
        return View('patrimonio.Almoxarifado.tabelaPorAlmoxarifado', compact('dadosDb', 'colunaDados', 'Navegacao'));        
    }
    
    //GET
    public function ShowAlmoxarifado()
    {
        $Produto =  isset($_GET['Produto']) ? $_GET['Produto'] : 'null';
        $Almoxarifado =  isset($_GET['Almoxarifado']) ? $_GET['Almoxarifado'] : 'null';
        $Produto =Auxiliar::desajusteUrl($Produto);
        $Almoxarifado =Auxiliar::desajusteUrl($Almoxarifado);

        $dadosDb=AlmoxarifadoModel::orderBy('EstoqueID');
        $dadosDb->selectRaw('NomeAlmoxarifado,EstoqueID,NomeMaterial,sum(Quantidade)as Quantidade,sum(ValorAquisicao) as ValorAquisicao,OrgaoLocalizacao,NomeGrupo,Especificacao');
        $dadosDb->where('NomeAlmoxarifado', '=', $Almoxarifado);
        $dadosDb->where('NomeMaterial', '=', $Produto);
        $dadosDb->groupBy('NomeMaterial');
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
    
}
