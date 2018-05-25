<?php

namespace App\Http\Controllers\Arquivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arquivo\ArquivoModel;
use App\Models\Usuario\UsuarioPermissaoModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Storage;

class ArquivoController extends Controller
{
    //POST
    public function uploadArquivoPPA(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();
        
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

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'created_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosPPA(){
        $dadosDb = ArquivoModel::orderBy('nomeExibicao');
        
        $dadosDb->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao');
        $dadosDb->where('Permissao.idPermissao', '=', '1');
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');

        $dadosDb = $dadosDb->get();
        
        return view('gestaoFiscal.legislacaoOrcamentaria.ppa', compact('dadosDb'));
    }

    //POST
    public function uploadArquivoLDO(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();
        
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

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'created_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosLDO(){
        $dadosDb = ArquivoModel::orderBy('nomeExibicao');
        
        $dadosDb->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao');
        $dadosDb->where('Permissao.idPermissao', '=', '2');
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');

        $dadosDb = $dadosDb->get();
        
        return view('gestaoFiscal.legislacaoOrcamentaria.ldo', compact('dadosDb'));
    }

    //POST
    public function uploadArquivoLOA(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();
        
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

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'created_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosLOA(){
        $dadosDb = ArquivoModel::orderBy('nomeExibicao');
        
        $dadosDb->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao');
        $dadosDb->where('Permissao.idPermissao', '=', '3');
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');

        $dadosDb = $dadosDb->get();
        
        return view('gestaoFiscal.legislacaoOrcamentaria.loa', compact('dadosDb'));
    }

    //POST
    public function uploadArquivoRGF(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();
        
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

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'ano' => $request->ano, 'periodo_ug' => $request->quadrimestre, 'created_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosRGF(){
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
        

        return view('gestaoFiscal.relatorioLrf.rgf', compact('dadosDb', 'dadosDb2', 'dadosDb3'));
    }

    //POST
    public function uploadArquivoRREO(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();
        
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

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'ano' => $request->ano, 'periodo_ug' => $request->bimestre, 'created_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosRREO(){
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
        
        
        return view('gestaoFiscal.relatorioLrf.rreo', compact('dadosDb', 'dadosDb2', 'dadosDb3'));
    }

    //POST
    public function uploadArquivoBalancoAnual(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();
        
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

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'ano' => $request->ano, 'periodo_ug' => $request->periodo_ug, 'created_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }

    //GET
    public function carregarArquivosBalancoAnual(){
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
        
        return view('gestaoFiscal.prestacaoConta', compact('dadosDb', 'dadosDb2', 'dadosDb3', 'dadosDb4', 'dadosDb5'));
    }

    //POST
    public function uploadArquivoRoyalties(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');

        $user = Auth::user();
        
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

        $dadosDb->insert(['nomeArquivo' => $nomeArquivo, 'nomeExibicao' => $request->nomeExibicao, 'idUsuario' => $idUsuario, 'idPermissao' => $idPermissao, 'ano' => $request->ano, 'created_at' => date('Y-m-d H:i:s')]);

        return redirect('/administracao')->with('sucesso', 'Arquivo Inserido com sucesso.');
    }
    
    public function MostrarArquivo($permissao, $nomeArquivo){                                
        $file_path = storage_path('app/' . $permissao . '/' . $nomeArquivo);
        return response()->file($file_path);        
    }

    public function MostrarArquivoAno($permissao, $ano, $nomeArquivo){                                
        $file_path = storage_path('app/' . $permissao . '/'. $ano . '/' . $nomeArquivo);
        return response()->file($file_path);        
    }

    public function MostrarArquivoAnoPeriodoUG($permissao, $ano, $periodoug, $nomeArquivo){                                
        $file_path = storage_path('app/' . $permissao . '/'. $ano . '/' . $periodoug . '/' . $nomeArquivo);
        $headers = ["Title" => "titulo"];
        return response()->file($file_path);        
    }

    //GET
    public function editarArquivo($idArquivo){
        $user = Auth::user();
        
        if($user == null){
            return redirect('/login');
        }

        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();


        //Verifica se o usuário logado tem permissão para editar/fazer upload desse arquivo
        $dadosDb2 = UsuarioPermissaoModel::orderBy('UsuarioPermissao.idPermissao');

        $dadosDb2->where('idUsuario', '=', $user->id);
        $dadosDb2->where('idPermissao', '=', $dadosDb[0]->idPermissao);
        $dadosDb2 = $dadosDb2->get();

        if($dadosDb2->isEmpty()){
            return redirect('/administracao');
        } else{
            if($dadosDb[0]->descricao == "PPA"){
                return view('administracao.editarPPA', compact('dadosDb'));
            } else if($dadosDb[0]->descricao == "LDO"){
                return view('administracao.editarLDO', compact('dadosDb'));
            } else if($dadosDb[0]->descricao == "LOA"){
                return view('administracao.editarLOA', compact('dadosDb'));
            } else if($dadosDb[0]->descricao == "RGF"){
                return view('administracao.editarRGF', compact('dadosDb'));
            } else if($dadosDb[0]->descricao == "RREO"){
                return view('administracao.editarRREO', compact('dadosDb'));
            } else if($dadosDb[0]->descricao == "Balanço Anual"){
                return view('administracao.editarBalancoAnual', compact('dadosDb'));
            } else if($dadosDb[0]->descricao == "Royalties"){
                return view('administracao.editarRoyalties', compact('dadosDb'));
            }
        }
    }

    //POST
    public function editarArquivoPPA(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $user = Auth::user();
        
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
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao]);

            return redirect('/gestaofiscal/legislacao/ppa')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/gestaofiscal/legislacao/ppa')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoLDO(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $user = Auth::user();
        
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
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao]);

            return redirect('/gestaofiscal/legislacao/ldo')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/gestaofiscal/legislacao/ldo')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoLOA(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $user = Auth::user();
        
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
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao]);

            return redirect('/gestaofiscal/legislacao/loa')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/gestaofiscal/legislacao/loa')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoRGF(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $user = Auth::user();
        
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

            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao, 'ano' => $request->ano, 'periodo_ug' => $request->quadrimestre]);

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

            return redirect('/gestaofiscal/lrf/rgf')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/gestaofiscal/lrf/rgf')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoRREO(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $user = Auth::user();
        
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
            
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao, 'ano' => $request->ano, 'periodo_ug' => $request->bimestre]);

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

            return redirect('/gestaofiscal/lrf/rreo')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/gestaofiscal/lrf/rreo')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoBalancoAnual(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $user = Auth::user();
        
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
            
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao, 'ano' => $request->ano, 'periodo_ug' => $request->periodo_ug]);

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

            return redirect('/gestaofiscal/prestacaoconta')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/gestaofiscal/prestacaoconta')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //POST
    public function editarArquivoRoyalties(Request $request){
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $request->idArquivo);
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');
        $dadosDb = $dadosDb->get();
        
        
        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        $dadosDb2->where('idArquivo', '=', $request->idArquivo);

        $user = Auth::user();
        
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
            
            $dadosDb2->update(['nomeExibicao' => $request->nomeExibicao, 'ano' => $request->ano, 'periodo_ug' => $request->periodo_ug]);

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

            return redirect('/gestaofiscal/prestacaoconta')->with('sucesso', 'Arquivo Editado com sucesso.');
        }

        return redirect('/gestaofiscal/prestacaoconta')->with('sucesso', 'Arquivo Editado com sucesso.');
    }

    //GET
    public function apagarArquivo($idArquivo, $permissao){
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $idArquivo);
        $dadosDb = $dadosDb->get();

        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb2->where('idArquivo', '=', $idArquivo);

        if($permissao == "PPA"){
            $urlRedirect = '/gestaofiscal/legislacao/ppa';
        } else if($permissao == "LDO"){
            $urlRedirect = '/gestaofiscal/legislacao/ldo';
        } else if($permissao == "LOA"){
            $urlRedirect = '/gestaofiscal/legislacao/loa';
        } else if($permissao == "RGF"){
            $urlRedirect = '/gestaofiscal/lrf/rgf';
        } else if($permissao == "RREO"){
            $urlRedirect = '/gestaofiscal/lrf/rreo';
        } else if($permissao == "Balanço Anual"){
            $urlRedirect = '/gestaofiscal/prestacaoconta';
        } else if($permissao == "Royalties"){
            $urlRedirect = '/gestaofiscal/prestacaoconta';
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
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $idArquivo);
        $dadosDb = $dadosDb->get();

        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb2->where('idArquivo', '=', $idArquivo);

        if($permissao == "PPA"){
            $urlRedirect = '/gestaofiscal/legislacao/ppa';
        } else if($permissao == "LDO"){
            $urlRedirect = '/gestaofiscal/legislacao/ldo';
        } else if($permissao == "LOA"){
            $urlRedirect = '/gestaofiscal/legislacao/loa';
        } else if($permissao == "RGF"){
            $urlRedirect = '/gestaofiscal/lrf/rgf';
        } else if($permissao == "RREO"){
            $urlRedirect = '/gestaofiscal/lrf/rreo';
        } else if($permissao == "Balanço Anual"){
            $urlRedirect = '/gestaofiscal/prestacaoconta';
        } else if($permissao == "Royalties"){
            $urlRedirect = '/gestaofiscal/prestacaoconta';
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
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb->where('idArquivo', '=', $idArquivo);
        $dadosDb = $dadosDb->get();

        $dadosDb2 = ArquivoModel::orderBy('idArquivo');
        
        $dadosDb2->where('idArquivo', '=', $idArquivo);

        if($permissao == "PPA"){
            $urlRedirect = '/gestaofiscal/legislacao/ppa';
        } else if($permissao == "LDO"){
            $urlRedirect = '/gestaofiscal/legislacao/ldo';
        } else if($permissao == "LOA"){
            $urlRedirect = '/gestaofiscal/legislacao/loa';
        } else if($permissao == "RGF"){
            $urlRedirect = '/gestaofiscal/lrf/rgf';
        } else if($permissao == "RREO"){
            $urlRedirect = '/gestaofiscal/lrf/rreo';
        } else if($permissao == "Balanço Anual"){
            $urlRedirect = '/gestaofiscal/prestacaoconta';
        } else if($permissao == "Royalties"){
            $urlRedirect = '/gestaofiscal/prestacaoconta';
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