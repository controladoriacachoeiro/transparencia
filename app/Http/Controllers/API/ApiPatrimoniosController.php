<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicitacoesContratos\ContratosModel;
use App\Models\Patrimonio\AlmoxarifadoModel;
use App\Models\Patrimonio\BensMoveisModel;
use App\Models\Patrimonio\BensImoveisModel;
use App\Models\Patrimonio\FrotaModel;

class ApiPatrimoniosController extends Controller
{

    public function almoxarifado()
    {
        $dadosDb = AlmoxarifadoModel::orderBy('NomeAlmoxarifado');
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }

    public function almoxarifadoQuantidade($numPagina,$itensPorPagina)
    {
        $dadosDb = AlmoxarifadoModel::orderBy('NomeAlmoxarifado');

        $auxPagina = ($numPagina - 1) * $itensPorPagina;

        $dadosDb->limit($itensPorPagina);
        $dadosDb->offset($auxPagina);

        $dadosDb = $dadosDb->get();
        
        return Json_encode($dadosDb);
    }

    public function bensmoveis()
    {
        $dadosDb = BensMoveisModel::orderBy('IdentificacaoBem');
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }

    public function bensMoveisQuantidade($numPagina,$itensPorPagina)
    {
        $dadosDb = BensMoveisModel::orderBy('IdentificacaoBem');

        $auxPagina = ($numPagina - 1) * $itensPorPagina;

        $dadosDb->limit($itensPorPagina);
        $dadosDb->offset($auxPagina);

        $dadosDb = $dadosDb->get();
        
        return Json_encode($dadosDb);
    }

    public function frota()
    {
        $dadosDb = FrotaModel::orderBy('FrotaID');
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }

    public function bensimoveis()
    {
        $dadosDb = BensImoveisModel::orderBy('BemID');
        $dadosDb = $dadosDb->get();
        return Json_encode($dadosDb);
    }
}