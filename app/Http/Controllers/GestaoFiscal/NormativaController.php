<?php

namespace App\Http\Controllers\GestaoFiscal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NormativaController extends Controller
{
    //GET
    public function abrirArquivo($pasta1,$nomeArquivo){        
        
        $file_path = public_path('Arquivos/normativa/'.$pasta1.'/'.$nomeArquivo.'.pdf');

        return response()->file($file_path);
    }
}