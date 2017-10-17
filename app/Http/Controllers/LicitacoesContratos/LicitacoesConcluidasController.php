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
        $dadosDb->select('LicitacaoConcluidaID','OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'DataPropostas', 'ModalidadeLicitatoria');
        $dadosDb->orderBy( 'DataPropostas', 'desc');
        $dadosDb = $dadosDb->get();
        $colunaDados = ['Data da Proposta', 'Órgão', 'Objeto Licitado','Número do Processo', 'Modalidade'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Licitações Concluidas')
        );        
        return View('licitacoescontratos/Concluida.tabelaConcluida', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET
    public function ShowLicitacaoConcluida()
    {
        $LicitacaoConcluidaID =  isset($_GET['LicitacaoConcluidaID']) ? $_GET['LicitacaoConcluidaID'] : 'null';
        $dadosDb = LicitacoesConcluidasModel::select('LicitacaoConcluidaID', 'OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'ModalidadeLicitatoria', 'DataPropostas','IntegraEditalNome');
        $dadosDb->where('LicitacaoConcluidaID', '=', $LicitacaoConcluidaID);
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
    
    //GET
    public function DownloadLicitacaoConcluida($id){                        
        $dadosDb = LicitacoesConcluidasModel::select('LicitacaoConcluidaID', 'IntegraEdital', 'IntegraEditalNome', 'IntegraEditalEXT');                       
        $dadosDb->where('LicitacaoConcluidaID', '=', $id);                            
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
