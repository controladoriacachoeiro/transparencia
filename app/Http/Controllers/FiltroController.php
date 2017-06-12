<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Auxiliares\AuxiliarDespesaModel;
use App\Models\Auxiliares\AuxiliarPessoalModel;
use App\Models\Auxiliares\MenuAuxModel;

class FiltroController extends Controller
{
    //$consulta exemplo: Despesas, Receitas...
    //$subConsulta exemplo: Empenhos, Pagamentos...
    //tipoConsulta exemplo: orgaos, funcoes, fornecedores / são as possibilidades
    //de filtros que podem ser feitos
    public function index($consulta, $subConsulta, $tipoConsulta)
    {
        include (base_path().'/public/functionsphp/FunctionsAux.php');

        $dados = ['','',''];
        // Define o campo na qual poderá ser filtrado
        // Switch para verificar de qual campo será buscado os dados para
        // preencher a label do filtro em questão, ex: empenho por orgão, todos os órgãos da tabela auxiliar.

        //Variável responsavel pelo nome da coluna do Banco de dados para buscar os dados
        $campoFiltro = array('','','');
        
        //tipo = select é quando busca no banco, text é quando tem que digitar.
        $labelFiltro = array
            (
            array('Ativo' => true ,'Nome' => 'label1', 'Tipo' => 'select'),
            array('Ativo' => false ,'Nome' => 'label2', 'Tipo' => 'select'),
            array('Ativo' => false ,'Nome' => 'label3', 'Tipo' => 'select')
            );

        //Variável para controlar se será mostrado na View filtro_principal o período da data
        $boolPeriodo = true;        
        
        //Variável de objeto responsável por guardar os nomes das labels que estará na view Filtro_principal
        if ($subConsulta == 'servidores') {
             $labelFiltro[1]['Nome'] = 'Tipo Vínculo';
        }
        switch ($tipoConsulta) {
            // Despesas + Receitas + servidores
            case 'orgaos':
                 $labelFiltro[0]['Nome'] = 'Órgãos';                 
                switch ($subConsulta) {
                    // Despesas
                    case 'empenhos':
                        $campoFiltro[0] = 'UnidadeGestoraEmpenho';                        
                        break;
                    case 'liquidacoes':
                        $campoFiltro[0] = 'UnidadeGestoraLiquidacao';
                        break;
                    case 'pagamentos':
                        $campoFiltro[0] = 'UnidadeGestoraPagamento';
                        break;
                    case 'restosapagar':
                        $campoFiltro[0] = 'UnidadeGestoraRestos';
                        break;
                    // Receitas
                    case 'lancamentos':
                        $campoFiltro[0] = '*';
                        break;
                    case 'recebimentos':
                        $campoFiltro[0] = '*';
                        break;
                    // Servidores
                    case 'servidores':
                        $campoFiltro[0] = 'OrgaoLotacaoServidor';
                        // $labelFiltro[1]['Nome'] = 'Vínculo';
                        // $labelFiltro[1]['Ativo'] = true;
                        // $campoFiltro[1] = 'TipoVinculoServidor';
                        break;
                }
                break;
            // Despesas + servidores
            case 'funcoes':
                 $labelFiltro[0]['Nome'] = 'Funções';
                switch ($subConsulta) {
                    // Despesas
                    case 'empenhos':
                        $campoFiltro[0] = 'FuncaoEmpenho';
                        break;
                    case 'liquidacoes':
                        $campoFiltro[0] = 'FuncaoLiquidacao';
                        break;
                    case 'pagamentos':
                        $campoFiltro[0] = 'FuncaoPagamento';
                        break;
                    case 'restosapagar':
                        $campoFiltro[0] = 'FuncaoRestos';
                        break;
                    // Servidores
                    case 'servidores':
                        $campoFiltro[0] = 'FuncaoServidor';
                        $labelFiltro[1]['Nome'] = 'Vínculo';
                        $labelFiltro[1]['Ativo'] = true;
                        $campoFiltro[1] = 'TipoVinculoServidor';
                        break;
                }
                break;
            // Despesas
            case 'fornecedores':
                 $labelFiltro[0]['Nome'] = 'Fornecedores';
                switch ($subConsulta) {
                    case 'empenhos':
                        $campoFiltro[0] = 'BeneficiarioEmpenho';
                        break;
                    case 'liquidacoes':
                        $campoFiltro[0] = 'BeneficiarioLiquidacao';
                        break;
                    case 'pagamentos':
                        $campoFiltro[0] = 'BeneficiarioPagamento';
                        break;
                    case 'restosapagar':
                        $campoFiltro[0] = 'BeneficiarioRestos';
                        break;
                }
                break;
            case 'elementos':
                 $labelFiltro[0]['Nome'] = 'Elementos';
                switch ($subConsulta) {
                    case 'empenhos':
                        $campoFiltro[0] = 'ElemDespesaEmpenho';
                        break;
                    case 'liquidacoes':
                        $campoFiltro[0] = 'ElemDespesaLiquidacao';
                        break;
                    case 'pagamentos':
                        $campoFiltro[0] = 'ElemDespesaPagamento';
                        break;
                    case 'restosapagar':
                        $campoFiltro[0] = 'ElemDespesaRestos';
                        break;
                }
                break;
            //Despesas
            case 'nota':
                $labelFiltro[0]['Nome'] = 'Número da Nota';
                $labelFiltro[0]['Tipo'] = 'text';
                $boolPeriodo = false;
                break;
            // Receitas
            case 'categorias':
                 $labelFiltro[0]['Nome'] = 'Categorias';
                switch ($subConsulta) {
                    case 'lancamentos':
                        $campoFiltro[0] = '*';
                        break;
                    case 'recebimentos':
                        $campoFiltro[0] = '*';
                        break;
                }
                break;
            // Licitações e Contratos
            case 'andamentos':
                $labelFiltro[0]['Nome'] = 'Andamentos';
                $campoFiltro[0] = '*';
                break;
            case 'concluidos':
                $labelFiltro[0]['Nome'] = 'Concluidos';
                $campoFiltro[0] = '*';
                break;
            case 'contratos':
                $labelFiltro[0]['Nome'] = 'Contratos';
                $campoFiltro[0] = '*';
                break;
            case 'bens_produtos_adquiridos':
                $labelFiltro[0]['Nome'] = 'Bens e Produtos Adquiridos';
                $campoFiltro[0] = '*';
                break;
            // Gestão Fiscal
            case 'ppa':
                $labelFiltro[0]['Nome'] = 'PPA';
                $campoFiltro[0] = '*';
                break;
            case 'ldo':
                $labelFiltro[0]['Nome'] = 'LDO';
                $campoFiltro[0] = '*';
                break;
            case 'loa':
                $labelFiltro[0]['Nome'] = 'LOA';
                $campoFiltro[0] = '*';
                break;
            case 'rgf':
                $labelFiltro[0]['Nome'] = 'RGF';
                $campoFiltro[0] = '*';
                break;
            case 'rreo':
                $labelFiltro[0]['Nome'] = 'RREO';
                $campoFiltro[0] = '*';
                break;
            case 'prestacoes_contas':
                $labelFiltro[0]['Nome'] = 'Prestações de Contas';
                $campoFiltro[0] = '*';
                break;
            case 'auditorias_inspecoes':
                $labelFiltro[0]['Nome'] = 'Auditorias e Inspeções';
                $campoFiltro[0] = '*';
                break;
            // Patrimônio
            case 'bens_moveis':
                $labelFiltro[0]['Nome'] = 'Bens Móveis';
                $campoFiltro[0] = '*';
                break;
            case 'bens_imoveis':
                $labelFiltro[0]['Nome'] = 'Bens Imóveis';
                $campoFiltro[0] = '*';
                break;
            case 'frota':
                $labelFiltro[0]['Nome'] = 'Frota';
                $campoFiltro[0] = '*';
                break;
            // Pessoal
            case 'nome':
                $labelFiltro[0]['Nome'] = 'Nome';
                $labelFiltro[0]['Tipo'] = 'text';
                $boolPeriodo = false;
                // $labelFiltro[1]['Nome'] = 'Vínculo';
                // $labelFiltro[1]['Ativo'] = true;
                // $campoFiltro[1] = 'TipoVinculoServidor';
                break;
            case 'cargofuncao':
                $labelFiltro[0]['Nome'] = 'Cargos/Funções';
                $campoFiltro[0] = 'CargoFuncaoServidor';
                $boolPeriodo = false;
                // $labelFiltro[1]['Nome'] = 'Vínculo';
                // $labelFiltro[1]['Ativo'] = true;
                // $campoFiltro[1] = 'TipoVinculoServidor';
                break;
            case 'matricula':
                $labelFiltro[0]['Nome'] = 'Número da Matrícula';
                $labelFiltro[0]['Tipo'] = 'text';
                $boolPeriodo = false;
                break;
            case 'estrutura_pessoal':
                $labelFiltro[0]['Nome'] = 'Estrutura de Pessoal';
                $campoFiltro[0] = '*';
                break;
            // case 'servidores':
            //     $labelFiltro[0]['Nome'] = 'Servidores';
            //     $campoFiltro[0] = '*';
            //     break;
            case 'folha_pagamento':
                $labelFiltro[0]['Nome'] = 'Folha de Pagamento';
                $campoFiltro[0] = '*';
                break;
            case 'concurso_publico':
                $labelFiltro[0]['Nome'] = 'Concurso Público';
                $campoFiltro[0] = '*';
                break;
            // Convênios e Transferências
            case 'recursos_recebidos_uniao':
                $labelFiltro[0]['Nome'] = 'Recursos Recebidos da União';
                $campoFiltro[0] = '*';
                break;
            case 'recursos_recebidos_estado':
                $labelFiltro[0]['Nome'] = 'Recursos Recebidos do Estado';
                $campoFiltro[0] = '*';
                break;
            case 'recursos_concedidos_pelo_municipio':
                $labelFiltro[0]['Nome'] = 'Recursos Concedidos Pelo Município';
                $campoFiltro[0] = '*';
                break;
            // Mais Informações
            case 'obras':
                $labelFiltro[0]['Nome'] = 'Obras';
                $campoFiltro[0] = '*';
                break;
            case 'outros':
                $labelFiltro[0]['Nome'] = 'Outros';
                $campoFiltro[0] = '*';
                break;
        }

        // Select nas tabelas auxiliares
        // if($tipoConsulta != 'nota'){
        switch ($consulta) {
            case 'despesas':
                for ($i = 0; $i < count($campoFiltro); $i++) {
                    if ($campoFiltro[$i] != '') {
                        $dados[$i] = AuxiliarDespesaModel::select($campoFiltro[0])
                        ->whereNotNull($campoFiltro[0])
                        ->get();
                    }
                }
            
                break;
            // case 'receitas':
            //     break;
            // case 'licitacoes_contratos':
            //     break;
            // case 'gestao_fiscal':
            //     break;
            // case 'patrimonio':
            //     break;
            case 'pessoal':
                $boolPeriodo = false;
                for ($i = 0; $i < count($campoFiltro); $i++) {
                    if ($campoFiltro[$i] != '') {
                        $dados[$i] = AuxiliarPessoalModel::select($campoFiltro[$i])
                        ->whereNotNull($campoFiltro[$i])
                        ->get();
                    }
                }
                break;
            // case 'convenios_transferencias':
            //     break;
            // case 'informacoes':
            //     break;
            // default:
            //     $campoFiltro[0] = 'UnidadeGestoraEmpenho';
            //     $dados = AuxiliarDespesaModel::select($campoFiltro[0])
            //     ->whereNotNull($campoFiltro[0])
            //     ->get();
            //     break;
        }
        for ($i = 0; $i < count($dados); $i++) {
            $dados[$i] = str_replace("'", "`", $dados[$i]);
            // $dados[$i] = str_replace("\"", "\\\"", $dados[$i]);
        }

        $arrayDataFiltro = array
            (
            array(),
            array(),
            array()
            );
        
        for ($i = 0; $i < count($dados); $i++) {
            $json = json_decode($dados[$i], true);
            if ($json != null) {
                foreach ($json as $k => $v) {
                    array_push($arrayDataFiltro[$i], array_values($v)[0]);
                }
            }
        }
        $arrayDataFiltro = json_encode($arrayDataFiltro);
        //Necessário devido a um problema com as aspas duplas na string.
        //O JavaScript não intende as aspas e acha q é para fechar a string,
        //ocasionando assim ama exceção.
        // $arrayDataFiltro = str_replace("\"", "\\\"", $arrayDataFiltro);

        //Procedimento necessário para passar a variável para a view
        $labelFiltro = json_encode($labelFiltro);
        $boolPeriodo = json_encode($boolPeriodo);
        $dados = $arrayDataFiltro;
        //Para Gerar o título e subtítulo da view do filtro. 
        $titulo = PopularTituloFiltro($subConsulta, $tipoConsulta);
        // $titulo = json_encode($titulo);        

        return View('filtros.filtro_principal', compact('consulta', 'subConsulta', 'tipoConsulta', 'labelFiltro', 'dados', 'boolPeriodo', 'titulo'));
    }

    public function filtrar()
    {
        include (base_path().'/public/functionsphp/FunctionsAux.php');
        
        $consulta =  isset($_POST['hiddenConsulta']) ? $_POST['hiddenConsulta'] : 'null';
        $subConsulta =  isset($_POST['hiddenSubConsulta']) ? $_POST['hiddenSubConsulta'] : 'null';
        $tipoConsulta =  isset($_POST['hiddenTipoConsulta']) ? $_POST['hiddenTipoConsulta'] : 'null';
        $tipoConsultaSelecionada = isset($_POST['selectTipoConsulta']) ? $_POST['selectTipoConsulta'] : 'null';
        if ($tipoConsultaSelecionada === 'null') {
            $tipoConsultaSelecionada = isset($_POST['txtTipoConsulta']) ? $_POST['txtTipoConsulta'] : 'null';
        }
        $selectPeriodo = isset($_POST['selectPeriodo']) ? $_POST['selectPeriodo'] : 'null';
        $datetimepickerDataInicio = isset($_POST['datetimepickerDataInicio']) ? date("Y-m-d", strtotime(str_replace('/', '-', $_POST['datetimepickerDataInicio']))) : 'null';
        $datetimepickerDataFim = isset($_POST['datetimepickerDataFim']) ? date("Y-m-d", strtotime(str_replace('/', '-', $_POST['datetimepickerDataFim']))) : 'null';
        $selectAno = isset($_POST['selectAno']) ? $_POST['selectAno'] : 'null';
        $selectMes = isset($_POST['selectMes']) ? $_POST['selectMes'] : 'null';
        $selectBimestre = isset($_POST['selectBimestre']) ? $_POST['selectBimestre'] : 'null';
        $selectTrimestre = isset($_POST['selectTrimestre']) ? $_POST['selectTrimestre'] : 'null';
        $selectQuadrimestre = isset($_POST['selectQuadrimestre']) ? $_POST['selectQuadrimestre'] : 'null';
        $selectSemestre = isset($_POST['selectSemestre']) ? $_POST['selectSemestre'] : 'null';
        
        $parametros = [
            'consulta' => $consulta,
            'subConsulta' => $subConsulta,
            'tipoConsulta' => $tipoConsulta,
            'nivel1' => $tipoConsultaSelecionada
        ];
        
        $parametros = ajusteArrayUrl($parametros);
        
        session_start();
        $_SESSION["parametrosTemporal"] = [
            'periodo' => $selectPeriodo,
            'dataInicio' => $datetimepickerDataInicio,
            'dataFim' => $datetimepickerDataFim,
            'ano' => $selectAno,
            'mes' => $selectMes,
            'bimestre' => $selectBimestre,
            'trimestre' => $selectTrimestre,
            'quadrimestre' => $selectQuadrimestre,
            'semestre' => $selectSemestre
        ];
        
         return redirect()->route('rota.consulta', $parametros);
    }

    public function subConsulta($consulta, $subConsulta)
    {
        return View('filtros.subConsulta', compact('consulta', 'subConsulta'));
    }

    public function consulta($consulta)
    {
        return View('filtros.consulta', compact('consulta'));
    }
    
}
