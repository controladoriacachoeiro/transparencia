<?php

namespace App\Http\Controllers\Pessoal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoal\EstruturaPessoalModel;
use App\Auxiliar as Auxiliar;

class EstruturaPessoalController extends Controller
{
    //GET
    public function CargosFuncoes(){        
        $dadosDb = EstruturaPessoalModel::orderBy('CargoFuncao');
        $dadosDb->select('CargoFuncao', 'TipoVinculo', 'ClasseNome', 'ClasseSigla');        
        $dadosDb->groupBy('CargoFuncao');                
        $dadosDb = $dadosDb->get();

        $colunaDados = [ 'Cargo/Funcao', 'Tipo do Vínculo','Classe', 'Sigla da Classe'];        
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

        $dadosDb = EstruturaPessoalModel::orderBy('SiglaReferencia');        
        $dadosDb->where('CargoFuncao', '=', $CargoFuncao);
        $dadosDb = $dadosDb->get();

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