// -----------------
// GRÁFICOS --------
// -----------------

    function dadosJs (dados, labels) {

        //Cria um array vazio no javascript
        var arrayData = new Array();

        //Variável de controle
        $.each(dados, function (key, value) {
            var todosCampos = [];                    
            $.each(labels, function (keyL, valueL) {
                switch(valueL) {
                    case 'Empenho':
                        todosCampos.push(value.despesa_empenho);
                        break;
                    case 'Liquidado':
                        todosCampos.push(value.despesa_liquidado);
                        break;
                    case 'Pago':
                        todosCampos.push(value.despesa_pago);
                        break;
                }
            });

            arrayData[key] = {
                label: value.despesa_orgao,
                data: todosCampos,
            };
        });

        return arrayData;
    };



    function dataTableJs () {

        var dataTableOptions = {
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "scrollX": true,
                fixedColumns: { leftColumns: 1 },
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
                }
            };

        return dataTableOptions;
    };



    function chartOptionsJs (dados, labels, fill, transparencia) {
        
        var arrayData = new Array();
        
        $.each(dados, function (key, value) {
            
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

    function chartPieOptionsJs (arrayDataPie, arrayLabelPie, labels) {
        
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



    function configBarJs (dados, labels) {
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

    function configLineJs (dados, labels) {
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

    function configPieJs (arrayData, arrayLabel, label) {
        var configPie = {
            type: 'pie',
            data: chartPieOptionsJs(arrayData, arrayLabel, label),
            options: {
                responsive: true
            }
        };
        return configPie;
    };



    function arrayConfig (arrayData, labels) {

        var arrayConfigPie = new Array();

        $.each(labels, function (key, value) {

            var arrayDataPie = new Array();
            var arrayLabelPie = new Array();        
            $.each(arrayData, function (keyData, valueData) {
                arrayDataPie.push(valueData.data[key]);
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
    function dataHoje(addDia){

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
        var mes = data.getMonth(data.setMonth(data.getMonth()))+1
        var ano = data.getFullYear();

        if(dia<10){dia='0'+dia}
        if(mes<10){mes='0'+mes}

        var minhaData = dia + '/' + mes + '/' + ano; 
        return minhaData;
    }

    function datepickerConfig(){
        var config = {
		    dateFormat: 'dd/mm/yy',
			dayNames: arrayGenerico('semana'),
			dayNamesMin: arrayGenerico('semanaMin'),
			dayNamesShort: arrayGenerico('semanaCurto'),
			monthNames: arrayGenerico('meses'),
			monthNamesShort: arrayGenerico('mesesCurto'),
            yearRange: "2010:" + new Date().getFullYear(),
			defaultDate: "+1w",
			changeMonth: true,
			changeYear: true
		};
		
        return config;
	};
    
    function getDate( element ) {
        var date;
		try {
		    date = $.datepicker.parseDate( datepickerConfig().dateFormat, element.value );
		} catch( error ) {
		    date = null;
		}
		 
		return date;
	};
    
    function datepickerFiltro(dataInicio, dataFim){
        from = $(dataInicio)
            .datepicker(datepickerConfig())
            .on("change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
            }
        ),
        to = $(dataFim)
            .datepicker(datepickerConfig())
            .on("change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
            }
        );
        
        var controle = true
        if(controle) {
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
// ARRAYS GENÉRICOS --
// -------------------
    function arrayGenerico(tipo){
        var array = new Array();

        switch(tipo){
            case 'semana':
                array = ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo']
                break;
            case 'semanaCurto':
                array = ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom']
                break;
            case 'semanaMin':
                array = ['D','S','T','Q','Q','S','S','D']
                break;
            case 'meses':
                array = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro']
                break;
            case 'mesesCurto':
                array = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
                break;
            case 'anos':
                function anos (startYear) {
                    var currentYear = new Date().getFullYear()
                    var years = [];
                    while ( startYear <= currentYear ) {
                        years.push(startYear++);
                    }
                    return years.sort(function(a, b){return b-a});
                }
                array = anos(2000);
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
// FIM ARRAYS

// -------------------
// FILTRO ------------
// -------------------
    function montarObjDropdown(arrayDados){
        
        var select = [];

        for(var option in arrayDados){
            var pair = arrayDados[option].split("|");
            var newOption = document.createElement("option");
            newOption.value = pair[0];
            newOption.innerHTML = pair[1];

            select.push(newOption);
        }

        return select;
    }

    function optionArray(periodo, selectAnoValue){
        var optionArrayPeriodo = [];

        var array = arrayGenerico(periodo);
        
        $.each(array, function (key, value) {
            optionArrayPeriodo.push(value+'|'+value);
        });

        if(selectAnoValue === undefined){
            selectAnoValue = new Date().getFullYear();
        }

        var resultado = verificaPeriodo(optionArrayPeriodo, periodo, selectAnoValue);
        
        return resultado;
    }

    function verificaPeriodo(optionArrayPeriodo, periodo, selectAnoValue){
        var month = new Date().getMonth();
        var year = new Date().getFullYear();

        var resultado = [];

        switch(periodo){
            case 'meses':
                $.each(optionArrayPeriodo, function (key, value) {
                    if(selectAnoValue === year){
                        if(key <= month){
                            resultado.push(value);
                        }
                    }else{
                        resultado.push(value);
                    }
                });
                break;
            case 'bimestre':
                if(selectAnoValue === year){
                    var mesesPorBimestre = {
                        0: [0,1],                           // 1º Bimestre
                        1: [0,1,2,3],                       // 2º Bimestre
                        2: [0,1,2,3,4,5],                   // 3º Bimestre
                        3: [0,1,2,3,4,5,6,7],               // 4º Bimestre
                        4: [0,1,2,3,4,5,6,7,8,9],           // 5º Bimestre
                        5: [0,1,2,3,4,5,6,7,8,9,10,11]      // 6º Bimestre
                    };

                    $.each(optionArrayPeriodo, function (key, value) {
                        var controleTrue = 0;
                        var controleFalse = 0;
                        $.each(mesesPorBimestre[key], function (keyj, valuej) {
                            if(valuej <= month){
                                controleTrue++;
                            } else {
                                controleFalse++;
                            }
                        });

                        if(controleTrue > 0 && controleFalse < 2){
                            resultado.push(value);
                        }
                    });
                } else {
                    $.each(optionArrayPeriodo, function (key, value) {
                        resultado.push(value);
                    });
                };
                break;
            case 'trimestre':
                if(selectAnoValue === year){
                    var mesesPorTrimestre = {
                        0: [0,1,2],                     // 1º Trimestre
                        1: [0,1,2,3,4,5],               // 2º Trimestre
                        2: [0,1,2,3,4,5,6,7,8],         // 3º Trimestre
                        3: [0,1,2,3,4,5,6,7,8,9,10,11]  // 4º Trimestre
                    };

                    $.each(optionArrayPeriodo, function (key, value) {
                        var controleTrue = 0;
                        var controleFalse = 0;
                        $.each(mesesPorTrimestre[key], function (keyj, valuej) {
                            if(valuej <= month){
                                controleTrue++;
                            } else {
                                controleFalse++;
                            }
                        });

                        if(controleTrue > 0 && controleFalse < 3){
                            resultado.push(value);
                        }
                    });
                } else {
                    $.each(optionArrayPeriodo, function (key, value) {
                        resultado.push(value);
                    });
                };
                break;
            case 'quadrimestre':
                if(selectAnoValue === year){
                    var mesesPorQuadrimestre = {
                        0: [0,1,2,3],                     // 1º Quadrimestre
                        1: [0,1,2,3,4,5,6,7],             // 2º Quadrimestre
                        2: [0,1,2,3,4,5,6,7,8,9,10,11],   // 3º Quadrimestre
                    };

                    $.each(optionArrayPeriodo, function (key, value) {
                        var controleTrue = 0;
                        var controleFalse = 0;
                        $.each(mesesPorQuadrimestre[key], function (keyj, valuej) {
                            if(valuej <= month){
                                controleTrue++;
                            } else {
                                controleFalse++;
                            }
                        });

                        if(controleTrue > 0 && controleFalse < 4){
                            resultado.push(value);
                        }
                    });
                } else {
                    $.each(optionArrayPeriodo, function (key, value) {
                        resultado.push(value);
                    });
                };
                break;
            case 'semestre':
                if(selectAnoValue === year){
                    var mesesPorSemestre = {
                        0: [0,1,2,3,4,5],                     // 1º Semestre
                        1: [0,1,2,3,4,5,6,7,8,9,10,11]        // 2º Semestre
                    };

                    $.each(optionArrayPeriodo, function (key, value) {
                        var controleTrue = 0;
                        var controleFalse = 0;
                        $.each(mesesPorSemestre[key], function (keyj, valuej) {
                            if(valuej <= month){
                                controleTrue++;
                            } else {
                                controleFalse++;
                            }
                        });

                        if(controleTrue > 0 && controleFalse < 6){
                            resultado.push(value);
                        }
                    });
                } else {
                    $.each(optionArrayPeriodo, function (key, value) {
                        resultado.push(value);
                    });
                };
                break;
        }

        return resultado;
    }

// FIM FILTRO