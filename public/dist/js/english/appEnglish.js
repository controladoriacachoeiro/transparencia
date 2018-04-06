
/* Scripts para tradução da página */


//verifica se o link contém a string avisando que a página está em inglês
if (window.location.href.indexOf("?english=on") != "-1"){
    criaCookie();
    mudaTexto();
}

//Se o cookie estiver setado como "on" e não ter o "english=on" na url, a página recarrega com o pedaço da url que estava faltando ("english=on")
if ($.cookie('english') == "on" && window.location.href.indexOf("?english=on") == "-1"){
    mudaTexto();
    window.location.assign(window.location.href + "?english=on");
}

$("#trocaIngles").click(function(){
    //se a página já estiver em inglês, então quando clicar no botão não vai acontecer nada
    if (window.location.href.indexOf("?english=on") == "-1"){
        //cria o cookie english com o valor "on" e recarrega a página
        criaCookie();
        window.location.assign(window.location.href + "?english=on");
        //location.reload();     
    }
});

$("#trocaPortugues").click(function(){
    //se a página já estiver em português, então quando clicar no botão não vai acontecer nada
    if (window.location.href.indexOf("?english=on") != "-1"){
        //apaga o cookie e recarrega a página, removendo a parte da url que falava que a página estava em inglês ("english=on")
        var resultado = window.location.href.replace('?english=on','');
        $.removeCookie('english', { path: '/' });
        window.location.href = resultado;
    }
});

function mudaTexto(){
    // Início App

    // Início Header 
    $('#menuInicio').html($('#menuInicio').attr("english"));
    $('#menuPortal').html($('#menuPortal').attr("english"));
    $('#menuGlossario').html($('#menuGlossario').attr("english"));
    $('#menuFaq').html($('#menuFaq').attr("english"));
    // Fim Header

    // Início Sidebar        
    $('#sidebarTermosColaboracao').html($('#sidebarTermosColaboracao').attr("english"));
    $('#sidebarMaisInformacoes').html($('#sidebarMaisInformacoes').attr("english"));
    $('#sidebarObras').html($('#sidebarObras').attr("english"));
    $('#sidebarEstruturaOrganizacional').html($('#sidebarEstruturaOrganizacional').attr("english"));
    $('#sidebarProgramasProjetosAcoes').html($('#sidebarProgramasProjetosAcoes').attr("english"));
    $('#sidebarInstrucoesNormativas').html($('#sidebarInstrucoesNormativas').attr("english"));
    $('#sidebarDiarioOficial').html($('#sidebarDiarioOficial').attr("english"));
    $('#sidebarAdministracaoIndireta').html($('#sidebarAdministracaoIndireta').attr("english"));
    // Fim Sidebar

    // Início Footer
    $('#footerPortal').html($('#footerPortal').attr("english"));
    $('#footerOQueTemNoPortal').html($('#footerOQueTemNoPortal').attr("english"));
    $('#footerGlossario').html($('#footerGlossario').attr("english"));
    $('#footerFAQ').html($('#footerFAQ').attr("english"));
    $('#footerQuemSomos').html($('#footerQuemSomos').attr("english"));
    $('#footerContatos').html($('#footerContatos').attr("english"));
    $('#footerTelefones').html($('#footerTelefones').attr("english"));
    $('#footerLicensa').html($('#footerLicensa').attr("english"));
    // Fim Footer

    // Início Frases/Palavras que se repetem
    // Menu principal
    $('.despesas').html($('.despesas').attr("english"));
    $('.receitas').html($('.receitas').attr("english"));
    $('.licitacoesEContratos').html($('.licitacoesEContratos').attr("english"));
    $('.gestaoFiscal').html($('.gestaoFiscal').attr("english"));
    $('.patrimonio').html($('.patrimonio').attr("english"));
    $('.pessoal').html($('.pessoal').attr("english"));
    $('.convenios').html($('.convenios').attr("english"));
    $('.dadosAbertos').html($('.dadosAbertos').attr("english"));
    
    // Menu secundário (o que está em outro nível de identação, é menu "terciário"). Alguns itens são comuns para mais de um menu secundário, por isso estão sendo colocados apenas no primeiro menu secundário que aparecem
    $('.empenhos').html($('.empenhos').attr("english"));
        $('.orgao').html($('.orgao').attr("english"));
        $('.fornecedor').html($('.fornecedor').attr("english"));
        $('.funcao').html($('.funcao').attr("english"));
        $('.elementoDespesa').html($('.elementoDespesa').attr("english"));
        $('.notaEmpenho').html($('.notaEmpenho').attr("english"));

    $('.liquidacoes').html($('.liquidacoes').attr("english"));
        $('.notaLiquidacao').html($('.notaLiquidacao').attr("english"));

    $('.pagamentos').html($('.pagamentos').attr("english"));
        $('.notaPagamentos').html($('.notaPagamentos').attr("english"));

    $('.restosAPagar').html($('.restosAPagar').attr("english"));
        $('.notaRestos').html($('.notaRestos').attr("english"));

    $('.lancada').html($('.lancada').attr("english"));
        $('.servico').html($('.servico').attr("english"));
        $('.categoria').html($('.categoria').attr("english"));

    $('.arrecadada').html($('.arrecadada').attr("english"));

    $('.licitacoes').html($('.licitacoes').attr("english"));
    $('.contratos').html($('.contratos').attr("english"));
    $('.bens').html($('.bens').attr("english"));
    $('.atas').html($('.atas').attr("english"));

    $('.legislacaoOrcamentaria').html($('.legislacaoOrcamentaria').attr("english"));

    $('.relatoriosLRF').html($('.relatoriosLRF').attr("english"));

    $('.prestacaoDeConta').html($('.prestacaoDeConta').attr("english"));

    $('.almoxarifado').html($('.almoxarifado').attr("english"));

    $('.bensMoveis').html($('.bensMoveis').attr("english"));

    $('.bensImoveis').html($('.bensImoveis').attr("english"));
        $('.numeroPatrimonio').html($('.numeroPatrimonio').attr("english"));

    $('.frota').html($('.frota').attr("english"));
    
    $('.servidoresESalarios').html($('.servidoresESalarios').attr("english"));
        $('.nome').html($('.nome').attr("english"));
        $('.cargoFuncao').html($('.cargoFuncao').attr("english"));
        $('.matricula').html($('.matricula').attr("english"));

    $('.estruturaPessoal').html($('.estruturaPessoal').attr("english"));
    $('.concursoPublico').html($('.concursoPublico').attr("english"));

    $('.recursosRecebidos').html($('.recursosRecebidos').attr("english"));
    $('.recursosCedidos').html($('.recursosCedidos').attr("english"));
    // Fim Frases/Palavras que se repetem

    // Fim App

    // Início Index

    $('#contentTitulo').html($('#contentTitulo').attr("english"));
    $('#contentConteudoPrincipal').html($('#contentConteudoPrincipal').attr("english"));
    $('#contentTituloPesquisar').html($('#contentTituloPesquisar').attr("english"));
    $('#contentSubTituloPesquisar').html($('#contentSubTituloPesquisar').attr("english"));

    // Fim Index
}

function criaCookie(){
    if ($.cookie('english') == undefined){
        var data = new Date();
        data.setTime(data.getTime() + (60 * 60 * 1000)); // setando o cookie para permanecer por 1 hora
        //cria o cookie de nome "english" e valor "on" e com tempo de expiração de 1 hora
        $.cookie("english", "on", { expires: data, path: '/' });
    } else {
        var data = new Date();
        data.setTime(data.getTime() + (60 * 60 * 1000)); // setando o cookie para permanecer por 1 hora
        //cria o cookie de nome "english" e valor "on" e com tempo de expiração de 1 hora
        $.removeCookie('english', { path: '/' });
        $.cookie("english", "on", { expires: data, path: '/' });
    }
}

/* Fim dos scripts para tradução da página */