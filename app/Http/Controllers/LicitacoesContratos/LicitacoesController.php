<?php

namespace App\Http\Controllers\LicitacoesContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\LicitacoesModel;
use App\Models\LicitacoesContratos\LicitacoesItensModel;
use App\Models\LicitacoesContratos\LicitacoesParticipantesModel;
use App\Models\LicitacoesContratos\LicitacoesVencedorItensModel;
use App\Models\ArquivosIntegra\ArquivosIntegraModel;
use App\Auxiliar as Auxiliar;

class LicitacoesController extends Controller
{
    public function Filtro(){
        $dadosDb = LicitacoesModel::select('Status');        
        $dadosDb->distinct('Status');
        $dadosDb = $dadosDb->get();

        $dadosDb2 = LicitacoesModel::select('ModalidadeLicitatoria');        
        $dadosDb2->distinct('ModalidadeLicitatoria');
        $dadosDb2 = $dadosDb2->get();
        

        $arrayDataFiltro =[];        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor->Status);
        }
        $arrayDataFiltro = json_encode($arrayDataFiltro);        
        $dadosDb = $arrayDataFiltro;

        $arrayDataFiltro =[];        
        foreach ($dadosDb2 as $valor) {
            array_push($arrayDataFiltro, $valor->ModalidadeLicitatoria);
        }
        $arrayDataFiltro = json_encode($arrayDataFiltro);        
        $dadosDb2 = $arrayDataFiltro;       
                                
        return View('licitacoescontratos/licitacoes.filtroLicitacoes', compact('dadosDb', 'dadosDb2'));
    }

    public function FiltroRedirect(Request $request)
    {        
        return redirect()->route('MostrarLicitacoes',
                                ['status' => $request->slcStatus,
                                 'modalidade' => $request->slcModalidade]);
    }

    public function MostrarLicitacoes($status, $modalidade)
    {        
        $dadosDb = LicitacoesModel::orderBy('DataPropostas','desc');
        $dadosDb->select('LicitacaoID','Status','CodigoLicitacao','OrgaoLicitante', 'ObjetoLicitado','DataPropostas', 'ModalidadeLicitatoria', 'NumeroEdital', 'AnoEdital', 'NumeroProcesso', 'AnoProcesso');
        $dadosDb->orderBy( 'DataPropostas', 'desc');

        if($status != 'Todos'){
            $dadosDb->where('Status', '=', $status);            
        }
        if($modalidade != 'Todos'){
            $dadosDb->where('ModalidadeLicitatoria', '=', $modalidade);            
        }

        $dadosDb = $dadosDb->get();
        
        // Verificando se o número do processo que está vindo do banco começa com '01'. Se começar, pode ser que o processo não seja encontrado pelo sistema de Consulta ao Controle de Processos
        foreach($dadosDb as $dados){
            $primeiroDigito = $dados->NumeroProcesso[0];
            $segundoDigito = $dados->NumeroProcesso[1];
            
            if(strlen($dados->NumeroProcesso) > 4 && $primeiroDigito == 0 && $segundoDigito == 1){
                $novoNumeroProcesso = substr($dados->NumeroProcesso, 2);
                $dados->NumeroProcesso = $novoNumeroProcesso;
            }
        }

        $colunaDados = ['Data da Proposta', 'Modalidade', 'Nº Edital', 'Status', 'Nº Processo', 'Órgão Licitante', 'Objeto Licitado'];
        $Navegacao = array(
                array('url' => '/licitacoescontratos/licitacoes', 'Descricao' => 'Filtro'),           
                array('url' => '#' ,'Descricao' => 'Licitações')
        );    
        return View('licitacoescontratos/licitacoes.tabelaLicitacoes', compact('dadosDb', 'colunaDados', 'Navegacao', 'status', 'modalidade'));
    }

    public function DetalhesLicitacao($status, $modalidade, $licitante, $codigolicitacao)
    {
        $dadosDb = LicitacoesModel::orderBy('DataPropostas','desc');
        $dadosDb->where('OrgaoLicitante', '=', $licitante);
        $dadosDb->where('CodigoLicitacao', '=', $codigolicitacao);
        $dadosDb = $dadosDb->get();

        // Verificando se o número do processo que está vindo do banco começa com '01'. 
        // Se começar, pode ser que o processo não seja encontrado pelo sistema de Consulta ao Controle de Processos
        $primeiroDigito = $dadosDb[0]->NumeroProcesso[0];
        $segundoDigito = $dadosDb[0]->NumeroProcesso[1];
        
        if(strlen($dadosDb[0]->NumeroProcesso) > 4 && $primeiroDigito == 0 && $segundoDigito == 1){
            $novoNumeroProcesso = substr($dadosDb[0]->NumeroProcesso, 2);
            $dadosDb[0]->NumeroProcesso = $novoNumeroProcesso;
        }
        
        
        if(count($dadosDb) > 0){

            //Pegar Anexos
            $arquivos = ArquivosIntegraModel::select('ArquivoID', 'DescricaoArquivo')->where('CodigoDocumento', '=', $dadosDb[0]->CodigoLicitacao)->get();

            $aux = [];
            if(count($arquivos) > 0){                        
                foreach($arquivos as $arquivo){
                    array_push($aux, array('ArquivoID' => $arquivo->ArquivoID, 'DescricaoArquivo' => $arquivo->DescricaoArquivo));
                }            
            }
            $dadosDb->Arquivos = $aux;            

            if($dadosDb[0]->TipoJulgamento == 'MENOR PREÇO POR LOTE'){
                $Itens = LicitacoesItensModel::orderBy('NomeLote');
                $Itens->selectraw('LicitacaoItemID, CodigoLicitacao, DescricaoProdutoServico, NomeEmbalagem, NomeLote, NomeProdutoServico, TipoItem, sum(Quantidade) as Quantidade, sum(ValorMedioTotal) as ValorMedioTotal');
                $Itens->where('CodigoLicitacao', '=', $codigolicitacao);
                $Itens->groupBy('NomeProdutoServico', 'NomeLote');
                $Itens = $Itens->get();        
                $colunaDadosItens = ['Nome do Lote', 'Produto/Serviço', 'Tipo', 'Quantidade', 'Valor Médio Total'];

                $Participantes = LicitacoesParticipantesModel::where('CodigoLicitacao', '=', $codigolicitacao);
                $Participantes = $Participantes->get();
                $colunaDadosParticipantes = ['Nome do Participante', 'CNPJ'];

                $VencedorItens = LicitacoesVencedorItensModel::where('CodigoLicitacao', '=', $codigolicitacao);
                $VencedorItens->selectraw('LicitacaoVencedorItemID, CodigoLicitacao, NomeParticipante, CNPJParticipante, NomeLote, TipoItem, NomeProdutoServico, NomeEmbalagem, sum(Quantidade) as Quantidade, sum(ValorTotal) as ValorTotal');
                $VencedorItens->groupBy('NomeLote');
                $VencedorItens = $VencedorItens->get();
                $colunaDadosVencedorItens = ['Nome do Lote', 'Nome do Vencedor', 'Valor Total'];


            }elseif(($dadosDb[0]->TipoJulgamento == 'MENOR PREÇO POR ITEM (PREGÃO)') || ($dadosDb[0]->TipoJulgamento == 'MAIOR LANCE OU OFERTA') || ($dadosDb[0]->TipoJulgamento == 'MAIOR OFERTA %')){
                $Itens = LicitacoesItensModel::orderBy('NomeProdutoServico');
                $Itens->selectraw('LicitacaoItemID, CodigoLicitacao, DescricaoProdutoServico, NomeEmbalagem, NomeProdutoServico, TipoItem, sum(Quantidade) as Quantidade, sum(ValorMedioTotal) as ValorMedioTotal');
                $Itens->where('CodigoLicitacao', '=', $codigolicitacao);
                $Itens->groupBy('NomeProdutoServico');
                $Itens = $Itens->get();        
                $colunaDadosItens = ['Produto/Serviço', 'Tipo', 'Quantidade', 'Valor Médio Total'];

                $Participantes = LicitacoesParticipantesModel::where('CodigoLicitacao', '=', $codigolicitacao);
                $Participantes = $Participantes->get();
                $colunaDadosParticipantes = ['Nome do Participante', 'CNPJ'];

                $VencedorItens = LicitacoesVencedorItensModel::where('CodigoLicitacao', '=', $codigolicitacao);
                $VencedorItens->selectraw('LicitacaoVencedorItemID, CodigoLicitacao, NomeParticipante, CNPJParticipante, TipoItem, NomeProdutoServico, NomeEmbalagem, sum(Quantidade) as Quantidade, sum(ValorTotal) as ValorTotal');
                $VencedorItens->groupBy('NomeProdutoServico');
                $VencedorItens = $VencedorItens->get();
                $colunaDadosVencedorItens = ['Produto/Serviço', 'Nome do Vencedor', 'Valor Total'];


            }elseif($dadosDb[0]->TipoJulgamento == 'MENOR PREÇO GLOBAL'){
                $Itens = LicitacoesItensModel::orderBy('NomeProdutoServico');
                $Itens->selectraw('LicitacaoItemID, CodigoLicitacao, DescricaoProdutoServico, NomeEmbalagem, NomeProdutoServico, TipoItem, sum(Quantidade) as Quantidade, sum(ValorMedioTotal) as ValorMedioTotal');
                $Itens->where('CodigoLicitacao', '=', $codigolicitacao);
                $Itens->groupBy('NomeProdutoServico');
                $Itens = $Itens->get();                
                $colunaDadosItens = ['Produto/Serviço', 'Tipo', 'Quantidade', 'Valor Médio Total'];

                $Participantes = LicitacoesParticipantesModel::where('CodigoLicitacao', '=', $codigolicitacao);
                $Participantes = $Participantes->get();
                $colunaDadosParticipantes = ['Nome do Participante', 'CNPJ'];

                $VencedorItens = LicitacoesVencedorItensModel::where('CodigoLicitacao', '=', $codigolicitacao);
                $VencedorItens->selectraw('LicitacaoVencedorItemID, CodigoLicitacao, NomeParticipante, CNPJParticipante, TipoItem, NomeProdutoServico, NomeEmbalagem, sum(Quantidade) as Quantidade, sum(ValorTotal) as ValorTotal');
                $VencedorItens->groupBy('NomeParticipante');
                $VencedorItens = $VencedorItens->get();                
                if(count($VencedorItens) > 0){
                    $VencedorItens[0]->NomeLote = 'GLOBAL';
                }                                
                $colunaDadosVencedorItens = ['Nome do Lote', 'Nome do Vencedor', 'Valor Total'];
            }
        }         
                
        $Navegacao = array(
            array('url' => '/licitacoescontratos/licitacoes', 'Descricao' => 'Filtro'),            
            array('url' => route('MostrarLicitacoes', ['status' => $status, 'modalidade' => $modalidade]), 'Descricao' => 'Licitações'),
            array('url' => '#' ,'Descricao' => 'Licitação: ' . $codigolicitacao)
        );        
        return View('licitacoescontratos/licitacoes.detalhesLicitacao', compact('dadosDb', 'Itens', 'colunaDadosItens', 'Participantes', 'colunaDadosParticipantes', 'VencedorItens', 'colunaDadosVencedorItens', 'Navegacao'));
    }

    //GET
    public function ShowLicitacaoItem()
    {
        $LicitacaoItemID =  isset($_GET['LicitacaoItemID']) ? $_GET['LicitacaoItemID'] : 'null';
        $dadosDb = LicitacoesItensModel::select('LicitacaoItemID', 'CodigoLicitacao', 'NomeLote', 'TipoItem', 'NomeProdutoServico', 'DescricaoProdutoServico', 'NomeEmbalagem');
        $dadosDb->where('LicitacaoItemID', '=', $LicitacaoItemID);
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);        
    }  

    //GET
    public function ShowLicitacaoVencedorItem()
    {
        $LicitacaoVencedorItemID =  isset($_GET['LicitacaoVencedorItemID']) ? $_GET['LicitacaoVencedorItemID'] : 'null';
        $dadosDb = LicitacoesVencedorItensModel::select('LicitacaoVencedorItemID', 'CodigoLicitacao', 'NomeParticipante', 'CNPJParticipante', 'TipoProcesso', 'TipoItem', 'NomeProdutoServico', 'NomeEmbalagem', 'Quantidade', 'ValorUnitario', 'ValorTotal');
        $dadosDb->where('LicitacaoVencedorItemID', '=', $LicitacaoVencedorItemID);
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