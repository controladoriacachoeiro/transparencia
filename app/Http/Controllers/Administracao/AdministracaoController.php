<?php

namespace App\Http\Controllers\Administracao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Arquivo\ArquivoModel;
use App\Models\Usuario\UsuarioPermissaoModel;
use App\Models\LicitacoesContratos\AtaRegistroPrecoModel;
use App\Models\LicitacoesContratos\LicitacoesModel;
use App\Models\LicitacoesContratos\LicitacoesVencedorItensModel;
use App\Models\ArquivosIntegra\ArquivosIntegraModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Storage;

class AdministracaoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        // Redireciona para a página de login caso a função que está aqui nessa classe tente ser acessada por alguém que não esteja logado
        $this->middleware('auth');
    }

    //POST
    public function uploadArquivoPPA(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }
        
        $idUsuario = $user->id;
        $idPermissao = 1;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "PPA-" . date('YmdHis') . "." . $file->getClientOriginalExtension();

                Storage::put("PPA/" . $nomeArquivo, file_get_contents($file));
            }
        } else {
            return redirect('/administracao')->with('message', 'Por favor selecione algum arquivo');
        }

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosPPAAdmin(){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb2 = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb2->where('idUsuario', '=', $user->id);
        $dadosDb2->where('idPermissao', '=', '1');
        $dadosDb2 = $dadosDb2->get();

        if($dadosDb2->isEmpty()){
            return redirect('/administracao');
        } else{
            $dadosDb = ArquivoModel::orderBy('nomeExibicao');
            
            $dadosDb->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao');
            $dadosDb->where('Permissao.idPermissao', '=', '1');
            $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
    
            $dadosDb = $dadosDb->get();
            
            return view('administracao/gestaoFiscal/legislacaoOrcamentaria.listaPPA', compact('dadosDb'));
        }

    }

    //POST
    public function uploadArquivoLDO(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }
        
        $idUsuario = $user->id;
        $idPermissao = 2;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "LDO-" . date('YmdHis') . "." . $file->getClientOriginalExtension();

                Storage::put("LDO/" . $nomeArquivo, file_get_contents($file));
            }
        } else {
            return redirect('/administracao')->with('message', 'Por favor selecione algum arquivo');
        }

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosLDOAdmin(){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb2 = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb2->where('idUsuario', '=', $user->id);
        $dadosDb2->where('idPermissao', '=', '2');
        $dadosDb2 = $dadosDb2->get();

        if($dadosDb2->isEmpty()){
            return redirect('/administracao');
        } else{
            $dadosDb = ArquivoModel::orderBy('nomeExibicao');
            
            $dadosDb->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao');
            $dadosDb->where('Permissao.idPermissao', '=', '2');
            $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');

            $dadosDb = $dadosDb->get();
            
            return view('administracao/gestaoFiscal/legislacaoOrcamentaria.listaLDO', compact('dadosDb'));
        }
    }

     //POST
     public function uploadArquivoLOA(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }
        
        $idUsuario = $user->id;
        $idPermissao = 3;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "LOA-" . date('YmdHis') . "." . $file->getClientOriginalExtension();

                Storage::put("LOA/" . $nomeArquivo, file_get_contents($file));
            }
        } else {
            return redirect('/administracao')->with('message', 'Por favor selecione algum arquivo');
        }

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosLOAAdmin(){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb2 = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb2->where('idUsuario', '=', $user->id);
        $dadosDb2->where('idPermissao', '=', '3');
        $dadosDb2 = $dadosDb2->get();

        if($dadosDb2->isEmpty()){
            return redirect('/administracao');
        } else{
            $dadosDb = ArquivoModel::orderBy('nomeExibicao');
            
            $dadosDb->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao');
            $dadosDb->where('Permissao.idPermissao', '=', '3');
            $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');

            $dadosDb = $dadosDb->get();
            
            return view('administracao/gestaoFiscal/legislacaoOrcamentaria.listaLOA', compact('dadosDb'));
        }
    }

    //POST
    public function uploadArquivoRGF(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }
        
        $idUsuario = $user->id;
        $idPermissao = 4;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "RGF-" . date('YmdHis') . "." . $file->getClientOriginalExtension();

                Storage::put("RGF/" . $request->ano . "/" . $request->quadrimestre . "/" . $nomeArquivo, file_get_contents($file));
            }
        } else {
            return redirect('/administracao')->with('message', 'Por favor selecione algum arquivo');
        }

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'ano' => $request->ano, 'periodo_ug' => $request->quadrimestre, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosRGFAdmin(){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb4 = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb4->where('idUsuario', '=', $user->id);
        $dadosDb4->where('idPermissao', '=', '4');
        $dadosDb4 = $dadosDb4->get();

        if($dadosDb4->isEmpty()){
            return redirect('/administracao');
        } else{
            $dadosDb = ArquivoModel::orderBy('nomeExibicao');
            
            $dadosDb->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao', 'ano', 'periodo_ug');
            $dadosDb->where('Permissao.idPermissao', '=', '4');
            $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
            $dadosDb = $dadosDb->get();

            $dadosDb2 = ArquivoModel::orderBy('ano');
            $dadosDb2->select('ano');
            $dadosDb2->where('idPermissao', '=', '4');
            $dadosDb2->where('ano', '!=', 'null');
            $dadosDb2->distinct();
            $dadosDb2 = $dadosDb2->get();

            $dadosDb3 = ArquivoModel::orderBy('ano');
            $dadosDb3->select('ano', 'periodo_ug');
            $dadosDb3->where('idPermissao', '=', '4');
            $dadosDb3->where('periodo_ug', '!=', 'null');
            $dadosDb3->distinct();
            $dadosDb3 = $dadosDb3->get();

            return view('administracao/gestaoFiscal/relatorioLrf.listaRGF', compact('dadosDb', 'dadosDb2', 'dadosDb3'));
        }
    }

    //POST
    public function uploadArquivoRREO(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }
        
        $idUsuario = $user->id;
        $idPermissao = 5;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "RREO-" . date('YmdHis') . "." . $file->getClientOriginalExtension();

                Storage::put("RREO/" . $request->ano . "/" . $request->bimestre . "/" . $nomeArquivo, file_get_contents($file));
            }
        } else {
            return redirect('/administracao')->with('message', 'Por favor selecione algum arquivo');
        }

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'ano' => $request->ano, 'periodo_ug' => $request->bimestre, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

     //GET
     public function carregarArquivosRREOAdmin(){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb4 = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb4->where('idUsuario', '=', $user->id);
        $dadosDb4->where('idPermissao', '=', '5');
        $dadosDb4 = $dadosDb4->get();

        if($dadosDb4->isEmpty()){
            return redirect('/administracao');
        } else{
            $dadosDb = ArquivoModel::orderBy('nomeExibicao');
            
            $dadosDb->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao', 'ano', 'periodo_ug');
            $dadosDb->where('Permissao.idPermissao', '=', '5');
            $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
            $dadosDb = $dadosDb->get();

            $dadosDb2 = ArquivoModel::orderBy('ano');
            $dadosDb2->select('ano');
            $dadosDb2->where('idPermissao', '=', '5');
            $dadosDb2->where('ano', '!=', 'null');
            $dadosDb2->distinct();
            $dadosDb2 = $dadosDb2->get();

            $dadosDb3 = ArquivoModel::orderBy('ano');
            $dadosDb3->select('ano', 'periodo_ug');
            $dadosDb3->where('idPermissao', '=', '5');
            $dadosDb3->where('periodo_ug', '!=', 'null');
            $dadosDb3->distinct();
            $dadosDb3 = $dadosDb3->get();

            // foreach($dadosDb as $dados){
            //     $arrayDadosDb[] = $dados;
            // }

            // usort($arrayDadosDb,"strnatcmp");

            // $dadosDb = $arrayDadosDb;

            return view('administracao/gestaoFiscal/relatorioLrf.listaRREO', compact('dadosDb', 'dadosDb2', 'dadosDb3'));
        }
    }

    //POST
    public function uploadArquivoBalancoAnual(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }
        
        $idUsuario = $user->id;
        $idPermissao = 6;

        if($request->periodo_ug == "Nenhuma"){
            $request->periodo_ug = null;
        }

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){
                
                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "BalancoAnual-" . date('YmdHis') . "." . $file->getClientOriginalExtension();
                if($request->periodo_ug == null){
                    Storage::put("Balanço Anual/" . $request->ano . "/" . $nomeArquivo, file_get_contents($file));
                } else{
                    Storage::put("Balanço Anual/" . $request->ano . "/" . $request->periodo_ug . "/" . $nomeArquivo, file_get_contents($file));
                }
            }
        } else {
            return redirect('/administracao')->with('message', 'Por favor selecione algum arquivo');
        }

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'ano' => $request->ano, 'periodo_ug' => $request->periodo_ug, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosPrestacaoDeContaAdmin(){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/login');
        }

        // Verifica se o usuário tem permissão para os arquivos de Balanço Anual
        $dadosDb6 = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');
    
        $dadosDb6->where('idUsuario', '=', $user->id);
        $dadosDb6->where('idPermissao', '=', '6');
        $dadosDb6 = $dadosDb6->get();
    
        // Verifica se o usuário tem permissão para os arquivos de Royalties
        $dadosDb7 = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');
    
        $dadosDb7->where('idUsuario', '=', $user->id);
        $dadosDb7->where('idPermissao', '=', '7');
        $dadosDb7 = $dadosDb7->get();


        if($dadosDb6->isEmpty() && $dadosDb7->isEmpty()){
            return redirect('/administracao');
        } else{
        
            $dadosDb = ArquivoModel::orderBy('nomeExibicao');
            $dadosDb->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao', 'ano', 'periodo_ug');
            $dadosDb->where('Permissao.idPermissao', '=', '6');
            $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
            $dadosDb = $dadosDb->get();
            

            $dadosDb2 = ArquivoModel::orderBy('ano');
            $dadosDb2->select('ano');
            $dadosDb2->where('idPermissao', '=', '6');
            $dadosDb2->where('ano', '!=', 'null');
            $dadosDb2->where('ano', '!=', '2013');
            $dadosDb2->where('ano', '!=', '2014');
            $dadosDb2->distinct();
            $dadosDb2 = $dadosDb2->get();


            $dadosDb3 = ArquivoModel::orderBy('nomeExibicao');
            $dadosDb3->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao', 'ano');
            $dadosDb3->where('Permissao.idPermissao', '=', '7');
            $dadosDb3->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
            $dadosDb3 = $dadosDb3->get();

            $dadosDb4 = ArquivoModel::orderBy('ano');
            $dadosDb4->select('ano');
            $dadosDb4->where('idPermissao', '=', '7');
            $dadosDb4->where('ano', '!=', 'null');
            $dadosDb4->distinct();
            $dadosDb4 = $dadosDb4->get();

            $dadosDb5 = ArquivoModel::orderBy('ano');
            $dadosDb5->select('ano', 'periodo_ug');
            $dadosDb5->where('idPermissao', '=', '6');
            $dadosDb5->where('periodo_ug', '!=', 'null');
            $dadosDb5->where('ano', '!=', '2013');
            $dadosDb5->where('ano', '!=', '2014');
            $dadosDb5->distinct();
            $dadosDb5 = $dadosDb5->get();

            
            return view('administracao/gestaoFiscal/prestacaoDeConta.listaPrestacaoDeConta', compact('dadosDb', 'dadosDb2', 'dadosDb3', 'dadosDb4', 'dadosDb5', 'dadosDb6', 'dadosDb7'));
        }
    }

    //POST
    public function uploadArquivoRoyalties(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }
        
        $idUsuario = $user->id;
        $idPermissao = 7;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "Royalties-" . date('YmdHis') . "." . $file->getClientOriginalExtension();

                Storage::put("Royalties/" . $request->ano . "/" . $nomeArquivo, file_get_contents($file));
            }
        } else {
            return redirect('/administracao')->with('message', 'Por favor selecione algum arquivo');
        }

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'ano' => $request->ano, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosAtasDeRegistroDePrecoAdmin(){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb = AtaRegistroPrecoModel::orderByRaw('CONCAT(AnoAta, NumeroAta) DESC');
        $dadosDb->select('AtaID','NumeroAta', 'AnoAta', 'DataFinal', 'Descricao', 'Fornecedor', 'CodigoAta');      
        $dadosDb = $dadosDb->get();
        
        $colunaDados = [ 'Nº da Ata', 'Fornecedor', 'Data da Validade', 'Descrição'];
        $Navegacao = array(
                array('url' => '#' ,'Descricao' => 'Atas de Registro de Preço')
        );
        

        $dadosDb2 = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb2->where('idUsuario', '=', $user->id);
        $dadosDb2->where('idPermissao', '=', '8');
        $dadosDb2 = $dadosDb2->get();

        
        if($dadosDb2->isEmpty()){
            return redirect('/administracao');
        } else{
            $dadosDb3 = ArquivosIntegraModel::orderBy('DescricaoArquivo');
            
            $dadosDb3->select('ArquivoID', 'CodigoDocumento', 'DescricaoArquivo', 'NomeArquivo', 'SubCaminho', 'Permissao.descricao', 'DescricaoArquivo', 'AtaID');
            $dadosDb3->where('Permissao.idPermissao', '=', '8');
            $dadosDb3->join('Permissao', 'ArquivosIntegra.idPermissao', '=', 'Permissao.idPermissao');
            $dadosDb3->join('AtaRegistroPreco', 'ArquivosIntegra.CodigoDocumento', '=', 'AtaRegistroPreco.CodigoAta');
            
            $dadosDb3 = $dadosDb3->get();

            
            return view('administracao/licitacoescontratos.listaAtasDeRegistroDePreco', compact('dadosDb', 'dadosDb2', 'dadosDb3', 'colunaDados', 'Navegacao'));
        }
    }

    //GET
    public function carregarArquivosLicitacoesAtasAdmin(){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $status = "Todos";
        $modalidade = "Todos";

        $dadosDb = LicitacoesModel::orderBy('DataPropostas','desc');
        $dadosDb->select('LicitacaoID','Status','CodigoLicitacao','OrgaoLicitante', 'ObjetoLicitado','DataPropostas', 'ModalidadeLicitatoria', 'NumeroEdital', 'AnoEdital', 'NumeroProcesso', 'AnoProcesso');
        $dadosDb->orderBy( 'DataPropostas', 'desc');

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
        return View('administracao/licitacoescontratos.tabelaLicitacoesAtas', compact('dadosDb', 'colunaDados', 'Navegacao', 'status', 'modalidade'));
    }

    // GET
    public function UploadAtasDeRegistroDePreco($orgaoLicitante, $codigoLicitacao){
        // De acordo com o fornecedor escolhido mudar os itens disponíveis para fazer a ata (combo box) e mostrar o valor total desses itens em um input text disabled em baixo
        $dadosDb = LicitacoesVencedorItensModel::orderBy('LicitacaoVencedorItemID');
        $dadosDb->where('CodigoLicitacao', '=', $codigoLicitacao);
        $dadosDb = $dadosDb->get();
        
        // if($dadosDb->isEmpty()){
        //     dd("Nenhum item vencedor encontrado");
        // } else{
        //     dd("possui item vencedor");
        // }

        $dadosDb2 = LicitacoesModel::orderBy('LicitacaoID');
        $dadosDb2->where('CodigoLicitacao', '=', $codigoLicitacao);
        $dadosDb2 = $dadosDb2->get();


        $dadosDb3 = LicitacoesVencedorItensModel::orderBy('LicitacaoVencedorItemID');
        $dadosDb3->select('NomeParticipante', 'CNPJParticipante');
        $dadosDb3->where('CodigoLicitacao', '=', $codigoLicitacao);
        $dadosDb3->groupBy('CNPJParticipante');
        $dadosDb3 = $dadosDb3->get();
        
        $dadosDb4 = LicitacoesVencedorItensModel::orderBy('LicitacaoVencedorItemID');
        $dadosDb4->where('CodigoLicitacao', '=', $codigoLicitacao);
        $dadosDb4 = $dadosDb4->get();
        
        $dadosDb5 = ArquivosIntegraModel::orderBy('ArquivoID');
        $dadosDb5->select('TipoDocumento');
        $dadosDb5->distinct('TipoDocumento');
        $dadosDb5 = $dadosDb5->get();
        // dd($dadosDb5);

        return view('administracao/licitacoescontratos.uploadAtasDeRegistroDePreco', compact('dadosDb', 'dadosDb2', 'dadosDb3', 'dadosDb4', 'dadosDb5'));
    }

    // POST
    public function uploadArquivoAtasDeRegistroDePreco(Request $request){
        // $request->valorTotalLoteVencedor = (float)$request->valorTotalLoteVencedor;
        dd($request);
        // NumeroLicitaçãoOrigem = Número do Edital

        // Ajustar essa função para inserir na tabela de atas e de arquivosIntegra
        // Colocar o sub caminho correto na tabela de arquivos integra

        $dadosDb = AtaRegistroPrecoModel::orderBy('AtaID');

        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }
        
        $idUsuario = $user->id;
        $idPermissao = 8;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "AtasDeRegistroDePreco-" . date('YmdHis') . "." . $file->getClientOriginalExtension();

                Storage::put("Atas de Registro de Preço/" . $request->ano . "/" . $nomeArquivo, file_get_contents($file));
            }
        } else {
            return redirect('/administracao')->with('message', 'Por favor selecione algum arquivo');
        }

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'ano' => $request->ano, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //POST
    public function uploadArquivoLicitacao(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }
        
        $idUsuario = $user->id;
        $idPermissao = 10;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "PPA-" . date('YmdHis') . "." . $file->getClientOriginalExtension();

                Storage::put("PPA/" . $nomeArquivo, file_get_contents($file));
            }
        } else {
            return redirect('/administracao')->with('message', 'Por favor selecione algum arquivo');
        }

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    // GET
    public function carregarInformacoesLicitacao(){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb = LicitacoesModel::orderBy('Status');
        $dadosDb->select('Status');
        $dadosDb->distinct();
        $dadosDb = $dadosDb->get();

        $dadosDb2 = LicitacoesModel::orderBy('ModalidadeLicitatoria');
        $dadosDb2->select('ModalidadeLicitatoria');
        $dadosDb2->distinct();
        $dadosDb2 = $dadosDb2->get();

        $dadosDb3 = LicitacoesModel::orderBy('TipoJulgamento');
        $dadosDb3->select('TipoJulgamento');
        $dadosDb3->distinct();
        $dadosDb3 = $dadosDb3->get();

        $dadosDb4 = LicitacoesModel::orderBy('OrgaoLicitante');
        $dadosDb4->select('OrgaoLicitante');
        $dadosDb4->distinct();
        $dadosDb4 = $dadosDb4->get();

        return view('administracao/licitacoescontratos.uploadLicitacoes', compact('dadosDb', 'dadosDb2', 'dadosDb3', 'dadosDb4'));    
    }

    // GET
    public function carregarArquivosLicitacaoAdmin(){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $status = "Todos";
        $modalidade = "Todos";

        $dadosDb = LicitacoesModel::orderBy('DataPropostas','desc');
        $dadosDb->select('LicitacaoID','Status','CodigoLicitacao','OrgaoLicitante', 'ObjetoLicitado','DataPropostas', 'ModalidadeLicitatoria', 'NumeroEdital', 'AnoEdital', 'NumeroProcesso', 'AnoProcesso');
        $dadosDb->orderBy( 'DataPropostas', 'desc');

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
        return View('administracao/licitacoescontratos.listaLicitacao', compact('dadosDb', 'colunaDados', 'Navegacao', 'status', 'modalidade'));

    }

    // GET
    public function editarArquivo($idArquivo){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/login');
        }

        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $idArquivo);
        $dadosDb = $dadosDb->get();


        //Verifica se o usuário logado tem permissão para editar/fazer upload desse arquivo
        $dadosDb2 = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb2->where('idUsuario', '=', $user->id);
        $dadosDb2->where('idPermissao', '=', $dadosDb[0]->idPermissao);
        $dadosDb2 = $dadosDb2->get();

        if($dadosDb2->isEmpty()){
            return redirect('/administracao');
        } else{
            if($dadosDb[0]->idPermissao == "1"){
                return view('administracao/gestaoFiscal/legislacaoOrcamentaria.editarPPA', compact('dadosDb'));
            } else if($dadosDb[0]->idPermissao == "2"){
                return view('administracao/gestaoFiscal/legislacaoOrcamentaria.editarLDO', compact('dadosDb'));
            } else if($dadosDb[0]->idPermissao == "3"){
                return view('administracao/gestaoFiscal/legislacaoOrcamentaria.editarLOA', compact('dadosDb'));
            } else if($dadosDb[0]->idPermissao == "4"){
                return view('administracao/gestaoFiscal/relatorioLrf.editarRGF', compact('dadosDb'));
            } else if($dadosDb[0]->idPermissao == "5"){
                return view('administracao/gestaoFiscal/relatorioLrf.editarRREO', compact('dadosDb'));
            } else if($dadosDb[0]->idPermissao == "6"){
                return view('administracao/gestaoFiscal/prestacaoDeConta.editarBalancoAnual', compact('dadosDb'));
            } else if($dadosDb[0]->idPermissao == "7"){
                return view('administracao/gestaoFiscal/prestacaoDeConta.editarRoyalties', compact('dadosDb'));
            }
        }
    }

    //POST
    public function editarArquivoPPA(Request $request){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        
        $idUsuario = $user->id;
        $idPermissao = 1;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "PPA-" . date('YmdHis') . "." . $file->getClientOriginalExtension();
                
                if($dadosDb[0]->ano != null){
                    if($dadosDb[0]->periodo_ug != null){
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->periodo_ug . "/" . $dadosDb[0]->nomeArquivo);
                    } else{
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->nomeArquivo);
                    }
                } else{
                    Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->nomeArquivo);
                }
                
                $dadosDb2->update(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario]);
                Storage::put("PPA/" . $nomeArquivo, file_get_contents($file));
            }
        } else {
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario]);

            return redirect('/listaPPA')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/listaPPA')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoLDO(Request $request){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);
        
        $idUsuario = $user->id;
        $idPermissao = 2;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "LDO-" . date('YmdHis') . "." . $file->getClientOriginalExtension();
                
                if($dadosDb[0]->ano != null){
                    if($dadosDb[0]->periodo_ug != null){
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->periodo_ug . "/" . $dadosDb[0]->nomeArquivo);
                    } else{
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->nomeArquivo);
                    }
                } else{
                    Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->nomeArquivo);
                }
                
                $dadosDb2->update(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario]);
                Storage::put("LDO/" . $nomeArquivo, file_get_contents($file));
            }
        } else {
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario]);

            return redirect('/listaLDO')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/listaLDO')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoLOA(Request $request){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $idUsuario = $user->id;
        $idPermissao = 3;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "LOA-" . date('YmdHis') . "." . $file->getClientOriginalExtension();
                
                if($dadosDb[0]->ano != null){
                    if($dadosDb[0]->periodo_ug != null){
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->periodo_ug . "/" . $dadosDb[0]->nomeArquivo);
                    } else{
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->nomeArquivo);
                    }
                } else{
                    Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->nomeArquivo);
                }
                
                $dadosDb2->update(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario]);
                Storage::put("LOA/" . $nomeArquivo, file_get_contents($file));
            }
        } else {
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario]);

            return redirect('/listaLOA')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/listaLOA')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoRGF(Request $request){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $idUsuario = $user->id;
        $idPermissao = 4;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "RGF-" . date('YmdHis') . "." . $file->getClientOriginalExtension();
               
                $dadosDb2->update(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'ano' => $request->ano, 'periodo_ug' => $request->quadrimestre]);

                if($dadosDb[0]->ano != null){
                    if($dadosDb[0]->periodo_ug != null){
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->periodo_ug . "/" . $dadosDb[0]->nomeArquivo);
                        Storage::put("RGF/" . $request->ano . "/" . $request->quadrimestre . "/" . $nomeArquivo, file_get_contents($file));
                    } else{
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->nomeArquivo);
                        Storage::put("RGF/" . $request->ano . "/" . $nomeArquivo, file_get_contents($file));
                    }
                } else{
                    Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->nomeArquivo);
                    Storage::put("RGF/" . $nomeArquivo, file_get_contents($file));
                }     
            }
        } else {

            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao, 'ano' => $request->ano, 'periodo_ug' => $request->quadrimestre, 'idUsuario' => $idUsuario]);

            if($request->ano != $dadosDb[0]->ano || $request->quadrimestre != $dadosDb[0]->periodo_ug){
                if($dadosDb[0]->ano != null){
                    if($dadosDb[0]->periodo_ug != null){
                        Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->periodo_ug . "/" . $dadosDb[0]->nomeArquivo, "RGF/" . $request->ano . "/" . $request->quadrimestre . "/" . $dadosDb[0]->nomeArquivo);
                    } else{
                        Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->nomeArquivo, "RGF/" . $request->ano . "/" . $dadosDb[0]->nomeArquivo);
                    }
                } else{
                    Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->nomeArquivo, "RGF/" . $dadosDb[0]->nomeArquivo);
                }
            }

            return redirect('/listaRGF')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/listaRGF')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoRREO(Request $request){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/login');
        }
        
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $idUsuario = $user->id;
        $idPermissao = 5;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "RREO-" . date('YmdHis') . "." . $file->getClientOriginalExtension();
               
                $dadosDb2->update(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'ano' => $request->ano, 'periodo_ug' => $request->bimestre]);

                if($dadosDb[0]->ano != null){
                    if($dadosDb[0]->periodo_ug != null){
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->periodo_ug . "/" . $dadosDb[0]->nomeArquivo);
                        Storage::put("RREO/" . $request->ano . "/" . $request->bimestre . "/" . $nomeArquivo, file_get_contents($file));
                    } else{
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->nomeArquivo);
                        Storage::put("RREO/" . $request->ano . "/" . $nomeArquivo, file_get_contents($file));
                    }
                } else{
                    Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->nomeArquivo);
                    Storage::put("RREO/" . $nomeArquivo, file_get_contents($file));
                }     
            }
        } else {
            
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao, 'ano' => $request->ano, 'periodo_ug' => $request->bimestre, 'idUsuario' => $idUsuario]);

            if($request->ano != $dadosDb[0]->ano || $request->bimestre != $dadosDb[0]->periodo_ug){
                if($dadosDb[0]->ano != null){
                    if($dadosDb[0]->periodo_ug != null){
                        Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->periodo_ug . "/" . $dadosDb[0]->nomeArquivo, "RREO/" . $request->ano . "/" . $request->bimestre . "/" . $dadosDb[0]->nomeArquivo);
                    } else{
                        Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->nomeArquivo, "RREO/" . $request->ano . "/" . $dadosDb[0]->nomeArquivo);
                    }
                } else{
                    Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->nomeArquivo, "RREO/" . $dadosDb[0]->nomeArquivo);
                }
            }

            return redirect('/listaRREO')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/listaRREO')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoBalancoAnual(Request $request){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/login');
        }

        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $idUsuario = $user->id;
        $idPermissao = 6;

        if($request->periodo_ug == "Nenhuma"){
            $request->periodo_ug = null;
        }

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "BalancoAnual-" . date('YmdHis') . "." . $file->getClientOriginalExtension();
               
                $dadosDb2->update(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'ano' => $request->ano, 'periodo_ug' => $request->periodo_ug]);

                if($dadosDb[0]->ano != null){
                    if($dadosDb[0]->periodo_ug != null){
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->periodo_ug . "/" . $dadosDb[0]->nomeArquivo);
                        Storage::put("Balanço Anual/" . $request->ano . "/" . $request->periodo_ug . "/" . $nomeArquivo, file_get_contents($file));
                    } else{
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->nomeArquivo);
                        Storage::put("Balanço Anual/" . $request->ano . "/" . $nomeArquivo, file_get_contents($file));
                    }
                } else{
                    Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->nomeArquivo);
                    Storage::put("Balanço Anual/" . $nomeArquivo, file_get_contents($file));
                }     
            }
        } else {
            
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao, 'ano' => $request->ano, 'periodo_ug' => $request->periodo_ug, 'idUsuario' => $idUsuario]);

            if($request->ano != $dadosDb[0]->ano || $request->periodo_ug != $dadosDb[0]->periodo_ug){
                if($dadosDb[0]->ano != null){
                    if($dadosDb[0]->periodo_ug != null){
                        Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->periodo_ug . "/" . $dadosDb[0]->nomeArquivo, "Balanço Anual/" . $request->ano . "/" . $request->periodo_ug . "/" . $dadosDb[0]->nomeArquivo);
                    } else{
                        Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->nomeArquivo, "Balanço Anual/" . $request->ano . "/" . $dadosDb[0]->nomeArquivo);
                    }
                } else{
                    Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->nomeArquivo, "Balanço Anual/" . $dadosDb[0]->nomeArquivo);
                }
            }

            return redirect('/listaPrestacaoDeConta')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/listaPrestacaoDeConta')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoRoyalties(Request $request){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $idUsuario = $user->id;
        $idPermissao = 7;

        if(strpos($request->nomeExibicao, '.pdf')){
            $auxNome = explode(".pdf", $request->nomeExibicao);
            $request->nomeExibicao = $auxNome;  
        }

        $files = $request->file('file');

        if (!empty($files)){
            foreach ($files as $file){

                if($file->getClientSize() > 33554432){
                    // limitando em 32 MB os arquivos
                    return redirect('/administracao')->with('message', 'Arquivo grande demais para ser enviado!');
                }
                
                $nomeArquivo = "Royalties-" . date('YmdHis') . "." . $file->getClientOriginalExtension();
               
                $dadosDb2->update(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'ano' => $request->ano, 'periodo_ug' => $request->periodo_ug]);

                if($dadosDb[0]->ano != null){
                    if($dadosDb[0]->periodo_ug != null){
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->periodo_ug . "/" . $dadosDb[0]->nomeArquivo);
                        Storage::put("Royalties/" . $request->ano . "/" . $request->periodo_ug . "/" . $nomeArquivo, file_get_contents($file));
                    } else{
                        Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->nomeArquivo);
                        Storage::put("Royalties/" . $request->ano . "/" . $nomeArquivo, file_get_contents($file));
                    }
                } else{
                    Storage::delete($dadosDb[0]->descricao. "/" . $dadosDb[0]->nomeArquivo);
                    Storage::put("Royalties/" . $nomeArquivo, file_get_contents($file));
                }     
            }
        } else {
            
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao, 'ano' => $request->ano, 'periodo_ug' => $request->periodo_ug, 'idUsuario' => $idUsuario]);

            if($request->ano != $dadosDb[0]->ano || $request->periodo_ug != $dadosDb[0]->periodo_ug){
                if($dadosDb[0]->ano != null){
                    if($dadosDb[0]->periodo_ug != null){
                        Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->periodo_ug . "/" . $dadosDb[0]->nomeArquivo, "Royalties/" . $request->ano . "/" . $request->periodo_ug . "/" . $dadosDb[0]->nomeArquivo);
                    } else{
                        Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->ano . "/" . $dadosDb[0]->nomeArquivo, "Royalties/" . $request->ano . "/" . $dadosDb[0]->nomeArquivo);
                    }
                } else{
                    Storage::move($dadosDb[0]->descricao. "/" . $dadosDb[0]->nomeArquivo, "Royalties/" . $dadosDb[0]->nomeArquivo);
                }
            }

            return redirect('/listaPrestacaoDeConta')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/listaPrestacaoDeConta')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //GET
    public function apagarArquivo($idArquivo, $permissao){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $idArquivo);
        $dadosDb = $dadosDb->get();

        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb2->where('idArquivo', '=', $idArquivo);

        if($permissao == "PPA"){
            $urlRedirect = '/listaPPA';
        } else if($permissao == "LDO"){
            $urlRedirect = '/listaLDO';
        } else if($permissao == "LOA"){
            $urlRedirect = '/listaLOA';
        } else if($permissao == "RGF"){
            $urlRedirect = '/listaRGF';
        } else if($permissao == "RREO"){
            $urlRedirect = '/listaRREO';
        } else if($permissao == "Balanço Anual"){
            $urlRedirect = '/listaPrestacaoDeConta';
        } else if($permissao == "Royalties"){
            $urlRedirect = '/listaPrestacaoDeConta';
        }

        try{
            $dadosDb2->delete();    
            Storage::delete($permissao. "/" . $dadosDb[0]->nomeArquivo);
        } catch(\Illuminate\Database\QueryException $ex){
            return redirect($urlRedirect)->with('message', 'Não é possível apagar esse arquivo nesse momento');
        }
        
        return redirect($urlRedirect)->with('sucesso', 'Arquivo apagado com sucesso!');
    }

    //GET
    public function apagarArquivoAno($idArquivo, $permissao, $ano){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $idArquivo);
        $dadosDb = $dadosDb->get();

        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb2->where('idArquivo', '=', $idArquivo);

        if($permissao == "PPA"){
            $urlRedirect = '/listaPPA';
        } else if($permissao == "LDO"){
            $urlRedirect = '/listaLDO';
        } else if($permissao == "LOA"){
            $urlRedirect = '/listaLOA';
        } else if($permissao == "RGF"){
            $urlRedirect = '/listaRGF';
        } else if($permissao == "RREO"){
            $urlRedirect = '/listaRREO';
        } else if($permissao == "Balanço Anual"){
            $urlRedirect = '/listaPrestacaoDeConta';
        } else if($permissao == "Royalties"){
            $urlRedirect = '/listaPrestacaoDeConta';
        }

        try{
            $dadosDb2->delete();    
            Storage::delete($permissao. "/" . $ano . "/" . $dadosDb[0]->nomeArquivo);
        } catch(\Illuminate\Database\QueryException $ex){
            return redirect($urlRedirect)->with('message', 'Não é possível apagar esse arquivo nesse momento');
        }
        
        return redirect($urlRedirect)->with('sucesso', 'Arquivo apagado com sucesso!');
    }

    //GET
    public function apagarArquivoAnoPeriodoUG($idArquivo, $permissao, $ano, $periodoug){
        $user = Auth::user();

        if($user == null){
            return redirect('/login');
        }

        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $idArquivo);
        $dadosDb = $dadosDb->get();

        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb2->where('idArquivo', '=', $idArquivo);

        if($permissao == "PPA"){
            $urlRedirect = '/listaPPA';
        } else if($permissao == "LDO"){
            $urlRedirect = '/listaLDO';
        } else if($permissao == "LOA"){
            $urlRedirect = '/listaLOA';
        } else if($permissao == "RGF"){
            $urlRedirect = '/listaRGF';
        } else if($permissao == "RREO"){
            $urlRedirect = '/listaRREO';
        } else if($permissao == "Balanço Anual"){
            $urlRedirect = '/listaPrestacaoDeConta';
        } else if($permissao == "Royalties"){
            $urlRedirect = '/listaPrestacaoDeConta';
        }
        
        try{
            $dadosDb2->delete();    
            Storage::delete($permissao. "/" . $ano . "/" . $periodoug . "/" . $dadosDb[0]->nomeArquivo);
        } catch(\Illuminate\Database\QueryException $ex){
            return redirect($urlRedirect)->with('message', 'Não é possível apagar esse arquivo nesse momento');
        }
        
        return redirect($urlRedirect)->with('sucesso', 'Arquivo apagado com sucesso!');
    }

}
