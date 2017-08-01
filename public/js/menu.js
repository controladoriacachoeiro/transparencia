//Script para destacar a pagina que esta sendo acessada
//pega url da pagina divide de acordo com as "/" 
$(document).ready(function() {
    var url = window.location.pathname;
    url = url.toString();
    var modulo = url.split('/');
    $('li').removeClass("active");
    switch (modulo[1]) {
        case "portal":
            $('#Portal').addClass("active");
            $('#InfoGerais').addClass("active");
            $('#OqueTem').addClass("activeItem");
            break;
        case "lai":
            $('#Portal').addClass("active");
            $('#InfoGerais').addClass("active");
            $('#LAI').addClass("activeItem");
            break;
        case "estruturaorganizacional":
            $('#Portal').addClass("active");
            $('#InfoGerais').addClass("active");
            $('#EstrutOrg').addClass("activeItem");
            break;
        case "glossario":
            $('#Portal').addClass("active");
            $('#Glossario').addClass("activeItem");
            break;
        case "legislacao":
            $('#Portal').addClass("active");
            $('#Legislacao').addClass("activeItem");
            break;
        case "faq":
            $('#Portal').addClass("active");
            $('#Faq').addClass("activeItem");
            break;
        case "quemsomos":
            $('#Portal').addClass("active");
            $('#QuemSomos').addClass("activeItem");
            break;




        case "despesas":
            switch (modulo[2]) {
                case "empenhos":
                    switch (modulo[3]) {
                        case "orgaos":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Empenhos').addClass("active");
                            $('#EmpenhosOrgaos').addClass("activeItem");
                            break;
                        case "fornecedores":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Empenhos').addClass("active");
                            $('#EmpenhosFornecedores').addClass("activeItem");
                            break;
                        case "funcoes":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Empenhos').addClass("active");
                            $('#EmpenhosFuncoes').addClass("activeItem");
                            break;
                        case "elementos":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Empenhos').addClass("active");
                            $('#EmpenhosElementos').addClass("activeItem");
                            break;
                        case "nota":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Empenhos').addClass("active");
                            $('#EmpenhosNota').addClass("activeItem");
                            break;
                    }
                    break;
                case "liquidacoes":
                    switch (modulo[3]) {
                        case "orgaos":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Liquidacoes').addClass("active");
                            $('#LiquidacoesOrgaos').addClass("activeItem");
                            break;
                        case "fornecedores":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Liquidacoes').addClass("active");
                            $('#LiquidacoesFornecedores').addClass("activeItem");
                            break;
                        case "funcoes":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Liquidacoes').addClass("active");
                            $('#LiquidacoesFuncoes').addClass("activeItem");
                            break;
                        case "elementos":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Liquidacoes').addClass("active");
                            $('#LiquidacoesElementos').addClass("activeItem");
                            break;
                        case "nota":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Liquidacoes').addClass("active");
                            $('#LiquidacoesNota').addClass("activeItem");
                            break;
                    }
                    break;
                case "pagamentos":
                    switch (modulo[3]) {
                        case "orgaos":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Pagamentos').addClass("active");
                            $('#PagamentosOrgaos').addClass("activeItem");
                            break;
                        case "fornecedores":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Pagamentos').addClass("active");
                            $('#PagamentosFornecedores').addClass("activeItem");
                            break;
                        case "funcoes":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Pagamentos').addClass("active");
                            $('#PagamentosFuncoes').addClass("activeItem");
                            break;
                        case "elementos":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Pagamentos').addClass("active");
                            $('#PagamentosElementos').addClass("activeItem");
                            break;
                        case "nota":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Pagamentos').addClass("active");
                            $('#PagamentosNota').addClass("activeItem");
                            break;
                    }
                    break;
                case "restosapagar":
                    switch (modulo[3]) {
                        case "orgaos":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Restos-A-Pagar').addClass("active");
                            $('#RestosOrgaos').addClass("activeItem");
                            break;
                        case "fornecedores":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Restos-A-Pagar').addClass("active");
                            $('#RestosFornecedores').addClass("activeItem");
                            break;
                        case "funcoes":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Restos-A-Pagar').addClass("active");
                            $('#RestosFuncoes').addClass("activeItem");
                            break;
                        case "elementos":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Restos-A-Pagar').addClass("active");
                            $('#RestosElementos').addClass("activeItem");
                            break;
                        case "nota":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Restos-A-Pagar').addClass("active");
                            $('#RestosNota').addClass("activeItem");
                            break;
                    }
                    break;
            }
            break;
        case "receitas":
            $('#Receitas').addClass("active");
            switch (modulo[2]) {
                case "lancamentos":
                    $('#Lancamentos').addClass("active");
                    switch (modulo[3]) {
                        case "orgao":
                            $('#LancamentosOrgao').addClass("activeItem");
                            break;
                    }
                    break;
                case "recebimentos":
                    $('#Recebimentos').addClass("active");
                    switch (modulo[3]) {
                        case "orgao":
                            $('#RecebimentosOrgao').addClass("activeItem");
                            break;
                        case "categoria":
                            $('#RecebimentosCategoria').addClass("activeItem");
                            break;
                    }
                    break;
            }
            break;
        case "licitacoescontratos":
            $('#LicitacoesContratos').addClass("active");
            switch (modulo[2]) {
                case "andamento":
                    $('#LCAndamento').addClass("activeItem");
                    break;
                case "contratos":
                    $('#LCContratos').addClass("activeItem");
                    break;
                case "bensadquiridos":
                    $('#LCBensAdquiridos').addClass("activeItem");
                    break;
            }
            break;

        case "gestaofiscal":
            $('#GestaoFiscal').addClass("active");
            switch (modulo[2]) {
                case "legislacao":
                    $('#LegislacaoOrc').addClass("active");
                    switch (modulo[3]) {
                        case "ppa":
                            $('#PPA').addClass("activeItem");
                            break;
                        case "ldo":
                            $('#LDO').addClass("activeItem");
                            break;
                        case "loa":
                            $('#LOA').addClass("activeItem");
                            break;
                    }
                    break;
                case "lrf":
                    $('#LRF').addClass("active");
                    switch (modulo[3]) {
                        case "rgf":
                            $('#RGF').addClass("activeItem");
                            break;
                        case "rreo":
                            $('#RREO').addClass("activeItem");
                            break;
                    }
                    break;
                case "prestacaoconta":
                    $('#PrestacaoConta').addClass("activeItem");
                    break;
                case "auditorias":
                    $('#AuditoriasInsp').addClass("activeItem");
                    break;
            }
            break;

            //Pessoal
        case "servidores":
            $('#Pessoal').addClass("active");
            $('#Servidores').addClass("active");
            switch (modulo[2]) {
                case "nome":
                    $('#ServidoresNome').addClass("activeItem");
                    break;
                case "orgao":
                    $('#ServidoresOrgao').addClass("activeItem");
                    break;
                case "cargofuncao":
                    $('#ServidoresCargoFuncao').addClass("activeItem");
                    break;
                case "matricula":
                    $('#ServidoresMatricula').addClass("activeItem");
                    break;
            }
            break;
        case "folhadepagamento":
            $('#Pessoal').addClass("active");
            $('#FolhaPagamento').addClass("activeItem");
            break;
        case "concursos":
            $('#Pessoal').addClass("active");
            $('#ConcursoPublico').addClass("activeItem");
            break;


        case "patrimonios":
            $('#Patrimonios').addClass("active");
            switch (modulo[2]) {
                case "almoxarifado":
                    $('#Almoxarifado').addClass("activeItem");
                    break;
                case "bensmoveis":
                    $('#BensMoveis').addClass("active");
                    switch (modulo[3]) {
                        case "orgao":
                            $('#BensMovOrgao').addClass("activeItem");
                            break;
                        case "numeropatrimonio":
                            $('#BensMovNumero').addClass("activeItem");
                    }
                    break;
                case "bensimoveis":
                    $('#BensImoveis').addClass("activeItem");
                    break;
                case "frota":
                    $('#Frota').addClass("activeItem");
                    break;
            }
            break;
        case "estruturapessoal":
            $('#Pessoal').addClass("active");
            $('#EstruturaP').addClass("activeItem");
            break;
        case "convenios":
            $('#Convenios').addClass("active");
            switch (modulo[2]) {
                case "recebidos":
                    $('#RecursosRecebidos').addClass("activeItem");
                    break;
                case "cedidos":
                    $('#RecursosConcedidos').addClass("activeItem");
                    break;
            }
            break;
        case "obras":
            $('#MaisInfo').addClass("active");
            $('#Obras').addClass("activeItem");
            break;
        case "dadosabertos":
            $('#DadosAbertos').addClass("active");
            $('#Downloads').addClass("active");
            switch (modulo[2]) {
                case "despesas":
                    $('#DownDespesas').addClass("activeItem");
                    break;
                case "receitas":
                    $('#DownReceitas').addClass("activeItem");
                    break;
                case "licitacoescontratos":
                    $('#DownLiciCon').addClass("activeItem");
                    break;
                case "patrimonios":
                    $('#DownPat').addClass("activeItem");
                    break;
                case "pessoal":
                    $('#DownPessoal').addClass("activeItem");
                    break;
                case "convenios":
                    $('#DownConvenios').addClass("activeItem");
                    break;
            }
            break;
        case "api":
            $('#DadosAbertos').addClass("active");
            $('#API').addClass("activeItem");
            break;
        default:
            $('li').removeClass("active");
            $('#Home').addClass("active");
    }
});