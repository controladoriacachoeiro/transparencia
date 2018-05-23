<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use App\Models\ArquivosIntegra\ArquivosIntegraModel;

class ArquivosIntegraController extends Controller
{

    public function exibirArquivo($id)
    {
        $dadosDb = ArquivosIntegraModel::where('ArquivoID', '=', $id);        
        $dadosDb = $dadosDb->first();
        // file_exists
        return response()->download(storage_path('app/' . $dadosDb->SubCaminho . '/' . $dadosDb->NomeArquivo));
        // return response()->file($file_path);
        // return Json_encode($dadosDb);
    }
}