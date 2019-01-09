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
        $dadosDb->select('CargoFuncao', 'TipoVinculo', 'LeiNumero');
        // $dadosDb->groupBy('CargoFuncao', 'TipoVinculo', 'ClasseNome', 'ClasseSigla');
        // groupBy para juntar cargos repetidos (mesmo cargo, mesmo tipo de vínculo, mesma classe, etc)
        $dadosDb->groupBy('CargoFuncao', 'TipoVinculo');
        $dadosDb->orderBy('TipoVinculo');
        $dadosDb = $dadosDb->get();
        
        $colunaDados = ['Cargo/Função', 'Tipo do Vínculo', 'Lei de Criação'];        
        $Navegacao = array(                            
            array('url' => '#' ,'Descricao' => 'Todos os Cargos e Funções')
        );

        return View('pessoal/estruturapessoal/tabelaEstruturaPessoal', compact('dadosDb', 'colunaDados', 'Navegacao'));
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
}