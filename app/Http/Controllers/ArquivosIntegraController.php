<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Usuario\UsuarioPermissaoModel;
use App\Models\ArquivosIntegra\ArquivosIntegraModel;
use App\Models\LicitacoesContratos\AtaRegistroPrecoModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArquivosIntegraController extends Controller
{
    public function exibirArquivo($id){
        $dadosDb = ArquivosIntegraModel::where('ArquivoID', '=', $id);
        $dadosDb = $dadosDb->first();

        if(($dadosDb != null) && (file_exists(storage_path('app/' . $dadosDb->SubCaminho . '/' . $dadosDb->NomeArquivo)))){             
            $file_path = storage_path('app/' . $dadosDb->SubCaminho . '/' . $dadosDb->NomeArquivo);
            $contType = File::mimeType($file_path);
            $ext = pathinfo($file_path, PATHINFO_EXTENSION);            
            $headers = array(
                'Content-Type' => $contType,
                'Content-Disposition' => 'filename="'. $dadosDb->DescricaoArquivo . '.' . $ext . '"'                
            );
            return response()->file($file_path, $headers);
        }        

        return "Arquivo não encontrado";
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

    public function MostrarArquivoIntegra($permissao, $SubCaminho, $ArquivoID){
        
        $dadosDb = ArquivosIntegraModel::orderBy('ArquivoID');
        $dadosDb->where('ArquivoID', '=', $ArquivoID);
        $dadosDb = $dadosDb->first();

        if(($dadosDb != null) && (file_exists(storage_path('app/' . $permissao . '/' . $SubCaminho . '/' . $dadosDb->NomeArquivo)))){

            $file_path = storage_path('app/' . $permissao . '/' . $SubCaminho . '/' . $dadosDb->NomeArquivo);

            $contType = File::mimeType($file_path);
            $extensao = pathinfo($file_path, PATHINFO_EXTENSION);  

            $headers = array(
                'Content-Type' => $contType,
                'Content-Disposition' => 'filename="'. $dadosDb->DescricaoArquivo . '.' . $extensao . '"'                
            );

            return response()->file($file_path, $headers);
        } else{
            return "Arquivo não encontrado";
        }
    }
}