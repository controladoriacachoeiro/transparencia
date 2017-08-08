<?php

namespace App\Http\Controllers\GestaoFiscal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrestacaoContasController extends Controller
{
    //GET
    public function abrirArquivo($pasta1,$pasta2,$nomeArquivo){        
        
        switch ($nomeArquivo) {
            case 'relges':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'002-RELGES.pdf');
            break;
            case 'balorc':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'003-BALORC.pdf');
            break;
            case 'balfin':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'004-BALFIN.pdf');
            break;
            case 'balpat':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'005-BALPAT.pdf');
            break;
            case 'demvap':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'006-DEMVAP.pdf');
            break;
            case 'demdif':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'007-DEMDIF.pdf');
            break;
            case 'demdfl':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'008-DEMDFL.pdf');
            break;
            case 'demfca':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'009-DEMFCA.pdf');
            break;
            case 'balver':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'011-BALVER.pdf');
            break;
            case 'reloci':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'043-RELOCI.pdf');
            break;
        }

        return response()->file($file_path);
    }
}