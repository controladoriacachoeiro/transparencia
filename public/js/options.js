// -----------------
// GRÁFICOS --------
// -----------------

function dadosJs(dados, labels, subConsulta) {

    //Cria um array vazio no javascript
    var arrayData = new Array();

    //Variável de controle
    $.each(dados, function(key, value) {

        switch (subConsulta) {
            case 'empenhos':
                campoData = value.ValorEmpenho;
                break;
            case 'liquidacoes':
                campoData = value.ValorLiquidado;
                break;
            case 'pagamentos':
                campoData = value.ValorPago;
                break;
        }

        var label = labels[0];
        switch (label) {
            case 'Órgãos':
                campoLabel = value.UnidadeGestora;
                break;
            case 'Fornecedores':
                campoLabel = value.Beneficiario;
                break;
            case 'Funções':
                campoLabel = value.Funcao;
                break;
            case 'Elementos':
                campoLabel = value.ElemDespesa;
                break;
        }

        arrayData[key] = {
            label: campoLabel,
            data: campoData,
        };
    });

    return arrayData;
};



function dataTableJs() {

    var urlPtbr = window.location.origin + "//" + "public//js//Table-Pt-Br.json";

    var dataTableOptions = {
        "paging": false,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "scrollX": true,
        fixedColumns: { leftColumns: 1 },
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ Resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    };

    return dataTableOptions;
};



function chartOptionsJs(dados, labels, fill, transparencia) {

    var arrayData = new Array();

    $.each(dados, function(key, value) {

        var colorBorder = getMultiColorBorder()[key];
        var color = colorBorder;

        if (transparencia)
            color = getMultiColor()[key];

        arrayData[key] = {
            label: value.label,
            data: value.data,
            fill: fill,
            lineTension: 0.1,
            backgroundColor: color,
            borderColor: colorBorder,
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: colorBorder,
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: colorBorder,
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            spanGaps: false,
            hoverBackgroundColor: color
        };
    });

    var chartData = {
        labels: labels,
        datasets: arrayData
    }

    return chartData;
};

function chartPieOptionsJs(arrayDataPie, arrayLabelPie, labels) {

    var arrayData = new Array();

    arrayData[0] = {
        label: labels,
        data: arrayDataPie,
        backgroundColor: getMultiColorBorder()
    };

    var chartData = {
        labels: arrayLabelPie,
        datasets: arrayData
    }

    return chartData;
};



function configBarJs(dados, labels) {
    var configBar = {
        type: 'bar',
        data: chartOptionsJs(dados, labels, true, false),
        options: {
            responsive: true,
            legend: {
                position: 'top',
            }
        }
    };
    return configBar;
};

function configLineJs(dados, labels) {
    var configLine = {
        type: 'line',
        data: chartOptionsJs(dados, labels, false, true),
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: true,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            }
        }
    };
    return configLine;
};

function configPieJs(arrayData, arrayLabel, label) {
    var configPie = {
        type: 'pie',
        data: chartPieOptionsJs(arrayData, arrayLabel, label),
        options: {
            responsive: true
        }
    };
    return configPie;
};



function arrayConfig(arrayData, labels) {

    var arrayConfigPie = new Array();

    $.each(labels, function(key, value) {

        var arrayDataPie = new Array();
        var arrayLabelPie = new Array();
        $.each(arrayData, function(keyData, valueData) {
            arrayDataPie.push(valueData.data);
            arrayLabelPie.push(valueData.label);
        });

        var configPie = configPieJs(arrayDataPie, arrayLabelPie, value);

        arrayConfigPie.push(configPie);
    });

    return arrayConfigPie;
};

// FIM GRÁFICOS

// -------------------
// DATEPICKER --------
// -------------------
function dataHoje(addDia) {

    // var dd = 2;
    // var mm = 1;
    // var yy = 2017;
    // dataTeste = mm+'/'+dd+'/'+yy;
    // var data = new Date(dataTeste);

    var data = new Date();

    data.setDate(data.getDate() + addDia);
    data.setMonth(data.getMonth());
    data.setFullYear(data.getFullYear());

    var dia = data.getDate();
    var mes = data.getMonth(data.setMonth(data.getMonth())) + 1
    var ano = data.getFullYear();

    if (dia < 10) { dia = '0' + dia }
    if (mes < 10) { mes = '0' + mes }

    var minhaData = dia + '/' + mes + '/' + ano;
    return minhaData;
}

function datepickerConfig() {
    var config = {
        dateFormat: 'dd/mm/yy',
        dayNames: arrayGenerico('semana'),
        dayNamesMin: arrayGenerico('semanaMin'),
        dayNamesShort: arrayGenerico('semanaCurto'),
        monthNames: arrayGenerico('meses'),
        monthNamesShort: arrayGenerico('mesesCurto'),
        yearRange: arrayGenerico('anos').slice(-1)[0] + ':' + new Date().getFullYear(),
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        showOtherMonths: true,
        selectOtherMonths: true
    };

    return config;
};

function getDate(element) {
    var date;
    try {
        date = $.datepicker.parseDate(datepickerConfig().dateFormat, element.value);
    } catch (error) {
        date = null;
    }

    return date;
};

function datepickerFiltro(dataInicio, dataFim) {
    from = $(dataInicio)
        .datepicker(datepickerConfig())
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
        }),
        to = $(dataFim)
        .datepicker(datepickerConfig())
        .on("change", function() {
            from.datepicker("option", "maxDate", getDate(this));
        });

    var controle = true
    if (controle) {
        controle = false;

        var inicio = dataHoje(-31);
        var fim = dataHoje(-1);

        $(dataInicio).datepicker(datepickerConfig())
        $(dataInicio).datepicker("option", "maxDate", fim)
        $(dataInicio).datepicker("setDate", inicio);

        $(dataFim).datepicker(datepickerConfig())
        $(dataFim).datepicker("option", "minDate", inicio)
        $(dataFim).datepicker("option", "maxDate", fim)
        $(dataFim).datepicker("setDate", fim);
    }

};
// DATEPICKER

// -------------------
// ARRAYS ------------
// -------------------
function arrayGenerico(tipo) {
    var array = new Array();

    switch (tipo) {
        case 'semana':
            array = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo']
            break;
        case 'semanaCurto':
            array = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom']
            break;
        case 'semanaMin':
            array = ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D']
            break;
        case 'meses':
            array = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
            break;
        case 'mesesCurto':
            array = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
            break;
        case 'anos':
            function anos(startYear) {
                var currentYear = new Date().getFullYear()
                var years = [];
                while (startYear <= currentYear) {
                    years.push(startYear++);
                }
                return years.sort(function(a, b) { return b - a });
            }
            array = anos(2014);
            break;
        case 'bimestre':
            array = ['1º Bimestre', '2º Bimestre', '3º Bimestre', '4º Bimestre', '5º Bimestre', '6º Bimestre']
            break;
        case 'trimestre':
            array = ['1º Trimestre', '2º Trimestre', '3º Trimestre', '4º Trimestre']
            break;
        case 'quadrimestre':
            array = ['1º Quadrimestre', '2º Quadrimestre', '3º Quadrimestre']
            break;
        case 'semestre':
            array = ['1º Semestre', '2º Semestre']
            break;
        case 'periodo':
            array = ['Livre', 'Mês', 'Bimestral', 'Trimestral', 'Quadrimestral', 'Semestral']
            break;
    }

    return array;
}

function getMultiColor() {
    var color = [];
    color.push('rgba(0, 108, 112, 0.4)');
    color.push('rgba(0, 60, 113, 0.4)');
    color.push('rgba(4, 26, 109, 0.4)');
    color.push('rgba(57, 2, 100, 0.4)');
    color.push('rgba(102, 0, 89, 0.4)');
    color.push('rgba(136, 35, 36, 0.4)');
    color.push('rgba(159, 25, 21, 0.4)');
    color.push('rgba(159, 79, 1, 0.4)');
    color.push('rgba(157, 104, 0, 0.4)');
    color.push('rgba(158, 148, 6, 0.4)');
    color.push('rgba(58, 126, 33, 0.4)');
    color.push('rgba(2, 108, 59, 0.4)');

    color.push('rgba(0, 169, 172, 0.4)');
    color.push('rgba(0, 101, 179, 0.4)');
    color.push('rgba(24, 58, 161, 0.4)');
    color.push('rgba(93, 39, 149, 0.4)');
    color.push('rgba(172, 24, 146, 0.4)');
    color.push('rgba(237, 27, 37, 0.4)');
    color.push('rgba(251, 50, 48, 0.4)');
    color.push('rgba(252, 129, 19, 0.4)');
    color.push('rgba(255, 165, 23, 0.4)');
    color.push('rgba(254, 238, 0, 0.4)');
    color.push('rgba(109, 201, 60, 0.4)');
    color.push('rgba(0, 168, 95, 0.4)');

    color.push('#rgba(0, 136, 141, 0.4)');
    color.push('#rgba(0, 79, 142, 0.4)');
    color.push('#rgba(16, 42, 131, 0.4)');
    color.push('#rgba(71, 21, 122, 0.4)');
    color.push('#rgba(138, 3, 123, 0.4)');
    color.push('#rgba(183, 37, 40, 0.4)');
    color.push('#rgba(197, 38, 36, 0.4)');
    color.push('#rgba(204, 101, 11, 0.4)');
    color.push('#rgba(210, 131, 12, 0.4)');
    color.push('#rgba(204, 191, 0, 0.4)');
    color.push('#rgba(82, 158, 45, 0.4)');
    color.push('#rgba(0, 137, 76, 0.4)');


    return color;
}

function getMultiColorBorder() {
    var color = [];
    color.push('rgba(0, 108, 112, 1)');
    color.push('rgba(0, 60, 113, 1)');
    color.push('rgba(4, 26, 109, 1)');
    color.push('rgba(57, 2, 100, 1)');
    color.push('rgba(102, 0, 89, 1)');
    color.push('rgba(136, 35, 36, 1)');
    color.push('rgba(159, 25, 21, 1)');
    color.push('rgba(159, 79, 1, 1)');
    color.push('rgba(157, 104, 0, 1)');
    color.push('rgba(158, 148, 6, 1)');
    color.push('rgba(58, 126, 33, 1)');
    color.push('rgba(2, 108, 59, 1)');

    color.push('rgba(0, 169, 172, 1)');
    color.push('rgba(0, 101, 179, 1)');
    color.push('rgba(24, 58, 161, 1)');
    color.push('rgba(93, 39, 149, 1)');
    color.push('rgba(172, 24, 146, 1)');
    color.push('rgba(237, 27, 37, 1)');
    color.push('rgba(251, 50, 48, 1)');
    color.push('rgba(252, 129, 19, 1)');
    color.push('rgba(255, 165, 23, 1)');
    color.push('rgba(254, 238, 0, 1)');
    color.push('rgba(109, 201, 60, 1)');
    color.push('rgba(0, 168, 95, 1)');

    color.push('#rgba(0, 136, 141, 1)');
    color.push('#rgba(0, 79, 142, 1)');
    color.push('#rgba(16, 42, 131, 1)');
    color.push('#rgba(71, 21, 122, 1)');
    color.push('#rgba(138, 3, 123, 1)');
    color.push('#rgba(183, 37, 40, 1)');
    color.push('#rgba(197, 38, 36, 1)');
    color.push('#rgba(204, 101, 11, 1)');
    color.push('#rgba(210, 131, 12, 1)');
    color.push('#rgba(204, 191, 0, 1)');
    color.push('#rgba(82, 158, 45, 1)');
    color.push('#rgba(0, 137, 76, 1)');


    return color;
}

function json_to_js(array) {
    array = array.replace(/\\n/g, "\\n")
        .replace(/\\'/g, "\\'")
        .replace(/\\"/g, '\\"')
        .replace(/\\&/g, "\\&")
        .replace(/\\r/g, "\\r")
        .replace(/\\t/g, "\\t")
        .replace(/\\b/g, "\\b")
        .replace(/\\f/g, "\\f");
    // remove non-printable and other non-valid JSON chars
    array = array.replace(/[\u0000-\u0019]+/g, "");
    var parsed = JSON.parse(array);

    arr = [];
    $.each(parsed, function(key, value) {
        arr.push(value);
    });

    return arr;
}
// FIM ARRAYS

// -------------------
// FILTRO ------------
// -------------------
function montarObjDropdown(arrayDados) {

    var select = [];

    for (var option in arrayDados) {
        var pair = arrayDados[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];

        select.push(newOption);
    }

    return select;
}

function optionArray(periodo, selectAnoValue) {
    var optionArrayPeriodo = [];

    var array = arrayGenerico(periodo);

    $.each(array, function(key, value) {
        optionArrayPeriodo.push(value + '|' + value);
    });

    if (selectAnoValue === undefined) {
        selectAnoValue = new Date().getFullYear();
    }

    var resultado = verificaPeriodo(optionArrayPeriodo, periodo, selectAnoValue);

    return resultado;
}

function arrayPeriodo() {
    var select = document.getElementById("selectPeriodo");
    var options = arrayGenerico('periodo');
    for (var i = 0; i < options.length; i++) {
        var opt = options[i];
        var el = document.createElement("option");
        el.textContent = opt;
        el.value = opt;
        select.appendChild(el);
    }
}

//Função que dá nome e popula os campos de filtro
function arrayTipoConsulta(tipoConsulta, label, dados, select) {
    var options = [];
    if (label.Tipo == 'select') {
        options.push('Todos');
        var elemento = dados;
        for (var k = 0; k < elemento.length; k++) {
            elemento[k] = elemento[k].replace("`", "'");
            options.push(elemento[k]);
        }

        for (var k = 0; k < options.length; k++) {
            var opt = options[k];
            var el = document.createElement("option");
            el.textContent = opt;
            el.value = opt;
            select.appendChild(el);
        }
    }
}

function arrayTipoConsulta2(dados, select) {
    var options = [];
    options.push('Todos');
    var elemento = dados;
    for (var k = 0; k < elemento.length; k++) {
        if (elemento[k] != null) {
            elemento[k] = elemento[k].replace("`", "'");
            options.push(elemento[k]);
        }
    }

    for (var k = 0; k < options.length; k++) {
        var opt = options[k];
        var el = document.createElement("option");
        el.textContent = opt;
        el.value = opt;
        select.appendChild(el);
    }
}


function verificaPeriodo(optionArrayPeriodo, periodo, selectAnoValue) {
    var month = new Date().getMonth();
    var year = new Date().getFullYear();

    var resultado = [];

    switch (periodo) {
        case 'meses':
            $.each(optionArrayPeriodo, function(key, value) {
                if (selectAnoValue === year) {
                    if (key <= month) {
                        resultado.push(value);
                    }
                } else {
                    resultado.push(value);
                }
            });
            break;
        case 'bimestre':
            if (selectAnoValue === year) {
                var mesesPorBimestre = {
                    0: [0, 1], // 1º Bimestre
                    1: [0, 1, 2, 3], // 2º Bimestre
                    2: [0, 1, 2, 3, 4, 5], // 3º Bimestre
                    3: [0, 1, 2, 3, 4, 5, 6, 7], // 4º Bimestre
                    4: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], // 5º Bimestre
                    5: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] // 6º Bimestre
                };

                $.each(optionArrayPeriodo, function(key, value) {
                    var controleTrue = 0;
                    var controleFalse = 0;
                    $.each(mesesPorBimestre[key], function(keyj, valuej) {
                        if (valuej <= month) {
                            controleTrue++;
                        } else {
                            controleFalse++;
                        }
                    });

                    if (controleTrue > 0 && controleFalse < 2) {
                        resultado.push(value);
                    }
                });
            } else {
                $.each(optionArrayPeriodo, function(key, value) {
                    resultado.push(value);
                });
            };
            break;
        case 'trimestre':
            if (selectAnoValue === year) {
                var mesesPorTrimestre = {
                    0: [0, 1, 2], // 1º Trimestre
                    1: [0, 1, 2, 3, 4, 5], // 2º Trimestre
                    2: [0, 1, 2, 3, 4, 5, 6, 7, 8], // 3º Trimestre
                    3: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] // 4º Trimestre
                };

                $.each(optionArrayPeriodo, function(key, value) {
                    var controleTrue = 0;
                    var controleFalse = 0;
                    $.each(mesesPorTrimestre[key], function(keyj, valuej) {
                        if (valuej <= month) {
                            controleTrue++;
                        } else {
                            controleFalse++;
                        }
                    });

                    if (controleTrue > 0 && controleFalse < 3) {
                        resultado.push(value);
                    }
                });
            } else {
                $.each(optionArrayPeriodo, function(key, value) {
                    resultado.push(value);
                });
            };
            break;
        case 'quadrimestre':
            if (selectAnoValue === year) {
                var mesesPorQuadrimestre = {
                    0: [0, 1, 2, 3], // 1º Quadrimestre
                    1: [0, 1, 2, 3, 4, 5, 6, 7], // 2º Quadrimestre
                    2: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], // 3º Quadrimestre
                };

                $.each(optionArrayPeriodo, function(key, value) {
                    var controleTrue = 0;
                    var controleFalse = 0;
                    $.each(mesesPorQuadrimestre[key], function(keyj, valuej) {
                        if (valuej <= month) {
                            controleTrue++;
                        } else {
                            controleFalse++;
                        }
                    });

                    if (controleTrue > 0 && controleFalse < 4) {
                        resultado.push(value);
                    }
                });
            } else {
                $.each(optionArrayPeriodo, function(key, value) {
                    resultado.push(value);
                });
            };
            break;
        case 'semestre':
            if (selectAnoValue === year) {
                var mesesPorSemestre = {
                    0: [0, 1, 2, 3, 4, 5], // 1º Semestre
                    1: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] // 2º Semestre
                };

                $.each(optionArrayPeriodo, function(key, value) {
                    var controleTrue = 0;
                    var controleFalse = 0;
                    $.each(mesesPorSemestre[key], function(keyj, valuej) {
                        if (valuej <= month) {
                            controleTrue++;
                        } else {
                            controleFalse++;
                        }
                    });

                    if (controleTrue > 0 && controleFalse < 6) {
                        resultado.push(value);
                    }
                });
            } else {
                $.each(optionArrayPeriodo, function(key, value) {
                    resultado.push(value);
                });
            }
            break;
    }

    return resultado;
}

function ocultarOpcoesFiltro() {

    $('#txtTipoConsulta').hide();
    $('#selectTipoConsulta').hide();
    $('#DivFiltro2').hide();
    $('#lblTipoConsulta2').hide();
    $('#txtTipoConsulta2').hide();
    $('#selectTipoConsulta2').hide();
    $('#lblTipoConsulta3').hide();
    $('#txtTipoConsulta3').hide();
    $('#selectTipoConsulta3').hide();
    $('#divPeriodo').hide();
    $('#divDataInicio').hide();
    $('#divDataFim').hide();
    $('#divAno').hide();
    $('#divMes').hide();
    $('#divBimestre').hide();
    $('#divTrimestre').hide();
    $('#divQuadrimestre').hide();
    $('#divSemestre').hide();
};
// FIM FILTRO

// -------------------
// Consultas Menu ----
// -------------------
function simplificarString(string) {
    str = string;
    str = str.replace(/[ÁÃÂÀ]/g, "A");
    str = str.replace(/[áãâà]/g, "a");
    str = str.replace(/[ÉÊ]/g, "E");
    str = str.replace(/[éê]/g, "e");
    str = str.replace(/[ÓÕÔ]/g, "O");
    str = str.replace(/[óõô]/g, "o");
    str = str.replace(/[Í]/g, "I");
    str = str.replace(/[í]/g, "i");
    str = str.replace(/[Ú]/g, "U");
    str = str.replace(/[ú]/g, "u");
    str = str.replace(/[Ç]/g, "C");
    str = str.replace(/[ç]/g, "c");
    str = str.replace(/[^a-z0-9]/gi, '');
    str = str.toLowerCase();

    return str;
}

function dadosConsultaMenu(url, linkBase, consulta, subConsulta, tipoConsulta) {
    $.get(url, function(data) {
        var arrayDados = [];

        if (consulta !== null && consulta !== undefined) {
            $.each(data, function(keyConsulta, valueConsulta) {
                if (simplificarString(consulta) == simplificarString(keyConsulta)) {
                    $.each(valueConsulta, function(keySubconsulta, valueSubconsulta) {
                        if (subConsulta !== null && subConsulta !== undefined) {
                            if (simplificarString(subConsulta) == simplificarString(keySubconsulta)) {
                                $.each(valueSubconsulta, function(keyTipoConsulta, valueTipoConsulta) {

                                    var link = linkBase.replace('/consulta', '/' + simplificarString(keyConsulta))
                                        .replace('/subConsulta', '/' + simplificarString(keySubconsulta))
                                        .replace('/tipoConsulta', '/' + simplificarString(valueTipoConsulta))

                                    arrayDados.push('<a href="' + link + '" class="btn btn-default">' + valueTipoConsulta + '</a>');
                                });
                            }
                        } else {

                            var link = linkBase.replace('/consulta', '/' + simplificarString(keyConsulta))
                                .replace('/subConsulta', '/' + simplificarString(keySubconsulta))
                                .replace('/tipoConsulta', '')

                            arrayDados.push('<a href="' + link + '" class="btn btn-default">' + keySubconsulta + '</a>');
                        }
                    });
                }
            });

            $(".box-body").html(arrayDados);
        }
    });
}
// FIM FILTRO

// FORMATAÇÃO DE DADOS

function stringToDate(date) {
    var parts = date.split('-');
    var formatedDate = (parts[2] + '/' + parts[1] + '/' + parts[0]);
    return formatedDate;
}

function currencyFormat(num, c) {
    var n = parseFloat(num),
        c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = d == undefined ? "," : d,
        t = t == undefined ? "." : t,
        s = n < 0 ? "-" : "",
        i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
        j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}

// FIM FORMATAÇÃO DE DADOS