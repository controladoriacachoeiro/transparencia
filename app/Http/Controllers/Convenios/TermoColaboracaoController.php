<?php

namespace App\Http\Controllers\Convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Convenios\TermoColaboracaoModel;

class TermoColaboracaoController extends Controller
{
    //GET
    public function ListarTermos(){        
        $dadosDb = TermoColaboracaoModel::orderBy('TermoID');
        $dadosDb->select('TermoID','NumeroTermo', 'Ano', 'NomeBeneficiario', 'DataAssinatura', 'Prazo', 'Valor');                      
        $dadosDb = $dadosDb->get();                                
        $colunaDados = [ 'Nº do Termo', 'Beneficiário', 'Data da Assinatura', 'Prazo', 'Valor'];
        $Navegacao = array(            
                array('url' => '#' ,'Descricao' => 'Termos de Colaboração')
        );
                
        return View('convenios/TermosColaboracao.tabelaTermos', compact('dadosDb', 'colunaDados', 'Navegacao'));
    }

    //GET        
    public function ShowTermo(){
        $TermoID =  isset($_GET['TermoID']) ? $_GET['TermoID'] : 'null';        
        
        $dadosDb = TermoColaboracaoModel::select('TermoID','NumeroTermo','Ano','OrgaoConcedente', 'DataAssinatura', 'NomeBeneficiario', 'Objeto', 'Prazo', 'Valor', 'Protocolo', 'Fiscal', 'DataPublicacao', 'IntegraTermoNome', 'IntegraTermoEXT');
        $dadosDb->where('TermoID', '=', $TermoID);
        $dadosDb = $dadosDb->get();
                                       
        return json_encode($dadosDb);
    }
    
    //GET        
    public function DownloadTermo($nomearquivo){                                                               

        $file_path = public_path('Arquivos/termocolaboracao/'. $nomearquivo);

        return response()->file($file_path);
    }
}