<?php

namespace App\Http\Controllers\LicitacoesContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\LicitacoesAndamentoModel;
use App\Auxiliar as Auxiliar;

class LicitacoesAndamentoController extends Controller
{

    public function MostrarLicitacaoAndamento()
    {
        $dadosDb = LicitacoesAndamentoModel::orderBy('DataPropostas','desc');
        $dadosDb->select('OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'DataPropostas','LicitacaoID');
        $dadosDb->orderBy( 'DataPropostas', 'desc');
        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Órgão', 'Objeto Licitado','Número do Processo', 'Data da Proposta'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Licitações em Andamento')
        );
        //return Json_encode($dadosDb);
        return View('licitacoescontratos/Andamento.tabelaAndamento', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET
    public function ShowLicitacaoAndamento()
    {
        $LicitacaoID =  isset($_GET['LicitacaoID']) ? $_GET['LicitacaoID'] : 'null';
        
        $dadosDb = LicitacoesAndamentoModel::orderBy('NumeroProcesso');
        $dadosDb->select('OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'DataPropostas','LicitacaoID','IntegraEditalNome','ModalidadeLicitatoria');
        $dadosDb->where('LicitacaoID', '=', $LicitacaoID);
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
    
    //GET
    public function DownloadLicitacaoAndamento($id){                        
        $dadosDb = LicitacoesAndamentoModel::select('LicitacaoID', 'IntegraEdital', 'IntegraEditalNome', 'IntegraEditalEXT');                       
        $dadosDb->where('LicitacaoID', '=', $id);                            
        $dadosDb = $dadosDb->get();
                       
        $conteudo = $dadosDb[0]->IntegraEdital;
        $nome = $dadosDb[0]->IntegraEditalNome;
        $tipo = $dadosDb[0]->IntegraEditalEXT;
        $nome = $nome . "." . $tipo;

        header('Content-Type: text/html; charset=utf-8'); 
        header('Content-Type: filesize($conteudo)');
        header('Content-Type: $tipo');
        header("Content-Disposition: attachment; filename=$nome");

        return print($conteudo);        
    }
}
