<?php

namespace App\Http\Controllers\Convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Convenios\ConveniosCedidosModel;
use App\Auxiliar as Auxiliar;

class ConveniosCedidosController extends Controller
{

    public function MostrarConveniosRecebidos()
    {
        $dadosDb = ConveniosCedidosModel::orderBy('DataCelebracao','desc');
        $dadosDb->select('ConveniosID','OrgaoConcedente', 'NomeBeneficiario', 'DataCelebracao', 'ValorACeder');
        $dadosDb->orderBy( 'DataCelebracao', 'desc');
        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Data da Celebração','Órgão', 'Beneficiário', 'Valor Cedido'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Convênios Recebidos')
        );        
        return View('convenios/ConveniosCedidos.conveniosCedidosTabela', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET
    public function ShowConvenioCedido()
    {
        $ConvenioID =  isset($_GET['ConvenioID']) ? $_GET['ConvenioID'] : 'null';
        
        $dadosDb = ConveniosCedidosModel::orderBy('ConveniosID');
        $dadosDb->select('ConveniosID', 'OrgaoConcedente', 'CNPJBeneficiario', 'NomeBeneficiario', 'DataCelebracao','PrazoVigencia','Objeto','ValorACeder','ValorContrapartida', 'IntegraTermoEXT');
        $dadosDb->where('ConveniosID', '=', $ConvenioID);
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
    
    //GET
    public function DownloadConveniosCedidos($id){                        
        $dadosDb = ConveniosCedidosModel::select('ConveniosID', 'IntegraTermo', 'IntegraTermoNome', 'IntegraTermoEXT');                       
        $dadosDb->where('ConveniosID', '=', $id);                            
        $dadosDb = $dadosDb->get();

        $conteudo = $dadosDb[0]->IntegraTermo;
        $nome = $dadosDb[0]->IntegraTermoNome;
        $tipo = $dadosDb[0]->IntegraTermoEXT;
        $nome = $nome . "." . $tipo;

        header('Content-Type: text/html; charset=utf-8'); 
        header('Content-Type: filesize($conteudo)');
        header('Content-Type: $tipo');
        header("Content-Disposition: attachment; filename=$nome");

        return print($conteudo);
    }
}