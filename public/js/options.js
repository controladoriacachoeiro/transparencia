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

function chartOptionsJs (dados, labels, fill, transparencia, pie) {
    
    var arrayData = new Array();

    if (pie){
        arrayData[0] = {
                data: dados,
                fill: fill,
                backgroundColor: getMultiColorBorder(),
                hoverBackgroundColor: getMultiColorBorder()
            };
    }
    else{
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
    }

    var chartData = {
        labels: labels,
        datasets: arrayData 
    }

    return chartData;
};




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