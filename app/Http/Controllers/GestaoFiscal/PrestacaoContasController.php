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
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'RELGES.pdf');
            break;
            case 'balorc':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'BALORC.pdf');
            break;
            case 'balfin':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'BALFIN.pdf');
            break;
            case 'balpat':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'BALPAT.pdf');
            break;
            case 'demvap':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'DEMVAP.pdf');
            break;
            case 'demdif':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'DEMDIF.pdf');
            break;
            case 'demdfl':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'DEMDFL.pdf');
            break;
            case 'demfca':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'DEMFCA.pdf');
            break;
            case 'balver':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'BALVER.pdf');
            break;
            case 'reluci':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'RELOCI.pdf');
            break;
            case 'demcad':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'DEMCAD.pdf');
            break;
            case 'demrap':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'DEMRAP.pdf');
            break;
            case 'docspca':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'DOCSPCA.pdf');
            break;
            case 'proexe':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'PROEXE.pdf');
            break;
            case 'tvdisp':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'TVDISP.pdf');
            break;
            case 'demdat':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'DEMDAT.pdf');
            break;
            case 'folrgp':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'FOLRGP.pdf');
            break;
            case 'folrpp':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'FOLRPP.pdf');
            break;
            case 'invalm':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'IVALM.pdf');
            break;
            case 'invimo':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'INVIMO.pdf');
            break;
            case 'invint':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'INVINT.pdf');
            break;
            case 'invmov':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'INVMOV.pdf');
            break;
            //arquivos de 2013
            case 'demreceita':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'ANEXO 1 - DEMONSTRATIVO DA RECEITA E DESPESA SEGUNDO CATEG ECONOMICAS.pdf');
            break;
            case 'resecat':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'ANEXO 2-1 - RECEITAS SEGUNDO AS CATEGORIAS ECONOMICAS.pdf');
            break;
            case 'nadese':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'ANEXO 2-2 - NATUREZA DA DESPESA SEGUNDO A CATEG ECONOMICAS.pdf');
            break;
            case 'progtrab':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'ANEXO 6 - PROGRAMA DE TRABALHO.pdf');
            break;
            case 'derepa':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'Anexo 6_dem_dos_restos_a_pagar 2013_Rep.pdf');
            break;
            case 'demfun':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'ANEXO 7 - DEMONSTATIVO DE FUNÇAO, SUBFUNCAO, PROGRMA POR PROJ E ATIVIDADE.pdf');
            break;
            case 'demdes':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'ANEXO 9 - DEMONSTRATIVO DA DESPESA POR ORGAOS E FUNCOES.pdf');
            break;
            case 'compde':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'ANEXO 11 - COMPARATIVO DA DESPESA AUTORIZADA E A REALIZADA.pdf');
            break;
            case 'boletin':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'BOLETIM DIARIO 31-12-2013.pdf');
            break;
            case 'capabalanco':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'CAPA BALANCO 2013 e sumario - internet.pdf');
            break;
            case 'demsaude':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'DEMONSTRATIVO APLICAÇAO COM SAUDE.pdf');
            break;
            case 'fundeb':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'PARECER DE APROVAÇAO CONTAS 2013 CONSELHO FUNDEB.pdf');
            break;
            case 'aprovsaude':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'PARECER DE APROVAÇAO CONTAS 2013 CONSELHO SAUDE.pdf');
            break;
            case 'respag':
                $file_path = public_path('Arquivos/pca/'.$pasta1.'/'.$pasta2.'/'.'RESTOS A PAGAR 2013.pdf');
            break;
        }

        return response()->file($file_path);
    }
}