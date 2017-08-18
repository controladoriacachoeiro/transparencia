<?php

namespace App\Http\Controllers\GestaoFiscal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RreoController extends Controller
{
    //GET
    public function abrirArquivo(Request $request)
    {
        
        switch ($request->selectBimestre) {
            case '1º Bimestre':
                $file_path = public_path('Arquivos/rreo/'.$request->selectAno.'/1_bimestre.zip');
                break;
            case '2º Bimestre':
                $file_path = public_path('Arquivos/rreo/'.$request->selectAno.'/2_bimestre.zip');
                break;
            case '3º Bimestre':
                $file_path = public_path('Arquivos/rreo/'.$request->selectAno.'/3_bimestre.zip');
                break;
            case '4º Bimestre':
                $file_path = public_path('Arquivos/rreo/'.$request->selectAno.'/4_bimestre.zip');
                break;
            case '5º Bimestre':
                $file_path = public_path('Arquivos/rreo/'.$request->selectAno.'/5_bimestre.zip');
                break;
            case '6º Bimestre':
                $file_path = public_path('Arquivos/rreo/'.$request->selectAno.'/6_bimestre.zip');
                break;
            case '7º Bimestre':
                $file_path = public_path('Arquivos/rreo/'.$request->selectAno.'/7_bimestre.zip');
                break;
        }

        return response()->file($file_path);
    }
}
