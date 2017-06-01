//Script para destacar a pagina que esta sendo acessada
//pega url da pagina divide de acordo com as "/" 
$(document).ready(function () {
    var url = window.location.pathname;
    url = url.toString();
    var modulo = url.split('/');
    switch (modulo[1]) {
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
                            $('#Restos_a_pagar').addClass("active");
                            $('#RestoOrgaos').addClass("activeItem");
                            break;
                        case "fornecedores":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Resto_a_Pagar').addClass("active");
                            $('#RestoFornecedores').addClass("activeItem");
                            break;
                        case "funcoes":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Resto_a_Pagar').addClass("active");
                            $('#RestoFuncoes').addClass("activeItem");
                            break;
                        case "elementos":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Resto_a_Pagar').addClass("active");
                            $('#RestoElementos').addClass("activeItem");
                            break;
                        case "nota":
                            $('li').removeClass("active");
                            $('#Despesas').addClass("active");
                            $('#Resto_a_Pagar').addClass("active");
                            $('#RestoNota').addClass("activeItem");
                            break;
                    }
                    break;
            }
            break;
        case "portal":
            $('li').removeClass("active");
            $('#Portal').addClass("active");
            $('#Oquee').addClass("activeItem");
            break;
        case "glossario":
            $('li').removeClass("active");
            $('#Portal').addClass("active");
            $('#Glossario').addClass("activeItem");
            break;
        case "legislacao":
            $('li').removeClass("active");
            $('#Portal').addClass("active");
            $('#Legislacao').addClass("activeItem");
            break;
        case "faq":
            $('li').removeClass("active");
            $('#Portal').addClass("active");
            $('#Faq').addClass("activeItem");
            break;
        case "mapasite":
            $('li').removeClass("active");
            $('#Portal').addClass("active");
            $('#Mapasite').addClass("activeItem");
            break;
        default:
            $('li').removeClass("active");
            $('#Home').addClass("active");
    }
});
