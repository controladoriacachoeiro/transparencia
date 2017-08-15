<?php

namespace App\Http\Controllers\LicitacoesContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\LicitacoesConcluidasModel;
use App\Models\LicitacoesContratos\LicitacoesConlcuidasParticipantesModel;
use App\Auxiliar as Auxiliar;

class LicitacoesConcluidasController extends Controller
{

    public function MostrarLicitacaoConcluida()
    {
        $dadosDb = LicitacoesConcluidasModel::orderBy('DataPropostas','desc');
        $dadosDb->select('OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'DataPropostas','LicitacaoID');
        $dadosDb->orderBy( 'DataPropostas', 'desc');
        $dadosDb = $dadosDb->get();
        $colunaDados = [ 'Órgão', 'Objeto Licitado','Número do Processo', 'Data da Proposta','Modalidade'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Licitações Concluidas')
        );
        //return Json_encode($dadosDb);
        return View('licitacoescontratos/Concluida.tabelaConcluida', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET
    public function ShowLicitacaoAndamento()
    {
        $LicitacaoID =  isset($_GET['LicitacaoID']) ? $_GET['LicitacaoID'] : 'null';
        $dadosDb->select('OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'DataPropostas','LicitacaoID','IntegraEditalNome');
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
