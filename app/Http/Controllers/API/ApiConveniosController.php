<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Convenios\ConveniosCedidosModel;
use App\Models\Convenios\ConveniosRecebidosModel;

class ApiConveniosController extends Controller
{

    public function recebidos()
    {
        $dadosDb = ConveniosRecebidosModel::orderBy('DataCelebracao','desc');
        $dadosDb->select('DataCelebracao', 'PrazoVigencia', 'Objeto','ValorAReceber','ValorContrapartida');
        $dadosDb = $dadosDb->get();
        
        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
    }

    public function concedidos()
    {
        $dadosDb = ConveniosCedidosModel::orderBy('DataAssinatura','desc');
        $dadosDb->select('OrgaoConcedente', 'CNPJBeneficiario', 'NomeBeneficiario', 'NumeroConvenio', 'AnoConvenio', 'VigenciaInicial', 'VigenciaFinal', 'Objeto', 'ValorConvenio', 'ValorContrapartida', 'DataAssinatura', 'NumeroProcesso', 'AnoProcesso', 'Status', 'CategoriaConvenio');
        $dadosDb = $dadosDb->get();             

        return Json_encode($dadosDb, JSON_UNESCAPED_UNICODE);
    }

}