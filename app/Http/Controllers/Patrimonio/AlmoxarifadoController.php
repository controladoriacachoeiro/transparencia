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
    public function FiltrarAlmoxarifado($almoxarifado)
    {
        $orgao=Auxiliar::desajusteUrl($almoxarifado);
        $dadosDb=[];        
        switch ($almoxarifado) {
            case 'todos':
                $dadosDb = AlmoxarifadoModel::orderBy('NomeAlmoxarifado');
                $dadosDb->selectRaw('NomeAlmoxarifado, sum(Quantidade) as Quantidade');
                $colunaDados = [ 'Almoxarifado','Quantidade de Itens' ];
                $dadosDb->groupBy('NomeAlmoxarifado');
                $dadosDb = $dadosDb->get();
                $Navegacao = array(
                    array('url' => route('filtroAlmoxarifado') ,'Descricao' => 'Filtro'),
                    array('url' => '#' ,'Descricao' => $almoxarifado));                                
            break;
            default:
                $dadosDb = AlmoxarifadoModel::orderBy('NomeMaterial');
                $dadosDb->selectRaw('NomeAlmoxarifado,NomeMaterial,sum(Quantidade) as Quantidade');
                $dadosDb->where('NomeAlmoxarifado', '=', $almoxarifado);
                $dadosDb->groupBy('NomeMaterial');
                $dadosDb = $dadosDb->get();
                $colunaDados = ['Material', 'Quantidade de Itens'];
                $Navegacao = array(
                    array('url' => route('filtroAlmoxarifado') ,'Descricao' => 'Filtro'),
                    array('url' => '/patrimonios/almoxarifado/porAlmoxarifado/todos' ,'Descricao' => 'Almoxarifado'),
                    array('url' => '#' ,'Descricao' => $almoxarifado));                                
                break;
        }
        return View('patrimonio.Almoxarifado.tabelaPorAlmoxarifado', compact('dadosDb', 'colunaDados', 'Navegacao'));        
    }

    public function FiltrarAlmoxarifadoMaterial($almoxarifado,$material)
    {
        $material=Auxiliar::desajusteUrl($material);
        $almoxarifado=Auxiliar::desajusteUrl($almoxarifado);
        $dadosDb=[];        
        $dadosDb = AlmoxarifadoModel::orderBy('Especificacao');
        $dadosDb->selectRaw('EstoqueID,Especificacao, Quantidade');
        $dadosDb->where('NomeAlmoxarifado', '=', $almoxarifado);
        $dadosDb->where('NomeMaterial', '=', $material);
        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Descrição do Item','Quantidade de Itens' ];
        $Navegacao = array(
            array('url' => route('filtroAlmoxarifado') ,'Descricao' => 'Filtro'),
            array('url' => '/patrimonios/almoxarifado/porAlmoxarifado/todos' ,'Descricao' => 'Almoxarifado'),
            array('url' => '/patrimonios/almoxarifado/porAlmoxarifado/'.Auxiliar::ajusteUrl($almoxarifado) ,'Descricao' => $almoxarifado),
            array('url' => '#' ,'Descricao' => $material));                                
        return View('patrimonio.Almoxarifado.tabelaPorAlmoxarifado', compact('dadosDb', 'colunaDados', 'Navegacao'));        
    }
    
    
    //GET
    public function ShowAlmoxarifado()
    {
        $EstoqueID =  isset($_GET['EstoqueID']) ? $_GET['EstoqueID'] : 'null';

        $dadosDb=AlmoxarifadoModel::orderBy('EstoqueID');
        $dadosDb->selectRaw('NomeAlmoxarifado,EstoqueID,NomeMaterial, Quantidade, ValorAquisicao,OrgaoLocalizacao,NomeGrupo,Especificacao');
        $dadosDb->where('EstoqueID', '=', $EstoqueID);
   
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
    
}
