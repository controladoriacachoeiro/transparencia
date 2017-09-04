<?php

namespace App\Http\Controllers\GestaoFiscal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RgfController extends Controller
{
    //GET
    public function abrirArquivo(Request $request)
    {
        switch ($request->selectQuadrimestre) {
            case '1º Quadrimestre':
                $file_path = public_path('Arquivos/rgf/'.$request->selectAno.'/1_quadrimestre.zip');
                break;
            case '2º Quadrimestre':
                $file_path = public_path('Arquivos/rgf/'.$request->selectAno.'/2_quadrimestre.zip');
                break;
            case '3º Quadrimestre':
                $file_path = public_path('Arquivos/rgf/'.$request->selectAno.'/3_quadrimestre.zip');
                break;
        }

        $headers = [
            'Content-Type' => 'application/zip',
         ];

        return response()->download($file_path, $request->selectAno.'_'.$request->selectQuadrimestre.'.zip', $headers);
    }
}
