function chart2(xaxis1,data2){
console.log('hi2');
    $('#chart2').highcharts({
        title: {
            text: 'Buy Back amount for 25 years 5% Annual Increase Rate',
            x: -20 //center
        },
        xAxis: {
            categories: xaxis1
			},
        yAxis: {
            title: {
                text: 'Dollars'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Years',
            data: data2
        }]
    });
};