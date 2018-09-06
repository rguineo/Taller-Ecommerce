jQuery.noConflict();
				var example = 'column-parsed', 
					theme = 'default';
				(function($){ // encapsulate jQuery
					
Highcharts.chart('grafico', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Cantidad de Productos x Categorias'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Cantidad'
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});				})(jQuery);
