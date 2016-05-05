
var sunhours;
var stateTax;
function address(myLatLng){
	$.ajax({
		url: 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+myLatLng.lat+','+myLatLng.lng,
		success:function(data) {
			var len = data.results[0].address_components.length;
			var zip = data.results[0].address_components[len - 1].long_name;
			loadWeather(zip);
			//state(zip);
		}
	});
	
}

function state(zip){
	$.ajax({
		url: 'http://maps.googleapis.com/maps/api/geocode/json?address='+zip+'&sensor=true',
	
	success:function(data) {
		var len = data.results[0].address_components.length;
		console.log(data.results[0].address_components[len-2].short_name);
		findsunhours(data.results[0].address_components[len-2].short_name);
	}});
	
}
function findsunhours(sname){
	$.ajax({
		url:'http://weblab.cs.uml.edu/~pchitrig/assets/php/state.info.php?state='+sname
	}).done(function(info){
	sunhours  = parseInt(info.split(',')[1]);
	stateTax = parseInt(info.split(',')[2]);
	console.log(sunhours);
	console.log(stateTax);
	});
}
function loadWeather (zip){
	$.ajax({
		url: 'http://api.openweathermap.org/data/2.5/weather?zip='+zip+',us&units=metric&appid=c0d810c32d4f3e1b01fac86ca642ea1f',
		success: function(data) {
		var wData = {
			city: data.name,
			weather: data.weather[0].main,
			weatherIcon: 'http://openweathermap.org/img/w/'+data.weather[0].icon+'.png',
			weatherDescription: data.weather[0].description,
			temperature: data.main.temp,
			temperatureMax: data.main['temp_max'],
			temperatureMin: data.main['temp_min']
		}
		displayW(wData);
	}
	});
	
};

function displayW(wData){
	$('#wxIntro .city').text(wData.city);
		$('#wxIntro .temp').text(wData.temperature);
		$('#wxIntro .sym').attr({
		src: wData.weatherIcon
		});
		$('#sun .cond').text(wData.weatherDescription);
}

$(function(){
	$(".displaytab").hide();
	  getLocation();
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }
    function showPosition(position) {
        var myLatLng = {lat: position.coords.latitude, lng: position.coords.longitude};
        address(myLatLng);
    };
    $(".calcroi").submit(function(event) {
        event.preventDefault();
	state(zip);
		$(".displaytab").show();
        var data=[];
        var kwhmonth = parseInt($('.formkwh').val());
        var kwhyear = kwhmonth * 12;
		var newkwh=kwhyear;
		var finalkwh=kwhyear;
		data.push(kwhyear);
		var xaxis1=[];
		xaxis1.push(1);
		for (var i = 1; i <= 24; i++)
		{
           newkwh = newkwh + (newkwh * 0.05);
		   finalkwh=finalkwh+newkwh;
		   data.push(finalkwh);
		   xaxis1.push(i+1);
        };
		
		console.log("HI");
		console.log(data);
        //drawChart(data);
       	var sunhours = 2342;
        var stateTax = 12;
        var panelSize = 2.6;
        var panelCost = 5000;
        var averagePower = parseInt($('.formkwh').val());
		var averageAmount = parseInt($('.formbill').val());
        var tax = parseInt($('.formtax').val());
        var zip = $('.formzip').val();
		var panel = $('.formpanels').val();
       // var panel = parseInt($('.formpanel').val());
	   if(panel== null)
	   {
	      panel = Math.floor(averagePower/((sunhours/12)*panelSize));
		}
       // if((!isNaN(averageAmount))&&(!isNaN(averagePower))&&(!isNaN(tax))&&(!isNaN(zip))&&(!isNaN(panel))){
		loadWeather(zip);
		//state(zip);
		
			if(panel==0)
				panel=1;
        	var amountPerkwh = averageAmount/averagePower;
        	var yearPowerConsumtion = averagePower*12;
		var solarpv =0.20;
        	var kwhgenerated = Math.floor(panel*panelSize*sunhours);
		var kwhgenerated2 = Math.floor(panel*panelSize*sunhours*solarpv);
        	var moneySaved = kwhgenerated2*amountPerkwh +(30*tax/100) +1000;
        	var ROI = panelCost*panel/moneySaved;
			var RPKWH=(averageAmount/averagePower)/2;
			var buybackM=((kwhgenerated/12)-averagePower)*RPKWH;
			var buybackY = buybackM * 12;
			
			var data2=[];
			var data3=[];
			var panelcost=panel*5000;
			var newcost=panelcost;
			var newcostv=0-panelcost;
			var finalbbkwh=buybackY;
			var newbbkwh = buybackY;
			data2.push(newbbkwh);
			data3.push(newcostv);
			for (var j = 1; j <= 24; j++) {
				newbbkwh = newbbkwh + (newbbkwh * 0.05);
				finalbbkwh=finalbbkwh+newbbkwh;
				data2.push(finalbbkwh);
				newcost=newcost-finalbbkwh;
				newcost=0-newcost;
				data3.push(newcost);
				newcost=newcost*-1;
				};
			chart1(xaxis1,data);
		    chart2(xaxis1,data2);	
			chart3(xaxis1,data,data3);
			console.log(data2);
			console.log(data3);
			$('#idpanel .panel').text("No of Panels Suggested : ");
			$('#idpanel .panel').append(panel);
			$('#idpower .power').text("Power Generated in one Year : ");
			$('#idpower .power').append(kwhgenerated2);
			$('#idpower .power').append("*");
			$('#idpower .power').append(" KWH");
			$('#idsave .save').text("Money saved (yearly) : ");
			$('#idsave .save').append(moneySaved);
			$('#idsave .save').append("*");
			$('#idsave .save').append(" $");
			$('#idroi .roi').text("Buy Back Amount you can Expect Monthly : ");
			$('#idroi .roi').append(buybackM);
			$('#idroi .roi').append("*");
			$('#idroi .roi').append(" $");
			$('#approx').text("*Values shown above are approximate, these are calculated according to the current available data and are always subject to change.");
			$('#approx2').text("*Values are calculated assumimg System Size of 2.6 and System Cost of 5000$");
			console.log("Panels :"+panel);
        	console.log("averageAmount"+averageAmount);
        	console.log("averagePower"+averagePower);
        	console.log("moneySaved"+moneySaved);
        	console.log("amountPerkwh"+amountPerkwh);
        	console.log("kwhgenerated"+kwhgenerated);
        	console.log(ROI);
        //}


    });
});
