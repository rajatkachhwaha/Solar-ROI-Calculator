function chart1(xaxis1,data){
console.log('hi');
    $('#chart').highcharts({
        title: {
            text: 'Amount Spent on Electricity at 5% Annual Increase RateAmount Spent on Electricity at 5% Annual Increase Rate',
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
            valueSuffix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Amt Spent',
            data: data
        }]
    });
};

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
            valueSuffix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Buy Back Amt',
            data: data2
        }]
    });
};

function chart3(xaxis1,data,data3){
console.log('hi2');
    $('#chart3').highcharts({
        title: {
            text: 'ROI vs Amount spent on Electricity',
            x: -20 //center
        },
		 subtitle: {
            text: '(Assuming System Size=2.6 and System Cost = 5000$)',
            x: -20
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
            valueSuffix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Amt Spent',
            data: data
        },{
            name: 'ROI',
            data: data3
        }]
    });
};