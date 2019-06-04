<?php

namespace App\Http\Controllers\Pessoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoal\EstruturaPessoalModel;
use App\Models\Pessoal\ServidorModel;
use App\Auxiliar as Auxiliar;

class EstruturaPessoalController extends Controller
{
    //GET
    public function CargosFuncoes(){        
        $dadosDb = EstruturaPessoalModel::orderBy('CargoFuncao');
        $dadosDb->selectRaw('EstruturaID, CargoFuncao, LeiNumero, SUM(VagasAberto) as VagasAberto');
        $dadosDb->groupBy('CargoFuncao');
        $dadosDb = $dadosDb->get();

        $arrayTipoVinculo = ['Afastado', 'Agente Político', 'Aposentado', 'Celetista', 'Comissionado', 'Contrato', 'Contrato Determinado', 'Contrato Indeterminado', 'Efetivo', 'Efetivo/Comissionado', 'Eleito', 'Establitário', 'Estagiário', 'Estatutario', 'Inativo', 'Outros', 'Pensionista', 'Suplementar (Inativado)'];
        
        // Pega a quantidade de servidores que trabalham naquele cargo e com aquele vínculo, já que eu não recebo essa informação na view
        $dadosDb2 = ServidorModel::orderBy('Cargo');
        $dadosDb2->selectRaw('Cargo, count(*) as Quantidade');
        $dadosDb2->where('Situacao', '<>', 'Demitido');
        $dadosDb2->groupBy('Cargo');
        $dadosDb2 = $dadosDb2->get();

        foreach($dadosDb as $dados){
            $dados->VagasOcupadas = 0;
        }

        foreach($dadosDb as $dados){
            foreach($dadosDb2 as $dados2){
                if($dados->CargoFuncao == $dados2->Cargo){
                    $dados->VagasOcupadas = $dados2->Quantidade;
                }
            }
        }

        $colunaDados = ['Cargo/Função', 'Vagas em Aberto', 'Vagas Ocupadas', 'Lei de Criação'];        
        $Navegacao = array(                            
            array('url' => '#' ,'Descricao' => 'Todos os Cargos e Funções')
        );

        return View('pessoal/estruturapessoal/tabelaEstruturaPessoal', compact('dadosDb', 'dadosDb2', 'arrayTipoVinculo', 'colunaDados', 'Navegacao'));
    }

    // //GET
    // public function CargosFuncoesValores(){        
    //     $dadosDb = EstruturaPessoalModel::orderBy('CargoFuncao');
    //     $dadosDb->select('CargoFuncao', 'TipoVinculo', 'ClasseNome', 'ClasseSigla');        
    //     $dadosDb->groupBy('CargoFuncao');                
    //     $dadosDb = $dadosDb->get();

    //     $colunaDados = [ 'Cargo/Funcao', 'Tipo do Vínculo','Classe', 'Sigla da Classe'];        
    //     $Navegacao = array(                            
    //             array('url' => '#' ,'Descricao' => 'Todos os Cargos e Funções')
    //     );

    //     return View('pessoal/estruturapessoal/tabelaEstruturaPessoal', compact('dadosDb', 'colunaDados', 'Navegacao'));
    // }

    //GET        
    public function showCargoFuncao(){
        $CargoFuncao =  isset($_GET['CargoFuncao']) ? $_GET['CargoFuncao'] : 'null';
        $CargoFuncao = Auxiliar::desajusteUrl($CargoFuncao);

        $TipoVinculo =  isset($_GET['TipoVinculo']) ? $_GET['TipoVinculo'] : 'null';
        $TipoVinculo = Auxiliar::desajusteUrl($TipoVinculo);

        $dadosDb = EstruturaPessoalModel::orderBy('SiglaReferencia');        
        $dadosDb->where('CargoFuncao', '=', $CargoFuncao);
        $dadosDb->where('TipoVinculo', '=', $TipoVinculo);
        $dadosDb = $dadosDb->get();

        // Pega a quantidade de servidores que trabalham naquele cargo e com aquele vínculo, já que eu não recebo essa informação na view
        $dadosDb2 = ServidorModel::orderBy('Cargo');
        $dadosDb2->selectRaw('Cargo, TipoVinculo, count(*) as Quantidade');
        $dadosDb2->where('Cargo', '=', $CargoFuncao);
        $dadosDb2->where('TipoVinculo', '=', $TipoVinculo);
        $dadosDb2->where('Situacao', '<>', 'Demitido');
        $dadosDb2->groupBy('TipoVinculo', 'Cargo');
        $dadosDb2 = $dadosDb2->get();

        // Atribuindo a quantidade de vagas ocupadas
        if($dadosDb2->isEmpty()){
            $dadosDb[0]->Quantidade = 0;
        } else{
            $dadosDb[0]->Quantidade = $dadosDb2[0]->Quantidade;
        }

        //Os valores de cada linha corresponde ao UPV (Unidade Padrão de Vencimento), que é o valor em dinheiro que se multiplica
        //pelo valor da tabela. Sendo assim atualmente a UPV está no valor de R$8,54, então será multiplicado gerando assim o valor
        //di salário já convertido em reais.
        $valorUPV = 8.54;
        for ($i = 0; $i < count($dadosDb); $i++){
            $dadosDb[$i]->ValorReferencia = $dadosDb[$i]->ValorReferencia * $valorUPV;
        }        

        return json_encode($dadosDb);
    }

    // GET
    public function detalharPorCargo($cargo){
        $cargo = Auxiliar::desajusteUrl($cargo);

        $dadosDb = EstruturaPessoalModel::orderBy('TipoVinculo');        
        $dadosDb->where('CargoFuncao', '=', $cargo);
        $dadosDb->orderBy('LeiNumero');
        $dadosDb = $dadosDb->get();

        $dadosDb2 = ServidorModel::orderBy('TipoVinculo');
        $dadosDb2->selectRaw('Cargo, TipoVinculo, count(*) as Quantidade');
        $dadosDb2->where('Situacao', '<>', 'Demitido');
        $dadosDb2->where('Cargo', '=', $cargo);
        $dadosDb2->groupBy('TipoVinculo');
        $dadosDb2 = $dadosDb2->get();

        foreach($dadosDb as $dados){
            $dados->VagasOcupadas = 0;
        }

        foreach($dadosDb as $dados){
            foreach($dadosDb2 as $dados2){
                if($dados->TipoVinculo == $dados2->TipoVinculo){
                    $dados->VagasOcupadas = $dados2->Quantidade;
                }
            }
        }

        $colunaDados = ['Cargo/Função', 'Tipo de Vínculo', 'Vagas em Aberto', 'Vagas Ocupadas', 'Lei de Criação'];        
        $Navegacao = array(
            array('url' => '/estruturapessoal' ,'Descricao' => 'Filtro'),                      
            array('url' => '#' ,'Descricao' => $cargo)
        );

        return View('pessoal/estruturapessoal/tabelaEstruturaPessoalCargo', compact('dadosDb', 'arrayTipoVinculo', 'colunaDados', 'Navegacao'));
    }
}