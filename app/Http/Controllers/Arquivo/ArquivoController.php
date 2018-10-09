<?php

namespace App\Http\Controllers\Arquivo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arquivo\ArquivoModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Storage;

class ArquivoController extends Controller
{
    //GET
    public function carregarArquivosPPA(){
        $dadosDb = ArquivoModel::orderBy('nomeExibicao');
        
        $dadosDb->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao');
        $dadosDb->where('Permissao.idPermissao', '=', '1');
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');

        $dadosDb = $dadosDb->get();
        
        return view('gestaoFiscal.legislacaoOrcamentaria.ppa', compact('dadosDb'));
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

    //GET
    public function carregarArquivosLOA(){
        $dadosDb = ArquivoModel::orderBy('nomeExibicao');
        
        $dadosDb->select('idArquivo', 'nomeExibicao', 'nomeArquivo', 'descricao');
        $dadosDb->where('Permissao.idPermissao', '=', '3');
        $dadosDb->join('Permissao', 'Arquivo.idPermissao', '=', 'Permissao.idPermissao');

        $dadosDb = $dadosDb->get();
        
        return view('gestaoFiscal.legislacaoOrcamentaria.loa', compact('dadosDb'));
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

        // foreach($dadosDb as $dados){
        //     $arrayDadosDb[] = $dados;
        // }

        // usort($arrayDadosDb,"strnatcmp");

        // $dadosDb = $arrayDadosDb;


        return view('gestaoFiscal.relatorioLrf.rreo', compact('dadosDb', 'dadosDb2', 'dadosDb3'));
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

    public function MostrarArquivo($permissao, $idArquivo){
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        $dadosDb->where('idArquivo', '=', $idArquivo);
        $dadosDb = $dadosDb->first();

        if(($dadosDb != null) && (file_exists(storage_path('app/' . $permissao . '/' . $dadosDb->nomeArquivo)))){

            $file_path = storage_path('app/' . $permissao . '/' . $dadosDb->nomeArquivo);

            $contType = File::mimeType($file_path);
            $extensao = pathinfo($file_path, PATHINFO_EXTENSION);  

            $headers = array(
                'Content-Type' => $contType,
                'Content-Disposition' => 'filename="'. $dadosDb->nomeExibicao . '.' . $extensao . '"'                
            );

            return response()->file($file_path, $headers);
        } else{
            return "Arquivo não encontrado";
        }
    }

    public function MostrarArquivoAno($permissao, $ano, $idArquivo){
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        $dadosDb->where('idArquivo', '=', $idArquivo);
        $dadosDb = $dadosDb->first();

        if(($dadosDb != null) && (file_exists(storage_path('app/' . $permissao . '/'. $ano . '/' . $dadosDb->nomeArquivo)))){
                      
            $file_path = storage_path('app/' . $permissao . '/'. $ano . '/' . $dadosDb->nomeArquivo);
            
            $contType = File::mimeType($file_path);
            $extensao = pathinfo($file_path, PATHINFO_EXTENSION);  

            $headers = array(
                'Content-Type' => $contType,
                'Content-Disposition' => 'filename="'. $dadosDb->nomeExibicao . '.' . $extensao . '"'                
            );
            
            return response()->file($file_path, $headers);
        } else{
            return "Arquivo não encontrado";
        }
    }

    public function MostrarArquivoAnoPeriodoUG($permissao, $ano, $periodoug, $idArquivo){         
        $dadosDb = ArquivoModel::orderBy('idArquivo');
        $dadosDb->where('idArquivo', '=', $idArquivo);
        $dadosDb = $dadosDb->first();

        if(($dadosDb != null) && (file_exists(storage_path('app/' . $permissao . '/'. $ano . '/' . $periodoug . '/' . $dadosDb->nomeArquivo)))){

            $file_path = storage_path('app/' . $permissao . '/'. $ano . '/' . $periodoug . '/' . $dadosDb->nomeArquivo);

            $contType = File::mimeType($file_path);
            $extensao = pathinfo($file_path, PATHINFO_EXTENSION);  

            $headers = array(
                'Content-Type' => $contType,
                'Content-Disposition' => 'filename="'. $dadosDb->nomeExibicao . '.' . $extensao . '"'                
            );

            return response()->file($file_path, $headers);
        } else{
            return "Arquivo não encontrado";
        }
    }
    
}