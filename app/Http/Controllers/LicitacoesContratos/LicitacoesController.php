<?php

namespace App\Http\Controllers\LicitacoesContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\LicitacoesModel;
use App\Models\LicitacoesContratos\LicitacoesItensModel;
use App\Models\LicitacoesContratos\LicitacoesParticipantesModel;
use App\Models\LicitacoesContratos\LicitacoesVencedorItensModel;
use App\Auxiliar as Auxiliar;

class LicitacoesController extends Controller
{
    public function Filtro(){
        $dadosDb = LicitacoesModel::orderBy('DataPropostas');
        $dadosDb->select('Status');
        $dadosDb->distinct('Status');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro =[];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->Status);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;        
                                
        return View('licitacoescontratos/licitacoes.filtroLicitacoes', compact('dadosDb'));
    }

    public function FiltroRedirect(Request $request)
    {        
        return redirect()->route('MostrarLicitacoes',
                                ['status' => $request->slcStatus]);
    }

    public function MostrarLicitacoes($status)
    {
        $dadosDb = LicitacoesModel::orderBy('DataPropostas','desc');
        $dadosDb->select('LicitacaoID','Status','CodigoLicitacao','OrgaoLicitante', 'ObjetoLicitado','DataPropostas', 'ModalidadeLicitatoria', 'NumeroEdital', 'AnoEdital');
        $dadosDb->orderBy( 'DataPropostas', 'desc');
        $dadosDb = $dadosDb->get();

        if($status != 'Todos'){
            $dadosDb->where('Status', '=', $status);
        }

        $colunaDados = ['Data da Proposta', 'Número do Edital', 'Status', 'Orgao Licitante', 'Objeto Licitado', 'Modalidade'];
        $Navegacao = array(
                array('url' => '/licitacoescontratos/licitacoes', 'Descricao' => 'Filtro'),           
                array('url' => '#' ,'Descricao' => 'Licitações')
        );
        return View('licitacoescontratos/licitacoes.tabelaLicitacoes', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    public function DetalhesLicitacao($status, $licitante, $codigolicitacao)
    {
        $dadosDb = LicitacoesModel::orderBy('DataPropostas','desc');
        $dadosDb->where('OrgaoLicitante', '=', $licitante);
        $dadosDb->where('CodigoLicitacao', '=', $codigolicitacao);
        $dadosDb = $dadosDb->get();
        
        $Itens = LicitacoesItensModel::orderBy('NomeLote');
        $Itens->where('CodigoLicitacao', '=', $codigolicitacao);
        $Itens->groupBy('NomeProdutoServico');
        $Itens = $Itens->get();        
        $colunaDadosItens = ['Nome do Lote', 'Produto/Serviço', 'Tipo'];

        $Participantes = LicitacoesParticipantesModel::where('CodigoLicitacao', '=', $codigolicitacao);
        $Participantes = $Participantes->get();
        $colunaDadosParticipantes = ['Nome do Participante', 'CNPJ'];

        $VencedorItens = LicitacoesVencedorItensModel::where('CodigoLicitacao', '=', $codigolicitacao);
        $VencedorItens = $VencedorItens->get();
        $colunaDadosVencedorItens = ['Nome do Vencedor', 'Produto/Serviço', 'Quantidade', 'Valor Total'];
        
        

        
        $Navegacao = array(
            array('url' => '/licitacoescontratos/licitacoes', 'Descricao' => 'Filtro'),            
            array('url' => route('MostrarLicitacoes', ['status' => $status]), 'Descricao' => 'Licitações'),
            array('url' => '#' ,'Descricao' => 'Licitação: ' . $codigolicitacao)
        );        
        return View('licitacoescontratos/licitacoes.detalhesLicitacao', compact('dadosDb', 'Itens', 'colunaDadosItens', 'Participantes', 'colunaDadosParticipantes', 'VencedorItens', 'colunaDadosVencedorItens', 'Navegacao'));
    }

    //GET
    public function ShowLicitacaoItem()
    {
        $LicitacaoItemID =  isset($_GET['LicitacaoItemID']) ? $_GET['LicitacaoItemID'] : 'null';
        $dadosDb = LicitacoesItensModel::select('LicitacaoItemID', 'CodigoLicitacao', 'NomeLote', 'TipoItem', 'NomeProdutoServico', 'DescricaoProdutoServico', 'NomeEmbaalgem');
        $dadosDb->where('LicitacaoItemID', '=', $LicitacaoItemID);
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }

    //GET
    public function ShowParticipante()
    {
        $LicitacaoID =  isset($_GET['LicitacaoID']) ? $_GET['LicitacaoID'] : 'null';
        $dadosDb = LicitacoesParticipantesModel::select('LicitacaoID', 'OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'ModalidadeLicitatoria', 'DataPropostas','IntegraEditalNome', 'NumeroEdital', 'AnoEdital');
        $dadosDb->where('LicitacaoID', '=', $LicitacaoID);
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }



    //GET
    public function ShowVencedorItem()
    {
        $LicitacaoID =  isset($_GET['LicitacaoID']) ? $_GET['LicitacaoID'] : 'null';
        $dadosDb = LicitacoesItensModel::select('LicitacaoID', 'OrgaoLicitante', 'ObjetoLicitado', 'NumeroProcesso', 'ModalidadeLicitatoria', 'DataPropostas','IntegraEditalNome', 'NumeroEdital', 'AnoEdital');
        $dadosDb->where('LicitacaoID', '=', $LicitacaoID);
        $dadosDb = $dadosDb->get();
                                        
        return json_encode($dadosDb);
    }
    
    //GET
    public function DownloadLicitacaoConcluida($id){                        
        $dadosDb = LicitacoesConcluidasModel::select('LicitacaoID', 'IntegraEdital', 'IntegraEditalNome', 'IntegraEditalEXT');                       
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