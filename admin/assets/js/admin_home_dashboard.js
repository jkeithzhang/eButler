$(function() {
    $.getJSON('ajax/ajax_linechartData.php', function(rawData) {
    	var data = new Array();
    	rawData.forEach(function(item, index) {
    		var temp = [];
    		temp[0] = Date.UTC(item['year'], parseInt(item['month'])+1, item['day']);
    		temp[1] = parseInt(item['total']);
    		data.push(temp);
    	})
        $('#dashboard-linechart').highcharts({
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'My Finance Trend'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'Canadian dollars'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'Total',
                data: data
            }],
              credits: {
    			enabled: false
  			}
        });
    });
});