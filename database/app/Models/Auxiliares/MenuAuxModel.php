<?php

namespace App\Models\Auxiliares;

use Illuminate\Database\Eloquent\Model;

class MenuAuxModel
{
    public function menuPrincipal(){
        $menu = [
            'Despesas' => [
                'Empenhos' => [ 'Órgãos','Fornecedores','Funções', 'Elementos','Nota' ],
                'Liquidações' => [ 'Órgãos','Fornecedores','Funções', 'Elementos','Nota' ],
                'Pagamentos' => [ 'Órgãos','Fornecedores','Funções', 'Elementos','Nota' ]
            ],
            'Receitas' => [
                'Lançamentos' => [ 'Órgãos','Categorias' ],
                'Recebimentos' => [ 'Órgãos','Categorias' ]
            ],
            'Licitações e Contratos' => [
                'Andamentos',
                'Concluidos',
                'Contratos',
                'Bens e Produtos Adquiridos'
            ],
            'Gestão Fiscal' => [
                'Registro Orçamentário' => [ 'PPA', 'LDO', 'LOA' ],
                'Relatório LRF' => [ 'RGF', 'RREO' ],
                'Prestações de Contas',
                'Auditorias e Inspeções'
            ],
            'Patrimônio' => [
                'Bens Móveis',
                'Bens Imóveis',
                'Frota'
            ],
            'Pessoal' => [
                'Estrutura de Pessoal',
                'Servidores' => [ 'Órgãos', 'Funções', 'Cargos','Matrícula' ],
                'Folha de Pagamento',
                'Concurso Público'
            ],
            'Convênios e Transferências' => [
                'Recursos Recebidos da União',
                'Recursos Recebidos do Estado',
                'Recursos Concedidos Pelo Município'
            ],
            'Mais Informações' => [
                'Obras',
                'Outros'
            ],
        ];

        return $menu;
    }

    // function simplificarString($string){
    //     $str = $string;
    //     $str = str_replace(['Á','Ã','Â','À'],'A', $str);
    //     $str = str_replace(['á','ã','â','à'],"a", $str);
    //     $str = str_replace(['É','Ê'],"E", $str);
    //     $str = str_replace(['é','ê'],"e", $str);
    //     $str = str_replace(['Ó','Õ','Ô'],"O", $str);
    //     $str = str_replace(['ó','õ','ô'],"o", $str);
    //     $str = str_replace(['Í'],"I", $str);
    //     $str = str_replace(['í'],"i", $str);
    //     $str = str_replace(['Ú'],"U", $str);
    //     $str = str_replace(['ú'],"u", $str);
    //     $str = str_replace(['Ç'],"C", $str);
    //     $str = str_replace(['ç'],"c", $str);
    //     $str = strtolower($str);

    //     return $str;
    // }
}