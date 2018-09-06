// Highcharts.chart('grafico', {
//     data: {
//         table: 'datatable'
//     },
//     chart: {
//         type: 'column'
//     },
//     title: {
//         text: 'Datos extraidos de la tabla HTML en esta pagina'
//     },
//     yAxis: {
//         allowDecimals: false,
//         title: {
//             text: 'Units'
//         }
//     },
//     tooltip: {
//         formatter: function () {
//             return '<b>' + this.series.name + '</b><br/>' +
//                 this.point.y + ' ' + this.point.name.toLowerCase();
//         }
//     }
// });


$(function () { 
    var myChart = Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });
});