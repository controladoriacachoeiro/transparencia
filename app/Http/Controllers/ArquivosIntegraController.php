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